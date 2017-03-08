<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Authencation
 */
class Authencation extends MY_Controller
{
    public $user        = []; /** @var array $user         The information about the authencated user. */
    public $abilities   = []; /** @var array $abilities    The abilities for the authencated user.     */
    public $permissions = []; /** @var array $permissions  The permissions for the authencated user.   */

    /**
     * Authencation constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->library(['session', 'blade', 'form_validation']);
        $this->load->helper(['url']);

        $this->user        = $this->session->userdata('user');
        $this->abilities   = $this->session->userdata('abilities');
        $this->permissions = $this->session->userdata('permissions');
    }

    /**
     * Return the list of middlewares you want to be applied,
     * Here is list of some valid options
     *
     * admin_auth                    // As used below, simplest, will be applied to all
     * someother|except:index,list   // This will be only applied to posts()
     * yet_another_one|only:index    // This will be only applied to index()
     *
     * @return array
     */
    protected function middleware()
    {
        return [];
    }

    /**
     * Get the login view.
     *
     * @url:see('GET|HEAD', 'http://www.activisme.be/authencation')
     * @return Blade view
     */
    public function index()
    {
        $data['title'] = 'Login';
        return $this->blade->render('auth/login', $data);
    }

    /**
     * Verify the given user against the database.
     *
     * @see:url('POST', 'http://www.activisme.be/authencation/verify')
     * @return Blade view | Response
     */
    public function verify()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'wachtwoord', 'trim|required|callback_check_database');

        if ($this->form_validation->run() === false) { // Validation >>> fails
            $data['title'] = 'Inloggen';

            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'De gebruikersnaam en het wachtwoord die je hebt ingevoerd komen niet overeen met ons archief. Controleer de gegevens en probeer het opnieuw.');

            return $this->blade->render('auth/login', $data);
        }

        return redirect(base_url('backend'));
    }

    /**
     * [INTERNAL]: Check the given credentials against the database.
     *
     * @param  string $password   The user given password.
     * @return bool
     */
    public function check_database($password)
    {
        // BUG: MD5 is insecure. Replace it with a better hashing.

        $input['email'] = $this->security->xss_clean($this->input->post('email'));
        $MySQL['user']  = Authencate::where('email', $input['email'])
            ->with(['permissions', 'abilities'])
            ->where('blocked', 'N')
            ->where('password', md5($password));

        if ((int) $MySQL['user']->count() === 1) {
            $authencation = []; // Empty userdata array .
            $permissions  = []; // Empty permissions array.
            $abilities    = []; // Empty abilities array.

            foreach ($MySQL['user']->get() as $user) {
                foreach ($user->permissions as $permission) {
                    array_push($permissions, $permission->name);
                }

                foreach ($user->abilities as $ability) {
                    array_push($abilities, $ability->name);
                }

                if (in_array('Admin', $permissions) || in_array('Developer', $permissions)) {
                    $authencation['id']         = $user->id;
                    $authencation['name']       = $user->name;
                    $authencation['email']      = $user->email;
                    $authencation['username']   = $user->username;

                    $this->session->set_userdata('user', $authencation);
                    $this->session->set_userdata('permissions', $permissions);
                    $this->session->set_userdata('abilities', $abilities);

                    return true;
                } else {
                    $this->session->set_flashdata('class', 'alert alert-danger');
                    $this->session->set_flashdata('message', 'U hebt geen rechten om hier in te loggen');

                    return false;
                }
            }
        } else {
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Wrong credentials given.');

            $this->form_validation->set_message('check_database', 'Foutieve login gegevens.');

            return false;
        }

    }

    /**
     * Register view for a user.
     *
     * @see:url('GET|HEAD', 'http://www.activisme.be/authencation/register')
     * @return Blade view
     */
    public function register()
    {
        $data['title'] = 'Registreer je account.';
        return $this->blade->render('auth/register', $data);
    }

    /**
     * Store the given user information in the database.
     *
     * @see:url('POST', 'http://www.activisme.be/authencation/store')
     * @return Response|Redirect
     */
    public function store()
    {
        $this->form_validation->set_rules('name', 'Naam', 'trim|required');
        $this->form_validation->set_rules('username', 'Gebruikersnaam', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Wachtwoord' ,'trim|required|matches[password]');
        $this->form_validation->set_rules('password_confirmation', 'Wachtwoord bevestiging', 'trim|required');

        if ($this->form_validation->run() === false) { // Validation >>> fails
            $data['title'] = 'Registreer je account.';

            return $this->blade->render('auth/register', $data);
        }

        // No validation errors. SO move on with our logic.

        $input['name']     = $this->input->post('name');
        $input['username'] = $this->input->post('username');
        $input['email']    = $this->input->post('email');
        $input['password'] = md5($this->input->post('password'));

        if (Authencate::store($this->security->xss_clean($input))) {
            $this->session->set_flashdata('class', 'alert-success');
            $this->session->set_flashdata('message', 'Uw account is successvol aangemaakt.');
        }

        return redirect(base_url('/'));
    }
}

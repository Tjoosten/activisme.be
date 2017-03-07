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

        if ($MySQL['user']->count() === 1) {
            $authencation = []; // Empty userdata array .
            $permissions  = []; // Empty permissions array.
            $abilities    = []; // Empty abilities array.

            foreach ($MySQL['user']->get() as $user) {
                if (in_array('Admin', (array) $user->permissions) || in_array('Developer', (array) $user->permissions)) {
                    foreach ($user->permissions as $permission) {
                        array_push($permissions, $permission->name);
                    }

                    foreach ($user->abilities as $ability) {
                        array_push($abilities, $ability->name);
                    }

                    $authencation['id']         = $user->id;
                    $authencation['name']       = $user->name;
                    $authencation['email']      = $user->email;
                    $authencation['username']   = $user->username;

                    $this->session->set_userdata('user', $authencation);
                    $this->session->set_userdata('permissions', $permissions);
                    $this->session->set_userdata('abilities', $abilities);
                } else {
                    $this->session->set_flashdata('class', 'alert alert-danger');
                    $this->session->set_flashdata('message', 'U hebt geen rechten om hier in te loggen');
                }

                return true;
            }
        } else {
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Wrong credentials given.');

            $this->form_validation->set_message('check_database', 'Foutieve login gegevens.');

            return false;
        }

    }

    /**
     * @see:url()
     * @return
     */
    public function register()
    {
        $data['title'] = 'Registreer je account.';
        return $this->blade->render('', $data);
    }

    /**
     * Store the given user information in the database.
     *
     * @see:url('POST', 'http://www.activisme.be/authencation/store')
     * @return Response|Redirect
     */
    public function store()
    {
        $this->form_validation->set_rules();
        $this->form_validation->set_rules();
        $this->form_validation->set_rules();

        if ($this->form_validation->run() === false) { // Validation >>> fails
            $data['title'] = 'Registreer je account.';

            return $this->blade->render('', $data);
        }

        if (Authencate::store($this->security->xss_clean($input))) {
            $this->session->set_flashdata('class', 'alert-success');
            $this->session->set_flashdata('message', 'Uw account is successvol aangemaakt.');
        }

        return redirect(base_url('/'));
    }
}

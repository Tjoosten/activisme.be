<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Authencation
 *
 * TODO: Document the abilities and permissions. (Google Doc)
 */
class Authencation extends MY_Controller
{
	public $user        = [];
	public $permissions = [];
	public $abilities   = [];

	/**
	 * Authencation constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['session', 'blade', 'form_validation']);
		$this->load->helper(['url']);
		$this->load->model('authencate');

		$this->user        = $this->session->userdata('user');
		$this->permissions = $this->session->userdata('permissions');
		$this->abilities   = $this->session->userdata('abilities');
	}

	/**
	 * The middleware for the controller.
	 *
	 * @return array
	 */
	protected function middleware()
	{
		return [];
	}

	/**
	 * The login view for the user.
	 *
	 * @return Blade view.
	 */
	public function login()
	{
		$data['title'] = 'Inloggen';
		$relLinks      = Types::where('name', 'Link')->first();
		$data['links'] = Actions::where('type_id', $relLinks->id)->get();
		$this->blade->render('auth/login', $data);
	}

	/**
	 * Base method for validation the credentials.
	 *
	 * @return Response|Blade view
	 */
	public function verify()
	{
		$this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');

		if ($this->form_validation->run() === false) { // Validation fails
			$data['title'] = 'Inloggen';
			$relLinks      = Types::where('name', 'Link')->first();
			$data['links'] = Actions::where('type_id', $relLinks->id)->get();

			$this->session->set_flashdata('class', 'alert alert-danger');
			$this->session->set_flashdata('message', 'De gebruikersnaam en het wachtwoord die je hebt ingevoerd komen niet overeen met ons archief. Controlleer de gegevens en probeer het opniew.');

			return $this->blade->render('auth/login', $data);
		}

		return redirect(base_url('backend'));
	}

	/**
	 * Check the given credentials against the database.
	 *
	 * @param  string $password The password for the user.
	 * @return Blade view|Response
	 */
	public function check_database($password)
	{
		$input['email'] = $this->security->xss_clean($this->input->post('email'));
        $MySQL['user']  = Authencate::where('email', $input['email'])
            ->with(['permissions', 'abilities'])
            ->where('blocked', 'N')
            ->where('password', md5($password));

			// var_dump($MySQL['user']->get());
			// die();

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
					$this->form_validation->set_message('check_database', 'U hebt geen rechten om hier in te loggen.');

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
	 * Register page for the users.
	 *
	 * @return blade view
	 */
	public function register()
	{
		$data['title'] = 'Registreer';
		$relLinks      = Types::where('name', 'Link')->first();
		$data['links'] = Actions::where('type_id', $relLinks->id)->get();
		$this->blade->render('auth/register', $data);
	}

	/**
	 * Store the new user in the system.
	 *
	 * @return Response|Blade view.
	 */
	public function store()
	{
		$this->form_validation->set_rules('name', 'Naam', 'trim|required');
		$this->form_validation->set_rules('username', 'Gebruikersnaam', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email adres', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Wachtwoord', 'trim|required|matches[password_confirmation]');
		$this->form_validation->set_rules('password_confirmation', 'bevestiging', 'trim|required');

		if ($this->form_validation->run() === false) { // Form validation fails.
			$data['title'] = 'Registreren';
			$relLinks      = Types::where('name', 'Link')->first();
			$data['links'] = Actions::where('type_id', $relLinks->id)->get();

			$this->session->set_flashdata('class', 'alert alert-danger');
			$this->session->set_flashdata('message', 'Wij konden de gebruiker niet aanmaken.');

			return $this->blade->render('auth/register', $data);
		}

		// No validation errors found so move on with the logic.
		$input['name'] 		= $this->input->post('name');
		$input['username']	= $this->input->post('username');
		$input['email']		= $this->input->post('email');
		$input['password']  = md5($this->input->post('password'));
		$input['ban_id']    = '0';
		$input['blocked']   = 'N';

		if (Authencate::create($this->security->xss_clean($input))) {
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('message', 'The gebruiker is aangemaakt.');
		}

		return redirect($_SERVER['HTTP_REFERER']);
	}

	/**
	 * Log the user out off the system.
	 *
	 * @return Redirect
	 */
	public function logout()
	{
		$data = $this->session;

		if ($data->unset_userdata('user') && $data->unset_userdata('permissions') && $data->unset_userdata('abilities')) {
			$data->set_flashdata('class', 'alert alert-success');
			$data->set_flashdata('message', 'U bent nu uitgelogd.');
		}

		return redirect(base_url());
	}
}

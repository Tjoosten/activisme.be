<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Users
 */
class Users extends MY_Controller
{
	public $user        = []; /** @var array $user 			The authencated userdata		  */
	public $abilities   = []; /** @var array $abilities		The authencated user abilities	  */
	public $permissions = []; /** @var array $permissions	The authencated user permissions. */

	/**
	 * Users constructor.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['blade', 'form_validation', 'session']);
		$this->load->helper(['url']);

		$this->user        = $this->session->userdata('user');
		$this->permissions = $this->session->userdata('permissions');
		$this->abilities   = $this->session->userdata('abilities');

	}

	/**
	 * The middleware class for the controller.
	 *
	 * @return array
	 */
	protected function middleware()
	{
		return ['auth'];
	}

	/**
	 * Get the backend users overview.
	 *
	 * @return blade view.
	 */
	public function index()
	{
		$data['title'] 	     = 'Gebruikers';
		$data['users'] 		 = Authencate::all();
		$data['permissions'] = Permissions::all();
		$data['abilities']   = Abilities::all();

		return $this->blade->render('users/index', $data);
	}

	/**
	 * Search for a specific user in the system.
	 *
	 * @return mixed
	 */
	public function search()
	{
		$term = $this->security->xss_clean($this->input->get('term'));

		$data['title']       = 'Zoek resultaten:' . $term;
		$data['permissions'] = Permissions::all();
		$data['abilities']   = Abilities::all();

		// Search query
		$data['users'] = Authencate::where('name', 'LIKE', "$term")
			->orWhere('name', 'like', "$term")
			->orWhere('email', 'like', "$term")
			->get();

		return $this->blade->render('users/index', $data);
	}

	/**
	 * Get the suer information by the id.
	 *
	 * @return JSON response
	 */
	public function getById()
	{
		$userId = $this->security->xss_clean($this->uri->segment(3));
		$userDb = Authencate::select(['name', 'id'])->find($userId);

		echo json_encode($userDb);
	}

	/**
	 * Block a user from the system.
	 *
	 * @return Response.
	 */
	public function block()
	{
		$this->form_validation->set_rules('id', 'Gebruikers identificatie', 'trim|required');
		$this->form_validation->set_rules('reason', 'Reden', 'trim|required');

		if ($this->form_validation->run() === false) { // Form validation fails.
			$data['title'] = 'Gebruikers';
			$data['users'] = Authencate::all();

			// dump(validation_errors());	// For debugging propose.
			// die();						// For debugging propose.

			return $this->blade->render('users/index', $data);
		}

		// No validation errors. So move on with our logic.
		$userId = $this->security->xss_clean($this->input->post('id'));
		$reason = Ban::create(['author_id' => $this->user['id'], 'reason' => $this->security->xss_clean($this->input->post('reason'))]);
		$ban    = Authencate::find($userId)->update(['blocked' => 'Y', 'ban_id' => $reason->id]);

		if ($ban && $reason) { // The user has been blocked.
			$this->session->set_flashdata('class', '');
			$this->session->set_flashdata('message', '');
		}

		return redirect($_SERVER['HTTP_REFERER']);
	}

	/**
	 * Show a user.
	 *
	 * @return blade response.
	 */
	public function show()
	{
		$userId       = $this->security->xss_clean($this->uri->segment(3));
		$data['user'] = Authencate::find($userId);

		if ((int) count($data['user']) === 1) {
			$data['title'] = $data['user']->name . '('. $data['user']->username .')';
			return $this->blade->render('users/show', $data);
		}

		return $this->blade->render('errors/html/404');
	}

	/**
	 * Unblock a user in the system.
	 *
	 * @return Redirect
	 */
	public function unblock()
	{
		$userId = $this->security->xss_clean($this->uri->segment(3));

		if (Authencate::find($userId)->update(['ban_id' => 0, ''])) { // User is unblocked.
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('message', 'De gebruiker is actief.');
		}

		return redirect($_SERVER['HTTP_REFERER']);
	}

	/**
	 * Store a new user in the system.
	 *
	 * @return Blade view | Response
	 */
	public function store()
	{
		$this->form_validation->set_rules('name', 'Naam', 'trim|required');
		$this->form_validation->set_rules('username', 'Gebruikersnaam', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'E-mail adres', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Wachtwoord', 'trim|required|matches[password_confirmation]');
		$this->form_validation->set_rules('password_confirmation', 'Wachtwoord bevestiging', 'trim|required');

		if ($this->form_validation->run() === false) { // Form validation fails.
			dump(validation_errors()); 	// For debugging propose.
			die();						// For debugging propose.

			$this->session->set_flashdata('class', 'alert alert-danger');
			$this->session->set_flashdata('message', 'Kon de gebruiker niet toevoegen.');

			return redirect(site_url('users'));
		}

		// No validation errors move on with )our insert logic.
		$input['name'] 		= $this->input->post('name', true);
		$input['username']	= $this->input->post('username', true);
		$input['email']		= $this->input->post('email', true);
		$input['password']  = md5($this->input->post('password', true));

		if ($newUser = Authencate::create($input)) { // User is created
			$acl['permissions']	= $this->input->post('permissions', true);
			$acl['abilities'] 	= $this->input->post('abilities', true);

			if (! empty($acl['permissions'])) { // Permîssions are given.
				Authencate::find($newUser->id)->permissions()->attach($acl['permissions']);
			}

			if (! empty($acl['abilities'])) { // Abilities are given.
				Authencate::find($newUser->id)->abilities()->attach($acl['abilities']);
			}

			// Flash message
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('message', 'De gebruiker is toegevoegd.');
		}


		return redirect($_SERVER['HTTP_REFERER']);
	}

	/**
	 * Delete an account in the system.
	 *
	 * @return Redirect
	 */
	public function delete()
	{		
		$user = Authencate::find($this->security->xss_clean($this->uri->segment(3)));

		if ((int) count($user) === 1) {
			if ($user->delete()) {
				$user->permissions()->sync([]);
				$user->abilities()->sync([]);

				$this->session->set_flashdata('class', 'alert alert-success');
				$this->session->set_flashdata('message', 'De gebruiker is verwijderd.');
			}
		}

		return redirect($_SERVER['HTTP_REFERER']);
	}
}

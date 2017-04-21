<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Account
 */
class Account extends MY_Controller
{
	public $user 		= []; /** @var array $user  		The authencated userdata		 */
	public $permissions = []; /** @var array $permissions 	The authencated user permissions */
	public $abilities   = []; /** @var array $abilities		The authencated user abilities   */

	/**
	 * Account constructor.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['form_validation', 'session', 'blade']);
		$this->load->helper(['url']);

		$this->user 		= $this->session->userdata('user');
		$this->permissions 	= $this->session->userdata('permissions');
		$this->abilities 	= $this->session->userdata('abilities');
	}

	/**
	 * Middleware class for the controller.
	 *
	 * @return array
	 */
	protected function middleware()
	{
		return ['auth'];
	}

	public function settings()
	{
		$data['user']  = Authencate::find($this->user['id']);
		$data['title'] = $data['user']->name . ' (' . $data['user']->username . ')';

		return $this->blade->render('auth/account', $data);
	}

	/**
	 * Update the account information in the database.
	 *
	 * @return Blade view | Redirect
	 */
	public function updateAccount()
	{
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('name', 'Naam', 'trim|required');
		$this->form_validation->set_rules('username', 'Gebruikersnaam', 'trim|required|is_unique[users.username');

		if ($this->form_validation->run() === false) {
			$data['user']  = Authencate::find($this->user['id']);
			$data['title'] = $data['user']->name . ' (' . $data['user']->username . ')';

			return $this->blade->render('auth/account', $data);
		}

		// No validation errors so move on out backend logic.
		$input['name']     = $this->input->post('name');
		$input['email']    = $this->input->post('email');
		$input['username'] = $this->input->post('password');

		if (Authencate::find($this->user['id'])->update($this->security->xss_clean($input))) {
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('message', 'Uw account gegevens zijn aangepast.');
		}

		return redirect($_SERVER['HTTP_REFERER']);
	}

	/**
	 * Update the user his password.
	 *
	 * @return Blade view|Redirect
	 */
	public function updateSecurity()
	{
		$this->form_validation->set_rules('password', 'Wachtwoord', 'trim|required|matches[password_confirmation]');
		$this->form_validation->set_rules('password_confirmation', 'bevestiging', 'trim|required');

		if ($this->form_validation->run() === false) {
			$data['user']  = Authencate::find($this->user['id']);
			$data['title'] = $this->user['name'] . '(' . $this->user['username'] . ')';

			return $this->blade->render('auth/account', $data);
		}

		// No validation errors Move on with our logic.
		$input['password'] = $this->input->post('password');

		if (Authencate::find($this->user['id'])->update($this->security->xss_clean($input))) {
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('message', 'Het wachtwoord van je account is gewijzigd.');
		}

		return redirect($_SERVER['HTTP_REFERER']);
	}
}

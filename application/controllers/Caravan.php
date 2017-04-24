<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class: Caravan
 */
class Caravan extends MY_Controller
{
	public $user        = []; /** @var array|mixed $user           The authencated user information session. */
	public $abilities   = []; /** @var array|mixed $abilities      The authencated user abilities session.   */
	public $permissions = []; /** @var array|mixed $permissions    The authencated user permission session.  */

	/**
	 * Caravan constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['session', 'blade']);
		$this->load->helper(['url']);

		$this->user         = $this->session->userdata('user');
		$this->permissions  = $this->session->userdata('permissions');
		$this->abilities    = $this->session->userdata('abilities');
	}

	/**
	 * Get the crowdfund index.
	 *
	 * @return blade view.
	 */
	public function index()
	{
		$data['title'] = 'Caravan';

		$relLinks      = Types::where('name', 'Link')->first();
		$data['links'] = Actions::where('type_id', $relLinks->id)->get();

		return $this->blade->render('Caravan', $data);
	}
}

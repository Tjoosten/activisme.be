<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @todo docblock
 */
class Welcome extends CI_Controller
{
	public $user        = []; /** TODO: docblock */
	public $permissions = []; /** TODO: docblock */
	public $abilities   = []; /** TODO: docblock */

	/**
	 * @todo docblock
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
	 * @todo docblock
	 */
	public function index()
	{
		// relation specifications.
		$relMailing       = Types::where('name', 'Mailing actie')->first();
		$relLinks         = Types::where('name', 'Link')->first();
		$relPetitions     = Types::where('name', 'Petitie')->first();
		$relCrowdfund 	  = Types::where('name', 'Crowdfund')->first();
		$relManifestation = Types::where('name', 'Manifestatie')->first();

		// Data variables;
		$data['title']          = 'Index';
		$data['mailingActions'] = Actions::where('type_id', $relMailing->id)->orderBy('end_date', 'ASC')->get();
		$data['links']			= Actions::where('type_id', $relLinks->id)->orderBy('end_date', 'ASC')->get();
		$data['petitions']		= Actions::where('type_id', $relPetitions->id)->orderBy('end_date', 'ASC')->get();
		$data['crowdfunds']     = Actions::where('type_id', $relCrowdfund->id)->orderBy('end_date', 'ASC')->get();
		$data['manifestations'] = Actions::where('type_id', $relManifestation->id)->orderBy('end_date', 'ASC')->get();

		return $this->blade->render('home', $data);
	}
}

<?php defined('BASEPATH') or exit('No direct script access allowed');

class Volunteer extends MY_controller
{
    public $user        = []; /** @var array $user         The authencated user information. */
    public $permissions = []; /** @var array $permissions  The authencated user permissions. */
    public $abilities   = []; /** @var array $abilities    The authencated user abilities    */

    /**
     * Volunteer constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'session', 'form_validation']);
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
	 */
    protected function middleware()
    {
        return ['auth|only:index,delete'];
    }

    public function index()
    {
        $data['title']      = 'Index';
        $data['volunteers'] = Vrijwilligers::with(['cities.province'])->get();
        $data['cities']     = City::all();

        return $this->blade->render('volunteers/index', $data);
    }

    /**
     * New volunteer index.
     *
     * @return Blade view
     */
    public function new()
    {
        $data['title']  = 'Word vrijwilliger.';
        $data['cities'] = City::all();
		$relLinks      = Types::where('name', 'Link')->first();
		$data['links'] = Actions::where('type_id', $relLinks->id)->get();

        return $this->blade->render('volunteers/new', $data);
    }

    /**
     * Store a new volunteer in the system.
     *
     * @return Redirect | Blade view.
     */
    public function store()
    {
        $this->form_validation->set_rules('name', 'Naam', 'trim|required');
        $this->form_validation->set_rules('email', 'Email adres', 'trim|required');
        $this->form_validation->set_rules('city_id', 'Stad', 'trim|required');

        if ($this->form_validation->run() === false) { // form validation fails.
            $data['title']  = 'Word vrijwilligers';
			$relLinks      = Types::where('name', 'Link')->first();
			$data['links'] = Actions::where('type_id', $relLinks->id)->get();
            return $this->blade->render('volunteers/new', $data);
        }

        // No validation errors found. Move on with the logic.
        $input['name']        = $this->input->post('name');
        $input['email']       = $this->input->post('email');
        $input['city_id']     = $this->input->post('city_id');
        // $input['information'] = $this->input->post('information');

        if (Vrijwilligers::create($this->security->xss_clean($input))) { // Record has been inserted.
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Wij danken je voor je intresse.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Delete a volunteer in the system.
     *
     * @return Blade view | Redirect
     */
    public function delete()
    {
        $paramId       = $this->uri->segment(3);
        $volunteer     = Vrijwilligers::find($this->security->xss_clean($paramId));
        $sessionOutput = $this->session;

        if ((int) count($volunteer) === 0) { // Volunteer is not found.
            $sessionOutput->set_flashdata('class', 'alert alert-danger');
            $sessionOutput->set_flashdata('message', 'Wij konden geen vrijwilliger vinden met de id:' . $paramId);
        } else { // Volunteer is found
            if ($volunteer->delete()) { // Volunteer is deleted.
                $sessionOutput->set_flashdata('class', 'alert alert-success');
                $sessionOutput->set_flashdata('message', 'De vrijwilliger is verwijderd in het systeem.');
            }
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}

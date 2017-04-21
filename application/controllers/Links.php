<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @todo docblock
 */
class Links extends MY_Controller
{
    public $user        = []; /** @var $user */
    public $permissions = []; /** */
    public $abilities   = []; /** */

    /**
     * Links constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'form_validation', 'session']);
        $this->load->helper(['url']);

        $this->user         = $this->session->userdata('user');
        $this->permissions  = $this->session->userdata('permissions');
        $this->abilities    = $this->session->userdata('abilities');
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

    /**
     * Store a new link in the system.
     *
     * @return Blade View|Redirect
     */
    public function insert()
    {
        $this->form_validation->set_rules('name', 'Naam link', 'trim|required');
        $this->form_validation->set_rules('link', 'Hyperlink', 'trim|required');
        $this->form_validation->set_rules('type_id', 'Type link', 'trim|required');

        if ($this->form_validation->run() === false) { // Validation fails.
            $data['title'] = 'Backend';
    		$data['links'] = Actions::all();
    		$data['types'] = Types::all();

    		return $this->blade->render('backend', $data);
        }

        // No validation errors found, move on with the controller logic.
        $input['name']      = $this->input->post('name');
        $input['link']      = $this->input->post('link');
        $input['author_id'] = $this->user['id'];
        $input['type_id']   = $this->input->post('type_id');

        if (Actions::create($this->security->xss_clean($input))) { // Row is inserted
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'De actie, crowdfund of manifestatie is toegevoegd.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function update()
    {

    }

    /**
     * Delete a link out off the system.
     *
     * @return response
     */
    public function delete()
    {
        $linkId        = $this->uri->segment(3);
        $link          = Actions::find($this->security->xss_clean($linkId));
        $sessionOutput = $this->session;

        if ((int) count($link) === 0) { // No record found.
            $sessionOutput->set_flashdata('class', 'alert alert-danger');
            $sessionOutput->set_flashdata('message', 'Er is geen link gevonden met de id ' . $linkId);
        } else { // Record is found.
            if ($link->delete()) { // Record has been deleted.
                $sessionOutput->set_flashdata('class', 'alert alert-success');
                $sessionOutput->set_flashdata('message', 'De actie, manifestie of crowdfund is ontkoppeld.');
            }
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}

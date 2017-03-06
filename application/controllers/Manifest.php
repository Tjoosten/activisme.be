<?php defined('BASEPATH') OR exit('No direct access allowed');

/**
 *
 *
 */
class Manifest extends MY_Controller
{
    public $user        = []; /** @var array $user         The authencated user information. */
    public $abilities   = []; /** @var array $abilities    The authencated user abilities. */
    public $permissions = []; /** @var array $permissions  The authencated user permissions. */

    /**
     * Manifest constructor
     *
     * @return int|void|null
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url']);
        $this->load->library(['form_validation', 'session']);

        $this->user        = $this->session->userdata('user');
        $this->permissions = $this->session->userdata('permissions');
        $this->abilities   = $this->session->userdata('abilities');
    }

    /**
     * Store a manifestation in the database.
     *
     * @see:url('POST', 'http://www.activisme.be/manifest/store')
     * @return redirect|response
     */
    public function store()
    {
        $this->form_validation->set_rules('name', 'Naam', 'trim|required');
        $this->form_validation->set_rules('web_address', 'Web adres', 'trim|required');

        if ($this->form_validation->run() === false) { // Validation >>> fails
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Wij konden de manifestatie niet toevoegen.');

            return redirect($_SERVER['HTTP_REFERER']);
        }

        // No validation errors so move on with the logic.
        $input['name']        = $this->input->post('name');
        $input['web_address'] = $this->input->post('web_address');

        if (Manifestation::create($this->security->xss_clean($input))) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'De manifestatie is toegevoegd.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function update()
    {
        $this->form_validation->set_rules();
        $this->form_validation->set_rules();
        
    }

    /**
     * Delete a manifestation out of the database.
     *
     * @see:url('GET|HEAD', 'http://www.activisme.be/manifest/delete/{manifestId}')
     * @return Response|Redirect
     */
    public function delete()
    {
        $manifestId = $this->security->xss_clean($this->uri->segment(3));

        if (Manifestation::find($manifestId)->delete()) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('De manifestatie is verwijderd');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}

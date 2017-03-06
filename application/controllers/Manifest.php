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

        $this->load->helper();
        $this->load->library();

        $this->user        = $this->session->userdata('user');
        $this->permissions = $this->session->userdata('permissions');
        $this->abilities   = $this->session->userdata('abilities');
    }

    public function store()
    {
        $this->form_validation->set_rules();
        $this->form_validation->set_rules();
    }
}

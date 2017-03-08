<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends MY_Controller
{
    public $user        = []; /** */
    public $abilities   = []; /** */
    public $permissions = []; /** */

    /**
     * Backend constructor.
     *
     * @return int|void|null
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(['url']);
        $this->load->library(['form_validation', 'blade', 'session']);

        $this->user        = $this->session->userdata('user');
        $this->abilities   = $this->session->userdata('abilities');
        $this->permissions = $this->session->userdata('permissions');
    }

    /**
     * Home index view.
     *
     * @see:url('GET|HEAD', 'http://www.activisme.be/backend')
     * @return blade view.
     */
    public function index()
    {
        $data['title'] = 'Home';
        return $this->blade->render('backend/index', $data);
    }
}

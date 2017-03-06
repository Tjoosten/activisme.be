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

        $this->load->helper();
        $this->load->library();

        $this->user        = $this->session->userdata('user');
        $this->abilities   = $this->session->userdata('abilities');
        $this->permissions = $this->session->userdata('permissions');
    }

    public function index()
    {
        $data['title'] = 'Home';
        return $this->blade->render('', $data);
    }
}

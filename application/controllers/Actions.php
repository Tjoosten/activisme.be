<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends MY_Controller
{
    public $user        = [];
    public $abilities   = [];
    public $permissions = [];

    public function __construct()
    {
        parent::__construct();

        $this->load->helper();
        $this->load->library();

        $this->user = $this->session->userdata();
        $this->abilities = $this->session->userdata();
        $this->permissions = $this->session->userdata();
    }

    public function store()
    {
        
    }
}

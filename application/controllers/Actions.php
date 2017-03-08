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

    /**
     * Return the list of middlewares you want to be applied,
     * Here is list of some valid options
     *
     * admin_auth                    // As used below, simplest, will be applied to all
     * someother|except:index,list   // This will be only applied to posts()
     * yet_another_one|only:index    // This will be only applied to index()
     *
     * @return array
     */
    protected function middleware()
    {
        return [];
    }

    public function store()
    {

    }
}

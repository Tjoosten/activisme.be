<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends MY_Controller
{
    public $user        = [];
    public $abilities   = [];
    public $permissions = [];

    public function __construct()
    {
        parent::__constrcut();
    }
}
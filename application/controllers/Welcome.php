<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Welcome controller. 
 */
class Welcome extends CI_Controller
{
    public $user        = []; /** @var array $user         The user information             */
    public $permissions = []; /** @var array $permissions  The authencated user permissions */
    public $abilities   = []; /** @var array $abilities    The authencated user abilities   */

    /**
     * Welcome constructor
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
     * The frontpage for the application.
     *
     * @see:url('GET|HEAD', 'http://www.activisme.be')
     * @return Blade view.
     */
	public function index()
	{
		$data['title'] = 'Index';
		$data['news']  = Article::take(4)->get();

		$this->load->view('index', $data);
	}
}

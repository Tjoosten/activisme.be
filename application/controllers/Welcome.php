<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$data['title'] = '';
		$data['news']  = Article::take(4)->get();


		$this->load->view('index', $data);
	}
}

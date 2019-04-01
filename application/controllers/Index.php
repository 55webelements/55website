<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		if($this->session->userdata("is_logged_in") != 1)
		{			
			redirect(base_url()."index.php/login");
		}
		else
		{
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('footer');
		}
	}
	
	
}

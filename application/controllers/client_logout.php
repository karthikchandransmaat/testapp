<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class client_logout extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
	}
	public function index()
	{
		
		$myuser_id = $this->session->userdata('client_id'); 
		$client_id = $myuser_id;
		$this->session->unset_userdata($client_id);
		$this->session->sess_destroy();
		$this->load->view('login');
	}
	
}

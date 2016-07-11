<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class client_dashboard extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
	
	}
	public function index()
	{
		 $clientid = $this->uri->segment(2); 
		 $userdata = array(
                   'client_id'  => $clientid,
               );
		$this->session->set_userdata($userdata);
		$myuser_id = $this->session->userdata('client_id');
		$this->db->truncate('fb');
		$this->load->view('client_dashboard');
	}
	
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL);
class testfile extends CI_Controller {
public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('form_validation', 'session');
			
	}

	public function index()
	{
		$this->db->select('*');		
		$this->db->from('client_registration');
		$query = $this->db->get();
		$result = $query->result_array(); 
		echo json_encode($result);
	}
	
}

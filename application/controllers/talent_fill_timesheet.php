<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class talent_fill_timesheet extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('event_model');
			$this->load->model('talent_model');
			$this->load->model('checkin_model');
			
	}
	public function index()
	{
		if(($_POST['event_id']) == "") {
			$event_id = $this->uri->segment(2);
		}
		else {
			$event_id = $_POST['event_id']; 
		}
		
		$myuser_id = $this->session->userdata('talent_id'); 
		if($myuser_id!="") {
			$my_event['myuser_id']= $myuser_id;	
			$my_event['event_detail']= $this->event_model->event_detail_talent($event_id);
			$my_event['checkin_detail']= $this->checkin_model->talent_checkout_details($event_id,$myuser_id);
			$this->load->view('talent_fill_timesheet',$my_event);
		}
		else {
			redirect('login');
		}
	}
	
}

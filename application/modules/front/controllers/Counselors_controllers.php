<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package Front/Shop
*/
class Counselors_controllers extends CI_Controller 
{
	private $num_rows = 20;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		$this->load->helper("layout_helper");
		$this->load->helper("common_helper");
		$this->load->model('front_model');
		$this->load->model('doctor_model');
		//////////////
	}
	public function index($page = 0)
	{
	    $data = array();
	    $data['counselors_list']=$this->doctor_model->getCounselorsList();
	   _frontLayout("counselor-mgmt/counselor-list",$data);
	}
	public function getCounselorsDetail()
	{
	    $data = array();
	    $CounselorsId=ID_decode($this->uri->segment(2));
	    $data['counselors_detail']=$this->doctor_model->getCounselorsDetail($CounselorsId);
	   _frontLayout("counselor-mgmt/counselors-details",$data);
	}

	public function AlternativeMedicine($page = 0)
	{
	    $data = array();
	    $data['altmed_list']=$this->doctor_model->getAltmedList();
	   _frontLayout("altmed-mgmt/altmed-list",$data);
	}

	public function AlternativeMedicineDetail()
	{
	    $data = array();
	    $altm_id=ID_decode($this->uri->segment(2));
	    $data['altmed_detail']=$this->doctor_model->getAltmedListDetail($altm_id);
	   _frontLayout("altmed-mgmt/altmed-details",$data);
	}
	
	function sendWelcomeEmailToGuest($password,$email)
	{

		$email_data['from']='info@codotbiz.com';
		$email_data['to']=$email;
		$email_data['subject']='Product Order';
		$email_data['password']=$password;
		$email_data['email']=$email;
		
		$email_data['email-template']='order-purchase-guest';
		_sendEmail($email_data);
	}
	
}//end class
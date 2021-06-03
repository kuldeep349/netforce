<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package Front/Shop
*/
class Property_management extends CI_Controller 
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
	    $result=$this->db->query("SELECT * from property_list")->result_array();
		 $data['property_list']=$result;
	   _frontLayout("property-mgmt/property",$data);
	}
	public function getPropertyDetail()
	{
	    $data = array();
	    $prop_id=ID_decode($this->uri->segment(2));
	    $data['property_detail']=$this->front_model->getPropertyDetail($prop_id);
	   _frontLayout("property-mgmt/property-details",$data);
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
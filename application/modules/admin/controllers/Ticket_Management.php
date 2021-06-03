<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/package
*/
class Ticket_Management extends Common_Controller 
{
	private $moduleName;
	private $controllerName;
	private $userId;
	private $role;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->model('eshop_model');
		$this->load->helper("layout_helper");
		$this->user_id=$this->session->userdata('user_id');
		$this->moduleName=$this->router->fetch_module();
		$this->controllerName=$this->router->fetch_class();
		$this->role='1';
		$this->load->helper('estore_helper');
	}//end constructor 
	public function viewTicket()
	{
		$data=array();
		$result=$this->db->query("SELECT usr.first_name,usr.last_name,usr.email,usr.contact_no,doc.doctor_name,tkt.ticket_id,time.available_time FROM `user_registration` AS usr INNER JOIN appointment_book AS tkt ON usr.id=tkt.user_id INNER JOIN austin_doctor AS doc ON doc.doctor_id=tkt.service_id INNER JOIN doctor_time AS time ON tkt.date_time_id=time.time_id WHERE 1")->result_array();
		$data['order_data']=$result;
		$data['module_name']=$this->moduleName;
		_adminLayout("doctor-management/doctor-mgmt/view-ticket",$data);
	}
	
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package user/order
*/
class Order extends Common_Controller 
{
	private $userId;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		user_auth();
		$this->userId=$this->session->userdata('user_id');
		$this->load->helper("layout_helper");
	} 
	public function index()
	{
		$all_details=$this->db->query("SELECT DISTINCT(product_id) from eshop_orders_details  where uploader_id='".$this->userId."'")->result_array();	 
		 
		$final_array=array();	
	
		foreach($all_details as $ab)
		{
			$tot_sum=$this->db->query("select sum(qty) as total_qty from eshop_orders_details where product_id='".$ab['product_id']."'")->row_array();
			 $final_array[$ab['product_id']]=$tot_sum['total_qty'];
		 
		}	
	  $data['total_data']=$final_array;
	  $data['title']='My Product Purchase List';
	 _userLayout("order-mgmt/order-list",$data);
	}
}//end class

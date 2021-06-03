<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package user/account
*/
class Booking extends Common_Controller 
{
	private $user_id;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->userId=$this->session->userdata('user_id');
		$this->load->helper("layout_helper");
		$this->load->model("booking_model");
	} 
	public function pendingBookingList()
	{
		$data=array();
		$data['booking_list']=$this->booking_model->gelAllPendingBookingList();
		_adminLayout('booking-mgmt/pending-booking-list',$data);
	}
	public function confirmBookingList()
	{
		$data=array();
		$data['booking_list']=$this->booking_model->gelAllConfirmBookingList();
		_adminLayout('booking-mgmt/confirm-booking-list',$data);
	}
	public function rejectedBookingList()
	{
		$data=array();
		$data['booking_list']=$this->booking_model->gelAllRejectedBookingList();
		_adminLayout('booking-mgmt/rejected-booking-list',$data);
	}
	public function getHourlyBookingDetails($booking_id=null)
	{
		//$booking_id='BHE169667';
		$booking_details=$this->booking_model->getHourlyBookingDetails($booking_id);
		//pr($booking_details);
		$combo_applied="No";
		if($booking_details->payment_method=='1' || $booking_details->payment_method=='1')
		{
			if(!empty($booking_details->combo_applied) && $booking_details->combo_applied=='1')//combo applied
			{
				$per_hour_price=$booking_details->combo_ewallet_hour_price;
				$combo_applied="yes";
			}
			else 
			{
				$per_hour_price=$booking_details->general_ewallet_hour_price;
			}
		}
		else 
		{
			if(!empty($booking_details->combo_applied) && $booking_details->combo_applied=='1')//combo applied
			{
				$per_hour_price=$booking_details->combo_bc_wallet_hour_price;
				$combo_applied="Yes";
			}
			else 
			{
				$per_hour_price=$booking_details->general_bc_wallet_hour_price;
			}
		}
		if($booking_details->payment_method=='1')
		{
			$payment_method='E-wallet';
		}
		else if($booking_details->payment_method=='2')
		{
			$payment_method='BC-wallet';
		}	
		else if($booking_details->payment_method=='3')
		{
			$payment_method='Bank-Wire';
		}
		if($booking_details->booking_type=='1')
		{
			$booking_type="Houly Booking";
		}
		else 
		{
			$booking_type="Day Wise";
		}
		$booking_details->booking_type=$booking_type;
		$booking_details->payment_method=$payment_method;
		$booking_details->combo_applied=$combo_applied;
		$booking_details->per_hour_price=$per_hour_price;		
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($booking_details));
		//pr($booking_details);
	}
	public function getDayWiseBookingDetails($booking_id=null)
	{
		//$booking_id='BHE822732';
		$booking_details=$this->booking_model->getDayWiseBookingDetails($booking_id);
		$combo_applied="No";
		//pr($booking_details);
		if($booking_details->payment_method=='1' || $booking_details->payment_method=='3')
		{
			if(!empty($booking_details->combo_applied) && $booking_details->combo_applied=='1')//combo applied
			{
				$per_day_price=$booking_details->combo_ewallet_day_price;
				$combo_applied="yes";
			}
			else 
			{
				$per_day_price=$booking_details->general_ewallet_day_price;
			}
		}
		else 
		{
			if(!empty($booking_details->combo_applied) && $booking_details->combo_applied=='1')//combo applied
			{
				$per_day_price=$booking_details->combo_bc_wallet_day_price;
				$combo_applied="Yes";
			}
			else 
			{
				$per_day_price=$booking_details->general_bc_wallet_day_price;
			}
		}
		if($booking_details->payment_method=='1')
		{
			$payment_method='E-wallet';
		}
		else if($booking_details->payment_method=='2')
		{
			$payment_method='BC-wallet';
		}	
		else if($booking_details->payment_method=='3')
		{
			$payment_method='Bank-Wire';
		}
		if($booking_details->booking_type=='1')
		{
			$booking_type="Houly Booking";
		}
		else 
		{
			$booking_type="Day Wise";
		}
		$booking_details->booking_type=$booking_type;
		$booking_details->payment_method=$payment_method;
		$booking_details->combo_applied=$combo_applied;
		$booking_details->per_day_price=$per_day_price;		
		//pr($booking_details);
		
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($booking_details));
		//pr($booking_details);
	}
	function approveBookingRequest($booking_id)
	{
       $booking_id=ID_decode($booking_id);
	   $this->db->update('booking',array('booking_status'=>'2'),array('booking_id'=>$booking_id));	
	   $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Thanks! Booking is approved successfully!</h5>');
	   redirect(site_url().'admin/booking/confirmBookingList');
	   exit;
	}
	function rejectBookingRequest($booking_id)
	{
       $booking_id=ID_decode($booking_id);
	   $this->db->update('booking',array('booking_status'=>'3'),array('booking_id'=>$booking_id));
	   $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Booking is rejected successfully!</h5>');
	   redirect(site_url().'admin/booking/rejectedBookingList');
	   exit;
	   
	}
}//end class

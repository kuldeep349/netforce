<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/BankWireMemberReport
*/
class BankWireMemberReport extends Common_Controller 
{
	private $userId;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->helper("layout_helper");
		$this->load->helper("commission_helper");
		$this->load->helper("registration_helper");
		$this->load->model("bank_wire_member_report_model",'member_model');
		$this->userId=$this->session->userdata('user_id');
	} 
	/*
	@Desc:It's Used to update Bank Wire details
	*/
	public function updateBankWireDetail()
	{
		if(!empty($this->input->post('btn')))
		{
			$name=$this->input->post('name');
			$account_no=$this->input->post('account_no');
			$bank_name=$this->input->post('bank_name');
			$branch_code=$this->input->post('branch_code');
			$this->db->update('bank_wired_detail',array('name'=>$name,'account_no'=>$account_no,'bank_name'=>$bank_name,'branch_code'=>$branch_code),array('id'=>1));
	    	$this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Bank wire detial is updated successfully!</h5>');
	    	redirect(site_url()."admin/BankWireMemberReport/bankWireDetail");
		}
		$data['details']=$this->member_model->getBankWireDetails();
		_adminLayout("bank-wire-member-mgmt/update-bank-wire-info",$data);
	}
	/*
	@Desc: It's used to view the bank wire details
	*/
	public function bankWireDetail()
	{
		$data['details']=$this->member_model->getBankWireDetails();
		_adminLayout("bank-wire-member-mgmt/bank-wire-info",$data);
	}
	/*
	@Desc: It's used to view the pending member
	*/
	public function pendingMember()
	{
		$data['title']='Pending Member';
		$data['all_pending_member']=$this->member_model->getPendingMember();
	
		_adminLayout("bank-wire-member-mgmt/pending-member",$data);
	}
	/*
	@Desc: It's used to view the approved member
	*/
	public function approvedMember()
	{
		$data['title']='Approved Member';
		$data['all_approved_member']=$this->member_model->getApprovedMember();
		_adminLayout("bank-wire-member-mgmt/approved-member",$data);
	}
	/*
	@Desc: It's used to view the cancelled member
	*/
	public function cancelledMember()
	{
		$data['title']='Cancelled Member';
		$data['all_cancelled_member']=$this->member_model->getCancelledMember();
		_adminLayout("bank-wire-member-mgmt/cancelled-member",$data);
	}
	/*
	@Desc:It's used to approve the member
	*/
	public function approveMember($row_id)
	{
		$id=ID_decode($row_id);
		bankWireUserRegistration($id);
		
		$this->db->update('bank_wired_user_registration',array('status'=>'1','action_date'=>date('Y-m-d H:i:s')),array('id'=>$id));
	    
	    $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Member is approved successfully!</h5>');
	    
		redirect(site_url()."admin/BankWireMemberReport/approvedMember");
	}
	/*
	@Desc:It's used to cancel the member
	*/
	public function cancelMember($row_id)
	{
		$id=ID_decode($row_id);
		$id=ID_decode($row_id);
		$this->db->update('bank_wired_user_registration',array('status'=>'2','action_date'=>date('Y-m-d H:i:s')),array('id'=>$id));
	    $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Member is cancelled successfully!</h5>');
	    redirect(site_url()."admin/BankWireMemberReport/cancelledMember");
	}
}//end class

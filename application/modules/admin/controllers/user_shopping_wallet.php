<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/user_shopping_wallet
*/
class User_Shopping_Wallet extends Common_Controller 
{
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->helper("layout_helper");
		$this->load->model("user_shopping_wallet_model");
		$this->load->model("account_model");
		$this->load->model('member_model');
	}//end constructor 
	public function userWalletBalance()
	{
		$data=array();
		$data['all_user_wallet_balance']=$this->user_shopping_wallet_model->getAllUserWalletBalance();

		_adminLayout("user-shopping-wallet-mgmt/user-wallet-balance",$data);
	}
	/*
    @Desc: It's accept ajax request to return or show user wallet balance
	*/
	public function getUserEwalletBalance($user_id)
	{
		$userinfo=$this->account_model->getUserDetails($user_id);
		if(!empty($userinfo) && count($userinfo)>0)
		{
		$current_balance=$this->user_shopping_wallet_model->getEwalletBalance($userinfo->user_id);
		//@Note: 'user'=>'1' denotes that user exists
		$this->output->set_content_type('application/json')->set_output(json_encode(array('user'=>'1','balance'=>$current_balance)));
		}
		else 
		{
		//@Note:'user'=>'0' denotes that user does not exists	
		 $this->output->set_content_type('application/json')->set_output(json_encode(array('user'=>'0')));	
		}
	}
	

	public function pendingDepositRequestList()
	{
		$data=array();
        $data['wallet_deposit_request']=$this->user_shopping_wallet_model->getAllPendingWalletDepositRequest();
		//pr($data['wallet_deposit_request']);
		_adminLayout("user-shopping-wallet-mgmt/pending-deposit-request",$data);
	}	
	public function approveDepositRequest($request_id)
	  {
	    $id=ID_decode($request_id);
	    $this->db->update(
	      'deposit_shopping_wallet_amount_request',
	      array('status'=>'1', 'response_date'=>date("Y-m-d H:i:s")),
	      array('id'=>$id)
	      );
	    $request=$this->db->select(array(
	      'd.id',
	      'd.amount as deposit_amount',
	      'w.amount as wallet_amount',
	      'w.user_id',
	      ))
	      ->from('deposit_shopping_wallet_amount_request as d')
	      ->join('shopping_e_wallet as w', 'w.user_id=d.user_id')
	      ->where('d.id', $id)
	      ->get()
	      ->row();
	    //pr($request);
	    $final_balance=$request->wallet_amount+$request->deposit_amount;
	    
	    $this->db->update("shopping_e_wallet",array('amount'=>$final_balance),array('user_id'=>$request->user_id));

	    $insert_data_credit_debit=array(
	            'transaction_no'=>generateUniqueTranNo(),
	            'user_id'=>$request->user_id,
	            'credit_amt'=>$request->deposit_amount,
	            'balance'=>$final_balance,
	            'receiver_id'=>$request->user_id,
	            'sender_id'=>COMP_USER_ID,
	            'receive_date'=>date('d-m-Y'),
	            'ttype'=>'Wallet Deposit Amount',
	            'TranDescription'=>'Wallet deposit amount is credit into member ewallet',
	            'deposit_id'=>$request->id,
	            'status'=>'1', ///it's indicate credit status
	            'reason'=>'15' //it's indicate deposit request credit
	    );//end credit debit data
	    $this->db->insert('shopping_credit_debit',$insert_data_credit_debit);
	    //echo $this->db->last_query();
	    $this->session->set_flashdata('flash_msg','<span class="text-semibold">Well done!</span> Deposit request is approved successfully');
	    redirect(site_url()."admin/user_shopping_wallet/approvedDepositRequestList");
	    exit;
	}  
	public function approvedDepositRequestList()
	{
		$data=array();
		$data['wallet_deposit_request']=$this->user_shopping_wallet_model->getAllApprovedWalletDepositRequest();
		_adminLayout("user-shopping-wallet-mgmt/approved-deposit-request",$data);
	}	
	public function cancelledDepositRequestList()
	{
		$data=array();
		$data['wallet_deposit_request']=$this->user_shopping_wallet_model->getAllCancelledWalletDepositRequest();
		_adminLayout("user-shopping-wallet-mgmt/cancelled-deposit-request",$data);
	}	
    public function cancelWalletDepositRequest($deposit_id)
    {
	    $id=ID_decode($deposit_id);
	    $this->db->update('deposit_shopping_wallet_amount_request', array('status'=>'2','response_date'=>date("Y-m-d H:i:s")), array('id'=>$id));
	    $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Pending wallet amount deposit request is cancelld!</h5>');
		$this->session->set_flashdata('flash_msg','<span class="text-semibold">Well done!</span> Deposit request is cancelled successfully');
		redirect(site_url()."admin/user_shopping_wallet/cancelledDepositRequestList");
		exit;
    }

}//end class
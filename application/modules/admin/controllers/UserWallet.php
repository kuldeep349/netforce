<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/UserWallet
*/
class UserWallet extends Common_Controller 
{
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->helper("layout_helper");
		$this->load->model("user_wallet_model");
		$this->load->model("account_model");
		$this->load->model('member_model');
	}//end constructor 
	public function userWalletBalance()
	{
		$data=array();
		$data['all_user_wallet_balance']=$this->user_wallet_model->getAllUserWalletBalance();

		_adminLayout("user-wallet-mgmt/user-wallet-balance",$data);
	}
	public function manageUserWallet()
	{
		$data=array();
		$admininfo=$this->account_model->getUserDetails(COMP_USER_ID);
		$data['admin_wallet_amount']=$this->user_wallet_model->getEwalletBalance(COMP_USER_ID);//it's sent on view file for js validation
		$data['transaction_password']=$admininfo->t_code;//it's sent on view file for js validation
		$data['all_active_members']=$this->member_model->getAllActiveMembers();
		_adminLayout("user-wallet-mgmt/manage-user-wallet",$data);
	}
	public function userWalletBalanceSearch()
	{
		$data=array();
		$data['all_active_members']=$this->member_model->getAllActiveMembers();
		_adminLayout("user-wallet-mgmt/user-wallet-balance-search",$data);
	}
	/*
    @Desc: It's accept ajax request to return or show user wallet balance
	*/
	public function getUserEwalletBalance($user_id)
	{
		$userinfo=$this->account_model->getUserDetails($user_id);
		if(!empty($userinfo) && count($userinfo)>0)
		{
		$current_balance=$this->user_wallet_model->getEwalletBalance($userinfo->user_id);
		//@Note: 'user'=>'1' denotes that user exists
		$this->output->set_content_type('application/json')->set_output(json_encode(array('user'=>'1','balance'=>$current_balance)));
		}
		else 
		{
		//@Note:'user'=>'0' denotes that user does not exists	
		 $this->output->set_content_type('application/json')->set_output(json_encode(array('user'=>'0')));	
		}
	}
	public function getUserEwalletBalanceType($user_id,$type)
	{
		$userinfo=$this->account_model->getUserDetails($user_id);
		if(!empty($userinfo) && count($userinfo)>0)
		{
		    $current_balance=$this->user_wallet_model->getEwalletBalanceType($userinfo->user_id,$type);
		    //@Note: 'user'=>'1' denotes that user exists
		    $this->output->set_content_type('application/json')->set_output(json_encode(array('user'=>'1','balance'=>$current_balance)));
		}
		else 
		{
		    //@Note:'user'=>'0' denotes that user does not exists	
		    $this->output->set_content_type('application/json')->set_output(json_encode(array('user'=>'0')));	
		}
	}
	/*
	@Desc: It's used to add fund to user wallet
	*/
	public function addFundToUserWallet()
	{
		if(!empty($this->input->post('btn')))
		{
			$username=$this->input->post('username');
			$userinfo=$this->account_model->getUserDetails($username);
			$user_id=$userinfo->user_id;
			$amount=$this->input->post('amount');
			$wallet_type=$this->input->post('wallet_type');
			$desciption=$this->input->post('desciption');
			$current_user_balance=$this->user_wallet_model->getEwalletBalanceType($user_id,$wallet_type);
			$current_admin_balance=$this->user_wallet_model->getEwalletBalance(COMP_USER_ID);
			$arrwallet=array('e'=>'Main','cash'=>'Cash','product'=>'Product','reward'=>'Reward');
			$walletname=$arrwallet[$wallet_type];
            /*
			'1'=>debit for pkg purchased, '2'=> debit for ewallet withdrawl, '3'=>debit for balance transfer, '4'=>'credit for balance transfer received', '5'=>credit for direct commission, '6'=>credit for binary commission, '7'=>credit for matching commission, '9'=>credit for unilevel commission, '10'=>credit for rank bonus update,'11'=>debit for fund transfer,'12'=> credit by fund transfer, '13'=>Debit Amount for Withdrawl wallet amount request, '14'=>withdrawal request cancel refund, '15'=>deposit request credit,'16'=>debit for Epin purchased from E-wallet,'17'=>Credit for add fund by admin, '18'=>Debit for deduct fund by admin,'19'=>fund transfer by admin to user,'20'=> fund add by admin to self,'21'=>Deduct user fund credit to admin
            */
			if($user_id==COMP_USER_ID)
			{
				$updated_admin_balance=$current_admin_balance+$amount;
				//@Wallet balance is updated
				$this->db->update("final_".$wallet_type."_wallet",array('amount'=>$updated_admin_balance),array('user_id'=>COMP_USER_ID));
                if($wallet_type=='e'){$wallet_type='';}
                else
                {
                    $wallet_type='_'.$wallet_type;
                }
				//@Reason 20 denote that fund add by admin to self
				$this->db->insert('credit_debit'.$wallet_type,array(
							    'transaction_no'=>generateUniqueTranNo(),
							    'user_id'=>COMP_USER_ID,
							    'credit_amt'=>$amount,
							    'debit_amt'=>0,
							    'balance'=>$updated_admin_balance,
							    'admin_charge'=>'0',
							    'receiver_id'=>COMP_USER_ID,
							    'sender_id'=>COMP_USER_ID,
							    'receive_date'=>date('d-m-Y'),
							    'ttype'=>'Fund add by admin to self',
							    'TranDescription'=>'Fund add by admin to self in '.$walletname,
							    'Cause'=>'Fund add by admin to self in '.$walletname,
							    'Remark'=>'Fund add by admin to self in '.$walletname,
							    'invoice_no'=>'',
							    'product_name'=>'',
							    'status'=>'1',
							    'ewallet_used_by'=>'',
							    'current_url'=>site_url(),
							    'reason'=>'20'
						        ));	
				$this->session->set_flashdata('flash_msg','<span class="text-semibold">Well done!</span> Amount Added Successfully in Admin Wallet');
			}
			else 
			{
				$updated_user_balance=$current_user_balance+$amount;
				//@Wallet balance is updated
				$this->db->update("final_".$wallet_type."_wallet",array('amount'=>$updated_user_balance),array('user_id'=>$user_id));
				//'17'=>Credit for add fund by admin
				/*
				Note: status field '0'=>debit,'1'=>credit
				*/
				
				if($wallet_type=='e'){$wallet_type='';}
                else
                {
                    $wallet_type='_'.$wallet_type;
                }
				$this->db->insert('credit_debit'.$wallet_type,array(
							    'transaction_no'=>generateUniqueTranNo(),
							    'user_id'=>$user_id,
							    'credit_amt'=>$amount,
							    'debit_amt'=>'0',
							    'balance'=>$updated_user_balance,
							    'admin_charge'=>'0',
							    'receiver_id'=>$user_id,
							    'sender_id'=>COMP_USER_ID,
							    'receive_date'=>date('d-m-Y'),
							    'ttype'=>'Fund add by admin',
							    'TranDescription'=>'Fund add by admin in wallet '.$walletname,
							    'Cause'=>'Fund add by admin in wallet '.$walletname,
							    'Remark'=>'Fund add by admin in wallet '.$walletname,
							    'invoice_no'=>'',
							    'product_name'=>'',
							    'status'=>'1',
							    'ewallet_used_by'=>'',
							    'current_url'=>site_url(),
							    'reason'=>'17'
						        ));
				$updated_admin_balance=$current_admin_balance-$amount;
				//@Wallet balance is updated
				$this->db->update("final_e_wallet",array('amount'=>$updated_admin_balance),array('user_id'=>COMP_USER_ID));

				    //@Reason 19 denote that fund transfer by admin to user
				    $this->db->insert('credit_debit',array(
							    'transaction_no'=>generateUniqueTranNo(),
							    'user_id'=>COMP_USER_ID,
							    'credit_amt'=>0,
							    'debit_amt'=>$amount,
							    'balance'=>$updated_admin_balance,
							    'admin_charge'=>'0',
							    'receiver_id'=>$user_id,
							    'sender_id'=>COMP_USER_ID,
							    'receive_date'=>date('d-m-Y'),
							    'ttype'=>'Fund Transfer by admin',
							    'TranDescription'=>'Fund add by admin in wallet '.$walletname,
							    'Cause'=>'Fund add by admin in wallet '.$walletname,
							    'Remark'=>'Fund add by admin in wallet '.$walletname,
							    'invoice_no'=>'',
							    'product_name'=>'',
							    'status'=>'0',
							    'ewallet_used_by'=>'',
							    'current_url'=>site_url(),
							    'reason'=>'19'
						        ));	
				$this->session->set_flashdata('flash_msg','<span class="text-semibold">Well done!</span> Amount Added Successfully in User Wallet');		        
			}
			redirect(site_url() . "admin/UserWallet/manageUserWallet");
			exit;

		}//end isset if
	}//end method
	/*
	@Desc: It's used to deduct fund from user wallet
	*/
	public function deductFundFromUserWallet()
	{
		if(!empty($this->input->post('btn')))
		{
			$username=$this->input->post('username');
			$userinfo=$this->account_model->getUserDetails($username);
			$user_id=$userinfo->user_id;
			$amount=$this->input->post('amount');
            $wallet_type=$this->input->post('wallet_type');
			$desciption=$this->input->post('desciption');
			$current_user_balance=$this->user_wallet_model->getEwalletBalanceType($user_id,$wallet_type);
			$updated_user_balance=$current_user_balance-$amount;
			
			$arrwallet=array('e'=>'Main','cash'=>'Cash','product'=>'Product','reward'=>'Reward');
			$walletname=$arrwallet[$wallet_type];
			
			//@Wallet balance is updated
			$this->db->update("final_".$wallet_type."_wallet",array('amount'=>$updated_user_balance),array('user_id'=>$user_id));

			//'18'=>Debit for deduct fund by admin
			/*
			Note: status field '0'=>debit,'1'=>credit
			*/
			if($wallet_type=='e'){$wallet_type='';}
                else
                {
                    $wallet_type='_'.$wallet_type;
                }
			$this->db->insert('credit_debit'.$wallet_type,array(
						    'transaction_no'=>generateUniqueTranNo(),
						    'user_id'=>$user_id,
						    'credit_amt'=>0,
						    'debit_amt'=>$amount,
						    'balance'=>$updated_user_balance,
						    'admin_charge'=>'0',
						    'receiver_id'=>COMP_USER_ID,
						    'sender_id'=>$user_id,
						    'receive_date'=>date('d-m-Y'),
						    'ttype'=>'Fund deduct by admin from wallet '.$walletname,
						    'TranDescription'=>'Fund deduct by admin from wallet '.$walletname,
						    'Cause'=>'Fund deduct by admin from wallet '.$walletname,
						    'Remark'=>'Fund deduct by admin from wallet '.$walletname,
						    'invoice_no'=>'',
						    'product_name'=>'',
						    'status'=>'0',
						    'ewallet_used_by'=>'',
						    'current_url'=>site_url(),
						    'reason'=>'18'
					        ));

			$current_admin_balance=$this->user_wallet_model->getEwalletBalance(COMP_USER_ID);
			$updated_admin_balance=$current_admin_balance+$amount;
			//@Wallet balance is updated
			$this->db->update("final_e_wallet",array('amount'=>$updated_admin_balance),array('user_id'=>COMP_USER_ID));
			/*
			Note: status field '0'=>debit,'1'=>credit
			//@Reason 21 denote that Deduct user fund credit to admin
			*/
			$this->db->insert('credit_debit',array(
						    'transaction_no'=>generateUniqueTranNo(),
						    'user_id'=>COMP_USER_ID,
						    'credit_amt'=>$amount,
						    'debit_amt'=>0,
						    'balance'=>$updated_admin_balance,
						    'admin_charge'=>'0',
						    'receiver_id'=>COMP_USER_ID,
						    'sender_id'=>$user_id,
						    'receive_date'=>date('d-m-Y'),
						    'ttype'=>'Deduct user fund from wallet '.$walletname.' credit to admin',
						    'TranDescription'=>'Deduct user fund from wallet '.$walletname.' credit to admin',
						    'Cause'=>'Deduct user fund from wallet '.$walletname.' credit to admin',
						    'Remark'=>'Deduct user fund from wallet '.$walletname.' credit to admin',
						    'invoice_no'=>'',
						    'product_name'=>'',
						    'status'=>'1',
						    'ewallet_used_by'=>'',
						    'current_url'=>site_url(),
						    'reason'=>'21'
					        ));
			$this->session->set_flashdata('flash_msg','<span class="text-semibold">Well done!</span> Amount Deduct Successfully in User Wallet');
			redirect(site_url() . "admin/UserWallet/manageUserWallet");
			exit;
		}
	}
	public function pendingDepositRequestList()
	{
		$data=array();
        $data['wallet_deposit_request']=$this->user_wallet_model->getAllPendingWalletDepositRequest();
		//pr($data['wallet_deposit_request']);
		_adminLayout("user-wallet-mgmt/pending-deposit-request",$data);
	}	
	public function approveDepositRequest($request_id)
	  {
	    $id=ID_decode($request_id);
	    $this->db->update(
	      'deposit_wallet_amount_request',
	      array('status'=>'1', 'response_date'=>date("Y-m-d H:i:s")),
	      array('id'=>$id)
	      );
	    $request=$this->db->select(array(
	      'd.id',
	      'd.amount as deposit_amount',
	      'w.amount as wallet_amount',
	      'w.user_id',
	      ))
	      ->from('deposit_wallet_amount_request as d')
	      ->join('final_e_wallet as w', 'w.user_id=d.user_id')
	      ->where('d.id', $id)
	      ->get()
	      ->row();
	    //pr($request);
	    $final_balance=$request->wallet_amount+$request->deposit_amount;
	    
	    $this->db->update("final_e_wallet",array('amount'=>$final_balance),array('user_id'=>$request->user_id));

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
	    $this->db->insert('credit_debit',$insert_data_credit_debit);
	    //echo $this->db->last_query();
	    $this->session->set_flashdata('flash_msg','<span class="text-semibold">Well done!</span> Deposit request is approved successfully');
	    redirect(site_url()."admin/UserWallet/approvedDepositRequestList");
	    exit;
	}  
	public function approvedDepositRequestList()
	{
		$data=array();
		$data['wallet_deposit_request']=$this->user_wallet_model->getAllApprovedWalletDepositRequest();
		_adminLayout("user-wallet-mgmt/approved-deposit-request",$data);
	}	
	public function cancelledDepositRequestList()
	{
		$data=array();
		$data['wallet_deposit_request']=$this->user_wallet_model->getAllCancelledWalletDepositRequest();
		_adminLayout("user-wallet-mgmt/cancelled-deposit-request",$data);
	}	
    public function cancelWalletDepositRequest($deposit_id)
    {
	    $id=ID_decode($deposit_id);
	    $this->db->update('deposit_wallet_amount_request', array('status'=>'2','response_date'=>date("Y-m-d H:i:s")), array('id'=>$id));
	    $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Pending wallet amount deposit request is cancelld!</h5>');
		$this->session->set_flashdata('flash_msg','<span class="text-semibold">Well done!</span> Deposit request is cancelled successfully');
		redirect(site_url()."admin/UserWallet/cancelledDepositRequestList");
		exit;
    }
	public function OtherDepositRequestList()
	{
		$data=array();
		$data['other_deposit_request']=$this->user_wallet_model->OtherWalletRequests();
		_adminLayout("user-wallet-mgmt/other-pending-deposit-request",$data);
	}
}//end class
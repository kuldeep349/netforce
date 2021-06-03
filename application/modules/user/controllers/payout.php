<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package user/payout
*/
class Payout extends Common_Controller 
{
	private $userId;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		user_auth();
		$this->load->helper("layout_helper");
		$this->userId=$this->session->userdata('user_id');
		$this->load->model('ewallet_model');
		$this->load->model('payout_model');
	} 
	public function withdrawBalanceC()
    {
        $current_cash_balance = $this->ewallet_model->getCashBalance($this->userId,'final_cash_wallet');
        if (!empty($this->input->post('btn1'))) {
            $request_amount = $this->input->post("request_amount");
			
			$amount_info=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$this->userId)->get()->row();
			$result1 = $this->db->query("select * from user_registration where user_id='" . $this->userId . "'")->result_array();
			$current_balance = $this->ewallet_model->getEwalletBalance($this->userId);
			$final_balance = $current_balance + $request_amount;
            $final_cash_balance = $current_cash_balance - $request_amount;

			if(empty($request_amount)){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter request amount!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawBalanceC");                
				exit();
			}
if($request_amount>$current_cash_balance){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Yu have not sufficient fund in wallet!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawBalanceC");                
				exit();
			}
			        $this->db->update('final_cash_wallet', array(
						'amount' => $final_cash_balance
					), array(
						'user_id' => $this->userId
					));
					
					$insert_data_credit_debit = array(
						'transaction_no' => generateUniqueTranNo(),
						'user_id' => $this->userId,
						'debit_amt' => $request_amount,
						'balance' => $final_cash_balance,
						'receiver_id' => $this->userId,
						'sender_id' => $this->userId,
						'receive_date' => date('d-m-Y'),
						'ttype' => 'Withdrawal Request amount',
						'TranDescription' => 'Withdrawal Request amount deduction',
						'status' => '0', ///it's indicate debit status
						'reason' => '13' //Debit Amount for Withdrawal wallet amount request
					);
					$this->db->insert('credit_debit_cash',$insert_data_credit_debit);

					
					$this->db->update('final_e_wallet', array(
						'amount' => $final_balance
					), array(
						'user_id' => $this->userId
					));
					
					$insert_data_credit_debit = array(
						'transaction_no' => generateUniqueTranNo(),
						'user_id' => $this->userId,
						'credit_amt' => $request_amount,
						'balance' => $final_balance,
						'receiver_id' => $this->userId,
						'sender_id' => $this->userId,
						'receive_date' => date('d-m-Y'),
						'ttype' => 'Withdrawal Cash amount',
						'TranDescription' => 'Withdrawal Cash amount',
						'status' => '1', ///it's indicate debit status
						'reason' => '13' //Debit Amount for Withdrawal wallet amount request
					);
					$this->db->insert('credit_debit',$insert_data_credit_debit);
					
					$this->session->set_flashdata("flash_msg", '<h5 class="panel-title">Your withdrawl  processed successfully!
					</h5>'); 
					redirect(site_url() . "user/payout/withdrawBalanceC");                
					exit();
			

			
        } //end submit if here
        $data['title']           = 'Transfer Cash';
        $data['current_balance'] = $current_cash_balance;
        _userLayout("payout-mgmt/withdrawl-cash-fund", $data);
    }
    public function withdrawBalanceR()
    {
        $current_cash_balance = $this->ewallet_model->getCashBalance($this->userId,'final_referral_wallet');
        if (!empty($this->input->post('btn1'))) {
            $request_amount = $this->input->post("request_amount");
			
			$amount_info=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$this->userId)->get()->row();
			$result1 = $this->db->query("select * from user_registration where user_id='" . $this->userId . "'")->result_array();
			$current_balance = $this->ewallet_model->getEwalletBalance($this->userId);
			$final_balance = $current_balance + $request_amount;
            $final_cash_balance = $current_cash_balance - $request_amount;

			if(empty($request_amount)){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter request amount!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawBalanceR");                
				exit();
			}
if($request_amount>$current_cash_balance){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Yu have not sufficient fund in wallet!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawBalanceR");                
				exit();
			}
			        $this->db->update('final_referral_wallet', array(
						'amount' => $final_cash_balance
					), array(
						'user_id' => $this->userId
					));
					
					$insert_data_credit_debit = array(
						'transaction_no' => generateUniqueTranNo(),
						'user_id' => $this->userId,
						'debit_amt' => $request_amount,
						'balance' => $final_cash_balance,
						'receiver_id' => $this->userId,
						'sender_id' => $this->userId,
						'receive_date' => date('d-m-Y'),
						'ttype' => 'Withdrawal Request amount',
						'TranDescription' => 'Withdrawal Request amount deduction',
						'status' => '0', ///it's indicate debit status
						'reason' => '13' //Debit Amount for Withdrawal wallet amount request
					);
					$this->db->insert('credit_debit_referral',$insert_data_credit_debit);

					
					$this->db->update('final_e_wallet', array(
						'amount' => $final_balance
					), array(
						'user_id' => $this->userId
					));
					
					$insert_data_credit_debit = array(
						'transaction_no' => generateUniqueTranNo(),
						'user_id' => $this->userId,
						'credit_amt' => $request_amount,
						'balance' => $final_balance,
						'receiver_id' => $this->userId,
						'sender_id' => $this->userId,
						'receive_date' => date('d-m-Y'),
						'ttype' => 'Withdrawal Cash amount',
						'TranDescription' => 'Withdrawal Cash amount',
						'status' => '1', ///it's indicate debit status
						'reason' => '13' //Debit Amount for Withdrawal wallet amount request
					);
					$this->db->insert('credit_debit',$insert_data_credit_debit);
					
					$this->session->set_flashdata("flash_msg", '<h5 class="panel-title">Your withdrawl  processed successfully!
					</h5>'); 
					redirect(site_url() . "user/payout/withdrawBalanceR");                
					exit();
			

			
        } //end submit if here
        $data['title']           = 'Transfer Referral Bonus';
        $data['current_balance'] = $current_cash_balance;
        _userLayout("payout-mgmt/withdrawl-referral-fund", $data);
    }
    public function withdrawBalanceMS()
    {
        $current_cash_balance =$this->ewallet_model->getEwalletBalance($this->userId);
        if (!empty($this->input->post('btn1'))) {
            $request_amount = $this->input->post("request_amount");
			
			$amount_info=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$this->userId)->get()->row();
			$result1 = $this->db->query("select * from user_registration where user_id='" . $this->userId . "'")->result_array();
			$current_balance =  $this->ewallet_model->getCashBalance($this->userId,'final_product_wallet');
			$final_balance = $current_balance + $request_amount;
            $final_cash_balance = $current_cash_balance - $request_amount;

			if(empty($request_amount)){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter request amount!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawBalanceMS");                
				exit();
			}
if($request_amount>$current_cash_balance){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">You have not sufficient fund in wallet!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawBalanceMS");                
				exit();
			}
			        $this->db->update('final_e_wallet', array(
						'amount' => $final_cash_balance
					), array(
						'user_id' => $this->userId
					));
					
					$insert_data_credit_debit = array(
						'transaction_no' => generateUniqueTranNo(),
						'user_id' => $this->userId,
						'debit_amt' => $request_amount,
						'balance' => $final_cash_balance,
						'receiver_id' => $this->userId,
						'sender_id' => $this->userId,
						'receive_date' => date('d-m-Y'),
						'ttype' => 'Withdrawal Request amount',
						'TranDescription' => 'Withdrawal Request amount deduction',
						'status' => '0', ///it's indicate debit status
						'reason' => '13' //Debit Amount for Withdrawal wallet amount request
					);
					$this->db->insert('credit_debit',$insert_data_credit_debit);

					
					$this->db->update('final_product_wallet', array(
						'amount' => $final_balance
					), array(
						'user_id' => $this->userId
					));
					
					$insert_data_credit_debit = array(
						'transaction_no' => generateUniqueTranNo(),
						'user_id' => $this->userId,
						'credit_amt' => $request_amount,
						'balance' => $final_balance,
						'receiver_id' => $this->userId,
						'sender_id' => $this->userId,
						'receive_date' => date('d-m-Y'),
						'ttype' => 'Withdrawal Main Wallet amount',
						'TranDescription' => 'Withdrawal Main Wallet amount',
						'status' => '1', ///it's indicate debit status
						'reason' => '13' //Debit Amount for Withdrawal wallet amount request
					);
					$this->db->insert('credit_debit_product',$insert_data_credit_debit);
					
					$this->session->set_flashdata("flash_msg", '<h5 class="panel-title">Your withdrawl  processed successfully!
					</h5>'); 
					redirect(site_url() . "user/payout/withdrawBalanceMS");                
					exit();
			

			
        } //end submit if here
        $data['title']           = 'Main To Product Wallet Transfer';
        $data['current_balance'] = $current_cash_balance;
        _userLayout("payout-mgmt/withdrawl-mainsaving-fund", $data);
    }
    public function withdrawBalanceRE()
    {
        $current_cash_balance = $this->ewallet_model->getCashBalance($this->userId,'final_repurchase_wallet');
        if (!empty($this->input->post('btn1'))) {
            $request_amount = $this->input->post("request_amount");
			
			$amount_info=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$this->userId)->get()->row();
			$result1 = $this->db->query("select * from user_registration where user_id='" . $this->userId . "'")->result_array();
			$current_balance = $this->ewallet_model->getEwalletBalance($this->userId);
			$final_balance = $current_balance + $request_amount;
            $final_cash_balance = $current_cash_balance - $request_amount;

			if(empty($request_amount)){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter request amount!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawBalanceRE");                
				exit();
			}
if($request_amount>$current_cash_balance){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Yu have not sufficient fund in wallet!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawBalanceRE");                
				exit();
			}
			        $this->db->update('final_repurchase_wallet', array(
						'amount' => $final_cash_balance
					), array(
						'user_id' => $this->userId
					));
					
					$insert_data_credit_debit = array(
						'transaction_no' => generateUniqueTranNo(),
						'user_id' => $this->userId,
						'debit_amt' => $request_amount,
						'balance' => $final_cash_balance,
						'receiver_id' => $this->userId,
						'sender_id' => $this->userId,
						'receive_date' => date('d-m-Y'),
						'ttype' => 'Withdrawal Request amount',
						'TranDescription' => 'Withdrawal Request amount deduction',
						'status' => '0', ///it's indicate debit status
						'reason' => '13' //Debit Amount for Withdrawal wallet amount request
					);
					$this->db->insert('credit_debit_repurchase',$insert_data_credit_debit);

					
					$this->db->update('final_e_wallet', array(
						'amount' => $final_balance
					), array(
						'user_id' => $this->userId
					));
					
					$insert_data_credit_debit = array(
						'transaction_no' => generateUniqueTranNo(),
						'user_id' => $this->userId,
						'credit_amt' => $request_amount,
						'balance' => $final_balance,
						'receiver_id' => $this->userId,
						'sender_id' => $this->userId,
						'receive_date' => date('d-m-Y'),
						'ttype' => 'Withdrawal Cash amount',
						'TranDescription' => 'Withdrawal Cash amount',
						'status' => '1', ///it's indicate debit status
						'reason' => '13' //Debit Amount for Withdrawal wallet amount request
					);
					$this->db->insert('credit_debit',$insert_data_credit_debit);
					
					$this->session->set_flashdata("flash_msg", '<h5 class="panel-title">Your withdrawl  processed successfully!
					</h5>'); 
					redirect(site_url() . "user/payout/withdrawBalanceRE");                
					exit();
			

			
        } //end submit if here
        $data['title']           = 'Transfer Repurchase Bonus';
        $data['current_balance'] = $current_cash_balance;
        _userLayout("payout-mgmt/withdrawl-repurchase-fund", $data);
    }
    public function withdrawBalanceB()
    {
        $current_cash_balance = $this->ewallet_model->getCashBalance($this->userId,'final_promo_wallet');
        if (!empty($this->input->post('btn1'))) 
        {
            $request_amount = $this->input->post("request_amount");
			
			$amount_info=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$this->userId)->get()->row();
			$result1 = $this->db->query("select * from user_registration where user_id='" . $this->userId . "'")->result_array();
			$current_balance = $this->ewallet_model->getEwalletBalance($this->userId);
			$final_balance = $current_balance + $request_amount;
            $final_cash_balance = $current_cash_balance - $request_amount;

			if(empty($request_amount))
			{
				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter request amount!</h5>'); 
				redirect(site_url() . "user/payout/withdrawBalanceB");                
				exit();
			}
            if($request_amount>$current_cash_balance)
            {
				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Yu have not sufficient fund in wallet!</h5>'); 
				redirect(site_url() . "user/payout/withdrawBalanceB");                
				exit();
			}
	        $this->db->update('final_promo_wallet', array(
				'amount' => $final_cash_balance
			), array(
				'user_id' => $this->userId
			));
			
			$insert_data_credit_debit = array(
				'transaction_no' => generateUniqueTranNo(),
				'user_id' => $this->userId,
				'debit_amt' => $request_amount,
				'balance' => $final_cash_balance,
				'receiver_id' => $this->userId,
				'sender_id' => $this->userId,
				'receive_date' => date('d-m-Y'),
				'ttype' => 'Withdrawal Request amount',
				'TranDescription' => 'Withdrawal Request amount deduction',
				'status' => '0', ///it's indicate debit status
				'reason' => '13' //Debit Amount for Withdrawal wallet amount request
			);
			$this->db->insert('credit_debit_promo',$insert_data_credit_debit);

			
			$this->db->update('final_e_wallet', array(
				'amount' => $final_balance
			), array(
				'user_id' => $this->userId
			));
			
			$insert_data_credit_debit = array(
				'transaction_no' => generateUniqueTranNo(),
				'user_id' => $this->userId,
				'credit_amt' => $request_amount,
				'balance' => $final_balance,
				'receiver_id' => $this->userId,
				'sender_id' => $this->userId,
				'receive_date' => date('d-m-Y'),
				'ttype' => 'Withdrawal Cash amount',
				'TranDescription' => 'Withdrawal Cash amount',
				'status' => '1', ///it's indicate debit status
				'reason' => '13' //Debit Amount for Withdrawal wallet amount request
			);
			$this->db->insert('credit_debit',$insert_data_credit_debit);
			
			$this->session->set_flashdata("flash_msg", '<h5 class="panel-title">Your withdrawl  processed successfully!</h5>'); 
			redirect(site_url() . "user/payout/withdrawBalanceB");                
			exit();
        } //end submit if here
        $data['title']  = 'Transfer Bonus Bonus';
        $data['current_balance'] = $current_cash_balance;
        _userLayout("payout-mgmt/withdrawl-bonus-fund", $data);
    }
    public function withdrawBalanceS()
    {
        $current_cash_balance = $this->ewallet_model->getCashBalance($this->userId,'final_saving_wallet');
        if (!empty($this->input->post('btn1'))) {
            $request_amount = $this->input->post("request_amount");
			
			$amount_info=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$this->userId)->get()->row();
			$result1 = $this->db->query("select * from user_registration where user_id='" . $this->userId . "'")->result_array();
			$current_balance = $this->ewallet_model->getEwalletBalance($this->userId);
			$final_balance = $current_balance + $request_amount;
            $final_cash_balance = $current_cash_balance - $request_amount;

			if(empty($request_amount)){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter request amount!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawBalanceS");                
				exit();
			}
if($request_amount>$current_cash_balance){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Yu have not sufficient fund in wallet!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawBalanceS");                
				exit();
			}
			        $this->db->update('final_saving_wallet', array(
						'amount' => $final_cash_balance
					), array(
						'user_id' => $this->userId
					));
					
					$insert_data_credit_debit = array(
						'transaction_no' => generateUniqueTranNo(),
						'user_id' => $this->userId,
						'debit_amt' => $request_amount,
						'balance' => $final_cash_balance,
						'receiver_id' => $this->userId,
						'sender_id' => $this->userId,
						'receive_date' => date('d-m-Y'),
						'ttype' => 'Withdrawal Request amount',
						'TranDescription' => 'Withdrawal Request amount deduction',
						'status' => '0', ///it's indicate debit status
						'reason' => '13' //Debit Amount for Withdrawal wallet amount request
					);
					$this->db->insert('credit_debit_saving',$insert_data_credit_debit);

					
					$this->db->update('final_e_wallet', array(
						'amount' => $final_balance
					), array(
						'user_id' => $this->userId
					));
					
					$insert_data_credit_debit = array(
						'transaction_no' => generateUniqueTranNo(),
						'user_id' => $this->userId,
						'credit_amt' => $request_amount,
						'balance' => $final_balance,
						'receiver_id' => $this->userId,
						'sender_id' => $this->userId,
						'receive_date' => date('d-m-Y'),
						'ttype' => 'Withdrawal Shopping amount',
						'TranDescription' => 'Withdrawal Shopping amount',
						'status' => '1', ///it's indicate debit status
						'reason' => '13' //Debit Amount for Withdrawal wallet amount request
					);
					$this->db->insert('credit_debit',$insert_data_credit_debit);
					
					$this->session->set_flashdata("flash_msg", '<h5 class="panel-title">Your withdrawl  processed successfully!
					</h5>'); 
					redirect(site_url() . "user/payout/withdrawBalanceS");                
					exit();
			

			
        } //end submit if here
        $data['title']           = 'Transfer Shopping';
        $data['current_balance'] = $current_cash_balance;
        _userLayout("payout-mgmt/withdrawl-saving-fund", $data);
    }
	/*
	@Desc: It's used to generate unique withdrawl request id
	*/
	public function generateUniqueWithdrawlRequestId()
	{
	    $random_number="M".mt_rand(100000, 999999);
	    if($this->db->select('request_id')->from('withdrawl_wallet_amount_request')->where('request_id',$random_number)->get()->num_rows()>0)
	    {
	      $this->generateUniqueWithdrawlRequestId();
	    }
	    return $random_number;
	}
	/*
	@Desc:Validation method
	*/
	public function check_valid_tran_password($password)
	{
		if(empty($password))
		{
		$this->form_validation->set_message('check_valid_tran_password','Please enter Transaction Password!');
		  return false;
		}
		else 
		{
			$query=$this->db->query("SELECT * FROM (`user_registration`) WHERE (`user_id` = '$this->userId') AND `t_code` = '$password'");
			if($query->num_rows()<1)
			{
			    $this->form_validation->set_message('check_valid_tran_password','Please enter valid Transaction Password!');
			    return false;
			}
		}
		return true;
	}//end method
	public function check_valid_request_amount($amount)
	{
	  if(empty($amount))
	  {
		$this->form_validation->set_message('check_valid_amount','Please enter amount!');
		  return false;
	  }
	  else 
	  {
	  	$user=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$this->userId)->get()->row();
	  	$exist_amount=$user->amount;
	  	if($amount>$exist_amount)
	  	{
		  $this->form_validation->set_message('check_valid_amount',"Sorry you don't have sufficent balance into your ewallet");
			  return false;
        return false;
	  	}
	  }
	  return true;
	}//end method

	/*
	@Desc: It's used to Withdrawl Fund from Ewallet
	*/
	/*public function ajaxWidthdrawFund(){

		if($this->input->is_ajax_request()){

			$request_title  = $this->input->post('request_title');
            $request_amount = $this->input->post("request_amount");
			$payout_method  = $this->input->post("payout_method");
			$tran_password  = $this->input->post("tran_password");
			
			$amount_info=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$this->userId)->get()->row();
			$result1 = $this->db->query("select * from user_registration where user_id='" . $this->userId . "'")->result_array();
			$current_balance = $this->ewallet_model->getEwalletBalance($this->userId);
			$final_balance = $current_balance - $request_amount;

			
			if(empty($request_title)){
				$result=array('status'=>'0','message'=>'Please enter title!');
				return $this->output->set_content_type('application/json')->set_output(json_encode($result));
			}

			if(empty($request_amount)){

				$result=array('status'=>'0','message'=>'Please enter request amount!');
				return $this->output->set_content_type('application/json')->set_output(json_encode($result));
			}

			if(empty($payout_method)){

				$result=array('status'=>'0','message'=>'Please choose payment method!');
				return $this->output->set_content_type('application/json')->set_output(json_encode($result));
			}else {
				
				if ($result1[0]['bank_name'] == '' || $result1[0]['branch_name'] == '' || $result1[0]['account_holder_name'] == '' || $result1[0]['account_no'] == '') {

					$result=array('status'=>'0','message'=>'Please fill your bank detail  in profile section!');
					return $this->output->set_content_type('application/json')->set_output(json_encode($result));
				}
			}

			if(30 > $final_balance){				

				$result=array('status'=>'0','message'=>'R30 must be in account as maintenance fee and minimum deposit!');
				return $this->output->set_content_type('application/json')->set_output(json_encode($result));
			}

			if(empty($tran_password)){

				$result=array('status'=>'0','message'=>'please enter transaction password!');
				return $this->output->set_content_type('application/json')->set_output(json_encode($result));
			}else {

				$query=$this->db->query("SELECT t_code FROM (`user_registration`) WHERE (`user_id` = '$this->userId') AND `t_code` = '$tran_password'");
				
				$checkPassword = $query->num_rows();

				if(empty($checkPassword)){

					$result=array('status'=>'0','message'=>'Transaction password is invalid!');
					return $this->output->set_content_type('application/json')->set_output(json_encode($result));

				} else {

					$this->db->insert('withdrawl_wallet_amount_request', array(
						'request_id' => $this->generateUniqueWithdrawlRequestId(),
						'amount' => $request_amount,
						'user_id' => $this->userId,
						'title' => $request_title,
						'payment_method' => $payout_method
					));
					$this->db->update('final_e_wallet', array(
						'amount' => $final_balance
					), array(
						'user_id' => $this->userId
					));
					
					$insert_data_credit_debit = array(
						'transaction_no' => generateUniqueTranNo(),
						'user_id' => $this->userId,
						'debit_amt' => $request_amount,
						'balance' => $final_balance,
						'receiver_id' => $this->userId,
						'sender_id' => $this->userId,
						'receive_date' => date('d-m-Y'),
						'ttype' => 'Withdrawal Request amount',
						'TranDescription' => 'Withdrawal Request amount deduction',
						'status' => '0', ///it's indicate debit status
						'reason' => '13' //Debit Amount for Withdrawal wallet amount request
					);
					$this->db->insert('credit_debit',$insert_data_credit_debit); 
					
					$result=array('status'=>'1','message'=>'Your withdrawl request is processed successfully!');
					return $this->output->set_content_type('application/json')->set_output(json_encode($result));
				}

				
			}

		}
		
	}*/
	
	/*
	@Desc: It's used to Withdrawl Fund from Ewallet
	*/
	/*public function withdrawlMyFund()
    {
        $current_balance = $this->ewallet_model->getEwalletBalance($this->userId);
        if (!empty($this->input->post('btn'))) {
            $request_title  = $this->input->post('request_title');
            $request_amount = $this->input->post("request_amount");
            $payout_method  = $this->input->post("payout_method");
            if ($payout_method == '') {
                $this->session->set_flashdata("error_msg", '<h5 class="panel-title" style="color:green">Please choose payment method</h5>');
                redirect(site_url() . "user/payout/withdrawlMyFund");
                exit();
            }	
			$amount_info=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$this->userId)->get()->row();
			
			if(empty($request_amount))
			{
				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter request amount!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawlMyFund");                
				exit();		
			}
			if(30>$current_balance-$request_amount)			
			{				
				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">R30 must be in account as maintenance fee and minimum deposit
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawlMyFund");                
				exit();			
			}
            $result1 = $this->db->query("select * from user_registration where user_id='" . $this->userId . "'")->result_array();
            if ($payout_method == 1) 
			{
                if ($result1[0]['bank_name'] == '' || $result1[0]['branch_name'] == '' || $result1[0]['account_holder_name'] == '' || $result1[0]['account_no'] == '') {
                    $this->session->set_flashdata("error_msg", '<h5 class="panel-title" style="color:green">Please fill your bank detail  in profile section</h5>');
                    redirect(site_url() . "user/payout/withdrawlMyFund");
                    exit();
                }
            }
            $final_balance = $current_balance - $request_amount;
            
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('tran_password', 'Username', 'callback_check_valid_tran_password');
            
            
            
            if (!$this->form_validation->run() == false) {
                $this->db->insert('withdrawl_wallet_amount_request', array(
                    'request_id' => $this->generateUniqueWithdrawlRequestId(),
                    'amount' => $request_amount,
                    'user_id' => $this->userId,
                    'title' => $request_title,
                    'payment_method' => $payout_method
                ));
                $this->db->update('final_e_wallet', array(
                    'amount' => $final_balance
                ), array(
                    'user_id' => $this->userId
                ));
                
                $insert_data_credit_debit = array(
                    'transaction_no' => generateUniqueTranNo(),
                    'user_id' => $this->userId,
                    'debit_amt' => $request_amount,
                    'balance' => $final_balance,
                    'receiver_id' => $this->userId,
                    'sender_id' => $this->userId,
                    'receive_date' => date('d-m-Y'),
                    'ttype' => 'Withdrawal Request amount',
                    'TranDescription' => 'Withdrawal Request amount deduction',
                    'status' => '0', ///it's indicate debit status
                    'reason' => '13' //Debit Amount for Withdrawal wallet amount request
                );
				$this->db->insert('credit_debit',$insert_data_credit_debit); 
				/////////////////
				
				$this->session->set_flashdata("flash_msg", '<h5 class="panel-title" style="color:green">Your withdrawl request is processed successfully!</h5>');
                redirect(site_url() . "user/payout/withdrawlMyFund");
            }
        } //end submit if here
        $data['title']           = 'Withdrawl My Fund';
        $data['current_balance'] = $current_balance;
        _userLayout("payout-mgmt/withdrawl-my-fund", $data);
	}*/
	
	/*
	@Desc: It's used to Withdrawl Fund from Ewallet
	*/

	public function getBankDetails(){
		if($this->userId){
			$bank_details = $this->db->select('bank_name,branch_name,ifsc_code,account_holder_name,account_no')->from('user_registration')->where('user_id',$this->userId)->get()->row_array();
			if($bank_details){
				echo json_encode($bank_details);
			}
		}
	}


	public function withdrawlMyFund()
    {
        $current_balance = $this->ewallet_model->getEwalletBalance($this->userId);
        if (!empty($this->input->post('btn'))) {
            $request_title  = $this->input->post('request_title');
            $request_amount = $this->input->post("request_amount");
			$payout_method  = $this->input->post("payout_method");
			$tran_password  = $this->input->post("tran_password");
			
			$amount_info=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$this->userId)->get()->row();
			$result1 = $this->db->query("select * from user_registration where user_id='" . $this->userId . "'")->result_array();
			$current_balance = $this->ewallet_model->getEwalletBalance($this->userId);
			$final_balance = $current_balance - $request_amount;

			
			if(empty($request_title)){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter title!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawlMyFund");                
				exit();
			}

			if(empty($request_amount)){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter request amount!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawlMyFund");                
				exit();
			}

			if(empty($payout_method)){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please choose payment method!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawlMyFund");                
				exit();
			}else {
				
				if ($result1[0]['bank_name'] == '' || $result1[0]['branch_name'] == '' || $result1[0]['account_holder_name'] == '' || $result1[0]['account_no'] == '') {

					$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please fill your bank detail  in profile section!
					</h5>'); 
					redirect(site_url() . "user/payout/withdrawlMyFund");                
					exit();
				}
			}

			if(30 > $final_balance){				

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">$30 must be in account as maintenance fee and minimum deposit
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawlMyFund");                
				exit();	
			}

            if(empty($tran_password)){

				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">please enter transaction password!
				</h5>'); 
				redirect(site_url() . "user/payout/withdrawlMyFund");                
				exit();	

			}else {

				$query=$this->db->query("SELECT t_code FROM (`user_registration`) WHERE (`user_id` = '$this->userId') AND `t_code` = '$tran_password'");
				
				$checkPassword = $query->num_rows();

				if(empty($checkPassword)){

					$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Transaction password is invalid!
					</h5>'); 
					redirect(site_url() . "user/payout/withdrawlMyFund");                
					exit();

				} else {

					$this->db->insert('withdrawl_wallet_amount_request', array(
						'request_id' => $this->generateUniqueWithdrawlRequestId(),
						'amount' => $request_amount,
						'user_id' => $this->userId,
						'title' => $request_title,
						'payment_method' => $payout_method
					));
					$this->db->update('final_e_wallet', array(
						'amount' => $final_balance
					), array(
						'user_id' => $this->userId
					));
					
					$insert_data_credit_debit = array(
						'transaction_no' => generateUniqueTranNo(),
						'user_id' => $this->userId,
						'debit_amt' => $request_amount,
						'balance' => $final_balance,
						'receiver_id' => $this->userId,
						'sender_id' => $this->userId,
						'receive_date' => date('d-m-Y'),
						'ttype' => 'Withdrawal Request amount',
						'TranDescription' => 'Withdrawal Request amount deduction',
						'status' => '0', ///it's indicate debit status
						'reason' => '13' //Debit Amount for Withdrawal wallet amount request
					);
					$this->db->insert('credit_debit',$insert_data_credit_debit);
					
					$this->session->set_flashdata("flash_msg", "<h5 class='panel-title'>Your withdrawal request is processed Successfully, You'll Receive Within 48 hours
					</h5>"); 
					redirect(site_url() . "user/payout/withdrawlMyFund");                
					exit();
				}

				
			}
        } //end submit if here
        $data['title']           = 'Withdrawl My Fund';
        $data['current_balance'] = $current_balance;
        _userLayout("payout-mgmt/withdrawl-my-fund", $data);
    }
	
	public function completedPayoutRequestList()
	{
		$data['title']='Fresh Pin List';
		$data['all_completed_request']=$this->payout_model->getAllCompletedPayoutRequest($this->userId);
		_userLayout("payout-mgmt/completed-payout-request-list",$data);
	}
	/*
	@Desc: It's used to view the pending payout request list
	*/
	public function pendingPayoutRequestList()
	{
		$data['title']='Fresh Pin List';
		$data['all_pending_request']=$this->payout_model->getAllPendingPayoutRequest($this->userId);
		_userLayout("payout-mgmt/pending-payout-request-list",$data);
	}
	/*
	@Desc: It's used to view the cancelled payout request list
	*/
	public function cancelledPayoutRequestList()
	{
		$data['title']='Fresh Pin List';
		$data['all_cancelled_request']=$this->payout_model->getAllCancelledPayoutRequest($this->userId);
		_userLayout("payout-mgmt/cancelled-payout-request-list",$data);
	}

}//end class

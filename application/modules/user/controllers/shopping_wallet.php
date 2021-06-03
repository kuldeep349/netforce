<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package user/Shopping_Wallet
*/
class Shopping_Wallet extends Common_Controller 
{
	private $userId;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		user_auth();
		$this->load->helper("layout_helper");
		$this->load->model('shopping_wallet_model');
		$this->load->model('member_model');
		$this->load->model('account_model');
		$this->userId=$this->session->userdata('user_id');
	} 
	/*
	@Desc: It's used to view the ewallet balance
	*/
	public function viewEwalletBalance()
	{
		$data['title']='Shopping Wallet Balance';
		$data['ewallet_balance']=$this->shopping_wallet_model->getEwalletBalance($this->userId);
		_userLayout("shopping-wallet-mgmt/view-ewallet-balance",$data);
	}
	
	/*
	@Desc: It's used to purchase the fund
	*/
	public function purchaseFund()
	{
	$data['title']=' Shopping Wallet Purchase Fund';
	$data['current_balance']=$this->shopping_wallet_model->getEwalletBalance($this->userId);
    if(!empty($this->input->post('btn')))
    {
	    $image_upload_path='/images/';
	    $deposit_proof=adImageUpload($_FILES['deposit_proof'],1, $image_upload_path);
	    $deposit_proof=(!empty($deposit_proof))?$deposit_proof:'';
       	$this->db->insert('deposit_shopping_wallet_amount_request',array(
       	'deposit_id'=>$this->generateUniqueDepositRequestId(),
       	'user_id'=>$this->userId,
       	'amount'=>$this->input->post('deposit_amount'),
       	'title'=>$this->input->post('deposit_title'),
       	'file_proof'=>$deposit_proof
       	));
        $this->session->set_flashdata("flash_msg",'<span class="text-semibold">Well done!</span> You purchase fund request sent successfully!');
        redirect(site_url()."user/shopping_wallet/purchaseFund");
     }//end submit if here
	_userLayout("shopping-wallet-mgmt/purchase-fund",$data);
	}
	/*
	@Desc: It's used to  request for wallet amount deposit
	*/
	public function depositWalletAmountRequestList()
	{

	    $data['deposit_request']=$this->shopping_wallet_model->getDepositWalletAmountRequest($this->userId);

	    $data['title']="Deposit Shopping Wallet Amount Request List";
	    $data['breadcrumb']='<li class="active">Deposit Wallet Amount Request List</li>';
		_userLayout("shopping-wallet-mgmt/deposit-wallet-amount-request-list",$data);
	}
	
	/*
	@Desc: It's used to generate unique deposit request id
	*/
	public function generateUniqueDepositRequestId()
	{
	    $random_number="D".mt_rand(100000, 999999);
	    if($this->db->select('deposit_id')->from('deposit_shopping_wallet_amount_request')->where('deposit_id',$random_number)->get()->num_rows()>0)
	    {
	      $this->generateUniqueDepositRequestId();
	    }
	    return $random_number;
	}
	/*End method*/
	/*
	*/
	public function viewEwalletStatement()
	{
		$data=array();
        $all_statements=$this->shopping_wallet_model->getEwalletStatements($this->userId);
		$data['all_statements']=$all_statements;
		_userLayout("shopping-wallet-mgmt/view-ewallet-statement",$data);
	}//end method

	public function getUserDetails()
	{
	  $username=$this->input->post('username');
	  $user_details=$this->account_model->getUserDetails($username);
	  $this->output ->set_content_type('application/json')->set_output(json_encode($user_details)); 
	}

}//end class

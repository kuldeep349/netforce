<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package Front/Front
*/
class Visitor_shopping extends CI_Controller 
{
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper("layout_helper");
		$this->load->helper("registration_helper");
		$this->load->helper("feeder_stage_nom_helper");
		$this->load->helper("stage1_nom_helper");
		$this->load->helper("stage2_nom_helper");
		$this->load->helper("stage3_nom_helper");
		$this->load->helper("stage4_nom_helper");
		$this->load->helper("stage5_nom_helper");
		$this->load->helper("stage6_nom_helper");
		$this->load->helper("stage7_nom_helper");
		/////////////////
		$this->load->helper("commission_helper");
		$this->load->model('front_model');
		$this->load->model('user/account_model');
		$this->load->model('user/package_model');
		$this->load->model('user/ewallet_model');
		$this->load->model('admin/dashboard_model');
		
	}
	/*
	@mandatory method for all mlm plan i.e generic method
	@Desc: It's accept ajax request to validate the sponsor username and new registered username is availability
	*/
	// Auto register
	public function autoRegister()
	{
	    $registration_info=array();
	    $registration_info['test']='test';
	    $this->session->set_userdata('registration_info',$registration_info);
		$userid=UserAutoRegistration();
		$data['user_id']=$userid;
	   _frontLayout("front-mgmt/showpage",$data);
	}


	public function clear_session(){
		$this->session->unset_userdata('cart');
	}
    public function set_shipping_country(){
        $shipping_country = $this->input->post('country_id');
        $shipping_charges = $this->input->post('shipping_charges');
        $country_charges = $this->input->post('country_charges');
        $this->session->set_userdata('shipping',['country_id' => $shipping_country , 'shipping_charges' => $shipping_charges , 'country_charges' => $country_charges]);
		$res['success'] = 1;
		echo json_encode($res);
	}
	public function create_visitor_order(){
		if($this->input->server('REQUEST_METHOD') == "POST"){
			$response['success'] = 0;
			$data = $this->security->xss_clean($this->input->post());
			$this->form_validation->set_rules('first_name','First Name','trim|required');
			$this->form_validation->set_rules('last_name','Last Name','trim|required');
			$this->form_validation->set_rules('street_address','Address','trim|required');
			$this->form_validation->set_rules('city','City','trim|required');
			$this->form_validation->set_rules('state','State','trim|required');
			$this->form_validation->set_rules('postal_code','Postal_code','trim|required|numeric');
			$this->form_validation->set_rules('payment_method','Payment Method','trim|required');
			if($this->form_validation->run() != false){
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$company_name = $this->input->post('company_name');
				$address = $this->input->post('street_address');
				$city = $this->input->post('city');
				$state = $this->input->post('state');
				$country = $this->input->post('country');
				$postal_code = $this->input->post('postal_code');
				$phone = $this->input->post('phone');
				$email = $this->input->post('email');
				$payment_method = $this->input->post('payment_method');
				$cart = !empty ($this->session->userdata['cart']) ? $this->session->userdata['cart'] : [] ;
					if(!empty($cart)){
						foreach($cart as $k => $product){
							$cart[$k]=$this->db->select('sku,title,id as product_id,old_price,product_image')->from('eshop_organic_products')->where(array('status'=>'1','id' => $product['product_id']))->get()->row_array();
							$cart[$k]['quantity'] = $product['quantity'];
						}
					} 
					$shipping = $this->session->userdata['shipping'];
					if($payment_method == 'bank_wire'){
						$image_proof = $_FILES['bank_wire_proof_image'];
						if($image_proof['error'] == 0){
							$image_upload_path='/images/';
							$deposit_proof=adImageUpload($_FILES['bank_wire_proof_image'],1, $image_upload_path);
							if($deposit_proof != ''){
								$deposit_proof=(!empty($deposit_proof))?$deposit_proof:'';
								$paymentArr = array(
									'order_id'=>$this->generateUniqueVisitorOrderId(),
									'payment_method' => '1',
									'bank_wire_image_proof'=>$deposit_proof,
									'first_name'=>$first_name,
									'last_name'=>$last_name,
									'company_name'=>$company_name,
									'address'=>$address,
									'city'=>$city,
									'state'=>$state,
									'country'=>$country,
									'postal_code'=>$postal_code,
									'phone'=>$phone,
									'email'=>$email,
									'shipping_country'=>$shipping['country_charges'],
									'shipping_charges'=>$shipping['shipping_charges'],
									'status'=>0,
									'amount'=>0,
								);
								$this->db->insert('tbl_visitor_orders',$paymentArr);
								if(!empty($cart)){
									foreach($cart as $k => $product){
										$orderDetailArr = [
											'order_id' => $paymentArr['order_id'],
											'product_id' => $product['product_id'],
											'product_title' => $product['title'],
											'quantity' => $product['quantity'],
											'product_price' => $product['old_price'],
										];
										$this->db->insert('tbl_visitor_order_details',$orderDetailArr);
									}
								} 
								$this->session->unset_userdata('cart');
								$response['success'] = 1;
								$response['message'] = 'Order Submitted Successfully';
							}else{
								$response['message'] = 'Please Choose a valid Proof';
							}
						}else{
							$response['message'] = 'Proof is not valid';
						}
					
					}elseif($payment_method == 'debit_card'){
						$paymentArr = array(
							'order_id'=>$this->generateUniqueVisitorOrderId(),
							'payment_method' => '2',
							'bank_wire_image_proof'=>'',
							'first_name'=>$first_name,
							'last_name'=>$last_name,
							'company_name'=>$company_name,
							'address'=>$address,
							'city'=>$city,
							'state'=>$state,
							'country'=>$country,
							'postal_code'=>$postal_code,
							'phone'=>$phone,
							'email'=>$email,
							'shipping_country'=>$shipping['country_charges'],
							'shipping_charges'=>$shipping['shipping_charges'],
							'status'=>0,
							'amount'=>0,
						);
						$this->db->insert('tbl_visitor_orders',$paymentArr);
						if(!empty($cart)){
							foreach($cart as $k => $product){
								$orderDetailArr = [
									'order_id' => $paymentArr['order_id'],
									'product_id' => $product['product_id'],
									'product_title' => $product['title'],
									'quantity' => $product['quantity'],
									'product_price' => $product['old_price'],
								];
								$this->db->insert('tbl_visitor_order_details',$orderDetailArr);
							}
						} 
					}else{
						$response['message'] = 'Only Bank Wire Method Allowed yet';
					}
			}else{
				$response['message'] = validation_errors();
			}
		}

		echo json_encode($response);
	}

	public function visitor_paystack_payment($order_id){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://api.currencylayer.com/live?access_key=d5de9f9a4fca4fdf85ad8c8db3fcdf55",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"postman-token: 8240a55c-4d33-9f29-660c-c7c3f445573e"
		),
		));

		$response = json_decode(curl_exec($curl),true);
		$err = curl_error($curl);
		curl_close($curl);
		$data['usd_price'] = $response['quotes']['USDNGN'];
		$data['request'] = $this->db->select('*')->from('tbl_visitor_orders')->where('order_id',$order_id)->get()->row_array();
		$this->session->set_userdata('visitor_paystack_payment',$data['request']);
		_frontLayout("front-mgmt/visitor_paystack_payment",$data);
	}


	public function confirm_visitor_order_payment(){
		$result=(!empty($_POST))?$_POST:$_GET;
		$transaction_no=$result['reference'];
		$r = $this->session->userdata['wallet_purchase_paystack'];
		$transaction_report=$this->verifyTransaction($transaction_no);
		if(!empty($transaction_report->status) && $transaction_report->status==1 )
		{
			// $result=PaystackUserRegistration();
			// if($result['status'])
			// {
				
				
				
				$paydata = array(
					'user_id' => $r['user_id'],
					'gateway_response' => $transaction_report->data->gateway_response,
					'status' => $transaction_report->status,
					'paid_at' => $transaction_report->data->paid_at,
					'amount' => $transaction_report->data->amount,
					'reference' => $transaction_report->data->reference,
					'pay_date' => date('Y-m-d'),
					'refrence_no' => $transaction_no
				);
				
				
				$this->db->insert('paystack_data', $paydata);
				
				$this->db->update('deposit_wallet_amount_request',array('status'=>'1', 'response_date'=>date("Y-m-d H:i:s")),array('deposit_id'=>$r['deposit_id']));
					$request=$this->db->select(array(
						'd.id',
						'd.amount as deposit_amount',
						'w.amount as wallet_amount',
						'w.user_id',
						))
						->from('deposit_wallet_amount_request as d')
						->join('final_e_wallet as w', 'w.user_id=d.user_id')
						->where('d.id', $r['id'])
						->get()
						->row();
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
						  'ttype'=>'PayStack Payment',
						  'TranDescription'=>'Wallet deposit amount is credit into member ewallet',
						  'deposit_id'=>$request->id,
						  'status'=>'1', ///it's indicate credit status
						  'reason'=>'15' //it's indicate deposit request credit
				  );//end credit debit data
				  $this->db->insert('credit_debit',$insert_data_credit_debit);
				$this->session->set_flashdata("message", '<span class="text-semibold">Wallet Purchased Successfully</span>');
				redirect(site_url().'front/wallet_fund_purchase');
				exit;
				// }
				
		}
		else
		{
			$this->session->set_flashdata("error_msg", '<span class="text-semibold">Something wrong please try again later</span>');
			redirect(site_url()."front/wallet_fund_purchase");
			exit();
		}
		
	}



	public function generateUniqueVisitorOrderId()
	{
	    $random_number=mt_rand(100000, 999999);
	    if($this->db->select('order_id')->from('tbl_visitor_orders')->where('order_id',$random_number)->get()->num_rows()>0)
	    {
	      $this->generateUniqueVisitorOrderId();
	    }
	    return $random_number;
	}

	function visitor_invoice()
	{

		$email_data['from']='info@xbulon.com';
		$email_data['to']='349kuldeep@gmail.com';
		$email_data['subject']='Registration Successful on Xbulon';
		$email_data['user_id']='kush';
		$email_data['username']='kuldeep';
		$email_data['password']='1111';
		$email_data['transaction_pwd']='2222';
		$email_data['email']='349kuldeep@gmail.com';
		$email_data['sponsor_user_name']='sana';
		$email_data['email-template']='welcome-email-to-user';
		_sendEmail($email_data);
		die('sent');
	}
}
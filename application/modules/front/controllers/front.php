<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package Front/Front
*/
class Front extends CI_Controller 
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
	public function isUserNameExists()
	{
		$username=$this->input->post('username');
		$requestType=$this->input->post('requestType');
		$pkg_id=(!empty($this->input->post('pkg_id')))?$this->input->post('pkg_id'):null;
		if($requestType=="sponsor")
		{
			/*if($this->front_model->isSponsorExist($username,$pkg_id))
			{
				$user_info=$this->account_model->getUserDetails($username);
				$output=array(
					'exist'=>1,
					'username'=>$user_info->username,
					);
				$this->output ->set_content_type('application/json') ->set_output(json_encode($output)); 
			}
			else
			{
				$output=array(
					'exist'=>0,
					);
				$this->output ->set_content_type('application/json') ->set_output(json_encode($output)); 
			}*/
			if($this->account_model->isActiveUserExist($username))
			{
				$user_info=$this->account_model->getUserDetails($username);
				$output=array(
					'exist'=>1,
					'username'=>$user_info->username,
					);
				$this->output ->set_content_type('application/json') ->set_output(json_encode($output)); 
			}
			else
			{
				$output=array(
					'exist'=>0,
					);
				$this->output ->set_content_type('application/json') ->set_output(json_encode($output)); 
			}
		}
		else if($requestType=="new_user")
		{
			if($this->front_model->isUserExist($username))
			{
				$user_info=$this->account_model->getUserDetails($username);
				$output=array(
					'exist'=>1,
					'first_name'=>$user_info->first_name,
					'last_name'=>$user_info->last_name
					);
				$this->output ->set_content_type('application/json') ->set_output(json_encode($output)); 
			}
			else
			{
				$output=array(
					'exist'=>0,
					);
				$this->output ->set_content_type('application/json') ->set_output(json_encode($output)); 
			} 
		}
	}
	/*
	@mandatory method for all mlm plan i.e generic method
	@Desc: It's accept ajax request to validate the sponsor username and new registered username is availability
	*/
	public function isIdNoExists()
	{
		$username=$this->input->post('username');
		$requestType=$this->input->post('requestType');
		$pkg_id=(!empty($this->input->post('pkg_id')))?$this->input->post('pkg_id'):null;
		if($requestType=="sponsor")
		{
		
			if($this->account_model->isActiveUserExist($username))
			{
				$user_info=$this->account_model->getUserDetails($username);
				$output=array(
					'exist'=>1,
					'username'=>$user_info->username,
					);
				$this->output ->set_content_type('application/json') ->set_output(json_encode($output)); 
			}
			else
			{
				$output=array(
					'exist'=>0,
					);
				$this->output ->set_content_type('application/json') ->set_output(json_encode($output)); 
			}
		}
		else if($requestType=="new_user")
		{
			if($this->front_model->isIdNoExist($username))
			{
				//$user_info=$this->account_model->getUserDetails($username);
				$output=array(
					'exist'=>1
					);
				$this->output ->set_content_type('application/json') ->set_output(json_encode($output)); 
			}
			else
			{
				$output=array(
					'exist'=>0,
					);
				$this->output ->set_content_type('application/json') ->set_output(json_encode($output)); 
			} 
		}
	}
	
	public function isAadharNoExists()
	{
		$username=$this->input->post('username');
		$requestType=$this->input->post('requestType');
		$pkg_id=(!empty($this->input->post('pkg_id')))?$this->input->post('pkg_id'):null;
		if($requestType=="new_user")
		{
			if($this->front_model->isAadharNoExist($username))
			{
				//$user_info=$this->account_model->getUserDetails($username);
				$output=array(
					'exist'=>1
					);
				$this->output ->set_content_type('application/json') ->set_output(json_encode($output)); 
			}
			else
			{
				$output=array(
					'exist'=>0,
					);
				$this->output ->set_content_type('application/json') ->set_output(json_encode($output)); 
			} 
		}
	}
	/*
	@desc:It's used to display the index/home page
	*/
	public function index()
	{
	    //redirect(site_url()."estore");
	   $data=array();
	   $data['marquee'] = $this->dashboard_model->getMarquee();
	   _frontLayout("front-mgmt/home",$data);
	}
	/*
	@mandatory method for all mlm plan i.e generic method
	@desc:It's used to display the login page
	*/
	public function login()
	{
	  _frontLayout("front-mgmt/login");
	}
	public function login2()
	{
	  _frontLayout("front-mgmt/login2");
	}
	/*
	@mandatory method for all mlm plan i.e generic method
	@desc:It's used to display the Register page
	*/
	public function reg()
	{
	    $this->session->set_userdata('registration_with_cart','registration_with_cart');
	    redirect(site_url()."join-us");
		exit();
	}
	public function register($select_id=null,$pkg_id=null)
	{
		 if(!empty($select_id))
		 {
			if($this->front_model->isUserExist($select_id))
			{
			 $data['replicated_username']=$select_id;
			}
		 }
		 
		 if(!empty($pkg_id))
		 {
			$data['upgrade_pkg_id']=ID_decode($pkg_id); 
		 }
		 if(!empty($this->input->post('btn')))
	     {
	         //pr($_POST);
	     	//$this->session->set_userdata($data);
	     	/////sponsor and account informtaion
	     	$ref_id=$this->input->post("sponsor_id");
	     	$username=$this->input->post("username");
	     	$idno=trim($this->input->post("idno"));
	     	$aadharno=trim($this->input->post("aadharno"));
	     	$pkg_id=(!empty($this->input->post("platform")))?$this->input->post("platform"):1;
	     	$package_details=$this->front_model->getPackageDetails($pkg_id);
			$pkg_amount=$package_details->amount;
	     	$email=$this->input->post("email");
	     	$password=$this->input->post("password");
	     	$t_code=$this->input->post("transaction_pwd");
			//$ref_leg_position=$this->input->post("ref_leg_position");
	     	$ref_user_info=$this->account_model->getUserDetails($ref_id);
			
	     	/////personal informtaion
	     	$first_name=$this->input->post('first_name');
	     	$last_name=$this->input->post('last_name');
	     	$contact_no=$this->input->post('phone');
	     	$country=$this->input->post('country');
	     	$state=$this->input->post('state');
	     	//$city=$this->input->post('city');
	     	//$address_line1=$this->input->post('address');
	     	$date_of_birth=$this->input->post('date_of_birth');
	     	/////Bank account informtaion
	     	//$account_holder_name=(!empty($this->input->post('account_holder_name')))?$this->input->post('account_holder_name'):null;
	     	//$account_no=(!empty($this->input->post('account_no')))?$this->input->post('account_no'):null;
	     	//$bank_name=(!empty($this->input->post('bank_name')))?$this->input->post('bank_name'):null;
	     	//$branch_name=(!empty($this->input->post('branch_name')))?$this->input->post('branch_name'):null;
	     	
	     	$welcome_pack=$this->input->post('welcome_pack');
	     	$collect_center=$this->input->post('collect_center');
	     	///////////////////////////
	     	$registration_info=array();
	     	$registration_info['sponsor_and_account_info']=array(
	     		'ref_id'=>$ref_user_info->user_id,
	     		'ref_user_name'=>$ref_user_info->username,
	     		'username'=>$username,
	     		'email'=>$email,
	     		'pkg_id'=>$pkg_id,
	     		'pkg_amount'=>$pkg_amount,
	     		'password'=>$password,
	     		't_code'=>$t_code,
	     		'welcome_pack'=>$welcome_pack,
	     		'collect_center'=>$collect_center,
				//'ref_leg_position'=>$ref_leg_position
	     		);
	     	
	     	$registration_info['personal_info']=array(
	     		'first_name'=>$first_name,
	     		'last_name'=>$last_name,
	     		'contact_no'=>$contact_no,
	     		'country'=>$country,
	     		'state'=>$state,
	     		'city'=>$city,
	     		'address_line1'=>$address_line1,
	     		'date_of_birth'=>$date_of_birth
	     		);
	     	/*
	     	$registration_info['bank_account_info']=array(
	     		'account_holder_name'=>$account_holder_name,
				'account_no'=>$account_no,
	     		'bank_name'=>$bank_name,
	     		'branch_name'=>$branch_name
	     		);
	     		*/
			//////////////////////////
			$this->session->set_userdata('registration_info',$registration_info);
			//$where="(username='$ref_id' || user_id='$ref_id') and active_status='1' and pkg_id='$pkg_id'";
			
			$where="(username='$ref_id' || user_id='$ref_id') and active_status='1'";
			
			$sponsor_count=$this->db->select('id')->from('user_registration')->where($where)->get()->num_rows();
			
			if(empty($ref_id))
			{
				$this->session->set_flashdata("error_msg", '<span class="text-semibold">Kindly enter your sponsor name!</span>');
				redirect(site_url()."front/register");
				exit();	
			}
			if($sponsor_count==0)
			{
				 $this->session->set_flashdata("error_msg", '<span class="text-semibold">Sorry Sponsor does not exist!</span>');
				redirect(site_url()."front/register");
				exit();	
			}
			
			$user_count=$this->db->select('*')->from('user_registration')->where(array('username'=>$username))->get()->num_rows();
			
			if($user_count==1)
			{
				$this->session->set_flashdata("error_msg", '<span class="text-semibold">User-name already exist</span>');
				redirect(site_url()."front/register");
				exit();
			}
			
			//////////////////////////
		   /*	if(freeMemberRegistration())
				{
    				$registration_info=$this->session->userdata('registration_info');
    				$username=$registration_info['sponsor_and_account_info']['username'];
    				$password=$registration_info['sponsor_and_account_info']['password'];
    				$this->session->unset_userdata('registration_info');
    				$this->session->unset_userdata('username');
    				$this->session->unset_userdata('password');
    				$registration_with_cart=$this->session->userdata('registration_with_cart');
    				if($registration_with_cart=='registration_with_cart')
    				{
    				    redirect(site_url().'user/auth/loginshop/'.$username."/".$password);
    				}
    				else
    				{
    				    redirect(site_url().'user/auth/login/'.$username."/".$password);
    				}
				exit;
				} */
			    //redirect(site_url()."order");
		        //	redirect(site_url()."save_personal_information");
			    //redirect(site_url()."estore/viewCart");
	            redirect(site_url()."payment-option");
	     	    exit;
	     	
	     	  /*if(ewalletUserRegistration())
		      {
			  
    		  	$registration_info=$this->session->userdata('registration_info');
    		  	$username=$registration_info['sponsor_and_account_info']['username'];
    		    $password=$registration_info['sponsor_and_account_info']['password'];
    		    $this->session->unset_userdata('registration_info');
    		    $this->session->unset_userdata('username');
    		    $this->session->unset_userdata('password');
    		    redirect(site_url().'user/auth/login/'.$username."/".$password);
    		    //redirect(site_url().'estore/order_successful?order_id='.$order_id);
    		    exit;
    		  }
    		  else
    		  {
    		    $this->session->set_flashdata("error_msg", '<span class="text-semibold">Server Error.</span>');
    			redirect(site_url()."front/register");
    			exit();   
    		  }*/
	      }
		 $data['all_active_package']=$this->front_model->getAllActivePackage(); 
		 //pr($data['all_active_package']);
	     $data['registration_info']=(!empty($this->session->userdata('registration_info')) && count($this->session->userdata('registration_info'))>0)?$this->session->userdata('registration_info'):null; 
		 _frontLayout("front-mgmt/register",$data);
		 //$this->load->view("front-mgmt/register",$data);
	}
	
	public function save_personal_information()
	{
			if(!empty($this->input->post('btn')))
			{
				/////personal informtaion
				$first_name=$this->input->post('firstname');
				$last_name=$this->input->post('lastname');
				$contact_no=$this->input->post('phone');
				$country=$this->input->post('country');
				$state=$this->input->post('state');
				$city=$this->input->post('city');
				$address_line1=$this->input->post('address');
				$date_of_birth=$this->input->post('date_of_birth');
				$zip_code=$this->input->post('zip_code');
				
				$registration_info = $this->session->userdata('registration_info');
				$registration_info['personal_info']=array(
					'first_name'=>$first_name,
					'last_name'=>$last_name,
					'business_name'=>$this->input->post("business_name"),
					'tax_id'=>$this->input->post("tax_id"),
					'contact_no'=>$contact_no,
					'country'=>$country,
					'state'=>$state,
					'city'=>$city,
					'address_line1'=>$address_line1,
					'date_of_birth'=>$date_of_birth,
					'zip_code'=>$zip_code
					);
				/////////////////
				$this->session->set_userdata('registration_info',$registration_info);
				////////////////////////
				//redirect(site_url()."agreement");
				//redirect(site_url()."confirm_order");
				//redirect(site_url()."order");
				//redirect(site_url()."payment-option");
				$cart=$this->session->userdata('cart');//echo count($cart);exit;
				if(freeMemberRegistration())
				{
    				$registration_info=$this->session->userdata('registration_info');
    				$username=$registration_info['sponsor_and_account_info']['username'];
    				$password=$registration_info['sponsor_and_account_info']['password'];
    				$this->session->unset_userdata('registration_info');
    				$this->session->unset_userdata('username');
    				$this->session->unset_userdata('password');
    				$registration_with_cart=$this->session->userdata('registration_with_cart');
    				if($registration_with_cart=='registration_with_cart')
    				{
    				    redirect(site_url().'user/auth/loginshop/'.$username."/".$password);
    				}
    				else
    				{
    				    redirect(site_url().'user/auth/login/'.$username."/".$password);
    				}
				exit;
				} 
				
			}
			$data=array();
			$data['registration_info']=(!empty($this->session->userdata('registration_info')) && count($this->session->userdata('registration_info'))>0)?$this->session->userdata('registration_info'):null; 
			//pr($this->session->userdata('registration_info'));
			_frontLayout("front-mgmt/save_personal_information",$data);
			
	}//end method
	public function agreement()
	{
			if(!empty($this->input->post('btn')))
			{
				/////personal informtaion
				$first_name=$this->input->post('firstname');
				$last_name=$this->input->post('lastname');
				$contact_no=$this->input->post('phone');
				$country=$this->input->post('country');
				$state=$this->input->post('state');
				$city=$this->input->post('city');
				$address_line1=$this->input->post('address');
				$date_of_birth=$this->input->post('date_of_birth');
				
				$registration_info = $this->session->userdata('registration_info');
				$registration_info['agreement']=array(
					'first_name'=>$first_name,
					'last_name'=>$last_name,
					'contact_no'=>$contact_no,
					'country'=>$country,
					'state'=>$state,
					'city'=>$city,
					'address_line1'=>$address_line1,
					'date_of_birth'=>$date_of_birth
					);
				/////////////////
				$this->session->set_userdata('registration_info',$registration_info);
				////////////////////////
				redirect(site_url()."order");
				exit;
			}
			$data=array();
			$data['registration_info']=(!empty($this->session->userdata('registration_info')) && count($this->session->userdata('registration_info'))>0)?$this->session->userdata('registration_info'):null; 
			//pr($this->session->userdata('registration_info'));
			_frontLayout("front-mgmt/agreement",$data);
			
	}//end method
	public function order()
	{
			if(!empty($this->input->post('btn')))
			{
				/////personal informtaion
				$pkg_id=(!empty($this->input->post("pkg_id")))?$this->input->post("pkg_id"):1;
				
				$pk_res=$this->db->query("select * from package where id='".$pkg_id."'")->row_array();
				
				$pkg_amount=$pk_res['amount'];
				
				
				$pkg_count=$this->db->select('*')->from('package')->where(array('id'=>$pkg_id))->get()->num_rows();
				
				if($pkg_count==0)
				{
					 $this->session->set_flashdata("error_msg", '<span class="text-semibold">Please choose valid package</span>');
					redirect(site_url()."front/register");
					exit();
					
				}
				$registration_info = $this->session->userdata('registration_info');
				$registration_info['order']=array(
					'pkg_id'=>$pkg_id,
					'pkg_amount'=>$pkg_amount
					);
				/////////////////
				$this->session->set_userdata('registration_info',$registration_info);
				////////////////////////
				redirect(site_url()."save_personal_information");
				
				exit;
			}
			$data=array();
			$data['registration_info']=(!empty($this->session->userdata('registration_info')) && count($this->session->userdata('registration_info'))>0)?$this->session->userdata('registration_info'):null; 
			//pr($this->session->userdata('registration_info'));
			$data['product_info']=$this->db->select('*')->from('package')->where('id',1)->get()->row();
			$registration_pkg_info=$this->session->userdata('registration_info');
			$account_type=$registration_pkg_info['sponsor_and_account_info']['account_type'];
			
			$all_packages=$this->db->select('*')->from('package')->where(array('country_code'=>'51'))->get()->result();
			$data['all_packages']=$all_packages;
			_frontLayout("front-mgmt/order",$data);
			
	}//end method
	public function get_ajax_package_info()
	{
		$pkg_id=$this->input->post('pkg_id');
		//$pkg_id=4;
		$package_details=$this->db->select('*')->from('package')->where('id',$pkg_id)->get()->row_array();
		echo json_encode($package_details);
	}
	public function confirm_order()
	{
			if(!empty($this->input->post('btn')))
			{
				$registration_info=$this->session->userdata('registration_info');
				if(!empty($registration_info) && count($registration_info)>0)
				{
					
				$count=$this->db->query("select * from bank_wired_user_registration where username='".$registration_info['sponsor_and_account_info']['username']."'")->num_rows();
			
				if($count==1)
				{
						$this->session->set_flashdata("error_msg", '<span class="text-semibold">Username Already Exist</span>');
						redirect(site_url()."front/register");
						exit();		
				}
					
						$this->db->insert('bank_wired_user_registration',array(
						///sponsor and account information
						'ref_id'=>$registration_info['sponsor_and_account_info']['ref_id'],
						
						'username'=>$registration_info['sponsor_and_account_info']['username'],
						'password'=>$registration_info['sponsor_and_account_info']['password'],
						't_code'=>$registration_info['sponsor_and_account_info']['t_code'],
						'account_type'=>$registration_info['sponsor_and_account_info']['account_type'],
						
						//personal informtaion
						'first_name'=>$registration_info['personal_info']['first_name'],
						'last_name'=>$registration_info['personal_info']['last_name'],
						'email'=>$registration_info['sponsor_and_account_info']['email'],
						'contact_no'=>$registration_info['personal_info']['contact_no'],
						'country'=>$registration_info['personal_info']['country'],
						'state'=>$registration_info['personal_info']['state'],
						'city'=>$registration_info['personal_info']['city'],
						'address_line1'=>$registration_info['personal_info']['address_line1'],
						'date_of_birth'=>$registration_info['personal_info']['date_of_birth'],
						'zip_code'=>$registration_info['personal_info']['zip_code'],
						
						'business_name'=>$registration_info['personal_info']['business_name'],
						
						'tax_id'=>$registration_info['personal_info']['tax_id'],
						//bank account info
						'account_no'=>$registration_info['bank_account_info']['account_no'],
						'branch_name'=>$registration_info['bank_account_info']['branch_name'],
						'bank_name'=>$registration_info['bank_account_info']['bank_name'],
						'account_holder_name'=>$registration_info['bank_account_info']['account_holder_name'],
						
						//bit coin info
						'bit_coin_id'=>$registration_info['bit_coin_info']['bit_coin_id'],
						'payment_method'=>'1',
						//bit coin info
						'pkg_id'=>$registration_info['order']['pkg_id'],
						'pkg_amount'=>$registration_info['order']['pkg_amount'],
						));
				$username=$registration_info['sponsor_and_account_info']['username'];
				$password=$registration_info['sponsor_and_account_info']['password'];
				$email=$registration_info['sponsor_and_account_info']['email'];
				$transaction_pwd=$registration_info['sponsor_and_account_info']['t_code'];
				
				$this->session->unset_userdata('registration_info');
				
				sendUploadBankWireProofEmailToUser($username,$password,$email,$transaction_pwd);
				
				$this->session->set_userdata('flash_msg',"<h3 style='color:green;font-weight:bold'>Thanks for your registration</h5>");
					
				$this->session->unset_userdata('registration_info');
				redirect(site_url()."front/uploadBankWireProof/".$username);
				exit;	
			}}
			$data=array();
			
			$registration_info=(!empty($this->session->userdata('registration_info')) && count($this->session->userdata('registration_info'))>0)?$this->session->userdata('registration_info'):null;
			
			$data['registration_info']=$registration_info;
			//pr($this->session->userdata('registration_info'));
			$pkg_id=(!empty($registration_info['order']['pkg_id']))?$registration_info['order']['pkg_id']:null;
			
			$data['product_info']=$this->db->select('*')->from('package')->where('id',$pkg_id)->get()->row();
			
			_frontLayout("front-mgmt/confirm_order",$data);
	}//end method
	
	
	public function submitPayFastForm()
	{
		$amount=$cart_final_price=$this->session->userdata('cart_final_price');
		$registration_info=$this->session->userdata('registration_info');
		$amount=$registration_info['order']['pkg_amount'];
		$pkg_id=$registration_info['order']['pkg_id'];
		$email_address=$registration_info['sponsor_and_account_info']['email'];
		$pkg_info=$this->db->select('*')->from('package')->where('id',$pkg_id)->get()->row();
		$amount=$registration_info['order']['pkg_amount']+$pkg_info->shipping+$pkg_info->tax;
		//echo $amount; exit;
		$role=$this->session->userdata('userType');
				$user_id=null;
				$guest_id=null;
				if($role=='2')
				{
					$user_id=$this->session->userdata('user_id');
				}
				else if($role=='3')
				{
					$guest_id=$this->session->userdata('user_id');
				}
		
		if(!empty($amount) && !empty($_POST['pay_fast_btn']))
		{
		    if(PAYFAST_MODE=='TEST')
		    {
		        $merchantid=TEST_PAYFAST_MERCHANT_ID;
		        $merchantkey=TEST_PAYFAST_MERCHANT_KEY;
		        $posturl=TEST_PAYFAST_URL;
		    }
		    else
		    {
		        $merchantid=LIVE_PAYFAST_MERCHANT_ID;
		        $merchantkey=LIVE_PAYFAST_MERCHANT_KEY;
		        $posturl=LIVE_PAYFAST_URL;
		    }
			$merchant_id=$merchantid;
			$merchant_key=$merchantkey;
			$return_url=site_url().'front/successPayFastPayment/';
			$cancel_url=site_url().'front/cancelPayFastPayment/';
			$notify_url=site_url().'front/notifyPayFastPayment/';
			$m_payment_id=$order_id=$this->generateUniqueOrderId();
			$this->session->set_userdata('m_payment_id',$m_payment_id);
			$item_name='BiotixPro Registration';
			
			$data = array(
				'receiver' => $merchant_id,
				'cmd' => '_paynow',
				'return_url' => $return_url,
				'cancel_url' => $cancel_url,
			    'notify_url' => $notify_url,
				'm_payment_id' => $m_payment_id, 
				'amount' => $amount,
				'item_description' => 'Registration Page',
				'item_name' => $item_name,
				'email_address' => $email_address
			);
			
		// Create GET string
		$pfOutput = '';
		foreach( $data as $key => $val )
		{
			if(!empty($val))
			 {
				$pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
			 }
		}
		//$getString = substr( $pfOutput, 0, -1 );
		$getString = substr( $pfOutput, 0, -1 );  
		//echo $getString; exit;
		$signature = md5( $getString );
		//echo $signature; exit;
		$htmlForm = '<form action="'.$posturl.'" method="POST" name="form_ff6427f5900ae59d0303d33a53b21772" onsubmit="return click_ff6427f5900ae59d0303d33a53b21772( this );">'; 
		foreach($data as $name=> $value)
		{ 
			$htmlForm .= '<input name="'.$name.'" type="hidden" value="'.$value.'" /><br>'; 
		} 
		$htmlForm .= '<input name="signature" type="hidden" value="'.$signature.'" />'; 
		$htmlForm .= '<input type="image" src="https://www.payfast.co.za/images/buttons/light-small-paynow.png" width="165" height="36" alt="Pay Now" title="Pay Now with PayFast">';
		
		echo '<body onload="submitPayFastForm();">';
		echo $htmlForm;
		echo '<body>';
		
		?>
		 <!--onload="submitPayFastForm();"-->
		<script language="JavaScript" type="text/javascript">
        function click_ff6427f5900ae59d0303d33a53b21772( aform_reference ) {
                    var aform = aform_reference;
                    aform['amount'].value = Math.round( aform['amount'].value*Math.pow( 10,2 ) )/Math.pow( 10,2 );
        }
        </script>
			<script>
			function submitPayFastForm() {
			  var pay_fast_form = document.forms.form_ff6427f5900ae59d0303d33a53b21772;
			  pay_fast_form.submit();
			}
			</script>	
		<?php 
		}//end empty if amount
		else 
		{
			redirect(site_url().'payment-option');
		}
	}//end method
	
	/*
	@Desc: It's used to generate unique deposit request id
	*/
	public function generateUniqueOrderId()
	{
	    $random_number="REG".mt_rand(100000, 999999);
	    if($this->db->select('transaction_no')->from('product_purchase')->where('transaction_no',$random_number)->get()->num_rows()>0)
	    {
	      $this->generateUniqueOrderId();
	    }
	    return $random_number;
	}
	
	public function successPayFastPayment()
	{
		$m_payment_id=$this->session->userdata('m_payment_id');
		$role=$this->session->userdata('userType');
				$user_id=null;
				$guest_id=null;
				if($role=='2')
				{
					$user_id=$this->session->userdata('user_id');
				}
				else if($role=='3')
				{
					$guest_id=$this->session->userdata('user_id');
				}
		if(!empty($m_payment_id))
		{
				$is_exist=$this->db->select('*')->from('pay_fast_response')->where('m_payment_id',$m_payment_id)->get()->num_rows();
				if($is_exist>0)
				{
					$result=$this->db->select('*')->from('pay_fast_response')->where(array('m_payment_id'=>$m_payment_id))->get()->row();
					$this->db->update('pay_fast_response',array('user_id'=>$user_id),array('m_payment_id'=>$m_payment_id));
					if(!empty($result->payment_status) && $result->payment_status=='COMPLETE')
					{
						//$data=$this->session->userdata('purchase_currencydetail');
						$tran_info=$this->db->select('*')->from('pay_fast_response')->where('m_payment_id',$m_payment_id)->get()->row();
						//echo "<pre>";print_r($tran_info); exit;
						////////////////////////////// place  order and product commission /////////////////////
						
                			$this->user_registration();	
    				}
    				else 
    				{
    					$this->db->update('pay_fast_response',array('user_id'=>$this->userId),array('m_payment_id'=>$m_payment_id));
    					$this->session->unset_userdata('m_payment_id',null);
    					//$this->session->unset_userdata('purchase_currencydetail');
    					$this->session->set_flashdata('error_msg','<h5>Sorry your payment is not successful, please try once again!</h5>');
    					redirect(site_url().'front/failedPayFastPaymentMessage');
    					exit;
    				}		
			}//end is_exist if
			else 
			{
				redirect(site_url().'join-us');
				exit;	
			}
		}//end !empty($m_payment_id) if
		else 
		{
			redirect(site_url().'join-us');
			exit;	
		}
	}//end method
	public function successPayFastPaymentMessage()
	{
		if(!empty($this->session->flashdata('flash_msg')))
		{
			$data=array();
			_frontLayout("front-mgmt/success_pay_fast_payment_message",$data);	
		}
		else 
		{
			redirect(site_url().'join-us');
			exit;	
		}
	}//end method
	public function notifyPayFastPayment()
	{
			$pay_fast_response=$_POST;
			$this->db->insert('pay_fast_response',
							    array(
								'user_id'=>$user_id,
								'm_payment_id'=>$_POST['m_payment_id'],
								'amount'=>$_POST['amount_gross'],
								'pay_fast_response'=>json_encode($pay_fast_response),'payment_status'=>$_POST['payment_status']
								)
							 );
	}//end method
	public function cancelPayFastPayment()
	{
		$this->session->unset_userdata('m_payment_id',null);
		//$this->session->unset_userdata('purchase_currencydetail');
		/////////
		$this->session->set_flashdata('error_msg','<h5>Sorry your payment is not successful, please try once again!</h5>');
		redirect(site_url().'front/failedPayFastPaymentMessage');
		exit;
	}//end method
	public function failedPayFastPaymentMessage()
	{
		if(!empty($this->session->flashdata('error_msg')))
         {
			$data=array();
			_frontLayout("front-mgmt/failed_pay_fast_payment_message",$data); 
			//redirect(site_url().'join-us');
		 }
		 else 
		 {
		     $data=array();
		     //_frontLayout("front-mgmt/failed_pay_fast_payment_message",$data);
			redirect(site_url().'join-us');
			exit; 
		 }
	}//end method
	
	public function user_registration()
	{
	   if(ewalletUserRegistration())
		    {
			  
		  	$registration_info=$this->session->userdata('registration_info');
		  	$username=$registration_info['sponsor_and_account_info']['username'];
		    $password=$registration_info['sponsor_and_account_info']['password'];
		    $this->session->unset_userdata('registration_info');
		    $this->session->unset_userdata('username');
		    $this->session->unset_userdata('password');
		    redirect(site_url().'user/auth/loginshop/'.$username."/".$password);
		    //redirect(site_url().'estore/order_successful?order_id='.$order_id);
		    exit;
		  }
		  else
		  {
		    $this->session->set_flashdata("error_msg", '<span class="text-semibold">Server Error.</span>');
			redirect(site_url()."front/register");
			exit();   
		  } 
	}
	/*
	@mandatory method for all mlm plan i.e generic method
	@desc:It's used to display the registration method option example ewallet or epin selection for registration
	*/
	
	
	public function paystackPayment()
	{
		$result=(!empty($_POST))?$_POST:$_GET;
		$transaction_no=$result['reference'];
		$transaction_report=$this->verifyTransaction($transaction_no);
		if(!empty($transaction_report->status) && $transaction_report->status==1 )
		{
			$result=PaystackUserRegistration();
		  if($result['status'])
		  {
			  
		  	$registration_info=$this->session->userdata('registration_info');
			
			
			$paydata = array(
        'user_id' => $result['user_id'],
        'gateway_response' => $transaction_report->data->gateway_response,
        'status' => $transaction_report->status,
        'paid_at' => $transaction_report->data->paid_at,
        'amount' => $transaction_report->data->amount,
        'reference' => $transaction_report->data->reference,
        'pay_date' => date('Y-m-d'),
        'refrence_no' => $transaction_no
            );

          $this->db->insert('paystack_data', $paydata);
			
		  	$username=$registration_info['sponsor_and_account_info']['username'];
		    $password=$registration_info['sponsor_and_account_info']['password'];
		    $this->session->unset_userdata('registration_info');
		    $this->session->unset_userdata('username');
		    $this->session->unset_userdata('password');
		    redirect(site_url().'user/auth/login/'.$username."/".$password);
		    exit;
		  }
		
		}
		else
		{
			$this->session->set_flashdata("error_msg", '<span class="text-semibold">Something wrong please try again later</span>');
			redirect(site_url()."front/register");
			exit();
		}
		
		
		
	}
	public function verifyTransaction($transaction_no=null)
	{
			/////////////Second request with auth token
			$ch = curl_init();
			$token=TEST_SECRET_KEY;
			//$transaction_no='58313';
			curl_setopt($ch, CURLOPT_URL,"https://api.paystack.co/transaction/verify/".$transaction_no);
			//curl_setopt($ch, CURLOPT_POST, 0);

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				 'Authorization: Bearer '.$token
				));

			// receive server response ...
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$server_output = curl_exec ($ch);
			curl_close ($ch);

			$output=json_decode($server_output);
			return $output;
		///////////////////////
	}
	
	
	
	public function paymentOption()
	{
	  ///registration_method

	  $payment_option_array=$this->db->select('*')->from('registration_method')->get()->result();
	  /*$curl = curl_init();

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
		$data['usd_price'] = $response['quotes']['USDNGN'];*/

		// if ($err) {
		// echo "cURL Error #:" . $err;
		// } else {
		// echo $response;
		// }
	  $payment_options=array();
	   foreach ($payment_option_array as $arr) 
	   {
	   	$payment_options[$arr->short_name]=$arr->status;
	   }
	  $data['payment_options']=$payment_options;
	  $data['registration_info']=$this->session->userdata('registration_info');
	  _frontLayout("front-mgmt/payment-option",$data);
	}
	/*
	@mandatory method for all mlm plan i.e generic method
	@author:Aditya
	@desc:It's used to display the Ewallet validation (via transaction password) page
	*/
	public function ewalletPayment()
	{
		
	   $this->load->model('user/ewallet_model');
	   $data=array();
	   $registration_info=$this->session->userdata('registration_info');
	   $sponser_id=$registration_info['sponsor_and_account_info']['ref_id'];
	   $pkg_amount=$registration_info['sponsor_and_account_info']['pkg_amount'];
       ////////////////
       $user_details=$this->account_model->getUserDetails($sponser_id);
       $data['sponser_id']=$sponser_id;
	   $data['username']=(!empty($user_details->username))?$user_details->username:null;
	   $data['transaction_pwd']=(!empty($user_details->t_code))?$user_details->t_code:null;
	   $data['sponsor_wallet_amount']=$this->ewallet_model->getEwalletBalance($sponser_id);
	   $data['pkg_amount']=$pkg_amount;
	   ////////////////
	  _frontLayout("front-mgmt/ewallet-payment",$data);
	}

	/*
	@mandatory method for all mlm plan i.e generic method
	@author:Aditya
	@desc:It's used to regsiter the user and redirect them into userpanel
	*/
	public function registerUserViaEwallet()
	{
		
		 /* if(ewalletUserRegistration())
		  {
			  
		  	$registration_info=$this->session->userdata('registration_info');
		  	$username=$registration_info['sponsor_and_account_info']['username'];
		    $password=$registration_info['sponsor_and_account_info']['password'];
		    $this->session->unset_userdata('registration_info');
		    $this->session->unset_userdata('username');
		    $this->session->unset_userdata('password');
		    redirect(site_url().'user/auth/login/'.$username."/".$password);
		    exit;
		  }*/
		  if(!empty($this->input->post('btn')))
		  {
			  $sponsor_user_name=$this->input->post('sponsor_user_name');
			  $sponsor_transaction_password=$this->input->post('sponsor_transaction_password');
			  $ref_user_info=$this->account_model->getUserDetails($sponsor_user_name);
			  // $where="(username='$ref_id' || user_id='$ref_id') and active_status='1' and t_code='$sponsor_transaction_password'";
			  $where="(username='$sponsor_user_name' || user_id='$sponsor_user_name') and active_status='1' and t_code='$sponsor_transaction_password'";
			  
			  $sponsor_count=$this->db->select('id')->from('user_registration')->where($where)->get()->num_rows();
			   	
    			if(empty($sponsor_count))
    			{
    				$this->session->set_flashdata("error_msg", '<span class="text-semibold"> Kindly enter your Login Id!</span>');
    				redirect(site_url()."ewallet-payment");
    				exit();	
    			}
    			if($sponsor_count==0)
    			{
    				 $this->session->set_flashdata("error_msg", '<span class="text-semibold">Sorry Wrong LoginId Or Password!</span>');
    				redirect(site_url()."ewallet-payment");
    				exit();	
    			}
    			
    			
			  
			  ////////////////////////////////////
			  /*$registration_info=$this->session->userdata('registration_info');
			  $ref_user=$registration_info['sponsor_and_account_info']['ref_id'];
			  //$pkg_amount=$registration_info['order']['pkg_amount'];
			  $sponsor_info=get_user_details($ref_user);
			  //pr($sponsor_info); exit;
			  $post_sponsor_info=get_user_details($sponsor_user_name);
			 if($sponsor_info->user_id!=$post_sponsor_info->user_id)
			  {
				$this->session->set_flashdata('error_msg','Please enter valid username and password!');
				redirect(site_url().'ewallet-payment');
				exit;  
			  }
			 if($sponsor_info->t_code!=$sponsor_transaction_password)
			 {
				 $this->session->set_flashdata('error_msg','Please enter valid username and password!');
				redirect(site_url().'ewallet-payment');
				exit; 
			 }*/
			 //echo 'user_id'=>$sponsor_info->user_id; exit;
			 $registration_info=$this->session->set_userdata('payer_info',$ref_user_info->user_id);
			  $wallet_info=$this->db->select('amount')->from('final_e_wallet')->where(array('user_id'=>$ref_user_info->user_id))->get()->row();
			  
			  $pkg_id=$registration_info['sponsor_and_account_info']['pkg_id'];
			  $pkg_info=$this->db->select('*')->from('package')->where('id',$pkg_id)->get()->row();
			  
			  $pkg_amount=$pkg_info->amount;
			  //echo $wallet_info->amount; exit;
			  if($pkg_amount>$wallet_info->amount)
			  {
				$this->session->set_flashdata('error_msg',"Sorry you don't have sufficient fund in your E-wallet! ");
				redirect(site_url().'ewallet-payment');
				exit;   
			  }
			  else 
			  {
				if(ewalletUserRegistration())
				{
				$registration_info=$this->session->userdata('registration_info');
				$username=$registration_info['sponsor_and_account_info']['username'];
				$password=$registration_info['sponsor_and_account_info']['password'];
				$this->session->unset_userdata('registration_info');
				$this->session->unset_userdata('username');
				$this->session->unset_userdata('password');
				redirect(site_url().'user/auth/login/'.$username."/".$password);
				exit;
				}  
			  }
			  
		  }
		  else 
		  {
			redirect(site_url().'ewallet-payment');
			exit;
		  }
	}
	/*
	@Desc: It's used to render the bankwire page with info as well as insert bank wire data into DB
	*/
	public function bankWirePayment()
	{
		$registration_info=$this->session->userdata('registration_info');
		if(!empty($registration_info) && count($registration_info)>0)
		{
			
			$this->db->insert('bank_wired_user_registration',array(
		    	///sponsor and account information
		    	'ref_id'=>$registration_info['sponsor_and_account_info']['ref_id'],
				'payment_method'=>'1',
				'payment_method_name'=>'Bank-Wire',
		    	'platform'=>$registration_info['sponsor_and_account_info']['pkg_id'],
		    	'package_fee'=>$registration_info['sponsor_and_account_info']['pkg_amount'],
		    	'username'=>$registration_info['sponsor_and_account_info']['username'],
		    	'password'=>$registration_info['sponsor_and_account_info']['password'],
		    	't_code'=>$registration_info['sponsor_and_account_info']['t_code'],
				//'ref_leg_position'=>$registration_info['sponsor_and_account_info']['ref_leg_position'],
		    	//personal informtaion
		    	'first_name'=>$registration_info['personal_info']['first_name'],
		    	'last_name'=>$registration_info['personal_info']['last_name'],
		    	'email'=>$registration_info['sponsor_and_account_info']['email'],
		    	'contact_no'=>$registration_info['personal_info']['contact_no'],
		    	'country'=>$registration_info['personal_info']['country'],
		    	'state'=>$registration_info['personal_info']['state'],
		    	'city'=>$registration_info['personal_info']['city'],
		    	'address_line1'=>$registration_info['personal_info']['address_line1'],
		    	'date_of_birth'=>$registration_info['personal_info']['date_of_birth'],
		    	//bank account info
		    	'account_holder_name'=>$registration_info['bank_account_info']['account_holder_name'],
		    	'account_no'=>$registration_info['bank_account_info']['account_no'],
		    	'bank_name'=>$registration_info['bank_account_info']['bank_name'],
		    	'branch_name'=>$registration_info['bank_account_info']['branch_name']
		    	));
        $username=$registration_info['sponsor_and_account_info']['username'];
        $password=$registration_info['sponsor_and_account_info']['password'];
        $email=$registration_info['sponsor_and_account_info']['email'];
        $transaction_pwd=$registration_info['sponsor_and_account_info']['t_code'];
		
		sendUploadProofEmailToUser($username,$password,$email,$transaction_pwd);
        
        $this->session->set_userdata('flash_msg',"<h3 style='color:green;font-weight:bold'>Thanks for yor registration
        	<a href='".site_url()."front/uploadBankWireProof/".$registration_info['sponsor_and_account_info']['username']."'><p>Please upload your proof of payment to get conrirmed.</p></a>
        	</h5>");
        $this->session->unset_userdata('registration_info');
	    redirect(site_url().'bank-wire-payment');
	    exit;
		}
		$data['bank_wire_detail']=$this->front_model->getBankWireDetails();
	   _frontLayout("front-mgmt/bank-wire-payment",$data);
	}
	/*
	@Desc: It's used to upload bank wire proof
	*/
	public function uploadBankWireProof($username=null)
	{
		$data['username']=$username;
		if(!empty($this->input->post('btn')))
		{
		  $username=$this->input->post('username');
		  $total_rows=$this->db->select('id')->from('bank_wired_user_registration')->where(array('username'=>$username,'status !='=>'1'))->get()->num_rows();
		  if($total_rows>0)
		  {
          $image_upload_path='/images/';
	      $proof=adImageUpload($_FILES['proof'],1, $image_upload_path);
		  $this->db->update('bank_wired_user_registration',array('proof'=>$proof),array('username'=>$username,'status !='=>'1'));
		  $this->session->set_flashdata('flash_msg',"<h3 style='color:green;font-weight:bold'>Proof is uploaded successfully</h3>");
		  redirect(site_url().'front/uploadBankWireProof');
		  }
		  else 
		  {
		  	redirect(site_url().'front/uploadBankWireProof');
		  }
		}
		_frontLayout("front-mgmt/upload-bank-wire-proof",$data);
	}
	/*
	@Desc: It's used to render the epin payment page as well as insert data into user registration table
	*/
	public function epinPayment()
	{
	   $data=null;	
	   _frontLayout("front-mgmt/epin-payment",$data);
	}
	/*
	@mandatory method for all mlm plan i.e generic method
	@author:Aditya
	@desc:It's used to regsiter the user and redirect them into userpanel
	*/
	public function registerUserViaEpin()
	{
		  if(epinUserRegistration())
		  {
		  	$registration_info=$this->session->userdata('registration_info');
		  	$username=$registration_info['sponsor_and_account_info']['username'];
		    $password=$registration_info['sponsor_and_account_info']['password'];
		    $this->session->unset_userdata('registration_info');
		    $this->session->unset_userdata('username');
		    $this->session->unset_userdata('password');
		  	$epin_code=$this->input->post('epin_code');
		  	
		  	$this->db->update('epin_meta',array('epin_status'=>'1','status_change_date'=>date('Y-m-d H:i:s'),'register_username'=>$username,'register_user_id'=>
			get_user_id($username)),array('epin_code'=>$epin_code));
		    redirect(site_url().'user/auth/login/'.$username."/".$password);
		    exit;
		  }
	}
	/*
	@Desc: It's registration test method
	*/
	public function registerTest()
	{
		testRegister();
		
		echo "user is registered successfully";
	}
	/*
	@Desc: It's used to view the personal information on ajax request for business type registration
	*/
	public function getPersonalInfoHtml()
	{
		$this->load->view("front-mgmt/get-personal-info");
	}
	
	public function isEpinValid()
	{
		$epin_code=$this->input->post("epin_code");
		$res=$this->db->select('*')->from('epin_meta')->where(array(
			'epin_code'=>$epin_code,
			'epin_status'=>'0'
			))->get();
		if($res->num_rows()>0)
		{
			echo true;
		}
		else 
		{
			echo false;
		}
	}
	public function check_valid_epin()
	{
		$epin_code=$this->input->post("epin_code");
		
		$registration_info=$this->session->userdata('registration_info');
		
		$pkg_amount=$registration_info['sponsor_and_account_info']['pkg_amount'];
		
		$res=$this->db->select('*')->from('epin_meta')->where(array(
			'epin_code'=>$epin_code,
			'epin_status'=>'0',
			'pkg_amount'=>$pkg_amount
			))->get();
			
		if($res->num_rows()<=0)
		{
			echo false;
		}
		else 
		{
			echo true;
		}
	}
	
	/*
	*/
	public function purchasePinRequest()
	{
		$data=array();
		if(!empty($this->input->post('btn')))
		{
			$full_name=$this->input->post("full_name");
			$email=$this->input->post("email");
			$mobile_no=$this->input->post("mobile_no");
            $image_upload_path='/images/';
	        $proof=adImageUpload($_FILES['proof'],1, $image_upload_path);
	        $this->db->insert('epin_request',array(
	        	'full_name'=>$full_name,
	        	'email'=>$email,
	        	'mobile_no'=>$mobile_no,
	        	'proof'=>$proof,
	        	));
		    $this->session->set_flashdata('flash_msg',"<h3 style='color:green;font-weight:bold'>Pin Request is submitted successfully</h3>");
		    redirect(site_url().'front/purchasePinRequest');
		}
	    _frontLayout("front-mgmt/purchase-pin",$data);
	}
	/*
	@author:Aditya
	@desc:It's used to display the About Us page
	*/
	public function aboutUs()
	{
	  $data=array();
	  $total_rows=$this->db->select('confidential_value')->from('confidential')->where(array('confidential_key'=>'about_us'))->get()->row();
	  $data['about_us']=$total_rows->confidential_value;
	  _frontLayout("front-mgmt/about-us",$data);
	}
	public function Gas()
	{
	  $data=array();
	  _frontLayout("front-mgmt/gas",$data);
	}
	public function ProjectDev()
	{
	  $data=array();
	  _frontLayout("front-mgmt/project",$data);
	}
	public function DigitalMoney()
	{
	  $data=array();
	  _frontLayout("front-mgmt/digital",$data);
	}
	public function BusinessNetworking()
	{
	  $data=array();
	  _frontLayout("front-mgmt/mlm",$data);
	}
	public function BusinessNetworkingBronze()
	{
	  $data=array();
	  _frontLayout("front-mgmt/business-networking-bronze",$data);
	}
	public function BusinessNetworkingSilver()
	{
	  $data=array();
	  _frontLayout("front-mgmt/business-networking-silver",$data);
	}
	public function BusinessNetworkingGold()
	{
	  $data=array();
	  _frontLayout("front-mgmt/business-networking-gold",$data);
	}
	public function BusinessNetworkingDiamond()
	{
	  $data=array();
	  _frontLayout("front-mgmt/business-networking-diamond",$data);
	}

	public function manage_stockist()
	{
	  $data=array();
	  $data['content']=$this->db->select('*')->from('tbl_site_content')->where('id',1)->get()->row_array();
	  _frontLayout("front-mgmt/manage-stockist",$data);
	}

	public function digital_currency(){
		$data=array();
	  _frontLayout("front-mgmt/digital-currency",$data);
	}

	public function turbine_plant(){
		$data=array();
	  _frontLayout("front-mgmt/turbine-plant",$data);
	}

	public function franchise(){
		$data=array();
	  _frontLayout("front-mgmt/franchise",$data);
	}

	public function repurchase_order(){
		$data=array();
	  _frontLayout("front-mgmt/repurchase-order",$data);
	}

	public function logistics(){
		$data=array();
	  _frontLayout("front-mgmt/logistics",$data);
	}

	public function view_product_details($id){
		$data['product']=$this->db->select('*')->from('eshop_products')->where(array('status'=>'1','id' => $id))->get()->row_array();
		_frontLayout("front-mgmt/view_product_details",$data);
	}

	public function Ecommerce()
	{
		$title = $this->input->post('search');
		if($title){
			$where = 'title LIKE "%'.$title.'%"';
		}else{
			$where = array('status'=>'1');
		}
	  $data=array();
	  $data['products']=$this->db->select('id,title,product_image,sub_images,old_price')->from('eshop_products')->where($where)->get()->result_array();
	  _frontLayout("front-mgmt/ecommerce",$data);
	}
	public function OrganicProducts()
	{
		$title = $this->input->post('search');
		if($title){
			$where = 'title LIKE "%'.$title.'%"';
		}else{
			$where = array('status'=>'1');
		}
		$data=array();
		$data['products']=$this->db->select('id,title,product_image,sub_images,new_price')->from('eshop_organic_products')->where($where)->get()->result_array();
	  _frontLayout("front-mgmt/organic",$data);
	}

	public function view_organic_p_details($id)
	{
		$data=array();
		$data['product']=$this->db->select('*')->from('eshop_organic_products')->where(array('status'=>'1','id' => $id))->get()->row_array();
		$data['cart'] = $this->session->userdata['cart'];
		$data['cart_product'] = [];
		
		
		foreach($data['cart'] as $k => $product){
			if($product['product_id'] == $data['product']['id']){
				$data['cart_product'] = $product;
			}
		}
	  _frontLayout("front-mgmt/view_organic_p_details",$data);
	}

	public function add_product_to_cart(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$post_data = $this->input->post();
		$product_id = $this->input->post('product_id');
		$product_type = $this->input->post('product_type');
		$quantity = $this->input->post('quantity');
		$cart = !empty ($this->session->userdata['cart']) ? $this->session->userdata['cart'] : [] ;
		$cart_itmes = [
			'product_id' => $product_id,
			'product_type' => $product_type,
			'quantity' => $quantity,
		];
		$exits_product = 0;
		if(!empty($cart)){
			foreach($cart as $k => $product){
				if($product['product_id'] == $cart_itmes['product_id']){
					$exits_product = 1;
					$product_key = $k;
					break;
				}
				$product_key = $k + 1;
			}
		}else{
			$product_key = 0;
		}
		
		if($exits_product == 1){
			$cart[$product_key] = $cart_itmes;
		}else{
			$cart[$product_key] = $cart_itmes;
		}

		$res['product_key'] = $product_key;
		$res['cart'] = $cart;
		$this->session->set_userdata('cart',$cart);
		$res['post_data'] = $post_data;
		$res['success'] = 1;
		$res['session'] = $this->session->userdata;
		$res['message'] = 'Product Added to Cart Successfully';

		echo json_encode($res);
	}
	public function get_cart_products(){
		$response['success'] = 1;
		$cart = !empty ($this->session->userdata['cart']) ? $this->session->userdata['cart'] : [] ;
		if(!empty($cart)){
			foreach($cart as $k => $product){
				$cart[$k]=$this->db->select('sku,title,id as product_id,old_price,product_image')->from('eshop_organic_products')->where(array('status'=>'1','id' => $product['product_id']))->get()->row_array();
				$cart[$k]['quantity'] = $product['quantity'];
			}
		} 
		echo json_encode($cart);
	}
	public function clear_session(){
		$this->session->unset_userdata('cart');
	}
	public function howItWorks()
	{
	  $data=array();
	  $total_rows=$this->db->select('confidential_value')->from('confidential')->where(array('confidential_key'=>'how_it_works'))->get()->row();
	  $data['about_us']=$total_rows->confidential_value;
	  _frontLayout("front-mgmt/how-it-works",$data);
	}
	public function howItWorksEmployee()
	{
	  $data=array();
	  $total_rows=$this->db->select('confidential_value')->from('confidential')->where(array('confidential_key'=>'how_it_works_employee'))->get()->row();
	  $data['about_us']=$total_rows->confidential_value;
	  _frontLayout("front-mgmt/how-it-works",$data);
	}
	public function privacyPolicy()
	{
	  $data=array();
	  $total_rows=$this->db->select('confidential_value')->from('confidential')->where(array('confidential_key'=>'privacy_policy'))->get()->row();
	  $data['about_us']=$total_rows->confidential_value;
	  $data['head'] = 'Privacy Policy';
	  _frontLayout("front-mgmt/how-it-works",$data);
	}
	public function termAndCond()
	{
	  $data=array();
	  $total_rows=$this->db->select('confidential_value')->from('confidential')->where(array('confidential_key'=>'terms_and_condition'))->get()->row();
	  $data['about_us']=$total_rows->confidential_value;
	  $data['head'] = 'Term & Conditions';
	  _frontLayout("front-mgmt/how-it-works",$data);
	}
	public function ourPackage()
	{
	  $data=array();
	  _frontLayout("front-mgmt/our-package");
	}
	public function faq()
	{
	  $data=array();
	  _frontLayout("front-mgmt/faq");
	}
	public function disclaimer()
	{
	  $data=array();
	  _frontLayout("front-mgmt/disclaimer");
	}
	public function services()
	{
	  $data=array();
	  _frontLayout("front-mgmt/services");
	}
	public function contactUs()
	{
		$data=array();
		if($this->input->server('REQUEST_METHOD') == "POST"){
			$data = $this->security->xss_clean($this->input->post());
			$this->form_validation->set_rules('email','Email','trim|required');
			$this->form_validation->set_rules('name','Name','trim|required');
			$this->form_validation->set_rules('phone','Phone','trim|required|numeric');
			$this->form_validation->set_rules('message','Message','trim|required');
			if($this->form_validation->run() != false){
				$userData = [
					'name' => $data['name'],
					'email' => $data['email'],
					'phone' => $data['phone'],
					'message' => $data['message'],
				];
				$res = $this->db->insert('contact_us',$userData);
				if($res){
					sendNewContactUsEmailToUser( $data['name'],$data['email'],$data['message']);
					$this->session->set_flashdata('message','<span style="color:green">You enquiry is successfully submitted</span>');
					redirect(base_url('contact-us'));
				}else{
					$this->session->set_flashdata('message','<span style="color:red">Network error!</span>');
					redirect(base_url('contact-us'));
				}
			}
	  	}
        $data=array();
        $total_rows=$this->db->select('confidential_value')->from('confidential')->where(array('confidential_key'=>'contact'))->get()->row();//pr($total_rows);die("sdfsd");
        $data['about_us']=$total_rows->confidential_value;
        $data['head'] = 'Term & Conditions';

	  	_frontLayout("front-mgmt/contact-us",$data);
	}

    public function compensationPlan()
	{
	  $data=array();
	  _frontLayout("front-mgmt/compensation-plan");
	}
	
 public function news()
	{
	  $data=array();
	  _frontLayout("front-mgmt/news");
	}
	/*
	@author:gnisoft(kush)
	@date:1st Dec 2020
	@desc:to Pin Purchase front page
	@return:array
	*/
		/*
	@Desc: It's used to generate unique deposit request id
	*/
	public function generateUniqueEpinRequestId()
	{
	    $random_number="R".mt_rand(100000, 999999);
	    if($this->db->select('request_id')->from(' epin')->where('request_id',$random_number)->get()->num_rows()>0)
	    {
	      $this->generateUniqueEpinRequestId();
	    }
	    return $random_number;
	}
	
	public function epin_purchase()
	{
		$data=array();
		$data['packages']=$this->front_model->getAllActivePackage(); 
		if(!empty($this->input->post()))
		{
			$form_data=$this->input->post(null);
			$name=$form_data['name'];
			$email=$form_data['email'];
			$phone=$form_data['phone'];
			$username=$form_data['username'];
			$packages=$form_data['package_id'];
			$quantity=$form_data['quantity'];
			$user=get_user_details($username);
			$this->session->set_flashdata('message','form submitted');
			if($user->username == $username)
			{
				$request_id=$this->generateUniqueEpinRequestId();
				$pack_request = [];
				$total_amount = 0 ;
				foreach($packages as $k => $pack){
					if(!empty($quantity[$k])){
						$pack_request[$k]['product_id'] = $pack;
						$pack_request[$k]['quantity'] = $quantity[$k];
						$pack_request[$k]['price'] = $data['packages'][$k]->amount;
						$pack_request[$k]['epin_amount'] = $data['packages'][$k]->amount *$quantity[$k];
						$total_amount = $total_amount + ($data['packages'][$k]->amount *$quantity[$k]);							
					}
				}
				$pin_request = [
					'request_id'=>$request_id,
					'mobile_no'=>$phone,
					'email'=>$email,
					'full_name'=>$name,
					'user_id'=>$user->user_id,
					'total_amount'=>$total_amount,
				];
				$res = $this->db->insert('epin_request',$pin_request);
				if($form_data['payment_method'] == 'Debit Card'){
					foreach($pack_request as $k => $p){
						$purchase_pin_data=array(
							'request_id'=>$request_id,
							'user_id'=>$user->user_id,
							'pkg_id'=>$p['product_id'],
							'pkg_amount'=>$p['price'],
							'no_of_epin'=>$p['quantity'],
							'epin_amount'=>$p['epin_amount'],
							'payment_method'=>"2", //'0'=>Ewallet, '1'=>Bank/wire or manual
						);
						$this->db->insert('epin',$purchase_pin_data);
					}
					$data['email'] = $email;
					$data['amount'] = $total_amount;
					redirect(site_url('front/pin_payment/'.$request_id),$data);
					exit();
				}else{

					$image_upload_path='/images/';
					$bank_wire_proof_image=adImageUpload($_FILES['bank_wire_proof_image'],1, $image_upload_path);
					if(!empty($bank_wire_proof_image)){
						foreach($pack_request as $k => $p){
							$purchase_pin_data=array(
								'request_id'=>$request_id,
								'user_id'=>$user->user_id,
								'pkg_id'=>$p['product_id'],
								'pkg_amount'=>$p['price'],
								'no_of_epin'=>$p['quantity'],
								'epin_amount'=>$p['epin_amount'],
								'payment_method'=>"1", //'0'=>Ewallet, '1'=>Bank/wire or manual
								'bank_wire_proof_image'=>$bank_wire_proof_image,
							);
							$pin_result = $this->db->insert('epin',$purchase_pin_data);
						}
						// echo 'EPin Request Submitted Successfully';   
						$this->session->set_flashdata('message','EPin Request Submitted Successfully');
					}else{
						$this->session->set_flashdata('message','Please Upload a valid Proof');
					}
				}
			}else{
				$this->session->set_flashdata('message','Please enter valid username!');
			}
			redirect(site_url('front/epin_purchase/'));
			exit();
		}
	  _frontLayout("front-mgmt/epin-purchase",$data);
	}
	public function pin_payment($pin_request_id){

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
		$data['request'] = $this->db->select('*')->from('epin_request')->where('request_id',$pin_request_id)->get()->row_array();
		$this->session->set_userdata('epin_purchase',$data['request']);
		_frontLayout("front-mgmt/pin-payment",$data);
	}
	/*
	@mandatory method for all mlm plan i.e generic method
	@desc:It's used to display the registration method option example ewallet or epin selection for registration
	*/
	
	
	public function EpinpaystackPayment()
	{
		$result=(!empty($_POST))?$_POST:$_GET;
		$transaction_no=$result['reference'];
		$request = $this->session->userdata['epin_purchase'];
		$transaction_report=$this->verifyTransaction($transaction_no);
		if(!empty($transaction_report->status) && $transaction_report->status==1 )
		{
			// $result=PaystackUserRegistration();
			// if($result['status'])
			// {
				
				
				
				$paydata = array(
					'user_id' => $request['user_id'],
					'gateway_response' => $transaction_report->data->gateway_response,
					'status' => $transaction_report->status,
					'paid_at' => $transaction_report->data->paid_at,
					'amount' => $transaction_report->data->amount,
					'reference' => $transaction_report->data->reference,
					'pay_date' => date('Y-m-d'),
					'refrence_no' => $transaction_no
				);
				
				
				$this->db->insert('paystack_data', $paydata);
				
				$this->db->update('epin',array('request_status'=>'1','response_date'=>date('Y-m-d H:i:s')),array('request_id'=>$request['request_id']));
				$this->db->update('epin_request',array('status'=>'1'),array('request_id'=>$request['request_id']));
				$epin_infos=$this->db->select('*')->from('epin')->where(['request_id'=>$request['request_id']])->get()->result();
					foreach($epin_infos as $k => $epin_info){
						for($i=1;$i<=$epin_info->no_of_epin;$i++)
						{
							$pin_arr = array(
								'epin_request_id'=>$epin_info->request_id,
								'sequence_number'=>$i,
								'epin_code'=>$this->generateUniqueEpinCode(),
								'user_id'=>$epin_info->user_id,
								'source_user_id'=>'paystack',
								'pkg_id'=>$epin_info->pkg_id,
								'pkg_amount'=>$epin_info->pkg_amount,
								'epin_status'=>'0',//0=>pending
							);
							$this->db->insert('epin_meta',$pin_arr);
						}
						
					}
					$this->session->set_flashdata("error_msg", '<span class="text-semibold">Pin Purchased Successfully</span>');
					redirect(site_url().'front/epin_purchase');
					exit;
				// }
				
		}
		else
		{
			$this->session->set_flashdata("error_msg", '<span class="text-semibold">Something wrong please try again later</span>');
			redirect(site_url()."front/epin_purchase");
			exit();
		}
		
		
		
	}

		/*
	@Desc: It's used to generate unique epin id
	*/
	public function generateUniqueEpinCode()
	{
	    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
	    // $random_number="JET".mt_rand(100000, 999999);
	    $random_number= substr(str_shuffle($str_result),0, 18);
	    if($this->db->select('epin_code')->from(' epin_meta')->where('epin_code',$random_number)->get()->num_rows()>0)
	    {
	      $this->generateUniqueEpinCode();
	    }
	    return $random_number;
	}

	public function wallet_fund_purchase(){
		$data = [];		
		$data=array();
		if(!empty($this->input->post()))
		{
			$form_data=$this->input->post(null);
			$name=$form_data['name'];
			$email=$form_data['email'];
			$phone=$form_data['phone'];
			$username=$form_data['username'];
			$user=get_user_details($username);
			if($user->username == $username)
			{
				// $request_id=$this->generateUniqueEpinRequestId();
				if($form_data['payment_method'] == 'Debit Card'){
					$paymentArr = array(
						'deposit_id'=>$this->generateUniqueDepositRequestId(),
						'user_id'=>$user->user_id,
						'amount'=>$form_data['amount'],
						'name'=>$phone,
						'email'=>$email,
						'name'=>$name,
						'title'=>'',
						'status' => '0',
						'payment_method' => '2'
					);
					$this->db->insert('deposit_wallet_amount_request',$paymentArr);
					$data['email'] = $email;
					$data['amount'] = $total_amount;
					redirect(site_url('front/wallet_payment/'.$paymentArr['deposit_id']));
					exit();
				}else{
					$image_upload_path='/images/';
					$deposit_proof=adImageUpload($_FILES['bank_wire_proof_image'],1, $image_upload_path);
					if($deposit_proof != ''){
						$deposit_proof=(!empty($deposit_proof))?$deposit_proof:'';
						$paymentArr = array(
							'deposit_id'=>$this->generateUniqueDepositRequestId(),
							'user_id'=>$user->user_id,
							'amount'=>$form_data['amount'],
							'name'=>$phone,
							'email'=>$email,
							'name'=>$name,
							'title'=>'',
							'status' => '0',
							'payment_method' => '1',
							'file_proof'=>$deposit_proof
						);
						$this->db->insert('deposit_wallet_amount_request',$paymentArr);
						// echo 'EPin Request Submitted Successfully';   
						$this->session->set_flashdata('message','Wallet Request Submitted Successfully');
						redirect(site_url().'front/wallet_fund_purchase');
						exit;

					}else{
						$this->session->set_flashdata('message','Please Choose a valid Proof');
						redirect(site_url().'front/wallet_fund_purchase');
						exit;
					}
				}
			}else{
				$this->session->set_flashdata('message','Please enter valid username!');
			}
			redirect(site_url('front/epin_purchase/'));
			exit();
		}
		_frontLayout("front-mgmt/wallet-fund-purchase",$data);
	}
	public function wallet_payment($deposit_id){

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
		$data['request'] = $this->db->select('*')->from('deposit_wallet_amount_request')->where('deposit_id',$deposit_id)->get()->row_array();
		$this->session->set_userdata('wallet_purchase_paystack',$data['request']);
		_frontLayout("front-mgmt/wallet_purchase_paystack",$data);
	}
	public function WalletpaystackPayment(){
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
	public function generateUniqueDepositRequestId()
	{
	    $random_number="D".mt_rand(100000, 999999);
	    if($this->db->select('deposit_id')->from('deposit_wallet_amount_request')->where('deposit_id',$random_number)->get()->num_rows()>0)
	    {
	      $this->generateUniqueDepositRequestId();
	    }
	    return $random_number;
	}
	public function other_fund_purchase(){
		$data = [];		
		$data=array();
		if(!empty($this->input->post()))
		{
			$form_data=$this->input->post(null);
			$name=$form_data['name'];
			$email=$form_data['email'];
			$phone=$form_data['phone'];
			$username=$form_data['username'];
			$user=get_user_details($username);
			if($user->username == $username)
			{
				if($form_data['payment_method'] == 'Debit Card'){
					$paymentArr = array(
						'request_id'=>$this->generateUniqueOtherDepositRequestId(),
						'user_id'=>$user->user_id,
						'amount'=>$form_data['amount'],
						'name'=>$phone,
						'email'=>$email,
						'phone'=>$phone,
						'name'=>$name,
						'purpose'=>$form_data['purpose'],
						'status' => '0',
						'payment_method' => '2'
					);
					$this->db->insert('other_payment_requests',$paymentArr);
					redirect(site_url('front/other_wallet_payment/'.$paymentArr['request_id']));
					exit();
				}else{
					$image_upload_path='/images/';
					$deposit_proof=adImageUpload($_FILES['bank_wire_proof_image'],1, $image_upload_path);
					if(!empty($deposit_proof)){
						$deposit_proof=(!empty($deposit_proof))?$deposit_proof:'';
						$paymentArr = array(
							'request_id'=>$this->generateUniqueOtherDepositRequestId(),
							'user_id'=>$user->user_id,
							'amount'=>$form_data['amount'],
							'name'=>$phone,
							'email'=>$email,
							'name'=>$name,
							'phone'=>$phone,
							'purpose'=>$form_data['purpose'],
							'status' => '0',
							'payment_method' => '1',
							'file_proof'=>$deposit_proof
						);
						$this->db->insert('other_payment_requests',$paymentArr);
						// echo 'EPin Request Submitted Successfully';   
						$this->session->set_flashdata('message','Your Wallet Request for '.$form_data['purpose'].' Submitted Successfully');
						redirect(site_url().'front/other_fund_purchase');
						exit;
					}else{
						$this->session->set_flashdata('message','Please choose a valid Proof');
						redirect(site_url('front/epin_purchase/'));
						exit();
					}
				}
			}else{
				$this->session->set_flashdata('message','Please enter valid username!');
			}
			redirect(site_url('front/epin_purchase/'));
			exit();
		}
		_frontLayout("front-mgmt/other-fund-purchase",$data);
	}
	public function other_wallet_payment($request_id){

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
		$data['request'] = $this->db->select('*')->from('other_payment_requests')->where('request_id',$request_id)->get()->row_array();
		$this->session->set_userdata('other_wallet_purchase_paystack',$data['request']);
		_frontLayout("front-mgmt/other_wallet_purchase_paystack",$data);
	}
	public function OtherWalletpaystackPayment(){
		$result=(!empty($_POST))?$_POST:$_GET;
		$transaction_no=$result['reference'];
		$r = $this->session->userdata['other_wallet_purchase_paystack'];
		// echo'<pre>';
		// print_r($r);
		// echo'</pre>';
		$transaction_report=$this->verifyTransaction($transaction_no);
		if(!empty($transaction_report->status) && $transaction_report->status==1 )
		{
				
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
				
				$this->db->update('other_payment_requests',array('status'=>'1', 'response_date'=>date("Y-m-d H:i:s")),array('request_id'=>$r['request_id']));
				$this->session->set_flashdata("message", '<span class="text-semibold">Wallet Purchased Successfully</span>');
				redirect(site_url().'front/other_fund_purchase');
				exit;
		}
		else
		{
			$this->session->set_flashdata("error_msg", '<span class="text-semibold">Something wrong please try again later</span>');
			redirect(site_url()."front/other_fund_purchase");
			exit();
		}
	}
	public function generateUniqueOtherDepositRequestId()
	{
	    $random_number="O".mt_rand(100000, 999999);
	    if($this->db->select('request_id')->from('other_payment_requests')->where('request_id',$random_number)->get()->num_rows()>0)
	    {
	      $this->generateUniqueOtherDepositRequestId();
	    }
	    return $random_number;
	}
	public function banners(){
		$data = [];
		_frontLayout("front-mgmt/banners",$data);
	}
	public function pictures(){
		$data = [];
		_frontLayout("front-mgmt/pictures",$data);
	}
	public function latest_news(){
		$data = [];
		_frontLayout("front-mgmt/latest_news",$data);
	}
	public function old_news(){
		$data = [];
		_frontLayout("front-mgmt/old_news",$data);
	}
	public function inspirations(){
		$data = [];
		_frontLayout("front-mgmt/inspirations",$data);
	}
	public function promotions(){
		$data = [];
		_frontLayout("front-mgmt/promotions",$data);
	}
	public function videos(){
		$data = [];
		_frontLayout("front-mgmt/videos",$data);
	}
	public function downloads(){
		$data = [];
		_frontLayout("front-mgmt/downloads",$data);
	}
	public function sms_test(){

		/* Variables with the values to be sent. */

		$owneremail="xbulonnetwork@gmail.com";
		$subacct="Xbulon";
		$subacctpwd="xbulon@1819";
		$sendto="+2348034922513"; /* destination number */
		$sendto="+917710562000"; /* destination number */
		$sender="Xbulon Network"; /* sender id */
		$message="Test SMS";

		/* message to be sent */
		echo $url = "http://www.smslive247.com/http/index.aspx?"
		."cmd=sendquickmsg"
		. "&owneremail=" . UrlEncode($owneremail)
		. "&subacct=" . UrlEncode($subacct)
		. "&subacctpwd=" . UrlEncode($subacctpwd)
		. "&sendto=" . UrlEncode($sendto)
		. "&message=" . UrlEncode($message)
		. "&sender=" . UrlEncode($sender);
		/* call the URL */
		$time_start = microtime(true);if ($f = @fopen($url, "r"))
		{
		$answer = fgets($f, 255);
		echo "[$answer]";}
		else
		{
		echo "Error: URL could not be opened.";
		}   
		echo "<br>"  ;
		$time_end = microtime(true);
		$time = $time_end - $time_start;

		echo "Finished in $time seconds\n";

	}
}//end class

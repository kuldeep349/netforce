<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
@package user/auth
*/
class Auth extends CI_Controller 
{
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		/***/
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		/***/
		$this->load->model("auth_model","auth");
		$this->load->model("account_model");
	}
	/*
     @it's used for displaying login page if user is not already login otherwise redirect into user back-office
	*/
	public function index()
	{
		$authInfo=$this->session->all_userdata();
		if(is_array($authInfo) && array_key_exists("auth",$authInfo) || array_key_exists("authUser",$authInfo))
		{
			if($authInfo['auth'] || $authInfo['authUser'])
			{
				
				$userType=$authInfo['userType'];
				
				if($userType==1 || $userType==2)
				{
				 redirect(site_url()."user/");	
				}
			}
			else 
			{
				$this->load->view("auth-mgmt/login");
			}
		}
		
		else 
		{
		    $this->load->view("auth-mgmt/login");
		}
    }	
    /*
      @it's used check weather the enter user exist or not if exist then make them login
    */	
	public function login($username=null,$password=null)
	{
	  $registerData=$this->session->all_userdata();
	  if(!empty($registerData['username']) && $registerData['username']!='')
	  {
	  $username=$registerData['username'];
	  }
	  else 
	  {
	  $username=(!empty($this->input->post("username")))?$this->input->post("username"):$username;
	  }
	  if(!empty($registerData['password']) && $registerData['password']!='')
	  {
	  	$password=$registerData['password'];
	  }
	  else 
	  {
      $password=(!empty($this->input->post("password")))?$this->input->post("password"):$password;
      }
	  if($this->auth->userExists(mysql_escape_str($username),mysql_escape_str($password)))
	  {
	       $query1 = $this->db->get_where('user_registration', array('user_id'=>$this->auth->user_id,'active_status'=>'0'));
          //echo $query1->num_rows();die();
        	if($query1->num_rows() > 0)
        	{
                $msg='<h5 style="color:red">You Can Not Access this Account, Please Contact Admin</h5>';
    		    $this->session->set_flashdata('res',$msg);
    		    redirect(site_url()."user/auth");
    		    exit;
        	}
        	else
        	{
        	    $userdata = array
    		              (
    					   'username'         => $this->auth->userName,
    					   'password'         => $this->auth->userPassword,
    					   'userType'         =>2,
    					   'auth'             => TRUE,
    					   'SD_User_Name'     =>$this->auth->SD_User_Name,
    					   'user_id'          =>$this->auth->user_id,
    					   'userpanel_user_id'=>$this->auth->userpanel_user_id
    			           );
    		  $this->db->update('user_registration',array('current_login_status'=>'1'),array('user_id'=>$this->auth->user_id));            
    		  $this->session->set_userdata($userdata);
    		  redirect(site_url()."user/");
    		  exit;
        	}
		  
	  }
	  else 
	  {
		  $msg='<h5 style="color:red">Sorry entered username/password is wrong</h5>';
		  $this->session->set_flashdata('res',$msg);
		  redirect(site_url()."user/auth");
		  exit;
	  }
	}

	public function loginViaAdmin($username=null,$password=null)
	{
	//   $registerData=$this->session->all_userdata();
	//   if(!empty($registerData['username']) && $registerData['username']!='')
	//   {
	//   $username=$registerData['username'];
	//   }
	//   else 
	//   {
	  $username=(!empty($this->input->get("username")))?$this->input->get("username"):$username;
	  $password=(!empty($this->input->get("password")))?$this->input->get("password"):$password;
	//   }
	//   if(!empty($registerData['password']) && $registerData['password']!='')
	//   {
	//   	$password=$registerData['password'];
	//   }
	//   else 
	//   {
    //   $password=(!empty($this->input->post("password")))?$this->input->post("password"):$password;
    //   }
	  if($this->auth->userExists(mysql_escape_str($username),mysql_escape_str($password)))
	  {
	       $query1 = $this->db->get_where('user_registration', array('user_id'=>$this->auth->user_id,'active_status'=>'0'));
          //echo $query1->num_rows();die();
        	if($query1->num_rows() > 0)
        	{
                $msg='<h5 style="color:red">You Can Not Access this Account, Please Contact Admin</h5>';
    		    $this->session->set_flashdata('res',$msg);
    		    redirect(site_url()."user/auth");
    		    exit;
        	}
        	else
        	{
        	    $userdata = array
    		              (
    					   'username'         => $this->auth->userName,
    					   'password'         => $this->auth->userPassword,
    					   'userType'         =>2,
    					   'authUser'             => TRUE,
    					   'SD_User_Name'     =>$this->auth->SD_User_Name,
    					   'user_id'          =>$this->auth->user_id,
    					   'userpanel_user_id'=>$this->auth->userpanel_user_id
    			           );
    		  $this->db->update('user_registration',array('current_login_status'=>'1'),array('user_id'=>$this->auth->user_id));            
    		  $this->session->set_userdata($userdata);
    		  redirect(site_url()."user/");
    		  exit;
        	}
		  
	  }
	  else 
	  {
		  $msg='<h5 style="color:red">Sorry entered username/password is wrong</h5>';
		  $this->session->set_flashdata('res',$msg);
		  redirect(site_url()."user/auth");
		  exit;
	  }
	}

	/*
      @it's used check weather the enter user exist or not if exist then make them login
    */	
	public function loginshop($username=null,$password=null)
	{
	  $registerData=$this->session->all_userdata();
	  if(!empty($registerData['username']) && $registerData['username']!='')
	  {
	  $username=$registerData['username'];
	  }
	  else 
	  {
	  $username=(!empty($this->input->post("username")))?$this->input->post("username"):$username;
	  }
	  if(!empty($registerData['password']) && $registerData['password']!='')
	  {
	  	$password=$registerData['password'];
	  }
	  else 
	  {
      $password=(!empty($this->input->post("password")))?$this->input->post("password"):$password;
      }
	  if($this->auth->userExists(mysql_escape_str($username),mysql_escape_str($password)))
	  {
		  
		  $userdata = array
		              (
					   'username'         => $this->auth->userName,
					   'password'         => $this->auth->userPassword,
					   'userType'         =>2,
					   'auth'             => TRUE,
					   'SD_User_Name'     =>$this->auth->SD_User_Name,
					   'user_id'          =>$this->auth->user_id,
					   'userpanel_user_id'=>$this->auth->userpanel_user_id
			           );
		  $this->db->update('user_registration',array('current_login_status'=>'1'),array('user_id'=>$this->auth->user_id));            
		  $this->session->set_userdata($userdata);
		  redirect(site_url()."estore/viewCart");
		  //redirect(site_url()."estore/ewalletPaymentConfirmViaReg");
		  exit;
	  }
	  else 
	  {
		  $msg='<h5 style="color:red">Sorry entered username/password is wrong</h5>';
		  $this->session->set_flashdata('res',$msg);
		  redirect(site_url()."user");
		  exit;
	  }
	}
    /*
      @it's used check weather the enter user exist or not if exist then make them login
    */	
    public function frontUserLogin()
    {
	  $username=$this->input->post("username");
	  $password=$this->input->post("password");
	  $shop_login=$this->input->post("shop_login");
	  if($this->auth->userExists(mysql_escape_str($username),mysql_escape_str($password)))
	  {
		  $userdata = array
		              (
					   'username'         => $this->auth->userName,
					   'password'         => $this->auth->userPassword,
					   'userType'         =>2,
					   'auth'             => TRUE,
					   'SD_User_Name'     =>$this->auth->SD_User_Name,
					   'user_id'          =>$this->auth->user_id,
					   'userpanel_user_id'=>$this->auth->userpanel_user_id
			           );
		  $this->db->update('user_registration',array('current_login_status'=>'1'),array('user_id'=>$this->auth->user_id));       
		  $this->session->set_userdata($userdata);
		  if(!empty($shop_login) && $shop_login=='true')
		  {
			  $cart_item=$this->session->userdata('cart');
			  if(!empty($cart_item) && count($cart_item)>0)
			  {
				redirect(site_url().'estore/delivery_address/');
				exit;  
			  }
			  else 
			  {
				redirect(site_url().'user/');
				exit;  
			  }
		  }
		  else 
		  {
			 redirect(site_url().'user/');
		     exit;  
		  }
	  }
	  else 
	  {
		  if(!empty($shop_login) && $shop_login=='true')
		  {
			$msg='<h5>Sorry entered username/password is wrong!</h5>';
			$this->session->set_flashdata('error_msg',$msg);
			redirect(site_url()."estore/login");
		    exit; 
		  }
		  else 
		  {
			$msg='<h5 style="color:red">Sorry entered username/password is wrong</h5>';
			$this->session->set_flashdata('res',$msg);
			redirect(site_url()."login");
		    exit; 
		  }
	  }
    }

	/*
      @it's used to logout the user
    */	
	public function logout(){
		
        $this->db->update('user_registration',array('current_login_status'=>'0'),array('user_id'=>$this->session->userdata('user_id')));
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) 
		{
			$this->session->unset_userdata($key);
		}
		$msg='<h5 style="color:green">you are successfully logged out</h5>';
		$this->session->set_flashdata('res',$msg);
		//$this->session->sess_destroy();
		redirect(site_url().'user');
		exit;
	}//end method
	public function username_check($username)
    {
        if(!$this->account_model->isUserExist($username))
        {
            $this->form_validation->set_message('username_check', 'Sorry Username does not exist!');
            return FALSE;
        }
        else
        {
        	return TRUE;
        }
    }//end method
	// public function forgotPassword()
	// {
	// 	if(!empty($this->input->post('btn')))
	// 	{
	// 		$username=$this->input->post('username');
	// 		$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
	// 		if ($this->form_validation->run() == FALSE)
    //         {
    //             $this->load->view("auth-mgmt/forgot-password-username");
    //         }
    //         else
    //         {
				
	//             $forgot_password_code=mt_rand(100000, 999999);
	// 		    $this->session->set_userdata("forgot_password_code", $forgot_password_code);
	// 		    $this->session->set_userdata("username", $username);
	// 		    $email_info=$this->db->select('email')->from('user_registration')->where('username',$username)->get()->row();
	// 		    $email=$email_info->email;
	// 			sendForgotPasswordEmailLinkToUser($email,$forgot_password_code);
	// 		    redirect(site_url().'user/auth/forgotPasswordNotify/');
	// 		    exit;
    //         }
	// 	}
	// 	$this->load->view("auth-mgmt/forgot-password-username");
	// }//end method

	public function forgotPassword()
	{
		if(!empty($this->input->post('btn')))
		{
			$username=$this->input->post('username');
			$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
			if ($this->form_validation->run() == FALSE)
            {
                $this->load->view("auth-mgmt/forgot-password-username");
            }
            else
            {
			    $user_info=$this->db->select('user_id,username,password,t_code,email')->from('user_registration')->where('username',$username)->get()->row();
				// $email=$user_info->email;
				// $data['userid'] = $user_info->user_id;
				// $data['username'] = $user_info->username;
				// $data['password'] = $user_info->password;
				// $data['email'] = $user_info->email;
				// $this->send_email($email,'Forget Password Mail',$data);

				$email_data['from']='info@xbulon.com';
				$email_data['to']=$user_info->email;
				$email_data['subject']='Forget Password Mail';
				$email_data['userid']=$user_info->userid;
				$email_data['username']=$user_info->username;
				$email_data['password'] = $user_info->password;
				$email_data['t_code'] = $user_info->t_code;
				$email_data['email']=$email;
				$email_data['email-template']='forgot-password-email-to-user';

				_sendEmail($email_data);
				$this->session->set_flashdata('res','Your account details sent on registered Email Address');
			    redirect(site_url().'user/auth/forgotPassword/');
			    exit;
            }
		}
		$this->load->view("auth-mgmt/forgot-password-username");
	}

	private function send_email($email,$subject,$message) {
        date_default_timezone_set('Asia/kolkata');
		$this->load->library('email');
		$config = array();
        $config = array(
            'charset' => 'ISO-8859-1',
            'wordwrap' => TRUE,
            'mailtype' => 'html'
        );
		// $config['protocol'] = 'smtp';
		// $config['smtp_host'] = 'xxx';
		// $config['smtp_user'] = 'xxx';
		// $config['smtp_pass'] = 'xxx';
		// $config['smtp_port'] = 25;
        $this->email->initialize($config);
        $this->email->from('info@xbulon.com', 'xbulon');
        $this->email->to($email);
        $this->email->subject($subject);
        $response['message'] = $message;
        $response['response'] = 'Your Account Details';
        $this->load->view('email-template/contact-us', $response);
        $body = $this->load->view('email-template/forget-password', $response, TRUE);
        $this->email->message($body);
        if($this->email->send()){
            return TRUE;
        }else{
           return FALSE;
        }
	}

	public function forgotPasswordNotify()
	{
		if(!empty($this->session->userdata('forgot_password_code')))
		{
			echo '<a href="'.site_url().'user/auth/resetPassword/'.$this->session->userdata('forgot_password_code').'">click</a>';
			$this->load->view('auth-mgmt/forgot-password-notify');
		}
		else 
		{
			redirect(site_url()."user/auth/login");
			exit;
		}
	}//end method
	public function resetPassword($forgot_password_code=null)
	{
		if(!empty($this->input->post('btn')))
		{
			$username=$this->session->userdata('username');
			$password=$this->input->post('password');
			$this->db->update("user",array('password'=>$password),array('username'=>$username));
			redirect(site_url()."user/auth/changePasswordConfirmation");
			exit;

		}
		if($forgot_password_code==$this->session->userdata('forgot_password_code'))
		{
			$this->load->view('auth-mgmt/reset-password');
		}
		else 
		{
			$this->session->set_flashdata('res','Sorry your forgot password code is expired!');
			redirect(site_url()."user/auth/login");
			exit;
		}
	}//end method
	public function changePasswordConfirmation(){
		$this->load->view('auth-mgmt/change-password-confirmation');
	}//end method
	
	public function eshop_logout(){
		
        $this->db->update('user_registration',array('current_login_status'=>'0'),array('user_id'=>$this->session->userdata('user_id')));
		
		$userdata = array( 'username'=>'',         
					       'password'=>'',        
					       'userType'=>'',        
					       'auth'=>'',            
					       'SD_User_Name'=>'',    
					       'user_id'=>'',         
					       'userpanel_user_id'=>''
			             );
		$this->session->unset_userdata($userdata);				 
		redirect(site_url().'estore');
		exit;
	}//end method
}//end class

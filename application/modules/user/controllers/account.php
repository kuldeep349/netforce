<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package user/account
*/
class Account extends Common_Controller 
{
	private $user_id;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		user_auth();
		$this->user_id=$this->session->userdata('user_id');
		$this->load->helper("layout_helper");
		$this->load->model("account_model");
	} 
	/* end method */
	public function upgradeProfile()
	{
		$user_id=$this->session->userdata('user_id');
		if(!empty($this->input->post('btn')))
		{
			//pr($_POST); pr($_FILES);exit;
			$pay_mode=$this->input->post('pay_mode');
			$t_password=$this->input->post('t_password');
			$upgrade_to=$this->input->post('upgrade_to');
			// get package amount
	        $package_info=$this->db->select('*')->from('package')->where('id',$upgrade_to)->get()->row();
	        $package_amount=$package_info->amount;
			if($pay_mode=='bank')
			{
			    $old_pkg=$this->db->select('pkg_id,pkg_amount,ref_id')->from('user_registration')->where(array('user_id'=>$user_id))->get()->row();
			        $pkg_id=$old_pkg->pkg_id;
			        $pkg_amount=$old_pkg->pkg_amount;
			        $sponser_id=$old_pkg->ref_id;
			        
			    $image_upload_path='/images/';
				$profile_pic=adImageUpload($_FILES['t_password'],1, $image_upload_path);
				if($profile_pic != ''){
					$insertdata=array(
						'pay_mode'=>$pay_mode,
						'upgrade_to'=>$upgrade_to,
						'upgrade_amount'=>$package_amount,
						'pkg_id'=>$pkg_id,
						'pkg_amount'=>$pkg_amount,
						'user_id'=>$user_id,
						'proof'=>$profile_pic,
						'request_date'=>date('Y-m-d')
					);
					$this->db->insert('upgrade_request',$insertdata);
					$this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Upgrade Membership Request Sent To Admin Successfully.</h5>');
					redirect(site_url()."user/account/upgradeProfile"); exit;

				}else{
					$this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Please choose valid proof.</h5>');
					redirect(site_url()."user/account/upgradeProfile");  exit;
				}
			}
			if($pay_mode=='wallet')
			{
			    // check user wallet balance and check user transaction password
			    $countpass=$this->db->select('id')->from('user_registration')->where(array('user_id'=>$user_id,'t_code'=>$t_password))->get()->num_rows();
			    if($countpass)
			    {
			        $old_pkg=$this->db->select('pkg_id,pkg_amount,ref_id')->from('user_registration')->where(array('user_id'=>$user_id))->get()->row();
			        $pkg_id=$old_pkg->pkg_id;
			        $pkg_amount=$old_pkg->pkg_amount;
			        $sponser_id=$old_pkg->ref_id;
			        // check wallet balance
			        $payable_amount=$package_amount-$pkg_amount;
			        $mainwallet=$this->db->select('*')->from('final_e_wallet')->where(array('user_id'=>$user_id))->get()->row();
			        $balance=$mainwallet->amount;
			        if($balance>0 && $balance>=$payable_amount)
			        {
			            // get final balance
			            $final_balance=$balance-$payable_amount;
			            $this->db->update('final_e_wallet',array('amount'=>$final_balance),array('user_id'=>$user_id));
			            $this->db->insert('credit_debit',array(
                    	    'transaction_no'=>generateUniqueTranNo(),
                    	    'user_id'=>$user_id,
                    	    'credit_amt'=>'0',
                    	    'debit_amt'=>$payable_amount,
                    	    'balance'=>$final_balance,
                    	    'admin_charge'=>'0',
                    		'pkg_id'=>$upgrade_to,
                    	    'receiver_id'=>$user_id,
                    	    'sender_id'=>$user_id,
                    	    'receive_date'=>date('d-m-Y'),
                    	    'ttype'=>'Package Upgrade',
                    	    'tran_description'=>'Package Upgrade by '.$user_id,
                    	    'status'=>'0',
                    	    'payment_method'=>'1',
                    	    'payment_method_name'=>'E-wallet',
                    	    'current_url'=>site_url(),
                    	    'reason'=>'1'
                            ));
                            $this->db->update('user_registration',array('pkg_id'=>$upgrade_to,'pkg_amount'=>$package_amount),array('user_id'=>$user_id));
                            $purchase_date=date('Y-m-d');
                            /////Inserting Data into user_package_log table///////////
                            $this->db->insert('user_package_log',array(
                            	'user_id'=>$user_id,
                            	'old_package_id'=>$pkg_id,
                            	'new_package_id'=>$upgrade_to,
                            	'amount'=>$payable_amount,
                            	'active_status'=>'1',
                            	'purchased_date'=>date('Y-m-d H:i:s')
                            	));
                        $this->setwelcomebonus($pkg_amount,$upgrade_to,$package_amount,$sponser_id,$user_id);	
                        $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Upgrade Membership Successfully.</h5>');
		                redirect(site_url()."user/account/upgradeProfile");exit;
			        }
			        else
			        {
			            $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Sorry! No Sufficient Balance In Wallet.</h5>');
		                redirect(site_url()."user/account/upgradeProfile");  exit;
			        }
			    }
			    else
			    {
			        $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Wrong Password!</h5>');
		            redirect(site_url()."user/account/upgradeProfile");   exit;
			    }
			}
			if($pay_mode=='epin')
			{
			    // check user epin 
			    $countpass=$this->db->select('id')->from('epin_meta')->where(array('epin_code'=>$t_password))->get()->num_rows();
			    if($countpass)
			    {
			        $old_pkg=$this->db->select('pkg_id,pkg_amount,ref_id')->from('user_registration')->where(array('user_id'=>$user_id))->get()->row();
			        $pkg_id=$old_pkg->pkg_id;
			        $pkg_amount=$old_pkg->pkg_amount;
			        $sponser_id=$old_pkg->ref_id;  
			        // check epin amount with package amount
			        $payable_amount=$package_amount-$pkg_amount;
			        $epincheck=$this->db->select('id')->from('epin_meta')->where(array('epin_code'=>$t_password,'pkg_amount'=>$payable_amount))->get()->num_rows();
			        if($epincheck)
			        {
                        $this->db->update('user_registration',array('pkg_id'=>$upgrade_to,'pkg_amount'=>$package_amount),array('user_id'=>$user_id));
                        $this->db->insert('user_package_log',array(
                        	'user_id'=>$user_id,
                        	'old_package_id'=>$pkg_id,
                        	'new_package_id'=>$upgrade_to,
                        	'amount'=>$payable_amount,
                        	'active_status'=>'1',
                        	'purchased_date'=>date('Y-m-d H:i:s')
                        	));
                        	$this->setwelcomebonus($pkg_amount,$upgrade_to,$package_amount,$sponser_id,$user_id);
                        $this->db->update('epin_meta',array('epin_status'=>'1','register_user_id'=>$user_id,'register_username'=>get_user_name($user_id)),array('epin_code'=>$t_password));
			            $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Upgrade Membership Successfully.</h5>');
		                redirect(site_url()."user/account/upgradeProfile");exit;
			        }
			        else
			        {
			            $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Sorry! Epin Amount Not Match.</h5>');
		                redirect(site_url()."user/account/upgradeProfile");  exit;
			        }
			    }
			    else
			    {
			        $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Wrong Epin!</h5>');
		            redirect(site_url()."user/account/upgradeProfile");   exit;
			    }
			}
		}
        $data['title']="Upgrade Membership";
        $data['user']=$user=$this->account_model->getUserDetails($user_id);
        $pkg_id=$user->pkg_id;
        $package=$this->db->select('*')->from('package')->where('id',$pkg_id)->get()->row();
        $data['package']=$package;
        
        $upgrade_to=$this->db->query("select * from package where id>'".$pkg_id."'")->result();
        $data['upgrade_to']=$upgrade_to;
        
        $request=$this->db->select('*')->from('upgrade_request')->where(array('user_id'=>$user_id,'status'=>0))->get()->num_rows();
        $data['upgraderequest']=$request;
        
        $data['breadcrumb']='<li class="active">Upgrade Membership</li>';
        $data['action_url']="upgradeProfile";
        $data['action']="edit";
		_userLayout("account-mgmt/upgrade-profile",$data);
	}
	
	public function setwelcomebonus($previous_pkg_amount,$pkg_id,$pkg_amount,$sponser_id,$user_id)
	{
	    if($pkg_amount>10)
        {
            
            
            
            $packinfo=$this->db->select('pkg_amount,pkg_id')->from('user_registration')->where('user_id',$sponser_id)->get()->row();
    		$spkg_id=$packinfo->pkg_id;
    		$spkg_amount=$packinfo->pkg_amount;
    		
    		
    		if($pkg_amount==19 && $previous_pkg_amount==10){$welcome=6;
    		    
    		    if($spkg_id>1){$commission=0.4;}else{$commission=0;}
    		}
            if($pkg_amount==36 && $previous_pkg_amount==10){$welcome=12;
                if($spkg_id==2){$commission=0.4;}elseif($spkg_id>2){$commission=1;}else{$commission=0;}
            }
            if($pkg_amount==70 && $previous_pkg_amount==10){$welcome=18;
                if($spkg_id==2){$commission=0.4;}elseif($spkg_id==3){$commission=1;}elseif($spkg_id==4){$commission=1.6;}else{$commission=0;}
            }
            
            if($pkg_amount==36 && $previous_pkg_amount==19){$welcome=6;
               if($spkg_id==3){$commission=0.6;}elseif($spkg_id==4){$commission=0.6;}else{$commission=0;}
            }
            if($pkg_amount==70 && $previous_pkg_amount==19){$welcome=12;
                if($spkg_id==3){$commission=0.6;}elseif($spkg_id==4){$commission=1.2;}else{$commission=0;}
            }
        
            if($pkg_amount==70 && $previous_pkg_amount==36){$welcome=6;
                if($spkg_id==4){$commission=0.6;}else{$commission=0;}
            }
            
            
    		$packinfo=$this->db->select('pkg_amount,pkg_id')->from('user_registration')->where('user_id',$user_id)->get()->row();
    		$upkg_id=$packinfo->pkg_id;
    		$upkg_amount=$packinfo->pkg_amount;
    		if($spkg_id>$upkg_id)
    		{
    		    $cpkg_id=$upkg_id;
    		}
    		if($spkg_id<$upkg_id)
    		{
    		    $cpkg_id=$spkg_id;
    		}
    		if($spkg_id==$upkg_id)
    		{
    		    $cpkg_id=$spkg_id;
    		}
    		
    		
            
            /*
            $commission_info=$this->db->select('*')->from('direct_commission_meta')->where(array(
    		'pkg_id'=>$cpkg_id,
    		'stage_key'=>"feeder_stage"
    		))->get()->row();
            */	
            //	$commission_amount=$commission_info->commission;
            // get previous commission
            
           
    		
    		
            //$previouscom_info=$this->db->select('credit_amt')->from('credit_debit_referral')->where(array('user_id'=>$spaonsor_id,'sender_id'=>$user_id,'reason'=>'5'))->order_by('id','desc')->get()->row();
            
            //$prev_commission_amount=$previouscom_info->credit_amt;
            //$commission=$commission_amount-$prev_commission_amount;
            if($welcome>0)
            {
                $query_obj=$this->db->select('amount')->from('final_product_wallet')->where('user_id',$user_id)->get()->row();
            	$balance=$query_obj->amount+($welcome);
            	$this->db->update('final_product_wallet',array('amount'=>$balance),array('user_id'=>$user_id));
            	
            	$this->db->insert('credit_debit_product',array(
            	    'transaction_no'=>generateUniqueTranNo(),
            	    'user_id'=>$user_id,
            	    'credit_amt'=>$welcome,
            	    'debit_amt'=>'0',
            	    'balance'=>$balance,
            	    'admin_charge'=>'0',
            		'pkg_id'=>$pkg_id,
            	    'receiver_id'=>$user_id,
            	    'sender_id'=>$user_id,
            	    'receive_date'=>date('d-m-Y'),
            	    'tran_description'=>'Welcome Pack Balance ',
            	    'status'=>'1',
            	    'payment_method'=>'1',
            	    'payment_method_name'=>'E-wallet',
            	    'current_url'=>site_url(),
            	    'reason'=>'1'
                    ));
            }
            
            if($commission>0)
            {
                $query_obj=$this->db->select('amount')->from('final_referral_wallet')->where('user_id',$sponser_id)->get()->row();
        	    $balance=$query_obj->amount+($commission);
        	    $this->db->update('final_referral_wallet',array('amount'=>$balance),array('user_id'=>$sponser_id));
        	
        	$this->db->insert('credit_debit_referral',array(
        	    'transaction_no'=>generateUniqueTranNo(),
        	    'user_id'=>$sponser_id,
        	    'credit_amt'=>$commission,
        	    'debit_amt'=>'0',
        	    'balance'=>$balance,
        	    'admin_charge'=>'0',
        		'pkg_id'=>$pkg_id,
        		'pkg_amount'=>$pkg_amount,
        	    'receiver_id'=>$sponser_id,
        	    'sender_id'=>$user_id,
        	    'receive_date'=>date('d-m-Y'),
        	    'ttype'=>'Upgrade Refferal Bonus',
        	    'tran_description'=>currency().$commission.'Upgrade Refferal Bonus from '.$user_id,
        	    'TranDescription'=>currency().$commission.'Upgrade Refferal Bonus from '.$user_id,
        	    'status'=>'1',
        	    'payment_method'=>'1',
        	    'payment_method_name'=>'E-wallet',
        	    'current_url'=>site_url(),
        	    'reason'=>'5'
                ));
                
                
                
            }
        }
	}
	
	public function check_old_password($old_password)
	{
		$user_id=$this->session->userdata('user_id');
		$user=$this->db->select('password')->from('user_registration')->where('user_id',$user_id)->get()->row();
		//$user->password;
		if($old_password!=$user->password)
		{
         $this->form_validation->set_message('check_old_password', 'Sorry old password is wrong!');
         return false;
		}
		return true;
	}
	public function changePassword()
	{
		$user_id=$this->session->userdata('user_id');
		if(!empty($this->input->post('btn')))
		{
			$old_password=$this->input->post('old_password');
			$new_password=$this->input->post('new_password');
			$confirm_password=$this->input->post('confirm_password');
			$this->load->library("form_validation");
			
			$this->form_validation->set_rules('old_password', 'Old Password','callback_check_old_password');
			$this->form_validation->set_rules('new_password', 'New Password','required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password','required');
			if(!$this->form_validation->run()==FALSE)
			{
		       $this->db->update('user_registration',array('password'=>$new_password),array('user_id'=>$user_id));
		       $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Password is updated successfully!</h5>');
		       redirect(site_url()."user/account/changePassword");
			}
		}
        $data['title']="Change Password";
        $data['user']=$this->account_model->getUserDetails($user_id);
        $data['breadcrumb']='<li class="active">Change Password</li>';
        $data['action_url']="changePassword";
        $data['action']="edit";
		_userLayout("account-mgmt/change-password",$data);
	}
	//////////////////////
	public function check_old_transaction_password($old_password)
	{
		$user=$this->db->select('t_code')->from('user_registration')->where('user_id',$this->user_id)->get()->row();
		//$user->password;
		if($old_password!=$user->t_code)
		{
         $this->form_validation->set_message('check_old_transaction_password', 'Sorry old transaction password is wrong!');
         return false;
		}
		return true;
	}

	public function changeTranscationPassword()
	{
		if(!empty($this->input->post('btn')))
		{
			$old_password=$this->input->post('old_password');
			$new_password=$this->input->post('new_password');
			$confirm_password=$this->input->post('confirm_password');
			$this->load->library("form_validation");
			
			$this->form_validation->set_rules('old_password', 'Old Password','callback_check_old_transaction_password');
			$this->form_validation->set_rules('new_password', 'New Password','required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password','required');
			if(!$this->form_validation->run()==FALSE)
			{
		       $this->db->update('user_registration',array('t_code'=>$new_password),array('user_id'=>$this->user_id));
		       $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Transaction Password is updated successfully!</h5>');
		       redirect(site_url()."user/account/changeTranscationPassword");
			}
		}
        $data['title']="Change Transaction Password";
        $data['user']=$this->account_model->getUserDetails($this->user_id);
        $data['breadcrumb']='<li class="active">Change Transaction Password</li>';
        $data['action_url']="changeTranscationPassword";
        $data['action']="edit";
		_userLayout("account-mgmt/change-transaction-password",$data);
	}
	//////////////////////
	public function viewProfile()
	{
        $data['title']="View/Update Profile";
        $data['breadcrumb']='<li class="active">View OR Update Profile</li>';
        $data['action_url']="profileManagement";
        $data['action']="edit";
        $data['user_details']=$this->account_model->getUserDetails($this->user_id);
	   _userLayout("account-mgmt/view-profile",$data);
	}
	public function updatePersonalInformation()
	{
        $first_name=$this->input->post('first_name');
        $last_name=$this->input->post('last_name');
        $address_line1=$this->input->post('address_line1');
        $address_line2=$this->input->post('address_line2');
        $city=$this->input->post('city');
        $state=$this->input->post('state');
        $zip_code=$this->input->post('zip_code');
        $email=$this->input->post('email');
        $country=$this->input->post('country');
        $contact_no=$this->input->post('contact_no');
        $gender=$this->input->post('geneder');
	    $image_upload_path='/images/';
	    $profile_pic=adImageUpload($_FILES['profile_pic'],1, $image_upload_path);
	    $profile_pic=(!empty($profile_pic))?$profile_pic:$this->input->post('profile_pic_old');
	    ///////////
        $this->db->update('user_registration',array(
        	'first_name'=>$first_name,
        	'last_name'=>$last_name,
        	'address_line1'=>$address_line1,
        	'address_line2'=>$address_line2,
        	'city'=>$city,
        	'state'=>$state,
        	'zip_code'=>$zip_code,
        	'email'=>$email,
        	'country'=>$country,
        	'contact_no'=>$contact_no,
        	'gender'=>$gender,
        	'image'=>$profile_pic,
        	),array('user_id'=>$this->user_id));
        $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Profile is updated successfully!</h5>');
        /////////////
        redirect(site_url().'user/account/viewProfile');
	}
	public function updateBankInformation()
	{
		$bank_name=$this->input->post('bank_name');
		$branch_name=$this->input->post('branch_name');
		$account_holder_name=$this->input->post('account_holder_name');
		$account_no=$this->input->post('account_no');
		///////////////////
		$this->db->update('user_registration',array(
			'bank_name'=>$bank_name,
			'branch_name'=>$branch_name,
			'account_holder_name'=>$account_holder_name,
			'account_no'=>$account_no
			),array('user_id'=>$this->user_id));

		///////////////////
        $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Bank information is updated successfully!</h5>');
        redirect(site_url().'user/account/viewProfile');
	}
	public function updateSocialMediaInformation()
	{
		$facebook_link=$this->input->post('facebook_link');
		$twitter_link=$this->input->post('twitter_link');
		$linkedin_link=$this->input->post('linkedin_link');
		$google_plus_link=$this->input->post('google_plus_link');
		/////////////////////////////
		$this->db->update('user_registration',array(
			'facebook_link'=>$facebook_link,
			'twitter_link'=>$twitter_link,
			'linkedin_link'=>$linkedin_link,
			'google_plus_link'=>$google_plus_link
			),array('user_id'=>$this->user_id));
		/////////////////////////////
        $this->session->set_flashdata("flash_msg",'<h5 class="panel-title" style="color:green">Social media information is updated successfully!</h5>');
        redirect(site_url().'user/account/viewProfile');
	}
}//end class

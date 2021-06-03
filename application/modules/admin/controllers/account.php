<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/account
*/
class Account extends Common_Controller 
{
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->helper("layout_helper");
		$this->load->model("account_model");
	} 
	/*
	@Desc: It's used to view and update profile
	*/
	public function profileManagement()
	{
		if(!empty($this->input->post('btn')))
		{
	        $this->load->library('form_validation');
	        $this->form_validation->set_rules('username', 'Username','callback_check_username_exists');
	        if(!$this->form_validation->run()==FALSE)
	        {
		        $username=$this->input->post('username');
		        $panel_title=$this->input->post('panel_title');
		        $image_upload_path='/images/';
		        $profile_pic=adImageUpload($_FILES['profile_pic'],1, $image_upload_path);
		        $profile_pic=(!empty($profile_pic))?$profile_pic:$this->input->post('profile_pic_old');
		        $facebook_link=$this->input->post('facebook_link');
		        $google_plus_link=$this->input->post('google_plus_link');
		        $linkedin_link=$this->input->post('linkedin_link');
		        $this->db->update('admin',array('image'=>$profile_pic, 'username'=>$username, 'panel_title'=>$panel_title),array('user_id'=>COMP_USER_ID));
		        $this->db->update("user_registration",array(
		       	'facebook_link'=>$facebook_link,
		       	'google_plus_link'=>$google_plus_link,
		       	'linkedin_link'=>$linkedin_link),array('user_id'=>COMP_USER_ID));
		        $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Profile is updated successfully!');
		        redirect(site_url()."admin/account/profileManagement");
	       }//end validation if here
		}
        $data['user']=$this->account_model->getAdminDetails(COMP_USER_ID);
	   _adminLayout("account-mgmt/profile",$data);	
	}
	/* end method */
	public function check_old_password($old_password)
	{
		$user=$this->db->select('password')->from('admin')->where('user_id',COMP_USER_ID)->get()->row();
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
		       $this->db->update('admin',array('password'=>$new_password),array('user_id'=>COMP_USER_ID));
		       $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Password is updated successfully!');
		       redirect(site_url()."admin/account/changePassword");
			}
		}
        $data['user']=$this->account_model->getAdminDetails(COMP_USER_ID);
		_adminLayout("account-mgmt/change-password",$data);
	}
	public function upgrade_requests(){
		$data['requests'] = $this->account_model->getPendingUpgradeRequests();
		_adminLayout("account-mgmt/upgrade-requests",$data);
	}
	public function userUpgradeRequest($requestId){
		$data['request']=$this->account_model->getUserPendingUpgradeRequest($requestId);
		$data['user']=$this->account_model->getUserPendingUpgradeRequest($data['request']->user_id);
		if(!empty($this->input->post('btn')))
		{
			if($data['request']->status ==  0){
				/**code to upgrade package */
				$upgrade_to = $data['request']->upgrade_to;
				$package_amount = $data['request']->upgrade_amount;
				$user_id = $data['request']->user_id;
				$old_pkg=$this->db->select('pkg_id,pkg_amount,ref_id')->from('user_registration')->where(array('user_id'=>$user_id))->get()->row();
				$pkg_id=$old_pkg->pkg_id;
				$pkg_amount=$old_pkg->pkg_amount;
				$sponser_id=$old_pkg->ref_id;
				// check wallet balance
				$payable_amount=$package_amount-$pkg_amount;
				$this->db->update('user_registration',array('pkg_id'=>$upgrade_to,'pkg_amount'=>$package_amount),array('user_id'=>$user_id));
				$this->db->update('upgrade_request',array('status'=>1),array('id'=>$requestId));
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
				$this->session->set_flashdata("flash_msg", '<span class="text-semibold">package upgraded Successfully!');
			}else{
				$this->session->set_flashdata("flash_msg", '<span class="text-semibold text-danger">Status of this request already Upgraded!');
			}
			
		}elseif(!empty($this->input->post('btn_reject')))
		{
			if($data['request']->status ==  0){
				$this->db->update('upgrade_request',array('status'=>2),array('id'=>$requestId));
				$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Package Rejected Successfully!');
			}
		}
		$data['request']=$this->account_model->getUserPendingUpgradeRequest($requestId);
		$data['user']=$this->account_model->getUserPendingUpgradeRequest($data['request']->user_id);
		_adminLayout("account-mgmt/upgrade_account",$data);		
	}
	public function setwelcomebonus($previous_pkg_amount,$pkg_id,$pkg_amount,$sponser_id,$user_id)
	{
	    if($pkg_amount>10)
        {
            if($pkg_amount==18 && $previous_pkg_amount==10){$welcome=8;}
            if($pkg_amount==34 && $previous_pkg_amount==10){$welcome=24;}
            if($pkg_amount==64 && $previous_pkg_amount==10){$welcome=54;}
            
            if($pkg_amount==34 && $previous_pkg_amount==18){$welcome=16;}
            if($pkg_amount==64 && $previous_pkg_amount==18){$welcome=46;}
            
            if($pkg_amount==64 && $previous_pkg_amount==34){$welcome=30;}
            
            
            $packinfo=$this->db->select('pkg_id')->from('user_registration')->where('user_id',$sponser_id)->get()->row();
    		$spkg_id=$packinfo->pkg_id;
    		$packinfo=$this->db->select('pkg_id')->from('user_registration')->where('user_id',$user_id)->get()->row();
    		$upkg_id=$packinfo->pkg_id;
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
            
            $commission_info=$this->db->select('*')->from('direct_commission_meta')->where(array(
    		'pkg_id'=>$cpkg_id,
    		'stage_key'=>"feeder_stage"
    		))->get()->row();
            	
            	$commission_amount=$commission_info->commission;
            // get previous commission
            
            $previouscom_info=$this->db->select('credit_amt')->from('credit_debit')->where(array('user_id'=>$spaonsor_id,'sender_id'=>$user_id,'reason'=>'5'))->order_by('id','desc')->get()->row();
            
            $prev_commission_amount=$previouscom_info->credit_amt;
            $commission=$commission_amount-$prev_commission_amount;
            
            if($commission>0)
            {
                $query_obj=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$sponser_id)->get()->row();
        	    $balance=$query_obj->amount+($commission);
        	    $this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$sponser_id));
        	
        	$this->db->insert('credit_debit',array(
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
	
}//end class

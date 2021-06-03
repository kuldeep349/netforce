<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/member
*/
class Member extends Common_Controller 
{
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->helper("layout_helper");
		$this->load->model('member_model');
		$this->load->model('account_model');
	}//end constructor 
	public function viewAllMember()
	{
		$data=array();
		$data['all_members']=$this->member_model->getAllMembers();
		_adminLayout("member-mgmt/all-member",$data);
	}
	public function BronzeMembers()
	{
		$data=array();
		$data['all_members']=$this->member_model->getPackageMembers(1);
		_adminLayout("member-mgmt/all-member",$data);
	}
	public function SilverMembers()
	{
		$data=array();
		$data['all_members']=$this->member_model->getPackageMembers(4);
		_adminLayout("member-mgmt/all-member",$data);
	}
	public function GoldMembers()
	{
		$data=array();
		$data['all_members']=$this->member_model->getPackageMembers(3);
		_adminLayout("member-mgmt/all-member",$data);
	}
	public function DiamondMembers()
	{
		$data=array();
		$data['all_members']=$this->member_model->getPackageMembers(4);
		_adminLayout("member-mgmt/all-member",$data);
	}
	public function activeMember()
	{
		$data=array();
		$data['all_members']=$this->member_model->getAllActiveMembers();
		_adminLayout("member-mgmt/active-member",$data);
	}
	public function inactiveMember()
	{
		$data=array();
		$data['all_members']=$this->member_model->getAllInActiveMembers();
		_adminLayout("member-mgmt/inactive-member",$data);
	}
	public function blockUnblockMember()
	{
		$data=array();
		$data['all_members']=$this->member_model->getAllMembers();
		_adminLayout("member-mgmt/block-unblock-member",$data);
	}
	public function passwordTracker()
	{
		$data=array();
		$data['all_members']=$this->member_model->getAllMembers();
		_adminLayout("member-mgmt/password-tracker",$data);
	}
	public function deleteMember($id)
	{
		$row_id=ID_decode($id);
		$this->db->delete('user_registration',array('id'=>$row_id));
		$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Member is deleted Successfully');
		redirect(site_url() . "admin/member/viewAllMember");
        exit;
	}//end method

	public function editMember($user_id)
	{
		$user_id=ID_decode($user_id);
		$data['user_details']=$this->account_model->getUserDetails($user_id);
		$data['user_id']=$user_id;
		_adminLayout("member-mgmt/edit-member",$data);
	}
	public function updatePersonalInformation($user_id)
	{
        $user_id=ID_decode($user_id);
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
        	'image'=>$profile_pic
        	),array('user_id'=>$user_id));
         $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Member Personal information is updated successfully');
        /////////////
        redirect(site_url().'admin/member/editMember/'.ID_encode($user_id));
	}
	public function updateBankInformation($user_id)
	{
		$user_id=ID_decode($user_id);
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
			),array('user_id'=>$user_id));

		///////////////////
         $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Member Bank information is updated successfully');
        /////////////
        redirect(site_url().'admin/member/editMember/'.ID_encode($user_id));
	}

	public function updateUserName($user_id)
	{
		$user_id=ID_decode($user_id);
		$username=$this->input->post('user_name');
		$hiddenusername=$this->input->post('hidden_user_name');
		if($hiddenusername!=$username && $username!='')
		{
		    if(!$this->username_check($username))
    		{
    		    $this->db->update('user_registration',array(
    			'username'=>$username
    			),array('user_id'=>$user_id));
    
        		///////////////////
                 $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> UserName is updated successfully');
                  redirect(site_url().'admin/member/editMember/'.ID_encode($user_id));
    		}
    		else
    		{
    		    $this->session->set_flashdata("flash_msg1", '<span class="text-semibold">Sorry!</span>  Username does not exist!');
    		    redirect(site_url().'admin/member/editMember/'.ID_encode($user_id));
    		}
		}
		else
		{
		    $this->session->set_flashdata("flash_msg1", '<span class="text-semibold">No Changes</span> ');
		    redirect(site_url().'admin/member/editMember/'.ID_encode($user_id));
		}
       
	}
	public function username_check($username)
    {
        if(!$this->account_model->isUserExist($username))
        {
            return FALSE;
        }
        else
        {
        	return TRUE;
        }
    }//end method
    
    
	public function updateSocialMediaInformation($user_id)
	{
		$user_id=ID_decode($user_id);
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
			),array('user_id'=>$user_id));
		/////////////////////////////
		///////////////////
         $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Member social media information is updated successfully');
        /////////////
        redirect(site_url().'admin/member/editMember/'.ID_encode($user_id));
	}
	public function changeStatus($user_id)
	{
		$user_id=ID_decode($user_id);
		$status_info=$this->db->select('active_status')->from('user_registration')->where('user_id',$user_id)->get()->row();
		$status=($status_info->active_status=='1')?'0':'1';
		$this->db->update('user_registration',array('active_status'=>$status),array('user_id'=>$user_id));
        $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Member status is changed successfully');
        /////////////
        redirect(site_url().'admin/member/blockUnblockMember/');
	}
}//end class
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/MarketingTools
*/
class Policy extends Common_Controller 
{
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->helper("layout_helper");
		$this->load->model("policy_model");
	} 
	public function editPrivacyPolicy()
	{
		if(!empty($this->input->post('btn')))
		{
		 $privacy_policy=$this->input->post('about_us');
		 $this->db->update('confidential',
		 	               array('confidential_value'=>$privacy_policy,'last_updated'=>date('Y-m-d H:i:s')),
		 	               array('confidential_key'=>'privacy_policy')
		 	               );
		$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Privacy Policy is updated successfully');
        redirect(site_url().'admin/policy/editPrivacyPolicy');
		}
		$data=array();
		$data['about_us']=$this->policy_model->getAboutUs('privacy_policy');
		$data['title']='Privacy Policy';
		$data['action']='editPrivacyPolicy';
	 	_adminLayout("policy-mgmt/how-it-works",$data);
	}
	public function editTermsCondition()
	{
		if(!empty($this->input->post('btn')))
		{
		 $terms_condition=$this->input->post('about_us');
		 $this->db->update('confidential',
		 	               array('confidential_value'=>$terms_condition,'last_updated'=>date('Y-m-d H:i:s')),
		 	               array('confidential_key'=>'terms_and_condition')
		 	               );
		$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Terms & Condition is updated successfully');
        redirect(site_url().'admin/policy/editTermsCondition');
		}
		$data=array();
		$data['about_us']=$this->policy_model->getAboutUs('terms_and_condition');
		$data['title']='Terms Condition';
		$data['action']='editTermsCondition';
	 	_adminLayout("policy-mgmt/how-it-works",$data);
	}
	public function aboutUs()
	{
		if(!empty($this->input->post('btn')))
		{
		 $terms_condition=$this->input->post('about_us');
		 $this->db->update('confidential',
		 	               array('confidential_value'=>$terms_condition,'last_updated'=>date('Y-m-d H:i:s')),
		 	               array('confidential_key'=>'about_us')
		 	               );
		$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> About Us is updated successfully');
        redirect(site_url().'admin/policy/aboutUs');
		}
		$data=array();
		$data['about_us']=$this->policy_model->getAboutUs('about_us');
		$data['title']='About Us';
		$data['action']='aboutUs';
	 	_adminLayout("policy-mgmt/how-it-works",$data);
	}
	public function contact()
	{
		if(!empty($this->input->post('btn')))
		{
		 $terms_condition=$this->input->post('about_us');
		 $this->db->update('confidential',
		 	               array('confidential_value'=>$terms_condition,'last_updated'=>date('Y-m-d H:i:s')),
		 	               array('confidential_key'=>'contact')
		 	               );
		$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Contact is updated successfully');
        redirect(site_url().'admin/policy/contact');
		}
		$data=array();
		$data['about_us']=$this->policy_model->getAboutUs('contact');
		$data['title']='Contact';
		$data['action']='contact';
	 	_adminLayout("policy-mgmt/how-it-works",$data);
	}	
	public function howItWorks()
	{
		if(!empty($this->input->post('btn')))
		{
		 $terms_condition=$this->input->post('about_us');
		 $this->db->update('confidential',
		 	               array('confidential_value'=>$terms_condition,'last_updated'=>date('Y-m-d H:i:s')),
		 	               array('confidential_key'=>'how_it_works')
		 	               );
		$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> How It Works is updated successfully');
        redirect(site_url().'admin/policy/howItWorks');
		}
		$data=array();
		$data['about_us']=$this->policy_model->getAboutUs('how_it_works');
		$data['title']='How It Works';
		$data['action']='howItWorks';
	 	_adminLayout("policy-mgmt/how-it-works",$data);
	}
	public function howItWorksEmployee()
	{
		if(!empty($this->input->post('btn')))
		{
		 $terms_condition=$this->input->post('about_us');
		 $this->db->update('confidential',
		 	               array('confidential_value'=>$terms_condition,'last_updated'=>date('Y-m-d H:i:s')),
		 	               array('confidential_key'=>'how_it_works_employee')
		 	               );
		$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> How It Works is updated successfully');
        redirect(site_url().'admin/policy/howItWorksEmployee');
		}
		$data=array();
		$data['about_us']=$this->policy_model->getAboutUs('how_it_works_employee');
		$data['title']='How It Works';
		$data['action']='howItWorksEmployee';
	 	_adminLayout("policy-mgmt/how-it-works",$data);
	}
	
	public function pictureGallery()
	{
		if(!empty($this->input->post('btn')))
		{
		 $terms_condition=$this->input->post('gallery');
		 $this->db->update('confidential',
		 	               array('confidential_value'=>$terms_condition,'last_updated'=>date('Y-m-d H:i:s')),
		 	               array('confidential_key'=>'gallery')
		 	               );
		$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Picture gallery updated successfully');
        redirect(site_url().'admin/policy/pictureGallery');
		}
		$data=array();
		$data['about_us']=$this->policy_model->getMedia('gallery');
		$data['title']='Picture Gallery';
		$data['action']='pictureGallery';
	 	_adminLayout("policy-mgmt/picture-gallery",$data);
	}
}//end class

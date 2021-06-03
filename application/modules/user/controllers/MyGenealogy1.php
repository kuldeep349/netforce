<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package user/MyGenealogy
*/
class MyGenealogy1 extends Common_Controller 
{
	private $userId;
	private $moduleName;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		user_auth();
		$this->load->helper("layout_helper");
		$this->load->model("unilevel_tree_model");
		$this->userId=$this->session->userdata('user_id');
		$this->moduleName=$this->router->fetch_module();
	} 
	/*
	@Desc: It's used to display the team view in unilevel/direct member tree format
	*/
	public function directReferralTree()
	{
		//$user_id=$this->session->userdata('user_id');
        $data['title']="Direct Referral Tree";
        $data['breadcrumb']='<li class="active">Direct Referral Tree</li>';
        $data['root']=$this->unilevel_tree_model->getUserDetails($this->userId);
        $data['all_direct_member']=$this->unilevel_tree_model->getAllDirectUser($this->userId);
	    $this->load->view("my-genealogy-mgmt/direct-referral-tree",$data);	
	}
	/*
    @desc: It's used to get all the child (direct member/unilevel tree) member on ajax request
	*/
	public function directAjaxTree($parent_id=null)
	{
        $data['root']=$this->unilevel_tree_model->getUserDetails($parent_id);
        $data['all_direct_member']=$this->unilevel_tree_model->getAllDirectUser($parent_id);
	    $this->load->view("my-genealogy-mgmt/direct_ajax_tree",$data);	

	}//end method
	/*
    @desc: It's used to get all the unilevel tree popup member info on ajax request
	*/
	public function directTreeAjaxPopupInfo($user_id)
	{
        $data['parent']=$this->unilevel_tree_model->getParentDetails($user_id);
        $data['sponsor']=$this->unilevel_tree_model->getSponsorDetails($user_id);
        $data['total_direct_downline_member']=$this->unilevel_tree_model->getTotalDirectDownline($user_id);
        $data['total_downline_member']=$this->unilevel_tree_model->getTotalDownlineMembers($user_id);
	    $this->load->view("my-genealogy-mgmt/unilevel-tree-ajax-popup-info",$data);	
	}
	public function tabularTree()
	{
        $this->load->helper('tabular_tree');
        $data['title']="Tabular Tree";
        $data['user_id']=$this->userId;
        $data['breadcrumb']='<li class="active">Upgrade Package</li>';
	   _userLayout("my-genealogy-mgmt/tabular-tree",$data);	
	}
	/*
	@Desc:It's used to display the feeder stage tree
	*/
	public function feederStageTree($user_id=null)
	{
		
		$data['loginID'] = $this->db->select('username')->from('user_registration')->where('user_id',$this->userId)->get()->row();
		//$user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$user_id=(!empty($user_id))? $user_id :$this->userId;
		// echo $user_id;
		// die;
		$main_user=$this->db->select('username,image,ref_id,pkg_id,email,country,first_name,last_name')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country','u.first_name','u.last_name'))->from('matrix_downline as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		$level2_info=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country','u.first_name','u.last_name'))->from('matrix_downline as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'2'))->get()->result();
		
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
	    $level2_info_1=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country','u.first_name','u.last_name'))->from('matrix_downline as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();
		}
		if(!empty($level1_info[1]->user_id))
		{
	    $level2_info_2=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_downline as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[1]->user_id, 'level'=>'1'))->get()->result();
		}
		
		if(!empty($level1_info[2]->user_id))
		{
	    $level2_info_3=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country','u.first_name','u.last_name'))->from('matrix_downline as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[2]->user_id, 'level'=>'1'))->get()->result();
		}

	    $data['title']="Stage1 Tree";
	    $data['breadcrumb']='<li class="active">Stage1 Tree</li>';
		/////
		$data['main_user_id']=$user_id;
		$data['main_username']=$main_user->username;
		$data['main_first_name']=$main_user->first_name;
		$data['main_last_name']=$main_user->last_name;
		$data['main_image'] = $main_user->image;
		$data['main_ref_id'] = $main_user->ref_id;
		$data['main_member_type'] = $main_user->pkg_id;
		$data['main_email'] = $main_user->email;
		$data['main_country'] = $main_user->country;
		
	    ///level 1 data
		if(!empty($level1_info) && count($level1_info)>0)
		{
			if(!empty($level1_info[0]))
			{
				$data['level1_username1']=$level1_info[0]->username;
				$data['level1_first_name1']=$level1_info[0]->first_name;
				$data['level1_last_name1']=$level1_info[0]->last_name;
				$data['level1_user_id1']=$level1_info[0]->user_id;
				$data['level1_1image'] = $level1_info[0]->image;
				$data['level1_1ref_id'] = $level1_info[0]->ref_id;
				$data['level1_1member_type'] = $level1_info[0]->pkg_id;
				$data['level1_1email'] = $level1_info[0]->email;
				$data['level1_1country'] = $level1_info[0]->country;
			}
			//
			if(!empty($level1_info[1]))
			{
				$data['level1_username2']=$level1_info[1]->username;
				$data['level1_first_name2']=$level1_info[1]->first_name;
				$data['level1_last_name2']=$level1_info[1]->last_name;
				$data['level1_user_id2']=$level1_info[1]->user_id;
				$data['level1_2image'] = $level1_info[1]->image;
				$data['level1_2ref_id'] = $level1_info[1]->ref_id;
				$data['level1_2member_type'] = $level1_info[1]->pkg_id;
				$data['level1_2email'] = $level1_info[1]->email;
				$data['level1_2country'] = $level1_info[1]->country;
			}
			///
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_first_name3']=$level1_info[2]->first_name;
				$data['level1_last_name3']=$level1_info[2]->last_name;
				$data['level1_user_id3']=$level1_info[2]->user_id;
				$data['level1_3image'] = $level1_info[2]->image;
				$data['level1_3ref_id'] = $level1_info[2]->ref_id;
				$data['level1_3member_type'] = $level1_info[2]->pkg_id;
				$data['level1_3email'] = $level1_info[2]->email;
				$data['level1_3country'] = $level1_info[2]->country;
			}
		}//end level1 if here!
	    ///level 2 data
		if(!empty($level2_info_1) && count($level2_info_1)>0)
		{
			if(!empty($level2_info_1[0]))
			{
				$data['level2_username1']=$level2_info_1[0]->username;
				$data['level2_first_name1']=$level2_info_1[0]->first_name;
				$data['level2_last_name1']=$level2_info_1[0]->last_name;
				$data['level2_user_id1']=$level2_info_1[0]->user_id;
				$data['level2_1image'] = $level2_info_1[0]->image;
				$data['level2_1ref_id'] = $level2_info_1[0]->ref_id;
				$data['level2_1member_type'] = $level2_info_1[0]->pkg_id;
				$data['level2_1email'] = $level2_info_1[0]->email;
				$data['level2_1country'] = $level2_info_1[0]->country;
			}
			//
			if(!empty($level2_info_1[1]))
			{
				$data['level2_username2']=$level2_info_1[1]->username;
				$data['level2_first_name2']=$level2_info_1[1]->first_name;
				$data['level2_last_name2']=$level2_info_1[1]->last_name;
				$data['level2_user_id2']=$level2_info_1[1]->user_id;
				$data['level2_2image'] = $level2_info_1[1]->image;
				$data['level2_2ref_id'] = $level2_info_1[1]->ref_id;
				$data['level2_2member_type'] = $level2_info_1[1]->pkg_id;
				$data['level2_2email'] = $level2_info_1[1]->email;
				$data['level2_2country'] = $level2_info_1[1]->country;
			}
			if(!empty($level2_info_1[2]))
			{
				$data['level2_username3']=$level2_info_1[2]->username;
				$data['level2_first_name3']=$level2_info_1[2]->first_name;
				$data['level2_last_name3']=$level2_info_1[2]->last_name;
				$data['level2_user_id3']=$level2_info_1[2]->user_id;
				$data['level2_3image'] = $level2_info_1[2]->image;
				$data['level2_3ref_id'] = $level2_info_1[2]->ref_id;
				$data['level2_3member_type'] = $level2_info_1[2]->pkg_id;
				$data['level2_3email'] = $level2_info_1[2]->email;
				$data['level2_3country'] = $level2_info_1[2]->country;
			}
		}
		if(!empty($level2_info_2) && count($level2_info_2)>0)
		{	
			//
			if(!empty($level2_info_2[0]))
			{
				$data['level2_username4']=$level2_info_2[0]->username;
				$data['level2_first_name4']=$level2_info_2[0]->first_name;
				$data['level2_last_name4']=$level2_info_2[0]->last_name;
				$data['level2_user_id4']=$level2_info_2[0]->user_id;
				$data['level2_4image'] = $level2_info_2[0]->image;
				$data['level2_4ref_id'] = $level2_info_2[0]->ref_id;
				$data['level2_4member_type'] = $level2_info_2[0]->pkg_id;
				$data['level2_4email'] = $level2_info_2[0]->email;
				$data['level2_4country'] = $level2_info_2[0]->country;
			}
			//
			if(!empty($level2_info_2[1]))
			{
				$data['level2_username5']=$level2_info_2[1]->username;
				$data['level2_first_name5']=$level2_info_2[1]->first_name;
				$data['level2_last_name5']=$level2_info_2[1]->last_name;
				$data['level2_user_id5']=$level2_info_2[1]->user_id;
				$data['level2_5image'] = $level2_info_2[1]->image;
				$data['level2_5ref_id'] = $level2_info_2[1]->ref_id;
				$data['level2_5member_type'] = $level2_info_2[1]->pkg_id;
				$data['level2_5email'] = $level2_info_2[1]->email;
				$data['level2_5country'] = $level2_info_2[1]->country;			
			}
			//
			if(!empty($level2_info_2[2]))
			{
				$data['level2_username6']=$level2_info_2[2]->username;
				$data['level2_first_name6']=$level2_info_2[2]->first_name;
				$data['level2_last_name6']=$level2_info_2[2]->last_name;
				$data['level2_user_id6']=$level2_info_2[2]->user_id;
				$data['level2_6image'] = $level2_info_2[2]->image;
				$data['level2_6ref_id'] = $level2_info_2[2]->ref_id;
				$data['level2_6member_type'] = $level2_info_2[2]->pkg_id;
				$data['level2_6email'] = $level2_info_2[2]->email;
				$data['level2_6country'] = $level2_info_2[2]->country;			
			}
		}//end level2 if here!
		///
		if(!empty($level2_info_3) && count($level2_info_3)>0)
		{	
			//
			if(!empty($level2_info_3[0]))
			{
				$data['level2_username7']=$level2_info_3[0]->username;
				$data['level2_first_name7']=$level2_info_3[0]->first_name;
				$data['level2_last_name7']=$level2_info_3[0]->last_name;
				$data['level2_user_id7']=$level2_info_3[0]->user_id;
				$data['level2_7image'] = $level2_info_3[0]->image;
				$data['level2_7ref_id'] = $level2_info_3[0]->ref_id;
				$data['level2_7member_type'] = $level2_info_3[0]->pkg_id;
				$data['level2_7email'] = $level2_info_3[0]->email;
				$data['level2_7country'] = $level2_info_3[0]->country;	
			}
			//
			if(!empty($level2_info_3[1]))
			{
				$data['level2_username8']=$level2_info_3[1]->username;
				$data['level2_first_name8']=$level2_info_3[1]->first_name;
				$data['level2_last_name8']=$level2_info_3[1]->last_name;
				$data['level2_user_id8']=$level2_info_3[1]->user_id;
				$data['level2_8image'] = $level2_info_3[1]->image;
				$data['level2_8ref_id'] = $level2_info_3[1]->ref_id;
				$data['level2_8member_type'] = $level2_info_3[1]->pkg_id;
				$data['level2_8email'] = $level2_info_3[1]->email;
				$data['level2_8country'] = $level2_info_3[1]->country;					
			}
			//
			if(!empty($level2_info_3[2]))
			{
				$data['level2_username9']=$level2_info_3[2]->username;
				$data['level2_first_name9']=$level2_info_3[2]->first_name;
				$data['level2_last_name9']=$level2_info_3[2]->last_name;
				$data['level2_user_id9']=$level2_info_3[2]->user_id;
				$data['level2_9image'] = $level2_info_3[2]->image;
				$data['level2_9ref_id'] = $level2_info_3[2]->ref_id;
				$data['level2_9member_type'] = $level2_info_3[2]->pkg_id;
				$data['level2_9email'] = $level2_info_3[2]->email;
				$data['level2_9country'] = $level2_info_3[2]->country;					
			}
		}//end level2 if here!
		$data['title']="Standard Board";
		$data['level1_info']=$level1_info;
		$data['level2_info'][0]=$level2_info_1;
		$data['level2_info'][1]=$level2_info_2;
		// echo'<pre>';
		// print_r($data);
		// echo'</pre>';
		// die;
		//_userLayout("my-genealogy-mgmt1/affiliate-tree",$data);	
		_userLayout("my-genealogy-mgmt/gonology-tree",$data);	
	}//end method
	/*
	@Desc:It's used to display the stage1 tree
	*/
	public function stage1Tree($user_id=null)
	{
		$data['loginID'] = $this->db->select('username')->from('user_registration')->where('user_id',$this->userId)->get()->row();
		//$user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$user_id=(!empty($user_id))? $user_id:$this->userId;
		$main_user=$this->db->select('username,image,ref_id,pkg_id,email,country,first_name,last_name')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country','u.first_name','u.last_name'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
	    //pr($level1_info);
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
	        $level2_info_1=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country','u.first_name','u.last_name'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();
		}
		if(!empty($level1_info[1]->user_id))
		{
		    $level2_info_2=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country','u.first_name','u.last_name'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[1]->user_id, 'level'=>'1'))->get()->result();
		}
		
		/*if(!empty($level2_info_1[0]->user_id))
		{
	        $level3_info_1=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level2_info_1[0]->user_id, 'level'=>'1'))->get()->result();
		}
		//pr($level3_info_1);
		if(!empty($level2_info_1[1]->user_id))
		{
		    $level3_info_2=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level2_info_1[1]->user_id, 'level'=>'1'))->get()->result();
		}
		
		if(!empty($level2_info_2[0]->user_id))
		{
	        $level3_info_3=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level2_info_2[0]->user_id, 'level'=>'1'))->get()->result();
		}
		if(!empty($level2_info_2[1]->user_id))
		{
		    $level3_info_4=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level2_info_2[1]->user_id, 'level'=>'1'))->get()->result();
		}
		*/
		
		/*if(!empty($level1_info[2]->user_id))
		{
	        $level2_info_3=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[2]->user_id, 'level'=>'1'))->get()->result();
		}*/
	    $data['title']="Supervisor Tree";
	    $data['breadcrumb']='<li class="active">Supervisor Tree</li>';
		/////
		$data['main_user_id']=$user_id;
		// $data['main_username']=$main_user->username;
		$data['main_username']=$main_user->first_name .' ' . $main_user->last_name;
		$data['main_image'] = $main_user->image;
		$data['main_ref_id'] = $main_user->ref_id;
		$data['main_member_type'] = $main_user->pkg_id;
		$data['main_email'] = $main_user->email;
		$data['main_country'] = $main_user->country;
	    ///level 1 data
		///level 1 data
		
		//_userLayout("my-genealogy-mgmt1/tree_stage1",$data);
		$data['title']="Captain Board";
		$data['controller']=$this;
		$data['table']='matrix_stage1';
		$data['action']='stage1Tree';

		$data['level1_user_id1']=$level1_info;
		
		$data['level2_info'][0]=$level2_info_1;

		$data['level2_info'][1]=$level2_info_2;
		
		//$data['level3_info'][0]=$level3_info_1;
		//$data['level3_info'][1]=$level3_info_2;
		//$data['level3_info'][2]=$level3_info_3;
		//$data['level3_info'][3]=$level3_info_4;
		//_userLayout("my-genealogy-mgmt1/supervisor-tree",$data);
		// echo '<pre>';
		// print_r($data);
		// die;
		_userLayout("my-genealogy-mgmt/gonology_tree1",$data);
			
	}//end method


    public function showusers($user_id,$table)
    {
        $level1_info=$this->db->select(array('u.username','u.user_id'))->from($table.' as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
	    return $level1_info;
    }
	/*
	@Desc:It's used to display the stage2 tree
	*/
	public function stage2Tree($user_id=null)
	{
		$data['loginID'] = $this->db->select('username')->from('user_registration')->where('user_id',$this->userId)->get()->row();
		//$user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$user_id=(!empty($user_id))? $user_id :$this->userId;
		$main_user=$this->db->select('username,image,ref_id,pkg_id,email,country')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_stage2 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
	    //pr($level1_info);
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
	        $level2_info_1=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_stage2 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();
		}
		if(!empty($level1_info[1]->user_id))
		{
		    $level2_info_2=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_stage2 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[1]->user_id, 'level'=>'1'))->get()->result();
		}
		
	    $data['title']="Manager Tree";
	    $data['breadcrumb']='<li class="active">Manager Tree</li>';
		/////
		$data['action']='stage2Tree';
		$data['main_user_id']=$user_id;
		$data['main_username']=$main_user->username;
		$data['main_image'] = $main_user->image;
		$data['main_ref_id'] = $main_user->ref_id;
		$data['main_member_type'] = $main_user->pkg_id;
		$data['main_email'] = $main_user->email;
		$data['main_country'] = $main_user->country;
	    ///level 1 data
		///level 1 data
		
		//_userLayout("my-genealogy-mgmt1/tree_stage1",$data);
		$data['title']="Ambassador Board";
		$data['controller']=$this;
		$data['table']='matrix_stage2';
		$data['level1_user_id1']=$level1_info;
		$data['level2_info'][0]=$level2_info_1;
		$data['level2_info'][1]=$level2_info_2;
		
		//$data['level3_info'][0]=$level3_info_1;
		//$data['level3_info'][1]=$level3_info_2;
		//$data['level3_info'][2]=$level3_info_3;
		//$data['level3_info'][3]=$level3_info_4;
		// echo '<pre>';
		// print_r($data);
		// die;
		//_userLayout("my-genealogy-mgmt1/supervisor-tree",$data);
		_userLayout("my-genealogy-mgmt/gonology_tree1",$data);	
	}//end method

	/*
	@Desc:It's used to display the stage2 tree
	*/
	public function stage3Tree($user_id=null)
	{
		$data['loginID'] = $this->db->select('username')->from('user_registration')->where('user_id',$this->userId)->get()->row();
		//$user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$user_id=(!empty($user_id))? $user_id:$this->userId;
		$main_user=$this->db->select('username,image,ref_id,pkg_id,email,country')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_stage3 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
	    //pr($level1_info);
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
	        $level2_info_1=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_stage3 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();
		}
		if(!empty($level1_info[1]->user_id))
		{
		    $level2_info_2=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_stage3 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[1]->user_id, 'level'=>'1'))->get()->result();
		}
		
	    $data['title']="Senior Manager Tree";
	    $data['breadcrumb']='<li class="active">Senior Manager Tree</li>';
		/////
		$data['main_user_id']=$user_id;
		$data['main_username']=$main_user->username;
		$data['main_image'] = $main_user->image;
		$data['main_ref_id'] = $main_user->ref_id;
		$data['main_member_type'] = $main_user->pkg_id;
		$data['main_email'] = $main_user->email;
		$data['main_country'] = $main_user->country;
	    ///level 1 data
		///level 1 data
		
		//_userLayout("my-genealogy-mgmt1/tree_stage1",$data);
		$data['title']="baron & Baroness Board";
		$data['controller']=$this;
		$data['table']='matrix_stage3';
		$data['level1_user_id1']=$level1_info;
		$data['level2_info'][0]=$level2_info_1;
		$data['level2_info'][1]=$level2_info_2;
		$data['action']='stage3Tree';
		//$data['level3_info'][0]=$level3_info_1;
		//$data['level3_info'][1]=$level3_info_2;
		//$data['level3_info'][2]=$level3_info_3;
		//$data['level3_info'][3]=$level3_info_4;
		//_userLayout("my-genealogy-mgmt1/supervisor-tree",$data);
		_userLayout("my-genealogy-mgmt/gonology_tree1",$data);	
	}//end method
	/*
	@Desc:It's used to display the stage2 tree
	*/
	public function stage4Tree($user_id=null)
	{
		$data['loginID'] = $this->db->select('username')->from('user_registration')->where('user_id',$this->userId)->get()->row();
		//$user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$user_id=(!empty($user_id))? $user_id:$this->userId;
		$main_user=$this->db->select('username,image,ref_id,pkg_id,email,country')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_stage4 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
	    //pr($level1_info);
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
	        $level2_info_1=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_stage4 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();
		}
		if(!empty($level1_info[1]->user_id))
		{
		    $level2_info_2=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_stage4 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[1]->user_id, 'level'=>'1'))->get()->result();
		}
		
	    $data['title']="General Manager Tree";
	    $data['breadcrumb']='<li class="active">General Manager Tree</li>';
		/////
		$data['main_user_id']=$user_id;
		$data['main_username']=$main_user->username;
		$data['main_image'] = $main_user->image;
		$data['main_ref_id'] = $main_user->ref_id;
		$data['main_member_type'] = $main_user->pkg_id;
		$data['main_email'] = $main_user->email;
		$data['main_country'] = $main_user->country;
	    ///level 1 data
		///level 1 data
		
		//_userLayout("my-genealogy-mgmt1/tree_stage1",$data);
		$data['title']="Noble Board";
		$data['controller']=$this;
		$data['table']='matrix_stage4';
		$data['level1_user_id1']=$level1_info;
		$data['level2_info'][0]=$level2_info_1;
		$data['level2_info'][1]=$level2_info_2;
		$data['action']='stage4Tree';
		//$data['level3_info'][0]=$level3_info_1;
		//$data['level3_info'][1]=$level3_info_2;
		//$data['level3_info'][2]=$level3_info_3;
		//$data['level3_info'][3]=$level3_info_4;
		//_userLayout("my-genealogy-mgmt1/supervisor-tree",$data);
		_userLayout("my-genealogy-mgmt/gonology_tree1",$data);		
	}//end method


	/*
	@Desc:It's used to display the stage2 tree
	*/
	public function stage5Tree($user_id=null)
	{
		$data['loginID'] = $this->db->select('username')->from('user_registration')->where('user_id',$this->userId)->get()->row();
		//$user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$user_id=(!empty($user_id))? $user_id:$this->userId;
		$main_user=$this->db->select('username,image,ref_id,member_type,email,country')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_stage5 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
	    //pr($level1_info);
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
	        $level2_info_1=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_stage5 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();
		}
		if(!empty($level1_info[1]->user_id))
		{
		    $level2_info_2=$this->db->select(array('u.username','u.user_id','u.image','u.ref_id','u.pkg_id','u.email','u.country'))->from('matrix_stage5 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[1]->user_id, 'level'=>'1'))->get()->result();
		}
		
	    $data['title']="Director Tree";
	    $data['breadcrumb']='<li class="active">Director Tree</li>';
		/////
		$data['main_user_id']=$user_id;
		$data['main_username']=$main_user->username;
		$data['main_image'] = $main_user->image;
		$data['main_ref_id'] = $main_user->ref_id;
		$data['main_member_type'] = $main_user->pkg_id;
		$data['main_email'] = $main_user->email;
		$data['main_country'] = $main_user->country;
	    ///level 1 data
		///level 1 data
		
		//_userLayout("my-genealogy-mgmt1/tree_stage1",$data);
		$data['title']="Royal Board";
		$data['controller']=$this;
		$data['table']='matrix_stage5';
		$data['level1_user_id1']=$level1_info;
		$data['level2_info'][0]=$level2_info_1;
		$data['level2_info'][1]=$level2_info_2;
		$data['action']='stage5Tree';
		//$data['level3_info'][0]=$level3_info_1;
		//$data['level3_info'][1]=$level3_info_2;
		//$data['level3_info'][2]=$level3_info_3;
		//$data['level3_info'][3]=$level3_info_4;
		//_userLayout("my-genealogy-mgmt1/supervisor-tree",$data);
		_userLayout("my-genealogy-mgmt/gonology_tree1",$data);	
	}//end method
	/*
	@Desc:It's used to display the stage6 tree
	*/
	public function stage6Tree($user_id=null)
	{
		$data['loginID'] = $this->db->select('username')->from('user_registration')->where('user_id',$this->userId)->get()->row();
		//$user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$user_id=(!empty($user_id))? $user_id:$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage6 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
		    $level2_info_1=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage6 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();

		}
		if(!empty($level1_info[1]->user_id))
		{
		    $level2_info_2=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage6 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[1]->user_id, 'level'=>'1'))->get()->result();
		}
		if(!empty($level1_info[2]->user_id))
		{
	    $level2_info_3=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage6 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[2]->user_id, 'level'=>'1'))->get()->result();
		}


	    $data['title']="TITANIUM TREE";
	    $data['breadcrumb']='<li class="active">TITANIUM TREE</li>';
		/////
		$data['main_user_id']=$user_id;
		$data['main_username']=$main_user->username;
	    ///level 1 data
		///level 1 data
		if(!empty($level1_info) && count($level1_info)>0)
		{
			if(!empty($level1_info[0]))
			{
				$data['level1_username1']=$level1_info[0]->username;
				$data['level1_user_id1']=$level1_info[0]->user_id;
			}
			//
			if(!empty($level1_info[1]))
			{
				$data['level1_username2']=$level1_info[1]->username;
				$data['level1_user_id2']=$level1_info[1]->user_id;
			}
			///
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
	    ///level 2 data
		if(!empty($level2_info_1) && count($level2_info_1)>0)
		{
			if(!empty($level2_info_1[0]))
			{
				$data['level2_username1']=$level2_info_1[0]->username;
				$data['level2_user_id1']=$level2_info_1[0]->user_id;
			}
			//
			if(!empty($level2_info_1[1]))
			{
				$data['level2_username2']=$level2_info_1[1]->username;
				$data['level2_user_id2']=$level2_info_1[1]->user_id;
			}
			if(!empty($level2_info_1[2]))
			{
				$data['level2_username3']=$level2_info_1[2]->username;
				$data['level2_user_id3']=$level2_info_1[2]->user_id;
			}
		}
		if(!empty($level2_info_2) && count($level2_info_2)>0)
		{	
			//
			if(!empty($level2_info_2[0]))
			{
				$data['level2_username4']=$level2_info_2[0]->username;
				$data['level2_user_id4']=$level2_info_2[0]->user_id;
			}
			//
			if(!empty($level2_info_2[1]))
			{
				$data['level2_username5']=$level2_info_2[1]->username;
				$data['level2_user_id5']=$level2_info_2[1]->user_id;			
			}
			//
			if(!empty($level2_info_2[2]))
			{
				$data['level2_username6']=$level2_info_2[2]->username;
				$data['level2_user_id6']=$level2_info_2[2]->user_id;			
			}
		}//end level2 if here!
		///
		if(!empty($level2_info_3) && count($level2_info_3)>0)
		{	
			//
			if(!empty($level2_info_3[0]))
			{
				$data['level2_username7']=$level2_info_3[0]->username;
				$data['level2_user_id7']=$level2_info_3[0]->user_id;
			}
			//
			if(!empty($level2_info_3[1]))
			{
				$data['level2_username8']=$level2_info_3[1]->username;
				$data['level2_user_id8']=$level2_info_3[1]->user_id;			
			}
			//
			if(!empty($level2_info_3[2]))
			{
				$data['level2_username9']=$level2_info_3[2]->username;
				$data['level2_user_id9']=$level2_info_3[2]->user_id;			
			}
		}//end level2 if here!
		_userLayout("my-genealogy-mgmt1/tree_stage6",$data);	
	}//end method
}//end class

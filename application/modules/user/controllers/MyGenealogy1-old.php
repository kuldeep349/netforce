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
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_downline as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		$level2_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_downline as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'2'))->get()->result();
		
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
	    $level2_info_1=$this->db->select(array('u.username','u.user_id'))->from('matrix_downline as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();
		}
		if(!empty($level1_info[1]->user_id))
		{
	    $level2_info_2=$this->db->select(array('u.username','u.user_id'))->from('matrix_downline as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[1]->user_id, 'level'=>'1'))->get()->result();
		}
		
		if(!empty($level1_info[2]->user_id))
		{
	    $level2_info_3=$this->db->select(array('u.username','u.user_id'))->from('matrix_downline as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[2]->user_id, 'level'=>'1'))->get()->result();
		}

	    $data['title']="Stage1 Tree";
	    $data['breadcrumb']='<li class="active">Stage1 Tree</li>';
		/////
		$data['main_user_id']=$user_id;
		$data['main_username']=$main_user->username;
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
		$data['title']="Affiliate Stage";
		$data['level1_info']=$level1_info;
		$data['level2_info'][0]=$level2_info_1;
		$data['level2_info'][1]=$level2_info_2;
		_userLayout("my-genealogy-mgmt1/affiliate-tree",$data);	
	}//end method
	/*
	@Desc:It's used to display the stage1 tree
	*/
	public function stage1Tree($user_id=null)
	{
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
	    //pr($level1_info);
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
	    $level2_info_1=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();
		}
		if(!empty($level1_info[1]->user_id))
		{
		    $level2_info_2=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[1]->user_id, 'level'=>'1'))->get()->result();

		}
		
		if(!empty($level2_info[0]->user_id))
		{
	    $level3_info_1=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level2_info[0]->user_id, 'level'=>'2'))->get()->result();
		}
		if(!empty($level2_info[1]->user_id))
		{
		    $level3_info_2=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level2_info[1]->user_id, 'level'=>'2'))->get()->result();
		}
		
		if(!empty($level2_info[2]->user_id))
		{
	    $level3_info_3=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level2_info[0]->user_id, 'level'=>'2'))->get()->result();
		}
		if(!empty($level2_info[3]->user_id))
		{
		    $level3_info_4=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level2_info[1]->user_id, 'level'=>'2'))->get()->result();
		}
		
		
		/*if(!empty($level1_info[2]->user_id))
		{
	        $level2_info_3=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[2]->user_id, 'level'=>'1'))->get()->result();
		}*/
	    $data['title']="Stage2 Tree";
	    $data['breadcrumb']='<li class="active">Stage2 Tree</li>';
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
		//_userLayout("my-genealogy-mgmt1/tree_stage1",$data);
		$data['title']="Supervisor Stage";
		$data['level1_info']=$level1_info;
		$data['level2_info'][0]=$level2_info_1;
		$data['level2_info'][1]=$level2_info_2;
		$data['level2_info'][2]=$level2_info_3;
		$data['level2_info'][3]=$level2_info_4;
		_userLayout("my-genealogy-mgmt1/affiliate-tree",$data);	
	}//end method

	/*
	@Desc:It's used to display the stage2 tree
	*/
	public function stage2Tree($user_id=null)
	{
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage2 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
		    $level2_info_1=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage2 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();

		}
		if(!empty($level1_info[1]->user_id))
		{
		    $level2_info_2=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage2 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[1]->user_id, 'level'=>'1'))->get()->result();
			
		}
		if(!empty($level1_info[2]->user_id))
		{
	    $level2_info_3=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage2 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[2]->user_id, 'level'=>'1'))->get()->result();
		}
	    $data['title']="Stage3 Tree";
	    $data['breadcrumb']='<li class="active">Stage3 Tree</li>';
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
		$data['title']="Manager Stage";
		$data['level1_info']=$level1_info;
		$data['level2_info'][0]=$level2_info_1;
		$data['level2_info'][1]=$level2_info_2;
		_userLayout("my-genealogy-mgmt1/affiliate-tree",$data);	
		//_userLayout("my-genealogy-mgmt1/tree_stage2",$data);	
	}//end method

	/*
	@Desc:It's used to display the stage3 tree
	*/
	public function stage3Tree($user_id=null)
	{
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage3 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
		    $level2_info_1=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage3 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();

		}
		if(!empty($level1_info[1]->user_id))
		{
		    $level2_info_2=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage3 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();

		}
		if(!empty($level1_info[2]->user_id))
		{
	    $level2_info_3=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage3 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[2]->user_id, 'level'=>'1'))->get()->result();
		}

	    $data['title']="Stage4 Tree";
	    $data['breadcrumb']='<li class="active">Stage4 Tree</li>';
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
		$data['title']="Senior Manager Stage";
		$data['level1_info']=$level1_info;
		$data['level2_info'][0]=$level2_info_1;
		$data['level2_info'][1]=$level2_info_2;
		_userLayout("my-genealogy-mgmt1/affiliate-tree",$data);	
		//_userLayout("my-genealogy-mgmt1/tree_stage3",$data);	
	}//end method
	/*
	@Desc:It's used to display the stage4 tree
	*/
	public function stage4Tree($user_id=null)
	{
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage4 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
		    $level2_info_1=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage4 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();

		}
		if(!empty($level1_info[1]->user_id))
		{
		    $level2_info_2=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage4 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[1]->user_id, 'level'=>'1'))->get()->result();

	    }	
		if(!empty($level1_info[2]->user_id))
		{
	    $level2_info_3=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage4 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[2]->user_id, 'level'=>'1'))->get()->result();
		}
		



	    $data['title']="Stage5 Tree";
	    $data['breadcrumb']='<li class="active">Stage5 Tree</li>';
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
		$data['title']="General Manager Stage";
		$data['level1_info']=$level1_info;
		$data['level2_info'][0]=$level2_info_1;
		$data['level2_info'][1]=$level2_info_2;
		_userLayout("my-genealogy-mgmt1/affiliate-tree",$data);	
		//_userLayout("my-genealogy-mgmt1/tree_stage4",$data);	
	}//end method
	/*
	@Desc:It's used to display the stage5 tree
	*/
	public function stage5Tree($user_id=null)
	{
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage5 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		/*----2nd level data-----*/
		if(!empty($level1_info[0]->user_id))
		{
		    $level2_info_1=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage5 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[0]->user_id, 'level'=>'1'))->get()->result();

		}
		if(!empty($level1_info[1]->user_id))
		{
		    $level2_info_2=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage5 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[1]->user_id, 'level'=>'1'))->get()->result();
		}
		if(!empty($level1_info[2]->user_id))
		{
	    $level2_info_3=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage5 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$level1_info[2]->user_id, 'level'=>'1'))->get()->result();
		}

	    $data['title']="Stage6 Tree";
	    $data['breadcrumb']='<li class="active">Stage6 Tree</li>';
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
		$data['title']="Director Stage";
		$data['level1_info']=$level1_info;
		$data['level2_info'][0]=$level2_info_1;
		$data['level2_info'][1]=$level2_info_2;
		_userLayout("my-genealogy-mgmt1/affiliate-tree",$data);	
		//_userLayout("my-genealogy-mgmt1/tree_stage5",$data);	
	}//end method
	/*
	@Desc:It's used to display the stage6 tree
	*/
	public function stage6Tree($user_id=null)
	{
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
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

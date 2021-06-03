<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package user/MyGenealogy
*/
class MyGenealogy extends Common_Controller 
{
	private $userId;
	private $moduleName;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		user_auth();
		$this->load->helper("layout_helper");
		$this->load->model("network_model");
		$this->load->model("member_model");
		$this->load->model("package_model");
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
		echo $user_id;
		die;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id','u.image'))->from('matrix_downline as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();

	    $data['title']="Feeder Stage TREE";
	    $data['breadcrumb']='<li class="active">Feeder Stage TREE</li>';
		/////root user details
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
		//_userLayout("my-genealogy-mgmt/feeder-stage-tree",$data);	
		
		 $this->load->view("my-genealogy-mgmt/feeder-stage-tree",$data);	
	}//end method
	public function ajaxFeederStageTree($user_id=null)
	{
		$data=array();
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id','u.image'))->from('matrix_downline as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		/////root user details
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!


		$this->load->view("my-genealogy-mgmt/ajax-feeder-stage-tree",$data);
	}
	/*
	@Desc:It's used to display the stage1 tree
	*/
	public function stage1Tree($user_id=null)
	{
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();

	    $data['title']="Stage2 TREE";
	    $data['breadcrumb']='<li class="active">Stage2 TREE</li>';
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
	  $this->load->view("my-genealogy-mgmt/stage1-tree",$data);	
	}//end method
	public function ajaxStage1Tree($user_id=null)
	{
		$data=array();
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage1 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		/////root user details
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
		$this->load->view("my-genealogy-mgmt/ajax-stage1-tree",$data);
	}
	/*
	@Desc:It's used to display the stage2 tree
	*/
	public function stage2Tree($user_id=null)
	{
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage2 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();

	    $data['title']="Stage3 TREE";
	    $data['breadcrumb']='<li class="active">Stage3 TREE</li>';
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
		 $this->load->view("my-genealogy-mgmt/stage2-tree",$data);
	}//end method
	public function ajaxStage2Tree($user_id=null)
	{
		$data=array();
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage2 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();

		/////root user details
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
		$this->load->view("my-genealogy-mgmt/ajax-stage2-tree",$data);
	}
	/*
	@Desc:It's used to display the stage3 tree
	*/
	public function stage3Tree($user_id=null)
	{
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage3 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();

	    $data['title']="Stage4 Tree";
	    $data['breadcrumb']='<li class="active">Stage4 TREE</li>';
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
		 $this->load->view("my-genealogy-mgmt/stage3-tree",$data);
	}//end method
	public function ajaxStage3Tree($user_id=null)
	{
		$data=array();
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage3 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		/////root user details
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
		$this->load->view("my-genealogy-mgmt/ajax-stage3-tree",$data);
	}
	/*
	@Desc:It's used to display the stage4 tree
	*/
	public function stage4Tree($user_id=null)
	{
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage4 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();

	    $data['title']="Stage5 TREE";
	    $data['breadcrumb']='<li class="active">Stage5 TREE</li>';
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
		 $this->load->view("my-genealogy-mgmt/stage4-tree",$data);
	}//end method
	public function ajaxStage4Tree($user_id=null)
	{
		$data=array();
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage4 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		/////root user details
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
		$this->load->view("my-genealogy-mgmt/ajax-stage4-tree",$data);
	}
	/*
	@Desc:It's used to display the stage5 tree
	*/
	public function stage5Tree($user_id=null)
	{
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage5 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();

	    $data['title']="SENIOR DIAMOND TREE";
	    $data['breadcrumb']='<li class="active">SENIOR DIAMOND TREE</li>';
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
		 $this->load->view("my-genealogy-mgmt/stage5-tree",$data);
	}//end method
	public function ajaxStage5Tree($user_id=null)
	{
		$data=array();
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage5 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		/////root user details
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
		$this->load->view("my-genealogy-mgmt/ajax-stage5-tree",$data);
	}
	/*
	@Desc:It's used to display the stage6 tree
	*/
	public function stage6Tree($user_id=null)
	{
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage6 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();

	    $data['title']="TITANIUM TREE";
	    $data['breadcrumb']='<li class="active">TITANIUM TREE</li>';
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
		 $this->load->view("my-genealogy-mgmt/stage6-tree",$data);
	}//end method
	public function ajaxStage6Tree($user_id=null)
	{
		$data=array();
	    $user_id=(!empty($user_id))?ID_decode($user_id):$this->userId;
		$main_user=$this->db->select('username')->from('user_registration')->where('user_id',$user_id)->get()->row();
		/*----first level data-----*/
	    $level1_info=$this->db->select(array('u.username','u.user_id'))->from('matrix_stage6 as m')->join('user_registration as u','u.user_id=m.down_id')->where(array('income_id'=>$user_id, 'level'=>'1'))->get()->result();
		/////root user details
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
			if(!empty($level1_info[2]))
			{
				$data['level1_username3']=$level1_info[2]->username;
				$data['level1_user_id3']=$level1_info[2]->user_id;
			}
		}//end level1 if here!
		$this->load->view("my-genealogy-mgmt/ajax-stage6-tree",$data);
	}
}//end class

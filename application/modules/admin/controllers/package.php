<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/package
*/
class Package extends Common_Controller 
{
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->helper("layout_helper");
		$this->load->helper("direct_commission_conf_helper");
		$this->load->helper("unilevel_commission_conf_helper");
		$this->load->helper("indirect_sponsor_unilevel_commission_conf_helper");
		$this->load->helper("stage_completion_commission_conf_helper");
		$this->load->helper("stage_completion_rank_bonus_conf_helper");
		$this->load->helper("stage_wise_matrix_level_commission_conf_helper");
		$this->load->helper("stage_wise_matrix_uni-level_commission_conf_helper");
		$this->load->model('package_model');
	}//end constructor 
	/*
	@author:Aditya
	@param:none
	@desc: this function is used to show the package listing
	@return:none;
	*/
	public function allPackages()
	{
        $data['all_packages']=$this->package_model->getAllPackages();
		_adminLayout("package-mgmt/all-packages",$data);
	}//end method
	/*
	@author:Aditya
	@param:none
	@desc: this function is used to add new package
	@return:none;
	*/
	public function addNewPackage()
	{
		redirect(site_url().'admin/package/allPackages');
		if(!empty($this->input->post('btn')))
		{
         $title=$this->input->post('title');
         $amount=$this->input->post('amount');
         $description=$this->input->post('description');
	     $image_upload_path='/images/';
	     $pkg_image=adImageUpload($_FILES['pkg_image'],1, $image_upload_path);

         $this->db->insert("package",array('title'=>$title,"amount"=>$amount,"description"=>$description,"pkg_image"=>$pkg_image));
         $max_row_obj=$this->db->select_max('id')->from('package')->get()->row();
         $max_id=$max_row_obj->id;
         
         $all_commission_type=$commission_type_ids=$this->db->select('id')->from('commission_type')->get()->result();
         $all_commission_type=(!empty($all_commission_type))?$all_commission_type:array();
         if(!empty($all_commission_type) && count($all_commission_type)>0)
         {
         	$commission_type_array=array();
	         foreach ($all_commission_type as $commission_type) 
	         {
	           $commission_type_array[]=array(
	           	'comm_type_id'=>$commission_type->id,
	           	'pkg_id'=>$max_id,
	           	);
	         }
	        $this->db->insert_batch("commission_permission",$commission_type_array); 
         }
         $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> New Package is added successfully');
         redirect(site_url()."admin/package/allPackages");
		 exit;
		}
		_adminLayout("package-mgmt/add-new-package");
	}//end method
	/*
	@author:Aditya
	@param:int(edit_id)
	@desc: this function is used to edit the package
	@return:none;
	*/
	public function editPackage($edit_id=null)
	{
		
		$edit_id=ID_decode($edit_id);
		if(!empty($this->input->post('btn')))
		{
         $title=$this->input->post('title');
         $amount=$this->input->post('amount');
         $description=$this->input->post('description');
		 $link_to=$this->input->post('link_to');
		 $pv=$this->input->post('pv');
		 $shipment_charge=$this->input->post('shipment_charge');
		 $tax=$this->input->post('tax');

	     $image_upload_path='/images/';
	     $pkg_image=adImageUpload($_FILES['pkg_image'],1, $image_upload_path);
	     $pkg_image=(!empty($pkg_image))?$pkg_image:$_POST['old_pkg_img'];
        
		$this->db->update("package",array('title'=>$title,"amount"=>$amount,"description"=>$description,'pkg_image'=>$pkg_image,'link_to'=>$link_to,'pv'=>$pv,'shipment_charge'=>$shipment_charge,'tax'=>$tax),array("id"=>$edit_id));
         
         $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Package is edited successfully');

         redirect(site_url()."admin/package/allPackages");
         exit;
		}
		$data=array();
		$data['package']=$this->package_model->getPackage($edit_id);
		_adminLayout("package-mgmt/edit-package",$data);	
	}//end method
    /*
    @Desc:It's used to change the package status
    */
    public function changePackageStatus($id)
    {
    	redirect(site_url().'admin/package/allPackages/');
		$pkg_id=ID_decode($id);
    	$package_details=$this->package_model->getPackage($pkg_id);
    	if($package_details->status=='0')
    	{
         $this->db->update('package',array('status'=>'1'),array('id'=>$pkg_id));
         $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Package is Activated successfully');
    	}
    	else 
    	{
         $this->db->update('package',array('status'=>'0'),array('id'=>$pkg_id));
         $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Package is Deactivated successfully');
    	}
        redirect(site_url()."admin/package/allPackages");
        exit;
    }
	/*
	@author:Aditya
	@param:int(delete_id)
	@desc: this function is used to delete the package
	@return:none;
	*/
	public function deletePackage($delete_id=null)
	{
		$delete_id=ID_decode($delete_id);
		$this->db->delete("package",array('id'=>$delete_id));
        $this->db->delete('commission_permission',array('pkg_id'=>$delete_id));
        $this->db->delete('direct_commission',array('pkg_id'=>$delete_id));
        //$this->db->delete('binary_commission',array('pkg_id'=>$delete_id));
        
        ////////
        $all_matching_commission=$this->db->select('id')->from('matching_commission')->where('pkg_id',$delete_id)->get()->result();

        $all_matching_commission=(!empty($all_matching_commission))?$all_matching_commission:array();
        if(!empty($all_matching_commission) && count($all_matching_commission)>0)
        {
        	foreach ($all_matching_commission as $matching_commission) 
        	{
        		$this->db->delete('matching_commission_meta', array('matching_commission_id'=>$matching_commission->id));
        	}
        }
        $this->db->delete('matching_commission',array('pkg_id'=>$delete_id));
        /////////////
        $all_unilevel_commission=$this->db->select('id')->from('unilevel_commission')->where('pkg_id',$delete_id)->get()->result();

        $all_unilevel_commission=(!empty($all_unilevel_commission))?$all_unilevel_commission:array();
        if(!empty($all_unilevel_commission) && count($all_unilevel_commission)>0)
        {
        	foreach ($all_unilevel_commission as $unilevel_commission) 
        	{
        		$this->db->delete('unilevel_commission_meta', array('unilevel_commission_id'=>$unilevel_commission->id));
        	}
        }
        $this->db->delete('unilevel_commission',array('pkg_id'=>$delete_id));
        ////////////
        $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Package is deleted successfully');
        redirect(site_url()."admin/package/allPackages/");	
        exit;	
	}//end method
	/*
	@author:Aditya
	@param:int(package_id)
	@desc: this function is used to show the rank listing
	@return:none;
	*/
	public function manageCommission($package_id=null)
	{
		$package_id=ID_decode($package_id);
		$package_obj=$this->db->select('title')->from('package')->where('id',$package_id)->get();
		
		$all_commission_type=$this->db->select('ctype.id ctype_id,perm.id perm_id,perm.pkg_id pkg_id, ctype.title as ctype_title, perm.status as perm_status,ctype.url')->from("commission_type as ctype")->join('commission_permission perm','ctype.id=perm.comm_type_id','left')->where(array('perm.pkg_id'=>$package_id,'ctype.display'=>'1'))->order_by('ctype.position')->get()->result();
		//echo $this->db->last_query();
		
		$data=array();
		$data['data']=$all_commission_type;
		$data['package_title']=$package_obj->row()->title;
		_adminLayout("package-mgmt/manage-commission",$data);
	}//end method	
	/*
	@author:Aditya
	@param:int(package_id),int(commission_type_id)
	@desc: this function is used to change the specific package status for specific commission type
	@return:none;
	@signature: void changePackageCommissionTypeStatus(<int(package_id)>,<int(commission_type_id)>)
	*/
	public function changePackageCommissionTypeStatus($permission_id=null)
	{
      $permission_id=ID_decode($permission_id);
      $permission_obj=$this->db->select('*')->from('commission_permission')->where('id',$permission_id)->get()->row();
      if($permission_obj->status==1)
      {
      $this->db->update("commission_permission",array('status'=>'0'),array('id'=>$permission_id));
      }
      else if($permission_obj->status==0)
      {
      $this->db->update("commission_permission",array('status'=>'1'),array('id'=>$permission_id));
      }
      //echo $this->db->last_query();
      //die;
      $this->session->set_flashdata('flash_msg','<h5 class="panel-title" style="color:green">Status is changed successfully!</h5>');
      redirect(site_url()."admin/package/manageCommission/".ID_encode($permission_obj->pkg_id));
      exit;
	}//end method
	/*
	@author:Aditya
	@param:int(package_id),int(commission_type_id)
	@desc: this function is used to configure the compensatation plan of the specific package for Direct commission type
	@return:none;
	@signature: void configurePackage(<int(package_id)>,<int(commission_type_id)>)
	*/
	public function configureDirectCommision($package_id=null,$commission_type_id=null)
	{
		$data=array();
		$package_id=ID_decode($package_id);
		
		$packageObj=$this->db->select('title')->from('package')->where('id',$package_id)->get()->row();
		$data['direct_commission']=$this->db->select('*')->from('direct_commission')->where('pkg_id',$package_id)->get()->row();
		$direct_commission_meta=$this->db->select('*')->from('direct_commission_meta')->where('pkg_id',$package_id)->get()->result();
		$new_direct_commission_meta=array();
		foreach($direct_commission_meta as $meta)
		{
			$new_direct_commission_meta[$meta->stage_key]=$meta;
		}
		$data['direct_commission_meta']=$new_direct_commission_meta;
		$data['package_id']=$package_id;
		$data['package_title']=$packageObj->title;
	   _adminLayout("package-mgmt/configure-direct-commission.php",$data);
	}//end method
	/*
	@author:Aditya
	@param:None
	@desc: this function is used to save the compensatation plan of the specific package for Direct commission type
	@return:none;
	@signature: void SaveDirectCommision()
	*/
	public function saveDirectCommission()
	{
		$data=array();
		$pkg_id=$this->input->post('pkg_id');

		saveDirectCommission();

		$packageObj=$this->db->select('title')->from('package')->where('id',$pkg_id)->get()->row();

		$data['package_id']=$pkg_id;

		$data['package_title']=$packageObj->title;

		$this->session->set_flashdata('flash_msg','<h5 class="panel-title" style="color:green">Direct Commission is saved successfully!</h5>');

        redirect(site_url()."admin/package/configureDirectCommision/".ID_encode($pkg_id),$data);
        exit;
	}//end method
	/*
	@author:Aditya
	@param:int(package_id),int(commission_type_id)
	@desc: this function is used to configure the compensatation plan of the specific package for Unilevel commission type
	@return:none;
	@signature: void configureUnilevelCommision(<int(package_id)>,<int(commission_type_id)>)
	*/
	public function configureIndirectSponsorUnilevelCommision($package_id=null,$commission_type_id=null)
	{
		$data=array();
		$package_id=ID_decode($package_id);
		$packageObj=$this->db->select('title')->from('package')->where('id',$package_id)->get()->row();
		$unilevel_commission=$this->db->select('*')->from('indirect_unilevel_commission')->where('pkg_id', $package_id)->get()->row();
		$data['unilevel_commission']=$unilevel_commission;
		if(!empty($unilevel_commission->id))
		{
			$data['unilevel_commission_meta']=$this->db->select('*')->from('indirect_unilevel_commission_meta')->where('unilevel_commission_id',$unilevel_commission->id)->get()->result();
		}
		else 
		{
			$data['unilevel_commission_meta']=null;
		}
		$data['package_id']=$package_id;
		$data['package_title']=$packageObj->title;
        _adminLayout("package-mgmt/configure-indirect-sponsor-unilevel-commission",$data);
	}//end method
	/*
	@author:Aditya
	@param:None
	@desc: this function is used to save the compensatation plan of the specific package for Unilevel commission type
	@return:none;
	@signature: void saveUnilevelCommission()
	*/
	public function saveIndirectSponsorUnilevelCommission()
	{
		$data=array();
		$pkg_id=$this->input->post('pkg_id');
		saveIndirectSponsorUnilevelCommission();
		$packageObj=$this->db->select('title')->from('package')->where('id',$pkg_id)->get()->row();
		$data['package_id']=$pkg_id;
		$data['package_title']=$packageObj->title;
		$this->session->set_flashdata('flash_msg','<h5 class="panel-title" style="color:green">Unilevel Commission is saved successfully!</h5>');
        redirect(site_url()."admin/package/configureIndirectSponsorUnilevelCommision/".ID_encode($pkg_id),$data);
        exit;
	}//end method
	public function configureStageCompletionCommision($package_id=null)
	{
		$data=array();
		$package_id=ID_decode($package_id);
		
		$packageObj=$this->db->select('title')->from('package')->where('id',$package_id)->get()->row();
		
		$data['direct_commission']=$this->db->select('*')->from(' matrix_stage_commission')->where('pkg_id',$package_id)->get()->row();
		
		$direct_commission_meta=$this->db->select('*')->from('matrix_stage_commission_meta')->where('pkg_id',$package_id)->get()->result();
		
		$new_direct_commission_meta=array();
		
		foreach($direct_commission_meta as $meta)
		{
			$new_direct_commission_meta[$meta->stage_key]=$meta;
		}
		
		$data['direct_commission_meta']=$new_direct_commission_meta;
		
		$data['package_id']=$package_id;
		
		$data['package_title']=$packageObj->title;
	   
	   _adminLayout("package-mgmt/configure-stage-completion-commision",$data);
	}//end method
	public function saveStageCompletionCommision()
	{
		$data=array();
		$pkg_id=$this->input->post('pkg_id');

		saveStageCompletionCommision();

		$packageObj=$this->db->select('title')->from('package')->where('id',$pkg_id)->get()->row();

		$data['package_id']=$pkg_id;

		$data['package_title']=$packageObj->title;

		$this->session->set_flashdata('flash_msg','<h5 class="panel-title" style="color:green">Stage Completion Commission is saved successfully!</h5>');

        redirect(site_url()."admin/package/configureStageCompletionCommision/".ID_encode($pkg_id),$data);
        exit;
	}//end method
	public function configureStageCompletionRankBonus($package_id=null)
	{	
		$data=array();
		$package_id=ID_decode($package_id);
		
		$packageObj=$this->db->select('title')->from('package')->where('id',$package_id)->get()->row();
		
		$data['direct_commission']=$this->db->select('*')->from(' matrix_stage_rank_bonus')->where('pkg_id',$package_id)->get()->row();
		
		$direct_commission_meta=$this->db->select('*')->from('matrix_stage_rank_bonus_meta')->where('pkg_id',$package_id)->get()->result();
		
		$new_direct_commission_meta=array();
		
		foreach($direct_commission_meta as $meta)
		{
			$new_direct_commission_meta[$meta->stage_key]=$meta;
		}
		
		$data['direct_commission_meta']=$new_direct_commission_meta;
		
		$data['package_id']=$package_id;
		
		$data['package_title']=$packageObj->title;
	   _adminLayout("package-mgmt/configure-stage-completion-rank-bonus",$data);
	}//end method
	public function saveStageCompletionRankBonus()
	{
		$data=array();
		$pkg_id=$this->input->post('pkg_id');

		saveStageCompletionRankBonus();

		$packageObj=$this->db->select('title')->from('package')->where('id',$pkg_id)->get()->row();

		$data['package_id']=$pkg_id;

		$data['package_title']=$packageObj->title;

		$this->session->set_flashdata('flash_msg','<h5 class="panel-title" style="color:green">Stage Completion Commission is saved successfully!</h5>');

        redirect(site_url()."admin/package/configureStageCompletionRankBonus/".ID_encode($pkg_id),$data);
        exit;
	}//end method
    public function configureStageWiseMatrixLevelCommision($package_id=null)
	{
		$data=array();
		$package_id=ID_decode($package_id);
		$packageObj=$this->db->select('title')->from('package')->where('id',$package_id)->get()->row();
		
		$matrix_stage_level_commission=$this->db->select('*')->from('matrix_stage_level_commission')->where('pkg_id',$package_id)->get()->row();
		
		$data['matrix_stage_level_commission']=$matrix_stage_level_commission;
		$feeder_stage_meta=array();
		$stage1_meta=array();
		$stage2_meta=array();
		$stage3_meta=array();
		$stage4_meta=array();
		$stage5_meta=array();
		if(!empty($matrix_stage_level_commission->id))
		{
			$matrix_stage_level_commission_meta=$this->db->select('*')->from('matrix_stage_level_commission_meta')->where('pkg_id',
			$package_id)->get()->result();
			//pr($matrix_stage_level_commission_meta);
		
			foreach($matrix_stage_level_commission_meta as $meta)
			{
				if($meta->stage_key=='feeder_stage')
					$feeder_stage_meta[]=$meta;
				if($meta->stage_key=='stage_1')
					$stage1_meta[]=$meta;
				if($meta->stage_key=='stage_2')
					$stage2_meta[]=$meta;
				if($meta->stage_key=='stage_3')
					$stage3_meta[]=$meta;
				if($meta->stage_key=='stage_4')
					$stage4_meta[]=$meta;
				if($meta->stage_key=='stage_5')
					$stage5_meta[]=$meta;
				
			}
		}
		$data['package_id']=$package_id;
		$data['feeder_stage_meta']=$feeder_stage_meta;
		$data['stage1_meta']=$stage1_meta;
		$data['stage2_meta']=$stage2_meta;
		$data['stage3_meta']=$stage3_meta;
		$data['stage4_meta']=$stage4_meta;
		$data['stage5_meta']=$stage5_meta;
		
		$data['package_title']=$packageObj->title;
		_adminLayout("package-mgmt/configure-stage-wise-matrix-level-commision",$data);
	}//end method
	public function stageWiseMatrixLevelCommision()
	{
		$data=array();
		$pkg_id=$this->input->post('pkg_id');

		stageWiseMatrixLevelCommision();

		$packageObj=$this->db->select('title')->from('package')->where('id',$pkg_id)->get()->row();
		$data['package_id']=$pkg_id;
		$data['package_title']=$packageObj->title;
		$this->session->set_flashdata('flash_msg','<h5 class="panel-title" style="color:green">Matrix Stage Level Commission is saved successfully!</h5>');
        redirect(site_url()."admin/package/configureStageWiseMatrixLevelCommision/".ID_encode($pkg_id),$data);
        exit;
	}
/*
	@author:Aditya
	@param:int(package_id),int(commission_type_id)
	@desc: this function is used to configure the compensatation plan of the specific package for Unilevel commission type
	@return:none;
	@signature: void configureUnilevelCommision(<int(package_id)>,<int(commission_type_id)>)
	*/
	public function configureStageWiseUnilevelCommision($package_id=null,$commission_type_id=null)
	{
		$data=array();
		$package_id=ID_decode($package_id);
		$packageObj=$this->db->select('title')->from('package')->where('id',$package_id)->get()->row();
		
		$matrix_stage_level_commission=$this->db->select('*')->from('unilevel_stage_level_commission')->where('pkg_id',$package_id)->get()->row();
		
		$data['matrix_stage_level_commission']=$matrix_stage_level_commission;
		$feeder_stage_meta=array();
		$stage1_meta=array();
		$stage2_meta=array();
		$stage3_meta=array();
		$stage4_meta=array();
		$stage5_meta=array();
		$stage6_meta=array();
		if(!empty($matrix_stage_level_commission->id))
		{
			$matrix_stage_level_commission_meta=$this->db->select('*')->from('unilevel_stage_level_commission_meta')->where('pkg_id',
			$package_id)->get()->result();
			//pr($matrix_stage_level_commission_meta);
		    
			foreach($matrix_stage_level_commission_meta as $meta)
			{
				if($meta->stage_key=='feeder_stage')
					$feeder_stage_meta[]=$meta;
				if($meta->stage_key=='stage_1')
					$stage1_meta[]=$meta;
				if($meta->stage_key=='stage_2')
					$stage2_meta[]=$meta;
				if($meta->stage_key=='stage_3')
					$stage3_meta[]=$meta;
				if($meta->stage_key=='stage_4')
					$stage4_meta[]=$meta;
				if($meta->stage_key=='stage_5')
					$stage5_meta[]=$meta;
				if($meta->stage_key=='stage_6')
					$stage6_meta[]=$meta;
			}
		}
		$data['package_id']=$package_id;
		$data['feeder_stage_meta']=$feeder_stage_meta;
		$data['stage1_meta']=$stage1_meta;
		$data['stage2_meta']=$stage2_meta;
		$data['stage3_meta']=$stage3_meta;
		$data['stage4_meta']=$stage4_meta;
		$data['stage5_meta']=$stage5_meta;
		$data['stage6_meta']=$stage6_meta;
		
		$data['package_title']=$packageObj->title;
        _adminLayout("package-mgmt/configure-unilevel-commission",$data);
	}//end method
	/*
	@author:Aditya
	@param:None
	@desc: this function is used to save the compensatation plan of the specific package for Unilevel commission type
	@return:none;
	@signature: void saveUnilevelCommission()
	*/
	public function saveStageWiseUnilevelCommission()
	{
		$data=array();
		$pkg_id=$this->input->post('pkg_id');

		stageWiseMatrixUnilevelLevelCommision();
		$packageObj=$this->db->select('title')->from('package')->where('id',$pkg_id)->get()->row();
		$data['package_id']=$pkg_id;
		$data['package_title']=$packageObj->title;
		$this->session->set_flashdata('flash_msg','<h5 class="panel-title" style="color:green">Unilevel Commission is saved successfully!</h5>');
        redirect(site_url()."admin/package/configureStageWiseUnilevelCommision/".ID_encode($pkg_id),$data);
        exit;
	}//end method	
}//end class

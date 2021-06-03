<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/rank
*/
class Rank2 extends Common_Controller 
{
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->helper("layout_helper");
		$this->load->model('rank_model2');
	}//end constructor 
	/*
	@author:Aditya
	@param:none
	@desc: this function is used to show the rank listing
	@return:none;
	*/
	public function allRanks2()
	{
         $data['all_ranks']=$this->rank_model2->getAllRanks();
         $data['moduleName']=$this->router->fetch_module();
		_adminLayout("rank-mgmt2/all-rank2",$data);
	}//end method
	/*
	@author:Aditya
	@param:none
	@desc: this function is used to add new rank
	@return:none;
	*/
	public function addNewRank2()
	{
		if(!empty($this->input->post('btn')))
		{

         $code=$this->input->post('code');
         $rank_name=$this->input->post('rank_name');
         $pdp=$this->input->post('pdp');
         $cgv=$this->input->post('cgv');
         $create_date=date('Y-m-d');
         $bonus_amount=$this->input->post('bonus_amount');		 		 $image_upload_path='/rank_images/';	     $rnk_image=adImageUpload($_FILES['rnk_image'],1, $image_upload_path);
         $this->db->insert("rank_setting2",array('rnk_img'=>$rnk_image,'code'=>$code,'rank_name'=>$rank_name,"pdp"=>$pdp,"cgv"=>$cgv,"bonus_amount"=>$bonus_amount,'create_date'=>$create_date));
		 $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> New Rank is added successfully');         
         redirect(site_url()."admin/rank2/allRanks2");
		 exit;
		}
		_adminLayout("rank-mgmt2/add-new-rank2");
	}//end method
	/*
	@author:Aditya
	@param:int(id)
	@desc: this function is used to edit the rank
	@return:none;
	*/
	public function editRank2($edit_id=null)
	{
		$edit_id=ID_decode($edit_id);
		if(!empty($this->input->post('btn')))
		{
         $rank_name=$this->input->post('rank_name');
         $code=$this->input->post('code');
         $pdp=$this->input->post('pdp');
         $cgv=$this->input->post('cgv');
		 
		 $create_date=date('Y-m-d');
         $bonus_amount=$this->input->post('bonus_amount');		 		 $image_upload_path='/rank_images/';	     $rnk_image=adImageUpload($_FILES['rnk_image'],1, $image_upload_path);	     $rnk_image=(!empty($rnk_image))?$rnk_image:$_POST['old_rnk_img'];
         $this->db->update("rank_setting2",array('code'=>$code,'rank_name'=>$rank_name,"pdp"=>$pdp,"cgv"=>$cgv,"bonus_amount"=>$bonus_amount,'create_date'=>$create_date,'rnk_img'=>$rnk_image),array("id"=>$edit_id));
		 $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Rank is edited successfully');         
         redirect(site_url()."admin/rank2/allRanks2/");
         exit;
		}
		$resObj=$this->db->select('*')->from('rank_setting2')->where(array('id'=>$edit_id))->get()->result();
		$data=array();
		$data['id']=$resObj[0]->id;
		$data['code']=$resObj[0]->code;
		$data['rank_name']=$resObj[0]->rank_name;
		$data['pdp']=$resObj[0]->pdp;
		$data['cgv']=$resObj[0]->cgv;
		$data['bonus_amount']=$resObj[0]->bonus_amount;		$data['rnkimg']=$resObj[0]->rnk_img;
		_adminLayout("rank-mgmt2/edit-rank2",$data);
	}//end method
	/*
	@author:Aditya
	@param:int(id)
	@desc: this function is used to delete rank
	@return:none;
	*/
	public function deleteRank2($delete_id=null)
	{
		$delete_id=ID_decode($delete_id);
		$this->db->delete("rank_setting2",array('id'=>$delete_id));
		$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Well done!</span> Rank is deleted successfully');         
        redirect(site_url()."admin/rank2/allRanks2/");		
	}//end method

}//end class
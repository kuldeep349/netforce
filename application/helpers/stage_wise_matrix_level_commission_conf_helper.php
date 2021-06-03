<?php 
/*
	@author:Aditya
	@param:None
	@desc: this function is used to save the compensatation plan of the specific package for Unilevel commission type
	@return:none;
	@signature: void saveUnilevelCommission()
*/
function stageWiseMatrixLevelCommision()
	{
		$obj=& get_instance();
        //////
		$pkg_id=$obj->input->post('pkg_id');
		
		$commission_type=$obj->input->post('commission_type');
		
		//////
		$where=array('pkg_id ='=>$pkg_id);
        
		$matrix_stage_level_commission=$obj->db->select('id')->from(' matrix_stage_level_commission')->where('pkg_id',$pkg_id)->get();
		
		
		if($matrix_stage_level_commission->num_rows()>0)
        {
			$data=array('pkg_id'=>$pkg_id,'commission_type'=>$commission_type);
			
			$obj->db->update("matrix_stage_level_commission",$data,array('pkg_id'=>$pkg_id));
			
				
			$obj->db->delete('matrix_stage_level_commission_meta', array('pkg_id' =>$pkg_id));
			
			insertIntoStageWiseCommissionMeta($pkg_id);   
        }
        else 
        {
			$data=array('pkg_id'=>$pkg_id,'commission_type'=>$commission_type);
			
			$obj->db->insert("matrix_stage_level_commission",$data);
			insertIntoStageWiseCommissionMeta($pkg_id);
        }
	}//end function here
function insertIntoStageWiseCommissionMeta($pkg_id)
{
		$obj=& get_instance();
		
		$stage_1_level_commission_array=$obj->input->post('stage_1_level_commission');

		$stage_2_level_commission_array=$obj->input->post('stage_2_level_commission');

		$stage_3_level_commission_array=$obj->input->post('stage_3_level_commission');


		$stage_4_level_commission_array=$obj->input->post('stage_4_level_commission');


		$stage_5_level_commission_array=$obj->input->post('stage_5_level_commission');


		$stage_6_level_commission_array=$obj->input->post('stage_6_level_commission');
		
		for($i=0;$i<count($stage_1_level_commission_array);$i++)
		{
			$obj->db->insert("matrix_stage_level_commission_meta",array(
			'pkg_id'=>$pkg_id,
			'stage_no'=>'1',
			'stage_key'=>'feeder_stage',
			'level'=>$i+1,
			'commission_amount'=>$stage_1_level_commission_array[$i]
			));
		}
		for($i=0;$i<count($stage_2_level_commission_array);$i++)
		{
			$obj->db->insert("matrix_stage_level_commission_meta",array(
			'pkg_id'=>$pkg_id,
			'stage_no'=>'2',
			'stage_key'=>'stage_1',
			'level'=>$i+1,
			'commission_amount'=>$stage_2_level_commission_array[$i]
			));
		}
		for($i=0;$i<count($stage_3_level_commission_array);$i++)
		{
			$obj->db->insert("matrix_stage_level_commission_meta",array(
			'pkg_id'=>$pkg_id,
			'stage_no'=>'3',
			'stage_key'=>'stage_2',
			'level'=>$i+1,
			'commission_amount'=>$stage_3_level_commission_array[$i]
			));
		}
		
		for($i=0;$i<count($stage_4_level_commission_array);$i++)
		{
			$obj->db->insert("matrix_stage_level_commission_meta",array(
			'pkg_id'=>$pkg_id,
			'stage_no'=>'4',
			'stage_key'=>'stage_3',
			'level'=>$i+1,
			'commission_amount'=>$stage_4_level_commission_array[$i]
			));
		}
		
		for($i=0;$i<count($stage_5_level_commission_array);$i++)
		{
			$obj->db->insert("matrix_stage_level_commission_meta",array(
			'pkg_id'=>$pkg_id,
			'stage_no'=>'5',
			'stage_key'=>'stage_4',
			'level'=>$i+1,
			'commission_amount'=>$stage_5_level_commission_array[$i]
			));
		}
		
		for($i=0;$i<count($stage_6_level_commission_array);$i++)
		{
			$obj->db->insert("matrix_stage_level_commission_meta",array(
			'pkg_id'=>$pkg_id,
			'stage_no'=>'6',
			'stage_key'=>'stage_5',
			'level'=>$i+1,
			'commission_amount'=>$stage_6_level_commission_array[$i]
			));
		}
}//end function	
?>
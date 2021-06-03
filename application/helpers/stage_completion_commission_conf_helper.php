<?php 
/*
	@author:Aditya
	@param:None
	@desc: this function is used to save the compensatation plan of the specific package for Direct commission type
	@return:none;
	@signature: void SaveDirectCommision()
*/
function saveStageCompletionCommision()
	{
		$obj=& get_instance();
        //////
		$pkg_id=$obj->input->post('pkg_id');
		$type=$obj->input->post('type');
		
		$feeder_stage_commission=$obj->input->post('feeder_stage_commission');
		$stage1_commission=$obj->input->post('stage1_commission');
		$stage2_commission=$obj->input->post('stage2_commission');
		$stage3_commission=$obj->input->post('stage3_commission');
		$stage4_commission=$obj->input->post('stage4_commission');
		$stage5_commission=$obj->input->post('stage5_commission');
		$stage6_commission=$obj->input->post('stage6_commission');
		//////
		$where=array('pkg_id ='=>$pkg_id);
        $direct_commission=$obj->db->select('id')->from('matrix_stage_commission')->where($where)->get();
		if($direct_commission->num_rows()>0)
        {
			$obj->db->update("matrix_stage_commission",array('type'=>$type),$where);
			$obj->db->delete('matrix_stage_commission_meta',array('pkg_id'=>$pkg_id));
        }
        else 
        {
			$obj->db->insert("matrix_stage_commission",array("pkg_id"=>$pkg_id,'type'=>$type));
		}
		$direct_commission_meta=array(
					array(
					'pkg_id'=>$pkg_id,
					'stage_key'=>'feeder_stage',
					'stage_number'=>'1',
					'commission'=>$feeder_stage_commission
					),
					array(
					'pkg_id'=>$pkg_id,
					'stage_key'=>'stage_1',
					'stage_number'=>'2',
					'commission'=>$stage1_commission
					),
					array(
					'pkg_id'=>$pkg_id,
					'stage_key'=>'stage_2',
					'stage_number'=>'3',
					'commission'=>$stage2_commission
					),
					array(
					'pkg_id'=>$pkg_id,
					'stage_key'=>'stage_3',
					'stage_number'=>'4',
					'commission'=>$stage3_commission
					),
					array(
					'pkg_id'=>$pkg_id,
					'stage_key'=>'stage_4',
					'stage_number'=>'5',
					'commission'=>$stage4_commission
					),
					array(
					'pkg_id'=>$pkg_id,
					'stage_key'=>'stage_5',
					'stage_number'=>'6',
					'commission'=>$stage5_commission
					)
				);
		$obj->db->insert_batch('matrix_stage_commission_meta',$direct_commission_meta);
	}
?>
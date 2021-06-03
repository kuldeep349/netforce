<?php 
/*
@Desc: It's used to credit feeder stage matrix level commission
*/
function creditFeederStageLevelCommission($down_id,$pkg_id)
{
	$obj= & get_instance();
	$all_upliner=$obj->db->select('*')->from('matrix_downline')->where('down_id',$down_id)->get()->result();
	foreach($all_upliner as $upliner)
	{
		  $income_id=$upliner->income_id;
		  //$upliner_level=$upliner->level;
		  $level=$upliner->level;
		  
		  $total_member=$obj->db->select('id')->from('matrix_downline')->where(array('income_id'=>$income_id,'level'=>$level,'uni_level_pay_status'=>'Unpaid'))->get()->num_rows();
		
		  if($total_member>0)//level member is completed and not paid
			  {
				
					$meta_info=$obj->db->select('commission_amount')->from('	unilevel_stage_level_commission_meta')->where(array('stage_key'=>'feeder_stage','level'=>$level,'pkg_id'=>$pkg_id))->get()->row();
					if(!empty($meta_info->commission_amount))//i.e commission is enabled
					{
						$commission_amount=$meta_info->commission_amount;
						$commission_type=$obj->db->select('*')->from('unilevel_stage_level_commission')->where('pkg_id',$pkg_id)->get()->row();
						if($commission_type->commission_type=='1')//percent commission
						{
							$commission_amount=(get_package_amount($pkg_id)*$commission_amount)/100;
						}
						$query_obj=$obj->db->select('amount')->from('final_e_wallet')->where('user_id',$income_id)->get()->row();
						
						$balance=$query_obj->amount+$commission_amount;
						
						$obj->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$income_id));
						$obj->db->insert('credit_debit',array(
								'transaction_no'=>generateUniqueTranNo(),
								'user_id'=>$income_id,
								'credit_amt'=>$commission_amount,
								'debit_amt'=>'0',
								'balance'=>$balance,
								'admin_charge'=>'0',
								'receiver_id'=>$income_id,
								'sender_id'=>$down_id,
								'pkg_id'=>$pkg_id,
								'pkg_amount'=>get_package_amount($pkg_id),
								'level'=>$level,
								'receive_date'=>date('d-m-Y'),
								'ttype'=>'STAGE1 level Commission of level'.$level,
								'TranDescription'=>'STAGE1 level Commission of level'.$level,
								'Cause'=>'Package Purchase by '.$down_id,
								'Remark'=>'Package Purchase by '.$down_id,
								'unique_identity'=>'feeder_stage',
								'invoice_no'=>'',
								'product_name'=>'',
								'status'=>'1',
								'ewallet_used_by'=>'Withdrawal Wallet',
								'current_url'=>site_url(),
								'reason'=>'9' //credit for matrix stage level completion bonus
								));
						
						
								$obj->db->update('matrix_downline',array('uni_level_pay_status'=>'Paid'),array('income_id'=>$income_id,'level'=>$level,'uni_level_pay_status'=>'Unpaid'));	
								
					}//end commission enabled if here
			  }//end level completed if
	}//end upliner foreach loop
}//end method
/*
@Desc: It's used to credit stage1 matrix level commission
*/
function creditStage1LevelCommission($down_id,$pkg_id)
{
	$obj= & get_instance();
	$all_upliner=$obj->db->select('*')->from('matrix_stage1')->where('down_id',$down_id)->get()->result();
	foreach($all_upliner as $upliner)
	{
		  $income_id=$upliner->income_id;
		  $level=$upliner->level;
		  
		  $total_member=$obj->db->select('id')->from('matrix_stage1')->where(array('income_id'=>$income_id,'level'=>$level,'uni_level_pay_status'=>'Unpaid'))->get()->num_rows();
		  
		  if($total_member>0)//level member is completed
			  {
				    $meta_info=$obj->db->select('commission_amount')->from('unilevel_stage_level_commission_meta')->where(array('stage_key'=>'stage_1','level'=>$level,'pkg_id'=>$pkg_id))->get()->row();
					
					if(!empty($meta_info->commission_amount))//i.e commission is enabled
					{
						$commission_amount=$meta_info->commission_amount;
						$commission_type=$obj->db->select('*')->from('unilevel_stage_level_commission')->where('pkg_id',$pkg_id)->get()->row();
						if($commission_type->commission_type=='1')//percent commission
						{
							$commission_amount=(get_package_amount($pkg_id)*$commission_amount)/100;
						}
						$query_obj=$obj->db->select('amount')->from('final_e_wallet')->where('user_id',$income_id)->get()->row();
						
						$balance=$query_obj->amount+$commission_amount;
						
						$obj->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$income_id));
						$obj->db->insert('credit_debit',array(
								'transaction_no'=>generateUniqueTranNo(),
								'user_id'=>$income_id,
								'credit_amt'=>$commission_amount,
								'debit_amt'=>'0',
								'balance'=>$balance,
								'admin_charge'=>'0',
								'receiver_id'=>$income_id,
								'sender_id'=>$down_id,
								'pkg_id'=>$pkg_id,
								'pkg_amount'=>get_package_amount($pkg_id),
								'level'=>$level,
								'receive_date'=>date('d-m-Y'),
								'ttype'=>'STAGE2 level Commission of level'.$level,
								'TranDescription'=>'STAGE2 level Commission of level'.$level,
								'Cause'=>'Package Purchase by '.$down_id,
								'Remark'=>'Package Purchase by '.$down_id,
								'unique_identity'=>'stage_1',
								'invoice_no'=>'',
								'product_name'=>'',
								'status'=>'1',
								'ewallet_used_by'=>'Withdrawal Wallet',
								'current_url'=>site_url(),
								'reason'=>'9' //credit for matrix stage level completion bonus
								));
								
								$obj->db->update('matrix_stage1',array('uni_level_pay_status'=>'Paid'),array('income_id'=>$income_id,'level'=>$level,'uni_level_pay_status'=>'Unpaid'));	
					}//end commission enabled if here
			  }//end level completed if
	}//end upliner foreach loop
}//end method
/*
@Desc: It's used to credit stage3 matrix level commission
*/
function creditStage2LevelCommission($down_id,$pkg_id)
{
	$obj= & get_instance();
	$all_upliner=$obj->db->select('*')->from('matrix_stage2')->where('down_id',$down_id)->get()->result();
	foreach($all_upliner as $upliner)
	{
		  $income_id=$upliner->income_id;
		  $level=$upliner->level;
		  
		  $total_member=$obj->db->select('id')->from('matrix_stage2')->where(array('income_id'=>$income_id,'level'=>$level,'uni_level_pay_status'=>'Unpaid'))->get()->num_rows();
			  
			  if($total_member>0)//level member is completed
			  {
				    $meta_info=$obj->db->select('commission_amount')->from('unilevel_stage_level_commission_meta')->where(array('stage_key'=>'stage_2','level'=>$level,'pkg_id'=>$pkg_id))->get()->row();
					
					if(!empty($meta_info->commission_amount))//i.e commission is enabled
					{
						$commission_amount=$meta_info->commission_amount;
						$commission_type=$obj->db->select('*')->from('unilevel_stage_level_commission')->where('pkg_id',$pkg_id)->get()->row();
						if($commission_type->commission_type=='1')//percent commission
						{
							$commission_amount=(get_package_amount($pkg_id)*$commission_amount)/100;
						}
						$query_obj=$obj->db->select('amount')->from('final_e_wallet')->where('user_id',$income_id)->get()->row();
						
						$balance=$query_obj->amount+$commission_amount;
						
						$obj->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$income_id));
						$obj->db->insert('credit_debit',array(
								'transaction_no'=>generateUniqueTranNo(),
								'user_id'=>$income_id,
								'credit_amt'=>$commission_amount,
								'debit_amt'=>'0',
								'balance'=>$balance,
								'admin_charge'=>'0',
								'receiver_id'=>$income_id,
								'sender_id'=>$down_id,
								'pkg_id'=>$pkg_id,
								'pkg_amount'=>get_package_amount($pkg_id),
								'level'=>$level,
								'receive_date'=>date('d-m-Y'),
								'ttype'=>'STAGE3 level Commission of level'.$level,
								'TranDescription'=>'STAGE3 level Commission of level'.$level,
								'Cause'=>'Package Purchase by '.$down_id,
								'Remark'=>'Package Purchase by '.$down_id,
								'unique_identity'=>'stage_2',
								'invoice_no'=>'',
								'product_name'=>'',
								'status'=>'1',
								'ewallet_used_by'=>'Withdrawal Wallet',
								'current_url'=>site_url(),
								'reason'=>'9' //credit for matrix stage level completion bonus
								));
								
								
								
								$obj->db->update('matrix_stage2',array('uni_level_pay_status'=>'Paid'),array('income_id'=>$income_id,'level'=>$level,'uni_level_pay_status'=>'Unpaid'));
					}//end commission enabled if here
		   }//end level for loop
	}//end upliner foreach loop
}//end method

/*
@Desc: It's used to credit stage3 matrix level commission
*/
function creditStage3LevelCommission($down_id,$pkg_id)
{
	$obj= & get_instance();
	$all_upliner=$obj->db->select('*')->from('matrix_stage3')->where('down_id',$down_id)->get()->result();
	foreach($all_upliner as $upliner)
	{
		  $income_id=$upliner->income_id;
		  
		  $level=$upliner->level;
		  
		  $total_member=$obj->db->select('id')->from('matrix_stage3')->where(array('income_id'=>$income_id,'level'=>$level,'uni_level_pay_status'=>'Unpaid'))->get()->num_rows();
			  
		  if($total_member>0)//level member is completed
			  {
				    $meta_info=$obj->db->select('commission_amount')->from('unilevel_stage_level_commission_meta')->where(array('stage_key'=>'stage_3','level'=>$level,'pkg_id'=>$pkg_id))->get()->row();
					
					if(!empty($meta_info->commission_amount))//i.e commission is enabled
					{
						$commission_amount=$meta_info->commission_amount;
						$commission_type=$obj->db->select('*')->from('unilevel_stage_level_commission')->where('pkg_id',$pkg_id)->get()->row();
						if($commission_type->commission_type=='1')//percent commission
						{
							$commission_amount=(get_package_amount($pkg_id)*$commission_amount)/100;
						}
						$query_obj=$obj->db->select('amount')->from('final_e_wallet')->where('user_id',$income_id)->get()->row();
						
						$balance=$query_obj->amount+$commission_amount;
						
						$obj->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$income_id));
						$obj->db->insert('credit_debit',array(
								'transaction_no'=>generateUniqueTranNo(),
								'user_id'=>$income_id,
								'credit_amt'=>$commission_amount,
								'debit_amt'=>'0',
								'balance'=>$balance,
								'admin_charge'=>'0',
								'receiver_id'=>$income_id,
								'sender_id'=>$down_id,
								'pkg_id'=>$pkg_id,
								'pkg_amount'=>get_package_amount($pkg_id),
								'level'=>$level,
								'receive_date'=>date('d-m-Y'),
								'ttype'=>'STAGE4 level Commission of level'.$level,
								'TranDescription'=>'STAGE4 level Commission of level'.$level,
								'Cause'=>'Package Purchase by '.$down_id,
								'Remark'=>'Package Purchase by '.$down_id,
								'unique_identity'=>'stage_3',
								'invoice_no'=>'',
								'product_name'=>'',
								'status'=>'1',
								'ewallet_used_by'=>'Withdrawal Wallet',
								'current_url'=>site_url(),
								'reason'=>'9' //credit for matrix stage level completion bonus
								));
								
								$query_obj=$obj->db->select('amount')->from('shopping_e_wallet')->where('user_id',$income_id)->get()->row();
						
								$obj->db->update('matrix_stage3',array('uni_level_pay_status'=>'Paid'),array('income_id'=>$income_id,'level'=>$level,'uni_level_pay_status'=>'Unpaid'));
					}//end commission enabled if here
			  }//end level completed if
	}//end upliner foreach loop
}//end method

/*
@Desc: It's used to credit stage4 matrix level commission
*/
function creditStage4LevelCommission($down_id,$pkg_id)
{
	$obj= & get_instance();
	$all_upliner=$obj->db->select('*')->from('matrix_stage4')->where('down_id',$down_id)->get()->result();
	foreach($all_upliner as $upliner)
	{
		  $income_id=$upliner->income_id;
		  
		  $level=$upliner->level;
		  
		  $total_member=$obj->db->select('id')->from('matrix_stage4')->where(array('income_id'=>$income_id,'level'=>$level,'uni_level_pay_status'=>'Unpaid'))->get()->num_rows();
			  
		   if($total_member>0)//level member is completed
			  {
				    $meta_info=$obj->db->select('commission_amount')->from('unilevel_stage_level_commission_meta')->where(array('stage_key'=>'stage_4','level'=>$level,'pkg_id'=>$pkg_id))->get()->row();
					
					if(!empty($meta_info->commission_amount))//i.e commission is enabled
					{
						$commission_amount=$meta_info->commission_amount;
						$commission_type=$obj->db->select('*')->from('unilevel_stage_level_commission')->where('pkg_id',$pkg_id)->get()->row();
						if($commission_type->commission_type=='1')//percent commission
						{
							$commission_amount=(get_package_amount($pkg_id)*$commission_amount)/100;
						}
						$query_obj=$obj->db->select('amount')->from('final_e_wallet')->where('user_id',$income_id)->get()->row();
						
						$balance=$query_obj->amount+$commission_amount;
						
						$obj->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$income_id));
						$obj->db->insert('credit_debit',array(
								'transaction_no'=>generateUniqueTranNo(),
								'user_id'=>$income_id,
								'credit_amt'=>$commission_amount,
								'debit_amt'=>'0',
								'balance'=>$balance,
								'admin_charge'=>'0',
								'receiver_id'=>$income_id,
								'sender_id'=>$down_id,
								'pkg_id'=>$pkg_id,
								'pkg_amount'=>get_package_amount($pkg_id),
								'level'=>$level,
								'receive_date'=>date('d-m-Y'),
								'ttype'=>'STAGE5 level Commission of level'.$level,
								'TranDescription'=>'STAGE5 level Commission of level'.$level,
								'Cause'=>'Package Purchase by '.$down_id,
								'Remark'=>'Package Purchase by '.$down_id,
								'unique_identity'=>'stage_4',
								'invoice_no'=>'',
								'product_name'=>'',
								'status'=>'1',
								'ewallet_used_by'=>'Withdrawal Wallet',
								'current_url'=>site_url(),
								'reason'=>'9' //credit for matrix stage level completion bonus
								));
								
								
								
								
								$obj->db->update('matrix_stage4',array('uni_level_pay_status'=>'Paid'),array('income_id'=>$income_id,'level'=>$level,'uni_level_pay_status'=>'Unpaid'));
					}//end commission enabled if here
			  }//end level completed if
	}//end upliner foreach loop
}//end method

/*
@Desc: It's used to credit stage4 matrix level commission
*/
function creditStage5LevelCommission($down_id,$pkg_id)
{
	$obj= & get_instance();
	$all_upliner=$obj->db->select('*')->from('matrix_stage5')->where('down_id',$down_id)->get()->result();
	foreach($all_upliner as $upliner)
	{
		  $income_id=$upliner->income_id;
		  $level=$upliner->level;
		  
	      if($total_member>0)//level member is completed
			  {
				    $meta_info=$obj->db->select('commission_amount')->from('unilevel_stage_level_commission_meta')->where(array('stage_key'=>'stage_5','level'=>$level,'pkg_id'=>$pkg_id))->get()->row();
					
					if(!empty($meta_info->commission_amount))//i.e commission is enabled
					{
						$commission_amount=$meta_info->commission_amount;
						$commission_type=$obj->db->select('*')->from('unilevel_stage_level_commission')->where('pkg_id',$pkg_id)->get()->row();
						if($commission_type->commission_type=='1')//percent commission
						{
							$commission_amount=(get_package_amount($pkg_id)*$commission_amount)/100;
						}
						$query_obj=$obj->db->select('amount')->from('final_e_wallet')->where('user_id',$income_id)->get()->row();
						
						$balance=$query_obj->amount+$commission_amount;
						
						$obj->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$income_id));
						$obj->db->insert('credit_debit',array(
								'transaction_no'=>generateUniqueTranNo(),
								'user_id'=>$income_id,
								'credit_amt'=>$commission_amount,
								'debit_amt'=>'0',
								'balance'=>$balance,
								'admin_charge'=>'0',
								'receiver_id'=>$income_id,
								'sender_id'=>$down_id,
								'pkg_id'=>$pkg_id,
								'pkg_amount'=>get_package_amount($pkg_id),
								'level'=>$level,
								'receive_date'=>date('d-m-Y'),
								'ttype'=>'STAGE6 level Commission of level'.$level,
								'TranDescription'=>'STAGE6 level Commission of level'.$level,
								'Cause'=>'Package Purchase by '.$down_id,
								'Remark'=>'Package Purchase by '.$down_id,
								'unique_identity'=>'stage_5',
								'invoice_no'=>'',
								'product_name'=>'',
								'status'=>'1',
								'ewallet_used_by'=>'Withdrawal Wallet',
								'current_url'=>site_url(),
								'reason'=>'9' //credit for matrix stage level completion bonus
								));
								
								$query_obj=$obj->db->select('amount')->from('shopping_e_wallet')->where('user_id',$income_id)->get()->row();
						
						
								
								$obj->db->update('matrix_stage5',array('uni_level_pay_status'=>'Paid'),array('income_id'=>$income_id,'level'=>$level,'uni_level_pay_status'=>'Unpaid'));
					}//end commission enabled if here
			  }//end level completed if
	}//end upliner foreach loop
}//end method


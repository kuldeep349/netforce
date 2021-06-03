<?php
/*
@Desc: It's used to credit feeder stage matrix level commission
*/
function matrix_commission_level($down_id,$table_name,$pkg_id)
{
	$obj=& get_instance();
	if($table_name=='matrix_downline')
	{
		$unique_identity='feeder_stage';
		$level=2;
		//$stage_name='Matrix Level';
	}
	else if($table_name=='matrix_stage1')
	{
		$unique_identity='stage_1';
		$level=2;
		$stage_name=' Stage 2';
	}
	else if($table_name=='matrix_stage2')
	{
		$unique_identity='stage_2';
		$level=2;
		$stage_name=' Stage 3';
	}
	else if($table_name=='matrix_stage3')
	{
		$unique_identity='stage_3';
		$level=2;
		$stage_name=' Stage 4';
	}
	else if($table_name=='matrix_stage4')
	{
		$unique_identity='stage_4';
		$level=2;
		$stage_name='Stage 5';
	}
	else if($table_name=='matrix_stage5')
	{
		$unique_identity='stage_5';
		$level=2;
		$stage_name=' Stage 6';
	}
	else if($table_name=='matrix_stage6')
	{
		$unique_identity='stage_6';
		$level=2;
		$stage_name=' Stage 7';
	}
	else if($table_name=='matrix_stage7')
	{
		$unique_identity='stage_7';
		$level=2;
		$stage_name=' Stage 8';
	}

	$query=$obj->db->select('*')->from($table_name)->where(array('down_id'=>$down_id,'level <='=>$level, 'level_pay_status'=>'Unpaid'))->get();
	$all_upliner=$query->result_array();
	if($query->num_rows()>0)
	{
		foreach($all_upliner as $all)
		{
			           if($all['level']<=$level)
					   {
						
						// check user and upline both package
						
						$packinfo=$obj->db->select('pkg_id')->from('user_registration')->where('user_id',$all['income_id'])->get()->row();
                		$spkg_id=$packinfo->pkg_id;
                		$packinfo=$obj->db->select('pkg_id')->from('user_registration')->where('user_id',$down_id)->get()->row();
                		$upkg_id=$packinfo->pkg_id;
                		if($spkg_id>$upkg_id)
                		{
                		    $cpkg_id=$upkg_id;
                		}
                		if($spkg_id<$upkg_id)
                		{
                		    $cpkg_id=$spkg_id;
                		}
                		if($spkg_id==$upkg_id)
                		{
                		    $cpkg_id=$spkg_id;
                		}
						$meta_info=$obj->db->select('*')->from('matrix_stage_level_commission_meta')->where(array('stage_key'=>$unique_identity,'pkg_id'=>$cpkg_id))->get()->row();
						
						$member_exist=$obj->db->select('*')->from('user_registration')->where(array('user_id'=>$down_id))->get()->num_rows();
						//,'stage_name'=>$unique_identity
						$com_per=$meta_info->com_per;
						$packageinfo=$obj->db->select('*')->from('package')->where(array('id'=>$pkg_id))->get()->row();
						$amount=$packageinfo->amount;
						$main_com_amount=$meta_info->commission_amount;//($amount*$com_per)/100;
						$levcount=$all['level']-1;
						if(!empty($main_com_amount) && $member_exist>0)
						{
							$query_obj=$obj->db->select('amount')->from('final_cash_wallet')->where('user_id',$all['income_id'])->get()->row();
							$balance=$query_obj->amount+$main_com_amount;
							$obj->db->update('final_cash_wallet',array('amount'=>$balance),array('user_id'=>$all['income_id']));
							$obj->db->insert('credit_debit_cash',array(
							'transaction_no'=>generateUniqueTranNo(),
							'user_id'=>$all['income_id'],
							'credit_amt'=>$main_com_amount,
							'debit_amt'=>'0',
							'balance'=>$balance,
							'admin_charge'=>'0',
							'receiver_id'=>$all['income_id'],
							'sender_id'=>$down_id,
							'receive_date'=>date('Y-m-d'),
							'ttype'=>$stage_name.' level COMMISSION of level '.$levcount,
							'TranDescription'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Cause'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Remark'=>$stage_name.' level COMMISSION of level '.$levcount,
							'invoice_no'=>'',
							'product_name'=>'',
							'status'=>'1',
							'ewallet_used_by'=>'Withdrawal Wallet',
							'current_url'=>site_url(),
							'reason'=>'9', //credit for matrix commission
							'level'=>$all['level'],
							'unique_identity'=>$unique_identity
							));
						}
						$product_com_amount=$meta_info->product;
						if(!empty($product_com_amount) && $member_exist>0)
						{
							$query_obj=$obj->db->select('amount')->from('final_product_wallet')->where('user_id',$all['income_id'])->get()->row();
							$balance=$query_obj->amount+$product_com_amount;
							$obj->db->update('final_product_wallet',array('amount'=>$balance),array('user_id'=>$all['income_id']));
							$obj->db->insert('credit_debit_product',array(
							'transaction_no'=>generateUniqueTranNo(),
							'user_id'=>$all['income_id'],
							'credit_amt'=>$product_com_amount,
							'debit_amt'=>'0',
							'balance'=>$balance,
							'admin_charge'=>'0',
							'receiver_id'=>$all['income_id'],
							'sender_id'=>$down_id,
							'receive_date'=>date('Y-m-d'),
							'ttype'=>$stage_name.' level COMMISSION of level '.$levcount,
							'TranDescription'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Cause'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Remark'=>$stage_name.' level COMMISSION of level '.$levcount,
							'invoice_no'=>'',
							'product_name'=>'',
							'status'=>'1',
							'ewallet_used_by'=>'Withdrawal Wallet',
							'current_url'=>site_url(),
							'reason'=>'9', //credit for matrix commission
							'level'=>$all['level'],
							'unique_identity'=>$unique_identity
							));
						}
						
						$shopping_com_amount=$meta_info->shopping;
						if(!empty($shopping_com_amount) && $member_exist>0)
						{
							$query_obj=$obj->db->select('amount')->from('final_saving_wallet')->where('user_id',$all['income_id'])->get()->row();
							$balance=$query_obj->amount+$shopping_com_amount;
							$obj->db->update('final_saving_wallet',array('amount'=>$balance),array('user_id'=>$all['income_id']));
							$obj->db->insert('credit_debit_saving',array(
							'transaction_no'=>generateUniqueTranNo(),
							'user_id'=>$all['income_id'],
							'credit_amt'=>$shopping_com_amount,
							'debit_amt'=>'0',
							'balance'=>$balance,
							'admin_charge'=>'0',
							'receiver_id'=>$all['income_id'],
							'sender_id'=>$down_id,
							'receive_date'=>date('Y-m-d'),
							'ttype'=>$stage_name.' level COMMISSION of level '.$levcount,
							'TranDescription'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Cause'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Remark'=>$stage_name.' level COMMISSION of level '.$levcount,
							'invoice_no'=>'',
							'product_name'=>'',
							'status'=>'1',
							'ewallet_used_by'=>'Withdrawal Wallet',
							'current_url'=>site_url(),
							'reason'=>'9', //credit for matrix commission
							'level'=>$all['level'],
							'unique_identity'=>$unique_identity
							));
						}
						
						$health_com_amount=$meta_info->health;
						if(!empty($health_com_amount) && $member_exist>0)
						{
							$query_obj=$obj->db->select('amount')->from('final_health_wallet')->where('user_id',$all['income_id'])->get()->row();
							$balance=$query_obj->amount+$health_com_amount;
							$obj->db->update('final_health_wallet',array('amount'=>$balance),array('user_id'=>$all['income_id']));
							$obj->db->insert('credit_debit_health',array(
							'transaction_no'=>generateUniqueTranNo(),
							'user_id'=>$all['income_id'],
							'credit_amt'=>$health_com_amount,
							'debit_amt'=>'0',
							'balance'=>$balance,
							'admin_charge'=>'0',
							'receiver_id'=>$all['income_id'],
							'sender_id'=>$down_id,
							'receive_date'=>date('Y-m-d'),
							'ttype'=>$stage_name.' level COMMISSION of level '.$levcount,
							'TranDescription'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Cause'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Remark'=>$stage_name.' level COMMISSION of level '.$levcount,
							'invoice_no'=>'',
							'product_name'=>'',
							'status'=>'1',
							'ewallet_used_by'=>'Withdrawal Wallet',
							'current_url'=>site_url(),
							'reason'=>'9', //credit for matrix commission
							'level'=>$all['level'],
							'unique_identity'=>$unique_identity
							));
						}
						
						$furniture_com_amount=$meta_info->furniture;
						if(!empty($furniture_com_amount) && $member_exist>0)
						{
							$query_obj=$obj->db->select('amount')->from('final_furniture_wallet')->where('user_id',$all['income_id'])->get()->row();
							$balance=$query_obj->amount+$furniture_com_amount;
							$obj->db->update('final_furniture_wallet',array('amount'=>$balance),array('user_id'=>$all['income_id']));
							$obj->db->insert('credit_debit_furniture',array(
							'transaction_no'=>generateUniqueTranNo(),
							'user_id'=>$all['income_id'],
							'credit_amt'=>$furniture_com_amount,
							'debit_amt'=>'0',
							'balance'=>$balance,
							'admin_charge'=>'0',
							'receiver_id'=>$all['income_id'],
							'sender_id'=>$down_id,
							'receive_date'=>date('Y-m-d'),
							'ttype'=>$stage_name.' level COMMISSION of level '.$levcount,
							'TranDescription'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Cause'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Remark'=>$stage_name.' level COMMISSION of level '.$levcount,
							'invoice_no'=>'',
							'product_name'=>'',
							'status'=>'1',
							'ewallet_used_by'=>'Withdrawal Wallet',
							'current_url'=>site_url(),
							'reason'=>'9', //credit for matrix commission
							'level'=>$all['level'],
							'unique_identity'=>$unique_identity
							));
						}
						
						$car_com_amount=$meta_info->car;
						if(!empty($car_com_amount) && $member_exist>0)
						{
							$query_obj=$obj->db->select('amount')->from('final_car_wallet')->where('user_id',$all['income_id'])->get()->row();
							$balance=$query_obj->amount+$car_com_amount;
							$obj->db->update('final_car_wallet',array('amount'=>$balance),array('user_id'=>$all['income_id']));
							$obj->db->insert('credit_debit_car',array(
							'transaction_no'=>generateUniqueTranNo(),
							'user_id'=>$all['income_id'],
							'credit_amt'=>$car_com_amount,
							'debit_amt'=>'0',
							'balance'=>$balance,
							'admin_charge'=>'0',
							'receiver_id'=>$all['income_id'],
							'sender_id'=>$down_id,
							'receive_date'=>date('Y-m-d'),
							'ttype'=>$stage_name.' level COMMISSION of level '.$levcount,
							'TranDescription'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Cause'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Remark'=>$stage_name.' level COMMISSION of level '.$levcount,
							'invoice_no'=>'',
							'product_name'=>'',
							'status'=>'1',
							'ewallet_used_by'=>'Withdrawal Wallet',
							'current_url'=>site_url(),
							'reason'=>'9', //credit for matrix commission
							'level'=>$all['level'],
							'unique_identity'=>$unique_identity
							));
						}
						
						$home_com_amount=$meta_info->home;
						if(!empty($home_com_amount) && $member_exist>0)
						{
							$query_obj=$obj->db->select('amount')->from('final_home_wallet')->where('user_id',$all['income_id'])->get()->row();
							$balance=$query_obj->amount+$home_com_amount;
							$obj->db->update('final_home_wallet',array('amount'=>$balance),array('user_id'=>$all['income_id']));
							$obj->db->insert('credit_debit_home',array(
							'transaction_no'=>generateUniqueTranNo(),
							'user_id'=>$all['income_id'],
							'credit_amt'=>$home_com_amount,
							'debit_amt'=>'0',
							'balance'=>$balance,
							'admin_charge'=>'0',
							'receiver_id'=>$all['income_id'],
							'sender_id'=>$down_id,
							'receive_date'=>date('Y-m-d'),
							'ttype'=>$stage_name.' level COMMISSION of level '.$levcount,
							'TranDescription'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Cause'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Remark'=>$stage_name.' level COMMISSION of level '.$levcount,
							'invoice_no'=>'',
							'product_name'=>'',
							'status'=>'1',
							'ewallet_used_by'=>'Withdrawal Wallet',
							'current_url'=>site_url(),
							'reason'=>'9', //credit for matrix commission
							'level'=>$all['level'],
							'unique_identity'=>$unique_identity
							));
						}
						
						$bonus_com_amount=$meta_info->bonus;
						if(!empty($bonus_com_amount) && $member_exist>0)
						{
							$query_obj=$obj->db->select('amount')->from('final_bonus_wallet')->where('user_id',$all['income_id'])->get()->row();
							$balance=$query_obj->amount+$bonus_com_amount;
							$obj->db->update('final_bonus_wallet',array('amount'=>$balance),array('user_id'=>$all['income_id']));
							$obj->db->insert('credit_debit_bonus',array(
							'transaction_no'=>generateUniqueTranNo(),
							'user_id'=>$all['income_id'],
							'credit_amt'=>$bonus_com_amount,
							'debit_amt'=>'0',
							'balance'=>$balance,
							'admin_charge'=>'0',
							'receiver_id'=>$all['income_id'],
							'sender_id'=>$down_id,
							'receive_date'=>date('Y-m-d'),
							'ttype'=>$stage_name.' level COMMISSION of level '.$levcount,
							'TranDescription'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Cause'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Remark'=>$stage_name.' level COMMISSION of level '.$levcount,
							'invoice_no'=>'',
							'product_name'=>'',
							'status'=>'1',
							'ewallet_used_by'=>'Withdrawal Wallet',
							'current_url'=>site_url(),
							'reason'=>'9', //credit for matrix commission
							'level'=>$all['level'],
							'unique_identity'=>$unique_identity
							));
						}
						
						$payoff_com_amount=$meta_info->payoff;
						if(!empty($payoff_com_amount) && $member_exist>0)
						{
							$query_obj=$obj->db->select('amount')->from('final_payoff_wallet')->where('user_id',$all['income_id'])->get()->row();
							$balance=$query_obj->amount+$payoff_com_amount;
							$obj->db->update('final_payoff_wallet',array('amount'=>$balance),array('user_id'=>$all['income_id']));
							$obj->db->insert('credit_debit_payoff',array(
							'transaction_no'=>generateUniqueTranNo(),
							'user_id'=>$all['income_id'],
							'credit_amt'=>$payoff_com_amount,
							'debit_amt'=>'0',
							'balance'=>$balance,
							'admin_charge'=>'0',
							'receiver_id'=>$all['income_id'],
							'sender_id'=>$down_id,
							'receive_date'=>date('Y-m-d'),
							'ttype'=>$stage_name.' level COMMISSION of level '.$levcount,
							'TranDescription'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Cause'=>$stage_name.' level COMMISSION of level '.$levcount,
							'Remark'=>$stage_name.' level COMMISSION of level '.$levcount,
							'invoice_no'=>'',
							'product_name'=>'',
							'status'=>'1',
							'ewallet_used_by'=>'Withdrawal Wallet',
							'current_url'=>site_url(),
							'reason'=>'9', //credit for matrix commission
							'level'=>$all['level'],
							'unique_identity'=>$unique_identity
							));
						}
						$obj->db->query("update $table_name set level_pay_status='Paid' where id='".$all['id']."'");
					   }//end level limit if
		}//end foreach
	}//end num_rows >0 if
}//end function

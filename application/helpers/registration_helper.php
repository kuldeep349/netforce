<?php 
/*
@author : Aditya
@param  : none
@desc   : It's used to generate the unique user id
@return int(user id)
*/
if(!function_exists('generateUserId'))
{
	function generateUserId()
	{
		$obj=& get_instance();
		$encypt1=uniqid(rand(100000,999999), true);
		$usid1=str_replace(".", "", $encypt1);
		$user_id_prefix=$obj->db->select('*')->from('user_id_setting')->where('id',1)->get()->row();
		$prefix='';
		if($user_id_prefix->type=='1')
		{
			$prefix=$user_id_prefix->prefix;
		}
		$pre_userid = $prefix.substr($usid1, 0, 7);
		$query=$obj->db->select('user_id')->from('user_registration')->where(array('user_id'=>$pre_userid))->get();
		if($query->num_rows()>0)
		{
		 generateUserId();
		}
		else
		{
		 return $pre_userid;
	    }
	}//end function    
}//end function exists

if(!function_exists('generateUserName'))
{
	function generateUserName()
	{
		$obj=& get_instance();
		$encypt1=uniqid(rand(100000,999999), true);
		$usid1=str_replace(".", "", $encypt1);
		/*$user_id_prefix=$obj->db->select('*')->from('user_id_setting')->where('id',1)->get()->row();
		$prefix='';
		if($user_id_prefix->type=='1')
		{
			$prefix=$user_id_prefix->prefix;
		}*/
		//$pre_userid = $prefix.substr($usid1, 0, 7);
		$pre_userid = 'LOGINID'.substr($usid1, 0, 7);
		$query=$obj->db->select('username')->from('user_registration')->where(array('username'=>$pre_userid))->get();
		if($query->num_rows()>0)
		{
		 generateUserName();
		}
		else
		{
		 return $pre_userid;
	    }
	}//end function    
}//end function exists


if(!function_exists('generateReferenceNo'))
{
	function generateReferenceNo()
	{
		$obj=& get_instance();
		$encypt1=uniqid(rand(100000000,999999999), true);
		$usid1=str_replace(".", "", $encypt1);
		/*$user_id_prefix=$obj->db->select('*')->from('user_id_setting')->where('id',1)->get()->row();
		$prefix='';
		if($user_id_prefix->type=='1')
		{
			$prefix=$user_id_prefix->prefix;
		}*/
		//$pre_userid = $prefix.substr($usid1, 0, 7);
		$pre_userid = 'PS'.substr($usid1, 0, 7);
		$query=$obj->db->select('reference')->from('paystack_data')->where(array('reference'=>$pre_userid))->get();
		if($query->num_rows()>0)
		{
		 generateReferenceNo();
		}
		else
		{
		 return $pre_userid;
	    }
	}//end function    
}//end function exists


if(!function_exists('UserAutoRegistration'))
{
   function UserAutoRegistration($usernamess=null)
   {
    $obj=& get_instance();
    
	validRegistrationMethod();
    //$registerData=$obj->session->all_userdata();//open  and close comment
     /***********Mandatory filed for user registartion in binary plan start from here******************/
    ////user_registration query
    /*Sponsor and account informtaion*/
	$registration_info=$obj->session->userdata('registration_info');
	$sponser_id=(!empty($registration_info['sponsor_and_account_info']['ref_id']))?$registration_info['sponsor_and_account_info']['ref_id']:'123456';
	$ref_id123[]=$sponser_id;
	getNom($ref_id123);
	$nom_id=$_SESSION['nom_id'];
	$nom_id1=$nom_id;
	unset($_SESSION['nom_id']);
	//$pkg_id=(!empty($registration_info['sponsor_and_account_info']['pkg_id']))?$registration_info['sponsor_and_account_info']['pkg_id']:1;
	//$pkg_amount=(!empty($registration_info['sponsor_and_account_info']['pkg_amount']))?$registration_info['sponsor_and_account_info']['pkg_amount']:4000;
	$pkg_id=(!empty($registration_info['order']['pkg_id']))?$registration_info['order']['pkg_id']:1;
	
	$pkg_amount=(!empty($registration_info['order']['pkg_amount']))?$registration_info['order']['pkg_amount']:2000;
	
	$username=(!empty($registration_info['sponsor_and_account_info']['username']))?$registration_info['sponsor_and_account_info']['username']:'A';
	
	
	$user_password=(!empty($registration_info['sponsor_and_account_info']['password']))?$registration_info['sponsor_and_account_info']['password']:'123';
	$transaction_pwd=(!empty($registration_info['sponsor_and_account_info']['t_code']))?$registration_info['sponsor_and_account_info']['t_code']:'123';
	//$idno=(!empty($registration_info['sponsor_and_account_info']['idno']))?$registration_info['sponsor_and_account_info']['idno']:null;
	//$aadharno=(!empty($registration_info['sponsor_and_account_info']['aadharno']))?$registration_info['sponsor_and_account_info']['aadharno']:null;
    $user_id=generateUserId();
    $username=generateUserName();
	//personal informtaion
	$first_name=(!empty($registration_info['personal_info']['first_name']))?$registration_info['personal_info']['first_name']:'Austin';
	$last_name=(!empty($registration_info['personal_info']['last_name']))?$registration_info['personal_info']['last_name']:null;
	$email=(!empty($registration_info['sponsor_and_account_info']['email']))?$registration_info['sponsor_and_account_info']['email']:'austin@gmail.com';
	$contact_no=(!empty($registration_info['personal_info']['contact_no']))?$registration_info['personal_info']['contact_no']:'1234567890';
	$country=(!empty($registration_info['personal_info']['country']))?$registration_info['personal_info']['country']:'Nigeria';
	
	$country_id=(!empty($registration_info['personal_info']['country_id']))?$registration_info['personal_info']['country_id']:null;
	
	$state=(!empty($registration_info['personal_info']['state']))?$registration_info['personal_info']['state']:null;
	
	$state_id=(!empty($registration_info['personal_info']['state_id']))?$registration_info['personal_info']['state_id']:null;
	
	$city=(!empty($registration_info['personal_info']['city']))?$registration_info['personal_info']['city']:null;
	$zip_code=(!empty($registration_info['personal_info']['zip_code']))?$registration_info['personal_info']['zip_code']:null;
	$address_line1=(!empty($registration_info['personal_info']['address_line1']))?$registration_info['personal_info']['address_line1']:null;
	$date_of_birth=(!empty($registration_info['personal_info']['date_of_birth']))?$registration_info['personal_info']['date_of_birth']:null;
	$gender=(!empty($registration_info['personal_info']['gender']))?$registration_info['personal_info']['gender']:null;
	//bank account info
	$account_holder_name=(!empty($registration_info['bank_account_info']['account_holder_name']))?$registration_info['bank_account_info']['account_holder_name']:null;
	$account_no=(!empty($registration_info['bank_account_info']['account_no']))?$registration_info['bank_account_info']['account_no']:null;
	$bank_name=(!empty($registration_info['bank_account_info']['bank_name']))?$registration_info['bank_account_info']['bank_name']:null;
	$branch_name=(!empty($registration_info['bank_account_info']['branch_name']))?$registration_info['bank_account_info']['branch_name']:null;
	$ifsc_code=(!empty($registration_info['bank_account_info']['ifsc_code']))?$registration_info['bank_account_info']['ifsc_code']:null;
	$bank_address=(!empty($registration_info['bank_account_info']['bank_address']))?$registration_info['bank_account_info']['bank_address']:null;
	/////
    $user_registration_data=array(
    		/*Sponsor and account informtaion*/
    		'user_id'=>$user_id,
    		'ref_id'=>$sponser_id,
    		'nom_id'=>$nom_id,
    		'username'=>$username,
    		'password'=>$user_password,
    		't_code'=>$transaction_pwd,
    		'pkg_id'=>$pkg_id,
    		'pkg_amount'=>$pkg_amount,
    		 /*Personal informtaion*/
    		 'first_name'=>$first_name,
    		 'last_name'=>$last_name,
    		 'email'=>$email,
    		 'contact_no'=>$contact_no,
    		 'country'=>$country,
			 'state'=>$state,
			 'city'=>$city,
    		 'zip_code'=>$zip_code,
    		 'address_line1'=>$address_line1,
    		 'address_line1'=>$date_of_birth,
    		 /*Bank Account information*/
    		 'account_no'=>$account_no,
    		 'branch_name'=>$branch_name,
    		 'bank_name'=>$bank_name,
    		 'ifsc_code'=>$ifsc_code,
    		 'account_holder_name'=>$account_holder_name,
    		 ////////
    		 'registration_date'=>date('d-m-Y'),
    		 'current_login_status'=>'0', 
    		 'active_status'=>'1',
    		 'registration_method'=>'1',
			 'registration_method_name'=>'E-wallet'
    		);
    $obj->db->insert('user_registration',$user_registration_data);
    $obj->db->insert('final_e_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_product_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_furniture_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_health_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_home_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_payoff_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_saving_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_cash_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_car_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_bonus_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_referral_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_repurchase_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_promo_wallet',array('user_id'=>$user_id,'amount'=>0));
    
    $query_obj=$obj->db->select('amount')->from('final_product_wallet')->where('user_id',$user_id)->get()->row();
	$balance=$query_obj->amount+($pkg_amount);
	$obj->db->update('final_product_wallet',array('amount'=>$balance),array('user_id'=>$user_id));
		$obj->db->insert('credit_debit_product',array(
	    'transaction_no'=>generateUniqueTranNo(),
	    'user_id'=>$user_id,
	    'credit_amt'=>$pkg_amount,
	    'debit_amt'=>'0',
	    'balance'=>$balance,
	    'admin_charge'=>'0',
		'pkg_id'=>$pkg_id,
	    'receiver_id'=>$user_id,
	    'sender_id'=>$user_id,
	    'receive_date'=>date('d-m-Y'),
	    'tran_description'=>'Welcome Pack Added ',
	    'status'=>'1',
	    'payment_method'=>'1',
	    'payment_method_name'=>'E-wallet',
	    'current_url'=>site_url(),
	    'reason'=>'1'
        ));
	/*
     @pkg sold amount credited to company as profit
	*/
	$pkg_info=$obj->db->select('*')->from('package')->where('id',$pkg_id)->get()->row();
	$point_volume=$pkg_info->pv;
	$shipment_charge=$pkg_info->shipment_charge;
	$tax=$pkg_info->tax;
	$point_volume=0;
	$shipment_charge=0;
	$tax=0;
	
	###########################################  start product volume and commision code here #######################
	$purchase_date=date('Y-m-d');
    /////Inserting Data into user_package_log table///////////
    $obj->db->insert('user_package_log',array(
    	'user_id'=>$user_id,
    	'new_package_id'=>$pkg_id,
    	'active_status'=>'1',
    	'purchased_date'=>date('Y-m-d H:i:s')
    	));
     /***********Mandatory filed for user registartion in matrix plan end over here******************/
    $l=1;
    $nomcheck=$nom_id;

	while($nomcheck!='cmp')
	{
        if($nomcheck!='cmp')
        {
        	$matrix_downline_data[]=array(
        		'down_id'=>$user_id,
        		'income_id'=>$nomcheck,
        		'l_date'=>date('Y-m-d H:i:s'),
        		'status'=>'0',
        		'level'=>$l,
        		'pay_status'=>'Unpaid',
        		'plan_type'=>$pkg_id
        		);
        		
			$l++;
             $nom_info=$obj->db->select('nom_id')->from('user_registration')->where('user_id',$nomcheck)->get()->row();
             $nomcheck=$nom_info->nom_id;
			}
	}
	$obj->db->insert_batch('matrix_downline',$matrix_downline_data);
	//$obj->db->insert_batch('matrix_downline_pv',$matrix_downline_pv_data);
	///////////////////////////
	////Start of crediting direct commission
	
	
	//////////Code for level pay status//////////////
		matrix_commission_level($user_id,'matrix_downline',$pkg_id);
	///////////////////////////
	creditDirectCommission($sponser_id,$user_id,$pkg_id,$pkg_amount);
	////////////
	check_upliners1($user_id,$pkg_id);
	/*************/

	
	$sponsor_username=get_user_name($sponser_id);
	//sendWelcomeEmailToUser($user_id,$username,$user_password,$transaction_pwd,$email,$sponsor_username);
	$upliner_name=get_user_name($nom_id1);
	//sendNewRegistrationEmailToAdmin($user_id,$username,$user_password,$sponsor_username,$upliner_name,$email);
	return $user_id;
   }//end function
}//end function exists0
/*
@author : Aditya
@param  : int(referral userid/sponsor user id), string(leg position)
@desc   : It's used to identify the nom id
@return int(nom_id)
*/
/*
@author : Aditya
@param  : int(referral userid/sponsor user id), string(leg position)
@desc   : It's used to identify the nom id
@return int(nom_id)
*/
/*if(!function_exists('getNom'))
{
	function getNom($sponserid)
	{
			// $nom_id1,$lev;
			$obj=& get_instance();
			foreach($sponserid as $key => $val)
			{
			//$query1="select * from user_registration where nom_id='$val' order by id asc";
			//$result1=mysql_query($query1);
			$query1=$obj->db->select('*')->from('user_registration')->where('nom_id',$val)->order_by('id','ASC')->get();
			$num_ro1[]=$query1->num_rows();
			//$num_ro1[]=mysql_num_rows($result1);
			foreach($query1->result() as $row)
				{
					$rclid1[]=$row->user_id;
				}//end while
			}//end foreach
			foreach($num_ro1 as $key11 => $valu)
			{
				if($valu < 3)
				{
				$key1=$key11;
				break;
				}
			}//end foreach
			switch ($valu)
			{
			    case '0':
				    $nom_id1=$sponserid[$key1];
					break;
			    case '1':
				   	$nom_id1=$sponserid[$key1];
					break;
				 case '2':
				   	$nom_id1=$sponserid[$key1];
					break;	
				case '3':
					if(!empty($nom_id1))
					{
					 break;
					}
			    getNom($rclid1);
			}//end switch
			if(empty($_SESSION['nom_id']))
			{
				$_SESSION['nom_id']=$nom_id1;
			}
			return $nom_id1;
	}//end function
}*///end function exists
///////////////////////////////////////////////////
if(!function_exists('creditDirectCommission'))
{
	function creditDirectCommission($sponser_id,$user_id,$pkg_id,$pkg_amount)
	{
		$obj= & get_instance();
		
        /////crediting direct commission
		// check sponsor pkg_id or user pkg_id
		
		$packinfo=$obj->db->select('pkg_id')->from('user_registration')->where('user_id',$sponser_id)->get()->row();
		$spkg_id=$packinfo->pkg_id;
		$packinfo=$obj->db->select('pkg_id')->from('user_registration')->where('user_id',$user_id)->get()->row();
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
		
		$commission_info=$obj->db->select('*')->from('direct_commission_meta')->where(array(
		'pkg_id'=>$cpkg_id,
		'stage_key'=>"feeder_stage"
		))->get()->row();
		
		if(!empty($commission_info->commission) && $commission_info->commission>0)
		{
			$commission_amount=$commission_info->commission;
			$commission_per=$commission_info->commission;
			$ttype='flat '.$commission_amount." Direct Commission/Sponsor commission";
			$type_info=$obj->db->select('*')->from('direct_commission')->get()->row();
			if(!empty($type_info->type) && $type_info->type=='1')//percent
			{
				$commission_amount=($pkg_amount*$commission_per)/100;
				
				$ttype=$commission_per."% Direct Commission/Sponsor commission";
			}
			$query_obj=$obj->db->select('amount')->from('final_referral_wallet')->where('user_id',$sponser_id)->get()->row();
			$balance=$query_obj->amount+$commission_amount;
			$obj->db->update('final_referral_wallet',array('amount'=>$balance),array('user_id'=>$sponser_id));
			$obj->db->insert('credit_debit_referral',array(
			    'transaction_no'=>generateUniqueTranNo(),
			    'user_id'=>$sponser_id,
			    'credit_amt'=>$commission_amount,
			    'debit_amt'=>'0',
			    'balance'=>$balance,
			    'admin_charge'=>'0',
			    'receiver_id'=>$sponser_id,
				'pkg_id'=>$pkg_id,
				'pkg_amount'=>$pkg_amount,
			    'sender_id'=>$user_id,
			    'receive_date'=>date('d-m-Y'),
			    'ttype'=>$ttype,
			    'TranDescription'=>$ttype.' via Package Purchase by '.$user_id,
			    'tran_description'=>$ttype.' via Package Purchase by '.$user_id,
			    'Cause'=>'Package Purchase by '.$user_id,
			    'Remark'=>'Package Purchase by '.$user_id,
			    'unique_identity'=>$stage_key,
			    'invoice_no'=>'',
			    'product_name'=>'',
			    'status'=>'1',
			    'ewallet_used_by'=>'Withdrawal Wallet',
			    'current_url'=>site_url(),
			    'reason'=>'5' //credit for matrix direct commission
		        ));
		}//end commission not empty if
	}//end function
}//end function exists if
/*
@Desc: It's used to credit feeder stage matrix level commission
*/
function creditFeederStageMatrixLevelCommission($down_id,$pkg_id)
{
	$obj= & get_instance();
	$all_upliner=$obj->db->select('*')->from('matrix_downline')->where('down_id',$down_id)->get()->result();
	foreach($all_upliner as $upliner)
	{
		  $income_id=$upliner->income_id;
          
		  $upliner_max_level=$obj->db->select_max('level')->from('matrix_downline')->where('income_id',$income_id)->get()->row(); 
		  
		  for($level=1;$level<=$upliner_max_level->level;$level++)
		  {
			  
			  $total_member=$obj->db->select('id')->from('matrix_downline')->where(array('income_id'=>$income_id,'level'=>$level,'level_pay_status'=>'Unpaid'))->get()->num_rows();
			  
			  if(pow(3,$level)==$total_member)//level member is completed and not paid
			  {
					$meta_info=$obj->db->select('commission_amount')->from('matrix_stage_level_commission_meta')->where(array('stage_key'=>'feeder_stage','level'=>$level,'pkg_id'=>$pkg_id))->get()->row();
					
					
					if(!empty($meta_info->commission_amount))//i.e commission is enabled
					{
						$commission_amount=$meta_info->commission_amount;
						$commission_type=$obj->db->select('*')->from('matrix_stage_level_commission')->where('pkg_id',$pkg_id)->get()->row();
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
								'sender_id'=>COMP_USER_ID,
								'pkg_id'=>$pkg_id,
								'pkg_amount'=>get_package_amount($pkg_id),
								'level'=>$level,
								'receive_date'=>date('d-m-Y'),
								'ttype'=>'STAGE1 level COMPLETION BONUS OF lEVEL '.$level,
								'TranDescription'=>'STAGE1 level COMPLETION BONUS OF lEVEL '.$level,
								'Cause'=>'Package Purchase by '.$down_id,
								'Remark'=>'Package Purchase by '.$down_id,
								'unique_identity'=>'feeder_stage',
								'invoice_no'=>'',
								'product_name'=>'',
								'status'=>'1',
								'ewallet_used_by'=>'Withdrawal Wallet',
								'current_url'=>site_url(),
								'reason'=>'28' //credit for matrix stage level completion bonus
								));
								
								$obj->db->update('matrix_downline',array('level_pay_status'=>'Paid'),array('income_id'=>$income_id,'level'=>$level,'level_pay_status'=>'Unpaid'));	
								
					}//end commission enabled if here
			  }//end level completed if
		  }//end level for loop
	}//end upliner foreach loop
}//end method
/*
@Desc: It's used to credit stage1 matrix level commission
*/
function creditStage1MatrixLevelCommission($down_id,$pkg_id)
{
	$obj= & get_instance();
	$all_upliner=$obj->db->select('*')->from('matrix_stage1')->where('down_id',$down_id)->get()->result();
	foreach($all_upliner as $upliner)
	{
		  $income_id=$upliner->income_id;
          $upliner_max_level=$obj->db->select_max('level')->from('matrix_stage1')->where('income_id',$income_id)->get()->row(); 
		  for($level=1;$level<=$upliner_max_level->level;$level++)
		  {
			  $total_member=$obj->db->select('id')->from('matrix_stage1')->where(array('income_id'=>$income_id,'level'=>$level,'level_pay_status'=>'Unpaid'))->get()->num_rows();
			  if(pow(3,$level)==$total_member)//level member is completed
			  {
				    $meta_info=$obj->db->select('commission_amount')->from('matrix_stage_level_commission_meta')->where(array('stage_key'=>'stage_1','level'=>$level,'pkg_id'=>$pkg_id))->get()->row();
					
					if(!empty($meta_info->commission_amount))//i.e commission is enabled
					{
						$commission_amount=$meta_info->commission_amount;
						$commission_type=$obj->db->select('*')->from('matrix_stage_level_commission')->where('pkg_id',$pkg_id)->get()->row();
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
								'sender_id'=>COMP_USER_ID,
								'pkg_id'=>$pkg_id,
								'pkg_amount'=>get_package_amount($pkg_id),
								'level'=>$level,
								'receive_date'=>date('d-m-Y'),
								'ttype'=>'STAGE2 level COMPLETION BONUS OF lEVEL '.$level,
								'TranDescription'=>'STAGE2 level COMPLETION BONUS OF lEVEL '.$level,
								'Cause'=>'Package Purchase by '.$down_id,
								'Remark'=>'Package Purchase by '.$down_id,
								'unique_identity'=>'stage_1',
								'invoice_no'=>'',
								'product_name'=>'',
								'status'=>'1',
								'ewallet_used_by'=>'Withdrawal Wallet',
								'current_url'=>site_url(),
								'reason'=>'28' //credit for matrix stage level completion bonus
								));
								
								$obj->db->update('matrix_stage1',array('level_pay_status'=>'Paid'),array('income_id'=>$income_id,'level'=>$level,'level_pay_status'=>'Unpaid'));	
					}//end commission enabled if here
			  }//end level completed if
		  }//end level for loop
	}//end upliner foreach loop
}//end method
/*
@Desc: It's used to credit stage3 matrix level commission
*/
function creditStage2MatrixLevelCommission($down_id,$pkg_id)
{
	$obj= & get_instance();
	$all_upliner=$obj->db->select('*')->from('matrix_stage2')->where('down_id',$down_id)->get()->result();
	foreach($all_upliner as $upliner)
	{
		  $income_id=$upliner->income_id;
          $upliner_max_level=$obj->db->select_max('level')->from('matrix_stage2')->where('income_id',$income_id)->get()->row(); 
		  for($level=1;$level<=$upliner_max_level->level;$level++)
		  {
			  $total_member=$obj->db->select('id')->from('matrix_stage2')->where(array('income_id'=>$income_id,'level'=>$level,'level_pay_status'=>'Unpaid'))->get()->num_rows();
			  
			  if(pow(3,$level)==$total_member)//level member is completed
			  {
				    $meta_info=$obj->db->select('commission_amount')->from('matrix_stage_level_commission_meta')->where(array('stage_key'=>'stage_2','level'=>$level,'pkg_id'=>$pkg_id))->get()->row();
					
					if(!empty($meta_info->commission_amount))//i.e commission is enabled
					{
						$commission_amount=$meta_info->commission_amount;
						$commission_type=$obj->db->select('*')->from('matrix_stage_level_commission')->where('pkg_id',$pkg_id)->get()->row();
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
								'sender_id'=>COMP_USER_ID,
								'pkg_id'=>$pkg_id,
								'pkg_amount'=>get_package_amount($pkg_id),
								'level'=>$level,
								'receive_date'=>date('d-m-Y'),
								'ttype'=>'STAGE3 level COMPLETION BONUS OF lEVEL '.$level,
								'TranDescription'=>'STAGE3 level COMPLETION BONUS OF lEVEL '.$level,
								'Cause'=>'Package Purchase by '.$down_id,
								'Remark'=>'Package Purchase by '.$down_id,
								'unique_identity'=>'stage_2',
								'invoice_no'=>'',
								'product_name'=>'',
								'status'=>'1',
								'ewallet_used_by'=>'Withdrawal Wallet',
								'current_url'=>site_url(),
								'reason'=>'28' //credit for matrix stage level completion bonus
								));
								$obj->db->update('matrix_stage2',array('level_pay_status'=>'Paid'),array('income_id'=>$income_id,'level'=>$level,'level_pay_status'=>'Unpaid'));
					}//end commission enabled if here
			  }//end level completed if
		  }//end level for loop
	}//end upliner foreach loop
}//end method

/*
@Desc: It's used to credit stage3 matrix level commission
*/
function creditStage3MatrixLevelCommission($down_id,$pkg_id)
{
	$obj= & get_instance();
	$all_upliner=$obj->db->select('*')->from('matrix_stage3')->where('down_id',$down_id)->get()->result();
	foreach($all_upliner as $upliner)
	{
		  $income_id=$upliner->income_id;
          $upliner_max_level=$obj->db->select_max('level')->from('matrix_stage3')->where('income_id',$income_id)->get()->row(); 
		  for($level=1;$level<=$upliner_max_level->level;$level++)
		  {
			  $total_member=$obj->db->select('id')->from('matrix_stage3')->where(array('income_id'=>$income_id,'level'=>$level,'level_pay_status'=>'Unpaid'))->get()->num_rows();
			  
			  if(pow(3,$level)==$total_member)//level member is completed
			  {
				    $meta_info=$obj->db->select('commission_amount')->from('matrix_stage_level_commission_meta')->where(array('stage_key'=>'stage_3','level'=>$level,'pkg_id'=>$pkg_id))->get()->row();
					
					if(!empty($meta_info->commission_amount))//i.e commission is enabled
					{
						$commission_amount=$meta_info->commission_amount;
						$commission_type=$obj->db->select('*')->from('matrix_stage_level_commission')->where('pkg_id',$pkg_id)->get()->row();
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
								'sender_id'=>COMP_USER_ID,
								'pkg_id'=>$pkg_id,
								'pkg_amount'=>get_package_amount($pkg_id),
								'level'=>$level,
								'receive_date'=>date('d-m-Y'),
								'ttype'=>'STAGE4 level COMPLETION BONUS OF lEVEL '.$level,
								'TranDescription'=>'STAGE4 level COMPLETION BONUS OF lEVEL '.$level,
								'Cause'=>'Package Purchase by '.$down_id,
								'Remark'=>'Package Purchase by '.$down_id,
								'unique_identity'=>'stage_3',
								'invoice_no'=>'',
								'product_name'=>'',
								'status'=>'1',
								'ewallet_used_by'=>'Withdrawal Wallet',
								'current_url'=>site_url(),
								'reason'=>'28' //credit for matrix stage level completion bonus
								));
								
								
								$obj->db->update('matrix_stage3',array('level_pay_status'=>'Paid'),array('income_id'=>$income_id,'level'=>$level,'level_pay_status'=>'Unpaid'));
					}//end commission enabled if here
			  }//end level completed if
		  }//end level for loop
	}//end upliner foreach loop
}//end method

/*
@Desc: It's used to credit stage4 matrix level commission
*/
function creditStage4MatrixLevelCommission($down_id,$pkg_id)
{
	$obj= & get_instance();
	$all_upliner=$obj->db->select('*')->from('matrix_stage4')->where('down_id',$down_id)->get()->result();
	foreach($all_upliner as $upliner)
	{
		  $income_id=$upliner->income_id;
          $upliner_max_level=$obj->db->select_max('level')->from('matrix_stage4')->where('income_id',$income_id)->get()->row(); 
		  for($level=1;$level<=$upliner_max_level->level;$level++)
		  {
			  $total_member=$obj->db->select('id')->from('matrix_stage4')->where(array('income_id'=>$income_id,'level'=>$level,'level_pay_status'=>'Unpaid'))->get()->num_rows();
			  
			  if(pow(3,$level)==$total_member)//level member is completed
			  {
				    $meta_info=$obj->db->select('commission_amount')->from('matrix_stage_level_commission_meta')->where(array('stage_key'=>'stage_4','level'=>$level,'pkg_id'=>$pkg_id))->get()->row();
					
					if(!empty($meta_info->commission_amount))//i.e commission is enabled
					{
						$commission_amount=$meta_info->commission_amount;
						$commission_type=$obj->db->select('*')->from('matrix_stage_level_commission')->where('pkg_id',$pkg_id)->get()->row();
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
								'sender_id'=>COMP_USER_ID,
								'pkg_id'=>$pkg_id,
								'pkg_amount'=>get_package_amount($pkg_id),
								'level'=>$level,
								'receive_date'=>date('d-m-Y'),
								'ttype'=>'STAGE5 level COMPLETION BONUS OF lEVEL '.$level,
								'TranDescription'=>'STAGE5 level COMPLETION BONUS OF lEVEL '.$level,
								'Cause'=>'Package Purchase by '.$down_id,
								'Remark'=>'Package Purchase by '.$down_id,
								'unique_identity'=>'stage_4',
								'invoice_no'=>'',
								'product_name'=>'',
								'status'=>'1',
								'ewallet_used_by'=>'Withdrawal Wallet',
								'current_url'=>site_url(),
								'reason'=>'28' //credit for matrix stage level completion bonus
								));
								
								
								$obj->db->update('matrix_stage4',array('level_pay_status'=>'Paid'),array('income_id'=>$income_id,'level'=>$level,'level_pay_status'=>'Unpaid'));
					}//end commission enabled if here
			  }//end level completed if
		  }//end level for loop
	}//end upliner foreach loop
}//end method

/*
@Desc: It's used to credit stage4 matrix level commission
*/
function creditStage5MatrixLevelCommission($down_id,$pkg_id)
{
	$obj= & get_instance();
	$all_upliner=$obj->db->select('*')->from('matrix_stage5')->where('down_id',$down_id)->get()->result();
	foreach($all_upliner as $upliner)
	{
		  $income_id=$upliner->income_id;
          $upliner_max_level=$obj->db->select_max('level')->from('matrix_stage5')->where('income_id',$income_id)->get()->row(); 
		  for($level=1;$level<=$upliner_max_level->level;$level++)
		  {
			  $total_member=$obj->db->select('id')->from('matrix_stage5')->where(array('income_id'=>$income_id,'level'=>$level,'level_pay_status'=>'Unpaid'))->get()->num_rows();
			  
			  if(pow(3,$level)==$total_member)//level member is completed
			  {
				    $meta_info=$obj->db->select('commission_amount')->from('matrix_stage_level_commission_meta')->where(array('stage_key'=>'stage_5','level'=>$level,'pkg_id'=>$pkg_id))->get()->row();
					
					if(!empty($meta_info->commission_amount))//i.e commission is enabled
					{
						$commission_amount=$meta_info->commission_amount;
						$commission_type=$obj->db->select('*')->from('matrix_stage_level_commission')->where('pkg_id',$pkg_id)->get()->row();
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
								'sender_id'=>COMP_USER_ID,
								'pkg_id'=>$pkg_id,
								'pkg_amount'=>get_package_amount($pkg_id),
								'level'=>$level,
								'receive_date'=>date('d-m-Y'),
								'ttype'=>'STAGE6 level COMPLETION BONUS OF lEVEL '.$level,
								'TranDescription'=>'STAGE6 level COMPLETION BONUS OF lEVEL '.$level,
								'Cause'=>'Package Purchase by '.$down_id,
								'Remark'=>'Package Purchase by '.$down_id,
								'unique_identity'=>'stage_5',
								'invoice_no'=>'',
								'product_name'=>'',
								'status'=>'1',
								'ewallet_used_by'=>'Withdrawal Wallet',
								'current_url'=>site_url(),
								'reason'=>'28' //credit for matrix stage level completion bonus
								));
								$obj->db->update('matrix_stage5',array('level_pay_status'=>'Paid'),array('income_id'=>$income_id,'level'=>$level,'level_pay_status'=>'Unpaid'));
					}//end commission enabled if here
			  }//end level completed if
		  }//end level for loop
	}//end upliner foreach loop
}//end method

/*
@author : Aditya
@param  : none
@desc   : It's used to register the user via ewallet user registration method
@return none
*/
if(!function_exists('FreeUserRegistration'))
{
   function FreeUserRegistration($usernamess=null)
   {
    $obj=& get_instance();
	validRegistrationMethod();
    //$registerData=$obj->session->all_userdata();//open  and close comment
     /***********Mandatory filed for user registartion in binary plan start from here******************/
    ////user_registration query
    /*Sponsor and account informtaion*/
	$registration_info=$obj->session->userdata('registration_info');
	$sponser_id=(!empty($registration_info['sponsor_and_account_info']['ref_id']))?$registration_info['sponsor_and_account_info']['ref_id']:'123456';
	$ref_id123[]=$sponser_id;
	getNom($ref_id123);
	$nom_id=$_SESSION['nom_id'];
	$nom_id1=$nom_id;
	unset($_SESSION['nom_id']);
	$pkg_id=(!empty($registration_info['sponsor_and_account_info']['pkg_id']))?$registration_info['sponsor_and_account_info']['pkg_id']:1;
	$pkg_amount=(!empty($registration_info['sponsor_and_account_info']['pkg_amount']))?$registration_info['sponsor_and_account_info']['pkg_amount']:4000;
	
	$username=(!empty($registration_info['sponsor_and_account_info']['username']))?$registration_info['sponsor_and_account_info']['username']:'A';
	
	$user_password=(!empty($registration_info['sponsor_and_account_info']['password']))?$registration_info['sponsor_and_account_info']['password']:'123';
	$transaction_pwd=(!empty($registration_info['sponsor_and_account_info']['t_code']))?$registration_info['sponsor_and_account_info']['t_code']:'123';
    $user_id=generateUserId();
	//personal informtaion
	$first_name=(!empty($registration_info['personal_info']['first_name']))?$registration_info['personal_info']['first_name']:null;
	$last_name=(!empty($registration_info['personal_info']['last_name']))?$registration_info['personal_info']['last_name']:null;
	$email=(!empty($registration_info['sponsor_and_account_info']['email']))?$registration_info['sponsor_and_account_info']['email']:null;
	$contact_no=(!empty($registration_info['personal_info']['contact_no']))?$registration_info['personal_info']['contact_no']:null;
	$country=(!empty($registration_info['personal_info']['country']))?$registration_info['personal_info']['country']:null;
	
	$country_id=(!empty($registration_info['personal_info']['country_id']))?$registration_info['personal_info']['country_id']:null;
	
	$state=(!empty($registration_info['personal_info']['state']))?$registration_info['personal_info']['state']:null;
	
	$state_id=(!empty($registration_info['personal_info']['state_id']))?$registration_info['personal_info']['state_id']:null;
	
	$city=(!empty($registration_info['personal_info']['city']))?$registration_info['personal_info']['city']:null;
	$zip_code=(!empty($registration_info['personal_info']['zip_code']))?$registration_info['personal_info']['zip_code']:null;
	$address_line1=(!empty($registration_info['personal_info']['address_line1']))?$registration_info['personal_info']['address_line1']:null;
	$date_of_birth=(!empty($registration_info['personal_info']['date_of_birth']))?$registration_info['personal_info']['date_of_birth']:null;
	$gender=(!empty($registration_info['personal_info']['gender']))?$registration_info['personal_info']['gender']:null;
	//bank account info
	$account_holder_name=(!empty($registration_info['bank_account_info']['account_holder_name']))?$registration_info['bank_account_info']['account_holder_name']:null;
	$account_no=(!empty($registration_info['bank_account_info']['account_no']))?$registration_info['bank_account_info']['account_no']:null;
	$bank_name=(!empty($registration_info['bank_account_info']['bank_name']))?$registration_info['bank_account_info']['bank_name']:null;
	$branch_name=(!empty($registration_info['bank_account_info']['branch_name']))?$registration_info['bank_account_info']['branch_name']:null;
	$ifsc_code=(!empty($registration_info['bank_account_info']['ifsc_code']))?$registration_info['bank_account_info']['ifsc_code']:null;
	$bank_address=(!empty($registration_info['bank_account_info']['bank_address']))?$registration_info['bank_account_info']['bank_address']:null;
	/////
    $user_registration_data=array(
    		/*Sponsor and account informtaion*/
    		'user_id'=>$user_id,
    		'ref_id'=>$sponser_id,
    		'nom_id'=>$nom_id,
    		'username'=>$username,
    		'password'=>$user_password,
    		't_code'=>$transaction_pwd,
    		'pkg_id'=>$pkg_id,
    		'pkg_amount'=>$pkg_amount,
    		 /*Personal informtaion*/
    		 'first_name'=>$first_name,
    		 'last_name'=>$last_name,
    		 'email'=>$email,
    		 'contact_no'=>$contact_no,
    		 'country'=>$country,
			 'state'=>$state,
			 'city'=>$city,
    		 'zip_code'=>$zip_code,
    		 'address_line1'=>$address_line1,
    		 'address_line1'=>$date_of_birth,
    		 /*Bank Account information*/
    		 'account_no'=>$account_no,
    		 'branch_name'=>$branch_name,
    		 'bank_name'=>$bank_name,
    		 'ifsc_code'=>$ifsc_code,
    		 'account_holder_name'=>$account_holder_name,
    		 ////////
    		 'registration_date'=>date('d-m-Y'),
    		 'current_login_status'=>'0', 
    		 'active_status'=>'1',
    		 'registration_method'=>'1',
			 'registration_method_name'=>'E-wallet'
    		);
    $obj->db->insert('user_registration',$user_registration_data);
    $obj->db->insert('final_e_wallet',array('user_id'=>$user_id,'amount'=>0)); 
       
	/*$query_obj=$obj->db->select('amount')->from('final_e_wallet')->where('user_id',$sponser_id)->get()->row();
	$balance=$query_obj->amount-$pkg_amount;
	$obj->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$sponser_id));
	
	$obj->db->insert('credit_debit',array(
	    'transaction_no'=>generateUniqueTranNo(),
	    'user_id'=>$sponser_id,
	    'credit_amt'=>'0',
	    'debit_amt'=>$pkg_amount,
	    'balance'=>$balance,
	    'admin_charge'=>'0',
		'pkg_id'=>$pkg_id,
	    'receiver_id'=>$user_id,
	    'sender_id'=>$sponser_id,
	    'receive_date'=>date('d-m-Y'),
	    'tran_description'=>'Package Purchase by '.$user_id,
	    'status'=>'0',
	    'payment_method'=>'1',
	    'payment_method_name'=>'E-wallet',
	    'current_url'=>site_url(),
	    'reason'=>'1'
        ));*/
	/*
     @pkg sold amount credited to company as profit
	*/
	$obj->db->insert('package_sold_amount',array(
	'user_id'=>$user_id,
	'pkg_id'=>$pkg_id,
	'pkg_amount'=>$pkg_amount
	));
    /////Inserting Data into user_package_log table///////////
    $obj->db->insert('user_package_log',array(
    	'user_id'=>$user_id,
    	'new_package_id'=>$pkg_id,
    	'active_status'=>'1',
    	'purchased_date'=>date('Y-m-d H:i:s')
    	));
     /***********Mandatory filed for user registartion in matrix plan end over here******************/
    $l=1;
	while($nom_id!='cmp')
	{
        if($nom_id!='cmp')
        {
        	$matrix_downline_data[]=array(
        		'down_id'=>$user_id,
        		'income_id'=>$nom_id,
        		'l_date'=>date('Y-m-d H:i:s'),
        		'status'=>'0',
        		'level'=>$l,
        		'pay_status'=>'Unpaid',
        		'plan_type'=>$pkg_id
        		);
			$l++;
             $nom_info=$obj->db->select('nom_id')->from('user_registration')->where('user_id',$nom_id)->get()->row();
             $nom_id=$nom_info->nom_id;
			}
	}	
	$obj->db->insert_batch('matrix_downline',$matrix_downline_data);
	///////////////////////////
	////Start of crediting direct commission
	
	///////////////////////////
	/*
	$stage_unilevel_commission=$obj->db->select('status')->from('commission_permission')->where(array(
	'comm_type_id'=>'6',
	'pkg_id'=>$pkg_id
	))->get()->row();
	if(!empty($stage_unilevel_commission->status) && $stage_unilevel_commission->status=='1')
	{
		creditFeederStageLevelCommission($user_id,$pkg_id);
	}
	*/
	////////////
	check_upliners1($user_id,$pkg_id);
	/*************/

	
	$sponsor_username=get_user_name($sponser_id);
	sendWelcomeEmailToUser($user_id,$username,$user_password,$transaction_pwd,$email,$sponsor_username);
	$upliner_name=get_user_name($nom_id1);
	sendNewRegistrationEmailToAdmin($user_id,$username,$user_password,$sponsor_username,$upliner_name,$email);
	return true;
   }//end function
}//end function exists0

/*
@author : Aditya
@param  : none
@desc   : It's used to register the user via ewallet user registration method
@return none
*/
if(!function_exists('freeMemberRegistration'))
{
   function freeMemberRegistration($usernamess=null)
   {
    $obj=& get_instance();
	validRegistrationMethod();
    //$registerData=$obj->session->all_userdata();//open  and close comment
     /***********Mandatory filed for user registartion in binary plan start from here******************/
    ////user_registration query
    /*Sponsor and account informtaion*/
	$registration_info=$obj->session->userdata('registration_info');
	$sponser_id=(!empty($registration_info['sponsor_and_account_info']['ref_id']))?$registration_info['sponsor_and_account_info']['ref_id']:'123456';
	$ref_id123[]=$sponser_id;
	//getNom($ref_id123);
	//$nom_id=$_SESSION['nom_id'];
	//$nom_id1=$nom_id;
	//unset($_SESSION['nom_id']);
	//$pkg_id=(!empty($registration_info['sponsor_and_account_info']['pkg_id']))?$registration_info['sponsor_and_account_info']['pkg_id']:1;
	//$pkg_amount=(!empty($registration_info['sponsor_and_account_info']['pkg_amount']))?$registration_info['sponsor_and_account_info']['pkg_amount']:4000;
	$pkg_id=(!empty($registration_info['order']['pkg_id']))?$registration_info['order']['pkg_id']:1;
	$pkg_amount=(!empty($registration_info['order']['pkg_amount']))?$registration_info['order']['pkg_amount']:100;
	$username=(!empty($registration_info['sponsor_and_account_info']['username']))?$registration_info['sponsor_and_account_info']['username']:'A';
	
	$user_password=(!empty($registration_info['sponsor_and_account_info']['password']))?$registration_info['sponsor_and_account_info']['password']:'123';
	$transaction_pwd=(!empty($registration_info['sponsor_and_account_info']['t_code']))?$registration_info['sponsor_and_account_info']['t_code']:'123';
	$idno=(!empty($registration_info['sponsor_and_account_info']['idno']))?$registration_info['sponsor_and_account_info']['idno']:null;
	$aadharno=(!empty($registration_info['sponsor_and_account_info']['aadharno']))?$registration_info['sponsor_and_account_info']['aadharno']:null;
    $user_id=generateUserId();
	//personal informtaion
	$first_name=(!empty($registration_info['personal_info']['first_name']))?$registration_info['personal_info']['first_name']:null;
	$last_name=(!empty($registration_info['personal_info']['last_name']))?$registration_info['personal_info']['last_name']:null;
	$email=(!empty($registration_info['sponsor_and_account_info']['email']))?$registration_info['sponsor_and_account_info']['email']:null;
	$contact_no=(!empty($registration_info['personal_info']['contact_no']))?$registration_info['personal_info']['contact_no']:null;
	$country=(!empty($registration_info['personal_info']['country']))?$registration_info['personal_info']['country']:null;
	$country_id=(!empty($registration_info['personal_info']['country_id']))?$registration_info['personal_info']['country_id']:null;
	$state=(!empty($registration_info['personal_info']['state']))?$registration_info['personal_info']['state']:null;
	$state_id=(!empty($registration_info['personal_info']['state_id']))?$registration_info['personal_info']['state_id']:null;
	$city=(!empty($registration_info['personal_info']['city']))?$registration_info['personal_info']['city']:null;
	$zip_code=(!empty($registration_info['personal_info']['zip_code']))?$registration_info['personal_info']['zip_code']:null;
	$address_line1=(!empty($registration_info['personal_info']['address_line1']))?$registration_info['personal_info']['address_line1']:null;
	$date_of_birth=(!empty($registration_info['personal_info']['date_of_birth']))?$registration_info['personal_info']['date_of_birth']:null;
	$gender=(!empty($registration_info['personal_info']['gender']))?$registration_info['personal_info']['gender']:null;
	//bank account info
	$account_holder_name=(!empty($registration_info['bank_account_info']['account_holder_name']))?$registration_info['bank_account_info']['account_holder_name']:null;
	$account_no=(!empty($registration_info['bank_account_info']['account_no']))?$registration_info['bank_account_info']['account_no']:null;
	$bank_name=(!empty($registration_info['bank_account_info']['bank_name']))?$registration_info['bank_account_info']['bank_name']:null;
	$branch_name=(!empty($registration_info['bank_account_info']['branch_name']))?$registration_info['bank_account_info']['branch_name']:null;
	$ifsc_code=(!empty($registration_info['bank_account_info']['ifsc_code']))?$registration_info['bank_account_info']['ifsc_code']:null;
	$bank_address=(!empty($registration_info['bank_account_info']['bank_address']))?$registration_info['bank_account_info']['bank_address']:null;
	/////
    $user_registration_data=array(
    		/*Sponsor and account informtaion*/
    		'user_id'=>$user_id,
    		'ref_id'=>$sponser_id,
    		
    		'username'=>$username,
    		'password'=>$user_password,
    		't_code'=>$transaction_pwd,
    		
    		'pkg_id'=>$pkg_id,
    		'pkg_amount'=>$pkg_amount,
    		 /*Personal informtaion*/
    		 'first_name'=>$first_name,
    		 'last_name'=>$last_name,
    		 'email'=>$email,
    		 'contact_no'=>$contact_no,
    		 'country'=>$country,
			 'state'=>$state,
			 'city'=>$city,
    		 'zip_code'=>$zip_code,
    		 'address_line1'=>$address_line1,
    		 'address_line1'=>$date_of_birth,
    		 /*Bank Account information*/
    		 'account_no'=>$account_no,
    		 'branch_name'=>$branch_name,
    		 'bank_name'=>$bank_name,
    		 'ifsc_code'=>$ifsc_code,
    		 'account_holder_name'=>$account_holder_name,
    		 ////////
    		 'registration_date'=>date('d-m-Y'),
    		 'current_login_status'=>'0', 
    		 'active_status'=>'1',
    		 'registration_method'=>'1',
			 'registration_method_name'=>'E-wallet'
    		);
    $obj->db->insert('user_registration',$user_registration_data);
    $obj->db->insert('final_e_wallet',array('user_id'=>$user_id,'amount'=>0)); 
	/*
     @pkg sold amount credited to company as profit
	*/
	$pkg_info=$obj->db->select('*')->from('package')->where('id',$pkg_id)->get()->row();
	$point_volume=$pkg_info->pv;
	$shipment_charge=$pkg_info->shipment_charge;
	$tax=$pkg_info->tax;
	$point_volume=0;
	$shipment_charge=0;
	$tax=0;
	$obj->db->insert('package_sold_amount',array(
	'user_id'=>$user_id,
	'country_code'=>'51',
	'pkg_id'=>$pkg_id,
	'pkg_amount'=>$pkg_amount,
	'point_volume'=>$point_volume,
	'purchase_method'=>'1',
	));	
	###########################################  start product volume and commision code here #######################
	$purchase_date=date('Y-m-d');
	
    /////Inserting Data into user_package_log table///////////
    $obj->db->insert('user_package_log',array(
    	'user_id'=>$user_id,
    	'new_package_id'=>$pkg_id,
    	'active_status'=>'1',
    	'purchased_date'=>date('Y-m-d H:i:s')
    	));
     /***********Mandatory filed for user registartion in matrix plan end over here******************/
    $l=1;
    $sponser_id;
	
	$matrix_downline_pv_data[]=array(
        		'down_id'=>$user_id,
        		'income_id'=>$user_id,
        		'l_date'=>date('Y-m-d H:i:s'),
        		'status'=>'0',
        		'level'=>0,
        		'pv'=>$point_volume
        		);
	while($sponser_id!='cmp')
	{
        if($sponser_id!='cmp')
        {
        	$matrix_downline_data[]=array(
        		'down_id'=>$user_id,
        		'income_id'=>$sponser_id,
        		'l_date'=>date('Y-m-d H:i:s'),
        		'status'=>'0',
        		'level'=>$l,
        		'pay_status'=>'Unpaid',
        		'plan_type'=>$pkg_id
        		);
        		$matrix_downline_pv_data[]=array(
        		'down_id'=>$user_id,
        		'income_id'=>$sponser_id,
        		'l_date'=>date('Y-m-d H:i:s'),
        		'status'=>'0',
        		'level'=>$l,
        		'pv'=>$point_volume
        		);
			$l++;
             $nom_info=$obj->db->select('ref_id')->from('user_registration')->where('user_id',$sponser_id)->get()->row();
             $sponser_id=$nom_info->ref_id;
			}
	}
	$obj->db->insert_batch('matrix_downline',$matrix_downline_data);
	//$obj->db->insert_batch('matrix_downline_pv',$matrix_downline_pv_data);
	///////////////////////////
	//check_upliners1($user_id,$pkg_id);
	matrix_commission_level($user_id,'matrix_downline',$pkg_id);
	creditDirectCommission($sponser_id,$user_id,$pkg_id,$pkg_amount);
	/*************/
	$sponsor_username=get_user_name($sponser_id);
	sendWelcomeEmailToUser($user_id,$username,$user_password,$transaction_pwd,$email,$sponsor_username);
	$upliner_name=get_user_name($nom_id1);
	sendNewRegistrationEmailToAdmin($user_id,$username,$user_password,$sponsor_username,$upliner_name,$email);
	return true;
   }//end function
}//end function exists0

if(!function_exists('ewalletUserRegistration'))
{
   function ewalletUserRegistration($usernamess=null)
   {
    $obj=& get_instance();
	validRegistrationMethod();
    //$registerData=$obj->session->all_userdata();//open  and close comment
     /***********Mandatory filed for user registartion in binary plan start from here******************/
    ////user_registration query
    /*Sponsor and account informtaion*/
	$registration_info=$obj->session->userdata('registration_info');
	$sponser_id=(!empty($registration_info['sponsor_and_account_info']['ref_id']))?$registration_info['sponsor_and_account_info']['ref_id']:'123456';
	$ref_id123[]=$sponser_id;
	getNom($ref_id123);
	$nom_id=$_SESSION['nom_id'];
	$nom_id1=$nom_id;
	unset($_SESSION['nom_id']);
	//$pkg_id=(!empty($registration_info['sponsor_and_account_info']['pkg_id']))?$registration_info['sponsor_and_account_info']['pkg_id']:1;
	//$pkg_amount=(!empty($registration_info['sponsor_and_account_info']['pkg_amount']))?$registration_info['sponsor_and_account_info']['pkg_amount']:4000;
	$pkg_id=(!empty($registration_info['sponsor_and_account_info']['pkg_id']))?$registration_info['sponsor_and_account_info']['pkg_id']:1;
	
	$pkg_amount=(!empty($registration_info['sponsor_and_account_info']['pkg_amount']))?$registration_info['sponsor_and_account_info']['pkg_amount']:100;
	
	$username=(!empty($registration_info['sponsor_and_account_info']['username']))?$registration_info['sponsor_and_account_info']['username']:'A';
	
	
	$user_password=(!empty($registration_info['sponsor_and_account_info']['password']))?$registration_info['sponsor_and_account_info']['password']:'123';
	$transaction_pwd=(!empty($registration_info['sponsor_and_account_info']['t_code']))?$registration_info['sponsor_and_account_info']['t_code']:'123';
	$idno=(!empty($registration_info['sponsor_and_account_info']['welcome_pack']))?$registration_info['sponsor_and_account_info']['welcome_pack']:null;
	$aadharno=(!empty($registration_info['sponsor_and_account_info']['collect_center']))?$registration_info['sponsor_and_account_info']['collect_center']:null;
    $user_id=generateUserId();
	//personal informtaion
	$first_name=(!empty($registration_info['personal_info']['first_name']))?$registration_info['personal_info']['first_name']:null;
	$last_name=(!empty($registration_info['personal_info']['last_name']))?$registration_info['personal_info']['last_name']:null;
	$email=(!empty($registration_info['sponsor_and_account_info']['email']))?$registration_info['sponsor_and_account_info']['email']:null;
	$contact_no=(!empty($registration_info['personal_info']['contact_no']))?$registration_info['personal_info']['contact_no']:null;
	$country=(!empty($registration_info['personal_info']['country']))?$registration_info['personal_info']['country']:null;
	
	$country_id=(!empty($registration_info['personal_info']['country_id']))?$registration_info['personal_info']['country_id']:null;
	
	$state=(!empty($registration_info['personal_info']['state']))?$registration_info['personal_info']['state']:null;
	
	$state_id=(!empty($registration_info['personal_info']['state_id']))?$registration_info['personal_info']['state_id']:null;
	
	$city=(!empty($registration_info['personal_info']['city']))?$registration_info['personal_info']['city']:null;
	$zip_code=(!empty($registration_info['personal_info']['zip_code']))?$registration_info['personal_info']['zip_code']:null;
	$address_line1=(!empty($registration_info['personal_info']['address_line1']))?$registration_info['personal_info']['address_line1']:null;
	$date_of_birth=(!empty($registration_info['personal_info']['date_of_birth']))?$registration_info['personal_info']['date_of_birth']:null;
	$gender=(!empty($registration_info['personal_info']['gender']))?$registration_info['personal_info']['gender']:null;
	//bank account info
	$account_holder_name=(!empty($registration_info['bank_account_info']['account_holder_name']))?$registration_info['bank_account_info']['account_holder_name']:null;
	$account_no=(!empty($registration_info['bank_account_info']['account_no']))?$registration_info['bank_account_info']['account_no']:null;
	$bank_name=(!empty($registration_info['bank_account_info']['bank_name']))?$registration_info['bank_account_info']['bank_name']:null;
	$branch_name=(!empty($registration_info['bank_account_info']['branch_name']))?$registration_info['bank_account_info']['branch_name']:null;
	$ifsc_code=(!empty($registration_info['bank_account_info']['ifsc_code']))?$registration_info['bank_account_info']['ifsc_code']:null;
	$bank_address=(!empty($registration_info['bank_account_info']['bank_address']))?$registration_info['bank_account_info']['bank_address']:null;
	/////
    $user_registration_data=array(
    		/*Sponsor and account informtaion*/
    		'user_id'=>$user_id,
    		'ref_id'=>$sponser_id,
    		'nom_id'=>$nom_id,
    	
    		'username'=>$username,
    		'password'=>$user_password,
    		't_code'=>$transaction_pwd,
    		'pkg_id'=>$pkg_id,
    		'pkg_amount'=>$pkg_amount,
    		 /*Personal informtaion*/
    		 'first_name'=>$first_name,
    		 'last_name'=>$last_name,
    		 'email'=>$email,
    		 't_code'=>$transaction_pwd,
    		 'contact_no'=>$contact_no,
    		 'country'=>$country,
			 'state'=>$state,
			 'city'=>$city,
    		 'zip_code'=>$zip_code,
    		 'address_line1'=>$address_line1,
    		 'date_of_birth'=>$date_of_birth,
    		 /*Bank Account information*/
    		 'account_no'=>$account_no,
    		 'branch_name'=>$branch_name,
    		 'bank_name'=>$bank_name,
    		 'ifsc_code'=>$ifsc_code,
    		 'account_holder_name'=>$account_holder_name,
    		 ////////
    		 'registration_date'=>date('d-m-Y'),
    		 'business_plan_update_date'=>date('Y-m-d H:i:s'),
    		 'current_login_status'=>'0', 
    		 'active_status'=>'1',
    		 'registration_method'=>'1',
			 'registration_method_name'=>'E-wallet'
    		);
    $obj->db->insert('user_registration',$user_registration_data);
    $obj->db->insert('final_e_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_product_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_furniture_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_health_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_home_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_payoff_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_saving_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_cash_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_car_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_bonus_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_referral_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_repurchase_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_promo_wallet',array('user_id'=>$user_id,'amount'=>0));
      
      $payer_info=$obj->session->userdata('payer_info');
	$query_obj=$obj->db->select('amount')->from('final_e_wallet')->where('user_id',$payer_info)->get()->row();
	$balance=$query_obj->amount-($pkg_amount);
	$obj->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$payer_info));
	
	$obj->db->insert('credit_debit',array(
	    'transaction_no'=>generateUniqueTranNo(),
	    'user_id'=>$payer_info,
	    'credit_amt'=>'0',
	    'debit_amt'=>$pkg_amount,
	    'balance'=>$balance,
	    'admin_charge'=>'0',
		'pkg_id'=>$pkg_id,
	    'receiver_id'=>$user_id,
	    'sender_id'=>$payer_info,
	    'receive_date'=>date('d-m-Y'),
	    'tran_description'=>'Package Purchase by '.$user_id,
	    'status'=>'0',
	    'payment_method'=>'1',
	    'payment_method_name'=>'E-wallet',
	    'current_url'=>site_url(),
	    'reason'=>'1'
        ));
        
        if($pkg_id==1){$wel_amount=6;}
     if($pkg_id==2){$wel_amount=12;}
     if($pkg_id==3){$wel_amount=18;}
     if($pkg_id==4){$wel_amount=24;}
        $query_obj=$obj->db->select('amount')->from('final_product_wallet')->where('user_id',$user_id)->get()->row();
	$balance=$query_obj->amount+($wel_amount);
	$obj->db->update('final_product_wallet',array('amount'=>$balance),array('user_id'=>$user_id));
	
	$obj->db->insert('credit_debit_product',array(
	    'transaction_no'=>generateUniqueTranNo(),
	    'user_id'=>$user_id,
	    'credit_amt'=>$wel_amount,
	    'debit_amt'=>'0',
	    'balance'=>$balance,
	    'admin_charge'=>'0',
		'pkg_id'=>$pkg_id,
	    'receiver_id'=>$user_id,
	    'sender_id'=>$user_id,
	    'receive_date'=>date('d-m-Y'),
	    'tran_description'=>'Welcome Pack Added ',
	    'status'=>'1',
	    'payment_method'=>'1',
	    'payment_method_name'=>'E-wallet',
	    'current_url'=>site_url(),
	    'reason'=>'1'
        ));
	/*
     @pkg sold amount credited to company as profit
	*/
	$pkg_info=$obj->db->select('*')->from('package')->where('id',$pkg_id)->get()->row();
	$point_volume=$pkg_info->pv;
	$shipment_charge=$pkg_info->shipment_charge;
	$tax=$pkg_info->tax;
	$point_volume=0;
	$shipment_charge=0;
	$tax=0;
	
	###########################################  start product volume and commision code here #######################
	$purchase_date=date('Y-m-d');
    /////Inserting Data into user_package_log table///////////
    $obj->db->insert('user_package_log',array(
    	'user_id'=>$user_id,
    	'new_package_id'=>$pkg_id,
    	'active_status'=>'1',
    	'purchased_date'=>date('Y-m-d H:i:s')
    	));
     /***********Mandatory filed for user registartion in matrix plan end over here******************/
    $l=1;
    $nomcheck=$nom_id;

	while($nomcheck!='cmp')
	{
        if($nomcheck!='cmp')
        {
        	$matrix_downline_data[]=array(
        		'down_id'=>$user_id,
        		'income_id'=>$nomcheck,
        		'l_date'=>date('Y-m-d H:i:s'),
        		'status'=>'0',
        		'level'=>$l,
        		'pay_status'=>'Unpaid',
        		'plan_type'=>$pkg_id
        		);
        		
			$l++;
             $nom_info=$obj->db->select('nom_id')->from('user_registration')->where('user_id',$nomcheck)->get()->row();
             $nomcheck=$nom_info->nom_id;
			}
	}
	$obj->db->insert_batch('matrix_downline',$matrix_downline_data);
	//$obj->db->insert_batch('matrix_downline_pv',$matrix_downline_pv_data);
	///////////////////////////
	////Start of crediting direct commission
	creditDirectCommission($sponser_id,$user_id,$pkg_id,$pkg_amount);
	
	//////////Code for level pay status//////////////
    matrix_commission_level($user_id,'matrix_downline',$pkg_id);
	///////////////////////////
	
	////////////
	check_upliners1($user_id,$pkg_id);
	/*************/

	
	$sponsor_username=get_user_name($sponser_id);
	sendWelcomeEmailToUser($user_id,$username,$user_password,$transaction_pwd,$email,$sponsor_username);
	$upliner_name=get_user_name($nom_id1);
	sendNewRegistrationEmailToAdmin($user_id,$username,$user_password,$sponsor_username,$upliner_name,$email);
	return true;
   }//end function
}//end function exists0
/*
@author : Aditya
@param  : none
@desc   : It's used to register the user via ewallet user registration method
@return none
*/



if(!function_exists('PaystackUserRegistration'))
{
   function PaystackUserRegistration($usernamess=null)
   {
    
	$obj=& get_instance();
	
	$registration_info=$obj->session->userdata('registration_info');
	$sponser_id=(!empty($registration_info['sponsor_and_account_info']['ref_id']))?$registration_info['sponsor_and_account_info']['ref_id']:'123456';
	$ref_id123[]=$sponser_id;
	getNom($ref_id123);
	$nom_id=$_SESSION['nom_id'];
	$nom_id1=$nom_id;
	unset($_SESSION['nom_id']);
	$pkg_id=(!empty($registration_info['sponsor_and_account_info']['pkg_id']))?$registration_info['sponsor_and_account_info']['pkg_id']:1;
	$pkg_amount=(!empty($registration_info['sponsor_and_account_info']['pkg_amount']))?$registration_info['sponsor_and_account_info']['pkg_amount']:4000;
	
	$username=(!empty($registration_info['sponsor_and_account_info']['username']))?$registration_info['sponsor_and_account_info']['username']:'A';
	
	
	$user_password=(!empty($registration_info['sponsor_and_account_info']['password']))?$registration_info['sponsor_and_account_info']['password']:'123';
	$transaction_pwd=(!empty($registration_info['sponsor_and_account_info']['t_code']))?$registration_info['sponsor_and_account_info']['t_code']:'123';
    $user_id=generateUserId();
	//personal informtaion
	$first_name=(!empty($registration_info['personal_info']['first_name']))?$registration_info['personal_info']['first_name']:null;
	$last_name=(!empty($registration_info['personal_info']['last_name']))?$registration_info['personal_info']['last_name']:null;
	$email=(!empty($registration_info['sponsor_and_account_info']['email']))?$registration_info['sponsor_and_account_info']['email']:null;
	$contact_no=(!empty($registration_info['personal_info']['contact_no']))?$registration_info['personal_info']['contact_no']:null;
	$country=(!empty($registration_info['personal_info']['country']))?$registration_info['personal_info']['country']:null;
	
	$country_id=(!empty($registration_info['personal_info']['country_id']))?$registration_info['personal_info']['country_id']:null;
	
	$state=(!empty($registration_info['personal_info']['state']))?$registration_info['personal_info']['state']:null;
	
	$state_id=(!empty($registration_info['personal_info']['state_id']))?$registration_info['personal_info']['state_id']:null;
	
	$city=(!empty($registration_info['personal_info']['city']))?$registration_info['personal_info']['city']:null;
	$zip_code=(!empty($registration_info['personal_info']['zip_code']))?$registration_info['personal_info']['zip_code']:null;
	$address_line1=(!empty($registration_info['personal_info']['address_line1']))?$registration_info['personal_info']['address_line1']:null;
	$date_of_birth=(!empty($registration_info['personal_info']['date_of_birth']))?$registration_info['personal_info']['date_of_birth']:null;
	$gender=(!empty($registration_info['personal_info']['gender']))?$registration_info['personal_info']['gender']:null;
	//bank account info
	$account_holder_name=(!empty($registration_info['bank_account_info']['account_holder_name']))?$registration_info['bank_account_info']['account_holder_name']:null;
	$account_no=(!empty($registration_info['bank_account_info']['account_no']))?$registration_info['bank_account_info']['account_no']:null;
	$bank_name=(!empty($registration_info['bank_account_info']['bank_name']))?$registration_info['bank_account_info']['bank_name']:null;
	$branch_name=(!empty($registration_info['bank_account_info']['branch_name']))?$registration_info['bank_account_info']['branch_name']:null;
	$ifsc_code=(!empty($registration_info['bank_account_info']['ifsc_code']))?$registration_info['bank_account_info']['ifsc_code']:null;
	$bank_address=(!empty($registration_info['bank_account_info']['bank_address']))?$registration_info['bank_account_info']['bank_address']:null;
	/////
    $user_registration_data=array(
    		/*Sponsor and account informtaion*/
    		'user_id'=>$user_id,
    		'ref_id'=>$sponser_id,
    		'nom_id'=>$nom_id,
    		'username'=>$username,
    		'password'=>$user_password,
    		't_code'=>$transaction_pwd,
    		'pkg_id'=>$pkg_id,
    		'pkg_amount'=>$pkg_amount,
    		 /*Personal informtaion*/
    		 'first_name'=>$first_name,
    		 'last_name'=>$last_name,
    		 'email'=>$email,
    		 'contact_no'=>$contact_no,
    		 'country'=>$country,
			 'state'=>$state,
			 'city'=>$city,
    		 'zip_code'=>$zip_code,
    		 'address_line1'=>$address_line1,
    		 'address_line1'=>$date_of_birth,
    		 /*Bank Account information*/
    		 'account_no'=>$account_no,
    		 'branch_name'=>$branch_name,
    		 'bank_name'=>$bank_name,
    		 'ifsc_code'=>$ifsc_code,
    		 'account_holder_name'=>$account_holder_name,
    		 ////////
    		 'registration_date'=>date('d-m-Y'),
    		 'current_login_status'=>'0', 
    		 'active_status'=>'1',
    		 'registration_method'=>'5',
			 'registration_method_name'=>'Paystack'
    		);
    
	$obj->db->insert('user_registration',$user_registration_data);
    $obj->db->insert('final_e_wallet',array('user_id'=>$user_id,'amount'=>0)); 
    $obj->db->insert('final_product_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_furniture_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_health_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_home_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_payoff_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_saving_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_cash_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_car_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_bonus_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_referral_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_repurchase_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_promo_wallet',array('user_id'=>$user_id,'amount'=>0));
      
	if($pkg_id==1){$wel_amount=6;}
     if($pkg_id==2){$wel_amount=12;}
     if($pkg_id==3){$wel_amount=18;}
     if($pkg_id==4){$wel_amount=24;}
        $query_obj=$obj->db->select('amount')->from('final_product_wallet')->where('user_id',$user_id)->get()->row();
	$balance=$query_obj->amount+($wel_amount);
	$obj->db->update('final_product_wallet',array('amount'=>$balance),array('user_id'=>$user_id));
	
	$obj->db->insert('credit_debit_product',array(
	    'transaction_no'=>generateUniqueTranNo(),
	    'user_id'=>$user_id,
	    'credit_amt'=>$wel_amount,
	    'debit_amt'=>'0',
	    'balance'=>$balance,
	    'admin_charge'=>'0',
		'pkg_id'=>$pkg_id,
	    'receiver_id'=>$user_id,
	    'sender_id'=>$user_id,
	    'receive_date'=>date('d-m-Y'),
	    'tran_description'=>'Welcome Pack Added ',
	    'status'=>'1',
	    'payment_method'=>'1',
	    'payment_method_name'=>'E-wallet',
	    'current_url'=>site_url(),
	    'reason'=>'1'
        ));
	
	$obj->db->insert('package_sold_amount',array(
	'user_id'=>$user_id,
	'pkg_id'=>$pkg_id,
	'pkg_amount'=>$pkg_amount
	));
    /////Inserting Data into user_package_log table///////////
    $obj->db->insert('user_package_log',array(
    	'user_id'=>$user_id,
    	'new_package_id'=>$pkg_id,
    	'active_status'=>'1',
    	'purchased_date'=>date('Y-m-d H:i:s')
    	));
     /***********Mandatory filed for user registartion in matrix plan end over here******************/
    $l=1;
    $nomcheck=$nom_id;

	while($nomcheck!='cmp')
	{
        if($nomcheck!='cmp')
        {
        	$matrix_downline_data[]=array(
        		'down_id'=>$user_id,
        		'income_id'=>$nomcheck,
        		'l_date'=>date('Y-m-d H:i:s'),
        		'status'=>'0',
        		'level'=>$l,
        		'pay_status'=>'Unpaid',
        		'plan_type'=>$pkg_id
        		);
        		
			$l++;
             $nom_info=$obj->db->select('nom_id')->from('user_registration')->where('user_id',$nomcheck)->get()->row();
             $nomcheck=$nom_info->nom_id;
			}
	}
	$obj->db->insert_batch('matrix_downline',$matrix_downline_data);
	//$obj->db->insert_batch('matrix_downline_pv',$matrix_downline_pv_data);
	///////////////////////////
	////Start of crediting direct commission
	creditDirectCommission($sponser_id,$user_id,$pkg_id,$pkg_amount);
	
	//////////Code for level pay status//////////////
		matrix_commission_level($user_id,'matrix_downline',$pkg_id);
	///////////////////////////
	
	////////////
	check_upliners1($user_id,$pkg_id);
	/*************/

	
	$sponsor_username=get_user_name($sponser_id);
	sendWelcomeEmailToUser($user_id,$username,$user_password,$transaction_pwd,$email,$sponsor_username);
	
	$upliner_name=get_user_name($nom_id1);
	sendNewRegistrationEmailToAdmin($user_id,$username,$user_password,$sponsor_username,$upliner_name,$email);
	
	return array('status'=>true,'user_id'=>$user_id);
   }
}




if(!function_exists('epinUserRegistration'))
{
   function epinUserRegistration($registration_info=null)
   {
    $obj=& get_instance();
	validRegistrationMethod();
    //$registerData=$obj->session->all_userdata();//open  and close comment
     /***********Mandatory filed for user registartion in binary plan start from here******************/
    ////user_registration query
    /*Sponsor and account informtaion*/
	$registration_info=$obj->session->userdata('registration_info');
	$sponser_id=(!empty($registration_info['sponsor_and_account_info']['ref_id']))?$registration_info['sponsor_and_account_info']['ref_id']:'123456';
	$ref_id123[]=$sponser_id;
	getNom($ref_id123);
	$nom_id=$_SESSION['nom_id'];
	$nom_id1=$nom_id;
	unset($_SESSION['nom_id']);
	$pkg_id=(!empty($registration_info['sponsor_and_account_info']['pkg_id']))?$registration_info['sponsor_and_account_info']['pkg_id']:1;
	$pkg_amount=(!empty($registration_info['sponsor_and_account_info']['pkg_amount']))?$registration_info['sponsor_and_account_info']['pkg_amount']:10500;
	$username=(!empty($registration_info['sponsor_and_account_info']['username']))?$registration_info['sponsor_and_account_info']['username']:'O';
	$user_password=(!empty($registration_info['sponsor_and_account_info']['password']))?$registration_info['sponsor_and_account_info']['password']:'123';
	$transaction_pwd=(!empty($registration_info['sponsor_and_account_info']['t_code']))?$registration_info['sponsor_and_account_info']['t_code']:'123';
    $user_id=generateUserId();
	//personal informtaion
	$first_name=(!empty($registration_info['personal_info']['first_name']))?$registration_info['personal_info']['first_name']:null;
	$last_name=(!empty($registration_info['personal_info']['last_name']))?$registration_info['personal_info']['last_name']:null;
	$email=(!empty($registration_info['sponsor_and_account_info']['email']))?$registration_info['sponsor_and_account_info']['email']:null;
	$contact_no=(!empty($registration_info['personal_info']['contact_no']))?$registration_info['personal_info']['contact_no']:null;
	$country=(!empty($registration_info['personal_info']['country']))?$registration_info['personal_info']['country']:null;
	
	$country_id=(!empty($registration_info['personal_info']['country_id']))?$registration_info['personal_info']['country_id']:null;
	
	$state=(!empty($registration_info['personal_info']['state']))?$registration_info['personal_info']['state']:null;
	
	$state_id=(!empty($registration_info['personal_info']['state_id']))?$registration_info['personal_info']['state_id']:null;
	
	$city=(!empty($registration_info['personal_info']['city']))?$registration_info['personal_info']['city']:null;
	$zip_code=(!empty($registration_info['personal_info']['zip_code']))?$registration_info['personal_info']['zip_code']:null;
	$address_line1=(!empty($registration_info['personal_info']['address_line1']))?$registration_info['personal_info']['address_line1']:null;
	$date_of_birth=(!empty($registration_info['personal_info']['date_of_birth']))?$registration_info['personal_info']['date_of_birth']:null;
	$gender=(!empty($registration_info['personal_info']['gender']))?$registration_info['personal_info']['gender']:null;
	//bank account info
	$account_holder_name=(!empty($registration_info['bank_account_info']['account_holder_name']))?$registration_info['bank_account_info']['account_holder_name']:null;
	$account_no=(!empty($registration_info['bank_account_info']['account_no']))?$registration_info['bank_account_info']['account_no']:null;
	$bank_name=(!empty($registration_info['bank_account_info']['bank_name']))?$registration_info['bank_account_info']['bank_name']:null;
	$branch_name=(!empty($registration_info['bank_account_info']['branch_name']))?$registration_info['bank_account_info']['branch_name']:null;
	$ifsc_code=(!empty($registration_info['bank_account_info']['ifsc_code']))?$registration_info['bank_account_info']['ifsc_code']:null;
	$bank_address=(!empty($registration_info['bank_account_info']['bank_address']))?$registration_info['bank_account_info']['bank_address']:null;
	/////////////////////////
    $user_registration_data=array(
    		/*Sponsor and account informtaion*/
    		'user_id'=>$user_id,
    		'ref_id'=>$sponser_id,
    		'nom_id'=>$nom_id,
    		'username'=>$username,
    		'password'=>$user_password,
    		't_code'=>$transaction_pwd,
    		'pkg_id'=>$pkg_id,
    		'pkg_amount'=>$pkg_amount,
    		 /*Personal informtaion*/
    		 'first_name'=>$first_name,
    		 'last_name'=>$last_name,
    		 'email'=>$email,
    		 'contact_no'=>$contact_no,
    		 'country'=>$country,
    		 'state'=>$state,
    		 'city'=>$city,
    		 'zip_code'=>$zip_code,
    		 'address_line1'=>$address_line1,
    		 'address_line1'=>$date_of_birth,
    		 /*Bank Account information*/
    		 'account_no'=>$account_no,
    		 'branch_name'=>$branch_name,
    		 'bank_name'=>$bank_name,
    		 'ifsc_code'=>$ifsc_code,
    		 'account_holder_name'=>$account_holder_name,
    		 ////////
    		 'registration_date'=>date('d-m-Y'),
    		 'current_login_status'=>'0', 
    		 'active_status'=>'1',
    		 'registration_method'=>'2',
			 'registration_method_name'=>'E-Pin'
    		);
    $obj->db->insert('user_registration',$user_registration_data);
    $obj->db->insert('final_e_wallet',array('user_id'=>$user_id,'amount'=>0)); 
    $obj->db->insert('final_product_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_furniture_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_health_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_home_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_payoff_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_saving_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_cash_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_car_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_bonus_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_referral_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_repurchase_wallet',array('user_id'=>$user_id,'amount'=>0));
    $obj->db->insert('final_promo_wallet',array('user_id'=>$user_id,'amount'=>0));
    
    if($pkg_id==1){$wel_amount=6;}
     if($pkg_id==2){$wel_amount=12;}
     if($pkg_id==3){$wel_amount=18;}
     if($pkg_id==4){$wel_amount=24;}
        $query_obj=$obj->db->select('amount')->from('final_product_wallet')->where('user_id',$user_id)->get()->row();
	$balance=$query_obj->amount+($wel_amount);
	$obj->db->update('final_product_wallet',array('amount'=>$balance),array('user_id'=>$user_id));
	
	$obj->db->insert('credit_debit_product',array(
	    'transaction_no'=>generateUniqueTranNo(),
	    'user_id'=>$user_id,
	    'credit_amt'=>$wel_amount,
	    'debit_amt'=>'0',
	    'balance'=>$balance,
	    'admin_charge'=>'0',
		'pkg_id'=>$pkg_id,
	    'receiver_id'=>$user_id,
	    'sender_id'=>$user_id,
	    'receive_date'=>date('d-m-Y'),
	    'tran_description'=>'Welcome Pack Added ',
	    'status'=>'1',
	    'payment_method'=>'1',
	    'payment_method_name'=>'E-wallet',
	    'current_url'=>site_url(),
	    'reason'=>'1'
        ));
	/*
     @pkg sold amount credited to company as profit
	*/
	$obj->db->insert('package_sold_amount',array(
	'user_id'=>$user_id,
	'pkg_id'=>$pkg_id,
	'pkg_amount'=>$pkg_amount
	));
    /////Inserting Data into user_package_log table///////////
    $obj->db->insert('user_package_log',array(
    	'user_id'=>$user_id,
    	'new_package_id'=>$pkg_id,
    	'active_status'=>'1',
    	'purchased_date'=>date('Y-m-d H:i:s')
    	));
     /***********Mandatory filed for user registartion in matrix plan end over here******************/
    $l=1;
	while($nom_id!='cmp')
	{
        if($nom_id!='cmp')
        {
        	$matrix_downline_data[]=array(
        		'down_id'=>$user_id,
        		'income_id'=>$nom_id,
        		'l_date'=>date('Y-m-d H:i:s'),
        		'status'=>'0',
        		'level'=>$l,
        		'pay_status'=>'Unpaid',
        		'plan_type'=>$pkg_id
        		);
			$l++;
             $nom_info=$obj->db->select('nom_id')->from('user_registration')->where('user_id',$nom_id)->get()->row();
             $nom_id=$nom_info->nom_id;
			}
	}	
	$obj->db->insert_batch('matrix_downline',$matrix_downline_data);
	///////////////////////////
	////Start of crediting direct commission
		creditDirectCommission($sponser_id,$user_id,$pkg_id,$pkg_amount);
	///////////////////////////
	//////////Code for level pay status//////////////
		matrix_commission_level($user_id,'matrix_downline',$pkg_id);
	///////////////////////////
	check_upliners1($user_id,$pkg_id);
	/*************/
	
	
	$sponsor_username=get_user_name($sponser_id);
	sendWelcomeEmailToUser($user_id,$username,$user_password,$transaction_pwd,$email,$sponsor_username);
	$upliner_name=get_user_name($nom_id1);
	sendNewRegistrationEmailToAdmin($user_id,$username,$user_password,$sponsor_username,$upliner_name,$email);
	return true;
   }//end function
}//end function exists0
/*
@author : Aditya
@param  : none
@desc   : It's used to register the user via ewallet user registration method
@return none
*/
if(!function_exists('bankWireUserRegistration'))
{
   function bankWireUserRegistration($id)
   {
    $obj=& get_instance();
    /*Sponsor and account informtaion*/
	$obj->db->update('bank_wired_user_registration',array('status'=>'1','action_date'=>date('Y-m-d H:i:s')),array('id'=>$id));	
    $register_user_details=$obj->db->select('*')->from('bank_wired_user_registration')->where('id',$id)->get()->row();
    $sponser_id=$register_user_details->ref_id;
    $ref_id123[]=$sponser_id;
    getNom($ref_id123);
	$nom_id=$_SESSION['nom_id'];
	$nom_id1=$nom_id;
	unset($_SESSION['nom_id']);
    $pkg_id=(!empty($register_user_details->platform))?$register_user_details->platform:'1';
    $pkg_amount=(!empty($register_user_details->package_fee))?$register_user_details->package_fee:'10500';
    $username=$register_user_details->username;
    $user_password=$register_user_details->password;
    $transaction_pwd=$register_user_details->t_code;
    $user_id=generateUserId();
    /*Personal informtaion*/
    $first_name=(!empty($register_user_details->first_name))?$register_user_details->first_name:null;
    $last_name=(!empty($register_user_details->last_name))?$register_user_details->last_name:null;
    $email=(!empty($register_user_details->email))?$register_user_details->email:null;
    $contact_no=(!empty($register_user_details->contact_no))?$register_user_details->contact_no:null;
    
	$country=(!empty($register_user_details->country))?$register_user_details->country:null;
	
	$country_id=(!empty($register_user_details->country_id))?$register_user_details->country_id:null;
    
	$state=(!empty($register_user_details->state))?$register_user_details->state:null;
	
	$state_id=(!empty($register_user_details->state_id))?$register_user_details->state_id:null;
    
	
	$city=(!empty($register_user_details->city))?$register_user_details->city:null;
    $zip_code=(!empty($register_user_details->zip_code))?$register_user_details->zip_code:null;
    $address_line1=(!empty($register_user_details->address_line1))?$register_user_details->address_line1:null;
    $date_of_birth=(!empty($register_user_details->date_of_birth))?$register_user_details->date_of_birth:null;
    $gender=(!empty($register_user_details->gender))?$register_user_details->gender:null;

    /*Bank Account information*/
    $account_holder_name=(!empty($register_user_details->account_holder_name))?$register_user_details->account_holder_name:null;
    $account_no=(!empty($register_user_details->account_no))?$register_user_details->account_no:null;
    $bank_name=(!empty($register_user_details->bank_name))?$register_user_details->bank_name:null;
    $branch_name=(!empty($register_user_details->branch_name))?$register_user_details->branch_name:null;
    $ifsc_code=(!empty($register_user_details->ifsc_code))?$register_user_details->ifsc_code:null;
    $bank_address=(!empty($register_user_details->bank_address))?$register_user_details->bank_address:null;
	$registration_method_name="Bank-Wire Payment";
    $user_registration_data=array(
    		/*Sponsor and account informtaion*/
    		'user_id'=>$user_id,
    		'ref_id'=>$sponser_id,
    		'nom_id'=>$nom_id,
    		'username'=>$username,
    		'password'=>$user_password,
    		't_code'=>$transaction_pwd,
    		'pkg_id'=>$pkg_id,
    		'pkg_amount'=>$pkg_amount,
    		 /*Personal informtaion*/
    		 'first_name'=>$first_name,
    		 'last_name'=>$last_name,
    		 'email'=>$email,
    		 'contact_no'=>$contact_no,
    		 'country'=>$country,
    		 'state'=>$state,
    		 'city'=>$city,
    		 'zip_code'=>$zip_code,
    		 'address_line1'=>$address_line1,
    		 'date_of_birth'=>$date_of_birth,
    		 /*Bank Account information*/
    		 'account_no'=>$account_no,
    		 'branch_name'=>$branch_name,
    		 'bank_name'=>$bank_name,
    		 'ifsc_code'=>$ifsc_code,
    		 'account_holder_name'=>$account_holder_name,
    		 ////////
    		 'registration_date'=>date('d-m-Y'),
    		 'current_login_status'=>'0', 
    		 'active_status'=>'1',
    		 'registration_method'=>'1',
			 'registration_method_name'=>$registration_method_name
    		);
    $obj->db->insert('user_registration',$user_registration_data);
    $obj->db->insert('final_e_wallet',array('user_id'=>$user_id,'amount'=>0)); 
    /*
     @pkg sold amount credited to company as profit
	*/
	$obj->db->insert('package_sold_amount',array(
	'user_id'=>$user_id,
	'pkg_id'=>$pkg_id,
	'pkg_amount'=>$pkg_amount
	));
    /////Inserting Data into user_package_log table///////////
    $obj->db->insert('user_package_log',array(
    	'user_id'=>$user_id,
    	'new_package_id'=>$pkg_id,
    	'active_status'=>'1',
    	'purchased_date'=>date('Y-m-d H:i:s')
    	));
     /***********Mandatory filed for user registartion in matrix plan end over here******************/
    $l=1;
	while($nom_id!='cmp')
	{
        if($nom_id!='cmp')
        {
        	$matrix_downline_data[]=array(
        		'down_id'=>$user_id,
        		'income_id'=>$nom_id,
        		'l_date'=>date('Y-m-d H:i:s'),
        		'status'=>'0',
        		'level'=>$l,
        		'pay_status'=>'Unpaid',
        		'plan_type'=>$pkg_id
        		);
			$l++;
             $nom_info=$obj->db->select('nom_id')->from('user_registration')->where('user_id',$nom_id)->get()->row();
             $nom_id=$nom_info->nom_id;
			}
	}	
	$obj->db->insert_batch('matrix_downline',$matrix_downline_data);
	////Start of crediting direct commission
		creditDirectCommission($sponser_id,$user_id,$pkg_id,$pkg_amount);
	///////////////////////////
	/*
	$stage_unilevel_commission=$obj->db->select('status')->from('commission_permission')->where(array(
	'comm_type_id'=>'6',
	'pkg_id'=>$pkg_id
	))->get()->row();
	if(!empty($stage_unilevel_commission->status) && $stage_unilevel_commission->status=='1')
	{
		creditFeederStageLevelCommission($user_id,$pkg_id);
	}
	*/
	//////////////////////
	//check_upliners1($user_id,$pkg_id);
	/*************/
	sendWelcomeEmailToUser($user_id,$username,$user_password,$transaction_pwd,$email,$sponsor_username);
	$upliner_name=get_user_name($nom_id1);
	sendNewRegistrationEmailToAdmin($user_id,$username,$user_password,$sponsor_username,$upliner_name,$email);
	return true;
   }//end function
}//end function exists0


function check_upliners1($new_id,$platform)
{
		$obj=& get_instance();
		//echo "\ncheck_upliners1";
		//$qr=mysql_query("select * from matrix_downline where down_id='$new_id'");
		$info=$obj->db->select('*')->from('matrix_downline')->where('down_id',$new_id)->get()->result_array();
		foreach($info as $row)
		{
			$upliner=$row['income_id'];
			
			$pkg_info=$obj->db->select('pkg_id')->from('user_registration')->where('user_id',$upliner)->get()->row();
			
			$user_package_id=$pkg_info->pkg_id;
			
			$lev1_num=$obj->db->select('*')->from('matrix_downline')->where(array('income_id'=>$upliner,'level'=>'1'))->get()->num_rows();
			
			$lev2_num=$obj->db->select('*')->from('matrix_downline')->where(array('income_id'=>$upliner,'level'=>'2'))->get()->num_rows();
			////////////////////
			
			$lev1_num_info=$obj->db->select('*')->from('matrix_downline')->where(array('income_id'=>$upliner,'level'=>'1'))->limit('1','0')->get()->row();
			
			$lev2_num_info=$obj->db->select('*')->from('matrix_downline')->where(array('income_id'=>$upliner,'level'=>'2'))->limit('1','0')->get()->row();
			
			///////////////////
			if($lev1_num==2 && $lev2_num==4)
			{
		
			    /*
			    Crediting matrix completion commission into BRONZE STAGE to the upliners
			    */
			    ///start of Crediting matrix commission from here
				
			    if($lev1_num_info->pay_status=='Unpaid' && $lev2_num_info->pay_status=='Unpaid')
				{
				    
						
					
					
					$obj->db->update('matrix_downline',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'1'));
					$obj->db->update('matrix_downline',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'2'));
					$obj->db->update('user_registration',array('rank_name'=>'Captain','stage_name'=>'stage_1'),array('user_id'=>$upliner));
					//generate_reward($upliner,$platform,"feeder_stage");
					
				}
					/* end of credit matrix commission over here*/
			    //end of Crediting matrix commission for RECEPTION STAGE over here
			    if($lev1_num>=2 && $lev2_num>=4)
				{
    				$stage1_num=$obj->db->select('*')->from('reg_stage1')->get()->num_rows();
    				if($stage1_num==0)
    				{
    					$obj->db->insert('reg_stage1',array(
    						'user_id'=>$upliner,
    						'nom_id'=>'cmp',
    						'plan_type'=>$platform
    						));
    				}
    				else
    				{
    					$n1=$obj->db->select('*')->from('reg_stage1')->where('user_id',$upliner)->get()->num_rows();
    					if($n1==0)
    					{
    					move_stage1($upliner,$platform);
    					}
    				}
				}
			}//end matrix complete if here
			
	    }//end foreach
}//end check_upliners1() function
function move_stage1($upliner,$platform)
{
	$obj=& get_instance();
	$upliner_info=get_user_details($upliner);
	unset($_SESSION['nom_id1']);
	getFollowMeMatrixNom1($upliner,$upliner_info->ref_id);
	$nom=$_SESSION['nom_id1'];

	$is_left_exist=$obj->db->select('*')->from('reg_stage1')->where(array('nom_id'=>$nom_id,'nom_leg_position'=>'left'))->get()->num_rows();
	if($is_left_exist<=0)
	{
		$leg_posi='left';
	}
	else 
	{
		$leg_posi='right';
	}
	$nom_leg_position=$leg_posi;
	unset($_SESSION['nom_id1']);

	$sponser_info=get_user_details($upliner);
	$sponser_id=$sponser_info->ref_id;
	/////////////////////////////////////////////////
	if(!empty($nom))
	{
		$two=$obj->db->select('*')->from('reg_stage1')->where(array('status'=>'0','user_id'=>$nom))->limit('1','0')->get()->row_array();
		//$nom=$two['user_id'];
		//break point
		$obj->db->insert('reg_stage1',array(
			'user_id'=>$upliner,
			'nom_id'=>$nom,
			'nom_leg_position'=>$nom_leg_position,
			'plan_type'=>$platform
			));
		if($two['final_status']==0)
		{
		  $obj->db->update("reg_stage1",array("final_status"=>"1"),array("id"=>$two['id']));
		}
		else if($two['final_status']==1)
		{
		  $obj->db->update("reg_stage1",array("final_status"=>"2","status"=>"1"),array("id"=>$two['id']));
		}
		$date=date('Y-m-d');
		$l=1;
		while($nom!='cmp')
		{
		    //if($nom!='cmp')
		    //{
				//break point
				if($nom==$sponser_id)
				{
					  $obj->db->update('reg_stage1',array('direct_member_leg_position'=>$leg_posi),array('user_id'=>$upliner,'nom_id'=>$nom));
				}
				$obj->db->insert('matrix_stage1',array(
					'down_id'=>$upliner,
					'income_id'=>$nom,
					'l_date'=>$date,
					'status'=>'0',
					'level'=>$l,
					'nom_leg_position'=>$nom_leg_position,
					'pay_status'=>'Unpaid',
					'plan_type'=>$platform
					));
				$l++;
				
				$selectnompos=$obj->db->select(array('nom_id','nom_leg_position'))->from('reg_stage1')->where('user_id',$nom)->get()->row_array();
				
				$last_nom_id=$nom;
				if(count($selectnompos)<=0)
				{
					$nom='123456';
				}
				else 
				{
					$nom=$selectnompos['nom_id'];
				}
				$leg_posi_info=$obj->db->select('nom_leg_position')->from('matrix_stage1')->where(array('income_id'=>$nom,'down_id'=>$last_nom_id))->get()->row();
				$nom_leg_position=$leg_posi_info->nom_leg_position;
				
			//}//end if
		}//end while
		////////////
		matrix_commission_level($upliner,'matrix_stage1',$platform);
	}
	check_upliners2($upliner,$platform);
}//end move_stage1() function

function check_upliners2($new_id,$platform)
{
		$obj=& get_instance();
		//$qr=mysql_query("select * from matrix_downline where down_id='$new_id'");
		$info=$obj->db->select('*')->from('matrix_stage1')->where('down_id',$new_id)->get()->result_array();
		foreach($info as $row)
		{
			$upliner=$row['income_id'];

			$lev1_num=$obj->db->select('*')->from('matrix_stage1')->where(array('income_id'=>$upliner,'level'=>'1'))->get()->num_rows();
			$lev2_num=$obj->db->select('*')->from('matrix_stage1')->where(array('income_id'=>$upliner,'level'=>'2'))->get()->num_rows();
			
			
			$lev1_num_info=$obj->db->select('*')->from('matrix_stage1')->where(array('income_id'=>$upliner,'level'=>'1'))->limit('1','0')->get()->row();
			$lev2_num_info=$obj->db->select('*')->from('matrix_stage1')->where(array('income_id'=>$upliner,'level'=>'2'))->limit('1','0')->get()->row();

			if($lev1_num==2 && $lev2_num==4)
				{
					if($lev1_num_info->pay_status=='Unpaid' && $lev2_num_info->pay_status=='Unpaid')
					    {
					    //creditMatrixCommission($upliner,$new_id,"stage_1",$platform);
						/*Start of crediting matrix of Silver Stage commission*/

						$obj->db->update('matrix_stage1',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'1'));
						$obj->db->update('matrix_stage1',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'2'));
						$obj->db->update('user_registration',array('rank_name'=>'Ambassador'),array('user_id'=>$upliner));
						//generate_reward($upliner,$platform,"stage_1");
					}//end unpaid if here	
					
					$stage1_num=$obj->db->select('*')->from('reg_stage2')->get()->num_rows();
					if($stage1_num==0)
					{
						$obj->db->insert('reg_stage2',array(
							'user_id'=>$upliner,
							'nom_id'=>'cmp',
							'plan_type'=>$platform
							));
						
					}
					else
					{
						$n1=$obj->db->select('*')->from('reg_stage2')->where('user_id',$upliner)->get()->num_rows();
						if($n1==0)
						{
						    move_stage2($upliner,$platform);
						}
					}
				}
	    }//end foreach
}//end check_upliners2() function	    
function move_stage2($upliner,$platform)
{
	$obj=& get_instance();
	$upliner_info=get_user_details($upliner);
	unset($_SESSION['nom_id2']);
	getFollowMeMatrixNom2($upliner,$upliner_info->ref_id);
	$nom=$_SESSION['nom_id2'];
	$is_left_exist=$obj->db->select('*')->from('reg_stage2')->where(array('nom_id'=>$nom_id,'nom_leg_position'=>'left'))->get()->num_rows();
	if($is_left_exist<=0)
	{
		$leg_posi='left';
	}
	else 
	{
		$leg_posi='right';
	}
	$nom_leg_position=$leg_posi;
	unset($_SESSION['nom_id2']);
	//////////////////////////////////////////
	if(!empty($nom))
	{
		$two=$obj->db->select('*')->from('reg_stage2')->where(array('status'=>'0','user_id'=>$nom))->limit('1','0')->get()->row_array();
		//$nom=$two['user_id'];
		//break point
		$obj->db->insert('reg_stage2',array(
			'user_id'=>$upliner,
			'nom_id'=>$nom,
			'nom_leg_position'=>$nom_leg_position,
			'plan_type'=>$platform
			));
		if($two['final_status']==0)
		{
		  $obj->db->update("reg_stage2",array("final_status"=>"1"),array("id"=>$two['id']));
		}
		else if($two['final_status']==1)
		{
		  $obj->db->update("reg_stage2",array("final_status"=>"2","status"=>"1"),array("id"=>$two['id']));
		}
		$date=date('Y-m-d');
		$l=1;
		while($nom!='cmp')
		{
		    //if($nom!='cmp')
		    //{
				if($nom==$sponser_id)
				{
					  $obj->db->update('reg_stage2',array('direct_member_leg_position'=>$leg_posi),array('user_id'=>$upliner,'nom_id'=>$nom));
				}
				$obj->db->insert('matrix_stage2',array(
					'down_id'=>$upliner,
					'income_id'=>$nom,
					'l_date'=>$date,
					'status'=>'0',
					'level'=>$l,
					'nom_leg_position'=>$nom_leg_position,
					'pay_status'=>'Unpaid',
					'plan_type'=>$platform
					));
				$l++;
				$selectnompos=$obj->db->select(array('nom_id','nom_leg_position'))->from('reg_stage2')->where('user_id',$nom)->get()->row_array();
				
				$last_nom_id=$nom;
				if(count($selectnompos)<=0)
				{
					$nom='123456';
				}
				else 
				{
					$nom=$selectnompos['nom_id'];
				}
				$leg_posi_info=$obj->db->select('nom_leg_position')->from('matrix_stage2')->where(array('income_id'=>$nom,'down_id'=>$last_nom_id))->get()->row();
				$nom_leg_position=$leg_posi_info->nom_leg_position;
			//}//end if
		}//end while	
		matrix_commission_level($upliner,'matrix_stage2',$platform);
	}
	check_upliners3($upliner,$platform);
}//end move_stage2() function
function check_upliners3($new_id,$platform)
{
		$obj=& get_instance();
		//$qr=mysql_query("select * from matrix_downline where down_id='$new_id'");
		$info=$obj->db->select('*')->from('matrix_stage2')->where('down_id',$new_id)->get()->result_array();
		foreach($info as $row)
		{
			$upliner=$row['income_id'];
			
			$lev1_num=$obj->db->select('*')->from('matrix_stage2')->where(array('income_id'=>$upliner,'level'=>'1'))->get()->num_rows();
			$lev2_num=$obj->db->select('*')->from('matrix_stage2')->where(array('income_id'=>$upliner,'level'=>'2'))->get()->num_rows();
			/*Start of Crediting matrix commission for Gold stage*/
			
			$lev1_num_info=$obj->db->select('*')->from('matrix_stage2')->where(array('income_id'=>$upliner,'level'=>'1'))->limit('1','0')->get()->row();
			$lev2_num_info=$obj->db->select('*')->from('matrix_stage2')->where(array('income_id'=>$upliner,'level'=>'2'))->limit('1','0')->get()->row();
			

			if($lev1_num==2 && $lev2_num==4)
			{
				if($lev1_num_info->pay_status=='Unpaid' && $lev2_num_info->pay_status=='Unpaid')
				    {
				    //creditMatrixCommission($upliner,$new_id,"stage_1",$platform);
					/*Start of crediting matrix of Gold Stage commission*/
					
					$obj->db->update('matrix_stage2',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'1'));
					$obj->db->update('matrix_stage2',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'2'));
					
					$obj->db->update('user_registration',array('rank_name'=>'Baron &amp;Baroness'),array('user_id'=>$upliner));
					
					//generate_reward($upliner,$platform,"stage_2");
				}//end unpaid if here			
			     $stage1_num=$obj->db->select('*')->from('reg_stage3')->get()->num_rows();
					if($stage1_num==0)
					{
						$obj->db->insert('reg_stage3',array(
							'user_id'=>$upliner,
							'nom_id'=>'cmp',
							'plan_type'=>$platform
							));
						
					}
					else
					{
						$n1=$obj->db->select('*')->from('reg_stage3')->where('user_id',$upliner)->get()->num_rows();
						if($n1==0)
						{
						move_stage3($upliner,$platform);
						}
					}
			}
	    }//end foreach
}//end check_upliners3() function
function move_stage3($upliner,$platform)
{
	$obj=& get_instance();
	$upliner_info=get_user_details($upliner);
	unset($_SESSION['nom_id3']);
	getFollowMeMatrixNom3($upliner,$upliner_info->ref_id);
	$nom=$_SESSION['nom_id3'];
	$is_left_exist=$obj->db->select('*')->from('reg_stage3')->where(array('nom_id'=>$nom_id,'nom_leg_position'=>'left'))->get()->num_rows();
	if($is_left_exist<=0)
	{
		$leg_posi='left';
	}
	else 
	{
		$leg_posi='right';
	}
	$nom_leg_position=$leg_posi;
	unset($_SESSION['nom_id3']);
	$sponser_info=get_user_details($upliner);
	$sponser_id=$sponser_info->ref_id;
	//echo "move stage3\n";
	if(!empty($nom))
	{
		$two=$obj->db->select('*')->from('reg_stage3')->where(array('status'=>'0','user_id'=>$nom))->limit('1','0')->get()->row_array();
		//$nom=$two['user_id'];
		//break point
		$obj->db->insert('reg_stage3',array(
			'user_id'=>$upliner,
			'nom_id'=>$nom,
			'nom_leg_position'=>$nom_leg_position,
			'plan_type'=>$platform
			));
		if($two['final_status']==0)
		{
		  $obj->db->update("reg_stage3",array("final_status"=>"1"),array("id"=>$two['id']));
		}
		else if($two['final_status']==1)
		{
		  $obj->db->update("reg_stage3",array("final_status"=>"2","status"=>"1"),array("id"=>$two['id']));
		}
		$date=date('Y-m-d');
		$l=1;
		while($nom!='cmp')
		{
		    if($nom!='cmp')
		    {
				if($nom==$sponser_id)
				{
					  $obj->db->update('reg_stage3',array('direct_member_leg_position'=>$leg_posi),array('user_id'=>$upliner,'nom_id'=>$nom));
				}
				$obj->db->insert('matrix_stage3',array(
					'down_id'=>$upliner,
					'income_id'=>$nom,
					'l_date'=>$date,
					'status'=>'0',
					'level'=>$l,
					'nom_leg_position'=>$nom_leg_position,
					'pay_status'=>'Unpaid',
					'plan_type'=>$platform
					));
				$l++;
				$selectnompos=$obj->db->select(array('nom_id','nom_leg_position'))->from('reg_stage3')->where('user_id',$nom)->get()->row_array();
				
				$last_nom_id=$nom;
				if(count($selectnompos)<=0)
				{
					$nom='123456';
				}
				else 
				{
					$nom=$selectnompos['nom_id'];
				}
				$leg_posi_info=$obj->db->select('nom_leg_position')->from('matrix_stage3')->where(array('income_id'=>$nom,'down_id'=>$last_nom_id))->get()->row();
				$nom_leg_position=$leg_posi_info->nom_leg_position;
			}//end if
		}//end while	
		matrix_commission_level($upliner,'matrix_stage3',$platform);
	}
	check_upliners4($upliner,$platform);
}//end move_stage3() function

function check_upliners4($new_id,$platform)
{
		$obj=& get_instance();
		//$qr=mysql_query("select * from matrix_downline where down_id='$new_id'");
		$info=$obj->db->select('*')->from('matrix_stage3')->where('down_id',$new_id)->get()->result_array();
		foreach($info as $row)
		{
			$upliner=$row['income_id'];
			
			$lev1_num=$obj->db->select('*')->from('matrix_stage3')->where(array('income_id'=>$upliner,'level'=>'1'))->get()->num_rows();
			
			$lev2_num=$obj->db->select('*')->from('matrix_stage3')->where(array('income_id'=>$upliner,'level'=>'2'))->get()->num_rows();
			
			
			/*Start of Crediting matrix commission for Gold stage*/
			
			$lev1_num_info=$obj->db->select('*')->from('matrix_stage3')->where(array('income_id'=>$upliner,'level'=>'1'))->limit('1','0')->get()->row();
			
			$lev2_num_info=$obj->db->select('*')->from('matrix_stage3')->where(array('income_id'=>$upliner,'level'=>'2'))->limit('1','0')->get()->row();
			
			

			if($lev1_num==2 && $lev2_num==4)
			{
				if($lev1_num_info->pay_status=='Unpaid' && $lev2_num_info->pay_status=='Unpaid')
				    {
				    //creditMatrixCommission($upliner,$new_id,"stage_1",$platform);
					$obj->db->update('matrix_stage3',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'1'));
					    
					$obj->db->update('matrix_stage3',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'2'));
					
					$obj->db->update('user_registration',array('rank_name'=>'Noble'),array('user_id'=>$upliner));
					
					//generate_reward($upliner,$platform,"stage_3");
				}//end unpaid if here			
			     $stage1_num=$obj->db->select('*')->from('reg_stage4')->get()->num_rows();
					if($stage1_num==0)
					{
						$obj->db->insert('reg_stage4',array(
							'user_id'=>$upliner,
							'nom_id'=>'cmp',
							'plan_type'=>$platform
							));
						
					}
					else
					{
						$n1=$obj->db->select('*')->from('reg_stage4')->where('user_id',$upliner)->get()->num_rows();
						if($n1==0)
						{
						move_stage4($upliner,$platform);
						}
					}
			}
	    }//end foreach
}//end check_upliners3() function
function move_stage4($upliner,$platform)
{
	$obj=& get_instance();
	$upliner_info=get_user_details($upliner);
	unset($_SESSION['nom_id4']);
	getFollowMeMatrixNom4($upliner,$upliner_info->ref_id);
	$nom=$_SESSION['nom_id4'];
	$is_left_exist=$obj->db->select('*')->from('reg_stage4')->where(array('nom_id'=>$nom_id,'nom_leg_position'=>'left'))->get()->num_rows();
	if($is_left_exist<=0)
	{
		$leg_posi='left';
	}
	else 
	{
		$leg_posi='right';
	}
	$nom_leg_position=$leg_posi;
	unset($_SESSION['nom_id4']);
	$sponser_info=get_user_details($upliner);
	$sponser_id=$sponser_info->ref_id;
	////////////////////////////////////////////
	//echo "\nmove stage4\n";
	if(!empty($nom))
	{
		$two=$obj->db->select('*')->from('reg_stage4')->where(array('status'=>'0','user_id'=>$nom))->limit('1','0')->get()->row_array();
		$obj->db->insert('reg_stage4',array(
			'user_id'=>$upliner,
			'nom_id'=>$nom,
			'nom_leg_position'=>$nom_leg_position,
			'plan_type'=>$platform
			));
		if($two['final_status']==0)
		{
		  $obj->db->update("reg_stage4",array("final_status"=>"1"),array("id"=>$two['id']));
		}
		else if($two['final_status']==1)
		{
		  $obj->db->update("reg_stage4",array("final_status"=>"2","status"=>"1"),array("id"=>$two['id']));
		}
		$date=date('Y-m-d');
		$l=1;
		while($nom!='cmp')
		{
		    if($nom!='cmp')
		    {
				if($nom==$sponser_id)
				{
					  $obj->db->update('reg_stage4',array('direct_member_leg_position'=>$leg_posi),array('user_id'=>$upliner,'nom_id'=>$nom));
				}
				$obj->db->insert('matrix_stage4',array(
					'down_id'=>$upliner,
					'income_id'=>$nom,
					'l_date'=>$date,
					'status'=>'0',
					'level'=>$l,
					'nom_leg_position'=>$nom_leg_position,
					'pay_status'=>'Unpaid',
					'plan_type'=>$platform
					));
				$l++;
				$selectnompos=$obj->db->select(array('nom_id','nom_leg_position'))->from('reg_stage4')->where('user_id',$nom)->get()->row_array();
				$last_nom_id=$nom;
			if(count($selectnompos)<=0)
				{
					$nom='123456';
				}
				else 
				{
					$nom=$selectnompos['nom_id'];
				}
				$leg_posi_info=$obj->db->select('nom_leg_position')->from('matrix_stage4')->where(array('income_id'=>$nom,'down_id'=>$last_nom_id))->get()->row();
				$nom_leg_position=$leg_posi_info->nom_leg_position;
				
			}//end if
		}//end while
		///////////////////////////
	   matrix_commission_level($upliner,'matrix_stage4',$platform);
	    /////////////////////////
	}
	check_upliners5($upliner,$platform);
}//end move_stage4() function
function check_upliners5($new_id,$platform)
{
		$obj=& get_instance();
		//$qr=mysql_query("select * from matrix_downline where down_id='$new_id'");
		$info=$obj->db->select('*')->from('matrix_stage4')->where('down_id',$new_id)->get()->result_array();
		foreach($info as $row)
		{
			$upliner=$row['income_id'];
			
			$lev1_num=$obj->db->select('*')->from('matrix_stage4')->where(array('income_id'=>$upliner,'level'=>'1'))->get()->num_rows();
			
			$lev2_num=$obj->db->select('*')->from('matrix_stage4')->where(array('income_id'=>$upliner,'level'=>'2'))->get()->num_rows();

			
			
			/*Start of Crediting matrix commission for Gold stage*/
			
			$lev1_num_info=$obj->db->select('*')->from('matrix_stage4')->where(array('income_id'=>$upliner,'level'=>'1'))->limit('1','0')->get()->row();
			
			$lev2_num_info=$obj->db->select('*')->from('matrix_stage4')->where(array('income_id'=>$upliner,'level'=>'2'))->limit('1','0')->get()->row();

			

			if($lev1_num==2 && $lev2_num==4)
			{
				if($lev1_num_info->pay_status=='Unpaid' && $lev2_num_info->pay_status=='Unpaid')
				    {
				    //creditMatrixCommission($upliner,$new_id,"stage_1",$platform);
					/*Start of crediting matrix of Gold Stage commission*/
					
					$obj->db->update('matrix_stage4',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'1'));
					$obj->db->update('matrix_stage4',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'2'));
					$obj->db->update('user_registration',array('rank_name'=>'Royal'),array('user_id'=>$upliner));
					
					//generate_reward($upliner,$platform,"stage_4");
				}//end unpaid if here			
			     $stage1_num=$obj->db->select('*')->from('reg_stage5')->get()->num_rows();
					if($stage1_num==0)
					{
						$obj->db->insert('reg_stage5',array(
							'user_id'=>$upliner,
							'nom_id'=>'cmp',
							'plan_type'=>$platform
							));
					}
					else
					{
						$n1=$obj->db->select('*')->from('reg_stage5')->where('user_id',$upliner)->get()->num_rows();
						if($n1==0)
						{
						    move_stage5($upliner,$platform);
						}
					}
			}
	    }//end foreach
}//end check_upliners5() function
function move_stage5($upliner,$platform)
{
	$obj=& get_instance();
	$upliner_info=get_user_details($upliner);
	unset($_SESSION['nom_id5']);
	getFollowMeMatrixNom5($upliner,$upliner_info->ref_id);
	$nom=$_SESSION['nom_id5'];
	$is_left_exist=$obj->db->select('*')->from('reg_stage5')->where(array('nom_id'=>$nom_id,'nom_leg_position'=>'left'))->get()->num_rows();
	if($is_left_exist<=0)
	{
		$leg_posi='left';
	}
	else 
	{
		$leg_posi='right';
	}
	$nom_leg_position=$leg_posi;
	unset($_SESSION['nom_id5']);
	$sponser_info=get_user_details($upliner);
	$sponser_id=$sponser_info->ref_id;
	////////////////////////////////////////////
	//echo "\nmove stage4\n";
	if(!empty($nom))
	{
		$two=$obj->db->select('*')->from('reg_stage5')->where(array('status'=>'0','user_id'=>$nom))->limit('1','0')->get()->row_array();
		$obj->db->insert('reg_stage5',array(
			'user_id'=>$upliner,
			'nom_id'=>$nom,
			'nom_leg_position'=>$nom_leg_position,
			'plan_type'=>$platform
			));
		if($two['final_status']==0)
		{
		  $obj->db->update("reg_stage5",array("final_status"=>"1"),array("id"=>$two['id']));
		}
		else if($two['final_status']==1)
		{
		  $obj->db->update("reg_stage5",array("final_status"=>"2","status"=>"1"),array("id"=>$two['id']));
		}
		$date=date('Y-m-d');
		$l=1;
		while($nom!='cmp')
		{
		    if($nom!='cmp')
		    {
				if($nom==$sponser_id)
				{
					  $obj->db->update('reg_stage5',array('direct_member_leg_position'=>$leg_posi),array('user_id'=>$upliner,'nom_id'=>$nom));
				}
				$obj->db->insert('matrix_stage5',array(
					'down_id'=>$upliner,
					'income_id'=>$nom,
					'l_date'=>$date,
					'status'=>'0',
					'level'=>$l,
					'nom_leg_position'=>$nom_leg_position,
					'pay_status'=>'Unpaid',
					'plan_type'=>$platform
					));
				$l++;
				$selectnompos=$obj->db->select(array('nom_id','nom_leg_position'))->from('reg_stage5')->where('user_id',$nom)->get()->row_array();
				$last_nom_id=$nom;
			    if(count($selectnompos)<=0)
				{
					$nom='123456';
				}
				else 
				{
					$nom=$selectnompos['nom_id'];
				}
				$leg_posi_info=$obj->db->select('nom_leg_position')->from('matrix_stage5')->where(array('income_id'=>$nom,'down_id'=>$last_nom_id))->get()->row();
				$nom_leg_position=$leg_posi_info->nom_leg_position;
				
			}//end if
		}//end while
		///////////////////////////
		matrix_commission_level($upliner,'matrix_stage5',$platform);
	    /////////////////////////
	}
	check_upliners6($upliner,$platform);
}//end move_stage4() function

function check_upliners6($new_id,$platform)
{
		$obj=& get_instance();
		//$qr=mysql_query("select * from matrix_downline where down_id='$new_id'");
		$info=$obj->db->select('*')->from('matrix_stage5')->where('down_id',$new_id)->get()->result_array();
		foreach($info as $row)
		{
			$upliner=$row['income_id'];
			
			$lev1_num=$obj->db->select('*')->from('matrix_stage5')->where(array('income_id'=>$upliner,'level'=>'1'))->get()->num_rows();
			$lev2_num=$obj->db->select('*')->from('matrix_stage5')->where(array('income_id'=>$upliner,'level'=>'2'))->get()->num_rows();
			
			/*Start of Crediting matrix commission for Gold stage*/
			
			$lev1_num_info=$obj->db->select('*')->from('matrix_stage5')->where(array('income_id'=>$upliner,'level'=>'1'))->limit('1','0')->get()->row();
			$lev2_num_info=$obj->db->select('*')->from('matrix_stage5')->where(array('income_id'=>$upliner,'level'=>'2'))->limit('1','0')->get()->row();
			
			if($lev1_num==2 && $lev2_num==4)
			{
				if($lev1_num_info->pay_status=='Unpaid' && $lev2_num_info->pay_status=='Unpaid')
				    {
				    //creditMatrixCommission($upliner,$new_id,"stage_1",$platform);
					/*Start of crediting matrix of Gold Stage commission*/
					
					$obj->db->update('matrix_stage5',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'1'));
					$obj->db->update('matrix_stage5',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'2'));
					$obj->db->update('user_registration',array('rank_name'=>'Duke &amp;Duchess'),array('user_id'=>$upliner));
					//generate_reward($upliner,$platform,"stage_5");
				}//end unpaid if here	
				$stage1_num=$obj->db->select('*')->from('reg_stage6')->get()->num_rows();
					if($stage1_num==0)
					{
						$obj->db->insert('reg_stage6',array(
							'user_id'=>$upliner,
							'nom_id'=>'cmp',
							'plan_type'=>$platform
							));
					}
					else
					{
						$n1=$obj->db->select('*')->from('reg_stage6')->where('user_id',$upliner)->get()->num_rows();
						if($n1==0)
						{
						    move_stage6($upliner,$platform);
						}
					}
			}
	    }//end foreach
}//end check_upliners6() function

function move_stage6($upliner,$platform)
{
	$obj=& get_instance();
	$upliner_info=get_user_details($upliner);
	unset($_SESSION['nom_id6']);
	getFollowMeMatrixNom6($upliner,$upliner_info->ref_id);
	$nom=$_SESSION['nom_id6'];
	$is_left_exist=$obj->db->select('*')->from('reg_stage6')->where(array('nom_id'=>$nom_id,'nom_leg_position'=>'left'))->get()->num_rows();
	if($is_left_exist<=0)
	{
		$leg_posi='left';
	}
	else 
	{
		$leg_posi='right';
	}
	$nom_leg_position=$leg_posi;
	unset($_SESSION['nom_id6']);
	$sponser_info=get_user_details($upliner);
	$sponser_id=$sponser_info->ref_id;
	////////////////////////////////////////////
	//echo "\nmove stage4\n";
	if(!empty($nom))
	{
		$two=$obj->db->select('*')->from('reg_stage6')->where(array('status'=>'0','user_id'=>$nom))->limit('1','0')->get()->row_array();
		$obj->db->insert('reg_stage6',array(
			'user_id'=>$upliner,
			'nom_id'=>$nom,
			'nom_leg_position'=>$nom_leg_position,
			'plan_type'=>$platform
			));
		if($two['final_status']==0)
		{
		  $obj->db->update("reg_stage6",array("final_status"=>"1"),array("id"=>$two['id']));
		}
		else if($two['final_status']==1)
		{
		  $obj->db->update("reg_stage6",array("final_status"=>"2","status"=>"1"),array("id"=>$two['id']));
		}
		$date=date('Y-m-d');
		$l=1;
		while($nom!='cmp')
		{
		    if($nom!='cmp')
		    {
				if($nom==$sponser_id)
				{
					  $obj->db->update('reg_stage6',array('direct_member_leg_position'=>$leg_posi),array('user_id'=>$upliner,'nom_id'=>$nom));
				}
				$obj->db->insert('matrix_stage6',array(
					'down_id'=>$upliner,
					'income_id'=>$nom,
					'l_date'=>$date,
					'status'=>'0',
					'level'=>$l,
					'nom_leg_position'=>$nom_leg_position,
					'pay_status'=>'Unpaid',
					'plan_type'=>$platform
					));
				$l++;
				$selectnompos=$obj->db->select(array('nom_id','nom_leg_position'))->from('reg_stage5')->where('user_id',$nom)->get()->row_array();
				$last_nom_id=$nom;
			    if(count($selectnompos)<=0)
				{
					$nom='123456';
				}
				else 
				{
					$nom=$selectnompos['nom_id'];
				}
				$leg_posi_info=$obj->db->select('nom_leg_position')->from('matrix_stage6')->where(array('income_id'=>$nom,'down_id'=>$last_nom_id))->get()->row();
				$nom_leg_position=$leg_posi_info->nom_leg_position;
				
			}//end if
		}//end while
		///////////////////////////
		matrix_commission_level($upliner,'matrix_stage6',$platform);
	    /////////////////////////
	}
	check_upliners7($upliner,$platform);
}//end move_stage4() function


function check_upliners7($new_id,$platform)
{
		$obj=& get_instance();
		//$qr=mysql_query("select * from matrix_downline where down_id='$new_id'");
		$info=$obj->db->select('*')->from('matrix_stage6')->where('down_id',$new_id)->get()->result_array();
		foreach($info as $row)
		{
			$upliner=$row['income_id'];
			
			$lev1_num=$obj->db->select('*')->from('matrix_stage6')->where(array('income_id'=>$upliner,'level'=>'1'))->get()->num_rows();
			$lev2_num=$obj->db->select('*')->from('matrix_stage6')->where(array('income_id'=>$upliner,'level'=>'2'))->get()->num_rows();
			
			/*Start of Crediting matrix commission for Gold stage*/
			
			$lev1_num_info=$obj->db->select('*')->from('matrix_stage6')->where(array('income_id'=>$upliner,'level'=>'1'))->limit('1','0')->get()->row();
			$lev2_num_info=$obj->db->select('*')->from('matrix_stage6')->where(array('income_id'=>$upliner,'level'=>'2'))->limit('1','0')->get()->row();
			
			if($lev1_num==2 && $lev2_num==4)
			{
				if($lev1_num_info->pay_status=='Unpaid' && $lev2_num_info->pay_status=='Unpaid')
				    {
				    //creditMatrixCommission($upliner,$new_id,"stage_1",$platform);
					/*Start of crediting matrix of Gold Stage commission*/
				
					$obj->db->update('matrix_stage6',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'1'));
					$obj->db->update('matrix_stage6',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'2'));
					$obj->db->update('user_registration',array('rank_name'=>'King &amp;Queen'),array('user_id'=>$upliner));
					//generate_reward($upliner,$platform,"stage_5");
				}//end unpaid if here	
				$stage1_num=$obj->db->select('*')->from('reg_stage7')->get()->num_rows();
					if($stage1_num==0)
					{
						$obj->db->insert('reg_stage7',array(
							'user_id'=>$upliner,
							'nom_id'=>'cmp',
							'plan_type'=>$platform
							));
					}
					else
					{
						$n1=$obj->db->select('*')->from('reg_stage7')->where('user_id',$upliner)->get()->num_rows();
						if($n1==0)
						{
						    move_stage7($upliner,$platform);
						}
					}
			}
	    }//end foreach
}//end check_upliners6() function


function move_stage7($upliner,$platform)
{
	$obj=& get_instance();
	$upliner_info=get_user_details($upliner);
	unset($_SESSION['nom_id7']);
	getFollowMeMatrixNom7($upliner,$upliner_info->ref_id);
	$nom=$_SESSION['nom_id7'];
	$is_left_exist=$obj->db->select('*')->from('reg_stage7')->where(array('nom_id'=>$nom_id,'nom_leg_position'=>'left'))->get()->num_rows();
	if($is_left_exist<=0)
	{
		$leg_posi='left';
	}
	else 
	{
		$leg_posi='right';
	}
	$nom_leg_position=$leg_posi;
	unset($_SESSION['nom_id7']);
	$sponser_info=get_user_details($upliner);
	$sponser_id=$sponser_info->ref_id;
	////////////////////////////////////////////
	//echo "\nmove stage4\n";
	if(!empty($nom))
	{
		$two=$obj->db->select('*')->from('reg_stage7')->where(array('status'=>'0','user_id'=>$nom))->limit('1','0')->get()->row_array();
		$obj->db->insert('reg_stage7',array(
			'user_id'=>$upliner,
			'nom_id'=>$nom,
			'nom_leg_position'=>$nom_leg_position,
			'plan_type'=>$platform
			));
		if($two['final_status']==0)
		{
		  $obj->db->update("reg_stage7",array("final_status"=>"1"),array("id"=>$two['id']));
		}
		else if($two['final_status']==1)
		{
		  $obj->db->update("reg_stage7",array("final_status"=>"2","status"=>"1"),array("id"=>$two['id']));
		}
		$date=date('Y-m-d');
		$l=1;
		while($nom!='cmp')
		{
		    if($nom!='cmp')
		    {
				if($nom==$sponser_id)
				{
					  $obj->db->update('reg_stage7',array('direct_member_leg_position'=>$leg_posi),array('user_id'=>$upliner,'nom_id'=>$nom));
				}
				$obj->db->insert('matrix_stage7',array(
					'down_id'=>$upliner,
					'income_id'=>$nom,
					'l_date'=>$date,
					'status'=>'0',
					'level'=>$l,
					'nom_leg_position'=>$nom_leg_position,
					'pay_status'=>'Unpaid',
					'plan_type'=>$platform
					));
				$l++;
				$selectnompos=$obj->db->select(array('nom_id','nom_leg_position'))->from('reg_stage5')->where('user_id',$nom)->get()->row_array();
				$last_nom_id=$nom;
			    if(count($selectnompos)<=0)
				{
					$nom='123456';
				}
				else 
				{
					$nom=$selectnompos['nom_id'];
				}
				$leg_posi_info=$obj->db->select('nom_leg_position')->from('matrix_stage7')->where(array('income_id'=>$nom,'down_id'=>$last_nom_id))->get()->row();
				$nom_leg_position=$leg_posi_info->nom_leg_position;
				
			}//end if
		}//end while
		///////////////////////////
		matrix_commission_level($upliner,'matrix_stage7',$platform);
	    /////////////////////////
	}
	check_upliners8($upliner,$platform);
}//end move_stage4() function


function check_upliners8($new_id,$platform)
{
		$obj=& get_instance();
		//$qr=mysql_query("select * from matrix_downline where down_id='$new_id'");
		$info=$obj->db->select('*')->from('matrix_stage7')->where('down_id',$new_id)->get()->result_array();
		foreach($info as $row)
		{
			$upliner=$row['income_id'];
			
			$lev1_num=$obj->db->select('*')->from('matrix_stage7')->where(array('income_id'=>$upliner,'level'=>'1'))->get()->num_rows();
			$lev2_num=$obj->db->select('*')->from('matrix_stage7')->where(array('income_id'=>$upliner,'level'=>'2'))->get()->num_rows();
			
			/*Start of Crediting matrix commission for Gold stage*/
			
			$lev1_num_info=$obj->db->select('*')->from('matrix_stage7')->where(array('income_id'=>$upliner,'level'=>'1'))->limit('1','0')->get()->row();
			$lev2_num_info=$obj->db->select('*')->from('matrix_stage7')->where(array('income_id'=>$upliner,'level'=>'2'))->limit('1','0')->get()->row();
			
			if($lev1_num==2 && $lev2_num==4)
			{
				if($lev1_num_info->pay_status=='Unpaid' && $lev2_num_info->pay_status=='Unpaid' && $lev3_num_info->pay_status=='Unpaid')
				    {
				    //creditMatrixCommission($upliner,$new_id,"stage_1",$platform);
					/*Start of crediting matrix of Gold Stage commission*/
					
					$obj->db->update('matrix_stage7',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'1'));
					$obj->db->update('matrix_stage7',array('pay_status'=>'Paid'),array('income_id'=>$upliner,'level'=>'2'));
					
					//generate_reward($upliner,$platform,"stage_5");
				}//end unpaid if here	
				
			}
	    }//end foreach
}//end check_upliners6() function

function generate_reward($upliner,$platform,$stage_key)
{
	//echo "\ncome1";
	$obj=&get_instance();
	$commission_enable_info=$obj->db->select('status')->from('commission_permission')->where(array('comm_type_id'=>'5','pkg_id'=>$platform))->get()->row();
	if($stage_key=="feeder_stage")
	{ 
		$stage_name="stage_1";
	}
	else 
	{
		$stage_name=$stage_key;
	}
	if($commission_enable_info->status=='1')
		{
			
		//echo "\ncome2";	//$commission_type_info=$obj->db->select('*')->from('matrix_stage_commission')->where('pkg_id',$platform)->get()->row();
			$commission_info=$obj->db->select('*')->from('matrix_stage_rank_bonus_meta')->where(array('pkg_id'=>$platform,'stage_key'=>$stage_key))->get()->row();
			
			$commission_amount=$commission_info->commission;
			$query_obj=$obj->db->select('amount')->from('final_e_wallet')->where('user_id',$upliner)->get()->row();
			
			$balance=$query_obj->amount+$commission_amount;
			
			$obj->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$upliner));
			//echo "\ntran_nos=".$tran_no=generateUniqueTranNo();
			
			$obj->db->insert('credit_debit',array(
							'transaction_no'=>generateUniqueTranNo(),
							'user_id'=>$upliner,
							'credit_amt'=>$commission_amount,
							'debit_amt'=>'0',
							'balance'=>$balance,
							'admin_charge'=>'0',
							'receiver_id'=>$upliner,
							'sender_id'=>COMP_USER_ID,
							'receive_date'=>date('d-m-Y'),
							'tran_description'=>$stage_name.' Completion Bonus',
							'unique_identity'=>$stage_key,
							'status'=>'1',
							'reason'=>'10' //credit for rank bonus
							));
		}//end commission enable if here
}//end function
function sendWelcomeEmailToUser($user_id,$username,$password,$transaction_pwd,$email,$sponsor_user_name)
{

	$email_data['from']='info@xbulon.com';
	$email_data['to']=$email;
	$email_data['subject']='Registration Successful on Xbulon';
	$email_data['user_id']=$user_id;
	$email_data['username']=$username;
	$email_data['password']=$password;
	$email_data['transaction_pwd']=$transaction_pwd;
	$email_data['email']=$email;
	$email_data['sponsor_user_name']=$sponsor_user_name;
	$email_data['email-template']='welcome-email-to-user';
	_sendEmail($email_data);
}//end function 
function sendNewRegistrationEmailToAdmin($user_id,$username,$password,$sponsor_username,$upliner,$email)
{

    $email_data['from']='info@xbulon.com';
    $email_data['to']='info@xbulon.com';
    $email_data['subject']='New member registration on Xbulon';
    
    $email_data['template_header_msg']='New Member is Registered on your site <a target="_blank" href="'.site_url().'">'.site_url().'</a>';
    $email_data['user_id']=$user_id;
    $email_data['username']=$username;
    $email_data['password']=$password;
    $email_data['sponsor_username']=$sponsor_username;
    $email_data['upliner']=$upliner;
    $email_data['email']=$email;
    $email_data['email-template']='email-to-admin';
    _sendEmail($email_data);
}//end function
function sendNewContactUsEmailToUser($name,$email,$query)
{

    $email_data['from']='info@xbulon.com';
	$email_data['to']=$email;
	$email_data['subject']='Query Submitted Successfully';
	$email_data['name']=$name;
	$email_data['email']=$email;
	$email_data['query']=$query;
	$email_data['sponsor_user_name']=$sponsor_user_name;
	$email_data['email-template']='query-email-to-user';
	_sendEmail($email_data);
}//end function
/*
@author : Aditya
@param  : none
@desc   : It's used to register the user via ewallet user registration method
@return none
*/
if(!function_exists('testRegister'))
{
   function testRegister($usernamess=null)
   {
    $obj=& get_instance();
	//validRegistrationMethod();
    //$registerData=$obj->session->all_userdata();//open  and close comment
     /***********Mandatory filed for user registartion in binary plan start from here******************/
    ////user_registration query
    /*Sponsor and account informtaion*/
	$registration_info=$obj->session->userdata('registration_info');
	$sponser_id=(!empty($registration_info['sponsor_and_account_info']['ref_id']))?$registration_info['sponsor_and_account_info']['ref_id']:'123456';
	$ref_id123[]=$sponser_id;
	getNom($ref_id123);
	$nom_id=$_SESSION['nom_id'];
	echo "\n nom_id".$nom_id;
	if(empty($nom_id))
	{
		echo "\n nom_id".$nom_id;
	}
	$nom_id1=$nom_id;
	
	unset($_SESSION['nom_id']);
	$pkg_id=(!empty($registration_info['sponsor_and_account_info']['pkg_id']))?$registration_info['sponsor_and_account_info']['pkg_id']:1;
	$pkg_amount=(!empty($registration_info['sponsor_and_account_info']['pkg_amount']))?$registration_info['sponsor_and_account_info']['pkg_amount']:4500;
	
	//$username=(!empty($registration_info['sponsor_and_account_info']['username']))?$registration_info['sponsor_and_account_info']['username']:'D';
	
	$username=$usernamess;
	
	
	$user_password=(!empty($registration_info['sponsor_and_account_info']['password']))?$registration_info['sponsor_and_account_info']['password']:'123';
	$transaction_pwd=(!empty($registration_info['sponsor_and_account_info']['t_code']))?$registration_info['sponsor_and_account_info']['t_code']:'123';
    $user_id=generateUserId();
	//personal informtaion
	$first_name=(!empty($registration_info['personal_info']['first_name']))?$registration_info['personal_info']['first_name']:null;
	$last_name=(!empty($registration_info['personal_info']['last_name']))?$registration_info['personal_info']['last_name']:null;
	$email=(!empty($registration_info['sponsor_and_account_info']['email']))?$registration_info['sponsor_and_account_info']['email']:null;
	$contact_no=(!empty($registration_info['personal_info']['contact_no']))?$registration_info['personal_info']['contact_no']:null;
	$country=(!empty($registration_info['personal_info']['country']))?$registration_info['personal_info']['country']:null;
	
	$country_id=(!empty($registration_info['personal_info']['country_id']))?$registration_info['personal_info']['country_id']:null;
	
	$state=(!empty($registration_info['personal_info']['state']))?$registration_info['personal_info']['state']:null;
	
	$state_id=(!empty($registration_info['personal_info']['state_id']))?$registration_info['personal_info']['state_id']:null;
	
	$city=(!empty($registration_info['personal_info']['city']))?$registration_info['personal_info']['city']:null;
	$zip_code=(!empty($registration_info['personal_info']['zip_code']))?$registration_info['personal_info']['zip_code']:null;
	$address_line1=(!empty($registration_info['personal_info']['address_line1']))?$registration_info['personal_info']['address_line1']:null;
	$date_of_birth=(!empty($registration_info['personal_info']['date_of_birth']))?$registration_info['personal_info']['date_of_birth']:null;
	$gender=(!empty($registration_info['personal_info']['gender']))?$registration_info['personal_info']['gender']:null;
	//bank account info
	$account_holder_name=(!empty($registration_info['bank_account_info']['account_holder_name']))?$registration_info['bank_account_info']['account_holder_name']:null;
	$account_no=(!empty($registration_info['bank_account_info']['account_no']))?$registration_info['bank_account_info']['account_no']:null;
	$bank_name=(!empty($registration_info['bank_account_info']['bank_name']))?$registration_info['bank_account_info']['bank_name']:null;
	$branch_name=(!empty($registration_info['bank_account_info']['branch_name']))?$registration_info['bank_account_info']['branch_name']:null;
	$ifsc_code=(!empty($registration_info['bank_account_info']['ifsc_code']))?$registration_info['bank_account_info']['ifsc_code']:null;
	$bank_address=(!empty($registration_info['bank_account_info']['bank_address']))?$registration_info['bank_account_info']['bank_address']:null;
	/////
    $user_registration_data=array(
    		/*Sponsor and account informtaion*/
    		'user_id'=>$user_id,
    		'ref_id'=>$sponser_id,
    		'nom_id'=>$nom_id,
    		'username'=>$username,
    		'password'=>$user_password,
    		't_code'=>$transaction_pwd,
    		'pkg_id'=>$pkg_id,
    		'pkg_amount'=>$pkg_amount,
    		 /*Personal informtaion*/
    		 'first_name'=>$first_name,
    		 'last_name'=>$last_name,
    		 'email'=>$email,
    		 'contact_no'=>$contact_no,
    		 'country'=>$country,
			 'state'=>$state,
			 'city'=>$city,
    		 'zip_code'=>$zip_code,
    		 'address_line1'=>$address_line1,
    		 'address_line1'=>$date_of_birth,
    		 /*Bank Account information*/
    		 'account_no'=>$account_no,
    		 'branch_name'=>$branch_name,
    		 'bank_name'=>$bank_name,
    		 'ifsc_code'=>$ifsc_code,
    		 'account_holder_name'=>$account_holder_name,
    		 ////////
    		 'registration_date'=>date('d-m-Y'),
    		 'current_login_status'=>'0', 
    		 'active_status'=>'1',
    		 'registration_method'=>'1',
			 'registration_method_name'=>'E-wallet'
    		);
    $obj->db->insert('user_registration',$user_registration_data);
    
	/*
     @pkg sold amount credited to company as profit
	*/
	$obj->db->insert('package_sold_amount',array(
	'user_id'=>$user_id,
	'pkg_id'=>$pkg_id,
	'pkg_amount'=>$pkg_amount
	));
    /////Inserting Data into user_package_log table///////////
    $obj->db->insert('user_package_log',array(
    	'user_id'=>$user_id,
    	'new_package_id'=>$pkg_id,
    	'active_status'=>'1',
    	'purchased_date'=>date('Y-m-d H:i:s')
    	));
     /***********Mandatory filed for user registartion in matrix plan end over here******************/
    $l=1;
	while($nom_id!='cmp')
	{
        if($nom_id!='cmp')
        {
        	$matrix_downline_data[]=array(
        		'down_id'=>$user_id,
        		'income_id'=>$nom_id,
        		'l_date'=>date('Y-m-d H:i:s'),
        		'status'=>'0',
        		'level'=>$l,
        		'pay_status'=>'Unpaid',
        		'plan_type'=>$pkg_id
        		);
			$l++;
             $nom_info=$obj->db->select('nom_id')->from('user_registration')->where('user_id',$nom_id)->get()->row();
             $nom_id=$nom_info->nom_id;
			}
	}	
	$obj->db->insert_batch('matrix_downline',$matrix_downline_data);
	///////////////////////////
	////Start of crediting direct commission
		
	///////////////////////////
	/*
	$stage_unilevel_commission=$obj->db->select('status')->from('commission_permission')->where(array(
	'comm_type_id'=>'6',
	'pkg_id'=>$pkg_id
	))->get()->row();
	if(!empty($stage_unilevel_commission->status) && $stage_unilevel_commission->status=='1')
	{
		creditFeederStageLevelCommission($user_id,$pkg_id);
	}
	*/
	////////////
	//check_upliners1($user_id,$pkg_id);
	/*************/

	
	$sponsor_username=get_user_name($sponser_id);
	sendWelcomeEmailToUser($user_id,$username,$user_password,$transaction_pwd,$email,$sponsor_username);
	$upliner_name=get_user_name($nom_id1);
	sendNewRegistrationEmailToAdmin($user_id,$username,$user_password,$sponsor_username,$upliner_name,$email);
	return true;
   }//end function
}//end function exists0
?>
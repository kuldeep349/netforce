<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @package admin/commission_report_model
*/
class Commission_Report_Model extends Common_Model
{
	public function __construct()
	{
		//@call to parent CI_Model constructor
		parent::__construct();
	}
  public function getRankAchieverReport($user_id=null)
  {
  	//SELECT * FROM rank_log where id in (SELECT max(id) FROM rank_log GROUP BY user_id ) order by id desc
  	//SELECT * FROM rank_log where id in (SELECT max(id) FROM rank_log where user_id='123456' GROUP BY user_id )
  	if(!empty($user_id))
  	{
  		$sql="SELECT * FROM rank_log where id in (SELECT max(id) FROM rank_log where user_id='$user_id' GROUP BY user_id )";
  	}
  	else 
  	{
  		$sql="select rl.id, rl.user_id, u.username,u.active_status,rl.rank_id, rl.rank_name, cr.credit_amt, rl.transaction_no, rl.updated_date 
			from (SELECT * FROM rank_log where id in (SELECT max(id) FROM rank_log GROUP BY user_id)) as rl 
			join user_registration as u on rl.user_id=u.user_id
			left join credit_debit as cr on cr.transaction_no=rl.transaction_no;";

  	}
  	$query=$this->db->query($sql);
  	//pr($query->result());
    return $query->result();
  }
  public function getTopEarnerReport($user_id=null)
  {
  	//note reason =6 is taken for binary commission
    if(!empty($user_id))
    {
    	$sql="SELECT cd.transaction_no, cd.user_id, u.username, u.active_status, sum(cd.credit_amt) as total_commission, cd.create_date FROM `credit_debit` as cd 
				join user_registration as u on u.user_id=cd.user_id 
				WHERE cd.reason='6' and cd.user_id='$user_id'  group by create_date,cd.user_id";
    }
    else 
    {
      	$sql="SELECT cd.transaction_no, cd.user_id, u.username, u.active_status, sum(cd.credit_amt) as total_commission, cd.create_date FROM `credit_debit` as cd 
  				join user_registration as u on u.user_id=cd.user_id 
  				WHERE cd.reason='6'  group by create_date,cd.user_id";
  				//echo $sql;
    }
    	$query=$this->db->query($sql);
    	$data=$query->result_array();
    	//pr($data);
    	for($i=0;$i<count($data);$i++)
    	{
    		$j=$i-1;
    		$ref_id=$data[$i]['user_id'];
    		if($i==0)
    		{
  	  		$date=$data[$i]['create_date'];
  	  		$result=$this->db->query("select * from user_registration where ref_id='$ref_id' and auto_registration_date<='$date'")->result();
  	  		$total_direct_member=count($result);
    		}
    		else 
    		{
    			$start_date=$data[$j]['create_date'];
    			$end_date=$data[$i]['create_date'];

  	  		$result=$this->db->query("select * from user_registration where ref_id='$ref_id' and auto_registration_date>='$start_date' and auto_registration_date<='$end_date'")->result();
  	  		$total_direct_member=count($result);
    		}
    		$data[$i]['total_direct_member']=$total_direct_member;
    	}
    	//pr($data);

    	for($i=0;$i<count($data);$i++)
    	{
    		$j=$i-1;
    		$income_id=$data[$i]['user_id'];
    		if($i==0)
    		{
  	  		$date=$data[$i]['create_date'];
  	  		$result=$this->db->query("select * from matrix_downline where income_id='$income_id' and l_date<='$date'")->result();
  	  		$total_team_member=count($result);
    		}
    		else 
    		{
    			$start_date=$data[$j]['create_date'];
    			$end_date=$data[$i]['create_date'];
  	  		$result=$this->db->query("select * from matrix_downline where income_id='$income_id' and l_date>='$start_date' and l_date<='$end_date'")->result();
  	  		$total_team_member=count($result);
    		}
    		$data[$i]['total_team_member']=$total_team_member;
    	}
      
      for($i=0;$i<count($data);$i++)
      {
      	for($j=0;$j<count($data);$j++)
      	{
      		if(!empty($data[$i]['create_date']) && !empty($data[$j]['create_date']) && $data[$i]['create_date']==$data[$j]['create_date'])
      		{
      			if($data[$i]['total_commission']>$data[$j]['total_commission'])
      			{
      				unset($data[$j]);
      			}
      			else if($data[$i]['total_commission']<$data[$j]['total_commission'])
      			{
      				unset($data[$i]);
      			}

      		}
      	}
      }//end for loop here
      //pr($data);
     return $data;
  }//end method
  public function getTopRecuriterReport()
  {
      //note reason =6 is taken for binary commission
      if(!empty($user_id))
      {
        $sql="SELECT cd.transaction_no, cd.user_id, u.username, u.active_status, sum(cd.credit_amt) as total_commission, cd.create_date FROM `credit_debit` as cd 
          join user_registration as u on u.user_id=cd.user_id 
          WHERE cd.reason='6' and cd.user_id='$user_id'  group by create_date,cd.user_id";
      }
      else 
      {
        $sql="SELECT cd.transaction_no, cd.user_id, u.username, u.active_status, sum(cd.credit_amt) as total_commission, cd.create_date FROM `credit_debit` as cd 
          join user_registration as u on u.user_id=cd.user_id 
          WHERE cd.reason='6'  group by create_date,cd.user_id";
          //echo $sql;
      }
      $query=$this->db->query($sql);
      $data=$query->result_array();
      //pr($data);
      for($i=0;$i<count($data);$i++)
      {
        $j=$i-1;
        $ref_id=$data[$i]['user_id'];
        if($i==0)
        {
          $date=$data[$i]['create_date'];
          $result=$this->db->query("select * from user_registration where ref_id='$ref_id' and auto_registration_date<='$date'")->result();
          $total_direct_member=count($result);
        }
        else 
        {
          $start_date=$data[$j]['create_date'];
          $end_date=$data[$i]['create_date'];

          $result=$this->db->query("select * from user_registration where ref_id='$ref_id' and auto_registration_date>='$start_date' and auto_registration_date<='$end_date'")->result();
          $total_direct_member=count($result);
        }
        $data[$i]['total_direct_member']=$total_direct_member;
      }
      //pr($data);

      for($i=0;$i<count($data);$i++)
      {
        $j=$i-1;
        $income_id=$data[$i]['user_id'];
        if($i==0)
        {
          $date=$data[$i]['create_date'];
          $result=$this->db->query("select * from matrix_downline where income_id='$income_id' and l_date<='$date'")->result();
          $total_team_member=count($result);
        }
        else 
        {
          $start_date=$data[$j]['create_date'];
          $end_date=$data[$i]['create_date'];
          $result=$this->db->query("select * from matrix_downline where income_id='$income_id' and l_date>='$start_date' and l_date<='$end_date'")->result();
          $total_team_member=count($result);
        }
        $data[$i]['total_team_member']=$total_team_member;
      }
      for($i=0;$i<count($data);$i++)
      {
        for($j=0;$j<count($data);$j++)
        {
          if(!empty($data[$i]['create_date']) && !empty($data[$j]['create_date']) && $data[$i]['create_date']==$data[$j]['create_date'])
          {
            if($data[$i]['total_team_member']+$data[$i]['total_direct_member']>$data[$j]['total_team_member']+$data[$j]['total_direct_member'])
            {
              unset($data[$j]);
            }
            else if($data[$i]['total_team_member']+$data[$i]['total_direct_member']<$data[$j]['total_team_member']+$data[$j]['total_direct_member'])
            {
              unset($data[$i]);
            }
          }
        }
      }//end for loop here
      //pr($data);
      //die;
     return $data;  	
  }//end method
  public function getDirectCommissionList()
  {
	  return $this->db->select('*')->from('credit_debit')->where(array('reason'=>'5'))->get()->result();
  }  

  public function getMatrixLevelCompleteCommissionList()
  {
	  return $this->db->select('*')->from('credit_debit')->where(array('reason'=>'28'))->get()->result();
  }  
  
  public function getMatrixCommissionList()
  {
	  return $this->db->select('*')->from('credit_debit')->where(array('reason'=>'6'))->get()->result();
  }  

  public function getMatrixRankBonusList()
  {
	  return $this->db->select('*')->from('credit_debit')->where(array('reason'=>'10'))->get()->result();
  }  
}//end class
?>
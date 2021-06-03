<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @package admin/dashboard_model
*/
class Dashboard_Model extends Common_Model
{
    public function __construct()
    {
        //@call to parent CI_Model constructor
        parent::__construct();
    }
    /*
    @Desc:It's used to get registered member by date wise, so that total number of registered member can be identified of any day
    */
    public function getRegisteredMemberByDate($date=null)
    {
      $query="SELECT `id`,`registration_date` FROM (`user_registration`)
      WHERE `active_status` = '1'
      AND STR_TO_DATE(`registration_date`, '%d-%m-%Y') = STR_TO_DATE('".$date."','%d-%m-%Y')";
      
      $result=$this->db->query($query);
      $result=$result->result();
      return count($result);
    }
    public function totalMembers()
    {
      $query="SELECT ifnull(count(id),0) as total_members FROM (`user_registration`)";
      
      $result=$this->db->query($query);
      $result=$result->row();
      return $result->total_members;
    }
    public function getPackageMembers()
    {
      $package_members=$this->db->select('u.pkg_id,p.title,count(u.id) as members')->from('user_registration u')->join('package p','u.pkg_id = p.id')->group_by('u.pkg_id')->get()->result();
      return $package_members;
    }
    /*
    @Desc:
    */
    public function getCurrentWeekRegisteredMember()
    {
      $current_date=date('d-m-Y');//current date
      $start_date=date('d-m-Y', strtotime('-7 days', strtotime($current_date)));
      
      $query="SELECT `id`,`registration_date` FROM (`user_registration`)
      WHERE `active_status` = '1'
      AND STR_TO_DATE(`registration_date`, '%d-%m-%Y') >= STR_TO_DATE('".$start_date."','%d-%m-%Y')
      AND STR_TO_DATE(`registration_date`, '%d-%m-%Y') <= STR_TO_DATE('".$current_date."','%d-%m-%Y')";
      
      $result=$this->db->query($query);
      $result=$result->result();
      return count($result);
    }
    /*
    @Desc:
    */

    public function getMarquee(){
      $this->db->select('*');
      $query = $this->db->get('tbl_marquee');
      return $query->result_array();
    }

    public function getCurrentMonthRegisteredMember()
    {
      $query="SELECT `id`,`registration_date`
        FROM user_registration
        WHERE MONTH(STR_TO_DATE(`registration_date`, '%d-%m-%Y')) = MONTH(CURRENT_DATE())
        AND YEAR(STR_TO_DATE(`registration_date`, '%d-%m-%Y')) = YEAR(CURRENT_DATE())";
      
      $result=$this->db->query($query);
      $result=$result->result();
      return count($result);
    }
    /*
    @Desc:
    */
    public function getTotalNumberOfPayoutRequest()
    {
      $result=$this->db->select('id')->from('withdrawl_wallet_amount_request')->get()->result();
      return count($result);
    }
    /*
    @Desc:
    */
    public function getTotalPayoutRequestCompletionRate()
    {
      $total_request=$this->db->select('id')->from('withdrawl_wallet_amount_request')->get()->result();
      $completed_request=$this->db->select('id')->from('withdrawl_wallet_amount_request')->where('status','1')->get()->result();
      $total_completed_request=count($completed_request);
      if(count($total_request)==0)
      {
        $result=100;
      }
      else 
      {
        $result=number_format(($total_completed_request*100)/count($total_request),2);
      }
      return $result;
    }
    /*
    @Desc:
    */
    public function getTotalPayoutRequestPendingRate()
    {
      $total_request=$this->db->select('id')->from('withdrawl_wallet_amount_request')->get()->result();
      $pending_request=$this->db->select('id')->from('withdrawl_wallet_amount_request')->where('status','0')->get()->result();
      $total_pending_request=count($pending_request);
      if(count($total_request)==0)
      {
        $result=0;
      }
      else 
      {
        $result=number_format(($total_pending_request*100)/count($total_request),2);
      }
      return $result;
    }

    /*
    @Desc:
    */
    public function getTotalPayoutRequestAmount()
    {

      $request=$this->db->select_sum('amount')->from('withdrawl_wallet_amount_request')->get()->row();
      return number_format($request->amount,2);
    }
    /*
    @Desc:
    */
    public function getTotalCompletedPayoutRequestAmount()
    {

      $request=$this->db->select_sum('amount')->from('withdrawl_wallet_amount_request')->where('status','1')->get()->row();
      return number_format($request->amount,2);
    }
    /*
    @Desc:
    */
    public function getTotalNumberOfCompletedPayoutRequest()
    {
      $completed_request=$this->db->select('id')->from('withdrawl_wallet_amount_request')->where('status','1')->get()->result();
      $total_completed_request=count($completed_request);
      return $total_completed_request; 
    }
    /*
    @Desc:
    */
    public function getTotalPendingPayoutRequestAmount()
    {
      $request=$this->db->select_sum('amount')->from('withdrawl_wallet_amount_request')->where('status','0')->get()->row();
      return number_format($request->amount,2);
    }
    /*
    @Desc:
    */
    public function getTotalNumberOfPendingPayoutRequest()
    {
      $pending_request=$this->db->select('id')->from('withdrawl_wallet_amount_request')->where('status','0')->get()->result();
      $total_pending_request=count($pending_request);
      return $total_pending_request; 
    }
    /*
    @Desc:
    */
    public function getTotalOpenTicket()
    {
      $open_ticket_info=$this->db->select('id')->from('support')->where('status','0')->get()->result();
      $total_open_ticket=count($open_ticket_info);
      return $total_open_ticket;
    }
    /*
    @Desc:
    */
    public function getTotalClosedTicket()
    {
      $closed_ticket_info=$this->db->select('id')->from('support')->where('status','1')->get()->result();
      $total_closed_ticket=count($closed_ticket_info);
      //die;
      return $total_closed_ticket;
    }
	/*
  @Desc:
  */
  ///////@for company/////
  public function getTotalPackageSoldAmount()    
  {
	$query=$this->db->select_sum('pkg_amount')->from('package_sold_amount')->get()->row();
	$amount=(!empty($query->pkg_amount))?$query->pkg_amount:0;
	return $amount;
  }
  public function getUserTotalDirectCommission($user_id)
  {
    $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id'=>$user_id,'reason'=>'5'))->get()->row();
    $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:0;
    return $credit_amount;
  }
  public function getUserTotalLevelCommission($user_id)
  {
    $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id'=>$user_id,'reason'=>'9'))->get()->row();
    $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:0;
    return $credit_amount;
  }
  public function getUserTotalMatrixLevelCompleteCommission($user_id)
  {
    $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id'=>$user_id,'reason'=>'28'))->get()->row();
    $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:0;
    return $credit_amount;
  }
  public function getUserTotalMatrixCommission($user_id)
  {
    $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id'=>$user_id,'reason'=>'6'))->get()->row();
    $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:0;
    return $credit_amount;
  }
  
  public function getUserTotalMatrixCompleteRankBonus($user_id)
  {
    $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id'=>$user_id,'reason'=>'10'))->get()->row();
    $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:0;
    return $credit_amount;
  }
  ///////@for member/////
  public function getAllUserTotalDirectCommission()
  {
    $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id !='=>COMP_USER_ID,'user_id !='=>COMP_USER_ID1))->where_in('reason',array('5'))->get()->row();
    $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:0;
    return $credit_amount;  
  }
  public function getAllUserTotalLevelCommission()
  {
    $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id !='=>COMP_USER_ID,'user_id !='=>COMP_USER_ID1))->where_in('reason',array('9'))->get()->row();
    $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:0;
    return $credit_amount;  
  }
  public function getAllUserTotalMatrixLevelCompleteCommission()
  {
    $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id !='=>COMP_USER_ID,'user_id !='=>COMP_USER_ID1))->where_in('reason',array('28'))->get()->row();
    $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:0;
    return $credit_amount;  
  }
  public function getAllUserTotalMatrixCommission()
  {
    $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id !='=>COMP_USER_ID,'user_id !='=>COMP_USER_ID1))->where_in('reason',array('6'))->get()->row();
    $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:0;
    return $credit_amount;  
  }
 
  public function getAllUserTotalMatrixCompleteRankBonus()
  {
    $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id !='=>COMP_USER_ID,'user_id !='=>COMP_USER_ID1))->where_in('reason',array('10'))->get()->row();
    $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:0;
    return $credit_amount;  
  }
  
}//end class
?>
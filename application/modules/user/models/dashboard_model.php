<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @package user/dashboard_model
*/
class Dashboard_Model extends Common_Model
{
   public function __construct()
   {
        //@call to parent CI_Model constructor
        parent::__construct();
		$this->load->model("unilevel_tree_model");
   }
   /*
   @Desc:It's used to return the rank name on the basis of user_id
   */
   public function getRank($user_id)
   {
	  $rank_info=$this->db->select('u.rank_name')->from('user_registration as u')->where('u.user_id',$user_id)->get()->row();
      $rank=(!empty($rank_info->rank_name))?$rank_info->rank_name:Null;
	  return $rank;

   }
   /*
   @Desc:It's used to return the payout in process on the basis of user_id
   */
   public function getPayOutInProcess($user_id)
   {
   	return $this->db->select('w.id')->from('withdrawl_wallet_amount_request as w')->where(array('user_id'=>$user_id,'status'=>'0'))->get()->num_rows();
   }
   /*
   @Desc:It's used to return the success payout on the basis of user_id
   */
   public function getPayOutSuccess($user_id)
   {
   	return $this->db->select('w.id')->from('withdrawl_wallet_amount_request as w')->where(array('user_id'=>$user_id,'status'=>'1'))->get()->num_rows();
   }
   /*
   @Desc:It's used to return the success payout on the basis of user_id
   */
   public function getPayOut($user_id)
   {
   	return $this->db->select('w.id')->from('withdrawl_wallet_amount_request as w')->where(array('user_id'=>$user_id))->get()->num_rows();
   }
   /*
   @Desc:It's used to return the success payout on the basis of user_id
   */
   public function getPayOutAmount($user_id,$status)
   {
   	    $credit_amount_info= $this->db->select_sum('w.amount')->from('withdrawl_wallet_amount_request as w')->where(array('user_id'=>$user_id,'status'=>$status))->get()->row();
   	    $credit_amount=(!empty($credit_amount_info->amount))?$credit_amount_info->amount:'0';
        return $credit_amount;
   }
   /*
   @Desc:It's used to return the success payout on the basis of user_id
   */
   public function getEwalletBalance($user_id)
   {
   	    $credit_amount_info= $this->db->select('amount')->from('final_e_wallet')->where(array('user_id'=>$user_id))->get()->row();
   	    $credit_amount=(!empty($credit_amount_info->amount))?$credit_amount_info->amount:'0';
        return $credit_amount;
   }
   
   /*
   @Desc:It's used to return the user details on the basis of user_id
   */
   public function getUserDetails($user_id)
   {
   	$user_details=$this->unilevel_tree_model->getUserDetails($user_id);
   	return $user_details;
   }
   /*
   @Desc:It's used to return the sponsor details on the basis of user_id
   */
   public function getSponsorDetails($user_id)
   {
     $sponsor_details=$this->unilevel_tree_model->getSponsorDetails($user_id);
     return $sponsor_details;

   }
   /*
   @Desc: It's used to get all the enabled commission type as per user reggistered / upgraded package
   */
   
   public function getUserTotalDirectCommission($user_id)
   {
     $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit_referral')->where(array('user_id'=>$user_id,'reason'=>'5'))->get()->row();
     
     $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:'0';
     return $credit_amount;
     
   }
	public function getUserTotalMatrixLevelCompletionCommission($user_id)
	{
	   $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id'=>$user_id,'reason'=>'9'))->get()->row();
		$credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:'0';
		return $credit_amount;
	}
	public function getUserTotalMatrixCommission($user_id)
	{
		 $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id'=>$user_id,'reason'=>'6'))->get()->row();
		 
		 $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:'0';
		 return $credit_amount;
	}
	
	public function getUserTotalStageCompleteRankBonus($user_id)
	{
	   $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id'=>$user_id,'reason'=>'10'))->get()->row();
		$credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:'0';
		return $credit_amount;
	}
	public function getMarquee(){
      $this->db->select('*');
      $query = $this->db->get('tbl_marquee');
      return $result = $query->result_array();
   }
}//end class
?>
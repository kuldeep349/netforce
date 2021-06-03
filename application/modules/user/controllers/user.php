<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package user/user
*/
class User extends Common_Controller 
{
	private $user_id;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		user_auth();
		$this->user_id=$this->session->userdata('user_id');
		$this->load->helper("layout_helper");
		$this->load->model('dashboard_model');
		$this->load->model('ewallet_model');
		$this->load->model('TeamReport_model','team_report');
		$this->load->model('IncomeReport_Model','income_report');

	} 
	/*
	@Desc:It's used to render the userbackoffice dashboard page
	*/
	public function index()
	{
		/*************************/
		$user_details=$this->dashboard_model->getUserDetails($this->user_id);
		/**************************/
		$data['total_direct_member']=(!empty($this->team_report->getTotalDirectMember($this->user_id)))?$this->team_report->getTotalDirectMember($this->user_id):0;

		//$data['total_team_member']=(!empty($this->team_report->getTotalTeamMember($this->user_id)))?$this->team_report->getTotalTeamMember($this->user_id):0;
        
        //$data['total_team_pv']=(!empty($this->team_report->getTotalOnlyTeamPv($this->user_id)))?$this->team_report->getTotalOnlyTeamPv($this->user_id):0;
        
        //$data['total_self_pv']=(!empty($this->team_report->getTotalSelfPv($this->user_id)))?$this->team_report->getTotalSelfPv($this->user_id):0;

		$data['rank_name']=(!empty($this->dashboard_model->getRank($this->user_id)))?$this->dashboard_model->getRank($this->user_id):Null;

		//$data['ewallet_balance']=$this->ewallet_model->getEwalletBalance($this->user_id);

		$data['payout_in_process']=(!empty($this->dashboard_model->getPayOutInProcess($this->user_id)))?$this->dashboard_model->getPayOutInProcess($this->user_id):0;

		$data['payout_success']=(!empty($this->dashboard_model->getPayOutSuccess($this->user_id)))?$this->dashboard_model->getPayOutSuccess($this->user_id):0;
		$data['payout_total']=$data['payout_in_process']+$data['payout_success'];
		$data['payout_amount_pending']=$this->dashboard_model->getPayOutAmount($this->user_id,'0');
		$data['payout_amount_success']=$this->dashboard_model->getPayOutAmount($this->user_id,'1');
		$data['payout_amount_total']=$data['payout_amount_pending']+$data['payout_amount_success'];
		$data['ewallet_balance']=(!empty($this->dashboard_model->getEwalletBalance($this->user_id)))?$this->dashboard_model->getEwalletBalance($this->user_id):0;
		////////////////////////
		
		
		
		$my_total_stage_level_complete_commission=$this->dashboard_model->getUserTotalMatrixLevelCompletionCommission($this->user_id);
		$data['my_total_stage_level_complete_commission']=$my_total_stage_level_complete_commission;
		$my_total_direct_comm =$this->dashboard_model->getUserTotalDirectCommission($this->user_id);
		$data['my_total_direct_comm']=$my_total_direct_comm;
		/*
		
		$my_total_stage_complete_bonus=$this->dashboard_model->getUserTotalMatrixCommission($this->user_id);
        $data['my_total_stage_complete_bonus']=$my_total_stage_complete_bonus;
		
		$my_total_stage_complete_incentive=$this->dashboard_model->getUserTotalStageCompleteRankBonus($this->user_id);
        $data['my_total_stage_complete_incentive']=$my_total_stage_complete_incentive;*/
		//$data['gross_commission']=$my_total_stage_level_complete_commission;
		
		//////////////////////////
		$data['user_details']=$user_details;
		$pkg_id=$data['pkg_id']=$user_details->pkg_id;
		if($pkg_id==0){$wel_amount=0;}
		if($pkg_id==1){$wel_amount=6;}
		if($pkg_id==2){$wel_amount=12;}
		if($pkg_id==3){$wel_amount=18;}
		if($pkg_id==4){$wel_amount=24;}
     $data['wel_amount']=$wel_amount;
		$data['sponsor_details']=$this->dashboard_model->getSponsorDetails($this->user_id);
		$data['marquee'] = $this->dashboard_model->getMarquee();
        $data['referral_link']=base_url()."join-us/".$user_details->username;
		_userLayout("dashboard",$data);
	}
}//end class

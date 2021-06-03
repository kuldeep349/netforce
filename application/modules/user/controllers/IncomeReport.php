<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package user/IncomeReport
*/
class IncomeReport extends Common_Controller 
{
	private $userId;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		user_auth();
		$this->load->helper("layout_helper");
		$this->userId=$this->session->userdata('user_id');
		$this->load->model('IncomeReport_Model','income_report');
		$this->load->model('TeamReport_model','team_report');
		$this->load->model('dashboard_model','dashboard');
	} 
	/*
	@Desc: It's used to view the direct referral commission list
	*/
	public function directReferralCommissionList()
	{
	    $data['title']="Direct Referral Commission List";
	    $data['breadcrumb']='<li class="active">Direct Referral Commission List</li>';
	    $data['direct_referral_income']=$this->income_report->getDirectReferralCommission($this->userId);
	    $data['total_direct_referral_income']=$this->income_report->getTotalDirectCommission($this->userId);
	    $data['total_direct_member']=$this->team_report->getTotalDirectMember($this->userId);
		_userLayout("income-report-mgmt/direct-referral-comission-list",$data);
	}
	
	/*
	@Desc: It's used to view the direct referral commission list
	*/
	public function fastStartCommissionList()
	{
	    $data['title']="Fast Start Commission List";
	    $data['breadcrumb']='<li class="active">Fast Start Commission List</li>';
	    $data['direct_referral_income']=$this->income_report->getFastStartCommission($this->userId);
	    $data['total_direct_referral_income']=$this->income_report->getTotalFSCommission($this->userId);
	    $data['total_direct_member']=$this->team_report->getTotalDirectMember($this->userId);
		_userLayout("income-report-mgmt/fast-start-comission-list",$data);
	}
	
	/*
	@Desc: It's used to view the rank bonus
	*/
	public function rankBonusList()
	{
	    $data['title']="Level Commission List";
	    $data['breadcrumb']='<li class="active">Level Commission List</li>';
	    $data['rank_bonus_income']=$this->income_report->getRankUpdateBonus($this->userId);
	    $data['rank_name']=$this->dashboard->getRank($this->userId);
		_userLayout("income-report-mgmt/rank-bonus-list",$data);
	}
	
	/*
	@Desc: Matrix Level Complete Commission List
	*/
	public function matrixLevelCompleteCommissionList()
	{
		$data=array();
		$data['matrix_level_complete_commission']=$this->income_report->getMatrixLevelCompleteCommission($this->userId);
		//pr($data['matrix_level_complete_commission']);
		_userLayout("income-report-mgmt/matrix-level-complete-commission-list",$data);
	}
	
	/*
	@Desc: Matrix Level Complete Commission List
	*/
	public function ProductCommissionList()
	{
		$data=array();
		$data['matrix_level_complete_commission']=$this->income_report->getProductCommission($this->userId);
		//pr($data['matrix_level_complete_commission']);
		_userLayout("income-report-mgmt/product-commission-list",$data);
	}
	/*
	@Desc: It's used to view the level commission list
	*/
	public function levelCommissionList($c)
	{
	    
	    $data['title']="Level Commission List";
	    $data['breadcrumb']='<li class="active">Level Commission List</li>';
	    $data['level_income']=$this->income_report->getLevelCommission($this->userId,$c);
	    $data['total_team_member']=$this->team_report->getTotalTeamMember($this->userId);
		_userLayout("income-report-mgmt/level-comission-list",$data);
	}
	
	/*
	@Desc: It's used to display matrix commission income
	*/
	public function matrixCommissionList()
	{
	    $data['title']="Matrix Commission List";
	    $data['breadcrumb']='<li class="active">Matrix Commission List</li>';
	    $data['matrix_income']=$this->income_report->getMatrixCommission($this->userId);

		$data['total_matrix_income']=$this->income_report->getTotalMatrixCommission($this->userId);
	    //$data['total_direct_member']=$this->team_report->getTotalDirectMember($this->userId);
		_userLayout("income-report-mgmt/matrix-comission-list",$data);
	}
	/*
	@Desc: Matrix Stage Complete Rank Bonus List
	*/
	public function matrixStageCompleteRankBonusList()
	{
		$data=array();
		$data['title']="Matrix Complete Reward Income";
		$data['stage_complete_rank_bonus']=$this->income_report->getStageCompleteRankBonus($this->userId);
		//pr($data['stage_complete_rank_bonus']);
		_userLayout("income-report-mgmt/matrix-stage-complete-rank-bonus-list",$data);
	}
}//end class

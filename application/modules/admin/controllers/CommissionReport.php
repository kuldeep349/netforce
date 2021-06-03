<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/CommissionReport
*/
class CommissionReport extends Common_Controller 
{
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->helper("layout_helper");
		$this->load->model("commission_report_model");
		$this->load->helper("commission_helper");
	}//end constructor 
	public function rankAchieverReport()
	{
		$data=array();
		$data['rank_achiever_report']=$this->commission_report_model->getRankAchieverReport();
		//pr($data['rank_achiever_report']);
		_adminLayout("commission-report-mgmt/rank-achiever-report",$data);
	}
	public function topEarnerReport()
	{
		$data=array();
		$data['top_earner_report']=$this->commission_report_model->getTopEarnerReport();
		_adminLayout("commission-report-mgmt/top-earner-report",$data);
	}
	public function topRecruiterReport()
	{
		$data=array();
		$data['top_recruiter_report']=$this->commission_report_model->getTopRecuriterReport();
		_adminLayout("commission-report-mgmt/top-recruiter-report",$data);
	}
	public function grantRankBonus()
	{
		$data=array();
		$data['grant_bank_bonus']=$this->commission_report_model->getGrantRankBonus();
		_adminLayout("commission-report-mgmt/grant-bank-bonus",$data);
	}
	///////////
	public function directReferralCommission()
	{
		$data=array();
		$data['direct_commission']=$this->commission_report_model->getDirectCommissionList();
		_adminLayout("commission-report-mgmt/direct-referral-commission",$data);
	}
	public function matrixLevelCompleteCommissionList()
	{
		$data=array();
		$data['all_commission']=$this->commission_report_model->getMatrixLevelCompleteCommissionList();
		_adminLayout("commission-report-mgmt/matrix-level-complete-commission-list",$data);
	}
	public function matrixCompleteCommissionList()
	{
		$data=array();
		$data['all_commission']=$this->commission_report_model->getMatrixCommissionList();
		_adminLayout("commission-report-mgmt/matrix-complete-commission-list",$data);
	}
	public function matrixCompleteRankBonusList()
	{
		$data=array();
		$data['all_commission']=$this->commission_report_model->getMatrixRankBonusList();
		_adminLayout("commission-report-mgmt/matrix-complete-rank-bonus-list",$data);
	}
}//end class
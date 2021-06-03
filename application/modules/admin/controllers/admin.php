<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/admin
*/
class Admin extends Common_Controller 
{
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->helper("layout_helper");
		$this->load->model("dashboard_model");
	} 
	/*
	@Desc:It's used to view dashboard
	*/
	public function index()
	{
		$data=array();
		////////////////////////////////////
		$data['member_registered_today']=$this->dashboard_model->getRegisteredMemberByDate(date('d-m-Y'));
		$data['total_member']=$this->dashboard_model->totalMembers();
		$data['this_week_registered_member']=$this->dashboard_model->getCurrentWeekRegisteredMember();
		$data['this_month_registered_member']=$this->dashboard_model->getCurrentMonthRegisteredMember();
		////////////////////////////////////
		$data['total_payout_request']=$this->dashboard_model->getTotalNumberOfPayoutRequest();
		$data['total_payout_request_completion_rate']=$this->dashboard_model->getTotalPayoutRequestCompletionRate();
		$data['total_payout_request_amount']=$this->dashboard_model->getTotalPayoutRequestAmount();
		////////////////////////////////////
		$data['total_completed_payout_request']=$this->dashboard_model->getTotalNumberOfCompletedPayoutRequest();
		$data['total_completed_payout_request_amount']=$this->dashboard_model->getTotalCompletedPayoutRequestAmount();
		////////////////////////////////////
		$data['total_pending_payout_request']=$this->dashboard_model->getTotalNumberOfPendingPayoutRequest();
		$data['total_payout_request_pending_rate']=$this->dashboard_model->getTotalPayoutRequestPendingRate();
		$data['total_pending_payout_request_amount']=$this->dashboard_model->getTotalPendingPayoutRequestAmount();
		////////////////////////////////////
		$data['total_open_ticket']=$this->dashboard_model->getTotalOpenTicket();
		$data['total_closed_ticket']=$this->dashboard_model->getTotalClosedTicket();
		/////////////////////
		/*
		@for company
		*/
		$total_package_sold_amount=$this->dashboard_model->getTotalPackageSoldAmount(COMP_USER_ID);		
		$data['total_package_sold_amount']=$total_package_sold_amount;
		
		$total_company_direct_commission=$this->dashboard_model->getUserTotalDirectCommission(COMP_USER_ID)+$this->dashboard_model->getUserTotalDirectCommission(COMP_USER_ID1);
		
		$data['total_company_direct_commission']=number_format($total_company_direct_commission,2);

		
		
		$total_company_level_complete_commission=$this->dashboard_model->getUserTotalMatrixLevelCompleteCommission(COMP_USER_ID)+$this->dashboard_model->getUserTotalMatrixLevelCompleteCommission(COMP_USER_ID1);
		$data['total_company_level_complete_commission']=number_format($total_company_level_complete_commission,2);
		
		
		$total_company_matrix_commission=$this->dashboard_model->getUserTotalMatrixCommission(COMP_USER_ID)+$this->dashboard_model->getUserTotalMatrixCommission(COMP_USER_ID1);
		$data['total_company_matrix_commission']=number_format($total_company_matrix_commission,2);
		
		$total_company_incentive=$this->dashboard_model->getUserTotalMatrixCompleteRankBonus(COMP_USER_ID)+$this->dashboard_model->getUserTotalMatrixCompleteRankBonus(COMP_USER_ID1);
		$data['total_company_incentive']=number_format($total_company_incentive,2);
		

		$company_gross_commission=$total_company_direct_commission+$total_company_level_complete_commission+$total_company_matrix_commission+$total_company_incentive;
		
		$data['company_gross_commission']=number_format($company_gross_commission,2);
	
		/*
		 @ for member
		*/
		$total_all_member_direct_commission=$this->dashboard_model->getAllUserTotalDirectCommission();
		$data['total_all_member_direct_commission']=number_format($total_all_member_direct_commission,2);
		
		
		
		
		$total_all_member_level_complete_commission=$this->dashboard_model->getAllUserTotalMatrixLevelCompleteCommission();
		$data['total_all_member_level_complete_commission']=number_format($total_all_member_level_complete_commission,2);
		
		
		$total_all_member_matrix_commission=$this->dashboard_model->getAllUserTotalMatrixCommission();
		$data['total_all_member_matrix_commission']=number_format($total_all_member_matrix_commission,2);
		
		
		$total_all_member_incentive=$this->dashboard_model->getAllUserTotalMatrixCompleteRankBonus();
		$data['total_all_member_incentive']=number_format($total_all_member_incentive,2);
		
		
		
		
		$all_user_gross_commission=$total_all_member_direct_commission+$total_all_member_level_complete_commission+$total_all_member_matrix_commission+$total_all_member_incentive;
		
		$data['all_user_gross_commission']=number_format($all_user_gross_commission,2);
		$data['package_members']=$this->dashboard_model->getPackageMembers();
		/////////////////////////////////////////////////
		$total_company_profit=$total_package_sold_amount-$all_user_gross_commission;	
		$data['total_company_profit']=number_format($total_company_profit,2);
		_adminLayout("dashboard",$data);
	}
}//end class

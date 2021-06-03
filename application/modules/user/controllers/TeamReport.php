<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package user/TeamReport
*/
class TeamReport extends Common_Controller 
{
	private $userId;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		user_auth();
		$this->load->helper("layout_helper");
		$this->userId=$this->session->userdata('user_id');
		$this->load->model('TeamReport_Model','team_report');
	} 
	/*
	@Desc: It's used to view the all the direct referral lis
	*/
	public function directReferralMemberList($uid=null)
	{
	    if($uid!='')
	    {
	    $user_id=base64_decode($uid);
	    }
	    else
	    {
	        $user_id=$this->userId;
	    }
	    $username=get_user_name($user_id);
	    $data['title']="Direct Referral Member Report Of ".$username;
	    $data['breadcrumb']='<li class="active">Direct Referral Member Report '.$username.'</li>';
	    $data['callfunc']=$this;
		$data['direct_member']=$this->team_report->getDirectReferralMemberList($user_id);
		$data['total_direct_member']=$this->team_report->getTotalDirectMember($user_id);
		$data['total_team_member']=$this->team_report->getTotalTeamMember($user_id);
		_userLayout("team-report-mgmt/direct-referral-member-list",$data);
	}
	
	public function totalDirectCount($uid=null)
	{
	    if($uid!='')
	    {
	    $user_id=base64_decode($uid);
	    }
	    else
	    {
	        $user_id=$this->userId;
	    }
	    $direct_member=$this->team_report->getTotalDirectMember($user_id);
	    return $direct_member;
	}
	
	public function totalTeamCount($uid=null)
	{
	    if($uid!='')
	    {
	    $user_id=base64_decode($uid);
	    }
	    else
	    {
	        $user_id=$this->userId;
	    }
	    $direct_member=$this->team_report->getTotalTeamMember($user_id);
	    return $direct_member;
	}
	/*
	@Desc: It's used to view all the team member list/downline team member from matrix_downline table
	*/
	public function teamMemberList()
	{
	    $data['title']="Feedr stage Member Report";
	    $data['breadcrumb']='<li class="active">Feedr stage Member Report</li>';
		$data['team_member']=$this->team_report->getTeamMemberList($this->userId);
		$data['total_team_member']=$this->team_report->getTotalTeamMember($this->userId);
		_userLayout("team-report-mgmt/team-member-list",$data);
	}
	/*
	@Desc: It's used to view all the team member list/downline team member from matrix_stage1 table
	*/
	public function feaderTeamMemberList()
	{
	    $data['title']="Standard stage Member Report";
	    $data['breadcrumb']='<li class="active">Standard stage Member Report</li>';
		$data['team_member']=$this->team_report->getFeaderTeamMemberList($this->userId);
		$data['total_team_member']=$this->team_report->getFeederTotalTeamMember($this->userId);
		_userLayout("team-report-mgmt/team-member-list",$data);
	}
	public function stage1TeamMemberList()
	{
	    $data['title']="Captain Team Member Report";
	    $data['breadcrumb']='<li class="active">Captain Team Member Report</li>';
		$data['team_member']=$this->team_report->getStage1TeamMemberList($this->userId);
		$data['total_team_member']=$this->team_report->getStage1TotalTeamMember($this->userId);
		_userLayout("team-report-mgmt/team-member-list",$data);
	}
	/*
	@Desc: It's used to view all the team member list/downline team member from matrix_stage2 table
	*/
	public function stage2TeamMemberList()
	{
	    $data['title']="Ambassador Team Member Report";
	    $data['breadcrumb']='<li class="active">Ambassador Team Member Report</li>';
		$data['team_member']=$this->team_report->getStage2TeamMemberList($this->userId);
		$data['total_team_member']=$this->team_report->getStage2TotalTeamMember($this->userId);
		_userLayout("team-report-mgmt/team-member-list",$data);
	}
	/*
	@Desc: It's used to view all the team member list/downline team member from matrix_stage3 table
	*/
	public function stage3TeamMemberList()
	{
	    $data['title']="Stage3 Team Member Report";
	    $data['breadcrumb']='<li class="active">Stage3 Team Member Report</li>';
		$data['team_member']=$this->team_report->getStage3TeamMemberList($this->userId);
		$data['total_team_member']=$this->team_report->getStage3TotalTeamMember($this->userId);
		_userLayout("team-report-mgmt/team-member-list",$data);
	}
	/*
	@Desc: It's used to view all the team member list/downline team member from matrix_stage4 table
	*/
	public function stage4TeamMemberList()
	{
	    $data['title']="Stage4 Team Member Report";
	    $data['breadcrumb']='<li class="active">Stage4 Team Member Report</li>';
		$data['team_member']=$this->team_report->getStage4TeamMemberList($this->userId);
		$data['total_team_member']=$this->team_report->getStage4TotalTeamMember($this->userId);
		_userLayout("team-report-mgmt/team-member-list",$data);
	}
	/*
	@Desc: It's used to view all the team member list/downline team member from matrix_stage5 table
	*/
	public function stage5TeamMemberList()
	{
	    $data['title']="Stage5 Team Member Report";
	    $data['breadcrumb']='<li class="active">Stage5 Team Member Report</li>';
		$data['team_member']=$this->team_report->getStage5TeamMemberList($this->userId);
		$data['total_team_member']=$this->team_report->getStage5TotalTeamMember($this->userId);
		_userLayout("team-report-mgmt/team-member-list",$data);
	}
	/*
	@Desc: It's used to view all the team member list/downline team member from matrix_stage6 table
	*/
	public function stage6TeamMemberList()
	{
	    $data['title']="Stage4 Team Member Report";
	    $data['breadcrumb']='<li class="active">Stage4 Team Member Report</li>';
		$data['team_member']=$this->team_report->getStage6TeamMemberList($this->userId);
		$data['total_team_member']=$this->team_report->getStage6TotalTeamMember($this->userId);
		_userLayout("team-report-mgmt/team-member-list",$data);
	}
}//end class

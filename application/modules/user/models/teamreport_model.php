<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @package user/teamreport_model
*/
class TeamReport_Model extends Common_Model
{
  public function __construct()
    {
        //@call to parent CI_Model constructor
        parent::__construct();
    }
  /*
  @Desc: It's used to get all the direct referral member
  */
  public function getDirectReferralMemberList($user_id)
  {
    return $this->db->select('*')->from('user_registration')->where('ref_id',$user_id)->order_by('id','desc')->get()->result();
  }
  /*
  @Desc: It's used to get all the team member from matrix downline table
  */
  public function getTeamMemberList($user_id)
  {
    return $this->db->select(array(
      'u.user_id',
      'u.username',
	  'u.ref_id',
      'u.first_name',
      'u.last_name',
      'u.contact_no',
      'l.level',
      'u.rank_name',
      'u.active_status',
      'u.registration_method_name',
      'u.pkg_id',
      'u.auto_registration_date',
      'u.registration_date',
      'p.title'
      ))->from('matrix_downline as l')->join('user_registration as u', 'u.user_id=l.down_id')->join('package as p', 'u.pkg_id=p.id')->where('l.income_id',$user_id)->get()->result();
  }
  /*
  @Desc:It's used to return the total dirrect/referral member on the basis of user_id
  */
  public function getTotalDirectMember($user_id)
  {
    $total_direct_member=$this->db->select('id')->from('user_registration')->where('ref_id',$user_id)->get()->num_rows();
    return $total_direct_member;
  }
  /*
  @Desc:It's used to return the total team member from matrix_downline table on the basis of user_id
  */
  public function getTotalTeamMember($user_id)
  {
    $total_team_member=$this->db->select('id')->from('matrix_downline')->where('income_id',$user_id)->get()->num_rows();
    return $total_team_member;
  }
  /*
  @Desc:It's used to return the total team member from matrix_downline table on the basis of user_id
  */
  public function getTotalTeamPv($user_id)
  {
    $total_team_member=$this->db->select('sum(pv) as totalpv')->from('matrix_downline_pv')->where('income_id',$user_id)->get()->row();
    return $total_team_member->totalpv;
  }
  
  /*
  @Desc:It's used to return the total team member from matrix_downline table on the basis of user_id
  */
  public function getTotalOnlyTeamPv($user_id)
  {
    $total_team_member=$this->db->select('sum(pv) as totalpv')->from('matrix_downline_pv')->where(array('income_id'=>$user_id,'down_id !='=>$user_id))->get()->row();
    return $total_team_member->totalpv;
  }
  /*
  @Desc:It's used to return the total team member from matrix_downline table on the basis of user_id
  */
  public function getTotalSelfPv($user_id)
  {
    $total_team_member=$this->db->select('sum(pv) as totalpv')->from('matrix_downline_pv')->where(array('income_id'=>$user_id,'down_id'=>$user_id))->get()->row();
    return $total_team_member->totalpv;
  }
  /*
  @Desc: It's used to get all the team member from matrix_stage1
  */
  public function getFeaderTeamMemberList($user_id)
  {
    return $this->db->select(array(
      'u.user_id',
      'u.username',
	  'u.ref_id',
      'u.first_name',
      'u.last_name',
      'u.contact_no',
      'l.level',
      'u.rank_name',
      'u.active_status',
      'u.registration_method_name',
      'u.auto_registration_date',
      'u.pkg_id',
      'u.registration_date',
      'p.title'
      ))->from('matrix_downline as l')->join('user_registration as u', 'u.user_id=l.down_id')->join('package as p', 'u.pkg_id=p.id')->where(array('l.income_id'=>$user_id))->get()->result();
  }
  public function getFeederTotalTeamMember($user_id)
  {
    $total_team_member=$this->db->select('id')->from('matrix_downline')->where(array('income_id'=>$user_id))->get()->num_rows();
    return $total_team_member;
  }
  public function getStage1TeamMemberList($user_id)
  {
    return $this->db->select(array(
      'u.user_id',
      'u.username',
      'u.ref_id',
      'u.first_name',
      'u.last_name',
      'u.contact_no',
      'l.level',
      'u.rank_name',
      'u.active_status',
      'u.pkg_id',
      'u.registration_method_name',       'u.auto_registration_date',
      'u.registration_date','p.title'
      ))->from('matrix_stage1 as l')->join('user_registration as u', 'u.user_id=l.down_id')->join('package as p', 'u.pkg_id=p.id')->where(array('l.income_id'=>$user_id))->get()->result();
  }
  /*
   @Desc:It's used to return the total team member from matrix_stage1 table on the basis of user_id
  */
  public function getStage1TotalTeamMember($user_id)
  {
    $total_team_member=$this->db->select('id')->from('matrix_stage1')->where(array('income_id'=>$user_id))->get()->num_rows();
    return $total_team_member;
  }
  /*
  @Desc: It's used to get all the team member from matrix_stage2
  */
  public function getStage2TeamMemberList($user_id)
  {
    return $this->db->select(array(
      'u.user_id',
      'u.username',
      'u.ref_id',
      'u.first_name',
      'u.last_name',
      'u.contact_no',
      'l.level',
      'u.rank_name',
      'u.pkg_id',
      'u.active_status',
      'u.registration_method_name',       'u.auto_registration_date',
      'u.registration_date','p.title'
      ))->from('matrix_stage2 as l')->join('user_registration as u', 'u.user_id=l.down_id')->join('package as p', 'u.pkg_id=p.id')->where(array('l.income_id'=>$user_id))->get()->result();
  }
  /*
   @Desc:It's used to return the total team member from matrix_stage2 table on the basis of user_id
  */
  public function getStage2TotalTeamMember($user_id)
  {
    $total_team_member=$this->db->select('id')->from('matrix_stage2')->where(array('income_id'=>$user_id))->get()->num_rows();
    return $total_team_member;
  }
  /*
  @Desc: It's used to get all the team member from matrix_stage3
  */
  public function getStage3TeamMemberList($user_id)
  {
    return $this->db->select(array(
      'u.user_id',
      'u.username',
      'u.ref_id',
      'u.first_name',
      'u.last_name',
      'u.contact_no',
      'u.pkg_id',
      'l.level',
      'u.rank_name',
      'u.active_status',
      'u.registration_method_name',       'u.auto_registration_date',
      'u.registration_date','p.title'
      ))->from('matrix_stage3 as l')->join('user_registration as u', 'u.user_id=l.down_id')->join('package as p', 'u.pkg_id=p.id')->where(array('l.income_id'=>$user_id))->get()->result();
  }
  /*
   @Desc:It's used to return the total team member from matrix_stage3 table on the basis of user_id
  */
  public function getStage3TotalTeamMember($user_id)
  {
    $total_team_member=$this->db->select('id')->from('matrix_stage3')->where(array('income_id'=>$user_id))->get()->num_rows();
    return $total_team_member;
  }

  /*
  @Desc: It's used to get all the team member from matrix_stage4
  */
  public function getStage4TeamMemberList($user_id)
  {
    return $this->db->select(array(
      'u.user_id',
      'u.username',
      'u.ref_id',
      'u.first_name',
      'u.last_name',
      'u.contact_no',
      'u.pkg_id',
      'l.level',
      'u.rank_name',
      'u.active_status',
      'u.registration_method_name',       'u.auto_registration_date',
      'u.registration_date','p.title'
      ))->from('matrix_stage4 as l')->join('user_registration as u', 'u.user_id=l.down_id')->join('package as p', 'u.pkg_id=p.id')->where(array('l.income_id'=>$user_id))->get()->result();
  }
  /*
   @Desc:It's used to return the total team member from matrix_stage4 table on the basis of user_id
  */
  public function getStage4TotalTeamMember($user_id)
  {
    $total_team_member=$this->db->select('id')->from('matrix_stage4')->where(array('income_id'=>$user_id))->get()->num_rows();
    return $total_team_member;
  }
  /*
  @Desc: It's used to get all the team member from matrix_stage5
  */
  public function getStage5TeamMemberList($user_id)
  {
    return $this->db->select(array(
      'u.user_id',
      'u.username',
      'u.ref_id',
      'u.first_name',
      'u.last_name',
      'u.contact_no',
      'u.pkg_id',
      'l.level',
      'u.rank_name',
      'u.active_status',
      'u.registration_method_name',       'u.auto_registration_date',
      'u.registration_date','p.title'
      ))->from('matrix_stage5 as l')->join('user_registration as u', 'u.user_id=l.down_id')->join('package as p', 'u.pkg_id=p.id')->where(array('l.income_id'=>$user_id))->get()->result();
  }
  /*
   @Desc:It's used to return the total team member from matrix_stage5 table on the basis of user_id
  */
  public function getStage5TotalTeamMember($user_id)
  {
    $total_team_member=$this->db->select('id')->from('matrix_stage5')->where(array('income_id'=>$user_id))->get()->num_rows();
    return $total_team_member;
  }
  /*
  @Desc: It's used to get all the team member from matrix_stage6
  */
  public function getStage6TeamMemberList($user_id)
  {
    return $this->db->select(array(
      'u.user_id',
      'u.username',
      'u.ref_id',
      'u.first_name',
      'u.last_name',
      'u.contact_no',
      'u.pkg_id',
      'l.level',
      'u.rank_name',
      'u.active_status',
      'u.registration_method_name',       'u.auto_registration_date',
      'u.registration_date','p.title'
      ))->from('matrix_stage6 as l')->join('user_registration as u', 'u.user_id=l.down_id')->join('package as p', 'u.pkg_id=p.id')->where(array('l.income_id'=>$user_id))->get()->result();
  }
  /*
   @Desc:It's used to return the total team member from matrix_stage6 table on the basis of user_id
  */
  public function getStage6TotalTeamMember($user_id)
  {
    $total_team_member=$this->db->select('id')->from('matrix_stage6')->where(array('income_id'=>$user_id))->get()->num_rows();
    return $total_team_member;
  }
}//end class
?>
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @package user/Front_Model
*/
class Doctor_model extends Common_Model
{
  public function __construct()
  {
        //@call to parent CI_Model constructor
        parent::__construct();
  }
  function getDoctorList()
  {
  	return $this->db->select('*')->from('austin_doctor')->get()->result_array();
  }
  function getDoctorDetail($doctorId)
  {
  	$where="(doctor_id='$doctorId')";
    return $this->db->select('*')->from('austin_doctor')->where($where)->get()->row_array();
  }
  //getCounselorsDetail
  function getCounselorsList()
  {
    return $this->db->select('*')->from('counselors')->get()->result_array();
  }
  function getCounselorsDetail($CounselorsId)
  {
    $where="(counselors_id='$CounselorsId')";
    return $this->db->select('*')->from('counselors')->where($where)->get()->row_array();
  }

  function getAltmedList()
  {
    return $this->db->select('*')->from('alternative_medicine')->get()->result_array();
  }
  function getAltmedListDetail($altMedId)
  {
    $where="(altm_id='$altMedId')";
    return $this->db->select('*')->from('alternative_medicine')->where($where)->get()->row_array();
  }

}
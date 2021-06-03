<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @package user/booking_model
*/
class Booking_Model extends Common_Model
{
  public function __construct()
  {
        //@call to parent CI_Model constructor
        parent::__construct();
  }
  public function gelAllPendingBookingList()
  {
	   return $this->db->select(array('b.*','ur.username'))	   	   ->join('user_registration as ur','ur.user_id=b.user_id')
	  ->from('booking as b')
	  ->where(array('b.booking_status'=>'1'))
	  ->get()
	  ->result();
  }
  public function gelAllConfirmBookingList()
  {
	  return $this->db->select(array('b.*','ur.username'))	  	   ->join('user_registration as ur','ur.user_id=b.user_id')
	  ->from('booking as b')
	  ->where(array('b.booking_status'=>'2'))
	  ->get()
	  ->result();
  }
  public function gelAllRejectedBookingList()
  {
	  return $this->db->select(array('b.*','ur.username'))	  	   ->join('user_registration as ur','ur.user_id=b.user_id')
	  ->from('booking as b')
	  ->where(array('b.booking_status'=>'3'))
	  ->get()
	  ->result();
  }
  public function getHourlyBookingDetails($booking_id)
  {
	  return $this->db->select(array('b.*','bm.*','p.*','ur.username'))
	  ->join('booking_hour_meta as bm','b.booking_id=bm.booking_id')
	  ->join('product as p','p.id=b.product_id')	  	  ->join('user_registration as ur','ur.user_id=b.user_id')
	  ->from('booking as b')
	  ->where(array('b.booking_id'=>$booking_id))
	  ->get()
	  ->row();
  }
  public function getDayWiseBookingDetails($booking_id)
  {
	  return $this->db->select(array('b.*','bdm.*','p.*','ur.username'))
	  ->join('booking_days_meta as bdm','b.booking_id=bdm.booking_id')
	  ->join('product as p','p.id=b.product_id')	  	   ->join('user_registration as ur','ur.user_id=b.user_id')
	  ->from('booking as b')
	  ->where(array('b.booking_id'=>$booking_id))
	  ->get()
	  ->row();
  }
}//end class
?>
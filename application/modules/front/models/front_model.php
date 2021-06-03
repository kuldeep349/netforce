<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @package user/Front_Model
*/
class Front_Model extends Common_Model
{
  public function __construct()
  {
        //@call to parent CI_Model constructor
        parent::__construct();
  }
   /*
  @Desc: It's used to just check weather the username or user_id is exist
  */
  public function getDoctors($limit = null, $start = null, $big_get, $vendor_id = false)
    {
        if ($limit !== null && $start !== null) {
            $this->db->limit($limit, $start);
        }
        if (!empty($big_get) && isset($big_get['category'])) {
            $this->getFilter($big_get);
        }
        $this->db->select('vendors.url as vendor_url, products.id,products.image, products.quantity, products_translations.title, products_translations.price, products_translations.old_price, products.url');
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->join('vendors', 'vendors.id = products.vendor_id', 'left');
        $this->db->where('products_translations.abbr', MY_LANGUAGE_ABBR);
        $this->db->where('visibility', 1);
        if ($vendor_id !== false) {
            $this->db->where('vendor_id', $vendor_id);
        }
        if ($this->showOutOfStock == 0) {
            $this->db->where('quantity >', 0);
        }
        if ($this->showInSliderProducts == 0) {
            $this->db->where('in_slider', 0);
        }
        if ($this->multiVendor == 0) {
            $this->db->where('vendor_id', 0);
        }
        $this->db->order_by('position', 'asc');
        $query = $this->db->get('products');
        return $query->result_array();
    }
  public function isUserExist($username)
  {
    $where="(username='$username' || user_id='$username')";
    $total=$this->db->select('id')->from('user_registration')->where($where)->get()->num_rows();
    $where="(username='$username') and (status='0' || status='1')";
    $total1=$this->db->select('id')->from('bank_wired_user_registration')->where($where)->get()->num_rows();
    if($total>0 || $total1>0)
      return true;
    else
      return false;
  }//end method
   /*
  @Desc: It's used to just check weather the username or user_id is exist
  */
  public function isIdNoExist($username)
  {
    $where="(idno='$username')";
    $total=$this->db->select('id')->from('user_registration')->where($where)->get()->num_rows();
    if($total>0)
      return true;
    else
      return false;
  }//end method
   /*
  @Desc: It's used to just check weather the username or user_id is exist
  */
  public function getMarquee(){
    $this->db->select('*');
    $query = $this->db->get('tbl_marquee');
    return $result = $query->result_array();
  }

  function getPropertyDetail($prop_id)
  {
    $where="(prop_id='$prop_id')";
    return $this->db->select('*')->from('property_list')->where($where)->get()->row_array();
  }
  public function isAadharNoExist($username)
  {
    $where="(aadharno='$username')";
    $total=$this->db->select('id')->from('user_registration')->where($where)->get()->num_rows();
    if($total>0)
      return true;
    else
      return false;
  }//end method
  public function isSponsorExist($username,$pkg_id)
  {
    $where="(username='$username' || user_id='$username') and active_status='1' and pkg_id='$pkg_id'";
    $total=$this->db->select('id')->from('user_registration')->where($where)->get()->num_rows();
    if($total>0)
      return true;
    else
      return false;
  }//end method
  /*
  @Desc:It's used to get the bank wire details
  */
  public function getBankWireDetails()
  {
    return $this->db->select('*')->from('bank_wired_detail')->where('id',1)->get()->row();
  }
  public function isUserEmailExist($email)
  {
    $total=$this->db->select('id')->from('user_registration')->where('email',$email)->get()->num_rows();
    if($total>0)
      return true;
    else
      return false;
  }//end method
  public function getAllActivePackage()
  {
    return $this->db->select('*')->from('package')->where('status','1')->get()->result();
  }
  public function getPackageDetails($package_id)
  {
    return $this->db->select('*')->from('package')->where('id',$package_id)->get()->row();
  }
  public function Categories()
  {
    return $this->db->select('*')->from('eshop_category')->where('active_status','1')->get()->result();
  }
}//end class
?>
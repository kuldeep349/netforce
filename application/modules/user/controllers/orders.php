<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/orders
*/
class Orders extends Common_Controller 
{
	private $moduleName;
	private $user_id;
	private $role;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		user_auth();
		$this->load->model('eshop_model');
		$this->load->helper("layout_helper");
		$this->user_id=$this->session->userdata('user_id');
		$this->moduleName=$this->router->fetch_module();
		$this->role='1';
		
	}
	//end constructor 
	/////////////orders function   all,complete,rejected,pending delivered//////////////////////
	
	public function allOrders()
	{	  	 
		$result=$this->db->query("select a.*,b.username, CASE when a.role='2' then 'User' END as role from eshop_orders as a left join user_registration as b on a.user_id=b.user_id where a.role=2 union all select c.*,d.email, CASE when c.role='3' then 'Guest' END as role  from eshop_orders as c left join eshop_guest as d  on c.user_id=d.guest_id where c.role=3")->result_array();
		$data['all_orders']=$result;
		$data['module_name']=$this->moduleName;
		_userLayout("ecommerce/order-mgmt/all-orders",$data);
	}
	
	public function change_status($id=null,$status_value=null)
    {
		$this->db->query("Update eshop_orders set order_status='".$status_value."' where id='".$id."'");
		$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Status Changed Successfully</span>');
		redirect(site_url().$this->moduleName."/orders/allOrders");
		exit();
    }
	
	public function allPendingOrders()
	{
		$data['title']='Pending Orders';	
		$result=$this->db->query("select a.*,b.username, CASE when a.role='2' then 'User' END as role from eshop_orders as a left join user_registration as b on a.user_id=b.user_id where a.role=2 and a.order_status='0' union all select c.*,d.email, CASE when c.role='3' then 'Guest' END as role  from eshop_orders as c left join eshop_guest as d  on c.user_id=d.guest_id where c.role=3 and c.order_status='0'")->result_array();
		$data['all_pending_orders']=$result;
		$data['module_name']=$this->moduleName;
		_userLayout("ecommerce/order-mgmt/all-pending-orders",$data);
	}
	
	public function allConfirmedOrders()
	{
		$data['title']='Confirmed Orders';		
		$result=$this->db->query("select a.*,b.username, CASE when a.role='2' then 'User' END as role from eshop_orders as a left join user_registration as b on a.user_id=b.user_id where a.role=2 and a.order_status='1' union all select c.*,d.username, CASE when c.role='3' then 'Vendor' END as role  from eshop_orders as c left join eshop_vendors as d  on c.user_id=d.vendor_id where c.role=3 and c.order_status='1'")->result_array();
		$data['all_confirmed_orders']=$result;
		$data['module_name']=$this->moduleName;
		_userLayout("ecommerce/order-mgmt/all-confirmed-orders",$data);
	}
	
	public function allRejectedOrders()
	{
		$data['title']='Rejected Orders';		
		$result=$this->db->query("select a.*,b.username, CASE when a.role='2' then 'User' END as role from eshop_orders as a left join user_registration as b on a.user_id=b.user_id where a.role=2 and a.order_status='2' union all select c.*,d.username, CASE when c.role='3' then 'Vendor' END as role  from eshop_orders as c left join eshop_vendors as d  on c.user_id=d.vendor_id where c.role=3 and c.order_status='2'")->result_array();
		$data['all_rejected_orders']=$result;
		$data['module_name']=$this->moduleName;
		_userLayout("ecommerce/order-mgmt/all-rejected-orders",$data);
	}
	
	public function allDeliveredOrders()
	{
		$data['title']='Delivered Orders';		
		$result=$this->db->query("select a.*,b.username, CASE when a.role='2' then 'User' END as role from eshop_orders as a left join user_registration as b on a.user_id=b.user_id where a.role=2 and a.order_status='3' union all select c.*,d.email, CASE when c.role='3' then 'Guest' END as role  from eshop_orders as c left join eshop_guest as d  on c.user_id=d.guest_id where c.role=3 and c.order_status='3'")->result_array();
		$data['all_delivered_orders']=$result;
		$data['module_name']=$this->moduleName;
		_userLayout("ecommerce/order-mgmt/all-delivered-orders",$data);
	}
	/////////////orders function   all,complete,rejected,pending delivered//////////////////////
	public function getOrderdetail_ajax($order_id)
	{
		$result=$this->db->query("SELECT * from eshop_orders where id='".$order_id."'")->row_array();
		if($result['role']==2)
		{
        $table='user_registration';  
		$user_id='user_id';
		}
		else
		{
		$table='eshop_guest';
		$user_id='guest_id';
		}
	
		
		$address=$this->db->query("SELECT * from user_registration where user_id='".COMP_USER_ID."'")->row_array();
		
		$user_data=$this->db->query("SELECT * from $table where $user_id='".$result['user_id']."'")->row_array();
		
		$unserialize_Productdata=unserialize($result['order_details']);	
		?>
		<div class="panel panel-white" >
                     <div class="panel-heading">
                        <h6 class="panel-title">My Booking Invoice</h6>
                        <div class="heading-elements">
                          
                        </div>
                     </div>
                     <div class="panel-body no-padding-bottom">
                        <div class="row">
                           <div class="col-md-6 content-group">
                              <img src="<?php echo base_url(); ?>front_assets/images/logomain.png" class="content-group mt-10" alt="" style="width: 120px;">
                              <ul class="list-condensed list-unstyled">
                                 <li><?php echo $address['address_line1']; ?></li>
                                 <li><?php echo $address['contact_no']; ?></li>
                                 <li><a href="javascript:void(0)"><?php echo $address['email']; ?></a></li>
                              </ul>
                           </div>
                           <div class="col-md-6 content-group">
                              <div class="invoice-details">
                                 <h5 class="text-uppercase text-semibold">Invoice No :- <?php echo $result['order_id']; ?></h5>
                                 <ul class="list-condensed list-unstyled">
                                    <li>Date: <span class="text-semibold"><?php echo date("jS F, Y", strtotime($result['order_date'])); ?></span></li>
                                    
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-lg-9 content-group">
                              <span class="text-muted">Invoice To:</span>
                              <ul class="list-condensed list-unstyled">
                                 <li>
                                    <h5>Username: <?php echo $user_data['username']; ?></h5>
                                 </li>
								 <li>Address: <span><?php echo $user_data['address_line1']; ?></span></li>
                                 <li>Contact No: <span class="text-semibold"><?php echo $user_data['contact_no']; ?></span></li>
								 <li>Email: <span class="text-semibold"><a href="javascript:void(0)"><?php echo $user_data['email']; ?></a></span></li>
                              </ul>
                           </div>
                          <!-- <div class="col-md-6 col-lg-3 content-group">
                              <span class="text-muted">Payment Details:</span>
                              <ul class="list-condensed list-unstyled invoice-payment-details">
                                 <li>
                                    <h5>Grand Total: <span class="text-right text-semibold"><?php echo $result['final_price'].' '.currency(); ?></span></h5>
                                 </li>
                                 <li>Account Holder: <span><?php echo $user_data['account_holder_name']; ?></span></li>
                                 <li>Bank name: <span class="text-semibold"><?php echo $user_data['bank_name']; ?></span></li>
								 <li>Account Number: <span class="text-semibold"><?php echo $user_data['account_no']; ?></span></li>
                              </ul>
                           </div>-->
                        </div>
                     </div>
                     <div class="table-responsive">
                        <table class="table table-lg table-striped table-hover">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Title</th>
                                 <th>Image</th>
                                 <th>Price</th>
                                 <th>Qty</th>
                                 <th>Total Price</th>
                              </tr>
                           </thead>
                           <tbody>
						   <?php
						   $sno=0;
						   foreach($unserialize_Productdata as $pid=>$qty)
						   {
							 $sno++;  
						$product_data=$this->db->query("SELECT * from eshop_products where id='".$pid."'")->row_array();	   
						   ?>
                              <tr>
                              <td><?php echo $sno; ?></td>  
                              <td><?php echo $product_data['title']; ?></td>  
                              <td><img src="<?php echo base_url(); ?>product_images/<?php echo $product_data['product_image']; ?>"></td>  
                              <td><?php echo $product_data['new_price'].' '.currency(); ?></td>  
                              <td><?php echo $qty; ?></td>  
                              <td><?php echo ($product_data['new_price']*$qty).' '.currency(); ?></td>  
                              </tr>
                            <?php
							
						   }
							?> 
                             
                           </tbody>
                        </table>
                     </div>
                     <div class="panel-body">
                        <div class="row invoice-payment">
                           <div class="col-sm-6">
                              
                           </div>
                           <div class="col-sm-6">
                              <div class="content-group">
                                
                                 <div class="table-responsive no-border">
                                    <table class="table table-striped table-hover">
                                       <tbody>
                                          
                                          <tr>
                                             <th>Grand Total:</th>
                                             <td class="text-primary">
                                                <h5 class="text-semibold"><?php echo $result['final_price'].' '.currency(); ?></h5>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                
                              </div>
                           </div>
                        </div>
                        <h6>Other information</h6>
                        <p class="text-muted">Thank you from BHE</p>
                     </div>
                  </div>
 
		<?php
		
	}
}//end class
?>	
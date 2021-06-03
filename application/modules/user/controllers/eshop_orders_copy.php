<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/eshop_orders
*/
class Eshop_Orders extends Common_Controller 
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
		$this->role='2';
		
	}
	//end constructor 
	/////////////orders function   all,complete,rejected,pending delivered//////////////////////
	
	public function allOrders()
	{	  	 
		$data['title']='All Orders';
		$all_order=$this->db->select('*')->from('eshop_orders')->where(array('user_id'=>$this->user_id))->order_by('id','desc')->get()->result();
		//pr($all_order);
		$data['all_orders']=$all_order;
		$data['order_type']='all';
		$data['module_name']=$this->moduleName;
		_userLayout("ecommerce/order-mgmt/all-orders",$data);
	}
	
	public function bvList()
	{	  	 
		$data['title']='All BV List';	
		$all_order=$this->db->select('*')->from('matrix_downline_pv')->where(array('income_id'=>$this->user_id))->order_by('id','desc')->get()->result();
		//pr($all_order);
		$data['all_orders']=$all_order;
		$data['module_name']=$this->moduleName;
		_userLayout("ecommerce/order-mgmt/all-bv",$data);
	}
	
	public function getBVList($month,$level)
	{	  	 
		$data['title']='All BV List';
		$where['income_id']=$this->user_id;
		if($level=='All')
		{
		    
		}
		else
		{
		    $where['level']=$level;
		}
		if($month=='All')
		{
		   $month=date('m');
		     
		}
		$sdate=date('Y-'.$month.'-01');
		$edate=date('Y-'.$month.'-31'); 
		$where['l_date >= ']=$sdate;
		$where['l_date <= ']=$edate;
		//array('income_id'=>$this->user_id,'level'=>$level,'l_date >= '=>$sdate,'l_date <= '=>$edate);
		
		$all_order=$this->db->select('*')->from('matrix_downline_pv')->where($where)->order_by('id','desc')->get()->result();
		//pr($all_order);
		$data['all_orders']=$all_order;
		$data['level']=$level;
		$data['month']=$month;
		$data['module_name']=$this->moduleName;
		_userLayout("ecommerce/order-mgmt/all-bv",$data);
	}
	
	public function allPendingOrders()
	{
		$data['title']='Pending Orders';	
		$data['module_name']=$this->moduleName;
		$all_order=$this->db->select('*')->from('eshop_orders')->where(array('order_status'=>'0','user_id'=>$this->user_id))->order_by('id','desc')->get()->result();
		//pr($all_order);
		$data['all_orders']=$all_order;
		$data['module_name']=$this->moduleName;
		$data['order_type']='pending';
		_userLayout("ecommerce/order-mgmt/all-orders",$data);
	}
	
	public function allConfirmedOrder()
	{
		$data['title']='Confirmed Orders';		
		$data['module_name']=$this->moduleName;
		$all_order=$this->db->select('*')->from('eshop_orders')->where(array('order_status'=>'1','user_id'=>$this->user_id))->order_by('id','desc')->get()->result();
		//pr($all_order);
		$data['all_orders']=$all_order;
		$data['module_name']=$this->moduleName;
		$data['order_type']='confirmed';
		_userLayout("ecommerce/order-mgmt/all-orders",$data);
	}
	
	public function allRejectedOrders()
	{
		$data['title']='Rejected Orders';		
		$data['module_name']=$this->moduleName;
		$all_order=$this->db->select('*')->from('eshop_orders')->where(array('order_status'=>'2','user_id'=>$this->user_id))->order_by('id','desc')->get()->result();
		//pr($all_order);
		$data['all_orders']=$all_order;
		$data['module_name']=$this->moduleName;
		$data['order_type']='rejected';
		_userLayout("ecommerce/order-mgmt/all-orders",$data);
	}
	
	public function allDeliveredOrders()
	{
		$data['title']='Delivered Orders';		
		$data['module_name']=$this->moduleName;
		$all_order=$this->db->select('*')->from('eshop_orders')->where(array('order_status'=>'3','user_id'=>$this->user_id))->order_by('id','desc')->get()->result();
		//pr($all_order);
		$data['all_orders']=$all_order;
		$data['module_name']=$this->moduleName;
		$data['order_type']='delivered';
		_userLayout("ecommerce/order-mgmt/all-orders",$data);
	}
	/////////////orders function   all,complete,rejected,pending delivered//////////////////////
	public function getProduct($id)
	{
		 $result=$this->db->query("SELECT * from eshop_products where id='".$id."' order by id desc")->row();	     	
		 return $result;
		 //$data['module_name']=$this->moduleName;
		//_adminLayout("ecommerce/eshop-mgmt/all-products",$data);
	}
	public function getOrderDetails()
	{
		$order_id=$this->input->post('order_id');
		//$order_id='OR172321';
		$order_info=$this->db->select('*')->from('eshop_orders')->where('order_id',$order_id)->get()->row();
		//pr($order_info);
		$order_details=json_decode($order_info->order_details);
		if($order_info->role=='2')
		{
			//eshop_member_delivery_address
			$delivery_info=$this->db->select('*')->from('eshop_member_delivery_address')->where('user_id',$order_info->user_id)->get()->row();
		}
		else if($order_info->role=='3')
		{
			//eshop_guest_delivery_address
			$delivery_info=$this->db->select('*')->from('eshop_guest_delivery_address')->where('guest_id',$order_info->guest_id)->get()->row();
		}
		//pr($delivery_info);
		$result_stockist=$this->db->query("SELECT * from eshop_stockist_sell where order_id='".$order_id."' order by id desc")->row();
		$result_stockist->stockist_id;
		if($result_stockist)
		{
		    $resultuser=$this->db->query("SELECT * from admin_sub where id='".$result_stockist->stockist_id."' order by id desc")->row();	 
		    $stockist_userid=$resultuser->user_id;
		}
	?>
		<div class="panel panel-white" >
               <div class="panel-heading">
                  <h6 class="panel-title">Order Details</h6>
                  <div class="heading-elements">
                  </div>
               </div>
               <div class="panel-body no-padding-bottom">
                  <div class="row">
					 <div class="col-md-6 content-group">
                        <img src="<?php echo base_url(); ?>front_assets/images/logo.png" class="content-group mt-10" alt="" style="width: 120px;">
                     </div>
                     <div class="col-md-6 content-group">
                        <div class="invoice-details">
                           <ul class="list-condensed list-unstyled">
                              <li>Order ID: <span class="text-semibold"><?php echo $order_info->order_id;?></span></li>
							  <li>Order Date: <span class="text-semibold"><?php echo date("jS F, Y", strtotime($order_info->order_date)); ?></span></li>
							  <?php
							  if($result_stockist)
							  {
							  ?>
    							  <li>GSTIN: <span class="text-semibold"><?php echo $resultuser->gstin; ?></span></li>
    							  <li>Stockist ID: <span class="text-semibold"><?php echo $resultuser->user_id; ?></span></li>
							  <?php
							  }
							  ?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="table-responsive">
                  <table class="table table-lg table-striped table-hover">
                     <thead>
                        <tr>
                            <?php
							  if($result_stockist)
							  {
							  ?>
                               <th>#</th>
                               <th>Title</th>
                               <th>Image</th>
                               <th>Old Price</th>
                               <th>Discount</th>
                               <th>Price</th>
                               <th>Qty</th>
                               <th>BV</th>
                               <th>Total Price</th>
                           <?php
							  }
							  else
							  {
                           ?>
                               <th>#</th>
                               <th>Title</th>
                               <th>Image</th>
                               <th>Price</th>
                               <th>Qty</th>
                               <th>BV</th>
                               <th>Total Price</th>
                           <?php
							  }
                           ?>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
						$sno=0;
						$bv=0;
						foreach($order_details as $details)
						{
							$sno++;
						?>
						<tr>
                           <td><?php echo $sno;?></td>
                           <?php
							  if($result_stockist)
							  {
							      $productoption=$this->getProduct($details->product_id);
							      ?>
							   <td><?php echo $details->product_name;?></td>
                               <td><img width="80" height="80" src="<?php echo base_url().'product_images/'.$details->product_image;?>"></td>
                               <td><?php echo number_format($productoption->old_price,2)."".currency();?></td>
                               <td>20%</td>
                               <td><?php echo number_format($details->product_price,2)."".currency();?></td>
                               <td><?php echo $details->qty;?></td>
                               <td><?php echo $details->bv;?></td>
                               <td><?php echo number_format($details->product_price*$details->qty,2)."".currency();?></td>
							      <?php
							      $bv=$bv+$details->bv;
							  }
							  else
							  {
							  ?>
                                <td><?php echo $details->product_name;?></td>
                                <td><img width='80' height='80' src="<?php echo base_url().'product_images/'.$details->product_image;?>"></td>
                                <td><?php echo number_format($details->product_price,2)."".currency();?></td>
                                <td><?php echo $details->qty;?></td>
                                <td><?php echo $details->bv;?></td>
                                <td><?php echo number_format($details->product_price*$details->qty,2)."".currency();?></td>
                           <?php
                           $bv=$bv+$details->bv;
							  }
                           ?>
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
                                       <th>Tax:</th>
                                       <td class="text-primary">
                                          <h5 class="text-semibold">Included</h5>
                                       </td>
                                    </tr>
                                    
                                     <tr>
                                       <th>Total BV:</th>
                                       <td class="text-primary">
                                          <h5 class="text-semibold"><?php echo $order_info->final_bv;?></h5>
                                       </td>
                                    </tr>
                                    
                                    <tr>
                                       <th>Grand Total:</th>
                                       <td class="text-primary">
                                          <h5 class="text-semibold"><?php echo number_format($order_info->final_price,2)." ".currency();?></h5>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 col-lg-9 content-group">
                        <h5>Deliver Address:</h5>
                        <div class="table-responsive">
                           <table class="table table-lg table-striped table-hover">
                              <tbody>
                                 <tr>
                                    <th>Name</th>
                                    <th><?php echo $delivery_info->name;?></th>
                                 </tr>
								 <tr>
                                    <th>Mobile No.</th>
                                    <th><?php echo $delivery_info->mobile_no;?></th>
                                 </tr>
								 <tr>
                                    <th>State</th>
                                    <th><?php echo $delivery_info->state;?></th>
                                 </tr>
								 <tr>
                                    <th>City</th>
                                    <th><?php echo $delivery_info->city;?></th>
                                 </tr>
								 <tr>
                                    <th>Address</th>
                                    <th><?php echo $delivery_info->address;?></th>
                                 </tr>
								<tr>
                                    <th>Landmark</th>
                                    <th><?php echo $delivery_info->landmark;?></th>
                                </tr>
								<tr>
                                    <th>Alternate Mobile No.</th>
                                    <th><?php echo $delivery_info->alternate_mobile_no;?></th>
                                 </tr> 
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <p class="text-muted">Thank you from Global Jivan</p>
               </div>
        </div>	
	<?php 
	}//end function
}//end class
?>	
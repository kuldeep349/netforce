<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package user/ewallet
*/
class Eshop extends Common_Controller 
{
	private $moduleName;
	private $userId;
	private $role;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		user_auth();
		$this->load->model('eshop_model');
		//$this->load->model('User_model');
		$this->load->helper("layout_helper");	
		$this->load->helper("commission_helper");	
		$this->load->helper("registration_helper");	
		$this->userId=$this->session->userdata('user_id');
		$this->user_id=$this->session->userdata('user_id');
		$this->moduleName=$this->router->fetch_module();
		$this->role='2';
	} 
	
	
	public function index()
	{
		$data=array();
		$result=$this->db->query("select(select count(order_id) from eshop_organic_orders) as total_order,(select count(order_id) from eshop_organic_orders where order_status='0') as pending_order,(select count(order_id) from eshop_organic_orders where order_status='1') as confirmed_order,(select count(order_id) from eshop_organic_orders where order_status='2') as rejected_order,(select count(order_id) from eshop_organic_orders where order_status='3') as delivered_order")->row_array();
		$data['order_data']=$result;
		$data['module_name']=$this->moduleName;
		_userLayout("ecommerce/eshop-mgmt/eshop-dashboard",$data);
	}

	public function addNewProduct()
	{
	    //pr($_POST); exit;
		if(!empty($this->input->post('btn')))
		{
			$parent_category_id=$this->input->post('parent_category_id');
			$category_id=$this->input->post('category_id');
			$title=$this->input->post('title');
			$old_price=$this->input->post('old_price');
			$new_price=$this->input->post('new_price');
			$qty=$this->input->post('qty');
			$sku=$this->input->post('sku');
			$status=$this->input->post('status');
			$tax=$this->input->post('tax');
			$shipment_charge=$this->input->post('shipment_charge');
			$description=$this->input->post('description');
			$long_description=$this->input->post('long_description');
			$featured=$this->input->post('featured');
			$role=$this->role;
			////////////////////////////////////////////////////////////////
			$direct_commission=$this->input->post('direct_commission');
			$guest_point=$this->input->post('guest_point');
			
			$level_commission=$this->input->post('level_commission');
			
			
			////////////////////////////////////////////////////////////
			
			
			$image_upload_path='/product_images/';
	        $product_image=adImageUpload($_FILES['product_image'],1, $image_upload_path);
			
			 $update_sub_img=array();
			 for($i=0;$i<count($_FILES['sub_img']['name']);$i++)
			 {
				 $sub_image=array(
				 'name'=>$_FILES['sub_img']['name'][$i],
				 'type'=>$_FILES['sub_img']['type'][$i],
				 'tmp_name'=>$_FILES['sub_img']['tmp_name'][$i],
				 'error'=>$_FILES['sub_img']['error'][$i],
				 'size'=>$_FILES['sub_img']['size'][$i]	
				 );
				
				$uploaded_sub_img=adImageUpload($sub_image,1, $image_upload_path);	
				
				$update_sub_img[]=array(
				'sub_img'=>$uploaded_sub_img
				);
			 }
			$insert_data = array(
			'user_id'=>$this->user_id,
            'parent_category_id'=>$parent_category_id,
			'category_id' => $category_id,
            'product_image' => $product_image,
            'title' => $title,
            'old_price' => $old_price,
			'new_price'=>$new_price,
			'sku'=>$sku,
			'status'=>$status,
			'description'=>$description,
			'long_description'=>$long_description,
			'featured'=>$featured,
			'role'=>$this->role,
			'direct_commission'=>$direct_commission,
			'guest_point'=>$guest_point,
			'tax'=>$tax,
			'shipment_charge'=>$shipment_charge
            );
            $this->db->insert('eshop_products', $insert_data);
			$update_sub_img=serialize($update_sub_img);
			//////////////////////////////////
			$product_id=$this->db->insert_id();
			$this->db->update('eshop_products',array('sub_images'=>$update_sub_img),array('id'=>$product_id));
			//$this->db->insert('eshop_stock',array('product_id'=>$product_id,'qty'=>$qty,));
			/*$eshop_product_level_commission=array();
			if(!empty($level_commission))
			{
				$level=1;
				foreach($level_commission as $k=>$commission)
				{
					$eshop_product_level_commission[]=array(
					'product_id'=>$product_id,
					'level'=>$level,
					'commission'=>$commission,
					);
				    $level++;
				}
			}
			if(!empty($eshop_product_level_commission))
			{
				$this->db->insert_batch('eshop_product_level_commission',$eshop_product_level_commission);	
			}*/
			////////////////////
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Product Added Successfully</span>');
			//redirect(site_url().$this->moduleName."/eshop/allProductList");
			echo "<script>window.location.href='".site_url().$this->moduleName."/eshop/allProductList"."';</script>";
			exit();
			
		}
		 $result=$this->db->query("SELECT * from eshop_category")->result_array();
		 $data['all_category']=$result;
		 $data['module_name']=$this->moduleName;
		_adminLayout("ecommerce/eshop-mgmt/add-product",$data);
	}

	public function productHistory(){
		$data=array();
		$result=$this->db->select("*")->from("eshop_products")->where("user_id",$this->session->userdata('user_id'))->get()->result_array();
		$data['productHistory']=$result;
		$data['module_name']=$this->moduleName;
		// echo '<pre>';
		// print_r($data);
		_userLayout("ecommerce/eshop-mgmt/productHistory",$data);
	}

	public function getAjaxSubCategory()
	{
		$parent_category_id=$this->input->post('parent_category_id');
		$result=$this->db->select('*')->from('eshop_subcategory')->where(array('parent_id'=>$parent_category_id,'active_status'=>'1'))->get()->result();
		//$this->output->set_content_type('application/json')->set_output(json_encode($result));
		//echo json_encode($result);
		//pr($result);
		$str='';
		foreach($result as $val)
		{
		    $str.="<option value='".$val->id."'>".$val->subcategory_name."</option>";
		}
		echo $str;
		
	}
	
	public function ourStore()
	{
		$all_category=$this->eshop_model->getCategory();
		$data['all_category']=$all_category;
		$data['module_name']=$this->moduleName;
		$data['controller'] = $this;
		_userLayout("ecommerce/eshop-mgmt/our-store",$data);
	}

	public function ourStore2()
	{
		$all_category=$this->eshop_model->getCategory2();
		$data['all_category']=$all_category;
		$data['module_name']=$this->moduleName;
		$data['controller'] = $this;
		_userLayout("ecommerce/eshop-mgmt/our-store2",$data);
	}
	
	public function generateUniqueOrderId()
	{
	    $random_number="OR".mt_rand(100000, 999999);
	    if($this->db->select('order_id')->from('eshop_organic_orders')->where('order_id',$random_number)->get()->num_rows()>0)
	    {
	      $this->generateUniqueOrderId();
	    }
	    return $random_number;
	}
	public function ourCart()
	{
	    /*$order_id=$this->session->userdata('cart_order_id');
	    if($order_id=='')
	    {
		$order_id=$this->generateUniqueOrderId();
		$this->session->set_userdata('cart_order_id',$order_id);
	    }*/
	    $collection_center=$this->db->select('*')->from('collection_center')->get()->result();
	    $cart_item=$this->session->userdata('cart');
	    //$this->session->unset_userdata('cart_order_id');
		if($cart_item)
		{
	    $output .= '
          <div class="table-responsive">
             <table class="table table-bordered table-striped">
              <thead>
              <tr>
               <th>Product Name</th>
               <th>SKU</th>
               <th>Price</th>
               <th>BV</th>
               <th>Qty</th>
              <th>Remove</th>
              </tr>
              </thead>
              <tbody>
          ';
		
		//pr($cart_item);
          foreach($cart_item as $item)
          {
              $row=$this->db->query("select * from eshop_organic_products where id='".$item['product_id']."'")->row();
          $price=$item['qty']*$row->new_price;
              $pv=$item['qty']*$row->guest_point;
              $tqty=$tqty+$item['qty'];
              $tprice=$tprice+$price;
              $tpv=$tpv+$pv;
              $total_tax=$total_tax+$item['tax'];
              $total_ship=$total_ship+$item['shipment_charge'];
          $output .= '
              <tr>
             
               <td>'.$row->title.'</td>
               <td>'.$row->sku.'</td>
               <td>'.currency().$price.'</td>
               <td>'.$pv.'</td>
               
               <td><input type="text" name="qty" class="form-control" value="'.$item['qty'].'" onchange="updatecart('.$row->id.',this.value)">';
               if($flag)
               {
                   $output .='<span style="color:red;">Total Stock '.$stock_data['qty'].'</span>';
               }
               $output .='</td>
               <td><a class="btn btn-warning" href="javscript:void(0)" onclick="removefromcart('.$row->id.')">Remove</a></td>
              </tr>
            ';
          }
          $output .= '
          </tbody>
          <tfoot>
              <tr>
               <td>&nbsp;</td>
               <td>Sub Total</td>
               <td>'.currency().$tprice.'</td>
               <td>'.$tpv.'</td>
               <td>&nbsp;</td>
               
              </tr>
              <tr>
               <td>&nbsp;</td>
               <td>Tax</td>
               <td>'.currency().$total_tax.'</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
              </tr>
              <tr>
               <td>&nbsp;</td>
               <td>Shipment Charge</td>
               <td>'.currency().$total_ship.'</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
              </tr>
              <tr>
               <td>&nbsp;</td>
               <td>Grand Total</td>
               <td>'.currency().$this->session->userdata('cart_final_price').'</td>
               <td>'.$tpv.'</td>
               <td>'.$tqty.'</td>
               
              </tr>
              <tr>';
              $output.='
               <td><a class="btn btn-primary" href="ourStore">Add More</a></td>
              
               <td colspan="2">Select Stockist</td>
               <td colspan="2">';
               $output.='<select class="form-control" name="stockist" id="stockist">';
               foreach($collection_center as $val)
               {
                   $output.='<option value="'.$val->id.'">'.$val->category_name.' '.$val->city_name.' '.$val->state_name.'</option>';
               }
               $output.='</select>';
              $output.='</td>
               <td><button class="btn btn-primary" onclick="proceedtopay()">Proceed To Pay</button></td>
              </tr>';
              $output.='<tr><td></td></tr>';
            $output.='</tfoot></table></div>';
		}
		else
		{
		    $output.='<div class="table-responsive">
             <table class="table table-bordered table-striped">
              <tfoot>
              <tr>
               <td colspan="5">No Item In Cart.</td>
               
              </tr></tfoot></table></div>';
		}
           // echo $output; exit;
         $data['cartlistdetail']=$output;
         $data['order_id']=$order_id;
		$data['module_name']=$this->moduleName;
		$data['controller'] = $this;
		_userLayout("ecommerce/eshop-mgmt/our-cart",$data);
	}

	public function test2(){
		echo '<pre>';
		print_r($this->session->userdata('cart2'));
	}
	public function test(){
		echo '<pre>';
		print_r($this->session->userdata('cart'));
	}

	public function ourCart2()
	{
	    /*$order_id=$this->session->userdata('cart_order_id');
	    if($order_id=='')
	    {
		$order_id=$this->generateUniqueOrderId();
		$this->session->set_userdata('cart_order_id',$order_id);
	    }*/
	    $collection_center=$this->db->select('*')->from('collection_center')->get()->result();
	    $cart_item=$this->session->userdata('cart2');
	    //$this->session->unset_userdata('cart_order_id');
		if($cart_item)
		{
	    $output .= '
          <div class="table-responsive">
             <table class="table table-bordered table-striped">
              <thead>
              <tr>
               <th>Product Name</th>
               <th>SKU</th>
               <th>Price</th>
               <th>BV</th>
               <th>Qty</th>
              <th>Remove</th>
              </tr>
              </thead>
              <tbody>
          ';
		
		//pr($cart_item);
          foreach($cart_item as $item)
          {
              $row=$this->db->query("select * from eshop_products where id='".$item['product_id']."'")->row();
          $price=$item['qty']*$row->new_price;
              $pv=$item['qty']*$row->guest_point;
              $tqty=$tqty+$item['qty'];
              $tprice=$tprice+$price;
              $tpv=$tpv+$pv;
              $total_tax=$total_tax+$item['tax'];
              $total_ship=$total_ship+$item['shipment_charge'];
          $output .= '
              <tr>
             
               <td>'.$row->title.'</td>
               <td>'.$row->sku.'</td>
               <td>'.currency().$price.'</td>
               <td>'.$pv.'</td>
               
               <td><input type="text" name="qty" class="form-control" value="'.$item['qty'].'" onchange="updatecart('.$row->id.',this.value)">';
               if($flag)
               {
                   $output .='<span style="color:red;">Total Stock '.$stock_data['qty'].'</span>';
               }
               $output .='</td>
               <td><a class="btn btn-warning" href="javscript:void(0)" onclick="removefromcart('.$row->id.')">Remove</a></td>
              </tr>
            ';
          }
          $output .= '
          </tbody>
          <tfoot>
              <tr>
               <td>&nbsp;</td>
               <td>Sub Total</td>
               <td>'.currency().$tprice.'</td>
               <td>'.$tpv.'</td>
               <td>&nbsp;</td>
               
              </tr>
              <tr>
               <td>&nbsp;</td>
               <td>Tax</td>
               <td>'.currency().$total_tax.'</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
              </tr>
              <tr>
               <td>&nbsp;</td>
               <td>Shipment Charge</td>
               <td>'.currency().$total_ship.'</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
              </tr>
              <tr>
               <td>&nbsp;</td>
               <td>Grand Total</td>
               <td>'.currency().$this->session->userdata('cart2_final_price').'</td>
               <td>'.$tpv.'</td>
               <td>'.$tqty.'</td>
               
              </tr>
              <tr>';
              $output.='
               <td><a class="btn btn-primary" href="ourStore2">Add More</a></td>
              
               <td colspan="2">Select Stockist</td>
               <td colspan="2">';
               $output.='<select class="form-control" name="stockist" id="stockist">';
               foreach($collection_center as $val)
               {
                   $output.='<option value="'.$val->id.'">'.$val->category_name.' '.$val->city_name.' '.$val->state_name.'</option>';
               }
               $output.='</select>';
              $output.='</td>
               <td><button class="btn btn-primary" onclick="proceedtopay()">Proceed To Pay</button></td>
              </tr>';
              $output.='<tr><td></td></tr>';
            $output.='</tfoot></table></div>';
		}
		else
		{
		    $output.='<div class="table-responsive">
             <table class="table table-bordered table-striped">
              <tfoot>
              <tr>
               <td colspan="5">No Item In Cart.</td>
               
              </tr></tfoot></table></div>';
		}
           // echo $output; exit;
         $data['cartlistdetail']=$output;
         $data['order_id']=$order_id;
		$data['module_name']=$this->moduleName;
		$data['controller'] = $this;
		_userLayout("ecommerce/eshop-mgmt/our-cart2",$data);
	}

	public function generateInvoice($typw=NULL,$center=NULL ,$product_type = '')
	{
	    if($center!='')
	    {
	        $collection_center=$this->db->select('*')->from('collection_center')->where('id',$center)->get()->row();
	        //pr($collection_center);
	        $stockist_name=$collection_center->category_name;
	        $address=$collection_center->address;
	        $city_name=$collection_center->city_name;
	        $state_name=$collection_center->state_name;
	        $country_name=$collection_center->country_name;
	        $manager_phone=$collection_center->manager_phone;
	        $manager_email=$collection_center->manager_email;
	        $this->session->set_userdata('stockist_id',$center);
	    }
	    $order_id=$this->session->userdata('cart_order_id');
	    $this->session->set_userdata('cart_paymode',$typw);
	    if($order_id=='')
	    {
		$order_id=$this->generateUniqueOrderId();
		$this->session->set_userdata('cart_order_id',$order_id);
		}
		//if(!empty($cart_item=$this->session->userdata('cart'))){
		 	$cart_item=$this->session->userdata('cart');
		// 	$table = 'eshop_organic_products';
		// }elseif(!empty($cart_item=$this->session->userdata('cart2'))){
		// 	$cart_item=$this->session->userdata('cart2');
		// 	$table = 'eshop_products';
		// }
	    //$this->session->unset_userdata('cart_order_id');
		if($cart_item)
		{
	    $output .= '
          <div class="table-responsive">
             <table class="table table-bordered table-striped">
              <thead>
              <tr>
               <th>Product Name</th>
               <th>SKU</th>
               <th>Price</th>
               <th>BV</th>
               <th>Qty</th>
              
              </tr>
              </thead>
              <tbody>
          ';
		
			//pr($cart_item);
          foreach($cart_item as $item)
          {
              $row=$this->db->query("select * from eshop_organic_products where id='".$item['product_id']."'")->row();//pr($row);
          	  $price=$item['qty']*$row->new_price;
              $pv=$item['qty']*$row->guest_point;
              $tqty=$tqty+$item['qty'];
              $tprice=$tprice+$price;
              $tpv=$tpv+$pv;
              $total_tax=$total_tax+$item['tax'];
              $total_ship=$total_ship+$item['shipment_charge'];
              //check if product come under category capsule then does not allow to product wallet
              if($row->category_id=='5')
              {
                  $product_wallet='1';
              }
          $output .= '
              <tr>
             
               <td>'.$row->title.'</td>
               <td>'.$row->sku.'</td>
               <td>'.currency().$price.'</td>
               <td>'.$pv.'</td>
               
               <td>'.$item['qty'].'</tr>';
               
              
          }
          $output .= '
          </tbody>
          <tfoot>
              <tr>
               <td>&nbsp;</td>
               <td>Sub Total</td>
               <td>'.currency().$tprice.'</td>
               <td>'.$tpv.'</td>
               <td>&nbsp;</td>
               
              </tr>
              <tr>
               <td>&nbsp;</td>
               <td>Tax</td>
               <td>'.currency().$total_tax.'</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
              </tr>
              <tr>
               <td>&nbsp;</td>
               <td>Shipment Charge</td>
               <td>'.currency().$total_ship.'</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
              </tr>
              <tr>
               <td>&nbsp;</td>
               <td>Grand Total</td>
               <td>'.currency().$this->session->userdata('cart_final_price').'</td>
               <td>'.$tpv.'</td>
               <td>'.$tqty.'</td>
               
              </tr>
              <tr>
              <td colspan="2">Stockist Name</td>
               <td colspan="3">'.$stockist_name.'</td>
               </tr>
              <tr><td colspan="2">Stockist Address</td>
               <td colspan="3">'.$address.'</td>
               </tr>
              <tr><td colspan="2">Stockist City</td>
               <td colspan="3">'.$city_name.'</td>
               </tr>
              <tr><td colspan="2">Stockist State</td>
               <td colspan="3">'.$state_name.'</td>
               </tr>
              <tr><td colspan="2">Stockist Country</td>
               <td colspan="3">'.$country_name.'</td>
               </tr>
              <tr><td colspan="2">Manager Phone</td>
               <td colspan="3">'.$manager_phone.'</td>
               </tr>
              <tr><td colspan="2">Manager Email</td>
               <td colspan="3">'.$manager_email.'</td>
               ';
               $output.='</tr>
              <tr>
               <td>Paymnet Mode</td>
				   <td>';
			if($product_type == 'organic'){
				$output .= '<input type="radio" name="payment_mode" class="'.$product_wallet.'" value="product_ewallet" checked> &nbsp; Product Wallet';
			}
				   
	$output .= '	<input type="radio" name="payment_mode" value="bank" checked> &nbsp; Bank
					<!-- <input type="radio" name="payment_mode" value="perfect_money" checked> &nbsp; Perfect Money-->
					<input type="radio" name="payment_mode" value="ewallet" checked> &nbsp; E-Wallet
					<input type="radio" name="payment_mode" value="paystack" checked> &nbsp; Debit Card
			   	</td>
               
               <!--<td><input type="radio" name="payment_mode" value="paystack"> &nbsp; Paystack</td>-->
               <td><button class="btn btn-primary" onclick="proceedtopay1()">Proceed To Pay</button></td>
              </tr>
            </tfoot></table></div>';
		}
		else
		{
		    $output.='<div class="table-responsive">
             <table class="table table-bordered table-striped">
              <tfoot>
              <tr>
               <td colspan="5">No Item In Cart.</td>
               
              </tr></tfoot></table></div>';
		}
           // echo $output; exit;
         $data['cartlistdetail']=$output;
         $data['order_id']=$order_id;
		$data['module_name']=$this->moduleName;
		$data['controller'] = $this;
		_userLayout("ecommerce/eshop-mgmt/our-cart",$data);
	}

	public function generateInvoice2($typw=NULL,$center=NULL ,$product_type = '')
	{
	    if($center!='')
	    {
	        $collection_center=$this->db->select('*')->from('collection_center')->where('id',$center)->get()->row();
	        $stockist_name=$collection_center->category_name;
	        $address=$collection_center->address;
	        $city_name=$collection_center->city_name;
	        $state_name=$collection_center->state_name;
	        $country_name=$collection_center->country_name;
	        $manager_phone=$collection_center->manager_phone;
	        $manager_email=$collection_center->manager_email;
	        $this->session->set_userdata('stockist_id',$center);
	    }
	    $order_id=$this->session->userdata('cart_order_id');
	    $this->session->set_userdata('cart_paymode',$typw);
	    if($order_id=='')
	    {
		$order_id=$this->generateUniqueOrderId();
		$this->session->set_userdata('cart_order_id',$order_id);
		}
		//if(!empty($cart_item=$this->session->userdata('cart'))){
		 	$cart_item=$this->session->userdata('cart2');
		// 	$table = 'eshop_organic_products';
		// }elseif(!empty($cart_item=$this->session->userdata('cart2'))){
		// 	$cart_item=$this->session->userdata('cart2');
		// 	$table = 'eshop_products';
		// }
	    //$this->session->unset_userdata('cart_order_id');
		if($cart_item)
		{
	    $output .= '
          <div class="table-responsive">
             <table class="table table-bordered table-striped">
              <thead>
              <tr>
               <th>Product Name</th>
               <th>SKU</th>
               <th>Price</th>
               <th>BV</th>
               <th>Qty</th>
              
              </tr>
              </thead>
              <tbody>
          ';
		
			//pr($cart_item);
          foreach($cart_item as $item)
          {
              $row=$this->db->query("select * from eshop_products where id='".$item['product_id']."'")->row();
          	  $price=$item['qty']*$row->new_price;
              $pv=$item['qty']*$row->guest_point;
              $tqty=$tqty+$item['qty'];
              $tprice=$tprice+$price;
              $tpv=$tpv+$pv;
              $total_tax=$total_tax+$item['tax'];
              $total_ship=$total_ship+$item['shipment_charge'];
          $output .= '
              <tr>
             
               <td>'.$row->title.'</td>
               <td>'.$row->sku.'</td>
               <td>'.currency().$price.'</td>
               <td>'.$pv.'</td>
               
               <td>'.$item['qty'].'</tr>';
               
              
          }
          $output .= '
          </tbody>
          <tfoot>
              <tr>
               <td>&nbsp;</td>
               <td>Sub Total</td>
               <td>'.currency().$tprice.'</td>
               <td>'.$tpv.'</td>
               <td>&nbsp;</td>
               
              </tr>
              <tr>
               <td>&nbsp;</td>
               <td>Tax</td>
               <td>'.currency().$total_tax.'</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
              </tr>
              <tr>
               <td>&nbsp;</td>
               <td>Shipment Charge</td>
               <td>'.currency().$total_ship.'</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               
              </tr>
              <tr>
               <td>&nbsp;</td>
               <td>Grand Total</td>
               <td>'.currency().$this->session->userdata('cart2_final_price').'</td>
               <td>'.$tpv.'</td>
               <td>'.$tqty.'</td>
               
              </tr>
              <tr>
              <td colspan="2">Stockist Name</td>
               <td colspan="3">'.$stockist_name.'</td>
               </tr>
              <tr><td colspan="2">Stockist Address</td>
               <td colspan="3">'.$address.'</td>
               </tr>
              <tr><td colspan="2">Stockist City</td>
               <td colspan="3">'.$city_name.'</td>
               </tr>
              <tr><td colspan="2">Stockist State</td>
               <td colspan="3">'.$state_name.'</td>
               </tr>
              <tr><td colspan="2">Stockist Country</td>
               <td colspan="3">'.$country_name.'</td>
               </tr>
              <tr><td colspan="2">Manager Phone</td>
               <td colspan="3">'.$manager_phone.'</td>
               </tr>
              <tr><td colspan="2">Manager Email</td>
               <td colspan="3">'.$manager_email.'</td>
               ';
               $output.='</tr>
              <tr>
               <td>Paymnet Mode</td>
				   <td>';
			if($product_type == 'organic'){
				$output .= '<input type="radio" name="payment_mode" value="product_ewallet" checked> &nbsp; Product Wallet';
			}
				   
	$output .= '	<input type="radio" name="payment_mode" value="bank" checked> &nbsp; Bank
					<!-- <input type="radio" name="payment_mode" value="perfect_money" checked> &nbsp; Perfect Money-->
					<input type="radio" name="payment_mode" value="ewallet" checked> &nbsp; E-Wallet
					<input type="radio" name="payment_mode" value="paystack" checked> &nbsp; Debit Card
			   	</td>
               
               <!--<td><input type="radio" name="payment_mode" value="paystack"> &nbsp; Paystack</td>-->
               <td><button class="btn btn-primary" onclick="proceedtopay1()">Proceed To Pay</button></td>
              </tr>
            </tfoot></table></div>';
		}
		else
		{
		    $output.='<div class="table-responsive">
             <table class="table table-bordered table-striped">
              <tfoot>
              <tr>
               <td colspan="5">No Item In Cart.</td>
               
              </tr></tfoot></table></div>';
		}
           // echo $output; exit;
         $data['cartlistdetail']=$output;
         $data['order_id']=$order_id;
		$data['module_name']=$this->moduleName;
		$data['controller'] = $this;
		_userLayout("ecommerce/eshop-mgmt/our-cart2",$data);
	}

	public function paystack()
	{
			$user_id=$this->session->userdata('user_id');
			$user_info=$this->db->select('email')->from('user_registration')->where('user_id',$user_id)->get()->row();
		
		if(!empty($this->session->userdata('cart')) && !empty($this->session->userdata('total_products')) && !empty($this->session->userdata('cart_final_price')))
		{
			 $data=array();
			 $data['email']=$user_info->email;
			_userLayout("ecommerce/eshop-mgmt/paystack_payment",$data);
		}
		else 
		{
			redirect(site_url().'user/eshop/ourStore');
			exit;	
		}
	}
	public function paystackPayment()
	{
		$result=(!empty($_POST))?$_POST:$_GET;
		$transaction_no=$result['reference'];
		$transaction_report=$this->verifyTransaction($transaction_no);
		if(!empty($transaction_report->status) && $transaction_report->status==1 )
		{
			
		  if(!empty($this->session->userdata('cart')) && !empty($this->session->userdata('total_products')) && !empty($this->session->userdata('cart_final_price')))
				{
				$cart=(object)$this->session->userdata('cart');
				$order_id=$this->generateUniqueOrderId();
				//	pr($cart); exit;
				$bonus_date=date('Y-m-d');
				foreach($cart as $product)
				{
					$product=(object)$product;
					$product_stock_info=$this->db->select(array('qty','total_order','guest_point'))->from('eshop_organic_products')->where('id',$product->product_id)->get()->row();
					$final_stock=$product_stock_info->qty-$product->qty;
					$total_order=$product_stock_info->total_order+1;
					$guest_point=$product_stock_info->guest_point;
				    	$this->db->update('eshop_organic_products',array('qty'=>$final_stock,'total_order'=>$total_order),array('id'=>$product->product_id));
					$this->db->update('eshop_stock',array('assign_web'=>$final_stock),array('product_id'=>$product->product_id));
					$commission_info=$this->db->select('*')->from('eshop_product_level_commission')->where('product_id',$product->product_id)->get()->result();
					//print_r($commission_info);
					$product_id=$product->product_id;
					foreach($commission_info as $comkey=>$comval)
					{
    					$level=$comval->level;
    					$commission=$comval->commission;
    					
    					//echo "level:".$level."##Commission:".$commission."##user id".$user_id."<br>";
    					
        				$nom_info=$this->db->select('income_id')->from('matrix_downline')->where(array('down_id'=>$user_id,'level'=>$level))->get()->row();
                        $ref_id=$nom_info->income_id;
    				    if($ref_id!='' && $ref_id!='cmp')
    				    {
        					$this->db->insert('eshop_bonus',array(
            				'order_id'=>$order_id,
            				'user_id'=>$user_id,
            				'income_id'=>$ref_id,
            				'product_id'=>$product_id,
            				'commission'=>$commission,
            				'level'=>$level,
            				'status'=>'1',
            				'bonus_date'=>$bonus_date
            				));
            				
            				$query_obj=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$ref_id)->get()->row();
                        	$balance=$query_obj->amount+$commission;
                        	$this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$ref_id));
                    	
                        	$this->db->insert('credit_debit',array(
                        	    'transaction_no'=>generateUniqueTranNo(),
                        	    'user_id'=>$ref_id,
                        	    'credit_amt'=>$commission,
                        	    'debit_amt'=>'0',
                        	    'balance'=>$balance,
                        	    'admin_charge'=>'0',
                        	    'receiver_id'=>$ref_id,
                        	    'sender_id'=>$user_id,
                        	    'receive_date'=>date('d-m-Y'),
                        	    'tran_description'=>currency().$commission.' Commission by '.$ref_id,
                        	    'description'=> 'Repurchase Amount',
                        	    'status'=>'1',
                        	    'payment_method'=>'1',
                        	    'payment_method_name'=>'E-wallet',
                        	    'current_url'=>site_url(),
                        	    'reason'=>'1'
                                ));
    				    }
					}
				}
				//exit;
				
				$role=$this->session->userdata('userType');
				$user_id=null;
				$guest_id=null;
				if($role=='2')
				{
					$user_id=$this->session->userdata('user_id');
				}
				else if($role=='3')
				{
					$guest_id=$this->session->userdata('user_id');
				}
				$cart_final_price=$this->session->userdata('cart_final_price');
				$cart_final_bv=$this->session->userdata('cart_final_bv');
				$center=$this->session->userdata('stockist_id');
				$this->db->insert('eshop_organic_orders',array(
				'order_id'=>$order_id,
				'role'=>(string)$role,
				'user_id'=>$user_id,
				'guest_id'=>$center,
				'order_details'=>json_encode($this->session->userdata('cart')),
				'total_products'=>$this->session->userdata('total_products'),
				'discount'=>0,
				'final_price'=>$cart_final_price,
				'final_bv'=>$cart_final_bv,
				'payment_method'=>'1'
				));

				/**for 10% commision */
				$query_obj=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$user_id)->get()->row();
				$balance=$query_obj->amount+($cart_final_price * 10 /100);
				$this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$user_id));
				$this->db->insert('credit_debit',array(
					'transaction_no'=>generateUniqueTranNo(),
					'user_id'=>$user_id,
					'credit_amt'=>($cart_final_price * 10 /100),
					'debit_amt'=>'0',
					'balance'=>$balance,
					'admin_charge'=>'0',
					'receiver_id'=>$user_id,
					'sender_id'=>$user_id,
					'receive_date'=>date('d-m-Y'),
					'tran_description'=>currency().($cart_final_price * 10 /100).' Commission Repurchase  ',
					'status'=>'0',
					'payment_method'=>'1',
					'payment_method_name'=>'Repurchase',
					'current_url'=>site_url(),
					'reason'=>'1'
					));
				/**for 10% commision */
				
				
				/////////////////////
				$this->session->unset_userdata('cart');
				$this->session->unset_userdata('total_products');
				$this->session->unset_userdata('cart_final_price');
				$this->session->unset_userdata('registration_with_cart');
				redirect(site_url().'user/eshop/order_successful?order_id='.$order_id);
				exit;
			}
			else 
			{
				
				redirect(site_url().'user/eshop/ourCart');
				exit;
			}
			$paydata = array(
        'user_id' => $user_id,
        'order_id'=>$order_id,
        'purpose'=>'2',
        'type'=>'organic_shop',
        'gateway_response' => $transaction_report->data->gateway_response,
        'status' => $transaction_report->status,
        'paid_at' => $transaction_report->data->paid_at,
        'amount' => $transaction_report->data->amount,
        'reference' => $transaction_report->data->reference,
        'pay_date' => date('Y-m-d'),
        'refrence_no' => $transaction_no
            );

          $this->db->insert('paystack_data', $paydata);
			
		  	
		  
		
		}
		else
		{
			$this->session->set_flashdata("error_msg", '<span class="text-semibold">Something wrong please try again later</span>');
			redirect(site_url().'user/eshop/ourCart');
			exit();
		}
		
		
		
	}
	public function verifyTransaction($transaction_no=null)
	{
			/////////////Second request with auth token
			$ch = curl_init();
			$token=TEST_SECRET_KEY;
			//$transaction_no='58313';
			curl_setopt($ch, CURLOPT_URL,"https://api.paystack.co/transaction/verify/".$transaction_no);
			//curl_setopt($ch, CURLOPT_POST, 0);

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				 'Authorization: Bearer '.$token
				));

			// receive server response ...
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$server_output = curl_exec ($ch);
			curl_close ($ch);

			$output=json_decode($server_output);
			return $output;
		///////////////////////
	}
	public function ProductewalletPayment()
	{
		$role=$this->session->userdata('userType');
		$all_payment_method=$this->db->select('*')->from('eshop_payment_method')->get()->result();
		$payment_method=array();
		foreach($all_payment_method as $method)
		{
			  $payment_method[$method->payment_method]=$method->payment_mode_status;
		}
		///////////////////////////////
		//pr($payment_method); exit;
		if(!empty($this->session->userdata('cart')) && !empty($this->session->userdata('total_products')) && !empty($this->session->userdata('cart_final_price')) && $role=='2' && $payment_method['ewallet']=='1')
		{
			 $data=array();
			_userLayout("ecommerce/eshop-mgmt/product_ewallet_payment",$data);
		}elseif(!empty($this->session->userdata('cart2')) && !empty($this->session->userdata('total2_products')) && !empty($this->session->userdata('cart2_final_price')) && $role=='2' && $payment_method['ewallet']=='1')
		{
			 $data=array();
			_userLayout("ecommerce/eshop-mgmt/product_ewallet_payment",$data);
		}
		else 
		{
			redirect(site_url().'user/eshop/ourStore');
			exit;	
		}
	}
	public function ProductewalletPaymentConfirm()
	{
	    
		if(!empty($this->input->post('ewallet_payment_btn')))
		{
			
				$user_id=$this->session->userdata('user_id');
				$role=$this->session->userdata('userType');
				//echo $role.'--'.$user_id; exit;
				if(empty($user_id) || empty($role) && ($role!='2'))
				{
					$this->session->set_flashdata('error_msg','Kindly login first!');
					redirect(site_url().'user/');
					exit;
				}
				
				$t_code=$this->input->post('t_password');
				$is_user_exist=$this->db->select('id')->from('user_registration')->where(array('user_id'=>$user_id,'t_code'=>$t_code,'active_status'=>'1'))->get()->num_rows();
				//echo $t_code.'##'.$is_user_exist; exit;
				if($is_user_exist<=0)
				{
					$this->session->set_flashdata('error_msg','Sorry , your transaction password is not correct!');
					redirect(site_url().'user/eshop/ewalletPayment');
					exit;	
				}
				$ewallet_info=$this->db->select('amount')->from('final_product_wallet')->where('user_id',$user_id)->get()->row();
				if($this->session->userdata('cart_final_price')>$ewallet_info->amount)
				{
					$this->session->set_flashdata('error_msg',"Sorry , you don't have sufficient fund in your wallet!");
					redirect(site_url().'user/eshop/ewalletPayment');
					exit;
				}elseif($this->session->userdata('cart2_final_price')>$ewallet_info->amount){
					$this->session->set_flashdata('error_msg',"Sorry , you don't have sufficient fund in your wallet!");
					redirect(site_url().'user/eshop/ewalletPayment');
					exit;
				}
				
				
				
				if(!empty($this->session->userdata('cart')) && !empty($this->session->userdata('total_products')) && !empty($this->session->userdata('cart_final_price')))
				{
				$cart=(object)$this->session->userdata('cart');
				$order_id=$this->generateUniqueOrderId();
				//	pr($cart); exit;
				$bonus_date=date('Y-m-d');
				foreach($cart as $product)
				{
					$product=(object)$product;
					$product_stock_info=$this->db->select(array('qty','total_order','guest_point'))->from('eshop_organic_products')->where('id',$product->product_id)->get()->row();
					$final_stock=$product_stock_info->qty-$product->qty;
					$total_order=$product_stock_info->total_order+1;
					$guest_point=$product_stock_info->guest_point;
				    	$this->db->update('eshop_organic_products',array('qty'=>$final_stock,'total_order'=>$total_order),array('id'=>$product->product_id));
					$this->db->update('eshop_stock',array('assign_web'=>$final_stock),array('product_id'=>$product->product_id));
					$commission_info=$this->db->select('*')->from('eshop_product_level_commission')->where('product_id',$product->product_id)->get()->result();
					//print_r($commission_info);
					$product_id=$product->product_id;
					foreach($commission_info as $comkey=>$comval)
					{
    					$level=$comval->level;
    					$commission=$comval->commission;
    					
    					//echo "level:".$level."##Commission:".$commission."##user id".$user_id."<br>";
    					
        				$nom_info=$this->db->select('income_id')->from('matrix_downline')->where(array('down_id'=>$user_id,'level'=>$level))->get()->row();
                        $ref_id=$nom_info->income_id;
    				    if($ref_id!='' && $ref_id!='cmp')
    				    {
        					$this->db->insert('eshop_bonus',array(
            				'order_id'=>$order_id,
            				'user_id'=>$user_id,
            				'income_id'=>$ref_id,
            				'product_id'=>$product_id,
            				'commission'=>$commission,
            				'level'=>$level,
            				'status'=>'1',
            				'bonus_date'=>$bonus_date
            				));
            				
            				$query_obj=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$ref_id)->get()->row();
                        	$balance=$query_obj->amount+$commission;
                        	$this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$ref_id));
                    	
                        	$this->db->insert('credit_debit',array(
                        	    'transaction_no'=>generateUniqueTranNo(),
                        	    'user_id'=>$ref_id,
                        	    'credit_amt'=>$commission,
                        	    'debit_amt'=>'0',
                        	    'balance'=>$balance,
                        	    'admin_charge'=>'0',
                        	    'receiver_id'=>$ref_id,
                        	    'sender_id'=>$user_id,
                        	    'receive_date'=>date('d-m-Y'),
                        	    'tran_description'=>currency().$commission.' Commission by '.$ref_id,
                        	    'status'=>'0',
                        	    'payment_method'=>'1',
                        	    'payment_method_name'=>'E-wallet',
                        	    'current_url'=>site_url(),
                        	    'reason'=>'1'
                                ));
    				    }
					}
					$order_type = 1;
				}
				//exit;
				
				$role=$this->session->userdata('userType');
				$user_id=null;
				$guest_id=null;
				if($role=='2')
				{
					$user_id=$this->session->userdata('user_id');
				}
				else if($role=='3')
				{
					$guest_id=$this->session->userdata('user_id');
				}
				$cart_final_price=$this->session->userdata('cart_final_price');
				$cart_final_bv=$this->session->userdata('cart_final_bv');
				$center=$this->session->userdata('stockist_id');
				$this->db->insert('eshop_organic_orders',array(
				'order_id'=>$order_id,
				'role'=>(string)$role,
				'user_id'=>$user_id,
				'guest_id'=>$center,
				'order_details'=>json_encode($this->session->userdata('cart')),
				'total_products'=>$this->session->userdata('total_products'),
				'discount'=>0,
				'final_price'=>$cart_final_price,
				'final_bv'=>$cart_final_bv,
				'payment_method'=>'2',
				'order_type' => $order_type,
				'order_status'=>'1'
				));
				
				// start manage pv
				/*$pv_info=$this->db->select('*')->from('matrix_downline')->where(array('down_id'=>$user_id))->get()->result();
				foreach($pv_info as $keypv=>$valpv)
				{
				    $datapv=array(
				        'down_id'=>$user_id,
				        'income_id'=>$valpv->income_id,
				        'level'=>$valpv->level,
				        'pv'=>$guest_point*$product->qty
				        );
				        $this->db->insert('matrix_downline_pv',$datapv);
				}
				$datapv=array(
				        'down_id'=>$user_id,
				        'income_id'=>$user_id,
				        'level'=>0,
				        'pv'=>$guest_point*$product->qty
				        );
				        $this->db->insert('matrix_downline_pv',$datapv);
				        
				        $pv=$guest_point*$product->qty;
				        $this->directrefferalcommission($user_id,$pv,$order_id);*/
				// end manage pv
				///////////////
				$query_obj=$this->db->select('amount')->from('final_product_wallet')->where('user_id',$user_id)->get()->row();
				 
				$balance=$query_obj->amount-$cart_final_price;
				
				$this->db->update('final_product_wallet',array('amount'=>$balance),array('user_id'=>$user_id));
				
				$this->db->insert('credit_debit_product',array(
					'transaction_no'=>generateUniqueTranNo(),
					'user_id'=>$user_id,
					'credit_amt'=>'0',
					'debit_amt'=>$cart_final_price,
					'balance'=>$balance,
					'admin_charge'=>'0',
					'order_id'=>$order_id,
					'receiver_id'=>$user_id,
					'sender_id'=>$user_id,
					'receive_date'=>date('d-m-Y'),
					'ttype'=>'Shopping done with order-id '.$order_id,
					'TranDescription'=>'Shopping done with order-id'.$order_id,
					'tran_description'=>'Shopping done with order-id'.$order_id,
					'status'=>'0',
					'payment_method'=>'1',
					'payment_method_name'=>'E-wallet',
					'current_url'=>site_url(),
					'reason'=>'30'
					));
				/////////////////////
				$amount = $cart_final_price*0.1;
				// $this->productIncome('credit_debit_product',$user_id,$amount,'E-wallet');
				// $this->productIncome('credit_debit_repurchase',$user_id,$amount,'E-wallet');
				$this->session->unset_userdata('cart');
				$this->session->unset_userdata('total_products');
				$this->session->unset_userdata('cart_final_price');
				$this->session->unset_userdata('registration_with_cart');
				redirect(site_url().'user/eshop/order_successful?order_id='.$order_id);
				exit;
			}elseif(!empty($this->session->userdata('cart2')) && !empty($this->session->userdata('total2_products')) && !empty($this->session->userdata('cart2_final_price')))
			{
			$cart=(object)$this->session->userdata('cart2');
			$order_id=$this->generateUniqueOrderId();
			//	pr($cart); exit;
			$bonus_date=date('Y-m-d');
			foreach($cart as $product)
			{
				$product=(object)$product;
				$product_stock_info=$this->db->select(array('qty','total_order','guest_point'))->from('eshop_organic_products')->where('id',$product->product_id)->get()->row();
				$final_stock=$product_stock_info->qty-$product->qty;
				$total_order=$product_stock_info->total_order+1;
				$guest_point=$product_stock_info->guest_point;
				$this->db->update('eshop_organic_products',array('qty'=>$final_stock,'total_order'=>$total_order),array('id'=>$product->product_id));
				$this->db->update('eshop_stock',array('assign_web'=>$final_stock),array('product_id'=>$product->product_id));
				$commission_info=$this->db->select('*')->from('eshop_product_level_commission')->where('product_id',$product->product_id)->get()->result();
				//print_r($commission_info);
				$product_id=$product->product_id;
				foreach($commission_info as $comkey=>$comval)
				{
					$level=$comval->level;
					$commission=$comval->commission;
					
					//echo "level:".$level."##Commission:".$commission."##user id".$user_id."<br>";
					
					$nom_info=$this->db->select('income_id')->from('matrix_downline')->where(array('down_id'=>$user_id,'level'=>$level))->get()->row();
					$ref_id=$nom_info->income_id;
					if($ref_id!='' && $ref_id!='cmp')
					{
						$this->db->insert('eshop_bonus',array(
						'order_id'=>$order_id,
						'user_id'=>$user_id,
						'income_id'=>$ref_id,
						'product_id'=>$product_id,
						'commission'=>$commission,
						'level'=>$level,
						'status'=>'1',
						'bonus_date'=>$bonus_date
						));
						
						$query_obj=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$ref_id)->get()->row();
						$balance=$query_obj->amount+$commission;
						$this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$ref_id));
					
						$this->db->insert('credit_debit',array(
							'transaction_no'=>generateUniqueTranNo(),
							'user_id'=>$ref_id,
							'credit_amt'=>$commission,
							'debit_amt'=>'0',
							'balance'=>$balance,
							'admin_charge'=>'0',
							'receiver_id'=>$ref_id,
							'sender_id'=>$user_id,
							'receive_date'=>date('d-m-Y'),
							'tran_description'=>currency().$commission.' Commission by '.$ref_id,
							'status'=>'0',
							'payment_method'=>'1',
							'payment_method_name'=>'E-wallet',
							'current_url'=>site_url(),
							'reason'=>'1'
							));
					}
				}
				$order_type = 2;
			}
			//exit;
			
			$role=$this->session->userdata('userType');
			$user_id=null;
			$guest_id=null;
			if($role=='2')
			{
				$user_id=$this->session->userdata('user_id');
			}
			else if($role=='3')
			{
				$guest_id=$this->session->userdata('user_id');
			}
			$cart_final_price=$this->session->userdata('cart2_final_price');
			$cart_final_bv=$this->session->userdata('cart2_final_bv');
			$center=$this->session->userdata('stockist_id');
			$this->db->insert('eshop_organic_orders',array(
			'order_id'=>$order_id,
			'role'=>(string)$role,
			'user_id'=>$user_id,
			'guest_id'=>$center,
			'order_details'=>json_encode($this->session->userdata('cart2')),
			'total_products'=>$this->session->userdata('total2_products'),
			'discount'=>0,
			'final_price'=>$cart_final_price,
			'final_bv'=>$cart_final_bv,
			'payment_method'=>'2',
			'order_type' => $order_type,
			'order_status'=>'1'
			));
			
			// start manage pv
			/*$pv_info=$this->db->select('*')->from('matrix_downline')->where(array('down_id'=>$user_id))->get()->result();
			foreach($pv_info as $keypv=>$valpv)
			{
				$datapv=array(
					'down_id'=>$user_id,
					'income_id'=>$valpv->income_id,
					'level'=>$valpv->level,
					'pv'=>$guest_point*$product->qty
					);
					$this->db->insert('matrix_downline_pv',$datapv);
			}
			$datapv=array(
					'down_id'=>$user_id,
					'income_id'=>$user_id,
					'level'=>0,
					'pv'=>$guest_point*$product->qty
					);
					$this->db->insert('matrix_downline_pv',$datapv);
					
					$pv=$guest_point*$product->qty;
					$this->directrefferalcommission($user_id,$pv,$order_id);*/
			// end manage pv
			///////////////
			$query_obj=$this->db->select('amount')->from('final_product_wallet')->where('user_id',$user_id)->get()->row();
			 
			$balance=$query_obj->amount-$cart_final_price;
			
			$this->db->update('final_product_wallet',array('amount'=>$balance),array('user_id'=>$user_id));
			
			$this->db->insert('credit_debit_product',array(
				'transaction_no'=>generateUniqueTranNo(),
				'user_id'=>$user_id,
				'credit_amt'=>'0',
				'debit_amt'=>$cart_final_price,
				'balance'=>$balance,
				'admin_charge'=>'0',
				'order_id'=>$order_id,
				'receiver_id'=>$user_id,
				'sender_id'=>$user_id,
				'receive_date'=>date('d-m-Y'),
				'ttype'=>'Shopping done with order-id '.$order_id,
				'TranDescription'=>'Shopping done with order-id'.$order_id,
				'tran_description'=>'Shopping done with order-id'.$order_id,
				'status'=>'0',
				'payment_method'=>'1',
				'payment_method_name'=>'E-wallet',
				'current_url'=>site_url(),
				'reason'=>'30'
				));
			/////////////////////
			$amount = $cart_final_price*0.1;
			// $this->productIncome('credit_debit_product',$user_id,$amount,'E-wallet');
			// $this->productIncome('credit_debit_repurchase',$user_id,$amount,'E-wallet');
			$this->session->unset_userdata('cart');
			$this->session->unset_userdata('total_products');
			$this->session->unset_userdata('cart_final_price');
			$this->session->unset_userdata('registration_with_cart');
			redirect(site_url().'user/eshop/order_successful?order_id='.$order_id);
			exit;
		}
			else 
			{
				
				redirect(site_url().'user/eshop/ourStore');
				exit;
			}
		}//end cash_payment btn if
		else 
		{
			if(!empty($this->session->userdata('cart')) && !empty($this->session->userdata('total_products')) && !empty($this->session->userdata('cart_final_price')))
			{
				redirect(site_url().'user/eshop/ewalletPayment');
			}
			else 
			{
				redirect(site_url().'user/eshop/ourStore');
				exit;	
			}
		}
	}
	public function ewalletPayment()
	{
		$role=$this->session->userdata('userType');//pr($this->session);
		$all_payment_method=$this->db->select('*')->from('eshop_payment_method')->get()->result();
		$payment_method=array();
		foreach($all_payment_method as $method)
		{
			  $payment_method[$method->payment_method]=$method->payment_mode_status;
		}
		///////////////////////////////
		//pr($payment_method); exit;
		if(!empty($this->session->userdata('cart')) && !empty($this->session->userdata('total_products')) && !empty($this->session->userdata('cart_final_price')) && $role=='2' && $payment_method['ewallet']=='1')
		{
			 $data=array();
			_userLayout("ecommerce/eshop-mgmt/ewallet_payment",$data);
		}elseif(!empty($this->session->userdata('cart2')) && !empty($this->session->userdata('total2_products')) && !empty($this->session->userdata('cart2_final_price')) && $role=='2' && $payment_method['ewallet']=='1')
		{
			 $data=array();
			_userLayout("ecommerce/eshop-mgmt/ewallet_payment",$data);
		}
		else 
		{
			redirect(site_url().'user/eshop/ourStore');
			exit;	
		}
	}
	
	public function ewalletPaymentConfirm()
	{
	    
		if(!empty($this->input->post('ewallet_payment_btn')))
		{
				$user_id=$this->session->userdata('user_id');//pr($this->session);
				//echo $this->session->userdata('cart_paymode');
				$role=$this->session->userdata('userType');
				//echo $role.'--'.$user_id; exit;
				if(empty($user_id) || empty($role) && ($role!='2'))
				{
					$this->session->set_flashdata('error_msg','Kindly login first!');
					redirect(site_url().'user/');
					exit;
				}
				
				$t_code=$this->input->post('t_password');
				$is_user_exist=$this->db->select('id')->from('user_registration')->where(array('user_id'=>$user_id,'t_code'=>$t_code,'active_status'=>'1'))->get()->num_rows();
				//echo $t_code.'##'.$is_user_exist; exit;
				if($is_user_exist<=0)
				{
					$this->session->set_flashdata('error_msg','Sorry , your transaction password is not correct!');
					redirect(site_url().'user/eshop/ewalletPayment');
					exit;	
				}
				$ewallet_info=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$user_id)->get()->row();
				if($this->session->userdata('cart_final_price')>$ewallet_info->amount)
				{
					$this->session->set_flashdata('error_msg',"Sorry , you don't have sufficient fund in your wallet!");
					redirect(site_url().'user/eshop/ewalletPayment');
					exit;
				}elseif($this->session->userdata('cart2_final_price')>$ewallet_info->amount){
					$this->session->set_flashdata('error_msg',"Sorry , you don't have sufficient fund in your wallet!");
					redirect(site_url().'user/eshop/ewalletPayment');
					exit;
				}
                
				
				if(!empty($this->session->userdata('cart')) && !empty($this->session->userdata('total_products')) && !empty($this->session->userdata('cart_final_price')) && $this->session->userdata('order_type') == 'organic')
				{
					$cart=(object)$this->session->userdata('cart');
					$order_id=$this->generateUniqueOrderId();
					//	pr($cart); exit;
					$bonus_date=date('Y-m-d');
					foreach($cart as $product)
					{
						$product=(object)$product;
						$product_stock_info=$this->db->select(array('qty','total_order','guest_point'))->from('eshop_organic_products')->where('id',$product->product_id)->get()->row();
						$final_stock=$product_stock_info->qty-$product->qty;
						$total_order=$product_stock_info->total_order+1;
						$guest_point=$product_stock_info->guest_point;
						$this->db->update('eshop_organic_products',array('qty'=>$final_stock,'total_order'=>$total_order),array('id'=>$product->product_id));
						$this->db->update('eshop_stock',array('assign_web'=>$final_stock),array('product_id'=>$product->product_id));
						$commission_info=$this->db->select('*')->from('eshop_product_level_commission')->where('product_id',$product->product_id)->get()->result();
						//print_r($commission_info);
						$product_id=$product->product_id;

						
						foreach($commission_info as $comkey=>$comval)
						{
							$level=$comval->level;
							$commission=$comval->commission;
							
							//echo "level:".$level."##Commission:".$commission."##user id".$user_id."<br>";
							
							$nom_info=$this->db->select('income_id')->from('matrix_downline')->where(array('down_id'=>$user_id,'level'=>$level))->get()->row();
							$ref_id=$nom_info->income_id;
							if($ref_id!='' && $ref_id!='cmp')
							{
								$this->db->insert('eshop_bonus',array(
								'order_id'=>$order_id,
								'user_id'=>$user_id,
								'income_id'=>$ref_id,
								'product_id'=>$product_id,
								'commission'=>$commission,
								'level'=>$level,
								'status'=>'1',
								'bonus_date'=>$bonus_date
								));
								
								$query_obj=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$ref_id)->get()->row();
								$balance=$query_obj->amount+$commission;
								$this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$ref_id));
							
								$this->db->insert('credit_debit',array(
									'transaction_no'=>generateUniqueTranNo(),
									'user_id'=>$ref_id,
									'credit_amt'=>$commission,
									'debit_amt'=>'0',
									'balance'=>$balance,
									'admin_charge'=>'0',
									'receiver_id'=>$ref_id,
									'sender_id'=>$user_id,
									'receive_date'=>date('d-m-Y'),
									'tran_description'=>currency().$commission.' Commission by '.$ref_id,
									'status'=>'0',
									'payment_method'=>'1',
									'payment_method_name'=>'E-wallet',
									'current_url'=>site_url(),
									'reason'=>'1'
									));
							}
						}
						
						$order_type = 1;
						
					}
					//exit;
				
					$role=$this->session->userdata('userType');
					$user_id=null;
					$guest_id=null;
					if($role=='2')
					{
						$user_id=$this->session->userdata('user_id');
					}
					else if($role=='3')
					{
						$guest_id=$this->session->userdata('user_id');
					}
					$cart_final_price=$this->session->userdata('cart_final_price');
					$cart_final_bv=$this->session->userdata('cart_final_bv');
					$center=$this->session->userdata('stockist_id');
					//$check = $this->db->select('id')->from('eshop_products')->where('id',$product_id)
					$this->db->insert('eshop_organic_orders',array(
					'order_id'=>$order_id,
					'role'=>(string)$role,
					'user_id'=>$user_id,
					'guest_id'=>$center,
					'order_details'=>json_encode($this->session->userdata('cart')),
					'total_products'=>$this->session->userdata('total_products'),
					'discount'=>0,
					'final_price'=>$cart_final_price,
					'final_bv'=>$cart_final_bv,
					'payment_method'=>'2',
					'order_type' => $order_type,
					'order_status'=>'1'
					));
					
					// start manage pv
					/*$pv_info=$this->db->select('*')->from('matrix_downline')->where(array('down_id'=>$user_id))->get()->result();
					foreach($pv_info as $keypv=>$valpv)
					{
						$datapv=array(
							'down_id'=>$user_id,
							'income_id'=>$valpv->income_id,
							'level'=>$valpv->level,
							'pv'=>$guest_point*$product->qty
							);
							$this->db->insert('matrix_downline_pv',$datapv);
					}
					$datapv=array(
							'down_id'=>$user_id,
							'income_id'=>$user_id,
							'level'=>0,
							'pv'=>$guest_point*$product->qty
							);
							$this->db->insert('matrix_downline_pv',$datapv);
							
							$pv=$guest_point*$product->qty;
							$this->directrefferalcommission($user_id,$pv,$order_id);*/
					// end manage pv
					///////////////
					$query_obj=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$user_id)->get()->row();
					
					$balance=$query_obj->amount-$cart_final_price;
					
					$this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$user_id));
					
					$this->db->insert('credit_debit',array(
						'transaction_no'=>generateUniqueTranNo(),
						'user_id'=>$user_id,
						'credit_amt'=>'0',
						'debit_amt'=>$cart_final_price,
						'balance'=>$balance,
						'admin_charge'=>'0',
						'order_id'=>$order_id,
						'receiver_id'=>$user_id,
						'sender_id'=>$user_id,
						'receive_date'=>date('d-m-Y'),
						'ttype'=>'Shopping done with order-id '.$order_id,
						'TranDescription'=>'Shopping done with order-id'.$order_id,
						'tran_description'=>'Shopping done with order-id'.$order_id,
						'status'=>'0',
						'payment_method'=>'1',
						'payment_method_name'=>'E-wallet',
						'current_url'=>site_url(),
						'reason'=>'30'
						));
					/////////////////////

					$amount = $cart_final_price*0.1;
					$this->productIncome('credit_debit_product',$user_id,$amount,'E-wallet');
					$this->productIncome('credit_debit_repurchase',$user_id,$amount,'E-wallet');
					$this->session->unset_userdata('cart');
					$this->session->unset_userdata('total_products');
					$this->session->unset_userdata('cart_final_price');
					$this->session->unset_userdata('registration_with_cart');
					redirect(site_url().'user/eshop/order_successful?order_id='.$order_id);
					exit;
				}elseif(!empty($this->session->userdata('cart2')) && !empty($this->session->userdata('total2_products')) && !empty($this->session->userdata('cart2_final_price')) && $this->session->userdata('order_type2') == 'eshop')
				{
					$cart=(object)$this->session->userdata('cart2');
					$order_id=$this->generateUniqueOrderId();
					//	pr($cart); exit;
					$bonus_date=date('Y-m-d');
					foreach($cart as $product)
					{
						$product=(object)$product;
						$product_stock_info=$this->db->select(array('qty','total_order','guest_point'))->from('eshop_organic_products')->where('id',$product->product_id)->get()->row();
						$final_stock=$product_stock_info->qty-$product->qty;
						$total_order=$product_stock_info->total_order+1;
						$guest_point=$product_stock_info->guest_point;
						$this->db->update('eshop_organic_products',array('qty'=>$final_stock,'total_order'=>$total_order),array('id'=>$product->product_id));
						$this->db->update('eshop_stock',array('assign_web'=>$final_stock),array('product_id'=>$product->product_id));
						$commission_info=$this->db->select('*')->from('eshop_product_level_commission')->where('product_id',$product->product_id)->get()->result();
						//print_r($commission_info);
						$product_id=$product->product_id;
						
						foreach($commission_info as $comkey=>$comval)
						{
							$level=$comval->level;
							$commission=$comval->commission;
							
							//echo "level:".$level."##Commission:".$commission."##user id".$user_id."<br>";
							
							$nom_info=$this->db->select('income_id')->from('matrix_downline')->where(array('down_id'=>$user_id,'level'=>$level))->get()->row();
							$ref_id=$nom_info->income_id;
							if($ref_id!='' && $ref_id!='cmp')
							{
								$this->db->insert('eshop_bonus',array(
								'order_id'=>$order_id,
								'user_id'=>$user_id,
								'income_id'=>$ref_id,
								'product_id'=>$product_id,
								'commission'=>$commission,
								'level'=>$level,
								'status'=>'1',
								'bonus_date'=>$bonus_date
								));
								
								$query_obj=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$ref_id)->get()->row();
								$balance=$query_obj->amount+$commission;
								$this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$ref_id));
							
								$this->db->insert('credit_debit',array(
									'transaction_no'=>generateUniqueTranNo(),
									'user_id'=>$ref_id,
									'credit_amt'=>$commission,
									'debit_amt'=>'0',
									'balance'=>$balance,
									'admin_charge'=>'0',
									'receiver_id'=>$ref_id,
									'sender_id'=>$user_id,
									'receive_date'=>date('d-m-Y'),
									'tran_description'=>currency().$commission.' Commission by '.$ref_id,
									'status'=>'0',
									'payment_method'=>'1',
									'payment_method_name'=>'E-wallet',
									'current_url'=>site_url(),
									'reason'=>'1'
									));
							}
						}
						
						$order_type = 2;
					}
					//exit;
				
					$role=$this->session->userdata('userType');
					$user_id=null;
					$guest_id=null;
					if($role=='2')
					{
						$user_id=$this->session->userdata('user_id');
					}
					else if($role=='3')
					{
						$guest_id=$this->session->userdata('user_id');
					}
					$cart_final_price=$this->session->userdata('cart2_final_price');
					$cart_final_bv=$this->session->userdata('cart2_final_bv');
					$center=$this->session->userdata('stockist_id');
					//$check = $this->db->select('id')->from('eshop_products')->where('id',$product_id)
					$this->db->insert('eshop_organic_orders',array(
					'order_id'=>$order_id,
					'role'=>(string)$role,
					'user_id'=>$user_id,
					'guest_id'=>$center,
					'order_details'=>json_encode($this->session->userdata('cart2')),
					'total_products'=>$this->session->userdata('total2_products'),
					'discount'=>0,
					'final_price'=>$cart_final_price,
					'final_bv'=>$cart_final_bv,
					'payment_method'=>'2',
					'order_type' => $order_type,
					'order_status'=>'1'
					));
					
					// start manage pv
					/*$pv_info=$this->db->select('*')->from('matrix_downline')->where(array('down_id'=>$user_id))->get()->result();
					foreach($pv_info as $keypv=>$valpv)
					{
						$datapv=array(
							'down_id'=>$user_id,
							'income_id'=>$valpv->income_id,
							'level'=>$valpv->level,
							'pv'=>$guest_point*$product->qty
							);
							$this->db->insert('matrix_downline_pv',$datapv);
					}
					$datapv=array(
							'down_id'=>$user_id,
							'income_id'=>$user_id,
							'level'=>0,
							'pv'=>$guest_point*$product->qty
							);
							$this->db->insert('matrix_downline_pv',$datapv);
							
							$pv=$guest_point*$product->qty;
							$this->directrefferalcommission($user_id,$pv,$order_id);*/
					// end manage pv
					///////////////
					$query_obj=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$user_id)->get()->row();
					
					$balance=$query_obj->amount-$cart_final_price;
					
					$this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$user_id));
					
					$this->db->insert('credit_debit',array(
						'transaction_no'=>generateUniqueTranNo(),
						'user_id'=>$user_id,
						'credit_amt'=>'0',
						'debit_amt'=>$cart_final_price,
						'balance'=>$balance,
						'admin_charge'=>'0',
						'order_id'=>$order_id,
						'receiver_id'=>$user_id,
						'sender_id'=>$user_id,
						'receive_date'=>date('d-m-Y'),
						'ttype'=>'Shopping done with order-id '.$order_id,
						'TranDescription'=>'Shopping done with order-id'.$order_id,
						'tran_description'=>'Shopping done with order-id'.$order_id,
						'status'=>'0',
						'payment_method'=>'1',
						'payment_method_name'=>'E-wallet',
						'current_url'=>site_url(),
						'reason'=>'30'
						));
					/////////////////////

					$amount = $cart_final_price*0.1;
					$this->productIncome('credit_debit_product',$user_id,$amount,'E-wallet');
					$this->productIncome('credit_debit_repurchase',$user_id,$amount,'E-wallet');
					$this->session->unset_userdata('cart2');
					$this->session->unset_userdata('total2_products');
					$this->session->unset_userdata('cart2_final_price');
					$this->session->unset_userdata('registration_with_cart');
					redirect(site_url().'user/eshop/order_successful?order_id='.$order_id);
					exit;
				}
				else 
				{
					
					redirect(site_url().'user/eshop/ourStore');
					exit;
				}
		}//end cash_payment btn if
		else 
		{
			if(!empty($this->session->userdata('cart')) && !empty($this->session->userdata('total_products')) && !empty($this->session->userdata('cart_final_price')))
			{
				redirect(site_url().'user/eshop/ewalletPayment');
			}
			else 
			{
				redirect(site_url().'user/eshop/ourStore');
				exit;	
			}
		}
	}// end if

	private function productIncome($table,$user_id,$amount,$method){
		//echo 'table'.$table.' User '.$user_id.' Amount '.$amount.' Method ' .$method;
		$oldbalance = $this->db->select("balance")->from($table)->where('user_id',$user_id)->order_by('id','DESC')->limit('1')->get()->row();
		$balance = $oldbalance->balance + $amount;
		$userIncome = [
			'transaction_no' => generateUniqueTranNo(),
			'user_id' => $user_id,
			'credit_amt' => $amount,
			'debit_amt' => 0,
			'balance' => $balance,
			'admin_charge' => 0,
			'receiver_id' => $user_id,
			'sender_id' => $user_id,
			'receive_date' => date('d-m-Y'),
			'ttype' => 'Product purchase income',
			'tranDescription' => 'Product purchase income',
			'Cause' => 'Product purchase income',
			'Remark' => 'Product purchase income',
			'status' => 1,
			'reason' => '1',
			'payment_method' => 1,
			'payment_method_name' => $method,

		];
		$this->db->insert($table,$userIncome);
	}

	public function order_successful()
	{
	    $data=array();
	    $order_id=$_GET['order_id'];
	    $data['order_id']=$order_id;
	    $data['module_name']=$this->moduleName;
	    _userLayout("ecommerce/eshop-mgmt/order_successful",$data);
	}
	public function paytmPayment()
	{
	    $cart_final_price=$this->session->userdata('cart_final_price');
	    $order_id=$this->generateUniqueOrderId();
	    $user_id=$this->session->userdata('user_id');
	    //print_r($order_id);
	    ?>
	    <form method="post" action="http://globaljivan.com/estore/paytmFormSubmit" name="paytm">
         <table border="1">
            <tbody>
               <input type="hidden" name="MID" value="MDagpU12028460275325">
               <input type="hidden" name="WEBSITE" value="WEBSTAGING">
               <input type="hidden" name="ORDER_ID" value="<?php echo $order_id;?>">
               <input type="hidden" name="CUST_ID" value="<?php echo $user_id;?>">
               <input type="hidden" name="INDUSTRY_TYPE_ID" value="Retail">
               <input type="hidden" name="CHANNEL_ID" value="WEB">
               <input type="hidden" name="TXN_AMOUNT" value="<?php echo $cart_final_price;?>">
               <input type="hidden" name="MOBILE_NO" value="9990694126">
               <input type="hidden" name="EMAIL" value="subhashsws1@gmail.com">
               <input type="hidden" name="CALLBACK_URL" value="http://globaljivan.com/estore/paytmPaymentConfirm">
            </tbody>
         </table>
         <script type="text/javascript">
            document.paytm.submit();
         </script>
      </form>
	    <?php
	}
	public function directrefferalcommission($user_id,$pv,$order_id)
	{
	    $query_ref=$this->db->select('ref_id')->from('user_registration')->where('user_id',$user_id)->get()->row();
	    $ref_id=$query_ref->ref_id;
	    $commission=$pv*10/100;
	    $query_obj=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$ref_id)->get()->row();
                        	$balance=$query_obj->amount+$commission;
                        	$this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$ref_id));
                    	
                        	$this->db->insert('credit_debit',array(
                        	    'transaction_no'=>generateUniqueTranNo(),
                        	    'user_id'=>$ref_id,
                        	    'credit_amt'=>$commission,
                        	    'debit_amt'=>'0',
                        	    'balance'=>$balance,
                        	    'admin_charge'=>'0',
                        	    'receiver_id'=>$ref_id,
                        	    'sender_id'=>$user_id,
                        	    'receive_date'=>date('d-m-Y'),
                        	    'ttype'=>'Refferal Commission',
                        	    'TranDescription'=>currency().$commission.' Refferal Commission from '.$user_id." Purchase",
                        	    'tran_description'=>currency().$commission.' Refferal Commission from '.$user_id." Purchase",
                        	    'status'=>'1',
                        	    'payment_method'=>'1',
                        	    'payment_method_name'=>'E-wallet',
                        	    'current_url'=>site_url(),
                        	    'reason'=>'5',
                        	    'order_id'=>$order_id
                                ));
                                
                        //$arr_income=array('',6,7,9,9,11,11,12,15);
                        $arr_income=array('',14,12,10,7,6,4,4,3,3,3,2,2);
        $ref = $ref_id;
        $l=1;
        while($ref!='cmp')
        {
            if($ref!='cmp' && $ref!='')
            {
                $commission=$pv*$arr_income[$l]/100;
	            $query_obj=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$ref)->get()->row();
                $balance=$query_obj->amount+$commission;
                $this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$ref));
                    	
            	$this->db->insert('credit_debit',array(
            	    'transaction_no'=>generateUniqueTranNo(),
            	    'user_id'=>$ref,
            	    'credit_amt'=>$commission,
            	    'debit_amt'=>'0',
            	    'balance'=>$balance,
            	    'admin_charge'=>'0',
            	    'receiver_id'=>$ref,
            	    'sender_id'=>$user_id,
            	    'receive_date'=>date('d-m-Y'),
            	    'ttype'=>'Unilevel Commission',
            	    'TranDescription'=>currency().$commission.' Unilevel Commission from '.$user_id." Purchase",
            	    'tran_description'=>currency().$commission.' Unilevel Commission from '.$user_id." Purchase",
            	    'status'=>'1',
            	    'level'=>$l,
            	    'payment_method'=>'1',
            	    'payment_method_name'=>'E-wallet',
            	    'current_url'=>site_url(),
            	    'reason'=>'6',
            	    'order_id'=>$order_id
                    ));
                    
                    if($l==12)
                    {
                        break;
                    }
            
                    $query_ref=$this->db->select('ref_id')->from('user_registration')->where('user_id',$ref)->get()->row();
    	            $ref=$query_ref->ref_id;
    	            $l++;
            }
        }
	}
	public function productslist($sub_cat_id)
	{
	    $data=array();
		 $where = "status ='1'";
		 
		 $where .=" and parent_category_id ='".$sub_cat_id."'"; 	 
		 
		 $all_products=$this->db->select('*')->from('eshop_organic_products')->where($where)->get()->result_array();
		
		 return $all_products;
	}

	public function productslist2($sub_cat_id)
	{
	    $data=array();
		 $where = "status ='1'";
		 
		 $where .=" and parent_category_id ='".$sub_cat_id."'"; 	 
		 
		 $all_products=$this->db->select('*')->from('eshop_products')->where($where)->get()->result_array();
		
		 return $all_products;
	}

	public function allProductList()
	{
		 $result=$this->db->select('*')->from('eshop_organic_products')->where(array('user_id'=>$this->userId))->get()->result_array();	     	
		 $data['all_products']=$result;
		 $data['module_name']=$this->moduleName;
		_userLayout("ecommerce/eshop-mgmt/all-products",$data);
	}
	public function purchaseProduct()
	{
	    if(!empty($this->input->post('btn')))
		{
		    $pkg_id=2;
		    $amount=500;
		    $password=$this->input->post('tran_password');
		    
    	  	if(empty($password))
    		{
    			$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter Transaction Password!</h5>'); 
    			redirect(site_url() . "user/eshop/purchaseProduct");                 
    			exit();
    		}
    		else 
    		{
    
    			$query=$this->db->query("SELECT * FROM (`user_registration`) WHERE `user_id` = '".$this->userId."' AND `t_code` = '$password'");
    			if($query->num_rows()<1)
    			{
    				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter valid Transaction Password!
    			</h5>'); 
    			redirect(site_url() . "user/eshop/purchaseProduct");                  
    			exit();
    			}
    		}
    	    
    	    $user=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$this->userId)->get()->row();
    	    $exist_amount=$user->amount;
    	  	
    	  	if($amount>$exist_amount)
    	  	{
    				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Sorry you do not have sufficient balance into your E-wallet</h5>'); 
    					redirect(site_url() . "user/eshop/purchaseProduct");                
    			exit();
    	  	}
    	  	else
    	  	{
    	  	    $user_id=$this->userId;
    	  	    // deduct amount from ewallet
	            $balance=$exist_amount-$amount;
	            $this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$user_id));
	            $this->db->insert('credit_debit',array(
        	    'transaction_no'=>generateUniqueTranNo(),
        	    'user_id'=>$user_id,
        	    'credit_amt'=>'0',
        	    'debit_amt'=>$amount,
        	    'balance'=>$balance,
        	    'admin_charge'=>'0',
        	    'receiver_id'=>123456,
        	    'sender_id'=>$user_id,
        	    'pkg_id'=>$pkg_id,
            	'pkg_amount'=>$amount,
        	    'receive_date'=>date('d-m-Y'),
        	    'ttype'=>'Product Purchased',
        	    'TranDescription'=>'Product Purchase On '.date('d-m-Y'),
        	    'Cause'=>'Product Purchase On '.date('d-m-Y'),
        	    'Remark'=>'Product Purchase On '.date('d-m-Y'),
        	    'invoice_no'=>'',
        	    'product_name'=>'',
        	    'status'=>'0',
        	    'ewallet_used_by'=>'Withdrawal Wallet',
        	    'current_url'=>site_url(),
        	    'reason'=>'1'
                ));
        	    
        	    $this->db->insert('user_package_log',array(
            	'user_id'=>$user_id,
            	'new_package_id'=>$pkg_id,
            	'active_status'=>'1',
            	'purchased_date'=>date('Y-m-d H:i:s')
            	));
            	$this->db->insert('product_sell',array(
            	'user_id'=>$user_id,
            	'pkg_id'=>$pkg_id,
            	'pkg_amount'=>$amount,
            	'status'=>'0',
            	'purchase_date'=>date('Y-m-d H:i:s')
            	));
            	
            	matrix_commission_level($user_id,'matrix_downline',$pkg_id);
            	matrix_commission_pending_paid($user_id,'matrix_downline',$pkg_id);
            	redirect(site_url().'user'); exit;
            	exit;
    	  	}
		}
		$data=array();
    	_userLayout("ewallet-mgmt/ewallet-payment",$data);
	}
	public function products()
	{
    	 $data['title']='Products';
    	 
    	 _userLayout("shop-mgt/products",$data);
	}
	public function sellProduct($amount)
	{
	    $this->session->set_userdata('amount',$amount);
    	$data=array();
    	$data['title']='Products';
    	_userLayout("ewallet-mgmt/ewallet-payment-product",$data);
	}
	public function sellProductAmount()
	{
	    $amount=$this->session->userdata('amount');
    	$data=array();
    	$data['title']='Products';
    	_userLayout("ewallet-mgmt/ewallet-payment-product",$data);
    	if(!empty($this->input->post('btn')))
		{
		    $password=$this->input->post('tran_password');
		    
    	  	if(empty($password))
    		{
    			$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter Transaction Password!</h5>'); 
    			redirect(site_url() . "user/eshop/products");                 
    			exit();
    		}
    		else 
    		{
    
    			$query=$this->db->query("SELECT * FROM (`user_registration`) WHERE `user_id` = '".$this->userId."' AND `t_code` = '$password'");
    			if($query->num_rows()<1)
    			{
    				$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Please enter valid Transaction Password!</h5>'); 
    			    redirect(site_url() . "user/eshop/products");                  
    			    exit();
    			}
    		}
    	    
    	    $user=$this->db->select('amount')->from('final_e_wallet')->where('user_id',$this->userId)->get()->row();
    	    $exist_amount=$user->amount;
    	  	
    	  	if($amount>$exist_amount)
    	  	{
    			$this->session->set_flashdata("error_msg", '<h5 class="panel-title">Sorry you do not have sufficient balance into your E-wallet</h5>'); 
    			redirect(site_url() . "user/eshop/products");                
    			exit();
    	  	}
    	  	else
    	  	{
    	  	    $user_id=$this->userId;
    	  	    // deduct amount from ewallet
    	  	    $balance=$exist_amount-$amount;
	            $this->db->update('final_e_wallet',array('amount'=>$balance),array('user_id'=>$user_id));
	            $this->db->insert('credit_debit',array(
        	    'transaction_no'=>generateUniqueTranNo(),
        	    'user_id'=>$user_id,
        	    'credit_amt'=>'0',
        	    'debit_amt'=>$amount,
        	    'balance'=>$balance,
        	    'admin_charge'=>'0',
        	    'receiver_id'=>123456,
        	    'sender_id'=>$user_id,
        	    'pkg_id'=>$pkg_id,
            	'pkg_amount'=>$amount,
        	    'receive_date'=>date('d-m-Y'),
        	    'ttype'=>'Product Purchased',
        	    'TranDescription'=>'Sell Set Of Bottle Of Amount '.currency().$amount.' On'.date('d-m-Y'),
        	    'Cause'=>'Sell Set Of Bottle Of Amount '.currency().$amount.' On'.date('d-m-Y'),
        	    'Remark'=>'Sell Set Of Bottle Of Amount '.currency().$amount.' On'.date('d-m-Y'),
        	    'invoice_no'=>'',
        	    'product_name'=>'',
        	    'status'=>'0',
        	    'ewallet_used_by'=>'Withdrawal Wallet',
        	    'current_url'=>site_url(),
        	    'reason'=>'1'
                ));
                
            	$this->db->insert('product_sell_bottle',array(
            	'user_id'=>$user_id,
            	'pkg_amount'=>$amount,
            	'remark'=>'Sell Set Of Bottle Of Amount '.currency().$amount,
            	'status'=>'0',
            	'purchase_date'=>date('Y-m-d H:i:s')
            	));
            	$this->session->set_flashdata("flash_msg", '<h5 class="panel-title">Product Purchase Successfully</h5>'); 
            	redirect(site_url().'user/eshop/products');
    	  	}
		}
	}
	
	public function eshopReport()
	{
	 $result=$this->db->query("select * from product_sell_bottle where user_id='".$this->userId."'")->result_array();
	 
	 $data['all_order']=$result;
	 $data['title']='My Order';
	 
	 _userLayout("shop-mgt/product-order",$data);
	}
	
	
	public function myOrder()
	{
	 $result=$this->db->query("select a.*,b.* from orders as a,orders_clients as b where a.id=b.for_id and a.user_id='".$this->userId."'")->result_array();
	 
	 $data['all_order']=$result;
	 $data['title']='My Order';
	 
	 _userLayout("shop-mgt/my-order",$data);
	}
	public function getAjaxOrderDetails($id)
	{
	  	
	 $result=$this->db->query("select a.*,b.* from orders as a,orders_clients as b where  a.id='".$id."' and a.id=b.for_id and a.user_id='".$this->userId."'")->row_array();
	 
	 
	 $products=unserialize($result['products']);
	
	 
	 ?>
	 <h2 class="bg-blue" style="text-align:center;">
	 Your Order Details
	 </h2>
	<table class="table table-responsive">
	<tr>
	<td><b>Order Id :</b> </td><td><?php echo $result['order_id']; ?></td>
	<td><b>Order Date :</b></td><td><?= date('d-M-Y / H:m:s', $result['date']); ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
	</tr>
	
	<?php
	foreach ($products as $k=>$p)
	{
		$row=$this->db->query("select a.*,b.* from products as a , products_translations as b where a.id='".$k."' and a.id=b.for_id")->row_array();
		
	?>
	<tr>
	<td><b>Product Name :</b> </td><td><?php echo $row['title']; ?></td>
	<td><b>Image :</b> </td><td> <img src="<?= base_url('attachments/shop_images/' . $row['image']) ?>" alt="Product" style="width:100px; margin-right:10px;" class="img-responsive"></td>
	<td><b>Price :</b> </td><td>N <?php echo $row['price']; ?></td>
	<td><b>Qty :</b> </td><td><?php echo $p; ?></td>
	<td><b>Total :</b> </td><td>N <?php echo $p*$row['price']; ?></td>
	
	</tr>
    <?php	
	}
	?>
	
	<tr>
	<td><b>Order Total Price :</b> </td><td>N <?php echo $result['order_total_price']; ?></td>
	<td></td><td></td><td></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
	</tr>
    </table>	
	 <?php
	 
	}
	

}

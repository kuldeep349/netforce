<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/package
*/
class Eshop extends Common_Controller 
{
	private $moduleName;
	private $controllerName;
	private $userId;
	private $role;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->model('eshop_model');
		$this->load->helper("layout_helper");
		$this->user_id=$this->session->userdata('user_id');
		$this->moduleName=$this->router->fetch_module();
		$this->controllerName=$this->router->fetch_class();
		$this->role='1';
		$this->load->helper('estore_helper');
	}//end constructor 
	public function index()
	{
		$data=array();
		$result=$this->db->query("select(select count(order_id) from eshop_orders) as total_order,(select count(order_id) from eshop_orders where order_status='0') as pending_order,(select count(order_id) from eshop_orders where order_status='1') as confirmed_order,(select count(order_id) from eshop_orders where order_status='2') as rejected_order,(select count(order_id) from eshop_orders where order_status='3') as delivered_order")->row_array();
		$data['order_data']=$result;
		$data['module_name']=$this->moduleName;
		_adminLayout("ecommerce/eshop-mgmt/eshop-dashboard",$data);
	}
	
	public function allCategoryList()
	{
		 $result=$this->db->query("SELECT * FROM eshop_category order by position")->result_array();	     	
		 $data['all_category']=$result;
		 $data['module_name']=$this->moduleName;
		 $data['controller_name']=$this->controllerName;
		_adminLayout("ecommerce/eshop-mgmt/all-category",$data);
	}
	
	public function addNewCategory()
	{
		if(!empty($this->input->post('btn')))
		{
			
			$category_name=$this->input->post('category_name');
			$active_status=$this->input->post('active_status');
			$date=date('d-M-Y');
			$role=$this->role;
			
			$position=$this->db->select_max('position')->from('eshop_category')->get()->row();
			if(!empty($position->position))
			{
				$position=$position->position+1;
			}
			else 
			{
				$position=1;
			}
			$insert_data = array(
            'category_name' => $category_name,
            'active_status' => $active_status,
			'create_date'=>$date,
			'role'=>$this->role,
			'position'=>$position
            );
            $this->db->insert('eshop_category', $insert_data);
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Category Added Successfully</span>');
			redirect(site_url().$this->moduleName."/eshop/allCategoryList");
			exit();
		}
		
		 $result=$this->db->query("SELECT * from eshop_category")->result_array();
		 $data['module_name']=$this->moduleName;
		 $data['all_category']=$result;
		_adminLayout("ecommerce/eshop-mgmt/add-category",$data);
	}
	
	public function deleteCategory($del_id)
	{
		    redirect(site_url().'admin/eshop/allCategoryList');
			exit;
			
			$del_id=ID_decode($del_id);
			
			$this->db->delete('eshop_products', array('category_id' => $del_id));
			
			$this->db->delete('eshop_subcategory', array('parent_id' => $del_id));
			
			$this->db->delete('eshop_category', array('id' => $del_id));

			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Category Deleted Successfully</span>');
			
			redirect(site_url().$this->moduleName."/eshop/allCategoryList");
			exit();
			
	}
	
	public function editCategory($fetch_id=null)
	{
		if(!empty($this->input->post('btn')))
		{
			
			$hidid=$this->input->post('hidid');
			
			$category_name=$this->input->post('category_name');
			$active_status=$this->input->post('active_status');
			$date=date('d-M-Y');
			$role=$this->role;
			
			$update_data = array(
			'category_name' => $category_name,
			'active_status' => $active_status,
			'create_date' => $date,
             );
			
			$this->db->where('id', $hidid);
			$this->db->update('eshop_category', $update_data);
			
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Updated Successfully</span>');
			redirect(site_url().$this->moduleName."/eshop/allCategoryList");
			exit();
		}
		
		 $fetch_id=ID_decode($fetch_id);
		 $result=$this->db->query("SELECT * from eshop_category where id='".$fetch_id."'")->row_array();
		 $data['category_data']=$result;
		 
		 $result1=$this->db->query("SELECT * from eshop_category where id!='".$fetch_id."'")->result_array();
		 $data['all_category']=$result1;
		 $data['module_name']=$this->moduleName;
		_adminLayout("ecommerce/eshop-mgmt/edit-category",$data);    
	}
	
	
	public function allSubCategoryList()
	{
		 $result=$this->db->select(array(
		 'sc.*',
		 'mc.category_name'
		 ))
		 ->from('eshop_subcategory as sc')
		 ->join('eshop_category as mc','mc.id=sc.parent_id')
		 ->order_by('sc.position','asc')
		 ->get()
		 ->result_array();
		 $data['all_subcategory']=$result;
		 $data['module_name']=$this->moduleName;
		 $data['controller_name']=$this->controllerName;
		 _adminLayout("ecommerce/eshop-mgmt/all-subcategory",$data);
	}
	
	public function addNewSubCategory()
	{
		 if(!empty($this->input->post('btn')))
		{
			
			$parent_id=$this->input->post('parent_id');
			$subcategory_name=$this->input->post('subcategory_name');
			$active_status=$this->input->post('active_status');
			$is_display_on_home=$this->input->post('is_display_on_home');
			$display_home_position=$this->input->post('display_home_position');
			
			$home_position_exist=$this->db->select('*')->from('eshop_subcategory')->where(array('display_home_position'=>$display_home_position,'is_display_on_home'=>'1'))->get()->num_rows();
			
			if($home_position_exist>0)
			{
				$this->session->set_flashdata("error_msg", '<span class="text-semibold">Sorry, this home page position is already exist</span>');
				redirect(site_url().$this->moduleName."/eshop/addNewSubCategory");
				exit();
			}
			
			$date=date('d-M-Y');
			$role=$this->role;
			
			$position=$this->db->select_max('position')->from('eshop_subcategory')->get()->row();
			if(!empty($position->position))
			{
				$position=$position->position+1;
			}
			else 
			{
				$position=1;
			}
			
			$insert_data = array(
			'parent_id'=>$parent_id,
            'subcategory_name' => $subcategory_name,
            'active_status' => $active_status,
			'is_display_on_home' => $is_display_on_home,
			'display_home_position' => $display_home_position,
			'create_date'=>$date,
			'role'=>$this->role,
			'position'=>$position
            );

            $this->db->insert('eshop_subcategory', $insert_data);
			
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Sub Category Added Successfully</span>');
			redirect(site_url().$this->moduleName."/eshop/allSubCategoryList");
			exit();
			
		}
		
		 $result=$this->db->query("SELECT * from eshop_category")->result_array();
		 $data['all_category']=$result;
		 $data['module_name']=$this->moduleName;
		_adminLayout("ecommerce/eshop-mgmt/add-subcategory",$data);
	}
	
	public function editSubCategory($fetch_id=null)
	{
		if(!empty($this->input->post('btn')))
		{
			$hidid=$this->input->post('hidid');
			$parent_id=$this->input->post('parent_id');
			$category_name=$this->input->post('category_name');
			$active_status=$this->input->post('active_status');
			$is_display_on_home=$this->input->post('is_display_on_home');
			$display_home_position=$this->input->post('display_home_position');
			
			$home_position_exist=$this->db->select('*')->from('eshop_subcategory')->where(array('display_home_position'=>$display_home_position, 'id !='=>$hidid))->get()->num_rows();
			
			if(!empty($is_display_on_home) && $is_display_on_home=='1' && $home_position_exist>0)
			{
				$this->session->set_flashdata("error_msg", '<span class="text-semibold">Sorry, this home page position is already exist</span>');
				redirect(site_url().$this->moduleName."/eshop/editSubCategory/".ID_encode($hidid));
				exit();
			}
			
			
			if($is_display_on_home!=1)
			{
				$display_home_position=null;	
			}
			$date=date('d-M-Y');
			$role=$this->role;
			$update_data = array(
			'parent_id' => $parent_id,
			'subcategory_name' => $category_name,
			'active_status' => $active_status,
			'is_display_on_home' => $is_display_on_home,
			'display_home_position' => $display_home_position,
			'create_date' => $date
             );
			
			$this->db->where('id', $hidid);
			$this->db->update('eshop_subcategory', $update_data);
			
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Updated Successfully</span>');
			redirect(site_url().$this->moduleName."/eshop/allSubCategoryList");
			exit();
		}
		
		 $fetch_id=ID_decode($fetch_id);
		 $result=$this->db->query("SELECT * from eshop_subcategory where id='".$fetch_id."'")->row_array();
		 
		 $category=$this->db->query("SELECT * from eshop_category")->result_array();
		 
		 $data['subcategory_data']=$result;
		 $data['all_category']=$category;
		 $data['module_name']=$this->moduleName;
		 
		_adminLayout("ecommerce/eshop-mgmt/edit-subcategory",$data);    
	}
	
	public function deleteSubCategory($del_id)
	{
		    redirect(site_url().'admin/eshop/allSubCategoryList');
			exit;
			$del_id=ID_decode($del_id);

			$this->db->delete('eshop_products', array('parent_category_id' => $del_id));	
			
			$this->db->delete('eshop_subcategory', array('id' => $del_id));	
		
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Sub Category Deleted Successfully</span>');
			redirect(site_url().$this->moduleName."/eshop/allSubCategoryList");
			exit();
			
	}
	
	
	public function allProductList()
	{
		 $result=$this->db->query("SELECT * from eshop_products  order by id desc")->result_array();	     	
		 $data['all_products']=$result;
		 $data['module_name']=$this->moduleName;
		_adminLayout("ecommerce/eshop-mgmt/all-products",$data);
	}
	
	public function addNewProduct()
	{
		if(!empty($this->input->post('btn')))
		{
			$parent_category_id=$this->input->post('parent_category_id');
			$category_id=$this->input->post('category_id');
			$title=$this->input->post('title');
			$old_price=$this->input->post('old_price');
			$new_price=$this->input->post('new_price');
			$qty=$this->input->post('qty');
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
			'qty'=>$qty,
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
			$eshop_product_level_commission=array();
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
			}
			////////////////////
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Product Added Successfully</span>');
			redirect(site_url().$this->moduleName."/eshop/allProductList");
			exit();
			
		}
		 $result=$this->db->query("SELECT * from eshop_category")->result_array();
		 $data['all_category']=$result;
		 $data['module_name']=$this->moduleName;
		_adminLayout("ecommerce/eshop-mgmt/add-product",$data);
	}
	public function deleteProduct($del_id)
	{
		    redirect(site_url().'admin/eshop/allProductList/');
			exit;
			$del_id=ID_decode($del_id);
			$this->db->delete('eshop_products', array('id' => $del_id));	
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Product Deleted Successfully</span>');
			redirect(site_url().$this->moduleName."/eshop/allProductList");
			exit();
	}
	
	public function editProduct($fetch_id=null)
	{
		if(!empty($this->input->post('btn')))
		{
			$hidid=$this->input->post('hidid');
			$category_id=$this->input->post('category_id');
			$title=$this->input->post('title');
			$old_price=$this->input->post('old_price');
			$new_price=$this->input->post('new_price');
			$qty=$this->input->post('qty');
			$status=$this->input->post('status');
			$description=$this->input->post('description');
            $long_description=$this->input->post('long_description');
			$featured=$this->input->post('featured');
			$role=$this->role;
			$tax=$this->input->post('tax');
			$shipment_charge=$this->input->post('shipment_charge');
			/////////////
			$direct_commission=$this->input->post('direct_commission');
			$guest_point=$this->input->post('guest_point');
			$level_commission=$this->input->post('level_commission');
			////////////////////////
			$image_upload_path='/product_images/';
			if($_FILES['product_image']['name']=='')
			{
			$product_image=$this->input->post('hidden_image');	
			}
			else
			{
	        $product_image=adImageUpload($_FILES['product_image'],1, $image_upload_path);
			}
			$upload_sub_img=array();
			$old_sub_images=$this->input->post('old_sub_images');
			foreach($old_sub_images as $old_img)
			{
				$upload_sub_img[]=array(
				'sub_img'=>$old_img
				);
			}
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
				
				$upload_sub_img[]=array(
				'sub_img'=>$uploaded_sub_img
				);
			 }
			//pr($upload_sub_img);die; 
			$update_data = array(
            'category_id' => $category_id,
			'product_image' => $product_image,
            'title' => $title,
            'old_price' => $old_price,
			'new_price'=>$new_price,
			'qty'=>$qty,
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
            $this->db->where('id', $hidid);
			$this->db->update('eshop_products', $update_data);
			
			///////updating level commission///
			$eshop_product_level_commission=array();
			if(!empty($level_commission))
			{
				$level=1;
				foreach($level_commission as $k=>$commission)
				{
					$eshop_product_level_commission[]=array(
					'product_id'=>$hidid,
					'level'=>$level,
					'commission'=>$commission
					);
				    $level++;
				}
			}
			$this->db->delete('eshop_product_level_commission',array(
			'product_id'=>$hidid
			));
			if(!empty($eshop_product_level_commission))
			{
				$this->db->insert_batch('eshop_product_level_commission',$eshop_product_level_commission);	
			}
			///////////////////////////////////
			
			$upload_sub_img=serialize($upload_sub_img);
			
			$this->db->update('eshop_products',array('sub_images'=>$upload_sub_img),array('id'=>$hidid));
			
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Product Updated Successfully</span>');
			redirect(site_url().$this->moduleName."/eshop/allProductList");
			exit();
			
		}
		
		 $fetch_id=ID_decode($fetch_id);
		 $result=$this->db->query("SELECT * from eshop_products where id='".$fetch_id."'")->row_array();
		 $data['product_data']=$result;
		 $data['sub_images']=unserialize($result['sub_images']);
		 
		 $result1=$this->db->query("SELECT * from eshop_category")->result_array();
		 $data['all_category']=$result1;
		 
		 $sub_category=$this->db->select('*')->from('eshop_subcategory')->where(array('parent_id'=>$result['parent_category_id']))->get()->result();
		 $data['sub_category']=$sub_category;
		 $data['module_name']=$this->moduleName;
		_adminLayout("ecommerce/eshop-mgmt/edit-product",$data);
	}
	function getAjaxSubCategory()
	{
		$parent_category_id=$this->input->post('parent_category_id');
		$result=$this->db->select('*')->from('eshop_subcategory')->where(array('parent_id'=>$parent_category_id,'active_status'=>'1'))->get()->result();
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}//end method
	///////////////////////
   public function moveUp($tableName,$current_position,$upper_position)
   {

	   moveUp($tableName,$current_position,$upper_position);
	   if($tableName=='eshop_category')
	   {
		 $this->session->set_flashdata("flash_msg",'<h4><span class="text-semibold">Well done!</span> Category Position is changed successfully.</h4>');
		 redirect(site_url().$this->moduleName."/".$this->controllerName.'/allCategoryList');
		 exit;
	   }
	   if($tableName=='eshop_subcategory')
	   {
		 $this->session->set_flashdata("flash_msg",'<h4><span class="text-semibold">Well done!</span> Subcategory Position is changed successfully.</h4>');
		 redirect(site_url().$this->moduleName."/".$this->controllerName.'/allSubCategoryList');
		 exit;
	   }
	  
   }
}//end class

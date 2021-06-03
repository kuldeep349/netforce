<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/package
*/
class Property_management extends Common_Controller 
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
		_adminLayout("doctor-management/doctor-mgmt/doctor-dashboard",$data);
	}
	public function addPropertyList()
	{
	    //pr($_POST); exit;
		if(!empty($this->input->post('btn')))
		{
			$property_type=$this->input->post('property_type');
			$furnishing_type=$this->input->post('furnishing_type');
			$title=$this->input->post('title');
			$price=$this->input->post('price');
			$status=$this->input->post('status');
			$description=$this->input->post('description');
			$long_description=$this->input->post('long_description');
			$role=$this->role;
			////////////////////////////////////////////////////////////////
			////////////////////////////////////////////////////////////
			
			
			$image_upload_path='/property_images/';
	        $property_image=adImageUpload($_FILES['property_image'],1, $image_upload_path);
			
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
            'property_name'=>$title,
			'property_type_id' => $property_type,
			'furnishing_type_id' => $furnishing_type,
            'property_image' => $property_image,
            'budget' => $price,
            'status'=>$status,
            'short_description'=>$description,
	        'long_description'=>$long_description
            );
            $this->db->insert('property_list', $insert_data);
			$update_sub_img=serialize($update_sub_img);
			//////////////////////////////////
			$property_id=$this->db->insert_id();
			$this->db->update('property_list',array('sub_images'=>$update_sub_img),array('prop_id'=>$property_id));
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Property Added Successfully</span>');
			//redirect(site_url().$this->moduleName."/eshop/allProductList");
			echo "<script>window.location.href='".site_url().$this->moduleName."/Property_management/propertyList"."';</script>";
			exit();
			
		}
		 $protypeRes=$this->db->query("SELECT * from property_type")->result_array();
		 $data['property_type']=$protypeRes;
		 $furnishingRes=$this->db->query("SELECT * from furnishing_type")->result_array();
		 $data['furnishing_type']=$furnishingRes;
		 $data['module_name']=$this->moduleName;
		_adminLayout("property-management/add-property",$data);
	}
	public function propertyList()
	{
		 $result=$this->db->query("SELECT * from property_list")->result_array();
		 $data['property_list']=$result;
		 $data['module_name']=$this->moduleName;
		_adminLayout("property-management/property-list",$data);
	}
	public function editProperty($fetch_id=null)
	{
		if(!empty($this->input->post('btn')))
		{
			$hidid=$this->input->post('hidid');
			$property_type=$this->input->post('property_type');
			$furnishing_type=$this->input->post('furnishing_type');
			$title=$this->input->post('title');
			$price=$this->input->post('price');
			$status=$this->input->post('status');
			$description=$this->input->post('description');
			$long_description=$this->input->post('long_description');
			////////////////////////
			$image_upload_path='/property_images/';
			if($_FILES['property_image']['name']=='')
			{
			$property_image=$this->input->post('hidden_image');	
			}
			else
			{
	        $property_image=adImageUpload($_FILES['property_image'],1, $image_upload_path);
			}
			///echo $product_image;
			////die();
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
	            'property_name'=>$title,
				'property_type_id' => $property_type,
				'furnishing_type_id' => $furnishing_type,
	            'property_image' => $property_image,
	            'budget' => $price,
	            'status'=>$status,
	            'short_description'=>$description,
	            'long_description'=>$long_description
            );
            $this->db->where('prop_id', $hidid);
			$this->db->update('property_list', $update_data);
			
			///////updating level commission///
			
			
			$upload_sub_img=serialize($upload_sub_img);
			$this->db->update('property_list',array('sub_images'=>$upload_sub_img),array('prop_id'=>$hidid));
			
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Product Updated Successfully</span>');
			redirect(site_url().$this->moduleName."/Property_management/propertyList");
			exit();
			
		}
		
		 $fetch_id=ID_decode($fetch_id);
		 $result=$this->db->query("SELECT * from property_list where prop_id='".$fetch_id."'")->row_array();
		 $data['product_data']=$result;
		 $data['sub_images']=unserialize($result['sub_images']);
		 
		 $protypeRes=$this->db->query("SELECT * from property_type")->result_array();
		 $data['property_type']=$protypeRes;
		 $furnishingRes=$this->db->query("SELECT * from furnishing_type")->result_array();
		 $data['furnishing_type']=$furnishingRes;
		 $data['sub_category']=$sub_category;
		 $data['module_name']=$this->moduleName;
		_adminLayout("property-management/edit-property",$data);
	}
}
?>
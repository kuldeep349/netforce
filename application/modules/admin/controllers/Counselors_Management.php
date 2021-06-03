<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/package
*/
class Counselors_Management extends Common_Controller 
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
	public function allCounselorsCategoryList()
	{
		 $result=$this->db->query("SELECT * FROM counselors_category order by position")->result_array();	     	
		 $data['all_category']=$result;
		 $data['module_name']=$this->moduleName;
		 $data['controller_name']=$this->controllerName;
		_adminLayout("counselors-management/counselors-mgmt/all-category",$data);
	}
	public function addNewCounselorsCategory()
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
            $this->db->insert('counselors_category', $insert_data);
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Category Added Successfully</span>');
			//redirect(site_url().$this->moduleName."/eshop/allCategoryList");
			echo "<script>window.location.href='".site_url().$this->moduleName."/Counselors_Management/allCounselorsCategoryList"."'</script>";
			exit();
		}
		
		 $result=$this->db->query("SELECT * from counselors_category")->result_array();
		 $data['module_name']=$this->moduleName;
		 $data['all_category']=$result;
		_adminLayout("counselors-management/counselors-mgmt/add-category",$data);
	}
	public function allSubCounselorsCategoryList()
	{
		 $result=$this->db->select(array(
		 'sc.*',
		 'mc.category_name'
		 ))
		 ->from('counselors_subcategory as sc')
		 ->join('counselors_category as mc','mc.cat_id=sc.parent_id')
		 ->order_by('sc.position','asc')
		 ->get()
		 ->result_array();
		 $data['all_subcategory']=$result;
		 $data['module_name']=$this->moduleName;
		 $data['controller_name']=$this->controllerName;
		 _adminLayout("counselors-management/counselors-mgmt/all-subcategory",$data);
	}
	public function addNewCounselorsSubCategory()
	{
		if(!empty($this->input->post('btn')))
		{
		//pr($_POST); exit;	
			$parent_id=$this->input->post('parent_id');
			$subcategory_name=$this->input->post('subcategory_name');
			$active_status=$this->input->post('active_status');
			$is_display_on_home=$this->input->post('is_display_on_home');
			$display_home_position=$this->input->post('display_home_position');
			
			$home_position_exist=$this->db->select('*')->from('counselors_subcategory')->where(array('display_home_position'=>$display_home_position,'is_display_on_home'=>'1'))->get()->num_rows();
			//pr($home_position_exist);
			if($home_position_exist>0)
			{
				$this->session->set_flashdata("error_msg", '<span class="text-semibold">Sorry, this home page position is already exist</span>');
				redirect(site_url().$this->moduleName."/Counselors_Management/addNewCounselorsSubCategory");
				exit();
			}
			
			$date=date('d-M-Y');
			$role=$this->role;
			
			$position=$this->db->select_max('position')->from('doctor_subcategory')->get()->row();
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

            $this->db->insert('counselors_subcategory', $insert_data);
			
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Sub Category Added Successfully</span>');
			//redirect(base_url()."admin/eshop/allSubCategoryList");
			echo "<script>window.location.href='".site_url().$this->moduleName."/Counselors_Management/allSubCounselorsCategoryList"."'</script>";
			exit();
			
		}
		
		 $result=$this->db->query("SELECT * from counselors_category")->result_array();
		 $data['all_category']=$result;
		 $data['module_name']=$this->moduleName;
		_adminLayout("counselors-management/counselors-mgmt/add-subcategory",$data);
	}
    
    public function deleteCategory($del_id)
	{
		   // redirect(site_url().'admin/eshop/allCategoryList');exit;
			$del_id=ID_decode($del_id);
			$this->db->delete('counselors', array('category_id' => $del_id));
			$this->db->delete('counselors_subcategory', array('parent_id' => $del_id));
			$this->db->delete('counselors_category', array('cat_id' => $del_id));
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Category Deleted Successfully</span>');
			//redirect(site_url().$this->moduleName."/eshop/allCategoryList");
				echo "<script>window.location.href='".site_url().$this->moduleName."/Counselors_Management/allCounselorsCategoryList"."'</script>";
			exit();
			
	}
	public function deleteSubCategory($del_id)
	{
		    $del_id=ID_decode($del_id);
             $this->db->delete('counselors', array('parent_category_id' => $del_id));	
			
			$this->db->delete('counselors_subcategory', array('sub_cat_id' => $del_id));	
		
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Sub Category Deleted Successfully</span>');
			echo "<script>window.location.href='".site_url().$this->moduleName."/Counselors_Management/allSubCounselorsCategoryList"."'</script>";
			exit();
			
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
			
			$home_position_exist=$this->db->select('*')->from('doctor_subcategory')->where(array('display_home_position'=>$display_home_position, 'sub_cat_id !='=>$hidid))->get()->num_rows();
			
			if(!empty($is_display_on_home) && $is_display_on_home=='1' && $home_position_exist>0)
			{
				$this->session->set_flashdata("error_msg", '<span class="text-semibold">Sorry, this home page position is already exist</span>');
				redirect(site_url().$this->moduleName."/Doctor_Management/editSubCategory/".ID_encode($hidid));
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
			
			$this->db->where('sub_cat_id', $hidid);
			$this->db->update('doctor_subcategory', $update_data);
			
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Updated Successfully</span>');
			//redirect(site_url().$this->moduleName."/eshop/allSubCategoryList");
			echo "<script>window.location.href='".site_url().$this->moduleName."/Doctor_Management/allSubDocCategoryList"."'</script>";
			exit();
		}
		
		 $fetch_id=ID_decode($fetch_id);
		 $result=$this->db->query("SELECT * from doctor_subcategory where sub_cat_id='".$fetch_id."'")->row_array();
		 
		 $category=$this->db->query("SELECT * from doctor_category")->result_array();
		 
		 $data['subcategory_data']=$result;
		 $data['all_category']=$category;
		 $data['module_name']=$this->moduleName;
		 
		_adminLayout("doctor-management/doctor-mgmt/edit-subcategory",$data);    
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
			
			$this->db->where('cat_id', $hidid);
			$this->db->update('doctor_category', $update_data);
			
			$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Updated Successfully</span>');
		//	redirect(site_url().$this->moduleName."/eshop/allCategoryList");
			echo "<script>window.location.href='".site_url().$this->moduleName."/Doctor_Management/allDocCategoryList"."'</script>";
			exit();
		}
		
		 $fetch_id=ID_decode($fetch_id);
		 $result=$this->db->query("SELECT * from doctor_category where cat_id='".$fetch_id."'")->row_array();
		 $data['category_data']=$result;
		 
		 $result1=$this->db->query("SELECT * from doctor_category where cat_id!='".$fetch_id."'")->result_array();
		 $data['all_category']=$result1;
		 $data['module_name']=$this->moduleName;
		_adminLayout("doctor-management/doctor-mgmt/edit-category",$data);    
	}

	public function allCounselorsList()
	{
		 $result=$this->db->query("SELECT * from counselors order by counselors_id desc")->result_array();	     	
		 $data['all_doctors']=$result;
		 $data['module_name']=$this->moduleName;
		_adminLayout("counselors-management/counselors-mgmt/counselors-dashboard",$data);
	}
	function getAjaxSubCategory()
	{
		$parent_category_id=$this->input->post('parent_category_id');
		$result=$this->db->select('*')->from('counselors_subcategory')->where(array('parent_id'=>$parent_category_id,'active_status'=>'1'))->get()->result();
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
	public function addNewCounselors()
	{
		if(!empty($this->input->post('btn')))
		{
			$parent_category_id=$this->input->post('parent_category_id');
			$category_id=$this->input->post('category_id');
			$counselors_name=$this->input->post('counselors_name');
			$counselors_specialty=$this->input->post('counselors_specialty');
			$counselors_fee=$this->input->post('counselors_fee');
			$time_description=$this->input->post('time_description');
			$long_description=$this->input->post('long_description');
			$active_status=$this->input->post('status');
			$image_upload_path='/doctor_images/';
	        $counselors_image=adImageUpload($_FILES['counselors_image'],1, $image_upload_path);
	        $insert_data = array(
			'user_id'=>$this->user_id,
			'parent_category_id'=>$parent_category_id,
			'category_id' => $category_id,
            'counselors_name'=>$counselors_name,
			'counselors_specialty' => $counselors_specialty,
			'counselors_fee' => $counselors_fee,
            'active_status' => $active_status,
            'counselors_timing' => $time_description,
            'counselors_image' => $counselors_image,
            'counselors_bio' => $long_description
            );
            $this->db->insert('counselors', $insert_data);
            $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Doctor Added Successfully</span>');
			//redirect(site_url().$this->moduleName."/eshop/allProductList");
			echo "<script>window.location.href='".site_url().$this->moduleName."/Counselors_Management/allCounselorsList"."';</script>";
			exit();
		}
		$result=$this->db->query("SELECT * from counselors_category")->result_array();
		 $data['all_category']=$result;
		$data['module_name']=$this->moduleName;
		_adminLayout("counselors-management/counselors-mgmt/add-counselors",$data);
	}
	function editCounselors($fetch_id=null)
	{
		$fetch_id=ID_decode($fetch_id);
		if(!empty($this->input->post('btn')))
		{
			$hidid=$this->input->post('hidid');
			$parent_category_id=$this->input->post('parent_category_id');
			$category_id=$this->input->post('category_id');
			$doctor_name=$this->input->post('doctor_name');
			$doctor_specialty=$this->input->post('doctor_specialty');
			$doctor_fee=$this->input->post('doctor_fee');
			$time_description=$this->input->post('time_description');
			$long_description=$this->input->post('long_description');
			$active_status=$this->input->post('status');
			$image_upload_path='/doctor_images/';
	        $doctor_image=adImageUpload($_FILES['doctor_image'],1, $image_upload_path);
	        $update_data = array(
			'user_id'=>$this->user_id,
			'parent_category_id'=>$parent_category_id,
			'category_id' => $category_id,
            'doctor_name'=>$doctor_name,
			'doctor_specialty' => $doctor_specialty,
			'doctor_fee' => $doctor_fee,
            'active_status' => $active_status,
            'doctor_timing' => $time_description,
            'doctor_image' => $doctor_image,
            'doctor_bio' => $long_description
            );
            $this->db->where('doctor_id', $hidid);
			$this->db->update('austin_doctor', $update_data);
            $this->session->set_flashdata("flash_msg", '<span class="text-semibold">Doctor Updated Successfully</span>');
			//redirect(site_url().$this->moduleName."/eshop/allProductList");
			echo "<script>window.location.href='".site_url().$this->moduleName."/Doctor_Management/allDoctorList"."';</script>";
			exit();
		}
		$get_doctor=$this->db->query("SELECT * from austin_doctor where doctor_id='".$fetch_id."'")->row_array();
		 $data['doctor_data']=$get_doctor;
		$result=$this->db->query("SELECT * from doctor_category")->result_array();
		 $data['all_category']=$result;
		$data['module_name']=$this->moduleName;
		_adminLayout("doctor-management/doctor-mgmt/edit-doctor",$data);
	}
	function deleteCounselors($fetch_id=null)
	{
		$del_id=ID_decode($fetch_id);
		$this->db->delete('counselors', array('counselors_id' => $del_id));	
		$this->session->set_flashdata("flash_msg", '<span class="text-semibold">Counselor Deleted Successfully</span>');
			echo "<script>window.location.href='".site_url().$this->moduleName."/Counselors_Management/allCounselorsList"."'</script>";
			exit();
	}
}
?>
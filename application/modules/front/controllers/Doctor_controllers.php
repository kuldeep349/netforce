<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package Front/Shop
*/
class Doctor_controllers extends CI_Controller 
{
	private $num_rows = 20;
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		$this->load->helper("layout_helper");
		$this->load->helper("common_helper");
		$this->load->model('front_model');
		$this->load->model('doctor_model');
		/////$this->load->model("auth_model","auth");
		//////////////
	}
	public function index($page = 0)
	{
	    $data = array();
	    $data['doctor_list']=$this->doctor_model->getDoctorList();
	   _frontLayout("doctor-mgmt/doctor-list",$data);
	}
	public function getDoctorDetail()
	{
	    $data = array();
	    $doctor_id=ID_decode($this->uri->segment(2));
	    $data['doctor_list']=$this->doctor_model->getDoctorDetail($doctor_id);
	    $data['doctor_time']=$this->db->query("SELECT * from doctor_time where doctor_id='".$doctor_id."'")->result_array();
	   _frontLayout("doctor-mgmt/doctor-details",$data);
	}
	public function bookAppointment()
	{
		$doctor_id=ID_decode($this->uri->segment(2));
		$time_id=ID_decode($this->uri->segment(3));
		$data['doctor_detail']=$this->doctor_model->getDoctorDetail($doctor_id);
		 $data['doctor_time']=$this->db->query("SELECT * from doctor_time where time_id='".$time_id."'")->row_array();
		 _frontLayout("doctor-mgmt/book-appointment",$data);
	}
	public function bookDocAppointment()
	{
	   if($this->input->server('REQUEST_METHOD') === 'POST')
         {
           $name=$this->input->post('name');
           if (count(explode(' ', $name)) > 1) {
           	 $nameArgs=explode(' ', $name);
           	 $first_name=$nameArgs[0];
           	 $last_name=$nameArgs[1];
           }else
           {
             $first_name=$name;
           	 $last_name='';
           }
           $phone=$this->input->post('phone');
           $email=$this->input->post('email');
           $emailArgs=explode('@', $email);
           $doctor_fee=$this->input->post('doctor_fee');
           $doctor_id=$this->input->post('doctor_id');
           $doctor_time_id=$this->input->post('doctor_time_id');
           $checkUser=$this->db->query("SELECT * from user_registration where email='".$email."'")->row_array();
           if(count($checkUser)>0)
           {
           	  $update_data = array(
           	 	    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'contact_no' => $phone
                    );
           	    $this->db->where('email', $email);
                $this->db->update('user_registration', $update_data);
                $booking_data=array(
                	'user_id'=>$checkUser['id'],
                	'service_id'=>$doctor_id,
                	'date_time_id'=>$doctor_time_id,
                	'fee'=>$doctor_fee,
                );
                $this->db->insert('appointment_book', $booking_data);
                $book_id = $this->db->insert_id();
                $bookdata=array('book_id'=>$book_id,'email'=>$checkUser['email'],'password'=>$checkUser['password']);
                $this->session->set_userdata($bookdata);
               echo 1;
           }else
           {
           	 $password=$emailArgs[0].rand();
           	 $insert_data = array(
           	 	    'username'=>$emailArgs[0],
           	 	    'password' => $password,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'contact_no' => $phone
                    );
                    $this->db->insert('user_registration', $insert_data);
                    $user_id = $this->db->insert_id();
                    $booking_data=array(
                	'user_id'=>$user_id,
                	'service_id'=>$doctor_id,
                	'date_time_id'=>$doctor_time_id,
                	'fee'=>$doctor_fee,
                );
                $this->db->insert('appointment_book', $booking_data);
                $book_id = $this->db->insert_id();
                $bookdata=array('book_id'=>$book_id,'email'=>$email,'password'=>$password);
                $this->session->set_userdata($bookdata);
                    echo 1;
           }

         }	
       
	}
	public function payDocAppointment()
	{
		//check if request was made with the right data
		if(!$_SERVER['REQUEST_METHOD'] == 'POST' || !isset($_POST['reference'])){  
		  die("Transaction reference not found");
		}
		//set reference to a variable @ref
		$reference = $_POST['reference'];

		//The parameter after verify/ is the transaction reference to be verified
		$url = 'https://api.paystack.co/transaction/verify/'.$reference;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt(
		  $ch, CURLOPT_HTTPHEADER, [
		    'Authorization: Bearer sk_test_abdc00e9584c71a8ad29823c1fe6decfb64a88c0']
		);
		//send request
		$request = curl_exec($ch);
		//close connection
		curl_close($ch);
		//declare an array that will contain the result 
		$result = array();
		if ($request) {
		  $result = json_decode($request, true);
		}

		if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
			$order_id=$this->session->all_userdata();
			$ticket_id=$this->generateRandomString(12);
			$update_data = array('payment_status' => 1,'ticket_id'=>$ticket_id);
           	    $this->db->where('book_id', $order_id['book_id']);
                $this->db->update('appointment_book', $update_data);
                $docDetail=$this->db->query("SELECT doc.`doctor_name`,doc.`doctor_email`,doc.`parent_category_id`,doc.`category_id`,tkt.user_id,tkt.ticket_id,tkt.booking_time FROM `austin_doctor` AS doc INNER JOIN appointment_book AS tkt ON doc.doctor_id=tkt.service_id WHERE tkt.book_id=".$order_id['book_id'])->row_array();
                $docCatName=$this->getParentCatName($docDetail['parent_category_id']);
                $docSubCatName=$this->getChildCatName($docDetail['category_id']);
                $subject=$docCatName.' - '.$docSubCatName.' - '.$ticket_id;
                $this->sendBookEmail($subject,$ticket_id,$order_id['email'],$order_id['password']);
                $userDetail=$this->db->query("SELECT `first_name`,`last_name`,`email`,`contact_no` FROM `user_registration` WHERE `id`=".$docDetail['user_id'])->row_array();
                $userName=$userDetail['first_name'].' '.$userDetail['last_name'];
                $phone=$userDetail['contact_no'];
                $this->sendBookEmailToDocAdmin($order_id['email'],$docDetail['doctor_email'],$subject,$docDetail['doctor_name'],$userName,$phone,$docDetail['booking_time'],$ticket_id);
		    echo "success";
			//Perform necessary action
		}else{
		  echo "Transaction was unsuccessful";
		}
	}
	function generateRandomString($length = 25) {
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWZYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
   }

   function getParentCatName($pcatId)
   {
     $docCat=$this->db->query("SELECT category_name FROM `doctor_category` WHERE `cat_id`=".$pcatId)->row_array();
     return $docCat['category_name'];
   }

   function getChildCatName($chcatId)
   {
     $docSubCat=$this->db->query("SELECT `subcategory_name` FROM `doctor_subcategory` WHERE `sub_cat_id`=".$chcatId)->row_array();
     return $docCat['subcategory_name'];
   }

	function sendBookEmail($subject,$ticket_id,$email,$password)
	{

		$email_data['from']='info@codotbiz.com';
		$email_data['to']=$email;
		$email_data['subject']=$subject;
		$email_data['ticket_id']=$ticket_id;
		$email_data['email']=$email;
		$email_data['password']=$password;
		$email_data['email-template']='book-services';
		_sendEmail($email_data);
	}
	function sendBookEmailToDocAdmin($from,$email,$subject,$docName,$userName,$phone,$dateTime,$ticket_id)
	{

		$email_data['from']=$from;
		$email_data['to']=$email;
		$email_data['subject']=$subject;
		$email_data['ticket_id']=$ticket_id;
		$email_data['userName']=$userName;
		$email_data['user_email']=$from;
		$email_data['phone']=$phone;
		$email_data['docName']=$docName;
		$email_data['cc']='az.santosh89@gmail.com';
		$email_data['bcc']='info@xbulon.com';
		$email_data['dateTime']=$dateTime;
		$email_data['email-template']='book-appointment-adminmail';
		_sendEmail($email_data);
	}
}//end class
<?php 
/*
@author:Global MLM(aditya)
@date:7 jun 2017
@desc:It's used for rendering the admin layout
@param:filename(string),data(assoc array)
@return:none
*/
if(!function_exists("_adminLayout"))
{
	function _adminLayout($filename,$data=null)
	{
		   $obj=& get_instance();
		   $obj->load->view("common/header");
		   $obj->load->view($filename,$data);
		   $obj->load->view("common/footer");

	}
}
/*
@author:Global MLM(aditya)
@date:7 jun 2017
@desc:It's used for rendering the user panel layout
@param:filename(string),data(assoc array)
@return:none
*/
if(!function_exists("_userLayout"))
{
	function _userLayout($filename,$data=null)
	{
		   $obj=& get_instance();
		   $obj->load->view("common/header");
		   $obj->load->view($filename,$data);
		   $obj->load->view("common/footer");
	}	
}

if(!function_exists("marqueeText")){
	function marqueeText(){
		$ci = & get_instance();
        $ci->load->model('front_model');
		$marquee = $ci->front_model->getMarquee();
		return $marquee;
	}
}
/*
@author:Global MLM(aditya)
@date:7 jun 2017
@desc:It's used for rendering the front layout
@param:filename(string),data(assoc array)
@return:none
*/
if(!function_exists("_frontLayout"))
{
	function _frontLayout($filename=null,$data=null)
	{
		   $obj=& get_instance();
		   //$obj->load->view("common/header");
		   $obj->load->view($filename,$data);
		   //$obj->load->view("common/footer");
	}	
}
if(!function_exists("_EstoreLayout"))
{
	function _estoreLayout($filename=null,$data=null)
	{
		   $obj=& get_instance();
		   $obj->load->view($filename,$data);
	}	
}
/*
@author:gnisoft(kush)
@date:30 Nov 2020
@desc:to display categories on front page
@param:active_status(int)
@return:array
*/
if(!function_exists("categories"))
{
	function categories()
	{
		$ci = & get_instance();
        $ci->load->model('front_model');
		$categories = $ci->front_model->Categories();
		// echo'<pre>';
		// print_r($categories);
		// echo'</pre>';
		return $categories;
	}	
}

/*
@author:gnisoft(kush)
@date:31 May 2021
@desc:to display Cart Products
@return:array
*/
if(!function_exists("cart_products"))
{
	function cart_products()
	{
		$ci = & get_instance();
        $ci->load->library('session');
		$cart = $ci->session->userdata['cart']; 
		return $cart;
	}	
}

if(!function_exists("shipping_charges_list"))
{
	function shipping_charges_list()
	{
		$countries = [
			1 => ['country' => 'Nigeria' , 'charges' => '5'],
			2 => ['country' => 'India' , 'charges' => '15'],
			3 => ['country' => 'Singapore' , 'charges' => '25'],
		];
		return $countries;
	}	
}

if(!function_exists("country_shipping_charges"))
{
	function country_shipping_charges($id)
	{
		$countries = [
			1 => ['country' => 'Nigeria' , 'charges' => '5'],
			2 => ['country' => 'India' , 'charges' => '15'],
			3 => ['country' => 'Singapore' , 'charges' => '25'],
		];
		return $countries[$id];
	}	
}


?>
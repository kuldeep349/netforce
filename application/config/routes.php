<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['default_controller'] = 'welcome';
/*****Front end Routing Start from here******/
$route['default_controller'] = 'front/index';
$route['front/front'] = 'front/index';

////////////////
$route['about-us'] = 'front/aboutUs';
$route['digital-money'] = 'front/DigitalMoney';
$route['ecommerce'] = 'front/Ecommerce';
$route['organic-products'] = 'front/OrganicProducts';
$route['business-networking'] = 'front/BusinessNetworking';
$route['gas'] = 'front/Gas';
$route['project-development'] = 'front/ProjectDev';
$route['how-it-work'] = 'front/howItWorksEmployee';
$route['how-it-works'] = 'front/howItWorks';
$route['privacy-policy'] = 'front/privacyPolicy';
$route['terms_and_condition'] = 'front/termAndCond';
$route['our-package'] = 'front/ourPackage';
$route['faq'] = 'front/faq';
$route['disclaimer'] = 'front/disclaimer';
$route['contact-us'] = 'front/contactUs';
$route['compensation-plan'] = 'front/compensationplan';
$route['services'] = 'front/services';
$route['news'] = 'front/news';
$route['epin_purchase'] = 'front/epin_purchase';
$route['wallet_fund_purchase'] = 'front/wallet_fund_purchase';
$route['other_fund_purchase'] = 'front/other_fund_purchase';
$route['manage-stockist'] = 'front/manage_stockist';
//$route['view-details'] = 'front/view_product_details';
$route['digital-currency'] = 'front/digital_currency';
$route['turbine-plant'] = 'front/turbine_plant';
$route['franchise'] = 'front/franchise';
$route['repurchase-order'] = 'front/repurchase_order';
$route['logistics'] = 'front/logistics';

///////////////////
$route['payment-option'] = 'front/paymentOption';
$route['ewallet-payment'] = 'front/ewalletPayment';
$route['bank-wire-payment'] = 'front/bankWirePayment';
$route['epin-payment'] = 'front/epinPayment';
$route['login'] = 'front/login';
$route['join-us'] = 'front/register';
$route['join-us/(.+)'] = 'front/register/$1';
$route['save_personal_information'] = 'front/save_personal_information';
$route['agreement'] = 'front/agreement';
$route['order'] = 'front/order';
$route['confirm_order'] = 'front/confirm_order';
$route['purchase-pin'] = 'front/purchasePinRequest';

/////////SHOP///////////////
$route['shop'] = 'front/shop/index/';
$route['doctor-list'] = 'front/Doctor_controllers/index/';
$route['doctor-details/(:any)'] = 'front/Doctor_controllers/getDoctorDetail/';
$route['business-networking-bronze'] = 'front/front/BusinessNetworkingBronze/';
$route['business-networking-silver'] = 'front/front/BusinessNetworkingSilver/';
$route['business-networking-gold'] = 'front/front/BusinessNetworkingGold/';
$route['business-networking-diamond'] = 'front/front/BusinessNetworkingDiamond/';
$route['book-appointment/(:any)'] = 'front/Doctor_controllers/bookAppointment/';
$route['counselor'] = 'front/Counselors_controllers/index/';
$route['counselors-details/(:any)'] = 'front/Counselors_controllers/getCounselorsDetail/';
$route['property'] = 'front/Property_management/index/';
$route['property-details/(:any)'] = 'front/Property_management/getPropertyDetail/';
$route['alternative-medicine'] = 'front/Counselors_controllers/AlternativeMedicine/';
$route['altmed-details/(:any)'] = 'front/Counselors_controllers/AlternativeMedicineDetail/';
$route['view-cart'] = 'front/shop/viewCart/';
$route['check-out'] = 'front/shop/checkout/';
$route['order-confirm/(:num)'] = 'front/shop/orderConfirm/$1';

/*****Front end Routing end over here*********/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

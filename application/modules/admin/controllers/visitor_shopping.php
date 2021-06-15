<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
@package admin/UserWallet
*/
class Visitor_shopping extends Common_Controller 
{
	public function __construct()
	{
		//@call to parent CI_Controller constructor
		parent::__construct();
		admin_auth();
		$this->load->helper("layout_helper");
		$this->load->library("pagination");
		$this->load->model("user_wallet_model");
		$this->load->model(["account_model","Main_model"]);
		$this->load->model('member_model');
	}//end constructor 
	public function index()
	{
		$data=array();
		$data['all_user_wallet_balance']=$this->user_wallet_model->getAllUserWalletBalance();
		_adminLayout("user-wallet-mgmt/user-wallet-balance",$data);
	}
    public function all_orders(){

            $field = $this->input->get('type');
            $value = $this->input->get('value');
            $where = array($field => $value);
            if (empty($where[$field])){
                $where = array();
            }
            if (!empty($this->input->get('start_date'))){
                $start_date = $this->input->get('start_date');
                $where['date(updated_at) >='] = $start_date;
            }else{
                $start_date = '';
            }
            if (!empty($this->input->get('end_date'))){
                $end_date = $this->input->get('end_date');
                $where['date(updated_at) <='] = $end_date;
            }else{
                $end_date = '';
            }
            $config['total_rows'] = $this->Main_model->get_sum('tbl_visitor_orders', $where, 'count(id) as sum');
            $response['amount'] = $this->Main_model->get_sum('tbl_visitor_orders', $where, 'ifnull(sum(amount),0) as sum');
            $config['base_url'] = base_url('admin/visitor_shopping/all_orders');
            $response['form_url'] = base_url('admin/visitor_shopping/all_orders');
            $config['suffix'] = '?'.http_build_query($_GET);
            $config ['uri_segment'] = 4;
            $config['per_page'] = 10;
            $config['attributes'] = array('class' => 'page-link');
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li class="paginate_button page-item ">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="paginate_button page-item  active"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li class="paginate_button page-item ">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li class="paginate_button page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="paginate_button page-item next">';
            $config['last_tag_close'] = '</li>';
            $config['prev_link'] = 'Previous';
            $config['prev_tag_open'] = '<li class="paginate_button page-item previous">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li  class="paginate_button page-item next">';
            $config['next_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);
            $segment = $this->uri->segment(4);
            $response['segament'] = $segment;
            $response['type'] = $field;
            $response['value'] = $value;
            $response['start_date'] = $start_date;
            $response['end_date'] = $end_date;
            $response['total_records'] = $config['total_rows'];
            $response['status'] = 1;
            $response['orders'] = $this->Main_model->get_limit_records('tbl_visitor_orders', $where, '*', $config['per_page'], $segment);
            _adminLayout("visitor_shopping/all_orders",$response);
    }
}//end class
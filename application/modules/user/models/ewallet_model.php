<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @package user/ewallet_model
*/
class Ewallet_Model extends Common_Model
{
  public function __construct()
    {
        //@call to parent CI_Model constructor
        parent::__construct();
    }
    public function getCashBalance($user_id,$table)
   {
   	    $credit_amount_info= $this->db->select('amount')->from($table)->where(array('user_id'=>$user_id))->get()->row();
   	    $credit_amount=(!empty($credit_amount_info->amount))?$credit_amount_info->amount:'0';
        return $credit_amount;
   }
    public function getAjaxCashwalletStatements($user_id,$table)
  {
        $requestData = $_GET;
		/*
		$requestData['length']=10; 
		$requestData['start']=1;
		*/
		$sql=$this->db->select('cd.transaction_no,cd.status, cd.user_id, cd.credit_amt, cd.debit_amt, cd.balance, cd.ttype as title, cd.TranDescription as description, cd.create_date as date,cd.reason,cd.receiver_id,cd.sender_id,cd.level',false)
		->from($table.' as cd')
        ->join('user_registration as u', 'u.user_id=cd.user_id');
		if (!empty($requestData['search']['value'])) {
                $ser = strtolower($requestData['search']['value']);
                
				$sql->where("(LOWER(cd.ttype) like '%$ser%'");
                
				$sql->or_where("cd.transaction_no like '%$ser%' ");
				
				$sql->or_where("cd.user_id like '%$ser%' ");
				
				$sql->or_where("cd.credit_amt like '%$ser%' ");
				
				$sql->or_where("cd.debit_amt like '%$ser%' ");
				
				$sql->or_where("cd.balance like '%$ser%' ");

				$sql->or_where("cd.reason like '%$ser%' ");
				
				$sql->or_where("u.user_id like '%$ser%' ");
                
				$sql->or_where("cd.create_date like '%$ser%' )");
             
			 
			 }
             //$sql->order_by('u.id', 'desc');
			$sql->where_in('u.user_id',array($user_id));
			$sql->order_by('cd.id','DESC');
			$sql1 = clone $sql;
			if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);   
             }
            $query = $sql->get()->result();
			$totalData = $totalFiltered = $sql1->get()->num_rows();             
			$data = array();
			$sr_no = $requestData['start'];
			$total_amount = 0;
            foreach ($query as $row) 
			{
                $active_status_class=($row->status=='1')?'label-success':'label-danger';
                $active_status_label=($row->status=='1')?'Credit':'Debit';
				
				$status=html_entity_decode('<span class="label '.$active_status_class.'">'.$active_status_label.'</span>');
				
				
				$amount=($row->status==1)?$row->credit_amt:$row->debit_amt;
				$total_amount = $total_amount + $amount;
				$sign=($row->status==1)?"+":"-";
				
				
				if($row->reason=='11')
				{
					$row->description=$row->description." to ".get_user_name($row->receiver_id);
				}
				if($statementObj->reason=='12')
				{
					$row->description="Fund receive credit amount by ".get_user_name($row->sender_id);
				}
				else if($row->reason=='19')
				{
					$row->description=$row->description." to ".get_user_name($row->receiver_id);
				}
				else if($row->reason=='21')
				{
				   $row->description=$row->description." by ".get_user_name($row->sender_id);
				}
				else if($row->reason=='1')
				{
					$row->description=$row->description." by ".get_user_name($row->sender_id);
				}
				else if($row->reason=='37')
				{
					$row->description=$row->title." get from ".get_user_name($row->sender_id)." of level ".$row->level;
				}
				
				$nestedData = array();
                $nestedData[] = ++$sr_no;
				$nestedData[] = ucwords($row->transaction_no);
                $nestedData[] = ucwords($row->title);
				$nestedData[] = $row->balance." ".currency();
				$nestedData[] = $sign.$amount." ".currency();
				$nestedData[] = $status;
				$nestedData[] = $row->description;
				// $nestedData[] = date(date_formats(),strtotime($row->date));
				$nestedData[] = $row->date;//date(date_formats(),strtotime());
                $data[] = $nestedData;
           }
            $json_data = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data,
                "total_amount" => $total_amount
            );
            return  $json_data;
   }//end method 
  public function getEwalletBalance($user_id)
  {
     $res=$this->db->select('amount')->from('final_e_wallet')->where('user_id', $user_id)->get()->row();
     $balance=(!empty($res->amount))?$res->amount:0;
     return $balance;    
  }
  public function getEwalletReasonBalance($user_id)
  {
	$withdraw_amount=$this->db->select_sum('debit_amt')->from('credit_debit')->where(array('user_id'=>$user_id,'reason'=>'13'))->get()->row();		 
	$withdraw_amount=(!empty($withdraw_amount->debit_amt))?$withdraw_amount->debit_amt:'0';
	$res['withdraw_amount'] = $withdraw_amount;
	$income=$this->db->select_sum('credit_amt')->from('credit_debit')->where('user_id = "'.$user_id.'" and reason in (5,6,9,10)')->get()->row();		 
	$income=(!empty($income->credit_amt))?$income->credit_amt:'0';
	$res['income'] = $income;
	$transfer=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id'=>$user_id,'reason'=>'12'))->get()->row();		 
	$transfer=(!empty($transfer->credit_amt))?$transfer->credit_amt:'0';
	$res['transfer'] = $transfer;
	return $res;
  } 
  //end method
  public function getCommBalance($user_id)
	{
		 $credit_amount_info=$this->db->select_sum('credit_amt')->from('credit_debit')->where(array('user_id'=>$user_id,'reason'=>'9'))->get()->row();
		 
		 $credit_amount=(!empty($credit_amount_info->credit_amt))?$credit_amount_info->credit_amt:'0';
		 return $credit_amount;
	}
  public function getEwalletStatements($user_id)
   {
      $statementQuery=$this->db->select('cd.transaction_no,cd.status, cd.user_id, cd.credit_amt, cd.debit_amt, cd.balance, cd.ttype as title, cd.TranDescription as description, cd.create_date as date,cd.reason,cd.receiver_id,cd.sender_id,cd.level')->from('credit_debit as cd')
      ->join('user_registration as u', 'u.user_id=cd.user_id')
      ->order_by('cd.id','DESC')
      ->where('u.user_id',$user_id)
      ->get();
      $result=$statementQuery->result();
      $result=(!empty($result))?$result:array();
      return $result;
   }//end method
   public function getAjaxEwalletStatements($user_id)
  {
        $requestData = $_GET;
		/*
		$requestData['length']=10; 
		$requestData['start']=1;
		*/
		$sql=$this->db->select('cd.transaction_no,cd.status, cd.user_id, cd.credit_amt, cd.debit_amt, cd.balance, cd.ttype as title, cd.TranDescription as description, cd.create_date as date,cd.reason,cd.receiver_id,cd.sender_id,cd.level',false)
		->from('credit_debit as cd')
        ->join('user_registration as u', 'u.user_id=cd.user_id');
		if (!empty($requestData['search']['value'])) {
                $ser = strtolower($requestData['search']['value']);
                
				$sql->where("(LOWER(cd.ttype) like '%$ser%'");
                
				$sql->or_where("cd.transaction_no like '%$ser%' ");
				
				$sql->or_where("cd.user_id like '%$ser%' ");
				
				$sql->or_where("cd.credit_amt like '%$ser%' ");
				
				$sql->or_where("cd.debit_amt like '%$ser%' ");
				
				$sql->or_where("cd.balance like '%$ser%' ");

				$sql->or_where("cd.reason like '%$ser%' ");
				
				$sql->or_where("u.user_id like '%$ser%' ");
                
				$sql->or_where("cd.create_date like '%$ser%' )");
             
			 
			 }
             //$sql->order_by('u.id', 'desc');
			$sql->where_in('u.user_id',array($user_id));
			$sql->order_by('cd.id','DESC');
			$sql1 = clone $sql;
			if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);   
             }
            $query = $sql->get()->result();
			$totalData = $totalFiltered = $sql1->get()->num_rows();             
			$data = array();
			$sr_no = $requestData['start'];
            foreach ($query as $row) 
			{
                $active_status_class=($row->status=='1')?'label-success':'label-danger';
                $active_status_label=($row->status=='1')?'Credit':'Debit';
				
				$status=html_entity_decode('<span class="label '.$active_status_class.'">'.$active_status_label.'</span>');
				
				
				$amount=($row->status==1)?$row->credit_amt:$row->debit_amt;
				
				$sign=($row->status==1)?"+":"-";
				
				
				if($row->reason=='11')
				{
					$row->description=$row->description." to ".get_user_name($row->receiver_id);
				}
				if($statementObj->reason=='12')
				{
					$row->description="Fund receive credit amount by ".get_user_name($row->sender_id);
				}
				else if($row->reason=='19')
				{
					$row->description=$row->description." to ".get_user_name($row->receiver_id);
				}
				else if($row->reason=='21')
				{
				   $row->description=$row->description." by ".get_user_name($row->sender_id);
				}
				else if($row->reason=='1')
				{
					$row->description=$row->description." by ".get_user_name($row->sender_id);
				}
				else if($row->reason=='37')
				{
					$row->description=$row->title." get from ".get_user_name($row->sender_id)." of level ".$row->level;
				}
				
				$nestedData = array();
                $nestedData[] = ++$sr_no;
				$nestedData[] = ucwords($row->transaction_no);
                $nestedData[] = ucwords($row->title);
				$nestedData[] = $row->balance." ".currency();
				$nestedData[] = $sign.$amount." ".currency();
				$nestedData[] = $status;
				$nestedData[] = $row->description;
				$nestedData[] = date('m/d/Y H:i:s',strtotime($row->date));
                $data[] = $nestedData;
           }
            $json_data = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            );
            return  $json_data;
   }//end method 
   public function getAjaxEwalletRepurchaseStatements($user_id)
  {
        $requestData = $_GET;
		/*
		$requestData['length']=10; 
		$requestData['start']=1;
		*/
		$sql=$this->db->select('cd.transaction_no,cd.status, cd.user_id, cd.credit_amt, cd.debit_amt, cd.balance, cd.ttype as title, cd.TranDescription as description, cd.create_date as date,cd.reason,cd.receiver_id,cd.sender_id,cd.level',false)
		->from('credit_debit as cd')
        ->join('user_registration as u', 'u.user_id=cd.user_id');
		if (!empty($requestData['search']['value'])) {
                $ser = strtolower($requestData['search']['value']);
                
				$sql->where("(LOWER(cd.ttype) like '%$ser%'");
                
				$sql->or_where("cd.transaction_no like '%$ser%' ");
				
				$sql->or_where("cd.user_id like '%$ser%' ");
				
				$sql->or_where("cd.credit_amt like '%$ser%' ");
				
				$sql->or_where("cd.debit_amt like '%$ser%' ");
				
				$sql->or_where("cd.balance like '%$ser%' ");

				$sql->or_where("cd.reason like '%$ser%' ");
				
				$sql->or_where("u.user_id like '%$ser%' ");
                
				$sql->or_where("cd.create_date like '%$ser%' )");
             
			 
			 }
             //$sql->order_by('u.id', 'desc');
			$sql->where_in('u.user_id',array($user_id));
			$sql->where('payment_method_name','repurchase');
			$sql->order_by('cd.id','DESC');
			$sql1 = clone $sql;
			if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);   
             }
            $query = $sql->get()->result();
			$totalData = $totalFiltered = $sql1->get()->num_rows();             
			$data = array();
			$sr_no = $requestData['start'];
            foreach ($query as $row) 
			{
                $active_status_class=($row->status=='1')?'label-success':'label-danger';
                $active_status_label=($row->status=='1')?'Credit':'Debit';
				
				$status=html_entity_decode('<span class="label '.$active_status_class.'">'.$active_status_label.'</span>');
				
				
				$amount=($row->status==1)?$row->credit_amt:$row->debit_amt;
				
				$sign=($row->status==1)?"+":"-";
				
				
				if($row->reason=='11')
				{
					$row->description=$row->description." to ".get_user_name($row->receiver_id);
				}
				if($statementObj->reason=='12')
				{
					$row->description="Fund receive credit amount by ".get_user_name($row->sender_id);
				}
				else if($row->reason=='19')
				{
					$row->description=$row->description." to ".get_user_name($row->receiver_id);
				}
				else if($row->reason=='21')
				{
				   $row->description=$row->description." by ".get_user_name($row->sender_id);
				}
				else if($row->reason=='1')
				{
					$row->description=$row->description." by ".get_user_name($row->sender_id);
				}
				else if($row->reason=='37')
				{
					$row->description=$row->title." get from ".get_user_name($row->sender_id)." of level ".$row->level;
				}
				
				$nestedData = array();
                $nestedData[] = ++$sr_no;
				$nestedData[] = ucwords($row->transaction_no);
                $nestedData[] = ucwords($row->title);
				$nestedData[] = $row->balance." ".currency();
				$nestedData[] = $sign.$amount." ".currency();
				$nestedData[] = $status;
				$nestedData[] = $row->description;
				$nestedData[] = date('m/d/Y H:i:s',strtotime($row->date));
                $data[] = $nestedData;
           }
            $json_data = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            );
            return  $json_data;
   }//end method 
   public function getAllFundTransferStatement($user_id)
   {
    $query="select u.username,cd.transaction_no, cd.credit_amt, cd.debit_amt, cd.receiver_id, cd.sender_id,cd.status, cd.receive_date from credit_debit as cd left join user_registration as u on u.user_id=cd.user_id where cd.user_id='$user_id' and (cd.reason='11') order by cd.id desc";
    $query=$this->db->query($query);
    //echo $this->db->last_query();
    //die;
    $result=(!empty($query->result()))?$query->result():array();
    return $result;
   }//end method  
  /*
   @Desc: It's return collection of all the withdrawl request for specific user
   */ 
   public function getDepositWalletAmountRequest($user_id)
   {
    $allRequet=$this->db->select(array(
      'd.id',
      'd.deposit_id',
      'd.amount',
      'd.title',
      'd.file_proof',
      'd.status',
      'd.request_date',
      'd.response_date'
      ))->from('deposit_wallet_amount_request d')->where('user_id',$user_id)->order_by('id', 'desc')->get()->result();
    $request=(!empty($allRequet))?$allRequet:array();
    return $request;
   }//end method
}//end class
?>
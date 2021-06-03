<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Payout Management</span> - <?php echo $title;?></h4>
         </div>
         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>
            <li>Payout Management</li>
            <li class='active'><?php echo $title;?></li>
         </ul>
         <ul class="breadcrumb">
         </ul>
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">
      <!-- Horizontal form options -->
      <div class="row">
         <?php 
         if(!empty($this->session->flashdata('flash_msg')))
         {
         ?>
         <div class="col-md-12">
            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
               <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
               <?php echo $this->session->flashdata('flash_msg');?>
            </div>
         </div>
         <?php    
         }
         ?>		 		 
		 <?php          
		 if(!empty($this->session->flashdata('error_msg')))         
		 {  
		?>         
		<div class="col-md-12">            
			<div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">               
			<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>               
			 <?php echo $this->session->flashdata('error_msg');?>            
			 </div>         
		 </div>         
		 <?php             
		 }        
		 ?>
         <div class="col-md-6">
            <!-- Basic layout-->
            <div class="panel panel-flat border-top-success">
               <!-- Subscription form -->
               <div class="panel panel-flat">
                  <div class="panel-heading">
                     <h6 class="panel-title">Withdraw My Fund </h6>
                  </div>
                  <?php 
                  $request_title=(!empty($request_title))?$request_title:null;
                  $request_amount=(!empty($request_amount))?$request_amount:null;
                  $tran_password=(!empty($tran_password))?$tran_password:null;
                  echo form_open(site_url()."user/payout/withdrawlMyFund",array('method'=>'post','class'=>'panel-body', 'novalidate' => 'true', 'id' => "form"));
                  ?>
                  <h5 style="color:red" id="error_msg"></h5>
                  <h5 style="color:green" id="success_msg"></h5>
                  <!--<form class="panel-body" action="#">-->
                     <div class="panel panel-flat" style="display: none;">
                        <div class="panel-heading">
                           <h6 class="panel-title">Wallet Amount</h6>
                        </div>
                        <div class="panel-body">
                           <input id="wallet_amount"  type="text" value="<?php echo $current_balance;?>" disabled type="text" value="<?php echo $current_balance;?>" class="form-control">
                        </div>
                        <div id="rem_amount_div">
                        </div>
                     </div>
                     
					 <i>Enter Withdrawal Amount</i>
                     <div class="form-group has-feedback">
                        <input name="request_amount" type="number" onchange="amountCalculator();" id="request_amount" value="<?php echo set_value('request_amount',$request_amount);?>" class="form-control" placeholder="Enter Amount to Withdraw">
                        <span style="color:red;display:none" id="valid_request_amount">
                        <?php 
                        echo form_error('amount');
                        ?>
                        </span>

                        <span style="color:green;" id="payableAmount">
                        </span>
                     </div>	

                     


                     				 					 					 <div class="form-group has-feedback">                       <select required name='payout_method' id="payout_method" class='form-control' onChange="checkUserID();">	
					 <option value=''>Choose payment Method</option>			
					 <option value='1'>Bank Wire</option>	
					 </select>  

                  <span style="color:green;" id="bank_info">
                  </span>

					 </div>

                <i>Enter Title</i>
                <div class="form-group has-feedback">
                        <input name="request_title" value="<?php echo set_value('request_title',$request_title);?>"  type="text" class="form-control" placeholder="Enter Title">
                     </div>
					 
					 <i>Enter Transaction Password</i>
                     <div class="form-group has-feedback">
                        <input type="password" value="<?php echo set_value('tran_password',$tran_password);?>" name="tran_password" class="form-control" placeholder="Enter Transaction Password">
                        <span style="color:red;font-weight:bold" class='error'>
                        <?php 
                           echo form_error('tran_password');
                        ?>
                        </span>  
                     </div>
                     <div class="row">
                        <div class="col-xs-6">
                           <div class="checkbox disabled">
                              <label>
                              <input type="checkbox" class="styled" checked="checked" disabled="disabled">
                              Accept terms
                              </label>
                           </div>
                           <input type="hidden" name="btn" value="">
                        </div>
                        <div class="col-xs-6 text-right">
                           <button type="submit" name="btn1" value="submit" id="btns" class="btn btn-info">Withdraw My Fund</button>
                        </div>
                     </div>
                  <!--</form>-->
                  </form>
               </div>
               <!-- /subscription form -->
            </div>
            <!-- /basic layout -->
         </div>
         <div class="col-md-6">
            <div class="panel panel-body bg-danger-400 has-bg-image">
               <div class="media no-margin">
                  <div class="media-body">
                     <h3 class="no-margin"><?php echo currency()." ".$current_balance;?></h3>
                     <span class="text-uppercase text-size-mini">My Wallet Balance</span>
                  </div>
                  <div class="media-right media-middle">
                     <i class="icon-wallet icon-3x opacity-75"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /vertical form options -->
      <!-- Footer -->
      <?php 
         $this->load->view('common/footer-text');
         ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
<script>
   function deleteConfirm()
   {
   
      if(window.confirm("Are you sure, you want to delete"))
       return true;
     else 
       return false;
   }
</script>

<script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/jquery.loading.block.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/loader.function.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
$(document).ready(function(){
      $("#btns").click(function(){
         
         if(confirm("Are you Sure want to transfer fund!")){
            $("input[name=btn]").val('submit');
            document.getElementById("form").submit();
            return false;
         }else {
            return false;
         }
         
	  $("#error_msg").text('');
	  jQuery.ajax({
                  type:'POST',
                  data:{'request_title':$("input[name=request_title]").val(),'request_amount':$("input[name=request_amount]").val(), 'payout_method':$("select[name=payout_method]").val(),'tran_password':$("input[name=tran_password]").val()},
                  url:'<?php echo site_url();?>user/payout/ajaxWidthdrawFund/',
				      //async:false,
                  beforeSend: function () {
                       $.loader("on", '<?php echo site_url();?>admin_assets/images/default.svg');
                     },
				  success:function(res){
					  if(res.status=='1')
					  {
                  swal({
							title: res.message,
							confirmButtonColor: "#2196F3"
							},function(){
								window.location.reload();
                     });
                     
                  /*$("#success_msg").text(res.message).fadeOut(5000);
                  setTimeout(function() {
                     location.reload();
                  }, 6000);*/
					   //window.location.href='<?php echo site_url();?>user/auth/login/'+res.username+"/"+res.password;
					  }
					  else 
					  {
                  swal({
							title: res.message,
							confirmButtonColor: "#2196F3"
							},function(){
								//window.location.reload();
							});


						  //$("#error_msg").text(res.message);
					  }
					
                  },//end success
                  complete: function () {
                       $.loader("off", '<?php echo site_url();?>admin_assets/images/default.svg');
                   }
             });//end ajax
			 return false;
   });//end click
});//end ready


  function amountCalculator(){
    var amount =document.getElementById("request_amount").value;
    var deduction = (amount*400);
    var payableAmount = (deduction);
    if(payableAmount > 0){
      document.getElementById("payableAmount").innerHTML = 'Payable Amount: '+ payableAmount + ' NGN';
    }else{
      document.getElementById("payableAmount").innerHTML = 'Please enter vaild amount!';
    }
  }


  // function checkUserID(){
  //   // var id = document.getElementById("sponser_id").value;
  //   fetch("<?php echo site_url('user/payout/getBankDetails');?>", {
  //           method: "GET",
  //           // headers: {
  //           //   "Content-Type": "application/json",
  //           //   "Accept": "application/json",
  //           //   "X-Requested-With": "XMLHttpRequest"
  //           // },
  //       })
  //       .then(response => response.json())
  //       .then(result => {
  //           console.log(result);
  //           if(result.status == '1'){
  //             //document.getElementById("name").innerHTML = result.name;
  //             // document.getElementById("name").value = result.name;
  //           }else{
  //             // document.getElementById("name").innerHTML = "Invaild Sponser ID";
  //             // document.getElementById("sponser_id").value = "";
  //           }
  //       });
  // }

  function checkUserID() {
      var id = document.getElementById("payout_method").value;
      if(id > 0){
        var url = '<?php echo site_url('user/payout/getBankDetails');?>';
        $.get(url, function (res) {
            // console.log(res.bank_name);
            document.getElementById("bank_info").innerHTML = 'Bank Name: '+res.bank_name+'<br> Account Holder Name: '+ res.account_holder_name+'<br> Account No. :'+res.account_no+'<br> IFSC Code: '+res.ifsc_code;
        },'json')
     }else{
      document.getElementById("bank_info").innerHTML = '';
     }
   }


</script>  
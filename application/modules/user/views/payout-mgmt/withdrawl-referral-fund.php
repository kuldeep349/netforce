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
                  
                  $request_amount=(!empty($request_amount))?$request_amount:null;
                  
                  echo form_open(site_url()."user/payout/withdrawBalanceR",array('method'=>'post','class'=>'panel-body', 'novalidate' => 'true', 'id' => "form"));
                  ?>
                  <h5 style="color:red" id="error_msg"></h5>
                  <h5 style="color:green" id="success_msg"></h5>
                  <!--<form class="panel-body" action="#">-->
                     
					 <i>Enter  Amount</i>
                     <div class="form-group has-feedback">
                        <input name="request_amount" type="number" id="request_amount" value="<?php echo set_value('request_amount',$request_amount);?>" class="form-control" placeholder="Enter Amount to Withdraw">
                        <span style="color:red;display:none" id="valid_request_amount">
                        <?php 
                        echo form_error('amount');
                        ?>
                        </span>
                     </div>		
                     
					 
                     <div class="row">
                        <div class="col-xs-6">
                           <input type="hidden" name="btn" value="">
                           
                        </div>
                        <div class="col-xs-6 text-right">
                            
                           <button type="submit" name="btn1" value="submit"  class="btn btn-info">Transfer to Transaction Wallet</button>
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
                     <span class="text-uppercase text-size-mini">My Referral Wallet Balance</span>
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
</script>  
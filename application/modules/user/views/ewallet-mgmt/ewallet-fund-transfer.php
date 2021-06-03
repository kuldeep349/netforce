<script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/notifications/sweet_alert.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/pages/components_modals.js"></script>
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Ewallet Management</span> - <?php echo $title;?></h4>
         </div>
         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>
            <li>Ewallet Management</li>
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
		 echo validation_errors();
         ?>
		 <div class="col-md-12">
            <div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered" style="display:none" id="error_alert">
               <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
               <p id="error_msg"></p>
            </div>
         </div>
         <div class="col-md-6">
            <!-- Basic layout-->
            <div class="panel panel-flat border-top-success">
               <!-- Subscription form -->
               <div class="panel panel-flat">
                  <div class="panel-heading">
                     <h6 class="panel-title">Transfer Wallet Fund </h6>
                  </div>
                  <?php 
                  echo form_open(site_url()."user/ewallet/ewalletFundTransfer",array('method'=>'post','class'=>'panel-body' , 'enctype'=>'multipart/form-data', 'id' => 'form'));
                  ?>
                  <!--<form class="panel-body" action="#">-->
                      <i>Enter Username/ UserId</i>
					  <div class="form-group has-feedback">
                        <input type="text"  name="username" id="username" class="form-control" placeholder="Enter Username/ UserId" >
						<span id="valid_username" style="font-weight:bold;"></span>
                          
                      </div>
					  <i>Enter Amount</i>
                      <div class="form-group has-feedback">
                        <input type="text"  name="amount" id="amount" class="form-control" placeholder="Amount">
						<span id="valid_amount" style="font-weight:bold;"></span>
                     </div>
                      <i>Enter Transaction Password</i>
					 <div class="form-group has-feedback">
                        <input type="password" name="tran_password" id="tran_password" class="form-control" placeholder="Enter Transaction Password" >
						<span id="valid_tran_password" style="font-weight:bold;"></span>
                         
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
                           <button type="submit" name="btn1" id="btn" value="submit" class="btn btn-info">Transfer  Fund</button>
                        </div>
						
                     </div>
                  <!--</form>-->
                  <?php echo form_close();?>
               </div>
               <!-- /subscription form -->
            </div>
            <!-- /basic layout -->
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

<style>
   span.error 
      {
          color: red;
          font-weight: bold;
      }
</style>
<script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/jquery.loading.block.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/loader.function.js"></script>
<script>
$(document).ready(function(){
	$("#btn").click(function(){

      if(confirm("Are you Sure want to transfer fund!")){
            $("input[name=btn]").val('submit');
            document.getElementById("form").submit();
            return false;
         }else {
            return false;
         }

		///////////////////////
		var username=$("#username").val();
		var amount=$("#amount").val();
		var tran_password=$("#tran_password").val();
		jQuery.ajax({
                  type:'POST',
				  dataType: 'json',
				  data:{'username':username,'amount':amount,'tran_password':tran_password},
                  url:'<?php echo site_url();?>user/ewallet/ajax_ewallet_fund_transfer/',
                  //async:false,
                  beforeSend: function () {
                       $.loader("on", '<?php echo site_url();?>admin_assets/images/default.svg');
                     },
                  success:function(res){
					   
					   if(res.msg=='error')
					   {
						   swal({
							title: res.data,
							confirmButtonColor: "#2196F3"
							},function(){
								//window.location.reload();
							});
					   }
					   else if(res.msg=='success')
					   {
						  swal({
							title: res.data,
							confirmButtonColor: "#2196F3"
							},function(){
								window.location.reload();
							}); 
					   }
					   
                   },
				complete: function () {
                       $.loader("off", '<?php echo site_url();?>admin_assets/images/default.svg');
                   }   
             });//end ajax		
		//////////////////////////
		//return false;
	return false;
	});//end btn click
	
});//end ready   
</script>

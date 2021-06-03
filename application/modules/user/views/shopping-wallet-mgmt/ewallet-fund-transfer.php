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
         <div class="col-md-6">
            <!-- Basic layout-->
            <div class="panel panel-flat border-top-success">
               <!-- Subscription form -->
               <div class="panel panel-flat">
                  <div class="panel-heading">
                     <h6 class="panel-title">Transfer Wallet Fund </h6>
                  </div>
                  <?php 
                  $username=(!empty($username))?$username:null;
                  $amount=(!empty($amount))?$amount:null;
                  $tran_password=(!empty($tran_password))?$tran_password:null;
                  echo form_open(site_url()."user/ewallet/ewalletFundTransfer",array('method'=>'post','class'=>'panel-body' , 'enctype'=>'multipart/form-data'));
                  ?>
                  <!--<form class="panel-body" action="#">-->
                    <div class="form-group has-feedback">
                        <label class="display-block">Select User</label>
                        <select name="username" id="username" class="select-menu-color">
                           <optgroup label="Receiver Id OR Username">
                              <option value="">-Select User-</option>
                              <?php 
                                 if(!empty($all_active_members) && count($all_active_members)>0)
                                 {
                                   foreach($all_active_members as $member)
                                   {
                                 ?>
                              <option value="<?php echo $member->user_id;?>"><?php echo $member->username;?></option>
                              <?php
                                    }
                                 }
                                 ?>
                           </optgroup>
                        </select>
						<span class='error'>
                           <?php 
                           echo form_error('username');
                           ?>
                        </span>
						<span id="valid_username" style="color:green;font-weight:bold;">
						</span>
                        <span style="color:red;font-weight:bold" class="d_valid_username"></span>
                     </div>
                     <div class="form-group has-feedback">
                        <input type="text" value="<?php echo set_value('amount',$amount);?>" name="amount" class="form-control" placeholder="Amount">
                        <span class='error'>
                           <?php 
                           echo form_error('amount');
                           ?>
                        </span>  
                     </div>
                     <div class="form-group has-feedback">
                        <input type="text" value="<?php echo set_value('tran_password',$tran_password);?>" name="tran_password" class="form-control" placeholder="Enter Transaction Password">
                        <span class='error'>
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
                        </div>
                        <div class="col-xs-6 text-right">
                           <button type="submit" name="btn" value="submit" class="btn btn-info">Transfer  Fund</button>
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
<script>
$(document).ready(function(){
  $("#username").change(function(){
  /////////
				jQuery.ajax({
                  type:'POST',
                  url:'<?php echo site_url();?>user/ewallet/getUserDetails',
                  data: {username:$("#username").val()},
                  async:false,
                  beforeSend: function () {
                       //$("#load").css("display", "block");
                       $.loader("on", '<?php echo site_url();?>admin_assets/images/default.svg');
                     },
                  success:function(res){
					  if(res.first_name!=null && res.last_name!=null)
					  {
					  $("#valid_username").text(res.first_name+" "+res.last_name);
					  }
                    
                  },//end success
                 complete: function () {
                       //$("#load").css("display", "none");
                       $.loader("off", '<?php echo site_url();?>admin_assets/images/default.svg');
                   } 
             });//end ajax  
  
  ///////////
  });
});
</script>
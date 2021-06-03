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
                  echo form_open(site_url()."user/payout/withdrawlMyFund",array('method'=>'post','class'=>'panel-body'));
                  ?>
                  <!--<form class="panel-body" action="#">-->
                     <div class="panel panel-flat">
                        <div class="panel-heading">
                           <h6 class="panel-title">Wallet Amount</h6>
                        </div>
                        <div class="panel-body">
                           <input id="wallet_amount" disabled type="text" value="<?php echo $current_balance;?>" disabled type="text" value="<?php echo $current_balance;?>" class="form-control">
                        </div>
                        <div id="rem_amount_div">
                        </div>
                     </div>
                     <i>Enter Title</i>
					 <div class="form-group has-feedback">
                        <input name="request_title" value="<?php echo set_value('request_title',$request_title);?>"  type="text" class="form-control" placeholder="Enter Title">
                     </div>
					 <i>Enter Withdrawal Amount (250 N will be admin charge on each withdrawal)</i>
                     <div class="form-group has-feedback">
                        <input name="request_amount" type="number" id="request_amount" value="<?php echo set_value('request_amount',$request_amount);?>" class="form-control" placeholder="Enter Amount to Withdraw">
                        <span style="color:red;display:none" id="valid_request_amount">
                        <?php 
                        echo form_error('amount');
                        ?>
                        </span>
                     </div>					 					 					 <div class="form-group has-feedback">                       <select required name='payout_method' class='form-control'>	
					 <option value=''>Choose payment Method</option>			
					 <option value='1'>Bank Wire</option>	
					 </select>  
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
                        </div>
                        <div class="col-xs-6 text-right">
                           <button id="submit_btn" type="submit" name="btn" value="submit" class="btn btn-info">Withdraw My Fund</button>
                        </div>
                     </div>
                  <!--</form>-->
                  <?php echo form_close();?>
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
<script>
$(document).ready(function(){
});//end ready
</script>   
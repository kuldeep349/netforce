<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<?php 
	$this->load->view('common/header');
	?>
	
	<body class="home page-template page-template-page-templates page-template-template-page-vc page-template-page-templatestemplate-page-vc-php page page-id-34 woocommerce-no-js wpb-js-composer js-comp-ver-5.4.7 vc_responsive">
      <div class="over-loader loader-live">
         <div class="loader">
            <div class="loader-item style5">
               <div class="bounce1"></div>
               <div class="bounce2"></div>
               <div class="bounce3"></div>
            </div>
         </div>
      </div>
      <div class="wrapper-boxed">
         <div class="site-wrapper">
            <!-- ================================ -->
            <!-- ============ HEADER ============ -->
           <?php 
		   $this->load->view('top-nav');
		   ?>
            <!-- ========== END OF HEADER  ========== -->
            <!-- ==================================== -->
            <!---------- Sub Header ---------->
            <!---------- Sub Header ---------->
           
           
            <div class="vc_row wpb_row vc_row-fluid sec-padding section-light">
               <div class="container">
         <div class="row justify-content-md-center">
            <div class="col-lg-12">
               <div class="card card-hero card-primary animated fadeInUp animation-delay-7">
                  <div class="card-body">
                     <h1 class="color-primary text-center">E-Wallet Payment</h1>
                     
                   <form action="<?php echo site_url();?>front/registerUserViaEwallet" method="post" class="sky-form" style="width: 100%">
                                    
                                    
            <header>Pay via Sponsor Wallet</header>
            <h5 class="validation_msg" style="color:red;font-weight:bold;"></h5>
            <?php 
                if(!empty($this->session->flashdata('error_msg')))
                {
                ?>
               <div class="alert alert-danger alert-styled-right alert-arrow-right alert-bordered">
                  <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                  <?php echo $this->session->flashdata('error_msg');?>
               </div>
               <?php    
                }
                ?>
            <fieldset>
               
                  <div class="row">
                     
                     <div class="col col-md-6">
                         <div class="form-item">
                             <label for="email" class="input-title">Login ID
										<abbr class="required" title="required">*</abbr></label>
                        
                           <i class="icon-append icon-user"></i>
                           <input type="hidden"  value="<?php echo $username;?>" readonly>
                           <input type="text" name="sponsor_user_name" id="sponsor_user_name" value="<?php echo $username;?>" required>
                        
                        </div>
                     </div>
                     </div>
                  <div class="row">
                     <div class="col col-md-6">
                        <div class="form-item">
                             <label for="email" class="input-title">Transaction Password
										<abbr class="required" title="required">*</abbr></label>
                        
                           <i class="icon-append icon-lock"></i>
                           <input type="password" name="sponsor_transaction_password" id="sponsor_transaction_password" required>
                        </div>
                     </div>
                     
                  
                  </div>
                  
              
            </fieldset>
            <footer>
                <button type="submit" name="btn" id="btns" value="submit" class="crumina-button button--green button--l">Pay Now</button>
            
            </footer>
         </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
            </div>
            <!-- =================================== -->
            <!-- ========== START FOOTER  ========== -->
            <!-- =================================== -->
            <?php 
			$this->load->view('common/footer');
			?>
            <!-- ================================= -->
            <!-- ========== END FOOTER  ========== -->
            <!-- ================================= -->
         </div>
      </div>
      <?php 
	  $this->load->view('common/footer-script');
	  ?>
   </body>
</html>
<style>
.label
{
  color:black;
  font-size: 14px;
}
</style>
<script>
/*jQuery(document).ready(function(){
  
  var sponsor_user_name='<?php echo $username;?>';
  var sponsor_transaction_password='<?php echo $transaction_pwd;?>';
  var sponsor_wallet_amount='<?php echo $sponsor_wallet_amount;?>';
  var pkg_amount='<?php echo $pkg_amount;?>';
  console.log(jQuery("#sponsor_transaction_password").val()+'!='+sponsor_transaction_password);
   jQuery("#btns").click(function(){
      if(jQuery("#sponsor_user_name").val()!=sponsor_user_name)
      {
          jQuery(".validation_msg").text('Please enter valid username/password!');
          return false;
      }
      
      if(jQuery("#sponsor_transaction_password").val()!=sponsor_transaction_password)
      {
          jQuery(".validation_msg").text('Please enter valid username/password!');
          return false;
      }
      if(parseInt(sponsor_wallet_amount)<parseInt(pkg_amount))
      {
          jQuery(".validation_msg").text('Sorry sponsor Wallet amount is less than to purchased package!');
          return false;
      }
      return true;
  });//end click function here!
});//end ready */
</script> 
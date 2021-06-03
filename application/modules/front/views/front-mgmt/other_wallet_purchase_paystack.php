<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<?php 
	$this->load->view('common/header');
	?>
	<link rel='stylesheet' id='bootstrap-css'  href='<?php echo base_url();?>front_assets/css/sky-forms.css' type='text/css' media='all' />
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
   <div class="card card-hero animated slideInUp animation-delay-8 mb-6">
      <div class="card-body">
        
               <div class="row">
                           <div class="heading-panel">
                              <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                                 <!-- Main Title -->
                                 <h1>  Pay Here</h1>
                                 <!-- Short Description -->
                                 <!--<p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu, his dico ut debet consectetuer.</p>-->
                              </div>
                           </div>
                           <div class="" style="box-shadow: 0px 0px 0px 0px;" >
                              <!-- Ads Archive 6 -->
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <div class="row">
                                    <div class="posts-masonry">		      
                                        <div class="col-md-12">	
                                        <?php
                                        // echo'<pre>';
                                        // // print_r($usd_price);
                                        // print_r($request);
                                        // echo'</pre>';
                                        ?>
                                        <form action="<?php echo site_url();?>front/OtherWalletpaystackPayment/" method="POST" >  
                                        <script 
                                        src="https://js.paystack.co/v1/inline.js" 
                                        data-key="<?php echo TEST_PUBLIC_KEY; ?>" 
                                        data-email="<?php echo $request['email']; ?>" 
                                        data-amount="<?php echo round($request['amount']) * 51800; ?>"
                                        data-ref="<?php echo generateReferenceNo(); ?>"> 
                                        </script>
                                        </form>
                                        </div>   		  
                  
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
         <hr class="dotted">
         
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

</script>

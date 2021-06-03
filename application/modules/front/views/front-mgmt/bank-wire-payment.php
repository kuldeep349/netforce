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
                                 <h1>  Pay Via Bank Wire </h1>
                                 <!-- Short Description -->
                                 <!--<p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu, his dico ut debet consectetuer.</p>-->
                              </div>
                           </div>
                           <div class="" style="box-shadow: 0px 0px 0px 0px;" >
                              <!-- Ads Archive 6 -->
                              <div class="col-md-12 col-xs-12 col-sm-12">
                                 <div class="row">
                                    <div class="posts-masonry">
                                     
                                   <form action="" class="sky-form" style="width:100%">
        <header>Bank Wire Detail</header>
        
        <fieldset>
          <section>
            <div class="row">

            
              <div class="col col-6">
              <p>Dear User Please Make the Payment on Below Bank Detail</p>
              <?php 
                            $name=(!empty($bank_wire_detail->name))?$bank_wire_detail->name:null;
                            $account_no=(!empty($bank_wire_detail->account_no))?$bank_wire_detail->account_no:null;
                            $bank_name=(!empty($bank_wire_detail->bank_name))?$bank_wire_detail->bank_name:null;
                            $branch_code=(!empty($bank_wire_detail->branch_code))?$bank_wire_detail->branch_code:null;
                            ?>
              <p>Name : <?php echo $name;?></p>
              <p>Account No : <?php echo $account_no;?></p>
              <p>Bank Name : <?php echo $bank_name;?></p>
              <p>Branch Code : <?php echo $branch_code;?></p>
              <?php 
              echo $this->session->userdata('flash_msg');
              ?>
              
              <!--<a href="<?php //echo site_url();?>front/uploadBankWireProof/"><p>Please upload your proof of payment to get conrirmed.</p></a>-->
              </div>
            </div>
          </section>
          
      
        </fieldset>
      
      </form>
                                   
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
form.sky-form {
    font-size: 20px !important;
}
</style>

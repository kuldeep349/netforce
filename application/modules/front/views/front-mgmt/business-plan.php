<!DOCTYPE html>
<html lang="en-US" class="no-js">
   <?php
	$this->load->view('common/header');
	?>
   <body class="page-template page-template-page-templates page-template-template-page-vc page-template-page-templatestemplate-page-vc-php page page-id-444 woocommerce-no-js wpb-js-composer js-comp-ver-5.4.7 vc_responsive">
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
            <!-- ================================ -->
            <!---------- Navigation Bar ---------->
             <?php
		   $this->load->view('top-nav');
		   ?>
            <!---------- Navigation Bar ---------->
            <!-- ==================================== -->
            <!-- ========== END OF HEADER  ========== -->
            <!-- ==================================== -->
            <!---------- Sub Header ---------->
            <!---------- Sub Header ---------->
            <div class="vc_row wpb_row vc_row-fluid page-title-1">
               <div class="container">
                  <div class="row">
                     <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                           <div class="wpb_wrapper">
                              <div class="text-center ">
                                 <h2 class="uppercase font-weight-8  ">
                                    Helpmate Business Plan
                                 </h2>
                                 <!--<h6 class="less1  font-weight-4  ">-->
                                 <!--   Apare took a galley of type and scramble to make a type specimen book onlycenturies but also the into release more recently.-->
                                 <!--</h6>-->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
           
            
            <div class="vc_row-full-width"></div>
            
             <section data-parallax-bg-image="<?php echo base_url();?>front_assets/images/parallax-img1.jpg" data-parallax-speed="1" data-parallax-direction="down" class="vc_section parallax vertical-align">
               <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid parallax-overlay bg-opacity-1">
                  <div class="sec-more-padding-1 wpb_column vc_column_container vc_col-sm-6">
                     <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                           <div class="text-center  ">
                              <h1 class="font-weight-7 margin-bottom-2">
                                 BUSINESS PLAN                              </h1>
                              <h5 class="font-weight-3 line-height-3 margin-bottom-6">Helpmate is an online business club that provides business grants to members using a Multi-Level Marketing strategy. Members can also use d platform to buy/sell digital products such as airtime/data (VTU), cable TV subscriptions, PHCN units and provide mobile money services (Virtual POS, cash withdrawals, deposits and transfers)</h5>
                              <a href="#" class="sitebutton-1 sty5 roboto font-weight-7 uppercase">
                              Join Now        </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="wpb_column vc_column_container vc_col-sm-6">
                     <div class="vc_column-inner ">
                        <div class="wpb_wrapper"></div>
                     </div>
                  </div>
               </div>
               <div class="vc_row-full-width"></div>
            </section>
            
            <div class="vc_row-full-width"></div>
            
            <!-- =================================== -->
            <!-- ========== START FOOTER  ========== -->
            <!-- =================================== -->
            <?php
			$this->load->view('common/footer');
			?>
            <!----------- Scroll Up ---------->
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
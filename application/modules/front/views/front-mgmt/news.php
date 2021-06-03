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
           
            
           
            <div class="vc_row-full-width"></div>
            
            
             <div class="vc_row wpb_row vc_row-fluid  section-less-padding-3">
               <div class="container">
                  <div class="row">
                     <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                           <div class="wpb_wrapper">
                              <div class=" ">
                                 <div class="col-md-12">
                                   
                                    <h2 class="font-weight-7 margin-bottom-2">News </h2>
                                    <p>coming soon</p>
                                    <?php
                                    echo'<pre>';
                                    print_r($packages);
                                    echo'</pre>';
                                    ?>
                            
                                 </div>
                                
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
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
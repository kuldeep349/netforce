
<!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('common/header');
	?>
<body>

    <?php
		   $this->load->view('top-nav');
		   ?>

    <!-- Start Banner
    ============================================= -->
    
    <!-- End Banner -->
    
     <!-- Start What We Do
    ============================================= -->
    <div class="we-do about-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 info">
                    <div class="content">
                        <h2>Opportunity</h2>
                        <h3>Coming Soon</h3>
                       
      
                    </div>
                </div>
                <!--<div class="col-md-6 bg-cover" style="background-image: url(<?php echo base_url();?>front_assets/images/14.jpg);">-->
                <!--</div>-->
            </div>
        </div>
    </div>
    <!-- End What We Do -->

 

  

    <!-- Start Footer
    ============================================= -->
      <?php
			$this->load->view('common/footer');
			?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <?php
	  $this->load->view('common/footer-script');
	  ?>

</body>
</html>
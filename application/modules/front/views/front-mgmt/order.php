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
            <style>
             .sitebutton-1.sty2 {
    color: #fff;
    border: 0px;
    background: #4d2684;
}
.sitebutton-1.sty2 {
    color: #fff;
    border: 0px;
    background: #4d2684;
}
.sitebutton-1 {
    color: #6453f7;
    border: 2px solid #6453f7;
    padding: 14px 36px;
    border-radius: 3px;
    text-align: center;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}
         </style>
           <?php
		   //$this->load->view('top-nav');
		   ?>
            <!-- ========== END OF HEADER  ========== -->
            <!-- ==================================== -->
            <!---------- Sub Header ---------->
            <!---------- Sub Header ---------->
           
           <br><br>
            <section class="page-section">
         <div class="container">
		<div class="row">
                  <div class="col-md-12" style="text-align:center;">
                     
                     <p style="text-align:center; padding-top: 25px; margin-bottom:0px;"> <img src="<?php echo base_url();?>front_assets/images/logo.png"/></p>
                     <h1 style="padding-bottom:5px;" class="color-primary text-center">Select Package</h1>
                      
                     <a href="<?php echo site_url();?>join-us" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                       SPONSOR DETAIL        </a>&nbsp; 
                                       
                                        <a href="<?php echo site_url();?>order" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                        PACKAGE     </a>&nbsp; 
                                       
                                      
                                       
                                        <a href="<?php echo site_url();?>save_personal_information" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                       SHIPPING DETAIL        </a>&nbsp; 
                                       
                                      
                                       
                                       
									    
									  
									  <a href="<?php echo site_url();?>confirm_order" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                      CONFIRM ORDER        </a>&nbsp;   
                                      
                                      
                                       
                                       
                 </div>
             </div>
             <br>
            <div class="row">
              
              <div class="row">
				<?php
				//pr($all_packages);
				  if(!empty($all_packages) && count($all_packages)>0)
				  {
					  foreach($all_packages as $package)
					  {
				?>
				<div class="col-md-12" style="text-align:center;">
					  <img src ="<?php echo base_url()."images/".$package->pkg_image;?>">
					  
					  <h6>Producto : <?php echo $package->title;?></h6>
					  <h6>Precio : <?php echo currency()." ".number_format($package->amount,2);?></h6>
					  
					 <p style="display:block; padding:20px; text-align:center;"> <a  href="#" class="sitebutton-1 sty2 roboto font-weight-7 uppercase buy_product_btn" pkg_id="<?php echo $package->id;?>">
										   SELECT        </a></p>
					</div>
				<?php
					  }//end foreach
				  }//end if
				  ?>
              </div>
              
              <br>
               <br>
              <?php
			  $pkg_id=(!empty($registration_info['order']['pkg_id']))?$registration_info['order']['pkg_id']:null;
			  //$pkg_id=4;
			  
			  ?>
              <div class="row">
                <div class="col-md-12">
                 <table id="items" class="table">
                <tbody>
				<tr>
                    <th class="visible-lg"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Package</font></font></th>
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Description</font></font></th>
                    <th class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quantity</font></font></th>
                    
                    <th class="text-right visible-lg"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Product Volume</font></font></th>
                    <th class="text-right visible-lg"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Price</font></font></th>
                   
                </tr>
				
				<tr>
                            
							<td class="visible-lg" id="product_name"></td>
                            
							<td id="product_description"></td>
							
							
							<td class="text-center" id="product_qty"></td>
							
							<td class="text-right visible-lg" id="product_volume"></td>
							
							<td class="text-right visible-lg" id="product_price"></td>
							
							
                        
							
                </tr>
            </tbody>
			</table>
            
            
            <div class="row">
        <div class="col-md-5">

			<?php
     
				///personal info
				$username=(!empty($registration_info['sponsor_and_account_info']['username']))?$registration_info['sponsor_and_account_info']['username']:null;
				
				$email=(!empty($registration_info['sponsor_and_account_info']['email']))?$registration_info['sponsor_and_account_info']['email']:null;
				
				$first_name=(!empty($registration_info['personal_info']['first_name']))?$registration_info['personal_info']['first_name']:null;
				
				$last_name=(!empty($registration_info['personal_info']['last_name']))?$registration_info['personal_info']['last_name']:null;
				
			?>
            
			
            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">User Information</font></font></strong><font style="vertical-align: inherit;">
			
			<font style="vertical-align: inherit;"> :
            </font></font><p>
			
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                User Name: <?php echo $username;?> </font></font><br>
				
			
				
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Email Id: <?php echo $email;?> </font></font><br>
				
				</p>
            
        </div>
        <div class="col-md-4">
            

        </div>
        <div class="col-md-3">
            <table class="table table-responsive">
                <tbody>
                            
                <tr><td><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Product Price</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> :</font></font></td><td class="text-right"><font style="vertical-align: inherit;">
				<font style="vertical-align: inherit;" id="grand_product_price"></font></font></td></tr>
				
                <tr><td><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Shipping Charge</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> :</font></font></td><td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="grand_shipping_charge">0.00</font></font></td></tr>
				
				
				<tr><td><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tax</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> :</font></font></td><td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="tax">0.00</font></font></td></tr>
                
                
                <tr><td><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> :</font></font></td><td class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="grand_total">0.00</font></font></td></tr>
               


            </tbody></table>
        </div>
    </div>
                </div>
              </div>
              
              
              
              
              
              
              
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
					 
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
                <?php
     
				///personal info
				$pkg_id=(!empty($registration_info['order']['pkg_id']))?$registration_info['order']['pkg_id']:null;
				
				//$pkg_id=4;
				///sponsor and account info
				?>
				<form name="registration" method="post" class="sky-form" action="<?php echo site_url();?>order">
				<?php
				if(!empty($pkg_id))
				{
				?>
				<input type="hidden" name="pkg_id" id="pkg_id" value="<?php echo $pkg_id;?>">
				<?php
				}
				else
				{
				?>
				<input type="hidden" name="pkg_id" id="pkg_id">
				<?php
				}
				?>
					<button type="submit" name="btn" id="btn" value="submit" class="button">CONTINUE</button>
                </form>
                  
				  <div>
                  </div>
               </div>
            </div>
         </div>
      </section>
            <!-- =================================== -->
            <!-- ========== START FOOTER  ========== -->
            <!-- =================================== -->
          
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
<!-- loader-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/jquery.loading.block.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/loader.function.js"></script>
<!-----loader---->
<script>
$(document).ready(function(){
	<?php
	if(!empty($pkg_id))
	{
	?>
	$("#pkg_id").val('<?php echo $pkg_id;?>')
	jQuery.ajax({
               type:'POST',
               url:'<?php echo site_url();?>front/get_ajax_package_info',
               data: {pkg_id:'<?php echo $pkg_id;?>'},
               async:false,
			   dataType:'json',
               beforeSend: function () {
                    jQuery.loader("on", '<?php echo site_url();?>admin_assets/images/default.svg');
                  },
               success:function(res){
				   $("#product_name").text(res.title);
				   $("#product_description").text(res.description);
				   $("#product_qty").text('1');
				   $("#product_volume").text(res.pv);
				   $("#product_price").text(res.amount);
				   
				   $("#grand_product_price").text(res.amount);
				   $("#tax").text(res.tax);
				  
				  $("#grand_shipping_charge").text(res.shipment_charge);
				  
				  var total=parseInt(res.amount)+parseInt(res.shipment_charge)+parseInt(res.tax);
				   $("#grand_total").text(total);
               },//end success
               complete: function () {
                    //$("#load").css("display", "none");
                    jQuery.loader("off", '<?php echo site_url();?>admin_assets/images/default.svg');
                }

          });//end ajax
	<?php
	}
	?>
	$(".buy_product_btn").click(function(){
		var pkg_id=$(this).attr('pkg_id');
		$("#pkg_id").val(pkg_id);
		jQuery.ajax({
               type:'POST',
               url:'<?php echo site_url();?>front/get_ajax_package_info',
               data: {'pkg_id':pkg_id},
               async:false,
			   dataType:'json',
               beforeSend: function () {
                    jQuery.loader("on", '<?php echo site_url();?>admin_assets/images/default.svg');
                  },
               success:function(res){
				  $("#product_name").text(res.title);
				   $("#product_description").text(res.description);
				   $("#product_qty").text('1');
				   $("#product_volume").text(res.pv);
				   $("#product_price").text(res.amount);
				   
				   $("#grand_product_price").text(res.amount);
				    $("#tax").text(res.tax);
				  
				  $("#grand_shipping_charge").text(res.shipment_charge);
				  
				  var total=parseInt(res.amount)+parseInt(res.shipment_charge)+parseInt(res.tax);
				   $("#grand_total").text(total);
				   
               },//end success
               complete: function () {
                    //$("#load").css("display", "none");
                    jQuery.loader("off", '<?php echo site_url();?>admin_assets/images/default.svg');
                }

          });//end ajax
	});
});
</script>
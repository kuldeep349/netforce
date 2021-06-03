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
                     <h1 style="padding-bottom:5px;" class="color-primary text-center">Confirm Order</h1>
                      
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
		<?php
		///sponsor and account info
		 $sponsor_id=(!empty($registration_info['sponsor_and_account_info']['ref_user_name']))?$registration_info['sponsor_and_account_info']['ref_user_name']:null;
		 if(!empty($replicated_username))
		  {
			$sponsor_id=$replicated_username;
		  }
		 $username=(!empty($registration_info['sponsor_and_account_info']['username']))?$registration_info['sponsor_and_account_info']['username']:null;
		 $email=(!empty($registration_info['sponsor_and_account_info']['email']))?$registration_info['sponsor_and_account_info']['email']:null;
		 $password=(!empty($registration_info['sponsor_and_account_info']['password']))?$registration_info['sponsor_and_account_info']['password']:null;
		 $t_code=(!empty($registration_info['sponsor_and_account_info']['t_code']))?$registration_info['sponsor_and_account_info']['t_code']:null;
		 $account_type=(!empty($registration_info['sponsor_and_account_info']['account_type']))?$registration_info['sponsor_and_account_info']['account_type']:null;
	  ////////////////////////////////////////
	  ///personal info
     $first_name=(!empty($registration_info['personal_info']['first_name']))?$registration_info['personal_info']['first_name']:null;
     $last_name=(!empty($registration_info['personal_info']['last_name']))?$registration_info['personal_info']['last_name']:null;
     $contact_no=(!empty($registration_info['personal_info']['contact_no']))?$registration_info['personal_info']['contact_no']:null;
     $country=(!empty($registration_info['personal_info']['country']))?$registration_info['personal_info']['country']:null;
     $state=(!empty($registration_info['personal_info']['state']))?$registration_info['personal_info']['state']:null;
     $city=(!empty($registration_info['personal_info']['city']))?$registration_info['personal_info']['city']:null;
     $address_line1=(!empty($registration_info['personal_info']['address_line1']))?$registration_info['personal_info']['address_line1']:null;
	  $zip_code=(!empty($registration_info['personal_info']['zip_code']))?$registration_info['personal_info']['zip_code']:null;
     ///sponsor and account info
	 $business_name=(!empty($registration_info['personal_info']['business_name']))?$registration_info['personal_info']['business_name']:null;
	 $tax_id=(!empty($registration_info['personal_info']['tax_id']))?$registration_info['personal_info']['tax_id']:null;
	 ///bank info
     $bank_name=(!empty($registration_info['bank_account_info']['bank_name']))?$registration_info['bank_account_info']['bank_name']:null;
	 
	 $account_no=(!empty($registration_info['bank_account_info']['account_no']))?$registration_info['bank_account_info']['account_no']:null;
	 
	 
	 $transaction_date=(!empty($registration_info['bank_account_info']['transaction_date']))?$registration_info['bank_account_info']['transaction_date']:null;
	 
	 
	 $transaction_id=(!empty($registration_info['bank_account_info']['transaction_id']))?$registration_info['bank_account_info']['transaction_id']:null;
	  

        ?>
		<div class="row">
                 <div class="col-md-6">
                  <table>
                    <tr>
                      <th>
                        Sponsor Information
                      </th>
                      <th>
                        &nbsp;
                      </th>
                    </tr>
                    <tr>
                      <td>
                        User Name 
                      </td>
                       <td>
                        <?php echo $username;?>
                      </td>
                    </tr>
                    
                     
                     <tr>
                      <td>
                       Sponsor Detail
                      </td>
                       <td>
                        <?php echo $sponsor_id;?>
                      </td>
                    </tr>
                  </table>
                 </div>
                 
                  <div class="col-md-6">
                  <table>
                    <tr>
                      <th>
                        Personal Detail
                      </th>
                      <th>
                        &nbsp;
                      </th>
                    </tr>
                    <tr>
                      <td>
                        First Name
                      </td>
                       <td>
                        <?php echo $first_name;?>
                      </td>
                    </tr>
                    
                     <tr>
                      <td>
                      Last Name
                      </td>
                       <td>
                        <?php echo $last_name;?>
                      </td>
                    </tr>
                    
                     <tr>
                      <td>
                        ID Number
                      </td>
                       <td>
                        <?php echo $tax_id;?>
                      </td>
                    </tr>
					
					<tr>
                      <td>
                        Mobile No
                      </td>
                       <td>
                        <?php echo $contact_no;?>
                      </td>
                    </tr>
					
					
					<tr>
                      <td>
                        Email Id
                      </td>
                       <td>
                        <?php echo $email;?>
                      </td>
                    </tr>
					
					<tr>
                      <td>
                        Address
                      </td>
                       <td>
                        <?php echo $address_line1;?>
                      </td>
                    </tr>
                  </table>
                 </div>
                 
                  
             </div>
             <br>
            <div class="row">
              
              
              
              <br>
               <br>
              
             
              
              
              
              
              
              
              
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php
     
     ///personal info
     $first_name=(!empty($registration_info['personal_info']['first_name']))?$registration_info['personal_info']['first_name']:null;
     $last_name=(!empty($registration_info['personal_info']['last_name']))?$registration_info['personal_info']['last_name']:null;
     $contact_no=(!empty($registration_info['personal_info']['contact_no']))?$registration_info['personal_info']['contact_no']:null;
     $country=(!empty($registration_info['personal_info']['country']))?$registration_info['personal_info']['country']:null;
     $state=(!empty($registration_info['personal_info']['state']))?$registration_info['personal_info']['state']:null;
     $city=(!empty($registration_info['personal_info']['city']))?$registration_info['personal_info']['city']:null;
     $address_line1=(!empty($registration_info['personal_info']['address_line1']))?$registration_info['personal_info']['address_line1']:null;
     ///sponsor and account info
     ?>
					 
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
					 
                  <form name="registration" method="post" class="sky-form" action="<?php echo site_url();?>payment-option">
                              
                              <fieldset>
	<section>
	<div class="row">
	<p><b>Package Detail:</b></p>
	<br>
    		
	  <table class='table table-bordered table-striped table-hover'>
	  <tr>
	  <td style='text-align:left'>Package Name:  </td><td> <?php echo $product_info->title;?></td>
	  </tr>
	  
	  <tr>
	  <td style='text-align:left'>Package Image : </td><td> <img width="350" src="<?php echo base_url()."images/".$product_info->pkg_image;?>"></td>
	  </tr>

	  
	  <tr>
	  <td style='text-align:left'> Description : </td><td> <?php echo $product_info->description;?></td>
	  </tr>
	  
	   <tr>
		<td style='text-align:left'>Package Price : </td><td> <?php echo $product_info->amount;?></td>
	  </tr>
	  
	  <tr>
		<td style='text-align:left'>Quantity : </td><td> 1</td>
	  </tr>
	  
	  <tr>
		<td style='text-align:left'>Shipment charge : </td><td> <?php echo $product_info->shipment_charge;?></td>
	  </tr>
	  
	  
	  <tr>
		<td style='text-align:left'>Tax : </td><td> <?php echo $product_info->tax;?></td>
	  </tr>
	  
	   <tr>
		<td style='text-align:left'>Total Price : </td><td> <?php echo $product_info->amount+$product_info->shipment_charge+$product_info->tax;?></td>
	  </tr>

	 
	 
	 
	 </table>
	<br>
	 </div>
	 </section>
	 </fieldset>
                              
                              <footer>
                                   
                                 <button type="submit" name="btn" id="btn" value="submit" class="button">CONTINUE</button>
                              </footer>
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

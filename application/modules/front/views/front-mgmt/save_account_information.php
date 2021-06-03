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
           
           <br><br>
            <section class="page-section">
         <div class="container">
		 <div class="row">
                 <div class="col-md-12">
                     <a href="#" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                       Sponsor Detail        </a>&nbsp; 
                                       
                                        <a href="#" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                       Personal Detail        </a>&nbsp; 
                                       
                                      
                                       
                                        <a href="#" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                       Agreement        </a>&nbsp; 
                                       
                                      
                                       
                                        <a href="#" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                      Order        </a>&nbsp; 
                                      
                                      
                                       
                                        <a href="#" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                       Payment         </a>&nbsp; 
                 </div>
             </div>
             <br>
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php 
     ///sponsor and account info
     $account_holder_name=(!empty($registration_info['bank_account_info']['account_holder_name']))?$registration_info['bank_account_info']['account_holder_name']:null;
     $account_no=(!empty($registration_info['bank_account_info']['account_no']))?$registration_info['bank_account_info']['account_no']:null;
     $bank_name=(!empty($registration_info['bank_account_info']['bank_name']))?$registration_info['bank_account_info']['bank_name']:null;
     $branch_name=(!empty($registration_info['bank_account_info']['branch_name']))?$registration_info['bank_account_info']['branch_name']:null;
	 $bit_coin_id=(!empty($registration_info['bit_coin_info']['bit_coin_id']))?$registration_info['bit_coin_info']['bit_coin_id']:null;
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
					 
                  <form name="registration" method="post" class="sky-form" action="<?php echo site_url();?>save_account_information">
                              <fieldset style="padding:0px; margin:0px;">
                                 <header> Bank Account Information</header>
                              </fieldset>
                              <fieldset>
                                 <div class="row">
								 <section class="col col-6">
                                       <label class="input">
                                       <input type="text" name="account_holder_name" value="<?php echo $account_holder_name;?>" placeholder="Enter Account Holder Name">
                                       </label>
                                    </section>
                                    <section class="col col-6">
                                       <label class="input">
                                       <input type="text" name="account_no" value="<?php echo $account_no;?>" placeholder="Enter Account Number">
                                       </label>
                                    </section>
                                 </div>
                                 <div class="row">
                                    
                                    <section class="col col-6">
                                       <label class="input">
                                       <input type="text" name="bank_name" value="<?php echo $bank_name;?>" placeholder="Enter Bank Name">
                                       </label>
                                    </section>
									<section class="col col-6">
                                       <label class="input">
                                       <input type="text" name="branch_name" value="<?php echo $branch_name;?>" placeholder="Enter Branch Name">
                                       </label>
                                    </section>
                                 </div>
                                 <div class="row"></div>
                              </fieldset>
                              <footer>
                                 <label class="checkbox">  
                                 <?php 
                                 if(!empty($registration_info) && count($registration_info)>0)
                                 {
                                 ?>
                                 <input type="checkbox" name="term_cond" id="term_cond" required="" checked='true'>
                                 <?php   
                                 }
                                 else 
                                 {
                                 ?>
                                 <input type="checkbox" name="term_cond" id="term_cond" required="" checked='true'>
                                 
                                 <?php  
                                 }
                                 ?>
                                 <i></i>
                                 

                                 I have Read the <a target="_blank" href="<?php echo site_url();?>terms-conditions">Terms &amp; Condition</a></label>
                                 <span id="valid_term_cond"></span>   
                                 <button type="submit" name="btn" id="btn" value="submit" class="button">Submit Detail</button>
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
<!-- loader-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/jquery.loading.block.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/loader.function.js"></script>
<!-----loader---->      
<script>
function check_sponsor(sponsor_id)
{
     var loader_image='<img class="loader_image" src="<?php echo site_url();?>admin_assets/images/loader.gif" width="auto">';
     if(sponsor_id=='')
     {
         jQuery("#check_sponsor").children().remove();
         jQuery("#check_sponsor").append('<div>Please enter sponsor username!</div>').css({
                   'font-weight': 'bold',
                   'color': 'red',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '13px'
                  });//end css
     }
     else 
     {
         //jQuery("#check_sponsor").append(loader_image);
         jQuery.ajax({
               type:'POST',
               url:'<?php echo site_url();?>front/isUserNameExists',
               data: {username:sponsor_id,requestType:'sponsor'},
               async:false,
               beforeSend: function () {
                    //$("#load").css("display", "block");
                    jQuery.loader("on", '<?php echo site_url();?>admin_assets/images/default.svg');
                  },
               success:function(res){
                 jQuery("#check_sponsor").children().remove();
                 if(res.exist!='1')
                 {
                  jQuery("#check_sponsor").append('<div>Sorry Sponsor does not exists!</div>').css({
                   'font-weight': 'bold',
                   'color': 'red',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '14px'
                  });//end css
                  //jQuery("#sponsor_id").focus();
                 }//end if
                 else 
                 {
                  jQuery("#check_sponsor").append('<div>'+res.username+' Exist</div>').css({
                   'font-weight': 'bold',
                   'color': 'green',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '14px'
                  });//end css
                 }
               },//end success
               complete: function () {
                    //$("#load").css("display", "none");
                    jQuery.loader("off", '<?php echo site_url();?>admin_assets/images/default.svg');
                }

          });//end ajax
     }
}//end function

//jQuery(document).ready(function(){alert("call")});
function check_username(username)
{
     //var loader_image='<img src="<?php echo site_url();?>front_assets/images/loader.gif" width="auto">';
     if(username=='')
     {
         jQuery("#check_username").children().remove();
         jQuery("#check_username").append('<div>Please enter username!</div>').css({
                   'font-weight': 'bold',
                   'color': 'red',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '13px'
                  });//end css
                  //jQuery("#sponsor_id").focus();
     }
     else 
     {
           //jQuery("#check_username").append(loader_image);
           jQuery.ajax({
               type:'POST',
               url:'<?php echo site_url();?>front/isUserNameExists',
               data: {username:username,requestType:'new_user'},
               async:false,
               beforeSend: function () {
                    //$("#load").css("display", "block");
                    $.loader("on", '<?php echo site_url();?>admin_assets/images/default.svg');
                  },
               success:function(res){
                 jQuery("#check_username").children().remove();
                 if(res.exist=='1')
                 {
                  
                   jQuery("#check_username").append('<div>Sorry '+username+' already exists!</div>').css({
                   'font-weight': 'bold',
                   'color': 'red',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '14px'
                  });//end css
                 }//end if
                 else 
                 {
                  jQuery("#check_username").append('<div>'+username+' available!</div>').css({
                   'font-weight': 'bold',
                   'color': 'green',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '14px'
                  });//end css
                 }
               },//end success
              complete: function () {
                    //$("#load").css("display", "none");
                    $.loader("off", '<?php echo site_url();?>admin_assets/images/default.svg');
                } 
          });//end ajax
     }
}//end function
//jQuery(document).ready(function(){alert("call")});
jQuery(document).ready(function(){
     jQuery("#country").children().each(function(){
          if(jQuery(this).val()=='<?php echo $country;?>')
          {
            jQuery(this).attr('selected','true')
          }
     });
     /////////////////



 //////////check cond
	 jQuery("#con_no").click(function(){
		
	 if(jQuery('#con_no').is(':checked'))
	 {
	  
	 jQuery("#sponsor_id").val('123456');	
	 jQuery("#sponsor_id").attr("disabled", "disabled");
	 jQuery("#check_sponsor").text(''); 
	 }
	 else
	 {
		  
		    jQuery("#sponsor_id").prop("disabled", false);	
			jQuery("#sponsor_id").val('');		
			jQuery("#check_sponsor").text('');   
			jQuery("sponsor_id").prop('required',true);	
	 }
	 });	 	 	 	 	 
     /////////////////






     jQuery("#confirm_password").blur(function(){

          var password=jQuery("#passwords").val();
          var confirm_password=jQuery(this).val();
          if(password!=confirm_password)
          {
               jQuery("#valid_confirm_password").text("Confirm Password does not match!").css({'color':'red','font-weight':'bold'});
          }
          else
          {
               jQuery("#valid_confirm_password").text("");
          }

     });
     jQuery("#transaction_pwd1").blur(function(){
               var transaction_pwd=jQuery("#transaction_pwd").val();
               var confirm_transaction_pwd=jQuery(this).val();
               if(transaction_pwd!=confirm_transaction_pwd)
               {
                    jQuery("#valid_transaction_pwd1").text("Confirm Transaction password does not match!").css({'color':'red','font-weight':'bold'});
               }
               else
               {
                    jQuery("#valid_transaction_pwd1").text("");   
               }
     });
     ////
     jQuery("#btn").click(function(){
          var usernameExist=false;
          var username=jQuery("#username").val();
          jQuery.ajax({
               type:'POST',
               url:'<?php echo site_url();?>front/isUserNameExists',
               async:false,
               data: {username:username,requestType:'new_user'},
               success:function(res){
                 //jQuery("#check_username").children().remove();
                 if(res=='1')
                 {
                  usernameExist=true;
                 }//end if
               }//end success
          });//end ajax
          if(usernameExist)
          {
               //jQuery("#check_username").append("<div>Sorry username already available!</div>").css({'color':'red','font-weight':'bold'});
               jQuery("#username").focus();
               return false;
          }
          var password=jQuery("#passwords").val();
          var confirm_password=jQuery("#confirm_password").val();
          if(password!=confirm_password)
          {
               jQuery("#valid_confirm_password").text("Confirm Password does not match!").css({'color':'red','font-weight':'bold'});
               jQuery("#confirm_password").focus();
               return false;
          }
          var transaction_pwd=jQuery("#transaction_pwd").val();
          var confirm_transaction_pwd=jQuery("#transaction_pwd1").val();
          if(transaction_pwd!=confirm_transaction_pwd)
          {
               jQuery("#valid_transaction_pwd1").text("Confirm Transaction password does not match!").css({'color':'red','font-weight':'bold'});
               jQuery("#transaction_pwd1").focus();
               return false;
          }
          if(!jQuery("#term_cond").is(':checked'))
          {
               jQuery("#valid_term_cond").text("Accept Terms & Condition!").css({'color':'red','font-weight':'bold'});
               //jQuery("#term_cond").focus();
               return false;
          }
          return true;
     });
     $("#chk").keyup(function(){
		$("#valid_captcha").text('');
		})
})
</script>

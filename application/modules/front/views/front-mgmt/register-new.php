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
                     <a href="<?php echo site_url();?>join-us" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                       PATROCINADOR        </a>&nbsp; 
                                       
                                        <a href="<?php echo site_url();?>save_personal_information" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                       INFORMACION PERSONAL        </a>&nbsp; 
                                       
                                      
                                       
                                        <a href="<?php echo site_url();?>agreement" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                       ACUERDOS        </a>&nbsp; 
                                       
                                      
                                       
                                        <a href="<?php echo site_url();?>order" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                      PEDIDO        </a>&nbsp; 
									  
									    
									  
									  <a href="<?php echo site_url();?>confirm_order" class="sitebutton-1 sty2 roboto font-weight-7 uppercase">
                                      CONFIRMAR ORDEN        </a>&nbsp;   
                                      
                                      
                                       
                                       
                 </div>
             </div>
             <br>
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
					 
                  <form name="registration" method="post" class="sky-form" action="<?php echo site_url();?>front/register">
                              <header>PATROCINADOR</header>
                              <fieldset>
                                 <div class="row">
							
                                    <section class="col col-4">
                                       <label class="input">
									   <i>Coloque aquí el ID o el  Usuario de su patrocinador</i>
                                       <input type="text" placeholder="Coloque aquí el ID o el  Usuario de su patrocinador" value="<?php echo $sponsor_id;?>" name="sponsor_id" required="" onblur="check_sponsor(this.value)" autocomplete="off" id="sponsor_id" title="Sponsor name" value="">&nbsp;&nbsp;&nbsp;&nbsp;
                                       <span id="check_sponsor"></span>
                                       </label>
                                    </section>
									  
                                    
                                 </div>
                              </fieldset>
                             
                              <fieldset style="padding:0px; margin:0px;">
                                 <header>CREAR NUEVO USUARIO</header>
                              </fieldset>
                              <fieldset>
                                 <div class="row">
                                    <section class="col col-6">
                                       <label class="input">
									   <i>Elija su Usuario</i>
                                       <input type="text" name="username" value="<?php echo $username;?>" required="" id="username" onblur="check_username(this.value)" placeholder="Elija su Usuario">&nbsp;&nbsp;&nbsp;&nbsp;  
                                       <span id="check_username"></span>
                                       </label>
                                    </section>
									 
                                    <section class="col col-6">
									
                                       <label class="input">
									   <i>Por favor escriba su correo electrónico</i>
                                       <input type="email" value="<?php echo $email;?>" name="email" placeholder="Correo electrónico" required="">
                                       </label>
                                    </section>
                                 </div>
                                 <div class="row">
                                    <section class="col col-6">
                                       <label class="input">
									   <i>Elija su Contraseña</i>
                                       <input type="password" value="<?php echo $password;?>" name="password" required="" id="passwords" maxlength="12" title="Password" placeholder="Elija su Contraseña">
                                       </label>
                                    </section>
                                    <section class="col col-6">
                                       <label class="input">
									   <i>Confirme su Contraseña</i>
                                          <input type="password" value="<?php echo $password;?>" name="confirm_password" required="" title="Confirm Password" maxlength="12" id="confirm_password"  placeholder="Confirme su Contraseña">
                                          <span id="valid_confirm_password"></span>
                                       </label>
                                    </section>
                                 </div>
                                 <div class="row">
                                    <section class="col col-6">
                                       <label class="input">
									   <i>Elija su Contraseña para Transacciones</i>
                                       <input type="password" name="transaction_pwd" value="<?php echo $t_code;?>" required="" id="transaction_pwd" maxlength="12" title="Password" placeholder="Elija su Contraseña para Transacciones">
                                       </label>
                                    </section>
                                    <section class="col col-6">
                                       <label class="input">
									   <i>Confirme su Contraseña para Transacciones</i>
                                          <input type="password" name="transaction_pwd1" value="<?php echo $t_code;?>" required="" title="Confirm Password" maxlength="12" id="transaction_pwd1" placeholder="Confirme su Contraseña para Transacciones">
                                          <span id="valid_transaction_pwd1"></span>
                                       </label>
                                    </section>
                                 </div>
								 
								 <div class="row">
                                    <div class="inline">
										 <label class="input">
										 <i>Select Account Type</i>
										 </label>
										
										<label class="radio">
										
											<input type="radio"  required name="account_type" <?php if(!empty($account_type) && $account_type=='1')echo 'checked="checked"';else {};?>value="1"><i style="border-color:#000"></i>Deseo inscribirme como Distribuidor Asociado Independiente y hacer un pedido.
</label>
										
										
										
										
									
										
									</div>
									
                                    
                                 </div>
								 
                              </fieldset>
                              <footer>
                                 
                                 <button type="submit" name="btn" id="btn" value="submit" class="button">CONTINUAR</button>
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
                  jQuery("#check_sponsor").append('<div>Lo sentimos. Este patrocinador no existe.  /    Por favor introduzca su usuario aquí.</div>').css({
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
                  jQuery("#check_sponsor").append('<div>'+res.username+' existe.</div>').css({
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
function hasWhiteSpace(s) {
  return /\s/g.test(s);
}
//jQuery(document).ready(function(){alert("call")});
function check_username(username)
{
     //var loader_image='<img src="<?php echo site_url();?>front_assets/images/loader.gif" width="auto">';
     if(username=='')
     {
         jQuery("#check_username").children().remove();
         jQuery("#check_username").append('<div>Lo sentimos, este usuario ya está en uso.</div>').css({
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
		   if(hasWhiteSpace(username)==true)
		   {
			 jQuery("#check_username").append('<div>Por favor cree su usuario sin espacios</div>').css({
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
                  
                   jQuery("#check_username").append('<div>sentimos, '+username+' Lo  este usuario ya está en uso.</div>').css({
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
                  jQuery("#check_username").append('<div>'+username+' está disponible</div>').css({
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
	  
	 jQuery("#sponsor_id").val('company');	
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
                    jQuery("#valid_transaction_pwd1").text("La confirmación de contraseña no coincide.").css({'color':'red','font-weight':'bold'});
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
               jQuery("#valid_confirm_password").text("La confirmación de la contraseña no coincide.").css({'color':'red','font-weight':'bold'});
               jQuery("#confirm_password").focus();
               return false;
          }
          var transaction_pwd=jQuery("#transaction_pwd").val();
          var confirm_transaction_pwd=jQuery("#transaction_pwd1").val();
          if(transaction_pwd!=confirm_transaction_pwd)
          {
               jQuery("#valid_transaction_pwd1").text("La confirmación de contraseña no coincide.").css({'color':'red','font-weight':'bold'});
               jQuery("#transaction_pwd1").focus();
               return false;
          }
         
          return true;
     });
     $("#chk").keyup(function(){
		$("#valid_captcha").text('');
		})
})
</script>

<!DOCTYPE html>
<html lang="en-US" class="no-js">
<?php 
	$this->load->view('common/header');
	?>
	<link rel='stylesheet' id='bootstrap-css'  href='<?php echo base_url();?>front_assets/css/sky-forms.css' type='text/css' media='all' />
	<body class="home page-template page-template-page-templates page-template-template-page-vc page-template-page-templatestemplate-page-vc-php page page-id-34 woocommerce-no-js wpb-js-composer js-comp-ver-5.4.7 vc_responsive">
     
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
            <!-- ========== END OF HEADER  ========== -->
            <!-- ==================================== -->
            <!---------- Sub Header ---------->
            <!---------- Sub Header ---------->
           
           
            <div class="vc_row wpb_row vc_row-fluid sec-padding section-light">
               <div class="container">
                   <div class="row sec-padding">
                 <div class="col-md-12">
                     
                     <p style="text-align:center; padding-top: 25px; margin-bottom:0px;"> <img src="<?php echo base_url();?>front_assets/images/logo.png"/></p>
                         
                                      
                                       
                                       
                 </div>
             </div>
         <div class="row justify-content-md-center">
            <div class="col-lg-12">
               <div class="card card-hero card-primary animated fadeInUp animation-delay-7">
                  <div class="card-body">
                     
                     <?php 
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
                
                <a href="<?php echo site_url();?>">Click Here To Go Home</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
            </div>
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
function check_sponsor(sponsor_id)
{
	 var loader_image='<img class="loader_image" src="<?php echo site_url();?>admin_assets/images/loader.gif" width="auto">';
     var platform=jQuery("#platform").val();
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
	 else if(platform=='')
	 {
			jQuery("#valid_platform").children().remove();
			jQuery("#valid_platform").append('<div>Please select package first!</div>').css({
                   'font-weight': 'bold',
                   'color': 'red',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '14px'
                  });//end css
		jQuery("#sponsor_id").val(null);
		jQuery("#platform").focus();		  
		return false;			  
	 }
     else 
     {
         //jQuery("#check_sponsor").append(loader_image);
         var platform=jQuery("#platform").val();
		 
		 jQuery.ajax({
               type:'POST',
               url:'<?php echo site_url();?>front/isUserNameExists',
               data: {username:sponsor_id,requestType:'sponsor','pkg_id':platform},
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

function check_idno(username)
{
     //var loader_image='<img src="<?php echo site_url();?>front_assets/images/loader.gif" width="auto">';
     if(username=='')
     {
         jQuery("#check_idno").children().remove();
         jQuery("#check_idno").append('<div>Please enter idno!</div>').css({
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
               url:'<?php echo site_url();?>front/isIdNoExists',
               data: {username:username,requestType:'new_user'},
               async:false,
               beforeSend: function () {
                    //$("#load").css("display", "block");
                    $.loader("on", '<?php echo site_url();?>admin_assets/images/default.svg');
                  },
               success:function(res){
                 jQuery("#check_idno").children().remove();
                 if(res.exist=='1')
                 {
                  
                   jQuery("#check_idno").append('<div>Sorry '+username+' already exists!</div>').css({
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
                  jQuery("#check_idno").append('<div>'+username+' available!</div>').css({
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
     $("#platform").change(function(){
		if($(this).val()!='')
		{
			$("#valid_platform").children().remove();
		}
	})
})
</script>

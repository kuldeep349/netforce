<!DOCTYPE html>
<html lang="en-US" class="no-js">
<?php
	$this->load->view('common/header');
	?>
	<!--<link rel='stylesheet' id='bootstrap-css'  href='<?php echo base_url();?>front_assets/css/sky-forms.css' type='text/css' media='all' />-->
	<body>
     <?php
	//$this->load->view('common/top-nav');
	?>
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
                 <div class="col-md-12" style="text-align:center;">
                     <!--<p style="text-align:center; padding-top: 15px; margin-bottom:0px;"> <img src="<?php echo base_url();?>front_assets/images/logo.png" width="200"/></p>
                     --><h1 style="padding-bottom:5px;" class="color-primary text-center">Member Registration</h1>
                 </div>
             </div>
         <div class="row justify-content-md-center">
            <div class="col-lg-12">

               <!--<div class="card card-hero card-primary animated fadeInUp animation-delay-7">
                  <div class="card-body">-->

                     <?php
					 ///sponsor and account info
					 $sponsor_id=(!empty($registration_info['sponsor_and_account_info']['ref_user_name']))?$registration_info['sponsor_and_account_info']['ref_user_name']:null;

					 if(!empty($replicated_username))
					 {
						$sponsor_id=$replicated_username;
					 }
					 $username=(!empty($registration_info['sponsor_and_account_info']['username']))?$registration_info['sponsor_and_account_info']['username']:null;
					 $idno=(!empty($registration_info['sponsor_and_account_info']['idno']))?$registration_info['sponsor_and_account_info']['idno']:null;
					 $email=(!empty($registration_info['sponsor_and_account_info']['email']))?$registration_info['sponsor_and_account_info']['email']:null;
					 $password=(!empty($registration_info['sponsor_and_account_info']['password']))?$registration_info['sponsor_and_account_info']['password']:null;
					 $t_code=(!empty($registration_info['sponsor_and_account_info']['t_code']))?$registration_info['sponsor_and_account_info']['t_code']:null;
					 ///personal info
					 $first_name=(!empty($registration_info['personal_info']['first_name']))?$registration_info['personal_info']['first_name']:null;
					 $last_name=(!empty($registration_info['personal_info']['last_name']))?$registration_info['personal_info']['last_name']:null;
					 $contact_no=(!empty($registration_info['personal_info']['contact_no']))?$registration_info['personal_info']['contact_no']:null;
					 $country=(!empty($registration_info['personal_info']['country']))?$registration_info['personal_info']['country']:null;
					 $state=(!empty($registration_info['personal_info']['state']))?$registration_info['personal_info']['state']:null;
					 $city=(!empty($registration_info['personal_info']['city']))?$registration_info['personal_info']['city']:null;
					 $address_line1=(!empty($registration_info['personal_info']['address_line1']))?$registration_info['personal_info']['address_line1']:null;
					 ///sponsor and account info
					 $account_holder_name=(!empty($registration_info['bank_account_info']['account_holder_name']))?$registration_info['bank_account_info']['account_holder_name']:null;
					 $account_no=(!empty($registration_info['bank_account_info']['account_no']))?$registration_info['bank_account_info']['account_no']:null;
					 $bank_name=(!empty($registration_info['bank_account_info']['bank_name']))?$registration_info['bank_account_info']['bank_name']:null;
					 $branch_name=(!empty($registration_info['bank_account_info']['branch_name']))?$registration_info['bank_account_info']['branch_name']:null;
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
                     <form style="margin-top:20px;" name="registration" method="post" class="sky-form" action="<?php echo site_url();?>front/register">
                              <header>SPONSOR AND ACCOUNT INFORMATION</header>
                              <fieldset>
                                <div class="row">
        							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        								<div class="form-item">
        								    <label for="email" class="input-title">Sponsor ID/Name
										<abbr class="required" title="required">*</abbr></label>
        									<input type="text" placeholder="Enter Sponsor Id / User Name" value="<?php echo !empty($sponsor_id)? $sponsor_id : ''?>" name="sponsor_id" required="" onblur="check_sponsor(this.value)" autocomplete="off" id="sponsor_id" title="Sponsor name" value="">&nbsp;&nbsp;&nbsp;&nbsp;
                                               <span id="check_sponsor"></span>
        								</div>
        							</div>
							    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								    <div class="form-item">
								        <label for="email" class="input-title">Package
										<abbr class="required" title="required">*</abbr></label>
									<select name="platform" id="platform" onchange="showpack(this.value)">
									    <optgroup>Select Package</optgroup>
										<?php
											  if(!empty($all_active_package) && count($all_active_package)>0)
											  {
                                                  echo '<option>--Select Package--</option>';
												  foreach($all_active_package as $package)
												  {
													  if(!empty($upgrade_pkg_id) && $upgrade_pkg_id==$package->id)
													  {
										      ?>
													<option selected value="<?php echo $package->id;?>"><?php echo $package->amount;?><?php echo currency();?>(<?php echo $package->title;?>)</option>
											  <?php
													  }
													  else
													  {
											  ?>
													<option value="<?php echo $package->id;?>"><?php echo $package->amount;?><?php echo currency();?>(<?php echo $package->title;?>)</option>
											  <?php
													  }

												  }//end foreach
											  }
										?>

                                    </select>
									<span id="valid_platform"></span>
                                    <i></i>
								</div>
							</div>

							<!--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								    <div class="form-item">
								        <label for="email" class="input-title">Collect Center
										<abbr class="required" title="required">*</abbr></label>
    									<select name="collect_center" id="collect_center" >
    									    <optgroup>Select Collect Center</optgroup>
    										<option>Lagos</option>
    										<option>Abuja</option>
    										<option>Jos</option>
                                        </select>
									    <span id="valid_platform"></span>
                                    <i></i>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								    <div class="form-item">
								        <label for="email" class="input-title">Welcome Pack
										<abbr class="required" title="required">*</abbr></label>
    									<select name="welcome_pack" id="welcome_pack" >
    									    <optgroup>Select Collect Center</optgroup>
    										<option value="1">Welcome Pack1($6)</option>

                                        </select>
									    <span id="valid_platform"></span>
                                    <i></i>
								</div>
							</div>-->
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
								    <label for="email" class="input-title">Login ID
									<abbr class="required" title="required">*</abbr></label>
									<input type="text" name="username" value="<?php echo $username;?>" required="" id="username" onkeyup="checkusername(this.value)" onblur="check_username(this.value)" placeholder="Enter User Name">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span id="check_username"></span>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							    <div class="form-item">
									<label for="country" class="input-title">Country<abbr class="required" title="required">*</abbr></label>
									<select name="country" class="countries order-alpha" id="country">
                                        <option value="">Select Country</option>
                                    </select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<label for="street" class="input-title">State<abbr class="required" title="required">*</abbr></label>
									<select name="state" class="states order-alpha" id="state">
                                        <option value="">Select State</option>
                                    </select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<!--<div class="form-item">
									<input id="street2" name="street2" type="text" placeholder="Apartment, suite, unit etc. (optional)">
								</div>-->
								<div class="form-item" id="tblForm">
									<label for="town" class="input-title">DOB<abbr class="required" title="required">*</abbr></label>
									<input id="dob" name="date_of_birth" type="date" placeholder="dd/MM/yyyy" class="date-format">
									<span class="error" style="colro:red;display: none">Invalid Date. Only dd/MM/yyyy format allowed.</span>
								</div>


							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<label for="first_name" class="input-title">First Name<abbr class="required" title="required">*</abbr></label>
									<input id="first_name" name="first_name" type="text" placeholder="Name">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<label for="last_name" class="input-title">Last Name<abbr class="required" title="required">*</abbr></label>
									<input id="last_name" name="last_name" type="text" placeholder="Last Name">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<label for="email" class="input-title">Email address
									<abbr class="required" title="required">*</abbr></label>
									<input type="email" value="<?php if($email){ echo $email;}?>" name="email" placeholder="E-mail" required="">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<label for="phone" class="input-title">Phone<abbr class="required"  title="required">*</abbr></label>
									<input id="phone" name="phone" type="text" placeholder="Phone">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<label for="password" class="input-title">Password<abbr class="required" title="required">*</abbr></label>
									<input type="password" value="<?php if($password){ echo $password;}?>" name="password" required="" id="passwords" maxlength="12" title="Password" placeholder="Enter Password">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<label for="phone" class="input-title">Confirm Password<abbr class="required" title="required">*</abbr></label>
									<input type="password" value="<?php if($password){ echo $password;}?>" name="confirm_password" required="" title="Confirm Password" maxlength="12" id="confirm_password"  placeholder="Confirm Password">
                                    <span id="valid_confirm_password"></span>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<label for="password" class="input-title">Transaction Password<abbr class="required" title="required">*</abbr></label>
									<input type="password" value="<?php if($password){ echo $password;}?>" name="transaction_pwd" required="" id="transaction_pwd" maxlength="12" title="Password" placeholder="Enter Transaction Password">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<label for="phone" class="input-title">Confirm Transaction Password<abbr class="required" title="required">*</abbr></label>
									<input type="password" value="<?php if($password){ echo $password;}?>" name="confirm_tpassword" required="" title="Confirm Transaction Password" maxlength="12" id="transaction_pwd1"  placeholder="Confirm Transaction Password">
                                    <span id="valid_transaction_pwd1"></span>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
								<label class="crumina-module crumina-checkbox control--checkbox">
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
                                 I have Read the <a href="<?php echo site_url();?>terms_and_condition">Terms &amp; Condition</a> and  <a href="<?php echo site_url();?>privacy-policy">User Agreement </a>of NetForce
                                 <span class="control__indicator"></span></label>
                                 <span id="valid_term_cond"></span>
                                 <div class="checkout-proceed">
									<button type="submit" name="btn" id="btn" value="submit" class="crumina-button button--green button--l">Continue</button>
								</div>
									<!--<label class="crumina-module crumina-checkbox control--checkbox">Create an account?
										<input type="checkbox" checked="">
										<span class="control__indicator"></span>
									</label>-->
								</div>
							</div>
						</div>
                        </fieldset>
                    </form>
                  <!--</div>
               </div>-->
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
<script src="<?php echo base_url();?>front_assets/js/countries.js"></script>
<script language="javascript">
	populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
</script>
<script type="text/javascript">
        var isShift = false;
        var seperator = "/";
        window.onload = function () {
            //Reference the Table.
            var tblForm = document.getElementById("tblForm");

            //Reference all INPUT elements in the Table. dob
            var inputs = document.getElementById("dob");//document.getElementsByTagName("input");

            //Loop through all INPUT elements.
            for (var i = 0; i < inputs.length; i++) {
                //Check whether the INPUT element is TextBox.
                if (inputs[i].type == "text") {
                    //Check whether Date Format Validation is required.
                    if (inputs[i].className.indexOf("date-format") != 1) {

                        //Set Max Length.
                        inputs[i].setAttribute("maxlength", 10);

                        //Only allow Numeric Keys.
                        inputs[i].onkeydown = function (e) {
                            return IsNumeric(this, e.keyCode);
                        };

                        //Validate Date as User types.
                        inputs[i].onkeyup = function (e) {
                            ValidateDateFormat(this, e.keyCode);
                        };
                    }
                }
            }
        };

        function IsNumeric(input, keyCode) {
            if (keyCode == 16) {
                isShift = true;
            }
            //Allow only Numeric Keys.
            if (((keyCode >= 48 && keyCode <= 57) || keyCode == 8 || keyCode <= 37 || keyCode <= 39 || (keyCode >= 96 && keyCode <= 105)) && isShift == false) {
                if ((input.value.length == 2 || input.value.length == 5) && keyCode != 8) {
                    input.value += seperator;
                }

                return true;
            }
            else {
                return false;
            }
        };

        function ValidateDateFormat(input, keyCode) {
            var dateString = input.value;
            if (keyCode == 16) {
                isShift = false;
            }
            var regex = /(((0|1)[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/((19|20)\d\d))$/;

            //Check whether valid dd/MM/yyyy Date Format.
            if (regex.test(dateString) || dateString.length == 0) {
                ShowHideError(input, "none");
            } else {
                ShowHideError(input, "block");
            }
        };

        function ShowHideError(textbox, display) {
            var row = textbox.parentNode.parentNode;
            var errorMsg = row.getElementsByTagName("span")[0];
            if (errorMsg != null) {
                errorMsg.style.display = display;
            }
        };
    </script>
<script>
// Data Picker Initialization

function showpack(v)
{
    if(v==1)
    {
        var str='<option value="1">Welcome Pack1($6)</option>';
    }
    if(v==2)
    {
        var str='<option value="2">Welcome Pack2($12)</option>';
    }
    if(v==3)
    {
        var str='<option value="3">Welcome Pack3($18)</option>';
    }
    if(v==4)
    {
        var str='<option value="4">Welcome Pack4($24)</option>';
    }
    $("#welcome_pack").html(str);
}
function checkusername(str)
{
    str=str.replace(/ /g,'');
    //alert(str);
    jQuery("#username").val(str);
}

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
    var minLength = 10;
    var maxLength = 10;
    var charLength = username.length;
     if(username=='')
     {
         jQuery("#check_idno").children().remove();
         jQuery("#check_idno").html('<div>Please enter pan card!</div>').css({
                   'font-weight': 'bold',
                   'color': 'red',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '13px'
                  });//end css
                  //jQuery("#sponsor_id").focus();
     }
     else if(charLength < minLength){
        jQuery('#check_idno').html('Length is short, minimum '+minLength+' required.').css({
                   'font-weight': 'bold',
                   'color': 'red',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '13px'
                  });
    }else if(charLength > maxLength){
        jQuery('#check_idno').html('Length is not valid, maximum '+maxLength+' allowed.').css({
                   'font-weight': 'bold',
                   'color': 'red',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '13px'
                  });
        jQuery('#idno').val(char.substring(0, maxLength));
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

                   jQuery("#check_idno").html('<div>Sorry '+username+' already exists!</div>').css({
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
                  jQuery("#check_idno").html('<div>'+username+' available!</div>').css({
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

//check_aadharno
function check_aadharno(username)
{
     //var loader_image='<img src="<?php echo site_url();?>front_assets/images/loader.gif" width="auto">';
     // check username should be 12 length
    var minLength = 12;
    var maxLength = 12;
    var charLength = username.length;
    if(username=='')
     {
        jQuery("#check_aadharno").children().remove();
        jQuery("#check_aadharno").html('<div>Please enter Aadhar No!</div>').css({
                   'font-weight': 'bold',
                   'color': 'red',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '13px'
                  });//end css
        //jQuery("#sponsor_id").focus();
     }
     else if(charLength < minLength){
        jQuery('#check_aadharno').html('Length is short, minimum '+minLength+' required.').css({
                   'font-weight': 'bold',
                   'color': 'red',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '13px'
                  });
    }else if(charLength > maxLength){
        jQuery('#check_aadharno').html('Length is not valid, maximum '+maxLength+' allowed.').css({
                   'font-weight': 'bold',
                   'color': 'red',
                   'margin': '0',
                   'padding': '0',
                   'float': 'left',
                   'font-size': '13px'
                  });
        jQuery('#aadharno').val(char.substring(0, maxLength));
    }

     else
     {
        //jQuery("#check_username").append(loader_image);
       jQuery.ajax({
           type:'POST',
           url:'<?php echo site_url();?>front/isAadharNoExists',
           data: {username:username,requestType:'new_user'},
           async:false,
           beforeSend: function () {
                //$("#load").css("display", "block");
                $.loader("on", '<?php echo site_url();?>admin_assets/images/default.svg');
              },
           success:function(res){
             jQuery("#check_aadharno").children().remove();
             if(res.exist=='1')
             {
               jQuery("#check_aadharno").html('<div>Sorry '+username+' already exists!</div>').css({
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
              jQuery("#check_aadharno").html('<div>'+username+' available!</div>').css({
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

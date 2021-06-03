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
                     <h1 style="padding-bottom:5px;" class="color-primary text-center">Shipping Detail</h1>
                      
                   
                 </div>
             </div>
             <br>
            <div class="row">
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
	  $zip_code=(!empty($registration_info['personal_info']['zip_code']))?$registration_info['personal_info']['zip_code']:null;
     ///sponsor and account info
	 $business_name=(!empty($registration_info['personal_info']['business_name']))?$registration_info['personal_info']['business_name']:null;
	 $tax_id=(!empty($registration_info['personal_info']['tax_id']))?$registration_info['personal_info']['tax_id']:null;
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
					 
                  <form name="registration" method="post" class="sky-form" action="<?php echo site_url();?>save_personal_information">
                              <fieldset style="padding:0px; margin:0px;">
                                 <header> SHIPPING DETAIL</header>
                              </fieldset>
                              <fieldset>
                                 <!--<div class="row">
                                    <section class="col col-6">
                                       <label class="input">
									   <i>First Name </i>
                                       <input type="text" name="firstname" value="<?php echo $first_name;?>" placeholder="Nombres" required="">
                                       </label>
                                    </section>
                                    <section class="col col-6">
                                       <label class="input">
									   <i>Last Name</i>
                                       <input type="text" name="lastname" value="<?php echo $last_name;?>" required="" placeholder="Apellidos">
                                       </label>
                                    </section>
                                 </div>-->
                                 <div class="row">
                                    <section class="col col-6">
                                       <label class="input">
                                       <input type="text" name="firstname" value="<?php echo $first_name;?>" placeholder="Please enter your First Name" required="">
                                       </label>
                                    </section>
                                    <section class="col col-6">
                                       <label class="input">
                                       <input type="text" name="lastname" value="<?php echo $last_name;?>" required="" placeholder="Please enter your Last Name">
                                       </label>
                                    </section>
                                 </div>
								 <div class="row">
								     
                                    <section class="col col-6">
                                       <label class="select">
                                          
                                          <select name="country" id="country" class="form-control">
                                             <option value="">Select a Country</option>
                                             <option value="United States">United States</option>
                                             <option value="United Kingdom">United Kingdom</option>
                                             <option value="Afghanistan">Afghanistan</option>
                                             <option value="Albania">Albania</option>
                                             <option value="Algeria">Algeria</option>
                                             <option value="American Samoa">American Samoa</option>
                                             <option value="Andorra">Andorra</option>
                                             <option value="Angola">Angola</option>
                                             <option value="Anguilla">Anguilla</option>
                                             <option value="Antarctica">Antarctica</option>
                                             <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                             <option value="Argentina">Argentina</option>
                                             <option value="Armenia">Armenia</option>
                                             <option value="Aruba">Aruba</option>
                                             <option value="Australia">Australia</option>
                                             <option value="Austria">Austria</option>
                                             <option value="Azerbaijan">Azerbaijan</option>
                                             <option value="Bahamas">Bahamas</option>
                                             <option value="Bahrain">Bahrain</option>
                                             <option value="Bangladesh">Bangladesh</option>
                                             <option value="Barbados">Barbados</option>
                                             <option value="Belarus">Belarus</option>
                                             <option value="Belgium">Belgium</option>
                                             <option value="Belize">Belize</option>
                                             <option value="Benin">Benin</option>
                                             <option value="Bermuda">Bermuda</option>
                                             <option value="Bhutan">Bhutan</option>
                                             <option value="Bolivia">Bolivia</option>
                                             <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                             <option value="Botswana">Botswana</option>
                                             <option value="Bouvet Island">Bouvet Island</option>
                                             <option value="Brazil">Brazil</option>
                                             <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                             <option value="Brunei Darussalam">Brunei Darussalam</option>
                                             <option value="Bulgaria">Bulgaria</option>
                                             <option value="Burkina Faso">Burkina Faso</option>
                                             <option value="Burundi">Burundi</option>
                                             <option value="Cambodia">Cambodia</option>
                                             <option value="Cameroon">Cameroon</option>
                                             <option value="Canada">Canada</option>
                                             <option value="Cape Verde">Cape Verde</option>
                                             <option value="Cayman Islands">Cayman Islands</option>
                                             <option value="Central African Republic">Central African Republic</option>
                                             <option value="Chad">Chad</option>
                                             <option value="Chile">Chile</option>
                                             <option value="China">China</option>
                                             <option value="Christmas Island">Christmas Island</option>
                                             <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                             <option value="Colombia">Colombia</option>
                                             <option value="Comoros">Comoros</option>
                                             <option value="Congo">Congo</option>
                                             <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                             <option value="Cook Islands">Cook Islands</option>
                                             <option value="Costa Rica">Costa Rica</option>
                                             <option value="Cote D'ivoire">Cote D'ivoire</option>
                                             <option value="Croatia">Croatia</option>
                                             <option value="Cuba">Cuba</option>
                                             <option value="Cyprus">Cyprus</option>
                                             <option value="Czech Republic">Czech Republic</option>
                                             <option value="Denmark">Denmark</option>
                                             <option value="Djibouti">Djibouti</option>
                                             <option value="Dominica">Dominica</option>
                                             <option value="Dominican Republic">Dominican Republic</option>
                                             <option value="Ecuador">Ecuador</option>
                                             <option value="Egypt">Egypt</option>
                                             <option value="El Salvador">El Salvador</option>
                                             <option value="Equatorial Guinea">Equatorial Guinea</option>
                                             <option value="Eritrea">Eritrea</option>
                                             <option value="Estonia">Estonia</option>
                                             <option value="Ethiopia">Ethiopia</option>
                                             <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                             <option value="Faroe Islands">Faroe Islands</option>
                                             <option value="Fiji">Fiji</option>
                                             <option value="Finland">Finland</option>
                                             <option value="France">France</option>
                                             <option value="French Guiana">French Guiana</option>
                                             <option value="French Polynesia">French Polynesia</option>
                                             <option value="French Southern Territories">French Southern Territories</option>
                                             <option value="Gabon">Gabon</option>
                                             <option value="Gambia">Gambia</option>
                                             <option value="Georgia">Georgia</option>
                                             <option value="Germany">Germany</option>
                                             <option value="Ghana">Ghana</option>
                                             <option value="Gibraltar">Gibraltar</option>
                                             <option value="Greece">Greece</option>
                                             <option value="Greenland">Greenland</option>
                                             <option value="Grenada">Grenada</option>
                                             <option value="Guadeloupe">Guadeloupe</option>
                                             <option value="Guam">Guam</option>
                                             <option value="Guatemala">Guatemala</option>
                                             <option value="Guinea">Guinea</option>
                                             <option value="Guinea-bissau">Guinea-bissau</option>
                                             <option value="Guyana">Guyana</option>
                                             <option value="Haiti">Haiti</option>
                                             <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                             <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                             <option value="Honduras">Honduras</option>
                                             <option value="Hong Kong">Hong Kong</option>
                                             <option value="Hungary">Hungary</option>
                                             <option value="Iceland">Iceland</option>
                                             <option value="India">India</option>
                                             <option value="Indonesia">Indonesia</option>
                                             <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                             <option value="Iraq">Iraq</option>
                                             <option value="Ireland">Ireland</option>
                                             <option value="Israel">Israel</option>
                                             <option value="Italy">Italy</option>
                                             <option value="Jamaica">Jamaica</option>
                                             <option value="Japan">Japan</option>
                                             <option value="Jordan">Jordan</option>
                                             <option value="Kazakhstan">Kazakhstan</option>
                                             <option value="Kenya">Kenya</option>
                                             <option value="Kiribati">Kiribati</option>
                                             <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                             <option value="Korea, Republic of">Korea, Republic of</option>
                                             <option value="Kuwait">Kuwait</option>
                                             <option value="Kyrgyzstan">Kyrgyzstan</option>
                                             <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                             <option value="Latvia">Latvia</option>
                                             <option value="Lebanon">Lebanon</option>
                                             <option value="Lesotho">Lesotho</option>
                                             <option value="Liberia">Liberia</option>
                                             <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                             <option value="Liechtenstein">Liechtenstein</option>
                                             <option value="Lithuania">Lithuania</option>
                                             <option value="Luxembourg">Luxembourg</option>
                                             <option value="Macao">Macao</option>
                                             <option value="Macedonia">Macedonia</option>
                                             <option value="Madagascar">Madagascar</option>
                                             <option value="Malawi">Malawi</option>
                                             <option value="Malaysia">Malaysia</option>
                                             <option value="Maldives">Maldives</option>
                                             <option value="Mali">Mali</option>
                                             <option value="Malta">Malta</option>
                                             <option value="Marshall Islands">Marshall Islands</option>
                                             <option value="Martinique">Martinique</option>
                                             <option value="Mauritania">Mauritania</option>
                                             <option value="Mauritius">Mauritius</option>
                                             <option value="Mayotte">Mayotte</option>
                                             <option value="Mexico">Mexico</option>
                                             <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                             <option value="Moldova, Republic of">Moldova, Republic of</option>
                                             <option value="Monaco">Monaco</option>
                                             <option value="Mongolia">Mongolia</option>
                                             <option value="Montserrat">Montserrat</option>
                                             <option value="Morocco">Morocco</option>
                                             <option value="Mozambique">Mozambique</option>
                                             <option value="Myanmar">Myanmar</option>
                                             <option value="Namibia">Namibia</option>
                                             <option value="Nauru">Nauru</option>
                                             <option value="Nepal">Nepal</option>
                                             <option value="Netherlands">Netherlands</option>
                                             <option value="Netherlands Antilles">Netherlands Antilles</option>
                                             <option value="New Caledonia">New Caledonia</option>
                                             <option value="New Zealand">New Zealand</option>
                                             <option value="Nicaragua">Nicaragua</option>
                                             <option value="Niger">Niger</option>
                                             <option value="Nigeria">Nigeria</option>
                                             <option value="Niue">Niue</option>
                                             <option value="Norfolk Island">Norfolk Island</option>
                                             <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                             <option value="Norway">Norway</option>
                                             <option value="Oman">Oman</option>
                                             <option value="Pakistan">Pakistan</option>
                                             <option value="Palau">Palau</option>
                                             <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                             <option value="Panama">Panama</option>
                                             <option value="Papua New Guinea">Papua New Guinea</option>
                                             <option value="Paraguay">Paraguay</option>
                                             <option value="Peru">Peru</option>
                                             <option value="Philippines">Philippines</option>
                                             <option value="Pitcairn">Pitcairn</option>
                                             <option value="Poland">Poland</option>
                                             <option value="Portugal">Portugal</option>
                                             <option value="Puerto Rico">Puerto Rico</option>
                                             <option value="Qatar">Qatar</option>
                                             <option value="Reunion">Reunion</option>
                                             <option value="Romania">Romania</option>
                                             <option value="Russian Federation">Russian Federation</option>
                                             <option value="Rwanda">Rwanda</option>
                                             <option value="Saint Helena">Saint Helena</option>
                                             <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                             <option value="Saint Lucia">Saint Lucia</option>
                                             <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                             <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                             <option value="Samoa">Samoa</option>
                                             <option value="San Marino">San Marino</option>
                                             <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                             <option value="Saudi Arabia">Saudi Arabia</option>
                                             <option value="Senegal">Senegal</option>
                                             <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                             <option value="Seychelles">Seychelles</option>
                                             <option value="Sierra Leone">Sierra Leone</option>
                                             <option value="Singapore">Singapore</option>
                                             <option value="Slovakia">Slovakia</option>
                                             <option value="Slovenia">Slovenia</option>
                                             <option value="Solomon Islands">Solomon Islands</option>
                                             <option value="Somalia">Somalia</option>
                                             <option value="South Africa">South Africa</option>
                                             <option value="South Georgia">South Georgia</option>
                                             <option value="Spain">Spain</option>
                                             <option value="Sri Lanka">Sri Lanka</option>
                                             <option value="Sudan">Sudan</option>
                                             <option value="Suriname">Suriname</option>
                                             <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                             <option value="Swaziland">Swaziland</option>
                                             <option value="Sweden">Sweden</option>
                                             <option value="Switzerland">Switzerland</option>
                                             <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                             <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                             <option value="Tajikistan">Tajikistan</option>
                                             <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                             <option value="Thailand">Thailand</option>
                                             <option value="Timor-leste">Timor-leste</option>
                                             <option value="Togo">Togo</option>
                                             <option value="Tokelau">Tokelau</option>
                                             <option value="Tonga">Tonga</option>
                                             <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                             <option value="Tunisia">Tunisia</option>
                                             <option value="Turkey">Turkey</option>
                                             <option value="Turkmenistan">Turkmenistan</option>
                                             <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                             <option value="Tuvalu">Tuvalu</option>
                                             <option value="Uganda">Uganda</option>
                                             <option value="Ukraine">Ukraine</option>
                                             <option value="United Arab Emirates">United Arab Emirates</option>
                                             <option value="United Kingdom">United Kingdom</option>
                                             <option value="United States">United States</option>
                                             <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                             <option value="Uruguay">Uruguay</option>
                                             <option value="Uzbekistan">Uzbekistan</option>
                                             <option value="Vanuatu">Vanuatu</option>
                                             <option value="Venezuela">Venezuela</option>
                                             <option value="Viet Nam">Viet Nam</option>
                                             <option value="Virgin Islands, British">Virgin Islands, British</option>
                                             <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                             <option value="Wallis and Futuna">Wallis and Futuna</option>
                                             <option value="Western Sahara">Western Sahara</option>
                                             <option value="Yemen">Yemen</option>
                                             <option value="Zambia">Zambia</option>
                                             <option value="Zimbabwe">Zimbabwe</option>
                                          </select>
                                          <i></i>
                                       </label>
                                    </section>
                                    <section class="col col-6">
                                       <label class="input">
									   
                                       <input type="text" name="state" value="<?php echo $state;?>" required="" placeholder="State">
                                       </label>
                                    </section>
                                    <!--<section class="col col-6">
                                       <label class="input">
									   <i>Business Name</i>
                                       <input type="text" name="business_name" value="<?php echo $business_name;?>"  id="business_name" maxlength="12" title="Name of the business/Association" placeholder="Empresa o Asociación">
                                       </label>
                                    </section>
									<section class="col col-6">
                                       <label class="input">
									   <i>Tax</i>
                                       <input type="text" name="tax_id" value="<?php echo $tax_id;?>" required="" id="tax_id" maxlength="12" title="SSN/Tax ID" placeholder="D.N.I. / R.U.C.">
                                       </label>
                                    </section>-->
                                 </div>
                                 <div class="row">
                                    <!--<section class="col col-6">
                                       <label class="input">
									   <i>Phone</i>
                                       <input type="tel" name="phone" value="<?php echo $contact_no;?>" placeholder="Teléfono Celular" required="">
                                       </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="input">
										<i>Pais</i>
										</label>
									   <label class="select">
                                          <select name="country" id="country">
                                             <option value="">Pais</option>
                                             <option value="United States">Perú</option>
                                          </select>
                                          <i></i>
                                       </label>
                                    </section>-->
                                 </div>
                                 <div class="row">
                                    
                                    
                                    
                                    <section class="col col-6">
                                       <label class="input">
									   
                                       <input type="text" name="city" value="<?php echo $city;?>" id="city" placeholder="City">
                                       </label>
                                    </section>
									<section class="col col-6">
                                       <label class="input">
									  
                                       <input type="text" name="zip_code" value="<?php echo $zip_code;?>" required="" placeholder="Post Code">
                                       </label>
                                    </section>
                                    <section class="col col-6">
                                       <label class="input">
                                           
                                       <i class="icon-prepend icon-phone"></i>
                                       <input type="tel" name="phone" value="<?php echo $contact_no;?>" placeholder="Please enter your Mobile Number" required="">
                                       </label>
                                    </section>
                                    <section class="col col-6">
                                       <label for="file" class="input">
									   <i>Address</i>
									   <textarea rows="3" name="address" class="form-control"><?php echo $address_line1;?></textarea>
                                       <!--<input type="text" value="<?php echo $address_line1;?>" name="address" required="" placeholder="Dirección">-->
                                       </label>
                                    </section>
                                    <!--<section class="col col-6">
                                       <label class="input">
									   <i>DOB</i>
                                       <input type="text" name="date_of_birth" value="<?php echo $state;?>" required="" placeholder="DD-MM-AAAA ">
                                       </label>
                                    </section>-->
                                    
                                 </div>
                              </fieldset>
                              <footer>
                                 <button type="submit" name="btn" id="btn" value="submit" class="button">CONFIRM REGISTRATION</button>
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
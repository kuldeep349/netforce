<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Account Management</span> - <?php echo $title;?></h4>
						</div>
					<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo site_url();?>user"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Account Management</li>
							<?php echo $breadcrumb;?>
						</ul>
						<ul class="breadcrumb"></ul>
						
					</div>
				</div>
               <!-- /page header -->
               <!-- Cover area images/cover2.jpg -->
               <div class="profile-cover">
                  <div class="profile-cover-img" style="background-image: url(<?php echo base_url();?>front_assets/images/slider11.jpg)"></div>
                  <div class="media">
                     <div class="media-left">
                        <a href="#" class="profile-thumb">
                        <?php 
                        $profile_pic_old=(!empty($user_details->image))?$user_details->image:'';
                        if(!empty($profile_pic_old) && $profile_pic_old!='')
                        {
                        ?>
                        <img src="<?php echo base_url();?>images/<?php echo $profile_pic_old;?>" class="img-circle" alt="">
                        <?php   
                        }
                        else 
                        {
                        ?>
                        <img src="<?php echo base_url();?>images/noimage.jpeg" class="img-circle" alt="">
                        <?php   
                        }
                        ?>
                        </a>
                     </div>
                     <div class="media-body">
                        <h1> <?php echo $user_details->username;?><small class="display-block"><?php echo $user_details->user_id;?></small></h1>
                     </div>
                    
                  </div>
               </div>
               <!-- /cover area -->
               <!-- Toolbar -->
               <div class="navbar navbar-default navbar-xs content-group">
                  <ul class="nav navbar-nav visible-xs-block">
                     <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
                  </ul>
                  <div class="navbar-collapse collapse" id="navbar-filter">
                     <ul class="nav navbar-nav element-active-slate-400">
                        <li class="active"><a href="#activity" data-toggle="tab"><i class="icon-menu7 position-left"></i> My Profile</a></li>
                        
                        <li><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Update Profile</a></li>
                     </ul>
                    
                  </div>
               </div>
               <!-- /toolbar -->
               <!-- Content area -->
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
                  <!-- User profile -->
                  <div class="row">
                     <div class="col-lg-9">
                        <div class="tabbable">
                           <div class="tab-content">
                              <div class="tab-pane fade in active" id="activity">
                                 <!-- Timeline -->
                                	<div class="content-group">
								<?php 
                        //////////////Personal information////////////////////
                        $first_name=(!empty($user_details->first_name))?$user_details->first_name:'';
                        $last_name=(!empty($user_details->last_name))?$user_details->last_name:'';
                        $email=(!empty($user_details->email))?$user_details->email:'';
                        $contact_no=(!empty($user_details->contact_no))?$user_details->contact_no:'';
                        $gender=(!empty($user_details->gender=='1'))?'Male':'Female';
                        if(!empty($user_details->date_of_birth))
                        {
                           $date_of_birth=date(date_formats(),strtotime($user_details->date_of_birth));
                        }
                        else
                        {
                           $date_of_birth='';
                        }
                        $address_line1=(!empty($user_details->address_line1))?$user_details->address_line1:'';
                        $address_line2=(!empty($user_details->address_line2))?$user_details->address_line2:'';
                        $country=(!empty($user_details->country))?$user_details->country:'';
                        $state=(!empty($user_details->state))?$user_details->state:'';
                        $city=(!empty($user_details->city))?$user_details->city:'';
                        $zip_code=(!empty($user_details->zip_code))?$user_details->zip_code:'';
                       
                        /////////Account information//////
                        $bank_name=(!empty($user_details->bank_name))?$user_details->bank_name:'';
                        $branch_name=(!empty($user_details->branch_name))?$user_details->branch_name:'';
                        $account_holder_name=(!empty($user_details->account_holder_name))?$user_details->account_holder_name:'';
                        $account_no=(!empty($user_details->account_no))?$user_details->account_no:'';
                        ////////Social Media Information//////////
                        $facebook_link=(!empty($user_details->facebook_link))?$user_details->facebook_link:'';
                        $twitter_link=(!empty($user_details->twitter_link))?$user_details->twitter_link:'';
                        $linkedin_link=(!empty($user_details->linkedin_link))?$user_details->linkedin_link:'';
                        $google_plus_link=(!empty($user_details->google_plus_link))?$user_details->google_plus_link:'';												
                        echo $this->session->flashdata('flash_msg');
                        ?>
                        <div class="panel panel-body no-border-top no-border-radius-top table-responsive">												<h2>Personal Information</h2>
							<table class='table table-striped table-bordered table-hover'>							
							<tr>							<td><b>Full Name :</b></td><td><?php echo $first_name.' '.$last_name;?></td>							</tr>
							<tr>							<td><b>Email Id :</b></td><td><?php echo $email;?></td>							</tr>						
							<tr>							<td><b>Mobile No :</b></td><td><?php echo $contact_no;?></td>							</tr>			
							<tr>							<td><b>Gender :</b></td><td><?php echo $gender;?></td>							</tr>				
							<!--<tr>							<td><b>Date Of Birth :</b></td><td><?php echo $date_of_birth;?></td>							</tr>-->	
							<tr>							<td><b>Address Line 1 :</b></td><td><?php echo $address_line1;?></td>							</tr>	
							<tr>							<td><b>Address Line 2 :</b></td><td><?php echo $address_line2;?></td>							</tr>	
							<tr>							<td><b>Zip Code :</b></td><td><?php echo $zip_code;?></td>							</tr>			
							<tr>							<td><b>Country :</b></td><td><?php echo $country;?></td>							</tr>			
							<tr>							<td><b>State :</b></td><td><?php echo $state;?></td>							</tr>				
							<tr>							<td><b>City :</b></td><td><?php echo $city;?></td>							</tr>		
							</table>														
							<h2>Bank Information</h2>							
							<table style='width:89%' class='table table-striped table-bordered table-hover'>						
							<tr>							<td><b>Bank Name :</b></td><td><?php echo $bank_name;?></td>							</tr>	
							<tr>							<td><b>Branch Name :</b></td><td><?php echo $branch_name;?></td>							</tr>	
							<tr>							<td><b>Account Holder Name :</b></td><td><?php echo $account_holder_name;?></td>		</tr>	
							<tr>							<td><b>Account No :</b></td><td><?php echo $account_no;?></td>							</tr>		
							</table>																					
							
						</div>
							</div>
                                 <!-- /timeline -->
                              </div>
                              
                              <div class="tab-pane fade" id="settings">
                                 <!-- Profile info -->
                                 <div class="panel panel-flat">
                                    <div class="panel-heading">
                                       <h6 class="panel-title">Personal information</h6>
                                       
                                    </div>
                                    <div class="panel-body">
                                       <form action="<?php echo site_url().'user/account/updatePersonalInformation'?>" method='post' enctype='multipart/form-data'>
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <label>First Name</label>
                                                   <input type="text" name='first_name' value="<?php echo $first_name;?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                   <label>Last Name</label>
                                                   <input type="text" name="last_name" value="<?php echo $last_name;?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                   <label>Gender</label>
                                                   <select name='gender' class="select">
                                                      <option value="1" <?php if($user_details->gender=='1'){ echo "selected";}?>>Male</option>
                                                      <option value="0" <?php if($user_details->gender=='0'){ echo "selected";}?>>Female</option>
                                                    </select>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <label>Address line 1</label>
                                                   <input type="text" name="address_line1" value="<?php echo $address_line1;?>" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                   <label>Address line 2</label>
                                                   <input type="text" name="address_line2" value="<?php echo $address_line2;?>" class="form-control">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <label>City</label>
                                                   <input type="text" name="city" value="<?php echo $city;?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                   <label>State/Province</label>
                                                   <input type="text" name="state" value="<?php echo $state;?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                   <label>ZIP code</label>
                                                   <input type="text" name="zip_code" value="<?php echo $zip_code;?>" class="form-control">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <label>Email</label>
                                                   <input type="text" name="email" value="<?php echo $email;?>" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                   <label>Your country</label>
                                                   <?php 
                                                   $country_array=array(
                                                      'Germany'=>'germany',
                                                      'France'=>'france',
                                                      'Spain'=>'germany',
                                                      'Netherlands'=>'netherlands',
                                                      'United Kingdom'=>'uk'
                                                      );
                                                   ?>
                                                   <select name='country' class="select">
                                                      
                                                      
                                                          <option value="<?php echo $country;?>"><?php echo $country;?></option>
   <option value="Afganistan">Afghanistan</option>
   <option value="Albania">Albania</option>
   <option value="Algeria">Algeria</option>
   <option value="American Samoa">American Samoa</option>
   <option value="Andorra">Andorra</option>
   <option value="Angola">Angola</option>
   <option value="Anguilla">Anguilla</option>
   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
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
   <option value="Bonaire">Bonaire</option>
   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
   <option value="Botswana">Botswana</option>
   <option value="Brazil">Brazil</option>
   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
   <option value="Brunei">Brunei</option>
   <option value="Bulgaria">Bulgaria</option>
   <option value="Burkina Faso">Burkina Faso</option>
   <option value="Burundi">Burundi</option>
   <option value="Cambodia">Cambodia</option>
   <option value="Cameroon">Cameroon</option>
   <option value="Canada">Canada</option>
   <option value="Canary Islands">Canary Islands</option>
   <option value="Cape Verde">Cape Verde</option>
   <option value="Cayman Islands">Cayman Islands</option>
   <option value="Central African Republic">Central African Republic</option>
   <option value="Chad">Chad</option>
   <option value="Channel Islands">Channel Islands</option>
   <option value="Chile">Chile</option>
   <option value="China">China</option>
   <option value="Christmas Island">Christmas Island</option>
   <option value="Cocos Island">Cocos Island</option>
   <option value="Colombia">Colombia</option>
   <option value="Comoros">Comoros</option>
   <option value="Congo">Congo</option>
   <option value="Cook Islands">Cook Islands</option>
   <option value="Costa Rica">Costa Rica</option>
   <option value="Cote DIvoire">Cote DIvoire</option>
   <option value="Croatia">Croatia</option>
   <option value="Cuba">Cuba</option>
   <option value="Curaco">Curacao</option>
   <option value="Cyprus">Cyprus</option>
   <option value="Czech Republic">Czech Republic</option>
   <option value="Denmark">Denmark</option>
   <option value="Djibouti">Djibouti</option>
   <option value="Dominica">Dominica</option>
   <option value="Dominican Republic">Dominican Republic</option>
   <option value="East Timor">East Timor</option>
   <option value="Ecuador">Ecuador</option>
   <option value="Egypt">Egypt</option>
   <option value="El Salvador">El Salvador</option>
   <option value="Equatorial Guinea">Equatorial Guinea</option>
   <option value="Eritrea">Eritrea</option>
   <option value="Estonia">Estonia</option>
   <option value="Ethiopia">Ethiopia</option>
   <option value="Falkland Islands">Falkland Islands</option>
   <option value="Faroe Islands">Faroe Islands</option>
   <option value="Fiji">Fiji</option>
   <option value="Finland">Finland</option>
   <option value="France">France</option>
   <option value="French Guiana">French Guiana</option>
   <option value="French Polynesia">French Polynesia</option>
   <option value="French Southern Ter">French Southern Ter</option>
   <option value="Gabon">Gabon</option>
   <option value="Gambia">Gambia</option>
   <option value="Georgia">Georgia</option>
   <option value="Germany">Germany</option>
   <option value="Ghana">Ghana</option>
   <option value="Gibraltar">Gibraltar</option>
   <option value="Great Britain">Great Britain</option>
   <option value="Greece">Greece</option>
   <option value="Greenland">Greenland</option>
   <option value="Grenada">Grenada</option>
   <option value="Guadeloupe">Guadeloupe</option>
   <option value="Guam">Guam</option>
   <option value="Guatemala">Guatemala</option>
   <option value="Guinea">Guinea</option>
   <option value="Guyana">Guyana</option>
   <option value="Haiti">Haiti</option>
   <option value="Hawaii">Hawaii</option>
   <option value="Honduras">Honduras</option>
   <option value="Hong Kong">Hong Kong</option>
   <option value="Hungary">Hungary</option>
   <option value="Iceland">Iceland</option>
   <option value="Indonesia">Indonesia</option>
   <option value="India">India</option>
   <option value="Iran">Iran</option>
   <option value="Iraq">Iraq</option>
   <option value="Ireland">Ireland</option>
   <option value="Isle of Man">Isle of Man</option>
   <option value="Israel">Israel</option>
   <option value="Italy">Italy</option>
   <option value="Jamaica">Jamaica</option>
   <option value="Japan">Japan</option>
   <option value="Jordan">Jordan</option>
   <option value="Kazakhstan">Kazakhstan</option>
   <option value="Kenya">Kenya</option>
   <option value="Kiribati">Kiribati</option>
   <option value="Korea North">Korea North</option>
   <option value="Korea Sout">Korea South</option>
   <option value="Kuwait">Kuwait</option>
   <option value="Kyrgyzstan">Kyrgyzstan</option>
   <option value="Laos">Laos</option>
   <option value="Latvia">Latvia</option>
   <option value="Lebanon">Lebanon</option>
   <option value="Lesotho">Lesotho</option>
   <option value="Liberia">Liberia</option>
   <option value="Libya">Libya</option>
   <option value="Liechtenstein">Liechtenstein</option>
   <option value="Lithuania">Lithuania</option>
   <option value="Luxembourg">Luxembourg</option>
   <option value="Macau">Macau</option>
   <option value="Macedonia">Macedonia</option>
   <option value="Madagascar">Madagascar</option>
   <option value="Malaysia">Malaysia</option>
   <option value="Malawi">Malawi</option>
   <option value="Maldives">Maldives</option>
   <option value="Mali">Mali</option>
   <option value="Malta">Malta</option>
   <option value="Marshall Islands">Marshall Islands</option>
   <option value="Martinique">Martinique</option>
   <option value="Mauritania">Mauritania</option>
   <option value="Mauritius">Mauritius</option>
   <option value="Mayotte">Mayotte</option>
   <option value="Mexico">Mexico</option>
   <option value="Midway Islands">Midway Islands</option>
   <option value="Moldova">Moldova</option>
   <option value="Monaco">Monaco</option>
   <option value="Mongolia">Mongolia</option>
   <option value="Montserrat">Montserrat</option>
   <option value="Morocco">Morocco</option>
   <option value="Mozambique">Mozambique</option>
   <option value="Myanmar">Myanmar</option>
   <option value="Nambia">Nambia</option>
   <option value="Nauru">Nauru</option>
   <option value="Nepal">Nepal</option>
   <option value="Netherland Antilles">Netherland Antilles</option>
   <option value="Netherlands">Netherlands (Holland, Europe)</option>
   <option value="Nevis">Nevis</option>
   <option value="New Caledonia">New Caledonia</option>
   <option value="New Zealand">New Zealand</option>
   <option value="Nicaragua">Nicaragua</option>
   <option value="Niger">Niger</option>
   <option value="Nigeria">Nigeria</option>
   <option value="Niue">Niue</option>
   <option value="Norfolk Island">Norfolk Island</option>
   <option value="Norway">Norway</option>
   <option value="Oman">Oman</option>
   <option value="Pakistan">Pakistan</option>
   <option value="Palau Island">Palau Island</option>
   <option value="Palestine">Palestine</option>
   <option value="Panama">Panama</option>
   <option value="Papua New Guinea">Papua New Guinea</option>
   <option value="Paraguay">Paraguay</option>
   <option value="Peru">Peru</option>
   <option value="Phillipines">Philippines</option>
   <option value="Pitcairn Island">Pitcairn Island</option>
   <option value="Poland">Poland</option>
   <option value="Portugal">Portugal</option>
   <option value="Puerto Rico">Puerto Rico</option>
   <option value="Qatar">Qatar</option>
   <option value="Republic of Montenegro">Republic of Montenegro</option>
   <option value="Republic of Serbia">Republic of Serbia</option>
   <option value="Reunion">Reunion</option>
   <option value="Romania">Romania</option>
   <option value="Russia">Russia</option>
   <option value="Rwanda">Rwanda</option>
   <option value="St Barthelemy">St Barthelemy</option>
   <option value="St Eustatius">St Eustatius</option>
   <option value="St Helena">St Helena</option>
   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
   <option value="St Lucia">St Lucia</option>
   <option value="St Maarten">St Maarten</option>
   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
   <option value="Saipan">Saipan</option>
   <option value="Samoa">Samoa</option>
   <option value="Samoa American">Samoa American</option>
   <option value="San Marino">San Marino</option>
   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
   <option value="Saudi Arabia">Saudi Arabia</option>
   <option value="Senegal">Senegal</option>
   <option value="Seychelles">Seychelles</option>
   <option value="Sierra Leone">Sierra Leone</option>
   <option value="Singapore">Singapore</option>
   <option value="Slovakia">Slovakia</option>
   <option value="Slovenia">Slovenia</option>
   <option value="Solomon Islands">Solomon Islands</option>
   <option value="Somalia">Somalia</option>
   <option value="South Africa">South Africa</option>
   <option value="Spain">Spain</option>
   <option value="Sri Lanka">Sri Lanka</option>
   <option value="Sudan">Sudan</option>
   <option value="Suriname">Suriname</option>
   <option value="Swaziland">Swaziland</option>
   <option value="Sweden">Sweden</option>
   <option value="Switzerland">Switzerland</option>
   <option value="Syria">Syria</option>
   <option value="Tahiti">Tahiti</option>
   <option value="Taiwan">Taiwan</option>
   <option value="Tajikistan">Tajikistan</option>
   <option value="Tanzania">Tanzania</option>
   <option value="Thailand">Thailand</option>
   <option value="Togo">Togo</option>
   <option value="Tokelau">Tokelau</option>
   <option value="Tonga">Tonga</option>
   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
   <option value="Tunisia">Tunisia</option>
   <option value="Turkey">Turkey</option>
   <option value="Turkmenistan">Turkmenistan</option>
   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
   <option value="Tuvalu">Tuvalu</option>
   <option value="Uganda">Uganda</option>
   <option value="United Kingdom">United Kingdom</option>
   <option value="Ukraine">Ukraine</option>
   <option value="United Arab Erimates">United Arab Emirates</option>
   <option value="United States of America">United States of America</option>
   <option value="Uraguay">Uruguay</option>
   <option value="Uzbekistan">Uzbekistan</option>
   <option value="Vanuatu">Vanuatu</option>
   <option value="Vatican City State">Vatican City State</option>
   <option value="Venezuela">Venezuela</option>
   <option value="Vietnam">Vietnam</option>
   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
   <option value="Wake Island">Wake Island</option>
   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
   <option value="Yemen">Yemen</option>
   <option value="Zaire">Zaire</option>
   <option value="Zambia">Zambia</option>
   <option value="Zimbabwe">Zimbabwe</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <label>Phone #</label>
                                                   <input type="text" name="contact_no" value="<?php echo $contact_no;?>" class="form-control">
                                                   <span class="help-block">+99-99-9999-9999</span>
                                                </div>
                                                <div class="col-md-6">
                                                   <label>Upload profile image</label>
                                                   <input type='hidden' name='profile_pic_old' value='<?php echo $profile_pic_old;?>'>
                                                   <input type="file" name='profile_pic' class="file-styled">
                                                   <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="text-right">
                                             <button type="submit" class="btn btn-primary">Save </button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                
                                 <div class="panel panel-flat">
                                    <div class="panel-heading">
                                       <h6 class="panel-title">Bank Detail Setting</h6>
                                      
                                    </div>
                                    <div class="panel-body">
                                       <form action="<?php echo site_url();?>user/account/updateBankInformation" method="post">
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <label>Bank Name</label>
                                                   <input type="text" name="bank_name" value="<?php echo $bank_name;?>" placeholder="Bank Name" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                   <label>Branch Name</label>
                                                   <input type="text" name="branch_name" value="<?php echo $branch_name;?>" placeholder="Branch Name" class="form-control">
                                                </div>
                                             </div>
                                              <div class="row">
                                                <div class="col-md-6">
                                                   <label>Account Holder Name</label>
                                                   <input type="text" name="account_holder_name" value="<?php echo $account_holder_name;?>" placeholder="Account Holder Name" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                   <label>Account No</label>
                                                   <input type="text" name="account_no" value="<?php echo $account_no;?>" placeholder="Account No." class="form-control">
                                                </div>
                                             </div>
                                          </div>
                                          
                                          <div class="text-right">
                                             <button type="submit" class="btn btn-primary">Save </button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>							 								 								
                                 <!-- /Bank Detail settings -->
                                 <!-- Bank settings -->
                                 <!--<div class="panel panel-flat">
                                    <div class="panel-heading">
                                       <h6 class="panel-title">Social Media Setting</h6>
                                      
                                    </div>
                                    <div class="panel-body">
                                       <form action="<?php echo site_url();?>user/account/updateSocialMediaInformation" method="post">
                                          
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <label>Facebook Link</label>
                                                   <input type="text" name="facebook_link" value="<?php echo $facebook_link;?>" placeholder="Facebook Link" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                   <label>Twitter Link</label>
                                                   <input type="text" name="twitter_link" value="<?php echo $twitter_link;?>" placeholder="Twitter Link" class="form-control">
                                                </div>
                                             </div>
                                              <div class="row">
                                                <div class="col-md-6">
                                                   <label>Linked In</label>
                                                   <input type="text" name="linkedin_link" value="<?php echo $linkedin_link;?>" placeholder="Linkedin Link" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                   <label>Google+</label>
                                                   <input type="text" name="google_plus_link" value="<?php echo $google_plus_link;?>" placeholder="Google Plus Link" class="form-control">
                                                </div>
                                             </div>
                                          </div>
                                          
                                          <div class="text-right">
                                             <button type="submit" class="btn btn-primary">Save </button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>-->
                                 <!-- /Bank Detail settings -->
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
                  <!-- /user profile -->
                  <!-- Footer -->
                   <?php
                  $this->load->view("common/footer-text");
                  ?>

                  <!-- /footer -->
               </div>
				<!-- /content area -->
			</div>
<style>
button.btn.btn-default.btn-icon.kv-fileinput-upload{
	display: none;
}
.file-preview-old {
    /*border-radius: 2px;
    border: 1px solid #ddd;*/
    width: 100%;
    margin-bottom: 20px;
    position: relative;
}
</style>
<script>
  $(document).ready(function(){
  	$(".file-caption-name").text("No Profile Pic Selected");
  });//end ready
</script>			
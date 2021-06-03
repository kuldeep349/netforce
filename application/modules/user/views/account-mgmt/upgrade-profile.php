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
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Horizontal form options -->
					<div class="row">
						<div class="col-md-12">
							<!-- Basic layout-->
							    <?php echo $this->session->flashdata('flash_msg');?>
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title"><?php echo $title;?></h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
									<?php 
									$pkg_id=$user->pkg_id;
									$pkg_amount=$user->pkg_amount;
										$arr=array('9'=>'Basic','21'=>'Classic','51'=>'Premium');
										$title=$arr[$pkg_amount];
                                        if(count($upgrade_to)>0)
                                        {
										echo form_open(site_url()."user/account/".$action_url,array('method'=>'post','class'=>'form-horizontal' , 'enctype'=>'multipart/form-data'));
									?>
										<!--<form method="post" class="form-horizontal">-->								
											<div class="panel-body">
												<div class="form-group">
													<label class="col-lg-3 control-label">Current package:</label>
													<div class="col-lg-9">
													    <?php
													    echo $title.' '.$package->title.'('.currency().$pkg_amount.')';
													    ?>
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label">Upgrade To:</label>
													<div class="col-lg-9">
														<select name="upgrade_to" class="form-control">
														    <?php
														    foreach($upgrade_to as $val)
														    {
														    ?>
														    <option value="<?php echo $val->id;?>"><?php echo $arr[$val->amount].' '.$val->title.'('.currency().$val->amount.')-- Payable Amount:'.currency().($val->amount-$pkg_amount);?></option>
														    
														    <?php
														    }
														    ?>
														</select>
													</div>
												</div>
												<?php
												if($upgraderequest)
												{
												    ?>
												    <div class="form-group">
													<label class="col-lg-3 control-label" style="color:red">Request sent to admin. Waiting for approval.</label>
													
												</div>
												    <?php
												}
												else
												{
												?>
                                                <div class="form-group">
													<label class="col-lg-3 control-label">Payment Method:</label>
													<div class="col-lg-9">
														<select name="pay_mode" onchange="showbox(this.value);" class="form-control">
														    <option value='wallet'>Main Wallet</option>
														    <!--<option value='epin'>E-Pin</option>-->
														    <option value='bank'>Bank</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-3 control-label" id='showhead_text'>Enter Transaction Password:</label>
													<div class="col-lg-9">
														<input  id="t_password" type="password" name="t_password" class="form-control" placeholder="Enter Transaction Password">
														<span id="valid_confirm_password" style="color:red;font-weight:bold;display:none"></span>
													</div>
												</div>

												<input type="hidden" name="action" value="<?php echo $action;?>">
												<input type="hidden" name="user_id" value="<?php echo ID_encode($user->user_id);?>">
												<div class="text-right">
													<button id="submitBtn" type="submit" name="btn" value="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
												<?php
												}
												
												?>
											</div>
										<!--</form>-->
										<?php echo form_close();
                                        }
                                        else
                                        {
                                            ?>
                                            <div class="panel-body">
												<div class="form-group">
													<label class="col-lg-3 control-label">Current package:</label>
													<div class="col-lg-9">
													    <?php
													    echo $title.' '.$package->title.' ('.currency().$pkg_amount.')';
													    ?>
													</div>
												</div>
											</div>
                                            <?php
                                        }
										
										?>
								</div>
								<script>
								    function showbox(val)
								    {
								        //alert(val);
								        if(val=='bank')
								        {
								            document.getElementById('showhead_text').innerHTML='Upload Proof Of Payment';
								            document.getElementById('t_password').placeholder='Upload Proof Of Payment';
								            document.getElementById('t_password').setAttribute('type','file');
								            document.getElementById('t_password').value='';
								        }
								        if(val=='wallet')
								        {
								            document.getElementById('showhead_text').innerHTML='Enter Transaction Password';
								            document.getElementById('t_password').placeholder='Enter Transaction Password';
								            document.getElementById('t_password').setAttribute('type','password');
								            document.getElementById('t_password').value='';
								        }
								        if(val=='epin')
								        {
								            document.getElementById('showhead_text').innerHTML='Enter E-Pin Code';
								            document.getElementById('t_password').placeholder='Enter E-Pin Code';
								            document.getElementById('t_password').setAttribute('type','text');
								            document.getElementById('t_password').value='';
								        }
								    }
								</script>
								<!-- /basic layout -->
						</div>
					</div>
					<!-- /vertical form options -->
					<!-- Footer -->
                  <?php
                  $this->load->view("common/footer-text");
                  ?>
                     <!-- /footer -->
				</div>
				<!-- /content area -->
			</div>

<script>
  $(document).ready(function(){

  	$("#submitBtn").click(function(){
  	$("#valid_old_password").text('').css('display','none');	
  	$("#valid_new_password").text('').css('display','none');	
  	$("#valid_confirm_password").text('').css('display','none');	
     if($("#old_password").val()=="")
     {
     	$("#valid_old_password").text("Please enter old password!").css('display','');
     	return false;
     }

     if($("#new_password").val()=="")
     {
     	$("#valid_new_password").text("Please enter new password!").css('display','');
     	return false;
     }

     if($("#confirm_password").val()=="")
     {
     	$("#valid_confirm_password").text("Please enter old password!").css('display','');
     	return false;
     }

     if($("#new_password").val()!=$("#confirm_password").val())
     {
     	$("#valid_confirm_password").text("Sorry confirm password does not match!").css('display','');
     	return false;
     }
     return true;
  	});//end submit btn click here
  });//end ready
</script>			
<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('common/header'); ?>
</head>
<body>
<!-- MAIN HEADER -->
<?php $this->load->view('top-nav'); ?>
<!-- RIGHT MENU -->
<div class="modal fade window-popup right-menu-popup" id="right-menu" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="right-menu">
					<div class="user-menu-close" data-dismiss="modal">
						<div class="user-menu-content">
							<span></span>
							<span></span>
						</div>
					</div>
					<div class="widget w-info">
						<a class="site-logo" href="index.html">
							<!-- MAIN HEADER RESPONSIVE LOGO IMAGE-->
							<img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/logo/logo-dark.svg" alt="logo" width="70">

							<!-- /MAIN HEADER RESPONSIVE LOGO IMAGE-->
							<div class="logo-text">

								<div class="logo-title"><span class="weight-black">TOP</span>TEN</div>

								<div class="logo-sub-title">Cool HTML Template</div>
							</div>
						</a>
						<p class="widget-text">Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius est etiam processus dynamicus vestibulum enim.</p>
					</div>
					<div class="widget w-login">
						<h4 class="widget-title">Sign In to Your Account</h4>
						<form method="post">
							<div class="form-item">
								<input placeholder="Username or Email" type="text">
							</div>
							<div class="form-item">
								<input placeholder="Password" type="password">
							</div>

							<div class="form-item">

								<div class="remember-wrap">

									<label class="crumina-module crumina-checkbox control--checkbox">Remember Me

										<input type="checkbox">

										<span class="control__indicator"></span>

									</label>



									<a href="#">Lost your password?</a>

								</div>

							</div>

							<div class="form-item">

								<button class="crumina-button button--dark button--l w-100">AUTHORIZE</button>

							</div>

						</form>



					</div>



					<div class="widget w-contacts">



						<h4 class="widget-title">Get In Touch</h4>

						<p class="contacts-text">Lorem ipsum dolor sit amet, duis metus ligula amet in purus, vitae donec vestibulum enim.</p>



						<div class="contact-item">

							<img loading="lazy"  class="crumina-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon1.png" alt="phone">

							<div class="content">

								<a href="#" class="title">8 800 567.890.11</a>

								<p class="sub-title">Mon-Fri 9am-6pm</p>

							</div>

						</div>



						<div class="contact-item">

							<img loading="lazy"  class="crumina-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon2.png" alt="mail">

							<div class="content">

								<a href="#" class="title">info@topten.com</a>

								<p class="sub-title">online support</p>

							</div>

						</div>



						<div class="contact-item">

							<img loading="lazy"  class="crumina-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon3.png" alt="location">

							<div class="content">

								<a href="#" class="title">Melbourne, Australia</a>

								<p class="sub-title">795 South Park Avenue</p>

							</div>

						</div>



					</div>



				</div>

			</div>

		</div>

	</div>

</div>

<!-- /RIGHT MENU -->



<!-- SEARCH POPUP -->
<div class="modal fade window-popup popup-search-popup" id="popup-search" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<form class="search-popup-form">
							<input class="search-popup-input" placeholder="What are you looking for?" type="text" autofocus>

							<button type="submit" class="search-popup-enter">

								<svg class="crumina-icon" width="35" height="35">

									<use xlink:href="#icon-enter"></use>

								</svg>

							</button>

							<div class="search-popup-close close" data-dismiss="modal">

								<svg class="crumina-icon" width="20" height="20">

									<use xlink:href="#icon-close"></use>

								</svg>

							</div>

						</form>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>
<!-- /SEARCH POPUP -->
<!-- MAIN CONTENT WRAPPER -->
<div class="main-content-wrapper">
	<!-- STUNNING HEADER -->
	<section class="crumina-stunning-header section-image-bg-dark">
		<div class="container">
			<!-- STUNNING HEADER CONTENT -->
			<div class="stunning-header-content align-center">
				<!-- PAGE TITLE -->
				<h1 class="page-title text-white">Doctor Details</h1>
				<!-- /PAGE TITLE -->
				<!-- BREADCRUMBS -->
				<div class="crumina-breadcrumbs">
					<!-- BREADCRUMBS LIST -->
					<ul class="breadcrumbs">
						<!-- BREADCRUMBS ITEM -->
						<li class="breadcrumbs-item">
							<a href="<?php echo base_url();?>">Homepage</a>
						</li>
						<!-- /BREADCRUMBS ITEM -->
						<!-- BREADCRUMBS ITEM -->
						<li class="breadcrumbs-item">
							<span class="crumina-icon">»</span>
							<a href="<?php echo base_url();?>doctor-list">Doctor</a>
						</li>
						<!-- /BREADCRUMBS ITEM -->
						<!-- BREADCRUMBS ITEM -->
						<li class="breadcrumbs-item trail-end">
							<span class="crumina-icon">»</span>
							<span>Doctor Details</span>
						</li>
						<!-- /BREADCRUMBS ITEM -->
					</ul>
					<!-- /BREADCRUMBS LIST -->
				</div>
				<!-- /BREADCRUMBS -->
			</div>
			<!-- /STUNNING HEADER CONTENT -->
		</div>
	</section>
	<!-- /STUNNING HEADER -->
	<section class="large-padding">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<span> On </span><span class="u-bold"><?php echo date("F j, Y",strtotime($doctor_time['available_time'])) ?></span>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<i class="icon-ic_time"></i>
							<span class="u-t-capitalize"> At </span>
							<span class="u-bold"><?php echo date('h:i A', strtotime($doctor_time['available_time'])); ?></span>
						</div>
						<hr/>	
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<?php if(isset($doctor_list['doctor_image']) && !empty($doctor_list['doctor_image'])){ ?>
									<img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>doctor_images/<?php echo $doctor_list['doctor_image']; ?>" alt="product">
								<?php }else{ ?>
                                     <img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/no-avatar.png" alt="product">
							<?php } ?>
						</div>
						<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
							<h5 class="product-title"><?php echo $doctor_detail['doctor_name']; ?></h5>
						<?php echo $doctor_detail['doctor_bio']; ?>
						</div>	
					</div>	
					
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="background:#efefef;">
					<form class="send-message-form crumina-submit mt-5 doctor-book-appointment" method="post" data-nonce="crumina-submit-form-nonce" data-type="standard" action="#">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-item">
									<input class="input--white" name="name" type="text" placeholder="Full Name*" required>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-item">
									<input class="input--white" id="phone" name="phone" type="text" placeholder="Phone Number" required>

								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-item">
									<input class="input--white" id="email" name="email" type="email" placeholder="Email" required>
									<input name="doctor_fee" id="doctor_fee" type="hidden" value="<?php echo $doctor_detail['doctor_fee']; ?>">
									<input name="doctor_id" type="hidden" value="<?php echo ID_decode($this->uri->segment(2)); ?>">
									<input name="doctor_time_id" type="hidden" value="<?php echo ID_decode($this->uri->segment(3)); ?>">

								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-item">
									<h6>Consultation fees:</h6>
									<h7>$ <?php echo $doctor_detail['doctor_fee']; ?></h7>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="inquiry-btn-wrap">
									<button class="crumina-button button--green button--l">Confirm & Pay</button>

								</div>
								<br/>
							</div>
						</div>
					</form>
				</div>	
			</div>
		</div>
	</section>
	<!-- SUBSCRIBE SECTION -->
	<section class="medium-padding-top section-image-bg-lime">

		<div class="container">

			<div class="row">

				<div class="col-lg-7 col-md-12 mb-4">

					<h4 class="subscribe-title">Subscribe to our Newsletter</h4>

					<p class="subscribe-subtitle text-white">

						<span class="font-weight-bold">Join Our Newsletter</span> & Marketing Communication. We'll send you news and offers.

					</p>

					<form class="subscribe-form">

						<div class="input-btn--inline">

							<input class="input--white" type="email" placeholder="Your email address">

							<button type="button" class="crumina-button button--dark button--l">SUBSCRIBE</button>

						</div>

					</form>

				</div>



				<div class="col-lg-4 d-none d-lg-block mt-auto">

					<img loading="lazy"  src="<?php echo base_url();?>front_assets/img/theme-content/icons/08-subscribe.svg" alt="subscibe">

				</div>

			</div>

		</div>

	</section>

	<!-- /SUBSCRIBE SECTION -->



	<!-- BACK TO TOP -->
	<div class="back-to-top">
		<svg class="crumina-icon">
			<use xlink:href="#icon-back-to-top"></use>
		</svg>
	</div>
	<!-- /BACK TO TOP -->
</div>
<!-- /MAIN CONTENT WRAPPER -->
<?php $this->load->view('common/footer'); ?>
<!-- /FOOTER -->
<?php $this->load->view('common/footer-script'); ?>
</body>
</html>
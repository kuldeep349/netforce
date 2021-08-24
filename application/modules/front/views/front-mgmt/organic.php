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
						<a class="site-logo" href="<?php echo base_url();?>">
							<!-- MAIN HEADER RESPONSIVE LOGO IMAGE-->

							<img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/logo/logo-dark.svg" alt="logo" width="70">

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
	<section class="crumina-stunning-header section-image-bg-purple" style="background: url(<?php echo base_url();?>images/Organic-Product.jpeg);     background-size: cover;
    background-position: center;">
		<div class="container">
			<!-- STUNNING HEADER CONTENT -->
			<div class="stunning-header-content align-center">
				<!-- PAGE TITLE -->
				<h1 class="page-title text-white">NetForce Organics</h1>
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
						<li class="breadcrumbs-item trail-end">
							<span class="crumina-icon">»</span>
							<span>NetForce Organics</span>
						</li>
						<!-- /BREADCRUMBS ITEM -->
					</ul>
					<!-- /BREADCRUMBS LIST -->
				</div>
				<!-- /BREADCRUMBS -->
			</div>
			<!-- /STUNNING HEADER CONTENT -->
		</div>>
	</section>
	<!-- /STUNNING HEADER -->
	<section class="large-padding section-anime-js">
        <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="heading">NetForce Organics</h2>
            <p>We are focused on producing the best of organic products using raw materials sourced from nature to nurture your health and improve everyday living.</p>
            <p>We take delight in providing a quick and easy access to both curative and preventive health products to boost your overall health and well-being.</p>
            <p>Our products that is the NetForce Organics products are powerful and effective, without toxins, chemicals or preservatives. They are made using nature's best resources for a healthier you.</p>
            <h3>Some of NetForce Organic Tea includes:</h3>
            <?php
					echo form_open('', '');?>
					<div class="form-group">
						<input type="text" name="search" placeholder="Search products">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg">Search</button>
					</div>
				</form>
				<br>
			<div class="row">

			<?php
				foreach($products as $key => $product){
			echo'<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<div class="crumina-module crumina-product-item">
						<div class="product-item-content">

							<div class="img-responsive">
								<img data-sizes="auto" src="https://NetForce.com/product_images/'.$product['product_image'].'" alt="Postrate Tea" class="lazyload img-responsive">

							</div>


							<div class="media-body">
								<h5 class="product-title">'.$product['title'].'</h5>
								<div class="price">$'.$product['new_price'].'</div>
							</div>

							<div class="media-footer">
								<a href="'.base_url('front/view_organic_p_details/'.$product['id']).'" class="crumina-button button--primary button--m w-100">View Details</a>
							</div>
						</div>
					</div>
				</div>';
		}
					// echo'<pre>';
					// print_r($products);
					// echo'</pre>';
					?>
			</div>
            <!-- <p>
                Erektile - X Tea<br>
Ulcer - Xcure Tea<br>
Hepat - X Tea<br>
Diabe - X Tea<br>
Pros - X Tea<br>
Fibro - X Tea<br>
Detoxx Tea<br>
Moringa Tea<br>
Malaria/typhoid Tea <br>
Coffee - X Tea<br>
Green Tea<br>
Fertility/ Hormonal Balance Tea<br>
Anthritix/ Rheumatism Tea<br>
High Blood Pressure AndCholestrol Tea<br>
Zobo - X Tea<br>

            </p>
            <h3>Some of NetForce Organic product includes:</h3>
            <p>
            Malaria - X27<br>
Erektile - X21<br>
Ulcer - Xcure 31<br>
Hepat - X37<br>
Diabe - X35<br>
Pros - X53<br>
Fibro - X47<br>
Fertility/ Hormonal Balance - X55<br>
Anthritix/ Rheumatism - X33<br>

            </p> -->
        </div>
    </div>
        	</div>

        </div>

    </section>

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
<!-- FOOTER -->
<?php $this->load->view('common/footer'); ?>
<!-- /FOOTER -->
<?php $this->load->view('common/footer-script'); ?>
</body>

</html>

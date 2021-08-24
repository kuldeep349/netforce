<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('common/header'); ?>
<style>
a.packeg-bronze {
    width: 65%;
    background: #cd7f32;
    text-align: center;
    padding: 10px 10px 10px 10px;
    border-radius: 25px;
	color: #ffffff;
	margin: 20px 0 0 0;
}
a.packeg-silver
{
	width: 65%;
	background: #C0C0C0;
	text-align: center;
	padding: 10px 10px 10px 10px;
	border-radius: 25px;
	color: #ffffff;
	margin: 20px 0 0 0;
}
a.packeg-gold
{
	width: 65%;
	background: #b49801;
	text-align: center;
	padding: 10px 10px 10px 10px;
	border-radius: 25px;
	color: #ffffff;
    margin: 20px 0 0 0;
}
a.packeg-diamond {
    width: 65%;
    background: #e3e3e1;
    text-align: center;
    padding: 10px 10px 10px 10px;
    border-radius: 25px;
    color: #000000;
    margin: 20px 0 0 0;
}
</style>
</head>
<body>
<!-- MAIN HEADER -->
<?php $this->load->view('top-nav'); ?>
<!-- RIGHT MENU -->
<div class="main-content-wrapper">

	<!-- STUNNING HEADER -->
	<section class="crumina-stunning-header section-image-bg-moon">

		<div class="container">
			<!-- STUNNING HEADER CONTENT -->
			<div class="stunning-header-content align-center">

				<!-- PAGE TITLE -->
				<h1 class="page-title text-white">Contact Information</h1>
				<!-- /PAGE TITLE -->

				<!-- BREADCRUMBS -->
				<div class="crumina-breadcrumbs">

					<!-- BREADCRUMBS LIST -->
					<ul class="breadcrumbs">

						<!-- BREADCRUMBS ITEM -->
						<li class="breadcrumbs-item">
							<a href="index.html">Homepage</a>
						</li>
						<!-- /BREADCRUMBS ITEM -->

						<!-- BREADCRUMBS ITEM -->
						<li class="breadcrumbs-item trail-end">
							<span class="crumina-icon">»</span>
							<span>Contact Information</span>
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

	<section class="large-padding section-image-bg-grey">
		<div class="container">

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<header class="crumina-module crumina-heading">
						<div class="title-text-wrap">

							<!-- CRUMINA HEADING TITLE -->
							<h2 class="heading-title">Have Any Questions?</h2>
							<!-- /CRUMINA HEADING TITLE -->

						</div>

						<!-- CRUMINA HEADING DECORATION -->
						<div class="heading-decoration"></div>
						<!-- /CRUMINA HEADING DECORATION  -->

						<!-- CRUMINA HEADING TEXT -->
						<div class="heading-text">Please contact us using the form and we’ll get back to you as soon as possible.</div>
						<!-- /CRUMINA HEADING TEXT -->

					</header>
					<?php echo validation_errors();?>
					<?php echo $this->session->flashdata('message');?>
					<form class="send-message-form crumina-submit mt-5" method="post" data-nonce="crumina-submit-form-nonce" data-type="standard" action="<?php echo base_url('contact-us');?>" novalidate="novalidate">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<input class="input--white" name="email" type="email" placeholder="Email Address" required="">
								</div>
								<div class="form-item">
									<input class="input--white" name="name" type="text" placeholder="Your Full Name" required="">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="form-item">
									<input class="input--white" name="phone" type="text" placeholder="Phone Number" required="">
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-item">
									<textarea class="input--white" name="message" placeholder="Details" rows="3" required=""></textarea>
								</div>
								<div class="inquiry-btn-wrap">
									<button type="submit" class="crumina-button button--green button--l">SEND INQUIRY</button>
									<span>Please, let us know any particular things to check and the best time to contact you by phone (if provided).</span>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</section>

	<section class="large-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<header class="crumina-module crumina-heading">
						<div class="title-text-wrap">

							<!-- CRUMINA HEADING TITLE -->
							<h2 class="heading-title">Get In Touch</h2>
							<!-- /CRUMINA HEADING TITLE -->

						</div>

						<!-- CRUMINA HEADING DECORATION -->
						<div class="heading-decoration"></div>
						<!-- /CRUMINA HEADING DECORATION  -->

						<!-- CRUMINA HEADING TEXT -->
						<div class="heading-text">We are here to serve you better, fill free to contact us anytime and you'll get the best from NetForce Network</div>
						<!-- /CRUMINA HEADING TEXT -->

					</header>
				</div>
			</div>
		</div>
	</section>

	<section class="large-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php echo $about_us;?>
				</div>
			</div>
		</div>
	</section>	




	<!-- SUBSCRIBE SECTION -->

	<!-- /SUBSCRIBE SECTION -->

	<!-- BACK TO TOP -->
	<div class="back-to-top">
		<svg class="crumina-icon">
			<use xlink:href="#icon-back-to-top"></use>
		</svg>
	</div>
	<!-- /BACK TO TOP -->

</div>
<?php $this->load->view('common/footer'); ?>
<!-- /FOOTER -->
<?php $this->load->view('common/footer-script'); ?>
</body>

</html>

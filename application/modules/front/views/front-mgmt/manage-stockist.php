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
	<section class="crumina-stunning-header section-image-bg-purple">
		<div class="container">
			<!-- STUNNING HEADER CONTENT -->
			<div class="stunning-header-content align-center">
				<!-- PAGE TITLE -->
				<h1 class="page-title text-white">Manage Stockist</h1>
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
							<span>Manage Stockist</span>
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
        	<?php echo $content['content']; ?>
           <!--  <p>There are three categories of Stockist in Xbulon Network and each has it's own role in the distribution chain of Xbulon Organics.
</p>

<p>The three categories are;
</p>
<h3><b>Mega Stockist</b></h3>
<p>To become a Mega Stockist, you are to be the Major distributor of Xbulon Organics in a State of the Country of your residence.
</p>
<p><b>Requirement;</b>

</p>
<ul>
  <li>A good Centre for Seminars, space for Store and Office.
</li>
<li>You must be a Diamond Member to be eligible.
</li>
<li>You are to download, fill and submit the Stockist Form.
</li>
<li>You are to pay the Mega Stockist fee.
</li>
</ul>


<p><b>Benefits;</b>

</p>
<ul>
  <li>You will receive a Sienna space bus for business.
</li>
<li>You will get 20% discount for all Xbulon Organics you purchase.

</li>
<li>You will receive 7% bonus for all Xbulon Organics that members collect from you center.

</li>
<li>You will get dividend from Xbulon Organics.

</li>
</ul>



<h3><b>Medium Stockist</b>

</h3>
<p>A Medium Stockist is a  Sub distributor to the Mega Stockist of Xbulon Organics in their State. Where Mega Stockist is not available, Medium Stockist will be heading.
</p>
<p><b>Requirement;
</b></p>

<ul>
  <li>A good Centre for Seminar, space for Store and Office.

</li>
<li>You must be a Diamond Member to be eligible.


</li>
<li>You are to download, fill and submit the Stockist Form.


</li>
<li>You are to pay the Medium Stockist fee.


</li>
</ul>


<p><b>Benefits;

</b></p>

<ul>
  <li>You will receive a Car for business.


</li>
<li>You will get 16.65% discount for all Xbulon Organics you purchase.


</li>
<li>You will receive 5% bonus for all Xbulon Organics that members collect from you Center/Store.



</li>
<li>You will get dividend from Xbulon Organics



</li>
</ul>



<h3>Minor Stockist
</h3>

<p>A Minor Stockist is minor distributor of Xbulon Organics in a City/Town

</p>
<p><b>Requirement;

</b></p>

<ul>
  <li>A good space for Store/ Office.


</li>
<li>You must be a Diamond Member to be eligible.



</li>
<li>You are to download, fill and submit the Stockist Form.



</li>
<li>You are to pay the Minor Stockist fee.


</li>
</ul>


<p><b>Benefits;


</b></p>

<ul>
  <li>You will receive Office Support Device for business.



</li>
<li>You will get 13.3% discount for all Xbulon Organics you purchase.



</li>
<li>You will receive 3% bonus for all Xbulon Organics that members collect from you Store/ Office.



</li>
<li>You will get dividend from Xbulon Organics in regards to your Location.


</li>
</ul> -->
<p><a style="    background: #459846;
    color: white;
    font-size: 17px;
    padding: 10px;
    border-radius: 10px;" href="https://xbulon.com/uploads/Stockist-Form.pdf">Download Form</a></p>

            <!--Pagination tabs-->
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

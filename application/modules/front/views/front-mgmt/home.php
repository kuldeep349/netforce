<!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('common/header');
	?>
<body>
   <?php $this->load->view('top-nav'); ?>
 <!-- RIGHT MENU -->
 <style>
 .br-top {

	 height: auto !important;

}
.crumina-main-slider .swiper-slide {
     padding: 0px;

}
.marqueetext {
    float: left;
    width: 100%;
    background: #ed3b57;
    color: #fff;
    font-size: 20px;
    font-weight: bold;
    /* padding: 20px 0px 10px 0px; */
}
.main-slider-slides {
    position: relative;

}
.info-box--column-centered .info-box-thumb
{    width: 180px;}
 </style>
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
                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/images/logo.png" alt="logo" width="70">
                            <!-- /MAIN HEADER RESPONSIVE LOGO IMAGE-->
                            <div class="logo-text">
                                <div class="logo-title"><span class="weight-black">X</span>Bulon</div>
                                <div class="logo-sub-title">Web</div>
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





    <section class="crumina-module crumina-module-slider crumina-main-slider">

        <!--Prev next buttons-->



        <div class="swiper-btn-next">

            <svg class="crumina-icon" width="40" height="30">

                <use xlink:href="#icon-nav-next"></use>

            </svg>

        </div>



        <div class="swiper-btn-prev">

            <svg class="crumina-icon" width="40" height="30">

                <use xlink:href="#icon-nav-prev"></use>

            </svg>

        </div>



        <div class="swiper-container" data-effect="fade" data-show-items="1" data-change-handler="thumbsParent" data-prev-next="1" data-autoplay="4000">



            <!-- Additional required wrapper -->

            <div class="swiper-wrapper">

                <!-- Slides -->

                <div class="swiper-slide bg-grey-theme">



                    <div class="container">

                        <div class="row align-items-center">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center">



                                <!-- <div class="slider-content">



                                    <h2 class="h1 slider-content-title" data-swiper-parallax="-100"> You are welcome to the official website of Xbulon</h2>



                                    <p class="slider-content-text" data-swiper-parallax="-200">Xbulon is your reliable partner and a sure hub for all important need of everyone. In Xbulon we give the platform to transact and also get quick help whenever and however you need it.</p>



                                    <a href="04_service_details_seo.html" class="crumina-button button--dark button--l">VIEW DETAILS</a>



                                </div> -->



                                <div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">

                                    <img loading="lazy"  src="<?php echo base_url();?>images/home4.jpeg" width="100%" alt="SEO">

                                </div>



                            </div>



                        </div>

                    </div>



                </div>



								<div class="swiper-slide bg-grey-theme">



                    <div class="container">

                        <div class="row align-items-center">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center">



                                <!-- <div class="slider-content">



                                    <h2 class="h1 slider-content-title" data-swiper-parallax="-100"> You are welcome to the official website of Xbulon</h2>



                                    <p class="slider-content-text" data-swiper-parallax="-200">Xbulon is your reliable partner and a sure hub for all important need of everyone. In Xbulon we give the platform to transact and also get quick help whenever and however you need it.</p>



                                    <a href="04_service_details_seo.html" class="crumina-button button--dark button--l">VIEW DETAILS</a>



                                </div> -->



                                <div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">

                                    <img loading="lazy"  src="<?php echo base_url();?>images/home1.jpeg" width="100%" alt="SEO">

                                </div>



                            </div>



                        </div>

                    </div>



                </div>



								<div class="swiper-slide bg-grey-theme">



                    <div class="container">

                        <div class="row align-items-center">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center">



                                <!-- <div class="slider-content">



                                    <h2 class="h1 slider-content-title" data-swiper-parallax="-100"> You are welcome to the official website of Xbulon</h2>



                                    <p class="slider-content-text" data-swiper-parallax="-200">Xbulon is your reliable partner and a sure hub for all important need of everyone. In Xbulon we give the platform to transact and also get quick help whenever and however you need it.</p>



                                    <a href="04_service_details_seo.html" class="crumina-button button--dark button--l">VIEW DETAILS</a>



                                </div> -->



                                <div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">

                                    <img loading="lazy"  src="<?php echo base_url();?>images/home2.jpeg" width="100%" alt="SEO">

                                </div>



                            </div>



                        </div>

                    </div>



                </div>



								<div class="swiper-slide bg-grey-theme">



                    <div class="container">

                        <div class="row align-items-center">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center">



                                <!-- <div class="slider-content">



                                    <h2 class="h1 slider-content-title" data-swiper-parallax="-100"> You are welcome to the official website of Xbulon</h2>



                                    <p class="slider-content-text" data-swiper-parallax="-200">Xbulon is your reliable partner and a sure hub for all important need of everyone. In Xbulon we give the platform to transact and also get quick help whenever and however you need it.</p>



                                    <a href="04_service_details_seo.html" class="crumina-button button--dark button--l">VIEW DETAILS</a>



                                </div> -->



                                <div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">

                                    <img loading="lazy"  src="<?php echo base_url();?>images/home3.jpeg" width="100%" alt="SEO">

                                </div>



                            </div>



                        </div>

                    </div>



                </div>







            </div>



            <!--Pagination tabs-->



            <div class="slider-slides main-slider-slides">

                <div class="main-slider-slides-wrap">

                    <div class="slides-item bg-grey-theme swiper-slide-active">

                        <div class="h5 slides-item-title">Alternative Meds Home</div>

                        <div class="slides-item-text"></div>

                        <img loading="lazy" class="slides-item-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon34.png"  alt="icon">

                    </div>

                    <div class="slides-item bg-primary-themes">

                        <div class="h5 slides-item-title">Natural</div>

                        <div class="slides-item-text"></div>

                        <img loading="lazy" class="slides-item-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon35.png"  alt="icon">

                    </div>

                    <div class="slides-item bg-red-themes">

                        <div class="h5 slides-item-title">Xbulon Organics</div>

                        <div class="slides-item-text"></div>

                        <img loading="lazy" class="slides-item-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon36.png"  alt="icon">

                    </div>

                    <div class="slides-item bg-yellow-themes">

                        <div class="h5 slides-item-title">Xbulon Community</div>

                        <img loading="lazy" class="slides-item-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon37.png"  alt="icon">

                    </div>


                </div>

            </div>


						<div class="marqueetext"><marquee direction="3" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
<?php
    echo $marquee[0]['text'];
?>
</marquee></div>
        </div>



    </section>



    <section class="large-padding section-anime-js">

        <div class="container">

            <div class="row">
							<div class="col-md-12">

            <h2 class="heading text-center">WELCOME TO XBULON </h2>

            <p class="text-center">

							<b>Xbulon</b>  is your reliable partner and a sure hub for all important need of everyone. In Xbulon we give you the platform to transact and also get quick help whenever and however you need it.
    </p>

  <p class="text-center"><a href="https://xbulon.com/about-us" class="crumina-button button--dark button--bordered button--l">LEARN MORE</a></p>
            <!-- <p class="text-center">For all our businesses and services, we have trusted hands and specialists that are ever ready and diligent to give you the best services/attention that will meet your need. So when you need someone to talk to and confide with, we are here for you. You are welcome to win with us!
</p>
  <p class="text-center">Our system is designed to help you achieve your set targets and this is because we have structures in place to enable you doing that.
</p>
  <p class="text-center">Our system is very rewarding and interactive to everyone who will join us. We have good features that can help members do business as much as they desire and our payment mode is excellent.
</p>
  <p class="text-center">In <b>Xbulon</b> we put forth these structures to give our social community a better means of building a good business and financial status. Joining this community will make one realize every of one’s business and financial target in a shortest of time and effort.
</p> -->
<br><br><br><br>
        </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top active">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon25.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                                <h5 class="info-box-title font-weight-normal">Xbulon Organics</h5>

                            <p class="info-box-text text-justify">We are focused on producing the best of organic products using raw materials sourced from nature to nurture your health and improve everyday living.
</p>											<p class="text-center"><a href="https://xbulon.com/organic-products" class="crumina-button button--dark button--bordered button--l">LEARN MORE</a></p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon26.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Properties</h5>

                            <p class="info-box-text text-justify">This platform will financially empower members to transact and earn a commission up to 20% by referring someone to buy or sell properties displayed in this website.</p>
														<p class="text-center"><a href="https://xbulon.com/property" class="crumina-button button--dark button--bordered button--l">LEARN MORE</a></p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon27.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Xbulon Gas & Steam Turbine</h5>

                            <p class="info-box-text text-justify">We have a Team of highly skilled Engineers who are experts in the building and maintenance of gas and steam turbine of any capacity.</p>
														<p class="text-center"><a href="https://xbulon.com/property" class="crumina-button button--dark button--bordered button--l">LEARN MORE</a></p>

                        </div>

                    </div>

                </div>



                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 mb-md-0 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon28.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Xbulon E-Shopping</h5>

                            <p class="info-box-text text-justify">Xbulon online mart is where you can get every of your necessities just by a click and get the goods delivered to you on time.
</p>

<p class="text-center"><a href="https://xbulon.com/ecommerce" class="crumina-button button--dark button--bordered button--l">LEARN MORE</a></p>


                        </div>

                    </div>

                </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon30.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Project & Development Management</h5>

                            <p class="info-box-text text-justify">In this platform we give you real value for your money and deliver on time, eliminating waste managing your budget effectively.
</p>

<p class="text-center"><a href="https://xbulon.com/project-development" class="crumina-button button--dark button--bordered button--l">LEARN MORE</a></p>
                        </div>

                    </div>

                </div>


                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon30.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Xbulon Logistics
</h5>

                            <p class="info-box-text text-justify">Products purchased from this platform are properly cared for and we ensure that it will all be delivered to the destination on time and in good condition.  </p>

<p class="text-center"><a href="#" class="crumina-button button--dark button--bordered button--l">LEARN MORE</a></p>
                        </div>

                    </div>

                </div>













                <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon30.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Project Management</h5>

                            <p class="info-box-text text-justify">we help member and supervise projects of our members and also help they get the value of the project they give out to others. Members also earn good commission when the client project to the company.</p>

                        </div>

                    </div>

                </div> -->
                <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon30.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Negotiator & Mediator</h5>

                            <p class="info-box-text text-justify">we have profession Lawyers and Associates who are very much experienced in the job. We assure you that you be highly satisfied in these contexts.</p>

                        </div>

                    </div>

                </div> -->


                <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 mb-md-0 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon29.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Digital Money</h5>

                            <p class="info-box-text text-justify">here visitors can buy and sell digital currencies at good rate. Members who are interested will be able to transact here earning good commission.</p>

                        </div>

                    </div>

                </div> -->

                <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon30.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Organic Herbal Products</h5>

                            <p class="info-box-text text-justify">our teas, herbs and, all the products we have are both preventive and curative.</p>

                        </div>

                    </div>

                </div> -->



            </div>

        </div>

    </section>







    <section class="large-padding section-anime-js">

        <div class="container">

            <div class="row align-items-end">

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <header class="crumina-module crumina-heading mb-4">

                        <!-- CRUMINA HEADING TITLE -->

                        <div class="title-text-wrap">

                            <h2 class="heading-title element-anime-fadeInUp-js">Things That You Can Really Achieve Through This System</h2>

                        </div>

                        <!-- /CRUMINA HEADING TITLE -->



                        <!-- CRUMINA HEADING DECORATION -->

                        <div class="heading-decoration element-anime-fadeInUp-js"></div>

                        <!-- /CRUMINA HEADING DECORATION  -->



                        <!-- CRUMINA HEADING TEXT -->

                        <!-- <div class="heading-text element-anime-fadeInUp-js">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium.</div> -->

                        <!-- /CRUMINA HEADING TEXT -->

                    </header>

                    <ul class="crumina-list list--standard fill-red-themes mb-4 element-anime-fadeInUp-js">



                        <!-- LIST STANDARD ITEM -->



                        <!-- /LIST STANDARD ITEM -->



                        <!-- LIST STANDARD ITEM -->

                        <li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Build your strong network base



                        </li>

                        <!-- /LIST STANDARD ITEM -->



                        <!-- LIST STANDARD ITEM -->

                        <li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Develop and sell your ideal to the world


                        </li>

                        <!-- /LIST STANDARD ITEM -->



                        <!-- LIST STANDARD ITEM -->

                        <li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Buy/Sell your “Digital Currencies” without hesitation


                        </li>

												<li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Meet good DOCTORS that will give you the best medical advice and help


                        </li>

												<li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

													Meet Counselors and helpers to guide you through in your challenges


                        </li>

												<li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Meet Mediators and Negotiator to stand for you



                        </li>

												<li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Meet our Engineers to Build/Maintain Gas & Steam Turbines & you earn from it




                        </li>

												<li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Meet intelligent, honest Realtors and Architects for you housing project





                        </li>

												<li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Our IT partner is one of the best in the world, will give you the best interactive website






                        </li>

												<li>
                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Get your projects executed to meet your desired taste and on time
                        </li>

												<li>
                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Build your business and market your products from local scene to the international

                        </li>

												<li>
                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Buy organic products and get 10% to 15% discount plus commissions


                        </li>

												<li>
                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														We offer you space in our system to run your personal business advert to millions of viewers free



                        </li>

												<li>
                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Deliver your Items and packages to any part of Canada, Norway, Sweden, Netherlands, India, Mauritius, Nigeria, Ghana, Togo, Liberia, Philippines, New Zealand, Cameroon, Tanzania, Uganda, South African, etc




                        </li>

                        <!-- /LIST STANDARD ITEM -->



                    </ul>



                    <div class="universal-btn-wrapper element-anime-opacity-js">

                        <!-- <a href="03_services.html" class="crumina-button button--dark button--bordered button--l">LEARN MORE</a> -->

                        <!-- <a href="34_testimonials.html" class="crumina-button button--primary button--l">GET A QUOTE</a> -->

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-4 mt-md-0">

                    <img loading="lazy"  class="element-anime-opacity-js" src="<?php echo base_url();?>images/about1.jpeg" alt="Case">

                </div>

            </div>

        </div>

    </section>



    <section class="section-image-bg-grey section-anime-js">

        <div class="row no-gutters align-items-center">

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 order-1 order-md-0 element-anime-opacity-js">

                <div class="post-thumb format-video">
                     <iframe width="560" height="315" src="https://www.youtube.com/embed/AE8-EJqhKzo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <!-- <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/posts/blog15.jpg" alt="Post">

                    <div class="overlay"></div>

                    <a href="https://www.youtube.com/watch?v=bTqVqk7FSmY" class="play-video js-popup-iframe">

                        <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/theme-content/icons/play.png" alt="play">

                    </a> -->

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 order-0 order-md-0">

                <div class="row justify-content-center align-items-center p-5">

                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 align-center">

                        <header class="crumina-module crumina-heading mb-4">

                            <!-- CRUMINA HEADING TITLE -->

                            <div class="title-text-wrap">

                                <h2 class="heading-title element-anime-fadeInUp-js">Watch Our Video</h2>

                            </div>

                            <!-- /CRUMINA HEADING TITLE -->



                            <!-- CRUMINA HEADING DECORATION -->

                            <div class="heading-decoration element-anime-fadeInUp-js"></div>

                            <!-- /CRUMINA HEADING DECORATION  -->

                        </header>



                        <p class="mb-4 element-anime-fadeInUp-js">Our system is very rewarding and interactive to everyone who will join us. We have good features that can help members do business as much as they desire and our payment mode is excellent.</p>



                        <!-- <a href="02_about_us.html" class="crumina-button button--dark button--l element-anime-opacity-js">ABOUT US</a> -->

                    </div>

                </div>

            </div>

        </div>

    </section>



    <section class="large-padding bg-mountains section-anime-js">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 m-auto align-center">

                    <header class="crumina-module crumina-heading mb-5">

                        <!-- CRUMINA HEADING TITLE -->

                        <div class="title-text-wrap">

                            <h2 class="heading-title element-anime-fadeInUp-js">Packages</h2>

                        </div>

                        <!-- /CRUMINA HEADING TITLE -->



                        <!-- CRUMINA HEADING DECORATION -->

                        <div class="heading-decoration element-anime-fadeInUp-js"></div>

                        <!-- /CRUMINA HEADING DECORATION  -->



                        <!-- CRUMINA HEADING TEXT -->

                        <!-- <div class="heading-text element-anime-fadeInUp-js">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium.</div> -->

                        <!-- /CRUMINA HEADING TEXT -->

                    </header>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-info-box info-box--column-centered">

                        <div class="info-box-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>images/Bronze.png" alt="Objective">

                        </div>

                        <div class="info-box-content">

                            <!-- <h5 class="info-box-title">Objective</h5> -->

                            <p class="info-box-text">Bronze members are eligible to do all the businesses we have in this Platform and also earn all the benefits and commissions. Also, you’ll have free E-Health consultation with the specialist.
</p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-info-box info-box--column-centered">

                        <div class="info-box-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>images/Silver.png" alt="Strategy">

                        </div>

                        <div class="info-box-content">

                            <!-- <h5 class="info-box-title">Strategy</h5> -->

                            <p class="info-box-text">Silver member are eligible to do all the businesses we have in this Platform and also earn all the benefits and commissions. You a more advantage over Bronze member.
</p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-info-box info-box--column-centered">

                        <div class="info-box-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>images/Gold.png" alt="Technology">

                        </div>

                        <div class="info-box-content">

                            <!-- <h5 class="info-box-title">Technology</h5> -->

                            <p class="info-box-text">Gold member are eligible to do all the businesses we have in this Platform and also earn all the benefits and commissions. Gold members have more advantages over Silver and Bronze members
.</p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-info-box info-box--column-centered">

                        <div class="info-box-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>images/Diamond.png" alt="Analytics">

                        </div>

                        <div class="info-box-content">

                            <!-- <h5 class="info-box-title">Analytics</h5> -->

                            <p class="info-box-text">Diamond member are eligible to do all the businesses we have in this Platform and also earn all the benefits and commissions. This is the climax of it all, members here have great advantages over all other members</p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row mt-5 justify-content-center align-center">

                <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">

                    <div class="universal-btn-wrapper element-anime-opacity-js">

                        <!-- <a href="36_pricing_tables.html" class="crumina-button button--dark button--l">MORE INFO</a> -->

                        <a href="<?php echo site_url();?>join-us" class="crumina-button button--primary button--l">GET STARTED!</a>

                    </div>

                </div>

            </div>

        </div>

    </section>






    <section class="large-padding section-anime-js">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 m-auto">

                    <header class="crumina-module crumina-heading mb-5 align-center">

                        <!-- CRUMINA HEADING TITLE -->

                        <div class="title-text-wrap">

                            <h2 class="heading-title element-anime-fadeInUp-js">Unique Services</h2>

                        </div>

                        <!-- /CRUMINA HEADING TITLE -->



                        <!-- CRUMINA HEADING DECORATION -->

                        <div class="heading-decoration element-anime-fadeInUp-js"></div>

                        <!-- /CRUMINA HEADING DECORATION  -->



                        <!-- <div class="heading-text element-anime-fadeInUp-js">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium.</div>
 -->


                    </header>

                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-case-item">

                        <a href="#" class="case-item-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/case-studies/case3.jpg" alt="Case">

                        </a>

                        <div class="case-item-content">

                            <a href="12_project_details_ver_01.html" class="h6 case-item-title">Xbulon Tea</a>

                            <div class="case-item-cat">

                                <!-- <a href="#">Ecommerce</a> -->

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-case-item">

                        <a href="#" class="case-item-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/case-studies/case4.jpg" alt="Case">

                        </a>

                        <div class="case-item-content">

                            <a href="13_project_details_ver_02.html" class="h6 case-item-title">e-Doctor/Conselor</a>

                            <div class="case-item-cat">

                                <!-- <a href="#">SEO</a> -->

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-case-item">

                        <a href="#" class="case-item-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/case-studies/case5.jpg" alt="Case">

                        </a>

                        <div class="case-item-content">

                            <a href="12_project_details_ver_01.html" class="h6 case-item-title">X-Series & Natural</a>

                            <div class="case-item-cat">

                                <!-- <a href="#">Food & Drinks</a> -->

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center mt-5 element-anime-opacity-js">

                    <!-- <a href="11_case_studies.html" class="crumina-button button--dark button--l">ALL PROJECTS</a> -->

                </div>

            </div>

        </div>

    </section>



    <section class="large-padding bg-yellow-themes section-anime-js">

        <div class="container">

            <div class="row">

                <div class="col-lg-7 col-md-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-module-slider pagination-bottom-center">

                        <div class="swiper-container" data-show-items="1" data-prev-next="1" data-effect="fade" data-loop="false">



                            <div class="swiper-wrapper">



                                <div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">Business is like a wheel barrow, nothing happens until you start pushing </h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">Robert Kiyosaki</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">people never ask if things will work. They are willing to try and find out</h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">Brad Gosse</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">If I would be given a chance to start all over again, I would choose “NETWORK MARKETING” </h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">Bill gates.</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>


																<div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">Move out of your comfort zone. You can only grow if you are willing to feel awkward and uncomfortable when you try something new </h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">Brian Tracy</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

																<div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">If you really want to do something, you’ll find a way. If you don’t you’ll find an excuse </h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">Jim Rohn
</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

																<div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">To achieve anything of lasting value, you must partner with others </h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">John Maxwell</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

																<div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">Opportunities are like sunrise. If you wait for long you miss them</h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">William Arthur ward</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                            </div>

                        </div>



                        <!-- If we need pagination -->

                        <div class="swiper-pagination swiper-pagination-dark"></div>

                    </div>

                </div>



                <div class="col-lg-5 col-md-12 element-anime-fadeInUp-js">

                    <h3>Helpful Quotes</h3>







                </div>



            </div>

        </div>

    </section>



    <section class="large-padding bg-grey-theme section-anime-js">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 m-auto">

                    <header class="crumina-module crumina-heading mb-5 align-center">

                        <!-- CRUMINA HEADING TITLE -->

                        <div class="title-text-wrap">

                            <h2 class="heading-title element-anime-fadeInUp-js">Our Business Networking Packages</h2>

                        </div>

                        <!-- /CRUMINA HEADING TITLE -->



                        <!-- CRUMINA HEADING DECORATION -->

                        <div class="heading-decoration element-anime-fadeInUp-js"></div>

                        <!-- /CRUMINA HEADING DECORATION  -->



                        <div class="heading-text element-anime-fadeInUp-js">Subscribe to any of these and start will winning with us</div>



                    </header>

                </div>

            </div>

            <div class="row justify-content-center">

							<div class="col-lg-3 col-md-6 col-sm-12 mb-3 mb-lg-0 element-anime-fadeInUp-js">

									<div class="crumina-module crumina-pricing-tables-item pricing-tables-item-standard">

											<div class="main-pricing-content">

													<div class="pricing-thumb">

															<img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>images/Bronze.png" alt="Personal">

													</div>



													<h5 class="pricing-title">Bronze</h5>



													<ul class="pricing-tables-position">

															<li class="position-item">

																	<span class="font-weight-bold"></span> Referral Bonus

															</li>

															<li class="position-item">

																	<span class="font-weight-bold"></span> Welcome Pack

															</li>

															<li class="position-item">

																	<span class="font-weight-bold"></span> Direct Placement

															</li>

															<li class="position-item">
																<span class="font-weight-bold"></span> Spillover


															</li>

															<li class="position-item">

																	<span class="font-weight-bold"></span> Promo/Bonus

															</li>

													</ul>



													<h2 class="rate">$<span class="pricing-price">10</span></h2>



													<a href="<?php echo site_url();?>join-us" class="crumina-button button--dark button--l">JOIN NOW!</a>



											</div>



									</div>

							</div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-3 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-pricing-tables-item pricing-tables-item-standard">

                        <div class="main-pricing-content">

                            <div class="pricing-thumb">

                                <img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>images/Silver.png" alt="Personal">

                            </div>



                            <h5 class="pricing-title">Silver</h5>



                            <ul class="pricing-tables-position">

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Referral Bonus

                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Welcome Pack

                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Direct Placement

                                </li>

                                <li class="position-item">
																	<span class="font-weight-bold"></span> Spillover


                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Promo/Bonus

                                </li>

                            </ul>



                            <h2 class="rate">$<span class="pricing-price">19</span></h2>



                            <a href="<?php echo site_url();?>join-us" class="crumina-button button--dark button--l">JOIN NOW!</a>



                        </div>



                    </div>

                </div>

								<div class="col-lg-3 col-md-6 col-sm-12 mb-3 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-pricing-tables-item pricing-tables-item-standard">

                        <div class="main-pricing-content">

                            <div class="pricing-thumb">

                                <img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>images/Gold.png" alt="Personal">

                            </div>



                            <h5 class="pricing-title">Gold</h5>



                            <ul class="pricing-tables-position">

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Referral Bonus

                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Welcome Pack

                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Direct Placement

                                </li>

                                <li class="position-item">
																	<span class="font-weight-bold"></span> Spillover


                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Promo/Bonus

                                </li>

                            </ul>



                            <h2 class="rate">$<span class="pricing-price">36</span></h2>



                            <a href="<?php echo site_url();?>join-us" class="crumina-button button--dark button--l">JOIN NOW!</a>



                        </div>



                    </div>

                </div>

								<div class="col-lg-3 col-md-6 col-sm-12 mb-3 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-pricing-tables-item pricing-tables-item-standard">

                        <div class="main-pricing-content">

                            <div class="pricing-thumb">

                                <img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>images/Diamond.png" alt="Personal">

                            </div>



                            <h5 class="pricing-title">Diamond</h5>



                            <ul class="pricing-tables-position">

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Referral Bonus

                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Welcome Pack

                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Direct Placement

                                </li>

                                <li class="position-item">
																	<span class="font-weight-bold"></span> Spillover


                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Promo/Bonus

                                </li>

                            </ul>



                            <h2 class="rate">$<span class="pricing-price">70</span></h2>



                            <a href="<?php echo site_url();?>join-us" class="crumina-button button--dark button--l">JOIN NOW!</a>



                        </div>



                    </div>

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

<!-- /MAIN CONTENT WRAPPER -->

    <!-- Start Footer
    ============================================= -->
      <?php $this->load->view('common/footer'); ?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <?php
	  $this->load->view('common/footer-script');
	  ?>

</body>
</html>

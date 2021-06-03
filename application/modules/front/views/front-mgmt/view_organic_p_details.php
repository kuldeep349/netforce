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

<div id="BookAppointment" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      	 <div class="container">
              <div class="row">
                <div class="col-xs-12 ">
                	<?php
        	$dayArgs=array();
        	$timeArgs=array();
        	$dateTime=array(); 
        	$inc=0;
        	////print_r($doctor_time);
            if(!empty($doctor_time))
            {
            	foreach ($doctor_time as $key => $value) {
            		$time = date('H', strtotime($value['available_time']));
            		$day = strtolower(date('D', strtotime($value['available_time'])));
            		if ($time < "12") {
            			$dayArgs[]=$day;
            			$timeArgs[]=$time;
				        $dateTime[$day]['Morning'][$inc++]=$value['time_id'].'-'.date('h:i A', strtotime($value['available_time']));
				    } else
				    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
				    if ($time >= "12" && $time < "17") {
				        $dayArgs[]=$day;
            			$timeArgs[]=$time;
            			$dateTime[$day]['Afternoon'][$inc++]=$value['time_id'].'-'.date('h:i A', strtotime($value['available_time']));
				    } else
				    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
				    if ($time >= "17" && $time < "19") {
				        $dayArgs[]=$day;
            			$timeArgs[]=$time;
            			$dateTime[$day]['Evening'][$inc++]=$value['time_id'].'-'.date('h:i A', strtotime($value['available_time']));
				    }
            		///echo '<li><a href=""><span>'.date('h:i A', strtotime($value['available_time'])).'</span></a></li>';
            		
            	}
            }
            ///print_r($dayArgs);
            sort($dayArgs);
            $sortDay = array("sun", "mon","tue", "wed", "thu", "fri", "sat");
            if(!empty(array_unique($sortDay)))
            { ?>
                  <nav class="booking-tab">
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                     <?php foreach (array_unique($sortDay) as $key => $day) {
                           
                      ?>
                      <a class="nav-item nav-link <?php if($key==0){ echo 'active'; } ?>" id="nav-home-tab" data-toggle="tab" href="#<?php echo $day; ?>" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo ucfirst($day); ?></a>
                     <?php } ?>
                    </div>
                  </nav>
             <?php } ?>     
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                  	<?php if(!empty(array_unique($sortDay))) {
                       foreach (array_unique($sortDay) as $key => $dval) {
                       	
                  	 ?>
                    <div class="tab-pane fade show <?php if($key==0){ echo 'active'; } ?>" id="<?php echo $dval; ?>" role="tabpanel" aria-labelledby="nav-home-tab">
                      <?php if(isset($dateTime[$dval])) {
                         foreach ($dateTime[$dval] as $key => $value) {
                         	echo "<div>
                         	 <h6>".$key."</h6>
                         	 <ul class='doctor-time'>
                         	";
                         	foreach ($value as $key => $dt) {
                         		$dtArgs=explode("-",$dt);
                         	echo '<li><a href="'.base_url().'book-appointment/'.ID_encode($doctor_list['doctor_id']).'/'.ID_encode($dtArgs[0]).'"><span>'.$dtArgs[1].'</span></a></li>';
                         	
                       ?>

                      <?php } echo '</ul></div>'; } } ?>
                    </div>
                  <?php }} ?>
                   
                  </div>
                
                </div>
              </div>
        </div>
        <ul class="doctor-time">
        	
       </ul>
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
				<h1 class="page-title text-white">Xbulon Qrganic Product</h1>
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
							<a href="<?php echo base_url();?>organic-products">Organic Product</a>
						</li>
						<!-- /BREADCRUMBS ITEM -->
						<!-- BREADCRUMBS ITEM -->
						<li class="breadcrumbs-item trail-end">
							<span class="crumina-icon">»</span>
							<span>Product Details</span>
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
				
				<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 mb-4 mb-lg-0">
					<div class="product-details-thumb">
						<div class="crumina-module crumina-module-slider products-gallery-slider">
							<div class="swiper-container" data-show-items="1" data-change-handler="thumbsParent" data-prev-next="1">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<div class="product-details-gallery-item">
											<?php if(!empty($product['product_image'])){ ?>
											<img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>product_images/<?php echo $product['product_image']; ?>" alt="product">
										<?php }else{ ?>
                                             <img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/no-avatar.png" alt="product">
										<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
				<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
					<div class="product-details-content">
						<h2 class="product-title"><?php echo $product['title']; ?></h2>
						<div class="price-review-wrap">
							<div class="price">
								<ins>
									<span class="woocommerce-Price-amount amount">
										<span class="woocommerce-Price-currencySymbol">Retail Price $</span><?php echo $product['old_price']?>
									</span>
								</ins><br>
								<ins>
									<span class="woocommerce-Price-amount amount">
										<span class="woocommerce-Price-currencySymbol">Member Price $</span><?php echo $product['new_price']?>
									</span>
								</ins>
								<br>
								<!--<del>
									<ins>
										<span class="woocommerce-Price-amount amount">
											<span class="woocommerce-Price-currencySymbol">$</span>
											<?php //echo $product['old_price'];?>
										</span>
									</ins>
								</del>-->
							</div>
							<ul class="rait-stars">
								<li>
									<svg class="crumina-icon star-active" width="12" height="12">
										<use xlink:href="#icon-star"></use>
									</svg>
								</li>
								<li>
									<svg class="crumina-icon star-active" width="12" height="12">
										<use xlink:href="#icon-star"></use>
									</svg>
								</li>
								<li>
									<svg class="crumina-icon star-active" width="12" height="12">
										<use xlink:href="#icon-star"></use>
									</svg>
								</li>
								<li>
									<svg class="crumina-icon star-active" width="12" height="12">
										<use xlink:href="#icon-star"></use>

									</svg>

								</li>

								<li>

									<svg class="crumina-icon" width="12" height="12">

										<use xlink:href="#icon-star"></use>

									</svg>

								</li>

							</ul>

							<a href="#" class="reviews-link">3 customer reviews</a>

						</div>
						<?php echo $product['description']; 
						
						
						?>

						<div class="quantity-btn-wrap">
							<?php
							if($product['qty'] > 0){
								if(empty($cart_product)){
									echo'<input type="hidden" id="quantity" value="1">';
									echo'<button class="crumina-button addToCart button--primary button--with-icon button--icon-right button--m"
									data-product_id="'.$product['id'].'"
									>
										Add to Cart
									</Button>';
								}else{
									echo'<input type="number" id="quantity" value="'.$cart_product['quantity'].'">';
									echo'<button class="crumina-button addToCart button--primary button--with-icon button--icon-right button--m"
									data-product_id="'.$product['id'].'"
									>
										Update Cart
									</Button>';
								}
								
							}else{
								echo'This Product is not in Stock';
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="crumina-module crumina-tabs">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="tabs-list nav nav-tabs" role="tablist">
						<li role="presentation" class="nav-item">

							<a class="nav-link active" href="#info" id="info-tab" role="tab" data-toggle="tab" aria-controls="info" aria-selected="true">Info</a>
							
						</li>
						<!---li role="presentation" class="nav-item nav-link">

							<a class="nav-link" href="#additional" id="additional-tab" role="tab" data-toggle="tab" aria-controls="additional" aria-selected="false">ADDITIONAL INFORMATION</a>

						</li--->

						<li role="presentation" class="nav-item">
							<a class="nav-link" href="#reviews" id="reviews-tab" role="tab" data-toggle="tab" aria-controls="reviews" aria-selected="false">REVIEWS (3)</a>

						</li>
					</ul>
				</div>
			</div>
		</div>



		<div class="tab-content">

			<div class="container">

				<div class="row">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

						<div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
						<?php echo $product['long_description']; ?>
							
						</div>

						<div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">

							<h3 class="mb-4">Additional information</h3>

							<table class="woocommerce-product-attributes shop_attributes">

								<tbody>

								<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight">

									<th class="woocommerce-product-attributes-item__label">Weight</th>

									<td class="woocommerce-product-attributes-item__value">14 lbs</td>

								</tr>

								<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--dimensions">

									<th class="woocommerce-product-attributes-item__label">Dimensions</th>

									<td class="woocommerce-product-attributes-item__value">12 × 18 in</td>

								</tr>

								<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_color">

									<th class="woocommerce-product-attributes-item__label">Color</th>

									<td class="woocommerce-product-attributes-item__value"><p>White, Salmon</p>

									</td>

								</tr>

								</tbody>

							</table>

						</div>

						<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">

							<h3 class="mb-4">Reviews</h3>

							<div class="product-reviews">

								<div class="product-review-item">



								</div>

								<div class="product-review-item">

									<div class="author-avatar">

										<img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author5.png" alt="Author">

									</div>

									<div class="product-review-content">

										<div class="author-text">

											<ul class="rait-stars">

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

												<li>

													<svg class="crumina-icon" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

											</ul>

											<div class="author-time-wrap">

												<a href="#" class="review-author-name">Frank Simpson</a>

												<div class="comments__time">

													19th November 2019,

													<a href="#" class="published">10:07 am</a>

												</div>

											</div>

										</div>

										<div class="review-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tellus in metus vulputate eu scelerisque felis imperdiet proin fermentum donec pretium vulputate sagittis aliquam malesuada bibendum.</div>

									</div>

								</div>

								<div class="product-review-item">

									<div class="author-avatar">

										<img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/avatars/no-avatar.png" alt="Author">

									</div>

									<div class="product-review-content">

										<div class="author-text">

											<ul class="rait-stars">

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

											</ul>

											<div class="author-time-wrap">

												<a href="#" class="review-author-name">Angelina Johnson</a>

												<div class="comments__time">

													19th November 2019,

													<a href="#" class="published">10:07 am</a>

												</div>

											</div>

										</div>

										<div class="review-text">Justo eget magna fermentum iaculis eu non diam phasellus. Nulla aliquet enim tortor at auctor urna nunc id cursus.</div>

									</div>

								</div>

								<div class="product-review-item">

									<div class="author-avatar">

										<img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author4.png" alt="Author">

									</div>

									<div class="product-review-content">

										<div class="author-text">

											<ul class="rait-stars">

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

												<li>

													<svg class="crumina-icon star-active" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

												<li>

													<svg class="crumina-icon" width="12" height="12">

														<use xlink:href="#icon-star"></use>

													</svg>

												</li>

											</ul>

											<div class="author-time-wrap">

												<a href="#" class="review-author-name">Frank Simpson</a>

												<div class="comments__time">

													19th November 2019,

													<a href="#" class="published">10:07 am</a>

												</div>

											</div>

										</div>

										<div class="review-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tellus in metus vulputate eu scelerisque felis imperdiet proin fermentum donec pretium vulputate sagittis aliquam malesuada bibendum.</div>

									</div>

								</div>

							</div>



							<div class="add-review mt-5">

								<header class="crumina-module crumina-heading">



									<!-- CRUMINA HEADING TITLE -->

									<div class="title-text-wrap">

										<h2 class="heading-title">Add Review</h2>

									</div>

									<!-- /CRUMINA HEADING TITLE -->



									<!-- CRUMINA HEADING DECORATION -->

									<div class="heading-decoration"></div>

									<!-- /CRUMINA HEADING DECORATION  -->



									<!-- CRUMINA HEADING TEXT -->

									<div class="heading-text">Your email address will not be published.</div>

									<!-- /CRUMINA HEADING TEXT -->



								</header>



								<form class="add-review-form mt-4">

									<div class="row">

										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

											<div class="form-item">

												<input class="input--white" name="name" type="text" placeholder="Your Full Name" required>

											</div>

										</div>

										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

											<div class="form-item">

												<input class="input--white" name="email" type="email" placeholder="Email Address" required>

											</div>

										</div>

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

											<div class="form-item">

												<ul class="rait-stars rait-stars--reviews">

													<li>

														<a href="#" class="star-1">

															<svg class="crumina-icon" width="20" height="20">

																<use xlink:href="#icon-star-review"></use>

															</svg>

														</a>

													</li>

													<li>

														<a href="#" class="star-2">

															<svg class="crumina-icon" width="20" height="20">

																<use xlink:href="#icon-star-review"></use>

															</svg>

														</a>

													</li>

													<li>

														<a href="#" class="star-3">

															<svg class="crumina-icon" width="20" height="20">

																<use xlink:href="#icon-star-review"></use>

															</svg>

														</a>

													</li>

													<li>

														<a href="#" class="star-4">

															<svg class="crumina-icon" width="20" height="20">

																<use xlink:href="#icon-star-review"></use>

															</svg>

														</a>

													</li>

													<li>

														<a href="#" class="star-5">

															<svg class="crumina-icon" width="20" height="20">

																<use xlink:href="#icon-star-review"></use>

															</svg>

														</a>

													</li>

												</ul>

											</div>

											<div class="form-item">

												<textarea class="input--white" name="message" placeholder="Write your comment here..." rows="4" required></textarea>

											</div>

											<div class="inquiry-btn-wrap">

												<button class="crumina-button button--dark button--l">SUBMIT</button>

												<span>You may use these HTML tags and attributes:<code> &lt;a href=""&gt; &lt;abbr&gt; &lt;acronym&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt;</code></span>

											</div>

										</div>

									</div>

								</form>

							</div>

						</div>

					</div>

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
<script>
$(document).on('click','.addToCart',function(){
	var product_id = $(this).data('product_id');
	var url = "<?php echo base_url('front/add_product_to_cart/'); ?>";
	let formData = {
		product_id : product_id,
		product_type : 'organic',
		quantity : $('#quantity').val()
	}
	console.log('url ' ,url)
	$.post(url,formData,function(res){
		console.log(res)
		alert(res.message);
		// location.reload();
	},'json');
})
</script>
</body>
</html>
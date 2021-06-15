<!-- MAIN HEADER -->
<nav id="site-header" class="site-header navigation navigation-justified sticky-top">
    <div class="top-bar top-bar-dark">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-bar-item">8 800 567.890.11</div>
                <div class="top-bar-item"><a href="#">info@xbulon.com</a></div>
                <div class="top-bar-item"><span>Mon. - Sat.</span> 07:00 - 21:00</div>
                <div class="top-bar-item follow_us">
                    <span>Follow us:</span>
                    <div class="socials">
                        <a class="social-item" href="#">
                            <img loading="lazy"  width="16" height="16" class="crumina-icon" src="<?php echo base_url();?>front_assets/img/theme-content/social-icons/facebook.svg" alt="facebook">
                        </a>
                        <a class="social-item" href="#">
                            <img loading="lazy"  width="16" height="16" class="crumina-icon" src="<?php echo base_url();?>front_assets/img/theme-content/social-icons/twitter.svg" alt="twitter">
                        </a>
                        <a class="social-item" href="#">
                            <img loading="lazy"  width="16" height="16" class="crumina-icon" src="<?php echo base_url();?>front_assets/img/theme-content/social-icons/google.svg" alt="google">
                        </a>

                    </div>
                    <div class="googletransfate"><div id="google_translate_element"></div>

                    <script type="text/javascript">
                    function googleTranslateElementInit() {
                    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                    }
                    </script>

                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></div>
                </div>
                <div class="top-bar-item login-block">
                    <svg class="crumina-icon" width="20" height="16">
                        <use xlink:href="#icon-users"></use>
                    </svg>
                    <a class="js-window-popup" href="<?php echo site_url();?>user">SIGN IN</a>
                    <svg class="crumina-icon" width="20" height="16">
                        <use xlink:href="#icon-users"></use>
                    </svg>
                    <a class="js-window-popup" href="<?php echo site_url();?>join-us">SIGN UP</a>
                    <a href="<?php echo base_url('front/cart');?>">
                    <div class="cart-count">
                            <?php 
                            echo !empty ($this->session->userdata['cart']) ? count($this->session->userdata['cart']) : 0 ;
                            ?>
                        </div>
                        <svg class="crumina-icon" width="30" height="25">
                            <use xlink:href="#icon-shop-cart"></use>
                        </svg>
                    </a>

                <div class="navigation-shop-cart-wrapper" style="display:none" id="showCart">
                    <a href="21_cart.html" class="shop-link-responsive"></a>
                    <div class="navigation-shop-cart">
                    <!-- <div class="navigation-shop-cart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"> -->
                        <div class="dropdown-menu dropdown-menu-right popup-cart">
                            <div class="popup-cart-content">
                                <!--<h5 class="title-cart">No products in the cart!</h5>
                                <p class="subtitle">Please make your choice.</p>
                                <a href="#" class="crumina-button button&#45;&#45;dark button&#45;&#45;m w-100">VIEW ALL CATALOG</a>-->
                                <h5 class="title-cart">You added to cart!</h5>
                                <div class="cart-products" id="cartProductsList">
                                </div>
                            </div>
                            <div class="cart-popup-total">
                                <div class="cart-total-text">
                                    <h4 class="title">TOTAL:</h4>
                                    <div class="total-price" id="TotalPrice">$0</div>
                                </div>
                                <a href="<?php echo base_url('front/cart');?>" class="crumina-button button--dark button--s">VIEW CART</a>
                                <a href="<?php echo base_url('front/cart');?>" class="crumina-button button--green button--s">CHECKOUT</a>
                            </div>
                        </div>
                        <!-- MAIN HEADER SHOP CART COUNT -->
                        <div class="cart-count">
                            <?php 
                            echo !empty ($this->session->userdata['cart']) ? count($this->session->userdata['cart']) : 0 ;
                            ?>
                        </div>
                        <!-- /MAIN HEADER SHOP CART COUNT -->
                        <!-- MAIN HEADER SHOP CART ICON -->
                        <a href="<?php echo base_url('front/cart');?>">
                        <svg class="crumina-icon" width="30" height="25">
                            <use xlink:href="#icon-shop-cart"></use>
                        </svg>
                        </a>

                        <!-- /MAIN HEADER SHOP CART ICON -->



                    </div>

                    </div>

                </div>
            </div>
               <a href="#" class="top-bar-close" id="top-bar-close-js">
                 <span></span>
                 <span></span>
             </a>
         </div>
     </div>
     
    <!-- MAIN HEADER CONTAINER -->
    <style>
    .section-image-bg-lime {
    
    display: none !important;
}
    </style>
    <div class="container">
        <!-- MAIN HEADER RESPONSIVE -->
        <div class="navigation-header">
            <!-- MAIN HEADER RESPONSIVE LOGO -->
            <div class="navigation-logo">
                <!-- MAIN HEADER RESPONSIVE LOGO LINK-->
                <a class="site-logo" href="<?php echo base_url();?>">
                    <!-- MAIN HEADER RESPONSIVE LOGO IMAGE-->
                    <!-- <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/logo/logo-dark.svg" alt="logo" width="70"> -->
                    <!-- /MAIN HEADER RESPONSIVE LOGO IMAGE-->
                    <div class="logo-text">
                        <div class="logo-title"><img src="<?php echo base_url();?>front_assets/images/logo.png"></div>

                    </div>
                </a>
                <!-- /MAIN HEADER RESPONSIVE LOGO LINK-->
            </div>
            <!-- /MAIN HEADER RESPONSIVE LOGO -->
            <!-- TOP BAR RESPONSIVE BUTTON-OPEN -->
            <div id="top-bar-js" class="top-bar-link">
                <svg class="crumina-icon" width="20" height="16">
                    <use xlink:href="#icon-users"></use>
                </svg>
            </div>
            <!-- /TOP BAR RESPONSIVE BUTTON-OPEN -->
            <!-- MAIN HEADER RESPONSIVE BUTTON-OPEN -->
            <div class="navigation-button-toggler">
                <!-- MAIN HEADER RESPONSIVE BUTTON-OPEN ICON -->
                <i class="hamburger-icon"></i>
                <!-- /MAIN HEADER RESPONSIVE BUTTON-OPEN ICON -->
            </div>
            <!-- /MAIN HEADER RESPONSIVE BUTTON-OPEN -->
        </div>
        <!-- /MAIN HEADER RESPONSIVE -->
        <!-- MAIN HEADER BODY -->
        <div class="navigation-body">
            <!-- MAIN HEADER BODY HEADER -->
            <div class="navigation-body-header">
                <!-- MAIN HEADER LOGO -->
                <div class="navigation-logo">
                    <!-- MAIN HEADER LOGO LINK -->
                    <a class="site-logo" href="<?php echo base_url();?>">
                        <!-- MAIN HEADER RESPONSIVE LOGO IMAGE-->
                        <img loading="lazy"  src="<?php echo base_url();?>front_assets/images/logo.png" alt="logo" width="150">

                        <!-- /MAIN HEADER RESPONSIVE LOGO IMAGE-->

                    </a>
                    <!-- /MAIN HEADER LOGO LINK -->
                </div>
                <!-- /MAIN HEADER LOGO -->
                <!-- MAIN HEADER RESPONSIVE BUTTON-CLOSE ICON -->
                <span class="navigation-body-close-button">&#10005;</span>
                <!-- /MAIN HEADER RESPONSIVE BUTTON-CLOSE ICON -->
            </div>
            <!-- /MAIN HEADER BODY HEADER -->
            <!-- MAIN HEADER MENU -->
            <ul class="navigation-menu">
                <!-- MAIN HEADER MENU ITEM -->
                 <!-- <li class="navigation-item">
                    <a class="navigation-link" href="<?php echo base_url();?>">Home</a>

                </li> -->
                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="<?php echo base_url();?>about-us">About</a>

                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>
                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="<?php echo base_url();?>business-networking">Business Networking</a>

                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>
                <!-- /MAIN HEADER MENU ITEM -->
                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="#">Business Services</a>
                    <ul class="navigation-dropdown">
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url();?>property">Properties
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url();?>project-development">Project Development
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                        <li class="navigation-dropdown-item" style="display:none;">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url();?>digital-currency">Digital Currency
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url();?>turbine-plant">Turbine Management
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>

                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url();?>franchise">Franchise
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>


                    </ul>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>

                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="#">E-Shop</a>
                        <ul class="navigation-dropdown">

                        <?php
                        // $categories = categories();
                        // foreach($categories as $key => $category){
                        //     echo' <li class="navigation-dropdown-item">
                        //             <a class="navigation-dropdown-link" href="'.base_url($category->id).'">'.$category->category_name.'
                        //                 <svg class="crumina-icon arrow-right" width="12" height="10">
                        //                     <use xlink:href="#icon-arrow-right"></use>
                        //                 </svg>
                        //             </a>
                        //         </li>';
                        // }
                        // echo'<pre>';
                        // print_r($categories);
                        // echo'</pre>';
                        ?>
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url();?>organic-products">Organic Products
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url();?>ecommerce">E-Shopping
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>

                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url();?>manage-stockist">Manage Stockist
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>

                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url();?>repurchase-order">Repurchase Order
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>

                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url();?>digital-money">Digital Money
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>

                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url();?>logistics">Logistics
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>


                        </ul>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>


                <li class="navigation-item">
					<!-- MAIN HEADER MENU ITEM LINK -->
					<a class="navigation-link" href="#">E-Health</a>
					<ul class="navigation-dropdown">
					    <li class="navigation-dropdown-item">
							<!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
							<a class="navigation-dropdown-link" href="<?php echo base_url();?>doctor-list">Online Doctors
								<svg class="crumina-icon arrow-right" width="12" height="10">
									<use xlink:href="#icon-arrow-right"></use>
								</svg>
							</a>
							<!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
						</li>
						<li class="navigation-dropdown-item">
							<!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
							<a class="navigation-dropdown-link" href="<?php echo base_url();?>counselor">Online Counselors
								<svg class="crumina-icon arrow-right" width="12" height="10">
									<use xlink:href="#icon-arrow-right"></use>
								</svg>
							</a>
							<!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
						</li>
						<li class="navigation-dropdown-item">
							<!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
							<a class="navigation-dropdown-link" href="<?php echo base_url();?>alternative-medicine">Alternative Medicine
								<svg class="crumina-icon arrow-right" width="12" height="10">
									<use xlink:href="#icon-arrow-right"></use>
								</svg>
							</a>
							<!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
						</li>
					</ul>
				</li>

               <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="<?php echo base_url();?>">Purchase</a>
                        <ul class="navigation-dropdown">
                        <li class="navigation-dropdown-item">
							<!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
							<a class="navigation-dropdown-link" href="<?php echo base_url('epin_purchase');?>">E-Pin
								<svg class="crumina-icon arrow-right" width="12" height="10">
									<use xlink:href="#icon-arrow-right"></use>
								</svg>
							</a>
							<!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
						</li>
                        <li class="navigation-dropdown-item">
							<!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
							<a class="navigation-dropdown-link" href="<?php echo base_url('wallet_fund_purchase');?>">Fund Wallet
								<svg class="crumina-icon arrow-right" width="12" height="10">
									<use xlink:href="#icon-arrow-right"></use>
								</svg>
							</a>
							<!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
						</li>
                         <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url('other_fund_purchase');?>">Other Payment
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>

					</ul>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>
                <!-- MAIN HEADER MENU ITEM -->


               <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="<?php echo base_url();?>">Gallery</a>
                        <ul class="navigation-dropdown">
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url('front/banners');?>">Banners
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url('front/pictures');?>">Pictures
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                         <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url('front/latest_news');?>">Latest News
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                         <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url('front/old_news');?>">Old News
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                         <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url('front/inspirations');?>">Inspirations
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                         <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url('front/promotions');?>">Promotions
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url('front/videos');?>">Videos
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>
                        <li class="navigation-dropdown-item">
                            <!-- MAIN HEADER MENU DROPDOWN ITEM LINK -->
                            <a class="navigation-dropdown-link" href="<?php echo base_url('front/downloads');?>">Download
                                <svg class="crumina-icon arrow-right" width="12" height="10">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
                            </a>
                            <!-- /MAIN HEADER MENU DROPDOWN ITEM LINK -->
                        </li>

                    </ul>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>
                <!-- MAIN HEADER MENU ITEM -->

                <li class="navigation-item">
                    <!-- MAIN HEADER MENU ITEM LINK -->
                    <a class="navigation-link" href="<?php echo base_url();?>contact-us">Contacts</a>
                    <!-- /MAIN HEADER MENU ITEM LINK -->
                </li>
                <!-- /MAIN HEADER MENU ITEM -->
            </ul>
            <!-- /MAIN HEADER MENU -->
            <!-- MAIN HEADER ADDITIONAL MENU -->
            <div class="navigation-body-section navigation-additional-menu">

                <!-- MAIN HEADER ADDITIONAL MENU BUTTON -->



                <!-- /MAIN HEADER ADDITIONAL MENU BUTTON -->



                <!-- MAIN HEADER SHOP CART -->

                <!-- /MAIN HEADER SHOP CART -->


                <!-- MAIN HEADER SEARCH -->

                <div class="navigation-search" data-toggle="modal" data-target="#popup-search" style="display:none">



                    <!-- MAIN HEADER SEARCH ICON -->

                    <svg class="crumina-icon" width="25" height="25">

                        <use xlink:href="#icon-search"></use>

                    </svg>

                    <!-- /MAIN HEADER SEARCH ICON -->



                </div>

                <!-- /MAIN HEADER SEARCH -->



            </div>

            <!-- /MAIN HEADER ADDITIONAL MENU -->





        </div>

        <!-- MAIN HEADER BODY -->



    </div>

    <!-- /MAIN HEADER CONTAINER -->



    <div class="user-menu" style="display:none">

        <a href="https://xbulon.com/user/auth/" class="user-menu-content">

            <span></span>

            <span></span>

            <span></span>

        </a>

    </div>

</nav>

<script>
    // $(document).on('click','#showCart',function(){
    //     $.get('<?php echo base_url("front/get_cart_products")?>',function(res){
    //         console.log('cart products ',res)
    //         let total_price = 0;
    //         $('#cartProductsList').html('');
    //         $.each(res,function(key,value){
    //             total_price = total_price + (value.old_price * value.quantity)
    //             $('#cartProductsList').append('<div class="cart-popup-item">'+
    //             '<img loading="lazy"  src="<?php echo base_url('product_images');?>/'+value.product_image+'" class="cart-popup-item-thumb" alt="product" style="max-width:45%">'+
    //             '<div class="cart-popup-item-content">'+
    //             '<a href="#" class="cart-popup-item-title">'+value.title+'</a>'+
    //             '<div class="price"><span class="count">'+value.quantity+'</span> x'+
    //             '<span class="">$'+value.old_price+'</span>'+
    //             '</div>'+
    //             '</div>'+'</div>')
    //         })
    //         $('#TotalPrice').text('$'+total_price)
    //     },'json')
    // })

</script>
<!-- /MAIN HEADER -->

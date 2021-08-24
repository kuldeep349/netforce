<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('common/header'); ?>
</head>
<body>
<!-- MAIN HEADER -->
<?php $this->load->view('top-nav'); ?>
<!-- RIGHT MENU -->

<!-- /SEARCH POPUP -->
<!-- MAIN CONTENT WRAPPER -->
<div class="main-content-wrapper">
	<!-- STUNNING HEADER -->
	<section class="crumina-stunning-header section-image-bg-dark">
		<div class="container">
			<!-- STUNNING HEADER CONTENT -->
			<div class="stunning-header-content align-center">
				<!-- PAGE TITLE -->
				<h1 class="page-title text-white">NetForce Cart Details</h1>
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
							<span>Cart Details</span>
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
                <div class="CartBox" style="border :1px solid #000;width:100%;padding:15px;">
                    <h2>You Have <?php echo count($cart);?> Items In Your Cart</h2>
					<a href="<?php echo base_url('organic-products');?>" class="pull-right btn btn-success">Add more</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th></th>
                             </tr>
                        <thead>
                        <tbody>
                            <?php
							$sub_total = 0;
                            foreach($cart as $k => $c){
								if(!empty($c['product_id'])){
									echo'<tr>';
									echo'<td>'.$c['title'].'</td>';
									echo'<td>$'.$c['old_price'].'</td>';
									echo'<td>'.$c['quantity'].'</td>';
									echo'<td>$'.($c['quantity'] * $c['old_price']).'</td>';
									echo'<td><div class="cartButtons" data-product_id="'.$c['product_id'].'" data-product_type="organic">';
										echo'<img class="loader" src="'.base_url('product_images/loader.gif').'">';
										echo'<button class="plus-btn plusBtn" type="button">+</button>';
										echo'<input type="number" style="width:30%" class="cartQuanity" value="'.$c['quantity'].'" readonly>';
										echo'<button class="minus-btn minusBtn" type="button">-</button>';
										echo'</div></td>';
									echo'</tr>';
									$sub_total = $sub_total + ($c['quantity'] * $c['old_price']);
								}
                                
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
			</div>
            <hr>
            <div class="row">
                <div class="col-md-6" style="border :1px solid #000;width:100%;padding:15px;">
                    <h2>Calculate Shipping</h2>
                    <div class="form-group">
					<?php //$countries = shipping_charges_list(); ?>
                        <select class="form-control" placeholder="Select a Country" id="countryDropdown" onChange="calculate_shipping()">
							<option value="">Choose Country</option>
							<?php
							foreach($countries as $k => $country)
								echo '<option value="'.$country['id'].'" data-amount="'.$country['shipping_charges'].'" '.($country['id'] == $shipping['country_id'] ? 'selected' : '').'>'.$country['name'].' ($'.$country['shipping_charges'].')</option>';
							?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6" style="border :1px solid #000;width:100%;padding:15px;">
                    <h2>Cart Details</h2>
                    <div class="row text-center">
                        <div class="col-md-6">
                            Subtotal
                        </div>
                        <div class="col-md-6">
                            $<?php echo $sub_total;?>
                        </div>
                        <hr>
                        <div class="col-md-6">
                            Shipping
                        </div>
                        <div class="col-md-6" id="shippingCharges">
							<?php 
							if(!empty($country['shipping_charges'])){
								echo '$'.$shipping['shipping_charges'];
							}else{
								echo'Change Country/Location to calculate shipping Charges';
							}
							?>
                            
                        </div>
                        <hr>
                        <div class="col-md-6">
                            Total
                        </div>
                        <div class="col-md-6">
                            $<?php echo $sub_total + (!empty($shipping['shipping_charges']) ? $shipping['shipping_charges'] : 0);?>
                        </div>
                        <div class="col-md-6">
                            <a  class="form-control" href="<?php echo base_url('/join-us');?>" style="background: #7be87f;">REGISTER to buy on discount</a>
                        </div>
                        <div class="col-md-6">
                        <a href="<?php echo base_url('/front/checkout');?>" class="form-control" style="background: #7be87f;">CHECKOUT</a>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
		</div>
	</section>

	<!-- BACK TO TOP -->

	<div class="back-to-top">

		<svg class="crumina-icon">

			<use xlink:href="#icon-back-to-top"></use>

		</svg>

	</div>

	<!-- /BACK TO TOP -->



</div>
<script>
	var url = "<?php echo base_url('front/add_product_to_cart/'); ?>";
	$(document).on('click','.plusBtn',function(){
		var cart_quantity = parseInt($(this).parent('.cartButtons').find('.cartQuanity').val()) + 1;
		var t =  $(this);
		let formData = {
			product_id : $(this).parent('.cartButtons').data('product_id'),
			product_type : $(this).parent('.cartButtons').data('product_type'),
			quantity : cart_quantity
		}
		// $(this).parent('.cartButtons').find('.loader').css('display','block');
		$.post(url,formData,function(res){
			if(res.success == 1){
				t.parent('.cartButtons').find('.cartQuanity').val(cart_quantity)
				// t.parent('.cartButtons').find('.loader').css('display','none');
				location.reload();
			}else{
				alert(res.message)
				// t.parent('.cartButtons').find('.loader').css('display','none');
			}
		},'json');
	})
	$(document).on('click','.minusBtn',function(){
		var cart_quantity = parseInt($(this).parent('.cartButtons').find('.cartQuanity').val()) - 1;
		var t =  $(this);
		if(cart_quantity >= 0){
			let formData = {
				product_id : $(this).parent('.cartButtons').data('product_id'),
				product_type : $(this).parent('.cartButtons').data('product_type'),
				quantity : cart_quantity
			}
			// $(this).parent('.cartButtons').find('.loader').css('display','block');
			$.post(url,formData,function(res){
				if(res.success == 1){
				t.parent('.cartButtons').find('.cartQuanity').val(cart_quantity)
				// t.parent('.cartButtons').find('.loader').css('display','none');
				location.reload();
			}else{
				alert(res.message)
				// t.parent('.cartButtons').find('.loader').css('display','none');
			}
			},'json');
		}
	})
	function calculate_shipping(){
		var shipping_charges = $('#countryDropdown').find(':selected').data('amount');
		var country_charges = $('#countryDropdown').find(':selected').text();
		$('#shippingCharges').text('$ ' + shipping_charges)
		alert($('#countryDropdown').val())
		var url = '<?php echo base_url('front/Visitor_shopping/set_shipping_country');?>';
		var country_id = $('#countryDropdown').val();
		$.post(url,{country_id : country_id , shipping_charges :shipping_charges , country_charges : country_charges },function(res){
			console.log(res)
			location.reload();
		},'json')
	}
</script>
<!-- /MAIN CONTENT WRAPPER -->
<?php $this->load->view('common/footer'); ?>
<!-- /FOOTER -->
<?php $this->load->view('common/footer-script'); ?>
</body>
</html>
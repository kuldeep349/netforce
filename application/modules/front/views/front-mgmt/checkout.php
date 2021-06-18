<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('common/header'); ?>
</head>
<body>
<!-- MAIN HEADER -->
<?php $this->load->view('top-nav'); ?>
<!-- RIGHT MENU -->
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  /* border: 1px solid #ccc; */
  background-color: #f1f1f1;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  /* height: 300px; */
}
</style>
<!-- /SEARCH POPUP -->
<!-- MAIN CONTENT WRAPPER -->
<div class="main-content-wrapper">
	<!-- STUNNING HEADER -->
	<section class="crumina-stunning-header section-image-bg-dark">
		<div class="container">
			<!-- STUNNING HEADER CONTENT -->
			<div class="stunning-header-content align-center">
				<!-- PAGE TITLE -->
				<h1 class="page-title text-white">Xbulon Cart Details</h1>
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
            <form id="formBtn" enctype="multipart/form-data">
			    <div class="row">
                    <div class="tab">
                        <button class="tablinks" type="button" onclick="openCity(event, 'Cart')" id="defaultOpen">Cart Details</button>
                        <button class="tablinks" type="button" onclick="openCity(event, 'Shipping')" id="">Shipping Address</button>
                        <button class="tablinks" type="button" >Review Payment</button>
                        <button class="tablinks" type="button" onclick="openCity(event, 'Payment')" id="openPayment" style="display:none;">Review Payment</button>
                    </div>

                    <div id="Cart" class="tabcontent">
                            <div class="CartBox">
                                <h2>You Have <?php echo count($cart);?> Items In Your Cart</h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    <thead>
                                    <tbody>
                                        <?php
                                        $sub_total = 0;
                                        foreach($cart as $k => $c){
                                            echo'<tr>';
                                            echo'<td>'.$c['title'].'</td>';
                                            echo'<td>$'.$c['old_price'].'</td>';
                                            echo'<td>'.$c['quantity'].'</td>';
                                            echo'<td>$'.($c['quantity'] * $c['old_price']).'</td>';
                                            echo'</tr>';
                                            $sub_total = $sub_total + ($c['quantity'] * $c['old_price']);
                                        }
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Subtotal
                                                    </div>
                                                    <div class="col-md-6">
                                                        $<?php echo $sub_total;?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        Shipping
                                                    </div>
                                                    <div class="col-md-6">
                                                        $<?php echo (!empty($shipping['shipping_charges']) ? $shipping['shipping_charges'] : 0)?>
                                                    </div>
                                                    <hr>
                                                    <div class="col-md-6">
                                                        Total
                                                    </div>
                                                    <div class="col-md-6">
                                                        $<?php echo $sub_total + (!empty($shipping['shipping_charges']) ? $shipping['shipping_charges'] : 0);?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>

                    <div id="Shipping" class="tabcontent">
                        <h3>Shipping Address</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="text" name="first_name" id="first_name" value="" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name * </label>
                                    <input type="text" name="last_name" id="last_name" value="" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Company Name  (optional)</label>
                                    <input type="text" name="company_name" id="company_name" value="" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Country / Region * <?php echo $shipping['country_charges'];?> <a href="<?php echo base_url('front/cart');?>">Change region</a></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Street Address *</label>
                                    <input type="text" name="street_address" id="street_address" value="" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Town/City *</label>
                                    <input type="text" name="city" id="city" class="form-control" value="" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Province/State *</label>
                                    <input type="text" name="state" id="state" class="form-control" value="" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Postcode / ZIP *</label>
                                    <input type="text" name="postal_code" id="postal_code" class="form-control" value="" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Phone *</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email address *</label>
                                    <input type="text" name="email" id="email" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="text" id="formContinue" class="form-control btn-success btn">
                                        CONTINUE
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="Payment" class="tabcontent">
                        <h3>Review Payments</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    <thead>
                                    <tbody>
                                        <?php
                                        $sub_total = 0;
                                        foreach($cart as $k => $c){
                                            echo'<tr>';
                                            echo'<td>'.$c['title'].'</td>';
                                            echo'<td>$'.$c['old_price'].'</td>';
                                            echo'<td>'.$c['quantity'].'</td>';
                                            echo'<td>$'.($c['quantity'] * $c['old_price']).'</td>';
                                            echo'</tr>';
                                            $sub_total = $sub_total + ($c['quantity'] * $c['old_price']);
                                        }
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Subtotal
                                                    </div>
                                                    <div class="col-md-6">
                                                        $<?php echo $sub_total;?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        Shipping
                                                    </div>
                                                    <div class="col-md-6">
                                                        $<?php echo (!empty($shipping['shipping_charges']) ? $shipping['shipping_charges'] : 0)?>
                                                    </div>
                                                    <hr>
                                                    <div class="col-md-6">
                                                        Total
                                                    </div>
                                                    <div class="col-md-6">
                                                        $<?php echo $sub_total + (!empty($shipping['shipping_charges']) ? $shipping['shipping_charges'] : 0);?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">First Name :
                                        </div>
                                        <div class="col-md-6">
                                        <input type="text" id="disp_first_name" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <label> </label>
                                    <label>Last Name : </label><input type="text" id="disp_last_name" class="form-control" readonly>
                                    <label>Country / Region : <?php echo $shipping['country_charges'];?></label>
                                    <label>Street Address : </label><input type="text" id="disp_address" class="form-control" readonly>
                                    <label>Town/City : </label><input type="text" id="disp_city" class="form-control" readonly>
                                    <label>Province/State : </label><input type="text" id="disp_state"class="form-control" readonly>
                                    <label>Postcode / ZIP  : </label><input type="text" id="disp_postal_code" class="form-control" readonly>
                                    <label>Phone : </label><input type="text" id="disp_phone" class="form-control" readonly>
                                    <label>Email address : </label><input type="email" id="disp_email" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Bank Details</h4>
                                    <p>
                                        Account Name: Xbulon Network<br>
                                        Bank: Zenith Bank<br>
                                        Account Number: 1017541942<br>
                                    </p>
                                <input type="file" name="bank_wire_proof_image" class="form-control"/>
                                <input type="radio" name="payment_method" value="bank_wire" checked/>Bank Wire
                                <input type="radio" name="payment_method" value="debit_card"/>Debit Card
                                <input type="submit" class="btn-success"> 
                                <!-- <input type="submit" name="payment_method" value="bank_wire" class="btn-dark" value="Pay Via Bank Wire">  -->
                                <!-- <input type="submit" name="payment_method" class="btn-success" value="Debit Card">  -->
                                    <br>
                                    <br>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- <hr> -->
		</div>
	</section>

	<!-- BACK TO TOP -->

	<div class="back-to-top">

		<svg class="crumina-icon">

			<use xlink:href="#icon-back-to-top"></use>

		</svg>

	</div>

	<!-- /BACK TO TOP -->

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

$(document).on('click','#formContinue',function(e){
    e.preventDefault();
    var formData = $('#formBtn').serialize();
    console.log(formData);
    if($('#first_name').val() == ''){
        alert('Please Fill your First Name');
        return;
    }
    if($('#first_name').val() == ''){
        alert('Please Fill your First Name');
        return;
    }
    if($('#last_name').val() == ''){
        alert('Please Fill your Last Name');
        return;
    }
    if($('#street_address').val() == ''){
        alert('Please Fill your Address');
        return;
    }
    if($('#city').val() == ''){
        alert('Please Fill your City');
        return;
    }
    if($('#state').val() == ''){
        alert('Please Fill your State');
        return;
    }
    $('#disp_first_name').val($('#first_name').val())
    $('#disp_last_name').val($('#last_name').val())
    // $('#disp_country').val($('#country').val())
    $('#disp_address').val($('#street_address').val())
    $('#disp_city').val($('#city').val())
    $('#disp_state').val($('#state').val())
    $('#disp_postal_code').val($('#postal_code').val())
    $('#disp_phone').val($('#phone').val())
    $('#disp_email').val($('#email').val())
    document.getElementById("openPayment").click();
})

$(document).on('submit','#formBtn',function(e){
    e.preventDefault();
    var formData = new FormData(this);
    console.log(formData)
    var url = '<?php echo base_url('front/Visitor_shopping/create_visitor_order');?>';
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success:function(data){
            console.log(data)
            data = JSON.parse(data)
            alert(data.message)
            if(data.success == 1)
            {
                location.reload()
            }
            // else if(data=='no')
            // {
            //     alert('Error! Record not inserted successfully')
            // }
            // else
            // {
            //     alert('Error! Try again');
            // }
        }
    });
})
</script>

</div>
<!-- /MAIN CONTENT WRAPPER -->
<?php $this->load->view('common/footer'); ?>
<!-- /FOOTER -->
<?php $this->load->view('common/footer-script'); ?>
</body>
</html>
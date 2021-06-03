<!-- JS-scripts for Header Main Navigation -->
<script src="<?php echo base_url();?>front_assets/js/js-plugins/navigation.min.js" defer></script>
<!-- /JS-scripts for Header Main Navigation -->
<!-- JQuery -->
<script src="<?php echo base_url();?>front_assets/js/jquery-3.4.1.min.js"></script>
<!-- /JQuery -->
<!-- JS-scripts Bootstrap -->
<script src="<?php echo base_url();?>front_assets/js/Bootstrap/bootstrap.bundle.min.js"></script>
<!-- JS-scripts Bootstrap -->
<!-- JS-scripts Waypoints -->
<script src="<?php echo base_url();?>front_assets/js/js-plugins/waypoints.js"></script>
<!-- JS-scripts Waypoints -->
<!-- JS-scripts for Main Slider -->
<script src="<?php echo base_url();?>front_assets/js/js-plugins/imagesloaded.pkgd.min.js"></script>
<!-- /JS-scripts for Main Slider -->
<!-- JS-scripts custom Crumina select -->
<script src="<?php echo base_url();?>front_assets/js/js-plugins/select2.min.js"></script>
<!-- /JS-scripts custom Crumina select -->
<!-- JS-scripts for Sliders -->
<script src="<?php echo base_url();?>front_assets/js/js-plugins/swiper.min.js"></script>
<!-- /JS-scripts for Sliders -->
<!-- JS-scripts for ANIMATION -->
<script src="<?php echo base_url();?>front_assets/js/js-plugins/anime.min.js"></script>
<!-- /JS-scripts for ANIMATION -->
<!-- MAIN JS -->
<script src="<?php echo base_url();?>front_assets/js/main.js"></script>
<!-- /MAIN JS -->
<!-- SVG icons loader -->
<script src="<?php echo base_url();?>front_assets/js/svg-loader.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<!-- /SVG icons loader -->
<script>
 w3.displayObject("id01", myObject);
</script>
<script type="text/javascript">
 function payWithPaystack(email,amount,mobile) {
 	var handler = PaystackPop.setup({ 
        key: 'pk_test_645a1b7aab4340e01fe2954861a3019c53ae634c', //put your public key here
        email: email, //put your customer's email here
        amount: amount, //amount the customer is supposed to pay
        metadata: {
            custom_fields: [
                {
                    display_name: "Mobile Number",
                    variable_name: "mobile_number",
                    value: mobile //customer's mobile number
                }
            ]
        },
        callback: function (response) {
            //after the transaction have been completed
            //make post call  to the server with to verify payment 
            //using transaction reference as post data
            $.post("<?php echo base_url();?>front/Doctor_controllers/payDocAppointment", {reference:response.reference}, function(status){
                if(status == "success")
                    //successful transaction
                    alert('Transaction was successful');
                else
                    //transaction failed
                    alert(response);
            });
        },
        onClose: function () {
            //when the user close the payment modal
            alert('Transaction cancelled');
        }
    });
    handler.openIframe(); //open the paystack's payment modal
}
	$(document).on('submit','.doctor-book-appointment',function(e)
	{
		var email=$('#email').val();
		var amount=Math.ceil($('#doctor_fee').val()*100);
		var phone=$('#phone').val();
		 $.ajax({
            url: '<?php echo base_url();?>front/Doctor_controllers/bookDocAppointment',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false
           }).done(function(response){
               if (response==1){
                   payWithPaystack(email,amount,phone);
               }else {
                alert('went wrong');
               }
           });
        return false;
	});
</script>
<!-- Main content -->
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header page-header-default">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Eshop</span> - Product</h4>
         </div>
         <div class="heading-elements">
            <div class="heading-elements">
            
                     </div>
         </div>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
            <li><a href="#">Eshop</a></li>
            <li class="active">Product</li>
         </ul>
         
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">
      <!-- Daterange picker -->
      <!-- /daterange picker -->
      <div class="row">
         <?php 
                  if(!empty($this->session->flashdata('flash_msg')))
                  {
                  ?>
               <div class="alert alert-success alert-styled-right alert-arrow-right alert-bordered">
                  <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                  <?php echo $this->session->flashdata('flash_msg');?>
               </div>
               <?php    
                  }
                  if(!empty($this->session->flashdata('error_msg')))
                  {
                  ?>
               <div class="alert alert-danger alert-styled-right alert-arrow-right alert-bordered">
                  <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                  <?php echo $this->session->flashdata('error_msg');?>
               </div>
               <?php    
                  }
         
                  ?>
		 <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">Paystack Payment</h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                     <li><a data-action="reload"></a></li>
                     <li><a data-action="close"></a></li>
                  </ul>
               </div>
            </div>
            <div class="panel-body">
                <div class="col-md-4">				
				  <form action="<?php echo site_url();?>user/eshop/paystackPayment/" method="POST" >  
				  <script 
				  src="https://js.paystack.co/v1/inline.js" 
				  data-key="<?php echo TEST_PUBLIC_KEY; ?>" 
				  data-email="<?php echo $email; ?>" 
				  data-amount="<?php echo $this->session->userdata('cart_final_price')*TEST_PUBLIC_RATE*100; ?>"  
				  data-ref="<?php echo generateReferenceNo(); ?>"> 
				  </script>
				  </form>
				  </div>    
               								
            </div>
        </div>
		
      </div>
      <!-- Footer -->
      <?php $this->load->view('common/footer-text') ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
<!-- /main content -->
<script>
function proceedtopay()
{
    var payment_mode= $("input[name='payment_mode']:checked"). val();
    window.location.href='<?php echo site_url().$module_name."/eshop/generateInvoice/";?>'+payment_mode;
}
function proceedtopay1()
{
    var payment_mode= $("input[name='payment_mode']:checked"). val();
    if(payment_mode=='ewallet')
    {
    window.location.href='<?php echo site_url().$module_name."/eshop/ewalletPayment/";?>';
    }
    if(payment_mode=='paytm')
    {
    window.location.href='<?php echo site_url().$module_name."/eshop/paytmPayment/";?>';
    }
}
function addtocart(query)
{
    $.ajax({
   url:"<?php echo base_url().$module_name; ?>/eshop/addToCart",
   method:"POST",
   data:{query:query},
   success:function(response){
       $('#result').html(response);
       $('#finalResult').hide();
   }
  })
}
function removefromcart(query)
{
    //alert(query);
    $.ajax({
   url:"<?php echo base_url().$module_name; ?>/cart/removeItemFromCart",
   method:"POST",
   data:{query:query},
   success:function(response){
       //$('#result').html(response);
       window.location=response;
   }
  })
}
function updatecart(query,qty)
{
    alert(query+'--'+qty);
    $.ajax({
   url:"<?php echo base_url().$module_name; ?>/cart/updateItemInCart",
   method:"POST",
   data:{query:query,qty:qty},
   success:function(response){
       //$('#finalResult').html(response);
        window.location=response;
   }
  })
}
$(document).ready(function(){

 //load_data();

 function load_data(query)
 {
     $('#finalResult').show();
  $.ajax({
   url:"<?php echo base_url().$module_name; ?>/eshop/fetchProducts",
   method:"POST",
   data:{query:query},
   success:function(response){
       //alert(response)
       $('#finalResult').html(response);
    //$('#result').html(data);
   
   }
  })
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});

</script>
<script>

function deleteConfirm(){

   if(window.confirm('Are you sure, you want to delete the member'))
   {
      return true;
   }
   else
   {
      return false;
   }
}

</script>
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
               <div class="alert alert-success alert-styled-right alert-arrow-right alert-bordered">
                  <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                  <?php echo $this->session->flashdata('error_msg');?>
               </div>
               <?php    
                  }
         
                  ?>
		 
		 <div class="panel panel-flat">
            
            <div class="panel-heading">

               <h5 class="panel-title">View All Product</h5>
              
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                     <li><a data-action="reload"></a></li>
                     <li><a data-action="close"></a></li>
                  </ul>
               </div>
            </div>
             <div class="form-group">
   <!-- <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Product Name Or SKU" class="form-control" />
     
    </div>-->
    <ul id="finalResult"></ul>
   </div>
   <br />
   <div id="result">
       <?php echo $cartlistdetail;?>
   </div>
   
   <style>
        

        #finalResult {
            position:relative;
            margin: 0px;
             padding-left: 0px;
        }

       #finalResult  li {
           cursor:pointer;
            list-style: none;
            background-color: lightgray;
            margin: 1px;
            padding: 1px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
        }
         #finalResult  li:hover{
             color:blue;
         }
    </style>
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
    //var payment_mode= $("input[name='payment_mode']:checked"). val();
    window.location.href='<?php echo site_url().$module_name."/eshop_welcome/generateInvoice/ewallet";?>';
}
function proceedtopay1()
{
    var payment_mode= $("input[name='payment_mode']:checked"). val();
    var center_leader=$("#center_leader").val();
    // check center leader is mandatory
    
    if(payment_mode=='ewallet')
    {
    window.location.href='<?php echo site_url().$module_name."/eshop_welcome/ewalletPayment/";?>'+center_leader;
    }
    if(payment_mode=='paytm')
    {
    window.location.href='<?php echo site_url().$module_name."/eshop_welcome/paytmPayment/";?>';
    }
}
function addtocart(query)
{
    $.ajax({
   url:"<?php echo base_url().$module_name; ?>/eshop_welcome/addToCart",
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
   url:"<?php echo base_url().$module_name; ?>/cart_welcome/removeItemFromCart",
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
   //alert(query+'--'+qty);
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
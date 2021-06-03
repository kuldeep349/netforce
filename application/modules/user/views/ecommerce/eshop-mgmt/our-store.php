<script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/dashboard.js"></script>
<!-- Main content -->
<div class="content-wrapper">
    <style>
        .img-responsiv {
            width:100;
            height:auto;
        }
    </style>
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
         </div>
         <div class="heading-elements">
            <div class="heading-btn-group">
               <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
               <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
               <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
            </div>
         </div>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="home.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Dashboard</li>
         </ul>
         <ul class="breadcrumb-elements">
            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <i class="icon-gear position-left"></i>
               Settings
               <span class="caret"></span>
               </a>
               <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#"><i class="icon-user-lock"></i> This Week Registered</a></li>
                  <li><a href="#"><i class="icon-statistics"></i> This Month Registered</a></li>
                  <li><a href="#"><i class="icon-accessibility"></i> This Year Registered</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-gear"></i> View All Member</a></li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">
      <!-- Main charts -->
      
          <?php
          //pr($all_category);
          foreach($all_category as $key=>$val)
          {
          $all_products=$controller->productslist($val->id);
                     if(count($all_products)>0)
                     {
              ?>
              <div class="row">
              <h3 class="modtitle">
                        <span><?php echo $val->category_name;?></span>
                     </h3>
                     <?php
                     
                     foreach($all_products as $keyp=>$product)
                     {
                         if(file_exists("product_images/".$product['product_image']))
                         {
                             $product_image=$product['product_image'];
                         }
                         else
                         {
                             $product_image='img-default.gif';
                         }
                     ?>
                     
              <div class="col-sm-6 col-md-4">
            <div class="panel panel-body ">
               <div class="media no-margin">
                   
                   <div class="img-responsive">
                      <img data-sizes="auto" src="<?php echo base_url();?>product_images/<?php echo $product_image;?>" alt="<?php echo $product['title'];?>" class="lazyload img-responsive">
                     
                  </div>
                   
                   
                  <div class="media-body">
                     <h3 class="no-margin"><?php echo $product['title'];?></h3>
                     <span class="text-uppercase"><?php echo currency().$product['new_price'];//if($product['qty']){ echo "<samp>Available</samp>";}else{ echo "<samp>Out Of Stock</samp>";} ?></span>
                  </div>
                  
                  <div class="media-footer">
                      <button type="button" class ="btn btn-primary" onclick="loadDoc(<?php echo $product['id'];?>);">Add To Cart</button>
                  </div>
               </div>
            </div>
         </div>
         <?php
                }
            echo "</div>";
                     }
                     else
                     {
                         ?>
                         <?php
                     }
          }
          ?>
         
      
	
    
      <!-- Footer -->
      <?php $this->load->view('common/footer-text') ?>
      <!-- /footer -->
   </div>
   
   <!-- /content area -->
</div>
<!-- /main content -->
<script>
   function loadDoc(product_id) 
   {
   url='<?php echo site_url();?>user/cart/addToCart/'+product_id+'/'+'eshop';
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() 
     {
      if (this.readyState == 4 && this.status == 200) 
     {
   		
         window.location=this.responseText;
       }
     };
     xhttp.open("GET", url, true);
     xhttp.send();
   }
</script>
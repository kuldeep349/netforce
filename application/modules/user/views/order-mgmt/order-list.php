<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Eshop Management</span> - <?php echo $title;?></h4>
         </div>
         
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active"><a href="#">Eshop Management</a></li>
            <li class="active"><?php echo $title; ?></li>
         </ul>
         <ul class="breadcrumb">
         </ul>
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">
     
      <div class="row">
         <div class="panel panel-flat">
            
            <div class="panel-heading">

               <h5 class="panel-title"><?php echo $title;?></h5>
              
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                     <li><a data-action="reload"></a></li>
                     <li><a data-action="close"></a></li>
                  </ul>
               </div>
            </div>
            
            <table class="table datatable-responsive table-bordered table-striped table-hover">
               <thead>
                  <tr>
				     <th>&nbsp;</th>
                     <th>Sr.No</th>
					 <th>Title</th>					                 
                     <th>Image</th>
					 <th>New Price</th>
					 <th>Sold Quantity</th>
                     
                     
                  </tr>
               </thead>
               <tbody>
                  <?php 
				  
                  if(!empty($total_data) && count($total_data)>0)
                  {
                     $sno=0;
                     foreach ($total_data as $product_id=>$qty) 
                     {
                     $sno++;  
                     
					 $prod_data=getProductDetail($product_id);
					 				   
                  ?>
                  <tr>
                     <td></td>
                     <td><?php echo $sno;?></td>
                     <td><?php echo $prod_data['title'];?></td>
                     <td><img src="<?php echo base_url(); ?>product_images/<?php echo $prod_data['product_image'];?>" width='130' /></td>
					 <td><?php echo  currency().' '.$prod_data['new_price'];?></td>
					 <td><?php echo  $qty;?></td>
					
                     
                  </tr>
                  <?php    
                     }
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
      
      
      <?php 
         $this->load->view('common/footer-text');
         ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
<script>
   function deleteConfirm()
   {
   
   	if(window.confirm("Are you sure, you want to delete"))
       return true;
     else 
       return false;
   }
</script>
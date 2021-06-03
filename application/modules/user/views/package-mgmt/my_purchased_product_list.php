<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Product Management</span> - <?php echo $title;?></h4>
         </div>
         
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active"><a href="#">Product Management</a></li>
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
	  <?php 
         if(!empty($this->session->flashdata('error_msg')))
         {
         ?>
         <div class="col-md-12">
            <div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
               <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
               <?php echo $this->session->flashdata('error_msg');?>
            </div>
         </div>
         <?php    
         }
		 ?>
	  <?php 
         if(!empty($this->session->flashdata('flash_msg')))
         {
         ?>
         <div class="col-md-12">
            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
               <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
               <?php echo $this->session->flashdata('flash_msg');?>
            </div>
         </div>
         <?php    
         }
		 ?>
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title"><?php echo $title; ?></h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                     <li><a data-action="reload"></a></li>
                     <li><a data-action="close"></a></li>
                  </ul>
               </div>
            </div>
            <table class="table datatable-responsive">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Invoice No</th>
                     <th>Product Name</th>
                     <th>Product Amount</th>
                     <th>PV</th>
                     <th>Shipment Charge</th>
                     <th>Tax</th>
					 
					 <th>Purchased From</th>
                     <th>Purchased Date</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  if(!empty($purchased_package) && count($purchased_package)>0)
                  {
                     $sno=1;
                     foreach ($purchased_package as $package) 
                     {
                  ?>
                    <tr>
                     <td><?php echo $sno;?></td>
                     <td><?php echo $package->transaction_no;?></td>
                     <td><?php echo $package->title;?></td>
                     <td><?php echo $package->amount.' '.currency();?></td>
                     <td><?php echo $package->pv;?></td>
                     <td><?php echo $package->shipment_charge;?></td>
                     <td><?php echo $package->tax;?></td>
					 
					 <td><?php if($package->from_registration){ echo "Package";}else{ echo "Repurchase";}?></td>
                     <td><?php echo date('M d, Y',strtotime($package->purchase_date));?></td>
                  </tr>
                  <?php
                     $sno++;       
                     }
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
     
      <!-- Footer -->
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
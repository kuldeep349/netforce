<!-- Main content -->
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header page-header-default">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> - Property</h4>
         </div>
         <div class="heading-elements">
            <div class="heading-elements">
            <div class="heading-btn-group">
            <a href="<?php echo site_url().$module_name;?>/Property_management/addPropertyList" class="btn btn-success"><i class="icon-comment-discussion position-left"></i> Add New Property</a>
            </div>
                     </div>
         </div>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Property List</li>
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
             
            <table class="table datatable-responsive table-bordered table-striped table-hover">
               <thead>
                  <tr>
                    <th>Sr.No</th>
					     <th>Title</th>	
					     <th>Image</th>
					     <th>Price</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  if(!empty($property_list) && count($property_list)>0)
                  {
                     $sno=0;
                     foreach ($property_list as $prop) 
                     {
                     $sno++;  
                     $active_status_class=($prop['status']=='1')?'label-success':'label-danger';
                     $active_status_label=($prop['status']=='1')?'Active':'Inactive';
					 				   
                  ?>
                  <tr>
                     <td><?php echo $sno;?></td>
                     <td><?php echo $prop['property_name'];?></td>
                     <td><img src="<?php echo base_url(); ?>property_images/<?php echo $prop['property_image'];?>" width='50' /></td>
					 <td><?php echo $prop['budget'];?></td>
					 <td><span class="label <?php echo $active_status_class;?>"><?php echo $active_status_label;?></span></td>
                     <td><?php echo $prop['created_date'];?></td>
                     <td>
                        <ul class="icons-list">
                           <li>
                              <a href="<?php echo site_url().$module_name;?>/Property_management/editProperty/<?php echo ID_encode($prop['prop_id']);?>" data-popup="tooltip" title="" data-original-title="Edit Property"><i class="icon-pencil7"></i></a>
                           </li>
						   <!--
						   <li>
                              <a onclick='return confirm("Are you sure?");' href="<?php echo site_url().$module_name;?>/eshop/deleteProduct/<?php echo ID_encode($prop['id']);?>" data-popup="tooltip" title="" data-original-title="Delete Product"><i class="icon-trash"></i></a>
                           </li>
						   -->
                           
                        </ul>
                     </td>
                  </tr>
                  <?php    
                     }
                  }
                  ?>
               </tbody>
            </table>
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
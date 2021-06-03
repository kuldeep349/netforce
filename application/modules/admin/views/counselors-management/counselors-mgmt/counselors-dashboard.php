<!-- Main content -->
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header page-header-default">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Austin</span> - Counselors</h4>
         </div>
         <div class="heading-elements">
            <div class="heading-elements">
            <div class="heading-btn-group">
            <a href="<?php echo site_url().$module_name;?>/Counselors_Management/addNewCounselors" class="btn btn-success"><i class="icon-comment-discussion position-left"></i> Add New Counselors</a>
            </div>
                     </div>
         </div>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
            <li><a href="#">Austin</a></li>
            <li class="active">Counselors List</li>
         </ul>
         
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">
      <!-- Daterange picker -->
      <!-- /daterange picker -->
      <div class="row">
         <div class="panel panel-flat">
            
            <div class="panel-heading">

               <h5 class="panel-title">View All Counselors</h5>
              
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                     <li><a data-action="reload"></a></li>
                     <li><a data-action="close"></a></li>
                  </ul>
               </div>
            </div>
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
            <table class="table datatable-responsive table-bordered table-striped table-hover">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>counselors Name</th>
                     <th>counselors Specialization</th>
                     <th>counselors Fee</th>
                     <th>Active Status</th>
                     <th>Date</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  if(!empty($all_doctors) && count($all_doctors)>0)
                  {
                     $sno=0;
                $index=0;
                     foreach ($all_doctors as $doc) 
                     {
                     $sno++;  
                     $active_status_class=($doc['active_status']=='1')?'label-success':'label-danger';
                     $active_status_label=($doc['active_status']=='1')?'Active':'Inactive';
                           
                  ?>
                  <tr>
                     <td><?php echo $sno;?></td>
                     <td><?php echo $doc['counselors_name'];?></td>
                    <td><?php echo $doc['counselors_specialty'];?></td>
                    <td><?php echo $doc['counselors_fee'];?></td>
                    <td><span class="label <?php echo $active_status_class;?>"><?php echo $active_status_label;?></span></td>
                     <td><?php echo $doc['date_time'];?></td>
                     <td>
                        <ul class="icons-list">
                           <li>
                              <a href="<?php echo site_url().$module_name;?>/Counselors_Management/editCounselors/<?php echo ID_encode($doc['counselors_id']);?>" data-popup="tooltip" title="" data-original-title="Edit Doctor"><i class="icon-pencil7"></i></a>
                           </li>
                    
                     <li>
                        <a onclick='return confirm("Are you sure?");' href="<?php echo site_url().$module_name;?>/Counselors_Management/deleteCounselors/<?php echo ID_encode($doc['counselors_id']);?>" data-popup="tooltip" title="" data-original-title="Delete Doctor"><i class="icon-trash"></i></a>
                     </li>
                     
                           
                        </ul>
                     </td>
                  </tr>
                  <?php 
                  $index++;
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
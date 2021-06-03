<!-- Main content -->
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header page-header-default">
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Ticket</li>
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

               <h5 class="panel-title">View All Ticket</h5>
              
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
                   ///print_r($order_data);
                  ?>
            <table class="table datatable-responsive table-bordered table-striped table-hover">
               <thead>
                  <tr>
                     <th>Sr.No</th>
					 <th>Member Name</th>
					 <th>Member Email</th>
					 <th>Member Phone</th>
                     <th>Doctor Name</th>
                     <th>Ticket Id</th>
                     <th>Appointment Time</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  if(!empty($order_data) && count($order_data)>0)
                  {
                     $sno=1;
					 $index=0;
                     foreach ($order_data as $data) 
                     {
                     			   
                  ?>
                  <tr>
                     <td><?php echo $sno++; ?></td>
                     <td><?php echo $data['first_name'].' '.$data['last_name'];?></td>
					 <td><?php echo $data['email'];?></td>
					 <td><?php echo $data['contact_no'];?></td>
					 <td><?php echo $data['doctor_name'];?></td>
					 <td><?php echo $data['ticket_id'];?></td>
					 <td><?php echo $data['available_time'];?></td>
                     
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
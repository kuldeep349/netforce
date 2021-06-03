
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
<?php
$packages = [
    1 => ['title' => 'BRONZE' , 'amount' => 10],
    2 => ['title' => 'SILVER' , 'amount' => 19],
    3 => ['title' => 'GOLD' , 'amount' => 36],
    4 => ['title' => 'DIAMOND' , 'amount' => 70],
];
?>
<!-- Main content -->
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header page-header-default">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Member</span> - Upgrade Member Requsts</h4>
         </div>
         <div class="heading-elements">
            <div class="heading-btn-group">
               <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Members</span></a>
               <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Member Requsts</span></a>
            </div>
         </div>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
            <li><a href="#">Members</a></li>
            <li class="active">Member Requsts</li>
         </ul>
         <ul class="breadcrumb-elements">
           
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

               <h5 class="panel-title">View All Member</h5>
              
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
            <div class="table-responsive">
               <table class="table table-responsive" id="example">
                  <thead>
                     <tr>
                        <th>Sr.No</th>
                        <th>UserName</th>
                        <th>Upgrdae Package</th>
                        <th>Upgrade Amount</th>
                        <th>Payment Method</th>
                        <th>Proof</th>
                        <th>Current Package</th>
                        <th>Request Date</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                     if(!empty($requests) && count($requests)>0)
                     {
                        $sno=0;
                        foreach ($requests as $request) 
                        {
                        $sno++;  

                     ?>
                     <tr>
                        <td><?php echo $sno;?></td>
                        <td><?php echo $request->user_id;?></td>
                        <td><?php echo $packages[$request->upgrade_to]['title'];?></td>
                        <td><?php echo $packages[$request->upgrade_to]['amount'];?></td>
                        <td><?php echo $request->pay_mode;?></td>
                        <td><img src="<?php echo base_url('images/'.$request->proof);?>" height="200px"></td>
                        <td><?php echo $packages[$request->pkg_id]['title'];?></td>
                        <td><?php echo $request->ts ;?></td>
                        <td>
                            <?php
                            if($request->status == 0){
                                echo'<span class="bg-primary">Pending</span>';
                            }elseif($request->status == 1){
                                echo'<span class="bg-success">Approved</span>';
                            }elseif($request->status == 2){
                                echo'<span class="bg-danger">Rejected</span>';
                            }
                            ?>
                        </td>
                        <td>
                           <ul class="icons-list">
                              <li>
                                 <a href="<?php echo site_url();?>admin/account/userUpgradeRequest/<?php echo $request->id;?>" data-popup="tooltip" title="" data-original-title="Edit Member Profile"><i class="icon-pencil7"></i></a>
                              </li>
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
      </div>
      <!-- Footer -->
      <?php $this->load->view('common/footer-text') ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
<!-- /main content -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
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

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>
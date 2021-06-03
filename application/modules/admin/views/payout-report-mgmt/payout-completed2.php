<!-- Main content -->
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header page-header-default">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Payout</span> - Payout Completed</h4>
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
            <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
            <li><a href="#">Payout Management</a></li>
            <li class="active">Payout Completed</li>
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
                  <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                  <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                  <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
               </ul>
            </li>
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
               <h5 class="panel-title">Payout Completed</h5>
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
            <table class="table datatable-responsive">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Request Id</th>
                     <th>Member Name</th>
                     <th>User Id</th>
                     <th>Request Date</th>
                     <th>Response Date</th>
                     <th>Requested Amount</th>
                     <th>Status</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  if(!empty($all_completed_payout_request) && count($all_completed_payout_request)>0)
                  {
                     $sno=0;
                     $total_payout_amount=0;
                     $total_no_of_active_payout=count($all_completed_payout_request);
                     foreach ($all_completed_payout_request as $payout) 
                     {
                      $sno++;  
                      $total_payout_amount=$total_payout_amount+$payout->request_amount;
                  ?>
                  <tr>
                     <td><?php echo $sno;?></td>
                     <td><?php echo $payout->request_id;?></td>
                     <td><?php echo $payout->username;?></td>
                     <td><?php echo $payout->user_id;?></td>
                     <td><?php echo date(date_formats(),strtotime($payout->request_date));?></td>
                     <td><?php echo date(date_formats(),strtotime($payout->response_date));?></td>
                     <td><?php echo currency()."".$payout->request_amount;?></td>
                     <td><span class="label label-success">Paid Successfully</span></td>
                  </tr>
                  <?php       
                     }
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
      <div class="row">
         <div class="panel panel-body bg-green-400 has-bg-image">
            <div class="media no-margin-top content-group">
               <div class="media-body">
                  <h6 class="no-margin text-semibold">Payout Completed</h6>
                  <span class="text-muted"><?php echo (!empty($total_no_of_active_payout))?$total_no_of_active_payout:0;?> Requests</span>
               </div>
               <div class="media-right media-middle">
                  <i class="icon-coins icon-2x"></i>
               </div>
            </div>
            <div class="progress progress-micro bg-blue mb-10">
               <div class="progress-bar bg-white" style="width: 100%">
                  <span class="sr-only">67% Complete</span>
               </div>
            </div>
            <?php 
            echo currency()." ";
            echo (!empty($total_payout_amount))?$total_payout_amount:0;
            ?>
         </div>
      </div>
      <!-- Footer -->
      <?php $this->load->view('common/footer-text') ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
<!-- /main content -->
<!-- Main content -->

<div class="content-wrapper">

   <!-- Page header -->

   <div class="page-header page-header-default">

      <div class="page-header-content">

         <div class="page-title">

            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">E-Pin Management</span> - Website Epin Request</h4>

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

            <li><a href="#">E-Pin Management</a></li>

            <li class="active">Website Epin Request</li>

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

      <div class="row">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">Website Epin Request</h5>

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

            <div class="col-md-12">

               <div class="alert alert-success alert-styled-right alert-arrow-right alert-bordered">

                  <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>

                  <!--<span class="text-semibold">Well done!</span> Epin is blocked successfully-->

                  <?php echo $this->session->flashdata('flash_msg');?>

               </div>

            </div>

            <?php   

               }

               ?>

            <table class="table datatable-responsive">

               <thead>

                  <tr>

                     <th>Sr.No</th>

                     <th>Full Name</th>

                     <th>Email</th>

                     <th>Mobile</th>

                     <th>Change Status</th>

                     <th>View Proof</th>

                     <th>Request Status</th>

                     <th>Request Date</th>

                  </tr>

               </thead>

               <tbody>

                  <?php 

                  $total_pending_request=0;

                  $total_success_request=0;

                  if(!empty($website_epin_request) && count($website_epin_request)>0)

                  {

                     $sno=0;

                     foreach ($website_epin_request as $request) 

                     {

                        $sno++;

                        $request_status=($request->status=='1')?'Complete':'Pending';

                        $request_status_class=($request->status=='1')?'label-success':'label-danger';

                        if($request->status=='1')

                        {

                           $total_success_request++;



                        }

                        else 

                        {

                           $total_pending_request++;

                        }

                  ?>

                     <tr>

                        <td><?php echo $sno;?></td>

                        <td><?php echo $request->full_name;?></td>

                        <td><?php echo $request->email;?></td>

                        <td><?php echo $request->mobile_no;?></td>

                        <td><a href="<?php echo site_url();?>admin/epin/changeWebsiteEpinRequestStatus/<?php echo ID_encode($request->id);?>" onclick="return confirmChangeStatus()">Change Status</a></td>

                        <td><a target="_blank" href="<?php echo base_url();?>images/<?php echo $request->proof;?>">View Proof</a></td>

                        <td><span class="label <?php echo $request_status_class;?>"><?php echo $request_status;?></span></td>

                        <td><?php echo $request->request_date;?></td>

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

         <div class="col-md-6">

            <div class="panel bg-primary">

               <div class="panel-heading">

                  <h6 class="panel-title">Total Epin Pending Request</h6>

               </div>

               <div class="panel-body">

                  <?php echo $total_pending_request;?>

               </div>

            </div>

         </div>

      </div>

      <div class="row">

         <div class="col-md-6">

            <div class="panel bg-primary">

               <div class="panel-heading">

                  <h6 class="panel-title">Total Epin Success Request</h6>

               </div>

               <div class="panel-body">

                  <?php echo $total_success_request;?>

               </div>

            </div>

         </div>

      </div>

      <div class="row">

         <div class="col-md-12">

            <div class="panel panel-flat border-left-xlg border-left-success">

               <div class="panel-heading">

                  <h6 class="panel-title"><span class="text-semibold">Graph </span> </h6>

               </div>

               <div class="panel-body">

                  Graph will be displayed here

               </div>

            </div>

         </div>

      </div>

      <!-- Pickadate picker -->

      <!-- /pickadate picker -->

      <!-- Pickatime picker -->

      <!-- /pickadate picker -->

      <!-- Anytime picker -->

      <!-- /anytime picker -->

      <!-- Footer -->

      <?php $this->load->view('common/footer-text') ?>

      <!-- /footer -->

   </div>

   <!-- /content area -->

</div>

<!-- /main content -->

<script>

   function confirmChangeStatus()

   {

   

      if(window.confirm("Are you sure, you want to change the request status!"))

        return true;

      else 

         return false;

   }

   

</script>
<script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/dashboard.js"></script>
<!-- Main content -->
<div class="content-wrapper">
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
                  <li><a href="#"><i class="icon-user-lock"></i> This Week Sell</a></li>
                  <li><a href="#"><i class="icon-statistics"></i> This Month Sell</a></li>
                  <li><a href="#"><i class="icon-accessibility"></i> This Year Sell</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-gear"></i> View All Sell</a></li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">
      <!-- Main charts -->
      <div class="row">
         <div class="col-sm-6 col-md-3">
            <div class="panel panel-body bg-warning-400 has-bg-image">
               <div class="media no-margin">
                  <div class="media-body">
                     <h3 class="no-margin"><?php echo $member_registered_today;?></h3>
                     <span class="text-uppercase text-size-mini">Sell Today</span>
                  </div>
                  <div class="media-right media-middle">
                     <i class="icon-users4 icon-3x opacity-75"></i>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-md-3">
            <div class="panel panel-body bg-warning-400 has-bg-image">
               <div class="media no-margin">
                  <div class="media-left media-middle">
                     <i class="icon-users4 icon-3x opacity-75"></i>
                  </div>
                  <div class="media-body text-right">
                     <h3 class="no-margin text-semibold"><?php echo $total_member;?></h3>
                     <span class="text-uppercase text-size-mini">Total Members</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-md-3">
            <div class="panel panel-body bg-warning-400 has-bg-image">
               <div class="media no-margin">
                  <div class="media-left media-middle">
                     <i class="icon-users4 icon-3x opacity-75"></i>
                  </div>
                  <div class="media-body text-right">
                     <h3 class="no-margin"><?php echo $this_week_registered_member;?></h3>
                     <span class="text-uppercase text-size-mini">Sell This Week</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-md-3">
            <div class="panel panel-body bg-warning-400 has-bg-image">
               <div class="media no-margin">
                  <div class="media-left media-middle">
                     <i class="icon-users4 icon-3x opacity-75"></i>
                  </div>
                  <div class="media-body text-right">
                     <h3 class="no-margin"><?php echo $this_month_registered_member;?></h3>
                     <span class="text-uppercase text-size-mini">Sell This Month</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Inside tabs -->
      
      <!-- /inside tabs -->
      <!--Wallet Balance -->
      <div class="row">
         <div class="col-sm-6 col-md-6">
            <div class="panel panel-body bg-warning-400 has-bg-image">
               <div class="media no-margin">
                  <div class="media-body">
                     <h3 class="no-margin"><?php echo currency()." ".$total_package_sold_amount;?></h3>
                     <span class="text-uppercase text-size-mini">Total Sold</span>
                  </div>
                  <div class="media-right media-middle">
                     <i class=" icon-task icon-3x opacity-75"></i>
                  </div>
               </div>
            </div>
         </div>
          <div class="col-sm-6 col-md-6">
            <div class="panel panel-body bg-warning-400 has-bg-image">
               <div class="media no-margin">
                  <div class="media-left media-middle">
                     <i class="icon-calculator icon-3x opacity-75"></i>
                  </div>
                  <div class="media-body text-right">
                     <h3 class="no-margin"><?php echo currency()." ".$total_company_profit;?></h3>
                     <span class="text-uppercase text-size-mini">Total Compnay Profit</span>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
	  <!--Admin Row -->
	
	  <!------Member Row---->

	  
      <div class="row">
        
		 <div class="col-sm-6 col-md-6">
            <div class="panel panel-body bg-blue-400 has-bg-image">
               <div class="media no-margin-top content-group">
                  <div class="media-body">
                     <h6 class="no-margin text-semibold">Open Ticket</h6>
                     <span class="text-muted"><?php echo $total_open_ticket;?> Requests</span>
                  </div>
                  <div class="media-right media-middle">
                     <i class=" icon-arrow-down-right32 icon-2x"></i>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-md-6">
            <div class="panel panel-body bg-success-400 has-bg-image">
               <div class="media no-margin-top content-group">
                  <div class="media-left media-middle">
                     <i class=" icon-shield-check icon-2x"></i>
                  </div>
                  <div class="media-body">
                     <h6 class="no-margin text-semibold">Closed Ticket</h6>
                     <span class="text-muted"><?php echo $total_closed_ticket;?></span>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-6 col-md-6">
            <div class="panel panel-body bg-success-400 has-bg-image">
               <div class="media no-margin-top content-group">
                  <div class="media-left media-middle">
                     <i class=" icon-shield-check icon-2x"></i>
                  </div>
                  <div class="media-body">
                     <h6 class="no-margin"><?php echo currency()." ".$all_user_gross_commission;?></h6>
                     <span class="text-uppercase text-size-mini">Total Commision</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <?php
         $all_packages_members = 0;
         foreach($package_members as $k => $package){
            $all_packages_members = $all_packages_members + $package->members;
            ?>
            <div class="col-sm-3 col-md-3">
               <div class="panel panel-body bg-warning-400 has-bg-image">
                  <div class="media no-margin">
                     <div class="media-left media-middle">
                        <i class="icon-calculator icon-3x opacity-75"></i>
                     </div>
                     <div class="media-body text-right">
                        <h3 class="no-margin"><?php echo $package->members;?></h3>
                        <span class="text-uppercase text-size-mini"><?php echo $package->title;?> Package Sold</span>
                     </div>
                  </div>
               </div>
            </div>
            <?php
         }
         ?>
         <div class="col-sm-3 col-md-3">
               <div class="panel panel-body bg-warning-400 has-bg-image">
                  <div class="media no-margin">
                     <div class="media-left media-middle">
                        <i class="icon-calculator icon-3x opacity-75"></i>
                     </div>
                     <div class="media-body text-right">
                        <h3 class="no-margin"><?php echo $all_packages_members;?></h3>
                        <span class="text-uppercase text-size-mini"> Total Package Sold</span>
                     </div>
                  </div>
               </div>
            </div>
      </div>
      <!-- Graph-->
     
      <!--Graph-->
      <!-- /main charts -->
      <!-- Dashboard content -->
      <!-- /dashboard content -->
      <!-- Footer -->
      <?php $this->load->view('common/footer-text') ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
<!-- /main content -->
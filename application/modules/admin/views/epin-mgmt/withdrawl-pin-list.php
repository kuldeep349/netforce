<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">E-pin Management</span> - <?php echo $title;?></h4>
         </div>
         <div class="heading-elements">
            <div class="heading-btn-group">
               <a href="<?php echo site_url();?>user/epin/purchasePin" class="btn btn-success"><i class="icon-comment-discussion position-left"></i>Add New Purchase Pin Request</a>
            </div>
         </div>
         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active"><a href="#">E-pin Management</a></li>
            <li class="active"><?php echo $title; ?></li>
         </ul>
         <ul class="breadcrumb">
         </ul>
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">
      <!-- Daterange picker -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h5 class="panel-title"><?php echo $title; ?></h5>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="panel-heading">
                     <p>Please Select the Date Range to View Your Commission Report</p>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="display-block">Please Select the Date Rane </label>
                     <button type="button" class="btn btn-success daterange-ranges">
                     <i class="icon-calendar22 position-left"></i> <span></span> <b class="caret"></b>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /daterange picker -->
      <div class="row">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">Withdrawl E-pin request</h5>
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
                     <th>Request Id</th>
                     <th>Package Title</th>
                     <th>Package Amount</th>
                     <th>Epin Code</th>
                     <th>Epin Amount</th>
                     <th>Request Date</th>
                     <th>Response Date</th>
                  </tr>
               </thead>
               <tbody>
                     <tr>
                        <td>Sr.No</td>
                        <td>Request Id</td>
                        <td>Package Title</td>
                        <td>Package Amount</td>
                        <td>Epin Code</td>
                        <td>Epin Amount</td>
                        <td>Request Date</td>
                        <td>Response Date</td>
                     </tr>
               </tbody>
            </table>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="panel bg-primary">
               <div class="panel-heading">
                  <h6 class="panel-title">Total Withdrawl E-pin request</h6>
               </div>
               <div class="panel-body">
                 1
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-flat border-left-xlg border-left-success">
               <div class="panel-heading">
                  <h6 class="panel-title"><span class="text-semibold">Graph of the Level Income Report</span> </h6>
               </div>
               <div class="panel-body">
                  Graph will be displayed here
               </div>
            </div>
         </div>
      </div>
      <!-- Anytime picker -->
      <!-- /anytime picker -->
      <!-- Footer -->
      <?php 
         $this->load->view('common/footer-text');
         ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>

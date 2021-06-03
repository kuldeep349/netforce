<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Rank</span> - Management</h4>
         </div>
         <div class="heading-elements">
            <div class="heading-btn-group">
               <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
               <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
               <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
            </div>
         </div>
         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="#">Rank Management</li>
            <li class="active">Add New Rank</li>
         </ul>
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">
      <!-- Horizontal form options -->
      <div class="row">
         <div class="col-md-12">
            <!-- Basic layout-->
            <div class="panel panel-flat">
               <div class="panel-heading">
                  <h5 class="panel-title">Add New Rank</h5>
                  <div class="heading-elements">
                     <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                     </ul>
                  </div>
                  <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
               </div>
               <?php 
                  echo form_open(site_url()."admin/rank2/addNewRank2",array('method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data'));
                  ?>
               <!--<form method="post" class="form-horizontal">-->								
               <div class="panel-body">
                  
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Code:</label>
                     <div class="col-lg-9">
                        <input type="text" name="code" class="form-control" placeholder="Code">
                     </div>
                  </div>
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Rank Name:</label>
                     <div class="col-lg-9">
                        <input type="text" name="rank_name" class="form-control" placeholder="Rank Name">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">PDP:</label>
                     <div class="col-lg-9">
                        <input type="text" name="pdp" class="form-control" placeholder="PDP">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">CGV:</label>
                     <div class="col-lg-9">
                        <input type="text" name="cgv" class="form-control" placeholder="CGV">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Grant Amount (<?php echo currency();?>):</label>
                     <div class="col-lg-9">
                        <input type="text" name="bonus_amount" class="form-control" placeholder="Bonus Amount">
                     </div>
                  </div>				  <div class="form-group">					<label class="col-lg-3 control-label">Rank Image:</label>					<div class="col-lg-9">				    <input name='rnk_image' type="file" class="file-input">					</div>				</div>
                  <div class="text-right">
                     <button type="submit" name="btn" value="addNewRank" class="btn btn-primary">Add <i class="icon-arrow-right14 position-right"></i></button>
                  </div>
               </div>
               <!--</form>-->
               <?php echo form_close();?>
            </div>
            <!-- /basic layout -->
         </div>
      </div>
      <!-- /vertical form options -->
      <!-- Footer -->
      <?php
         $this->load->view("common/footer-text");
         ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
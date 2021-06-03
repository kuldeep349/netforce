<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Package Management</span> - Direct Commission Management</h4>
         </div>
         <div class="heading-elements">
            <div class="heading-btn-group">
               <a href="<?php echo site_url();?>admin/package/manageCommission/<?php echo ID_encode($package_id); ?>" class="btn btn-success"><i class="icon-arrow-left52 position-left"></i> Back</a>
            </div>
         </div>
         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>admin"<i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active"><a href="<?php echo site_url();?>admin/package/allPackages">All Packages</a></li>
            <li class="active"><a href="#">Commission Management</a></li>
            <li class="">Direct Commission Management for <?php echo $package_title;?></li>
         </ul>
         <ul class="breadcrumb">
         </ul>
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">
      <?php echo $this->session->flashdata('flash_msg');?>
      <!-- Horizontal form options -->
      <div class="row">
         <div class="col-md-12">
            <!-- Basic layout-->
            <div class="panel panel-flat">
               <div class="panel-heading">
                  <h5 class="panel-title">Add Direct Commission for <?php echo $package_title;?> package </h5>
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
				 //pr($direct_commission_meta);
				 $feeder_stage_commission=(!empty($direct_commission_meta['feeder_stage']->commission))?$direct_commission_meta['feeder_stage']->commission:0;

				 $stage1_commission=(!empty($direct_commission_meta['stage_1']->commission))?$direct_commission_meta['stage_1']->commission:0;

				  
                 echo form_open(site_url()."admin/package/saveDirectCommission",array('method'=>'post','class'=>'form-horizontal'));
                  
                  ?>
               <!--<form method="post" class="form-horizontal">-->                        
               <input type="hidden" name="pkg_id" id="pkg_id" value="<?php echo $package_id;?>">
               <div class="panel-body">
                  <input type="hidden" name="type" value="2">
				  
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Direct /Referral Commission:</label>
                     <div class="col-lg-9">
                        <input type="text" value="<?php echo $feeder_stage_commission;?>" name="feeder_stage_commission" id="commission" class="form-control" placeholder="Stage1 Commission Amount">
                        <span id="valid_commission" style="color:red;font-weight:bold"></span>
                     </div>
                  </div>
                  <div class="text-right">
                     <button type="submit" name="btn" id="btn" value="addNewDirectCommission" class="btn btn-primary">Save<i class="icon-arrow-right14 position-right"></i></button>
                  </div>
               </div>
               <!--</form>-->
               <?php echo form_close();?>
            </div>
            <!-- /basic layout -->
         </div>
      </div>
      <!-- /Horizontal form options -->
      <!-- Footer -->
      <?php
         $this->load->view("common/footer-text");
         ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
<script>
$(document).ready(function(){
  $("#btn").click(function(){
     if($("#commission").val()=="")
     {
      $("#valid_commission").text("Please enter commision amount");
      return false;
     }
     return true;
  });//end btn click


  })//end keyup
});//end ready
</script>
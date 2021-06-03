<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Package Management</span> - Stage Completion Incentive Management</h4>
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
            <li class="">Stage Completion Incentive Management for <?php echo $package_title;?></li>
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
                  <h5 class="panel-title">Add Stage Completion Incentive for <?php echo $package_title;?> package </h5>
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

				 $stage2_commission=(!empty($direct_commission_meta['stage_2']->commission))?$direct_commission_meta['stage_2']->commission:0;
				 
				 $stage3_commission=(!empty($direct_commission_meta['stage_3']->commission))?$direct_commission_meta['stage_3']->commission:0;
				 
				 $stage4_commission=(!empty($direct_commission_meta['stage_4']->commission))?$direct_commission_meta['stage_4']->commission:0;
				 
				 $stage5_commission=(!empty($direct_commission_meta['stage_5']->commission))?$direct_commission_meta['stage_5']->commission:0;
				 
				 
				 
				 
				 $feeder_stage_rank_name=(!empty($direct_commission_meta['feeder_stage']->rank_name))?$direct_commission_meta['feeder_stage']->rank_name:null;

				 $stage1_rank_name=(!empty($direct_commission_meta['stage_1']->rank_name))?$direct_commission_meta['stage_1']->rank_name:null;

				 $stage2_rank_name=(!empty($direct_commission_meta['stage_2']->rank_name))?$direct_commission_meta['stage_2']->rank_name:null;
				 
				 $stage3_rank_name=(!empty($direct_commission_meta['stage_3']->rank_name))?$direct_commission_meta['stage_3']->rank_name:null;
				  
				 $stage4_rank_name=(!empty($direct_commission_meta['stage_4']->rank_name))?$direct_commission_meta['stage_4']->rank_name:null;
				 
				 $stage5_rank_name=(!empty($direct_commission_meta['stage_5']->rank_name))?$direct_commission_meta['stage_5']->rank_name:null;
				 
				  
                 echo form_open(site_url()."admin/package/saveStageCompletionRankBonus/",array('method'=>'post','class'=>'form-horizontal'));
                  
                  ?>
               <!--<form method="post" class="form-horizontal">-->                        
               <input type="hidden" name="pkg_id" id="pkg_id" value="<?php echo $package_id;?>">
               <div class="panel-body">
                  <input type="hidden" name="type" value="2">
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Stage1 Matching bonus + other incentives:</label>
                     <div class="col-lg-3">
                        <input type="text" value="<?php echo $feeder_stage_commission;?>" name="feeder_stage_commission" class="form-control" placeholder="Stage1 Commission Amount">
                     </div>
					 
                  </div>
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Stage2 Matching bonus + other incentives:</label>
                     <div class="col-lg-3">
                        <input type="text" value="<?php echo $stage1_commission;?>" name="stage1_commission" class="form-control" placeholder="Stage2 Commission Amount">
                     </div>
					 
                  </div>
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Stage3 Matching bonus + other incentives:</label>
                     <div class="col-lg-3">
                        <input type="text" value="<?php echo $stage2_commission;?>" name="stage2_commission" class="form-control" placeholder="Stag3 Commission Amount">
                     </div>
					 
                  </div>
				  
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Stage4 Matching bonus + other incentives:</label>
                     <div class="col-lg-3">
                        <input type="text" value="<?php echo $stage3_commission;?>" name="stage3_commission" class="form-control" placeholder="Stage4 Commission Amount">
                     </div>
					  
                  </div>
				  
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Stage5 Matching bonus + other incentives:</label>
                     <div class="col-lg-3">
                        <input type="text" value="<?php echo $stage4_commission;?>" name="stage4_commission" class="form-control" placeholder="Stage5 Commission Amount">
                     </div>
					  
                  </div>
				  
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Stage6 Matching bonus + other incentives:</label>
                     <div class="col-lg-3">
                        <input type="text" value="<?php echo $stage5_commission;?>" name="stage5_commission" class="form-control" placeholder="Stage6 Commission Amount">
                     </div>
                  </div>
				  
				  
                  <div class="text-left">
                     <button type="submit" name="btn" id="btn" value="addNewDirectCommission" class="btn btn-primary">Save<i class=" position-left"></i></button>
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
     return true;
  });//end btn click
});//end ready
</script>
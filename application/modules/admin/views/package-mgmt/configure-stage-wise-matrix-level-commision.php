<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Package Management</span> - Statge Wise Level Commission Management</h4>
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
			<li>Commission Management</li>
            <li class="active"><a href="#">Statge Wise Level Commission Management for <?php echo $package_title;?></a></li>
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
                  <h5 class="panel-title">Statge Wise Level Commission for <?php echo $package_title;?> package </h5>
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
                  echo form_open(site_url()."admin/package/stageWiseMatrixLevelCommision",array('method'=>'post','class'=>'form-horizontal'));
                  ?>
               <!--<form method="post" class="form-horizontal">-->                        
               <input type="hidden" name="pkg_id" id="pkg_id" value="<?php echo $package_id;?>">
               <div class="panel-body">
                  <input type="hidden" name="commission_type" value="2">
                  <div id="stage_1">
						  <div class="form-group">
							 <label class="col-lg-3 control-label">For Stage1:</label>
						  </div>
						  <div id="stage1_level_div">
						  <?php 
						  if(!empty($feeder_stage_meta) && count($feeder_stage_meta)>0)
						  {
							  $level=1;
							  foreach($feeder_stage_meta as $meta)
							  {
								if($level==1)
								{
						  ?>
								<div class="form-group">
									<label class="col-lg-3 control-label">Level1:</label>
									<div class="col-lg-9">
									   <input required type="text" name="stage_1_level_commission[]" value="<?php echo $meta->commission_amount;?>" class="form-control" placeholder="Stage1 Level 1 Commission">
									</div>
							     </div>
						  <?php 
								}
								else 
								{
						  ?>
								<div class="form-group stage1_level_group" id="stage1_level_<?php echo $level;?>">
									<label class="col-lg-3 control-label">Level<?php echo $level;?>:</label>
									<div class="col-lg-9">
									   <input required type="text" name="stage_1_level_commission[]" value="<?php echo $meta->commission_amount;?>" class="form-control" placeholder="Stage1 Level <?php echo $level;?> Commission">
									   <a href="#" class="remove_stage1_level_click" onclick="return remove_stage1_level('<?php echo $level;?>')">Remove</a>
									</div>
							    </div>
						  <?php 
								}
								$level++;  
							  }//end foreach
						  }
						  else 
						  {
						  ?>
						  <div class="form-group">
								<label class="col-lg-3 control-label">Level1:</label>
								<div class="col-lg-9">
								   <input required type="text" name="stage_1_level_commission[]" value="0" class="form-control" placeholder="Stage1 Level 1 Commission">
								</div>
							 </div>
						  <?php 
						  }
						  ?>
						  </div>
						  <!--end of limited level div here-->
						  <div class="form-group" id="add_more_group">
							 <label class="col-lg-3 control-label"></label>
							 <div class="col-lg-9"><a href="#" id="add_more_level_on_stage1">Add More Level Commission</a></div>
						  </div>
				 </div>
				 <!----------For Stage2--------------->
				 <div id="stage_2">
						  <div class="form-group">
							 <label class="col-lg-3 control-label">For Stage2:</label>
						  </div>
						  <div id="stage2_level_div">
						     <?php 
							 if(!empty($stage1_meta) && count($stage1_meta)>0)
							 {
								 $level=1;
								 foreach($stage1_meta as $meta)
								 {
									 if($level==1)
									 {
							?>
								<div class="form-group">
									<label class="col-lg-3 control-label">Level1:</label>
									<div class="col-lg-9">
									   <input required type="text" value="<?php echo $meta->commission_amount;?>" name="stage_2_level_commission[]" value="0" class="form-control" placeholder="Stage2 Level 1 Commission">
									</div>
								 </div>
							<?php 
									 }
									 else 
									 {
							?>
								<div class="form-group stage2_level_group" id="stage2_level_<?php echo $level;?>">
									<label class="col-lg-3 control-label">Level<?php echo $level;?>:</label>
									<div class="col-lg-9">
									   <input required type="text" value="<?php echo $meta->commission_amount;?>" name="stage_2_level_commission[]" class="form-control" placeholder="Stage2 Level <?php echo $level;?> Commission">
									   <a href="#" class="remove_stage2_level_click" onclick="return remove_stage2_level('<?php echo $level;?>')">Remove</a>
									</div>
								 </div>
							<?php 
									 }
								  $level++;
								 }//end foreach
							 }
							 else 
							 {
							?>
							<div class="form-group">
								<label class="col-lg-3 control-label">Level1:</label>
								<div class="col-lg-9">
								   <input required type="text" name="stage_2_level_commission[]" value="0" class="form-control" placeholder="Stage2 Level 1 Commission">
								</div>
							 </div>
							<?php 
							 }
							 ?>
							 
						  </div>
						  <!--end of limited level div here-->
						  <div class="form-group" id="add_more_group">
							 <label class="col-lg-3 control-label"></label>
							 <div class="col-lg-9"><a href="#" id="add_more_level_on_stage2">Add More Level Commission</a></div>
						  </div>
				 </div>
				  <!----------For Stage3--------------->
				 <div id="stage_3">
						  <div class="form-group">
							 <label class="col-lg-3 control-label">For Stage3:</label>
						  </div>
						  <div id="stage3_level_div">
						     <?php 
							 if(!empty($stage2_meta) && count($stage2_meta)>0)
							 {
								 $level=1;
								 foreach($stage2_meta as $meta)
								 {
								   	if($level==1)
									{
							 ?>
									 <div class="form-group">
										<label class="col-lg-3 control-label">Level1:</label>
										<div class="col-lg-9">
										   <input required type="text" value="<?php echo $meta->commission_amount;?>" name="stage_3_level_commission[]" class="form-control" placeholder="Stage3 Level 1 Commission">
										</div>
									</div>
							 <?php 
									}
									else 
									{
							 ?>
									 <div class="form-group stage3_level_group" id="stage3_level_<?php echo $level;?>">
										<label class="col-lg-3 control-label">Level<?php echo $level;?>:</label>
										<div class="col-lg-9">
										   <input required type="text" value="<?php echo $meta->commission_amount;?>" name="stage_3_level_commission[]" class="form-control" placeholder="Stage3 Level <?php echo $level;?> Commission">
										   <a href="#" class="remove_stage3_level_click" onclick="return remove_stage3_level(<?php echo $level;?>)">Remove</a>
										</div>
									  </div>
							 <?php 
									}
									$level++;
								 }//end foreach here
							 }
							 else 
							 {
							 ?>
							  <div class="form-group">
									<label class="col-lg-3 control-label">Level1:</label>
									<div class="col-lg-9">
									   <input required type="text" value="0" name="stage_3_level_commission[]" class="form-control" placeholder="Stage3 Level 1 Commission">
									</div>
								</div>
							 <?php 
							 }
							 ?>
						  </div>
						  <!--end of limited level div here-->
						  <div class="form-group" id="add_more_group">
							 <label class="col-lg-3 control-label"></label>
							 <div class="col-lg-9"><a href="#" id="add_more_level_on_stage3">Add More Level Commission</a></div>
						  </div>
				 </div>
				 
				 
				 
				 				  <!----------For Stage4--------------->
				 <div id="stage_4">
						  <div class="form-group">
							 <label class="col-lg-3 control-label">For Stage4:</label>
						  </div>
						  <div id="stage4_level_div">
						     <?php 
							 if(!empty($stage3_meta) && count($stage3_meta)>0)
							 {
								 $level=1;
								 foreach($stage3_meta as $meta)
								 {
								   	if($level==1)
									{
							 ?>
									 <div class="form-group">
										<label class="col-lg-3 control-label">Level1:</label>
										<div class="col-lg-9">
										   <input required type="text" value="<?php echo $meta->commission_amount;?>" name="stage_4_level_commission[]" class="form-control" placeholder="Stage4 Level 1 Commission">
										</div>
									</div>
							 <?php 
									}
									else 
									{
							 ?>
									 <div class="form-group stage4_level_group" id="stage4_level_<?php echo $level;?>">
										<label class="col-lg-3 control-label">Level<?php echo $level;?>:</label>
										<div class="col-lg-9">
										   <input required type="text" value="<?php echo $meta->commission_amount;?>" name="stage_4_level_commission[]" class="form-control" placeholder="Stage4 Level <?php echo $level;?> Commission">
										   <a href="#" class="remove_stage4_level_click" onclick="return remove_stage4_level(<?php echo $level;?>)">Remove</a>
										</div>
									  </div>
							 <?php 
									}
									$level++;
								 }//end foreach here
							 }
							 else 
							 {
							 ?>
							  <div class="form-group">
									<label class="col-lg-3 control-label">Level1:</label>
									<div class="col-lg-9">
									   <input required type="text" value="0" name="stage_4_level_commission[]" class="form-control" placeholder="Stage4 Level 1 Commission">
									</div>
								</div>
							 <?php 
							 }
							 ?>
						  </div>
						  <!--end of limited level div here-->
						  <div class="form-group" id="add_more_group">
							 <label class="col-lg-3 control-label"></label>
							 <div class="col-lg-9"><a href="#" id="add_more_level_on_stage4">Add More Level Commission</a></div>
						  </div>
				 </div>
				 
				 				  <!----------For Stage5--------------->
				 <div id="stage_5">
						  <div class="form-group">
							 <label class="col-lg-3 control-label">For Stage5:</label>
						  </div>
						  <div id="stage5_level_div">
						     <?php 
							 if(!empty($stage4_meta) && count($stage4_meta)>0)
							 {
								 $level=1;
								 foreach($stage4_meta as $meta)
								 {
								   	if($level==1)
									{
							 ?>
									 <div class="form-group">
										<label class="col-lg-3 control-label">Level1:</label>
										<div class="col-lg-9">
										   <input required type="text" value="<?php echo $meta->commission_amount;?>" name="stage_5_level_commission[]" class="form-control" placeholder="Stage5 Level 1 Commission">
										</div>
									</div>
							 <?php 
									}
									else 
									{
							 ?>
									 <div class="form-group stage3_level_group" id="stage5_level_<?php echo $level;?>">
										<label class="col-lg-3 control-label">Level<?php echo $level;?>:</label>
										<div class="col-lg-9">
										   <input required type="text" value="<?php echo $meta->commission_amount;?>" name="stage_5_level_commission[]" class="form-control" placeholder="Stage5 Level <?php echo $level;?> Commission">
										   <a href="#" class="remove_stage5_level_click" onclick="return remove_stage5_level(<?php echo $level;?>)">Remove</a>
										</div>
									  </div>
							 <?php 
									}
									$level++;
								 }//end foreach here
							 }
							 else 
							 {
							 ?>
							  <div class="form-group">
									<label class="col-lg-3 control-label">Level1:</label>
									<div class="col-lg-9">
									   <input required type="text" value="0" name="stage_5_level_commission[]" class="form-control" placeholder="Stage5 Level 1 Commission">
									</div>
								</div>
							 <?php 
							 }
							 ?>
						  </div>
						  <!--end of limited level div here-->
						  <div class="form-group" id="add_more_group">
							 <label class="col-lg-3 control-label"></label>
							 <div class="col-lg-9"><a href="#" id="add_more_level_on_stage5">Add More Level Commission</a></div>
						  </div>
				 </div>
				 
				 
				 		  <!----------For Stage6--------------->
				 <div id="stage_5">
						  <div class="form-group">
							 <label class="col-lg-3 control-label">For Stage6:</label>
						  </div>
						  <div id="stage6_level_div">
						     <?php 
							 if(!empty($stage5_meta) && count($stage5_meta)>0)
							 {
								 $level=1;
								 foreach($stage5_meta as $meta)
								 {
								   	if($level==1)
									{
							 ?>
									 <div class="form-group">
										<label class="col-lg-3 control-label">Level1:</label>
										<div class="col-lg-9">
										   <input required type="text" value="<?php echo $meta->commission_amount;?>" name="stage_6_level_commission[]" class="form-control" placeholder="Stage6 Level 1 Commission">
										</div>
									</div>
							 <?php 
									}
									else 
									{
							 ?>
									 <div class="form-group stage3_level_group" id="stage6_level_<?php echo $level;?>">
										<label class="col-lg-3 control-label">Level<?php echo $level;?>:</label>
										<div class="col-lg-9">
										   <input required type="text" value="<?php echo $meta->commission_amount;?>" name="stage_6_level_commission[]" class="form-control" placeholder="Stage6 Level <?php echo $level;?> Commission">
										   <a href="#" class="remove_stage6_level_click" onclick="return remove_stage6_level(<?php echo $level;?>)">Remove</a>
										</div>
									  </div>
							 <?php 
									}
									$level++;
								 }//end foreach here
							 }
							 else 
							 {
							 ?>
							  <div class="form-group">
									<label class="col-lg-3 control-label">Level1:</label>
									<div class="col-lg-9">
									   <input required type="text" value="0" name="stage_6_level_commission[]" class="form-control" placeholder="Stage6 Level 1 Commission">
									</div>
								</div>
							 <?php 
							 }
							 ?>
						  </div>
						  <!--end of limited level div here-->
						  <div class="form-group" id="add_more_group">
							 <label class="col-lg-3 control-label"></label>
							 <div class="col-lg-9"><a href="#" id="add_more_level_on_stage6">Add More Level Commission</a></div>
						  </div>
				 </div>
				 
                  <div class="text-right">
                     <button type="submit" name="btn" id="btn" value="addNewUnilevelCommission" class="btn btn-primary">Save<i class="icon-arrow-right14 position-right"></i></button>
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
   var stage1_level='<?php echo (count($feeder_stage_meta)>0)?count($feeder_stage_meta):1;?>';
   var stage2_level='<?php echo (count($stage1_meta)>0)?count($stage1_meta):1;?>';
   var stage3_level='<?php echo (count($stage2_meta)>0)?count($stage2_meta):1;?>';
   var stage4_level='<?php echo (count($stage3_meta)>0)?count($stage3_meta):1;?>';
   var stage5_level='<?php echo (count($stage4_meta)>0)?count($stage4_meta):1;?>';
   var stage6_level='<?php echo (count($stage5_meta)>0)?count($stage5_meta):1;?>';
   
   function remove_stage1_level(levels)
   {
     $("#stage1_level_"+levels).remove();
     /////////////////
     stage1_level=1; 
     $('.stage1_level_label').each(function(){
       stage1_level++;
       $(this).html("level"+stage1_level+":");
     });
     ////////////////
     stage1_level=1;
     $(".stage1_level_group").each(function(){
       stage1_level++;
       $(this).attr('id',"stage1_level_"+stage1_level);
     });
     //////////////////
     stage1_level=1;
     $(".stage1_level_input").each(function(){
        stage1_level++;
        $(this).attr("placeholder","Stage1 Level "+stage1_level+" Commission");
     });
     ////////////////////
     stage1_level=1;
     $(".remove_stage1_level_click").each(function(){
      stage1_level++;
      $(this).attr('onclick',"return remove_stage1_level("+stage1_level+")");
     });
     return false;
   }
   function remove_stage2_level(levels)
   {
     $("#stage2_level_"+levels).remove();
     /////////////////
     stage2_level=1; 
     $('.stage2_level_label').each(function(){
       stage2_level++;
       $(this).html("level"+stage2_level+":");
     });
     ////////////////
     stage2_level=1;
     $(".stage2_level_group").each(function(){
       stage2_level++;
       $(this).attr('id',"stage2_level_"+stage2_level);
     });
     //////////////////
     stage2_level=1;
     $(".stage2_level_input").each(function(){
        stage2_level++;
        $(this).attr("placeholder","Stage2 Level "+stage2_level+" Commission");
     });
     ////////////////////
     stage2_level=1;
     $(".remove_stage2_level_click").each(function(){
      stage2_level++;
      $(this).attr('onclick',"return remove_stage2_level("+stage2_level+")");
     });
     return false;
   }
   ///////////
   function remove_stage3_level(levels)
   {
     $("#stage3_level_"+levels).remove();
     /////////////////
     stage3_level=1; 
     $('.stage3_level_label').each(function(){
       stage3_level++;
       $(this).html("level"+stage3_level+":");
     });
     ////////////////
     stage3_level=1;
     $(".stage3_level_group").each(function(){
       stage3_level++;
       $(this).attr('id',"stage3_level_"+stage3_level);
     });
     //////////////////
     stage3_level=1;
     $(".stage3_level_input").each(function(){
        stage3_level++;
        $(this).attr("placeholder","Stage3 Level "+stage3_level+" Commission");
     });
     ////////////////////
     stage3_level=1;
     $(".remove_stage3_level_click").each(function(){
      stage3_level++;
      $(this).attr('onclick',"return remove_stage3_level("+stage3_level+")");
     });
     return false;
   }
   
   function remove_stage4_level(levels)
   {
     $("#stage4_level_"+levels).remove();
     /////////////////
     stage4_level=1; 
     $('.stage4_level_label').each(function(){
       stage4_level++;
       $(this).html("level"+stage4_level+":");
     });
     ////////////////
     stage4_level=1;
     $(".stage4_level_group").each(function(){
       stage4_level++;
       $(this).attr('id',"stage4_level_"+stage4_level);
     });
     //////////////////
     stage4_level=1;
     $(".stage4_level_input").each(function(){
        stage4_level++;
        $(this).attr("placeholder","Stage4 Level "+stage4_level+" Commission");
     });
     ////////////////////
     stage4_level=1;
     $(".remove_stage4_level_click").each(function(){
      stage4_level++;
      $(this).attr('onclick',"return remove_stage4_level("+stage4_level+")");
     });
     return false;
   }
   
   function remove_stage5_level(levels)
   {
     $("#stage5_level_"+levels).remove();
     /////////////////
     stage5_level=1; 
     $('.stage5_level_label').each(function(){
       stage5_level++;
       $(this).html("level"+stage5_level+":");
     });
     ////////////////
     stage5_level=1;
     $(".stage5_level_group").each(function(){
       stage5_level++;
       $(this).attr('id',"stage5_level_"+stage5_level);
     });
     //////////////////
     stage5_level=1;
     $(".stage5_level_input").each(function(){
        stage5_level++;
        $(this).attr("placeholder","Stage5 Level "+stage5_level+" Commission");
     });
     ////////////////////
     stage5_level=1;
     $(".remove_stage5_level_click").each(function(){
      stage5_level++;
      $(this).attr('onclick',"return remove_stage5_level("+stage5_level+")");
     });
     return false;
   }
   
   function remove_stage6_level(levels)
   {
     $("#stage6_level_"+levels).remove();
     /////////////////
     stage6_level=1; 
     $('.stage6_level_label').each(function(){
       stage6_level++;
       $(this).html("level"+stage6_level+":");
     });
     ////////////////
     stage6_level=1;
     $(".stage6_level_group").each(function(){
       stage6_level++;
       $(this).attr('id',"stage6_level_"+stage6_level);
     });
     //////////////////
     stage6_level=1;
     $(".stage6_level_input").each(function(){
        stage6_level++;
        $(this).attr("placeholder","Stage6 Level "+stage6_level+" Commission");
     });
     ////////////////////
     stage6_level=1;
     $(".remove_stage6_level_click").each(function(){
      stage6_level++;
      $(this).attr('onclick',"return remove_stage6_level("+stage6_level+")");
     });
     return false;
   }
   
   $(document).ready(function(){
      /////////Level type code start from here/////////////////////
      $("#add_more_level_on_stage1").click(function(){
            stage1_level++;
            var limited_level_div='<div class="form-group stage1_level_group" id="stage1_level_'+stage1_level+'">';
            limited_level_div +='<label class="col-lg-3 control-label stage1_level_label">Level '+stage1_level+':</label>';
            limited_level_div +='<div class="col-lg-9">';
            limited_level_div +='<input value="0" required type="text" name="stage_1_level_commission[]" class="form-control stage1_level_input" placeholder="Stage1 Level '+stage1_level+' Commission">';
            limited_level_div +='<a href="#" class="remove_stage1_level_click" onclick="return remove_stage1_level('+stage1_level+')">Remove</a></div>';
            limited_level_div +='</div>';
            $("#stage1_level_div").append(limited_level_div);
            return false;
      });//end add more level click here
	  ///////////////////////////////////////////////
	  $("#add_more_level_on_stage2").click(function(){
            stage2_level++;
            var limited_level_div='<div class="form-group stage2_level_group" id="stage2_level_'+stage2_level+'">';
            limited_level_div +='<label class="col-lg-3 control-label stage2_level_label">Level '+stage2_level+':</label>';
            limited_level_div +='<div class="col-lg-9">';
            limited_level_div +='<input required value="0" type="text" name="stage_2_level_commission[]" class="form-control stage2_level_input" placeholder="Stage2 Level '+stage2_level+' Commission">';
            limited_level_div +='<a href="#" class="remove_stage2_level_click" onclick="return remove_stage2_level('+stage2_level+')">Remove</a></div>';
            limited_level_div +='</div>';
			
            $("#stage2_level_div").append(limited_level_div);
            
			return false;
      });//end add more level click here
	  //////////////////////////////////////
	  $("#add_more_level_on_stage3").click(function(){
            stage3_level++;
            var limited_level_div='<div class="form-group stage3_level_group" id="stage3_level_'+stage3_level+'">';
            limited_level_div +='<label class="col-lg-3 control-label stage3_level_label">Level '+stage3_level+':</label>';
            limited_level_div +='<div class="col-lg-9">';
            limited_level_div +='<input required value="0" type="text" name="stage_3_level_commission[]" class="form-control stage3_level_input" placeholder="Stage3 Level '+stage3_level+' Commission">';
            limited_level_div +='<a href="#" class="remove_stage3_level_click" onclick="return remove_stage3_level('+stage3_level+')">Remove</a></div>';
            limited_level_div +='</div>';
			
            $("#stage3_level_div").append(limited_level_div);
            
			return false;
      });//end add more level click here
	  
	  $("#add_more_level_on_stage4").click(function(){
            stage4_level++;
            var limited_level_div='<div class="form-group stage4_level_group" id="stage4_level_'+stage4_level+'">';
            limited_level_div +='<label class="col-lg-3 control-label stage4_level_label">Level '+stage4_level+':</label>';
            limited_level_div +='<div class="col-lg-9">';
            limited_level_div +='<input required value="0" type="text" name="stage_4_level_commission[]" class="form-control stage4_level_input" placeholder="Stage4 Level '+stage4_level+' Commission">';
            limited_level_div +='<a href="#" class="remove_stage4_level_click" onclick="return remove_stage4_level('+stage4_level+')">Remove</a></div>';
            limited_level_div +='</div>';
			
            $("#stage4_level_div").append(limited_level_div);
            
			return false;
      });//end add more level click here
	  
	  $("#add_more_level_on_stage5").click(function(){
            stage5_level++;
            var limited_level_div='<div class="form-group stage5_level_group" id="stage5_level_'+stage5_level+'">';
            limited_level_div +='<label class="col-lg-3 control-label stage5_level_label">Level '+stage5_level+':</label>';
            limited_level_div +='<div class="col-lg-9">';
            limited_level_div +='<input required value="0" type="text" name="stage_5_level_commission[]" class="form-control stage5_level_input" placeholder="Stage5 Level '+stage5_level+' Commission">';
            limited_level_div +='<a href="#" class="remove_stage5_level_click" onclick="return remove_stage5_level('+stage5_level+')">Remove</a></div>';
            limited_level_div +='</div>';
			
            $("#stage5_level_div").append(limited_level_div);
            
			return false;
      });//end add more level click here
	  
	  $("#add_more_level_on_stage6").click(function(){
            stage6_level++;
            var limited_level_div='<div class="form-group stage6_level_group" id="stage6_level_'+stage6_level+'">';
            limited_level_div +='<label class="col-lg-3 control-label stage6_level_label">Level '+stage6_level+':</label>';
            limited_level_div +='<div class="col-lg-9">';
            limited_level_div +='<input required value="0" type="text" name="stage_6_level_commission[]" class="form-control stage6_level_input" placeholder="Stage6 Level '+stage6_level+' Commission">';
            limited_level_div +='<a href="#" class="remove_stage6_level_click" onclick="return remove_stage6_level('+stage6_level+')">Remove</a></div>';
            limited_level_div +='</div>';
			
            $("#stage6_level_div").append(limited_level_div);
            
			return false;
      });//end add more level click here
	  
	  
   });//end ready
</script>    
<script>
$(document).ready(function(){
  $("#btn").click(function(){
     
     return true;
  });//end btn click
});//end ready
</script>  
<style>
   input[type="radio"]{
   border: 5px solid;
   border-color: grey;
   width: 20px;
   height: 20px;
   border-radius: 100%;
   }
</style>
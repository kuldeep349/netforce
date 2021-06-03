<script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/uploaders/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/pages/uploader_bootstrap.js"></script>
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
             <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Advertisement Management</span> - Edit Slider Side Bar Image</h4>
         </div>
		 <div class="heading-elements">
            <div class="heading-btn-group">
               <a href="<?php echo site_url().$module_name."/".$controller_name;?>/sliderSideImageList/" class="btn btn-success"><i class="icon-comment-discussion position-left"></i>Back</a>
            </div>
         </div> 
      </div>
	  
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="#">Advertisement Management</li>
            <li class="active">Edit Slider Side Bar Image</li>
         </ul>
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">
      <!-- Horizontal form options -->
      <?php 
         if(!empty($this->session->flashdata('flash_msg')))
         {
         ?>
      <div class="alert alert-success alert-styled-right alert-arrow-right alert-bordered">
         <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
         <!--
            <span class="text-semibold">Well done!</span> Amount Added Successfully in User Wallet
            -->
         <?php 
            echo $this->session->flashdata('flash_msg');
            ?>
      </div>
      <?php    
         }
         ?>
      <div class="row">
         <div class="col-md-12">
            <!-- Basic layout-->
            <div class="panel panel-flat">
               <div class="panel-heading">
                  <h5 class="panel-title">Edit Slider Side Bar Image</h5>
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
                  echo form_open(site_url().$module_name."/".$controller_name."/editSliderSideBarImage/".ID_encode($slider->id),array('method'=>'post','class'=>'form-horizontal', 'enctype'=>'multipart/form-data'));
				  
                  
				  $caption_text=(!empty($slider->caption_text))?$slider->caption_text:null;

				  ?>
               <div class="panel-body">
                  
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Sidebar Image:</label>
                     <div class="col-lg-9">
                        <img width='150' src="<?php echo base_url();?>eshop_images/slider_sidebar_images/<?php echo $slider->sidebar_image;?>" /><br><br>
						<input value="<?php echo $slider->sidebar_image;?>" name="sidebar_old_image" type="hidden">
						<input name="sidebar_image" type="file" class="file-input">
                     </div>
                  </div>
				  
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Caption Text:</label>
                     <div class="col-lg-9">
                        <textarea required="" id="caption_text" name="caption_text"  class="col-lg-3 control-label"><?php echo $caption_text;?></textarea>
                     </div>
                  </div>
                  <div class="text-right">
                     <button type="submit" name="btn" value="edit" class="btn btn-primary">Add <i class="icon-arrow-right14 position-right"></i></button>
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
<script>
   CKEDITOR.replace('caption_text');
</script>
<script>
  $(document).ready(function(){
  	$(".file-caption-name").text("No Profile Pic Selected");
  });//end ready
</script>	
<!-- Main content -->
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header page-header-default">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Marquee</span> - Settings</h4>
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
            <li><a href="#">Setings</a></li>
            <li class="active">Marquee Settings</li>
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
      <form action="<?php echo site_url();?>admin/setting/marqueeManagement" method="post">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <?php 
                  if(!empty($text[0]))
                  {
                  ?>
               <h5 class="panel-title">Edit Marquee</h5>
               <?php   
                  }
                  else 
                  {
                  ?>
               <h5 class="panel-title">Add New Marquee</h5>
               <?php   
                  }
                  ?>
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
            </div>
            <?php 
               if(!empty($text[0]))
               {
               ?>
            <div class="panel-body">
               <div class="row">
                  <div class="col-lg-10">
                     <input type="text" name="data" value="<?php echo $text[0]['text'];?>" required="true" class="form-control" placeholder="Enter Text Here">
                     <input type="hidden" name="id" value="<?php echo $text[0]['id'];?>">
                  </div>
                  <div class="col-md-2">
                     <button type="submit" name="btn" value="add" class="btn btn-primary"><i class="icon-cog3 position-left"></i>Edit Marquee</button>
                  </div>
               </div>
            </div>
            <?php    
               }
               else 
               {
               ?>
            <div class="panel-body">
               <div class="row">
                  <div class="col-lg-10">
                     <input type="text" name="data" required="true" class="form-control" placeholder="Enter Text Here">
                  </div>
                  <div class="col-md-2">
                     <button type="submit" name="btn" value="add" class="btn btn-primary"><i class="icon-cog3 position-left"></i> Add Marquee</button>
                  </div>
               </div>
            </div>
            <?php    
               }
               ?>
         </div>
      </form>

      <form action="<?php echo site_url();?>admin/setting/marqueeManagement" method="post">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <?php 
                  if(!empty($text[1]))
                  {
                  ?>
               <h5 class="panel-title">Edit Marquee2</h5>
               <?php   
                  }
                  else 
                  {
                  ?>
               <h5 class="panel-title">Add New Marquee</h5>
               <?php   
                  }
                  ?>
               <?php 
                  if(!empty($this->session->flashdata('flash_msg')))
                  {
                  ?>
               <!-- <div class="alert alert-success alert-styled-right alert-arrow-right alert-bordered">
                  <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                  <?php //echo $this->session->flashdata('flash_msg');?>
               </div> -->
               <?php    
                  }
                  ?>
            </div>
            <?php 
               if(!empty($text[1]))
               {
               ?>
            <div class="panel-body">
               <div class="row">
                  <div class="col-lg-10">
                     <input type="text" name="data" value="<?php echo $text[1]['text'];?>" required="true" class="form-control" placeholder="Enter Text Here">
                     <input type="hidden" name="id" value="<?php echo $text[1]['id'];?>">
                  </div>
                  <div class="col-md-2">
                     <button type="submit" name="btn" value="add" class="btn btn-primary"><i class="icon-cog3 position-left"></i>Edit Marquee</button>
                  </div>
               </div>
            </div>
            <?php    
               }
               else 
               {
               ?>
            <div class="panel-body">
               <div class="row">
                  <div class="col-lg-10">
                     <input type="text" name="data" required="true" class="form-control" placeholder="Enter Text Here">
                  </div>
                  <div class="col-md-2">
                     <button type="submit" name="btn" value="add" class="btn btn-primary"><i class="icon-cog3 position-left"></i> Add Marquee</button>
                  </div>
               </div>
            </div>
            <?php    
               }
               ?>
         </div>
      </form>
      <!-- Footer -->
      <?php $this->load->view('common/footer-text') ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
<!-- /content wrapper -->
<script>
   function confirmChangeStatus()
   {
   
      if(window.confirm('Are you sure, you want to change the status!'))
      {
         return true;
      }
      else
      {
         return false;
      }
   }
   function confirmDelete()
   {
   
      if(window.confirm('Are you sure, you want to delete the currency!'))
      {
         return true;
      }
      else
      {
         return false;
      }
   }
</script>
<link href="<?php echo base_url();?>user_assets/css/styles.css" rel="stylesheet" type="text/css">
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">My Genealogy Management</span> - <?php echo $title;?></h4>
         </div>
         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>user"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">My Genealogy Management</li>
            <?php echo $breadcrumb;?>
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
                  <h5 class="panel-title"><?php echo $title;?></h5>
                  <div class="heading-elements">
                     <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                     </ul>
                  </div>
                  <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
               </div>
               <!--<form method="post" class="form-horizontal">-->                        
               <div class="panel-body">
                  <div class="row">
                     <div class="col-md-12">
                <div id="top-tree">
                        <div class="tree">
                           <ul>
                              <li>
                                 <a href="javascript:void(0)">
                                    <p><img src="<?php echo base_url();?>images/stage1.jpg" width="100"></p>
                                    <p><?php echo $main_user_id;?></p>
                                    <p><?php echo $main_username;?></p>
                                 </a>
                                 <ul>
                                     <?php
                                     //pr($level1_info);
                                    foreach($level1_info as $key=>$val)
                                    {
                                     ?>
                                    <li>
                                       <a
                                          <?php if(!empty($val->user_id))
                                             {
                                             ?>
                                          href="<?php echo site_url();?>user/MyGenealogy1/feederStagetree/<?php echo ID_encode($val->user_id);?>"
                                          <?php    
                                             }
                                             else
                                             {
                                             ?>
                                          href="javascript:void(0)"
                                          <?php   
                                             } 
                                             ?>
                                          >
                                          <p><img src="<?php echo base_url();?>images/stage1.jpg" width="100"></p>
                                          <p><?php echo (!empty($val->username))?$val->username:'No User on level1';?></p>
                                          <p><?php echo (!empty($val->user_id))?$val->user_id:'<br>';?></p>
                                       </a>
                                       <ul>
                                           <?php
                                             //pr($level1_info);
                                            
                                            foreach($level2_info[$key] as $key1=>$val1)
                                            {
                                             ?>
                                            <li>
                                               <a
                                                  <?php if(!empty($val1->user_id))
                                                     {
                                                     ?>
                                                  href="<?php echo site_url();?>user/MyGenealogy1/feederStagetree/<?php echo ID_encode($val->user_id);?>"
                                                  <?php    
                                                     }
                                                     else
                                                     {
                                                     ?>
                                                  href="javascript:void(0)"
                                                  <?php   
                                                     } 
                                                     ?>
                                                  >
                                                  <p><img src="<?php echo base_url();?>images/stage1.jpg" width="100"></p>
                                                  <p><?php echo (!empty($val1->username))?$val1->username:'No User on level2';?></p>
                                                  <p><?php echo (!empty($val1->user_id))?$val1->user_id:'<br>';?></p>
                                               </a>
                                               
                                            </li>
                                           <?php
                                           }
                                           ?>
                                       </ul>
                                    </li>
                                   <?php
                                   }
                                   ?>
                                 </ul>
                              </li>
                           </ul>
                        </div>
                </div>  
                    </div>
                  </div>
               </div>
            </div>
            <!-- /vertical form options -->
            <!-- Footer -->
            <!-- /footer -->
         </div>
         <?php
            $this->load->view("common/footer-text");
            ?>
         <!-- /content area -->
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
   });//end ready
</script>
<style>
   .tree li a
   {
   padding:0px;
   }
   #top-tree
   {
   
   height: 700px;
   overflow-x: scroll;
  
   }
   .tree
   {
   width:1400px;  
   }
</style>
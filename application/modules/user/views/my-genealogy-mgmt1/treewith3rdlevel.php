<link href="<?php echo base_url();?>user_assets/css/styles.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>user_assets/css/treeflex.css" rel="stylesheet" type="text/css">

<style>
  

  /* make the horizontal and vertical connectors thick and change their color */

  
</style>
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
                <div id="top-tree1">
                        <div class="tf-tree tf-custom">
                           
                           <ul>
                              <li>
                                  <span class="tf-nc">
                                      <span class="tooltiptext">
                                                <p>Name:<?php echo $main_user_id;?></p>
                                                <p>MemberID:<?php echo $main_username;?></p>
                                            </span>
                                 <a href="javascript:void(0)">
                                    <p><img src="<?php echo base_url();?>images/stage1.jpg" width="100"></p>
                                    <p><?php echo $main_user_id;?></p>
                                    <p><?php echo $main_username;?></p>
                                 </a>
                                 </span>
                                 <ul>
                                    <?php
                                     //pr($level1_info);
                                    foreach($level1_info as $key=>$val)
                                    {
                                     ?>
                                    <li>
                                        <span class="tf-nc">
                                            <span class="tooltiptext">
                                                <p>Name:<?php echo (!empty($val->username))?$val->username:'No User on level1';?></p>
                                                <p>MemberID:<?php echo (!empty($val->user_id))?$val->user_id:'<br>';?></p>
                                            </span>
                                       <a
                                          <?php if(!empty($val->user_id))
                                             {
                                             ?>
                                          href="<?php echo site_url();?>user/MyGenealogy1/<?php echo $action;?>/<?php echo ID_encode($val->user_id);?>"
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
                                          <p ><?php echo (!empty($val->username))?$val->username:'No User on level1';?></p>
                                          <p ><?php echo (!empty($val->user_id))?$val->user_id:'<br>';?></p>
                                       </a>
                                       </span>
                                       <ul>
                                           <?php
                                             //pr($level1_info);
                                            
                                            foreach($level2_info[$key] as $key1=>$val1)
                                            {
                                             ?>
                                            <li>
                                                <span class="tf-nc">
                                                    <span class="tooltiptext">
                                                        <p>Name:<?php echo (!empty($val1->username))?$val1->username:'No User on level1';?></p>
                                                        <p>MemberID:<?php echo (!empty($val1->user_id))?$val1->user_id:'<br>';?></p>
                                                    </span>
                                               <a
                                                  <?php if(!empty($val1->user_id))
                                                     {
                                                     ?>
                                                  href="<?php echo site_url();?>user/MyGenealogy1/<?php echo $action;?>/<?php echo ID_encode($val1->user_id);?>"
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
                                               </span>
                                               <ul>
                                           <?php
                                            // pr($level3_info);
                                            $thirdlevel=$controller->showusers($val1->user_id,$table);
                                           // pr($thirdlevel);
                                            foreach($thirdlevel as $key2=>$val2)
                                            {
                                             ?>
                                            <li>
                                                <span class="tf-nc">
                                                    <span class="tooltiptext">
                                                        <p>Name:<?php echo (!empty($val2->username))?$val2->username:'No User on level1';?></p>
                                                        <p>MemberID:<?php echo (!empty($val2->user_id))?$val2->user_id:'<br>';?></p>
                                                    </span>
                                               <a
                                                  <?php if(!empty($val2->user_id))
                                                     {
                                                     ?>
                                                  href="<?php echo site_url();?>user/MyGenealogy1/<?php echo $action;?>/<?php echo ID_encode($val2->user_id);?>"
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
                                                  <p><?php echo (!empty($val2->username))?$val2->username:'No User on level2';?></p>
                                                  <p><?php echo (!empty($val2->user_id))?$val2->user_id:'<br>';?></p>
                                               </a>
                                               </span>
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
   $(document).ready(function() {
   $('[data-toggle="popover"]').popover({
      placement: 'right',
      trigger: 'hover'
   });
});//end ready
</script>
<style>
.arrow {
    top: -11px;
    left: 50%;
    margin-left: -11px;
    border-top-width: 0;
    border-bottom-color: #999;
    border-bottom-color: rgba(0,0,0,.25);
}
.arrow, .arrow:after {
    position: absolute;
    display: block;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
}
.tf-nc .tooltiptext {
border:1px dotted;
  visibility: hidden;
  width: 100%;
  background-color: #fff;
  color: #000;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  left:95%;
}

.tf-nc:hover .tooltiptext {
  visibility: visible;
}
.tf-nc p
{
    text-align: center;font-size: 12px;color: #000;
}
.tf-tree .tf-nc, .tf-tree .tf-node-content {

    border:none;
}
.bs-example{
    	margin: 150px 50px;
    }
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
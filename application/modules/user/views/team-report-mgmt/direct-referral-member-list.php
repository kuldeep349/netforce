<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Member Management</span> - <?php echo $title;?></h4>
         </div>
         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active"><a href="#">Member Management</a></li>
            <li class="active"><?php echo $breadcrumb; ?></li>
         </ul>
         <ul class="breadcrumb">
         </ul>
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content animate-panel">

               <div class="row">
                <?php echo $this->session->flashdata('flash_msg');?>
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
                     </div>
                    
                  <div class="row">   
                           <?php 
                           if(!empty($direct_member) && count($direct_member)>0)
                           {
                              $sno=1;
                              foreach($direct_member as $member)
                              {
                                if($member->active_status=='1')
                                {
                                 $status_label="Active";
                                 $status_label_class="label-success";
                                }
                                else 
                                {
                                 $status_label="Inactive";
                                 $status_label_class="label-warning";
                                }
                           ?>
                           
            <div class="col-lg-3 wow zoomIn " data-wow-duration=".4s" data-wow-delay=".6s">
         <div class="hpanel hgreen contact-panel">
            <div class="panel-body">
	            <span class="label label-success pull-right">NEW</span>
               <?php ?>	
               <img alt="logo" class="img-circle m-b" src="<?php echo base_url();?>images/<?php echo ($member->image)?$member->image:'noimage.jpeg';?>" width="50">
               <h3><a href="<?php echo site_url();?>user/TeamReport/directReferralMemberList/<?php echo base64_encode($member->user_id);?>"><?php echo $member->first_name.' '.$member->last_name?></a></h3>
               <div class="text-muted font-bold m-b-xs"><img src="<?php echo base_url();?>/flags/flag-of-<?php echo $member->country;?>.jpg" style="width:16px;height:11px"> <?php echo $member->country;?></div>
               <p>Username: <strong><?php echo $member->username;?> </strong><br>
               Member ID: <strong><?php echo $member->user_id;?> </strong><br>
                 Rank: <strong><?php echo $member->rank_name;?> </strong><br>
                 <!-- Registered On: <strong><?php //echo date('m/d/Y H:i:s',strtotime($member->business_plan_update_date));?> </strong><br> -->
                 Registered On: <strong><?php echo date('m/d/Y H:i:s',strtotime($member->auto_registration_date));?> </strong><br>
                 Gender: <strong><?php echo ($member->gender)?'Male':'Female';?> </strong><br>
               </p>
            </div>
            <div class="panel-footer contact-footer">
               <div class="row">
                <div class="col-md-4 border-right">
                     <div class="contact-stat"><span>Referrals Yesterday: </span> <strong>0</strong></div>
                  </div>
                  <div class="col-md-4 border-right">
                     <div class="contact-stat"><span>Membership: </span> <strong><?php echo get_package_name($member->pkg_id);?></strong></div>
                  </div>
                  <div class="col-md-4 ">
                     <div class="contact-stat"><span>Referrals Total: </span> <strong><?php echo $callfunc->totalDirectCount($member->user_id);?></strong></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
       
       
         
                           <?php       
                               $sno++;  
                              }
                           }
                           ?>
                       </div> 
                  </div>
               </div>
               
               <div class="row">
                 <div class="col-md-6">
                   <div class="panel bg-primary">
                        <div class="panel-heading">
                           <h6 class="panel-title">Total Direct Member</h6>
                        </div>
                        <div class="panel-body">
                           <?php echo $total_direct_member;?>
                        </div>
                     </div>
                 </div>
                 <div class="col-md-6">
                   <div class="panel bg-primary">
                        <div class="panel-heading">
                           <h6 class="panel-title">Total Team Member</h6>
                        </div>
                        <div class="panel-body">
                           <?php echo $total_team_member;?>
                        </div>
                     </div>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-12">
                   <div class="panel panel-flat border-left-xlg border-left-success">
                        <div class="panel-heading">
                           <h6 class="panel-title"><span class="text-semibold">Graph of the Direct Member Report</span> </h6>
                        </div>
                        <div class="panel-body">
                        Graph will be displayed here
                        </div>
                     </div>
                 </div>
               </div>
               <!-- Pickadate picker -->
            
               <!-- /pickadate picker -->


               <!-- Pickatime picker -->
               
               <!-- /pickadate picker -->


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
<script>
   function deleteConfirm()
   {
   
   	if(window.confirm("Are you sure, you want to delete"))
       return true;
     else 
       return false;
   }
</script>
<script>
new WOW().init();

$('.reset').click(function(){
  new WOW().init();
})
</script>
<style>
.animated-panel {
  -webkit-animation-duration: .5s;
  animation-duration: .5s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes zoomIn {
  0% {
    opacity: 0;
    -webkit-transform: scale3d(.3, .3, .3);
    transform: scale3d(.3, .3, .3);
  }

  50% {
    opacity: 1;
  }
}

@keyframes zoomIn {
  0% {
    opacity: 0;
    -webkit-transform: scale3d(.3, .3, .3);
    -ms-transform: scale3d(.3, .3, .3);
    transform: scale3d(.3, .3, .3);
  }

  50% {
    opacity: 1;
  }
}

.zoomIn {
  -webkit-animation-name: zoomIn;
  animation-name: zoomIn;
}

.hpanel {
    background-color: none;
    border: none;
    box-shadow: none;
    margin-bottom: 25px;
}
.hpanel.hgreen .panel-body {
    border-top: 2px solid #62cb31;
}
.contact-panel img {
    width: 76px;
    height: 76px;
}
.contact-panel p {
    font-size: 11px;
    line-height: 16px;
    margin-bottom: 0;
}
.hpanel > .panel-footer, .hpanel > .panel-section {
    color: inherit;
    border: 1px solid #e4e5e7;
    border-top: none;
    font-size: 90%;
    background: #f7f9fa;
    padding: 10px 15px;
}
.hpanel .panel-body {
    background: #fff;
    border: 1px solid #e4e5e7;
    border-radius: 2px;
    padding: 20px;
    position: relative;
}
</style>
<!-- Main content -->
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header page-header-default">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Member</span> - Block/Unblocak User</h4>
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
            <li><a href="#">Members</a></li>
            <li class="active">Block/Unblock Members</li>
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
      <!-- Daterange picker -->
      <!-- /daterange picker -->
      <div class="panel panel-flat">
         <div class="row">
            <div class="panel-heading">
               <h5 class="panel-title">Block/Unblock Member</h5>
            </div>
            <div class="col-md-3">
               <div class="content-group-lg">
                  <input type="text" class="form-control" placeholder="Please Enter User Id">
               </div>
            </div>
            <div class="col-md-2">
               <button type="button" class="btn btn-primary"><i class="icon-cog3 position-left"></i> Search Result</button>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">Inactive Members</h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                     <li><a data-action="reload"></a></li>
                     <li><a data-action="close"></a></li>
                  </ul>
               </div>
            </div>
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
            <table class="table datatable-responsive">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Member Name</th>
                     <th>User Id</th>
                     <th>Joining Date</th>
                     <th>Sponsor Id</th>
                     <th>Sponsor Name</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  if(!empty($all_members) && count($all_members)>0)
                  {
                     $sno=0;
                     foreach ($all_members as $member) 
                     {
                     $sno++;  
                     $active_status_class=($member->active_status=='1')?'label-success':'label-danger';
                     $active_status_label=($member->active_status=='1')?'Active':'Inactive';
                     //icon-blocked  icon-checkmark  
                     $status_change_icon=($member->active_status=='1')?'icon-blocked':'icon-checkmark';
                     $status_change_tooltip=($member->active_status=='1')?'block':'Unblock';

                  ?>
                  <tr>
                     <td><?php echo $sno;?></td>
                     <td><?php echo $member->username;?></td>
                     <td><?php echo $member->user_id;?></td>
                     <td><?php echo date(date_formats(),strtotime($member->registration_date));?></td>
                     <td><?php echo $member->sponsor_user_id;?></td>
                     <td><?php echo $member->sponsor_name;?></td>
                     <td><span class="label <?php echo $active_status_class;?>"><?php echo $active_status_label;?></span></td>
                     <td>
                        <ul class="icons-list">
                           <li>
                              <a onclick="return changeStatusConfirm('<?php echo $member->active_status;?>');" href="<?php echo site_url();?>admin/member/changeStatus/<?php echo ID_encode($member->user_id);?>" data-popup="tooltip" title="" data-original-title="<?php echo $status_change_tooltip;?>"><i class="<?php echo $status_change_icon;?>"></i></a>
                           </li>
                           <li>
                              <a href="<?php echo site_url();?>admin/member/editMember/<?php echo ID_encode($member->user_id);?>" data-popup="tooltip" title="" data-original-title="Edit Member Profile"><i class="icon-pencil7"></i></a>
                           </li>
                           <!--
                           <li>
                              <a onclick="return deleteConfirm();" href="<?php //echo site_url();?>admin/member/deleteMember/<?php //echo ID_encode($member->id);?>" data-popup="tooltip" title="" data-original-title="Delete Member"><i class="icon-trash"></i></a>
                           </li>
                           -->
                        </ul>
                     </td>
                  </tr>
                  <?php    
                     }
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
      <!-- Footer -->
      <?php $this->load->view('common/footer-text') ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
<!-- /main content -->
<script>

function changeStatusConfirm(status)
{
  var statement; 
  if(status=='1')
  {
   statement='Are you sure, you want to block the member';
  }
  else 
  {
   statement='Are you sure, you want to Unblock the member';

  }
  if(window.confirm(statement))
   return true;
  else
   return false;

}
</script>
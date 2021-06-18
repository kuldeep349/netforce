
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
<!-- Main content -->
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header page-header-default">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Member</span> - View All Member</h4>
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
            <li class="active">All Members</li>
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
      <div class="row">
         <div class="panel panel-flat">
            
            <div class="panel-heading">

               <h5 class="panel-title">View All Member</h5>
              
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
            <div style="padding: 21px;">
               <select id="ddval">
                  <option>10</option>
                  <option>50</option>
                  <option>100</option>
                  <option>500</option>
               </select>
            </div>
            <div class="table-responsive">
            
               <table class="table table-responsive" id="example">
                  <thead>
                     <tr>
                        <th>Sr.No</th>
                        <th>Member Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Id</th>
                        <th>Joining Date</th>
                        <th>Sponsor Id</th>
                        <th>Sponsor Name</th>
                        <th>Upliine</th>
                        <th>Email</th>
                        <th>Contact Address</th>
                        <th>Phone</th>
                        <th>Rank Title</th>
                        <th>Membership Package</th>
                        <th>Bank Details</th>
                        <th>Status</th>
                        <th>Payment Method</th>
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

                     ?>
                     <tr>
                        <td><?php echo $sno;?></td>
                        <td><?php echo $member->username;?></td>
                        <td><?php echo $member->first_name;?></td>
                        <td><?php echo $member->last_name;?></td>
                        <td><?php echo $member->user_id;?></td>
                        <!-- <td><?php //echo date(date_formats(),strtotime($member->registration_date));?></td> -->
                        <td><?php echo $member->auto_registration_date;?></td>
                        <td><?php echo $member->sponsor_user_id;?></td>
                        <td><?php echo $member->sponsor_name;?></td>
                        <td><?php echo $member->nom_name;?></td>
                        <td><?php echo $member->email;?></td>
                        <td>
                           <?php echo $member->address_line1;?><br>
                           <?php echo $member->state;?><br>
                           <?php echo $member->country;?><br>
                        </td>
                        <td><?php echo $member->contact_no;?></td>
                        <td><?php echo $member->rank_name;?></td>
                        <td><?php echo $member->title;?></td>
                        <td>
                           Bank Name :<?php echo $member->bank_name;?><br>
                           Branch Name :<?php echo $member->branch_name;?><br>
                           Account :<?php echo $member->account_no;?><br>
                           IFSC :<?php echo $member->ifsc_code;?><br>
                           Account Name :<?php echo $member->account_holder_name;?><br>
                        </td>
                        <!-- <td><a href="<?php echo site_url();?>admin/MyGenealogy/feederStageTree/<?php echo ID_encode($member->user_id);?>" target="_blank">View Genealogy</a></td>
                        <td><a title="View Direct Tree" href="<?php echo site_url();?>admin/MyGenealogy/directReferralTree/<?php echo ID_encode($member->user_id);?>">Referral Tree</a></td> -->
                        <td><span class="label <?php echo $active_status_class;?>"><?php echo $active_status_label;?></span></td>
                  <td><?php echo $member->registration_method_name;?></td>
                        <td>
                           <ul class="icons-list">
                              <li>
                                 <a href="<?php echo site_url();?>admin/member/editMember/<?php echo ID_encode($member->user_id);?>" data-popup="tooltip" title="" data-original-title="Edit Member Profile"><i class="icon-pencil7"></i></a>
                              </li>
                              <li>
                                 <a target="_blank" href="<?php echo site_url();?>user/auth/loginViaAdmin?username=<?= $member->username;?>&password=<?= $member->password;?>" data-popup="tooltip" title="" data-original-title="Edit Member Profile"><i class="icon-eye"></i></a>
                              </li>
                              <!--
                              <li>
                                 <a onclick="return deleteConfirm();" href="<?php echo site_url();?>admin/member/deleteMember/<?php //echo ID_encode($member->id);?>" data-popup="tooltip" title="" data-original-title="Delete Member"><i class="icon-trash"></i></a>
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
      </div>
      <!-- Footer -->
      <?php $this->load->view('common/footer-text') ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
<!-- /main content -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script>

function deleteConfirm(){

   if(window.confirm('Are you sure, you want to delete the member'))
   {
      return true;
   }
   else
   {
      return false;
   }
}

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print',
        ],
    } );
} );

$(document).on('change','#ddval',function(){
   $('#example').DataTable().page.len($(this).val()).draw();
})

</script>
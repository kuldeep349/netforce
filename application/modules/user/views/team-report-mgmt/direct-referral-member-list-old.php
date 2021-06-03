<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Wallet Management</span> - <?php echo $title;?></h4>
         </div>
         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active"><a href="#">Wallet Management</a></li>
            <li class="active"><?php echo $title; ?></li>
         </ul>
         <ul class="breadcrumb">
         </ul>
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">

               <div class="row">
                <?php echo $this->session->flashdata('flash_msg');?>
                 <div class="panel panel-flat">
                     <div class="panel-heading">
                        <h5 class="panel-title">Direct Member Report</h5>
                        <div class="heading-elements">
                           <ul class="icons-list">
                              <li><a data-action="collapse"></a></li>
                              <li><a data-action="reload"></a></li>
                              <li><a data-action="close"></a></li>
                           </ul>
                        </div>
                     </div>
                    
                     <table class="table datatable-responsive">
                        <thead>
                           <tr>
                              <th>Sr.No</th>
                              <th>User Id</th>
                              <th>User Name</th>
                              <th>Full Name</th>
                              <th>Contact No.</th>
                              <th>Rank</th>
                              <th>Status</th>
                              <th>Registration Method</th>
                              <th>Registration Date</th>
                           </tr>
                        </thead>
                        <tbody>
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
                           <tr>
                              <td><?php echo $sno;?></td>
                              <td><?php echo $member->user_id;?></td>
                              <td><?php echo $member->username;?></td>
                              <td><?php echo $member->first_name." ".$member->last_name;;?></td>
                              <td><?php echo $member->contact_no;?></td>
                              <td><?php echo $member->rank_name;?></td>
                              <td><span class="label <?php echo $status_label_class;?>"><?php echo $status_label;?></span></td>
                              <td><?php echo $member->registration_method_name;?></td>
                              <td><?php echo date(date_formats(),strtotime($member->registration_date));?></td>
                           </tr>
                           <?php       
                               $sno++;  
                              }
                           }
                           ?>
                        </tbody>
                     </table>
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
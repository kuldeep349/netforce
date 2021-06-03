<!-- Main content -->
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header page-header-default">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User E-Wallet</span> - Pending Deposit Request</h4>
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
            <li><a href="#">User Ewallet</a></li>
            <li class="active">Pending Deposit Request</li>
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
      <?php 
      if(!empty($this->session->flashdata('flash_msg')))
      {
      ?>
      <div class="alert alert-success alert-styled-right alert-arrow-right alert-bordered">
         <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
         <!--<span class="text-semibold">Well done!</span> Amount Added Successfully in User Wallet-->
         <?php echo $this->session->flashdata('flash_msg');?>
      </div>
      <?php   
      }
      ?>
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h5 class="panel-title">Pending Deposit Request</h5>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-md-3">
                  <div class="content-group-lg">
                     <input type="text" class="form-control" placeholder="Please Enter User Id">
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="content-group-lg">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate" placeholder="Please Select Start Date">
                     </div>
                  </div>
               </div>
               <div class="col-md-1">
                  <div class="panel-heading">
                     <p>To</p>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="content-group-lg">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate" placeholder="Please Select End Date Date">
                     </div>
                  </div>
               </div>
               <div class="col-md-2">
                  <button type="button" class="btn btn-primary"><i class="icon-cog3 position-left"></i> Search Result</button>
               </div>
            </div>
         </div>
      </div>
      <!-- /daterange picker -->
      <div class="row">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">Pending Deposit Request</h5>
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
                     <th>Request Id</th>
                     <th>User Id</th>
                     <th>User Name</th>
                     <th>Amount Requested</th>
                     <th>Date </th>
                     <th>Proof of Payment</th>
                     <th>Payment Method</th>
                     <th>Status</th>
                     <th>Purpose</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  $total_deposit_request_pending_amount=0;
                  if(!empty($other_deposit_request) && count($other_deposit_request)>0)
                  {
                     $sno=0;
                     foreach($other_deposit_request as $request)
                     {
                     $sno++;
                     $total_deposit_request_pending_amount=$total_deposit_request_pending_amount+$request->request_amount;
                  ?>
                  <tr>
                     <td><?php echo $sno;?></td>
                     <td><?php echo $request->request_id;?></td>
                     <td><?php echo $request->user_id;?></td>
                     <td><?php echo $request->username;?></td>
                     <td><?php echo currency()." ".$request->request_amount;?></td>
                     <td><?php echo $request->created_at;?></td>
                     <td><?php echo $request->payment_method == 1 ? '<a href="'.site_url('images/'.$request->file_proof).'" target="_blank">View Proof</a>' : '' ;?></td>
                     <td><span class=""><?php echo $request->payment_method == 1 ? 'Bank Wire' : 'Debit Card';?></span></td>
                     <td><span class=""><?php echo $request->status == 1 ? 'Approved' : 'Pending';?></span></td>
                     <td><span class=""><?php echo $request->purpose;?></span></td>
                     <td class="text-center">
                        <ul class="icons-list">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="icon-menu9"></i>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                 <!-- <li><a onclick="return confirmApproval();" href="<?php echo site_url().'admin/UserWallet/approveDepositRequest/'.ID_encode($request->id);?>"><i class="icon-thumbs-up2"></i> Approve Request</a></li>
                                 <li><a onclick="return confirmCancelRequest();" href="<?php echo site_url().'admin/UserWallet/cancelWalletDepositRequest/'.ID_encode($request->id);?>"><i class="icon-file-excel"></i> Cancel Request</a></li> -->
                              </ul>
                           </li>
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
      <div class="row">
         <div class="col-md-6">
            <div class="panel bg-primary">
               <div class="panel-heading">
                  <h6 class="panel-title">Total Deposit Request Pending Amount</h6>
               </div>
               <div class="panel-body">
                  <?php echo currency()." ".$total_deposit_request_pending_amount;?>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-flat border-left-xlg border-left-success">
               <div class="panel-heading">
                  <h6 class="panel-title"><span class="text-semibold">Graph </span> </h6>
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
      <?php $this->load->view('common/footer-text') ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
<!-- /main content -->

<script>
function confirmApproval()
{

   if(window.confirm('Are you sure, you want to approve deposit request'))
      return true;
   else 
      return false;
}
function confirmCancelRequest()
{

   if(window.confirm('Are you sure, you want to cancel deposit request'))
      return true;
   else 
      return false;
}
</script>
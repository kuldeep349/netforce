<!-- Main content -->
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header page-header-default">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Visitor Shopping</span> - All Orders</h4>
         </div>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
            <li><a href="#">Visitor Shopping</a></li>
            <li class="active">All Orders</li>
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
      <div class="panel panel-flat" style="display:none;">
         <div class="panel-heading">
            <h5 class="panel-title">All Orders</h5>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-md-3">
                  
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
               <h5 class="panel-title">Approved Deposit Request</h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                     <li><a data-action="reload"></a></li>
                     <li><a data-action="close"></a></li>
                  </ul>
               </div>
            </div>
            <table class="table">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Order Id</th>
                     <th>Amount</th>
                     <th>Payment method</th>
                     <th>Shipping Country</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                    <?php
                        $i = ($segament) + 1;
                        foreach ($orders as $key => $order) {
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td>Rs.<?php echo $order['order_id'];?></td>
                                <td><?php echo $order['amount'];?></td>
                                <td><?php echo $order['payment_method'] == 1 ? 'Bank wire' : 'Debit card';?></td>
                                <td><?php echo $order['shipping_country'];?></td>
                                <td><?php echo $order['first_name'] . ' ' .$order['last_name'] ;?></td>
                                <td><?php echo $order['email'];?></td>
                                <td><?php echo $order['phone'];?></td>
                                <td><?php echo $order['status'] == 0 ? 'Pending' : 'Approved';?></td>
                                <td><a href="<?php echo base_url('admin/visitor_shopping/orderDetails/'.$order['order_id'])?>" class="btn btn-success">View</a></td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
               </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="tableView_info" role="status" aria-live="polite">
                        Showing <?php echo ($segament + 1) .' to  '.($i -1);?> of
                        <?php echo $total_records;?> entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="tableView_paginate">
                        <?php
                        echo $this->pagination->create_links();
                        ?>
                    </div>
                </div>
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
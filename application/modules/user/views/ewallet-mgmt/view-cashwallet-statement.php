<div class="content-wrapper">
				<!-- Page header -->
               <div class="page-header">
                  <div class="page-header-content">
                     <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Ewallet Management</span> - Ewallet Statements</h4>
                     </div>
                  <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                  <div class="breadcrumb-line">
                     <ul class="breadcrumb">
                        <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>
                        <li class="active">Ewallet Statements</li>
                     </ul>
					      <ul class="breadcrumb">
                     </ul>
                     <?php
                     $typearr=array('cash'=>'C','referral'=>'R','repurchase'=>'RE','saving'=>'S','promo'=>'B');
                     //echo $type1;
                     
                     if($type1=='cash' || $type1=='referral' || $type1=='repurchase' || $type1=='saving' || $type1=='promo')
                     {
                     ?>
                     <a class="btn btn-success pull-right" href="<?php echo base_url();?>user/payout/withdrawBalance<?php echo $typearr[$type1];?>">
                        Transfer <?php echo $type1;?> bonus to E-Wallet
                     </a>
                     <?php
                     }
                     ?>
                  </div>
               </div>
               <!-- /page header -->
               <!-- Content area -->
               <div class="content">
				<?php echo $this->session->flashdata('flash_msg');?>
                 <div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Ewallet Statements</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						<a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
						<div class="table-responsive">
							<table class="table datatable-responsive" id="example">
								<thead>
									<tr>
										<th>Sr.</th>
										<th>Transaction No.</th>
										<th>Title</th>
										<th>Balance</th>
										<th>Amount</th>
										<th>Status</th>
										<th>Description</th>
										<th>Date</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
                  <!-- Footer -->
                  <?php
                  $this->load->view("common/footer-text");
                  ?>
                  <!-- /footer -->
               </div>
               <!-- /content area -->
            </div>
<script>
$(document).ready(function() {
   var table = $('#example').DataTable( {
		"destroy":true,
        "processing": true,
        "serverSide": true,
        "ajax":"<?php echo site_url();?>user/ewallet/ajax_cashwallet_statement/<?php echo $type;?>",
         "columnDefs"      : [{ 'className': 'control', 'orderable': false, 'targets':[]}, 
                    {'orderable': false, 'targets': [] }, 
                    {"targets": [ ],"visible": false,"searchable": false}
                ]
    } );
   //  table.column( 3 ).data().sum();
} );
</script>
<script>
  function deleteConfirm()
  {

  	if(window.confirm("Are you sure, you want to delete"))
      return true;
    else 
      return false;
  }
</script>            
<div class="content-wrapper">
				<!-- Page header -->
               <div class="page-header">
                  <div class="page-header-content">
                     <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Shopping Ewallet Management</span> - Shopping Ewallet Statements</h4>
                     </div>
                  <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                  <div class="breadcrumb-line">
                     <ul class="breadcrumb">
                        <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>
						<li class="active"><a href="#">Shopping Wallet Management</a></li>
                        <li class="active">Shopping Ewallet Statements</li>
                     </ul>
					 <ul class="breadcrumb">
                     </ul>
                  </div>
               </div>
               <!-- /page header -->
               <!-- Content area -->
               <div class="content">
				<?php echo $this->session->flashdata('flash_msg');?>
                 <div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Shopping Ewallet Statements</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						<a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
						<div class="table-responsive">
							<table class="table datatable-html">
								<thead>
									<tr>
										<th>Sr.</th>
										<th>Transaction No.</th>
										<th>Title</th>
										<th>Balance</th>
										<th>Amount</th>
										<th>Transaction Type</th>
										<th>Summary</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									//pr($data);
									if(!empty($all_statements) && count($all_statements)>0)
									{
										$sno=1;
										foreach ($all_statements as $statementObj) 
										{
											# code...
										if(($statementObj->status==1))
										{
											$status_label="Credit";
											$status_label_class="label-success";
										}
										else 
										{
											$status_label="Debit";
											$status_label_class="label-warning";
										}
										$amount=($statementObj->status==1)?$statementObj->credit_amt:$statementObj->debit_amt;
										$sign=($statementObj->status==1)?"+":"-";
										?>
											<tr>
												<td><?php echo $sno;?></td>
												<td><?php echo $statementObj->transaction_no;?></td>
												<td><?php echo $statementObj->title;?></td>
												<td><?php echo $statementObj->balance." ".currency();?></td>
												<td><?php echo $sign.$amount." ".currency();?></td>
												<td><span class="label <?php echo $status_label_class;?>"><?php echo $status_label;?></span></td>
												<td><?php echo $statementObj->description;?></td>
												<td><?php echo date(date_formats(),strtotime($statementObj->date));?></td>
											</tr>
											<?php
											$sno++;		
										}//end foreach!
									}//end empty if!
									?>

								</tbody>
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

  function deleteConfirm()
  {

  	if(window.confirm("Are you sure, you want to delete"))
      return true;
    else 
      return false;
  }
</script>            
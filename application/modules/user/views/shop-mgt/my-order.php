<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">E-shop Management</span> - <?php echo $title;?></h4>
         </div>
         
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active"><a href="#">My Order</a></li>
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
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">My Order</h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                     <li><a data-action="reload"></a></li>
                     <li><a data-action="close"></a></li>
                  </ul>
               </div>
            </div>
			<?php
			//pr($all_order);
			?>
            <table class="table datatable-responsive">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Order Id</th>
                     <th>Order Total Price</th>
                     <th>Date</th>
                     <th>Status</th>
                     <th>Action</th>
                    
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  
                  if(!empty($all_order) && count($all_order)>0)
                  {
                     $sno=1;
                     foreach ($all_order as $ao) 
                     {
						 
                    if($ao['processed']==0)
					{
						$status='No Processed';
						$color='red';
					}
					if($ao['processed']==1)
					{
						$status='Processed';
						$color='green';
					}
					if($ao['processed']==2)
					{
						$status='Rejected';
						$color='orange';
					}
					if($ao['processed']==3)
					{
						$status='Delivered';
						$color='blue';
					}					
                    ?>
                     <tr>
                        <td><?php echo $sno;?></td>
                        <td><?php echo $ao['order_id'];?></td>
                        <td>N <?php echo $ao['order_total_price'];?></td>
                        <td><?= date('d-M-Y / H:m:s', $ao['date']); ?></td>
                <td><b><span style='color:white;padding: 9px;border-radius: 10px;background-color:<?php echo $color; ?>'><?php echo $status;?></b></span></td>
                      
                       <td>
						    <span class="label label-success" >
<a href="javascript:void();" style="color:white" onclick="get_detail(<?php echo $ao['for_id'];?>)">View Details</a>
							</span>
						 </td>
					  
                        
                     </tr>
                  <?php
                     $sno++;       
                     }//end foreach
                  }//end if
                  ?>

               </tbody>
            </table>
         </div>
      </div>
      
     
      <?php 
         $this->load->view('common/footer-text');
         ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>

<div id="view_booking_details_modal" class="modal fade">
						<div class="modal-dialog modal-lg" style="width:68%">
							<div class="modal-content">
								<div class="modal-header bg-success">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h6 class="modal-title" id="view_booking_product_name"></h6>
								</div>
								<div class="modal-body">
								<!------------------------>
									<div id="booking_details_modal_body" class="table-responsive">
										
									</div>
								<!------------------------->
								
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /success modal -->
<script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/jquery.loading.block.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/loader.function.js"></script>

<script>
function get_detail(id)
{

$("#view_booking_details_modal").modal('show');

request_url='<?php echo site_url();?>user/eshop/getAjaxOrderDetails/'+id;
	
	var xhttp=new XMLHttpRequest();
	
	xhttp.onreadystatechange=function(){
		
if(this.readyState==4 && this.status==200)
{	
document.getElementById("booking_details_modal_body").innerHTML=this.responseText;
}

};
xhttp.open("GET",request_url,true);
xhttp.send();	
}	
</script>
<!-- Main content -->
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header page-header-default">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Eshop</span> - Orders</h4>
         </div>
         <div class="heading-elements">
         </div>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url().$module_name;?>"><i class="icon-home2 position-left"></i> Home</a></li>
            <li><a href="#">Orders</a></li>
            <li class="active"><?php echo $title;?></li>
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
               <h5 class="panel-title"><?php echo $title;?></h5>
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
            <table class="table datatable-responsive table-bordered table-striped table-hover" >
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Order Id</th>
                     <th>Email</th>
                     <th>Contact No.</th>
                     <th>Final Price</th>
                     <th>Order Date</th>
                     <th>Status</th>
                     <th>View Details</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     if(!empty($all_orders) && count($all_orders)>0)
                     {
                        $sno=0;
                        foreach ($all_orders as $order) 
                        {
                        $sno++;  
                        
                     if($order->order_status=='0')
                     {
                     $status='Pending';
                     $color='red';
                     }
                     else if($order->order_status=='1')
                     {
                     $status='Confirmed';
                     $color='green';
                     }
                     else if($order->order_status=='2')
                     {
                     $status='Rejected';
                     $color='orange';
                     }
                     else if($order->order_status=='3')
                     {
                     $status='Delivered';
                     $color='blue';
                     }
                     $buyer_type=($order->role=='2')?'MLM MEMBER':'GUEST';
                     //////////
                     $buyer_user_id=($order->role=='2')?$order->user_id:$order->guest_id;
                       
                     $buyer_details=($order->role=='2')?eshop_get_user_details(
                     $buyer_user_id):eshop_get_guest_details($buyer_user_id);
                     ?>
                  <tr>
                     <td><?php echo $sno;?></td>
                     <td><?php echo $order->order_id;?></td>
                     <td><?php echo $buyer_details->email;?></td>
                     <td><?php echo $buyer_details->contact_no;?></td>
                     <td><?php echo $order->final_price.' '.currency();?></td>
                     <td><?php echo $order->order_date;?></td>
                     <td><span style='color:white;padding: 9px;border-radius: 10px;background-color:<?php echo $color; ?>'><?php echo $status;?></span></td>
                     <td>
                        <a href="javascript:void(0);" class="view_order_details" order_id="<?php echo $order->order_id; ?>">
                        <i class="icon-eye"></i>
                        </a>
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
<div id="view_order_details_modal"  class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header bg-success">
            <h6 class="modal-title" id="view_booking_product_name">Order No: <b></b</h6>
         </div>
         <div class="modal-body" id="preview_info_body">
            <!-------------------------->
            
            <!--------------------------->
         </div>
         <div class="modal-footer">
            <!--
               <button type="button" onclick="print_invoice();" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
               -->
            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
   	$(".view_order_details").click(function(){
		var order_id=$(this).attr('order_id');
		jQuery.ajax({
                  type:'post',
                  url:'<?php echo site_url();?>user/eshop_orders/getOrderDetails/',
				  data:{'order_id':order_id},
                  async:false,
                  beforeSend: function () {
                       $.loader("on", '<?php echo site_url();?>admin_assets/images/default.svg');
                     },
                  success:function(res){
					  $("#preview_info_body").append(res);
					  $("#view_order_details_modal").modal('show');
                  },//end success
                  complete: function () {
                       $.loader("off", '<?php echo site_url();?>admin_assets/images/default.svg');
                   }
             });//end ajax	
		
		
		
   	})
	/////////////////////////
   });

</script>
<!-- <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script> -->
<!-- <script src="https://html2canvas.hertzen.com/dist/html2canvas.js" ></script>	 -->
<!-- <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous"></script>				 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<script>
   function print_invoice()
   {
      var printpage = window.open('','','width=1000,height=400');
      printpage.document.open("text/html");
      printpage.document.write(document.getElementById('preview_info_body').innerHTML);
      printpage.document.close();
      printpage.print();
      //printpage.close();
      //alert('p'); 
   }
   function generatePDF(){
      // var doc = new jsPDF()
      //    var html = $('#preview_info_body').html();
      //    doc.html(html, 100, 100)
      //    doc.save('a4.pdf')
      var pdf = new jsPDF('p', 'pt', 'letter');
      pdf.canvas.height = 72 * 11;
      pdf.canvas.width = 72 * 8.5;
      pdf.fromHTML(document.getElementById("preview_info_body"));
      pdf.save('test.pdf');
      
      //       var pdf = new jsPDF('p', 'pt', 'letter');
      //       pdf.html(document.body, {
      //          callback: function (pdf) {
      //             var iframe = document.createElement('iframe');
      //             iframe.setAttribute('style', 'position:absolute;right:0; top:0; bottom:0; height:100%; width:500px');
      //             document.body.appendChild(iframe);
      //             iframe.src = pdf.output('datauristring');
      //          }
      //       });
   }
   // var element = document.getElementById("preview_info_body");
   // element.addEventListener("click", generatePDF);
</script>
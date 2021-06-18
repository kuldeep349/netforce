<!-- Main content -->
<?php
$admin=getProfileInfo();
?>
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
      <!-- Invoice -->
      <!-- Invoice -->
     
        <div class="container">
            <div class="col-12">
                <div class="callout callout-info" style="display:none;">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                   This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div>


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12 text-center">
                    <img src="<?php echo base_url();?>images/<?php echo $admin->image;?>" style="width:250px;"> 
                    <h3 class="">
                        INVOICE
                    </h3>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                   
                    <div class="col-sm-4 invoice-col">
                    Company details
                    <address>
                        <strong><?php echo $admin->panel_title;;?> </strong><br>

                        <!-- CIN No. U40300HR2016PTC057953<br>
                        PAN No. AAWCS6763R<br> -->

                        <br>
                        Plot 3, Adefolu Street, <br>Ikeja Lagos Nigeria.<BR>
                        Contact No: +234 705 353 0409<br>
                        Email: xbulonservices@gmail.com<br>
                        Website: www://xbulon.com<br>

                    </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice No. #<?php echo ($order['order_id'])?></b><br>
                        <b>Invoice Date. <?php echo date('d-M-Y', strtotime($order['updated_at']))?></b><br>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            <strong><?php echo $order['first_name'] .' '. $order['last_name'];?></strong><br>
                            <?php echo $order['address']?>,<br>
                            <?php echo $order['city'] . ' , ' .$order['state']?><br>
                            <?php echo $order['country'] . ' ('.$order['postal_code'].')';?><br>
                            <?php
                            if($order['company_name'] != ''){
                                echo'Company : '.$order['company_name'] . '<br>';
                            }
                            ?>
                            Phone: <?php echo $order['phone'];?><br>
                            Email: <?php echo $order['email'];?>
                        </address>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <?php
                    // echo'<pre>';
                    // print_r($order);
                    // print_r($order_items);
                    // echo'</pre>';
                    
                    ?>
                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                        <th>SL. No.</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total_price = 0;
                        foreach($order_items as $k => $order_item){
                            $total_price =  $total_price+($order_item['quantity'] *$order_item['product_price']);
                            echo'<tr>';
                            echo'<td>'.($k+1).'</td>';
                            echo'<td>'.$order_item['product_title'].'</td>';
                            echo'<td>'.$order_item['quantity'].'</td>';
                            echo'<td>$'.$order_item['product_price'].'</td>';
                            echo'<td>$'.($order_item['quantity'] *$order_item['product_price']).'</td>';
                            echo'</tr>';
                        }
                        ?>
                        
                        </tbody>
                    </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                    <!-- <p class="lead">Payment Methods:</p> -->

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;display:none;">
                        <b>Tax summary</b> <br>

                        CGST Detail : 2646.00 @6.00% |<br>

                        SGST Detail : 2646.00 @6.00% |<br>
                    </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">

                    <div class="table-responsive">
                        <table class="table">
                        <tbody><tr>
                            <th style="width:50%">Grand Total:</th>
                            <td>$   <?php echo $total_price;?></td>
                        </tr>
                        <tr>
                            <th colspan="2">(inclusive all taxes)</th>
                        </tr>
                        </tbody></table>
                    </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <p class="text-danger">
                    Note: if someone's product turn out to be defective, They can replace the product within 45 days to company and get a new product.But product
                    must not be opened.
                    </p>
                    <div class="col-12" style="">
                    <button href="invoice-print.html" target="_blank" class="btn btn-default" onclick="pageprint()"><i class="fas fa-print"></i> Print</button>
                    <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                    </button>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate PDF
                    </button> -->
                    </div>
                </div>
                <div class="row no-print">
                    <div class="col-md-6">
                        Payment Method : <?php echo $order['payment_method'] == 1 ? 'Bank Wire' : 'Debit Card';?><br>
                        Payment status : <?php echo $order['status'] == 1 ? 'Approved' : 'Pending';?> 
                        <?php
                        if($order['payment_method'] == 1){
                            echo'<img src="'.base_url('images/'.$order['bank_wire_image_proof']).'">';
                        }
                        
                        ?>
                    </div>
                </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div>
      
     
      <!-- Footer -->
      <?php $this->load->view('common/footer-text') ?>
      <!-- /footer -->
    </div>
   <!-- /content area -->
</div>
<!-- /main content -->

<script>
function pageprint(){
  window.print() ;
}
</script>
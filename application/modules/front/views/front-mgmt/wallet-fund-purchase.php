<!DOCTYPE html>
<html lang="en-US" class="no-js">
   	<?php
	$this->load->view('common/header');
	?>
    <body class="page-template page-template-page-templates page-template-template-page-vc page-template-page-templatestemplate-page-vc-php page page-id-444 woocommerce-no-js wpb-js-composer js-comp-ver-5.4.7 vc_responsive">
        <div class="over-loader loader-live">
            <div class="loader">
                <div class="loader-item style5">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
                </div>
            </div>
        </div>
        <div class="wrapper-boxed">
            <?php
            $this->load->view('top-nav');
            ?>
            <div class="vc_row-full-width"></div>
                <div class="vc_row wpb_row vc_row-fluid  section-less-padding-3">
                    <div class="container">
                        <div class="row">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div class=" ">
                                            <div class="col-md-12">
                                            
                                            <h2 class="font-weight-7 margin-bottom-2">E-Wallet Purchase </h2>
                                            <h5 class="text-danger"><?php echo $this->session->flashdata('message');?></h5>
                                            <?php
                                           
                                            echo form_open_multipart();
                                            ?>
                                            <table> 
                                                <thead>
                                                    <tr>
                                                        <td  colspan="2" class="text-center">Amount (USD)</td>
                                                        <td  colspan="3"><input type="text" placeholder="Amount" class="form-control" name="amount" value="" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td  colspan="2" class="text-center">Name</td>
                                                        <td  colspan="3"><input type="text" placeholder="Name" class="form-control" name="name" value="<?php echo set_value('name');?>" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td  colspan="2" class="text-center">Email</td>
                                                        <td  colspan="3"><input type="email" placeholder="Email" class="form-control" name="email"  value="<?php echo set_value('email');?>" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td  colspan="2" class="text-center">Phone</td>
                                                        <td  colspan="3"><input type="text" placeholder="Phone" class="form-control" name="phone"  value="<?php echo set_value('phone');?>" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td  colspan="2" class="text-center">Username</td>
                                                        <td  colspan="3"><input type="text" placeholder="Username" class="form-control" name="username" value="<?php echo set_value('username');?>" required></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td colspan="1" class="text-center">
                                                                Payment Method
                                                                <!-- <input type="radio" name="payment_method" class="payment_method" value="paystack" checked>PayStack 
                                                                <input type="radio" name="payment_method" class="payment_method" value="bank_payment" id="bankPayment">Bank Payment -->
                                                             </td>
                                                             <td  colspan="2">
                                                                <div id="BankDetails" style="display:block;">
                                                                    <h4>Bank Details</h4>
                                                                    <p>
                                                                        Account Name: NetForce Network<br>
                                                                        Bank: Zenith Bank<br>
                                                                        Account Number: 1017541942<br>
                                                                    </p>
                                                                    <input type="file" name="bank_wire_proof_image" class="form-control"/>
                                                                </div>
                                                            </td>
                                                            <td colspan="2" class="text-center">
                                                                <input type="submit" name="payment_method" class="btn-success" value="Debit Card"> 
                                                                <br>
                                                                <br>
                                                                <input type="submit" name="payment_method" class="btn-dark" value="Bank Wire"> 
                                                            </td>
                                                        </tr>
                                                         <tr>
                                                            <td  colspan="5"></td>
                                                        </tr>
                                                        
                                                </tbody>
                                            </table>
                                            <?php echo form_close();?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            <div class="vc_row-full-width"></div>
           <?php
			$this->load->view('common/footer');
			?>
        </div>
     <?php
	  $this->load->view('common/footer-script');
	  ?>
    </body>
    <script>
        // $(document).on('change','.pinCount',function(){
        //     var product_id =  $(this).data('id');
        //     var amount =  $(this).data('amount');
        //     var quantity = $(this).val();
        //     $('#pinAmount'+product_id).text(amount * quantity);
        //     calc_total()
        // })

        // function calc_total(){
        //     var sum = 0;
        //     $(".pinAmount").each(function(){
        //         sum += parseFloat($(this).text());
        //     });
        //     $('#sum').text('Total : $' + sum);
        // }
        // $(document).on('change','.payment_method',function(){
        //     if ($("#bankPayment").prop("checked")) {
        //         $('#BankDetails').css('display','block')
        //     }else{
        //         $('#BankDetails').css('display','none')
        //     }
        // })
    </script>
</html>
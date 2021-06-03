<div class="content-wrapper">

   <!-- Page header -->

   <div class="page-header">

      <div class="page-header-content">

         <div class="page-title">

            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Wallet Management</span> - Stage Complete Bonus Report</h4>

         </div>

         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>

      </div>

      <div class="breadcrumb-line">

         <ul class="breadcrumb">

            <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>

            <li class="active"><a href="#">Income Report</a></li>

            <li class="active">Stage Complete Bonus Report</li>

         </ul>

         <ul class="breadcrumb">

         </ul>

      </div>

   </div>

   <!-- /page header -->

   <!-- Content area -->

   <div class="content">

      <!-- Daterange picker -->

      <!--

      <div class="panel panel-flat">

         <div class="panel-heading">

            <h5 class="panel-title"><?php //echo $title; ?></h5>

         </div>

         <div class="panel-body">

            <div class="row">

               <div class="col-md-6">

                  <div class="panel-heading">

                     <p>Please Select the Date Range to View Your Commission Report</p>

                  </div>

               </div>

               <div class="col-md-6">

                  <div class="form-group">

                     <label class="display-block">Please Select the Date Rane </label>

                     <button type="button" class="btn btn-success daterange-ranges">

                     <i class="icon-calendar22 position-left"></i> <span></span> <b class="caret"></b>

                     </button>

                  </div>

               </div>

            </div>

         </div>

      </div>

  	  -->

      <!-- /daterange picker -->

      <div class="row">

         <div class="panel panel-flat">

            <div class="panel-heading">

               <h5 class="panel-title">Stage Complete Bonus Report</h5>

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

                     <th>Stage</th>

					 <th>Bonus Amount</th>

                     <th>Transaction Type</th>

                     <th>Summary</th>

                     <th>Date</th>

                  </tr>

               </thead>

               <tbody>

                  <?php 

                  $total_matrix_income=0;

                  if(!empty($matrix_income) && count($matrix_income)>0)

                  {

                     $sno=1;

                     foreach ($matrix_income as $income) 

                     {

                      $total_direct_income=$total_matrix_income+$income->credit_amt; 

                      if($income->unique_identity=='feeder_stage')

                      {

                          $stage="Stage1";

                      }

                      else if($income->unique_identity=='stage_1')

                      {

                          $stage="Stage2";

                      }

                      else if($income->unique_identity=='stage_2')

                      {

                          $stage="Stage3";

                      }

					  else if($income->unique_identity=='stage_3')

                      {

                          $stage="Stage4";

                      }

					  else if($income->unique_identity=='stage_4')

                      {

                          $stage="Stage5";

                      }

					  else if($income->unique_identity=='stage_5')

                      {

                          $stage="Stage6";

                      }

                  ?>

                     <tr>

                        <td><?php echo $sno;?></td>

						 <td><?php echo $stage;?></td>

                        <td><?php echo $income->credit_amt.currency();?></td>

                        <td><span class="label label-success">Credit</span></td>

                        <td><?php echo $income->ttype;?></td>

                        <td><?php echo $income->create_date;?></td>

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

      <div class="row">

         <div class="col-md-6">

            <div class="panel bg-primary">

               <div class="panel-heading">

                  <h6 class="panel-title">Total Direct Referral Income</h6>

               </div>

               <div class="panel-body">

                 <?php echo currency()." ".$total_matrix_income;?>

               </div>

            </div>

         </div>

         <div class="col-md-6">

            <!--

            <div class="panel bg-primary">

               <div class="panel-heading">

                  <h6 class="panel-title">Total Direct Referral Member</h6>

               </div>

               <div class="panel-body">

                  <?php //echo (!empty($total_direct_member))?$total_direct_member:0;?>

               </div>

            </div>

            -->

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
<div class="content-wrapper">

   <!-- Page header -->

   <div class="page-header">

      <div class="page-header-content">

         <div class="page-title">

            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Wallet Management</span> - Matrix Level Complete Commission</h4>

         </div>

         

      </div>

      <div class="breadcrumb-line">

         <ul class="breadcrumb">

            <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>

            <li class="active"><a href="#">Income Report</a></li>

            <li class="active">Matrix Level Complete Commission</li>

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

               <h5 class="panel-title">Matrix Level Complete Commission Report</h5>

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

                     <th>Amount</th>

					 <th>Stage</th>

					 <th>Level</th>

                     <th>Transaction Type</th>

                     <th>Summary</th>

                     <th>Date</th>

                  </tr>

               </thead>

               <tbody>

                  <?php 

				  $stage_name=array(

				  'feeder_stage'=>"Stage1",

				  'stage_1'=>"Stage2",

				  'stage_2'=>"Stage3",

				  );

                  $tota_matrix_level_complete_commission=0;

                  if(!empty($matrix_level_complete_commission) && count($matrix_level_complete_commission)>0)

                  {

                     $sno=1;

                     foreach ($matrix_level_complete_commission as $income) 

                     {

                      $tota_matrix_level_complete_commission=$tota_matrix_level_complete_commission+$income->credit_amt;  

                  ?>

                     <tr>

                        <td><?php echo $sno;?></td>

                        <th><?php echo $income->credit_amt.''.currency();?></th>

						 <th><?php echo $stage_name[$income->unique_identity];?></th>

						 <th><?php echo $income->level;?></th>

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

                  <h6 class="panel-title">Total Matrix Level Complete Income</h6>

               </div>

               <div class="panel-body">

                  <?php echo (!empty($tota_matrix_level_complete_commission))?$tota_matrix_level_complete_commission:0;?>

               </div>

            </div>

         </div>

      </div>

      <div class="row">

         <div class="col-md-12">

            <div class="panel panel-flat border-left-xlg border-left-success">

               <div class="panel-heading">

                  <h6 class="panel-title"><span class="text-semibold">Graph of the Direct Referral Commission</span> </h6>

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
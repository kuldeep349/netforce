<div class="content-wrapper">

   <!-- Page header -->

   <div class="page-header">

      <div class="page-header-content">

         <div class="page-title">

            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">My Team Report</span> - <?php echo $title;?></h4>

         </div>

         <!--

         <div class="heading-elements">

            <div class="heading-btn-group">

               <a href="<?php echo site_url();?>user/ewallet/depositWalletAmountRequest" class="btn btn-success"><i class="icon-comment-discussion position-left"></i>Add New Deposit Request</a>

            </div>

         </div>

         -->

         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>

      </div>

      <div class="breadcrumb-line">

         <ul class="breadcrumb">

            <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>

            <li class="active"><a href="#">My Team Report</a></li>

            <li class="active"><?php echo $title; ?></li>

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

                     <h5 class="panel-title">My Team Member</h5>

                  

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

                        <h5 class="panel-title">My Team Member Report</h5>

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

                           <th>User Id</th>

                           <th>User Name</th>

                           <th>Full Name</th>

                           <th>Contact No.</th>

                           <th>Level</th>

						         <th>Sponsor</th>

						         <th>Rank</th>

						         <th>Membership Title</th>

                           <th>Status</th>

                           <th>Registration Method</th>

                           <th>Registration Date</th>

                        </tr>

                        </thead>

                        <tbody>

                           <?php 

						   //pr($team_member);

                           if(!empty($team_member) && count($team_member)>0)

                           {

                              $sno=1;

                              foreach($team_member as $member)

                              {

                                if($member->active_status=='1')

                                {

                                 $status_label="Active";

                                 $status_label_class="label-success";

                                }

                                else 

                                {

                                 $status_label="Inactive";

                                 $status_label_class="label-warning";

                                }

                           ?>

                           <tr>

                              <td><?php echo $sno;?></td>

                              <td><?php echo $member->user_id;?></td>

                              <td><?php echo $member->username;?></td>

                              <td><?php echo $member->first_name." ".$member->last_name;;?></td>

                              <td><?php echo $member->contact_no;?></td>

                              <td><?php echo $member->level;?></td>

							         <td><?php echo get_user_name($member->ref_id);?></td>
							         
                              <td><?php echo $member->rank_name;;?></td>

                              <td><?php echo $member->title;;?></td>

                              <td><span class="label <?php echo $status_label_class;?>"><?php echo $status_label;?></span></td>

                              

                              <td><?php echo $member->registration_method_name;?></td>

                              <td><?php echo date(date_formats().' H:i:s',strtotime($member->auto_registration_date));?></td>

                           </tr>                           

                           <?php       

                              $sno++;

                              }//end foreach here!

                           }//end if here!

                           ?>

                        </tbody>

                     </table>

                  </div>

               </div>

               <div class="row">

                 <div class="col-md-6">

                   <div class="panel bg-primary">

                        <div class="panel-heading">

                           <h6 class="panel-title">Total Team Member</h6>

                        </div>

                        <div class="panel-body">

                           <?php echo $total_team_member;?>

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
<!-- Main content -->
<div class="content-wrapper">
<!-- Page header -->
<style>
.marqueetext {
    float: left;
    width: 100%;
    background: #ed3b57;
    color: #fff;
    font-size: 20px;
    font-weight: bold;
    /* padding: 20px 0px 10px 0px; */
}
</style>
<div class="page-header">
   <div class="page-header-content">
      <div class="page-title">
         <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
         <div class="marqueetext">
            <marquee direction="3" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
            <?php
               echo $marquee[1]['text'];
            ?>
            </marquee>
         </div>
      </div>
   </div>
   <div class="breadcrumb-line">
      <ul class="breadcrumb">
         <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
         <li class="active">Dashboard</li>
         <li class="active">
            <input type="text" id="link1" value="<?php echo base_url('join-us/'.$user_details->username);?>" style="width: 215px;"><button type="button" onclick="myFunction()">Copy</button>
         </li>
      </ul>
   </div>
</div>
<!-- /page header -->
<!-- Content area -->
<div class="content">
<!-- Main charts -->
<div class="row">
   
</div>
<!-- /main charts -->
<!-- Dashboard content -->
<div class="row">
 
 <!--<div class="col-sm-6 col-md-3">
      <div class="panel panel-body bg-blue-400 has-bg-image">
         <div class="media no-margin-top content-group">
            <div class="media-body">
               <h6 class="no-margin text-semibold">My Direct Refferal Income</h6>
               <span class="text-muted"><?php echo currency()." ".$my_direct_commission;?></span>
            </div>
            <div class="media-right media-middle">
               <i class="icon-coins icon-2x"></i>
            </div>
         </div>
      </div>
   </div>-->
 
 <div class="col-sm-6 col-md-3">
      <div class="panel panel-body bg-success has-bg-image">
         <div class="media no-margin-top content-group">
            <div class="media-body">
               <h6 class="no-margin text-semibold">Total Referral Bonus</h6>
               <span class="text-muted"><?php echo currency()." ".$my_total_direct_comm;?></span>
            </div>
            <div class="media-right media-middle">
               <i class="icon-coins icon-2x"></i>
            </div>
         </div>
      </div>
   </div>
   <!--<div class="col-sm-6 col-md-3">
      <div class="panel panel-body bg-blue-400 has-bg-image">
         <div class="media no-margin-top content-group">
            <div class="media-body">
               <h6 class="no-margin text-semibold">My Stage Complete Bonus</h6>
               <span class="text-muted"><?php echo currency()." ".$my_total_stage_complete_bonus;?></span>
            </div>
            <div class="media-right media-middle">
               <i class="icon-coins icon-2x"></i>
            </div>
         </div>
      </div>
   </div>
   
   
    <div class="col-sm-6 col-md-3">
      <div class="panel panel-body bg-blue-400 has-bg-image">
         <div class="media no-margin-top content-group">
            <div class="media-body">
               <h6 class="no-margin text-semibold">My Gross Commission</h6>
               <span class="text-muted"><?php echo currency()." ".$gross_commission;?></span>
            </div>
            <div class="media-right media-middle">
               <i class="icon-coins icon-2x"></i>
            </div>
         </div>
      </div>
   </div>-->
   

  <div class="col-sm-6 col-md-3">
      <div class="panel panel-body bg-warning has-bg-image">
         <div class="media no-margin-top content-group">
            <div class="media-left media-middle">
               <i class="icon-users4 icon-2x"></i>
            </div>
            <div class="media-body">
               <h6 class="no-margin text-semibold">Total Direct Member</h6>
               <span class="text-muted"><?php echo $total_direct_member;?></span>
            </div>
         </div>
         <!--<div class="progress progress-micro mb-10 bg-success">
            <div class="progress-bar bg-white" style="width: 100%">
               <span class="sr-only">100% Complete</span>
            </div>
         </div>-->
         <!--<span class="pull-right">Direct Member : <?php //echo $total_direct_member;?></span>
         Team Member : <?php //echo $total_team_member;?>-->
      </div>
   </div>
   <div class="col-sm-6 col-md-3">
      <div class="panel panel-body bg-info has-bg-image">
         <div class="media no-margin-top content-group">
            <div class="media-left media-middle">
               <i class="icon-pulse2 icon-2x"></i>
            </div>
            <div class="media-body">
               <h6 class="no-margin text-semibold">My Rank Zone</h6>
               <span class="text-muted">
                  <?php
                  if(empty($rank_name) || $rank_name==Null)
                  {
                     echo "No Rank";
                  }
                  else 
                  {
                     echo $rank_name;
                  }
                  ?>
               </span>
            </div>
         </div>
         <!--<div class="progress progress-micro mb-10 bg-blue-400">
            <div class="progress-bar bg-white" style="width: 100%">
               <span class="sr-only">80% Complete</span>
            </div>
         </div>-->
        <!-- <span class="pull-right"> </span>-->
         
      </div>
   </div>
   <div class="col-sm-6 col-md-3">
      <div class="panel panel-body bg-pink has-bg-image">
         <div class="media no-margin-top content-group">
            <div class="media-left media-middle">
               <i class="icon-pulse2 icon-2x"></i>
            </div>
            <div class="media-body">
               <h6 class="no-margin text-semibold">Membership</h6>
               <span class="text-muted">
                  <?php
                  
                     echo get_package_name($user_details->pkg_id);
                  
                  ?>
               </span>
            </div>
         </div>
         
         
      </div>
   </div>
</div>


<!-- /inside tabs -->
<!--Wallet Balance -->
<div class="row">
   <div class="col-sm-6 col-md-3">
      <div class="panel panel-body bg-danger has-bg-image">
         <div class="media no-margin">
            <div class="media-body">
               <h3 class="no-margin"><?php echo currency()." ".$ewallet_balance;?></h3>
               <span class="text-uppercase text-size-mini">My Wallet Balance</span>
            </div>
            <div class="media-right media-middle">
               <i class="icon-wallet icon-3x opacity-75"></i>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-6 col-md-3">
      <div class="panel panel-body bg-gray has-bg-image">
         <div class="media no-margin">
            <div class="media-left media-middle">
               <i class="icon-pointer icon-3x opacity-75 text-white"></i>
            </div>
            <div class="media-body text-right">
               <h3 class="no-margin text-white"><?php echo currency()." ".$payout_in_process;?></h3>
               <span class="text-uppercase text-size-mini text-white">Payout in Process</span>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-6 col-md-3">
      <div class="panel panel-body bg-green has-bg-image">
         <div class="media no-margin">
            <div class="media-left media-middle">
               <i class="icon-enter6 icon-3x opacity-75"></i>
            </div>
            <div class="media-body text-right">
               <h3 class="no-margin"><?php echo currency()." ".$payout_success;?></h3>
               <span class="text-uppercase text-size-mini">Payout Success</span>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-6 col-md-3">
      <div class="panel panel-body bg-blue has-bg-image">
         <div class="media no-margin">
            <div class="media-left media-middle">
               <i class="icon-enter6 icon-3x opacity-75"></i>
            </div>
            <div class="media-body text-right">
               <h3 class="no-margin"><?php echo currency()." ".$wel_amount;?></h3>
               <span class="text-uppercase text-size-mini">Welcome Pack</span>
            </div>
         </div>
      </div>
   </div>
</div>
<!--Wallet Balance -->
<!--my profile -->
<div class="row">
   <div class="col-sm-6 col-lg-6">
      <!-- User details (with sample pattern) -->
      <div class="content-group">
         <div class="panel-body bg-profile border-radius-top text-center" style="background-image: url(images/bg.png); background-size: contain;">
            <div class="content-group-sm">
               <h5 class="text-semibold no-margin-bottom">
                  My Profile
               </h5>
               <h5 class="text-semibold no-margin-bottom">
                  <?php echo $user_details->username ;?>
               </h5>
               <span class="display-block">My User Id : <?php echo $user_details->user_id;?></span>
            </div>
            <a href="#" class="display-inline-block content-group-sm">
            <?php 
			if(!empty($user_details->image))
			{
			?>
			<img src="<?php echo base_url();?>images/<?php echo $user_details->image;?>" class="img-circle img-responsive" alt="" style="width: 120px; height: 120px;">
			<?php
			}
			else 
			{
			?>
			<img src="<?php echo base_url();?>images/face6.jpg" class="img-circle img-responsive" alt="" style="width: 120px; height: 120px;">
			<?php 
			}
			?>
            </a>
            <ul class="list-inline no-margin-bottom">
               <li><a href="#" class="btn bg-blue-700 btn-rounded btn-icon"><i class="icon-phone"></i></a></li>
               <li><a href="#" class="btn bg-blue-700 btn-rounded btn-icon"><i class="icon-bubbles4"></i></a></li>
               <li><a href="#" class="btn bg-blue-700 btn-rounded btn-icon"><i class="icon-envelop4"></i></a></li>
            </ul>
         </div>

         <div class="panel panel-body no-border-top no-border-radius-top">
            <div class="form-group mt-5">
               <label class="text-semibold">Full name:</label>
               <span class="pull-right-sm"><?php echo $user_details->first_name.' '.$user_details->last_name;?></span>
            </div>
            <div class="form-group">
               <label class="text-semibold">Phone number:</label>
               <span class="pull-right-sm"><?php echo $user_details->contact_no;?></span>
            </div>
            <div class="form-group no-margin-bottom">
               <label class="text-semibold">Personal Email:</label>
               <span class="pull-right-sm"><a href="#"><?php echo $user_details->email;?></a></span>
            </div>
             <div class="form-group no-margin-bottom">
               <label class="text-semibold">Country:</label>
               <span class="pull-right-sm"><a href="#"><?php echo $user_details->country;?></a></span>
            </div>
         </div>
      </div>
      <!-- /user details (with sample pattern) -->
   </div>
   <div class="col-sm-6 col-lg-6">
      <!-- User details (with sample pattern) -->
      <div class="content-group">
         <div class="panel-body bg-sponser border-radius-top text-center" style="background-image: url(images/bg.png); background-size: contain;">
            <div class="content-group-sm">
               <h5 class="text-semibold no-margin-bottom">
                  My Sponsor Detail
               </h5>
               <h5 class="text-semibold no-margin-bottom">
                  <?php echo (!empty($sponsor_details->first_name))?$sponsor_details->first_name.' '.$sponsor_details->last_name:'none';?>
               </h5>
               <span class="display-block">Sponsor User Id : <?php echo (!empty($sponsor_details->user_id))?$sponsor_details->user_id:'none';?></span>
            </div>
            <a href="#" class="display-inline-block content-group-sm">
            <?php 
			if(!empty($sponsor_details->image))
			{
			?>
			<img src="<?php echo base_url();?>images/<?php echo $sponsor_details->image;?>" class="img-circle img-responsive" alt="" style="width: 120px; height: 120px;">
			<?php 
			}
			else 
			{
			?>
			<img src="<?php echo base_url();?>images/face6.jpg" class="img-circle img-responsive" alt="" style="width: 120px; height: 120px;">
			<?php
			}
			?>
            </a>
            <ul class="list-inline no-margin-bottom">
               <li><a href="#" class="btn bg-blue-700 btn-rounded btn-icon"><i class="icon-phone"></i></a></li>
               <li><a href="#" class="btn bg-blue-700 btn-rounded btn-icon"><i class="icon-bubbles4"></i></a></li>
               <li><a href="#" class="btn bg-blue-700 btn-rounded btn-icon"><i class="icon-envelop4"></i></a></li>
            </ul>
         </div>
         <div class="panel panel-body no-border-top no-border-radius-top">
            <div class="form-group mt-5">
               <label class="text-semibold">Full name:</label>
               <span class="pull-right-sm"><?php echo (!empty($sponsor_details->first_name))?$sponsor_details->first_name.' '.$sponsor_details->last_name:'none';?></span>
            </div>
            <div class="form-group">
               <label class="text-semibold">Phone number:</label>
               <span class="pull-right-sm"><?php echo (!empty($sponsor_details->contact_no))?$sponsor_details->contact_no:'none';?></span>
            </div>
            <div class="form-group no-margin-bottom">
               <label class="text-semibold">Personal Email:</label>
               <span class="pull-right-sm"><a href="#"><?php echo (!empty($sponsor_details->email))? $sponsor_details->email:'none';?></a></span>
            </div>
            
            <div class="form-group no-margin-bottom">
               <label class="text-semibold">Country:</label>
               <span class="pull-right-sm"><a href="#"><?php echo (!empty($sponsor_details->country))? $sponsor_details->country:'none';?></a></span>
            </div>
         </div>
      </div>
      <!-- /user details (with sample pattern) -->
   </div>
</div>
<!--My profile-->

<!-- Dashboard content -->
<!-- /dashboard content -->          <!-- /dashboard content -->
<!-- Footer -->
<?php
  $this->load->view("common/footer-text");
?>
<!-- /footer -->
</div>
<!-- /content area -->
</div>
<script>
function myFunction() {
  var copyText = document.getElementById("link1");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
  //alert("Copied the text: " + copyText.value);
}
</script>
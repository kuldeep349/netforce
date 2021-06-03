<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Ewallet Management</span> - <?php echo $title;?></h4>
         </div>
         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>user"<i class="icon-home2 position-left"></i> Home</a></li>
            <li>My Wallet Balance</li>
            <li class='active'><?php echo $title;?></li>
         </ul>
         <ul class="breadcrumb">
         </ul>
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">
      <!-- Horizontal form options -->
      <div class="row">
         <div class="col-md-6">
            <!-- Basic layout-->
            <div class="panel panel-body bg-danger-400 has-bg-image">
               <div class="media no-margin">
                  <div class="media-body">
                     <h3 class="no-margin"><?php echo currency()." ".$ewallet_balance;?></h3>
                     <span class="text-uppercase text-size-mini">My <?php echo $title;?></span>
                  </div>
                  <div class="media-right media-middle">
                     <i class="icon-wallet icon-3x opacity-75"></i>
                  </div>
               </div>
            </div>
            <!-- /basic layout -->
         </div>
         <?php
         if($type=='Ewallet'):
         ?>
         <div class="col-md-6">
            <!-- Basic layout-->
            <div class="panel panel-flat border-top-success">
               <div class="panel-body text-center">
                  <a href="<?php echo site_url();?>user/payout/withdrawlMyFund" class="btn bg-success-400">Withdraw My Wallet Balance</a>
               </div>
            </div>
            <!-- /basic layout -->
         </div>
         <?php endif;?>

         <div class="col-md-12">
   <div class="col-sm-6 col-md-6">
      <div class="panel panel-body bg-danger has-bg-image">
         <div class="media no-margin">
            <div class="media-body">
               <h3 class="no-margin"><?php echo currency()." ".$balance['transfer'];?></h3>
               <span class="text-uppercase text-size-mini">Total Used Amount</span>
            </div>
            <div class="media-right media-middle">
               <i class="icon-wallet icon-3x opacity-75"></i>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-6 col-md-6">
      <div class="panel panel-body bg-gray has-bg-image">
         <div class="media no-margin">
            <div class="media-left media-middle">
               <i class="icon-pointer icon-3x opacity-75 text-white"></i>
            </div>
            <div class="media-body text-right">
               <h3 class="no-margin text-white"> <?php echo currency()." ".$balance['withdraw_amount'];?></h3>
               <span class="text-uppercase text-size-mini text-white">Total Withdrawn Amount</span>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-6 col-md-6">
      <div class="panel panel-body bg-green has-bg-image">
         <div class="media no-margin">
            <div class="media-left media-middle">
               <i class="icon-enter6 icon-3x opacity-75"></i>
            </div>
            <div class="media-body text-right">
               <h3 class="no-margin"><?php echo currency()." ".$balance['income'];?></h3>
               <span class="text-uppercase text-size-mini">Total Income Amount</span>
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-6 col-md-6">
      <div class="panel panel-body bg-blue has-bg-image">
         <div class="media no-margin">
            <div class="media-left media-middle">
               <i class="icon-enter6 icon-3x opacity-75"></i>
            </div>
            <div class="media-body text-right">
               <h3 class="no-margin"><?php echo currency()." ".$ewallet_balance;?></h3>
               <span class="text-uppercase text-size-mini">Total Income Balance</span>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col-md-6">
            <!-- Basic layout-->
            <div class="panel panel-flat border-top-success">
               <div class="panel-body text-center">
                  
                  <a href="<?php echo site_url();?>user/payout/withdrawBalanceMS" class="btn bg-success-400">Transfer My E-Wallet To Product Wallet Balance</a>
                  
                  
                  
               </div>
            </div>
            
            <!-- /basic layout -->
         </div>
      </div>
      <!-- /vertical form options -->
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

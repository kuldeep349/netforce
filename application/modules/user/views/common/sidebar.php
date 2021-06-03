<?php
$moduleName=$this->router->fetch_module();
$controllerName=$this->router->fetch_class();
$actionName=$this->router->fetch_method();
$user_details=get_user_details($this->session->userdata('user_id'));
$checkrank=checkUserExistenceInAllStages();
$checkteam=checkUserTeamExistenceInAllStages();
//print_r($checkrank);
?>
 <aside id="aside" class="app-aside sidebar sidebar-main">
 <!--<aside id="aside" class="app-aside hidden-xs bg-black">-->
      <div class="aside-wrap">
        <div class="navi-wrap">
                    <!-- user profile -->

          <!-- / user profile-->
                              <!-- nav -->
          <nav ui-nav class="navi clearfix">
            <ul class="nav menu-navigation">

        <ul class="navigation navigation-main navigation-accordion">

                <!-- Main -->
        <li <?php echo ($controllerName=="user")?'class=active':'';?>><a href="<?php echo site_url();?>user/"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

				<!--profile management-->
				<li <?php echo ($controllerName=="account")?'class=active':'';?>>
                  <a href="#"><i class="icon-profile"></i><span>Personal Profile</span></a>
                  <ul>
                    <li <?php echo ($actionName=="viewProfile")?'class=active':'';?>><a href="<?php echo site_url();?>user/account/viewProfile"><i class="icon-user-tie"></i>My Profile</a></li>
					<li <?php echo ($actionName=="upgradeProfile")?'class=active':'';?>><a href="<?php echo site_url();?>user/account/upgradeProfile"><i class=" icon-user-lock"></i>Upgrade Membership</a></li>
                    <li <?php echo ($actionName=="changePassword")?'class=active':'';?>><a href="<?php echo site_url();?>user/account/changePassword"><i class=" icon-user-lock"></i>Change Password</a></li>
                    <li <?php echo ($actionName=="changeTranscationPassword")?'class=active':'';?>><a href="<?php echo site_url();?>user/account/changeTranscationPassword"><i class=" icon-file-locked2"></i>Change Transaction Password</a></li>

                  </ul>
        </li>
        <!--E-Pin-->
        <?php
        if(isEpinEnabled())
        {
        ?>
        <li <?php echo ($controllerName=="Epin")?'class=active':'';?>>
                  <a href="#"><i class="icon-power-cord"></i> <span>E-Pin</span></a>
                  <ul>
                    <li <?php echo ($actionName=="purchasePin")?'class=active':'';?>><a href="<?php echo site_url();?>user/epin/purchasePin"><i class="icon-warning22"></i>Add New Pin</a></li>
                    <li <?php echo ($actionName=="pendingEpinRequest")?'class=active':'';?>><a href="<?php echo site_url();?>user/epin/pendingEpinRequest"><i class="icon-warning22"></i>Pending Pin Request</a></li>
                    <li <?php echo ($actionName=="approvedEpinRequest")?'class=active':'';?>><a href="<?php echo site_url();?>user/epin/approvedEpinRequest"><i class="icon-folder-check"></i>Approved Pin Request</a></li>
                    <li <?php echo ($actionName=="cancelledEpinRequest")?'class=active':'';?>><a href="<?php echo site_url();?>user/epin/cancelledEpinRequest"><i class="icon-cancel-circle2"></i>Cancelled Pin Request</a></li>
                    <li <?php echo ($actionName=="freshPinList")?'class=active':'';?>><a href="<?php echo site_url();?>user/epin/freshPinList"><i class="icon-clipboard2"></i>Unused E-Pin</a></li>
                    <li <?php echo ($actionName=="usedPinList")?'class=active':'';?>><a href="<?php echo site_url();?>user/epin/usedPinList"><i class="icon-switch"></i>Used E-Pin</a></li>
                    <li <?php echo ($actionName=="transferredPinList")?'class=active':'';?>><a href="<?php echo site_url();?>user/epin/transferredPinList"><i class="icon-loop"></i>Transferred E-Pin</a></li>
                  </ul>
        </li>
        <?php
        }
        ?>

              <li <?php echo ($controllerName=="order")?'class=active':'';?>>
                <a href="#"><i class="icon-cart2"></i><span>Organic Shop Management</span></a>
                <ul>
                    <li <?php echo ($controllerName=="order" && $actionName=="ourStore")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/ourStore"><i class="icon-cart2"></i> E-Store</a></li>
                    <li <?php echo ($controllerName=="order" && $actionName=="allOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allOrders"><i class="icon-basket"></i> All Orders</a></li>
                    <li <?php echo ($controllerName=="order" && $actionName=="allPendingOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allPendingOrders"><i class="icon-cart4"></i> All Placed Orders</a></li>
                    <li <?php echo ($controllerName=="order" && $actionName=="allConfirmedOrder")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allConfirmedOrder"><i class="icon-cart-add2"></i> All Confirmed Orders</a></li>
                    <li <?php echo ($controllerName=="order" && $actionName=="allRejectedOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allRejectedOrders"><i class="icon-folder-remove"></i> All Rejected Orders</a></li>
                    <li <?php echo ($controllerName=="order" && $actionName=="allDeliveredOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allDeliveredOrders"><i class="icon-cart-remove"></i> All Delivered Orders</a></li>
    			      </ul>
              </li>
           <!--<li <?php echo ($controllerName=="welcome")?'class=active':'';?>>
                <a href="#"><i class="icon-cart2"></i><span>Welcome Pack Management</span></a>
                <ul>
                    <li <?php echo ($controllerName=="welcome" && $actionName=="ourStore")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_welcome/ourStore"><i class="icon-cart2"></i> Welcome Pack</a></li>

                    <li <?php echo ($controllerName=="welcome" && $actionName=="allOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_welcome_orders/allOrders"><i class="icon-basket"></i> All Orders</a></li>
    				<li <?php echo ($controllerName=="welcome" && $actionName=="allPendingOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_welcome_orders/allPendingOrders"><i class="icon-cart4"></i> All Placed Orders</a></li>
    				<li <?php echo ($controllerName=="welcome" && $actionName=="allConfirmedOrder")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_welcome_orders/allConfirmedOrder"><i class="icon-cart-add2"></i> All Confirmed Orders</a></li>
    				<li <?php echo ($controllerName=="welcome" && $actionName=="allRejectedOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_welcome_orders/allRejectedOrders"><i class="icon-folder-remove"></i> All Shipped Orders</a></li>
    				<li <?php echo ($controllerName=="welcome" && $actionName=="allDeliveredOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_welcome_orders/allDeliveredOrders"><i class="icon-cart-remove"></i> All Delivered Orders</a></li>
    			</ul>
           </li>-->
          <li <?php echo ($controllerName=="account")?'class=active':'';?>>
            <a href="#"><i class="icon-profile"></i><span>E-Shopping</span></a>
            <ul>
                <li <?php echo ($controllerName=="eshop" && $actionName=="addNewProduct")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/addNewProduct"><i class="icon-cart2"></i>Upload Your Product</a></li>
                <li <?php echo ($controllerName=="eshop" && $actionName=="productHistory")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/productHistory"><i class="icon-cart2"></i>Product History</a></li>
                <li <?php echo ($controllerName=="eshop" && $actionName=="ourStore2")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/ourStore2"><i class="icon-cart2"></i>E-Shopping Product</a></li>
                <li <?php echo ($controllerName=="order" && $actionName=="alleOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/alleOrders"><i class="icon-basket"></i> All Orders</a></li>
                <li <?php echo ($controllerName=="order" && $actionName=="allPendingeOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allPendingeOrders"><i class="icon-cart4"></i> All Placed Orders</a></li>
                <li <?php echo ($controllerName=="order" && $actionName=="allConfirmedeOrder")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allConfirmedeOrder"><i class="icon-cart-add2"></i> All Confirmed Orders</a></li>
                <li <?php echo ($controllerName=="order" && $actionName=="allRejectedeOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allRejectedeOrders"><i class="icon-folder-remove"></i> All Rejected Orders</a></li>
                <li <?php echo ($controllerName=="order" && $actionName=="allDeliveredeOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allDeliveredeOrders"><i class="icon-folder-remove"></i> All Delivered Orders</a></li>
    			  </ul>
          </li>
        <!--My Package-->
        <li <?php echo ($controllerName=="MyGenealogy")?'class=active':'';?>>
                  <a href="#"><i class="icon-tree6"></i><span>Business Network</span></a>
                  <ul>
                    <!--<li <?php echo ($controllerName=="MyGenealogy" && $actionName=="directReferralTree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy/directReferralTree"><i class="icon-tree5"></i>Direct Referral Tree</a></li>
                   -->

                    <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="feederStageTree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/feederStageTree"><i class="icon-tree5"></i>Standard TREE</a>
                   </li>
                    <?php

                   if($checkrank['exist_in_stage1'])
                   {
                    ?>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage1Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage1Tree"><i class="icon-tree5"></i>Captain TREE</a>
                   </li>
                   <?php
                   }
                   if($checkrank['exist_in_stage2'])
                   {
                   ?>

                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage2Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage2Tree"><i class="icon-tree5"></i>Ambassador TREE</a>
				   </li>
                    <?php
                   }
                   if($checkrank['exist_in_stage3'])
                   {
                    ?>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage3Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage3Tree"><i class="icon-tree5"></i>Baron & Baroness TREE</a>
				   </li>
                   <?php
                   }
                   if($checkrank['exist_in_stage4'])
                   {
                   ?>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage4Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage4Tree"><i class="icon-tree5"></i>Noble TREE</a>
				   </li>
                  <?php
                   }
                   if($checkrank['exist_in_stage5'])
                   {
                  ?>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage5Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage5Tree"><i class="icon-tree5"></i>Royal TREE</a>
				   </li>
                  <?php
                   }
                   if($checkrank['exist_in_stage6'])
                   {
                  ?>
                  <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage6Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage6Tree"><i class="icon-tree5"></i>Stage7 TREE</a>
				   </li>
                  <?php
                   }
                   if($checkrank['exist_in_stage7'])
                   {
                  ?>
                        <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage6Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage6Tree"><i class="icon-tree5"></i>Stage8 TREE</a>
				   </li>
				   <?php
				   }
				   ?>
                  </ul>
       </li>
	  <!--Ewallet Management-->
        <li <?php echo ($controllerName=="ewallet")?'class=active':'';?>>
                  <a href="#"><i class="icon-wallet"></i> <span>Finance</span></a>
                  <ul>
                    <li <?php echo ($controllerName=="ewallet" && $actionName=="viewEwalletBalance")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/viewEwalletBalance"><i class="icon-coins"></i>My Wallet</a></li>
                    <!-- <li <?php echo ($controllerName=="ewallet" && $actionName=="viewCommBalance")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/viewCommBalance"><i class="icon-coins"></i>Earning</a></li> -->
                    <li <?php echo ($actionName=="completedPayoutRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>user/payout/completedPayoutRequestList"><i class="icon-folder-check"></i>Completed Withdraw</a></li>
                    <li <?php echo ($actionName=="pendingPayoutRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>user/payout/pendingPayoutRequestList"><i class="icon-warning22"></i>Pending Withdraw</a></li>
                    <li <?php echo ($actionName=="cancelledPayoutRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>user/payout/cancelledPayoutRequestList"><i class="icon-cancel-circle2"></i>Failed Withdraw</a></li>

                    <li <?php echo ($actionName=="withdrawlMyFund")?'class=active':'';?>><a href="<?php echo site_url();?>user/payout/withdrawlMyFund"><i class="icon-loop3"></i>Request Withdraw</a></li>
                  <li <?php echo ($controllerName=="ewallet" && $actionName=="ewalletFundTransfer")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/ewalletFundTransfer"><i class="icon-calculator"></i>Transfer Fund</a></li>


                    <!--<li <?php echo ($controllerName=="ewallet" && $actionName=="purchaseFund")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/purchaseFund"><i class="icon-cart-add2"></i>Purchase Fund</a></li>-->

                    <!--<li <?php echo ($controllerName=="ewallet" && $actionName=="depositWalletAmountRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/depositWalletAmountRequestList"><i class="icon-briefcase"></i>All Purchase Fund Request</a></li>-->
                    <li <?php echo ($controllerName=="ewallet" && $actionName=="viewCashwalletStatement")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/viewCashwalletStatement/referral"><i class="icon-calculator"></i>Referral Bonus Statement</a></li>
                    <li <?php echo ($controllerName=="ewallet" && $actionName=="viewCashwalletStatement")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/viewCashwalletStatement/cash"><i class="icon-calculator"></i>Cash Statement</a></li>
                    <li <?php echo ($controllerName=="ewallet" && $actionName=="viewCashwalletStatement")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/viewCashwalletStatement/product"><i class="icon-calculator"></i>Product Statement</a></li>
                    <li <?php echo ($controllerName=="ewallet" && $actionName=="viewCashwalletStatement")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/viewCashwalletStatement/saving"><i class="icon-calculator"></i>Shopping Statement</a></li>
                    <li <?php echo ($controllerName=="ewallet" && $actionName=="viewCashwalletStatement")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/viewCashwalletStatement/repurchase"><i class="icon-calculator"></i>Repurchase Bonus Statement</a></li>
                    <li <?php echo ($controllerName=="ewallet" && $actionName=="viewCashwalletStatement")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/viewCashwalletStatement/promo"><i class="icon-calculator"></i>Promo / Other Bonus Statement</a></li>
                    <li <?php echo ($controllerName=="ewallet" && $actionName=="viewEwalletStatement")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/viewEwalletStatement"><i class="icon-calculator"></i>My Account Statement</a></li>


                    <!--<li <?php echo ($controllerName=="ewallet" && $actionName=="viewCashwalletStatement")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/viewCashwalletStatement/reward"><i class="icon-calculator"></i>Reward Statement</a></li>
                    <li <?php echo ($controllerName=="ewallet" && $actionName=="viewCashwalletStatement")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/viewCashwalletStatement/welcome"><i class="icon-calculator"></i>Bonus Statement</a></li>
                    -->


                    <!--<li <?php echo ($controllerName=="ewallet" && $actionName=="viewCashwalletStatement")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/viewCashwalletStatement/invest"><i class="icon-calculator"></i>Investment Statement</a></li>
                    -->
                    <!--
                    <li <?php //echo ($actionName=="allFundTransfer")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/allFundTransfer">All Fund Transfer</a></li>

                    <li <?php echo ($actionName=="depositWalletAmountRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>user/ewallet/depositWalletAmountRequestList">Deposit Wallet Amount Request</a></li>
                  -->
                  </ul>
        </li>
        <!--Payout Management-->
        <!--<li <?php echo ($controllerName=="payout")?'class=active':'';?>>
                  <a href="#"><i class="icon-shuffle"></i> <span>Payout Management</span></a>
                  <ul>


                  </ul>
        </li>-->
        <!--Payout Management-->
       <li <?php echo ($controllerName=="IncomeReport")?'class=active':'';?>>
                  <a href="#"><i class="icon-cash"></i><span>Income Management</span></a>
                  <ul>
                    <li <?php echo ($actionName=="directReferralCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>user/IncomeReport/directReferralCommissionList"><i class="icon-stats-growth"></i>Referral Bonus</a></li>
					<li <?php echo ($actionName=="levelCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>user/IncomeReport/levelCommissionList/cash"><i class="icon-cash2"></i>Cash Income</a></li>
					<li <?php echo ($actionName=="levelCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>user/IncomeReport/levelCommissionList/product"><i class="icon-cash2"></i>Product Income</a></li>
					<li <?php echo ($actionName=="levelCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>user/IncomeReport/levelCommissionList/saving"><i class="icon-cash2"></i>Shopping Income</a></li>
					<li <?php echo ($actionName=="levelCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>user/IncomeReport/levelCommissionList/health"><i class="icon-cash2"></i>Health Income</a></li>
					<li <?php echo ($actionName=="levelCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>user/IncomeReport/levelCommissionList/furniture"><i class="icon-cash2"></i>Furniture Income</a></li>
					<li <?php echo ($actionName=="levelCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>user/IncomeReport/levelCommissionList/home"><i class="icon-cash2"></i>Home/Accommodation Income</a></li>
					<li <?php echo ($actionName=="levelCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>user/IncomeReport/levelCommissionList/car"><i class="icon-cash2"></i>Car/SUV Income</a></li>
					<li <?php echo ($actionName=="levelCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>user/IncomeReport/levelCommissionList/bonus"><i class="icon-cash2"></i>Membership Bonus Income</a></li>
					<li <?php echo ($actionName=="levelCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>user/IncomeReport/levelCommissionList/payoff"><i class="icon-cash2"></i>Membership Payoff Income</a></li>
				  </ul>

	   </li>
        <!--My Team Report-->
        <li <?php echo ($controllerName=="TeamReport")?'class=active':'';?>>
                  <a href="#"><i class="icon-collaboration"></i><span>Team Management</span></a>
                  <ul>
                    <li <?php echo ($actionName=="directReferralMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/directReferralMemberList"><i class="icon-user-tie"></i>Direct Referral Member</a></li>
                    <!--<li <?php echo ($actionName=="teamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/teamMemberList"><i class="icon-man-woman"></i>Team Member</a></li>
                    -->

                    <li <?php echo ($actionName=="feaderTeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/feaderTeamMemberList"><i class="icon-man-woman"></i>Standard Team</a></li>
                    <?php
                    if($checkteam['team_exist_in_stage1'])
                    {
                    ?>
                        <li <?php echo ($actionName=="stage1TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage1TeamMemberList"><i class="icon-users4"></i>Captain Team</a></li>
                   <?php
                    }
                    if($checkteam['team_exist_in_stage2'])
                    {
                   ?>
                        <li <?php echo ($actionName=="stage2TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage2TeamMemberList"><i class="icon-users4"></i>Ambassador Team</a></li>
                    <?php
                    }
                    if($checkteam['team_exist_in_stage3'])
                    {
                    ?>
                        <li <?php echo ($actionName=="stage3TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage3TeamMemberList"><i class="icon-users4"></i>Baron &amp;
Baroness Team</a></li>
                    <?php
                    }
                    if($checkteam['team_exist_in_stage4'])
                    {
                    ?>
                        <li <?php echo ($actionName=="stage4TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage4TeamMemberList"><i class="icon-users4"></i>Noble Team</a></li>
                    <?php
                    }
                    if($checkteam['team_exist_in_stage5'])
                    {
                    ?>
                        <li <?php echo ($actionName=="stage5TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage5TeamMemberList"><i class="icon-users4"></i>Royal Team</a></li>
                   <?php
                    }
                    if($checkteam['team_exist_in_stage6'])
                    {
                    ?>
                        <li <?php echo ($actionName=="stage6TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage6TeamMemberList"><i class="icon-users4"></i>Stage7 Team</a></li>
                   <?php
                    }
                    if($checkteam['team_exist_in_stage7'])
                    {
                    ?>
                        <li <?php echo ($actionName=="stage7TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage7TeamMemberList"><i class="icon-users4"></i>Stage8 Team</a></li>
                   <?php
                    }
                   ?>


                  </ul>
       </li>
        <!--Sub Account Management-->
       <?php
      if(isBankWireEnables())
      {
      ?>
        <!--Bank wire member report-->
        <li <?php echo ($controllerName=="BankWireMemberReport")?'class=active':'';?>>
                  <a href="#"><i class="icon-collaboration"></i><span>Bank Wire Member Report</span></a>
                  <ul>
                    <li <?php echo ($actionName=="pendingMember")?'class=active':'';?>><a href="<?php echo site_url();?>user/BankWireMemberReport/pendingMember"><i class="icon-user-tie"></i>Pending Member</a></li>

                    <li <?php echo ($actionName=="approvedMember")?'class=active':'';?>><a href="<?php echo site_url();?>user/BankWireMemberReport/approvedMember"><i class="icon-users4"></i>Approved Member</a></li>

                    <li <?php echo ($actionName=="approvedMember")?'class=active':'';?>><a href="<?php echo site_url();?>user/BankWireMemberReport/cancelledMember"><i class="icon-users4"></i>Cancelled Member</a></li>

                  </ul>
       </li>
        <?php
        }
        ?>

		 <!--Shopping wallet Management-->
        <!--<li <?php echo ($controllerName=="shopping_wallet")?'class=active':'';?>>
                  <a href="#"><i class="icon-wallet"></i> <span>My Shopping Wallet</span></a>
                  <ul>
                    <li <?php echo ($controllerName=="shopping_wallet" && $actionName=="viewEwalletBalance")?'class=active':'';?>><a href="<?php echo site_url();?>user/shopping_wallet/viewEwalletBalance"><i class="icon-coins"></i>My Shopping Wallet Balance</a></li>


                    <li <?php echo ($controllerName=="shopping_wallet" && $actionName=="purchaseFund")?'class=active':'';?>><a href="<?php echo site_url();?>user/shopping_wallet/purchaseFund"><i class="icon-cart-add2"></i>Purchase Fund</a></li>

                    <li <?php echo ($controllerName=="shopping_wallet" && $actionName=="depositWalletAmountRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>user/shopping_wallet/depositWalletAmountRequestList"><i class="icon-briefcase"></i>All Purchase Fund Request</a></li>

                    <li <?php echo ($controllerName=="shopping_wallet" && $actionName=="viewEwalletStatement")?'class=active':'';?>><a href="<?php echo site_url();?>user/shopping_wallet/viewEwalletStatement"><i class="icon-calculator"></i>Shopping Wallet Statement</a></li>


                  </ul>
        </li>-->


        <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
              <a href="#"><i class="icon-select2"></i> <span>Contact Support</span></a>
              <ul>
                <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="<?php echo site_url();?>user/SupportTicket/openTicket"><i class="icon-enter3"></i> Customer Support </a></li>
                <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="<?php echo site_url();?>user/SupportTicket/closedTicket"><i class="icon-enter3"></i> Closed Ticket </a></li>

                <!--<li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Contact Your Sponsor </a></li>
                <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Contact System Admin </a></li>
                <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Report Fraud </a></li>-->
              </ul>
        </li>
        <!--Payout Management-->
        <li <?php echo ($controllerName=="MessagePanel")?'class=active':'';?>>
          <a href="#"><i class="icon-envelop"></i> <span>Messaging</span></a>
          <ul>
            <li <?php echo ($actionName=="inbox")?'class=active':'';?>><a href="<?php echo site_url();?>user/MessagePanel/inbox"><i class="icon-envelop3"></i> Inbox </a></li>
            <li <?php echo ($actionName=="composeMessage")?'class=active':'';?>><a href="<?php echo site_url();?>user/MessagePanel/composeMessage"><i class="icon-compose"></i> Compose Message </a></li>
            <li <?php echo ($actionName=="sentMessage")?'class=active':'';?>><a href="<?php echo site_url();?>user/MessagePanel/sentMessage"><i class="icon-task"></i> Sent Message </a></li>
            <!--<li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Latest Update </a></li>-->
          </ul>
        </li>

        <!------Policy Section---->
        <li style="display:none" <?php echo ($controllerName=="policy")?'class=active':'';?>>
                  <a href="#"><i class="icon-file-eye2"></i> <span>Policy Section</span></a>
                  <ul>
                    <li <?php echo ($actionName=="privacyPolicy")?'class=active':'';?>><a href="<?php echo site_url();?>user/policy/privacyPolicy"><i class="icon-book2"></i>Privacy Policies</a></li>
                    <li <?php echo ($actionName=="termsCondition")?'class=active':'';?>><a href="<?php echo site_url();?>user/policy/termsCondition"><i class="icon-book"></i>Terms and Conditions</a></li>
                  </ul>
        </li>
        <li style="display:none" <?php echo ($actionName=="faq")?'class=active':'';?>>
                  <a href="<?php echo site_url();?>user/policy/faq"><i class="icon-file-eye2"></i> <span>FAQ</span></a>

        </li>
        <!------Marketin tools Section---->
        <!--<li <?php echo ($controllerName=="MarketingTools")?'class=active':'';?>>
          <a href="#"><i class="icon-power-cord"></i> <span>Advertising</span></a>
          <ul>
             <li <?php echo ($actionName=="viewReferralLinks")?'class=active':'';?>><a href="<?php echo site_url();?>user/MarketingTools/viewReferralLinks"><i class="icon-collaboration"></i>Share My Referral Link </a></li>
             <li <?php echo ($controllerName=="MarketingTools" && ($actionName=="viewImageList" || $actionName=="viewAllImages" || $actionName=="viewVideoList" || $actionName=="viewAllVideo"))?'class=active':'';?>>
                <a href="#"><i class="icon-video-camera"></i> Files & Videos</a>
                <ul>
                   <li <?php echo ($actionName=="viewAllImages")?'class=active':'';?>><a href="<?php echo site_url();?>user/MarketingTools/viewAllImages"><i class="icon-image4"></i>View All Images</a></li>
                   <li <?php echo ($actionName=="viewAllVideo")?'class=active':'';?>><a href="<?php echo site_url();?>user/MarketingTools/viewAllVideo"><i class="icon-clapboard-play"></i>View All Video</a></li>
                </ul>
             </li>
             <li ><a href="#"><i class="icon-collaboration"></i> Ads </a></li>
             <li ><a href="#"><i class="icon-collaboration"></i> Setting </a></li>
          </ul>
        </li>
           <li <?php echo ($controllerName=="policy")?'class=active':'';?>>
                  <a href="#"><i class="icon-file-eye2"></i> <span>Download</span></a>
                  <ul>
                    <li ><a href="#"><i class="icon-book2"></i>Downloads</a></li>
                    <li ><a href="#"><i class="icon-book"></i>Download Setting</a></li>
                    <li ><a href="#"><i class="icon-book"></i>Print Setting</a></li>
                  </ul>
        </li>-->
        <!--Payout Management-->
         <!--<li <?php echo ($controllerName=="eshop" || $controllerName=="orders")?'class=active':'';?>>
                  <a href="#"><i class="icon-stats-bars"></i> <span>Eshop</span></a>
                  <ul>
				 <li <?php //echo ($controllerName=="eshop" && $actionName=="index")?'class=active':'';?>><a href="<?php //echo site_url().$moduleName;?>/eshop/"><i class="icon-home4"></i> <span>Eshop Dashboard</span></a></li>

					 <li <?php echo ($controllerName=="eshop")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Store Management</a>
                        <ul>
                           <!--
						   <li <?php echo ($actionName=="allCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allCategoryList"><i class="icon-inbox"></i> Categories</a></li>

						    <li <?php echo ($actionName=="allSubCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allSubCategoryList"><i class="icon-inbox"></i>Sub Categories</a></li>

                           <li <?php echo ($actionName=="allProductList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allProductList"><i class="icon-inbox"></i> Products</a></li> -->

                        </ul>
                     </li>
					 <!--
					 <li <?php echo ($controllerName=="orders")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Order Management</a>
                        <ul>
                           <li <?php echo ($actionName=="allOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/orders/allOrders"><i class="icon-inbox"></i> All Orders</a></li>

						    <li <?php echo ($actionName=="allPendingOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/orders/allPendingOrders"><i class="icon-inbox"></i> All Pending Orders</a></li>

							   <li <?php echo ($actionName=="allDeliveredOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/orders/allDeliveredOrders"><i class="icon-inbox"></i> All Delivered Orders</a></li>

                        </ul>
                     </li>
					 -->
                  </ul>
               </li>
	  </ul>
  </div>
</div>
</aside>

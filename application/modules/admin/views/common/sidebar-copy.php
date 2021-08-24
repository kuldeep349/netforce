<?php 
   $moduleName=$this->router->fetch_module();
   $controllerName=$this->router->fetch_class();
   $actionName=$this->router->fetch_method();
   $admin=getProfileInfo();
?>
<div class="sidebar sidebar-main">
   <div class="sidebar-content">
      <!-- User menu -->
      <div class="sidebar-user">
         <div class="category-content">
            <div class="media">
               <a href="#" class="media-left"><img src="<?php echo base_url('front_assets/images/logo.png');?>" class="img-circle img-sm" alt=""></a>
               <div class="media-body">
                  <span class="media-heading text-semibold"><?php echo $admin->username;?></span>
                  <div class="text-size-mini text-muted">
                     <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /user menu -->
      <!-- Main navigation -->
                    <!-- user profile -->
          
          <!-- / user profile-->
                              <!-- nav -->
          <nav ui-nav class="navi clearfix">
            <ul class="nav menu-navigation">
            <ul class="navigation navigation-main navigation-accordion">
               <!-- Main -->
               <li class="navigation-header"><span></span> <i class="icon-menu" title="Main pages"></i></li>
               <li <?php echo ($controllerName=="admin")?'class=active':'';?>><a href="<?php echo site_url();?>admin/"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
               <li class="navigation-divider"></li>
               
               <li <?php echo ($controllerName=="setting" && $actionName=='currencySetting')?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/currencySetting"><i class="icon-coins"></i> <span>Currency Setting</span></a></li>
               
               <li <?php echo ($controllerName=="setting" && $actionName=='userIdSetting')?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/userIdSetting"><i class="icon-wrench3"></i> <span>User Id Setting</span></a></li>
               
               
               <li <?php echo ($controllerName=="setting" && $actionName=='dateFormatManagement')?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/dateFormatManagement"><i class="icon-clipboard5"></i> <span>Date Format Setting</span></a></li>
               <li <?php echo ($controllerName=="setting" && $actionName=='paymentModeSetting')?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/paymentModeSetting"><i class="icon-portfolio"></i> <span>Payment Mode Setting</span></a></li>
               
               <li class="navigation-divider"></li>
               <li <?php echo ($controllerName=="stockist")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Stockist Management</a>
                        <ul>
                           <li <?php echo ($actionName=="allStockist")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/stockist/allStockist"><i class="icon-inbox"></i> All Stockist</a></li>
                           <li <?php echo ($actionName=="addNewStockist")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/stockist/addNewStockist"><i class="icon-inbox"></i> Add New Stockist</a></li>
						   
                            <li <?php echo ($actionName=="allStockistOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allStockistOrders"><i class="icon-inbox"></i> All Orders</a></li>
						  
                        </ul>
                     </li> 
			   <li <?php echo ($controllerName=="eshop" || $controllerName=="orders")?'class=active':'';?>>
                  <a href="#"><i class="icon-stats-bars"></i> <span>Eshop</span></a>
                  <ul>
				  <li <?php echo ($controllerName=="eshop" && $actionName=="index")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/"><i class="icon-home4"></i> <span>Eshop Dashboard</span></a></li>
                     
					 <li <?php echo ($controllerName=="eshop")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Store Management</a>
                        <ul>
                           <li <?php echo ($actionName=="addNewCategory")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/addNewCategory"><i class="icon-inbox"></i> Add New Categories</a></li>
                           <li <?php echo ($actionName=="allCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allCategoryList"><i class="icon-inbox"></i>View All Categories</a></li>
						   <li <?php echo ($actionName=="addNewSubCategory")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/addNewSubCategory"><i class="icon-inbox"></i>Add Sub Categories</a></li>
						   <li <?php echo ($actionName=="allSubCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allSubCategoryList"><i class="icon-inbox"></i>View Sub Categories</a></li>
						   
                           <li <?php echo ($actionName=="allProductList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allProductList"><i class="icon-inbox"></i>View All Products</a></li>
                          <li <?php echo ($actionName=="allProductStock")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allProductStock"><i class="icon-inbox"></i>View All Stocks</a></li>
                          
                        </ul>
                     </li>
					
					 <li <?php echo ($controllerName=="orders")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Order Management</a>
                        <ul>
                           <li <?php echo ($actionName=="allOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allOrders"><i class="icon-inbox"></i> All Orders</a></li>
						   
						    <li <?php echo ($actionName=="allPendingOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allPendingOrders"><i class="icon-inbox"></i> All Pending Orders</a></li>
							
							<li <?php echo ($actionName=="allConfirmedOrder")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allConfirmedOrder"><i class="icon-inbox"></i> All Confirm Orders</a></li>
							
							  
							<li <?php echo ($actionName=="allDeliveredOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allDeliveredOrders"><i class="icon-inbox"></i> All Delivered Orders</a></li>
							
							<li <?php echo ($actionName=="allRejectedOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allRejectedOrders"><i class="icon-inbox"></i> All Rejected Orders</a></li>
						   
                          
                        </ul>
                     </li>
					 <li <?php echo ($controllerName=="eshop_adv")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Eshop Advertisement</a>
                        <ul>
                           <li <?php echo ($actionName=="sliderImageList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_adv/sliderImageList"><i class="icon-inbox"></i> All Slider Image</a></li>
						   
						    <li <?php echo ($actionName=="sliderSideImageList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_adv/sliderSideImageList"><i class="icon-inbox"></i> Slider Right Side Image</a></li>
							
							  
						    <li <?php echo ($actionName=="bannerImageList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_adv/bannerImageList"><i class="icon-inbox"></i> Banner Images</a></li>
						   
                          
                        </ul>
                     </li>
					 
                     
                  </ul>
               </li>
              
               <li class="navigation-divider"></li>
               <!--
               <li <?php echo ($controllerName=="setting" && $actionName=='payoutSetting')?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/payoutSetting"><i class="icon-shuffle"></i> <span>Payout Setting</span></a></li>
               -->
              <li class="navigation-divider"></li>
               <li <?php echo ($controllerName=="package")?'class=active':'';?>>
                  <a href="#"><i class="icon-puzzle4"></i> <span>Package Management</span></a>
                  <ul>
                    
					 <!--
					 <li <?php echo ($actionName=="addNewPackage")?'class=active':'';?>><a href="<?php echo site_url();?>admin/package/addNewPackage"><i class="icon-file-plus2"></i> Add Package</a></li>
					-->
                     <li <?php echo ($actionName=="allPackages")?'class=active':'';?>><a href="<?php echo site_url();?>admin/package/allPackages"><i class="icon-file-text3"></i> All/Edit Package</a></li>
                  </ul>
               </li>
			   
			   
               
               <li class="navigation-divider"></li>
               <li <?php echo ($controllerName=="MyGenealogy")?'class=active':'';?>>
                  <a href="#"><i class="icon-tree6"></i> <span>Genealogy</span></a>
                  <ul>
                     <li <?php echo ($controllerName=="MyGenealogy" && $actionName=="directReferralTree")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MyGenealogy/directReferralTree"><i class="icon-tree5"></i> Direct Referral Tree </a></li>
					 
                     <li <?php echo ($controllerName=="MyGenealogy" && $actionName=="feederStageTree")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MyGenealogy/feederStageTree"><i class="icon-tree5"></i>Stage1 TREE</a></li>
                     <?php 
                     $exist=checkUserExistenceInAllStages(COMP_USER_ID);
                     if($exist['exist_in_stage1'])
                     {
                     ?>
                    <li <?php echo ($controllerName=="MyGenealogy" && $actionName=="stage1Tree")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MyGenealogy/stage1Tree"><i class="icon-tree5"></i>Stage2 TREE</a></li>
                     <?php  
                     }
                     if($exist['exist_in_stage2'])
                     {
                     ?>
                     <li <?php echo ($controllerName=="MyGenealogy" && $actionName=="stage2Tree")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MyGenealogy/stage2Treee"><i class="icon-tree5"></i>Stage3 TREE</a></li>
                     <?php 
                      }
                     ?>

                  </ul>
               </li>
      <!--My Genealogy1-->
			<!--<li <?php echo ($controllerName=="MyGenealogy1")?'class=active':'';?>>
                  <a href="#"><i class="icon-tree6"></i><span>My Genealogy1</span></a>
                  <ul>
				  <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="directReferralTree")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MyGenealogy/directReferralTree"><i class="icon-tree5"></i> Direct Referral Tree </a></li>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="feederStagetree")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MyGenealogy1/feederStagetree"><i class="icon-tree5"></i>Feeder Stage TREE</a>
                   </li>
                    <?php
                    $exist=checkUserExistenceInAllStages(COMP_USER_ID);
                    if($exist['exist_in_stage1'])
                    {
                    ?>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage1Tree")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MyGenealogy1/stage1Tree"><i class="icon-tree5"></i>Stage2 TREE</a>
                   </li>
                    <?php   
                    }//end if
                    ?>
                    <?php 
                    if($exist['exist_in_stage2'])
                    {
                    ?>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage2Tree")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MyGenealogy1/stage2Tree"><i class="icon-tree5"></i>Stage3 TREE</a>
                    <?php   
                    }//end if
                    ?>
                   </li>
                  </ul>
			   </li> -->
        <li <?php echo ($controllerName=="member")?'class=active':'';?>>
                  <a href="#"><i class="icon-people"></i> <span>Member Management</span></a>
                  <ul>
                     <li <?php echo ($actionName=="viewAllMember")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/viewAllMember"><i class="icon-collaboration"></i> View All Member</a></li>
                     <li <?php echo ($actionName=="activeMember")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/activeMember"><i class="icon-user-check"></i> Active Member</a></li>
                     <li <?php echo ($actionName=="inactiveMember")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/inactiveMember"><i class="icon-user-cancel"></i> Inactive Member</a></li>
                     <li <?php echo ($actionName=="blockUnblockMember")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/blockUnblockMember"><i class="icon-user-block"></i> Block/Unblock Member</a></li>
                     <li class="navigation-divider"></li>
                     <li <?php echo ($actionName=="passwordTracker")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/passwordTracker"><i class="icon-lock"></i> Password Tracker</a></li>
                  </ul>
               </li>
               <!---Report Management section start from here-->
               <li <?php echo ($controllerName=="PayoutReport" || $controllerName=="CommissionReport")?'class=active':'';?>>
                  <a href="#"><i class="icon-stats-bars"></i> <span>Report Management</span></a>
                  <ul>
                     <li <?php echo ($controllerName=="PayoutReport")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Payout Report</a>
                        <ul>
                           <li <?php echo ($actionName=="activePayout")?'class=active':'';?>><a href="<?php echo site_url();?>admin/PayoutReport/activePayout"><i class="icon-inbox"></i> Active Payout</a></li>
                           <li <?php echo ($actionName=="payoutCompleted")?'class=active':'';?>><a href="<?php echo site_url();?>admin/PayoutReport/payoutCompleted"><i class="icon-task"></i> Payout Completed</a></li>
                           <li <?php echo ($actionName=="payoutCancelled")?'class=active':'';?>><a href="<?php echo site_url();?>admin/PayoutReport/payoutCancelled"><i class="icon-close2"></i> Payout Cancelled</a></li>
                           <li <?php echo ($actionName=="payoutGraph")?'class=active':'';?>><a href="<?php echo site_url();?>admin/PayoutReport/payoutGraph"><i class="icon-graph"></i> Payout Graph</a></li>
                        </ul>
                     </li>
                     <li <?php echo ($controllerName=="CommissionReport")?'class=active':'';?>>
                        <a href="#"><i class="icon-coins"></i> Commission Report</a>
                        <ul>
                           <li <?php echo ($actionName=="directReferralCommission")?'class=active':'';?>><a href="<?php echo site_url();?>admin/CommissionReport/directReferralCommission"><i class="icon-user-plus"></i>Referral Bonus List</a></li>
                           
						   <li <?php echo ($actionName=="matrixLevelCompleteCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/CommissionReport/matrixLevelCompleteCommissionList"><i class="icon-users4"></i>Level Complete Bonus List</a></li>
                           
						   <li <?php echo ($actionName=="matrixCompleteCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/CommissionReport/matrixCompleteCommissionList"><i class="icon-users4"></i>Stage Change Bonus List</a></li>
						   
						   <li <?php echo ($actionName=="matrixCompleteRankBonusList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/CommissionReport/matrixCompleteRankBonusList"><i class="icon-users4"></i>Stage Change Inactive List</a></li>
						   
                        </ul>
                     </li>
                     <li <?php echo ($actionName=="rankAchieverReport")?'class=active':'';?>><a href="<?php echo site_url();?>admin/CommissionReport/rankAchieverReport"><i class="icon-medal-first"></i> Rank Achiever Report</a></li>
                     <li <?php echo ($actionName=="topEarnerReport")?'class=active':'';?>><a href="<?php echo site_url();?>admin/CommissionReport/topEarnerReport"><i class="icon-trophy3"></i> Top Earner Report</a></li>
                     <li <?php echo ($actionName=="topRecruiterReport")?'class=active':'';?>><a href="<?php echo site_url();?>admin/CommissionReport/topRecruiterReport"><i class="icon-trophy4"></i> Top Recruiter Report</a></li>
                     <li <?php echo ($actionName=="grantRankBonus")?'class=active':'';?>><a href="<?php echo site_url();?>admin/CommissionReport/grantRankBonus"><i class="icon-trophy4"></i> Grant Rank Bonus</a></li>
                  </ul>
               </li>
               <!---Report Management section end over here-->
               <li <?php echo ($controllerName=="AdminWallet" || $controllerName=="UserWallet")?'class=active':'';?>>
                  <a href="#"><i class="icon-wallet"></i> <span>E-Wallet Management</span></a>
                  <ul>
                     <li <?php echo ($controllerName=="AdminWallet")?'class=active':'';?>>
                        <a href="#"><i class="icon-user-tie"></i> Admin Wallet</a>
                        <ul>
                           <li <?php echo ($actionName=="viewAminWalletReport")?'class=active':'';?>><a href="<?php echo site_url();?>admin/AdminWallet/viewAminWalletReport"><i class="icon-inbox"></i>Wallet Report</a></li>

                           <li <?php echo ($actionName=="viewEwalletBalance")?'class=active':'';?>><a href="<?php echo site_url();?>admin/AdminWallet/viewEwalletBalance"><i class="icon-coins"></i>My Wallet Balance</a></li>
                           
                           <li <?php echo ($actionName=="viewAminWalletGraph")?'class=active':'';?>><a href="<?php echo site_url();?>admin/AdminWallet/viewAminWalletGraph"><i class="icon-graph"></i>Wallet Graph</a></li>
                        </ul>
                     </li>
                     <li <?php echo ($controllerName=="UserWallet")?'class=active':'';?>>
                        <a href="#"><i class="icon-vcard"></i> User Wallet</a>
                        <ul>
                           <li <?php echo ($controllerName=="UserWallet" && $actionName=="userWalletBalance")?'class=active':'';?>><a href="<?php echo site_url();?>admin/UserWallet/userWalletBalance"><i class="icon-coins"></i>User Wallet Balance</a></li>
                           
						   <li <?php echo ($controllerName=="UserWallet" && $actionName=="manageUserWallet")?'class=active':'';?>><a href="<?php echo site_url();?>admin/UserWallet/manageUserWallet"><i class="icon-database"></i> Manage User Wallet</a></li>
                           
						   <li <?php echo ($controllerName=="UserWallet" && $actionName=="pendingDepositRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/UserWallet/pendingDepositRequestList"><i class="icon-warning22"></i> Pending Deposit Request</a></li>
                           
						   <li <?php echo ($controllerName=="UserWallet" && $actionName=="approvedDepositRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/UserWallet/approvedDepositRequestList"><i class="icon-database-check"></i> Approved Deposit Request</a></li>
                           
						   <li <?php echo ($controllerName=="UserWallet" && $actionName=="cancelledDepositRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/UserWallet/cancelledDepositRequestList"><i class="icon-database-remove"></i> Cancelled Deposit Request</a></li>
                        </ul>
                     </li>
					 <!----------------->
					 
                  </ul>
               </li>
               <?php 
               if(isBankWireEnables())
                 {
               ?>
                 <!--Bank wire member report-->
                 <li <?php echo ($controllerName=="BankWireMemberReport")?'class=active':'';?>>
                           <a href="#"><i class="icon-collaboration"></i><span>Bank Wire Member Report</span></a>
                           <ul>
                             <li <?php echo ($actionName=="updateBankWireInfo")?'class=active':'';?>><a href="<?php echo site_url();?>admin/BankWireMemberReport/bankWireDetail"><i class="icon-user-tie"></i>Bank Wire Detail</a></li>

                             <li <?php echo ($actionName=="pendingMember")?'class=active':'';?>><a href="<?php echo site_url();?>admin/BankWireMemberReport/pendingMember"><i class="icon-user-tie"></i>Pending Member</a></li>
                             
                             <li <?php echo ($actionName=="approvedMember")?'class=active':'';?>><a href="<?php echo site_url();?>admin/BankWireMemberReport/approvedMember"><i class="icon-users4"></i>Approved Member</a></li>

                             <li <?php echo ($actionName=="cancelledMember")?'class=active':'';?>><a href="<?php echo site_url();?>admin/BankWireMemberReport/cancelledMember"><i class="icon-users4"></i>Cancelled Member</a></li>
                            
                           </ul>
                 </li>
                 <?php  
                 }
                 if(isEpinEnabled())
                  {
                  ?>
               <li <?php echo ($controllerName=="Epin")?'class=active':'';?>>
                  <a href="#"><i class="icon-power-cord"></i> <span>E-Pin Management</span></a>
                  <ul>
                     <li <?php echo ($actionName=="pendingEpinRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/epin/pendingEpinRequestList"><i class="icon-clipboard2"></i> Pin Request </a></li>
                     <li <?php echo ($actionName=="createNewPin")?'class=active':'';?>><a href="<?php echo site_url();?>admin/epin/createNewPin"><i class="icon-switch"></i> Create New Pin </a></li>
                     <li <?php echo ($actionName=="approvedEpinRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/epin/approvedEpinRequestList"><i class="icon-clipboard2"></i>Confirm Pin Request</a></li>
                     <li <?php echo ($actionName=="cancelledEpinRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/epin/cancelledEpinRequestList"><i class="icon-clipboard2"></i>Cancelled Pin Request</a></li>
                     <li <?php echo ($actionName=="activePinList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/epin/activePinList"><i class="icon-database-check"></i>Active Pin</a></li>
                     <li <?php echo ($actionName=="usedPinList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/epin/usedPinList"><i class="icon-database-time2"></i>Used Pin</a></li>
                     <li <?php echo ($actionName=="deleteBlockEpinList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/epin/deleteBlockEpinList"><i class="icon-database-remove"></i> Delete/Block Pin </a></li>
                     <li <?php echo ($actionName=="transferEpin")?'class=active':'';?>><a href="<?php echo site_url();?>admin/epin/transferEpin"><i class="icon-loop"></i> Transfer Pin </a></li>
                     <li <?php echo ($actionName=="transferredPinList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/epin/transferredPinList"><i class="icon-database-arrow"></i>Pin Transfer Report</a></li>
                     <li <?php echo ($actionName=="showWebsiteEpinRequest")?'class=active':'';?>><a href="<?php echo site_url();?>admin/epin/showWebsiteEpinRequest"><i class="icon-clipboard2"></i>Show Website Epin Request</a></li>
                     <!--
                        <li><a href="#"><i class="icon-clipboard2"></i> Pin Request </a></li>
                        <li><a href="#"><i class="icon-switch"></i> Create New Pin </a></li>
                        <li><a href="#"><i class="icon-database-check"></i> Active Pin </a></li>
                        <li><a href="#"><i class="icon-database-time2"></i> Used Pin </a></li>
                        <li><a href="#"><i class="icon-database-remove"></i> Delete/Block Pin </a></li>
                        <li><a href="#"><i class="icon-loop"></i> Transfer Pin </a></li>
                        <li><a href="#"><i class="icon-database-arrow"></i> Pin Transfer Report </a></li>
                        -->
                  </ul>
               </li>
               <?php   
                  }
                  ?>
               <li class="navigation-divider"></li>
               <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-question4"></i> <span>Support Ticket</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="<?php echo site_url();?>admin/SupportTicket/openTicket"><i class="icon-enter3"></i> Open Ticket </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="<?php echo site_url();?>admin/SupportTicket/closedTicket"><i class="icon-cancel-square2"></i> Closed Ticket </a></li>
                  </ul>
               </li>
               <li <?php echo ($controllerName=="MessagePanel")?'class=active':'';?>>
                  <a href="#"><i class="icon-envelop"></i> <span>Message Panel</span></a>
                  <ul>
                     <li <?php echo ($actionName=="inbox")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MessagePanel/inbox"><i class="icon-envelop3"></i> Inbox </a></li>
                     <li <?php echo ($actionName=="composeMessage")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MessagePanel/composeMessage"><i class="icon-compose"></i> Compose Message </a></li>
                     <li <?php echo ($actionName=="sentMessage")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MessagePanel/sentMessage"><i class="icon-task"></i> Sent Message </a></li>
                  </ul>
               </li>
               <li <?php echo ($controllerName=="MarketingTools")?'class=active':'';?>>
                  <a href="#"><i class="icon-power-cord"></i> <span>Marketing Tools</span></a>
                  <ul>
                     <li <?php echo ($actionName=="viewReferralLinks")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MarketingTools/viewReferralLinks"><i class="icon-collaboration"></i> Referral Link </a></li>
                     <li <?php echo ($actionName=="viewSocialMediaLinks")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MarketingTools/viewSocialMediaLinks"><i class="icon-share3"></i> Social Media Links </a></li>
                     
                     <li <?php echo ($controllerName=="MarketingTools" && ($actionName=="viewImageList" || $actionName=="viewAllImages" || $actionName=="viewVideoList" || $actionName=="viewAllVideo"))?'class=active':'';?>>
                       
                        <a href="#"><i class="icon-video-camera"></i> Files & Videos</a>
                        
                        <ul>
                           <li <?php echo ($actionName=="viewImageList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MarketingTools/viewImageList"><i class="icon-image3"></i>Image List</a></li>

                           <li <?php echo ($actionName=="viewAllImages")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MarketingTools/viewAllImages"><i class="icon-image4"></i>View All Images</a></li>
                           
                           <li <?php echo ($actionName=="viewVideoList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MarketingTools/viewVideoList"><i class="icon-play"></i>Video List</a></li>
                           
                           <li <?php echo ($actionName=="viewAllVideo")?'class=active':'';?>><a href="<?php echo site_url();?>admin/MarketingTools/viewAllVideo"><i class="icon-clapboard-play"></i>View All Video</a></li>
                        
                        </ul>
                     </li>
                  </ul>
               </li>
               <li <?php echo ($controllerName=="policy")?'class=active':'';?>>
                  <a href="#"><i class="icon-file-eye2"></i> <span>Policy Section</span></a>
                  <ul>
                     <li <?php echo ($actionName=="editPrivacyPolicy")?'class=active':'';?>><a href="<?php echo site_url();?>admin/policy/editPrivacyPolicy"><i class="icon-book2"></i> Privacy Policies </a></li>
                     <li <?php echo ($actionName=="editTermsCondition")?'class=active':'';?>><a href="<?php echo site_url();?>admin/policy/editTermsCondition"><i class="icon-book"></i> Terms and Conditions </a></li>
                  <li <?php echo ($actionName=="aboutUs")?'class=active':'';?>><a href="<?php echo site_url();?>admin/policy/aboutUs"><i class="icon-book"></i> About Us </a></li>
                  
                  </ul>
               </li>
               <li class="navigation-divider"></li>
               <li <?php echo ($controllerName=="account")?'class=active':'';?>>
                  <a href="#"><i class="icon-hammer-wrench"></i> <span>Account Setting</span></a>
                  <ul>
                     <li <?php echo ($actionName=="profileManagement")?'class=active':'';?>><a href="<?php echo site_url();?>admin/account/profileManagement"><i class="icon-user-tie"></i>Profile Management</a></li>
                     <li <?php echo ($actionName=="changePassword")?'class=active':'';?>><a href="<?php echo site_url();?>admin/account/changePassword"><i class="icon-key"></i> Change Password </a></li>
                  </ul>
               </li>
               
            </ul>
			</ul>
      <!-- /main navigation -->
	  </nav>
   </div>
</div>

<style>
.navbar-inverse {
    background-color: #66bb6a !important;
    border-color: #157703 !important;
}
.sidebar {
    background-color: #66bb6a;
}
.navigation>li.active>a, .navigation>li.active>a:hover, .navigation>li.active>a:focus {
    background-color: #087d0a;
    color: #fff;
}
</style>
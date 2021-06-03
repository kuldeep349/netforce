<?php 
   $moduleName=$this->router->fetch_module();
   $controllerName=$this->router->fetch_class();
   $actionName=$this->router->fetch_method();
   $admin=getProfileInfo();
   $cmsinfo=getCmsInfo();
?>
<div class="sidebar sidebar-main">
   <div class="sidebar-content">
      <!-- User menu -->
      <div class="sidebar-user">
         <div class="category-content">
            <div class="media">
               <a href="#" class="media-left"><img src="<?php echo base_url();?>images/<?php echo $admin->image;?>" class="img-circle img-sm" alt=""></a>
               <div class="media-body">
                  <span class="media-heading text-semibold"><?php echo $admin->username;?></span>
                  <div class="text-size-mini text-muted">
                     <i class="icon-pin text-size-small"></i> &nbsp;Nigeria
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
               <li <?php echo ($controllerName=="setting" && $actionName=='currencySetting')?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/currencySetting"><i class="icon-coins"></i> <span>Currency Setting</span></a></li>
               
               <li <?php echo ($controllerName=="setting" && $actionName=='userIdSetting')?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/userIdSetting"><i class="icon-wrench3"></i> <span>User Id Setting</span></a></li>
               <li <?php echo ($controllerName=="ticketSetting" && $asctionName=='ticketSetting')?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Ticket_Management/viewTicket"><i class="icon-wrench3"></i> <span>Ticket</span></a></li>
               
               
               <li <?php echo ($controllerName=="setting" && $actionName=='dateFormatManagement')?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/dateFormatManagement"><i class="icon-clipboard5"></i> <span>Date Format Setting</span></a></li>
               <li <?php echo ($controllerName=="setting" && $actionName=='paymentModeSetting')?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/paymentModeSetting"><i class="icon-portfolio"></i> <span>Payment Mode Setting</span></a></li>
               
           
			   <li <?php echo ($controllerName=="eshop" || $controllerName=="orders")?'class=active':'';?>>
                  <a href="#"><i class="icon-stats-bars"></i> <span>Eshop</span></a>
                  <ul>
				  <!--<li <?php echo ($controllerName=="eshop" && $actionName=="index")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/"><i class="icon-home4"></i> <span>Eshop Dashboard</span></a></li>
                     
					--> <li <?php echo ($controllerName=="eshop" && $actionName!="allcollectionCategoryList")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Store Management</a>
                        <ul>
                           <li <?php echo ($actionName=="addNewCategory")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/addNewCategory"><i class="icon-inbox"></i> Add New Categories</a></li>
                           <li <?php echo ($actionName=="allCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allCategoryList"><i class="icon-inbox"></i>View All Categories</a></li>
						   <li <?php echo ($actionName=="addNewSubCategory")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/addNewSubCategory"><i class="icon-inbox"></i>Add Sub Categories</a></li>
						   <li <?php echo ($actionName=="allSubCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allSubCategoryList"><i class="icon-inbox"></i>View Sub Categories</a></li>
						   
                           <li <?php echo ($actionName=="allProductList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allProductList"><i class="icon-inbox"></i>View All Products</a></li>
                       <li <?php echo ($actionName=="allOrganicProductList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allOrganicProductList"><i class="icon-inbox"></i>View All Organic Products</a></li>
                       
                        </ul>
                     </li>
                     <li <?php echo ($controllerName=="eshop" && $actionName=="allcollectionCategoryList")?'class=':'';?>>
                        <a href="#"><i class="icon-price-tag"></i>Stockist Management</a>
                        <ul>
                           <li <?php echo ($actionName=="allcollectionCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allcollectionCategoryList"><i class="icon-inbox"></i>Stockist</a></li>
                           <!--<li <?php echo ($actionName=="allCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allcollectionCategoryList"><i class="icon-inbox"></i>View All Categories</a></li>
						   <li <?php echo ($actionName=="addNewSubCategory")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/addNewcollectionSubCategory"><i class="icon-inbox"></i>Add Sub Categories</a></li>
						   <li <?php echo ($actionName=="allSubCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop/allcollectionSubCategoryList"><i class="icon-inbox"></i>View Sub Categories</a></li>
						   -->
                        </ul>
                     </li>
                  </ul>
               </li>
               <li <?php echo ($controllerName=="eshop_orders")?'class=active':'';?>>
                  <a href="#"><i class="icon-stats-bars"></i> <span>Order Management</span></a>
                  <ul>
                     <a href="#"><i class="icon-price-tag"></i> E-Shopping Orders</a>
                        <ul>
                           <li <?php echo ($actionName=="allOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allOrders"><i class="icon-inbox"></i> All Orders</a></li>
                           <li <?php echo ($actionName=="pendingOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/pendingOrders"><i class="icon-inbox"></i> Pending Orders</a></li>
                           <li <?php echo ($actionName=="confirmOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/confirmOrders"><i class="icon-inbox"></i> Confirm Orders</a></li>
                           <li <?php echo ($actionName=="rejectedOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/rejectedOrders"><i class="icon-inbox"></i> Rejected Orders</a></li>
                           <li <?php echo ($actionName=="deliveredOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/deliveredOrders"><i class="icon-inbox"></i> Delivered Orders</a></li>
                        </ul>
                     </a>
                     <a href="#"><i class="icon-price-tag"></i> Organic Orders</a>
                        <ul>
                           <li <?php echo ($actionName=="allB_Orders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allB_Orders"><i class="icon-inbox"></i> All Orders</a></li>
                           <li <?php echo ($actionName=="pendingB_Orders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/pendingB_Orders"><i class="icon-inbox"></i> Pending Orders</a></li>
                           <li <?php echo ($actionName=="confirmB_Orders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/confirmB_Orders"><i class="icon-inbox"></i> Confirm Orders</a></li>
                           <li <?php echo ($actionName=="rejectedB_Orders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/rejectedB_Orders"><i class="icon-inbox"></i> Rejected Orders</a></li>
                           <li <?php echo ($actionName=="deliveredB_Orders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/deliveredB_Orders"><i class="icon-inbox"></i> Delivered Orders</a></li>
                        </ul>
                     </a>
                 </ul>
               </li>
              
               <!--
               <li <?php echo ($controllerName=="setting" && $actionName=='payoutSetting')?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/payoutSetting"><i class="icon-shuffle"></i> <span>Payout Setting</span></a></li>
               -->
               <li <?php echo ($controllerName=="Doctor_Management")?'class=active':'';?>>
                  <a href="#"><i class="icon-stats-bars"></i> <span>Doctor</span></a>
                  <ul>
                     <li <?php echo ($controllerName=="Doctor_Management")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Doctor</a>
                        <ul>
                           <li <?php echo ($actionName=="addNewCategory")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Doctor_Management/addNewDocCategory"><i class="icon-inbox"></i> Add New Categories</a></li>
                           <li <?php echo ($actionName=="allCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Doctor_Management/allDocCategoryList"><i class="icon-inbox"></i>View All Categories</a></li>
                           <li <?php echo ($actionName=="addNewSubCategory")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Doctor_Management/addNewDocSubCategory"><i class="icon-inbox"></i>Add Sub Categories</a></li>
                           <li <?php echo ($actionName=="allSubCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Doctor_Management/allSubDocCategoryList"><i class="icon-inbox"></i>View Sub Categories</a></li>
               
                           <li <?php echo ($actionName=="allDoctorList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Doctor_Management/allDoctorList"><i class="icon-inbox"></i>All Doctor</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>

               <li <?php echo ($controllerName=="Counselors_Management")?'class=active':'';?>>
                  <a href="#"><i class="icon-stats-bars"></i> <span>Counselors</span></a>
                  <ul>
           <li <?php echo ($controllerName=="Counselors_Management")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Counselors</a>
                        <ul>
                           <li <?php echo ($actionName=="addNewCounselorsCategory")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Counselors_Management/addNewCounselorsCategory"><i class="icon-inbox"></i> Add New Categories</a></li>
                           <li <?php echo ($actionName=="allCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Counselors_Management/allCounselorsCategoryList"><i class="icon-inbox"></i>View All Categories</a></li>
               <li <?php echo ($actionName=="addNewCounselorsSubCategory")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Counselors_Management/addNewCounselorsSubCategory"><i class="icon-inbox"></i>Add Sub Categories</a></li>
               <li <?php echo ($actionName=="allSubCounselorsCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Counselors_Management/allSubCounselorsCategoryList"><i class="icon-inbox"></i>View Sub Categories</a></li>
               
                           <li <?php echo ($actionName=="allCounselorsList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Counselors_Management/allCounselorsList"><i class="icon-inbox"></i>All Counselors</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>

               <li <?php echo ($controllerName=="Alternative_medicine")?'class=active':'';?>>
                  <a href="#"><i class="icon-stats-bars"></i> <span>Alternative Medicine</span></a>
                  <ul>
                   <li <?php echo ($controllerName=="Alternative_medicine")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Alternative Medicine</a>
                        <ul>
                           <li <?php echo ($actionName=="addNewAltMedicCategory")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Alternative_medicine/addNewAltMedicCategory"><i class="icon-inbox"></i> Add New Categories</a></li>
                           <li <?php echo ($actionName=="allAltmedCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Alternative_medicine/allAltmedCategoryList"><i class="icon-inbox"></i>View All Categories</a></li>
               <li <?php echo ($actionName=="addNewAltmedSubCategory")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Alternative_medicine/addNewAltmedSubCategory"><i class="icon-inbox"></i>Add Sub Categories</a></li>
               <li <?php echo ($actionName=="allSubAltmedCategoryList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Alternative_medicine/allSubAltmedCategoryList"><i class="icon-inbox"></i>View Sub Categories</a></li>
               
                           <li <?php echo ($actionName=="allAltmedList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Alternative_medicine/allAltmedList"><i class="icon-inbox"></i>All Alternative Medicine</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li <?php echo ($controllerName=="Property_management")?'class=active':'';?>>
                  <a href="#"><i class="icon-stats-bars"></i> <span>Property Management</span></a>
                  <ul>
                   <li <?php echo ($controllerName=="Property_management")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Property Management</a>
                        <ul>
                           <li <?php echo ($actionName=="propertyList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/Property_management/propertyList"><i class="icon-inbox"></i>All Property List</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>


               <li <?php echo ($controllerName=="package")?'class=active':'';?>>
                  <a href="#"><i class="icon-puzzle4"></i> <span>Package Management</span></a>
                  <ul>
                    
					 <!--
					 <li <?php echo ($actionName=="addNewPackage")?'class=active':'';?>><a href="<?php echo site_url();?>admin/package/addNewPackage"><i class="icon-file-plus2"></i> Add Package</a></li>
					-->
                     <li <?php echo ($actionName=="allPackages")?'class=active':'';?>><a href="<?php echo site_url();?>admin/package/allPackages"><i class="icon-file-text3"></i> All/Edit Package</a></li>
                  </ul>
               </li>
               <li <?php echo ($controllerName=="setting")?'class=active':'';?>>
                  <a href="#"><i class="icon-puzzle4"></i> <span>Marquee Management</span></a>
                  <ul>
                     <li <?php echo ($actionName=="marqueeManagement")?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/marqueeManagement"><i class="icon-file-text3"></i>Update Marquee</a></li>
                  </ul>
               </li>
             
        <li <?php echo ($controllerName=="member")?'class=active':'';?>>
                  <a href="#"><i class="icon-people"></i> <span>Member Management</span></a>
                  <ul>
                     <li <?php echo ($actionName=="viewAllMember")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/viewAllMember"><i class="icon-collaboration"></i> View All Member</a></li>
                     <li <?php echo ($actionName=="activeMember")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/activeMember"><i class="icon-user-check"></i> Active Member</a></li>
                     <li <?php echo ($actionName=="inactiveMember")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/inactiveMember"><i class="icon-user-cancel"></i> Inactive Member</a></li>
                     <li <?php echo ($actionName=="blockUnblockMember")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/blockUnblockMember"><i class="icon-user-block"></i> Block/Unblock Member</a></li>
                     <li <?php echo ($actionName=="BronzeMembers")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/BronzeMembers"><i class="icon-user-block"></i> Bronze Members</a></li>
                     <li <?php echo ($actionName=="SilverMembers")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/SilverMembers"><i class="icon-user-block"></i> Silver Members</a></li>
                     <li <?php echo ($actionName=="GoldMembers")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/GoldMembers"><i class="icon-user-block"></i> Gold Members</a></li>
                     <li <?php echo ($actionName=="DiamondMembers")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/DiamondMembers"><i class="icon-user-block"></i> Diamond Members</a></li>
                     <li <?php echo ($actionName=="upgrade_requests")?'class=active':'';?>><a href="<?php echo site_url();?>admin/account/upgrade_requests"><i class="icon-user-block"></i> Members Upgrade Requests</a></li>
                     <li class="navigation-divider"></li>
                     <li <?php echo ($actionName=="passwordTracker")?'class=active':'';?>><a href="<?php echo site_url();?>admin/member/passwordTracker"><i class="icon-lock"></i> Password Tracker</a></li>
                  </ul>
               </li>
               <!---Report Management section start from here-->
               <li <?php echo ($controllerName=="MyGenealogy")?'class=active':'';?> style="display:none;">
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
               <li <?php echo ($controllerName=="PayoutReport" || $controllerName=="CommissionReport")?'class=active':'';?>>
                  <a href="#"><i class="icon-stats-bars"></i> <span>Report Management</span></a>
                  <ul>
                     <li <?php echo ($controllerName=="PayoutReport")?'class=active':'';?>>
                        <a href="#"><i class="icon-price-tag"></i> Payout Report</a>
                        <ul>
                           <li <?php echo ($actionName=="activePayout")?'class=active':'';?>><a href="<?php echo site_url();?>admin/PayoutReport/activePayout"><i class="icon-inbox"></i> Pending Payout</a></li>
                           <li <?php echo ($actionName=="payoutCompleted")?'class=active':'';?>><a href="<?php echo site_url();?>admin/PayoutReport/payoutCompleted"><i class="icon-task"></i> Approve Payout</a></li>
                           <li <?php echo ($actionName=="payoutCancelled")?'class=active':'';?>><a href="<?php echo site_url();?>admin/PayoutReport/payoutCancelled"><i class="icon-close2"></i> Reject Payout</a></li>
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
						    <li <?php echo ($actionName=="rankAchieverReport")?'class=active':'';?>><a href="<?php echo site_url();?>admin/CommissionReport/rankAchieverReport"><i class="icon-medal-first"></i> Rank Achiever Report</a></li>
                             <li <?php echo ($actionName=="topEarnerReport")?'class=active':'';?>><a href="<?php echo site_url();?>admin/CommissionReport/topEarnerReport"><i class="icon-trophy3"></i> Top Earner Report</a></li>
                             <li <?php echo ($actionName=="topRecruiterReport")?'class=active':'';?>><a href="<?php echo site_url();?>admin/CommissionReport/topRecruiterReport"><i class="icon-trophy4"></i> Top Recruiter Report</a></li>
                        
                        </ul>
                     </li>
                     </ul>
               </li>
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
						   <li <?php echo ($controllerName=="UserWallet" && $actionName=="OtherDepositRequestList")?'class=active':'';?>><a href="<?php echo site_url();?>admin/UserWallet/OtherDepositRequestList"><i class="icon-database-remove"></i> Other Deposit Request</a></li>
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
               <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-question4"></i> <span>Support Ticket</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="<?php echo site_url();?>admin/SupportTicket/openTicket"><i class="icon-enter3"></i> Open Ticket </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="<?php echo site_url();?>admin/SupportTicket/closedTicket"><i class="icon-cancel-square2"></i> Closed Ticket </a></li>
                  </ul>
               </li>
               <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-question4"></i> <span>Contact Query</span></a>
                  <ul>
                     <li <?php echo ($actionName=="contactUs")?'class=active':'';?>><a href="<?php echo site_url();?>admin/SupportTicket/contactUs"><i class="icon-enter3"></i> Contact Us Query </a></li>
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
              
               <li <?php echo ($controllerName=="policy")?'class=active':'';?>>
                  <a href="#"><i class="icon-file-eye2"></i> <span>CMS Section</span></a>
                  <ul>
                      <!--<li ><a href="<?php echo site_url();?>cryptoadmin/policy/createPage"><i class="icon-book2"></i> Create Page </a></li>
                      <?php
                      foreach($cmsinfo as $cmsval)
                      {
                      ?>
                      <li <?php echo ($confidential_key==$cmsval->confidential_key)?'class=active':'';?>><a href="<?php echo site_url();?>cryptoadmin/policy/pageShow/<?php echo $cmsval->confidential_key;?>"><i class="icon-book2"></i> <?php echo $cmsval->show_name;?>  </a></li>
                      <?php
                      }
                      ?>-->
                      <li <?php echo ($actionName=="manageStockist")?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/manageStockist"><i class="icon-book2"></i> Manage Stockist
</a></li>
                      <li <?php echo ($actionName=="editPrivacyPolicy")?'class=active':'';?>><a href="<?php echo site_url();?>admin/policy/editPrivacyPolicy"><i class="icon-book2"></i> Privacy Policies </a></li>
                      <li <?php echo ($actionName=="editTermsCondition")?'class=active':'';?>><a href="<?php echo site_url();?>admin/policy/editTermsCondition"><i class="icon-book"></i> Terms and Conditions </a></li>
                      <li <?php echo ($actionName=="howItWorksEmployee")?'class=active':'';?>><a href="<?php echo site_url();?>admin/policy/howItWorksEmployee"><i class="icon-book"></i> FAQ</a></li>
                      <li <?php echo ($actionName=="contact")?'class=active':'';?>><a href="<?php echo site_url();?>admin/policy/contact"><i class="icon-book"></i> Contact </a></li>
                      
                      <!--<li <?php echo ($actionName=="aboutUs")?'class=active':'';?>><a href="<?php echo site_url();?>admin/policy/aboutUs"><i class="icon-book"></i> About Us </a></li>
                      <li <?php echo ($actionName=="howItWorks")?'class=active':'';?>><a href="<?php echo site_url();?>admin/policy/howItWorks"><i class="icon-book"></i> How It Works </a></li>
                      <li <?php echo ($actionName=="howItWorksEmployee")?'class=active':'';?>><a href="<?php echo site_url();?>admin/policy/howItWorksEmployee"><i class="icon-book"></i> How It Works Employement </a></li>
                      
                      <li><a href="javascript:void(0);"><i class="icon-book"></i> Media </a>
                          <ul>
                            <li <?php echo ($actionName=="pictureGallery")?'class=active':'';?>><a href="<?php echo site_url();?>admin/policy/pictureGallery"><i class="icon-book2"></i> Gallery </a></li>  
                          </ul>
                      </li>-->
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
               <li <?php echo ($controllerName=="setting")?'class=active':'';?>>
                   <a href="#"><i class="icon-hammer-wrench"></i> <span>Setting</span></a>
                   <ul>
                       <li <?php echo ($controllerName=="setting" && $actionName=='userIdSetting')?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/userIdSetting"><i class="icon-wrench3"></i> <span>User Id Setting</span></a></li>
                       <li <?php echo ($controllerName=="setting" && $actionName=='dateFormatManagement')?'class=active':'';?>><a href="<?php echo site_url();?>admin/setting/dateFormatManagement"><i class="icon-clipboard5"></i> <span>Date Format Setting</span></a></li>
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
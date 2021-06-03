<?php 
$moduleName=$this->router->fetch_module();
$controllerName=$this->router->fetch_class();
$actionName=$this->router->fetch_method();
$user_details=get_user_details($this->session->userdata('user_id'));
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
                  <a href="#"><i class="icon-profile"></i><span>My Account</span></a>
                  <ul>
                    <li <?php echo ($actionName=="viewProfile")?'class=active':'';?>><a href="<?php echo site_url();?>user/account/viewProfile"><i class="icon-user-tie"></i>My Profile</a></li>
					          <li <?php echo ($actionName=="changePassword")?'class=active':'';?>><a href="<?php echo site_url();?>user/account/changePassword"><i class=" icon-user-lock"></i>Change Password</a></li>
                    <li <?php echo ($actionName=="changeTranscationPassword")?'class=active':'';?>><a href="<?php echo site_url();?>user/account/changeTranscationPassword"><i class=" icon-file-locked2"></i>Change Transaction Password</a></li>
                  </ul>
        </li>
        <!--My Package-->
        <li <?php echo ($controllerName=="MyGenealogy")?'class=active':'';?>>
                  <a href="#"><i class="icon-tree6"></i><span>My Network</span></a>
                  <ul>
                    <li <?php echo ($controllerName=="MyGenealogy" && $actionName=="directReferralTree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy/directReferralTree"><i class="icon-tree5"></i>Direct Referral Tree</a></li>
                        <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="feederStageTree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/feederStageTree"><i class="icon-tree5"></i>Afiliate TREE</a>
                   </li>
                    <?php
                    $exist=checkUserExistenceInAllStages();
                    if($exist['exist_in_stage1'])
                    {
                    ?>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage1Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage1Tree"><i class="icon-tree5"></i>Supervisor TREE</a>
                   </li>
                    <?php   
                    }//end if
                    ?>
                    <?php 
                    if($exist['exist_in_stage2'])
                    {
                    ?>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage2Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage2Tree"><i class="icon-tree5"></i>Manager TREE</a>
				   </li>
                    <?php   
                    }//end if
                    ?>
					<?php 
                    if($exist['exist_in_stage3'])
                    {
                    ?>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage3Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage3Tree"><i class="icon-tree5"></i>Manager TREE</a>
				   </li>
                    <?php   
                    }//end if
                    ?>
					 <?php 
                    if($exist['exist_in_stage4'])
                    {
                    ?>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage4Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage4Tree"><i class="icon-tree5"></i>Senior Manager TREE</a>
				   </li>
                    <?php   
                    }//end if
                    ?>
					
					<?php 
                    if($exist['exist_in_stage5'])
                    {
                    ?>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage5Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage5Tree"><i class="icon-tree5"></i>General Manager TREE</a>
				   </li>
                    <?php   
                    }//end if
                    ?>
					<?php 
                    if($exist['exist_in_stage6'])
                    {
                    ?>
                   <li <?php echo ($controllerName=="MyGenealogy1" && $actionName=="stage6Tree")?'class=active':'';?>><a href="<?php echo site_url();?>user/MyGenealogy1/stage6Tree"><i class="icon-tree5"></i>Director TREE</a>
				   </li>
                    <?php   
                    }//end if
                    ?>             
                  </ul>
       </li>
	  
       <li <?php echo ($controllerName=="IncomeReport")?'class=active':'';?>>
                  <a href="#"><i class="icon-cash"></i><span>My Income Report</span></a>
                  <ul>
                    
					
					<li <?php echo ($actionName=="directReferralCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>user/IncomeReport/directReferralCommissionList"><i class="icon-stats-growth"></i>Referral Bonus</a></li>
					
					<li <?php echo ($actionName=="levelCommissionList")?'class=active':'';?>><a href="<?php echo site_url();?>user/IncomeReport/levelCommissionList"><i class="icon-cash2"></i>Stage Level Income</a></li>
				
				  </ul>
       </li>
	   
	   <!--<li <?php echo ($controllerName=="order")?'class=active':'';?>>
            <a href="#"><i class="icon-cart2"></i><span>E-Shop Management</span></a>
            <ul>
                <li <?php echo ($actionName=="allOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allOrders"><i class="icon-basket"></i> All Orders</a></li>
				<li <?php echo ($actionName=="allPendingOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allPendingOrders"><i class="icon-cart4"></i> All Pending Orders</a></li>
				<li <?php echo ($actionName=="allConfirmedOrder")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allConfirmedOrder"><i class="icon-cart-add2"></i> All Confirm Orders</a></li>
				<li <?php echo ($actionName=="allDeliveredOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allDeliveredOrders"><i class="icon-cart-remove"></i> All Delivered Orders</a></li>
				<li <?php echo ($actionName=="allRejectedOrders")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/allRejectedOrders"><i class="icon-folder-remove"></i> All Rejected Orders</a></li>
				<li <?php echo ($actionName=="bvList")?'class=active':'';?>><a href="<?php echo site_url().$moduleName;?>/eshop_orders/bvList"><i class="icon-folder-remove"></i> All BV List</a></li>
            </ul>
       </li>-->
	   
        <!--My Team Report-->
        <li <?php echo ($controllerName=="TeamReport")?'class=active':'';?>>
                  <a href="#"><i class="icon-collaboration"></i><span>My Team Report</span></a>
                  <ul>
                    <li <?php echo ($actionName=="directReferralMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/directReferralMemberList"><i class="icon-user-tie"></i>Direct Referral Member</a></li>
                    <li <?php echo ($actionName=="teamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/teamMemberList"><i class="icon-man-woman"></i>Team Member</a></li>
                    <li <?php echo ($actionName=="feaderTeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/feaderTeamMemberList"><i class="icon-man-woman"></i>Affiliate Team</a></li>
                    
                    <?php
                    $team_exist=checkUserTeamExistenceInAllStages();
                    if($team_exist['team_exist_in_stage1'])
                    {
                    ?>
                        <li <?php echo ($actionName=="stage1TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage1TeamMemberList"><i class="icon-users4"></i>Supervisor Team</a></li>
                    <?php
                    } 
					if($team_exist['team_exist_in_stage2'])
                    {
                    ?>
                        <li <?php echo ($actionName=="stage2TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage2TeamMemberList"><i class="icon-users4"></i>Manager Team</a></li>
                    <?php   
                    }
					if($team_exist['team_exist_in_stage3'])
                    {
                    ?>
                        <li <?php echo ($actionName=="stage3TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage3TeamMemberList"><i class="icon-users4"></i>Senior Manager Team</a></li>
                    <?php   
                    }
					if($team_exist['team_exist_in_stage4'])
                    {
                    ?>
                        <li <?php echo ($actionName=="stage4TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage4TeamMemberList"><i class="icon-users4"></i>General Manager Team</a></li>
                    <?php   
                    }
					if($team_exist['team_exist_in_stage5'])
                    {
                    ?>
                        <li <?php echo ($actionName=="stage5TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage5TeamMemberList"><i class="icon-users4"></i>Director Team</a></li>
                    <?php   
                    }
					if($team_exist['team_exist_in_stage6'])
                    {
                    ?>
                        <li <?php echo ($actionName=="stage6TeamMemberList")?'class=active':'';?>><a href="<?php echo site_url();?>user/TeamReport/stage6TeamMemberList"><i class="icon-users4"></i>Ambassodor Stage Team</a></li>
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
        
        <!--Payout Management-->
        <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-select2"></i> <span>Support Ticket</span></a>
                  <ul>
                    <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="<?php echo site_url();?>user/SupportTicket/openTicket"><i class="icon-enter3"></i> Open Ticket </a></li>
                    <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="<?php echo site_url();?>user/SupportTicket/closedTicket"><i class="icon-cancel-square2"></i> Closed Ticket </a></li>

                  </ul> 
        </li>
        <!--Payout Management-->
        
        <li <?php echo ($controllerName=="MessagePanel")?'class=active':'';?>>
                  <a href="#"><i class="icon-envelop"></i> <span>Message Panel</span></a>
                  <ul>
                    <li <?php echo ($actionName=="inbox")?'class=active':'';?>><a href="<?php echo site_url();?>user/MessagePanel/inbox"><i class="icon-envelop3"></i> Inbox </a></li>
                    <li <?php echo ($actionName=="composeMessage")?'class=active':'';?>><a href="<?php echo site_url();?>user/MessagePanel/composeMessage"><i class="icon-compose"></i> Compose Message </a></li>
                    <li <?php echo ($actionName=="sentMessage")?'class=active':'';?>><a href="<?php echo site_url();?>user/MessagePanel/sentMessage"><i class="icon-task"></i> Sent Message </a></li>
                  </ul> 
        </li>
        

        <!------Policy Section---->
        <li <?php echo ($controllerName=="policy")?'class=active':'';?>>
                  <a href="#"><i class="icon-file-eye2"></i> <span>Policy Section</span></a>
                  <ul>
                    <li <?php echo ($actionName=="privacyPolicy")?'class=active':'';?>><a href="<?php echo site_url();?>user/policy/privacyPolicy"><i class="icon-book2"></i>Privacy Policies</a></li>
                    <li <?php echo ($actionName=="termsCondition")?'class=active':'';?>><a href="<?php echo site_url();?>user/policy/termsCondition"><i class="icon-book"></i>Terms and Conditions</a></li>
                  </ul> 
        </li>
        <!------Marketin tools Section---->
       
           
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

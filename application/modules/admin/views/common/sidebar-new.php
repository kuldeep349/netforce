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
               
               <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-hammer-wrench"></i> <span>setting</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>CMS </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Commission/charge Settings </a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Rank Settings </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Payment Settings </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Level-wise Income Settings </a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Payment Gateway Settings</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Income/ Advance Settings </a></li>
                  </ul>
               </li>
               <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-pin"></i> <span>E-P-pin</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Generate E-pin </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> New E-pins </a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Unused E-pins </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Used E-pins </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Check E-pin Status </a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Transfer E-pin</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Search (Activate/Deactivate/Delete, Block/Unblock) E-pin </a></li>
                  </ul>
               </li>
                <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-man"></i> <span>Financial</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>All Income </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Mass Payment </a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Total Registration Payment </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Total Payment</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Payment Processor </a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Denied Payment</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Pending Payment </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Make Payments  </a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Payouts Reports </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Financial Statements</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Transactions  </a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Manage Charges</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Settings  </a></li>
                  </ul>
               </li>
                 <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-puzzle4"></i> <span>Manager Admin</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Create Admin Users (Modulus Permission) </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Activate /Deactivate Admin </a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Staff Profile (Add New staff) </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Salary Report</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Settings </a></li>
                  </ul>
               </li>
                 <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-puzzle4"></i> <span>Manage Member</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Member Search </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Edit Member Profile </a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Members Panel </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Member Status (activate/deactivate member)</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Members Reports (latest, add new member) </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>User Tree</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Pending Registrations  </a></li>
                  </ul>
               </li>
                   <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-people"></i> <span>Activities</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Manage Awards/ Rewards/ Bonuses </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Manage Events </a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Documentations </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Manage Expenses</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Manage KYC</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Export and Import</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Manage Cheques (invoices and tickets included) </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Search Everything</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Manage Printing</a></li>
                  </ul>
               </li>
                <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-puzzle4"></i> <span>Accouting</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Transaction Logs </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Every Payment </a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Every Payout </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Manage Ticket</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Manage Coupons</a></li>
                  </ul>
               </li>
               <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-stats-bars"></i> <span>Manage Message</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Mass Message </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> SMS (all phones and text)</a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Emails (all email addresses and messages) </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Welcome Letter (auto-responder)</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Messages Settings</a></li>
                  </ul>
               </li>
               <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-media"></i> <span>Media Setting</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Uploads</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Gallery (Testimonies, Pictures)</a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Approved Media (Banners/Audios/Videos) </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Downloads </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Pending </a></li>
                      <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Rejected </a></li>
                  </ul>
               </li>
                <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-stats-bars"></i> <span>Marketing Tools</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Advertisements (promos/posts)</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i> Manage Ad-on/Ad-sense/Text Ads/</a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>News Settings (pop ups settings) </a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>	News Flash and Drop box Settings</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Settings </a></li>
                  </ul>
               </li>
                <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-hammer-wrench"></i> <span>System Setting</span></a>
                  <ul>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Customer and Franchise Support</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Optimize MySQL</a></li>
                      <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Download (System Database, Member Data)</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Customer Support</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>FAQ </a></li>
                     <li <?php echo ($actionName=="openTicket")?'class=active':'';?>><a href="#"><i class="icon-enter3"></i>Terms and Conditions</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Private Police</a></li>
                     <li <?php echo ($actionName=="closedTicket")?'class=active':'';?>><a href="#"><i class="icon-cancel-square2"></i>Settings  </a></li>
                  </ul>
               </li>
               <li <?php echo ($controllerName=="SupportTicket")?'class=active':'';?>>
                  <a href="#"><i class="icon-power-cord"></i> <span>LOGOUT</span></a>
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
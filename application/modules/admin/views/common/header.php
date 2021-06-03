<!DOCTYPE html>
<html lang="en">
  <?php echo $this->load->view('common/header-script');?>
   <body>
      <?php 
      $admin=getProfileInfo();
      //pr($admin);
      ?>
      <!-- Main navbar -->
     <div class="navbar navbar-inverse">
         <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url();?>admin"><?php echo $admin->panel_title;?></a>
            <ul class="nav navbar-nav visible-xs-block">
               <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
               <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
         </div>
         <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
               <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-users4"></i>
                  <span class="visible-xs-inline-block position-right">New Member</span>
                  <span class="badge bg-warning-400">9</span>
                  </a>
                  <div class="dropdown-menu dropdown-content">
                     <div class="dropdown-content-heading">
                        New Member
                        <ul class="icons-list">
                           <li><a href="#"><i class="icon-sync"></i></a></li>
                        </ul>
                     </div>
                     <ul class="media-list dropdown-content-body width-350">
                        <li class="media">
                           <div class="media-left">
                              <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-user-check"></i></a>
                           </div>
                           <div class="media-body">
                              User Name
                              <div class="media-annotation">4 minutes ago</div>
                           </div>
                        </li>
                        <li class="media">
                           <div class="media-left">
                              <a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-user-check"></i></a>
                           </div>
                           <div class="media-body">
                              User Name
                              <div class="media-annotation">36 minutes ago</div>
                           </div>
                        </li>
                        
                       
                       
                     </ul>
                     <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="View All Registered Member"><i class="icon-menu display-block"></i></a>
                     </div>
                  </div>
               </li>
            </ul>
            <p class="navbar-text"><span class="label bg-success-400">Online</span></p>
            <ul class="nav navbar-nav navbar-right">
               <li class="dropdown language-switch">
                  <a class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url();?>admin_assetsimages/gb.png" class="position-left" alt="">
                  English
                  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="deutsch"><img src="<?php echo base_url();?>admin_assets/images/de.png" alt=""> Deutsch</a></li>
                     <li><a class="ukrainian"><img src="<?php echo base_url();?>admin_assets/images/ua.png" alt=""> Українська</a></li>
                     <li><a class="english"><img src="<?php echo base_url();?>admin_assets/images/gb.png" alt=""> English</a></li>
                     <li><a class="espana"><img src="<?php echo base_url();?>admin_assets/images/es.png" alt=""> España</a></li>
                     <li><a class="russian"><img src="<?php echo base_url();?>admin_assets/images/ru.png" alt=""> Русский</a></li>
                  </ul>
               </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-bubbles4"></i>
                  <span class="visible-xs-inline-block position-right">Support Ticket </span>
                  <span class="badge bg-warning-400">2</span>
                  </a>
                  <div class="dropdown-menu dropdown-content width-350">
                     <div class="dropdown-content-heading">
                       Support Ticket
                        <ul class="icons-list">
                           <li><a href="#"><i class="icon-compose"></i></a></li>
                        </ul>
                     </div>
                     <ul class="media-list dropdown-content-body">
                        <li class="media">
                           <div class="media-left">
                              <img src="<?php echo base_url();?>admin_assets/images/face10.jpg" class="img-circle img-sm" alt="">
                              <span class="badge bg-danger-400 media-badge">5</span>
                           </div>
                           <div class="media-body">
                              <a href="#" class="media-heading">
                              <span class="text-semibold">James Alexander</span>
                              <span class="media-annotation pull-right">04:58</span>
                              </a>
                              <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                           </div>
                        </li>
                        <li class="media">
                           <div class="media-left">
                              <img src="<?php echo base_url();?>admin_assets/images/face3.jpg" class="img-circle img-sm" alt="">
                              <span class="badge bg-danger-400 media-badge">4</span>
                           </div>
                           <div class="media-body">
                              <a href="#" class="media-heading">
                              <span class="text-semibold">Margo Baker</span>
                              <span class="media-annotation pull-right">12:16</span>
                              </a>
                              <span class="text-muted">That was something he was unable to do because...</span>
                           </div>
                        </li>
                        <li class="media">
                           <div class="media-left"><img src="<?php echo base_url();?>admin_assets/images/face24.jpg" class="img-circle img-sm" alt=""></div>
                           <div class="media-body">
                              <a href="#" class="media-heading">
                              <span class="text-semibold">Jeremy Victorino</span>
                              <span class="media-annotation pull-right">22:48</span>
                              </a>
                              <span class="text-muted">But that would be extremely strained and suspicious...</span>
                           </div>
                        </li>
                        <li class="media">
                           <div class="media-left"><img src="<?php echo base_url();?>admin_assets/images/face4.jpg" class="img-circle img-sm" alt=""></div>
                           <div class="media-body">
                              <a href="#" class="media-heading">
                              <span class="text-semibold">Beatrix Diaz</span>
                              <span class="media-annotation pull-right">Tue</span>
                              </a>
                              <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                           </div>
                        </li>
                        <li class="media">
                           <div class="media-left"><img src="<?php echo base_url();?>admin_assets/images/face25.jpg" class="img-circle img-sm" alt=""></div>
                           <div class="media-body">
                              <a href="#" class="media-heading">
                              <span class="text-semibold">Richard Vango</span>
                              <span class="media-annotation pull-right">Mon</span>
                              </a>
                              <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                           </div>
                        </li>
                     </ul>
                     <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="View All Ticket"><i class="icon-menu display-block"></i></a>
                     </div>
                  </div>
               </li>
               <li class="dropdown dropdown-user">
                  <a class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url();?>images/<?php echo $admin->image;?>" alt="">
                  <span><?php echo $admin->username;?></span>
                  <i class="caret"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right">
                     <li><a href="<?php echo site_url();?>admin/account/profileManagement"><i class="icon-user-plus"></i> My profile</a></li>
                     <li><a href="<?php echo site_url();?>admin/AdminWallet/viewEwalletBalance"><i class="icon-coins"></i> My Wallet balance</a></li>
                     <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                     <li class="divider"></li>
                     <li><a href="<?php echo site_url();?>admin/account/changePassword"><i class="icon-loop"></i> Change Password</a></li>
                     <li><a href="<?php echo site_url();?>admin/auth/logout"><i class="icon-switch2"></i> Logout</a></li>
                  </ul>
               </li>
            </ul>
         </div>
      </div>
      <!-- /main navbar -->
      <!-- Page container -->
      <div class="page-container">
         <!-- Page content -->
         <div class="page-content">
            <!-- Main sidebar -->
            <?php 
            $this->load->view('common/sidebar');
            ?>
            <!-- /main sidebar -->
      
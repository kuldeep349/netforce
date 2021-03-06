<!DOCTYPE html>
<html lang="en">
   <head profile="http://www.w3.org/1999/xhtml/vocab">
      <!-- Global stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>/admin_assets/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>/admin_assets/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>/admin_assets/assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>/admin_assets/assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>/admin_assets/assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
      <!-- Core JS files -->
      <!-- Core JS files -->
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/core/libraries/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/core/libraries/bootstrap.min.js"></script>
      <!-- /core JS files -->
      <!-- Theme JS files -->
      <!--ckeditor-->
      <!--ckeditor-->
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/core/app.js"></script>
      <!-- /theme JS files -->
      <!-- color picker js start from here -->
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/pickers/color/spectrum.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/pages/picker_color.js"></script>
      <!-- color picker js end over here -->
      <!----unilevel tree css and js start from here---->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>unilevel-tree-assets/css/font-awesome.min.css" media="all">
      <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>unilevel-tree-assets/css/css_4RRBgc5XjkRtFyI2KCCSDa_SNLMDDBPEzKaFapafOaU.css" media="all" />
      <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>unilevel-tree-assets/css/css_Jk7rlzsJZTm_2CAYMKKSwzfvzNa4YOR8VsOnku2O92g.css" media="all" />
      <script type="text/javascript" src="<?php echo base_url();?>unilevel-tree-assets/js/js_2hoh0v0y6B2TInaEIHI3XwA7E31uiNqpq69BJ97pODY.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>unilevel-tree-assets/js/js_aczm2rRgH_slWBPnvD3KMrK7rwa1i99HOq8IUAb99Co.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>unilevel-tree-assets/js/unilevel_ajax_user_click_tree.js"></script>
      <!---unilevel tree css and js end over here------>
      <style type="text/css">
         .row {
         margin-left: -15px !important;
         margin-right: -20px !important;
         }
         .navi ul.nav li a
         {
         font-size: 13px !important;
         font-weight: bold;
         }
      </style>
   </head>
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
                     <li><a class="ukrainian"><img src="<?php echo base_url();?>admin_assets/images/ua.png" alt=""> ????????????????????</a></li>
                     <li><a class="english"><img src="<?php echo base_url();?>admin_assets/images/gb.png" alt=""> English</a></li>
                     <li><a class="espana"><img src="<?php echo base_url();?>admin_assets/images/es.png" alt=""> Espa??a</a></li>
                     <li><a class="russian"><img src="<?php echo base_url();?>admin_assets/images/ru.png" alt=""> ??????????????</a></li>
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
      <!-- Main sidebar -->
      <div class="app  aside-lg">
         <aside id="aside" class="app-aside hidden-xs bg-black">
            <?php 
               $this->load->view('common/sidebar');
               ?>
         </aside>
         <!-- /main sidebar -->
         <!-- / aside -->
         <!-- content -->
         <div id="content" class="app-content" role="main">
            <div class="app-content-body ">
               <!-- main header -->
               <div class="bg-light lter b-b wrapper-md">
                  <div class="row">
                     <div class="col-sm-12 col-xs-12">
                        <h1 class="m-n h3">Genealogy Tree</h1>
                     </div>
                     <!-- sreeram -->
                  </div>
               </div>
               <!-- / main header -->
               <!-- main content -->
               <div class="wrapper-md ">
                  <!-- Horizontal form options -->
                  <!---------------------------------------------------------------------------------------------------------------->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="region region-content">
                           <div id="block-system-main" class="block block-system clearfix">
                              <div class="binary-genealogy-tree stright-line">
                                 <div class="binary-genealogy-level-0 clearfix">
                                    <div class="parent-wrapper new_wrapper clearfix">
                                       <div class="node-centere-item binary-level-width-100">
                                          <?php 
                                             $root_member_image=(!empty($root->image))?$root->image:'user_small.png';
                                             
                                             ?>
                                          <div class="node-item-root main-member">
                                             <div data-gid="<?php echo $root->user_id;?>" onmouseover="trigger_hover(this)"  class="binary-node-single-item user-block " id="user_block_<?php echo $root->user_id;?>">
                                                <div class="images_wrapper">
                                                   <a href="/afl/genealogy-tree/<?php echo $root->user_id;?>"><img class="profile-rounded-image-small" src="<?php echo base_url();?>images/<?php echo $root_member_image;?>" width="70" height="70" alt="business.admin" title="business.admin" /></a>
                                                </div>
                                                <div class="pop-up-content">
                                                   <div class="profile_tooltip_pick">
                                                      <h2>
                                                         <a href="/user/<?php echo $root->user_id;?>"><?php echo $root->username;?>(<?php echo $root->user_id;?>)</a>
                                                      </h2>
                                                      <div class="genology-view">
                                                         <a href="/afl/genealogy-tree/<?php echo $root->user_id;?>"><i class="fa fa-sitemap"></i></a>
                                                      </div>
                                                   </div>
                                                   <div class="rank_area">
                                                      <dl class="created-dl">
                                                         <dt><i class="fa fa-clock-o"></i></dt>
                                                         <dd><?php echo date(date_formats(),strtotime($root->registration_date));?>
                                                         </dd>
                                                      </dl>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <style type="text/css">
                                             .pop-up-content:after{
                                             background: url("/sites/all/modules/custom/afl_plan/comon_images/img/tree/tooltip-arrow.png") no-repeat scroll 0 0 transparent !important;
                                             }
                                             .pop-up-content.right_tooltip:after{
                                             background: url("/sites/all/modules/custom/afl_plan/comon_images/img/tree/tooltip-arrow-right.png") no-repeat scroll 0 0 transparent !important;
                                             }
                                          </style>
                                          <div class="scroll_class parent-wrapper clearfix">
                                             <!------start loop-------->
                                             <?php 
                                                //$all_direct_member=getAllDirectUser(123456);
                                                $grid_no=1;
                                                if(!empty($all_direct_member) && count($all_direct_member)>0)
                                                {  
                                                foreach($all_direct_member as $member)
                                                {
                                                $grid_no++;   
                                                $member_image=(!empty($member->image))?$member->image:'user_small.png';
                                                
                                                ?>
                                             <div class="node-item-uid-569 node-left-item binary-level-width-50 node-item-uid-0">
                                                <span class="binary-hr-line binar-hr-line-left binary-hr-line-width-25"></span>
                                                <div class="node-item-1-child-left  node-child-root node-item-root">
                                                   <div data-gid="<?php echo $member->user_id;?>" onmouseover="trigger_hover(this)" class="binary-node-single-item user-block " id="user_block_<?php echo $member->user_id;?>">
                                                      <div class="images_wrapper">
                                                         <a href="/afl/genealogy-tree/<?php echo $member->user_id;?>"><img class="profile-rounded-image-small" src="<?php echo base_url();?>images/<?php echo $member_image;?>" width="70" height="70" alt="mlm.member" title="mlm.member" /></a>
                                                      </div>
                                                      <span class="wrap_content" ><a href="/afl/genealogy-tree/<?php echo $member->user_id;?>"><?php echo $member->username;?></a></span>
                                                      <div onclick="trigger_click(event.target,'<?php echo $member->user_id;?>',this,'<?php echo site_url();?>admin/MyGenealogy/');" class="last_level_user">
                                                         <span class="add-genealogy-button"><i class="fa fa-plus fa-2x"></i></span>
                                                      </div>
                                                      <div class="mx_pop_content pop-up-content">
                                                         <div class="profile_tooltip_pick">
                                                            <h2>
                                                               <a href="/user/<?php echo $member->user_id;?>"><?php echo $member->username;?>
                                                               (<?php echo $member->user_id;?>)</a>                    
                                                            </h2>
                                                            <div class="genology-view">
                                                               <a href="/afl/genealogy-tree/<?php echo $member->user_id;?>"><i class="fa fa-sitemap"></i></a>
                                                            </div>
                                                         </div>
                                                         <div class="rank_area">
                                                            <span style="display: inline; padding: .2em .6em .3em; font-size: 75%;font-weight: 700;line-height: 1; color: #fff;
                                                               text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: .25em;background-color:#5F1E02;"><?php echo $member->username;?></span>                  
                                                            <dl class="created-dl">
                                                               <dt><i class="fa fa-clock-o"></i></dt>
                                                               <dd><?php echo date(date_formats(),strtotime($member->registration_date));?>
                                                               </dd>
                                                            </dl>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- <div class="count-members">250</div>
                                                      <div class="count-members">250</div>
                                                      <div class="count-members">250</div> -->
                                                </div>
                                             </div>
                                             <style type="text/css">
                                                .pop-up-content:after{
                                                background: url("/sites/all/modules/custom/afl_plan/comon_images/img/tree/tooltip-arrow.png") no-repeat scroll 0 0 transparent !important;
                                                }
                                                .pop-up-content.right_tooltip:after{
                                                background: url("/sites/all/modules/custom/afl_plan/comon_images/img/tree/tooltip-arrow-right.png") no-repeat scroll 0 0 transparent !important;
                                                }
                                             </style>
                                             <?php
                                                }
                                                }  
                                                ?>
                                             <!-------end loop-------->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <script>
                                 //find the max width find the max widh
                                 function max_width(){
                                    w_max=0;
                                    jQuery('.binary-genealogy-tree').each(function(){
                                       max_w_ele = jQuery(this).find('.last_level_user').parent().parent().width();
                                       n = jQuery(this).find('.last_level_user').length;
                                       max_w = max_w_ele*n;
                                      if(w_max<max_w){
                                        w_max = max_w;
                                      }
                                    });
                                    return w_max;
                                 }
                                  w = window.innerWidth
                                 // jQuery('.binary-genealogy-tree').eq( jQuery('.binary-genealogy-tree').length -1).find('.parent-wrapper').eq(0).css('width',window.innerWidth+'px');
                                        w1 = max_width();
                                 
                                      jQuery('.binary-genealogy-tree').eq( jQuery('.binary-genealogy-tree').length -1).find('.scroll_class').css('width', 'auto');
                                            jQuery('.binary-genealogy-tree').eq( jQuery('.binary-genealogy-tree').length -1).children().css('overflow-x','hidden');
                                            jQuery('.binary-genealogy-tree').eq( jQuery('.binary-genealogy-tree').length -1).children().css('overflow-y','hidden');
                                 
                                        if (w < w1) {
                                            jQuery('#block-system-main').css('width', w1+'px');
                                        } else {
                                          jQuery('#block-system-main').css('width', 'auto');
                                          jQuery('#block-system-main').css('overflow-x','hidden');
                                 
                                 
                                        }
                                 
                                        //balance the tree
                                        max_val = 1;
                                        /*jQuery('.binary-genealogy-tree').eq( jQuery('.binary-genealogy-tree').length -1).find('.node-item-root').each(function(){
                                            if(!jQuery(this).hasClass('main-member')){
                                               count = jQuery(this).find('.count-members').length;
                                               if(count > max_val){
                                                 max_val = count;
                                               }
                                            }
                                 
                                        });*/
                                 
                                        /*jQuery('.binary-genealogy-tree').eq( jQuery('.binary-genealogy-tree').length -1).find('.node-item-root').each(function(){
                                            if(!jQuery(this).hasClass('main-member')){
                                               count = jQuery(this).find('.count-members').length;
                                               if(count < max_val){
                                                 jQuery(this).append('<div class="last_level_user count-members">0</div>');
                                               }
                                            }
                                 
                                        });*/
                                 
                              </script>
                           </div>
                           <!-- /.block -->
                        </div>
                     </div>
                  </div>
                  <!---------------------------------------------------------------------------------------------------------------->
                  <!-- /vertical form options -->
                  <!-- Footer -->
                  <!---------------------------------------------------------------------------------------------------------------->
                  <!-- /vertical form options -->
                  <!-- Footer -->
                  <?php
                     $this->load->view("common/footer-text");
                     ?>
                  <!-- /footer -->
               </div>
               <!-- /content area -->
            </div>
         </div>
      </div>
   </body>
</html>
<style type="text/css">
   .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu 
   {
   margin-bottom: 0px;
   }
   .dropdown-menu>li 
   {
   margin-bottom: 0px;
   }
   .dropdown-menu 
   {
   padding: 0px 0;
   }
   .dropdown-menu>li>a 
   {
   padding: 7px 15px;
   }
   .badge
   {
   background-color: #FF7043;
   border-color: #FF7043;
   color: #fff;
   }
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
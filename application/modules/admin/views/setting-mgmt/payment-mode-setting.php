<!-- Main content -->
      <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
          <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Payment </span> - Mode Settings</h4>
            </div>

            <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
            </div>
          </div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
              <li><a href="#">Settings</a></li>
              <li class="active">Payment Mode Settings</li>
            </ul>

            <ul class="breadcrumb-elements">
              <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-gear position-left"></i>
                  Settings
                  <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                  <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                  <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">
          
               <?php 
               if(!empty($this->session->flashdata('flash_msg')))
               {
               ?>
               <div class="alert alert-success alert-styled-right alert-arrow-right alert-bordered">
                 <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                 <?php echo $this->session->flashdata('flash_msg');?>
               </div>
               <?php  
               }
               ?>
          
          
              <form action="<?php echo site_url();?>admin/setting/paymentModeSetting" method="post">
              <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Payment Mode Settings</h5>
            </div>
    <div class="panel-content">
            <div class="content">
                          <?php 
                          foreach ($all_reg_method as $rowObj) 
                          {
                          $checked=($rowObj->status==1)?"checked":'';
                          ?>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="reg_method[]" value="<?php echo $rowObj->id;?>" class="control-primary" <?php echo $checked;?>>
                             <?php echo $rowObj->reg_method;?>
                          </label>
                        </div>

                          <?php 
                          }
                          ?>
                  </div>        
            </div>
                      
                      <div class="content">
                <button type="submit" name="btn" value="add" class="btn btn-primary"><i class="icon-cog3 position-left"></i> Set Payment Mode</button>
                </div>
          </div>
        </form>
        
          
          </div>
        
          
        
            
          <div class="panel panel-flat" style="visibility:hidden;">
            <div class="panel-heading">
              <h5 class="panel-title">Switchery toggles</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>

            <div class="panel-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="content-group-lg">
                    <h6 class="text-semibold">Switcher colors</h6>
                    <p class="content-group">You can change the default color of the switch to fit your design perfectly. According to the color system, any of its color can be applied to the switchery. Custom colors are also supported.</p>

                    <div class="checkbox checkbox-switchery">
                      <label>
                        <input type="checkbox" class="switchery-primary" checked="checked">
                        Switch in <span class="text-semibold">primary</span> context
                      </label>
                    </div>

                    <div class="checkbox checkbox-switchery">
                      <label>
                        <input type="checkbox" class="switchery-danger" checked="checked">
                        Switch in <span class="text-semibold">danger</span> context
                      </label>
                    </div>

                    <div class="checkbox checkbox-switchery">
                      <label>
                        <input type="checkbox" class="switchery-info" checked="checked">
                        Switch in <span class="text-semibold">info</span> context
                      </label>
                    </div>

                    <div class="checkbox checkbox-switchery">
                      <label>
                        <input type="checkbox" class="switchery-warning" checked="checked">
                        Switch in <span class="text-semibold">warning</span> context
                      </label>
                    </div>
                  </div>
                </div>

              
              </div>

            
            </div>
          </div>
        
    

      
          <!-- Footer -->
           <?php $this->load->view('common/footer-text') ?>
          <!-- /footer -->

        </div>
        <!-- /content area -->

      </div>
      <!-- /content wrapper -->
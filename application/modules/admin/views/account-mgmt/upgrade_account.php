<?php
$packages = [
    1 => ['title' => 'BRONZE' , 'amount' => 10],
    2 => ['title' => 'SILVER' , 'amount' => 19],
    3 => ['title' => 'GOLD' , 'amount' => 36],
    4 => ['title' => 'DIAMOND' , 'amount' => 70],
];
?>
<div class="content-wrapper">
				<!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Account Setting</span> - Upgrade Package</h4>
            </div>
        <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="#">Account Setting</li>
                <li class="active">Upgrade Package</li>
            </ul>
            <ul class="breadcrumb"></ul>
            
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
    <div class="content">
        <!-- Horizontal form options -->
        <div class="row">
            <div class="col-md-12">
                <!-- Basic layout-->
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
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Upgrade Membership</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                            <?php 
                            echo form_open(site_url()."admin/account/userUpgradeRequest/".$request->id,array('method'=>'post','class'=>'form-horizontal' , 'enctype'=>'multipart/form-data'));
                            ?>
                            <!--<form method="post" class="form-horizontal">-->								
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">UserID:</label>
                                        <div class="col-lg-4">
                                            <input value="<?php echo $request->user_id;?>" id="" type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Current Package:</label>
                                        <div class="col-lg-4">
                                            <input value="<?php echo $packages[$request->pkg_id]['title'] . '($'.$packages[$request->pkg_id]['amount'].')';?>" id="" type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Requested Package:</label>
                                        <div class="col-lg-4">
                                            <input value="<?php echo $packages[$request->upgrade_to]['title'] . '($'.$packages[$request->upgrade_to]['amount'].')';?>" type="text" class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button id="submitBtn" type="submit" name="btn" value="submit" class="btn btn-primary">
                                            Upgrade
                                            <i class="icon-arrow-right14 position-right"></i>
                                        </button>
                                        <button id="submitBtn" type="submit" name="btn_reject" value="submit" class="btn btn-primary bg-danger">
                                            Reject
                                            <i class="icon-arrow-right14 position-right"></i>
                                        </button>
                                    </div>
                                </div>
                            <!--</form>-->
                            <?php echo form_close();?>
                    </div>
                    <!-- /basic layout -->
            </div>
        </div>
        <!-- /vertical form options -->
        <!-- Footer -->
        <?php
        $this->load->view("common/footer-text");
        ?>
            <!-- /footer -->
    </div>
    <!-- /content area -->
</div>

<script>
</script>			
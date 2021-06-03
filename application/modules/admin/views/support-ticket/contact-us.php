<!-- Main content -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Support Ticket</span> - View Ticket</h4>
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
                <li><a href="<?php echo site_url(); ?>user"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="#">Contact Us</a></li>
                <li class="active">View Query</li>
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

        <!-- Daterange picker -->

        <!-- /daterange picker -->

        <div class="row">
            <div class="panel panel-flat">
                <div id="replyQuery" style="display:none">
                    <div class="panel-heading">
                        <h5 class="panel-title">Reply Query</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row" id="approve">
                        <div class="col-md-6">
                            <form method="post"  action="<?php echo base_url('admin/SupportTicket/contactUs');?>">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" id="email" readonly>
                                    <input type="hidden" name="id" id="id" readonly>
                                </div>
                                <div class="form-group">
                                    <textarea type="text" name="reply" placeholder="Enter Text" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row" id="reject">
                        <div class="col-md-6">
                            <form method="post"  action="<?php echo base_url('admin/SupportTicket/contactUsreject');?>">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" id="emailr" readonly>
                                    <input type="hidden" name="id" id="idr" readonly>
                                </div>
                                <div class="form-group">
                                    <textarea type="text" name="reply" placeholder="Enter Text" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="query" style="display:block">
                    <div class="panel-heading">
                        <h5 class="panel-title">View Query</h5>
                        <div class="heading-elements">

                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td><b>#</b></td>
                                <td><b>Name</b></td>
                                <td><b>Email</b></td>
                                <td><b>Phone</b></td>
                                <td><b>Message</b></td>
                                <td><b>Date</b></td>
                                <td><b>Status</b></td>
                                <td><b>Response</b></td>
                                <td><b>Action</b></td>
                            </tr>
                            <?php
                                $i = 1;
                                foreach ($query as $ticket) {
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $ticket['name'];?></td>
                                <td><?php echo $ticket['email'];?></td>
                                <td><?php echo $ticket['phone'];?></td>
                                <td><?php echo $ticket['message'];?></td>
                                <td><?php echo $ticket['created'];?></td>
                                <td><?php echo ($ticket['status'] == 1) ? 'Approved' : (($ticket['status'] == 2) ? 'Rejected' : 'Pending');?></td>
                                <td><?php echo $ticket['response'];?></td>
                                <td>
                                    <?php if($ticket['status'] == 0):?>
                                    <button class="btn btn-success" onclick="docload('<?php echo $ticket['email'];?>','<?php echo $ticket['id'];?>')"><i class="fa fa-check" aria-hidden="true"></i></button>
                                    <a class="btn btn-danger" href="<?php echo base_url();?>admin/SupportTicket/delContactUs/<?php echo $ticket['id'];?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <?php endif;?>
                                </td>
                            </tr>
                            <?php 
                                $i++;} 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Footer -->
        <?php $this->load->view('common/footer-text') ?>
        <!-- /footer -->
    </div>
    <!-- /content area -->
</div>
<!-- /main content -->
<script>
function docload(email,id){
    document.getElementById("email").value = email;
    document.getElementById("id").value = id;
    document.getElementById("replyQuery").style.display = "block";
    document.getElementById("approve").style.display = "block";
    document.getElementById("reject").style.display = "none";
    document.getElementById("query").style.display = "none";
}

function docload2(email,id){
    document.getElementById("emailr").value = email;
    document.getElementById("idr").value = id;
    document.getElementById("replyQuery").style.display = "block";
    document.getElementById("approve").style.display = "none";
    document.getElementById("reject").style.display = "block";
    document.getElementById("query").style.display = "none";
}
</script>
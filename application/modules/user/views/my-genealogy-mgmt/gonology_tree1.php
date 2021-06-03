<?php
$package = [
    '0' => 'Free',
    '1' => 'Bronze',
    '2' => 'Silver',
    '3' => 'Gold',
    '4' => 'Diamond',
]; 
?>
<style>
    .flg img {
        width: 23px;
        position: relative;
        top: -1px;
        left: 5px;
    }
    .has-tooltip {


}
    #txt {
        position: relative;
        left: 10px;
        top: 1px;
    }
    .widget-stats-title {
        text-transform: uppercase;
    }
    .vert {
        font-size: 11px !important;
        vertical-align: super;
        margin: 0 0 0 3px;
        font-weight: normal;
    }
    .widget-reminder-divider {
        position: absolute;
        top: 20px;
        bottom: 20px;
        left: 4px;
        width: .125rem;
        background: #bcc0c5;
    }
    .Get-Help-History {
        text-align: center;
        /* background: red; */
        padding: 20px 0px;
    }
    .Get-Help-History span {
        margin: 0px 17px;
        display: block;
        /* background: #0fbf0f;*/
        padding: 5px 6px 5px;
    }
    .Get-Help-History span a {
        font-size: 16px;
        color: #5d58d8;
        font-weight: 600;
        text-decoration: none;
    }
    .Get-Help-History .widget-stats-icon {
        text-align: center;
        font-size: 2.5rem;
        padding: 0;
        border-radius: 50%;
        opacity: .33;
    }
    .close {
        margin-top: -6px;
    }
    .Get-Help-History .widget-stats-icon:before {
        /*  content: url(cgxvzKtXpQ45/assets/img/icons8-helping-hand-100.png);*/
    }
    .product-review {
        margin: 0px;
        padding: 25px;
    }
    .amount ul {
        padding: 0;
        margin: 0;
    }
    .amount ul li {
        display: initial;
        padding-right: 10px;
    }
    .amount ul li span {
        font-size: 20px;
    }
    /********
    div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    position: absolute;
    right: 0;
    }*********/
    .form-horizontal .control-label {
        padding-top: .4375rem;
        margin-bottom: 0;
        text-align: left;
        font-weight: normal;
    }
    @media (min-width: 768px) and (max-width:992px) {
        .form-horizontal .control-label {
            padding-top: .4375rem;
            margin-bottom: 0;
            text-align: left;
        }
        .amount ul li span {
            font-size: 18px;
        }
        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
            position: absolute;
            right: -142px;
        }
    }
    @media (max-width: 767px) {
        .content,
        .page-header-fixed.page-sidebar-fixed .content {
            margin-left: 0;
            padding: .9375rem .9375rem 3.6875rem;
            overflow: initial;
            height: auto;
            margin-top: 16px;
        }
        #condition .control-label {
            text-align: left;
            width: 100%;
            display: inline-block;
        }
        .form-group {
            margin-bottom: 1rem;
            width: 100%;
        }
        .widget-reminder-divider {
            position: absolute;
            top: 0px;
            bottom: 0px;
            left: 7px;
            width: 96%;
            background: #bcc0c5;
            /* border-top: 2px solid gray; */
            height: 2px;
        }
    }
</style>
<style>
    #header {
        height: 72px;
    }
    .side-padding {
        padding: 30px 0 0 0;
    }
    #page-container {
        padding-top: 4.10rem;
    }
    #mobile-logo {
        display: none;
    }
    @media only screen and (max-width: 767px) {
        .navbar-nav-list .nav.navbar-nav>li,
        .navbar-xs-justified .nav.navbar-nav>li {
            width: auto;
        }
        .diamond {
            padding: 12px 5px !important;
        }
        #screen-logo {
            display: none;
        }
        .moview {
            font-size: 15px;
        }
        #mobile-logo {
            display: block;
        }
        .list-inline>li {
            display: inline-block;
            padding: 0 7px 0;
        }
        .breadcrumb {
            margin-top: 35px;
        }
        .navbar-nav-list .nav.navbar-nav>li,
        .navbar-xs-justified .nav.navbar-nav>li {
            width: auto;
        }
        .diamond {
            padding: 12px 5px !important;
        }
    }
    .diamond {
        margin: 5px 0;
        padding: 8px 5px;
        border-radius: 19px;
    }
    @media (max-width: 767px) {
        div.dataTables_wrapper div.dataTables_filter {
            padding-left: 151px;
        }
        div.dt-buttons {
            padding-left: 47px;
        }
    }
</style>
<style>
    #content .page-titel spna {
        color: #3fbfd7;
    }
    #content .page-titel {
        font-size: 13px;
        font-weight: 500;
        text-transform: uppercase;
    }
    .search-bar{
        padding: 20px;
        background: #fff;
        border-bottom: 2px solid #efefef;
    }
    .has-tooltip{
        display: inline-block;
        position: relative;

    }
    .has-tooltip .on-hover{
        position: absolute;
        background: #fff;
        border: 2px solid #efefef;
        width: 220px;
        font-size: 11px;
        text-align: left;
        padding: 6px;
        color: #000;
        visibility: hidden;
        opacity: 0;
        transition: all 0.3s linear 0s;
        left: calc(100% - 110px);
        top: 100%;
        box-shadow: 0 0 6px rgba(0,0,0,0.12);
    }
    .has-tooltip:hover .on-hover{
        visibility: visible;
        opacity: 1;
    }
</style>
<div class="content-wrapper">
    <div id="content">
        <div class="title">
            <h2><?php echo $title;?></h2>
        </div>
        <div class="row">
            <!-- BEGIN col-3 -->
            <div class="col-lg-12">
                <div class="search-bar bg-white" style="padding: 20px; display:none">
                    <form action="<?php echo base_url('Dashboard/User/GenelogyTree/');?>" id="srchform" method="GET">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <select class="form-control">
                                    <option value="0">Search Type</option>
                                    <option value="1">Search By Username</option>
                                    <option value="2">Search By Name</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="Search Value" >
                            </div>
                            <div class="col-12 col-md-3">
                                <button type="submit" id="btnSearch" class="btn btn-primary">Search Now</button>
                            </div>
                            <div class="col-12 col-md-3">
                                <?php
                                // if($validate_user == 1){
                                //     echo'<a type="submit" id="btnLevelUp" class="btn btn-danger" href="'.base_url('Dashboard/User/GenelogyTree/'.$level1->upline_id).'"><i class="icon-arrow-up"></i> Level up</a>';
                                // }
                                ?>
                                <a class="btn btn-success" style="" href="<?php echo base_url('user/MyGenealogy1/feederStageTree/');?>"><i class="icon-home"></i>  Go to My view</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="tree" class="table-responsive">
                    <?php
                    //if($validate_user == 1){
                        ?>
                          <div style="max-width:100%; overflow:scroll">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                                <tbody>
                                    <tr>
                                        <td colspan="8" align="center" valign="top" class="viewtd">
                                            <strong>
                                                <input name="last_member_id" type="hidden" id="last_member_id"
                                                        value=""></strong><br>
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                style="background:#FFFFFF;border-radius:25px;">
                                                <tbody>
                                                    <!-- <tr>
                                                        <td colspan="4" align="center">
                                                            <table width="50%" border="0" align="center" cellpadding="0"
                                                                cellspacing="0">
                                                                <tbody> -->
                                                                    <!-- <tr>
                                                                        <td colspan="4" align="left" class="red2">
                                                                            <strong>Left Total Team : </strong>
                                                                            <font id="left_team"><?php //echo $level1->left_count;?></font>
                                                                        </td>
                                                                        <td align="right" class="red2"><strong>Right Total
                                                                                Team : </strong>
                                                                            <font id="right_team"><?php //echo $level1->right_count;?></font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="4" align="left" class="red2">
                                                                            <strong>Left Total Points : </strong>
                                                                            <font id="left_bv"><?php //echo $level1->leftPower;?></font>
                                                                        </td>
                                                                        <td align="right" class="red2">
                                                                            <strong>Right Total Points : </strong>
                                                                            <font id="right_bv"><?php //echo $level1->rightPower;?></font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="4" align="left" class="red2">
                                                                            <strong>Left Matching Points : </strong>
                                                                            <font id="left_matching"><?php //echo $level1->leftPower;?></font>
                                                                        </td>
                                                                        <td align="right" class="red2">
                                                                            <strong>Right
                                                                                Matching Points : </strong>
                                                                            <font id="right_matching"><?php //echo $level1->rightPower;?></font>
                                                                        </td>
                                                                    </tr> -->
                                                                    <!-- <tr>
                                                                        <td colspan="4" align="left" class="red2">
                                                                            <strong>Left Pending Points : </strong>
                                                                            <font id="left_pending">2072</font>
                                                                        </td>
                                                                        <td align="right" class="red2"><strong>Right Pending
                                                                                Points : </strong>
                                                                            <font id="right_pending">0</font>
                                                                        </td>
                                                                    </tr> -->
                                                                <!-- </tbody>
                                                            </table>
                                                        </td>
                                                    </tr> -->
                                                    <tr id="p0">
                                                        <td width="229" align="center" valign="top" class="message">&nbsp;
                                                        </td>
                                                        <td colspan="2" align="center">
                                                            <div class="media"><a href="#" class="has-tooltip profile-thumb">
                                                                <img class="img-circle" src="<?php echo !empty($main_image) ? base_url('images/'.$main_image) : base_url('images/noimage.jpeg');?>" alt="<?php echo $main_username;?>" border="0" width="60">
                                                                <span class="on-hover">
                                                                    Member ID : <?php echo $main_user_id;?> <br>
                                                                    Name : <?php echo $main_username;?> <br>
                                                                    Membership : <?php echo $package[$main_member_type];?> <br>
                                                                    Sponsor : <?php echo $main_ref_id;?> <br>
                                                                    Email : <?php echo $main_email;?> <br>
                                                                    Country : <?php echo $main_country;?> <br>
                                                                </span>
                                                            </a></div>
                                                            <br>
                                                            <?php echo $main_user_id;?><br><?php echo $main_username;?> <br> <br>
                                                        </td>
                                                        <td width="230" align="center" valign="top" class="message">&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" align="center">
                                                            <table width="50%" border="0" align="center" cellpadding="0"
                                                                cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center"><img src="<?php echo base_url('treeimage');?>/arrow.jpg" width="100%"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <!----tree level 2 starts----->
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                    <tr valign="top">
                                                                        <?php
                                                                        if(!empty($level1_user_id1[0])){
                                                                            echo'<td id="p1" width="50%" align="center">
                                                                                <div class="media"><a href="'.base_url('user/MyGenealogy1/feederStageTree/'.$level1_user_id1[0]->user_id).'" class="has-tooltip profile-thumb">';?>
                                                                                    <img class="img-circle" src="<?php echo !empty($level1_user_id1[0]->image) ? base_url('images/'.$level1_user_id1[0]->image) : base_url('images/noimage.jpeg');?>" alt="' <?php echo $level1_user_id1[0]->username;?>'" border="0" width="60">
                                                                                    <?php echo '<span class="on-hover">
                                                                                        Name : '.$level1_user_id1[0]->first_name . ' '. $level1_user_id1[0]->last_name.'<br>
                                                                                        Member ID : '. $level1_user_id1[0]->user_id.' <br>
                                                                                        Membership : '.$package[$level1_user_id1[0]->pkg_id] .'<br>
                                                                                        Sponsor : '.$level1_user_id1[0]->ref_id.'<br>
                                                                                        Email : '.$level1_user_id1[0]->email.' <br>
                                                                                        Country :' .$level1_user_id1[0]->country.' <br>
                                                                                    </span>
                                                                                </a></div>
                                                                                <br>
                                                                                '.$level1_user_id1[0]->user_id.'<br>'.$level1_user_id1[0]->username.' <br> <br>
                                                                            </td>';
                                                                        }else{
                                                                            echo'<td  id="p1" width="50%" align="center">';
                                                                                echo'<div class="media"><a href="'.base_url('join-us/'.$loginID->username).'">
                                                                                    <img class="img-circle" src="'.base_url('images/noimage.jpeg').'" alt="waiting" border="0" width="60"><br>
                                                                                    <span class="on-hover">
                                                                                        Add New
                                                                                    </span>
                                                                                </a></div>';
                                                                            echo' <br></td>';
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        if(!empty($level1_user_id1[1])){
                                                                            echo'<td id="p1" width="50%" align="center">
                                                                                <div class="media"><a href="'.base_url('user/MyGenealogy1/feederStageTree/'.$level1_user_id1[1]->user_id).'" class="has-tooltip profile-thumb">';?>
                                                                                    <img class="img-circle" src="<?php echo !empty($level1_user_id1[1]->image) ? base_url('images/'.$level1_user_id1[1]->image) : base_url('images/noimage.jpeg');?>" alt="'<?php echo $level1_user_id1[1]->username;?>'" border="0" width="60">
                                                                                <?php echo '<span class="on-hover">
                                                                                        Name : '.$level1_user_id1[1]->first_name .' ' .$level1_user_id1[1]->last_name.'<br>
                                                                                        Member ID : '. $level1_user_id1[1]->user_id.' <br>
                                                                                        Membership : '.$package[$level1_user_id1[1]->pkg_id] .'<br>
                                                                                        Sponsor : '.$level1_user_id1[1]->ref_id.'<br>
                                                                                        Email : '.$level1_user_id1[1]->email.' <br>
                                                                                        Country :' .$level1_user_id1[1]->country.' <br>
                                                                                    </span>
                                                                                </a></div>
                                                                                <br>
                                                                                '.$level1_user_id1[1]->user_id.'<br>'.$level1_user_id1[1]->username.' <br> <br>
                                                                            </td>';
                                                                        }else{
                                                                            echo'<td  id="p1" width="50%" align="center">';
                                                                                echo'<div class="media"><a href="'.base_url('join-us/'.$loginID->username).'">
                                                                                    <img class="img-circle" src="'.base_url('images/noimage.jpeg').'" alt="waiting" border="0" width="60"><br>
                                                                                    <span class="on-hover">
                                                                                        Add New
                                                                                    </span>
                                                                                </a></div>';
                                                                            echo' <br></td>';
                                                                        }
                                                                        ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="50%" height="28" align="center">
                                                                            <table width="50%" border="0" align="center"
                                                                                cellpadding="0" cellspacing="0"
                                                                                class="sl_text">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign="top">
                                                                                            <img src="<?php echo base_url('treeimage');?>/arrow1.jpg" width="100%">
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td width="50%" height="26" align="center">
                                                                            <table width="50%" border="0" align="center"
                                                                                cellpadding="0" cellspacing="0"
                                                                                class="sl_text">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign="top">
                                                                                            <img src="<?php echo base_url('treeimage');?>/arrow1.jpg" width="100%">
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <table width="100%" height="0%" border="0" cellpadding="0"
                                                                cellspacing="0">
                                                                <tbody>
                                                                    <tr align="center">
                                                                        <?php
                                                                        if(!empty($level2_info[0][0])){
                                                                            echo'<td id="p3" width="25%" height="85%" valign="top">
                                                                                <div class="media"><a href="'.base_url('user/MyGenealogy1/feederStageTree/'.$level2_info[0][0]->user_id).'" class="has-tooltip profile-thumb">';?>
                                                                                    <img class="img-circle" src="<?php echo !empty($level2_info[0][0]->image) ? base_url('images/'.$level2_info[0][0]->image) : base_url('images/noimage.jpeg');?>" alt="<?php echo $level2_info[0][0]->username;?>" border="0" width="60">
                                                                                    <?php echo '<span class="on-hover">
                                                                                        Name : '.$level2_info[0][0]->username.'<br>
                                                                                        Member ID : '. $level2_info[0][0]->user_id.' <br>
                                                                                        Membership : '.$package[$level2_info[0][0]->pkg_id] .'<br>
                                                                                        Sponsor : '.$level2_info[0][0]->ref_id.'<br>
                                                                                        Email : '.$level2_info[0][0]->email.' <br>
                                                                                        Country :' .$level2_info[0][0]->country.' <br>
                                                                                    </span>
                                                                                    </a></div>
                                                                                    <br>
                                                                                    '.$level2_info[0][0]->user_id.'<br>'.$level2_info[0][0]->username.' <br> <br>
                                                                                </td>';
                                                                        }else{
                                                                            echo'<td  id="p1" width="25%" height="85%" valign="top">';
                                                                                echo'<div class="media"><a href="'.base_url('join-us/'.$loginID->username).'">
                                                                                    <img class="img-circle" src="'.base_url('images/noimage.jpeg').'" alt="waiting" border="0" width="60"><br>
                                                                                    <span class="on-hover">
                                                                                        Add New
                                                                                    </span>
                                                                                </a></div>';
                                                                            echo' <br></td>';
                                                                        }
                                                                        if(!empty($level2_info[0][1])){
                                                                            echo'<td id="p3" width="25%" height="85%" valign="top">
                                                                                    <div class="media"><a href="'.base_url('user/MyGenealogy1/feederStageTree/'.$level2_info[0][1]->user_id).'" class="has-tooltip profile-thumb">';?>
                                                                                        <img class="img-circle" src="<?php echo !empty($level2_info[0][1]->image) ? base_url('images/'.$level2_info[0][1]->image) : base_url('images/noimage.jpeg');?>" alt="<?php echo $level2_info[0][1]->username;?>" border="0" width="60">
                                                                                        <?php echo '<span class="on-hover">
                                                                                            Name : '.$level2_info[0][1]->first_name .' '.$level2_info[0][1]->last_name .'<br>
                                                                                            Member ID : '. $level2_info[0][1]->user_id.' <br>
                                                                                            Membership : '.$package[$level2_info[0][1]->pkg_id] .'<br>
                                                                                            Sponsor : '.$level2_info[0][1]->ref_id.'<br>
                                                                                            Email : '.$level2_info[0][1]->email.' <br>
                                                                                            Country :' .$level2_info[0][1]->country.' <br>
                                                                                        </span>
                                                                                    </a></div>
                                                                                    <br>
                                                                                    '.$level2_info[0][1]->user_id.'<br>'.$level2_info[0][1]->username.' <br> <br>
                                                                                </td>';
                                                                        }else{
                                                                            echo'<td  id="p1" width="25%" height="85%" valign="top">';
                                                                                echo'<div class="media"><a href="'.base_url('join-us/'.$loginID->username).'">
                                                                                    <im class="img-circle"g src="'.base_url('images/noimage.jpeg').'" alt="waiting" border="0" width="60"><br>
                                                                                    <span class="on-hover">
                                                                                        Add New
                                                                                    </span>
                                                                                </a></div>';
                                                                            echo' <br></td>';
                                                                        }
                                                                        if(!empty($level2_info[1][0])){
                                                                            echo'<td id="p3" width="25%" height="85%" valign="top">
                                                                                    <div class="media"><a href="'.base_url('user/MyGenealogy1/feederStageTree/'.$level2_info[1][0]->user_id).'" class="has-tooltip profile-thumb">';?>
                                                                                        <img class="img-circle" src="<?php echo !empty($level2_info[1][0]->image) ? base_url('images/'.$level2_info[1][0]->image) : base_url('images/noimage.jpeg');?>" alt="<?php echo $level2_info[1][0]->username;?>" border="0" width="60">
                                                                                        <?php echo '<span class="on-hover">
                                                                                            Name : '.$level2_info[1][0]->first_name . ' ' .$level2_info[1][0]->last_name  .'<br>
                                                                                            Member ID : '. $level2_info[1][0]->user_id.' <br>
                                                                                            Membership : '.$package[$level2_info[1][0]->pkg_id] .'<br>
                                                                                            Sponsor : '.$level2_info[1][0]->ref_id.'<br>
                                                                                            Email : '.$level2_info[1][0]->email.' <br>
                                                                                            Country :' .$level2_info[1][0]->country.' <br>
                                                                                        </span>
                                                                                    </a></div>
                                                                                    <br>
                                                                                    '.$level2_info[1][0]->user_id.'<br>'.$level2_info[1][0]->username.' <br> <br>
                                                                                </td>';
                                                                        }else{
                                                                            echo'<td  id="p1" width="25%" height="85%" valign="top">';
                                                                                echo'<div class="media"><a href="'.base_url('join-us/'.$loginID->username).'">
                                                                                    <img class="img-circle" src="'.base_url('images/noimage.jpeg').'" alt="waiting" border="0" width="60"><br>
                                                                                    <span class="on-hover">
                                                                                        Add New
                                                                                    </span>
                                                                                </a></div>';
                                                                            echo' <br></td>';
                                                                        }
                                                                        if(!empty($level2_info[1][1])){
                                                                            echo'<td id="p3" width="25%" height="85%" valign="top">
                                                                                    <div class="media"><a href="'.base_url('user/MyGenealogy1/feederStageTree/'.$level2_info[1][1]->user_id).'" class="has-tooltip profile-thumb">';?>
                                                                                        <img class="img-circle" src="<?php echo !empty($level2_info[1][1]->image) ? base_url('images/'.$level2_info[1][1]->image) : base_url('images/noimage.jpeg');?>" alt="<?php echo $level2_info[1][1]->username;?>" border="0" width="60">
                                                                                        <?php echo '<span class="on-hover">
                                                                                            Name : '.$level2_info[1][1]->first_name . ' '. $level2_info[1][1]->last_name.'<br>
                                                                                            Member ID : '. $level2_info[1][1]->user_id.' <br>
                                                                                            Membership : '.$package[$level2_info[1][1]->pkg_id] .'<br>
                                                                                            Sponsor : '.$level2_info[1][1]->ref_id.'<br>
                                                                                            Email : '.$level2_info[1][1]->email.' <br>
                                                                                            Country :' .$level2_info[1][1]->country.' <br>
                                                                                        </span>
                                                                                    </a></div>
                                                                                    <br>
                                                                                    '.$level2_info[1][1]->user_id.'<br>'.$level2_info[1][1]->username.' <br> <br>
                                                                                </td>';
                                                                        }else{
                                                                            echo'<td  id="p1" width="25%" height="85%" valign="top">';
                                                                                echo'<div class="media"><a href="'.base_url('join-us/'.$loginID->username).'">
                                                                                    <img class="img-circle" src="'.base_url('images/noimage.jpeg').'" alt="waiting" border="0" width="60"><br>
                                                                                    <span class="on-hover">
                                                                                        Add New
                                                                                    </span>
                                                                                </a></div>';
                                                                            echo' <br></td>';
                                                                        }

                                                                        ?>
                                                                    </tr>
                                                                    <tr align="center">
                                                                        <td height="5" colspan="4"></td>
                                                                    </tr>
                                                                    <tr align="center" style="display:none;">
                                                                        <td width="25%" height="15%">
                                                                            <table width="50%" border="0" align="center"
                                                                                cellpadding="0" cellspacing="0"
                                                                                class="sl_text">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign="top"><img
                                                                                                src="<?php echo base_url('treeimage');?>/arrow2.jpg"
                                                                                                width="100%"></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td width="25%" height="15%">
                                                                            <table width="50%" border="0" align="center"
                                                                                cellpadding="0" cellspacing="0"
                                                                                class="sl_text">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign="top"><img
                                                                                                src="<?php echo base_url('treeimage');?>/arrow2.jpg"
                                                                                                width="100%"></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td width="25%" height="15%">
                                                                            <table width="50%" border="0" align="center"
                                                                                cellpadding="0" cellspacing="0"
                                                                                class="sl_text">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign="top"><img
                                                                                                src="<?php echo base_url('treeimage');?>/arrow2.jpg"
                                                                                                width="100%"></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td width="25%" height="15%">
                                                                            <table width="50%" border="0" align="center"
                                                                                cellpadding="0" cellspacing="0"
                                                                                class="sl_text">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign="top"><img
                                                                                                src="<?php echo base_url('treeimage');?>/arrow2.jpg"
                                                                                                width="100%"></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" style="display:none;">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="50%" align="center" valign="top">
                                                                            <table width="100%" border="0" cellpadding="0"
                                                                                cellspacing="0">
                                                                                <tbody>
                                                                                    <tr align="center" valign="top">
                                                                                        <?php
                                                                                        // if(!empty($level4[1]->user_id)){
                                                                                        //     echo'<td id="p3" width="25%" height="85%" valign="top">
                                                                                        //             <a href="'.base_url('Dashboard/User/GenelogyTree/'.$level4[1]->user_id).'" class="has-tooltip profile-thumb">
                                                                                        //                 <img src="'.tree_img($level4[1]->package_amount,0).'" alt="'.$level4[1]->name.'" border="0" width="60">
                                                                                        //                 <span class="on-hover">
                                                                                        //                     Username : '. $level4[1]->name.' <br>
                                                                                        //                     Package : '.$level4[1]->package_amount.' Rs.  <br>
                                                                                        //                     Joining Date : '.$level4[1]->created_at.'<br>
                                                                                        //                     Activation Date : '.$level4[1]->topup_date.'<br>
                                                                                        //                     Left team : '.$level4[1]->left_count.' | Right team : '.$level4[1]->right_count.' <br>
                                                                                        //                     Left points : '.$level4[1]->leftPower.' | Right points : '.$level4[1]->rightPower.' <br>
                                                                                        //                 </span>
                                                                                        //             </a>
                                                                                        //             <br>
                                                                                        //             '.$level4[1]->user_id.'<br>'.$level4[1]->name.' <br> <br>
                                                                                        //         </td>';
                                                                                        // }else{
                                                                                        //     echo'<td  id="p1" width="25%" height="85%" valign="top">';
                                                                                        //         echo'<a href="'.base_url('Dashboard/User/Register/?sponser_id='.$this->session->userdata['user_id'].'&position=L').'">
                                                                                        //             <img src="'.tree_img(0,1).'" alt="waiting" border="0" width="60"><br>
                                                                                        //             <span class="on-hover">
                                                                                        //                 Add New
                                                                                        //             </span>
                                                                                        //         </a>';
                                                                                        //     echo' <br></td>';
                                                                                        // }
                                                                                        ?>
                                                                                        <?php
                                                                                        // if(!empty($level4[2]->user_id)){
                                                                                        //     echo'<td id="p3" width="25%" height="85%" valign="top">
                                                                                        //             <a href="'.base_url('Dashboard/User/GenelogyTree/'.$level4[2]->user_id).'" class="has-tooltip profile-thumb">
                                                                                        //                 <img src="'.tree_img($level4[2]->package_amount,0).'" alt="'.$level4[2]->name.'" border="0" width="60">
                                                                                        //                 <span class="on-hover">
                                                                                        //                     Username : '. $level4[2]->name.' <br>
                                                                                        //                     Package : '.$level4[2]->package_amount.' Rs.  <br>
                                                                                        //                     Joining Date : '.$level4[2]->created_at.'<br>
                                                                                        //                     Activation Date : '.$level4[2]->topup_date.'<br>
                                                                                        //                     Left team : '.$level4[2]->left_count.' | Right team : '.$level4[2]->right_count.' <br>
                                                                                        //                     Left points : '.$level4[2]->leftPower.' | Right points : '.$level4[2]->rightPower.' <br>
                                                                                        //                 </span>
                                                                                        //             </a>
                                                                                        //             <br>
                                                                                        //             '.$level4[2]->user_id.'<br>'.$level4[2]->name.' <br> <br>
                                                                                        //         </td>';
                                                                                        // }else{
                                                                                        //     echo'<td  id="p1" width="25%" height="85%" valign="top">';
                                                                                        //         echo'<a href="'.base_url('Dashboard/User/Register/?sponser_id='.$this->session->userdata['user_id'].'&position=L').'">
                                                                                        //             <img src="'.tree_img(0,1).'" alt="waiting" border="0" width="60"><br>
                                                                                        //             <span class="on-hover">
                                                                                        //                 Add New
                                                                                        //             </span>
                                                                                        //         </a>';
                                                                                        //     echo' <br></td>';
                                                                                        // }
                                                                                        ?>
                                                                                        <?php
                                                                                        // if(!empty($level4[3]->user_id)){
                                                                                        //     echo'<td id="p3" width="25%" height="85%" valign="top">
                                                                                        //             <a href="'.base_url('Dashboard/User/GenelogyTree/'.$level4[3]->user_id).'" class="has-tooltip profile-thumb">
                                                                                        //                 <img src="'.tree_img($level4[3]->package_amount,0).'" alt="'.$level4[3]->name.'" border="0" width="60">
                                                                                        //                 <span class="on-hover">
                                                                                        //                     Username : '. $level4[3]->name.' <br>
                                                                                        //                     Package : '.$level4[3]->package_amount.' Rs.  <br>
                                                                                        //                     Joining Date : '.$level4[3]->created_at.'<br>
                                                                                        //                     Activation Date : '.$level4[3]->topup_date.'<br>
                                                                                        //                     Left team : '.$level4[3]->left_count.' | Right team : '.$level4[3]->right_count.' <br>
                                                                                        //                     Left points : '.$level4[3]->leftPower.' | Right points : '.$level4[3]->rightPower.' <br>
                                                                                        //                 </span>
                                                                                        //             </a>
                                                                                        //             <br>
                                                                                        //             '.$level4[3]->user_id.'<br>'.$level4[3]->name.' <br> <br>
                                                                                        //         </td>';
                                                                                        // }else{
                                                                                        //     echo'<td  id="p1" width="25%" height="85%" valign="top">';
                                                                                        //         echo'<a href="'.base_url('Dashboard/User/Register/?sponser_id='.$this->session->userdata['user_id'].'&position=L').'">
                                                                                        //             <img src="'.tree_img(0,1).'" alt="waiting" border="0" width="60"><br>
                                                                                        //             <span class="on-hover">
                                                                                        //                 Add New
                                                                                        //             </span>
                                                                                        //         </a>';
                                                                                        //     echo' <br></td>';
                                                                                        // }
                                                                                        ?>
                                                                                        <?php
                                                                                        // if(!empty($level4[4]->user_id)){
                                                                                        //     echo'<td id="p3" width="25%" height="85%" valign="top">
                                                                                        //             <a href="'.base_url('Dashboard/User/GenelogyTree/'.$level4[4]->user_id).'" class="has-tooltip profile-thumb">
                                                                                        //                 <img src="'.tree_img($level4[4]->package_amount,0).'" alt="'.$level4[4]->name.'" border="0" width="60">
                                                                                        //                 <span class="on-hover">
                                                                                        //                     Username : '. $level4[4]->name.' <br>
                                                                                        //                     Package : '.$level4[4]->package_amount.' Rs.  <br>
                                                                                        //                     Joining Date : '.$level4[4]->created_at.'<br>
                                                                                        //                     Activation Date : '.$level4[4]->topup_date.'<br>
                                                                                        //                     Left team : '.$level4[4]->left_count.' | Right team : '.$level4[4]->right_count.' <br>
                                                                                        //                     Left points : '.$level4[4]->leftPower.' | Right points : '.$level4[4]->rightPower.' <br>
                                                                                        //                 </span>
                                                                                        //             </a>
                                                                                        //             <br>
                                                                                        //             '.$level4[4]->user_id.'<br>'.$level4[4]->name.' <br> <br>
                                                                                        //         </td>';
                                                                                        // }else{
                                                                                        //     echo'<td  id="p1" width="25%" height="85%" valign="top">';
                                                                                        //         echo'<a href="'.base_url('Dashboard/User/Register/?sponser_id='.$this->session->userdata['user_id'].'&position=L').'">
                                                                                        //             <img src="'.tree_img(0,1).'" alt="waiting" border="0" width="60"><br>
                                                                                        //             <span class="on-hover">
                                                                                        //                 Add New
                                                                                        //             </span>
                                                                                        //         </a>';
                                                                                        //     echo' <br></td>';
                                                                                        // }
                                                                                        ?>

                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td width="50%" align="center" valign="top">
                                                                            <table width="100%" border="0" cellpadding="0"
                                                                                cellspacing="0">
                                                                                <tbody>
                                                                                    <tr align="center" valign="top">
                                                                                        <?php
                                                                                        // if(!empty($level4[5]->user_id)){
                                                                                        //     echo'<td id="p3" width="25%" height="85%" valign="top">
                                                                                        //             <a href="'.base_url('Dashboard/User/GenelogyTree/'.$level4[5]->user_id).'" class="has-tooltip profile-thumb">
                                                                                        //                 <img src="'.tree_img($level4[5]->package_amount,0).'" alt="'.$level4[5]->name.'" border="0" width="60">
                                                                                        //                 <span class="on-hover">
                                                                                        //                     Username : '. $level4[5]->name.' <br>
                                                                                        //                     Package : '.$level4[5]->package_amount.' Rs.  <br>
                                                                                        //                     Joining Date : '.$level4[5]->created_at.'<br>
                                                                                        //                     Activation Date : '.$level4[5]->topup_date.'<br>
                                                                                        //                     Left team : '.$level4[5]->left_count.' | Right team : '.$level4[5]->right_count.' <br>
                                                                                        //                     Left points : '.$level4[5]->leftPower.' | Right points : '.$level4[5]->rightPower.' <br>
                                                                                        //                 </span>
                                                                                        //             </a>
                                                                                        //             <br>
                                                                                        //             '.$level4[5]->user_id.'<br>'.$level4[5]->name.' <br> <br>
                                                                                        //         </td>';
                                                                                        // }else{
                                                                                        //     echo'<td  id="p1" width="25%" height="85%" valign="top">';
                                                                                        //         echo'<a href="'.base_url('Dashboard/User/Register/?sponser_id='.$this->session->userdata['user_id'].'&position=R').'">
                                                                                        //             <img src="'.tree_img(0,1).'" alt="waiting" border="0" width="60"><br>
                                                                                        //             <span class="on-hover">
                                                                                        //                 Add New
                                                                                        //             </span>
                                                                                        //         </a>';
                                                                                        //     echo' <br></td>';
                                                                                        // }
                                                                                        ?>
                                                                                        <?php
                                                                                        // if(!empty($level4[6]->user_id)){
                                                                                        //     echo'<td id="p3" width="25%" height="85%" valign="top">
                                                                                        //         <a href="'.base_url('Dashboard/User/GenelogyTree/'.$level4[6]->user_id).'" class="has-tooltip profile-thumb">
                                                                                        //                 <img src="'.tree_img($level4[6]->package_amount,0).'" alt="'.$level4[6]->name.'" border="0" width="60">
                                                                                        //                 <span class="on-hover">
                                                                                        //                     Username : '. $level4[6]->name.' <br>
                                                                                        //                     Package : '.$level4[6]->package_amount.' Rs.  <br>
                                                                                        //                     Joining Date : '.$level4[6]->created_at.'<br>
                                                                                        //                     Activation Date : '.$level4[6]->topup_date.'<br>
                                                                                        //                     Left team : '.$level4[6]->left_count.' | Right team : '.$level4[6]->right_count.' <br>
                                                                                        //                     Left points : '.$level4[6]->leftPower.' | Right points : '.$level4[6]->rightPower.' <br>
                                                                                        //                 </span>
                                                                                        //             </a>
                                                                                        //             <br>
                                                                                        //             '.$level4[6]->user_id.'<br>'.$level4[6]->name.' <br> <br>
                                                                                        //         </td>';
                                                                                        // }else{
                                                                                        //     echo'<td  id="p1" width="25%" height="85%" valign="top">';
                                                                                        //         echo'<a href="'.base_url('Dashboard/User/Register/?sponser_id='.$this->session->userdata['user_id'].'&position=R').'">
                                                                                        //             <img src="'.tree_img(0,1).'" alt="waiting" border="0" width="60"><br>
                                                                                        //             <span class="on-hover">
                                                                                        //                 Add New
                                                                                        //             </span>
                                                                                        //         </a>';
                                                                                        //     echo' <br></td>';
                                                                                        // }
                                                                                        // ?>
                                                                                        // <?php
                                                                                        // if(!empty($level4[7]->user_id)){
                                                                                        //     echo'<td id="p3" width="25%" height="85%" valign="top">
                                                                                        //             <a href="'.base_url('Dashboard/User/GenelogyTree/'.$level4[7]->user_id).'" class="has-tooltip profile-thumb">
                                                                                        //                 <img src="'.tree_img($level4[7]->package_amount,0).'" alt="" border="0" width="60">
                                                                                        //                 <span class="on-hover">
                                                                                        //                     Username : '. $level4[7]->name.' <br>
                                                                                        //                     Package : '.$level4[7]->package_amount.' Rs.  <br>
                                                                                        //                     Joining Date : '.$level4[7]->created_at.'<br>
                                                                                        //                     Activation Date : '.$level4[7]->topup_date.'<br>
                                                                                        //                     Left team : '.$level4[7]->left_count.' | Right team : '.$level4[7]->right_count.' <br>
                                                                                        //                     Left points : '.$level4[7]->leftPower.' | Right points : '.$level4[7]->rightPower.' <br>
                                                                                        //                 </span>
                                                                                        //             </a>
                                                                                        //             <br>
                                                                                        //             '.$level4[7]->user_id.'<br>'.$level4[7]->name.' <br> <br>
                                                                                        //         </td>';
                                                                                        // }else{
                                                                                        //     echo'<td  id="p1" width="25%" height="85%" valign="top">';
                                                                                        //         echo'<a href="'.base_url('Dashboard/User/Register/?sponser_id='.$this->session->userdata['user_id'].'&position=R').'">
                                                                                        //             <img src="'.tree_img(0,1).'" alt="waiting" border="0" width="60"><br>
                                                                                        //             <span class="on-hover">
                                                                                        //                 Add New
                                                                                        //             </span>
                                                                                        //         </a>';
                                                                                        //     echo' <br></td>';
                                                                                        // }
                                                                                        ?>
                                                                                        <?php
                                                                                        // if(!empty($level4[8]->user_id)){
                                                                                        //     echo'<td id="p3" width="25%" height="85%" valign="top">
                                                                                        //             <a href="'.base_url('Dashboard/User/GenelogyTree/'.$level4[8]->user_id).'" class="has-tooltip profile-thumb">
                                                                                        //                 <img src="'.tree_img($level4[8]->package_amount,0).'" alt="" border="0" width="60">
                                                                                        //                 <span class="on-hover">
                                                                                        //                     Username : '. $level4[8]->name.' <br>
                                                                                        //                     Package : '.$level4[8]->package_amount.' Rs.  <br>
                                                                                        //                     Joining Date : '.$level4[8]->created_at.'<br>
                                                                                        //                     Activation Date : '.$level4[8]->topup_date.'<br>
                                                                                        //                     Left team : '.$level4[8]->left_count.' | Right team : '.$level4[8]->right_count.' <br>
                                                                                        //                     Left points : '.$level4[8]->leftPower.' | Right points : '.$level4[8]->rightPower.' <br>
                                                                                        //                 </span>
                                                                                        //             </a>
                                                                                        //             <br>
                                                                                        //             '.$level4[8]->user_id.'<br>'.$level4[8]->name.' <br> <br>
                                                                                        //         </td>';
                                                                                        // }else{
                                                                                        //     echo'<td  id="p1" width="25%" height="85%" valign="top">';
                                                                                        //         echo'<a href="'.base_url('Dashboard/User/Register/?sponser_id='.$this->session->userdata['user_id'].'&position=R').'">
                                                                                        //             <img src="'.tree_img(0,1).'" alt="waiting" border="0" width="60"><br>
                                                                                        //             <span class="on-hover">
                                                                                        //                 Add New
                                                                                        //             </span>
                                                                                        //         </a>';
                                                                                        //     echo' <br></td>';
                                                                                        // }
                                                                                        ?>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" align="center" valign="top">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" align="center" valign="top">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" align="center" valign="top">
                                            <table cellpadding="5">
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php
                    // }else{
                    //     echo 'This Account is not in Your Team';
                    // }
                    ?>

                </div>
            </div>
            <!-- END col-3 -->
        </div>
    </div>
</div>

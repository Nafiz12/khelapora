<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="keywords" content="School, Education Management System, School Management System">
    <meta name="description" content="A complete Management System">
    <meta name="author" content="www.thejournalexpress24.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <!--    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700'>-->
    <!--    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/style_001.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/style_002.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/skin/default_skin/css/theme.css">

    <!--    <link rel="stylesheet" type="text/css" href="--><?php //echo base_url(); ?><!--media/assets/admin-tools/admin-plugins/admin-panels/adminpanels.css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/css/admin-forms.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/css/glDatePicker.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/css/select2.min.css">
    

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() . 'media/assets/img/icons/ll20.png'?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>

    <!--<script type="text/javascript" src="<?php echo base_url(); ?>media/css/html5shiv.js"></script>-->
    <!--<script type="text/javascript" src="<?php echo base_url(); ?>media/css/respond.min.js"></script>-->
    <![endif]-->
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media//ui/jquery-ui.min.js"></script>
    <script>
        var controller="<?php echo $this->uri->segment(1);?>";
        $(document).ready(function(){
            $("#add_new_function").click(function(){
                location.href="<?php echo base_url()?>index.php/"+controller+"/add";
            });
        });
    </script>
    <style type="text/css">
        ul {
            padding:0;
            list-style: none;
        }
        .footer-social-icons {
            width: 350px;
            display:block;
            margin: 0 auto;
        }
        .social-icon {
            color: #fff;
        }
        ul.social-icons {
            margin-top: 10px;
        }
        .social-icons li {
            vertical-align: top;
            display: inline;
            height: 100px;
        }
        .social-icons a {
            color: #fff;
            text-decoration: none;
        }
        .fa-facebook {
            padding:4px 8px;
            -o-transition:.5s;
            -ms-transition:.5s;
            -moz-transition:.5s;
            -webkit-transition:.5s;
            transition: .5s;
            background-color: #322f30;
        }
        .fa-facebook:hover {
            background-color: #3d5b99;
        }
        .fa-twitter {
            padding:4px 5px;
            -o-transition:.5s;
            -ms-transition:.5s;
            -moz-transition:.5s;
            -webkit-transition:.5s;
            transition: .5s;
            background-color: #322f30;
        }
        .fa-twitter:hover {
            background-color: #00aced;
        }
        .fa-rss {
            padding:4px 8px;
            -o-transition:.5s;
            -ms-transition:.5s;
            -moz-transition:.5s;
            -webkit-transition:.5s;
            transition: .5s;
            background-color: #322f30;
        }
        .fa-rss:hover {
            background-color: #eb8231;
        }
        .fa-youtube {
            padding:4px 8px;
            -o-transition:.5s;
            -ms-transition:.5s;
            -moz-transition:.5s;
            -webkit-transition:.5s;
            transition: .5s;
            background-color: #322f30;
        }
        .fa-youtube:hover {
            background-color: #e64a41;
        }
        .fa-linkedin {
            padding:4px 6px;
            -o-transition:.5s;
            -ms-transition:.5s;
            -moz-transition:.5s;
            -webkit-transition:.5s;
            transition: .5s;
            background-color: #322f30;
        }
        .fa-linkedin:hover {
            background-color: #0073a4;
        }
        .fa-google-plus {
            padding:4px 8px;
            -o-transition:.5s;
            -ms-transition:.5s;
            -moz-transition:.5s;
            -webkit-transition:.5s;
            transition: .5s;
            background-color: #322f30;
        }
        .fa-google-plus:hover {
            background-color: #e25714;
        }

        @media only screen and (max-width: 700px) {
        .restricted {
                display:none;
            }
            
            body.sb-l-m #content_wrapper {
            margin-left: 0;
         }
        body.sb-l-m #sidebar_left.nano {
            position: absolute;
            margin-left: -12%;
        }
}

    </style>
</head>
<?php
// $class="dashboard-page sb-l-o sb-r-c onload-check sb-l-m";
$class="dashboard-page sb-l-o sb-r-c";
$action=$this->uri->segment(1);
if($action=="home" || $action=="home"){
    $class="dashboard-page sb-l-o sb-r-c";
}
?>
<body class="<?= $class; ?>">
<!--<body class="dashboard-page sb-l-o sb-r-c">-->

<!-- Start: Theme Preview Pane -->
<div id="skin-toolbox">
    <div class="panel">
    </div>
</div>
<!-- End: Theme Preview Pane -->

<!-- Start: Main -->
<div id="main">
    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top bg-light">
        <div class="navbar-branding">
            <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home">
                <img style="width: 140px; height: 45px; margin-top: 5%;" src="<?php echo base_url() . 'media/assets/img/icons/school_book2.png' ?>" />
            </a>
            <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span>
            <ul class="nav navbar-nav pull-right hidden">
                <li>
                    <a href="#" class="sidebar-menu-toggle">
                        <span class="octicon octicon-ruby fs20 mr10 pull-right "></span>
                    </a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-left restricted" style="margin-left:14%; margin-top: 1.2%">
            <a style="border-color: #B382DBB3;color: #30668C;" href="<?php echo base_url(); ?>index.php/student_attendances"
               class="btn btn-default btn-sm light fw600 ml10"><span class="fa fa-building-o"></span> Student Attendance</a>
            <!--<a style="border-color: #B382DBB3;color: #30668C;" href="<?php echo base_url(); ?>index.php/admit_cards"-->
            <!--   class="btn btn-default btn-sm light fw600 ml10"><span class="fa fa-credit-card"></span> Admit Card</a>-->
            <a style="border-color: #B382DBB3;color: #30668C;" href="<?php echo base_url(); ?>index.php/fees/add"
               class="btn btn-default btn-sm light fw600 ml10"><span class="fa fa-money"></span> Fee Collection</a>
            <!--<a style="border-color: #B382DBB3;color: #30668C;" href="<?php echo base_url(); ?>index.php/manage_marks"-->
            <!--   class="btn btn-default btn-sm light fw600 ml10"><span class="fa fa-tasks"></span> Exam Marks</a>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="<?php echo base_url(); ?>media/assets/img/avatars/placeholder.png" alt="avatar" class="mw30 br64 mr15">
                    <span><?php echo $this->session->userdata('logged_name'); ?></span>
                    <span class="caret caret-tp hidden-xs"></span>
                </a>
                <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">
                    <li class="br-t of-h">
                        <a href="<?php echo base_url(); ?>index.php/users/change_password" class="fw600 p12 animated animated-short fadeInDown">
                            <span class="fa fa-gear pr5"></span>Change Password </a>
                    </li>
                    <li class="br-t of-h">
                        <a href="<?php echo base_url(); ?>index.php/login/logout" class="fw600 p12 animated animated-short fadeInDown">
                            <span class="fa fa-power-off pr5"></span> Logout </a>

                    </li>
                </ul>
            </li>
        </ul>

    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar -->
    <aside id="sidebar_left" class="nano nano-primary">
        <div class="nano-content">

            <!-- Start: Sidebar Header -->
            <header class="sidebar-header">
                <div class="user-menu">
                    <div class="row text-center mbn">
                        <div class="col-xs-4">
                            <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                                <span class="glyphicons glyphicons-home"></span>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                                <span class="glyphicons glyphicons-inbox"></span>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                                <span class="glyphicons glyphicons-bell"></span>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                                <span class="glyphicons glyphicons-imac"></span>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicons glyphicons-settings"></span>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                                <span class="glyphicons glyphicons-restart"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            <!-- End: Sidebar Header -->

            <!-- sidebar menu -->
            <ul class="nav sidebar-menu">
                <li class="sidebar-label pt20">Menu</li>
                <li class="active">
                    <a href="<?php echo base_url(); ?>index.php/home">
                        <span class="glyphicons glyphicons-home"></span>
                        <span class="sidebar-title">Home</span>
                    </a>
                </li>
                <li class="sidebar-label pt15">Menu List</li>
                <?php
                $top_controller=$this->uri->segment(1);
                $top_function=$this->uri->segment(2);
                foreach($menu_data as $group_name=>$menu0)
                {
                    $icon = '<span class="glyphicons glyphicons-circle_plus"></span>';
                    if($group_name == "Students"){
                        $icon = '<span class="glyphicons glyphicons-group"></span>';
                    }
                    if($group_name == "User Information"){
                        $icon = '<span class="glyphicons glyphicons-user"></span>';
                    }
                    if($group_name == "Configuration"){
                        $icon = '<span class="glyphicon glyphicon-cog"></span>';
                    }
                    if($group_name == "Library"){
                        $icon = '<span class="glyphicons glyphicons-book_open"></span>';
                    }
                    if($group_name == "Employees"){
                        $icon = '<span class="glyphicons glyphicons-parents"></span>';
                    }
                    if($group_name == "Reports"){
                        $icon = '<span class="glyphicons glyphicons-charts"></span>';
                    }
                    if($group_name == "Fee Reports"){
                        $icon = '<span class="glyphicons glyphicons-list"></span>';
                    }
                    if($group_name == "Accounting Reports"){
                        $icon = '<span class="glyphicons glyphicons-stats"></span>';
                    }

                    if($group_name == "Dormitory"){
                        $icon = '<span class="glyphicons glyphicons-bank"></span>';
                    }
                    if($group_name == "Exam"){
                        $icon = '<span class="glyphicons glyphicons-adress_book"></span>';
                    }
                    if($group_name == "Fees"){
                        $icon = '<span class="glyphicons glyphicons-usd"></span>';
                    }
                    if($group_name == "Accounting"){
                        $icon = '<span class="glyphicons glyphicons-calculator"></span>';
                    }
                    if($group_name == "Transport"){
                        $icon = '<span class="glyphicons glyphicons-bus"></span>';
                    }
//                    if($group_name == "Accounting"){
//                        $icon = '<span class="glyphicons glyphicons-wallet"></span>';
//                    }

                    $total_counter = 0;
                    foreach($menu0 as $menu1){
                        $total_counter = $total_counter+count($menu1);
                    }
                    if($total_counter != 0) {
                        ?>
                        <li>
                            <a class="accordion-toggle <?php if (isset($menu0[$top_controller]['index']['group']) && ($menu0[$top_controller]['index']['group'] == $group_name)) { ?>menu-open<?php } ?>"
                               href="#">
                                <?php echo $icon; ?>
                                <span
                                        class="sidebar-title"><?php if (!empty($menu0)) { ?><?php echo str_replace('_', ' ', $group_name); ?><?php } ?></span>
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <?php
                                foreach ($menu0 as $cntroller => $menu1) {
                                    foreach ($menu1 as $menu) {
                                        ?>
                                        <li class="<?php if ($cntroller == $top_controller) { ?> active <?php } ?>">
                                            <a href="<?php echo $menu['link']; ?>">
                                                <span
                                                        class="<?php echo isset($menu['img']) ? $menu['img'] : 'glyphicons glyphicons-magnet'; ?>"></span> <?php echo $menu['name']; ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }
                }
                ?>
                <li>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="admin_forms-elements.html">
                                <span class="glyphicons glyphicons-edit"></span> Admin Elements </a>
                        </li>
                        <li>
                            <a href="admin_forms-widgets.html">
                                <span class="glyphicons glyphicons-calendar"></span> Admin Widgets </a>
                        </li>
                        <li>
                            <a href="admin_forms-layouts.html">
                                <span class="glyphicons glyphicons-more_windows"></span> Admin Layouts </a>
                        </li>
                        <li>
                            <a href="admin_forms-wizard.html">
                                <span class="glyphicons glyphicons-magic"></span> Admin Wizard </a>
                        </li>
                        <li>
                            <a href="admin_forms-validation.html">
                                <span class="glyphicons glyphicons-check"></span> Admin Validation </a>
                        </li>
                    </ul>
                </li>

            </ul>
            <div class="sidebar-toggle-mini">
                <a href="#">
                    <span class="fa fa-sign-out"></span>
                </a>
            </div>
        </div>
    </aside>

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

        <!-- Start: Topbar-Dropdown -->
        <div id="topbar-dropmenu">
            <div class="topbar-menu row">
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile bg-success">
                        <span class="metro-icon glyphicons glyphicons-inbox"></span>
                        <p class="metro-title">Messages</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile bg-info">
                        <span class="metro-icon glyphicons glyphicons-parents"></span>
                        <p class="metro-title">Users</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile bg-alert">
                        <span class="metro-icon glyphicons glyphicons-headset"></span>
                        <p class="metro-title">Support</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile bg-primary">
                        <span class="metro-icon glyphicons glyphicons-cogwheels"></span>
                        <p class="metro-title">Settings</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile bg-warning">
                        <span class="metro-icon glyphicons glyphicons-facetime_video"></span>
                        <p class="metro-title">Videos</p>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="metro-tile bg-system">
                        <span class="metro-icon glyphicons glyphicons-picture"></span>
                        <p class="metro-title">Pictures</p>
                    </a>
                </div>
            </div>
        </div>
        <!-- End: Topbar-Dropdown -->

        <!-- Start: Topbar -->
        <header id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-icon">
                        <a href="<?php echo base_url();?>/index.php/home">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li class="crumb-icon">
                        Branch : <?php echo $branch_info['BranchName']; ?>
                    </li>
                </ol>
            </div>
            <div class="topbar-right">
                <ol class="breadcrumb">
                    <li class="crumb-icon">
                        <a href="<?php echo base_url();?>/index.php/home">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li class="crumb-link">
                        <a href="<?php echo base_url();?>index.php/home">Home</a>
                    </li>
                    <li class="crumb-trail"><?php echo ucwords(str_replace('_',' ',$this->uri->segment(1))); ?></li>
                </ol>
            </div>

        </header>
        <!-- End: Topbar -->

        <!-- Begin: Content -->
        <section id="content" class="animated fadeIn">

            <!-- Dashboard Tiles -->


            <!-- Admin-panels -->
            <div class="admin-panels fade-onload sb-l-o-full">

                <!-- full width widgets -->

                <div class="row">
                    <?php
                    $messege_success=$this->session->flashdata('success');
                    $messege_fail=$this->session->flashdata('fail');

                    if(!empty($messege_success)){
                    ?>
                    <div class="col-md-12 pln br-r mvn15">
                        <div class="alert alert-primary alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-trophy pr10"></i>
                            <?php echo $this->session->flashdata('success'); ?>.
                        </div>
                        <?php
                        }
                        else if(!empty($messege_fail))
                        { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-remove pr10"></i>
                                <?php echo $this->session->flashdata('fail'); ?>
                            </div>
                        <?php } ?>

                        <?php $this->load->view($view,$content); ?>
                    </div>

                    <!-- Three panes -->

                    <!-- end: .col-md-12.admin-grid -->
                </div>
                <section id="content">
                    <div class="footer-social-icons row" style="width: auto; margin-top: 2%">
                        <div class="col-md-6" style="float: left; font-size: 11px; font-weight: normal">
                            <h5 style="color:#000000; font-size: 11px; margin-top: 1%;font-weight: normal"><a target="_blank" style="color:#000000; margin-top: 2%;text-decoration: none" href=""> </a>Copyright © 2020. All right reserved by   <a target="_blank" style="color:#000000; margin-top: 1%;text-decoration: none" href="http://www.4sventure.com/"><strong>4sventure<strong></a></h5>
                        </div>
                        <div class="col-md-6" style="float: right; text-align: end">
                            <ul class="social-icons" style="margin: 0px;">
                                <li><a class="social-icon" style="color: #000; font-size: 11px;">Follow us on</a></li>
                                <li><a href="" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="" class="social-icon"> <i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </section>

            </div>
        </section>
        <!-- End: Content -->

    </section>
</div>

<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->

<!-- Bootstrap -->

<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/bootstrap.min.js"></script>

<!-- Holder js  -->
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/bootstrap/holder.min.js"></script>

<!-- Theme Javascript -->
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/utility/utility.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/demo.js"></script>

<!-- Admin Panels  -->
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/admin-tools/admin-plugins/admin-panels/json2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/admin-tools/admin-plugins/admin-panels/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/admin-tools/admin-plugins/admin-panels/adminpanels.js"></script>

<!-- Forms Javascript -->
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/js/jquery-tcm-month.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/js/jquery-ui-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/js/jquery-ui-touch-punch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/js/jquery.spectrum.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/js/jquery.stepper.min.js"></script>
<!-- Fancytree Plugin -->
<script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/plugins/fancytree/jquery.fancytree-all.min.js"></script>
<!-- Page Javascript -->
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/pages/widgets.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/plugins/fileupload/fileupload.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/js/glDatePicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jspdf.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/bootstrap-clockpicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 
 <script type="text/javascript">

      $(".myselect").select2();

</script>
<script type="text/javascript">

    jQuery(document).ready(function() {

         $("#CourseId").change(function () {
            get_batch_list();
        });
         $("#BatchId").change(function () {
            get_student_roll_and_code_list();
        });


        "use strict";

        // Init Theme Core
        Core.init();

        // Init Theme Core
        Demo.init();

        // grant file-upload preview onclick functionality
        $('.fileupload-preview').on('click', function() {
            $('.btn-file > input').click();
        });



        function get_batch_list(){
       var selected_branch_id = $("#BranchId").val();
       var selected_course_id = $("#CourseId").val();
        $.post("<?php echo site_url('students/ajax_for_get_batch_info') ?>", {
                
                BranchId: selected_branch_id,
                CourseId: selected_course_id,
            },
            function(data){
                $('#status').html("");
                $('#BatchId').empty();
             
                if( data.status == 'failure' ){
                    $('#BatchId').append('<option value = \"' + '' + '\">' + '---Select Batch---' + '</option>');
                }
                else    {
                    $('#BatchId').append('<option value = \"' + '' + '\">' + '---Select Batch---' + '</option>');
                    for(var i = 0; i < data.BatchId.length; i++){
                       
                            $('#BatchId').append('<option value = \"' + data.BatchId[i] + '\">' + data.BatchName[i] + '</option>');
                      
                    }
                }
            }, "json");
    }


        function get_student_roll_and_code_list() {
        var selected_branch_id = $("#BranchId").val();
        var selected_course_id = $("#CourseId").val();
        var selected_batch_id = $("#BatchId").val();

        $.post("<?php echo site_url('students/ajax_for_get_student_code_new') ?>", {
                
                BranchId: selected_branch_id,CourseId: selected_course_id,BatchId: selected_batch_id,
            },
            function (data) {
                $('#status').html("");
                $('#StudentCode').empty();
                $('#RollNo').empty();
                if (data.status == 'failure') {
                    $('#txt_code').empty();
                    $('#txt_roll').empty();
                }
                else {
                    $('#StudentCode').val(data.StudentCode);
                    $('#RollNo').val(data.StudentRoll);
                }
            }, "json");
    }

    });
</script>
<script type="text/javascript">
    $(window).load(function()
    {
        $('#mydate').glDatePicker({
            dateFormat: 'yy-mm-dd'
        });


    });
</script>

<script>
    $(function() {
        $( "#datepicker1" ).datepicker();
    });
</script>

<script type="text/javascript">
    function printDiv(printableArea) {
        var printContents = document.getElementById(printableArea).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }


    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#pdf').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 180,
            'elementHandlers': specialElementHandlers
        });
        doc.save('profile.pdf');
    });


</script>
<script type="text/javascript">
$('.clockpicker').clockpicker({
    placement: 'top',
    align: 'left',
    donetext: 'Done'
});
</script>



<!-- <script>
 $(document).ready(function() {
  $('.timepicker').timepicker({
            showInputs: false
        })
});

</script> -->
<!-- END: PAGE SCRIPTS -->

</body>

</html>

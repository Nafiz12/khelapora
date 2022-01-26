<?php $this->ci =& get_instance();
//echo "<pre>";print_r($this->ci); die;?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Management software</title>

   <link href="<?php echo base_url();?>lib/css/krajee/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />




    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/dist/css/AdminLTE.min.css">
    <!-- mystyle.css-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/css/my_style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/css/test.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/plugins/timepicker/bootstrap-timepicker.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<!--===============to get collapse slidebar just need to add this " sidebar-collapse " in body tag ===============-->
<body class="hold-transition skin-blue sidebar-mini  ">
<div class="wrapper">

    <header class="main-header" >
        <!-- Logo -->
        <a href="<?php echo base_url();?>index.php/Dashboards " class="logo" style = "background-color: #fff; color:#3943b9;">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <!-- <span class="logo-mini"><b>D</b>IT</span> -->
            <span class="logo-mini"><b>4S</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>4sventure </b> </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" style = "background-color: #fff;">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style = "color: #110d0d;">
                <span class="sr-only">Toggle navigation</span>
            </a>


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav" >


                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <img class="img-circle img-responsive user-image" src="<?php echo base_url();?>lib/images/admin.png" width="24" height="24">
                            <span class="hidden-xs " style ="color:black;"><?php echo $this->session->userdata('roll_name'); ?><span class="caret"></span></span> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">

                                <img class="img-circle " src="<?php echo base_url() ?>lib/images/admin.png">

                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url();?>index.php/Users/change_password" class="btn btn-default btn-flat">Change Password</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url(); ?>index.php/Logins/logout"
                                       class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar"  >
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>

                <li>
                    <a href="<?php echo base_url();?>index.php/Dashboards">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">

            </span>
                    </a>
                </li>
                <?php
                $top_controller=$this->uri->segment(1);
                $top_function=$this->uri->segment(2);
                //echo'<pre>'; print_r($menu_data); die;
                foreach($menu_data as $group_name=>$menu0)
                {

                    $icon = '<span class="glyphicons glyphicons-circle_plus"></span>';
                    if($group_name == "Students"){
                        $icon = '<span class="glyphicons glyphicons-group"></span>';
                    }
                    if($group_name == "User_roles"){
                        $icon = '<span class="glyphicons glyphicons-user"></span>';
                    }
                    if($group_name == "Settings"){
                        $icon = '<span class="glyphicons glyphicons-settings"></span>';
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
                    if($group_name == "Dormitory"){
                        $icon = '<span class="glyphicons glyphicons-bank"></span>';
                    }
                    if($group_name == "Exam"){
                        $icon = '<span class="glyphicons glyphicons-adress_book"></span>';
                    }
                    if($group_name == "Student Fees"){
                        $icon = '<span class="glyphicons glyphicons-usd"></span>';
                    }
                    if($group_name == "Accounting"){
                        $icon = '<span class="glyphicons glyphicons-calculator"></span>';
                    }
                    if($group_name == "Transport"){
                        $icon = '<span class="glyphicons glyphicons-bus"></span>';
                    }
//                    if($group_name == "Accountingss"){
//                        $icon = '<span class="glyphicons glyphicons-wallet"></span>';
//                    }

                    $total_counter = 0;
                    foreach($menu0 as $menu1){
                        $total_counter = $total_counter+count($menu1);
                    }
                    if($total_counter != 0) {
                        ?>

                        <li class="treeview menu-open active">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span><?php if (!empty($menu0)) { ?><?php echo str_replace('_', ' ', $group_name); ?><?php } ?></span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
                                         </span>
                        </a>
                        <ul class="treeview-menu">
                                <?php
                                foreach ($menu0 as $cntroller => $menu1) {
                                    foreach ($menu1 as $menu) {
                                        ?>

                                        <li><a href="<?php echo $menu['link']; ?>"><i class="fa fa-circle-o"></i>
                                                 <?php echo $menu['name']; ?>
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




        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>

                <small><?php if(isset($title)){echo $title;}else{}?></small>
            </h1>

            <ol class="breadcrumb">

                <li><a href="#"><i class="fa fa-dashboard"></i> <?php if(isset($title)){echo $title;}else{}?></a></li>
                <li><a href="#"><?php if(isset($headline)){echo $headline;}else{}?></a></li>

            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">



                    <div class="box">
                        <div class="box-header alert-primary">
                            <?php
                            $success = $this->session->flashdata('success_message');
                            if (!empty($success)) echo "<div class='message_head text-center alert-primary'><div class='success_message'>$success</div></div>";

                            $change_password = $this->session->flashdata('change_password');
                            if (!empty($change_password)) echo "<div class='message_head text-center alert-primary'><div class='change_password'>$change_password</div></div>";

                            $error = $this->session->flashdata('error_message');
                            if (!empty($error)) echo "<div class='message_head'><div class='error'>$error</div></div>";
                            $warning = $this->session->flashdata('warning');
                            if (!empty($warning)) echo "<div class='message_head'><div class='warning'>$warning</div></div>";
                            $notice = $this->session->flashdata('notice');
                            if (!empty($notice)) echo "<div class='message_head'><div class='notify'>$notice</div></div>";
                            $information = $this->session->flashdata('information');
                            if (!empty($information)) echo "<div class='message_head'><div class='info'>$information</div></div>";
                            $success = $this->session->flashdata('success');
                            if (!empty($success)) echo "<div class='message_head'><div class='message'>$success</div></div>";
                            $message = $this->session->flashdata('message');
                            if (!empty($message)) echo "<div class='message_head'><div class='message'>$message</div></div>";
                            ?>
                        </div>



<?php $this->load->view($view,$content); ?>
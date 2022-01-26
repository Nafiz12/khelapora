<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MyBilling</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A complete billing solution">
    <meta name="author" content="Rafiur Rabby">

    <!-- The styles -->
    <link id="bs-<?php echo base_url(); ?>media/css" href="<?php echo base_url(); ?>media/css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>media/css/charisma-app.css" rel="stylesheet">
    <link href='<?php echo base_url(); ?>media/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>media/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='<?php echo base_url(); ?>media/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>media/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>media/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>media/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>media/media/css/jquery.noty.css' rel='stylesheet'>
    
    <link href='<?php echo base_url(); ?>media/css/noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>media/css/elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>media/css/elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>media/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>media/css/uploadify.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>media/css/animate.min.css' rel='stylesheet'>
	
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>media/bower_components/jquery/jquery.min.js"></script>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/js/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
	<script src="<?php echo base_url(); ?>media/js/ui/1.11.2/jquery-ui.js"></script>
	

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
    
    
    <!-- external javascript -->

<script src="<?php echo base_url(); ?>media/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="<?php echo base_url(); ?>media/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='<?php echo base_url(); ?>media/bower_components/moment/min/moment.min.js'></script>
<script src='<?php echo base_url(); ?>media/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='<?php echo base_url(); ?>media/js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="<?php echo base_url(); ?>media/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="<?php echo base_url(); ?>media/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="<?php echo base_url(); ?>media/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="<?php echo base_url(); ?>media/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="<?php echo base_url(); ?>media/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="<?php echo base_url(); ?>media/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="<?php echo base_url(); ?>media/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="<?php echo base_url(); ?>media/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="<?php echo base_url(); ?>media/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?php echo base_url(); ?>media/js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
    
    
    
    
    
    
    <!-- The fav icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>media/img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"> <img alt="MY BILLING" src="<?php echo base_url() ?>media/img/log.png" class="hidden-xs"/>
                </a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>&nbsp;<span class="hidden-sm hidden-xs"><?php echo $this->session->userdata('roll_name'); ?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/users/change_password">Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>index.php/login/logout">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

          

            

        </div>
    </div>
    <!-- topbar ends -->
    
    

            

         

    
    
<div class="ch-container">
    <div class="row">
    
    <?php echo $this->load->view('template/menu'); ?>
    <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
         
          <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
</div>
&nbsp;
<?php 
$messege_success=$this->session->flashdata('success');
$messege_fail=$this->session->flashdata('fail');

if(!empty($messege_success)){
?>
<div class="alert alert-success"> <strong><?php echo $this->session->flashdata('success'); ?></strong> </div>
<?php }else if(!empty($messege_fail)){ ?>
<div class="alert alert-danger"> <strong><?php echo $this->session->flashdata('fail'); ?></strong> </div>
<?php } ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> <?php echo $page_title; ?></h2>

                
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12">
        		
                
                   
                

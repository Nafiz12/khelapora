<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>EduBook</title>
    <meta name="keywords" content="School Management System Asif Raihan" />
    <meta name="description" content="School Management System">
    <meta name="author" content="Asif Raihan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/style_001.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/style_002.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/media/assets/skin/default_skin/css/theme.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/media/assets/admin-tools/admin-forms/css/admin-forms.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() . 'media/assets/img/icons/eb_fav.png'?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>-->
    <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

<!-- Start: Main -->
<div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

        <!-- begin canvas animation bg -->
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>

        <!-- Begin: Content -->
        <section id="content">

            <div class="admin-form theme-info" id="login1">

                <div class="panel panel-info mt10 br-n">
                    <div style="text-align: center" class="panel-heading heading-border bg-white">
                        <!--                        <img src="--><?php //echo base_url() . 'media/assets/img/icons/220-80-3.png' ?><!--" />-->
                        <img height="80"  src="<?php echo base_url() . 'media/assets/img/icons/logo_final_212.png' ?>" />
                    </div>

                    <!-- end .form-header section -->
                    <form method="post" action="<?php echo base_url(); ?>index.php/login/validate" id="contact">
                        <div class="panel-body bg-light p30">
                            <?php
                            if(isset($fail) && !empty($fail)) {
                                ?>
                                <div class="row">
                                    <div class="col-sm-12 pr30" style="text-align: left;margin-bottom: 2%">
                                        <span style="color: red;font-size: 13px; padding-left: 50px;">The User Name or Password Not Match or Not Valid.</span>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="row">
                                <div class="col-sm-7 pr30">

                                    <div class="section row hidden">
                                        <div class="col-md-4">
                                            <a href="#" class="button btn-social facebook span-left mr5 btn-block">
                                                    <span><i class="fa fa-facebook"></i>
                                                    </span>Facebook</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#" class="button btn-social twitter span-left mr5 btn-block">
                                                    <span><i class="fa fa-twitter"></i>
                                                    </span>Twitter</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#" class="button btn-social googleplus span-left btn-block">
                                                    <span><i class="fa fa-google-plus"></i>
                                                    </span>Google+</a>
                                        </div>
                                    </div>

                                    <div class="section">
                                        <label for="username" class="field-label text-muted fs18 mb10">Username</label>
                                        <label for="username" class="field prepend-icon">
                                            <input type="text" name="username" id="username" class="gui-input" placeholder="Enter username">
                                            <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="section">
                                        <label for="username" class="field-label text-muted fs18 mb10">Password</label>
                                        <label for="password" class="field prepend-icon">
                                            <input type="password" name="password" id="password" class="gui-input" placeholder="Enter password">
                                            <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                </div>
                                <div style="margin-left: 5%" class="col-sm-2 pr30">
                                    <div class="section">
                                        <?php
                                        $logo=  base_url() . 'media/assets/img/icons/logo-ex-7.png';
                                        if(isset($row[0]->Logo)){
                                            $logo = base_url() . 'media/branch_pictures/' . $row[0]->Logo;
                                        }
                                        ?>
                                        <img style="margin-top: 25%" height="145" width="180"src="<?php echo $logo; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end .form-body section -->
                        <div class="panel-footer clearfix p10 ph15">
                            <button type="submit" class="button btn-primary mr10 pull-right">Login</button>
                            <label class="switch block switch-primary pull-left input-align mt10">
                                <input type="checkbox" name="remember" id="remember" checked>
                                <label for="remember" data-on="YES" data-off="NO"></label>
                                <span>Remember me</span>
                            </label>
                        </div>
                        <!-- end .form-footer section -->
                    </form>
                </div>
            </div>

        </section>
        <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url();?>media/vendor/jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>media/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- Bootstrap -->
<script type="text/javascript" src="<?php echo base_url();?>media/assets/js/bootstrap/bootstrap.min.js"></script>

<!-- Page Plugins -->
<script type="text/javascript" src="<?php echo base_url();?>media/assets/js/pages/login/EasePack.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>media/assets/js/pages/login/rAF.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>media/assets/js/pages/login/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>media/assets/js/pages/login/login.js"></script>

<!-- Theme Javascript -->
<script type="text/javascript" src="<?php echo base_url();?>media/assets/js/utility/utility.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>media/assets/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>media/assets/js/demo.js"></script>

<!-- Page Javascript -->
<script type="text/javascript">
    jQuery(document).ready(function() {
        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        Demo.init();

        // Init CanvasBG and pass target starting location
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 2,
                y: window.innerHeight / 3.3
            },
        });


    });
</script>

<!-- END: PAGE SCRIPTS -->

</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>SchoolBook</title>
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
    <link rel="shortcut icon" href="<?php echo base_url() . 'media/assets/img/icons/ll20.png'?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>-->
    <![endif]-->
    <style type="text/css">
    iframe{
        display:none;
    }
        .admin-form .button {
            color: #FFF;
            border: 0;
            height: 29px;
            line-height: 27px;
            font-size: 13px;
            cursor: pointer;
            padding: 0 18px;
            text-align: center;
            vertical-align: middle;
            background-color: #4a89dc;
            display: inline-block;
            -webkit-user-drag: none;
            margin-top: 3%;
        }
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

    </style>
</head>

<body class="external-page sb-l-c sb-r-c">

<!-- Start: Main -->
<div id="main" class="animated fadeIn" style=" -moz-background-size: cover; -webkit-background-size: cover;-o-background-size: cover;background-size: cover;">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">
        <!-- begin canvas animation bg -->
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>

        <!-- Begin: Content -->
        <section id="content" style="float: right; padding: 60px; height: 100%;">
            <div class="admin-form theme-info" style="margin-top: 0%;" id="login1">
                <div style="opacity: .8; margin-bottom: 0px;" class="panel panel-info">
                    <!-- end .form-header section -->
                    <form method="post" action="<?php echo base_url(); ?>index.php/login/validate" id="contact">
                        <div style="opacity: 1;margin-bottom: 0%;padding-bottom: 0%;" class="panel-body bg-light ">
                            <div class="row" style="margin-bottom: 5%;">
                                <div class="col-sm-12 pr30">
                                    <div class="section" style="text-align:center;">
                                        <?php
                                        
                                        
                                        $logo= base_url() . 'media/assets/img/icons/default_logo.png';
                                        if(isset($row[0]->Logo) && !empty($row[0]->Logo)){
                                            $logo = base_url() . 'media/branch_pictures/' . $row[0]->Logo;
                                        }
                                        ?>
                                        <img height="100" width="100" src="<?php echo $logo; ?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 pr30" style="padding-left: 30px;">
                                    <?php

                                    if(isset($fail) && !empty($fail)) {?>
                                        <span style="color: red;font-size: 13px; ">The User Name or Password Not Match or Not Valid.</span>

                                    <?php }?>
                                    <div class="section">

                                        <label for="username" class="field prepend-icon">
                                            <input type="text" style="border-color: #5C9DE7" name="username" id="username" class="gui-input" placeholder="Enter username">
                                            <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                    <div class="section">

                                        <label for="password" class="field prepend-icon">
                                            <input type="password" style="border-color: #5C9DE7" name="password" id="password" class="gui-input" placeholder="Enter password">
                                            <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
                            </div>
                        </div>
                        <!-- end .form-body section -->
                        <div style="background-color: #58BBC4; border: 0px" class="panel-footer clearfix p10 ph15">
                            <label class="switch block switch-primary pull-left input-align mt10">
                                <input type="checkbox" name="remember" id="remember" checked>
                                <label for="remember" data-on="YES" data-off="NO"></label>
                                <span>Remember me</span>
                            </label>
                            <button type="submit" class="button btn-primary mr10 pull-right">Login</button>
                        </div>
                        <div style="background-color: #58BBC4; border: 0px; text-align: center; " class="panel-footer clearfix p10 ph15">
<!--                            <img height="45" width="165" style="text-align: center; margin-bottom: 5%; margin-top: 10%" src="--><?php //echo base_url() . 'media/assets/img/icons/eb001.png' ?><!--" />-->
                            <div class="footer-social-icons" style="width: auto">
                                <h4 class="_14">Follow us on</h4>
                                <ul class="social-icons">
                                    <li><a href="" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                                    <li><a href="" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
                                    <li><a href="" class="social-icon"> <i class="fa fa-linkedin"></i></a></li>
                                </ul>
                                <h5  style="color:#ffffff; margin-top: 2%; margin-bottom:0%;font-size: 11px; font-weight: normal "><a target="_blank" style="color:#ffffff; margin-top: 2%;text-decoration: none" href="">School Management ERP</a></h5>
                                <h5  style="color:#ffffff; margin-top: 2%; margin-bottom:0%;font-size: 11px; font-weight: normal ">Copyright © 2020 <a target="_blank" style="color:#ffffff; margin-top: 1%;text-decoration: none" href=""> <Strong>Md.Nafiz Al Ifat</Strong></a></h5>
                            </div>
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

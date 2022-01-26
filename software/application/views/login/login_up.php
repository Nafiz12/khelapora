<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="utf-8">
    <title>EduBook</title>
    <meta name="keywords" content="School Management System Asif Raihan" />
    <meta name="description" content="School Management System">
    <meta name="author" content="Asif Raihan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calm breeze login screen</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/login_logo.css">
    <link rel="shortcut icon" href="<?php echo base_url() . 'media/assets/img/icons/eb_fav.png'?>">
</head>

<body>
<div class="wrapper">
    <div class="container1">
        <img height="150"  src="<?php echo base_url() . 'media/assets/img/icons/Front Page.png' ?>" />
    </div>
    <div class="container">
        <?php
        $logo=  base_url() . 'media/assets/img/icons/logo-ex-7.png';
        if(isset($row[0]->Logo)){
            $logo = base_url() . 'media/branch_pictures/' . $row[0]->Logo;
        }
        ?>
        <img height="120"src="<?php echo $logo; ?>" />

        <form method="post" action="<?php echo base_url(); ?>index.php/login/validate" id="contact">
            <?php
            if(isset($fail) && !empty($fail)) {
                ?>
                <div class="row">
                    <div class="col-sm-12 pr30" style="text-align: left;margin-bottom: 2%">
                        <span style="color: red; font-family: Trebuchet MS; font-size: 13px;">The User Name or Password Not Match or Not Valid.</span>
                    </div>
                </div>
                <?php
            }
            ?>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" id="login-button">Login</button>
        </form>
        <img src="<?php echo base_url() . 'media/assets/img/icons/Inntechlogo2.png' ?>" />
        <h5 style="color:#0D0E7E; margin-top: 2%; font-weight: bold;">Copyright © 2017-2019 <a target="_blank" style="color:#0D0E7E; margin-top: 2%; font-weight: bold;text-decoration: none" href="http://inntechbd.com/"> InnTech Bangladesh.</a></h5>
    </div>
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<script type="text/javascript" src="<?php echo base_url();?>media/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>media/js/index.js"></script>
</body>

</html>

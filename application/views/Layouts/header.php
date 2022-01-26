<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141107949-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-141107949-2');
</script>

    
    <meta charset="utf-8">
    <title><?php if(isset($config_list)){foreach($config_list as $config){ echo $config->title;}}?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="poricroma the best coaching center for bcs, bank job in Bangladesh" />
    <meta name="author" content="" />
    <!-- css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->

    <link href="<?php echo base_url();?>lib/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
      <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link href="<?php echo base_url();?>lib/css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url();?>lib/css/flexslider.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>lib/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>lib/css/image_gallery_plugin/style.css" type="text/css" rel="stylesheet" />
    <!-- <link href="<?php echo base_url();?>lib/css/jquery-gallery.css" type="text/css" rel="stylesheet" /> -->
 <link rel="shortcut icon" href="<?php echo base_url();?>lib/images/favicons.png">

    <style>
        .demo { margin: 30px auto; max-width:960px;}
        .demo > li {float:left;}
        .demo > li img { width:220px; margin:10px; cursor:pointer;}
        .row, .row-fluid { margin-bottom: 0px;}
        .carousel-inner > .item > a > img, .carousel-inner > .item > img, .img-responsive, .thumbnail a > img, .thumbnail > img {
            display: block;
            /*max-width: 100%;*/
            height: auto;
        }
        .row {
            margin-left: 0px;
            margin-right: 0px;
        }
        .container{
            min-width:1300px;
        }
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body style="overflow-x: hidden;">
    
</style>

   <div class="row no-print" style = "background: #25708b;z-index: 999;">
<!--       <marquee onmouseover="this.stop();" style="margin-top:0%;" onmouseout="this.start();" direction="left" scrolldelay="4" scrollamount="2" behavior="scroll" id = "horizontal_marquee">-->
<!--    <?php if(isset($notice_list)){foreach($notice_list as $notice){?>-->
<!--        **<a class = "read-more" target="_blank" href="<?php echo base_url();?>index.php/Notice_boards/view/<?php echo $notice->description;?>" style = "border-radius:50px;color:white;"><?php echo $notice->title;?></a>** &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;-->


<!--    <?php }} ?>-->
<!--</marquee>-->
            <div class="col-md-4 col-sm-5" style="padding-left: 5%;
padding-bottom: 1%;
padding-top: 1%;">
                
                                <ul class="header-extras" style="float: right;margin: 25px 0 0;padding: 0;transition-duration: 0.8s;
                -webkit-transition-duration: 0.8s;font-size: 21px;line-height: 1.42857143;color: #333;">
                   
                    <li style="float: left;margin-left: 0px;list-style: none;">
                       
                        
                    </li>
                     
                    
                </ul>
                
               <a class="logo" style="padding: 10px 0;transition: all 1s ease 0s;
height: 76px;vertical-align: middle;" href="<?php echo base_url();?>"> <span><img class="img-responsive footer_logo" style="width: 100%;
min-height: 71px; max-height: 71px;" src="<?php echo base_url();?><?php echo $config->image;?>" alt=""></span><span></span></a>


            </div><!--./col-md-4-->


            <div class="col-md-8">
                
                    <div class="row" style="float:right">

                       
                     <div class="col-md-12" style="margin-top:2.5%;">
                          <div class="text-right">
                       
                        <div class="nav ">
                        <ul class="nav navbar-nav">
                             <li class="dropdown" style="border-right:0px;">
                              <a href="<?php echo base_url();?>index.php/Welcomes/admission">Online Admission
                              </a>
                             </li>

                             <li class="dropdown" style="border-right:0px;">
                              <a  data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-phone"> </i><strong>01987658478</strong></a>
                             </li>

                          


                            <li class="dropdown" style="border-right:0px;">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Login<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" style="margin-left:-88%;background: #25708b;border: 1px solid black;">
                                <li style = "width:100%;">
                                    <a href="<?php echo base_url();?>index.php/logins">
                                       Website admin login
                                    </a>
                                </li>

                                <li style = "width:100%;">
                                    <a href="<?php echo base_url();?>software/">
                                        Software login
                                    </a>
                                </li>
                                
                               

                            </ul>
                    </li>




                           
                        </ul>
            </div>
        </div>
                        
                    </div>
                </div>

               
            </div>
          <!--   <div class="col-md-8 col-sm-7" style="position: relative;min-height: 1px;padding-right: 8%;padding-left: 15px;">
                <ul class="header-extras" style="float: right;margin: 25px 0 0;padding: 0;transition-duration: 0.8s;
                -webkit-transition-duration: 0.8s;font-size: 14px;line-height: 1.42857143;color: #333;">
                   
                    <li style="float: left;margin-left: 0px;list-style: none;">
                        <i class="fa fa-phone i-plain" style="margin-top: 5px !important;font-size: 24px;border-radius: 100%;color: #bd0745;border: 1px solid #bd0745;display: block;
float: left;margin: 4px 11px 7px 0; margin-top: 4px;text-align: center !important;font-size: 28px;text-shadow: 1px 1px 1px rgba(0,0,0,.3);cursor: pointer;font-style: normal;">
    
</i>
                        <div class="he-text" style="float: left;padding-left: 6px;font-weight: normal;color: #848181;">Call Us<span style="display: block;
font-weight: normal;
text-transform: lowercase;
font-weight: 600;
color: #bd0745;">89562423934</span></div>
                    </li>
                     <li style="float: left;
margin-left: 20px;
list-style: none;"><a class="complainbtn" href="<?php echo base_url();?>software" style="padding: 10px 30px;display: inline-block;
font-size: 14px;border-radius: 30px;background: #bd0745;text-decoration: none !important;color: #fff !important;text-align: center;
line-height: 24px;-webkit-box-shadow: 0px 5px 25px 0px rgba(240, 90, 33, 0.35);
-moz-box-shadow: 0px 5px 25px 0px rgba(240, 90, 33, 0.35);box-shadow: 0px 5px 25px 0px rgba(240, 90, 33, 0.35);">Login</a></li>
                    
                </ul>
            </div> -->

            <!--./col-md-8-->
        </div><!--./row-->
    <div id="wrapper" class="home-page" style="margin-top:0%;">
        
        
        <!--------------Add bootstrap modal start------------------->

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           
              <h4 class="header-title" id="exampleModalLabel" style = "width:100%;">ভর্তির  নির্দেশনা</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <div class="card">
                        <div class="card-body">
                           
                           
                                <div class="form-group">
                                    <p>please fill up all the necessary  fields then submit your form. After submitting the form a print copy of your details will appear. Don't loose it . You have to take it  with you for further purposes</p>
                                </div>
                               
                           
                        </div>
                    </div>
          </div>
          <div class="modal-footer">
           
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           
          </div>
          
        </div>
      </div>
    </div>

            <!--------------bootstrap modal end--------------------->
        <!-- start header -->
        <header class="no-print" style="box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.54);background:#25708b">
     


            <div class="navbar-collapse collapse nav-container " style="width: 110%;margin-left: -15px; "> 
            <div class="nav " style="background-color: #25708b">
                <ul class="nav navbar-nav " style = "margin-left: 13%;background-color: #25708b">




                    <!-- <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">About Us <b class="caret"></b></a>
                        
                        <ul class="dropdown-menu">
                            <li><a href="about.html">Principle's Message</a></li>
                            <li><a href="#">Our Team</a></li>
                            <li><a href="<?php echo base_url();?>index.php/Welcomes/photo_gallery">Photo Gallery</a></li>
                            <li><a href="#">Result History</a></li>
                            <li><a href="#">Infrastructure</a></li>
                        </ul>
                    </li> -->

                    <li><a style = "padding-top:5px;" href="<?php echo base_url();?>index.php/Welcomes">প্রথম পাতা</a></li>

                    <li class="dropdown" >

                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">আমাদের সম্পর্কে <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                    
                            <li style = "width:100%;"><a href="<?php echo base_url();?>index.php/Welcomes/photo_gallery">ফটো গ্যালারি </a></li>
                            <li style = "width:100%;"><a href="#">ফলাফল</a></li>
                           
                        </ul>
                    </li>


                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">আমাদের কোর্স সমূহ  <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li style = "width:100%;"><a href="<?php echo base_url();?>index.php/Welcomes/get_course_details/2">বিসিএস প্রিলিমিনারি</a></li>
                            <li style = "width:100%;"><a href="<?php echo base_url();?>index.php/Welcomes/get_course_details/3">বিসিএস লিখিত</a></li>
                            <li style = "width:100%;"><a href="<?php echo base_url();?>index.php/Welcomes/get_course_details/4">বিসিএস ভাইভা</a></li>
                            <li style = "width:100%;"><a href="<?php echo base_url();?>index.php/Welcomes/get_course_details/5">ব্যাংক জব</a></li>
                           

                        </ul>
                    </li>
                   <!--  <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">সু্যোগ - সুবিধা <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li style = "width:100%;"><a href="about.html">গবেষণাগার</a></li>
                            <li style = "width:100%;"><a href="#">চিকিৎসা</a></li>
                            <li style = "width:100%;"><a href="#">পরিবহন</a></li>

                        </ul>
                    </li> -->

                     <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">প্রাতিষ্ঠানিক <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li style = "width:100%;"><a href="<?php echo base_url();?>index.php/Welcomes/show_lecture_details_view">লেকচার'স</a></li>
                            <li style = "width:100%;"><a href="<?php echo base_url();?>index.php/Welcomes/show_achievement_details_view">সাফল্য ও অর্জন</a></li>
                            <li style = "width:100%;"><a href="<?php echo base_url();?>index.php/Welcomes/show_news_events_details_view">রিপোর্ট এবং ঘটনা</a></li>
                              <li style = "width:100%;"><a href="<?php echo base_url();?>index.php/Welcomes/notice_board_list">বিজ্ঞপ্তি</a></li>
                        </ul>
                    </li> 

                  <li><a style = "padding-top:5px;" href="<?php echo base_url();?>index.php/welcomes/branch_info">শাখা সমূহ</a></li>


                    <!-- <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">শাখা সমূহ<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php 
                            foreach ($branches as $rows) {  ?>

                                 <li style = "width:100%;"><a href="<?php echo base_url();?>index.php/welcomes/branch_info/<?php echo $rows['BranchId'];?>"><?php echo $rows['BranchName'] ;?></a></li>

                           <?php } ?>
                           
                           
                        </ul>
                    </li> -->


               <!--      <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">E-Books <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="about.html">Principle's Message</a></li>
                            <li><a href="#">Management Committee</a></li>
                            <li><a href="#">Photo Gallery</a></li>
                            <li><a href="#">Result History</a></li>
                            <li><a href="#">Infrastructure</a></li>
                        </ul>
                    </li> -->

                    <!-- <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">ভর্তি তথ্য <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li style = "width:100%;"><a href="#" data-toggle="modal" data-target="#exampleModal">ভর্তির  নির্দেশনা</a></li>
                            <li style = "width:100%;"><a href="<?php echo base_url();?>index.php/welcomes/admission">ভর্তি ফরম</a></li>

                        </ul>
                    </li> -->


                    <!-- <li><a style = "padding-top:5px;" href="services.html">Extra Curricular</a></li> -->
                    <!-- <li><a style = "padding-top:5px;" href="services.html">ভর্তি তথ্য</a></li> -->
                    <!-- <li><a style = "padding-top:5px;" href="<?php echo base_url();?>index.php/Welcomes/employee_info_for_website">Teachers & Staff</a></li> -->
                    <li><a style = "padding-top:5px;" href="<?php echo base_url();?>index.php/Welcomes/employee_info_for_website">শিক্ষক ও কর্মচারী</a></li>
                    <!-- <li><a style = "padding-top:5px;" href="<?php echo base_url();?>index.php/Contacts">Contact</a></li> -->
                    <li><a style = "padding-top:5px;" href="<?php echo base_url();?>index.php/Contacts">যোগাযোগ</a></li>

                    <!--   <li><a style = "padding-top:5px;" href="<?php echo base_url();?>index.php/Contacts">Login</a></li>  -->
                    <li><a style = "padding-top:5px;" href="<?php echo base_url();?>index.php/logins">লগইন</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </header>
    <!-- end header -->


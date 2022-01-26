<?php $this->load->view('Layouts/header');?>
    <style>
        .coverimg { margin: 10px 0 }

        .coverimg a {
            display: inline-block;
            width: 150px;
            height: 150px;
            overflow: hidden;
            position: relative
        }

        .coverimg img {
            max-height: 100%;
            min-width: 100%;
            width: auto;
            left: 50%;
            -o-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            position: absolute
        }

        img[data-gallery] { cursor: pointer }

        .overlay {
            background: rgba(0,0,0,0.7);
            display: none;
            height: 100%;
            position: absolute;
            width: 100%;
            top: 0;
            z-index: 99999
        }

        .imgActive img {
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            position: absolute;
            top: 50%;
            left: 50%;
            max-width: 100%;
            max-height: 90%
        }

        .prev,
        .next,
        .close {
            transition: 0.3s ease all;
            display: inline-block;
            color: white;
            font-size: 6rem;
            opacity: 0.2;
            z-index: 1000
        }

        .prev:hover,
        .next:hover,
        .close:hover {
            cursor: pointer;
            opacity: 1
        }

        .prev,
        .next {
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            position: absolute;
            top: 50%
        }

        .prev { left: 100px }

        .next { right: 100px }

        .close {
            font-size: 4rem;
            position: relative;
            top: 60px;
            right: 20px
        }

        .coverImgOverlay {
            bottom: 20px;
            height: 100px;
            left: 50%;
            overflow: hidden;
            position: absolute;
            width: 3000%;
            z-index: 1000
        }

        .coverImgOverlay span {
            display: inline-block;
            height: 100px;
            margin: 5px;
            overflow: hidden;
            position: relative;
            width: 100px
        }

        .coverImgOverlay img {
            transition: 0.3s ease all;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            position: absolute;
            top: 50%;
            left: 50%;
            max-height: 100%;
            min-width: 100%;
            opacity: 0.2;
            width: auto
        }

        .coverImgOverlay img:hover { opacity: 1 !important }
        #paging {
            background-color: whitesmoke  ;

            border-radius: 0 0 4px 4px;
            float: left;
            font-family: verdana;
            font-size: 12px;
            height: 47px;
            padding: 12px 20px 0 10px;
            text-align: left;
            width: 100%;
        }
        #paging strong {
            background: #ccc none repeat scroll 0 0;
            border: 1px solid #fff;

            color: #4d4a4a;
            font-family: Verdana,Arial,Helvetica,sans-serif;
            font-size: 12px;
            font-weight: bolder;
            padding: 4px 6px 7px;
            text-decoration: none;
            margin-left:2px;
        }

        #paging a {
            background: #fbfbfb none repeat scroll 0 0;
            border: 1px solid #b0b0b0;

            color: #212121;
            font-family: Verdana,Arial,Helvetica,sans-serif;
            font-size: 12px;
            padding: 3px 6px 6px;
            text-decoration: none;
            margin-left:2px;
        }
        #paging a:hover {
            background: #bbb none repeat scroll 0 0;
            border: 1px solid #dedede;
            color: #000;
        }
    </style>


    <section id="content">


        <div class="container">


            <div class="row" style = "text-align: justify;">
                <div class="col-md-8 info-blocks text-center"  style = "min-height:698px;">
                    <div class="panel-heading box-title white-bg" style="background-color:#DEEAE8; padding: 8px 10px 9px 15px;">Employee List</div>

                    <!-- ==================== for showing details spech ==================================-->


                    <div class="row">
                        <?php if(isset($image_list)){foreach ($image_list as $image){ ?>
                            <div class="col-md-3 coverimg">
                                <a href="#"><img src="<?php echo base_url();?>lib/images/<?php echo $image['name'];?>" data-gallery="first-gallery" alt=""/></a>
<!--                                <a href="#"><img src="http://lorempixel.com/1024/728/sports/2" data-gallery="first-gallery" alt="" /></a>-->
<!--                                <a href="#"><img src="http://lorempixel.com/1024/728/animals/3" data-gallery="first-gallery" alt="" /></a>-->
<!--                                <a href="#"><img src="http://lorempixel.com/1024/728/cats/1" data-gallery="first-gallery" alt="" /></a>-->
<!--                                <a href="#"><img src="http://lorempixel.com/1024/728/nature/2" data-gallery="first-gallery" alt="" /></a>-->
                            </div>
<!--                        <div class="col-md-4" style = "margin-top:10px;">-->
<!--                            <a href = "--><?php //echo base_url();?><!--/index.php/Welcomes/inside_inside_photo_gallery/--><?php //echo $image['title'];?><!--">-->
<!--                                <img class=" img-responsive guid" src="--><?php //echo base_url();?><!--lib/images/--><?php //echo $image['name'];?><!--" style = "padding: 4px;-->
<!--line-height: 1.42857143;background-color: #fff;border: 1px solid #ddd;width:100%;display:inline-block;height:100px;" alt="No Preview" /></a><br>-->
<!--                            <span><a href = "--><?php //echo base_url();?><!--/index.php/Welcomes/inside_inside_photo_gallery/--><?php //echo $image['title'];?><!--"> --><?php //echo $image['title'];?><!--</a></span><br>-->
<!---->
<!--                        </div>-->

                          <?php }} ?>
                        <div align="center" id="paging"><?php echo $this->pagination->create_links(); ?></div>
                    </div>


                </div>

                <div class="col-md-4 info-blocks text-center" id = "gallery" style = "min-height:942px;">
                    <div class="panel-heading box-title white-bg" style="background-color:#DEEAE8; padding: 8px 10px 9px 15px;">Achievements</div>

                    <div class="row">
                        <div class="" style="overflow: hidden;">

                            <div class="row" >
                                <div class="col-sm-12">
                                    <ul class="" style="overflow-y: hidden; ">
                                        <li style="" class="news-item">


                                            <marquee  onmouseover="this.stop();" onmouseout="this.start();" id = "vertical_marquee" face="courier" behavior="SCROLL" onmouseout="this.setAttribute('scrollamount', 2, 0);"
                                                      onmouseover="this.setAttribute('scrollamount', 0, 0);" scrollamount="2" direction="up" style="text-align: left;">

                                                <?php if(isset($notice_list)){foreach($notice_list as $notice){?>
                                                    <div class="row" style = "margin:0px;padding:0px; border-bottom:1px dotted gray;">

                                                        <div class="col-xs-3 col-sm-3" >
                                                            <div class="col-sm-12 text-center notice-month">
                                                                <?php echo substr($notice->created_on,8,2) ;?>
                                                            </div>
                                                            <div class="col-sm-12 text-center notice-date">
                                                                <?php echo substr($notice->created_on,0,7) ;?>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-9 col-sm-9">
                                                            <div class="row"> <a class = "read-more" target="_blank" href="<?php echo base_url("lib/images/");?><?php echo $notice->description;?>" style = "border-radius:50px;"><?php echo $notice->title;?></a> <br></div>
                                                        </div>

                                                    </div>
                                                <?php }} ?>
                                            </marquee>

                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>





        </div>
    </section>






<?php $this->load->view('Layouts/footer');?>
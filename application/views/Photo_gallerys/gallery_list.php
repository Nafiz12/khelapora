<?php $this->load->view('Layouts/header');?>


    <section id="content">


        <div class="container">


            <div class="row" style = "text-align: justify;">
                <div class="col-md-8 info-blocks text-center"  style = "min-height:698px;">
                    <div class="panel-heading box-title white-bg" style="background-color:#25708b;color:white; padding: 8px 10px 9px 15px;">Gallery</div>

                    <!-- ==================== for showing details spech ==================================-->


                    <div class="row">
                        <?php
                        

                        if(isset($gallery_list)){foreach ($gallery_list as $gallerys){
                            // $gallerys=str_replace("_", " ", $gallerys);
                           // echo "<pre>";print_r(str_replace("_", " ", $gallerys));die;
                            ?>
                        <div class="col-md-4" style = "margin-top:10px;">
                            <a href = "<?php echo base_url();?>index.php/Welcomes/inside_inside_photo_gallery/<?php echo $gallerys['group_id'];?>">
                                <img class=" img-responsive guid" src="<?php echo base_url();?>lib/images/<?php echo $gallerys['name'];?>" style = "padding: 4px;
line-height: 1.42857143;background-color: #fff;border: 1px solid #ddd;width:100%;display:inline-block;height:100px;" alt="No Preview" /></a><br>
                            <span><a href = "<?php echo base_url();?>index.php/Welcomes/inside_inside_photo_gallery/<?php echo $gallerys['group_id'];?>"><?php echo $gallerys['title'];?></a></span><br>

                        </div>

                          <?php }} ?>
                    </div>


                </div>

                <div class="col-md-4 info-blocks text-center" id = "gallery" style = "min-height:942px;">
                    <div class="panel-heading box-title white-bg" style="background-color:#25708b;color:white; padding: 8px 10px 9px 15px;">Achievements</div>

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
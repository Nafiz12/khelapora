<?php //$this->load->view('Layouts/header');?>



    <section id="content">


        <div class="container">


            <div class="row" style = "text-align: justify;">
                <div class="col-md-8 info-blocks text-center"  style = "min-height:699px;">
                    <div class="panel-heading box-title white-bg" style="background-color:#DEEAE8; padding: 8px 10px 9px 15px;">Achievements</div>

                    <!-- ==================== for showing details spech ==================================-->

<?php if(isset($notice)){  ?>
                <object data="<?php echo base_url();?>lib/images/<?php echo $notice;?>" type="application/pdf" width="750" height="600">
                    alt : <a href="<?php echo base_url();?>lib/images/<?php echo $notice;?>"></a>
                </object>

    <?php  } ?>




                </div>

                <div class="col-md-4 info-blocks text-center" id = "gallery" style = "min-height:699px;">
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
                                                            <div class="row"> <a class = "read-more" target="_blank" href="<?php echo base_url();?>index.php/Notice_boards/view/<?php echo $notice->description;?>" style = "border-radius:50px;"><?php echo $notice->title;?></a> <br></div>
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
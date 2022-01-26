<div class="col-md-4 info-blocks text-center" id = "gallery" style = "height:600px;">
        <div class="panel-heading box-title white-bg" style="width: 109%;
        margin-left: -15px;background-color:#25708b;color:white; padding: 8px 10px 9px 15px;">বিজ্ঞপ্তি</div>
        <div class="c2" style="margin-left: -4%;background:#21750B; height:4px;"></div>

        <div class="row" style = "margin-left: 0%;">
            <div class="" style="">

                <div class="row" style = "margin-left: 0px;" >
                    <div class="col-sm-12">
                        <ul class="" style="margin-left: -8%; ">
                            <li style="" class="news-item">


                                <marquee  onmouseover="this.stop();" onmouseout="this.start();" id = "vertical_marquee" face="courier" behavior="SCROLL" onmouseout="this.setAttribute('scrollamount', 2, 0);"
                                onmouseover="this.setAttribute('scrollamount', 0, 0);" scrollamount="2" direction="up" style="text-align: left;">

                                <?php if(isset($notice_list)){foreach($notice_list as $notice){?>
                                    <div class="row" style = "margin:0px;padding:0px; border-bottom:1px dotted gray;">

                                        <div class="col-xs-3 col-sm-3" >
                                            <div class="col-sm-12 text-center notice-month">
                                                <?php echo date("d",strtotime($notice->created_on)) ;?>
                                            </div>
                                            <div class="col-sm-12 text-center notice-date">
                                                <?php echo date( "M,Y",strtotime($notice->created_on)) ;?>
                                            </div>
                                        </div>
                                        <div class="col-xs-9 col-sm-9">
                                            <div class="row"> 
                                                <a href="<?php echo base_url();?>index.php/Notice_boards/view/<?php echo $notice->description;?>" target="_blank"  style = "border-radius:50px;"><?php echo $notice->title;?></a> 
                                                <br></div>
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
        <a href="<?php echo base_url();?>index.php/Welcomes/notice_board_list"><h5 style = "padding-top:30%;"> আরো পড়ুন...</h5></a>
    </div>
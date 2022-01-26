<?php $this->load->view('Layouts/header');?>

<style>
    .sham{height:140px;}
    .tp-bannershadow.tp-shadow2 {

        background-size: auto;
        background-size: auto;
        background-size: 100% 100%;
        width: 890px;
        height: 60px;
    }
    .tp-bannershadow {
        position: absolute;
        margin-left: auto;
        margin-right: auto;
        -moz-user-select: none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -o-user-select: none;
    }
    .pull-left ~ p{
      text-align: justify;
      padding-left: 2%;
    }
</style>
<section id="banner "  >

    <!-- Slider -->
    <div class="row">
      <div class="col-md-8" style="margin-top:1%">


    <div class="" style = "">


      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox" style="min-height:385px;">

        <?php if(isset($slideshow_image) && $slideshow_image!=''){ $i = 0;foreach($slideshow_image as $slideshow){
                               // echo "<pre>";print_r($slideshow);
            if($i == 0){ $attribute = "item active" ;}else{$attribute = "item";}
            ?>
            <div class="<?php echo $attribute ;?>" style="height:250px">

                <img src="<?php echo base_url();?>lib/images/<?php echo $slideshow->name;?>"  alt="..." style="min-height:300px;">
                <div class="carousel-caption">
                    <?php echo $slideshow->title;?>
                </div>
            </div>
            <?php $i++;}} ?>

        </div>


        <!-- Wrapper for slides -->


        <!-- Controls -->

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>
</div>
<div class="tp-bannershadow tp-shadow2" style="left: -3%; margin-top:0.5%;z-index:1">
    <img src="<?php echo base_url();?>lib/images/shadow2.png"/>
</div>
<div style="margin-top: 6.5%;">
  <marquee onmouseover="this.stop();" style="margin-top:2%;border-top-right-radius: 4px;border-top-left-radius: 4px;" onmouseout="this.start();" direction="left" scrolldelay="4" scrollamount="2" behavior="scroll" id = "horizontal_marquee">
    <?php if(isset($notice_list)){foreach($notice_list as $notice){?>
        **<a class = "read-more" target="_blank" href="<?php echo base_url();?>index.php/Notice_boards/view/<?php echo $notice->description;?>" style = "border-radius:50px;color:white;"><?php echo $notice->title;?></a>** &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;


    <?php }} ?>
</marquee>
</div>
</div>
  <div class="col-md-4 info-blocks text-center" id = "gallery" style = "max-height:350px; max-width: 32%; margin-top:1%">
        <div class="panel-heading box-title white-bg" style="width: 109%;margin-top:-1%;
        margin-left: -15px;background-color:#25708b; color:white; padding: 8px 10px 9px 15px;">বিজ্ঞপ্তি</div>
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
         <div class="panel-heading box-title white-bg" style="width: 109%;
        margin-left: -15px;background-color:#25708b;color:white; padding: 0px 0px 6px 0px;"><a href="<?php echo base_url();?>index.php/Welcomes/notice_board_list"><h5 style = "padding-top:1%;color:white;"> আরো পড়ুন...</h5></a></div>
       
         
    </div>

</div>



<!-- end slider -->
       

</section>


<section id="content">


    <div class="container">


        <div class="row" style = "text-align: justify;">
            <div class="col-md-8 info-blocks text-center" style="max-height: 300px;">

             <div class="row" style = "margin-left:-15px;margin-right:-15px;" >
               <?php if(isset($spech_list)){$i=0;foreach($spech_list as $spech){?>
                <div class="col-md-6 info-blocks text-center" id = "gallery" style = "max-height: 300px;">

                <div class="panel-heading box-title white-bg" style="width: 109%;

                margin-left: -15px;background-color:#25708b;color:white; padding: 8px 10px 9px 15px;"><?php echo $spech->headline;?></div>
                <div class="row">
                    <div class="c2" style="background:#21750B; height:4px; margin-left: -14px;"></div>

                </div>
               

                    <div class="row achievement-box" style = "margin-bottom: 0px;margin-top: 5%;">
                        <span class="pull-left event-image-box">
                            <img style = "display: block; max-width: 100%;height: auto; border:2px solid whitesmoke;" class=" img-responsive " src="<?php echo base_url();?><?php echo $spech->image;?>" alt="" />
                           
                        </span>


                        
                        <p class="pull-left " style="text-align: justify;"><?php  echo htmlspecialchars_decode(stripslashes(substr($spech->spech,0,1500)));?> 

                        <?php if(strlen($spech->spech)>1300){ ?>

                          <a class="pull-right" href="<?php echo base_url();?>index.php/Welcomes/show_spech_details/<?php echo $spech->id;?>" >আরো পড়ুন...</a></>

                        <?php } ?>
                     
                      </p>

                    </div>
                    <div class="pull-right" style="margin-top: 10%;">
                      <p><strong><?php echo $spech->name;?></strong></p>
                      <p style = "text-align: right; line-height: 0px;"><strong><?php echo $spech->designation;?></strong></p>
                    </div>

             </div>
              <?php $i++;}} ?>

            </div>

    </div>




    <div class="col-md-4 info-blocks text-center" id = "gallery" style = "height:300px;">
        <div class="panel-heading box-title white-bg" style="width: 109%;
        margin-left: -15px;background-color:#25708b;color:white; padding: 8px 10px 9px 15px;"> কনটেন্ট ডাউনলোড কর্নার</div>
        <div class="c2" style="margin-left: -4%;background:#21750B; height:4px;"></div>

        <div class="row" style = "margin-left: 0%;margin-top: 5%;">
           

            
                    <div class="col-sm-12">
                        <ul class="" style="margin-left: -8%; ">
                            <li style="" class="news-item">


                                <div>

                                <?php if(isset($notice_list)){foreach($notice_list as $notice){?>
                                    <div class="row" style = "margin:0px;padding:0px;">

                                      <div class="col-xs-1 col-sm-1" >
                                            
                                        </div>

                                        <div class="col-xs-1 col-sm-1" >
                                            <i class="fa fa-file-pdf-o" style="font-size: 30px;"></i>
                                        </div>
                                        <div class="col-xs-9 col-sm-9">
                                            <div class="row" style="margin-left: 2%;text-align: justify;margin-bottom:5%;"> 
                                                <a href="<?php echo base_url();?>index.php/Notice_boards/view/<?php echo $notice->description;?>" target="_blank"  style = "border-radius:50px;"><?php echo $notice->title;?></a> 
                                                <br></div>
                                            </div>

                                        </div>
                                    <?php }} ?>
                                </div>

                            </li>

                        </ul>
                    </div>
              
           
        </div>

        <div class="panel-heading box-title white-bg" style="width: 109%;
        margin-left: -15px;background-color:#25708b;color:white; padding: 0px 0px 6px 0px; margin-top: 12%;"><a href="<?php echo base_url();?>index.php/Welcomes/notice_board_list"><h5 style = "padding-top:1%;color:white;"> আরো পড়ুন...</h5></a></div>
       
         <!-- <a href="<?php echo base_url();?>index.php/Welcomes/notice_board_list" class="btn btn-xs btn-primary" style="padding:4px;"><h5 style = "padding-top:0%;margin-bottom: 0px;"> আরো পড়ুন...</h5></a> -->
    </div>

</div>



</div>

</div>
</section>

<section id="content">

    <div class="container">
        <div class="row">
            <div class="col-md-4 info-blocks text-center" id = "gallery" style = "max-height:350px;">

                <div class="panel-heading box-title white-bg" style="width: 108%;

                margin-left: -15px;background-color:#25708b;color:white; padding: 8px 10px 9px 15px;">সাফল্য ও অর্জন</div>
                <div class="row">
                    <div class="c2" style="background:#21750B; height:4px; margin-left: -14px;"></div>

                </div>

            
                <?php if(isset($achievements_list)){$i=0;foreach($achievements_list as $achievements){?>
                  <a class="pull-left" href="<?php echo base_url();?>index.php/Welcomes/show_achievement_details/<?php echo $achievements->id;?>" style="margin-top: 5%;" >
                    <div class="row achievement-box" style = "margin-bottom: 0px;">
                        <span class="pull-left event-image-box">
                            <img style = "display: block;width:100%;height:auto;" class=" img-responsive " src="<?php echo base_url();?><?php echo $achievements->image;?>" alt="" />
                            <!--					<img src="media/imgAll/15-11-2017-1510737645.jpg" alt="Inaugural Program" class="img-responsive ">-->
                        </span>
                        <h5 style = "text-align: left;" class=""><strong><?php echo $achievements->title;?></strong></h5>
                        <p class="pull-left">তারিখ : <?php echo substr($achievements->created_on,0,10) ;?></p>
                       
                    </div>
                    </a>
                





                    <?php $i++;}} ?>
                    
                     <a href = "<?php echo base_url();?>index.php/Welcomes/show_achievement_details_view" style="margin-top:3%;" class="btn btn-xs btn-primary"> আরো পড়ুন </a> 


               
             </div>


             <div class="col-md-4 info-blocks text-center" id = "gallery" style = "max-height:350px;">
                <div class="panel-heading box-title white-bg" style="width: 109%;

                margin-left: -15px;background-color:#25708b;color:white; padding: 8px 10px 9px 15px;">রিপোর্ট এবং ঘটনা</div>
                <div class="row">
                    <div class="c2" style="background:#21750B; height:4px; margin-left:-14px;"></div>

                </div>
                
                 <?php if(isset($events_lists)){$i = 0;foreach($events_lists as $event){ ?>
                       
                  <a class="pull-left" href="<?php echo base_url();?>index.php/Welcomes/show_news_events_details/<?php echo $event->id;?>">
                        <div class="row achievement-box" style = "margin-bottom: 3px;">
				<span class="pull-left event-image-box">
                    <img style = "display: block; width:100%;height:auto; class=" img-responsive " src="<?php echo base_url();?><?php echo $event->image;?>" alt="" />
                    <!--					<img src="media/imgAll/15-11-2017-1510737645.jpg" alt="Inaugural Program" class="img-responsive ">-->
				</span>
                            <h5 style = "text-align: left;" class=""><strong><?php echo $event->title;?></strong></h5>
                            <p class="pull-left">তারিখ : <?php echo substr($event->created_on,0,10) ;?></p>
                               
                        </div>

                       </a>
                           
                       

                    <?php $i++;}} ?>
               
                     
                        <a href = "<?php echo base_url();?>index.php/Welcomes/show_news_events_details_view" style="margin-top:3%;" class="btn btn-xs btn-primary" > আরো পড়ুন </a> 
                    
                </div>


              <div class="col-md-4 info-blocks text-center" id = "gallery" style = "max-height:350px;">
                <div class="panel-heading box-title white-bg" style="width: 109%;

                margin-left: -15px;background-color:#25708b;color:white; padding: 8px 10px 9px 15px;">রিপোর্ট এবং ঘটনা</div>
                <div class="row">
                    <div class="c2" style="background:#21750B; height:4px; margin-left:-14px;"></div>

                </div>
                
                 <?php if(isset($branches)){$i = 0;foreach($branches as $branch){ ?>
                       

                        <div class="row achievement-box" style = "margin-top:5%;">
        <span class="pull-left event-image-box">
                    <img style = "display: block; max-width: 100px;max-height: 100px;" class=" img-responsive img-circle " src="<?php echo base_url();?>software/media/branch_pictures/<?php echo $branch['Logo'];?>" alt="" />
                    <!--          <img src="media/imgAll/15-11-2017-1510737645.jpg" alt="Inaugural Program" class="img-responsive ">-->
        </span>
                            <p style = "text-align: left;" class="">
                              <strong><?php echo $branch['BranchName'];?></strong><br>
                              <?php echo $branch['BranchAddress'];?>
                            </p>
                           
                                
                        </div>

                       
                           
                       

                    <?php $i++;}} ?>
               
                      
                </div>
            </div>
        </div>

    </section>




    <?php $this->load->view('Layouts/footer');?>
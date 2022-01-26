
<?php $this->load->view('Layouts/header');?>



    <section id="content">


        <div class="container">


            <div class="row" style = "text-align: justify;">
                <div class="col-md-8 info-blocks text-center"  style = "height:599px;">
                    

                    <!-- ==================== for showing details spech ==================================-->
                       


                        <?php if(isset($achievement_details)){foreach($achievement_details as $achievement){?>
<div class="panel-heading box-title white-bg" style="width: 104%;
            margin-left: -15px;background-color:#25708b;color:white; padding: 8px 10px 9px 15px;"><?php echo $achievement->headline;?></div>
                          <!--  <div class="row">
                            
                       </div> -->

                            <div class="row achievement-box" style = "text-align:justify;margin-top:0px; padding:20px;margin-bottom: 0px;">

                                <p style = "text-align: justify;font-weight: bold;" class=""><?php echo $achievement->title;?></p> 
                                Published on : <?php echo date('Y-m-d',strtotime($achievement->created_on));?>
                                <br>
                <span class="pull-left event-image-box" >
                    <img class=" img-responsive guid" src="<?php echo base_url();?><?php echo $achievement->image;?>" style = "padding: 4px;
line-height: 1.42857143;background-color: #fff;border: 1px solid #ddd;width:100%;display:inline-block;height:auto;" alt="" />
                    <!--                    <img src="media/imgAll/15-11-2017-1510737645.jpg" alt="Inaugural Program" class="img-responsive ">-->
                </span>
                                <p style = "text-align: justify;" class=""><?php echo htmlspecialchars_decode(stripslashes($achievement->details));?></p>
                                <br>
                                <!-- <div class="row">
                                    <div class="col-md-4">
                                        <p style = "text-align: justify;" class=""><?php echo $news_events->created_on;?></p>
                                    </div>
                                    <div class="col-md-8 ">
                                        <p style = "text-align: right;" class="" ><strong><?php echo $news_events->name;?></strong></p>
                                        <p style = "text-align: right; line-height: 0px;" class="" ><strong><?php echo $news_events->designation;?></strong></p>
                                    </div>
                                </div> -->



                                <br>
                                </div>


                        <?php }} ?>


                </div>

                <?php $this->load->view('Layouts/right_sidebar_for_notice');?>




                </div>





        </div>
    </section>






<?php $this->load->view('Layouts/footer');?>









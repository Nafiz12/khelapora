<?php $this->load->view('Layouts/header');?>



    <section id="content">


        <div class="container">


            <div class="row" style = "text-align: justify;">
                <div class="col-md-8 info-blocks text-center"  style = "height:599px;">
                   

                    <!-- ==================== for showing details spech ==================================-->



                    <?php if(isset($get_spech_details)){foreach($get_spech_details as $get_spech){?>

 <div class="panel-heading box-title white-bg" style="width: 104%;
            margin-left: -15px;background-color:#25708b;color:white; padding: 8px 10px 9px 15px;"><?php echo $get_spech->headline;?></div>
                            <div class="row achievement-box" style = "text-align:justify;margin-top:30px; padding:30px;margin-bottom: 0px;">
				<span class="pull-left event-image-box">
                    <img class=" img-responsive guid" src="<?php echo base_url();?><?php echo $get_spech->image;?>" style = "padding: 4px;
line-height: 1.42857143;background-color: #fff;border: 1px solid #ddd;width:50%;height:auto;" alt="" />
                    <!--					<img src="media/imgAll/15-11-2017-1510737645.jpg" alt="Inaugural Program" class="img-responsive ">-->
				</span>
                                <p style = "text-align: justify;" class=""><?php echo htmlspecialchars_decode(stripslashes($get_spech->spech));?></p>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p style = "text-align: justify;margin-left:20%" class=""><?php echo $get_spech->created_on;?></p>
                                    </div>
                                    <div class="col-md-8 ">
                                        <p style = "text-align: right;" class="" ><strong><?php echo $get_spech->name;?></strong></p>
                                        <p style = "text-align: right; line-height: 0px;" class="" ><strong><?php echo $get_spech->designation;?></strong></p>
                                    </div>
                                </div>



                                <br>
                                </div>


                        <?php }} ?>


                </div>

                <?php $this->load->view('Layouts/right_sidebar_for_notice');?>




                </div>





        </div>
    </section>






<?php $this->load->view('Layouts/footer');?>
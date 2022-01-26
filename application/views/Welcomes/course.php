<?php $this->load->view('Layouts/header');?>



    <section id="content">


        <div class="container">


            <div class="row" style = "text-align: justify;">
                <div class="col-md-8 info-blocks text-center"  style = "height:599px;">
                   

                    <!-- ==================== for showing details spech ==================================-->



                    <?php if(isset($course_data)){foreach($course_data as $course){?>

 <div class="panel-heading box-title white-bg" style="width: 104%;
            margin-left: -15px;background-color:#DEEAE8; padding: 8px 10px 9px 15px;"><?php echo $course->headline;?></div>
                            <div class="row achievement-box" style = "text-align:justify;margin-top:30px; padding:30px;margin-bottom: 0px;">
				
                                <p style = "text-align: justify;" class=""><?php echo htmlspecialchars_decode(stripslashes($course->details));?></p>
                                <br>
                                



                                <br>
                                </div>


                        <?php }} ?>


                </div>

                 <?php $this->load->view('Layouts/right_sidebar_for_notice');?>




                </div>





        </div>
    </section>






<?php $this->load->view('Layouts/footer');?>
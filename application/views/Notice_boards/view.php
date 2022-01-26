<?php $this->load->view('Layouts/header');?>



    <section id="content">


        <div class="container">

            <div class="row" style = "text-align: justify;">
                <div class="col-md-8 info-blocks text-center"  style = "min-height:699px;">
                    <div class="panel-heading box-title white-bg" style="width: 104%;
            margin-left: -15px;background-color:#25708b;color:white; padding: 8px 10px 9px 15px;">বিজ্ঞপ্তি</div>

                    <!-- ==================== for showing details spech ==================================-->

<?php if(isset($notice)){  ?>

                <object data="<?php echo base_url();?>lib/images/<?php echo $notice;?>" type="application/pdf" width="750" height="600">
                    <p><b> Warning !</b>: This browser does not support PDF. Please download the PDF to view it: 
                    <a href="<?php echo base_url();?>lib/images/<?php echo $notice;?>">Download PDF</a>.</p>
                   
                </object>

    <?php  } ?>




                </div>

                <?php $this->load->view('Layouts/right_sidebar_for_notice');?>




                </div>





        </div>
    </section>






<?php $this->load->view('Layouts/footer');?>
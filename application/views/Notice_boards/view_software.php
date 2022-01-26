
    <section id="content">


        <div class="container">

            <div class="row" style = "text-align: justify;">
                <div class="col-md-12 info-blocks text-center"  style = "min-height:699px;">
                   

                    <!-- ==================== for showing details spech ==================================-->

<?php if(isset($notice)){  ?>

                <object data="<?php echo base_url();?>lib/images/<?php echo $notice;?>" type="application/pdf" width="750" height="600">
                    <p><b> Warning !</b>: This browser does not support PDF. Please download the PDF to view it: 
                    <a href="<?php echo base_url();?>lib/images/<?php echo $notice;?>">Download PDF</a>.</p>
                   
                </object>

    <?php  } ?>




                </div>

             




                </div>





        </div>
    </section>






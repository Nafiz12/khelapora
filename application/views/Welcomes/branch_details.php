<?php $this->load->view('Layouts/header');?>



    <section id="content">


        <div class="container">


            <div class="row" style = "text-align: justify;">
                <div class="col-md-8 info-blocks text-center"  style = "min-height:599px;">
                   

                    <!-- ==================== for showing details spech ==================================-->



                   

 <div class="panel-heading box-title white-bg" style="width: 104%;
            margin-left: -15px;background-color:#25708b;color:white; padding: 8px 10px 9px 15px;">বিসিএস পরিক্রমার শাখা সমূহ</div>
                            <div class="row achievement-box" style = "text-align:justify;margin-top:10px; padding:10px;margin-bottom: 0px;">
                                <table class="table table-bordered">
                    <thead style ="background-color: gray;">
                        <tr style="color:white;">
                            <th style ="width: 35%;">Branch Name</th>
                            <th>Branch Address</th>
                            <th>Contact Info</th>
                        </tr>
                    </thead> 
 <?php if(isset($branches)){foreach($branches as $branch){?>
				
                    <tbody>
                        <tr >
                            <td>
                                <p style = "text-align: justify;" class=""><?php echo $branch['BranchName'];?></p>
                            </td>
                            <td>
                                <p style = "text-align: justify;" class=""><?php echo $branch['BranchAddress'];?></p>
                            </td>
                            <td>
                                <p style = "text-align: justify;" class=""><?php echo $branch['ContactNumber'];?></p>
                            </td>
                        </tr>
                    </tbody>           
               
                                
                           <?php }} ?>        

 </table>

                                <br>
                                </div>


                     


                </div>

                 <?php $this->load->view('Layouts/right_sidebar_for_notice');?>




                </div>





        </div>
    </section>






<?php $this->load->view('Layouts/footer');?>
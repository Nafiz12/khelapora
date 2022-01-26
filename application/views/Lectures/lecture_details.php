<?php $this->load->view('Layouts/header');?>

<section id="content">


    <div class="container">


        <div class="box-body">


            <table id="example1" class="table table-responsive table-bordered table-striped">
                <thead>
                    <tr>
                        <th>All lectures list</th>
                       
                        


                    </tr>
                </thead>
                <tbody>
                    
                        <tr>
                           

                            <td>
                                    <?php if(isset($lecture_list)){$i = 0;foreach($lecture_list as $lecture){ ?>
                
                
                    
                   
                            
                            <div class="col-md-4">
                                 <?php if($lecture->LectureLink != ''){ 
                               
                               $video_link = preg_replace("#.*youtube\.com/watch\?v=#","",$lecture->LectureLink); 
                               
                               ?>
                               <span><?php echo $lecture->SubjectName;?></span>
                               <iframe style = "width: 100%;height: 179px;" src="https://www.youtube.com/embed/<?php echo $video_link;?>" frameborder="0" 
                               allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
                             <span> <?php echo $lecture->LectureTitle;?></span>
                              <?php   }  ?>

                              <?php if($lecture->LectureVideo != ''){ ?> 
                              
                             <span> <?php echo $lecture->SubjectName;?></span>
                               <video width ="100%" controls>
                                   <source src="<?php echo base_url();?><?php echo $lecture->LectureVideo;?>" type="video/mp4">
                               </video><br>
                                <span> <?php echo $lecture->LectureTitle;?></span>
                             

                              <?php } ?>
                           



                        <br>
                    </div>
                <?php }} ?>

                          </td>
                         

                      </tr>

                 



              </table>
          </div>





      </div>
  </section>


  <?php $this->load->view('Layouts/footer');?>
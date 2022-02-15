<style>
    body {
        background-image:url("../../lib/images/backgroupImage.png");
        background-size:500px ;
        background-repeat: repeat;
        background-color: #cccccc;
    }
</style>

<?php $this->load->view('Layouts/header');?>

<section id="content">


        <div class="container">
             <div class="row">
                <div class="col-md-10 col-md-offset-1">

            <div class="box-body">

                              
                            <table id="example1" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    
                                    <th>Title</th>
                                   <th>UploadDate </th>

                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($notice_board_details) && !empty($notice_board_details)) { foreach($notice_board_details as $notice_board){ ?>
                                <tr>
                                    <td><?php echo $notice_board->id;?></td>

                                    
                                    <td><?php echo $notice_board->title;?></td>
                                    <td><?php echo $notice_board->created_on;?></td>
                                     
                                    </td>
                                   
                                    <td class="text-center">
                                        <?php

                                        echo anchor('index.php/Notice_boards/view/' . $notice_board->description, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit','target'=>'_blank')).'&nbsp';
                                        

                                        ?>




                                    </td>
                                </tr>

                                    <?php } } ?>


                                </tbody>



                            </table>
                        </div>
                    </div>
                </div>





        </div>
    </section>


<?php $this->load->view('Layouts/footer');?>
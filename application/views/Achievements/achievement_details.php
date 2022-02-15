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
                                    <th>Image </th>
                                    <th>Title</th>
                                    <th>Details</th>

                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($achievement_details) && !empty($achievement_details)) { foreach($achievement_details as $achievement_detail){ ?>
                                <tr>
                                    <td><?php echo $achievement_detail->id;?></td>

                                    <td><img class="img-circle img-responsive" src="<?php echo base_url();?><?php echo $achievement_detail->image;?>" width="100" height="100"></td>
                                    <td><?php echo $achievement_detail->title;?></td>
                                    <td><?= substr($achievement_detail->details, 0, 255) . '...' ?>
                                        
                                    </td>
                                    <?php  $str = $achievement_detail->image; $data = explode("/",$str) ; ?>

                                    <td class="text-center">
                                        <?php

                                        echo anchor('index.php/Welcomes/show_achievement_details/' . $achievement_detail->id, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                        

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
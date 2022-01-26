

                        <!-- /.box-header -->
                        <div class="box-body">

                                <div id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Lectures/add" class="btn btn-primary" style = "text-decoration: none;">Add New </a> </div>
                            <table id="example1" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Video </th>
                                    <th>Links</th>
                                    

                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($achievements_list) && !empty($achievements_list)) { foreach($achievements_list as $achievements){ ?>
                                <tr>
                                    <td><?php echo $achievements->LectureId;?></td>
                                    <td>
                                        <?php echo $achievements->LectureTitle;?>

                                    </td>

                                    <td><img class="img-circle img-responsive" src="<?php echo base_url();?><?php echo $achievements->LectureVideo;?>" width="100" height="100"></td>
                                    <td>
                                        <?php echo $achievements->LectureLink;?>

                                    </td>
                                    
                                    <td class="text-center">
                                        <?php
                                        // $name = substr($achievements->LectureVideo,0,20);

//                                        echo anchor('index.php/Achievements/view/' . $achievements->id, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                        echo anchor('index.php/Lectures/edit/' . $achievements->LectureId, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                        echo anchor('index.php/Lectures/delete/' . $achievements->LectureId, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


                                        ?>


<!--                                        <a href = "--><?php //echo base_url();?><!--index.php/Achievements/edit/--><?php //echo $achievements->id;?><!--" style = "border-radius:50px;" class="btn btn-info btn-sm">Edit</a>-->
<!--                                        <a onclick="return confirm('are you sure you want to delete this content ?');"-->
<!--                                           href="--><?php //echo base_url();?><!--index.php/Achievements/delete/--><?php //echo $achievements->id;?><!--/--><?php // print_r ($data[2]); ?><!--" style = "border-radius:50px;" class="btn btn-danger btn-sm">Delete</a>-->



                                    </td>
                                </tr>

                                    <?php } } ?>



                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php $this->load->view('Layouts/admin_footer'); ?>
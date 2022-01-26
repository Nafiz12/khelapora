

                        <!-- /.box-header -->
                        <div class="box-body">

                                <div id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Achievements/add" class="btn btn-primary" style = "text-decoration: none;">Add New </a> </div>
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
                                    <?php if(isset($achievements_list) && !empty($achievements_list)) { foreach($achievements_list as $achievements){ ?>
                                <tr>
                                    <td><?php echo $achievements->id;?></td>

                                    <td><img class="img-circle img-responsive" src="<?php echo base_url();?><?php echo $achievements->image;?>" width="100" height="100"></td>
                                    <td>
                                        <?php echo $achievements->title;?>
<!--                                        --><?php
//                                        $sorten_spech_title= $achievements->title;
//                                        $count_words_title=str_word_count($sorten_spech_title,true);
//                                        $final_spech_title = join(' ',array_slice($count_words_title,0,10));
//                                        echo $final_spech_title;
//                                        ?>

                                    </td>
                                    <td>
                                        <?= substr($achievements->details, 0, 255) . '...' ?>
                                    </td>
                                    <?php  $str = $achievements->image; $data = explode("/",$str) ; ?>

                                    <td class="text-center">
                                        <?php
//                                        echo anchor('index.php/Achievements/view/' . $achievements->id, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                        echo anchor('index.php/Achievements/edit/' . $achievements->id, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                        echo anchor('index.php/Achievements/delete/' . $achievements->id, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


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
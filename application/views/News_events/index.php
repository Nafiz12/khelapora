

                        <!-- /.box-header -->
                        <div class="box-body">

                                <div id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/News_events/add" class="btn btn-primary" style = "text-decoration: none;">Add New </a> </div>
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
                                    <?php if(isset($events_list) && !empty($events_list)) { foreach($events_list as $events){ ?>
                                <tr>
                                    <td><?php echo $events->id;?></td>

                                    <td><img class="img-circle img-responsive" src="<?php echo base_url();?><?php echo $events->image;?>" width="100" height="100"></td>
                                    <td><?php echo $events->title;?></td>
                                    <td><?= substr($events->details, 0, 255) . '...' ?>
                                        
                                    </td>
                                    <?php  $str = $events->image; $data = explode("/",$str) ; ?>

                                    <td class="text-center">
                                        <?php
//                                        echo anchor('index.php/News_events/view/' . $events->id, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                        echo anchor('index.php/News_events/edit/' . $events->id, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                        echo anchor('index.php/News_events/delete/' . $events->id.'/'.$events->image, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


                                        ?>




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
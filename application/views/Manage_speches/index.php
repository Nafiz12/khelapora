

                        <!-- /.box-header -->
                        <div class="box-body">

                                <div id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Manage_speches/add" class="btn btn-primary" style = "text-decoration: none;">Add New Spech</a> </div>
                            <table id="example1" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image </th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Spech</th>

                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($spech_list) && !empty($spech_list)) { foreach($spech_list as $spech){ ?>
                                <tr>
                                    <td><?php echo $spech->id;?></td>
                                    <td><img class="img-circle img-responsive" src="<?php echo base_url();?><?php echo $spech->image;?>" width="100" height="100"></td>
                                    <td><?php echo $spech->name;?></td>
                                    <?php  $str = $spech->image; $data = explode("/",$str) ; ?>
                                    <td> <?php echo $spech->designation;?></td>
                                    <td> <?= substr($spech->spech, 0, 100) . '...' ?></td>



                                    <td class="text-center">
                                        <?php
//                                        echo anchor('index.php/Manage_speches/view/' . $notice->description, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('target'=>"_blank",'title' => 'edit', 'class' => 'edit')).'&nbsp';
                                        echo anchor('index.php/Manage_speches/edit/' . $spech->id, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                        echo anchor('index.php/Manage_speches/delete/' . $spech->id, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


                                        ?>
<!--                                        <a href = "--><?php //echo base_url();?><!--index.php/Manage_speches/edit/--><?php //echo $spech->id;?><!--" style = "border-radius:50px;" class="btn btn-info btn-sm">Edit</a>-->
<!--                                        <a onclick="return confirm('are you sure you want to delete this content ?');"-->
<!--                                           href="--><?php //echo base_url();?><!--index.php/Manage_speches/delete/--><?php //echo $spech->id;?><!--/--><?php // print_r ($data[2]); ?><!--" style = "border-radius:50px;" class="btn btn-danger btn-sm">Delete</a>-->



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
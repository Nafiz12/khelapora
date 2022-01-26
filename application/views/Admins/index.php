

                        <!-- /.box-header -->
                        <div class="box-body">

                            <div id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Admins/add" class="btn btn-primary" style = "text-decoration: none;">Add New </a> </div>
                            <table id="" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
<!--                                    <th>Image </th>-->
                                    <th>Username</th>
                                    <th>Fullname</th>

                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($admin_list) && !empty($admin_list)) { foreach($admin_list as $admin){ ?>
                                <tr>
                                    <td><?php echo $admin->id;?></td>
<!--                                    <td><img class="img-circle img-responsive" src="--><?php //echo base_url();?><!----><?php //echo $admin->image;?><!--" width="100" height="100"></td>-->
                                    <td><?php echo $admin->username;?></td>
                                    <td> <?php echo $admin->fullname;?></td>

                                    <td class="text-center">
                                       <?php  if($this->session->userdata('user_id') == $admin->id){
                                           echo anchor('index.php/Admins/view/' . $admin->id, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                           echo anchor('index.php/Admins/edit/' . $admin->id, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                           echo anchor('index.php/Admins/delete/' . $admin->id, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));

                                        }else{}?>

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
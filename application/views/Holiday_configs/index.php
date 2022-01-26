

                        <!-- /.box-header -->
                        <div class="box-body">

                            <div id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Employee_designations/add" class="btn btn-primary" style = "text-decoration: none;">Add New</a> </div>
                            <table id="example1" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Designation Name </th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($designation_list) && !empty($designation_list)) { foreach($designation_list as $designation){ ?>
                                <tr>
                                    <td><?php echo $designation->id;?></td>
                                    <td><?php echo $designation->designation_name;?></td>

                                    <td class="text-center">

                                        <a href = "<?php echo base_url();?>index.php/Employee_designations/edit/<?php echo $designation->id;?>" style = "border-radius:50px;" class="btn btn-info btn-sm">Edit</a>
                                           <a href = "<?php echo base_url();?>index.php/Employee_designations/permission/<?php echo $designation->id;?>" style = "border-radius:50px;" class="btn btn-info btn-sm">Permission</a>
                                        <a onclick="return confirm('are you sure you want to delete this user ?');"
                                           href="<?php echo base_url();?>index.php/Employee_designations/delete/<?php echo $designation->id;?>" style = "border-radius:50px;" class="btn btn-danger btn-sm">Delete</a>

                                    </td>
                                </tr>

                                    <?php }  } ?>


                                </tbody>
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
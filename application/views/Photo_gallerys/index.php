<?php $this->load->view('Layouts/admin_header'); ?>


    <!-- /.box-header -->
    <div class="box-body">

        <div class="alert alert-primary text-right"><a href="<?php echo base_url(); ?>index.php/Feature_slideshows/add"
                                                       class="btn btn-primary" style="text-decoration: none;">Add New
                Slideshow</a></div>


        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Image</th>
                <th>Upload Date</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($slideshow_list) && !empty($slideshow_list)) {
                foreach ($slideshow_list as $slideshow) { ?>
                    <tr>
                        <td><?php echo $slideshow->id; ?></td>
                        <td><?php echo $slideshow->title; ?></td>
                        <td><img class="img-circle img-responsive"
                                 src="<?php echo base_url(); ?>lib/images/<?php echo $slideshow->name; ?>" width="100"
                                 height="100"></td>
                        <td><?php echo $slideshow->created_on; ?></td>
                        <td class="text-center">

                            <a href="<?php echo base_url(); ?>index.php/Feature_slideshows/edit/<?php echo $slideshow->id; ?>"
                               style="border-radius:50px;" class="btn btn-info btn-sm">Edit</a>
                            <a onclick="return confirm('are you sure you want to delete this user ?');"
                               href="<?php echo base_url(); ?>index.php/Feature_slideshows/delete/<?php echo $slideshow->id;?><?php echo "/".$slideshow->name; ?>"
                               style="border-radius:50px;" class="btn btn-danger btn-sm">Delete</a>


                        </td>

                    </tr>

                <?php }
            } ?>


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
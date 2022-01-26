
    <div class="box-body">

        <div class="alert alert-primary text-right"><a href="<?php echo base_url(); ?>index.php/Feature_slideshows/add"
                                                       class="btn btn-primary" style="text-decoration: none;">Add New
                Slideshow</a></div>


        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>

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

                        <td><?php echo $slideshow->created_on; ?></td>
                        <td class="text-center">
                            <?php
                            echo anchor('index.php/Feature_slideshows/view/' . $slideshow->id.'/'.$slideshow->name, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                            echo anchor('index.php/Feature_slideshows/edit/' . $slideshow->id, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                            echo anchor('index.php/Feature_slideshows/delete/' . $slideshow->id.'/'.$slideshow->name, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


                            ?>
                            
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
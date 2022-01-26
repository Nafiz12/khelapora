


    <!-- /.box-header -->
    <div class="box-body">

        <div class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Notice_boards/add" class="btn btn-primary" style = "text-decoration: none;">Add New Notice</a> </div>


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
            <?php if(isset($notice_list) && !empty($notice_list)) { foreach($notice_list as $notice){ ?>
                <tr>
                    <td><?php echo $notice->id;?></td>
                    <td><?php echo $notice->title;?></td>
                    <td><?php echo $notice->created_on ;?></td>
                    <td class="text-center">

                        <?php
                        echo anchor('index.php/Notice_boards/view_software/' . $notice->description, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('target'=>"_blank",'title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('index.php/Notice_boards/edit/' . $notice->id, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('index.php/Notice_boards/delete/' . $notice->id, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


                        ?>
<!--                        <a href = "--><?php //echo base_url();?><!--index.php/Notice_boards/edit/--><?php //echo $notice->id;?><!--" style = "border-radius:50px;" class="btn btn-info btn-sm">Edit</a>-->
<!--                        <a onclick="return confirm('are you sure you want to delete this notice ?');"-->
<!--                           href="--><?php //echo base_url();?><!--index.php/Notice_boards/delete/--><?php //echo $notice->id;?><!--" style = "border-radius:50px;" class="btn btn-danger btn-sm">Delete</a>-->
<!--                        <a target="_blank" href="--><?php //echo base_url();?><!--lib/images/--><?php //echo $notice->description;?><!--" style = "border-radius:50px;" class="btn btn-primary btn-sm">view</a>-->
<!--                        <a target="_blank" href="--><?php //echo base_url();?><!--index.php/Notice_boards/view/--><?php //echo $notice->description;?><!--" style = "border-radius:50px;" class="btn btn-primary btn-sm">view</a>-->
<!--                        <object data="--><?php //echo base_url();?><!--lib/images/--><?php //echo $notice->description;?><!--" type="application/pdf" width="750" height="600">-->
<!--                            alt : <a href="--><?php //echo base_url();?><!--lib/images/--><?php //echo $notice->description;?><!--">your.pdf</a>-->
<!--                        </object>-->

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
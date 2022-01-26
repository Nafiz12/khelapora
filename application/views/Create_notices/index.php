<div class="box-body">

        <div class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Create_notices/add" class="btn btn-primary" style = "text-decoration: none;">Add New </a> </div>


        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>

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
                        echo anchor('index.php/Notice_boards/view/' . $notice->description, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('target'=>"_blank",'title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('index.php/Notice_boards/edit/' . $notice->id, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('index.php/Notice_boards/delete/' . $notice->id, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


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
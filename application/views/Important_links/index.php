

<!-- /.box-header -->
<div class="box-body">

   
    <table id="example1" class="table table-responsive table-bordered table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Link</th>
            <th>Title </th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($imp_link_list) && !empty($imp_link_list)) { foreach($imp_link_list as $imp_link){ ?>
            <tr>
                <td><?php echo $imp_link['id'];?></td>
                <td><?php echo $imp_link['link'];?></td>
                <td><?php echo $imp_link['title'];?></td>

                <td class="text-center">

                    <?php
                    echo anchor('index.php/Important_links/edit/' . $imp_link['id'], img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                    echo anchor('index.php/Important_links/delete/' . $imp_link['id'], img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


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
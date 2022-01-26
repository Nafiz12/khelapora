

<!-- /.box-header -->
<div class="box-body">

    <div id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Organization_configurations/add" class="btn btn-primary" style = "text-decoration: none;">Config Organization</a> </div>
    <table id="example1" class="table table-responsive table-bordered table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Image </th>
            <th>Org. Name</th>
            <th>Org. Slogan</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($org_config_list) && !empty($org_config_list)) { foreach($org_config_list as $org_config){ ?>
            <tr>
                <td><?php echo $org_config->id;?></td>
                <td><?php echo $org_config->title;?></td>
                <td><img class="img-circle img-responsive" src="<?php echo base_url();?><?php echo $org_config->image;?>" width="100" height="100"><?php echo $org_config->image;?></td>
                <td><?php echo $org_config->organization_name;?></td>
                <td> <?php echo $org_config->organization_slogan;?></td>

                <td class="text-center">

                    <?php
                    echo anchor('index.php/Organization_configurations/edit/' . $org_config->id, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                    echo anchor('index.php/Organization_configurations/delete/' . $org_config->id, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


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
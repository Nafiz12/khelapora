<title><?php echo $title;?></title>

<?php
$role_options = array('' => "- Select Role -");
foreach ($user_roles as $row1) {
    $role_options[$row1['id']] = ($row1['role_name']);
}
?>


<div class="box-body">
    <?php echo form_open('index.php/Users/index',array('id'=>'search_form','name'=>'search_form','method'=>"GET")); ?>
    <table class="filter" style="width: 100%">
        <tr>
            <td width="10%"><?php  echo form_dropdown('role_id', $role_options, set_value('role_id', isset($session_data['role_id'])?$session_data['role_id']:""),'id="role_id" class = "form-control"'); ?></td>
            <td width="60%"><input id="submit" class="btn btn-primary " type="submit" value="Search" name="submit"></td>
            <td width="10%" id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Users/add" class="btn btn-primary" style = "text-decoration: none;">Add New </a> </td>
        </tr>
    </table>
    <?php echo form_close();?>
</div>

        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Registration Date</th>
                <th>User Name</th>
                <th>Status</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $a=1;
            foreach($list as $r){ ?>
                <tr>
                    <td><?php echo $a; ?></td>
                    <td><?php echo $r->name; ?></td>
                    <td><?php echo $r->reg_date; ?></td>
                    <td><?php echo $r->user_name; ?></td>
                    <td><?php echo $r->status; ?></td>
                    <td><?php echo $r->role_name; ?></td>
                    <td>

                        <?php
                        
                        if($r->role_name != "Super Admin"){
                        //                        echo anchor('index.php/Exams/edit/' . $r->ExamId, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('index.php/Users/edit/' . $r->id, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('index.php/Users/delete/' . $r->id, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));
                          
                        }
                        
                        ?>

                    </td>
                </tr>
                <?php
                $a++;
            }

            ?>
            </tbody>
        </table>

<div align="center" id="paging"><?php echo $this->pagination->create_links(); ?></div>
<!--                        </div>-->
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
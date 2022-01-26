

<title><?php echo $title;?></title>
<style>

</style>
<?php
$Designation_options = array('' => "- Select Designation -");
foreach ($designation_list as $row) {
    $Designation_options[$row->id] = ($row->designation_name);
}


?>
    <div class="box-body">


        <?php echo form_open('index.php/Employees/index',array('id'=>'search_form','name'=>'search_form','method'=>"GET")); ?>
        <table class=" " >
            <tr>
                <td width="10%"><?php echo form_dropdown('cbo_designation', $Designation_options,set_value('cbo_designation',isset($session_data['cbo_designation'])?$session_data['cbo_designation']:""),array('class'=>'form-control')); ?></td>
               <td width="10%"><?php echo form_input(array('type' => 'text','name' => 'cbo_employee_name','style'=>'margin-left:20px;','class' =>'form-control','value' => set_value('cbo_employee_name',isset($session_data['cbo_employee_name'])?$session_data['cbo_employee_name']:"") , 'id'=>'cbo_employee_name')) ;?></td>
                <td width="20%"><?php echo form_button(array('name' => 'submit', 'id' => 'button', 'type' => 'submit','style'=>'margin-left:35px;', 'class' => 'btn btn-primary ', 'content' => 'Search')); ?></td>
                 <td width="10%" id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Employees/add" class="btn btn-primary" style = "text-decoration: none;">Add New </a> </td>
            </tr>
        </table>
        <?php echo form_close();?>
    </div>
    <div class="panel-body pn">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Designation</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach($list as $row){?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->employee_name; ?></td>
                    <td><?php echo $row->designation_name; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><?php echo $row->contact_no; ?></td>
                    <td>

                        <?php
                        echo anchor('index.php/Employees/view/' . $row->id, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('index.php/Employees/edit/' . $row->id, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('index.php/Employees/delete/' . $row->id, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


                        ?>

                    </td>
                </tr>
                <?php

            }

            ?>
            </tbody>
        </table>

<div align="center" id="paging"><?php echo $this->pagination->create_links(); ?></div>
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

<?php
$class_options = array('' => "---- Select Class ----");
foreach ($class_list as $row1) {
    $class_options[$row1->id] = ($row1->class_name);
}

$section_options= array(''=>'--Select Section --');
$roll_options= array(''=>'--Select Section --');

?>
                        <!-- /.box-header -->
                        <div class="box-body">
                                <?php echo form_open('index.php/Student_admissions/index',array('id'=>'search_form','name'=>'search_form','method'=>"GET")); ?>
                                <table class="filter" style="width: 100%">
                                    <tr>
                                        <td width="10%"><?php  echo form_dropdown('cbo_class', $class_options, set_value('cbo_class', isset($session_data['cbo_class'])?$session_data['cbo_class']:""),'id="ClassId" class = "form-control"'); ?></td>
                                        <td width="10%"><?php  echo form_dropdown('cbo_section', $section_options, set_value('cbo_section', isset($session_data['cbo_section'])?$session_data['cbo_section']:""),'id="SectionId" class = "form-control" '); ?></td>
                                        <td width="10%"><?php  echo form_dropdown('cbo_rollno', $roll_options, set_value('cbo_rollno', isset($session_data['cbo_rollno'])?$session_data['cbo_rollno']:""),'id="RollId" class = "form-control" '); ?></td>
<!--                                        <td width="10%">--><?php // echo form_dropdown('cbo_year', $year_list, set_value('cbo_year', isset($session_data['cbo_year'])?$session_data['cbo_year']:""),'id="cbo_year" class = "form-control"'); ?><!--</td>-->
                                        <td width="60%"><input id="submit" class=" btn btn-hover btn-primary  filter_search_buttons" type="submit" value="Search" name="submit"></td>
                                        <td width="10%" id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Student_admissions/add" class="btn btn-primary" style = "text-decoration: none;">Add New </a> </td>
                                    </tr>
                                </table>
                                <?php echo form_close();?>
                            </div>

<!--                            <div id = "#example1_filter" class="alert alert-primary text-right"><a href="--><?php //echo base_url();?><!--index.php/Student_admissions/add" class="btn btn-primary" style = "text-decoration: none;">Add New Admin</a> </div>-->
                            <table id="" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Form No </th>
                                    <th>Name</th>

                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Roll No</th>

                                    <th>Contact No</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($student_list) && !empty($student_list)) { foreach($student_list as $student){ ?>
                                <tr>
                                    <td><?php echo $student->id;?></td>
                                    <td> <?php echo $student->form_no;?></td>
                                    <td><?php echo $student->student_name;?></td>
                                    <td> <?php echo $student->class_name;?></td>
                                    <td> <?php echo $student->section_name;?></td>
                                    <td> <?php echo $student->roll_no;?></td>

                                    <td> <?php echo $student->contact_no;?></td>


                                    <td class="text-center">

                                        <?php
                                        echo anchor('index.php/Student_admissions/view/' . $student->id .'/'. $student->section_name, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                        
                                        echo anchor('index.php/Student_admissions/edit/' . $student->id , img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                        echo anchor('index.php/Student_admissions/delete/' . $student->id .'/'.$student->image, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


                                        ?>


                                    </td>
                                </tr>

                                    <?php } } ?>



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
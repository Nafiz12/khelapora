<title><?php echo $title;?></title>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $( "#datepicker" ).datepicker();
        //get_class_list();
        get_section_list();
        $("#CourseId").change(function(){
            get_section_list();
        });
    });

    function get_section_list(){
        var selected_class_id=$("#cbo_class").val();
        var selected_SectionId = "<?php echo isset($session_data['cbo_section'])?$session_data['cbo_section']:''?>";
        $.post("<?php echo site_url('config_sections/ajax_for_get_section_list_by_class') ?>", {class_id: selected_class_id},
            function(data){
                $('#status').html("");
                $('#cbo_section').empty();
                if( data.status == 'failure' ){
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '---Select Section/Batch---' + '</option>');
                }
                else	{
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '---Select Section/Batch---' + '</option>');
                    for(var i = 0; i < data.SectionId.length; i++){
                        if(selected_SectionId==data.SectionId[i]){
                            $('#cbo_section').append('<option value = \"' + data.SectionId[i] + '\" selected="selected">' + data.SectionName[i] + '</option>');
                        }else {
                            $('#cbo_section').append('<option value = \"' + data.SectionId[i] + '\">' + data.SectionName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }
</script>
<style>
    #spy7 {
        margin-bottom: 0px;
    }
    #paging {
        background: #ccc url("<?php echo base_url(); ?>media/silk/ui-bg_highlight-soft_75_cccccc_1x100.png") repeat-x scroll 50% 50%;
        border: 1px solid #aaa;
        border-radius: 0 0 4px 4px;
        float: left;
        font-family: verdana;
        font-size: 12px;
        height: 47px;
        padding: 12px 20px 0 10px;
        text-align: left;
        width: 100%;
    }
    #paging strong {
        background: #ccc none repeat scroll 0 0;
        border: 1px solid #fff;
        border-radius: 0 6px;
        color: #4d4a4a;
        font-family: Verdana,Arial,Helvetica,sans-serif;
        font-size: 12px;
        font-weight: bolder;
        padding: 2px 5px 5px;
        text-decoration: none;
    }

    #paging a {
        background: #fbfbfb none repeat scroll 0 0;
        border: 1px solid #b0b0b0;
        border-radius: 0 6px;
        color: #212121;
        font-family: Verdana,Arial,Helvetica,sans-serif;
        font-size: 12px;
        padding: 2px 5px 5px;
        text-decoration: none;
    }
    #paging a:hover {
        background: #bbb none repeat scroll 0 0;
        border: 1px solid #dedede;
        color: #000;
    }
    .filter input {
        border: 1px solid #cecece;
        border-radius: 0 0 8px;
        font-family: "Trebuchet MS",Verdana,Arial,Helvetica,sans-serif;
        font-size: 11px;
        margin: 0 0 0 10px;
        padding: 1px 6px 1px 2px;
        width: 120px;
        height: 24px;
    }
    .filter select {
        border: 1px solid #cecece;
        border-radius: 0 0 8px;
        font-family: "Trebuchet MS",Verdana,Arial,Helvetica,sans-serif;
        font-size: 11px;
        margin: 0 0 0 10px;
        padding: 1px 6px 1px 2px;
        width: 120px;
        height: 24px;
    }
</style>
<?php
$batch_options = array('' => "---- Select Batch ----");
foreach ($batch_list as $row1) {
    $batch_options[$row1->BatchId] = ($row1->BatchName);
}
$course_options = array('' => "---- Select Course ----");
foreach ($class_list as $row1) {
    $course_options[$row1->ClassId] = ($row1->ClassName);
}
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}


$counter=$this->uri->segment(3);
if(!isset($counter) || $counter==''){
    $counter=0;
}
$section_options= array(''=>'--Select Section/Batch --');
$location_data=$this->session->userdata('system.branch');
?>
<div class="panel" id="spy7">
    <div class="panel-heading1">
        <?php echo form_open('students/index',array('id'=>'search_form','name'=>'search_form','method'=>"GET")); ?>
        <div class="table-responsive">
        <table class="filter" style="width: 100%; height: 39px;">
            <tr>
                <td width="10%">
                    <?php
                    if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                        echo form_dropdown('BranchId', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:""),'id="BranchId"');
                    }else {
                        echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:$location_data['BranchId']),' disabled="disabled" id="BranchId"');
                        echo form_input(array('name' => 'BranchId', 'id' => 'BranchId', 'maxlength' => '4', 'type' => 'hidden'), set_value('BranchId', (isset($session_data['BranchId']) ? $session_data['BranchId'] : $location_data['BranchId'])));
                    }
                    ?>
                </td>
                
                <td width="10%"><?php  echo form_dropdown('CourseId', $course_options, set_value('CourseId', isset($session_data['CourseId'])?$session_data['CourseId']:""),'id="CourseId"'); ?></td>
                <td width="10%"><?php  echo form_dropdown('BatchId', $batch_options, set_value('BatchId', isset($session_data['BatchId'])?$session_data['BatchId']:""),'id="BatchId"'); ?></td>
                <td width="10%"><input type="text" id="StudentName" class="form-control" placeholder="Name/Code" name="StudentName" value="<?php echo isset($session_data['StudentName'])?$session_data['StudentName']:""; ?>"></td>
                <td width="10%"><input type="text" id="Contact" class="form-control" placeholder="Contact Number" name="Contact" value="<?php echo isset($session_data['Contact'])?$session_data['Contact']:""; ?>"></td>
                <td width="60%"><input id="submit" class="filter_search_buttons" type="submit" value="Search" name="submit"></td>
                <?php
                if($location_data['IsHeadOffice'] != 1){
                    ?>
                    <td width="10%"><button class="btn active btn-alert btn-block" id="add_new_function" type="button">Add New &nbsp; <span class="glyphicons glyphicons-circle_plus"></span></button></td>
                    <?php
                }
                ?>
            </tr>
        </table>
    </div>
        <?php echo form_close();?>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr style="background-color: #ebf4f7;">
                <th>SL</th>
                <th>Student Name</th>
                <th>Student Code</th>
                
                <th>Batch</th>
                <th>Roll</th>
                <th>Father's Name</th>
                <th>Contact Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $a=$counter+1;
            foreach($list as $r){ ?>
                <tr>
                    <td style="background-color: #ebf4f7;" ><?php echo $a; ?></td>
                    <td><?php echo $r->StudentName; ?></td>
                    <td><?php echo $r->StudentCode; ?></td>
                    
                    <td><?php echo $r->BatchName; ?></td>
                    <td><?php echo $r->RollNo; ?></td>
                    <td><?php echo $r->FathersName; ?></td>
                    <td><?php echo $r->Contact; ?></td>
                    <td>
                        <?php if($r->Status == 'A'){
                            $image_path =  base_url() . 'media/assets/img/icons/active.png';
                            echo "<img src='$image_path' title='Active'>";
                        }elseif($r->Status == 'I'){
                            $image_path =  base_url() . 'media/assets/img/icons/inactive.png';
                            echo "<img src='$image_path' title='Active'>";
                        }  ?>
                    </td>
                    <td>
                        <?php
                        echo anchor('students/view/' . $r->StudentId, img(array('src' => base_url() . 'media/assets/img/icons/view1.gif', 'border' => '0', 'alt' => 'View')), array('title' => 'view', 'class' => 'view')).'&nbsp';
                        echo anchor('students/edit/' . $r->StudentId, img(array('src' => base_url() . 'media/assets/img/icons/edit1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('students/delete/' . $r->StudentId, img(array('src' => base_url() . 'media/assets/img/icons/delete1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This Type Information')")).'&nbsp';
                        // echo anchor('report_student_dues/view/' . $r->StudentId, img(array('src' => base_url() . 'media/assets/img/icons/fees.png', 'border' => '0', 'alt' => 'Payment')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                        ?>
                    </td>
                </tr>
                <?php
                $a++;
            }

            ?>
            </tbody>
        </table>
    </div>
</div>
<div align="center" id="paging"><?php echo $this->pagination->create_links(); ?></div>
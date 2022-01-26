<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $( "#Date" ).datepicker();
       
        get_student_list();
        $("#cbo_class").change(function(){
            get_section_list();
        });
        $("#cbo_section").change(function(){
            get_student_list();
        });
    });


    function get_student_list(){
        var selected_class_id=$("#cbo_class").val();
        var selected_section_id=$("#cbo_section").val();
        $.post("<?php echo site_url('students/ajax_for_get_student_list_by_class_and_section') ?>", {class_id: selected_class_id, section_id: selected_section_id},
            function(data){

                $('#status').html("");
                $('#StudentId').empty();
                var selected_StudentId = "<?php echo isset($session_data['StudentId'])?$session_data['StudentId']:''?>";
                //  alert(selected_StudentId);
                if( data.status == 'failure' ){
                    $('#StudentId').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                }
                else	{
                    $('#StudentId').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                    for(var i = 0; i < data.StudentId.length; i++){
                        if(selected_StudentId==data.StudentId[i]){
                            $('#StudentId').append('<option value = \"' + data.StudentId[i] + '\" selected="selected">' + data.StudentName[i] + '</option>');
                        }else {
                            $('#StudentId').append('<option value = \"' + data.StudentId[i] + '\">' + data.StudentName[i] + '</option>');
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
$class_options = array('' => "---- Select Class ----");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}

// $book_list_options = array('' => "---- Select Book ----");
// foreach ($book_details_list as $row1) {
//     $book_list_options[$row1['BookDetailsId']] = ($row1['BookName']);
// }


$section_options= array(''=>'--Select Section --');
$student_options= array(''=>'--Select Student --');

?>
<div class="panel" id="spy7">
    <div class="panel-heading1">
        <?php echo form_open('manage_library_books/index',array('id'=>'search_form','name'=>'search_form','method'=>"GET")); ?>
        <table class="filter" style="width: 100%">
            <tr>
                <td width="10%">
                   <!--  <?php  echo form_dropdown('cbo_class', $class_options, set_value('cbo_class', isset($session_data['cbo_class'])?$session_data['cbo_class']:""),'id="cbo_class"'); ?>
                         -->
                    </td>
                <td width="10%">
                   <!--  <?php  echo form_dropdown('cbo_section', $section_options, set_value('cbo_section', isset($session_data['cbo_section'])?$session_data['cbo_section']:""),'id="cbo_section"'); ?>
                         -->
                    </td>
                <td width="10%">
                  <!--   <?php  echo form_dropdown('StudentId', $student_options, set_value('StudentId', isset($session_data['StudentId'])?$session_data['StudentId']:""),'id="StudentId"'); ?>
                         -->
                    </td>
               
                <td width="60%">
                    <!-- <input id="submit" class="filter_search_buttons" type="submit" value="Search" name="submit"></td> -->
                <td width="10%"><button class="btn active btn-alert btn-block" id="add_new_function" type="button">Add New &nbsp; <span class="glyphicons glyphicons-circle_plus"></span></button></td>
            </tr>
        </table>
        <?php echo form_close();?>
    </div>
    <div class="panel-body pn">
        <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th width="2%">SL</th>
                <th width="25%">Student</th>
                <th width="25%">Course</th>
                <th width="25%">Subject</th>
                <th width="20%">Lecture Type</th>
                <th width="20%">Number </th>
                <th width="8%">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            foreach($list as $row){
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->StudentName.' - '.$row->StudentCode ?></td>
                    <td><?php echo $row->ClassName; ?></td>
                    <td><?php echo $row->SubjectName; ?></td>
                    <td><?php echo $row->TypeName; ?></td>
                    <td><?php echo $row->Number; ?></td>
                    <td class="button-column">
                        <?php
                        //echo anchor('manage_library_books/view/' . $row->ExamId.'/'.$row->Year.'/'.$row->ClassId.'/'.$row->SectionId.'/'.$row->SubjectId, img(array('src' => base_url() . 'media/assets/img/icons/view1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'view', 'class' => 'view')).'&nbsp';
                        echo anchor('manage_library_books/edit/' . $row->DistributionId, img(array('src' => base_url() . 'media/assets/img/icons/edit1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('manage_library_books/delete/' . $row->DistributionId, img(array('src' => base_url() . 'media/assets/img/icons/delete1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This Type Information')"));

                        ?>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div align="center" id="paging"><?php echo $this->pagination->create_links(); ?></div>
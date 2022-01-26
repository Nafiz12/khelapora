<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>

<script type="text/javascript"> $(window).load(function() { $('#txt_date_of_exam').glDatePicker({ dateFormat: 'yy-mm-dd' }); }); </script>


<script type="text/javascript">
    $(document).ready(function(){
        get_section_list();
        get_subject_list();
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $("#ExamId").change(function(){
            get_exam_details();
        });
        $("#ClassId").change(function(){
            get_section_list();
            get_subject_list();

        });
        $( "#SubjectId" ).change(function() {
            get_student_list();
        });
    });
    // function change_sbaValue_value(){
    //     var sbaValue = $("#sba_default_mark1").val();
    //     if(this.checked == false){
    //     $(".sba_full_mark").val(0);
    //     }else{
    //     $(".sba_full_mark").val(sbaValue);
    //     }
    // }
    // function change_objValue_value(){
    //     var objValue = $("#objective_default_mark1").val();
    //     if(this.checked == false){
    //         $(".obj_full_mark").val(0);
    //     }else{
    //         $(".obj_full_mark").val(objValue);
    //     }
    // }
    // function change_sbjValue_value(){
    //     var objValue = $("#subjective_mark1").val();
    //     if(this.checked == false){
    //         $(".sbj_full_mark").val(0);
    //     }else{
    //         $(".sbj_full_mark").val(objValue);
    //     }
    // }
    function get_exam_details(){
        var selected_exam_id=$("#ExamId").val();
        $.post("<?php echo site_url('exams/ajax_for_get_exam_information') ?>", {exam_id: selected_exam_id},
            function(data){
                $('#status').html("");
                if( data.status == 'failure' ){
                }
                else{
                    $("#HasSba").val(data.HasSba);
                    $("#HasObjective").val(data.HasObjective);
                }
            }, "json");
    }
    function calculate_total_number(index,TotalMark,SubPassMark,ObjPassMark,PraPassMark,PassMark){

        var total_mark = 0;
        var final_result = 0;
        var final_grade = '';
        var final_point = 0;
        var practical_mark = parseFloat($("#pra_mark"+index).val());
        var objective_mark = parseFloat($("#objective_mark"+index).val());
        var subjective_mark = parseFloat($("#subjective_mark"+index).val());
        if(isNaN(practical_mark) || practical_mark ==''){
            practical_mark=0;
        }
        if(isNaN(objective_mark) || objective_mark ==''){
            objective_mark=0;
        }
        if(isNaN(subjective_mark) || subjective_mark ==''){
            subjective_mark=0;
        }
        total_mark = practical_mark+objective_mark+subjective_mark;
        
        if(subjective_mark>= SubPassMark && objective_mark>=ObjPassMark && practical_mark>=PraPassMark){
                 final_result = (total_mark*100)/TotalMark;
                if(final_result>=80){
                    final_grade = 'A+';
                    final_point = 5;

                }
                else if(final_result >= 70 && final_result <80){
                     final_grade = 'A';
                     final_point = 4;
                }
                else if(final_result >= 60 && final_result <70){
                     final_grade = 'A-';
                     final_point = 3.5;
                }
                else if(final_result >= 50 && final_result <60){
                     final_grade = 'B';
                     final_point = 3;
                } 
                else if(final_result >= 40 && final_result <50){
                     final_grade = 'C';
                     final_point = 2;
                }
                else if(final_result >= PassMark && final_result <40){
                     final_grade = 'D';
                     final_point = 1;
                }
                
        }
        else{
                    
                     final_grade = 'F';
                     final_point = 0;  
            
        }
        
        $("#total_mark"+index).val(total_mark);
        $("#point"+index).val(final_point);
        $("#grade"+index).val(final_grade);

    }

    function get_section_list(){
        
        var selected_class_id=$("#ClassId").val();

        $.post("<?php echo site_url('config_sections/ajax_for_get_section_list_by_class') ?>", {class_id: selected_class_id},
            function(data){
                $('#status').html("");
                $('#SectionId').empty();
                var selected_SectionId = "<?php echo isset($result['mark_data']['SectionId'])?$result['mark_data']['SectionId']:''?>";
                if( data.status == 'failure' ){
                    $('#SectionId').append('<option value = \"' + '' + '\">' + '------Select Section/Batch------' + '</option>');
                }
                else	{
                    $('#SectionId').append('<option value = \"' + '' + '\">' + '------Select Section/Batch------' + '</option>');
                    for(var i = 0; i < data.SectionId.length; i++){
                        if(selected_SectionId==data.SectionId[i]){
                            $('#SectionId').append('<option value = \"' + data.SectionId[i] + '\" selected="selected">' + data.SectionName[i] + '</option>');
                        }else {
                            $('#SectionId').append('<option value = \"' + data.SectionId[i] + '\">' + data.SectionName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }
    function get_subject_list(){
        var ClassId=$("#ClassId").val();
        var BranchId=$("#cbo_branch").val();
        $.post("<?php echo site_url('config_subjects/ajax_for_get_subject_list_by_class') ?>", {ClassId: ClassId,BranchId:BranchId},
            function(data){
                $('#status').html("");
                $('#SubjectId').empty();
                var selected_SubjectId = "<?php echo isset($result['mark_data']['SubjectId'])?$result['mark_data']['SubjectId']:''?>";
                if( data.status == 'failure' ){
                    $('#SubjectId').append('<option value = \"' + '' + '\">' + '------Select Subject------' + '</option>');
                }
                else	{
                    $('#SubjectId').append('<option value = \"' + '' + '\">' + '------Select Subject------' + '</option>');
                    for(var i = 0; i < data.SubjectId.length; i++){
                        if(selected_SubjectId==data.SubjectId[i]){
                            $('#SubjectId').append('<option value = \"' + data.SubjectId[i] + '\" selected="selected">' + data.SubjectName[i] + '</option>');
                        }else {
                            $('#SubjectId').append('<option value = \"' + data.SubjectId[i] + '\">' + data.SubjectName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }
    function get_student_list(){
        $('#mark_information').empty();
        var selected_class_id=$("#ClassId").val();
        var selected_section_id=$("#SectionId").val();
        var ExamDate=$("#txt_date_of_exam").val();
        var examId=$("#ExamId").val();
        var subjectId=$("#SubjectId").val();
        var BranchId=$("#cbo_branch").val();
        var HasSba = $("#HasSba").val();
        var HasObjective = $("#HasObjective").val();

        $.post("<?php echo site_url('manage_marks/ajax_for_check_duplicate_entry') ?>", {class_id: selected_class_id, section_id: selected_section_id, ExamDate:ExamDate,examId:examId,subjectId:subjectId},
            function(data){
                $('#status').html("");
                $('#cbo_student').empty();
                if( data.status == 'failure' ){
                }
                else{
                    if(data.mark == 0){
                        if(selected_class_id != '' && selected_section_id!=''){
                            $.post("<?php echo site_url('students/ajax_for_get_student_list_for_manage_marks') ?>", {class_id: selected_class_id, section_id: selected_section_id,BranchId:BranchId,subjectId:subjectId},
                                function(data){
                                    $('#status').html("");
                                    $('#cbo_student').empty();
                                    if( data.status == 'failure' ){
                                        //$('#cbo_student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                                    }
                                    else{

                                        tansaction_info = '<table align="center" class="table table-bordered mbn" style="width: 100%">'
                                        if(data.TotalMark) {

                                            tansaction_info += '<tr>'
                                                +'<th width="10%">Subject</th>'
                                                +'<th width="15%">Total Marks</th>'
                                                +'<th width="15%">Sub Pass Mark</th>'
                                                +'<th width="15%">Obj Pass Mark</th>'
                                                +'<th width="15%">Pra Pass Mark</th>'
                                                +'<th width="15%">Pass Percentage</th>'

                                                +'</tr>'

                                            tansaction_info += '<tr>'
                                                + '<td align="left" id = "subject_name">' + data.SubjectName + '</td>'
                                                + '<td align="left">' + data.TotalMark + '</td>'
                                                + '<td align="left">' + data.sub_mark +'  '+ 'total marks'+' '+'('+data.SubMark+')'+'</td>'
                                                + '<td align="left">' + data.obj_mark +'  '+ 'total marks'+' '+'('+data.ObjMark+')'+ '</td>'
                                                + '<td align="left">' + data.pra_mark +'  '+ 'total marks'+' '+'('+data.PraMark+')'+ '</td>'
                                                + '<td align="left">' + data.PassMark +'%'+'</td>'

                                                + '</tr>'
                                        }

                                        tansaction_info += '</table>'
                                        
                                        tansaction_info += '<table align="center" class="table table-bordered mbn" style="width: 100%">'
                                            +'<tr>'
                                            +'<th >Roll</th>'
                                            +'<th >Student Name</th>'
                                            +'<th >Subjective</th>'
                                            +'<th >Objective</th>'
                                            +'<th >Practical</th>'
                                            +'<th >Total</th>'
                                            +'<th >CGPA/GPA</th>'
                                            +'<th >Grade</th>';


                                        if(data.StudentId){
                                            var j=1
                                            var TotalMark = data.TotalMark;
                                            var sub_pass_mark = data.sub_mark;
                                            var obj_pass_mark = data.obj_mark;
                                            var pra_pass_mark = data.pra_mark;
                                            var pass_mark = data.PassMark;
                                            // if(pra_pass_mark == 0){

                                            //     $("#pra_mark"+j).attr('readonly','readonly');
                                            // }
                                            for(var i = 0; i < data.StudentId.length; i++)

                                                {
                                                tansaction_info +='<tr>'
                                                    +'<td align="right">'+ data.RollNo[i] +'</td>'
                                                    +'<td><input type="hidden" name="student_id[]" value="'+data.StudentId[i]+'"/>'+ data.StudentName[i] + ' - ' + data.StudentCode[i] +'</td>'
                                                   
                                                    +'<td>'+'<input type="text" name="subjective_mark[]" id="subjective_mark'+j+'" class="form-control" value="0" onchange="calculate_total_number('+j+','+TotalMark+','+sub_pass_mark+','+obj_pass_mark+','+pra_pass_mark+','+pass_mark+')" />'+'</td>'

                                                    +'<td>'+'<input type="text" name="objective_mark[]" id="objective_mark'+j+'" class="form-control" value="0" onchange="calculate_total_number('+j+','+TotalMark+','+sub_pass_mark+','+obj_pass_mark+','+pra_pass_mark+','+pass_mark+')" />'+'</td>'

                                                     +'<td>'+'<input type="text" name="pra_mark[]" id="pra_mark'+j+'" class="form-control" value="0" onchange="calculate_total_number('+j+','+TotalMark+','+sub_pass_mark+','+obj_pass_mark+','+pra_pass_mark+','+pass_mark+')" />'+'</td>'

                                                    
                                                    +'<td>'+'<input type="text" name="total_mark[]" id="total_mark'+j+'" class="form-control" value="0"/>'+'</td>'
                                                    +'<td>'+'<input type="text" name="point[]" id="point'+j+'" class="form-control" value="0"/>'+'</td>'
                                                    +'<td>'+'<input type="text" name="grade[]" id="grade'+j+'" class="form-control" value="0"/>'+'</td>'
                                                    +'</tr>'
                                                j++
                                            }


                                        }
                                        else{
                                            tansaction_info +='<tr>'
                                                +'<td colspan="3">'+ "There is no Student in this Section/Batch !" +'</td>'
                                                +'</tr>'
                                        }
                                        tansaction_info += '</table>'
                                        $('#mark_information').empty();
                                        $('#mark_information').append(tansaction_info);
                                    }
                                }, "json");
                        }else{
                            $('#mark_information').empty();
                        }
                    }
                    else{
                        alert(i);
                        $('#mark_information').empty();
                        tansaction_info='<p style="color: red;">You have already entered marks for this class</p>';
                        $('#mark_information').append(tansaction_info);
                    }
                }
            }, "json");
    }
</script>
<?php
$action = $this->uri->segment(2);
$class_options = array('' => "------ Select Class ------");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}
$subject_options = array('' => "------ Select Subject ------");
//foreach ($subject_list as $row1) {
//    $subject_options[$row1->SubjectId] = ($row1->SubjectName);
//}
$exam_options = array('' => "------ Select Exam ------");
foreach ($exam_list as $row1) {
    $exam_options[$row1->ExamId] = ($row1->ExamName);
}
$location_data=$this->session->userdata('system.branch');
$section_options= array(''=>'------ Select Section/Batch ------');
?>
<!-- Begin: Content -->
<div id="content" class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('manage_marks/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="cbo_branch" id="cbo_branch" value="<?php echo isset($result['mark_data']['BranchId'])?$result['mark_data']['BranchId'] : $location_data['BranchId']; ?>">
                        <input type="hidden" name="HasSba" id="HasSba" value="">
                        <input type="hidden" name="HasObjective" id="HasObjective" value="">
                        <input type="hidden" name="Count" id="Count" value="">

                        <div class="row" style="margin:0px;">
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Exam Date</label><br>
                            <div class="tab-content pn br-n admin-form">
                                <div class="col-xs-12">
                                    <label for="filter-datepicker" class="field prepend-picker-icon">
                                        <?php echo form_input(array('name' => 'txt_date_of_exam','id' => 'txt_date_of_exam','type'=>'text','maxlength'=>'100','required'=>'required','placeholder'=>'Date Of Exam','class'=>'event-name gui-input br-light light'),set_value('txt_date_of_exam',isset($result['mark_data']['Year'])?$result['mark_data']['Year']:""));?><button type="button" class="ui-datepicker-trigger form-control"><i class="fa fa-calendar-o"></i></button>
                                        <?php echo form_error('txt_date_of_exam'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Exam</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('ExamId', $exam_options, set_value('ExamId', (isset($result['mark_data']['ExamId'])?$result['mark_data']['ExamId'] : "")), 'id="ExamId", required="required" class="form-control" '); ?>
                                <?php echo form_error('ExamId'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Class</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('ClassId', $class_options, set_value('ClassId', (isset($result['mark_data']['ClassId']) ? $result['mark_data']['ClassId'] : "")), 'id="ClassId", required="required" class="form-control" '); ?>
                                <?php echo form_error('ClassId'); ?>
                            </div>
                        </div>
                            </div>

                             <div class="col-md-2">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Section/Batch</label><br>
                            <div class="col-lg-12">
                                <?php
                                //echo"<pre>";print_r($row->SectionId);die;
                                ?>
                                <?php echo form_dropdown('SectionId', $section_options, set_value('SectionId', (isset($result['mark_data']['SectionId'])?$result['mark_data']['SectionId'] : 2)), 'id="SectionId", required="required" class="form-control" '); ?>
                                <?php echo form_error('SectionId'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Subject</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('SubjectId', $subject_options, set_value('SubjectId', (isset($result['mark_data']['SubjectId'])?$result['mark_data']['SubjectId'] : "")), 'id="SubjectId" required="required" class="form-control" '); ?>
                                <?php echo form_error('SubjectId'); ?>
                            </div>
                        </div>
                            </div>
                        </div>
                        
                       
                        <div class="form-group">
                            <div class="table-responsive" id="mark_information">
                                <?php
                                if(!empty($result['mark_array']) && $action='edit'){
                                    ?>
                                    <table align="center" class="table table-bordered mbn" style="width: 100%">
                                        <tr>
                                            <th >Student Roll</th>
                                            <th >Student Name</th>
                                            <th >Subjective</th>
                                            <th >Objective</th>
                                            <th >Practical</th>
                                             <th >Total</th>
                                            <th >CGPA/GPA</th>
                                            <th >Grade</th>
                                            </tr>
                                        <?php
                                        $i=0;
                                        foreach($result['mark_array'] as $row){
                                            ?>
                                            <tr>
                                                <td align="right"> <?php echo $row['RollNo']; ?></td>
                                                <td> <input type="hidden" name="mark_id[]" value="<?php echo $row['MarkDetailsId']; ?>"/><input type="hidden" name="student_id[]" value="<?php echo $row['StudentId']; ?>"/><?php echo $row['StudentName']; ?>  </td>
                                                 <td>  <input type="text" name="subjective_mark[]" id="subjective_mark<?php echo $i;?>" class="custom_checkbox" value="<?php echo $row['SubjectiveMark']; ?>" onchange="calculate_total_number(<?php echo $i;?>,<?php echo $result['mark_data']['SubTotalMark'];?>,<?php echo $result['mark_data']['sub_pass_mark'];?>,<?php echo $result['mark_data']['obj_pass_mark'];?>,<?php echo $result['mark_data']['pra_pass_mark'];?>,<?php echo $result['mark_data']['PassMark'];?> )" />  </td>

                                                 <td>  <input type="text" name="objective_mark[]" id="objective_mark<?php echo $i;?>" class="custom_checkbox" value="<?php echo $row['ObjectiveMark']; ?>" onchange="calculate_total_number(<?php echo $i;?>,<?php echo $result['mark_data']['SubTotalMark'];?>,<?php echo $result['mark_data']['sub_pass_mark'];?>,<?php echo $result['mark_data']['obj_pass_mark'];?>,<?php echo $result['mark_data']['pra_pass_mark'];?>,<?php echo $result['mark_data']['PassMark'];?>)" />  </td>

                                                <td>  <input type="text" name="pra_mark[]" id="pra_mark<?php echo $i;?>" class="custom_checkbox" value="<?php echo $row['PracticalMark']; ?>" onchange="calculate_total_number(<?php echo $i;?>,<?php echo $result['mark_data']['SubTotalMark'];?>,<?php echo $result['mark_data']['sub_pass_mark'];?>,<?php echo $result['mark_data']['obj_pass_mark'];?>,<?php echo $result['mark_data']['pra_pass_mark'];?>,<?php echo $result['mark_data']['PassMark'];?>)" />  </td>
                                                
                                               
                                                <td>  <input type="text" name="total_mark[]" id="total_mark<?php echo $i;?>" class="custom_checkbox" value="<?php echo $row['TotalMark']; ?>"/>  </td>

                                                <td>  <input type="text" name="point[]" id="point<?php echo $i;?>" class="custom_checkbox" value="<?php echo $row['Point']; ?>"/>  </td>

                                                <td>  <input type="text" name="grade[]" id="grade<?php echo $i;?>" class="custom_checkbox" value="<?php echo $row['Grade']; ?>"/>  </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                        ?>
                                    </table>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row" style="margin:0px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                            <div style="float: right;" class="col-xs-6"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                            <div style="float: right;" class="col-xs-6"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                        </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        
                </div>
                </form>
            </div>
        </div>
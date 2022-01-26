<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $("#StudentId").change(function(){
            get_student_list();
            get_payment_history();
        });
        
        $("#ChkAll").change(function(){
            var chkAllValue = $("#ChkAll").val();
            if(chkAllValue == 'P'){
                $(".attendant_list").val('P');
            }
            if(chkAllValue =='A'){
                $(".attendant_list").val('A');
            }
        });
    });

    
    function get_student_list(){
        $('#fee_information').empty();
        var selected_class_id=$("#StudentId").val();
        var selected_branch_id = $("#BranchId").val();
        if(selected_class_id != ''){
            $.post("<?php echo site_url('students/ajax_for_get_student_list_by_class_and_section_attendance') ?>", {class_id: selected_class_id, BranchId:selected_branch_id },
                function(data){
                    $('#status').html("");
                    $('#cbo_student').empty();
                    if( data.status == 'failure' ){
                        $('#cbo_student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                    }
                    else{
                        tansaction_info = '<table align="center" class="table table-bordered mbn" style="width: 95%">'
                            +'<tr align="center">'
                            +'<th colspan="7" align="right">Student Attendances Information</th>'
                            +'</tr>'
                            +'<tr>'
                            +'<th width="2%">SL</th>'
                            +'<th width="10%">Code</th>'
                            +'<th width="10%">Roll</th>'
                            +'<th width="20%">Student Name</th>'
                            
                            +'<th>Attendance</th>'
                            +'</tr>'
                        if(data.StudentId){
                            var j=1
                            for(var i = 0; i < data.StudentId.length; i++)
                            {
                                tansaction_info +='<tr>'
                                    +'<td>'+ j +'</td>'
                                    +'<td>'+ data.StudentCode[i] +'</td>'
                                    +'<td>'+ data.RollNo[i] +'</td>'
                                    +'<td><input type="hidden" name="student_id[]" value="'+data.StudentId[i]+'"/>'+ data.StudentName[i] +'</td>'
                                    +'<input type="hidden"  name="CourseId[]" value="'+data.CourseId[i]+'"/>'
                                   
                                    +'<td>'+'<select class="form-control attendant_list" style="width: 83%;" name="attendant_list[]"><option value="P">Present</option><option value="A">Absent</option><select>'+'</td>'
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
                        // $('#fee_information').empty();
                        $('#fee_information').append(tansaction_info);
                    }
                }, "json");
        }else{
            $('#fee_information').empty();
        }
    }


    function get_payment_history(){
        $('#payment_info').empty();
        var selected_student_id=$("#StudentId").val();
        var selected_branch_id = $("#BranchId").val();

        // alert(selected_student_id);
        if(selected_student_id != ''){
            $.post("<?php echo site_url('students/ajax_for_get_student_list_by_class_and_section_payment') ?>", {class_id: selected_student_id, BranchId:selected_branch_id },
                function(data){
                    $('#status').html("");
                    $('#cbo_student').empty();
                    if( data.status == 'failure' ){
                        $('#cbo_student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                    }
                    else{


                        $("#payment_info").empty('');

        if(data.ActualAmount-data.PaidAmount>0){
                            var DueAmount = "Due"+' ('+data.balance+')';
                        }
                        if(data.ActualAmount-data.PaidAmount==0){
                            var DueAmount = "Paid";
                        }
                        if(data.ActualAmount-data.PaidAmount<0){
                            advance = data.PaidAmount-data.ActualAmount;
                            var DueAmount = "Advanced "+' ('+advance+')';
                            
                        }

        var student_table_data = "";
        student_table_data += '<tr><td colspan="2">Student Id : <b>' + data.StudentId + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Fee Type : <b>' + data.TypeName + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Payable Amount : <b>' + data.ActualAmount + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Paid Amount : <b>' + data.PaidAmount + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Payment Status : <b>' + DueAmount + '</b></td></tr>';
        student_table_data += '<tr><td colspan="2">Due Date : <b>' + data.DueDate + '</b></td></tr>';
        $("#payment_info").append(student_table_data);


                      
                    }
                }, "json");
        }else{
            $('#payment_info').empty();
        }
    }
</script>
<?php
$action = $this->uri->segment(2);
$class_options = array('' => "------ Select Class ------");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}

$student_options = array('' => "------ Select Student ------");
foreach ($get_student_for_attendance as $row1) {
    $student_options[$row1->StudentId] = ($row1->StudentName.'('.$row1->StudentCode .')');
}


$section_options= array(''=>'------ Select Section/Batch ------');

$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$section_options = array('' => 'Select Section/Batch');

$location_data=$this->session->userdata('system.branch');
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
                    <form class="form-horizontal" action="<?php echo site_url('student_attendances/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="GroupId" value="<?php echo isset($attendance_info->GroupId)?$attendance_info->GroupId:""?>">
                            <?php
                        }
                        ?>

                        <div class="row" style="margin: 0px; padding: 0px;"> 
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Branch</label><br>
                            <div class="col-lg-12">

                                <?php
                                if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                                    echo form_dropdown('BranchId', $branch_options, set_value('BranchId', (isset($row->BranchId) ? $row->BranchId : $location_data['BranchId'])), 'id="BranchId" class="custom_checkbox"  required="required"');
                                    ?>
                                    <i class="arrow double"></i>
                                    <?php
                                    echo form_error('BranchId');
                                }else {
                                    echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:$location_data['BranchId']),' disabled="disabled" class="custom_checkbox" id="BranchId"');
                                    echo form_input(array('name' => 'BranchId', 'id' => 'BranchId', 'maxlength' => '4', 'type' => 'hidden'), set_value('BranchId', (isset($session_data['BranchId']) ? $session_data['BranchId'] : $location_data['BranchId'])));
                                }
                                ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Students</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('StudentId', $student_options, set_value('StudentId', (isset($attendance_info->StudentId) ? $attendance_info->StudentId : "")), 'id="StudentId", class="custom_checkbox myselect form-control" '); ?>
                                <?php echo form_error('StudentId'); ?>



                                 <?php echo form_dropdown('ClassId', $class_options, set_value('ClassId', (isset($attendance_info->ClassId) ? $attendance_info->ClassId : "")), 'id="ClassId", class="custom_checkbox" style ="display:none;"'); ?>


                            </div>
                        </div>
                            </div>
                           
                            <div class="col-md-3">
                                 <div class="form-group">
                            <label for="maskedDate" class="col-lg-12 text-left control-label">Date</label><br>
                            <div class="col-lg-12">
                                <input type="text" id="datepicker" required="required" class="form-control" name="Date" value="<?php echo isset($attendance_info->Date)?$attendance_info->Date:date('Y -m-d'); ?>">
                                <?php echo form_error('Date'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Mark All as Present</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('ChkAll',array('P'=>"Present",'A'=>"Absent"),'','id="ChkAll" class="form-control"');?>
                            </div>
                        </div>
                            </div>
                        
                        </div>
                        
                        
                       
                       <div class="row">
                           <div class="col-md-9">
                                 <div class="form-group">
                            <div class="table-responsive" id="fee_information">
                                <?php
                                if(!empty($result) && $action='edit'){
                                    ?>
                                    <table align="center" class="table table-bordered mbn" style="width: 90%">
                                        <tr align="center">
                                            <th colspan="3" align="right">Student Attendances Information</th>
                                        </tr>
                                        <tr>
                                            <th>SL</th>
                                            <th>Student Name</th>
                                            <th>Student Code</th>
                                            <th>Student Roll</th>
                                            <th>Attendance</th>
                                        </tr>
                                    <?php
                                    $i=1;
                                    foreach($result as $row){
                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td>
                                                <?php echo $row['StudentName']?>
                                               </td>
                                            <td>
                                                 <?php echo $row['StudentCode']?>

                                                </td>
                                            <td>
                                                <input type="hidden" name="student_id[]" value="<?php echo $row['StudentId']; ?>"/>
                                                <input type="hidden" name="CourseId[]" value="<?php echo $row['CourseId']; ?>"/>
                                                <?php echo $row['RollNo']?>
                                            </td>
                                           
                                            <td>
                                                <?php echo form_dropdown('attendant_list[]',array('P'=>"present",'A'=>"Absent"),isset($row['AttendanceType'])?$row['AttendanceType']:'','id="cbo_gender" class="form-control attendant_list"');?>
                                            </td>
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
                           </div>
                           <div class="col-md-3">
                    <table class="scale table table-bordered table-responsive" style="margin-top: 0%" width="100%" cellpadding="6" align="center" id="payment_info">
                           <thead>

                            </thead>

                            </table>

                               
                           </div>
                       </div>
                        
                      

                        
                        <div class="row">
                            <div class="col-md-8 col-xs-12">
                            <div class="form-group">
                            <div style="float: right;" class="col-xs-2"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                            <div style="float: right;" class="col-xs-2"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                        </div>
                        </div>
                        
                </div>
                </form>
            </div>
        </div>
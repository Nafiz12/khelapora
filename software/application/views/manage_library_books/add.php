<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

   

<script type="text/javascript">
    $(document).ready(function(){
       get_student_list();
       get_book_list();
        // $( "#FromDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
        // $( "#ToDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $("#ClassId").change(function(){
            get_student_list();
        });
        $("#TypeId").change(function(){
            get_book_list();
        });
        
    });

    function get_student_list(){
        var selected_class_id=$("#ClassId").val();
        var BranchId=$("#BranchId").val();
        $.post("<?php echo site_url('manage_library_books/ajax_for_get_student_list_by_class') ?>", {class_id: selected_class_id,BranchId:BranchId},
            function(data){

                $('#status').html("");
                $('#StudentId').empty();
                var selected_StudentId = "<?php echo isset($row->StudentId)?$row->StudentId:''?>";
                //  alert(selected_StudentId);
                if( data.status == 'failure' ){
                    $('#StudentId').append('<option value = \"' + '' + '\">' + 'Select Student' + '</option>');
                }
                else    {
                    $('#StudentId').append('<option value = \"' + '' + '\">' + 'Select Student' + '</option>');
                    for(var i = 0; i < data.StudentId.length; i++){
                        if(selected_StudentId==data.StudentId[i]){
                            $('#StudentId').append('<option value = \"' + data.StudentId[i] + '\" selected="selected">' + data.StudentName[i] +data.StudentName[i]+'('+data.StudentCode[i]+')' + '</option>');
                        }else {
                            $('#StudentId').append('<option value = \"' + data.StudentId[i] + '\">' + data.StudentName[i]+'('+data.StudentCode[i]+')' + '</option>');
                        }
                    }
                }
            }, "json");
    }


    function get_book_list(){
        var selected_subject_id=$("#SubjectId").val();
        var selected_type_id=$("#TypeId").val();
        $.post("<?php echo site_url('manage_library_books/ajax_for_get_book_list_by_subject') ?>", {subject_id: selected_subject_id,type_id:selected_type_id},
            function(data){

                $('#status').html("");
                $('#BookId').empty();
                var selected_BookId = "<?php echo isset($row->BookId)?$row->BookId:''?>";
                //  alert(selected_StudentId);
                if( data.status == 'failure' ){
                    $('#BookId').append('<option value = \"' + '' + '\">' + 'Select Lecture' + '</option>');
                }
                else    {
                    $('#BookId').append('<option value = \"' + '' + '\">' + 'Select Lecture' + '</option>');
                    for(var i = 0; i < data.BookId.length; i++){
                        if(selected_BookId==data.BookId[i]){
                            $('#BookId').append('<option value = \"' + data.BookId[i] + '\" selected="selected">' + data.BookName[i] + '</option>');
                        }else {
                            $('#BookId').append('<option value = \"' + data.BookId[i] + '\">' + data.BookName[i]+ '</option>');
                        }
                    }
                }
            }, "json");
    }
</script>
<?php
//echo "<pre>";print_r($row);die;
$action = $this->uri->segment(2);
$class_options = array('' => "---- Select Class ----");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}
$book_options = array(''=>'--- Select Lecture');

$subject_options = array('' => "------ Select Subject ------");
foreach ($subject_list as $row1) {
   $subject_options[$row1->SubjectId] = ($row1->SubjectName);
}
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
  $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$book_type_options = array('' => "---- Select Type ----");
foreach ($book_type_list as $row1) {
    $book_type_options[$row1['TypeId']] = ($row1['TypeName']);
}

$location_data=$this->session->userdata('system.branch');

$section_options= array(''=>'------Select Section------');
$student_options= array(''=>'------Select Student------');
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
                    <form class="form-horizontal" action="<?php echo site_url('manage_library_books/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="DistributionId" value="<?php echo isset($row->DistributionId)?$row->DistributionId:""?>">
                        <?php
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Branch</label><br>
                            <div class="col-lg-12">
                                
                  <label class="field select">
                    <?php
                    if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                      echo form_dropdown('BranchId', $branch_options, set_value('BranchId', (isset($row->BranchId) ? $row->BranchId : $location_data['BranchId'])), 'id="BranchId" class="form-control" required="required"');
                      ?>
                      <i class="arrow double"></i>
                      <?php
                      echo form_error('BranchId');
                    }else {
                      echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:$location_data['BranchId']),' disabled="disabled" id="BranchId" class="form-control"');
                      echo form_input(array('name' => 'BranchId', 'id' => 'BranchId','class'=>'form-control', 'maxlength' => '4', 'type' => 'hidden'), set_value('BranchId', (isset($session_data['BranchId']) ? $session_data['BranchId'] : $location_data['BranchId'])));
                    }
                    ?>
                  </label>
                
                            </div>
                        </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Course</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('ClassId', $class_options, set_value('ClassId', (isset($row->ClassId) ? $row->ClassId : "")), 'id="ClassId", class="custom_checkbox " '); ?>
                                <?php echo form_error('ClassId'); ?>
                            </div>
                        </div>
                       
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Subject</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('SubjectId', $subject_options, set_value('SubjectId', (isset($row->SubjectId)?$row->SubjectId : "")), 'id="SubjectId", required="required" class="custom_checkbox " '); ?>
                                <?php echo form_error('SubjectId'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Type</label><br>
                            <div class="col-lg-12">
                               <?php echo form_dropdown('TypeId', $book_type_options, set_value('TypeId', (isset($row->TypeId)?$row->TypeId : "")), 'id="TypeId", required="required" class="custom_checkbox" '); ?>
                                <?php echo form_error('TypeId'); ?>
                            </div>
                        </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Lecture</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('BookId', $book_options, set_value('BookId', (isset($row->BookId)?$row->BookId : "")), 'id="BookId", required="required" class="custom_checkbox " '); ?>
                                <?php echo form_error('BookId'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Student</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('StudentId', $student_options, set_value('StudentId', (isset($row->StudentId)?$row->StudentId : "")), 'id="StudentId", class="custom_checkbox " '); ?>
                                <?php echo form_error('StudentId'); ?>
                            </div>
                        </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Number</label><br>
                            <div class="col-lg-12">
                                <input type="text" name="Number" id="Number" class="form-control" required="required" value="<?php echo isset($row->Number)?$row->Number:''; ?>" placeholder="Enter Number">
                                <?php echo form_error('Number'); ?>
                            </div>
                        </div>
                            </div>
                        </div>

                        

                        

                       
                        
                        <div class="form-group">
                            <div style="float: right;" class="col-xs-2"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                            <div style="float: right;" class="col-xs-2"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                        </div>
                </div>
                </form>
            </div>
        </div>
<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>

<script type="text/javascript"> $(window).load(function() { $('#txt_date_of_exam').glDatePicker({ dateFormat: 'yy-mm-dd' }); }); </script>


<script type="text/javascript">
    $(document).ready(function(){
        
        get_subject_list();
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $("#ExamId").change(function(){
            get_exam_details();
        });
        $("#ClassId").change(function(){
            
            get_subject_list();

        });
        
    });

    
    function calculate_total_number(index){
        var total_mark = 0;
        var sab_mark = parseFloat($("#sba_mark"+index).val());
        var objective_mark = parseFloat($("#objective_mark"+index).val());
        var subjective_mark = parseFloat($("#subjective_mark"+index).val());
        if(isNaN(sab_mark) || sab_mark ==''){
            sab_mark=0;
        }
        if(isNaN(objective_mark) || objective_mark ==''){
            objective_mark=0;
        }
        if(isNaN(subjective_mark) || subjective_mark ==''){
            subjective_mark=0;
        }
        total_mark = sab_mark+objective_mark+subjective_mark;
        $("#total_mark"+index).val(total_mark);
    }


    function get_subject_list(){
        var ClassId=$("#ClassId").val();
        var BranchId=$("#BranchId").val();
        $.post("<?php echo site_url('config_subjects/ajax_for_get_subject_list_by_class') ?>", {ClassId: ClassId,BranchId:BranchId},
            function(data){
                $('#status').html("");
                $('#SubjectId').empty();
                var selected_SubjectId = "<?php echo isset($result['mark_data']['SubjectId'])?$result['mark_data']['SubjectId']:''?>";
                if( data.status == 'failure' ){
                    $('#SubjectId').append('<option value = \"' + '' + '\">' + '------Select Subject------' + '</option>');
                }
                else    {
                    // $('#SubjectId').append('<option value = \"' + '' + '\">' + '------Select Subject------' + '</option>');
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
    

</script>
<?php
$action = $this->uri->segment(2);
$class_options = array('' => "------ Select Class ------");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}
$subject_options = array('' => "------ Select Subject ------");
// foreach ($subject_list as $row1) {
//    $subject_options[$row1->SubjectId] = ($row1->SubjectName);
// }
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
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




                <!-----------------body------------------------------------------------------>

                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('subject_wise_marks/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <div class="tab-content pn br-n admin-form">
                            <div id="tab1_1" class="tab-pane active">
                                <div class="section row mbn">
                                    <div class="col-md-12 pl15">
                                        <div class="section row mb15">
                                            <div class="col-md-3">
                                                <label class="field select">
                                                    <?php
                            if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                                echo form_dropdown('BranchId', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:""),'id="BranchId"');
                            }else {
                                echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:$location_data['BranchId']),' disabled="disabled" id="BranchId"');
                                echo form_input(array('name' => 'BranchId', 'id' => 'BranchId', 'maxlength' => '4', 'type' => 'hidden'), set_value('BranchId', (isset($session_data['BranchId']) ? $session_data['BranchId'] : $location_data['BranchId'])));
                            }
                            ?>
                                                    <?php echo form_error('BranchId'); ?>
                                                </label>
                                            </div>
 <?php echo form_input(array('type' => 'hidden','name' => 'SubMarkId','class' =>'form-control','value' => set_value('SubMarkId',(isset($row->SubMarkId)?$row->SubMarkId:"")),'placeholder' => 'Enter Total Mark','id'=>'SubMarkId')) ;?>
                                            <div class="col-md-3">
                                                <label class="field select">
                                                    <?php echo form_dropdown('ClassId', $class_options, set_value('ClassId', (isset($row->ClassId) ? $row->ClassId : "")), 'id="ClassId" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <input type="hidden" name="BranchId" value="<?php echo $location_data['BranchId']; ?>">
                                                    <?php echo form_error('ClassId'); ?>
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="field select">
                                                       <?php echo form_dropdown('SubjectId', $subject_options, set_value('SubjectId', (isset($row->SubjectId)?$row->SubjectId : "")), 'id="SubjectId" required="required" '); ?>
                               
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('SubjectId'); ?>

                                                   
                               
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                        <?php echo form_input(array('type' => 'text','name' => 'TotalMark','class' =>'form-control','value' => set_value('TotalMark',(isset($row->TotalMark)?$row->TotalMark:"")),'placeholder' => 'Enter Total Mark','id'=>'TotalMark','required'=>'required')) ;?>

                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('TotalMark'); ?>
                                                
                                            </div>

                                        </div>
                                        <div class="section row mb15">

                                            <div class="col-md-3">
                                                    <?php echo form_input(array('type' => 'text','name' => 'SubMark','class' =>'form-control','value' => set_value('SubMark',(isset($row->SubMark)?$row->SubMark:"")),'placeholder' => 'Enter Subjective Mark','id'=>'SubMark','required'=>'required')) ;?>

                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('SubMark'); ?>
                                                
                                            </div>



                                            <div class="col-md-3">
                                                    <?php echo form_input(array('type' => 'text','name' => 'ObjMark','class' =>'form-control','value' => set_value('ObjMark',(isset($row->ObjMark)?$row->ObjMark:"")),'placeholder' => 'Enter Objective Mark','id'=>'ObjMark','required'=>'required')) ;?>

                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('ObjMark'); ?>
                                                
                                            </div> 

                                            <div class="col-md-3">
                                                   <?php echo form_input(array('type' => 'text','name' => 'PraMark','class' =>'form-control','value' => set_value('PraMark',(isset($row->PraMark)?$row->PraMark:"")),'placeholder' => 'Enter Practical Mark','id'=>'PraMark','required'=>'required')) ;?>


                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('PraMark'); ?>
                                                
                                            </div>

                                            <div class="col-md-3">
                                                    
                        <?php echo form_input(array('type' => 'text','name' => 'PassMark','class' =>'form-control','value' => set_value('PassMark',(isset($row->PassMark)?$row->PassMark:"")),'placeholder' => 'Enter pass mark','id'=>'PassMark','required'=>'required')) ;?>


                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('PassMark'); ?>
                                                
                                            </div>


                                           
                                           
                                        </div>
                                         <div class="section row mb15 mt-10" style="float:center;">
                                            <div class="col-xs-4"></div>
                                            <div class="col-xs-4">
                                                 <div class="form-group" >
                                                     <div  class="col-xs-6"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>

                            <div  class="col-xs-6"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                           
                        </div>
                                            </div>
                                            <div class="col-xs-4"></div>
                                           
                                               
                                            </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <!----------------end of body------------------------------------------------>
               
            </div>
        </div>
<title><?php echo $title; ?></title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>

<script type="text/javascript"> $(window).load(function() {
  $('#txt_date_of_birth').glDatePicker({ dateFormat: 'yy-mm-dd' });
  $('#txt_date_of_admission').glDatePicker({ dateFormat: 'yy-mm-dd' });
}); </script>
<script>
  $(document).ready(function () {
    $(".dormitory_area").hide();
    $("#datepicker").datepicker();

        
        $("#BatchId").change(function () {
         
          get_student_code();
        });
        // $("#cbo_residential").change(function(){
        //     set_dormitory();
        // });
        $('#SameAsPresent').change(function() {
          if(this.checked) {
           var presentAddress = $("#PresentAddress").val();
           $("#PermanentAddress").val(presentAddress);
         }
         if(this.checked == false) {
          $("#PermanentAddress").val('');
        }
      });
      });

  function get_student_code() {

    var selected_batch_id = $("#BatchId").val();
    var selected_branch_id = $("#BranchId").val();



    $.post("<?php echo site_url('students/ajax_for_get_student_code') ?>", {

      batch_id: selected_batch_id,
      BranchId: selected_branch_id

    },
    function (data) {
      $('#status').html("");
      $('#StudentCode').empty();
      $('#RollNo').empty();
      if (data.status == 'failure') {
        $('#StudentCode').empty();
        $('#RollNo').empty();
      }
      else {
        $('#StudentCode').val(data.StudentCode);
        $('#RollNo').val(data.StudentRoll);
      }
    }, "json");
  }
</script>
<?php
$action = $this->uri->segment(2);
$batch_options = array('' => "Select Batch");
foreach ($batch_list as $row1) {
  $batch_options[$row1->BatchId] = ($row1->BatchName.' '.'('.substr($row1->StartTime,0,5).'-'.substr($row1->EndTime,0,5).')');
}

$course_options = array('' => "Select Course");
foreach ($class_list as $row1) {
  $course_options[$row1->ClassId] = $row1->ClassName;
}

$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
  $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$section_options = array('' => 'Select Section');

$location_data=$this->session->userdata('system.branch');
?>
<div class="panel mb25 mt5">
  <div class="panel-heading">
    <span class="panel-title"><?php echo $title; ?></span>
  </div>
  <div class="panel-body p20 pb10">
    <form class="form-horizontal" action="<?php echo site_url('students/' . $action); ?>" role="form" method="POST"
      enctype="multipart/form-data">
      <?php
      if ($action == "edit") {
        ?>
        <input type="hidden" name="StudentId"
        value="<?php echo isset($row->StudentId) ? $row->StudentId : "" ?>">
        <?php
      }
      ?>
      <div class="tab-content pn br-n admin-form">
        <div id="tab1_1" class="tab-pane active">
          <div class="section row mbn">
            <div class="col-md-9 pl15">
              <div class="section-divider mb40 mt20"><span> <?php echo 'Basic Information';?> </span></div>
              <div class="section row mb15">
                <div class="col-xs-4">
                  <label class="field select">
                    <?php
                    if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                      echo form_dropdown('BranchId', $branch_options, set_value('BranchId', (isset($row->BranchId) ? $row->BranchId : $location_data['BranchId'])), 'id="BranchId" required="required"');
                      ?>
                      <i class="arrow double"></i>
                      <?php
                      echo form_error('BranchId');
                    }else {
                      echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:$location_data['BranchId']),' disabled="disabled" id="BranchId"');
                      echo form_input(array('name' => 'BranchId', 'id' => 'BranchId', 'maxlength' => '4', 'type' => 'hidden'), set_value('BranchId', (isset($session_data['BranchId']) ? $session_data['BranchId'] : $location_data['BranchId'])));
                    }
                    ?>
                  </label>
                </div>
                <div class="col-xs-4">
                  <label class="field select">
                    <?php echo form_dropdown('Year', $academic_year_list, set_value('Year', (isset($row->Year) ? $row->Year : "")), 'id="Year" required="required" '); ?>
                    <i class="arrow double"></i>
                    <?php echo form_error('Year'); ?>
                  </label>
                </div>

                <div class="col-xs-4">
                  <label for="name" class="field prepend-icon">
                    <input type="text" name="StudentName" id="StudentName"
                    class="event-name gui-input br-light light" required="required"
                    value="<?php echo isset($row->StudentName) ? $row->StudentName : ''; ?>"
                    placeholder="Student Name*">
                    <?php echo form_error('StudentName'); ?>
                    <label for="txt_name" class="field-icon"><i class="fa fa-user"></i></label>
                  </label>
                </div>
              </div>



              <div class="section row mb15">


                 <div class="col-xs-4">
                <label class="field select">
                  <?php echo form_dropdown('CourseId', $course_options, set_value('CourseId', (isset($row->CourseId) ? $row->CourseId : "")), 'id="CourseId"'); ?>
                  <i class="arrow double"></i>
                  <?php echo form_error('Occupation'); ?>
                </label>
              </div> 

              <div class="col-xs-4">
                <label class="field select">
                  <?php echo form_dropdown('BatchId', $batch_options, set_value('BatchId', (isset($row->BatchId) ? $row->BatchId : "")), 'id="BatchId" required="required"'); ?>
                  <i class="arrow double"></i>
                  <?php echo form_error('BatchId'); ?>
                </label>
              </div>
             

              <div class="col-xs-4">
                <label for="name" class="field prepend-icon">
                  <input type="text" name="Contact" id="Contact"
                  class="event-name gui-input br-light light" required="required"
                  
                  value="<?php echo isset($row->Contact) ? $row->Contact : ''; ?>"
                  placeholder="Student Contact*">
                  <?php echo form_error('Contact'); ?>
                </label>
              </div>
              
            </div>

            <div class="section row mb15">

              <div class="col-xs-4">
                <label for="name" class="field prepend-icon">
                  <input type="text" name="RollNo" id="RollNo"
                  class="event-name gui-input br-light light" required="required"
                  readonly="readonly"
                  value="<?php echo isset($row->RollNo) ? $row->RollNo : ''; ?>"
                  placeholder="Student Roll*">
                  <?php echo form_error('RollNo'); ?>
                </label>
              </div>
              <div class="col-xs-4">
                <label for="txt_code" class="field prepend-icon">
                  <input type="text" name="StudentCode" id="StudentCode"
                  class="event-name gui-input br-light light" required="required"
                  readonly="readonly"
                  value="<?php echo isset($row->StudentCode) ? $row->StudentCode : ''; ?>"
                  placeholder="Student Code*">
                  <?php echo form_error('StudentCode'); ?>
                  <label for="StudentCode" class="field-icon"><i class="fa fa-user"></i></label>
                </label>
              </div>

              <div class="col-xs-4">
                <label for="name" class="field prepend-icon">
                  <input type="text" name="StudentEmail" id="StudentEmail"
                  class="event-name gui-input br-light light"
                  value="<?php echo isset($row->StudentEmail) ? $row->StudentEmail : ''; ?>"
                  placeholder="Student Email">
                  <?php echo form_error('StudentEmail'); ?>
                  <label for="StudentEmail" class="field-icon"><i class="fa fa-envelope"></i></label>
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
              <div class="fileupload-preview thumbnail mb15">
                <img height="200" width="200" <?php if (isset($row->Image)) { ?> src="<?php echo base_url() . 'media/student_pictures/' . $row->Image ?>" <?php } else { ?> data-src="holder.js/100%x147" <?php } ?>
                alt="holder"/>
              </div>
              <span class="button btn-system btn-file btn-block ph5">
                <span class="fileupload-new">Picture</span>
                <span class="fileupload-exists">Change</span>
                <input type="file" name="image">
                <?php echo form_error('image', '<div class="error">', '</div>'); ?>
              </span>
            </div>
          </div>
        </div>
        <div class="section row mbn">
          <div class="col-md-12 pl15">
            <div class="section row mb15">
              <div class="col-xs-3">
                <label for="filter-datepicker" class="field prepend-picker-icon">
                  <?php echo form_input(array('name' => 'DateOfBirth','required' => 'required','id' => 'mydate','type'=>'text','maxlength'=>'100','placeholder'=>'Date Of Birth*','class'=>'event-name gui-input br-light light'),set_value('DateOfBirth',isset($row->DateOfBirth)?$row->DateOfBirth:""));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                  <?php echo form_error('DateOfBirth'); ?>
                </label>
              </div>
              <div class="col-xs-3">
                <label for="filter-datepicker" class="field prepend-picker-icon">
                  <?php echo form_input(array('name' => 'AdmissionDate','required' => 'required','id' => 'AdmissionDate','type'=>'text','maxlength'=>'100','placeholder'=>'Date Of Admission*','class'=>'event-name gui-input br-light light'),set_value('AdmissionDate',isset($row->AdmissionDate)?$row->AdmissionDate:date('Y-m-d')));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                  <?php echo form_error('AdmissionDate'); ?>
                </label>
              </div>

             <div class="col-xs-3">
                <label class="field select">
                  <?php echo form_dropdown('BloodGroup', $blood_group_list, set_value('BloodGroup', (isset($row->BloodGroup) ? $row->BloodGroup : "")), 'id="BloodGroup"'); ?>
                  <i class="arrow double"></i>
                  <?php echo form_error('BloodGroup'); ?>
                </label>
              </div> 

              <div class="col-xs-3">
                <label class="field select">
                  <?php echo form_dropdown('Occupation', $occupation_list, set_value('Occupation', (isset($row->Occupation) ? $row->Occupation : "")), 'id="Occupation"'); ?>
                  <i class="arrow double"></i>
                  <?php echo form_error('Occupation'); ?>
                </label>
              </div>
            </div>
            <div class="section row mb15">


            </div>
          </div>
        </div>
        <div class="section-divider mb40 mt20"><span> <?php echo 'Address Information';?> </span></div>
        <div class="section row mbn">
          <div class="col-md-12 pl15">
            <div class="section row mb15">
              <div class="col-xs-6">
                <label class="field prepend-icon">
                  <textarea style="height: 67px" class="gui-textarea" id="PresentAddress" name="PresentAddress" placeholder="Present Address"><?php echo isset($row->PresentAddress) ? $row->PresentAddress : ""; ?></textarea>
                  <label for="comment" class="field-icon"><i class="fa fa-comments"></i></label>
                </label>
              </div>
              <div class="col-xs-6">
                <label class="field prepend-icon">
                  <textarea class="gui-textarea" id="PermanentAddress" name="PermanentAddress" placeholder="Permanent Address"><?php echo isset($row->PermanentAddress) ? $row->PermanentAddress : ""; ?></textarea>
                  <label for="comment" class="field-icon"><i class="fa fa-comments"></i></label>
                  <span class="input-footer">
                    <input type="checkbox" id="SameAsPresent" name="SameAsPresent" >
                    Same As Present Address
                  </span>
                </label>

              </div>
            </div>
          </div>
        </div>
        <div class="section-divider mb40 mt20"><span> <?php echo 'Parent Information';?> </span></div>
        <div class="section row mbn">
          <div class="col-md-12 pl15">
            <div class="section row mb15">
              <div class="col-xs-4">
                <label for="name" class="field prepend-icon">
                  <input type="text" name="FathersName" id="FathersName"
                  class="event-name gui-input br-light light" required="required"
                  value="<?php echo isset($row->FathersName) ? $row->FathersName : ''; ?>"
                  placeholder="Father's Name">
                  <?php echo form_error('FathersName'); ?>
                  <label for="txt_name" class="field-icon"><i class="fa fa-user"></i></label>
                </label>
              </div>

              <div class="col-xs-4">
                <label for="name" class="field prepend-icon">
                  <input type="text" name="MothersName" id="MothersName"
                  class="event-name gui-input br-light light"
                  value="<?php echo isset($row->MothersName) ? $row->MothersName : ''; ?>"
                  placeholder="Mother's Name">
                  <?php echo form_error('MothersName'); ?>
                  <label for="txt_name" class="field-icon"><i class="fa fa-user"></i></label>

                </label>
              </div>


              <div class="col-xs-4">
                <label for="txt_code" class="field prepend-icon">
                  <input type="text" name="GuardianContactNumber" id="GuardianContactNumber"
                  class="event-name gui-input br-light light" required="required"
                  value="<?php echo isset($row->GuardianContactNumber) ? $row->GuardianContactNumber : ''; ?>"
                  placeholder="Guardian's Contact Number">
                  <?php echo form_error('GuardianContactNumber'); ?>
                  <label for="txt_code" class="field-icon"><i class="fa fa-phone"></i></label>
                </label>
              </div>

            </div>
          </div>


        </div>


      <div class="section-divider mb40 mt20"><span> <?php echo 'Educational Information';?> </span></div>
      <div class="section row mbn">
        <div class="col-md-12 pl15">
          <div class="form-row">

            <table class="table table-responsive table-bordered">
              <thead>
                <tr>
                  <th>Certificate</th>
                  <th>Year</th>
                  <th>Board/University</th>
                  <th>Group/Subject</th>
                  <th>Result</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td> 
                   <input type="hidden" class="form-control" id="SSC" name = "SSC"><p class="text-center">S.S.C</p>

                 </td>
                 <td>
                   <label for="txt_code" class="field prepend-icon">
                    <input type="text" name="SSCYear" id="SSCYear"
                    class="form-control" required="required"
                    value="<?php echo isset($row->SSCYear) ? $row->SSCYear :''; ?>"
                    >
                    <?php echo form_error('SSCYear'); ?>
                  </label>


                </td>
                <td>
                  <label for="txt_code" class="field prepend-icon">
                    <input type="text" name="SSCBoard" id="SSCBoard"
                    class="form-control" required="required"
                    value="<?php echo isset($row->SSCBoard) ? $row->SSCBoard :''; ?>"
                    >
                    <?php echo form_error('SSCBoard'); ?>
                  </label>

                </td>
                <td>
                 <label for="txt_code" class="field prepend-icon">
                  <input type="text" name="SSCSubject" id="SSCSubject"
                  class="form-control" required="required"
                  value="<?php echo isset($row->SSCSubject) ? $row->SSCSubject :''; ?>"
                  >
                  <?php echo form_error('SSCSubject'); ?>
                </label>
              </td>
              <td>
               <label for="txt_code" class="field prepend-icon">
                <input type="text" name="SSCResult" id="SSCResult"
                class="form-control" required="required"
                value="<?php echo isset($row->SSCResult) ? $row->SSCResult :''; ?>"
                >
                <?php echo form_error('SSCResult'); ?>
              </label>

            </td>
          </tr>

          <tr>
            <td> 
             <input type="hidden" class="form-control" id="HSC" name = "HSC"><p class="text-center">H.S.C</p>

           </td>
           <td>
             <label for="txt_code" class="field prepend-icon">
              <input type="text" name="HSCYear" id="HSCYear"
              class="form-control" required="required"
              value="<?php echo isset($row->HSCYear) ? $row->HSCYear :''; ?>"
              >
              <?php echo form_error('HSCYear'); ?>
            </label>

          </td>
          <td>

           <label for="txt_code" class="field prepend-icon">
            <input type="text" name="HSCBoard" id="HSCBoard"
            class="form-control" required="required"
            value="<?php echo isset($row->HSCBoard) ? $row->HSCBoard :''; ?>"
            >
            <?php echo form_error('HSCBoard'); ?>
          </label>

        </td>
        <td>
          <label for="txt_code" class="field prepend-icon">
            <input type="text" name="HSCSubject" id="HSCSubject"
            class="form-control" required="required"
            value="<?php echo isset($row->HSCSubject) ? $row->HSCSubject :''; ?>"
            >
            <?php echo form_error('HSCSubject'); ?>
          </label>
        </td>
        <td>

          <label for="txt_code" class="field prepend-icon">
            <input type="text" name="HSCResult" id="HSCResult"
            class="form-control" required="required"
            value="<?php echo isset($row->HSCResult) ? $row->HSCResult :''; ?>"
            >
            <?php echo form_error('HSCResult'); ?>
          </label>

        </td>
      </tr>

      <tr>
        <td> 


         <input type="hidden" class="form-control" id="Graduation" name = "Graduation"><p class="text-center">Graduation</p>

       </td>
       <td>
        <label for="txt_code" class="field prepend-icon">
          <input type="text" name="GraduationYear" id="GraduationYear"
          class="form-control" 
          value="<?php echo isset($row->GraduationYear) ? $row->GraduationYear :''; ?>"
          >
          <?php echo form_error('GraduationYear'); ?>
        </label>

      </td>
      <td>
        <label for="txt_code" class="field prepend-icon">
          <input type="text" name="GraduationBoard" id="GraduationBoard"
          class="form-control" 
          value="<?php echo isset($row->GraduationBoard) ? $row->GraduationBoard :''; ?>"
          >
          <?php echo form_error('GraduationBoard'); ?>
        </label>

      </td>
      <td>
        <label for="txt_code" class="field prepend-icon">
          <input type="text" name="GraduationSubject" id="GraduationSubject"
          class="form-control" 
          value="<?php echo isset($row->GraduationSubject) ? $row->GraduationSubject :''; ?>"
          >
          <?php echo form_error('GraduationSubject'); ?>
        </label>
      </td>
      <td>
       <label for="txt_code" class="field prepend-icon">
        <input type="text" name="GraduationResult" id="GraduationResult"
        class="form-control" 
        value="<?php echo isset($row->GraduationResult) ? $row->GraduationResult :''; ?>"
        >
        <?php echo form_error('GraduationResult'); ?>
      </label>

    </td>
  </tr>

  <tr>
    <td> 
     <input type="hidden" class="form-control" id="PostGraduation" name = "PostGraduation"><p class="text-center">PostGraduation</p>

   </td>
   <td>
     <label for="txt_code" class="field prepend-icon">
      <input type="text" name="PostGraduationYear" id="PostGraduationYear"
      class="form-control" 
      value="<?php echo isset($row->PostGraduationYear) ? $row->PostGraduationYear :''; ?>"
      >
      <?php echo form_error('PostGraduationYear'); ?>
    </label>

  </td>
  <td>
    <label for="txt_code" class="field prepend-icon">
      <input type="text" name="PostGraduationBoard" id="PostGraduationBoard"
      class="form-control" 
      value="<?php echo isset($row->PostGraduationBoard) ? $row->PostGraduationBoard :''; ?>"
      >
      <?php echo form_error('PostGraduationBoard'); ?>
    </label>

  </td>
  <td>
    <label for="txt_code" class="field prepend-icon">
      <input type="text" name="PostGraduationSubject" id="PostGraduationSubject"
      class="form-control" 
      value="<?php echo isset($row->PostGraduationSubject) ? $row->PostGraduationSubject :''; ?>"
      >
      <?php echo form_error('PostGraduationSubject'); ?>
    </label>
  </td>
  <td>
    <label for="txt_code" class="field prepend-icon">
      <input type="text" name="PostGraduationResult" id="PostGraduationResult"
      class="form-control" 
      value="<?php echo isset($row->PostGraduationResult) ? $row->PostGraduationResult :''; ?>"
      >
      <?php echo form_error('PostGraduationResult'); ?>
    </label>

  </td>
</tr>
</tbody>
</table>


</div>
</div>


</div>


<div class="section row mbn">

  <br>
  <div class="col-md-12 pl15">
    <div class="section row mbn">
      <div class="col-sm-8"></div>
      <div class="col-sm-4">
        <p class="text-right">
          <input class="btn btn-primary" value="Save Student" type="submit">
        </p>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</form>
</div>
</div>
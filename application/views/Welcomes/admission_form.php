<?php $this->load->view('Layouts/header');?>

<style>
    .shadow-textarea textarea.form-control::placeholder {
        font-weight: 300;
    }
    .shadow-textarea textarea.form-control {
        padding-left: 0.8rem;
    }
</style>


<?php 
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    // echo "<pre>";print_r($row);
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}

$course_options = array('' => "Select Course");
foreach ($class_list as $row1) {

    // echo "<pre>";print_r($row1);
    $course_options[$row1->ClassId] = $row1->ClassName;
}

?>
<section id="content">

    <div class="container info-blocks" style ="padding: 3%">
        <!---------------------------form header ------------------------------------------------>
        <form action="<?php echo base_url();?>index.php/welcomes/admission" method="post" enctype="multipart/form-data">
        <div class="row">
           <div class="col-md-3">
            <div class="kv-avatar">
                <div class="file-loading">
                    <input id="avatar-1" name="image" type="file" >
                </div>
            </div>
        </div>
        <div class="col-md-5 text-center">
            
           <h4>বিসিএস পরিক্রমা </h4>
           
          
         
          <h4>প্রধান কার্যালয়</h4>
<p> 
27, ইন্দিরা রোড (২ য় তলা), ফার্মগেট
তেজগাঁও, ঢাকা -১২১৫
</p>
           
           
            ভর্তি ফরম
            <p> <div class="row">

               
          </div> </p>
      </div>
      <div class="col-md-4">


      
          <div class="form-group row" style="padding: 1%">
            <label for="colFormLabelSm" class="text-right col-sm-4 col-form-label col-form-label-sm">Branch </label>
            <div class="col-sm-8">
                <?php
                 echo form_dropdown('BranchId', $branch_options, set_value('BranchId', (isset($row->BranchId) ? $row->BranchId : "")), 'id="BranchId" class="form-control"'); ?>
          <i class="arrow double"></i> <?php echo form_error('BranchId'); 

                
                ?>
                <!-- <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm"> -->
            </div>
        </div>
        <div class="form-group row " style="padding: 1%">
            <label for="colFormLabel" class="text-right col-sm-4 col-form-label">Course</label>
            <div class="col-sm-8">
               <?php echo form_dropdown('CourseId', $course_options, set_value('CourseId', (isset($row->CourseId) ? $row->CourseId : "")), 'id="CourseId" required="required" class="custom_checkbox form-control" '); ?>
                                <?php echo form_error('CourseId'); ?>
          </div>
      </div>

      <div class="form-group row " style="padding: 1%">
            <label for="colFormLabel" class="text-right col-sm-4 col-form-label">Batch</label>
            <div class="col-sm-8">
               <?php echo form_dropdown('BatchId', $course_options, set_value('BatchId', (isset($row->BatchId) ? $row->BatchId : "")), 'id="BatchId" required="required" class="custom_checkbox form-control" '); ?>
                                <?php echo form_error('BatchId'); ?>
          </div>
      </div>

      <div class="form-group row " style="padding: 1%">
            <label for="colFormLabel" class="text-right col-sm-4 col-form-label">Roll No</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="RollNo" name = "RollNo" placeholder="">
          </div>
      </div>
      <div class="form-group row" style="padding: 1%">
        <label for="colFormLabelLg" class="text-right col-sm-4 col-form-label col-form-label-lg">Reg. No</label>
        <div class="col-sm-8">
          <input type="text"  class="form-control form-control-lg" id="StudentCode"  name = "StudentCode" placeholder="">
      </div>
  </div>





</div>
</div>


  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail4">Name : (In Block)</label>
     <input type="text" name="StudentName" id="StudentName"
                    class="event-name gui-input br-light light form-control" required="required"
                    value="<?php echo isset($row->StudentName) ? $row->StudentName : ''; ?>"
                    placeholder="Student Name*">
                    <?php echo form_error('StudentName'); ?>
    </div>
    <div class="form-group col-md-6">
        <label for="inputPassword4">Father's Name</label>
 <input type="text" name="FathersName" id="FathersName"
                  class="event-name gui-input br-light light form-control" required="required"
                  value="<?php echo isset($row->FathersName) ? $row->FathersName : ''; ?>"
                  placeholder="Father's Name">
                  <?php echo form_error('FathersName'); ?>
    </div>

   
  </div>
   



<div class="form-row">

   <div class="form-group col-md-4">
        <label for="inputEmail4">Mother's Name</label>
    <input type="text" name="MothersName" id="MothersName"
                  class="event-name gui-input br-light light form-control"
                  value="<?php echo isset($row->MothersName) ? $row->MothersName : ''; ?>"
                  placeholder="Mother's Name">
                  <?php echo form_error('MothersName'); ?>
    </div>

    <div class="form-group col-md-4">
      <label for="inputPassword4">Academic Year</label>
      <?php echo form_dropdown('Year', $academic_year_list, set_value('Year', (isset($row->Year) ? $row->Year : "")), 'id="Year" class = "form-control" required="required" '); ?>
                    <i class="arrow double"></i>
                    <?php echo form_error('Year'); ?>
  </div>

    <div class="form-group col-md-4">
      <label for="inputEmail4">Admission Date</label>
                      <?php echo form_input(array('name' => 'AdmissionDate','required' => 'required','id' => 'AdmissionDate','type'=>'text','maxlength'=>'100','placeholder'=>'Date Of Admission*','class'=>'event-name gui-input br-light light form-control'),set_value('AdmissionDate',isset($row->AdmissionDate)?$row->AdmissionDate:date('Y-m-d')));?>
                  <?php echo form_error('AdmissionDate'); ?>
  </div>
</div>


  <div class="form-row">
  <div class="form-group col-md-12">
      <div class="form-group shadow-textarea">
          <label for="exampleFormControlTextarea6">Present Address</label>
          <textarea  class="form-control z-depth-1" id="PresentAddress" name="PresentAddress" rows="3" placeholder="Present Address here..."><?php echo isset($row->PresentAddress) ? $row->PresentAddress : ""; ?></textarea>
      </div>
  </div>

  <div class="form-group col-md-12">
      <div class="form-group shadow-textarea">
          <label for="exampleFormControlTextarea6">Permanent Address</label>
           <textarea class="form-control z-depth-1" id="PermanentAddress" name="PermanentAddress" rows="3" placeholder="Permanent Address here..."><?php echo isset($row->PermanentAddress) ? $row->PermanentAddress : ""; ?></textarea>

         
      </div>
  </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputEmail4">Email:</label>
        <input type="text" name="StudentEmail" id="StudentEmail"
                  class="event-name gui-input br-light light form-control"
                  value="<?php echo isset($row->StudentEmail) ? $row->StudentEmail : ''; ?>"
                  placeholder="Student Email">
                  <?php echo form_error('StudentEmail'); ?>
    </div>
    <div class="form-group col-md-4">
        <label for="inputEmail4">Blood Group</label>
        
            <?php echo form_dropdown('BloodGroup', $blood_group_list, set_value('BloodGroup', (isset($row->BloodGroup) ? $row->BloodGroup : "")), 'id="BloodGroup" class="form-control"'); ?>
          <i class="arrow double"></i> <?php echo form_error('BloodGroup'); ?>
     
  </div>
  <div class="form-group col-md-4">
        <label for="inputEmail4">Date of Birth:</label>
     <?php echo form_input(array('name' => 'DateOfBirth','required' => 'required','id' => 'datepicker','type'=>'text','maxlength'=>'100','placeholder'=>'Date Of Birth*','class'=>'event-name gui-input br-light light form-control'),set_value('DateOfBirth',isset($row->DateOfBirth)?$row->DateOfBirth:""));?>
                  <?php echo form_error('DateOfBirth'); ?>
    </div>
  
  
</div>


<div class="form-row">


    <div class="form-group col-md-4">
      <label for="inputPassword4">Occupation</label>
 <?php echo form_dropdown('Occupation', $occupation_list, set_value('Occupation', (isset($row->Occupation) ? $row->Occupation : "")), 'id="Occupation" class="form-control"'); ?>
          <i class="arrow double"></i> <?php echo form_error('Occupation'); ?>
     
  </div> 

  <div class="form-group col-md-4">
      <label for="inputPassword4">Mobile</label>
    <input type="text" name="Contact" id="Contact"
                  class="event-name gui-input br-light light form-control" required="required"
                  
                  value="<?php echo isset($row->Contact) ? $row->Contact : ''; ?>"
                  placeholder="Student Contact*">
                  <?php echo form_error('Contact'); ?>
  </div>
    
    <div class="form-group col-md-4">
        <label for="inputEmail4">Guardian Mobile</label>
    <input type="text" name="GuardianContactNumber" id="GuardianContactNumber"
                  class="event-name gui-input br-light light form-control" required="required"
                  value="<?php echo isset($row->GuardianContactNumber) ? $row->GuardianContactNumber : ''; ?>"
                  placeholder="Guardian's Contact Number">
                  <?php echo form_error('GuardianContactNumber'); ?>
    </div>
    
    
  
</div>


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
      <input type="text" name="SSCYear" id="SSCYear"
                    class="form-control" required="required"
                    value="<?php echo isset($row->SSCYear) ? $row->SSCYear :''; ?>"
                    >
                    <?php echo form_error('SSCYear'); ?>
            </td>
            <td>
       <input type="text" name="SSCBoard" id="SSCBoard"
                    class="form-control" required="required"
                    value="<?php echo isset($row->SSCBoard) ? $row->SSCBoard :''; ?>"
                    >
                    <?php echo form_error('SSCBoard'); ?>  
            </td>
           
            <td>
          <input type="text" name="SSCSubject" id="SSCSubject"
                  class="form-control" required="required"
                  value="<?php echo isset($row->SSCSubject) ? $row->SSCSubject :''; ?>"
                  >
                  <?php echo form_error('SSCSubject'); ?>
            </td> 
            <td>
         <input type="text" name="SSCResult" id="SSCResult"
                class="form-control" required="required"
                value="<?php echo isset($row->SSCResult) ? $row->SSCResult :''; ?>"
                >
                <?php echo form_error('SSCResult'); ?>
            </td>
        </tr>

         <tr>
            <td> 
                 <input type="hidden" class="form-control" id="HSC" name = "HSC"><p class="text-center">H.S.C</p>

            </td>
            <td>
             <label for="txt_code" >
              <input type="text" name="HSCYear" id="HSCYear"
              class="form-control" required="required"
              value="<?php echo isset($row->HSCYear) ? $row->HSCYear :''; ?>"
              >
              <?php echo form_error('HSCYear'); ?>
            </label>

          </td>
          <td>

           <label for="txt_code" >
            <input type="text" name="HSCBoard" id="HSCBoard"
            class="form-control" required="required"
            value="<?php echo isset($row->HSCBoard) ? $row->HSCBoard :''; ?>"
            >
            <?php echo form_error('HSCBoard'); ?>
          </label>

        </td>
        <td>
          <label for="txt_code" >
            <input type="text" name="HSCSubject" id="HSCSubject"
            class="form-control" required="required"
            value="<?php echo isset($row->HSCSubject) ? $row->HSCSubject :''; ?>"
            >
            <?php echo form_error('HSCSubject'); ?>
          </label>
        </td>
        <td>

          <label for="txt_code" >
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
                 <input type="hidden" class="form-control" id="SSC" name = "Graduation"><p class="text-center">Graduation</p>

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
<div class="row" style="padding: 3%">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <button type="submit" style ="width:100%;  " class="btn btn-info text-center">Sign in</button>
    </div>

<div class="col-md-4"></div>
</div>
</form>




</div>
</section>

<?php $this->load->view('Layouts/footer');?>


<?php
class Student extends MY_Model{
    function get_list($limit = null, $offset = null,$cond=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('students.BranchId', $cond['BranchId']);
            }
            if(isset($cond['BatchId']) and !empty($cond['BatchId'])){
                $this->db->where('students.BatchId', $cond['BatchId']);
            }
            if(isset($cond['CourseId']) and !empty($cond['CourseId'])){
                $this->db->where('students.CourseId', $cond['CourseId']);
            }
            if(isset($cond['StudentName']) and !empty($cond['StudentName'])){
                $where = "(students.StudentCode LIKE '%{$cond['StudentName']}%' OR students.StudentName LIKE '%{$cond['StudentName']}%')";
                $this->db->where($where);
//                $this->db->like('students.StudentName', $cond['StudentName']);
            }
            if(isset($cond['Contact']) and !empty($cond['Contact'])){
                $where = "(students.Contact LIKE '%{$cond['Contact']}%')";
                $this->db->where($where);
//                $this->db->like('students.StudentName', $cond['StudentName']);
            }
        }
         $this->db->where('students.Status', 1);
        $this->db->select('students.*, batches.BatchName,config_classes.ClassName,config_classes.ClassId');
        $this->db->from('students');
        $this->db->join('batches', 'students.BatchId = batches.BatchId');
        $this->db->join('config_classes', 'students.CourseId = config_classes.ClassId');
        $this->db->order_by('students.StudentId','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
       // $sham =  $this->db->get()->result();
        // echo "<pre>";print_r($this->db->last_query());die;
        return $this->db->get()->result();

    } 
    
    function get_pending_student_list($limit = null, $offset = null,$cond=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('students.BranchId', $cond['BranchId']);
            }
            if(isset($cond['BatchId']) and !empty($cond['BatchId'])){
                $this->db->where('students.BatchId', $cond['BatchId']);
            }
            if(isset($cond['CourseId']) and !empty($cond['CourseId'])){
                $this->db->where('students.CourseId', $cond['CourseId']);
            }
            if(isset($cond['StudentName']) and !empty($cond['StudentName'])){
                $where = "(students.StudentCode LIKE '%{$cond['StudentName']}%' OR students.StudentName LIKE '%{$cond['StudentName']}%')";
                $this->db->where($where);
//                $this->db->like('students.StudentName', $cond['StudentName']);
            }
            if(isset($cond['Contact']) and !empty($cond['Contact'])){
                $where = "(students.Contact LIKE '%{$cond['Contact']}%')";
                $this->db->where($where);
//                $this->db->like('students.StudentName', $cond['StudentName']);
            }
        }
         $this->db->where('students.Status', 0);
        $this->db->select('students.*, batches.BatchName,config_classes.ClassName,config_classes.ClassId');
        $this->db->from('students');
        $this->db->join('batches', 'students.BatchId = batches.BatchId');
        $this->db->join('config_classes', 'students.CourseId = config_classes.ClassId');
        $this->db->order_by('students.StudentId','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
       // $sham =  $this->db->get()->result();
        // echo "<pre>";print_r($this->db->last_query());die;
        return $this->db->get()->result();

    }

    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->like('students.BranchId', $cond['BranchId']);
            }
            if(isset($cond['BatchId']) and !empty($cond['BatchId'])){
                $this->db->where('students.BatchId', $cond['BatchId']);
            }
            if(isset($cond['CourseId']) and !empty($cond['CourseId'])){
                $this->db->where('students.CourseId', $cond['CourseId']);
            }
           
            if(isset($cond['StudentName']) and !empty($cond['StudentName'])){
                $where = "(students.StudentCode LIKE '%{$cond['StudentName']}%' OR students.StudentName LIKE '%{$cond['StudentName']}%' OR students.StudentName LIKE '%{$cond['StudentName']}%')";
                $this->db->where($where);
//                $this->db->like('students.StudentName', $cond['StudentName']);
            }
            if(isset($cond['Contact']) and !empty($cond['Contact'])){
                $where = "(students.Contact LIKE '%{$cond['Contact']}%')";
                $this->db->where($where);
//                $this->db->like('students.StudentName', $cond['StudentName']);
            }
        }
        $this->db->select('students.*');
        return $this->db->count_all_results('students');
    }
    function read($id){
        return $this->db->get_where('students',array('StudentId'=>$id))->row();
    }
    function add($data)
    {
        $data['EntryBy']=$this->session->userdata('user_id');
        $data['EntryDate']=date('Y-m-d');
        return $this->db->insert('students',$data);
    }
    function add_batch($data)
    {
        return $this->db->insert_batch('students', $data);
    }
    function edit($data){
        return $this->db->update('students', $data, array('StudentId'=> $data['StudentId']));
    }
    function delete($id)
    {
        $this->db->where('StudentId',$id);
        $this->db->delete('students');
        return true;
    }
    function read_parent($id){
        return $this->db->get_where('parents',array('StudentId'=>$id))->row();
    }
    function delete_parents($id)
    {
        $this->db->where('StudentId',$id);
        $this->db->delete('parents');
        return true;
    }
    function get_student_list($class_id,$section_id=null,$BranchId){
        $condition = "";
        if(!empty($class_id)) {
            $condition = " AND CourseId = '$class_id' ";
        }
        if(!empty($section_id)) {
            $condition = " AND BatchId = '$section_id' "; 
        }
        $q = "SELECT * FROM students WHERE BranchId=$BranchId AND students.Status =1
              $condition ORDER BY RollNo ASC ";
        $results = $this->db->query($q);
        $results = $results->result_array();
        $students = array();
        foreach($results as $row){
            $students[$row['StudentId']]['StudentId'] = $row['StudentId'];
            $students[$row['StudentId']]['StudentName'] = $row['StudentName'];
            $students[$row['StudentId']]['StudentCode'] = $row['StudentCode'];
            $students[$row['StudentId']]['RollNo'] = $row['RollNo'];
            $students[$row['StudentId']]['FathersName'] = $row['FathersName'];
            $students[$row['StudentId']]['MothersName'] = $row['MothersName'];
            $students[$row['StudentId']]['AdmissionDate'] = $row['AdmissionDate'];
            $students[$row['StudentId']]['Contact'] = $row['Contact'];
        }
        return $students;
    }

    function get_student_list_for_lecture($class_id,$BranchId){
        $condition = "";
        if(!empty($class_id)) {
            $condition = " AND CourseId = '$class_id' ";
        }
       
        $q = "SELECT * FROM students WHERE BranchId=$BranchId
              $condition ORDER BY RollNo ASC ";
        $results = $this->db->query($q);
        $results = $results->result_array();
        $students = array();
        foreach($results as $row){
            $students[$row['StudentId']]['StudentId'] = $row['StudentId'];
            $students[$row['StudentId']]['StudentName'] = $row['StudentName'];
            $students[$row['StudentId']]['StudentCode'] = $row['StudentCode'];
            
        }
        return $students;
    }


    function get_student_list_sham($class_id,$BranchId){
        $condition = "";
        if(!empty($class_id)) {
            $condition = " AND StudentId = '$class_id' ";
        }
        
        $q = "SELECT * FROM students WHERE BranchId=$BranchId
              $condition ORDER BY RollNo ASC ";
        $results = $this->db->query($q);
        $results = $results->result_array();
        $students = array();
        foreach($results as $row){
            $students[$row['StudentId']]['StudentId'] = $row['StudentId'];
            $students[$row['StudentId']]['StudentName'] = $row['StudentName'];
            $students[$row['StudentId']]['StudentCode'] = $row['StudentCode'];
            $students[$row['StudentId']]['RollNo'] = $row['RollNo'];
            $students[$row['StudentId']]['FathersName'] = $row['FathersName'];
            $students[$row['StudentId']]['MothersName'] = $row['MothersName'];
            $students[$row['StudentId']]['AdmissionDate'] = $row['AdmissionDate'];
            $students[$row['StudentId']]['CourseId'] = $row['CourseId'];
            $students[$row['StudentId']]['Contact'] = $row['Contact'];
        }
        return $students;
    }

    function get_student_list_payment($class_id,$BranchId){
        
        $query_course = $this->db->query("SELECT CourseId FROM students WHERE StudentId = $class_id")->result();
        $course = $query_course[0]->CourseId;
        
        // echo "<pre>";print_r($query_course[0]->CourseId);die;
        $query = $this->db->query("SELECT fee_details.*,fee_types.TypeName,SUM(fees.TotalAmount) AS PaidAmount,fee_configurations.Amount AS ActualAmount FROM fee_details JOIN fee_types ON fee_details.TypeId = fee_types.TypeId
            JOIN fees ON fee_details.FeeId = fees.FeeId
 
         JOIN fee_configurations ON fee_details.TypeId = fee_configurations.TypeId WHERE fee_details.StudentId = $class_id AND fee_configurations.CourseId = $course AND fee_details.BranchId = $BranchId GROUP BY fees.StudentId")->result_array();

        // echo "<pre>";print_r($this->db->last_query());die;
         $due_date = $this->db->query("SELECT DueDate FROM fee_details WHERE StudentId = $class_id ORDER BY FeeDetailsId DESC")->row();
       
        $students = array();
        foreach($query as $row){

           
            $students[$row['StudentId']]['StudentId'] = $row['StudentId'];
            $students[$row['StudentId']]['TransactionDate'] = $row['TransactionDate'];
            $students[$row['StudentId']]['CourseId'] = $row['CourseId'];
            $students[$row['StudentId']]['TypeName'] = $row['TypeName'];
            $students[$row['StudentId']]['PaidAmount'] = $row['PaidAmount'];
            $students[$row['StudentId']]['ActualAmount'] = $row['ActualAmount'];
            $students[$row['StudentId']]['DueDate'] = $due_date->DueDate;

            $current_balance = ($row['ActualAmount']-$row['PaidAmount']);
           
                $students[$row['StudentId']]['balance'] = $current_balance;
           
           
        }

         // echo "<pre>";print_r($students);die;
        return $students;
    }


        function get_student_list_for_marks($class_id,$section_id,$BranchId,$SubjectId){
        $condition = "";
        if(!empty($class_id)) {
            $condition = " AND subject_wise_marks.ClassId = '$class_id' ";
        }
        if(!empty($SubjectId)) {
            $condition = " AND subject_wise_marks.SubjectId = '$SubjectId' ";
        }
        if(!empty($section_id)) {
            $condition = " AND students.SectionId = '$section_id' ";
        }

        $results = $this->db->query("SELECT config_subjects.SubjectName,subject_wise_marks.*,students.* FROM subject_wise_marks JOIN students ON subject_wise_marks.BranchId = students.BranchId AND subject_wise_marks.ClassId = students.ClassId JOIN config_subjects ON subject_wise_marks.SubjectId = config_subjects.SubjectId AND subject_wise_marks.BranchId = config_subjects.BranchId WHERE subject_wise_marks.BranchId=$BranchId
              $condition ORDER BY RollNo ASC ")->result_array();

        $students = array();
        foreach($results as $row){
            $sub_pass_mark = ($row['SubMark']*$row['PassMark'])/100;
            $obj_pass_mark = ($row['ObjMark']*$row['PassMark'])/100;
            if($row['PraMark'] == 0){
                $pra_pass_mark = "0 ";
            }else{
                $pra_pass_mark = ($row['PraMark']*$row['PassMark'])/100;
            }
            $students[$row['StudentId']]['StudentId'] = $row['StudentId'];
            $students[$row['StudentId']]['StudentName'] = $row['StudentName'];
            $students[$row['StudentId']]['StudentCode'] = $row['StudentCode'];
            $students[$row['StudentId']]['RollNo'] = $row['RollNo'];
            $students[$row['StudentId']]['TotalMark'] = $row['TotalMark'];
            $students[$row['StudentId']]['PassMark'] = $row['PassMark'];

            
            $students[$row['StudentId']]['sub_mark'] = $sub_pass_mark;
            $students[$row['StudentId']]['obj_mark'] = $obj_pass_mark;
            $students[$row['StudentId']]['pra_mark'] = $pra_pass_mark;


            $students[$row['StudentId']]['ObjMark'] = $row['ObjMark'];
            $students[$row['StudentId']]['SubMark'] = $row['SubMark'];
            $students[$row['StudentId']]['PraMark'] = $row['PraMark'];
            $students[$row['StudentId']]['SubjectName'] = $row['SubjectName'];
        }
        return $students;
    }
    function get_student_code($batch_id,$BranchId){
        $q = "SELECT RollNo
                FROM students
                WHERE students.BranchId=$BranchId
                AND students.BatchId=$batch_id
               
                
                ORDER BY students.StudentId DESC LIMIT 0,1";
        $results = $this->db->query($q);
        $results = $results->row();
        $next_roll = 1;
        if(isset($results)){
            $next_roll = $results->RollNo+1;
        }
        $organization_info = $this->Organization->read(1);
        $prefix = "";
        if(isset($organization_info->StudentCodePrefix)){
            $prefix = $organization_info->StudentCodePrefix;
        }
        $branch_info = $this->Branch->read($BranchId);
       


        $student_code = $prefix.$branch_info->BranchCode.$batch_id.sprintf("%02d", $next_roll);
        return $student_code;
    }
    function get_student_code_by_roll($class_id,$section_id,$BranchId,$roll){
        $branch_info = $this->Branch->read($BranchId);
        $class_info = $this->Config_class->read($class_id);
        $section_info = $this->Config_section->read($section_id);

        $student_code = $branch_info->BranchCode.$class_info->ClassCode.$section_info->SectionCode.sprintf("%02d", $roll);
        return $student_code;
    }
    function get_student_roll($batch_id,$BranchId){
        $q = "SELECT RollNo
                FROM students
                WHERE students.BranchId=$BranchId
                AND students.BatchId=$batch_id
                
                ORDER BY students.StudentId DESC LIMIT 0,1";
        $results = $this->db->query($q);
        $results = $results->row();
        $next_roll = 1;
        if(isset($results)){
            $next_roll = $results->RollNo+1;
        }
        //$next_roll = sprintf("%02d", $next_roll);
        return $next_roll;
    }
    function check_for_duplicate_entry($CourseId,$roll_no,$BranchId,$BatchId){
        $q = "SELECT StudentId
                FROM students
                WHERE students.BranchId=$BranchId
                AND students.CourseId=$CourseId
                AND students.BatchId = $BatchId
               
                AND students.RollNo = $roll_no";
        $results = $this->db->query($q);
        $results = $results->row();
        return $results;
    }
    function get_student_information($id){
        $query = "SELECT `students`.*, `batches`.`BatchName`,branches.`BranchName`,config_classes.`ClassName` AS CourseName
                    FROM `students`
                    JOIN `batches` ON `students`.`BatchId` = `batches`.`BatchId`
                    JOIN `config_classes` ON `students`.`CourseId` = `config_classes`.`ClassId`
                    JOIN `branches` ON `students`.`BranchId` = `branches`.`BranchId`
                    WHERE students.`StudentId` = $id";
        $query = $this->db->query($query);
        $student_info = $query->row();
        return $student_info;
    }
    function get_student_list_auto($search_key = '', $BranchId)
    {
        $search_key = TRIM($search_key);
        $groups = $this->db->query("SELECT `students`.*,  `batches`.`BatchName`,`config_classes`.`ClassName` AS CourseName,`config_classes`.`ClassId` AS CourseId,branches.`BranchName`
                    FROM `students`
                    JOIN `batches` ON `students`.`BatchId` = `batches`.`BatchId`
                    JOIN `config_classes` ON `students`.`CourseId` = `config_classes`.`ClassId`
                    JOIN `branches` ON `students`.`BranchId` = `branches`.`BranchId`
                    WHERE students.`BranchId` = $BranchId
                    AND (students.`StudentName` LIKE '%$search_key%' OR students.`StudentCode` LIKE '%$search_key%' OR students.`Contact` LIKE '%$search_key%')");
        //echo $this->db->last_query();
        return $groups->result();
    }
    function get_branch_wise_students($BranchId){
        
        $branch_info = $this->Branch->read($BranchId);
        if(!empty($BranchId) && $branch_info->IsHeadOffice == 0) {
            $condition = " WHERE students.BranchId = '$BranchId' AND students.Status = 1 ";
        }
        else{
           $condition = "WHERE students.Status = 1"; 
        }
        $q = "SELECT COUNT(StudentId) AS StudentNumber
              FROM students $condition";
        $results = $this->db->query($q);
        $results = $results->row()->StudentNumber;
        return $results;
    }
    function get_male_female_wise_student_number($BranchId,$Gender){
        $condition = "";
        $branch_info = $this->Branch->read($BranchId);
        if(!empty($BranchId) && $branch_info->IsHeadOffice == 0) {
            $condition = " WHERE students.BranchId = '$BranchId'";
            
                $condition .= " GROUP BY students.BatchId ORDER BY batches.`BatchId` ASC";
            
        }else{
            
                $condition .= " GROUP BY students.BatchId ORDER BY batches.`BatchId` ASC";
            }
        
        $q = "SELECT batches.`BatchName` as label,COUNT(StudentId) AS y
            FROM students 
            JOIN `batches` ON students.`BatchId` = batches.`BatchId`
            $condition";
        $results = $this->db->query($q);
        $results = $results->result_array();
        //echo '<pre>'; echo $this->db->last_query(); die;
        return $results;
    }
    function update_student_code(){
        $query = "SELECT * FROM students";
        $results = $this->db->query($query);
        $results = $results->result_array();
        $this->db->trans_start();
        foreach ($results as $row){
            $student_previous_code = $row['StudentCode'];
            $replacement = $row['Shift'].$row['Medium'];
            $new_code =  substr_replace($student_previous_code, $replacement, 3, 0);
            $student_array=array();
            $student_array['StudentId'] = $row['StudentId'];
            $student_array['StudentCode'] = $new_code;
            $student_array['PreviousCode'] = $student_previous_code;
            $this->db->update('students', $student_array, array('StudentId'=> $student_array['StudentId']));
        }
        $this->db->trans_complete();
        return $this->db->trans_status();

    }

    public function get_student_for_attendance($branch_id){
        $query = "SELECT * FROM students WHERE BranchId=$branch_id";
        $results = $this->db->query($query);
        $results = $results->result();
        // echo "<pre>";print_r($results);die;
        return $results; 

    }


    function get_branch_wise_pending_students($BranchId){
        $condition = "WHERE ";
        $branch_info = $this->Branch->read($BranchId);
        if(!empty($BranchId) && $branch_info->IsHeadOffice == 0) {
            $condition = " WHERE students.BranchId = '$BranchId' AND students.Status = 0 ";
        }else{
          $condition = " WHERE students.Status = 0 ";
        }
        $q = "SELECT COUNT(StudentId) AS StudentNumber
              FROM students $condition";
        $results = $this->db->query($q);
        // $sham = $results->row()->StudentNumber;
        // echo "<pre>";print_r($this->db->last_query());die;
        $results = $results->row()->StudentNumber;
        return $results;
    }

    function update_pending_student_to_active($StudentId){
        $student_array=array();
        $student_array['Status'] = 1;
     // echo "rr<pre>";print_r($student_array);die;
     // $sham =  $this->db->update('students', $student_array, array('StudentId'=> $StudentId));
     // echo "<pre>";print_r($this->db->last_query());die;
       return $this->db->update('students', $student_array, array('StudentId'=> $StudentId));
    
    }

    public function get_batch_info ($BranchId,$CourseId){
    $query = "SELECT BatchId,BatchName FROM batches WHERE batches.BranchId=$BranchId AND batches.CourseId=$CourseId ORDER BY BatchId DESC ";
    $results = $this->db->query($query)->result_array();
 
    
    return $results;

}

public function get_student_code_new ($BranchId,$CourseId,$BatchId){
    $query = "SELECT RollNo FROM students WHERE students.BranchId=$BranchId AND students.CourseId = $CourseId AND students.BatchId = $BatchId ORDER BY students.RollNo DESC LIMIT 1";
    $results = $this->db->query($query);
    $results = $results->row();
    $next_roll = 1;
    if(isset($results)){
        $next_roll = $results->RollNo+1;
    }

     $student_code = $BranchId.$CourseId.$BatchId.sprintf("%02d", $next_roll);
     return $student_code;


}

public function get_student_roll_new ($BranchId,$CourseId,$BatchId){
$query = "SELECT RollNo FROM students WHERE students.BranchId=$BranchId AND students.CourseId = $CourseId AND students.BatchId = $BatchId ORDER BY students.RollNo DESC LIMIT 1";
    $results = $this->db->query($query);
    $results = $results->row();
    $next_roll = 1;
    if(isset($results)){
        $next_roll = $results->RollNo+1;
    }

    return $next_roll;

}

function get_student_information_for_payment_report($id){
        $query = "SELECT `students`.*, `batches`.`BatchName`,branches.`BranchName`,config_classes.`ClassName` AS CourseName
                    FROM `students`
                    JOIN `batches` ON `students`.`BatchId` = `batches`.`BatchId`
                    JOIN `config_classes` ON `students`.`CourseId` = `config_classes`.`ClassId`
                    JOIN `branches` ON `students`.`BranchId` = `branches`.`BranchId`
                    WHERE students.`StudentId` = $id AND students.Status = 1";
        $query = $this->db->query($query);
        $student_info = $query->row();
        return $student_info;
    }
    
        function get_student_list_payment_for_report($CourseId,$BranchId,$BatchId){
        
        $condition = "";
        if(!empty($BatchId)) {
            $condition = " AND students.BatchId = $BatchId ";
        }
        
        // echo "<pre>";print_r($query_course[0]->CourseId);die;
        $query = $this->db->query("SELECT fee_details.*,config_classes.ClassName,students.AdmissionDate,students.StudentName,students.StudentCode,students.Contact,fee_types.TypeName,SUM(fees.TotalAmount) AS PaidAmount,fee_configurations.Amount AS ActualAmount FROM fee_details JOIN fee_types ON fee_details.TypeId = fee_types.TypeId
            JOIN fees ON fee_details.FeeId = fees.FeeId
            JOIN students ON fee_details.StudentId = students.StudentId
            JOIN config_classes ON fee_details.CourseId = config_classes.ClassId
 
         JOIN fee_configurations ON fee_details.TypeId = fee_configurations.TypeId WHERE  fee_configurations.CourseId = $CourseId 
         AND fee_details.BranchId = $BranchId AND fee_details.CourseId = $CourseId $condition GROUP BY fees.StudentId ")->result_array();

        // echo "<pre>";print_r($this->db->last_query());die;

         // echo "<pre>";print_r($query);die;
        return $query;
    }

}
?>
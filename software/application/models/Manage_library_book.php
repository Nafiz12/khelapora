<?php
class Manage_library_book extends CI_Model{
    function get_list($limit = null, $offset = null,$cond=null){
        if(is_array($cond)){
            if(isset($cond['StudentId']) and !empty($cond['StudentId'])){
                $this->db->where('distribution_lists'.'StudentId', $cond['StudentId']);
            }
            if(isset($cond['BookId']) and !empty($cond['BookId'])){
                $this->db->where('distribution_lists'.'BookId', $cond['BookId']);
            }
        }
         $this->db->where('distribution_lists.BranchId',$cond['BranchId']);
        $this->db->select('distribution_lists.*,books.BookName,students.StudentName,students.StudentCode,book_types.*,config_subjects.SubjectName,config_classes.ClassName');
        $this->db->join('books', 'books.BookId = distribution_lists.BookId');
        $this->db->join('book_types', 'book_types.TypeId = distribution_lists.TypeId');
        $this->db->join('students', 'students.StudentId = distribution_lists.StudentId');
        $this->db->join('config_subjects', 'config_subjects.SubjectId = distribution_lists.SubjectId');
        $this->db->join('config_classes', 'config_classes.ClassId = distribution_lists.ClassId');
        $this->db->order_by('distribution_lists.DistributionId','DESC');
        $this->db->from('distribution_lists');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();
    }


    function get_student_wise_lectures($student_id,$BranchId){

        $query = $this->db->query("SELECT SUM(distribution_lists.Number) AS total_lecture,books.BookName,students.StudentName,students.StudentCode,book_types.*,
        config_subjects.SubjectName,config_classes.ClassName FROM distribution_lists JOIN books ON books.BookId = distribution_lists.BookId JOIN book_types ON
        book_types.TypeId = distribution_lists.TypeId JOIN students ON students.StudentId = distribution_lists.StudentId JOIN config_subjects ON 
        config_subjects.SubjectId = distribution_lists.SubjectId JOIN config_classes ON config_classes.ClassId = distribution_lists.ClassId
        WHERE distribution_lists.StudentId = $student_id AND distribution_lists.BranchId = $BranchId  GROUP BY distribution_lists.TypeId,distribution_lists.SubjectId")->result_array();
        return $query;

          
    }
    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['StudentId']) and !empty($cond['StudentId'])){
                $this->db->where('distribution_lists.StudentId', $cond['StudentId']);
            }
            if(isset($cond['BookId']) and !empty($cond['BookId'])){
                $this->db->where('distribution_lists.BookId', $cond['BookId']);
            }
        }
        $this->db->select('distribution_lists.*');
        return $this->db->count_all_results('distribution_lists');
    }
    function read($id){
        return $this->db->get_where('distribution_lists',array('DistributionId'=>$id))->row();
    }
    function add($data)
    {
        return $this->db->insert('distribution_lists', $data);
    }
    function edit($data,$id){
        // echo "<pre>";print_r($data);die;
       return $this->db->update('distribution_lists', $data, array('DistributionId'=> $id));
           
    }
    function delete($exam_id,$year,$class_id,$section_id,$subject_id)
    {
        $this->db->trans_start();
        $this->db->where('ExamId', $exam_id);
        $this->db->where('Year', $year);
        $this->db->where('ClassId', $class_id);
        $this->db->where('SectionId', $section_id);
        $this->db->where('SubjectId', $subject_id);
        $this->db->delete('student_books');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function get_subject_list_for_lecture($subject_id,$type_id){
        // $query = $this->db->query("SELECT books.BookId,books.BookName FROM books WHERE books.SubjectId = $subject_id AND books.TypeId = $type_id")->result();
        $q = "SELECT books.BookId,books.BookName FROM books WHERE books.SubjectId = $subject_id AND books.TypeId = $type_id";
        $results = $this->db->query($q);
        $results = $results->result_array();
        $query = array();
        foreach($results as $row){
            $query[$row['BookId']]['BookId'] = $row['BookId'];
            $query[$row['BookId']]['BookName'] = $row['BookName'];
           
            
        }
        return $query;
    }
    function get_opening_book_number($BookId){
            $query = $this->db->query("SELECT NumberOfBooks FROM books WHERE BookId = $BookId")->result();
             // echo "dd<pre>";print_r($query[0]->NumberOfBooks);die;
             return $query[0]->NumberOfBooks;
    }


    function get_new_group_id(){
        $query = "SELECT IFNULL(`student_books`.`GroupId`,0) AS GroupId
                    FROM `student_books`
                    ORDER BY student_books.`AttendanceId` DESC LIMIT 0,1;";
        $query = $this->db->query($query)->row();
        $groupId = 1;
        if(!empty($query)){
            $groupId =$groupId+$query->GroupId;
        }
        return $groupId;
    }
    function check_duplicate_entry_for_attendance($Date,$ClassId,$SectionId){
        $query = "SELECT IFNULL(COUNT(AttendanceId),0) AS AttendanceId
                    FROM `student_books`
                    WHERE ClassId = $ClassId
                    AND SectionId = $SectionId
                    AND Date = '$Date'";
        return $this->db->query($query)->row()->AttendanceId;
    }
    function get_mark_information($exam_id,$year,$class_id,$section_id,$subject_id){
        $query = "SELECT m.`MarkId`,m.`ClassID`,m.`SectionId`,m.`SubjectId`,m.`StudentId`,CONCAT(s.`StudentName`,' - ',s.`StudentCode`) AS StudentName,s.RollNo,m.`SbaMark`,m.`SubjectiveMark`,m.`ObjectiveMark`,m.`TotalMark`
                FROM `student_books` m
                JOIN students s ON m.`StudentId` = s.`StudentId`
                WHERE m.`ClassID` = $class_id
                AND m.`SectionId` = $section_id
                AND m.`Year` = '$year'
                AND m.`ExamId` = $exam_id
                AND m.`SubjectId` = $subject_id;";
        return $this->db->query($query)->result_array();
    }
    function check_for_duplicate($class_id,$section_id,$year,$examId,$subjectId){
        $query = $this->db->query("SELECT IFNULL(COUNT(m.MarkId),0) AS id
                    FROM `student_books` m
                    WHERE m.`ClassID`=$class_id
                    AND m.`SectionId` = $section_id
                    AND m.`Year`='$year'
                    AND m.`ExamId` = $examId
                    AND m.`SubjectId`=$subjectId")->row()->id;
        return $query;
    }
    function get_mark_information_by_class_section_subject($exam_id,$year,$class_id,$section_id,$subject_id){
        $query = "SELECT m.*,CONCAT(s.`StudentName`,' - ',s.`StudentCode`) AS StudentName,s.RollNo
                FROM `student_books` m
                JOIN students s ON m.`StudentId` = s.`StudentId`
                WHERE m.`ClassID` = $class_id
                AND m.`SectionId` = $section_id
                AND m.`Year` = '$year'
                AND m.`ExamId` = $exam_id
                AND m.`SubjectId` = $subject_id";
        $query = $this->db->query($query)->result_array();
        $mark_array = array();
        $mark_data = array();
        foreach($query as $row){
            $mark_data['ClassId'] = $row['ClassID'];
            $mark_data['SectionId'] = $row['SectionId'];
            $mark_data['Year'] = $row['Year'];
            $mark_data['ExamId'] = $row['ExamId'];
            $mark_data['SubjectId'] = $row['SubjectId'];
            $mark_array[$row['MarkId']]['MarkId'] = $row['MarkId'];
            $mark_array[$row['MarkId']]['ClassID'] = $row['ClassID'];
            $mark_array[$row['MarkId']]['SectionId'] = $row['SectionId'];
            $mark_array[$row['MarkId']]['Year'] = $row['Year'];
            $mark_array[$row['MarkId']]['ExamId'] = $row['ExamId'];
            $mark_array[$row['MarkId']]['StudentId'] = $row['StudentId'];
            $mark_array[$row['MarkId']]['SubjectId'] = $row['SubjectId'];
            $mark_array[$row['MarkId']]['SbaMark'] = $row['SbaMark'];
            $mark_array[$row['MarkId']]['SubjectiveMark'] = $row['SubjectiveMark'];
            $mark_array[$row['MarkId']]['ObjectiveMark'] = $row['ObjectiveMark'];
            $mark_array[$row['MarkId']]['TotalMark'] = $row['TotalMark'];
            $mark_array[$row['MarkId']]['StudentName'] = $row['StudentName'];
            $mark_array[$row['MarkId']]['RollNo'] = $row['RollNo'];
        }
        $return_data['mark_data'] = $mark_data;
        $return_data['mark_array'] = $mark_array;
        return $return_data;

    }
    function get_tabulation_sheet_data($data){
        $ClassId = $data['ClassId'];
        $SectionId = $data['SectionId'];
        $Year = $data['Year'];
        $ExamId = $data['ExamId'];
        $query = "SELECT m.*
                FROM `student_books` m
                WHERE m.`ClassID` = $ClassId
                AND m.`SectionId` = $SectionId
                AND m.`Year` = '$Year'
                AND m.`ExamId` = $ExamId";
        $query = $this->db->query($query)->result_array();
        $tabulation_sheet_data = array();
        foreach($query as $row){
            $tabulation_sheet_data[$row['StudentId']][$row['SubjectId']]['SbaMark'] = $row['SbaMark'];
            $tabulation_sheet_data[$row['StudentId']][$row['SubjectId']]['SubjectiveMark'] = $row['SubjectiveMark'];
            $tabulation_sheet_data[$row['StudentId']][$row['SubjectId']]['ObjectiveMark'] = $row['ObjectiveMark'];
            $tabulation_sheet_data[$row['StudentId']][$row['SubjectId']]['TotalMark'] = $row['TotalMark'];
        }
        return $tabulation_sheet_data;
    }
    function get_mark_sheet_data($data){
        $ClassId = $data['ClassId'];
        $SectionId = $data['SectionId'];
        $Year = $data['Year'];
        $StudentId = $data['StudentId'];
        $query = "SELECT m.*
                FROM `student_books` m
                WHERE m.`ClassID` = $ClassId
                AND m.`SectionId` = $SectionId
                AND m.`StudentId` = $StudentId
                AND m.`Year` = '$Year'";
        $query = $this->db->query($query)->result_array();
        $mark_sheet_data = array();
        foreach($query as $row){
            $mark_sheet_data[$row['SubjectId']][$row['ExamId']]['SbaMark'] = $row['SbaMark'];
            $mark_sheet_data[$row['SubjectId']][$row['ExamId']]['SubjectiveMark'] = $row['SubjectiveMark'];
            $mark_sheet_data[$row['SubjectId']][$row['ExamId']]['ObjectiveMark'] = $row['ObjectiveMark'];
            $mark_sheet_data[$row['SubjectId']][$row['ExamId']]['TotalMark'] = $row['TotalMark'];
        }
        return $mark_sheet_data;
    }
    function get_mark_sheet_exam_wise_total_data($data){
        $ClassId = $data['ClassId'];
        $SectionId = $data['SectionId'];
        $Year = $data['Year'];
        $StudentId = $data['StudentId'];
        $query = "SELECT SUM(m.TotalMark) AS TotalMark,m.`ExamId`
                FROM `student_books` m
                WHERE m.`ClassID` = $ClassId
                AND m.`SectionId` = $SectionId
                AND m.`StudentId` = $StudentId
                AND m.`Year` = '$Year'";
        $query = $this->db->query($query)->result_array();
        $mark_sheet_data = array();
        foreach($query as $row){
            $mark_sheet_data[$row['ExamId']]['TotalMark'] = $row['TotalMark'];
        }
        return $mark_sheet_data;
    }

}
?>
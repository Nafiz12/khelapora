<?php
class Exam_routine extends MY_Model {
    function get_list($limit = null, $offset = null,$cond=null){
        if(is_array($cond)){
            if (isset($cond['BranchId']) and !empty($cond['BranchId'])) {
                $this->db->where('exam_routines.BranchId', $cond['BranchId']);
            }
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('exam_routines.ClassId', $cond['ClassId']);
            }
        }
        $this->db->select('exam_routines.*,exams.ExamName,config_classes.ClassName');
        $this->db->from('exam_routines');
        $this->db->join('config_classes', 'exam_routines.ClassId = config_classes.ClassId');
        $this->db->join('exams', 'exam_routines.ExamId = exams.ExamId');
        $this->db->order_by('exam_routines.Year','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();

    }
    function row_count($cond=null){
        if(is_array($cond)){
            if (isset($cond['BranchId']) and !empty($cond['BranchId'])) {
                $this->db->where('exam_routines.BranchId', $cond['BranchId']);
            }
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('exam_routines.ClassId', $cond['ClassId']);
            }
        }
        $this->db->select('exam_routines.*');
        return $this->db->count_all_results('exam_routines');
    }
    function read($id){
        return $this->db->get_where('exam_routines',array('RoutineId'=>$id))->row();
    }
    function read_routine($id){
        $this->db->select('exam_routines.*,config_classes.ClassName');
        $this->db->from('exam_routines');
        $this->db->join('config_classes', 'exam_routines.ClassId = config_classes.ClassId');
        $this->db->where('exam_routines.RoutineId', $id);
        $data =$this->db->get()->row();
        return $data;
    }
    function get_routine_details_information($id){
        $this->db->select('exam_routine_details.*,config_subjects.SubjectName');
        $this->db->from('exam_routine_details');
        $this->db->join('config_subjects', 'exam_routine_details.SubjectId = config_subjects.SubjectId');
        $this->db->where('exam_routine_details.RoutineId', $id);
        return $this->db->get()->result_array();

    }
    function add_details($data) {
        return $this->db->insert_batch('exam_routine_details', $data);
    }
    function add($data)
    {
        return $this->db->insert('exam_routines', $data);
    }
    function edit($data){
        $this->db->trans_start();
        foreach($data as $row){
            $this->db->update('exam_routines', $row, array('RoutineId'=> $row['RoutineId']));
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function delete($id)
    {
        $this->db->trans_start();
        $this->db->where('RoutineId', $id);
        $this->db->delete('exam_routines');

        $this->db->where('RoutineId', $id);
        $this->db->delete('exam_routine_details');

        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_mark_information($BranchId,$exam_id,$ExamDate,$class_id,$section_id,$subject_id){
        $query = "SELECT m.`RoutineId`,m.`ClassID`,m.`SectionId`,m.`SubjectId`,m.`StudentId`,CONCAT(s.`StudentName`,' - ',s.`StudentCode`) AS StudentName,s.RollNo,m.`SbaMark`,m.`SubjectiveMark`,m.`ObjectiveMark`,m.`TotalMark`
                FROM `manage_marks` m
                JOIN students s ON m.`StudentId` = s.`StudentId`
                WHERE m.`ClassID` = $class_id
                AND m.`SectionId` = $section_id
                AND m.`ExamDate` = '$ExamDate'
                AND m.`ExamId` = $exam_id
                AND m.`SubjectId` = $subject_id
                AND m.`BranchId` = $BranchId";
        return $this->db->query($query)->result_array();
    }
    function check_for_duplicate($class_id,$section_id,$ExamDate,$examId,$subjectId){
        $query = $this->db->query("SELECT IFNULL(COUNT(m.RoutineId),0) AS id
                    FROM `exam_routines` m
                    WHERE m.`ClassID`=$class_id
                    AND m.`SectionId` = $section_id
                    AND m.`ExamDate`='$ExamDate'
                    AND m.`ExamId` = $examId
                    AND m.`SubjectId`=$subjectId")->row()->id;
        return $query;
    }
    function get_mark_information_by_class_section_subject($BranchId,$exam_id,$ExamDate,$class_id,$section_id,$subject_id){
        $query = "SELECT m.*,CONCAT(s.`StudentName`,' - ',s.`StudentCode`) AS StudentName,s.RollNo
                FROM `manage_marks` m
                JOIN students s ON m.`StudentId` = s.`StudentId`
                WHERE m.`ClassID` = $class_id
                AND m.`SectionId` = $section_id
                AND m.`ExamDate` = '$ExamDate'
                AND m.`ExamId` = $exam_id
                AND m.`SubjectId` = $subject_id
                AND m.`BranchId` = $BranchId";
        $query = $this->db->query($query)->result_array();
        $mark_array = array();
        $mark_data = array();
        foreach($query as $row){
            $mark_data['ClassId'] = $row['ClassID'];
            $mark_data['SectionId'] = $row['SectionId'];
            $mark_data['ExamDate'] = $row['ExamDate'];
            $mark_data['ExamId'] = $row['ExamId'];
            $mark_data['SubjectId'] = $row['SubjectId'];
            $mark_array[$row['RoutineId']]['RoutineId'] = $row['RoutineId'];
            $mark_array[$row['RoutineId']]['ClassID'] = $row['ClassID'];
            $mark_array[$row['RoutineId']]['SectionId'] = $row['SectionId'];
            $mark_array[$row['RoutineId']]['BranchId'] = $row['BranchId'];
            $mark_array[$row['RoutineId']]['ExamId'] = $row['ExamId'];
            $mark_array[$row['RoutineId']]['StudentId'] = $row['StudentId'];
            $mark_array[$row['RoutineId']]['SubjectId'] = $row['SubjectId'];
            $mark_array[$row['RoutineId']]['SbaMark'] = $row['SbaMark'];
            $mark_array[$row['RoutineId']]['SubjectiveMark'] = $row['SubjectiveMark'];
            $mark_array[$row['RoutineId']]['ObjectiveMark'] = $row['ObjectiveMark'];
            $mark_array[$row['RoutineId']]['TotalMark'] = $row['TotalMark'];
            $mark_array[$row['RoutineId']]['StudentName'] = $row['StudentName'];
            $mark_array[$row['RoutineId']]['RollNo'] = $row['RollNo'];
        }
        $return_data['mark_data'] = $mark_data;
        $return_data['mark_array'] = $mark_array;
        return $return_data;

    }
    function get_tabulation_sheet_data($data){
        $BranchId = $data['BranchId'];
        $ClassId = $data['ClassId'];
        $SectionId = $data['SectionId'];
        $DateFrom = $data['FromDate'];
        $DateTo = $data['ToDate'];
        $ExamId = $data['ExamId'];
        $query = "SELECT m.*
                FROM `exam_routine_details` m
                WHERE m.`BranchId` = $BranchId
                AND m.`ClassID` = $ClassId
                AND m.`SectionId` = $SectionId
                AND (m.`ExamDate` BETWEEN '$DateFrom' AND '$DateTo')
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
        $BranchId = $data['BranchId'];
        $BranchId = $data['BranchId'];
        $ClassId = $data['ClassId'];
        $SectionId = $data['SectionId'];
        $DateTo = $data['ToDate'];
        $DateFrom = $data['FromDate'];
        $StudentId = $data['StudentId'];
        $query = "SELECT m.*
                FROM `exam_routine_details` m
                WHERE m.`BranchId` = $BranchId
                AND m.`ClassID` = $ClassId
                AND m.`SectionId` = $SectionId
                AND m.`StudentId` = $StudentId
                AND (m.`ExamDate` BETWEEN '$DateFrom' AND '$DateTo')";
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
        $BranchId = $data['BranchId'];
        $ClassId = $data['ClassId'];
        $SectionId = $data['SectionId'];
        $DateTo = $data['ToDate'];
        $DateFrom = $data['FromDate'];
        $StudentId = $data['StudentId'];
        $query = "SELECT SUM(m.TotalMark) AS TotalMark,m.`ExamId`
                FROM `exam_routine_details` m
                WHERE m.`BranchId` = $BranchId
                AND m.`ClassID` = $ClassId
                AND m.`SectionId` = $SectionId
                AND m.`StudentId` = $StudentId
                AND (m.`ExamDate` BETWEEN '$DateFrom' AND '$DateTo')";
        $query = $this->db->query($query)->result_array();
        $mark_sheet_data = array();
        foreach($query as $row){
            $mark_sheet_data[$row['ExamId']]['TotalMark'] = $row['TotalMark'];
        }
        return $mark_sheet_data;
    }

}
?>
<?php
class Manage_mark extends MY_Model {
    function get_list($limit = null, $offset = null,$cond=null){
        if(is_array($cond)){
            if (isset($cond['BranchId']) and !empty($cond['BranchId'])) {
                $this->db->where('mark_details.BranchId', $cond['BranchId']);
            }
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('mark_details.ClassId', $cond['ClassId']);
            }
            if(isset($cond['SectionId']) and !empty($cond['SectionId'])){
                $this->db->where('mark_details.SectionId', $cond['SectionId']);
            }


        }
        $this->db->select('mark_details.BranchId,mark_details.ClassId,mark_details.SectionId,mark_details.SubjectId,mark_details.ExamId,mark_details.ExamDate,exams.ExamName,config_classes.ClassName,config_sections.SectionName,config_subjects.SubjectName');
        $this->db->from('mark_details');
        $this->db->join('config_classes', 'mark_details.ClassId = config_classes.ClassId');
        $this->db->join('config_sections', 'mark_details.SectionId = config_sections.SectionId');
        $this->db->join('config_subjects', 'mark_details.SubjectId = config_subjects.SubjectId');
        $this->db->join('exams', 'mark_details.ExamId = exams.ExamId');
        $this->db->order_by('mark_details.ExamDate','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        // $res =  $this->db->get()->result();

        // echo "<pre>";print_r($this->db->last_query());die;
        return $this->db->get()->result();

    }
    function row_count($cond=null){
        if(is_array($cond)){
            if (isset($cond['BranchId']) and !empty($cond['BranchId'])) {
                $this->db->where('marks.BranchId', $cond['BranchId']);
            }
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('marks.ClassId', $cond['ClassId']);
            }
            if(isset($cond['SectionId']) and !empty($cond['SectionId'])){
                $this->db->where('marks.SectionId', $cond['SectionId']);
            }
        }
        $this->db->select('marks.*');
        return $this->db->count_all_results('marks');
    }
    function read($id){
        return $this->db->get_where('marks',array('MarkId'=>$id))->row();
    }
    function read_mark($id){
        $this->db->select('marks.*,config_classes.ClassName,config_sections.SectionName,config_subjects.SubjectName');
        $this->db->from('marks');
        $this->db->join('config_classes', 'marks.ClassId = config_classes.ClassId');
        $this->db->join('config_sections', 'marks.SectionId = config_sections.SectionId');
        $this->db->join('config_subjects', 'marks.SubjectId = config_subjects.SubjectId');
        $this->db->where('marks.MarkId', $id);
        $data =$this->db->get()->row();
        return $data;
    }
    function get_mark_details_information($id){
        $this->db->select('mark_details.*,students.*');
        $this->db->from('mark_details');
        $this->db->join('students', 'mark_details.StudentId = students.StudentId');
        $this->db->where('mark_details.MarkId', $id);
        return $this->db->get()->result_array();

    }
    function add_details($data) {
        return $this->db->insert_batch('mark_details', $data);
    }
    function add($data)
    {
        return $this->db->insert('marks', $data);
    }
    function edit($data){
        $this->db->trans_start();
        foreach($data as $row){
            $this->db->update('mark_details', $row, array('MarkDetailsId'=> $row['MarkDetailsId']));
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function delete($id)
    {
        $this->db->trans_start();
        $this->db->where('MarkId', $id);
        $this->db->delete('marks');

        $this->db->where('MarkId', $id);
        $this->db->delete('mark_details');

        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_mark_information($BranchId,$exam_id,$ExamDate,$class_id,$section_id,$subject_id){
        $query = "SELECT m.`MarkId`,m.`ClassID`,m.`SectionId`,m.`SubjectId`,m.`StudentId`,CONCAT(s.`StudentName`,' - ',s.`StudentCode`) AS StudentName,s.RollNo,m.`SbaMark`,m.`SubjectiveMark`,m.`ObjectiveMark`,m.`TotalMark`
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
        $query = $this->db->query("SELECT IFNULL(COUNT(m.MarkId),0) AS id
                    FROM `marks` m
                    WHERE m.`ClassID`=$class_id
                    AND m.`SectionId` = $section_id
                    AND m.`ExamDate`='$ExamDate'
                    AND m.`ExamId` = $examId
                    AND m.`SubjectId`=$subjectId")->row()->id;
        return $query;
    }
    // function get_mark_information_by_class_section_subject($BranchId,$exam_id,$ExamDate,$class_id,$section_id,$subject_id){
    //     $query = "SELECT m.*,CONCAT(s.`StudentName`,' - ',s.`StudentCode`) AS StudentName,s.RollNo
    //             FROM `manage_marks` m
    //             JOIN students s ON m.`StudentId` = s.`StudentId`
    //             WHERE m.`ClassID` = $class_id
    //             AND m.`SectionId` = $section_id
    //             AND m.`ExamDate` = '$ExamDate'
    //             AND m.`ExamId` = $exam_id
    //             AND m.`SubjectId` = $subject_id
    //             AND m.`BranchId` = $BranchId";
    //     $query = $this->db->query($query)->result_array();
    //     $mark_array = array();
    //     $mark_data = array();
    //     foreach($query as $row){
    //         $mark_data['ClassId'] = $row['ClassID'];
    //         $mark_data['SectionId'] = $row['SectionId'];
    //         $mark_data['ExamDate'] = $row['ExamDate'];
    //         $mark_data['ExamId'] = $row['ExamId'];
    //         $mark_data['SubjectId'] = $row['SubjectId'];
    //         $mark_array[$row['MarkId']]['MarkId'] = $row['MarkId'];
    //         $mark_array[$row['MarkId']]['ClassID'] = $row['ClassID'];
    //         $mark_array[$row['MarkId']]['SectionId'] = $row['SectionId'];
    //         $mark_array[$row['MarkId']]['BranchId'] = $row['BranchId'];
    //         $mark_array[$row['MarkId']]['ExamId'] = $row['ExamId'];
    //         $mark_array[$row['MarkId']]['StudentId'] = $row['StudentId'];
    //         $mark_array[$row['MarkId']]['SubjectId'] = $row['SubjectId'];
    //         $mark_array[$row['MarkId']]['SbaMark'] = $row['SbaMark'];
    //         $mark_array[$row['MarkId']]['SubjectiveMark'] = $row['SubjectiveMark'];
    //         $mark_array[$row['MarkId']]['ObjectiveMark'] = $row['ObjectiveMark'];
    //         $mark_array[$row['MarkId']]['TotalMark'] = $row['TotalMark'];
    //         $mark_array[$row['MarkId']]['StudentName'] = $row['StudentName'];
    //         $mark_array[$row['MarkId']]['RollNo'] = $row['RollNo'];
    //     }
    //     $return_data['mark_data'] = $mark_data;
    //     $return_data['mark_array'] = $mark_array;
    //     return $return_data;

    // }
    
    function get_mark_information_by_class_section_subject($branch_id,$exam_id,$year,$class_id,$section_id,$subject_id){
        $query = "SELECT m.*,CONCAT(s.`StudentName`,' - ',s.`RollNo`) AS StudentName,s.`RollNo`,swmd.`TotalMark` AS `SubTotalMark`,swmd.`PassMark`,swmd.`SubMark`,swmd.`ObjMark`,swmd.`PraMark`
                FROM `mark_details` m
                JOIN students s ON m.`StudentId` = s.`StudentId`
                JOIN subject_wise_marks swmd ON m.`SubjectId` = swmd.`SubjectId`
                WHERE m.`ClassID` = $class_id
                AND m.`SectionId` = $section_id
                AND m.`BranchId` = $branch_id
                AND m.`ExamDate` = '$year'
                AND m.`ExamId` = $exam_id
                AND m.`SubjectId` = $subject_id";
        $query = $this->db->query($query)->result_array();
        // echo "<pre>";print_r($this->db->last_query());die;
        $mark_array = array();
        $mark_data = array();
        foreach($query as $row){


            $mark_data['sub_pass_mark'] = ($row['PassMark']*$row['SubMark'])/100;
            $mark_data['obj_pass_mark'] = ($row['PassMark']*$row['ObjMark'])/100;
            $mark_data['pra_pass_mark'] = ($row['PassMark']*$row['PraMark'])/100;
            
            $mark_data['SubTotalMark'] = $row['SubTotalMark'];
            $mark_data['PassMark'] = $row['PassMark'];
            $mark_data['ClassId'] = $row['ClassID'];
            $mark_data['SectionId'] = $row['SectionId'];
            $mark_data['Year'] = $row['ExamDate'];
            $mark_data['ExamId'] = $row['ExamId'];
            $mark_data['SubjectId'] = $row['SubjectId'];
            $mark_array[$row['MarkDetailsId']]['MarkDetailsId'] = $row['MarkDetailsId'];
            $mark_array[$row['MarkDetailsId']]['ClassID'] = $row['ClassID'];
            $mark_array[$row['MarkDetailsId']]['SectionId'] = $row['SectionId'];
            $mark_array[$row['MarkDetailsId']]['ExamDate'] = $row['ExamDate'];
            $mark_array[$row['MarkDetailsId']]['ExamId'] = $row['ExamId'];
            $mark_array[$row['MarkDetailsId']]['StudentId'] = $row['StudentId'];
            $mark_array[$row['MarkDetailsId']]['SubjectId'] = $row['SubjectId'];
            $mark_array[$row['MarkDetailsId']]['PracticalMark'] = $row['PracticalMark'];
            $mark_array[$row['MarkDetailsId']]['SubjectiveMark'] = $row['SubjectiveMark'];
            $mark_array[$row['MarkDetailsId']]['ObjectiveMark'] = $row['ObjectiveMark'];
            $mark_array[$row['MarkDetailsId']]['TotalMark'] = $row['TotalMark'];
            $mark_array[$row['MarkDetailsId']]['StudentName'] = $row['StudentName'];
            $mark_array[$row['MarkDetailsId']]['RollNo'] = $row['RollNo'];
            $mark_array[$row['MarkDetailsId']]['Point'] = $row['Point'];
            $mark_array[$row['MarkDetailsId']]['Grade'] = $row['Grade'];
        }
// echo "<pre>";print_r($mark_data);die;

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
                FROM `mark_details` m
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
                FROM `mark_details` m
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
                FROM `mark_details` m
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
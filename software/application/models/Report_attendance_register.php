<?php
class Report_attendance_register extends CI_Model{
    function get_attendance_information_by_student($student_id,$class_id,$section_id,$from_date,$to_date){
                $query = "SELECT * FROM `student_attendances`
                WHERE ClassId=$class_id
                AND sectionId=$section_id
                AND StudentId = $student_id
                AND DATE BETWEEN '$from_date' AND '$to_date'
                ORDER BY DATE DESC";
        return $this->db->query($query)->result_array();
    }
}
?>
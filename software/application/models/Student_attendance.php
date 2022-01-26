<?php
class Student_attendance extends CI_Model{
    function get_list($limit = null, $offset = null,$cond=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('student_attendances.BranchId', $cond['BranchId']);
            }
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('student_attendances.CourseId', $cond['ClassId']);
            }
            if(isset($cond['SectionId']) and !empty($cond['SectionId'])){
                $this->db->where('student_attendances.SectionId', $cond['SectionId']);
            }
            if(isset($cond['Date']) and !empty($cond['Date'])){
                $date1 = date("Y-m-d", strtotime($cond['Date']));
                $this->db->where('student_attendances.Date', $date1);
            }
        }
        $this->db->select('student_attendances.GroupId,student_attendances.Date,config_classes.ClassName');
        $this->db->from('student_attendances');
        $this->db->join('config_classes', 'student_attendances.CourseId = config_classes.ClassId');
       
        $this->db->group_by('student_attendances.`CourseId`,student_attendances.Date');
        $this->db->order_by('student_attendances.Date','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();

    }
    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('student_attendances.BranchId', $cond['BranchId']);
            }
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('student_attendances.CourseId', $cond['ClassId']);
            }
            if(isset($cond['SectionId']) and !empty($cond['SectionId'])){
                $this->db->where('student_attendances.SectionId', $cond['SectionId']);
            }
            if(isset($cond['Date']) and !empty($cond['Date'])){
                $date1 = date("Y-m-d", strtotime($cond['Date']));
                $this->db->where('student_attendances.Date', $date1);
            }
        }
        $this->db->select('student_attendances.*');
        $this->db->group_by('student_attendances.`CourseId`');
        return $this->db->count_all_results('student_attendances');
    }
    function read($id){
        return $this->db->get_where('student_attendances',array('GroupId'=>$id))->row();
    }
    function add($data)
    {
        return $this->db->insert_batch('student_attendances', $data);
    }
    function add_exam_attendance($data)
    {
        return $this->db->insert('exam_attendance', $data);
    }
    function edit_exam_attendance($data)
    {
        return $this->db->update('exam_attendance', $data, array('ExamId'=> $data['ExamId'],'StudentId'=>$data['StudentId'],'ExamDate'=> $data['ExamDate']));
        // return $this->db->insert('exam_attendance', $data);
    }
    function edit($data,$group_id){
        $this->db->where('GroupId',$group_id);
        $this->db->delete('student_attendances');
        return $this->db->insert_batch('student_attendances', $data);
    }
    function delete($id)
    {
        $this->db->where('GroupId',$id);
        $this->db->delete('student_attendances');
        return true;
    }
    function get_new_group_id(){
        $query = "SELECT IFNULL(`student_attendances`.`GroupId`,0) AS GroupId
                    FROM `student_attendances`
                    ORDER BY student_attendances.`AttendanceId` DESC LIMIT 0,1;";
        $query = $this->db->query($query)->row();
        $groupId = 1;
        if(!empty($query)){
            $groupId =$groupId+$query->GroupId;
        }
        return $groupId;
    }
    function check_duplicate_entry_for_attendance($Date,$ClassId){
        $query = "SELECT IFNULL(COUNT(AttendanceId),0) AS AttendanceId
                    FROM `student_attendances`
                    WHERE CourseId = '$ClassId'
                   
                    AND Date = '$Date'";
        return $this->db->query($query)->row()->AttendanceId;
    }
    
    
    function get_class_information($group_id){
        $query = "SELECT CONCAT('Class ',config_classes.ClassName) AS CourseName
                FROM `student_attendances`
                JOIN `config_classes` ON student_attendances.`CourseId` = config_classes.`ClassId`
                
                WHERE GroupId = $group_id LIMIT 0,1";
        return $this->db->query($query)->row()->CourseName;
    }
    function get_attendance_information_by_group_id($group_id){
        $attendance_info = $this->read($group_id);
        $query = "SELECT sa.`AttendanceId`, sa.`Date`,sa.`StudentId`,s.*,
                    sa.`AttendanceType`,
                    sa.CourseId
                    FROM student_attendances sa
                    JOIN students s ON sa.`StudentId` = s.`StudentId`
                    WHERE sa.`GroupId` = $group_id
                    AND sa.`Date`='$attendance_info->Date'";
        return $this->db->query($query)->result_array();
    }
}
?>
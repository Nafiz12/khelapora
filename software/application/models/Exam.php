<?php
class Exam extends CI_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list($limit = null, $offset = null, $cond = null) {
        if (is_array($cond)) {
            if (isset($cond['BranchId']) and !empty($cond['BranchId'])) {
                $this->db->where('exams.BranchId', $cond['BranchId']);
            }
        }
        $this->db->select('exams.*,branches.BranchName');
        $this->db->from('exams');
        $this->db->join('branches', 'exams.BranchId = branches.BranchId');
        $this->db->order_by('exams.ExamId', 'DESC');
        if (isset($limit) && $limit > 0) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result();
    }

    function get_attendance_information_by_exam_id($ExamId,$BranchId,$CourseId){
         $query = $this->db->query("SELECT exam_attendance.*,students.StudentName,students.StudentCode,exams.ExamName,exams.ExamDate FROM exam_attendance JOIN students ON exam_attendance.StudentId = students.StudentId JOIN exams ON exam_attendance.ExamId = exams.ExamId WHERE exam_attendance.ExamId = $ExamId AND exam_attendance.CourseId = $CourseId AND exam_attendance.BranchId = $BranchId AND students.Status = 1 ORDER BY exam_attendance.ExamDate")->result_array();

         // echo "<pre>";print_r($this->db->last_query());die;
         return $query;
    }
    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('exams.BranchId', $cond['BranchId']);
            }
        }
        $this->db->select('exams.*');
        return $this->db->count_all_results('exams');
    }
    function add($data) {
        $this->db->insert('exams', $data);
        return $this->db->insert_id();
    }
    function read($id){
        return $this->db->get_where('exams',array('ExamId'=>$id))->row();
    }
    function edit($data){
        return $this->db->update('exams', $data, array('ExamId'=> $data['ExamId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('exams', array('ExamId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_exam_list($branch_id) {
        $this->db->order_by('ExamId');
        $this->db->select('*');
        $this->db->from('exams');
        $this->db->where('BranchId',$branch_id);
        $query = $this->db->get();
        $query = $query->result_array();
        $exam_array = array();
        foreach($query as $row){
            $exam_array[$row['ExamId']]['ExamId'] =$row['ExamName'];
            $exam_array[$row['ExamId']]['ExamName'] =$row['ExamName'];
        }
        return $exam_array;
    }

    function get_course_wise_students($BranchId,$CourseId){
           $query = $this->db->query("SELECT COUNT(StudentId) AS total_students FROM students WHERE BranchId = $BranchId AND CourseId = $CourseId")->result();
           return $query[0];
    }
}

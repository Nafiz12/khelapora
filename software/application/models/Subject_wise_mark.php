<?php
class Subject_wise_mark extends CI_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list($limit = null, $offset = null, $cond = null) {
        if (is_array($cond)) {
            if (isset($cond['BranchId']) and !empty($cond['BranchId'])) {
                $this->db->where('subject_wise_marks.BranchId', $cond['BranchId']);
            }
            if (isset($cond['ClassId']) and !empty($cond['ClassId'])) {
                $this->db->where('subject_wise_marks.ClassId', $cond['ClassId']);
            }
        }
        $this->db->select('subject_wise_marks.*,branches.BranchName,config_classes.ClassName,config_subjects.SubjectName');
        $this->db->from('subject_wise_marks');
        $this->db->join('branches', 'subject_wise_marks.BranchId = branches.BranchId');
        $this->db->join('config_classes', 'subject_wise_marks.ClassId = config_classes.ClassId');
        $this->db->join('config_subjects', 'subject_wise_marks.SubjectId = config_subjects.SubjectId');
        $this->db->order_by('subject_wise_marks.SubMarkId', 'DESC');
        if (isset($limit) && $limit > 0) {
            $this->db->limit($limit, $offset);
        }
        //  $this->db->get()->result();
        // echo "<pre>";print_r($this->db->last_query());die;
        return $this->db->get()->result();
    }
    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('subject_wise_marks.BranchId', $cond['BranchId']);
            }
        }
        $this->db->select('subject_wise_marks.*');
        return $this->db->count_all_results('subject_wise_marks');
    }
    function add($data) {
        return $this->db->insert('subject_wise_marks', $data);
        //return $this->db->insert_id();
    }
    function read($id){
       
        $this->db->where('subject_wise_marks.SubMarkId', $id);
       
        $this->db->select('subject_wise_marks.*,branches.BranchName,config_classes.ClassName,config_subjects.SubjectName');
        $this->db->from('subject_wise_marks');
        $this->db->join('branches', 'subject_wise_marks.BranchId = branches.BranchId');
        $this->db->join('config_classes', 'subject_wise_marks.ClassId = config_classes.ClassId');
        $this->db->join('config_subjects', 'subject_wise_marks.SubjectId = config_subjects.SubjectId');
        $this->db->order_by('subject_wise_marks.SubMarkId', 'DESC');
        if (isset($limit) && $limit > 0) {
            $this->db->limit($limit, $offset);
        }
        //  $this->db->get()->result();
        // echo "<pre>";print_r($this->db->last_query());die;
        return $this->db->get()->row();



        // return $this->db->get_where('exams',array('ExamId'=>$id))->row();
    }
    function edit($data){
        return $this->db->update('subject_wise_marks', $data, array('SubMarkId'=> $data['SubMarkId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('subject_wise_marks', array('SubMarkId' => $id));
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
}

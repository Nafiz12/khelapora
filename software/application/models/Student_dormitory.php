<?php
class Student_dormitory extends CI_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list($limit = null, $offset = null,$cond=null) {
        if(is_array($cond)){
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('students.ClassId', $cond['ClassId']);
            }
            if(isset($cond['SectionId']) and !empty($cond['SectionId'])){
                $this->db->where('students.SectionId', $cond['SectionId']);
            }
            if(isset($cond['DormitoryId']) and !empty($cond['DormitoryId'])){
                $this->db->where('student_dormitories.DormitoryId', $cond['DormitoryId']);
            }
        }
        $this->db->select('student_dormitories.*,students.*,config_classes.ClassName,config_sections.SectionName');
        $this->db->from('student_dormitories');
        $this->db->join('students', 'student_dormitories.StudentId = students.StudentId');
        $this->db->join('config_classes', 'students.ClassId = config_classes.ClassId');
        $this->db->join('config_sections', 'students.SectionId = config_sections.SectionId');
        $this->db->order_by('student_dormitories.StudentDormitoryId','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();
    }
    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['DormitoryId']) and !empty($cond['DormitoryId'])){
                $this->db->where('student_dormitories.DormitoryId', $cond['DormitoryId']);
            }
        }
        $this->db->select('student_dormitories.*');
        return $this->db->count_all_results('student_dormitories');
    }
    function add($data) {
        $this->db->insert('student_dormitories', $data);
        return $this->db->insert_id();
    }
    function read($id){
        return $this->db->get_where('student_dormitories',array('DormitoryId'=>$id))->row();
    }
    function edit($data){
        return $this->db->update('student_dormitories', $data, array('StudentDormitoryId'=> $data['StudentDormitoryId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('student_dormitories', array('DormitoryId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_dormitory_info_by_student($id){
        return $this->db->get_where('student_dormitories',array('StudentId'=>$id))->row();
    }
}

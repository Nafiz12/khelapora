<?php
class Config_subject extends MY_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list($limit = null, $offset = null, $cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('config_subjects.BranchId', $cond['BranchId']);
            }
        }
        $this->db->select('config_subjects.*,branches.BranchName');
        $this->db->from('config_subjects');
        $this->db->join('branches', 'config_subjects.BranchId = branches.BranchId');
        $this->db->order_by('SubjectId', 'DESC');
        if (isset($limit) && $limit > 0) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result();

    }


    function get_subject_lists()
    {
        
        $this->db->select('config_subjects.*');
        $this->db->from('config_subjects');
        $this->db->order_by('SubjectId', 'DESC');
        return $this->db->get()->result();

    }
    function row_count($cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('config_subjects.BranchId', $cond['BranchId']);
            }
        }
        $this->db->select('config_subjects.*');
        return $this->db->count_all_results('config_subjects');
    }
    function add($data) {
        $this->db->insert('config_subjects', $data);
        return $this->db->insert_id();
    }
    function read($id){
        return $this->db->get_where('config_subjects',array('SubjectId'=>$id))->row();
    }
    function edit($data){
        //echo"<pre>"; print_r($data); die;
        return $this->db->update('config_subjects', $data, array('SubjectId'=> $data['SubjectId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('config_subjects', array('SubjectId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_subject_list($BranchId = null){
        if(isset($BranchId) and !empty($BranchId)){
            $this->db->where('config_subjects.BranchId', $BranchId);
        }
        $this->db->order_by('SubjectId');
        $this->db->select('*');
        $this->db->from('config_subjects');
        $query = $this->db->get();
        $query =  $query->result_array();
        $subject_array= array();
        foreach($query as $row){
            $subject_array[$row['SubjectId']]['SubjectId'] =$row['SubjectId'];
            $subject_array[$row['SubjectId']]['SubjectName'] =$row['SubjectName'];
        }
        return $subject_array;
    }
    function add_class_wise_subject($data){
        $this->db->trans_start();
        foreach ($data as $row){
            $this->db->insert_batch('class_wise_subjects', $row);
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_subject_wise_class_list($SubjectId,$BranchId){
        $this->db->select('class_wise_subjects.ClassId');
        $this->db->from('class_wise_subjects');
        $this->db->where('class_wise_subjects.BranchId', $BranchId);
        $this->db->where('class_wise_subjects.SubjectId', $SubjectId);
        $query = $this->db->get();
        $query =  $query->result();

        $class_list = array();
        foreach ($query as $class) {
            $class_list[] = $class->ClassId;
        }
        return $class_list;
    }
    function get_class_wise_subject_list($ClassId = null,$BranchId,$Medium=null){
        if(isset($Medium) and !empty($Medium)){
            $this->db->where('class_wise_subjects.Medium', $Medium);
        }
        $this->db->select('DISTINCT(`class_wise_subjects`.`SubjectId`) AS SubjectId,config_subjects.SubjectName');
        $this->db->from('class_wise_subjects');
        $this->db->join('config_subjects', 'class_wise_subjects.SubjectId = config_subjects.SubjectId');
        $this->db->where('class_wise_subjects.BranchId', $BranchId);
        $this->db->where('class_wise_subjects.ClassId', $ClassId);
        $query = $this->db->get();
        $query =  $query->result();

//        $subject_list = array();
//        foreach ($query as $row) {
//            $subject_list['SubjectId'][] = $row->SubjectName;
//            $subject_list['SubjectId'][] = $row->SubjectName;
//        }
        return $query;
    }
    function get_class_wise_medium_list($SubjectId,$BranchId){
        $this->db->select('DISTINCT(class_wise_subjects.Medium)');
        $this->db->from('class_wise_subjects');
        $this->db->where('class_wise_subjects.BranchId', $BranchId);
        $this->db->where('class_wise_subjects.SubjectId', $SubjectId);
        $query = $this->db->get();
        $query =  $query->result();
        $class_list = array();
        foreach ($query as $class) {
            $class_list[] = $class->Medium;
        }
        return $class_list;
    }
    function delete_subject_wise_class_medium($id) {
        $this->db->trans_start();
        $this->db->delete('class_wise_subjects', array('SubjectId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }


}

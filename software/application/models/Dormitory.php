<?php
class Dormitory extends CI_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list() {
        $this->db->order_by('DormitoryId');
        $this->db->select('*');
        $this->db->from('dormitories');
        $query = $this->db->get();
        return $query->result();
    }
    function row_count($cond=null){
        if(is_array($cond)){

            if(isset($cond['DormitoryId']) and !empty($cond['DormitoryId'])){
                $this->db->where('dormitories.DormitoryId', $cond['DormitoryId']);
            }
        }
        $this->db->select('dormitories.*');
        return $this->db->count_all_results('dormitories');
    }
    function add($data) {
        $this->db->insert('dormitories', $data);
        return $this->db->insert_id();
    }
    function read($id){
        return $this->db->get_where('dormitories',array('DormitoryId'=>$id))->row();
    }
    function edit($data){
        
        return $this->db->update('dormitories', $data, array('DormitoryId'=> $data['DormitoryId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('dormitories', array('DormitoryId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_dormitory_list() {
        $this->db->order_by('DormitoryId');
        $this->db->select('*');
        $this->db->from('dormitories');
        $query = $this->db->get();
        $query = $query->result_array();
        $exam_array = array();
        foreach($query as $row){
            $exam_array[$row['DormitoryId']]['DormitoryId'] =$row['DormitoryId'];
            $exam_array[$row['DormitoryId']]['DormitoryName'] =$row['DormitoryName'];
        }
        return $exam_array;
    }
}

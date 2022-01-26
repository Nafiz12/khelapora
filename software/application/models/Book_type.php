<?php
class Book_type extends CI_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list() {
        $this->db->order_by('TypeId');
        $this->db->select('*');
        $this->db->from('book_types');
        $query = $this->db->get();
        return $query->result();
    }
    function row_count($cond=null){
        if(is_array($cond)){

            if(isset($cond['TypeId']) and !empty($cond['TypeId'])){
                $this->db->where('book_types.TypeId', $cond['TypeId']);
            }
        }
        $this->db->select('book_types.*');
        return $this->db->count_all_results('book_types');
    }
    function add($data) {
        $this->db->insert('book_types', $data);
        return $this->db->insert_id();
    }
    function read($id){
        return $this->db->get_where('book_types',array('TypeId'=>$id))->row();
    }
    function edit($data){
        return $this->db->update('book_types', $data, array('TypeId'=> $data['TypeId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('book_types', array('TypeId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_dormitory_list() {
        $this->db->order_by('TypeId');
        $this->db->select('*');
        $this->db->from('book_types');
        $query = $this->db->get();
        $query = $query->result_array();
        $exam_array = array();
        foreach($query as $row){
            $exam_array[$row['TypeId']]['TypeId'] =$row['TypeId'];
            $exam_array[$row['TypeId']]['TypeName'] =$row['TypeName'];
        }
        return $exam_array;
    }
}

<?php
class Author extends CI_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list() {
        $this->db->order_by('AuthorId');
        $this->db->select('*');
        $this->db->from('book_authors');
        $query = $this->db->get();
        return $query->result();
    }
    function row_count($cond=null){
        if(is_array($cond)){

            if(isset($cond['AuthorId']) and !empty($cond['AuthorId'])){
                $this->db->where('book_authors.AuthorId', $cond['AuthorId']);
            }
        }
        $this->db->select('book_authors.*');
        return $this->db->count_all_results('book_authors');
    }
    function add($data) {
        $this->db->insert('book_authors', $data);
        return $this->db->insert_id();
    }
    function read($id){
        return $this->db->get_where('book_authors',array('AuthorId'=>$id))->row();
    }
    function edit($data){
        return $this->db->update('book_authors', $data, array('AuthorId'=> $data['AuthorId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('book_authors', array('AuthorId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_dormitory_list() {
        $this->db->order_by('AuthorId');
        $this->db->select('*');
        $this->db->from('book_authors');
        $query = $this->db->get();
        $query = $query->result_array();
        $exam_array = array();
        foreach($query as $row){
            $exam_array[$row['AuthorId']]['AuthorId'] =$row['AuthorId'];
            $exam_array[$row['AuthorId']]['AuthorName'] =$row['AuthorName'];
        }
        return $exam_array;
    }
}

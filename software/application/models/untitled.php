<?php
class Report_student_due extends CI_Model{
    public function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    public function get_list() {
        $this->db->order_by('CategoryId');
        $this->db->select('*');
        $this->db->from('fee_categories');
        $query = $this->db->get();
        return $query->result();
    }

    public function row_count($cond=null){
        if(is_array($cond)){

            if(isset($cond['TypeId']) and !empty($cond['TypeId'])){
                $this->db->where('book_types.TypeId', $cond['TypeId']);
            }
        }
        $this->db->select('fee_categories.*');
        return $this->db->count_all_results('fee_categories');
    }

    public function add($data) {
        $this->db->insert('fee_categories', $data);
        return $this->db->insert_id();
    }

    public function read($id){
        return $this->db->get_where('fee_categories',array('CategoryId'=>$id))->row();
    }

    public function edit($data){
        return $this->db->update('fee_categories', $data, array('CategoryId'=> $data['CategoryId']));
    }

    public function delete($id) {
        $this->db->trans_start();
        $this->db->delete('fee_categories', array('CategoryId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
}

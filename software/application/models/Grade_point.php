<?php
class Grade_point extends CI_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list() {
        $this->db->order_by('GradeId');
        $this->db->select('*');
        $this->db->from('grade_points');
        $query = $this->db->get();
        return $query->result();
    }
    function row_count($cond=null){
        if(is_array($cond)){

            if(isset($cond['GradeId']) and !empty($cond['GradeId'])){
                $this->db->where('grade_points.GradeId', $cond['GradeId']);
            }
        }
        $this->db->select('grade_points.*');
        return $this->db->count_all_results('grade_points');
    }
    function add($data) {
        $this->db->insert('grade_points', $data);
        return $this->db->insert_id();
    }
    function read($id){
        return $this->db->get_where('grade_points',array('GradeId'=>$id))->row();
    }
    function edit($data){
        //echo"<pre>"; print_r($data); die;
        return $this->db->update('grade_points', $data, array('GradeId'=> $data['GradeId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('grade_points', array('GradeId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
}

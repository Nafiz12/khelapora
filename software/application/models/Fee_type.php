<?php
class Fee_type extends MY_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list() {
        $this->db->order_by('TypeId');
        $this->db->select('*');
        $this->db->from('fee_types');
        $query = $this->db->get();
        return $query->result();
    }
    function add($data) {
        $this->db->insert('fee_types', $data);
        return $this->db->insert_id();
    }
    function read($id){
        return $this->db->get_where('fee_types',array('TypeId'=>$id))->row();
    }
    function edit($data){
        return $this->db->update('fee_types', $data, array('TypeId'=> $data['TypeId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('fee_types', array('TypeId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_fee_type_list() {
        $this->db->order_by('TypeId');
        $this->db->select('*');
        $this->db->from('fee_types');
        $query = $this->db->get();
        $query = $query->result();
        $fee_type=array();
        foreach($query as $row){
            $fee_type[$row->TypeId]=$row->TypeName;
        }
        return $fee_type;
    }
    function get_monthly_fee_list(){
        $this->db->order_by('TypeId');
        $this->db->select('*');
        $this->db->from('fee_types');
        $this->db->where('IsMonthlyFee',1);
        $query = $this->db->get();
        $query = $query->result();
        $fee_type=array();
        foreach($query as $row){
            $fee_type[$row->TypeId]=$row->TypeName;
        }
        return $fee_type;
    }
    function get_other_fee_list(){
        $this->db->order_by('TypeId');
        $this->db->select('*');
        $this->db->from('fee_types');
        $this->db->where('IsMonthlyFee',0);
        $this->db->where('IsOneTimeFee',0);
        $query = $this->db->get();
        $query = $query->result();
        $fee_type=array();
        foreach($query as $row){
            $fee_type[$row->TypeId]=$row->TypeName;
        }
        return $fee_type;
    }
    function get_onetime_fee_list(){
        $this->db->order_by('TypeId');
        $this->db->select('*');
        $this->db->from('fee_types');
        $this->db->where('IsMonthlyFee',0);
        $this->db->where('IsOneTimeFee',1);
        $query = $this->db->get();
        $query = $query->result();
        $fee_type=array();
        foreach($query as $row){
            $fee_type[$row->TypeId]=$row->TypeName;
        }
        return $fee_type;
    }
}

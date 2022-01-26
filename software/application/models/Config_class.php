<?php
class Config_class extends CI_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list($limit = null, $offset = null, $cond = null)
    {
       if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                if($cond['BranchId']!=1){
                 $this->db->where('config_classes.BranchId', $cond['BranchId']);

                }
            }
        }
        $this->db->select('config_classes.*,branches.BranchName');
        $this->db->from('config_classes');
        $this->db->join('branches', 'config_classes.BranchId = branches.BranchId');
        //$this->db->order_by('ClassId', 'DESC');
        $this->db->order_by('ClassId', 'ASC');
        if (isset($limit) && $limit > 0) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result();

    }
    function row_count($cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('config_classes.BranchId', $cond['BranchId']);
            }
        }
        $this->db->select('config_classes.*');
        return $this->db->count_all_results('config_classes');
    }
    function add($data) {
        $this->db->insert('config_classes', $data);
        return $this->db->insert_id();
    }
    function read($id){
        return $this->db->get_where('config_classes',array('ClassId'=>$id))->row();
    }
    function edit($data){
        //echo"<pre>"; print_r($data); die;
        return $this->db->update('config_classes', $data, array('ClassId'=> $data['ClassId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('config_classes', array('ClassId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function check_for_duplicate_entry($BranchId,$value,$type){
        $cond="";
        if($type =='name'){
            $cond = " AND config_classes.ClassName='$value'";
        }else{
            $cond = " AND config_classes.ClassCode='$value'";
        }
        $q = "SELECT ClassId
                FROM config_classes
                WHERE config_classes.BranchId=$BranchId
                $cond";
        $results = $this->db->query($q);
        $results = $results->row();
        return $results;
    }
    function get_class_list($BranchId)
    {
        if(isset($BranchId) and !empty($BranchId)){
            $this->db->where('config_classes.BranchId', $BranchId);
        }
        $this->db->select('config_classes.*');
        $this->db->from('config_classes');
        $this->db->order_by('ClassId', 'DESC');
        $result = $this->db->get()->result();
        $class_list = array();
        foreach($result as $row){
            $class_list[$row->ClassId]=$row->ClassName;
        }
        return $class_list;

    }
}

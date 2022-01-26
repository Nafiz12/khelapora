<?php
class MY_Model extends CI_Model{
    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
    }
    function get_new_id($table_name,$column_name){
        $new_id=$this->db->select($column_name)->order_by($column_name,"DESC")->limit(1)->get($table_name)->row();
        if(empty($new_id)){
            $new_id=1;
        }else{
            $new_id=$new_id->$column_name+1;
        }
        return $new_id;
    }

    function is_dependency_found($table_name,$cond=''){
        return $this->db->where($cond)->count_all_results($table_name);
    }
    function get_acc_type_list(){
        $this->db->select('*');
        $this->db->from('acc_types');
        $query = $this->db->get();
        $query = $query->result();
        $type_array = array();
        foreach($query as $row){
            $type_array[$row->TypeId]['TypeId'] = $row->TypeId;
            $type_array[$row->TypeId]['TypeName'] = $row->TypeName;
        }
    }
    function get_user_name($id){
        $result = $this->db->query("SELECT `name` FROM `user` WHERE user.`id`=$id");
        return $result->row()->name;
    }
    function get_location_name($id){
        $result = $this->db->query("SELECT `BranchName` FROM `branches` WHERE branches.`BranchId`=$id");
        return $result->row()->LocationName;
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday_config extends CI_Model
{

    function get_subject_list_report(){
        $this->db->order_by('id');
        $this->db->select('*');
        $this->db->from('holiday_configs');
        $query = $this->db->get();
        $query =  $query->result_array();
        $subject_array= array();
        foreach($query as $row){
            $subject_array[$row['id']]['id'] =$row['id'];
            $subject_array[$row['id']]['holiday_name'] =$row['holiday_name'];
        }
        return $subject_array;
    }


    public function get_holiday_list()
    {
        $query = $this->db->get('holiday_configs');
        $results = $query->result();
        return $results;
    }
    function get_list() {
        $this->db->order_by('id');
        $this->db->select('*');
        $this->db->from('holiday_configs');
        $query = $this->db->get();
        return $query->result();
    }
    public function add($subject_data)
    {
        $query = $this->db->insert('holiday_configs', $subject_data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function read($id){
        return $this->db->get_where('holiday_configs',array('id'=>$id))->row();
    }

    public function get_holiday_data($id)
    {
        $data = array('id' => $id);
        $query = $this->db->get_where('holiday_configs', $data);
        return $query->row();

    }

    public function edit($holiday_editable_data, $holiday_id)
    {
        return $this->db->update('holiday_configs', $holiday_editable_data, array('id' => $holiday_id));
    }

    public function delete($id)
    {
        return $this->db->delete('holiday_configs', array('id' => $id));
    }






}

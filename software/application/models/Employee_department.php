<?php
class Employee_department extends CI_Model{
    function get_list() {
        $this->db->order_by('DepartmentId','ASC');
        $this->db->select('*');
        $this->db->from('employee_departments');
        $query = $this->db->get();
        return $query->result();
    }

    function read($id){
        return $this->db->get_where('employee_departments',array('DepartmentId'=>$id))->row();
    }

    function edit($data){

        return $this->db->update('employee_departments', $data, array('DepartmentId'=> $data['DepartmentId']));
    }

    function add($data)
    {
        return $this->db->insert('employee_departments',$data);
    }

    function delete($id)
    {
        $this->db->where('DepartmentId',$id);
        $this->db->delete('employee_departments');
        return true;
    }
}
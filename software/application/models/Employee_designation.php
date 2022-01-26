<?php
class Employee_designation extends CI_Model{

    function get_designation_list($limit = null, $offset = null,$cond=null){

        $this->db->select('*');
        $this->db->from('employee_designations');
        $this->db->order_by('DesignationId','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();

    }


    function read($id){
        return $this->db->get_where('employee_designations',array('DesignationId'=>$id))->row();
    }

    function edit($data){

        return $this->db->update('employee_designations', $data, array('DesignationId'=> $data['DesignationId']));
    }

    function add($data)
    {
        return $this->db->insert('employee_designations',$data);
    }

    function delete($id)
    {
        $this->db->where('DesignationId',$id);
        $this->db->delete('employee_designations');
        return true;
    }
}
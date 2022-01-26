<?php

/**
 * Location Model Class.
 * @pupose		Manage Location information
 *
 * @filesource	./system/application/models/branches.php
 * @package		asif
 * @version      $Revision: 1 $
 * @author       $Author: S. Asif Raihan $
 * @lastmodified $Date: 2014-20-11 $
 */
class Branch extends MY_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list($BranchId=null,$IsHeadOffice=null)
    {
        if(isset($BranchId) && $IsHeadOffice != 1){
            $this->db->where('branches.BranchId',$BranchId);
        }
        $this->db->select('*');
        $this->db->from('branches');
        $this->db->order_by('BranchId','ASC');
        $query = $this->db->get();
        return $query->result();
    }
    function get_list_without_head_office($role_id)
    {
        $this->db->select('*');
        $this->db->from('branches');
        $this->db->order_by('BranchId','ASC');
        if($role_id != 1){
            $this->db->where('IsHeadOffice',0);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function add($data)
    {
        $this->db->insert('branches', $data);
        return true;
    }
    function read($id){
        return $this->db->get_where('branches',array('BranchId'=>$id))->row();
    }
    function edit($data){
        //echo"<pre>"; print_r($data); die;
        return $this->db->update('branches', $data, array('BranchId'=> $data['BranchId']));
    }
    function delete($id){
        $this->db->trans_start();
        $this->db->delete('branches', array('BranchId'=> $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_all_location_list()
    {
        $this->db->select('*');
        $this->db->from('branches');
        $this->db->order_by('BranchId','ASC');
        $query = $this->db->get();
        $query =  $query->result();
        $location_list = array();
        foreach($query as $row){
            $location_list[$row->BranchId]['BranchId'] = $row->BranchId;
            $location_list[$row->BranchId]['BranchName'] = $row->BranchName;
        }
        return $location_list;
    }
    function get_all_location_list_except_this($branch_id)
    {
        $where = "branches.BranchId != $branch_id";
        $this->db->select('*');
        $this->db->from('branches');
        $this->db->where($where);
        $this->db->order_by('BranchId','ASC');
        $query = $this->db->get();
        $query =  $query->result();
        $location_list = array();
        foreach($query as $row){
            $location_list[$row->BranchId]['BranchId'] = $row->BranchId;
            $location_list[$row->BranchId]['BranchName'] = $row->BranchName;
        }
        return $location_list;
    }
    function get_all_location_without_this($LocationId)
    {
        $this->db->select('*');
        $this->db->from('branches');
        $this->db->order_by('BranchId','ASC');
        $this->db->where('BranchId !=',$LocationId);
        $query = $this->db->get();
        $query =  $query->result();
        $location_list = array();
        foreach($query as $row){
            $location_list[$row->BranchId]['BranchId'] = $row->BranchId;
            $location_list[$row->BranchId]['BranchName'] = $row->BranchName;
        }
        return $location_list;
    }
    function get_office_id(){
        $this->db->select('BranchId');
        $this->db->from('branches');
        $this->db->where('IsHeadOffice',1);
        $query = $this->db->get();
        return $query->row()->BranchId;
    }
    function get_branch_code(){
        $q = "SELECT IFNULL(MAX(`BranchId`),0) AS BranchId FROM `branches`";
        $results = $this->db->query($q);
        $results = $results->row()->BranchId;
        $results = $results+1;
        return sprintf("%03d", $results);
    }

}

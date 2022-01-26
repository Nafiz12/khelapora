<?php

/**
 * Category Model Class.
 * @pupose		Manage category information
 *
 * @filesource	./system/application/models/category.php
 * @package		asif
 * @version      $Revision: 1 $
 * @author       $Author: S. Asif Raihan $
 * @lastmodified $Date: 2014-20-11 $
 */
class Organization extends MY_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function add($data) {
        //echo"In <pre>"; print_r($data); die;
        return $this->db->insert('organizations', $data);
    }

    function read($id) {
        $org_info = $this->db->get_where('organizations', array('OrganizationId' => $id))->row();
        $location_data=$this->session->userdata('system.branch');
        $branch_info = $this->Branch->read($location_data['BranchId']);
        $org_info->OrganizationName = $branch_info->BranchName;
        $org_info->OrganizationAddress_1 = $branch_info->BranchAddress;
        $org_info->ContactNumber = $branch_info->ContactNumber;
        $org_info->Org_Logo = $org_info->Logo;
        $org_info->Logo = $branch_info->Logo;
        return $org_info;

    }

    function edit($data) {
        //echo"<pre>"; print_r($data); die;
        return $this->db->update('organizations', $data, array('OrganizationId' => $data['OrganizationId']));
    }

    function get_list() {
        $this->db->select('*');
        $this->db->from('organizations');
        $query = $this->db->get();
        return $query->result();
    }

    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('organizations', array('OrganizationId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

}

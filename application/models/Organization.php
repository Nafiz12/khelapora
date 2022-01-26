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
class Organization extends CI_Model {

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
        return $this->db->get_where('organizations', array('OrganizationId' => $id))->row();
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

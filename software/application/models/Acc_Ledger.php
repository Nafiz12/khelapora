<?php

/**
 * categories Model Class.
 * @pupose		Manage categories information
 *
 * @filesource	./system/application/models/categories.php
 * @package		asif
 * @version      $Revision: 1 $
 * @author       $Author: S. Asif Raihan $
 * @lastmodified $Date: 2014-20-11 $
 */
class Acc_Ledger extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function add($data) {
        //echo"In <pre>"; print_r($data); die;
        return $this->db->insert('categories', $data);
    }

    function read($id) {
        return $this->db->get_where('categories', array('CategoryId' => $id))->row();
    }

    function edit($data) {
        //echo"<pre>"; print_r($data); die;
        return $this->db->update('categories', $data, array('CategoryId' => $data['CategoryId']));
    }

    function get_list() {
        $this->db->select('*');
        $this->db->from('categories');
        $query = $this->db->get();
        return $query->result();
    }

    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('categories', array('CategoryId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

}

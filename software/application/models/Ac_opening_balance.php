<?php

/**
 * Location Model Class.
 * @pupose		Manage Location information
 *
 * @filesource	./system/application/models/location.php
 * @package		asif
 * @version      $Revision: 1 $
 * @author       $Author: S. Asif Raihan $
 * @lastmodified $Date: 2014-20-11 $
 */
class Ac_opening_balance extends MY_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        //$this->load->database();
    }
    function get_list(){
        $result = $this->db->query("SELECT * FROM `ac_opening_balances`");
        return $result->result_array();
    }
    function add($data){
        $this->db->trans_start();
        $this->db->empty_table('ac_opening_balances');

        $this->db->insert_batch('ac_opening_balances', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_opening_balance_info($ledger_id,$BranchId){
        $query = $this->db->query("SELECT * FROM `ac_opening_balances` WHERE LedgerId='$ledger_id' AND BranchId='$BranchId' ");
        return $query->row();
    }
}


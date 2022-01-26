<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ac_income_statements extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model(array('Ac_ledger', 'Ac_voucher','Organization','Ac_income_statement','Branch'), '', TRUE);
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data = $this->_load_combo_data();
        $data['headline'] = 'Income Statement';
        $data['title'] = 'Income Statement';

        $this->layout->view('reports/ac_income_statements/index', $data);
    }
    function ajax_get_income_statement() {
        $data = array();
        $data = $this->_get_posted_data();
        $data['headline'] = 'Income Statement';
        $data['title'] = 'Income Statement';
        $data['income_data'] = $this->Ac_income_statement->get_income_information($data);
        $data['expense_data'] = $this->Ac_income_statement->get_expense_information($data);
        $data['organization_info'] = $this->Organization->read(1);
        $this->layout->view('reports/ac_income_statements/income_statement', $data);
    }
    /**
     *
     * @author  :   Asif Raihan
     * @uses    :
     * @access  :   public
     * @param   :   none
     * @return  :   array
     */
    function _load_combo_data() {
        $data = array();

        $data['branch_list']=$this->Branch->get_all_location_list();
        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data['date'] = date("Y-m-d", strtotime($this->input->post('txt_date')));
        $data['BranchId']=$this->input->post('BranchId');
        return $data;
    }


}

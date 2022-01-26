<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ledger_reports extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model(array('Ledger_report','Ac_ledger','Ac_opening_balance','Organization','Branch'), '', TRUE);
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data = $this->_load_combo_data();
        $data['headline'] = 'Ledger Report';
        $data['title'] = 'Ledger Report';
        //$data['language_list'] = $this->Language_translation->get_language_list();
        $this->layout->view('reports/ledger_reports/index', $data);
    }
    function ajax_get_report_information() {
        $data = array();
        $data = $this->_get_posted_data();
        $data['headline'] = 'Ledger Report';
        $data['title'] = 'Ledger Report';
        $data['ledger_info'] = $this->Ac_ledger->read($data['ledger_id']);
        $LocationId = $this->get_location_id();
        $opening_balance_info = $this->Ac_opening_balance->get_opening_balance_info($data['ledger_id'],$LocationId);
        $data['opening_balance_info'] =$opening_balance_info;
        $data['balance_before_date'] =$this->Ledger_report->get_balance_before_date($data['ledger_id'],$data['DateFrom'],$LocationId,$data['voucher_type']);
        $data['report_details'] = $this->Ledger_report->get_report_data($data);
        $data['organization_info'] = $this->Organization->read(1);
        //$data['language_list'] = $this->Language_translation->get_language_list();
        //echo "<pre>";print_r($data);die;
        $this->layout->view('reports/ledger_reports/ledger_report', $data);
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
        $data['ledger_infos'] = $this->Ac_ledger->get_acc_ledger_list();
        $option = array();
        $option[-1] = '-- ALL --';
        $option[0] = 'Manual Voucher';
        $option[1] = 'Auto Voucher';
        $data['voucher_type'] = $option;
        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data['BranchId'] = $this->get_location_id();
        $data['ledger_id'] = $this->input->post('cbo_ledger');
        $data['DateFrom'] = date("Y-m-d", strtotime($this->input->post('txt_from_date')));
        $data['DateTo'] = date("Y-m-d", strtotime($this->input->post('txt_to_date')));
        $data['voucher_type'] = $this->input->post('cbo_voucher_type');
        return $data;
    }


}

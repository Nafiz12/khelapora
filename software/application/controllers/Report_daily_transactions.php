<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Report_daily_transaction
 *
 * @author Nayan
 */
class Report_daily_transactions extends MY_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Branch', 'Student', 'Report_daily_collection_register', 'Organization', 'Config_class', 'Config_section', 'Fee_type', 'Ac_ledger','Report_daily_transaction'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        //echo 'dss';die;

        $data = $this->_load_combo_data();
        $data['headline'] = 'Daily Collection Register Report';
        $data['title'] = 'Daily Transactions Report';
        $this->layout->view('reports/report_daily_transactions/index', $data);
    }

    function _load_combo_data() {
        $data = array();
        $data['ledger_infos'] = $this->Ac_ledger->get_acc_ledger_list();
        $data['branch_list']=$this->Branch->get_all_location_list();
        $option = array();
        $option[-1] = '-- ALL --';
        $option[0] = 'Manual Voucher';
        $option[1] = 'Auto Voucher';
        $data['voucher_option'] = $option;
        $option = array();
        $option[-1] = '-- ALL --';
        $option[0] = 'Received Voucher';
        $option[1] = 'Payment Voucher';
        $data['voucher_type'] = $option;
        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data['voucher_type'] = $this->input->post('cbo_voucher_type');
        $data['DateFrom'] = date("Y-m-d", strtotime($this->input->post('txt_from_date')));
        $data['DateTo'] = date("Y-m-d", strtotime($this->input->post('txt_to_date')));
        $data['voucher_option'] = $this->input->post('cbo_voucher_option');
        $data['BranchId'] = $this->input->post('BranchId');
        return $data;
    }

    function ajax_get_report_information() {
        $data = array();
        $data = $this->_get_posted_data();
        $data['headline'] = 'Daily Transaction Report';
        $data['title'] = 'Daily Transaction';
        if (empty($data['BranchId'])) {
            $data['errors'][] = 'Please enter proper branch, date from and date to';
            // $this->load->view('/reports/report_message',$data);
        } else {
            $data['branch_info'] = $this->Branch->read($data['BranchId']);
        }
        //echo "<pre>sss";print_r($data);die;
        if (!empty($data['DateFrom']) && !empty($data['DateTo'])) {
            //$fromDate = $data['DateFrom'];
            //$toDate = $data['DateTo'];
           //$data['daily_transaction'] = $this->Report_daily_transaction->get_daily_transaction($data['DateFrom'], $data['DateTo'], $data['BranchId'], $data['voucher_option'], $data['voucher_type']);
            
            $data['daily_transaction'] = $this->Report_daily_transaction->getData($data['DateFrom'], $data['DateTo'], $data['BranchId'], $data['voucher_option'], $data['voucher_type']);
            
            if ($data['BranchId'] == -1) {
                $branch_info = $this->Po_branch->get_branches_info();
                $branch_infos = array();
                foreach ($branch_info as $branch) {
                    $branch_infos[$branch->branch_id] = $branch->branch_code . ' - ' . $branch->branch_name;
                }
                foreach ($data['daily_transaction'] as $key => $row) {
                    if (isset($branch_infos[$row->branch_id])) {
                        $data['daily_transaction'][$key]->branch_name = $branch_infos[$row->branch_id];
                    } else {
                        $branch_infos[$row->branch_id] = '';
                    }
                }
            }
            
            // echo "<pre>";print_r($data);die;
            $this->layout->view('reports/report_daily_transactions/daily_transaction_report', $data);
        }
    }

}

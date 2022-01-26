<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Income_expense_reports extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model(array('Ac_ledger', 'Ac_voucher','Organization','Income_expense_report','Branch'), '', TRUE);
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data = $this->_load_combo_data();
        $data['headline'] = 'Receipt & Payment Statement';
        $data['title'] = 'Receipt & Payment Statement';

        $this->layout->view('reports/income_expense_reports/index', $data);
    }
    function ajax_get_income_expense() {
        $data = array();
        $data = $this->_get_posted_data();
        $data['headline'] = 'Receipt & Payment Statement';
        $data['title'] = 'Receipt & Payment Statement';
        $data['income_data'] = $this->Income_expense_report->get_income_information($data);
        //echo '<pre>'; print_r($data); die;
        $total_income = 0;
        foreach ($data['income_data'] as $key => $value) {
            foreach ($value as  $income) {
                $total_income = $total_income+$income['TillDateIncome'];
            }
        }
        $data['total_income'] = $total_income;
        $data['expense_data'] = $this->Income_expense_report->get_expense_information($data);
        $total_expense = 0;
        foreach ($data['expense_data'] as $key => $value) {
            foreach ($value as  $expense) {
                $total_expense = $total_expense+$expense['TillDateIncome'];
            }
        }
        $data['total_expense'] = $total_expense;
        $data['organization_info'] = $this->Organization->read(1);
        // echo "<pre>";print_r($data);die;
        $this->layout->view('reports/income_expense_reports/report', $data);
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
        $data['from_date'] = date("Y-m-d", strtotime($this->input->post('txt_from_date')));
        $data['to_date'] = date("Y-m-d", strtotime($this->input->post('txt_to_date')));
        $data['BranchId']=$this->input->post('BranchId');
        return $data;
    }


}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ac_vouchers extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(array('Ac_ledger','Ac_voucher','Branch'), '', TRUE);
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }

    function index() {
        $cond = array();
        $session_data = $this->input->get();
        if(empty($session_data)){
            $session_data['BranchId']=  $this->get_location_id();
        }
        if (is_array($session_data)) {
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
            $cond['PaymentDate1'] = isset($session_data['PaymentDate1']) ? $session_data['PaymentDate1'] : '';
            $cond['PaymentDate2'] = isset($session_data['PaymentDate2']) ? $session_data['PaymentDate2'] : '';
            $cond['VoucherCode'] = isset($session_data['VoucherCode']) ? $session_data['VoucherCode'] : '';
            $cond['VoucherType'] = isset($session_data['VoucherType']) ? $session_data['VoucherType'] : '';
        }

        $this->load->library('pagination');
        $total = $this->Ac_voucher->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/ac_vouchers/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);

        $data = $this->_load_combo_data();
        $data['list'] = $this->Ac_voucher->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        $data['session_data'] = $session_data;
        $data['headline'] = 'List of Vouchers';
        $data['title'] = 'Vouchers Lists';
        $this->layout->view('ac_vouchers/index',$data);
    }

    function add() {
        $data = array();
        if ($_POST) {
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {

                $data['VoucherId'] = $this->Ac_ledger->get_new_id('acc_vouchers', 'VoucherId');
                // generate Voucher Data
                $voucher = array();
                $voucher['VoucherId'] = $data['VoucherId'];
                $voucher['VoucherType'] = $data['VoucherType'];
                $voucher['LocationId'] = $data['LocationId'];
                $voucher['VoucherCode'] = $data['VoucherCode'];
                $voucher['VoucherAmount'] = $data['VoucherAmount'];
                $voucher['Particulars'] = $data['Particulars'];
                $voucher['EntryDate'] = $data['VoucherDate'];
                $voucher['EntryBy'] = $this->get_user_id();
                $voucher['IsAutoVoucher'] = 0;

                //Generate Voucher Details
                $length = count($data['CreditLedgerId']);
                $voucher_details = array();
                for ($i = 1; $i <= $length; $i++) {
                    $voucher_details[$i]['VoucherDetailsId'] = NULL;
                    $voucher_details[$i]['CheckNumber'] = NULL;
                    $voucher_details[$i]['VoucherId'] = $data['VoucherId'];
                    $voucher_details[$i]['LocationId'] = $data['LocationId'];
                    $voucher_details[$i]['CreditLedgerId'] = $data['CreditLedgerId'][$i];
                    $voucher_details[$i]['DebitLedgerId'] = $data['DebitLedgerId'][$i];
                    $voucher_details[$i]['Particulars'] = $data['txt_particulars'][$i];
                    $voucher_details[$i]['Amount'] = $data['Amount'][$i];
                }

                $this->db->trans_start();
                $this->Ac_voucher->add($voucher);
                $this->Ac_voucher->add_voucher_details($voucher_details);
                $this->db->trans_complete();
                if ($this->db->trans_status()) {
                    $this->session->set_flashdata('success', 'Voucher has been added successfully');
                    redirect('ac_vouchers/index', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Sorry,operation perform failed');
                    redirect('ac_vouchers/index', 'refresh');
                }
            }
        }
        $data = $this->_load_combo_data();
        $data['headline'] = 'Ac Ledger Information';
        $data['title'] = 'Ac Ledger Entry';
        $this->layout->view('ac_vouchers/save', $data);
    }

    function edit($id = null) {
        $data = array();
        if ($_POST) {
            $id = $this->input->post('LedgerId');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['LedgerId'] = $this->input->post('LedgerId');
                if ($this->Ac_voucher->edit($data)) {
                    $this->session->set_flashdata('message', 'Data has been updated successfully');
                    redirect('ac_vouchers/add', 'refresh');
                }
            }
        }
        $data = $this->_load_combo_data();
        $data['headline'] = 'Edit Ac_voucher';
        $data['title'] = 'Edit Ac_voucher Entry';
        $data['row'] = $this->Ac_voucher->read($id);
        $this->layout->view('ac_vouchers/save', $data);
    }
    function delete($id = null) {
        if (empty($id)) {
            //$this->session->set_flashdata('warning','Location ID is not provided');
            redirect('customers/index/', 'refresh');
        } else {
            $row = $this->Ac_voucher->read($id);
            //echo "<pre>";print_r($row);die;
            if ($this->Ac_voucher->delete($id) == true) {
                //$this->session->set_flashdata('message',DELETE_MESSAGE);
                redirect('ac_vouchers/index/', 'refresh');
            }
        }
    }

    function _get_posted_data() {
        $data = array();
        $data['VoucherType'] = $this->input->post('VoucherType');
        $data['VoucherDate'] = date("Y-m-d", strtotime($this->input->post('VoucherDate')));
        $data['VoucherCode'] = $this->input->post('VoucherCode');
        $data['VoucherAmount'] = $this->input->post('VoucherAmount');
        $data['Particulars'] = $this->input->post('Particulars');
        $data['LocationId'] = $this->input->post('LocationId');

        $data['CreditLedgerId'] = $this->input->post('txt_credit_id');
        $data['DebitLedgerId'] = $this->input->post('txt_debit_id');
        $data['Amount'] = $this->input->post('txt_amount');
        $data['txt_particulars'] = $this->input->post('txt_particulars');

        return $data;
    }
    function _load_combo_data() {
        $data = array();
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['acc_types']= $this->Ac_ledger->get_ledger_account_type_list();
        $data['all_acc_types']= $this->Ac_ledger->get_all_ledger_account_type_list();
        $data['voucher_type_list']= array( ''=>'--- Select Voucher Type ---','P'=>'Payment Voucher','R'=>'Receipt Voucher');
        return $data;
    }

    function _prepare_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('VoucherType','Type','trim|required');
        $this->form_validation->set_rules('VoucherDate','Date','trim|required');
        $this->form_validation->set_rules('VoucherAmount','Amount','trim|required');
    }
    function ajax_get_voucher_code(){
        $VoucherType= $this->input->post('VoucherType');
        $BranchId=  $this->get_location_id();
        $voucher_code = $this->Ac_voucher->get_voucher_code($BranchId,$VoucherType);

        if (empty($voucher_code)) {
            $callback_message['status'] = "failure";
        } else {
            $callback_message['status'] = "Success";
            $callback_message['voucher_code'] = $voucher_code;
        }
        echo json_encode($callback_message);
    }
    function ajax_get_credit_account_list(){
        $VoucherType= $this->input->post('VoucherType');
        $credit_amount_list = $this->Ac_voucher->get_credit_account_list($VoucherType);
        if (empty($credit_amount_list)) {
            $callback_message['status'] = "failure";
        } else {
            $callback_message['credit_ledger_id'][] ='';
            $callback_message['credit_ledger_name'][] ="------Select------";
            foreach ($credit_amount_list as $row) {
                $callback_message['status'] = 'success';
                $callback_message['credit_ledger_id'][] = $row['LedgerId'];
                $callback_message['credit_ledger_name'][] = $row['LedgerCode'].' - '.$row['LedgerName'];
            }
        }
        echo json_encode($callback_message);
    }
    function ajax_get_debit_account_list(){
        $VoucherType= $this->input->post('VoucherType');
        $debit_amount_list = $this->Ac_voucher->get_debit_account_list($VoucherType);
        if (empty($debit_amount_list)) {
            $callback_message['status'] = "failure";
        } else {
            $callback_message['debit_ledger_id'][] ='';
            $callback_message['debit_ledger_name'][] ="------Select------";
            foreach ($debit_amount_list as $row) {
                $callback_message['status'] = 'success';
                $callback_message['debit_ledger_id'][] = $row['LedgerId'];
                $callback_message['debit_ledger_name'][] = $row['LedgerCode'].' - '.$row['LedgerName'];
            }
        }
        echo json_encode($callback_message);
    }
    function ajax_get_voucher_name(){
        $ledger_id= $this->input->post('ledgerId');
        $account_details = $this->Ac_ledger->read($ledger_id);
        if (empty($account_details)) {
            $callback_message['status'] = "failure";
        } else {
            $callback_message['status'] = 'success';
            $callback_message['ledger_id'] = $account_details->LedgerId;
            $callback_message['ledger_name'] = $account_details->LedgerCode.' - '.$account_details->LedgerName;
        }
        echo json_encode($callback_message);
    }

}

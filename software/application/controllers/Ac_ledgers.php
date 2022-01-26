<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ac_ledgers extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(array('Ac_ledger'), '', TRUE);
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    function index() {
        $cond = array();
        $session_data = $this->input->get();
        //echo"a<pre>"; print_r($session_data); //die;
        if (is_array($session_data)) {
            $cond['TypeId'] = isset($session_data['TypeId']) ? $session_data['TypeId'] : '';
        }

        $this->load->library('pagination');
        $total = $this->Ac_ledger->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/ac_ledgers/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 100;
        $this->pagination->initialize($config);

        $data = $this->_load_combo_data();
        $data['list'] = $this->Ac_ledger->get_acc_ledger_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        //$data['list'] = $this->Ac_ledger->fetchCategoryTree_index();
        $data['session_data'] = $session_data;
        $data['headline'] = 'List Of Ledger Accounts';
        $data['title'] = 'Ledger Account Lists';
        //echo"<pre>"; print_r($data); die;
        $this->layout->view('ac_ledgers/index',$data);
    }

    function add() {
        $data = array();
        if ($_POST) {
            $this->_prepare_validation();
            $this->form_validation->set_rules('LedgerCode','Code','trim|required|is_unique[acc_ledgers.LedgerCode]');
            $data = $this->_get_posted_data();
            //echo"<pre>"; print_r($data); die;
            if ($this->form_validation->run()) {
                $data['LedgerId'] = NULL;
                if ($this->Ac_ledger->add($data)) {
                    $this->session->set_flashdata('success', 'Ledger Account has been added successfully');
                    redirect('ac_ledgers/index', 'refresh');
                }
            }
        }
        $data = $this->_load_combo_data();
        $data['headline'] = 'Ac Ledger Information';
        $data['title'] = 'Ac Ledger Entry';
        $this->layout->view('ac_ledgers/save', $data);
    }

    function edit($id = null) {
        $data = array();
        if ($_POST) {
            $id = $this->input->post('LedgerId');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['LedgerId'] = $this->input->post('LedgerId');
                if ($this->Ac_ledger->edit($data)) {
                    $this->session->set_flashdata('success', 'Ledger Account has been updated successfully');
                    redirect('ac_ledgers/index', 'refresh');
                }
            }
        }
        $data = $this->_load_combo_data();
        $data['headline'] = 'Edit Ac_ledger';
        $data['title'] = 'Edit Ac_ledger Entry';
        $data['row'] = $this->Ac_ledger->read($id);
        $this->layout->view('ac_ledgers/save', $data);
    }
    function delete($id = null) {
        if (empty($id)) {
            //$this->session->set_flashdata('warning','Location ID is not provided');
            redirect('customers/index/', 'refresh');
        } else {
            $row = $this->Ac_ledger->read($id);
            //echo "<pre>";print_r($row);die;
            if ($this->Ac_ledger->delete($id) == true) {
                //$this->session->set_flashdata('message',DELETE_MESSAGE);
                redirect('ac_ledgers/index/', 'refresh');
            }
        }
    }

    function _get_posted_data() {
        $data = array();
        $data['TypeId'] = $this->input->post('TypeId');
        $data['LedgerName'] = $this->input->post('LedgerName');
        $data['LedgerCode'] = $this->input->post('LedgerCode');
        $data['LedgerDescription'] = $this->input->post('LedgerDescription');
        $IsGroupHead = $this->input->post('cbo_is_group_head');
        if($IsGroupHead == '0'){
            $data['GroupHeadId'] = $this->input->post('cbo_group_head');
        }else{
            $data['GroupHeadId'] = 0;
        }

        $data['IsGroupHead'] = $IsGroupHead;
        return $data;
    }
    function _load_combo_data() {
        $data = array();
        $data['acc_types']= $this->Ac_ledger->get_ledger_account_type_list();
        $data['acc_group_heads']= $this->Ac_ledger->get_group_heads();
        $data['all_acc_types']= $this->Ac_ledger->get_all_ledger_account_type_list();
        return $data;
    }

    function _prepare_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('LedgerName','Name','trim|required');
        $this->form_validation->set_rules('cbo_group_head','Group Head','trim|callback_check_is_required');
    }
    function check_is_required(){
        $cbo_is_group_head = $this->input->post('cbo_is_group_head');
        if(!empty($cbo_is_group_head) && $cbo_is_group_head=='0'){
            $this->form_validation->set_message('check_is_required', "Group Head can not be empty");
            return FALSE;
        }
        return true;
    }

}

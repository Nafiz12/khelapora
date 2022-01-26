<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ac_opening_balances extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(array('Ac_opening_balance','Branch','Ac_ledger'), '', TRUE);
        //error_reporting(E_ALL);
        //ini_set('display_errors',1);
        //$his->output->enable_profiler(TRUE);
        $this->load->helper('form');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data = $this->_load_combo_data();
        $data['headline'] = 'Opening Balances';
        $data['title'] = 'Opening Balances';
        $LocationId = $this->get_location_id();
        $data['results'] = $this->Ac_opening_balance->get_list($LocationId);
        //$data['language_list'] = $this->Language_translation->get_language_list();
        $this->layout->view('ac_opening_balances/add', $data);
    }

    function add() {
        $data = array();
        if ($_POST) {
            $data = $this->_get_posted_data();
            $balance_array = array();
            $i=1;
            foreach($data['LedgerId'] as $key=>$LedgerId){
                $balance_array[$LedgerId]['BalanceId'] = $i;
                $balance_array[$LedgerId]['Date'] = $data['Date'];
                $balance_array[$LedgerId]['BranchId'] = $data['BranchId'];
                $balance_array[$LedgerId]['LedgerId'] = $LedgerId;
                $balance_array[$LedgerId]['Amount'] = $data['Amount'][$key];
                $i++;
            }
            if ($this->Ac_opening_balance->add($balance_array)) {
                $this->session->set_flashdata('success', 'Data has been added successfully');
                redirect('ac_opening_balances/index', 'refresh');
            }
        }
    }
    function _load_combo_data(){
        //$data['ledger_infos'] = $this->Ac_ledger->get_all_ledger_list();
        $data['ledger_infos'] = $this->Ac_ledger->get_acc_ledger_list();
        return $data;

    }
    function _get_posted_data() {
        $data = array();
        $data['LedgerId'] = $this->input->post('cbo_ledger');
        $data['Amount'] = $this->input->post('Amount');
        $data['Date'] = date("Y-m-d", strtotime($this->input->post('Date')));
        $data['BranchId'] = $this->get_location_id();
        return $data;
    }

    function _prepare_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('Amount','Amount','trim|required');
    }

}

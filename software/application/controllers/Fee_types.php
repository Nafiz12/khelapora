<?php
class Fee_types extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Fee_type','Config_general','Ac_ledger','Fee_category'));
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('security');
    }
    function index() {
        $data = array();
        $data['headline'] = 'List Of Type';
        $data['title'] = 'Fee Type';
        $data['results'] = $this->Fee_type->get_list();
        //echo"<pre>"; print_r($data); die;
        $this->layout->view('fee_types/index', $data);
    }

    function add() {
        $data=$this->_load_combo_data();
        if ($_POST) {
            $this->_prepare_validation();
            $data['row'] = $this->_get_posted_data();
            $this->form_validation->set_rules('txt_type_name', 'Type Name', 'is_unique[fee_types.TypeName]');
            if ($this->form_validation->run()) {
                $data['row']['TypeId'] = NULL;
                if ($this->Fee_type->add($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been added successfully');
                    redirect('fee_types/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Type Information';
        $data['title'] = ' Add New Type';
        $this->layout->view('fee_types/add', $data);
    }

    function edit($id = null) {
        $data = array();
        if ($_POST) {
            $id = $this->input->post('text_type_id');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['TypeId'] = $this->input->post('text_type_id');

                if ($this->Fee_type->edit($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('fee_types/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['headline'] = 'Edit Type';
        $data['title'] = 'Edit Type Entry';
        $data['row'] = $this->Fee_type->read($id);
        $this->layout->view('fee_types/add', $data);
    }
    function delete($id = null) {
        if (empty($id)) {
            //$this->session->set_flashdata('warning','Location ID is not provided');
            redirect('fee_types/index/', 'refresh');
        } else {
            $row = $this->Fee_type->read($id);
            $fee_dependency_found = $this->Config_general->is_dependency_found('fee_details', array('TypeId' => $id));
            $fee_config_dependency_found = $this->Config_general->is_dependency_found('fee_configurations', array('TypeId' => $id));
            if($fee_dependency_found || $fee_config_dependency_found)
            {
                $this->session->set_flashdata('fail','Dependent Data Found');
                redirect('fee_types/index/', 'refresh');
            }
            else{
                if ($this->Fee_type->delete($id) == true) {
                    $this->session->set_flashdata('success', 'Data has been Deleted successfully');
                    redirect('fee_types/index/', 'refresh');
                }
            }
        }
    }
    function _load_combo_data() {
        $data = array();
        $data['category_list'] = $this->Fee_category->get_list();
        return $data;
    }
    function _get_posted_data() {
        $data = array();
        $data['TypeName'] = $this->input->post('txt_type_name');
        $data['CategoryId'] = $this->input->post('cbo_fee_type_category');
        $data['IsWaiverApplicable'] = $this->input->post('cbo_is_waiver_applicable');
        $data['IsMonthlyFee'] = $this->input->post('cbo_is_monthly_fee');
        $data['IsOneTimeFee'] = $this->input->post('cbo_is_onetime_fee');
        $data['Description'] = $this->input->post('txt_description');
        //$data['LedgerCode'] = $this->input->post('txt_ledger_code');
        return $data;
    }

    function _prepare_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('txt_type_name', 'Type Name', 'trim|required|max_length[200]|xss_clean');
        //$this->form_validation->set_rules('txt_ledger_code', 'Ledger Code', 'trim|required|max_length[200]|xss_clean|callback_check_ledger_code');
    }
//    function check_ledger_code(){
//        $ledger_code = $this->input->post('txt_ledger_code');
//        $has_entry = $this->Ac_ledger->read_by_code($ledger_code);
//        //echo '<pre>'; print_r($has_entry); die;
//        if(empty($has_entry) || $has_entry='' || !isset($has_entry)){
//            $this->form_validation->set_message('check_ledger_code', "Ledger code does not exists!");
//            return FALSE;
//        }
//        return true;
//    }
    function ajax_for_get_type_details(){
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $fee_type = $this->input->post('fee_type');

        if (empty($fee_type)) {
            $callback_message['status'] = 'failure';
            $callback_message['message'] = 'Select a type';
        }
        else{
            $callback_message['status'] = 'success';
            $callback_message['type_id'] = $fee_type;
            $type_info = $this->Fee_type->read($fee_type);
            $callback_message['IsMonthlyFee'] = $type_info->IsMonthlyFee;
            $callback_message['IsWaiverApplicable'] = $type_info->IsWaiverApplicable;
        }
        echo json_encode($callback_message);
    }

}
?>
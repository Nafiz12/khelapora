<?php
class Employee_branch_transfers extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->model(array('Employee_branch_transfer','Branch','Employee'));
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        //echo"a<pre>"; print_r($session_data); //die;
        if(empty($session_data)){
            $session_data['BranchId']=  $this->get_location_id();
        }
        if (is_array($session_data)) {
            $cond['EmployeeName'] = isset($session_data['EmployeeName']) ? $session_data['EmployeeName'] : '';
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
        }
        $this->load->library('pagination');
        $total = $this->Employee_branch_transfer->row_count($cond);
        //Initializing Pagination
        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/employee_branch_transfers/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $this->pagination->initialize($config);

        $data = $this->_load_combo_data();
        $data['list'] = $this->Employee_branch_transfer->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        $data['session_data'] = $session_data;
        $data['headline'] = 'List Of Users';
        $data['title'] = 'Employee_branch_transfer List';
        $this->layout->view('employee_branch_transfers/index',$data);
    }
    function add()
    {
        if($_POST)
        {
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['TransferId'] = NULL;
                if ($this->Employee_branch_transfer->add($data)) {
                    $employee['EmployeeId'] = $data['EmployeeId'];
                    $employee['BranchId'] = $data['NewBranchId'];
                    $this->Employee->edit($employee);
                    $this->session->set_flashdata('success', ' Data has been added successfully');
                    redirect('employee_branch_transfers/index', 'refresh');
                }
            }
            else{
                $data['row'] = $data;
            }
        }
        $data = $this->_load_combo_data();
        $data['branch_list'] = $this->Branch->get_all_location_list();
        $data['headline'] = 'List Of Transfer';
        $data['title']="Add Employee Branch transfer";
        $this->layout->view("employee_branch_transfers/add",$data);
    }
    function edit($id = null) {
        if ($_POST) {
            $id = $this->input->post('TransferId');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['TransferId'] = $this->input->post('TransferId');
                if ($this->Employee_branch_transfer->edit($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('employee_branch_transfers/index', 'refresh');
                }
            }
        }
        $data = $this->_load_combo_data();
        $data['headline'] = 'Edit Employee_branch_transfer';
        $data['title'] = 'Edit Employee_branch_transfer Entry';
        $data['row'] = $this->Employee_branch_transfer->read($id);
        $this->layout->view('employee_branch_transfers/add', $data);
    }
    function _load_combo_data() {
        $data = array();
        $branch_data=$this->session->userdata('system.branch');
        $data['employee_list']=$this->Employee->get_branch_wise_employee_list($branch_data['BranchId']);
        $data['to_branch_list']=$this->Branch->get_all_location_list_except_this($branch_data['BranchId']);
        $data['branch_list']=$this->Branch->get_all_location_list();
        return $data;
    }
    function delete($id)
    {
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('employee_branch_transfers/index', 'refresh');
        }

        $transfer_data = $this->Employee_branch_transfer->read($id);
        $employee['EmployeeId'] = $transfer_data->EmployeeId;
        $employee['BranchId'] = $transfer_data->OldBranchId;
        $this->Employee->edit($employee);

        if($this->Employee_branch_transfer->delete($id)){
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('employee_branch_transfers/index', 'refresh');
        }
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('cbo_employee','Status','trim|required');
        $this->form_validation->set_rules('cbo_branch','Branch From','trim|required');
        $this->form_validation->set_rules('cbo_branch_to','Branch From','trim|required');
        $this->form_validation->set_rules('txt_date_of_transfer','Date','trim|required');
    }
    function _get_posted_data() {
        $data = array();
        $data['EmployeeId'] = $this->input->post('cbo_employee');
        $data['OldBranchId'] = $this->input->post('cbo_branch');
        $data['NewBranchId'] = $this->input->post('cbo_branch_to');
        $data['TransferDate'] = date("Y-m-d", strtotime($this->input->post('txt_date_of_transfer')));
        $data['EntryBy']=$this->session->userdata('user_id');
        $data['EntryDate']=date('Y-m-d');
        return $data;
    }
}
?>

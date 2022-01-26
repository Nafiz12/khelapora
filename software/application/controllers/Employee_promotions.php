<?php
class Employee_promotions extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->model(array('Employee_promotion','Branch','Employee'));
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
        $total = $this->Employee_promotion->row_count($cond);
        //Initializing Pagination
        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/employee_promotions/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $this->pagination->initialize($config);

        $data = $this->_load_combo_data();
        $data['list'] = $this->Employee_promotion->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        $data['session_data'] = $session_data;
        $data['headline'] = 'List Of Information';
        $data['title'] = 'Employee Promotion List';
        $this->layout->view('employee_promotions/index',$data);
    }
    function add()
    {
        if($_POST)
        {
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['PromotionId'] = NULL;
                if ($this->Employee_promotion->add($data)) {
                    $employee['EmployeeId'] = $data['EmployeeId'];
                    $employee['DesignationId'] = $data['NewDesignationId'];
                    $this->Employee->edit($employee);
                    $this->session->set_flashdata('success', ' Data has been added successfully');
                    redirect('employee_promotions/index', 'refresh');
                }
            }
            else{
                $data['row'] = $data;
            }
        }
        $data = $this->_load_combo_data();
        $data['headline'] = 'List Of Transfer';
        $data['title']="Add Employee Branch transfer";
        $this->layout->view("employee_promotions/add",$data);
    }
    function edit($id = null) {
        if ($_POST) {
            $id = $this->input->post('PromotionId');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['PromotionId'] = $this->input->post('PromotionId');
                if ($this->Employee_promotion->edit($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('employee_promotions/index', 'refresh');
                }
            }
        }
        $data = $this->_load_combo_data();
        $data['headline'] = 'Edit Employee_promotion';
        $data['title'] = 'Edit Employee_promotion Entry';
        $data['row'] = $this->Employee_promotion->read($id);
        $this->layout->view('employee_promotions/add', $data);
    }
    function _load_combo_data() {
        $data = array();
        $branch_data=$this->session->userdata('system.branch');
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['employee_list']=$this->Employee->get_branch_wise_employee_list($branch_data['BranchId']);
        $data['designation_list']=$this->Employee->get_employee_designation();
        return $data;
    }
    function delete($id)
    {
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('employee_promotions/index', 'refresh');
        }

        $transfer_data = $this->Employee_promotion->read($id);
        $employee['EmployeeId'] = $transfer_data->EmployeeId;
        $employee['DesignationId'] = $transfer_data->OldDesignationId;
        $this->Employee->edit($employee);

        if($this->Employee_promotion->delete($id)){
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('employee_promotions/index', 'refresh');
        }
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('cbo_employee','Status','trim|required');
        $this->form_validation->set_rules('BranchId','Branch From','trim|required');
        $this->form_validation->set_rules('cbo_designation_to','Designation','trim|required');
        $this->form_validation->set_rules('cbo_designation_from','Designation','trim|required');
    }
    function _get_posted_data() {
        $data = array();
        $data['Type'] = $this->input->post('Type');
        $data['EmployeeId'] = $this->input->post('cbo_employee');
        $data['BranchId'] = $this->input->post('BranchId');
        $data['OldDesignationId'] = $this->input->post('cbo_designation_to');
        $data['NewDesignationId'] = $this->input->post('cbo_designation_from');
        $data['PromotionDate'] = date("Y-m-d", strtotime($this->input->post('PromotionDate')));
        $data['EntryBy']=$this->session->userdata('user_id');
        $data['EntryDate']=date('Y-m-d');
        return $data;
    }
}
?>

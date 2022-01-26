<?php
class Report_employee_registers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Branch','Report_employee_register','Employee_designation','Organization'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data = $this->_load_combo_data();
        $data['headline'] = 'Employee Register Report';
        $data['title'] = 'Employee Register Report';
        $this->layout->view('reports/report_employee_registers/index', $data);


    }

    function ajax_get_employee_registers_report() {
        $data = $this->_get_posted_data();
        $data['organization_info'] = $this->Organization->read(1);
        if(empty($data['DesignationId'])){
            $this->session->set_flashdata('fail','Fill Up all the field ! Then try again .');
            redirect('report_employee_registers/index/', 'refresh');
        }
        $data['headline'] = 'Employee Register Report';
        $data['title'] = 'Employee Register Report';
        $data['employee_info'] = $this->Report_employee_register->get_branch_and_designation_wise_employee($data['DesignationId'],$data['BranchId']);
        //echo"<pre>";print_r($data);die;
        $this->layout->view('reports/report_employee_registers/report_employee_register', $data);
    }

    function _load_combo_data() {
        $data = array();
        $cond['BranchId']=  $this->get_location_id();
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['designation_list']=$this->Report_employee_register->get_designation_list();
        //echo"<pre>"; print_r($data); die;
        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data['BranchId'] = $this->input->post('cbo_branch');
        $data['DesignationId'] = $this->input->post('DesignationId');
        return $data;
    }

}

?>
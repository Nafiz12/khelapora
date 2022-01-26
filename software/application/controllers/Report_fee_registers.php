<?php
class Report_fee_registers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Branch','Student','Report_fee_register','Organization', 'Config_class', 'Config_section','Fee_type','Fee_configuration'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data = $this->_load_combo_data();
        $data['headline'] = 'Fee Register Report';
        $data['title'] = 'Fee Register Report';
        $this->layout->view('reports/report_fee_registers/index', $data);
    }

    function ajax_get_report() {
        $data = $this->_get_posted_data();
        if(empty($data['ClassId'])){
            $this->session->set_flashdata('fail','Fill Up all the field ! Then try again .');
            redirect('report_fee_registers/index/', 'refresh');
        }
        $data['organization_info'] = $this->Organization->read(1);
        $data['class_info'] = $this->Config_class->read($data['ClassId']);
        $data['section_info'] = $this->Config_section->read($data['SectionId']);
        $data['student_list'] = $this->Student->get_student_list($data['ClassId'],$data['SectionId'],$data['BranchId']);
        if($data['ReportType'] == 'O'){
            $data['headline'] = 'Onetime Fee Register Report';
            $data['title'] = 'Onetime Fee Register Report';
            $data['onetime_fee_list']=$this->Fee_configuration->get_class_wise_onetime_fee($data['ClassId'],$data['BranchId']);
            $data['report_data'] = $this->Report_fee_register->get_onetime_fee_data($data);
            $this->layout->view('reports/report_fee_registers/onetime_fee_register_report', $data);
        }
        if($data['ReportType'] == 'M'){
            $data['headline'] = 'Monthly Fee Register Report';
            $data['title'] = 'Monthly Fee Register Report';
            $data['monthly_fee_list']=$this->Fee_configuration->get_class_wise_monthly_fee($data['ClassId'],$data['BranchId']);
            $data['monthly_fee_list_with_recoverable'] = $this->Fee_configuration->get_recoverable_till_current_date($data);
            $data['report_data'] = $this->Report_fee_register->get_monthly_fee_data($data);
            $this->layout->view('reports/report_fee_registers/monthly_fee_register_report', $data);
        }
        if($data['ReportType'] == 'N'){
            $data['headline'] = 'Other Fee Register Report';
            $data['title'] = 'Other Fee Register Report';
            $data['other_fee_list']=$this->Fee_configuration->get_class_wise_other_fee($data['ClassId'],$data['BranchId']);
            $data['report_data'] = $this->Report_fee_register->get_other_fee_data($data);
            $this->layout->view('reports/report_fee_registers/other_fee_register_report', $data);
        }
    }

    function _load_combo_data() {
        $data = array();
        $cond['BranchId']=  $this->get_location_id();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['academic_year_list']=$this->get_academic_year();

        $report_types = array();
        $report_types['']='Select';
        $report_types['O']='Onetime Fee';
        $report_types['M']='Monthly Fee';
        $report_types['N']='Other Fee';
        $data['report_types']=$report_types;
        $data['monthly_fee_list']=$this->Fee_type->get_monthly_fee_list();
        //$data['onetime_fee_list']=$this->Fee_type->get_onetime_fee_list();
        $data['other_fee_list']=$this->Fee_type->get_other_fee_list();
        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data['BranchId'] = $this->input->post('cbo_branch');
        $data['Year'] = $this->input->post('Year');
        $data['ClassId'] = $this->input->post('cbo_class');
        $data['SectionId'] = $this->input->post('cbo_section');
        $ReportType = $this->input->post('cbo_report_types');
        $data['ReportType'] = $ReportType;
        if($ReportType == 'N'){
            $data['DateFrom'] = date("Y-m-d", strtotime($this->input->post('txt_date_from')));
            $data['DateTo'] = date("Y-m-d", strtotime($this->input->post('txt_date_to')));
        }
        return $data;
    }
}

?>
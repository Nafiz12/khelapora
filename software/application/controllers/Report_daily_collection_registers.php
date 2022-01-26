<?php
class Report_daily_collection_registers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Branch','Student','Report_daily_collection_register','Organization', 'Config_class', 'Config_section','Fee_type'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data = $this->_load_combo_data();
        $data['headline'] = 'Daily Collection Register Report';
        $data['title'] = 'Daily Collection Register Report';
        $this->layout->view('reports/report_daily_collection_registers/index', $data);
    }

    function ajax_get_attendance_report() {
        $posted_data = $this->_get_posted_data();
        if(empty($posted_data['ClassId'])){
            $this->session->set_flashdata('fail','Fill Up all the field ! Then try again .');
            redirect('report_daily_collection_registers/index/', 'refresh');
        }
        $data['headline'] = 'Daily Collection Register Report';
        $data['title'] = 'Daily Collection Register Report';
        $data['fee_types'] = $this->Fee_type->get_fee_type_list();
        $data['class_list'] = $this->Config_class->get_class_list($posted_data['BranchId']);
        $data['organization_info'] = $this->Organization->read(1);
        $data['report_data'] = $this->Report_daily_collection_register->get_report_data($posted_data['BranchId'],$posted_data['ClassId'],$posted_data['Year'],$posted_data['CollectionDate']);
        //echo '<pre>'; print_r($data); die;
        $this->layout->view('reports/report_daily_collection_registers/daily_collection_register_report', $data);
    }

    function _load_combo_data() {
        $data = array();
        $cond['BranchId']=  $this->get_location_id();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['academic_year_list']=$this->get_academic_year();
        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data['BranchId'] = $this->input->post('BranchId');
        $data['Year'] = $this->input->post('Year');
        $data['ClassId'] = $this->input->post('cbo_class');
        $data['CollectionDate'] = date("Y-m-d", strtotime($this->input->post('txt_date_of_collection')));
        return $data;
    }
}

?>
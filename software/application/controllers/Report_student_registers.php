<?php
class Report_student_registers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Branch','Student','Organization', 'Config_class', 'Config_section','Config_class_period'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data = $this->_load_combo_data();
        $data['headline'] = 'Student Register Report';
        $data['title'] = 'Student Register Report';
        $this->layout->view('reports/report_student_registers/index', $data);
       

    }

    function ajax_get_student_register_report() {
        $data = $this->_get_posted_data();
        $data['organization_info'] = $this->Organization->read(1);
        if(empty($data['CourseId']) || empty($data['BranchId'])){
            $this->session->set_flashdata('fail','Fill Up all the field ! Then try again .');
            redirect('report_student_registers/index/', 'refresh');
        }
        $data['headline'] = 'Student Register Report';
        $data['title'] = 'Student Register Report';
        $data['class_info'] = $this->Config_class->read($data['CourseId']);
        $data['section_info'] = $this->Config_class_period->read($data['BatchId']);
        $data['student_info'] = $this->Student->get_student_list($data['CourseId'],$data['BatchId'],$data['BranchId']);
       // echo"<pre>";print_r($data);die;
        $this->layout->view('reports/report_student_registers/report_student_register', $data);
    }

    function _load_combo_data() {
        $data = array();
        $cond['BranchId']=  $this->get_location_id();
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['section_list']=$this->Config_section->get_list();
        //echo"<pre>"; print_r($data); die;
        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data['BranchId'] = $this->input->post('cbo_branch');
        $data['CourseId'] = $this->input->post('CourseId');
        $data['BatchId'] = $this->input->post('BatchId');
        return $data;
    }
  
}

?>
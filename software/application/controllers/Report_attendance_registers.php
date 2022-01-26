<?php
class Report_attendance_registers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Branch','Student','Report_attendance_register','Organization', 'Config_class', 'Config_section'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data = $this->_load_combo_data();
        $data['headline'] = 'Attendance Register Report';
        $data['title'] = 'Attendance Register Report';
        $parent_data=$this->session->userdata('system.parent');
        if(empty($parent_data) && !isset($parent_data)){
            $this->layout->view('reports/report_attendance_registers/index', $data);
        }else{
            $student_info = $this->Student->read($parent_data['StudentId']);
            $data['row']['StudentId'] = $student_info->StudentId;
            $data['row']['ClassId'] = $student_info->ClassId;
            $data['row']['SectionId'] = $student_info->SectionId;
            $this->layout->view('reports/report_attendance_registers/index_for_parents', $data);
        }

    }

    function ajax_get_attendance_report() {
        $data = $this->_get_posted_data();
        if(empty($data['ClassId']) || empty($data['SectionId']) || empty($data['StudentId'])){
            $this->session->set_flashdata('fail','Fill Up all the field ! Then try again .');
            redirect('report_attendance_registers/index/', 'refresh');
        }
        $data['headline'] = 'Attendance Report';
        $data['title'] = 'Attendance Report';
        $data['class_info'] = $this->Config_class->read($data['ClassId']);
        $data['section_info'] = $this->Config_section->read($data['SectionId']);
        $data['student_info'] = $this->Student->read($data['StudentId']);
        $data['organization_info'] = $this->Organization->read(1);
        $data['day_list'] = $this->day_list();
        $data['attendance_info'] = $this->Report_attendance_register->get_attendance_information_by_student($data['StudentId'],$data['ClassId'],$data['SectionId'],$data['from_date'], $data['to_date']);
        $this->layout->view('reports/report_attendance_registers/attendance_register_report', $data);
    }

    function _load_combo_data() {
        $data = array();
        $data['class_list'] = $this->Config_class->get_list();
        $data['section_list']=$this->Config_section->get_list();
        //echo"<pre>"; print_r($data); die;
        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data['ClassId'] = $this->input->post('ClassId');
        $data['SectionId'] = $this->input->post('SectionId');
        $data['StudentId'] = $this->input->post('StudentId');
        $data['from_date'] = $this->input->post('txt_from_date');
        $data['to_date'] = $this->input->post('txt_to_date');
        return $data;
    }
    function day_list(){
        $data = array();
        $data['Sat'] = 'Satur Day';
        $data['Sun'] = 'Sun Day';
        $data['Mon'] = 'Mon Day';
        $data['Tue'] = 'Tues Day';
        $data['Wed'] = 'Wednes Day';
        $data['Thu'] = 'Thurs Day';
        $data['Fri'] = 'Fri Day';
        return $data;
    }
}

?>
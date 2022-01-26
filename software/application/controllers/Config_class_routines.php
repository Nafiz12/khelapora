<?php
class Config_class_routines extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Config_class_routine','Config_class','Config_section','Employee','Config_subject','Config_class_period','Organization','Branch'));
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('security');
    }
    function index() {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        //echo"a<pre>"; print_r($session_data); //die;
        if(empty($session_data)){
            $session_data['BranchId']=  $this->get_location_id();
        }
        if (is_array($session_data)) {
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
        }
        $this->load->library('pagination');
        $total = $this->Config_class_routine->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/config_class_routines/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);

        $data=$this->_load_combo_data();
        $data['results'] = $this->Config_class_routine->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        $data['session_data'] = $session_data;
        $data['headline'] = 'List Of Routines';
        $data['title'] = 'Routines List';
        $this->layout->view('config_class_routines/index', $data);
    }

    function add() {
        $data=$this->_load_combo_data();
        if ($_POST) {
            $this->_prepare_validation();
            $data['row'] = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['RoutineId'] = NULL;
                if ($this->Config_class_routine->add($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been added successfully');
                    redirect('config_class_routines/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Routine Information';
        $data['title'] = ' Add New Routine';
        $this->layout->view('config_class_routines/add', $data);
    }

    function edit($id = null) {
        $data=$this->_load_combo_data();
        if ($_POST) {
            $id = $this->input->post('RoutineId');
            $this->_prepare_validation();
            $data['row'] = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['row']['RoutineId'] = $this->input->post('RoutineId');
                if ($this->Config_class_routine->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('config_class_routines/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Routine Information';
        $data['title'] = ' Edit Routine';
        $data['row'] = $this->Config_class_routine->read($id);
        // echo"<pre>"; print_r($data); die;
        //echo "<pre>";print_r($data['row']);
        $this->layout->view('config_class_routines/add', $data);
    }
    function delete($id = null) {
        if (empty($id)) {
            //$this->session->set_flashdata('warning','Location ID is not provided');
            redirect('config_class_routines/index/', 'refresh');
        } else {
            if ($this->Config_class_routine->delete($id) == true) {
                $this->session->set_flashdata('success', 'Data has been Deleted successfully');
                redirect('config_class_routines/index/', 'refresh');
            }
        }
    }
    function view($id = null) {
        if (empty($id)) {
            $this->session->set_flashdata('fail', 'ID is not provided');
            redirect('config_class_routines/index/', 'refresh');
        } else {
            $data = $this->_load_combo_data();
            $data['headline'] = 'View Class Routine';
            $data['title'] = 'Class Routine';
            $data['routine_id'] = $id;
            $data['organization_info'] = $this->Organization->read(1);
            $data['routine_data'] = $this->Config_class_routine->read_routine($id);
            array_shift($data['day_list']);
            $data['period_list']=$this->Config_class_period->get_period_list_by_shift($data['routine_data']->Shift);
            $data['routine_info'] = $this->Config_class_routine->get_routine_information_by_routine_id($id);
            $this->layout->view('config_class_routines/view', $data);
        }
    }
    function _load_combo_data() {
        $data = array();
        $cond['BranchId']=  $this->get_location_id();
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['subject_list']=$this->Config_subject->get_list(null,null,$cond);
        $data['employee_list']=$this->Employee->get_teacher_list($cond['BranchId']);
        $data['shift_list']=$this->get_shift();
        $data['medium_list']=$this->get_medium();

        $day_list = array();
        $day_list[''] = 'Select Day';
        $day_list['SAT'] = 'Saturday';
        $day_list['SUN'] = 'Sunday';
        $day_list['MON'] = 'Monday';
        $day_list['TUE'] = 'Tuesday';
        $day_list['WED'] = 'Wednesday';
        $day_list['THU'] = 'Thursday';

        $data['day_list']=$day_list;
        $data['period_list']=$this->Config_class_period->get_list();
        return $data;
    }
    function _get_posted_data() {
        $data = array();
        $data['BranchId'] = $this->input->post('BranchId');
        $data['ClassId'] = $this->input->post('ClassId');
        $data['SectionId'] = $this->input->post('SectionId');
        $data['Shift'] = $this->input->post('Shift');
        $data['Medium'] = $this->input->post('Medium');
        $data['SubjectId'] = $this->input->post('SubjectId');
        $data['EmployeeId'] = $this->input->post('EmployeeId');
        $data['Day'] = $this->input->post('Day');
        $data['PeriodId'] = $this->input->post('PeriodId');
        $data['RoomNumber'] = $this->input->post('txt_room_no');
        // echo "<pre>";print_r($data);die;
        return $data;
    }
    function _prepare_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('ClassId', 'Class', 'trim|required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('SectionId', 'Section', 'trim|required|max_length[200]|xss_clean|callback_check_duplicate_entry');
        $this->form_validation->set_rules('SubjectId', 'Subject', 'trim|required|max_length[200]|xss_clean|callback_check_duplicate_entry_for_subject');
        $this->form_validation->set_rules('EmployeeId', 'Employee', 'trim|required|max_length[200]|xss_clean|callback_check_is_teacher_available');
        $this->form_validation->set_rules('Day', 'Day', 'trim|required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('PeriodId', 'Period', 'trim|required|max_length[200]|xss_clean');
        //$this->form_validation->set_rules('RoomNumber', 'Room', 'trim|required|max_length[200]|xss_clean');
    }
    function check_is_teacher_available(){
        $Day = $this->input->post('Day');
        $PeriodId = $this->input->post('PeriodId');
        $EmployeeId = $this->input->post('EmployeeId');
        $teacher_available_info = $this->Employee->is_teacher_available_in_given_period($Day,$PeriodId,$EmployeeId);
        if(!empty($teacher_available_info)){
            $this->form_validation->set_message('check_is_teacher_available', "Teacher is not available for this period !");
            return FALSE;
        }
        return true;
    }
    function check_duplicate_entry(){
        $Day = $this->input->post('Day');
        $PeriodId = $this->input->post('PeriodId');
        $ClassId = $this->input->post('ClassId');
        $SectionId = $this->input->post('SectionId');
        $is_valid_entry = $this->Config_class_routine->check_duplicate_entry($Day,$PeriodId,$ClassId,$SectionId);
        if($is_valid_entry!=0){
            $this->form_validation->set_message('check_duplicate_entry', 'Routine is already fixed in this period !');
            return FALSE;
        }
        return true;
    }
    function check_duplicate_entry_for_subject(){
        $Day = $this->input->post('Day');
        $ClassId = $this->input->post('ClassId');
        $SectionId = $this->input->post('SectionId');
        $SubjectId = $this->input->post('SubjectId');
        $is_valid_entry = $this->Config_class_routine->check_duplicate_entry_for_subject($Day,$SubjectId,$ClassId,$SectionId);
        if($is_valid_entry!=0){
            $this->form_validation->set_message('check_duplicate_entry_for_subject', 'This subject is already chosen in another period for chosen day!');
            return FALSE;
        }
        return true;
    }

}
?>
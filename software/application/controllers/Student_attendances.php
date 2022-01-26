<?php
class Student_attendances extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Student_attendance','Student','Config_class_period','Config_class','Config_section','Organization','Branch'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
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
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
            $cond['ClassId'] = isset($session_data['cbo_class']) ? $session_data['cbo_class'] : '';
            $cond['SectionId'] = isset($session_data['cbo_section']) ? $session_data['cbo_section'] : '';
            $cond['Date'] = isset($session_data['Date']) ? $session_data['Date'] : '';
        }

        $this->load->library('pagination');
        $total = $this->Student_attendance->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/student_attendances/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


        $data=$this->_load_combo_data();
        $data['results'] = $this->Student_attendance->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'Attendance List';
        $data['title'] = 'Attendance List';
        $this->layout->view('student_attendances/index',$data);
    }
    function add(){
        if($_POST)
        {
            $this->_prepare_validation();
            $attendance_data=$this->_get_posted_data();
            // echo "<pre>";print_r($attendance_data);die;
            $attendance_array = array();
            $group_id = $this->Student_attendance->get_new_group_id();
            $i=0;
            foreach($attendance_data['student_id'] as $key=>$row){
                // echo "<pre>";print_r($attendance_data['BranchId']);
                $attendance_array[$i]['BranchId'] = $attendance_data['BranchId'];
                $attendance_array[$i]['CourseId'] = $attendance_data['CourseId'][0];
                $attendance_array[$i]['Date'] = $attendance_data['Date'];
                $attendance_array[$i]['studentId'] = $row;
                $attendance_array[$i]['AttendanceType'] = $attendance_data['attendant_list'][$key];
                $attendance_array[$i]['GroupId'] = $group_id;
                $i++;
            }

            $exam_attendance = array();

            // echo "<pre>";print_r($attendance_array);die;
            $this->form_validation->set_rules('Date','Date','trim|required|callback_check_duplicate_entry');
            if($this->form_validation->run() === TRUE){
                $has_exam = $this->find_exam_on_this_day($attendance_data['Date']);
                // echo "<pre>";print_r($has_exam);die;
                if(!empty($has_exam)){
                $exam_attendance['BranchId'] = $attendance_data['BranchId'];
                $exam_attendance['StudentId'] = $attendance_data['student_id'][0];
                $exam_attendance['ExamId'] = $has_exam[0]['ExamId'];
                $exam_attendance['CourseId'] = $attendance_data['CourseId'][0];
                $exam_attendance['ExamDate'] = $attendance_data['Date'];
                $exam_attendance['Attendance'] = $attendance_data['attendant_list'][$key];
                $this->Student_attendance->add_exam_attendance($exam_attendance);
                }
                

                $result=$this->Student_attendance->add($attendance_array);
                if($result){
                    $this->session->set_flashdata('success', 'Data is successfully saved');
                    redirect('student_attendances/view/'.$group_id, 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['headline'] = 'Add New Student attendance';
        $data['title'] = 'Add New Student attendance';
        $this->layout->view('student_attendances/add',$data);
    }
    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('student_attendances/index', 'refresh');
        }
        $result=$this->Student_attendance->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('student_attendances/index', 'refresh');
        }
    }
    function edit($id = null){
        if($_POST)
        {
            $this->_prepare_validation();
            $attendance_data=$this->_get_posted_data();
            $attendance_array = array();
            $group_id = $this->input->post('GroupId');
            $i=0;

            foreach($attendance_data['student_id'] as $key=>$row){
                $attendance_array[$i]['BranchId'] = $attendance_data['BranchId'];
                $attendance_array[$i]['CourseId'] = $attendance_data['CourseId'][0];
                $attendance_array[$i]['Date'] = $attendance_data['Date'];
                $attendance_array[$i]['studentId'] = $row;
                $attendance_array[$i]['AttendanceType'] = $attendance_data['attendant_list'][$key];
                $attendance_array[$i]['GroupId'] = $group_id;
                $i++;
            }
             $exam_attendance = array();

             // echo "<pre>";print_r($attendance_array);die;
            if ($this->form_validation->run() === FALSE)
            {
                 $has_exam = $this->find_exam_on_this_day($attendance_data['Date']);
                // echo "<pre>";print_r($has_exam);die;
                if(!empty($has_exam)){
                $exam_attendance['BranchId'] = $attendance_data['BranchId'];
                $exam_attendance['StudentId'] = $attendance_data['student_id'][0];
                $exam_attendance['ExamId'] = $has_exam[0]['ExamId'];
                $exam_attendance['CourseId'] = $attendance_data['CourseId'][0];
                $exam_attendance['ExamDate'] = $attendance_data['Date'];
                $exam_attendance['Attendance'] = $attendance_data['attendant_list'][$key];
                $this->Student_attendance->edit_exam_attendance($exam_attendance);
                }
                
                // echo "<pre>";print_r($attendance_array);die;
                    if ($this->Student_attendance->edit($attendance_array,$group_id)) {
                        $this->session->set_flashdata('success', 'Data has been updated successfully');
                        redirect('student_attendances/index', 'refresh');
                    }
            }
            else{
                echo'<pre>'; print_r(validation_errors()); die;
            }
        }
        $data=$this->_load_combo_data();
        $data['attendance_info']=$this->Student_attendance->read($id);
        $data['result']=$this->Student_attendance->get_attendance_information_by_group_id($id);
        $data['headline'] = 'Edit Student_attendance';
        $data['title'] = 'Edit Student_attendance';
        $this->layout->view('student_attendances/add',$data);
    }
    function view($id = null) {
        $data = $this->_load_combo_data();
        $data['headline'] = 'View Attendance';
        $data['title'] = 'View Attendance';
        if (empty($id)) {
            $this->session->set_flashdata('fail', 'ID is not provided');
            redirect('config_class_routines/index/', 'refresh');
        } else {
            $data['group_id'] = $id;
            $data['class_name'] = $this->Student_attendance->get_class_information($id);
            $data['organization_info'] = $this->Organization->read(1);
            $data['attendance_info'] = $this->Student_attendance->get_attendance_information_by_group_id($id);
            $this->layout->view('student_attendances/view', $data);
        }
    }
    function _load_combo_data() {
        $data = array();
        $cond['BranchId']=  $this->get_location_id();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['Batch_list'] = $this->Config_class_period->get_list();
        $data['get_student_for_attendance'] = $this->Student->get_student_for_attendance($cond['BranchId']);
        $data['branch_list']=$this->Branch->get_all_location_list();
        // echo"<pre>"; print_r($data); die;
        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        //$this->form_validation->set_rules('CourseId','Class','trim|required');
        
    }
    function _get_posted_data()
    {
        $data=array();
        $data['BranchId']=$this->input->post('BranchId');
        $data['CourseId']=$this->input->post('CourseId');
        // date('Y-m-d', strtotime('-1 day', strtotime($date_raw)))
        if($this->uri->segment(2) == 'edit'){
            $data['Date']=date('Y-m-d', strtotime($this->input->post('Date')));
        }else{
            $data['Date']=date('Y-m-d', strtotime('-1 day',strtotime($this->input->post('Date'))));
        }
        
        $data['student_id']=$this->input->post('student_id');
        $data['attendant_list']=$this->input->post('attendant_list');
        return $data;
    }
    function check_duplicate_entry(){
        if($this->uri->segment(2) == 'edit'){
            $Date=date('Y-m-d', strtotime($this->input->post('Date')));
        }else{
            $Date=date('Y-m-d', strtotime('-1 day',strtotime($this->input->post('Date'))));
        }
        // $Date = date("Y-m-d", strtotime($this->input->post('Date')));
        $ClassId= $this->input->post('CourseId');

        // echo "<pre>";print_r($ClassId[0]);die;
        $is_valid_entry = $this->Student_attendance->check_duplicate_entry_for_attendance($Date,$ClassId[0]);
         // echo "<pre>";print_r($is_valid_entry);die;
        if($is_valid_entry!=0){
            $this->form_validation->set_message('check_duplicate_entry', 'you have already given attendance for today');
            return FALSE;
        }
        return true;
    }

    function find_exam_on_this_day($date){
            $query = $this->db->query("SELECT * FROM exams WHERE ExamDate = '$date'")->result_array();
            return $query;
    }
}
?>
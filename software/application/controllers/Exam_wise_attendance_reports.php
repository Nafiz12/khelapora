<?php
class Exam_wise_attendance_reports extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Exam','Config_class','Config_section','Organization','Branch'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
            $data['academic_year_list']=$this->get_academic_year();
            $data['branch_list']=$this->Branch->get_all_location_list();
            $cond['BranchId']=  $this->get_location_id();
            $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
            $data['exam_list'] = $this->Exam->get_list(null,null,$cond);
            $data['headline'] = 'Exam Wise Attendance Report';
            $data['title'] = 'Exam Wise Attendance Report';
            // echo "<pre>";print_r($data);die;
            $this->layout->view('exams/exam_wise_attendance_index',$data);

       
    }
    function view(){
        $data = $this->_load_combo_data();
        $data['headline'] = 'View Attendance';
        $data['title'] = 'View Attendance';

        $data['post_data'] = $this->_get_posted_data();
       
        if (empty($data['post_data']['ExamId'])) {
            $this->session->set_flashdata('fail', 'ExamId is not provided');
            redirect('exams/exam_wise_attendance_index/', 'refresh');
        } else {
            $data['organization_info'] = $this->Organization->read(1);
            $data['attendance_info'] = $this->Exam->get_attendance_information_by_exam_id($data['post_data']['ExamId'],$data['post_data']['BranchId'],$data['post_data']['CourseId']);
            $data['total_students'] = $this->Exam->get_course_wise_students($data['post_data']['BranchId'],$data['post_data']['CourseId']);
            // echo "<pre>";print_r($data);die;
            $this->layout->view('exams/exam_wise_attendance_report', $data);
        }
        
    }

    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('exams/index', 'refresh');
        }
        
            $result=$this->Exam->delete($id);
            if($result)
            {
                $this->session->set_flashdata('success', 'Data has been deleted successfully.');
                redirect('exams/index', 'refresh');
            }
       
    }
    function edit($id = null){
        if($_POST)
        {
            $id = $this->input->post('ExamId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['ExamId'] = $this->input->post('ExamId');
                if ($this->Exam->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('exams/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['row']=$this->Exam->read($id);
        $data['headline'] = 'Edit Exam Routine';
        $data['title'] = 'Edit Exam Routine';
        $this->layout->view('exams/add',$data);
    }


    function _load_combo_data() {

        $data = array();
        $cond['BranchId']=  $this->get_location_id();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['exam_list'] = $this->Exam->get_list(null,null,$cond);
        $data['branch_list']=$this->Branch->get_all_location_list();
        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('txt_name','Name','trim|required');
        $this->form_validation->set_rules('cbo_branch','Branch','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['ExamId']=$this->input->post('ExamId');
        $data['BranchId']=$this->input->post('cbo_branch');
        $data['CourseId']=$this->input->post('CourseId');
   // echo "<pre>";print_r($data);die;
        return $data;
    }
    function ajax_for_get_exam_information(){
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $exam_id= $this->input->post('exam_id');
        $callback_message['status'] = 'failure';
        if (empty($exam_id)||empty($exam_id)) {
            $callback_message['message'] = 'Select Exam';
        }
        else
        {
            $exam_info = $this->Exam->read($exam_id);
            // print_r($amount_info);die;
            $callback_message['status'] = 'success';
            $callback_message['HasSba'] =$exam_info->HasSba;
            $callback_message['HasObjective'] = $exam_info->HasObjective;

        }
        echo json_encode($callback_message);
    }
}
?>
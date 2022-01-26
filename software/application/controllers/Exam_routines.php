<?php
class Exam_routines extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Branch','Exam_routine','Config_class','Config_section','Organization','Config_subject','Exam'));
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
        }

        $this->load->library('pagination');
        $total = $this->Exam_routine->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/exam_routines/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


        $data=$this->_load_combo_data();
        $data['results'] = $this->Exam_routine->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'Mark List';
        $data['title'] = 'Mark List';
        $this->layout->view('exam_routines/index',$data);
    }
    function add(){
        if($_POST)
        {
            $this->_prepare_validation();
            $routine_data=$this->_get_posted_data();
            if(empty($routine_data['ClassId']) && $routine_data['ClassId']!=''){
                $this->session->set_flashdata('fail', 'ID is not provided');
                redirect('exam_routines/index/', 'refresh');
            }
            $routine_array = array();
            $routine_details_array = array();

            $routine_array['RoutineId'] = $this->Exam_routine->get_new_id('exam_routines','RoutineId');
            $routine_array['BranchId'] = $routine_data['BranchId'];
            $routine_array['Year'] = $routine_data['Year'];
            $routine_array['Shift'] = $routine_data['Shift'];
            $routine_array['Medium'] = $routine_data['Medium'];
            $routine_array['ClassId'] = $routine_data['ClassId'];
            $routine_array['ExamId'] = $routine_data['ExamId'];
            $routine_array['EntryBy']=$this->get_user_id();
            $routine_array['EntryDate']=date('Y-m-d');
            foreach($routine_data['ExamDate'] as $i=>$row){
                $routine_details_array[$i]['RoutineDetailsId'] = NULL;
                $routine_details_array[$i]['RoutineId'] = $routine_array['RoutineId'];
                $routine_details_array[$i]['BranchId'] = $routine_data['BranchId'];
                $routine_details_array[$i]['Year'] = $routine_data['Year'];
                $routine_details_array[$i]['Shift'] = $routine_data['Shift'];
                $routine_details_array[$i]['Medium'] = $routine_data['Medium'];
                $routine_details_array[$i]['ExamId'] = $routine_data['ExamId'];
                $routine_details_array[$i]['ClassId'] = $routine_data['ClassId'];
                $routine_details_array[$i]['ExamDate'] = date("Y-m-d", strtotime($routine_data['ExamDate'][$i]));
                $routine_details_array[$i]['SubjectId'] = $routine_data['SubjectId'][$i];
                $routine_details_array[$i]['RoomNumber'] = $routine_data['RoomNumber'][$i];
                $i++;
            }
            if($this->form_validation->run() === TRUE){
                $result=$this->Exam_routine->add($routine_array);
                if($result){
                    $this->Exam_routine->add_details($routine_details_array);
                    $this->session->set_flashdata('success', 'Data is successfully saved');
                    redirect('exam_routines/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['headline'] = 'Add New Student Mark';
        $data['title'] = 'Add New Student Mark';
        $this->layout->view('exam_routines/add',$data);
    }
    function delete($id = null){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('exam_routines/index', 'refresh');
        }
        $result=$this->Exam_routine->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('exam_routines/index', 'refresh');
        }
    }
    function edit($exam_id = null,$year = null,$class_id = null,$section_id = null,$subject_id = null){
        if($_POST)
        {
            $this->_prepare_validation();
            $routine_data=$this->_get_posted_data();
            if(empty($routine_data['ClassId']) && $routine_data['ClassId']!=''){
                $this->session->set_flashdata('fail', 'ID is not provided');
                redirect('exam_routines/index/', 'refresh');
            }
            $mark_id = $this->input->post('mark_id');
            $routine_array = array();
            $i=0;
            foreach($routine_data['ClassId'] as $key=>$row){
                $routine_array[$i]['MarkId'] = $mark_id[$key];
                $routine_array[$i]['ClassId'] = $routine_data['ClassId'];
                $routine_array[$i]['SectionId'] = $routine_data['SectionId'];
                $routine_array[$i]['ExamDate'] = $routine_data['ExamDate'];
                $routine_array[$i]['BranchId'] = $routine_data['BranchId'];
                $routine_array[$i]['ExamId'] = $routine_data['ExamId'];
                $routine_array[$i]['SubjectId'] = $routine_data['SubjectId'];
                $routine_array[$i]['studentId'] = $row;
                $routine_array[$i]['SbaMark'] = $routine_data['sba_mark'][$key];
                $routine_array[$i]['ObjectiveMark'] = $routine_data['objective_mark'][$key];
                $routine_array[$i]['SubjectiveMark'] = $routine_data['subjective_mark'][$key];
                $routine_array[$i]['TotalMark'] = $routine_data['total_mark'][$key];
                $routine_array[$i]['EntryOn'] = date('Y-m-d h:i:sa');
                $routine_array[$i]['EntryBy'] = $this->get_user_id();
                $i++;
            }
            if ($this->form_validation->run() === TRUE){
                if ($this->Exam_routine->edit($routine_array)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('exam_routines/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['result']=$this->Exam_routine->get_mark_information_by_class_section_subject($exam_id,$year,$class_id,$section_id,$subject_id);
        $data['headline'] = 'Edit Exam_routine';
        $data['title'] = 'Edit Exam_routine';
        $this->layout->view('exam_routines/add',$data);
    }
    function view($id) {
        $data = $this->_load_combo_data();
        $data['headline'] = 'View Routine';
        $data['title'] = 'View Routine';
        if (empty($id)) {
            $this->session->set_flashdata('fail', 'ID is not provided');
            redirect('exam_routines/index/', 'refresh');
        } else {
            $data['organization_info'] = $this->Organization->read(1);
            $data['routine_info'] = $this->Exam_routine->read_routine($id);
            $exam_info = $this->Exam->read($data['routine_info']->ExamId);
            $branch_info = $this->Branch->read($data['routine_info']->BranchId);
            $data['exam_info'] = $exam_info;
            $data['branch_info'] = $branch_info;
            $data['routine_details_info'] = $this->Exam_routine->get_routine_details_information($id);
            $this->layout->view('exam_routines/view', $data);
        }
    }
    function _load_combo_data() {
        $data = array();
        $cond['BranchId']=  $this->get_location_id();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['subject_list']=$this->Config_subject->get_list(null,null,$cond);
        $data['branch_list']=$this->Branch->get_all_location_list();

        $data['section_list']=$this->Config_section->get_list();

        $data['exam_list']=$this->Exam->get_list(null,null,$cond);

        $data['academic_year_list']=$this->get_academic_year();
        $data['shift_list']=$this->get_shift();
        $data['medium_list']=$this->get_medium();

        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('ClassId','Class','trim|required');
        $this->form_validation->set_rules('ExamId','ExamId','trim|required');
        $this->form_validation->set_rules('BranchId','Branch','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['BranchId']=$this->input->post('BranchId');
        $data['Year']=$this->input->post('Year');
        $data['Shift']=$this->input->post('Shift');
        $data['Medium']=$this->input->post('Medium');
        $data['ClassId']=$this->input->post('ClassId');
        $data['ExamId']=$this->input->post('ExamId');
        //$data['ExamDate']=date("Y-m-d", strtotime($this->input->post('txt_exam_date')));
        $data['ExamDate']=$this->input->post('txt_exam_date');
        $data['SubjectId']=$this->input->post('txt_subject_id');
        $data['RoomNumber']=$this->input->post('txt_room_no');
        return $data;
    }
    function ajax_for_check_duplicate_entry(){
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');
        $ExamDate= date("Y-m-d", strtotime($this->input->post('ExamDate')));
        $examId = $this->input->post('examId');
        $subjectId = $this->input->post('subjectId');
        $callback_message['status'] = 'failure';
        if (empty($class_id)||empty($section_id)) {
            $callback_message['message'] = 'Select a Class and Section';
        }
        else
        {
            $mark_info = $this->Exam_routine->check_for_duplicate($class_id,$section_id,$ExamDate,$examId,$subjectId);
            $callback_message['status'] = 'success';
            $callback_message['mark']= $mark_info;
        }
        echo json_encode($callback_message);
    }
}
?>
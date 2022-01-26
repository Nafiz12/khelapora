<?php
class Manage_marks extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Branch','Manage_mark','Config_class','Config_section','Organization','Config_subject','Exam'));
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
        $total = $this->Manage_mark->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/manage_marks/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


        $data=$this->_load_combo_data();
        $data['results'] = $this->Manage_mark->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
 // echo "<pre>";print_r($data);die;
        $data['session_data'] = $session_data;

        $data['headline'] = 'Mark List';
        $data['title'] = 'Mark List';
        $this->layout->view('manage_marks/index',$data);
    }
    function add(){
        if($_POST)
        {
            $this->_prepare_validation();
            $mark_data=$this->_get_posted_data();

            
            if(empty($mark_data['student_id']) && $mark_data['student_id']!=''){
                $this->session->set_flashdata('fail', 'ID is not provided');
                redirect('manage_marks/index/', 'refresh');
            }
            $mark_array = array();

            $i=0;
            foreach($mark_data['student_id'] as $key=>$row){

                $mark_array[$i]['ClassId'] = $mark_data['ClassId'];
                $mark_array[$i]['SectionId'] = $mark_data['SectionId'];
                $mark_array[$i]['ExamDate'] = $mark_data['ExamDate'];
                $mark_array[$i]['ExamId'] = $mark_data['ExamId'];
                $mark_array[$i]['SubjectId'] = $mark_data['SubjectId'];
                $mark_array[$i]['BranchId'] = $mark_data['BranchId'];
                $mark_array[$i]['studentId'] = $row;
                $mark_array[$i]['SubjectiveMark'] = $mark_data['subjective_mark'][$key];
             
                $mark_array[$i]['ObjectiveMark'] = $mark_data['objective_mark'][$key];
                
                $mark_array[$i]['PracticalMark'] = $mark_data['practical_mark'][$key];
                
                $mark_array[$i]['TotalMark'] = $mark_data['total_mark'][$key];
                $mark_array[$i]['Point'] = $mark_data['point'][$key];
                $mark_array[$i]['Grade'] = $mark_data['grade'][$key];
                $mark_array[$i]['EntryOn'] = date('Y-m-d h:i:sa');
                $mark_array[$i]['EntryBy'] = $this->get_user_id();
                $i++;
            }



           // echo '<pre>'; print_r($mark_array); die;
           // echo '<pre>'; print_r($mark_details_array); die;
            //$this->form_validation->set_rules('Date','Date','trim|required|callback_check_duplicate_entry');
            if($this->form_validation->run() === TRUE){
               
                    $this->Manage_mark->add_details($mark_array);
                    $this->session->set_flashdata('success', 'Data is successfully saved');
                    redirect('manage_marks/index', 'refresh');
                
            }
        }
        $data=$this->_load_combo_data();
        $data['headline'] = 'Add New Student Mark';
        $data['title'] = 'Add New Student Mark';
        $this->layout->view('manage_marks/add',$data);
    }
    function delete($exam_id = null,$ExamDate = null,$class_id = null,$section_id = null,$subject_id = null){
        if(empty($exam_id) || $exam_id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('manage_marks/index', 'refresh');
        }
        $result=$this->Manage_mark->delete($exam_id,$ExamDate,$class_id,$section_id,$subject_id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('manage_marks/index', 'refresh');
        }
    }
    function edit($branch_id=null,$exam_id = null,$year = null,$class_id = null,$section_id = null,$subject_id = null){
        if($_POST)
        {
            $this->_prepare_validation();
            $mark_data=$this->_get_posted_data();

            if(empty($mark_data['student_id']) && $mark_data['student_id']!=''){
                $this->session->set_flashdata('fail', 'ID is not provided');
                redirect('manage_marks/index/', 'refresh');
            }
            $mark_id = $this->input->post('mark_id');

            // echo "<pre>";print_r($mark_id);die;
            $mark_array = array();
            $i=0;
            foreach($mark_data['student_id'] as $key=>$row){
                $mark_array[$i]['MarkDetailsId'] = $mark_id[$key];
                $mark_array[$i]['ClassId'] = $mark_data['ClassId'];
                $mark_array[$i]['SectionId'] = $mark_data['SectionId'];
                $mark_array[$i]['ExamDate'] = $mark_data['ExamDate'];
                $mark_array[$i]['ExamId'] = $mark_data['ExamId'];
                $mark_array[$i]['SubjectId'] = $mark_data['SubjectId'];
                $mark_array[$i]['BranchId'] = $mark_data['BranchId'];
                $mark_array[$i]['studentId'] = $row;
                $mark_array[$i]['SubjectiveMark'] = $mark_data['subjective_mark'][$key];
             
                $mark_array[$i]['ObjectiveMark'] = $mark_data['objective_mark'][$key];
                
                $mark_array[$i]['PracticalMark'] = $mark_data['practical_mark'][$key];
                
                $mark_array[$i]['TotalMark'] = $mark_data['total_mark'][$key];
                $mark_array[$i]['Point'] = $mark_data['point'][$key];
                $mark_array[$i]['Grade'] = $mark_data['grade'][$key];
                $mark_array[$i]['EntryOn'] = date('Y-m-d h:i:sa');
                $mark_array[$i]['EntryBy'] = $this->get_user_id();
                $i++;



            }

            // echo "<pre>";print_r($mark_array);die;
            if ($this->form_validation->run() === TRUE){
                if ($this->Manage_mark->edit($mark_array)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('manage_marks/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['result']=$this->Manage_mark->get_mark_information_by_class_section_subject($branch_id,$exam_id,$year,$class_id,$section_id,$subject_id);

        // echo "<pre>";print_r($data);die;
        $data['headline'] = 'Edit Manage_mark';
        $data['title'] = 'Edit Manage_mark';
        $this->layout->view('manage_marks/add',$data);
    }
    function view($id) {
        $data = $this->_load_combo_data();
        $data['headline'] = 'View Mark';
        $data['title'] = 'View Mark';
        if (empty($id)) {
            $this->session->set_flashdata('fail', 'ID is not provided');
            redirect('manage_marks/index/', 'refresh');
        } else {
            $data['organization_info'] = $this->Organization->read(1);
            $data['marks_info'] = $this->Manage_mark->read_mark($id);
            $exam_info = $this->Exam->read($data['marks_info']->ExamId);
            $data['exam_info'] = $exam_info;
            $data['marks_details_info'] = $this->Manage_mark->get_mark_details_information($id);
            $this->layout->view('manage_marks/view', $data);
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

        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('ClassId','Class','trim|required');
        $this->form_validation->set_rules('SectionId','SectionId','trim|required');
        $this->form_validation->set_rules('ExamId','ExamId','trim|required');
        $this->form_validation->set_rules('SubjectId','SubjectId','trim|required');
        $this->form_validation->set_rules('cbo_branch','Branch','trim|required');
        $this->form_validation->set_rules('SectionId','SectionId','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['ExamDate']=date("Y-m-d", strtotime($this->input->post('txt_date_of_exam')));
        $data['SubjectId']=$this->input->post('SubjectId');
        $data['BranchId']=$this->input->post('cbo_branch');
        $data['ClassId']=$this->input->post('ClassId');
        $data['SectionId']=$this->input->post('SectionId');

        $data['ExamId']=$this->input->post('ExamId');

        // $data['SbaDeafault']=$this->input->post('sba_full_marks');
        // $data['ObjectiveDefault']=$this->input->post('objective_full_marks');
        // $data['SubjectiveDefault']=$this->input->post('subjective_full_marks');

        $data['student_id']=$this->input->post('student_id');
        $data['practical_mark']=$this->input->post('pra_mark');
        $data['objective_mark']=$this->input->post('objective_mark');
        $data['subjective_mark']=$this->input->post('subjective_mark');
        $data['total_mark']=$this->input->post('total_mark');
        $data['grade']=$this->input->post('grade');
        $data['point']=$this->input->post('point');
       // echo '<pre>'; print_r($data); die;
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
            $mark_info = $this->Manage_mark->check_for_duplicate($class_id,$section_id,$ExamDate,$examId,$subjectId);
                $callback_message['status'] = 'success';
                $callback_message['mark']= $mark_info;
        }
        echo json_encode($callback_message);
    }
}
?>
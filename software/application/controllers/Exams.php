<?php
class Exams extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Exam','Config_class','Config_section','Branch'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        if(empty($session_data)){
            $session_data['BranchId']=  $this->get_location_id();
        }
        if (is_array($session_data)) {
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
        }


        $this->load->library('pagination');
        $total = $this->Exam->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/exams/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


        $data=$this->_load_combo_data();
        $data['list'] = $this->Exam->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'Exam Routine';
        $data['title'] = 'Exam Routine';
        //echo "<pre>";print_r($data);die;
        $this->layout->view('exams/index',$data);
    }
    function add(){
        $data=$this->_load_combo_data();
        if($_POST)
        {
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            //$this->form_validation->set_rules('txt_code','Code','trim|required|is_unique[students.StudentCode]');
            if ($this->form_validation->run() === TRUE)
            {
                //echo "<pre>";print_r($data);die;
                $result=$this->Exam->add($data['row']);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Data is succcessfully saved');
                    redirect('exams/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Add Exam';
        $data['title'] = 'Add Exam';
        $this->layout->view('exams/add',$data);
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
        $data['ExamName']=$this->input->post('txt_name');
        $data['ExamDate']=date('Y-m-d', strtotime($this->input->post('txt_date')));
        $data['BranchId']=$this->input->post('cbo_branch');
        $data['CourseId']=$this->input->post('CourseId');
        $data['ExamDescription']=$this->input->post('txt_description');
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
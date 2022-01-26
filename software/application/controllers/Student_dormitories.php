<?php
class Student_dormitories extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Student_dormitory','Dormitory','Config_class','Student'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get();
        if (is_array($session_data)) {
            $cond['ClassId'] = isset($session_data['ClassId']) ? $session_data['ClassId'] : '';
            $cond['SectionId'] = isset($session_data['SectionId']) ? $session_data['SectionId'] : '';
            $cond['DormitoryId'] = isset($session_data['DormitoryId']) ? $session_data['DormitoryId'] : '';
        }
        $this->load->library('pagination');
        $total = $this->Student_dormitory->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/student_dormitories/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


        $data=$this->_load_combo_data();
        $data['list'] = $this->Student_dormitory->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        //echo "<pre>";print_r($data);die;
        $data['session_data'] = $session_data;

        $data['headline'] = 'Student Dormitory List';
        $data['title'] = 'Student Dormitory List';
        $this->layout->view('student_dormitories/index',$data);
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
                $result=$this->Student_dormitory->add($data['row']);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Data is succcessfully saved');
                    redirect('student_dormitories/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Add Fee';
        $data['title'] = 'Add Fee';
        $this->layout->view('student_dormitories/add',$data);
    }

    function delete($id){
        if(empty($id) || $id == ""){
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('student_dormitories/index', 'refresh');
        }
        $result=$this->Student_dormitory->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('student_dormitories/index', 'refresh');
        }
    }
    function edit($id = null){
        if($_POST)
        {
            $id = $this->input->post('StudentDormitoryId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['StudentDormitoryId'] = $this->input->post('StudentDormitoryId');
                if ($this->Student_dormitory->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('student_dormitories/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['row']=$this->Student_dormitory->read($id);
        $student_information = $this->Student->read($data['row']->StudentId);
        $data['row']->ClassId = $student_information->ClassId;
        $data['row']->SectionId = $student_information->SectionId;
        $data['headline'] = 'Edit Student Dormitory Information';
        $data['title'] = 'Edit Student Dormitory Information';
        $this->layout->view('student_dormitories/add',$data);
    }


    function _load_combo_data() {
        $data = array();
        $data['class_list'] = $this->Config_class->get_list();
        $data['dormitory_list']=$this->Dormitory->get_dormitory_list();
        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('cbo_class','Class','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['StudentId']=$this->input->post('cbo_student');
        $data['DormitoryId']=$this->input->post('cbo_dormitory');
        $data['RoomNumber']=$this->input->post('txt_room_number');
        return $data;
    }
}
?>
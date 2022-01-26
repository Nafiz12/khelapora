<?php
class Manage_library_books extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Manage_library_book','Book','Branch','Config_subject','Config_class','Student'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get();
        if (is_array($session_data)) {
            $cond['cbo_class'] = isset($session_data['cbo_class']) ? $session_data['cbo_class'] : '';
            $cond['cbo_section'] = isset($session_data['StudentId']) ? $session_data['cbo_section'] : '';
            $cond['StudentId'] = isset($session_data['StudentId']) ? $session_data['StudentId'] : '';
            $cond['BookId'] = isset($session_data['BookId']) ? $session_data['BookId'] : '';
        }
        $this->load->library('pagination');
        $total = $this->Manage_library_book->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/manage_library_books/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


        $data=$this->_load_combo_data();
        $cond['BranchId']=  $this->get_location_id();
        $data['list'] = $this->Manage_library_book->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        //echo "<pre>";print_r($data);die;
        $data['session_data'] = $session_data;

        $data['headline'] = 'Student Lecture List';
        $data['title'] = 'Student Lecture List';
         // echo "<pre>";print_r($data);die;
        $this->layout->view('manage_library_books/index',$data);
    }
    function add(){
        $data=$this->_load_combo_data();
        if($_POST)
        {
            $library_data=$this->_get_posted_data();
            // echo "<pre>";print_r($library_data['BookId']);die;
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                // $totalNumber = $this->Manage_library_book->get_opening_book_number($library_data['BookId']);
                // $available_number = $totalNumber-$library_data['Number'];
                if($this->Manage_library_book->add($library_data)){
                    // $this->Manage_library_book->edit_detail_by_details_id($book_details);
                    $this->session->set_flashdata('success', 'Data is successfully saved');
                    redirect('manage_library_books/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Add Student Book';
        $data['title'] = 'Add Student Book';
        $this->layout->view('manage_library_books/add',$data);
    }

    function delete($id){
        if(empty($id) || $id == ""){
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('manage_library_books/index', 'refresh');
        }
        $result=$this->Manage_library_book->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('manage_library_books/index', 'refresh');
        }
    }
    function edit($id = null){
        if($_POST)
        {
            $id = $this->input->post('DistributionId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
               
                if ($this->Manage_library_book->edit($data['row'],$id)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('manage_library_books/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();

        $data['row']=$this->Manage_library_book->read($id);

        // echo "<pre>";print_r($data);die;
        $data['headline'] = 'Edit Student Dormitory Information';
        $data['title'] = 'Edit Student Dormitory Information';
        $this->layout->view('manage_library_books/add',$data);
    }


    function _load_combo_data() {
        $data = array();
         $cond['BranchId']=  $this->get_location_id();
        
        $cond['BranchId']=  $this->get_location_id();
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['book_type_list'] = $this->Book->get_book_types_list();
        $data['subject_list']=$this->Config_subject->get_subject_lists();
        $data['book_list'] = $this->Book->get_book_list();
        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('ClassId','ClassId','trim|required');
        $this->form_validation->set_rules('SubjectId','SubjectId','trim|required');
        $this->form_validation->set_rules('TypeId','TypeId','trim|required');
        $this->form_validation->set_rules('StudentId','StudentId','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['BranchId']=$this->input->post('BranchId');
        $data['ClassId']=$this->input->post('ClassId');
        $data['TypeId']=$this->input->post('TypeId');
        $data['StudentId']=$this->input->post('StudentId');
        $data['SubjectId']=$this->input->post('SubjectId');
        $data['Number']=$this->input->post('Number');
        $data['BookId']=$this->input->post('BookId');
        $data['EntryBy']=$this->get_user_id();
        return $data;
    }

        function ajax_for_get_student_list_by_class() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');
        $BranchId= $this->input->post('BranchId');
        $callback_message['status'] = 'failure';
        if (empty($class_id)) {
            $callback_message['message'] = 'Select a Class and Section';
        }
        else
        {
            $student_info = $this->Student->get_student_list_for_lecture($class_id,$BranchId);
            foreach ($student_info as $row) {
                $callback_message['status'] = 'success';
                $callback_message['StudentId'][] = $row['StudentId'];
                $callback_message['StudentName'][] = $row['StudentName'];
                $callback_message['StudentCode'][] = $row['StudentCode'];
                
            }
        }
        echo json_encode($callback_message);
    } 

     function ajax_for_get_book_list_by_subject() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $subject_id = $this->input->post('subject_id');
        $type_id = $this->input->post('type_id');
        $callback_message['status'] = 'failure';
        if (empty($subject_id)) {
            $callback_message['message'] = 'Select a subject_id ';
        }
        else
        {
            $student_info = $this->Manage_library_book->get_subject_list_for_lecture($subject_id,$type_id);
            foreach ($student_info as $row) {
                $callback_message['status'] = 'success';
                $callback_message['BookId'][] = $row['BookId'];
                $callback_message['BookName'][] = $row['BookName'];
                
            }
        }
        echo json_encode($callback_message);
    }
}
?>
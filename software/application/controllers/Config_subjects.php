<?php
class Config_subjects extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Config_subject','Config_class','Branch'));
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
        $total = $this->Config_subject->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/config_subjects/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);

        $data=$this->_load_combo_data();
        $data['results'] = $this->Config_subject->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        $data['session_data'] = $session_data;
        $data['headline'] = 'List Of Subjects';
        $data['title'] = 'Subject List';
        //echo"<pre>"; print_r($data); die;
        $this->layout->view('config_subjects/index', $data);


    }

    function add() {
        $data = array();
        if ($_POST) {
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            $this->form_validation->set_rules('txt_subject_name', 'Subjects Name', 'trim|required|max_length[200]|xss_clean|is_unique[config_subjects.SubjectName]');

            $class_list = $this->input->post('ClassId');

            $SubjectClass = array();
            

            // echo "<pre>";print_r($SubjectClass);die;

            if ($this->form_validation->run()) {
                
                    $this->Config_subject->add($data);
                    $this->session->set_flashdata('success', 'Data has been added successfully');
                    redirect('config_subjects/index', 'refresh');
                }
            }
        
        $data=$this->_load_combo_data();
        $data['headline'] = 'Subjects Information';
        $data['title'] = ' Add New Subjects';
        $this->layout->view('config_subjects/add', $data);
    }
    function test() {
        $data = array();
        $data['headline'] = 'Category Information';
        $data['title'] = ' Add New Category';
        $this->layout->view('config_subjects/test', $data);
    }


    function edit($id = null) {
        $data = array();
        if ($_POST) {
            $id = $this->input->post('text_subject_id');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['SubjectId'] = $this->input->post('text_subject_id');
                $class_list = $this->input->post('ClassId');
                
                if ($this->Config_subject->edit($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('config_subjects/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();

        $BranchId=  $this->get_location_id();

        $data['headline'] = 'Edit Subjects';
        $data['title'] = 'Edit Subjects Entry';
        $data['row'] = $this->Config_subject->read($id);

        $data['class_wise_subject'] = $this->Config_subject->get_subject_wise_class_list($id,$BranchId);
        $data['class_medium_subject'] = $this->Config_subject->get_class_wise_medium_list($id,$BranchId);
        $this->layout->view('config_subjects/add', $data);
    }
    function delete($id = null) {
        if (empty($id)) {
            redirect('customers/index/', 'refresh');
        } else {
            $row = $this->Config_subject->read($id);
            if ($this->Config_subject->delete($id) == true) {
                $this->Config_subject->delete_subject_wise_class_medium($id);
                redirect('config_subjects/index/', 'refresh');
            }
        }
    }
    function _load_combo_data() {
        $data = array();
        $data['branch_list']=$this->Branch->get_all_location_list();
        $cond['BranchId']=  $this->get_location_id();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        // $data['medium_list']=$this->get_medium();
        //echo"<pre>";print_r($data);die;
        return $data;
    }
    function _get_posted_data() {
        $data = array();
        $data['SubjectName'] = $this->input->post('txt_subject_name');
        $data['BranchId'] = $this->input->post('cbo_branch');
        return $data;
    }

    function _prepare_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('txt_subject_name', 'Subjects Name', 'trim|required|max_length[200]|xss_clean');
    }
    function ajax_get_subject_details(){
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $subject_id= $this->input->post('subject_id');
        $callback_message['status'] = 'failure';
        if (empty($subject_id)) {
            $callback_message['message'] = 'Select a Subject';
        }
        else
        {
            $subject_info = $this->Config_subject->read($subject_id);
            $callback_message['status'] = 'success';
            $callback_message['SubjectId'] = $subject_info->SubjectId;
            $callback_message['SubjectName'] = $subject_info->SubjectName;
        }
        echo json_encode($callback_message);
    }
    function ajax_for_get_subject_list_by_class(){
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $ClassId= $this->input->post('ClassId');
        $BranchId= $this->input->post('BranchId');
        $callback_message['status'] = 'failure';
        if (empty($ClassId)) {
            $callback_message['message'] = 'Select a Class';
        }
        else
        {
            $subject_info = $this->Config_subject->get_class_wise_subject_list($ClassId,$BranchId,null);
            //echo"<pre>";print_r($subject_info);die;
            $callback_message['status'] = 'success';
            foreach ($subject_info as $row) {
                $callback_message['SubjectId'][] = $row->SubjectId;
                $callback_message['SubjectName'][] = $row->SubjectName;
            }
        }
        echo json_encode($callback_message);
    }

}
?>
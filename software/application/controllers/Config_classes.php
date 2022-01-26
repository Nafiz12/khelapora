<?php
class Config_classes extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Config_class','MY_Model','Branch'));
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
        $total = $this->Config_class->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/config_classes/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);

        $data=$this->_load_combo_data();
        $data['results'] = $this->Config_class->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        $data['session_data'] = $session_data;
        $data['headline'] = 'List Of Courses';
        $data['title'] = 'Course List';
        //echo"<pre>"; print_r($data); die;
        $this->layout->view('config_classes/index', $data);
    }

    function add() {
        $data = array();
        if ($_POST) {
            $this->_prepare_validation();
            $this->form_validation->set_rules('txt_class_name', 'Class Name', 'required|callback_check_duplicate_name');
            $this->form_validation->set_rules('txt_class_code', 'Class Code', 'required|callback_check_duplicate_code');

            $data = $this->_get_posted_data();

            if ($this->form_validation->run()) {
                $data['ClassId'] = NULL;
                if ($this->Config_class->add($data)) {
                    $this->session->set_flashdata('success', 'Data has been added successfully');
                    redirect('config_classes/index', 'refresh');
                }
            }else{
                echo validation_errors(); die;
            }
        }
        $data=$this->_load_combo_data();
        $data['headline'] = 'Class Information';
        $data['title'] = ' Add New Class';
        $this->layout->view('config_classes/add', $data);
    }

    function edit($id = null) {
        $data = array();
        if ($_POST) {
            $id = $this->input->post('text_class_id');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['ClassId'] = $this->input->post('text_class_id');
                if ($this->Config_class->edit($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('config_classes/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['headline'] = 'Edit Class';
        $data['title'] = 'Edit Class Entry';
        $data['row'] = $this->Config_class->read($id);
        //echo "<pre>";print_r($data['row']);
        $this->layout->view('config_classes/add', $data);
    }
    function delete($id = null) {
        if (empty($id)) {
            //$this->session->set_flashdata('warning','Location ID is not provided');
            redirect('customers/index/', 'refresh');
        } else {
            $row = $this->Config_class->read($id);
            //echo "<pre>";print_r($row);die;
            if ($this->Config_class->delete($id) == true) {
                $this->session->set_flashdata('success', 'Data has been Deleted successfully');
                redirect('config_classes/index/', 'refresh');
            }
        }
    }
    function _load_combo_data() {
        $data = array();
        $data['branch_list']=$this->Branch->get_all_location_list();
        return $data;
    }
    function check_duplicate_name(){
        $class_name = $this->input->post('txt_class_name');
        $BranchId= $this->input->post('cbo_branch');
        $is_duplicate_entry = $this->Config_class->check_for_duplicate_entry($BranchId,$class_name,'name');
        if(!empty($is_duplicate_entry)){
            $this->form_validation->set_message('check_duplicate', "This Class Name is already inserted !");
            return FALSE;
        }
        return true;
    }
    function check_duplicate_code(){
        $class_code = $this->input->post('txt_class_code');
        $BranchId= $this->input->post('cbo_branch');
        $is_duplicate_entry = $this->Config_class->check_for_duplicate_entry($BranchId,$class_code,'code');
        if(!empty($is_duplicate_entry)){
            $this->form_validation->set_message('check_duplicate', "This Class Name is already inserted !");
            return FALSE;
        }
        return true;
    }
    function _get_posted_data() {
        $data = array();
        $data['ClassName'] = $this->input->post('txt_class_name');
        $data['ClassCode'] = $this->input->post('txt_class_code');
        $data['BranchId'] = $this->input->post('cbo_branch');
        $data['ClassDescription'] = $this->input->post('txt_description');
        return $data;
    }

    function _prepare_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('txt_class_name', 'Class Name', 'trim|required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('txt_class_code', 'Class Code', 'trim|required|max_length[200]|xss_clean');
    }
    function ajax_get_class_details(){
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id= $this->input->post('class_id');
        $callback_message['status'] = 'failure';
        if (empty($class_id)) {
            $callback_message['message'] = 'Select a Class';
        }
        else
        {
            $class_info = $this->Config_class->read($class_id);
            $callback_message['status'] = 'success';
            $callback_message['ClassId'] = $class_info->ClassId;
            $callback_message['ClassName'] = $class_info->ClassName;
        }
        echo json_encode($callback_message);
    }

}
?>
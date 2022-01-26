<?php
class Config_sections extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Config_section','MY_Model','Config_class'));
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('security');
    }
    function index() {
        $data = array();
        $data['headline'] = 'List Of Sections';
        $data['title'] = 'Section List';
        $BranchId=$this->get_location_id();
        $data['results'] = $this->Config_section->get_list($BranchId);
        $this->layout->view('config_sections/index', $data);
    }

    function add() {
        if ($_POST) {
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['SectionId'] = NULL;
                if ($this->Config_section->add($data)) {
                    $this->session->set_flashdata('success', 'Data has been added successfully');
                    redirect('config_sections/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['headline'] = 'Section Information';
        $data['title'] = ' Add New Section';
        $this->layout->view('config_sections/add', $data);
    }
    function test() {
        $data = array();
        $data['headline'] = 'Category Information';
        $data['title'] = ' Add New Category';
        $this->layout->view('config_sections/test', $data);
    }


    function edit($id = null) {
        $data=$this->_load_combo_data();
        if ($_POST) {
            $id = $this->input->post('text_section_id');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['SectionId'] = $this->input->post('text_section_id');
                if ($this->Config_section->edit($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('config_sections/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Edit Section';
        $data['title'] = 'Edit Section Entry';
        $data['row'] = $this->Config_section->read($id);
        //echo "<pre>";print_r($data['row']);
        $this->layout->view('config_sections/add', $data);
    }
    function delete($id = null) {
        if (empty($id)) {
            //$this->session->set_flashdata('warning','Location ID is not provided');
            redirect('customers/index/', 'refresh');
        } else {
            $row = $this->Config_section->read($id);
            //echo "<pre>";print_r($row);die;
            if ($this->Config_section->delete($id) == true) {
                //$this->session->set_flashdata('success',DELETE_MESSAGE);
                redirect('config_sections/index/', 'refresh');
            }
        }
    }

    function _get_posted_data() {
        $data = array();
        $data['SectionName'] = $this->input->post('txt_section_name');
        $data['SectionCode'] = $this->input->post('txt_section_code');
        $data['BranchId'] = $this->input->post('BranchId');
        $data['ClassId'] = $this->input->post('cbo_class');
        return $data;
    }
    function _load_combo_data() {
        $data = array();
        $cond['BranchId']=  $this->get_location_id();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        return $data;
    }

    function _prepare_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        //$this->form_validation->set_rules('txt_section_name', 'Section Name', 'trim|required|max_length[200]|xss_clean|callback_check_duplicate_section');
        $this->form_validation->set_rules('txt_section_name', 'Section Name', 'trim|required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('cbo_class', 'Class', 'trim|required');
    }
    function check_duplicate_section(){
        $class_id = $this->input->post('cbo_class');
        $section_name = $this->input->post('txt_section_name');
        $class_info = $this->Config_class->read($class_id);

        $action = $this->uri->segment(2);
        if($action == "add"){
            $is_duplicate_entry = $this->Config_section->check_for_duplicate_entry($class_id,$section_name);
            if(!empty($is_duplicate_entry)){
                $this->form_validation->set_message('check_duplicate_section', "This Section is already assigned for Class $class_info->ClassName !");
                return FALSE;
            }
        }
        return true;
    }
    function ajax_for_get_section_list_by_class() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');
        $callback_message['status'] = 'failure';
        if (empty($class_id)) {
            $callback_message['message'] = 'Select a Class';
        } else {
            $section_info = $this->Config_section->get_section_list($class_id);
            foreach ($section_info as $row) {
                $callback_message['status'] = 'success';
                $callback_message['SectionId'][] = $row['SectionId'];
                $callback_message['SectionName'][] = $row['SectionName'];
            }
        }
        echo json_encode($callback_message);

    }
}
?>
<?php
class Config_class_periods extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Config_class_period','Config_class','MY_Model','Branch'));
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('security');
    }
    function index() {
        $data = array();
        $data['headline'] = 'List Of Batches';
        $data['title'] = 'Batches List';

        $data['results'] = $this->Config_class_period->get_list();
        

        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        //echo"a<pre>"; print_r($session_data); //die;
        if(empty($session_data)){
            $session_data['BranchId']=  $this->get_location_id();
        }
        if (is_array($session_data)) {
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
            $cond['BatchName'] = isset($session_data['BatchName']) ? $session_data['BatchName'] : '';
        }
        $this->load->library('pagination');
        $total = $this->Config_class_period->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/config_classes/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);

        $data=$this->_load_combo_data();
        $data['results'] = $this->Config_class_period->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        $data['session_data'] = $session_data;
        $data['headline'] = 'List Of Batches';
        $data['title'] = 'Batches List';
        $data['batch_list'] = $this->Config_class_period->get_batch_list();
        // echo"a<pre>"; print_r($data); die;
        $this->layout->view('config_class_periods/index', $data);
    }

    function add() {
        $data = array();
        if ($_POST) {
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            //echo"<pre>"; print_r($data); die;
            if ($this->form_validation->run()) {
                
                if ($this->Config_class_period->add($data)) {
                    $this->session->set_flashdata('success', 'Data has been added successfully');
                    redirect('config_class_periods/index', 'refresh');
                }
            }
            else{
                echo"<pre>"; print_r(validation_errors()); die;
            }
        }
        $data=$this->_load_combo_data();
        $data['headline'] = 'Class Information';
        $data['title'] = ' Add New Class';
        $this->layout->view('config_class_periods/add', $data);
    }

    function edit($id = null) {
        $data = array();
        if ($_POST) {
            $id = $this->input->post('BatchId');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['BatchId'] = $this->input->post('BatchId');
                if ($this->Config_class_period->edit($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('config_class_periods/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['headline'] = 'Edit Batch';
        $data['title'] = 'Edit Batch Entry';
        $data['row'] = $this->Config_class_period->read($id);
        //echo "<pre>";print_r($data['row']);
        $this->layout->view('config_class_periods/add', $data);
    }
    function delete($id = null) {
        if (empty($id)) {
            //$this->session->set_flashdata('warning','Location ID is not provided');
            redirect('customers/index/', 'refresh');
        } else {
            $row = $this->Config_class_period->read($id);
            //echo "<pre>";print_r($row);die;
            if ($this->Config_class_period->delete($id) == true) {
                $this->session->set_flashdata('success', 'Data has been Deleted successfully');
                redirect('config_class_periods/index/', 'refresh');
            }
        }
    }
    function _load_combo_data() {
        $data = array();
        $data['branch_list']=$this->Branch->get_all_location_list();
        $cond['BranchId']=  $this->get_location_id();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);

// echo "<pre>";print_r($data);die;
        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data['BranchId'] = $this->input->post('cbo_branch');
        $data['CourseId'] = $this->input->post('CourseId');
        $data['BatchName'] = $this->input->post('BatchName');
        $data['StartTime'] = $this->input->post('StartTime');
        $data['EndTime'] = $this->input->post('EndTime');
        $data['Day'] = $this->input->post('Day');
        return $data;
    }

    function _prepare_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('BatchName', 'Batch Name', 'trim|required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('CourseId', 'CourseId', 'trim|required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('StartTime', 'Start Time', 'trim|required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('EndTime', 'End Time', 'trim|required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('Day', 'Day', 'trim|required|max_length[200]|xss_clean');
    }

}
?>
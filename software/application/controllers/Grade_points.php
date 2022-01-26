<?php
class Grade_points extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Grade_point','Config_class','Config_section'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');

        $this->load->library('pagination');
        $total = $this->Grade_point->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/grade_points/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


      //  $data=$this->_load_combo_data();
        $data['list'] = $this->Grade_point->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'Exam Routine';
        $data['title'] = 'Exam Routine';
        //echo "<pre>";print_r($data);die;
        $this->layout->view('grade_points/index',$data);
    }
    function add(){
       // $data=$this->_load_combo_data();
        if($_POST)
        {
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            //$this->form_validation->set_rules('txt_code','Code','trim|required|is_unique[students.StudentCode]');
            if ($this->form_validation->run() === TRUE)
            {
                //echo "<pre>";print_r($data);die;
                $result=$this->Grade_point->add($data['row']);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Data is succcessfully saved');
                    redirect('grade_points/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Add Grade Point';
        $data['title'] = 'Add Grade Point';
        $this->layout->view('grade_points/add',$data);
    }

    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('grade_points/index', 'refresh');
        }
        $result=$this->Grade_point->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('grade_points/index', 'refresh');
        }
    }
    function edit($id = null){
        if($_POST)
        {
            $id = $this->input->post('GradeId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['GradeId'] = $this->input->post('GradeId');
                if ($this->Grade_point->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('grade_points/index', 'refresh');
                }
            }
        }
        //$data=$this->_load_combo_data();
        $data['row']=$this->Grade_point->read($id);
        // echo "<pre>";print_r($data['row']);die;
        $data['headline'] = 'Edit Grade points';
        $data['title'] = 'Edit Grade points';
        // echo "<pre>";print_r($data);die;
        $this->layout->view('grade_points/add',$data);
    }


    function _load_combo_data() {
        $data = array();
        $data['class_list'] = $this->Config_class->get_list();
        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('txt_name','Name','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['GradeName']=$this->input->post('txt_name');
        $data['GradePoint']=$this->input->post('txt_point');
        $data['MarkFrom']=$this->input->post('txt_mark_from');
        $data['MarkTo']=$this->input->post('txt_mark_to');
        $data['GradeDescription']=$this->input->post('txt_description');

        return $data;
    }
}
?>
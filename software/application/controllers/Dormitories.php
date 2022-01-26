<?php
class Dormitories extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Dormitory'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');

        $this->load->library('pagination');
        $total = $this->Dormitory->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/dormitories/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);

        $data['list'] = $this->Dormitory->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'Dormitory';
        $data['title'] = 'Dormitory';
        //echo "<pre>";print_r($data);die;
        $this->layout->view('dormitories/index',$data);
    }
    function add(){

        if($_POST)
        {
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            //$this->form_validation->set_rules('txt_code','Code','trim|required|is_unique[students.StudentCode]');
            if ($this->form_validation->run() === TRUE)
            {
                //echo "<pre>";print_r($data);die;
                $result=$this->Dormitory->add($data['row']);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Data is succcessfully saved');
                    redirect('dormitories/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Dormitory';
        $data['title'] = 'Dormitory';
        $this->layout->view('dormitories/add',$data);
    }

    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('dormitories/index', 'refresh');
        }
        $result=$this->Dormitory->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('dormitories/index', 'refresh');
        }
    }
    function edit($id = null){
        if($_POST)
        {
            $id = $this->input->post('DormitoryId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['DormitoryId'] = $this->input->post('DormitoryId');
                if ($this->Dormitory->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('dormitories/index', 'refresh');
                }
            }
        }
        $data['row']=$this->Dormitory->read($id);
        // echo "<pre>";print_r($data['row']);die;
        $data['headline'] = 'Edit Dormitory';
        $data['title'] = 'Edit Dormitory';
        // echo "<pre>";print_r($data);die;
        $this->layout->view('dormitories/add',$data);
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
        $data['DormitoryName']=$this->input->post('txt_name');
        $data['NoOfRooms']=$this->input->post('txt_number');
        $data['Description']=$this->input->post('txt_description');

        return $data;
    }
}
?>
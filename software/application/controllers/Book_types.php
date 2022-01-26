<?php
class Book_types extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Book_type'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');

        $this->load->library('pagination');
        $total = $this->Book_type->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/book_types/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);

        $data['list'] = $this->Book_type->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'Book types';
        $data['title'] = 'Book types';
        //echo "<pre>";print_r($data);die;
        $this->layout->view('book_types/index',$data);
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
                $result=$this->Book_type->add($data['row']);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Data is succcessfully saved');
                    redirect('book_types/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Book Type';
        $data['title'] = 'Book Type';
        $this->layout->view('book_types/add',$data);
    }

    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('book_types/index', 'refresh');
        }
        $result=$this->Book_type->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('book_types/index', 'refresh');
        }
    }
    function edit($id = null){
        if($_POST)
        {
            $id = $this->input->post('AuthorId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['TypeId'] = $this->input->post('TypeId');
                if ($this->Book_type->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('book_types/index', 'refresh');
                }
            }
        }
        $data['row']=$this->Book_type->read($id);
        // echo "<pre>";print_r($data['row']);die;
        $data['headline'] = 'Edit Book Type';
        $data['title'] = 'Edit Book Type';
        // echo "<pre>";print_r($data);die;
        $this->layout->view('book_types/add',$data);
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
        $data['TypeName']=$this->input->post('txt_name');

        return $data;
    }
}
?>
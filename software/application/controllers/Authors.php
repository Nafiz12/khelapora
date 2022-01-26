<?php
class Authors extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Author'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');

        $this->load->library('pagination');
        $total = $this->Author->row_count($cond);
        //Initializing Pagination
        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/authors/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);

        $data['list'] = $this->Author->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'Author';
        $data['title'] = 'Author';
        //echo "<pre>";print_r($data);die;
        $this->layout->view('authors/index',$data);
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
                $result=$this->Author->add($data['row']);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Data is Successfully saved');
                    redirect('authors/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Author';
        $data['title'] = 'Author';
        $this->layout->view('authors/add',$data);
    }

    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('authors/index', 'refresh');
        }
        $result=$this->Author->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('authors/index', 'refresh');
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
                $data['row']['AuthorId'] = $this->input->post('AuthorId');
                if ($this->Author->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('authors/index', 'refresh');
                }
            }
        }
        $data['row']=$this->Author->read($id);
        $data['headline'] = 'Edit Author';
        $data['title'] = 'Edit Author';
        $this->layout->view('authors/add',$data);
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
        $data['AuthorName']=$this->input->post('txt_name');
        $data['Description']=$this->input->post('txt_description');
        return $data;
    }
}
?>
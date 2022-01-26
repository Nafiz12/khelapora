<?php
class Books extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Book','Config_class','Config_subject','Branch','Student','Organization'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get();
        if (is_array($session_data)) {
            $cond['AuthorId'] = isset($session_data['AuthorId']) ? $session_data['AuthorId'] : '';
            $cond['TypeId'] = isset($session_data['TypeId']) ? $session_data['TypeId'] : '';
        }
        $this->load->library('pagination');
        $total = $this->Book->row_count($cond);

        //Initializing Pagination
        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/books/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);

        $data=$this->_load_combo_data();
        $data['list'] = $this->Book->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        $data['session_data'] = $session_data;

        $data['headline'] = 'Book List';
        $data['title'] = 'Book List';
        $this->layout->view('books/index',$data);
    }
    function add(){
        $data=$this->_load_combo_data();
        if($_POST)
        {
            $row=$this->_get_posted_data();
            $data['row'] = $row;
            $book_array = array();
            $book_details_array = array();

            $book_id = $this->Student->get_new_id('books', 'BookId');
            $book_array['BookId'] = $book_id;
            $book_array['BookName'] = $row['BookName'];
            $book_array['AuthorId'] = $row['AuthorId'];
            
            $book_array['TypeId'] = $row['TypeId'];
            $book_array['SubjectId'] = $row['SubjectId'];
            
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE){
                if($this->Book->add($book_array)){
                    // $this->Book->add_details($book_details_array);
                    $this->session->set_flashdata('success', 'Data is successfully saved');
                    redirect('books/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Add Book';
        $data['title'] = 'Add Book';
        $this->layout->view('books/add',$data);
    }
    function view($id = null) {
        $data = $this->_load_combo_data();
        $data['headline'] = 'View Book Details';
        $data['title'] = 'View Book Details';
        if (empty($id)) {
            $this->session->set_flashdata('fail', 'ID is not provided');
            redirect('books/index/', 'refresh');
        } else {
            $data['organization_info'] = $this->Organization->read(1);
            $data['row']=$this->Book->read($id);
            $data['book_details']=$this->Book->read_details($id);
            //echo'<pre>'; print_r($data); die;
            $this->layout->view('books/view', $data);
        }
    }
    function delete($id){
        if(empty($id) || $id == ""){
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('books/index', 'refresh');
        }
        $result=$this->Book->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('books/index', 'refresh');
        }
    }
    function edit($id = null){
        if($_POST){
            $row=$this->_get_posted_data();

            $data['row'] = $row;
            $book_array = array();
            $book_details_array = array();

            $book_array['BookId'] = $this->input->post('BookId');
            $book_array['BookName'] = $row['BookName'];
            $book_array['AuthorId'] = $row['AuthorId'];
           
            $book_array['TypeId'] = $row['TypeId'];
            $book_array['SubjectId'] = $row['SubjectId'];
            // $i=0;
            // foreach($row['IdentificationNumber'] as $k){
            //     $book_details_array[$i]['BookId'] =$this->input->post('BookId');
            //     $book_details_array[$i]['IdentificationNumber'] =$k;
            //     $book_details_array[$i]['BookStatus'] ='A';
            //     $i++;
            // }
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE){
                if ($this->Book->edit($book_array)) {
                    // $this->Book->edit_details($this->input->post('BookId'),$book_details_array);
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('books/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['row']=$this->Book->read($id);
        // $data['book_details']=$this->Book->read_details($id);
        //
        $data['headline'] = 'Edit Book Information';
        $data['title'] = 'Edit Book Information';
        $this->layout->view('books/add',$data);
    }


    function _load_combo_data() {
        $data = array();
        $data['author_list'] = $this->Book->get_author_list();
        $data['subject_list']=$this->Config_subject->get_subject_lists();
        $data['book_type_list'] = $this->Book->get_book_types_list();
        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('BookName','Book Name','trim|required');
        $this->form_validation->set_rules('AuthorId','Author','trim|required');
        $this->form_validation->set_rules('TypeId','Type','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['BookName']=$this->input->post('BookName');
        $data['BookCode']=$this->input->post('BookCode');
        $data['AuthorId']=$this->input->post('AuthorId');
        $data['TypeId']=$this->input->post('TypeId');
        // $data['NumberOfBooks']=$this->input->post('NumberOfBooks');
        $data['SubjectId']=$this->input->post('SubjectId');
        return $data;
    }
}
?>
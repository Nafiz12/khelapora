<?php
class Fee_categories extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Fee_category','Ac_ledger'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');

        $this->load->library('pagination');
        $total = $this->Fee_category->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/Fee_categories/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $this->pagination->initialize($config);

        $data['list'] = $this->Fee_category->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'Fee Category';
        $data['title'] = 'Fee Category';
        // echo "<pre>";print_r($data);die;
        $this->layout->view('fee_categories/index',$data);
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
                $result=$this->Fee_category->add($data['row']);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Data is succcessfully saved');
                    redirect('fee_categories/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Add Fee Category';
        $data['title'] = 'Add Fee Category';
        $this->layout->view('fee_categories/add',$data);
    }

    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('fee_categories/index', 'refresh');
        }
        $fee_type_dependency_found = $this->Config_general->is_dependency_found('fee_types', array('CategoryId' => $id));
        if($fee_type_dependency_found)
        {
            $this->session->set_flashdata('fail','Dependent Data Found');
            redirect('fee_categories/index/', 'refresh');
        }else{
            $result=$this->Fee_category->delete($id);
            if($result)
            {
                $this->session->set_flashdata('success', 'Data has been deleted successfully.');
                redirect('fee_categories/index', 'refresh');
            }
        }
    }
    function edit($id = null){
        if($_POST)
        {
            $id = $this->input->post('CategoryId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['CategoryId'] = $this->input->post('CategoryId');
                if ($this->Fee_category->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('fee_categories/index', 'refresh');
                }
            }
        }
        $data['row']=$this->Fee_category->read($id);
        // echo "<pre>";print_r($data['row']);die;
        $data['headline'] = 'Edit Fee Category';
        $data['title'] = 'Edit Fee Category';
        // echo "<pre>";print_r($data);die;
        $this->layout->view('fee_categories/add',$data);
    }

    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('CategoryName','CategoryName','trim|required');
        $this->form_validation->set_rules('LedgerCode', 'Ledger Code', 'trim|required|max_length[200]|xss_clean|callback_check_ledger_code');
    }
    function check_ledger_code(){
        $ledger_code = $this->input->post('LedgerCode');
        $has_entry = $this->Ac_ledger->read_by_code($ledger_code);
        //echo '<pre>'; print_r($has_entry); die;
        if(empty($has_entry) || $has_entry='' || !isset($has_entry)){
            $this->form_validation->set_message('check_ledger_code', "Ledger code does not exists! Please configure Chart Accounts First.");
            return FALSE;
        }
        return true;
    }
    function _get_posted_data()
    {
        $data=array();
        $data['CategoryName']=$this->input->post('CategoryName');
        $data['LedgerCode']=$this->input->post('LedgerCode');

        return $data;
    }
}
?>
<?php
class Fee_configurations extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Fee_configuration','Config_class','Config_class_period','Config_section','Fee_type','Branch'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        //echo"a<pre>"; print_r($session_data); //die;
        if(empty($session_data)){
            $session_data['BranchId']=  $this->get_location_id();
        }
        if (is_array($session_data)) {
            $cond['BatchId'] = isset($session_data['BatchId']) ? $session_data['BatchId'] : '';
            $cond['TypeId'] = isset($session_data['cbo_type']) ? $session_data['cbo_type'] : '';
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
        }

        $this->load->library('pagination');
        $total = $this->Fee_configuration->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/fee_configurations/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 50;
        $this->pagination->initialize($config);


        $data=$this->_load_combo_data();
        $data['config_list'] = $this->Fee_configuration->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'Fee List';
        $data['title'] = 'Fee List';
        //echo "<pre>";print_r($data);die;
        $this->layout->view('fee_configurations/index',$data);
    }
    function add(){
        $data=$this->_load_combo_data();
        if($_POST)
        {

            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();

            //$this->form_validation->set_rules('txt_code','Code','trim|required|is_unique[students.StudentCode]');
            if ($this->form_validation->run() === TRUE)
            {
                 // echo "<pre>";print_r($_POST);die;
                $result=$this->Fee_configuration->add($data['row']);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Data is succcessfully saved');
                    redirect('fee_configurations/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Add Fee';
        $data['title'] = 'Add Fee';
        $this->layout->view('fee_configurations/add',$data);
    }

    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('fee_configurations/index', 'refresh');
        }
        $result=$this->Fee_configuration->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('fee_configurations/index', 'refresh');
        }
    }
    function edit($id = null){
        if($_POST)
        {
            $id = $this->input->post('FeeConfigId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['FeeConfigId'] = $this->input->post('FeeConfigId');
                if ($this->Fee_configuration->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('fee_configurations/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['result']=$this->Fee_configuration->read($id);
       // echo "<pre>";print_r($data['row']);die;
        $data['headline'] = 'Edit Fee Configurations';
        $data['title'] = 'Edit Fee Configurations';
       // echo "<pre>";print_r($data);die;
        $this->layout->view('fee_configurations/add',$data);
    }


    function _load_combo_data() {
        $data = array();
        
        $data['branch_list']=$this->Branch->get_all_location_list();
        $cond['BranchId']=  $this->get_location_id();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['type_list'] = $this->Fee_type->get_list();
        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('CourseId','CourseId','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['BranchId']=$this->input->post('cbo_branch');
        $data['CourseId']=$this->input->post('CourseId');
        $data['TypeId']=$this->input->post('cbo_feetype');
        $data['Amount']=$this->input->post('txt_amount');
        $IsWaiverApplicable=$this->input->post('IsWaiverApplicable');
        if($IsWaiverApplicable == 1){
            $data['WaiverAmount']=$this->input->post('txt_waiver_amount');
        }
        return $data;
    }
    function ajax_get_class_wise_fee_list(){
        $CourseId = $this->input->post('CourseId');
        $BranchId=  $this->get_location_id();
        $fee_info = $this->Fee_configuration->get_class_wise_fee_list($CourseId,$BranchId);
        // echo '<pre>'; echo $this->db->last_query(); die;
        if (empty($fee_info)) {
            $callback_message['status'] = "failure";
        } else {
            foreach ($fee_info as $row) {
                $callback_message['status'] = 'success';
                $callback_message['FeeConfigId'][] = $row['FeeConfigId'];
                $callback_message['LedgerCode'][] = $row['LedgerCode'];
                $callback_message['TypeId'][] = $row['TypeId'];
                $callback_message['IsMonthlyFee'][] = $row['IsMonthlyFee'];
                $callback_message['IsWaiverApplicable'][] = $row['IsWaiverApplicable'];
                $callback_message['TypeName'][] = $row['TypeName'];
                $callback_message['Amount'][] = $row['Amount'];
                $callback_message['WaiverAmount'][] = $row['WaiverAmount'];
            }
        }
        echo json_encode($callback_message);
    }
}
?>
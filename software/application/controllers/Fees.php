<?php
class Fees extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Organization','Ac_ledger','Fee','Config_class_period','Fee_configuration','Student','Config_class','Config_section','Fee_type','Branch','Ac_voucher'));
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
            $cond['ClassId'] = isset($session_data['cbo_class']) ? $session_data['cbo_class'] : '';
            $cond['SectionId'] = isset($session_data['cbo_section']) ? $session_data['cbo_section'] : '';
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
        }
        $this->load->library('pagination');
        $total = $this->Fee->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/fees/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


        $data=$this->_load_combo_data();
        //echo "<pre>";print_r($data);
        $data['list'] = $this->Fee->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        //echo "<pre>";print_r($data['list']);die;
        $data['session_data'] = $session_data;

        $data['headline'] = 'List Of Fee';
        $data['title'] = 'Fee List';
        //echo "<pre>";print_r($data);die;
        $this->layout->view('fees/index',$data);
    }
    function add(){
        if($_POST)
        {
            $data=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['FeeId'] = $this->Fee->get_new_id('fees', 'FeeId');
                $studentInfo = $this->Student->read($data['StudentId']);

                $voucher = array();
                $voucher['VoucherId'] = $this->Ac_voucher->get_new_id('acc_vouchers','VoucherId');
                $voucher['VoucherType'] = 'R';
                $voucher['BranchId'] =$this->get_location_id();
                $voucher_code = $this->Ac_voucher->get_voucher_code($this->get_location_id(),'R');
                $voucher['VoucherCode'] = $voucher_code;
                $voucher['VoucherAmount'] =$data['TotalAmount'];
                $voucher['VoucherDate'] = $data['TransactionDate'];
                $voucher['Particulars'] = '[auto] Fee received for '.$studentInfo->StudentName.' [ '.$studentInfo->StudentCode.' ] '.'Memo Number'.$data['MemoNo'];
                $voucher['EntryDate'] = $data['TransactionDate'];
                $voucher['EntryBy'] =  $this->get_user_id();
                $voucher['IsAutoVoucher'] =  1;


                $fee_array = array();
                $fee_array['FeeId']=$data['FeeId'];
                $fee_array['BranchId']= $this->get_location_id();
                $fee_array['Year']=$data['Year'];
                $fee_array['MemoNo']=$data['MemoNo'];
                $fee_array['StudentId']=$data['StudentId'];
                $fee_array['TransactionDate']=$data['TransactionDate'];
                $fee_array['TotalAmount']=$data['TotalAmount'];
                $fee_array['TotalWaiverAmount']=$data['TotalWaiverAmount'];
                $fee_array['DueDate']=$data['DueDate'];
                $fee_array['EntryDate'] = $data['TransactionDate'];
                $fee_array['EntryBy'] =  $this->get_user_id();
                $fee_array['VoucherId']=$voucher['VoucherId'];

                $voucher_details = array();
                $fee_details = array();
                $Chk=$this->input->post('Chk');
                $i=0;
                foreach($Chk as $key=>$row){
                //for ($i = 1; $i <= $length; $i++) {

                    $fee_details[$i]['FeeDetailsId'] = NULL;
                    $fee_details[$i]['FeeId'] = $fee_array['FeeId'];
                    $fee_details[$i]['Year'] = $fee_array['Year'];
                    $fee_details[$i]['StudentId'] = $fee_array['StudentId'];
                    $fee_details[$i]['CourseId'] = $studentInfo->CourseId;
                    $fee_details[$i]['TransactionDate'] = $fee_array['TransactionDate'];
                    $fee_details[$i]['BranchId'] = $fee_array['BranchId'];
                    $fee_details[$i]['TypeId'] = $data['TypeId'][$key];
                    $fee_details[$i]['Amount'] = ($data['Amount'][$key]-$data['WaiverAmount'][$key]);
                    $fee_details[$i]['WaiverAmount'] = $data['WaiverAmount'][$key];
                    $fee_details[$i]['DueDate'] = $data['DueDate'];

                    $voucher_details[$i]['VoucherDetailsId'] = NULL;
                    $voucher_details[$i]['VoucherId'] = $voucher['VoucherId'];
                    $voucher_details[$i]['BranchId'] =  $voucher['BranchId'];
                    $voucher_details[$i]['CreditLedgerId'] = $this->Ac_ledger->get_ledger_by_code($data['LedgerCode'][$key]);
                    $voucher_details[$i]['DebitLedgerId'] = 1;
                    $voucher_details[$i]['Particulars'] = '[auto] Fee received for '.$studentInfo->StudentName.' [ '.$studentInfo->StudentCode.' ] '.'Memo Number'.$data['MemoNo'];
                    $voucher_details[$i]['Amount'] = ($data['Amount'][$key]-$data['WaiverAmount'][$key]);
                    $i++;
                }

//                echo '<pre>'; print_r($fee_array); //die;
//                echo '<pre>'; print_r($fee_array); //die;
//                echo '<pre>'; print_r($voucher); //die;
               //echo '<pre>'; print_r($voucher_details); die;

                $this->db->trans_start();
                $this->Fee->add($fee_array);
                $this->Fee->add_fee_details($fee_details);
                $this->Ac_voucher->add($voucher);
                $this->Ac_voucher->add_voucher_details($voucher_details);
                $this->db->trans_complete();
                if ($this->db->trans_status()) {
                     if($data['TotalAmount'] >0){
                       
                        $this->Student->update_pending_student_to_active($data['StudentId']);
                    }
                    $this->session->set_flashdata('success', 'Date has been added successfully');
                    redirect('fees/index', 'refresh');
                } else {
                    $this->session->set_flashdata('fail', 'Sorry, Operation perform failed');
                    redirect('fees/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['headline'] = 'Add Student Fee';
        $data['title'] = 'Add Student Fee';
        $data['memo_number'] = $this->Fee->get_memo_number($this->get_location_id());
        $this->layout->view('fees/add',$data);
    }
    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('fees/index', 'refresh');
        }
        $this->Ac_voucher->delete_voucher_list_by_fee_id($id);
        $result=$this->Fee->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('fees/index', 'refresh');
        }
    }
    function edit($id = null){
        if($_POST)
        {
            $id = $this->input->post('StudentId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['FeeId'] = $this->input->post('FeeId');
                if ($this->Fee->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('fees/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['row']=$this->Fee->read($id);
        $data['headline'] = 'Edit Student Fee';
        $data['title'] = 'Edit Student Fee';
        //echo "<pre>";print_r($data);die;
        $this->layout->view('fees/add',$data);
    }
    function view($id = null){
        $data['organization_info'] = $this->Organization->read(1);
        $data['headline'] = 'Fee Information';
        $data['title'] = 'Fee Information';
        if (empty($id)) {
            $this->session->set_flashdata('fail', 'Fee ID is not provided');
            redirect('fees/index/', 'refresh');
        } else {
            $data['fee_info'] = $this->Fee->get_fee_information($id);
            $data['fee_details_info'] = $this->Fee->get_fee_details_information($id);
            $this->layout->view('fees/view', $data);
        }
    }
    function _load_combo_data() {
        $data = array();
        $data['branch_list']=$this->Branch->get_all_location_list();
        $cond['BranchId']=  $this->get_location_id();
        $data['Batch_list'] = $this->Config_class_period->get_list();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['section_list']=$this->Config_section->get_list();
        $data['student_list']=$this->Student->get_list();
        $data['type_list'] = $this->Fee_type->get_list();
        $data['academic_year_list']=$this->get_academic_year();
        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('txt_memo_no','memo','trim|required');
        $this->form_validation->set_rules('txt_date_of_transaction','Date','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['StudentId']=$this->input->post('StudentId');
        $data['TransactionDate']=date("Y-m-d", strtotime($this->input->post('txt_date_of_transaction')));
        $data['MemoNo']=$this->input->post('txt_memo_no');
        $data['Year']=$this->input->post('Year');
        $data['FeeConfigId']=$this->input->post('FeeConfigId');
        $data['LedgerCode']=$this->input->post('LedgerCode');
        $data['TypeId']=$this->input->post('TypeId');
        $data['Amount']=$this->input->post('Amount');
        $data['WaiverAmount']=$this->input->post('WaiverAmount');
        $data['DueDate']=$this->input->post('due_date');

        $Chk=$this->input->post('Chk');

        $TotalAmount=0;
        $TotalWaiverAmount=0;
        //$Chk=$this->input->post('Chk');
        foreach($Chk as $key=>$row){
            $TotalAmount = $TotalAmount+$data['Amount'][$key];
            $TotalWaiverAmount = $TotalWaiverAmount+$data['WaiverAmount'][$key];
        }
        $data['TotalAmount']=$TotalAmount-$TotalWaiverAmount;
        $data['TotalWaiverAmount']=$TotalWaiverAmount;
        return $data;
    }

    function ajax_for_get_student_list_by_class_and_section() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');
        //echo "<pre>";print_r($class_id);die;
        $callback_message['status'] = 'failure';
        if (empty($class_id)||empty($section_id)) {
            $callback_message['message'] = 'Select a Class and Section';
        }
            else
         {
            $student_info = $this->Fee->get_student_list($class_id,$section_id);
            foreach ($student_info as $row) {
                $callback_message['status'] = 'success';
                $callback_message['StudentId'][] = $row['StudentId'];
                $callback_message['StudentName'][] = $row['StudentName'];
            }
        }
        echo json_encode($callback_message);
    }
    
       function ajax_for_get_monthly_fee() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');
        $fee_id = $this->input->post('fee_id');
        //echo "<pre>";print_r($class_id);die;
        $callback_message['status'] = 'failure';
        if (empty($class_id)||empty($fee_id)) {
            $callback_message['message'] = 'Select Fee Type';
        }
            else
         {
            $amount_info = $this->Fee->get_monthly_fee($class_id,$fee_id);
           // print_r($amount_info);die;
                $callback_message['status'] = 'success';
                $callback_message['FeeConfigId'] = $amount_info['FeeConfigId'];
                $callback_message['Amount'] = $amount_info['Amount'];
            
        }
        echo json_encode($callback_message);
    }
}
?>
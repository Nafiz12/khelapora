<?php
class Report_fee_waivers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Branch','Student','Report_fee_waiver','Organization', 'Config_class', 'Config_section','Fee_type','Fee_configuration'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data = $this->_load_combo_data();
        $data['headline'] = 'Fee Waiver Report';
        $data['title'] = 'Fee Waiver Report';
        $this->layout->view('reports/report_fee_waivers/index', $data);
    }

    function ajax_get_report() {
        $data = $this->_get_posted_data();
        $data['organization_info'] = $this->Organization->read(1);
        $data['class_info'] = $this->Config_class->read($data['ClassId']);
            $data['headline'] = 'Fee Waiver Report';
            $data['title'] = 'Fee Waiver Report';
            //echo"<pre>";print_r($data);die; 
            if(!empty($data['ClassId'])){
                 $data['report_data'] = $this->Report_fee_waiver->get_weaver_fee_data($data);
                    $this->layout->view('reports/report_fee_waivers/fee_waiver_report', $data);
            }
            else {
            $data['report_data'] = $this->Report_fee_waiver->get_weaver_fee_data_all_class($data);
               $this->layout->view('reports/report_fee_waivers/fee_waiver_report_all_class', $data);
            }
           
//            echo"KK<pre>";print_r($data);die; 
         
        
    }

    function _load_combo_data() {
        $data = array();
        $cond['BranchId']=  $this->get_location_id();
//        $data['class_list'] = $this->Config_class->get_list();
//        echo"<pre>";print_r($cond);die; 
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['branch_list']=$this->Branch->get_all_location_list();

        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data['BranchId'] = $this->input->post('cbo_branch');
        $data['ClassId'] = $this->input->post('cbo_class');
            $data['DateFrom'] = date("Y-m-d", strtotime($this->input->post('txt_date_from')));
            $data['DateTo'] = date("Y-m-d", strtotime($this->input->post('txt_date_to')));
        return $data;
    }
}

?>
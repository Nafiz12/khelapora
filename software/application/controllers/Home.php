<?php
class Home extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model(array('Dashboard','Student','Employee','Fee','Branch'), '', TRUE);
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    function index()
    {
        $data['title']="Home";
        $branch_id= $this->user=$this->session->userdata('system.user');
        $BranchId= $branch_id['BranchId'];

        $data['TotalStudents'] = $this->Student->get_branch_wise_students($BranchId);
        $data['TotalStuff'] = count($this->Employee->get_branch_wise_employee_list($BranchId));
        $data['TotalTeacher'] = count($this->Employee->get_branch_wise_employee_list($BranchId,'Teacher'));
        $data['ThisMonthFeeCollection'] = $this->Fee->get_this_month_collection_amount($BranchId);
        $data['Total_Pending_Students'] = $this->Student->get_branch_wise_pending_students($BranchId);
        $data['ClassWiseTotalStudent'] = $this->Student->get_male_female_wise_student_number($BranchId,'A');
        $data['ClassWiseMale'] = $this->Student->get_male_female_wise_student_number($BranchId,'M');
        $data['ClassWiseFeMale'] = $this->Student->get_male_female_wise_student_number($BranchId,'F');
        $data['DesignationWiseEmployee'] = $this->Employee->get_designation_wise_employee($BranchId);
        //echo '<pre>'; print_r($data); die;

        $this->layout->view('home',$data);
    }

    function access_denied(){
        $data['title']="Access Denied";
        $this->layout->view("access_denied",$data);
    }
}

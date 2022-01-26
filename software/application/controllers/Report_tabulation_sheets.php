\<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_tabulation_sheets extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model(array('Branch','Manage_mark','Config_class','Config_section','Organization','Exam','Config_subject','Student'), '', TRUE);
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data = $this->_load_combo_data();
        $data['headline'] = 'Tabulation Sheet';
        $data['title'] = 'Tabulation Sheet';
        $this->layout->view('reports/report_tabulation_sheets/index', $data);
    }
    function ajax_get_tabulation_sheet() {
        $data = $this->_get_posted_data();
        $data['headline'] = 'Tabulation Sheet';
        $data['title'] = 'Tabulation Sheet';
        $data['exam_info'] = $this->Exam->read($data['ExamId']);
        $data['class_info'] = $this->Config_class->read($data['ClassId']);
        $data['section_info'] = $this->Config_section->read($data['SectionId']);
        $data['subject_list'] = $this->Config_subject->get_class_wise_subject_list($data['ClassId'],$data['BranchId'],null);
        $data['student_list'] = $this->Student->get_student_list($data['ClassId'],$data['SectionId'],$data['BranchId']);
        $data['tabulation_sheet_data']= $this->Manage_mark->get_tabulation_sheet_data($data);
        $data['organization_info'] = $this->Organization->read(1);
        $this->layout->view('reports/report_tabulation_sheets/tabulation_sheet', $data);
    }
    /**
     *
     * @author  :   Asif Raihan
     * @uses    :
     * @access  :   public
     * @param   :   none
     * @return  :   array
     */
    function _load_combo_data() {
        $data = array();
        $data['organization_info'] = $this->Organization->read(1);
        $cond['BranchId']=  $this->get_location_id();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['section_list']=$this->Config_section->get_list();
        $data['exam_list']=$this->Exam->get_list(null,null,$cond);
        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data['BranchId'] = $this->input->post('BranchId');
        $data['ClassId'] = $this->input->post('ClassId');
        $data['SectionId'] = $this->input->post('SectionId');
        $data['ExamId'] = $this->input->post('ExamId');
        $data['FromDate'] = date("Y-m-d", strtotime($this->input->post('FromDate')));
        $data['ToDate'] = date("Y-m-d", strtotime($this->input->post('ToDate')));
        return $data;
    }


}

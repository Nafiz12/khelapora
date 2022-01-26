<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_mark_sheets extends MY_Controller {

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
        $data['headline'] = 'Mark Sheet';
        $data['title'] = 'Mark Sheet';
        $parent_data=$this->session->userdata('system.parent');
        if(empty($parent_data) && !isset($parent_data)){
            $this->layout->view('reports/report_mark_sheets/index', $data);
        }else{
            $student_info = $this->Student->read($parent_data['StudentId']);
            $data['row']['StudentId'] = $student_info->StudentId;
            $data['row']['ClassId'] = $student_info->ClassId;
            $data['row']['SectionId'] = $student_info->SectionId;
            $this->layout->view('reports/report_mark_sheets/index_for_parents', $data);
        }
    }
    function ajax_get_mark_sheet() {
        $data = $this->_get_posted_data();
        $data['headline'] = 'Tabulation Sheet';
        $data['title'] = 'Tabulation Sheet';
        $cond['BranchId']=  $this->get_location_id();
        $data['exam_list']=$this->Exam->get_exam_list($cond['BranchId']);
        $data['class_info'] = $this->Config_class->read($data['ClassId']);
        $data['section_info'] = $this->Config_section->read($data['SectionId']);
        $data['subject_list'] = $this->Config_subject->get_subject_list($data['BranchId']);
        $data['student_info'] = $this->Student->read($data['StudentId']);

        $data['mark_sheet_data']= $this->Manage_mark->get_mark_sheet_data($data);
        $data['mark_sheet_exam_wise_total_data']= $this->Manage_mark->get_mark_sheet_exam_wise_total_data($data);
        $data['organization_info'] = $this->Organization->read(1);
        $this->layout->view('reports/report_mark_sheets/mark_sheet', $data);
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
        $data['section_list']=$this->Config_section->get_list();

        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data = array();
        $data['StudentId'] = $this->input->post('StudentId');
        $data['BranchId'] = $this->input->post('BranchId');
        $data['ClassId'] = $this->input->post('ClassId');
        $data['SectionId'] = $this->input->post('SectionId');
        $data['FromDate'] = date("Y-m-d", strtotime($this->input->post('FromDate')));
        $data['ToDate'] = date("Y-m-d", strtotime($this->input->post('ToDate')));
        return $data;
    }


}

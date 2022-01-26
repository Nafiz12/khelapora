<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admit_cards extends MY_Controller {

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
        $data['headline'] = 'Admit Card';
        $data['title'] = 'Admit Card';
        $cond['BranchId']=  $this->get_location_id();
        $data['exam_list']=$this->Exam->get_list($cond['BranchId']);
        $this->layout->view('admit_cards/index', $data);
    }
    function ajax_get_admit_card() {
        $data = $this->_get_posted_data();
        $data['headline'] = 'Admit Card';
        $data['title'] = 'Admit Card';
        $data['exam_info']=$this->Exam->read($data['ExamId']);
        $data['class_info'] = $this->Config_class->read($data['ClassId']);
        $data['section_info'] = $this->Config_section->read($data['SectionId']);
        $data['subject_list'] = $this->Config_subject->get_subject_list();
        $data['student_info'] = $this->Student->read($data['StudentId']);
        $data['organization_info'] = $this->Organization->read(1);
        $this->layout->view('admit_cards/admit_card', $data);
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
        $data['ExamId'] = $this->input->post('ExamId');
        return $data;
    }


}

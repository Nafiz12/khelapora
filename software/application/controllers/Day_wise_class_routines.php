<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Day_wise_class_routines extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model(array('Config_class_period','Config_class','Config_section','Organization','Config_class_routine','Config_subject','Student','Branch','Employee'), '', TRUE);
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data = $this->_load_combo_data();
        $data['headline'] = 'Class Routine';
        $data['title'] = 'Class Routine';
        $this->layout->view('reports/day_wise_class_routines/index', $data);
    }
    function ajax_get_class_routine() {
        $data = $this->_load_combo_data();
        $posted_data = $this->_get_posted_data();
        $section_list = $this->Config_section->get_section_list($posted_data['ClassId']);

        $data['headline'] = 'Class Routine';
        $data['title'] = 'Class Routine';
        $data['organization_info'] = $this->Organization->read(1);
        array_shift($data['day_list']);
        $data['period_list']=$this->Config_class_period->get_period_list_by_shift($posted_data['Shift']);
        $data['section_list']=$section_list;
        $data['posted_data']=$posted_data;

        $data['class_info'] = $this->Config_class->read($posted_data['ClassId']);

        $data['routine_info'] = $this->Config_class_routine->get_routine_information_by_class_day($posted_data);
        $this->layout->view('reports/day_wise_class_routines/day_wise_view', $data);
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
        $cond['BranchId']=  $this->get_location_id();
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['subject_list']=$this->Config_subject->get_list();
        $data['employee_list']=$this->Employee->get_teacher_list($cond['BranchId']);
        $data['shift_list']=$this->get_shift();
        $data['medium_list']=$this->get_medium();

        $day_list = array();
        $day_list[''] = 'Select Day';
        $day_list['SAT'] = 'Saturday';
        $day_list['SUN'] = 'Sunday';
        $day_list['MON'] = 'Monday';
        $day_list['TUE'] = 'Tuesday';
        $day_list['WED'] = 'Wednesday';
        $day_list['THU'] = 'Thursday';

        $data['day_list']=$day_list;
        $data['period_list']=$this->Config_class_period->get_list();
        return $data;
    }

    function _get_posted_data() {
        $data = array();
        $data['BranchId'] = $this->input->post('BranchId');
        $data['ClassId'] = $this->input->post('ClassId');
        $data['Day'] = $this->input->post('Day');
        $data['Shift'] = $this->input->post('Shift');
        return $data;
    }


}

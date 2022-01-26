<?php
class Admin_actions extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Student','Config_class','Config_section','Organization','Student_parent','User','Dormitory','Student_dormitory','Branch','Config_general'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function update_student_code()
    {
        if($this->Student->update_student_code()){
            $this->session->set_flashdata('success', 'Data is successfully saved');
            redirect('students/index', 'refresh');
        }
    }
}
?>
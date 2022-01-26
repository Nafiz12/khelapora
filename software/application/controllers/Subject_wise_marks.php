<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_wise_marks extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model(array('Config_class','Config_subject','Config_section','Subject_wise_mark','Config_subject','Organization','Branch'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }


public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        if(empty($session_data)){
            $session_data['BranchId']=  $this->get_location_id();
        }
        if (is_array($session_data)) {
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
            $cond['ClassId'] = isset($session_data['cbo_class']) ? $session_data['cbo_class'] : '';
        }


        $this->load->library('pagination');
        $total = $this->Subject_wise_mark->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/subject_wise_marks/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


        $data=$this->_load_combo_data();
        $data['list'] = $this->Subject_wise_mark->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'Subject Wise Marks';
        $data['title'] = 'Subject Wise Marks';
        // echo "<pre>";print_r($data);die;
        $this->layout->view('subject_wise_marks/index',$data);
    }

    public function add()
    {
        if ($_POST) {
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
//            echo "dd<pre>";print_r($_POST);
//            $admin_id = $this->session->userdata('user_id');
            if ($this->form_validation->run() == TRUE) {

//                echo "ss<pre>";print_r($config_data);die;

                if ($this->Subject_wise_mark->add($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('subject_wise_marks/index', 'refresh');
                } else {
                    $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                    redirect('subject_wise_marks/add', 'refresh');
                }

            } else {
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('subject_wise_marks/index', 'refresh');
            }
        } else {
        $data=$this->_load_combo_data();
        $data['headline'] = 'Add SubjectWise Mark';
        $data['title'] = 'Add SubjectWise Mark';
        $this->layout->view('subject_wise_marks/add',$data);

        }

    }

    public function edit($id = null)
    {
        if ($_POST) {
            $id = $this->input->post('SubMarkId');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run() == TRUE) {
            $data['SubMarkId'] = $this->input->post('SubMarkId');
                if ($this->Subject_wise_mark->edit($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('subject_wise_marks/index', 'refresh');
                } else {
                    $data['row'] = $this->Subject_wise_mark->read($id);
                }

            }
        } else {
        $data=$this->_load_combo_data();
        $data['row'] = $this->Subject_wise_mark->read($id);
        $data['headline'] = 'Edit SubjectWise Mark';
        $data['title'] = 'Edit SubjectWise Mark';
           // echo "<pre>";print_r($data);die;
        $this->layout->view('subject_wise_marks/add',$data);

            }
        }






    public function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ClassId', 'ClassId', 'trim|required');
        $this->form_validation->set_rules('SubjectId', 'SubjectId', 'trim|required');
        $this->form_validation->set_rules('TotalMark', 'TotalMark', 'trim|required');
        $this->form_validation->set_rules('PassMark', 'PassMark', 'trim|required');
        $this->form_validation->set_rules('SubMark', 'SubMark', 'trim|required');
        $this->form_validation->set_rules('ObjMark', 'ObjMark', 'trim|required');
        $this->form_validation->set_rules('PraMark', 'PraMark', 'trim|required');


    }

     public function _get_posted_data() {
        $data = array();
        
        $data['BranchId'] = $this->input->post('BranchId');
        $data['ClassId'] = $this->input->post('ClassId');
        $data['SubjectId'] = $this->input->post('SubjectId');
        $data['TotalMark'] = $this->input->post('TotalMark');
        $data['PassMark'] = $this->input->post('PassMark');
        $data['SubMark'] = $this->input->post('SubMark');
        $data['ObjMark'] = $this->input->post('ObjMark');
        $data['PraMark'] = $this->input->post('PraMark');
        return $data;
    }

    public function delete($id)
    {
        if (empty($id)) {
            redirect('subject_wise_marks/index/', 'refresh');
        } else {
           
            if ($this->Subject_wise_mark->delete($id) == true) {
            
                redirect('subject_wise_marks/index/', 'refresh');
            }
        }
    }

    function ajax_for_get_section_list_by_class() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class = $this->input->post('class');
        $callback_message['status'] = 'failure';
        if (empty($class)) {
            $callback_message['message'] = 'Select a Class';
        } else {
            $section_info = $this->Config_section->get_section_list($class);
            foreach ($section_info as $row) {
                $callback_message['status'] = 'success';
                $callback_message['id'][] = $row['id'];
                $callback_message['section_name'][] = $row['section_name'];
            }
        }
        echo json_encode($callback_message);

    }




        public function _load_combo_data() {
        $data = array();
        $cond['BranchId']=  $this->get_location_id();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['subject_list']=$this->Config_subject->get_list(null,null,$cond);
        $data['branch_list']=$this->Branch->get_all_location_list();

        $data['section_list']=$this->Config_section->get_list();

        

        return $data;
    }



}

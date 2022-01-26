<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_designations extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model('Employee_designation');

    }


    public function add()
    {
        if (!empty($_POST)) {
            $this->prepare_validation();
            $admin_id = $this->session->userdata('user_id');
            if ($this->form_validation->run() == TRUE) {
                $designation_data = array(
                    'designation_name' => $this->input->post('designation_name'),

                );
                if ($this->Employee_designation->add($designation_data)) {
                    $this->session->set_flashdata('success_message', ADD_MESSAGE);

                    redirect('index.php/Employee_designations/add');
                } else {
                    $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                    redirect('index.php/Employee_designations/add');
                }

            } else {
                $data['title'] = "Manage Employee Designation";
                $data['headline'] = "Employee Designation";
                $this->layout->view('Employee_designations/add');
            }
        } else {
            $data['title'] = "Manage Employee Designation";
            $data['headline'] = "Employee Designation";
            $data['designation_list'] = $this->Employee_designation->get_designation_list();
           // $data['menu_list'] = $this->Manage_menu->get_menu_list();
            $this->layout->view('Employee_designations/add', $data);
        }

    }

    public function edit($id = null)
    {
        if ($_POST) {

            $designation_id = $_POST['designation_id'];
            //echo "<pre>";print_r($class_id);die;
            $this->prepare_validation();
            if ($this->form_validation->run() == TRUE) {
                $designation_editable_data = array(

                    'designation_name' => $this->input->post('designation_name'),

                );
                $this->Employee_designation->edit($designation_editable_data, $designation_id);
                $this->session->set_flashdata('success_message', EDIT_MESSAGE);

                redirect('index.php/Employee_designations/add');
            } else {
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('index.php/Employee_designations/add');
            }

        } else {
            $data['title'] = "Manage Employee Designation";
            $data['headline'] = "Employee Designation";

            $data['row'] = $this->Employee_designation->get_designation_data($id);
            $data['designation_list'] = $this->Employee_designation->get_designation_list();
            $this->layout->view('Employee_designations/add', $data);
        }

    }

    public function add_submenu($id = null)
    {
        if (!empty($_POST)) {
            // $this->prepare_validation();
            $admin_id = $this->session->userdata('user_id');
            $menu_data = array(
                'menu_id' => $this->input->post('menu'),
                'submenu_name' => $this->input->post('sub_menu'),
                'created_on' => date("Y-m-d H:i:s"),
                'created_by' => $admin_id,
                'updated_on' => '',
                'updated_by' => ''
            );
            if ($this->Manage_menu->add_submenu_data($menu_data)) {
                $this->session->set_flashdata('success_message', ADD_MESSAGE);

                redirect('index.php/Manage_menus/add');
            } else {
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('index.php/Manage_menus/add');
            }

        } else {
            $data['row_combo'] = $this->Manage_menu->get_menu_combo_data($id);
            $data['row'] = $this->Manage_menu->get_menu_data($id);
            $data['menu_list'] = $this->Manage_menu->get_menu_list();
            $this->layout->view('Manage_menus/add', $data);
        }

    }


    private function prepare_validation()
    {

        $this->form_validation->set_rules('designation_name', 'Designation Name', 'trim|required');

    }

    public function delete($id)
    {
        $this->Employee_designation->delete($id);
        $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        redirect('index.php/Employee_designations/add');
    }


}

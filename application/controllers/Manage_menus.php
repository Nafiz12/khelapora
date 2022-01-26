<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_menus extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model('Manage_menu');

    }

    public function index()
    {
        $data['menu_list'] = $this->Manage_menu->get_menu_list_for_index();

       //echo "<pre>";print_r($data);die;
         $this->layout->view('Manage_menus/index',$data);
    }

    public function add()
    {
        if (!empty($_POST)) {
            $this->prepare_validation();
            $admin_id = $this->session->userdata('user_id');
            if ($this->form_validation->run() == TRUE) {
                $menu_data = array(
                    'menu_name' => $this->input->post('menu'),
                    'created_on' => date("Y-m-d H:i:s"),
                    'created_by' => $admin_id,
                    'updated_on' => '',
                    'updated_by' => ''
                );
                if ($this->Manage_menu->add($menu_data)) {
                    $this->session->set_flashdata('success_message', ADD_MESSAGE);

                    redirect('index.php/Manage_menus/add');
                } else {
                    $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                    redirect('index.php/Manage_menus/add');
                }

            } else {
                 $this->layout->view('Manage_menus/add');
            }
        } else {
            $data['menu_list'] = $this->Manage_menu->get_menu_list_for_index();
           // $data['menu_list'] = $this->Manage_menu->get_menu_list();
             $this->layout->view('Manage_menus/add', $data);
        }

    }

    public function edit($id = null)
    {
        if ($_POST) {

            $menu_id = $_POST['menu_id'];

            $admin_id = $this->session->userdata('user_id');
            $this->prepare_validation();
            if ($this->form_validation->run() == TRUE) {
                $menu_editable_data = array(

                    'menu_name' => $this->input->post('menu'),
                    'updated_on' => date("Y-m-d H:i:s"),
                    'updated_by' => $admin_id

                );
                $this->Manage_menu->edit($menu_editable_data, $menu_id);
                $this->session->set_flashdata('success_message', EDIT_MESSAGE);

                redirect('index.php/Manage_menus/add');
            } else {
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('index.php/Manage_menus/add');
            }

        } else {

            $data['row'] = $this->Manage_menu->get_menu_data($id);
            $data['menu_list'] = $this->Manage_menu->get_menu_list();
             $this->layout->view('Manage_menus/add', $data);
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

        $this->form_validation->set_rules('menu', 'Menu', 'trim|required|min_length[3]');

    }

    public function delete($id)
    {
        $this->Manage_menu->delete($id);
        $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        redirect('index.php/Manage_menus/add');
    }


}

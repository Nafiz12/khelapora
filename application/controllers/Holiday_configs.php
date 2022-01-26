<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday_configs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model('Holiday_config');

    }


    public function add()
    {
        if (!empty($_POST)) {
            $this->prepare_validation();
            $admin_id = $this->session->userdata('user_id');
            if ($this->form_validation->run() == TRUE) {
                $holiday_data = array(
                    'holiday_name' => $this->input->post('holiday_name'),
                    'date_from' => $this->input->post('date_from'),
                    'date_to' => $this->input->post('date_to'),
                    'occation' => $this->input->post('occation'),

                );
               
                if ($this->Holiday_config->add($holiday_data)) {
                    $this->session->set_flashdata('success_message', ADD_MESSAGE);

                    redirect('index.php/Holiday_configs/add');
                } else {
                    $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                    redirect('index.php/Holiday_configs/add');
                }

            } else {
                 $this->layout->view('Holiday_configs/add');
            }
        } else {
            $data['holiday_list'] = $this->Holiday_config->get_holiday_list();
             $this->layout->view('Holiday_configs/add', $data);
        }

    }

    public function edit($id = null)
    {
        if ($_POST) {

            $holiday_id = $_POST['holiday_id'];
            $this->prepare_validation();
            if ($this->form_validation->run() == TRUE) {
                $holiday_data = array(
                    'holiday_name' => $this->input->post('holiday_name'),
                    'date_from' => $this->input->post('date_from'),
                    'date_to' => $this->input->post('date_to'),
                    'occation' => $this->input->post('occation'),

                );

                $this->Holiday_config->edit($holiday_data, $holiday_id);
                $this->session->set_flashdata('success_message', EDIT_MESSAGE);

                redirect('index.php/Holiday_configs/add');
            } else {
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('index.php/Holiday_configs/add');
            }

        } else {
            $data['holiday_list'] = $this->Holiday_config->get_holiday_list();
            $data['row'] = $this->Holiday_config->get_holiday_data($id);
             $this->layout->view('Holiday_configs/add', $data);
        }

    }



    private function prepare_validation()
    {

        $this->form_validation->set_rules('holiday_name', 'Holiday Name', 'trim|required');
        $this->form_validation->set_rules('occation', 'Holiday Occation', 'trim|required');

    }

    public function delete($id)
    {
        $this->Holiday_config->delete($id);
        $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        redirect('index.php/Holiday_configs/add');
    }


}

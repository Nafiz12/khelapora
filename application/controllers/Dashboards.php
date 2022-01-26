<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        if (($this->session->userdata('user_id')) == '') {
            redirect('index.php/Logins/index');
        }

        $this->load->model(array('Dashboard'), '', TRUE);


    }

    public function index()
    {

            $this->layout->view('Dashboards/index');
        

    }

    public function data(){
        echo json_encode($this->Dashboard->get_data_for_graph());
    }











}

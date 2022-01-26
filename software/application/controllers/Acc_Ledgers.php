<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acc_Ledgers extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(array('AccLedger'), '', TRUE);
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data['headline'] = 'List Of AccLedgers';
        $data['title'] = 'AccLedger List';
        $data['results'] = $this->AccLedger->get_list();
        //echo"<pre>"; print_r($data); die;
        $this->layout->view('categories/index', $data);
    }

    function add() {
        $data = array();
        if ($_POST) {
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            //echo"<pre>"; print_r($data); die;
            if ($this->form_validation->run()) {
                $data['CategoryId'] = NULL;
                if ($this->AccLedger->add($data)) {
                    $this->session->set_flashdata('success', 'Data has been added successfully');
                    redirect('categories/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'AccLedger Information';
        $data['title'] = 'AccLedger Entry';
        $this->layout->view('categories/save', $data);
    }

    function edit($id = null) {
        $data = array();
        if ($_POST) {
            $id = $this->input->post('txt_category_id');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['CategoryId'] = $this->input->post('txt_category_id');
                if ($this->AccLedger->edit($data)) {
                    $this->session->set_flashdata('message', 'Data has been updated successfully');
                    redirect('categories/add', 'refresh');
                }
            }
        }
        $data['headline'] = 'Edit AccLedger';
        $data['title'] = 'Edit AccLedger Entry';
        $data['row'] = $this->AccLedger->read($id);
        //echo "<pre>";print_r($data['row']);
        $this->layout->view('categories/save', $data);
    }
    function delete($id = null) {
        if (empty($id)) {
            //$this->session->set_flashdata('warning','Location ID is not provided');
            redirect('customers/index/', 'refresh');
        } else {
            $row = $this->AccLedger->read($id);
            //echo "<pre>";print_r($row);die;
            if ($this->AccLedger->delete($id) == true) {
                //$this->session->set_flashdata('message',DELETE_MESSAGE);
                redirect('categories/index/', 'refresh');
            }
        }
    }

    function _get_posted_data() {
        $data = array();
        $data['CategoryName'] = $this->input->post('txt_category_name');
        $data['CategoryDescription'] = $this->input->post('txt_category_description');
        return $data;
    }

    function _prepare_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div>&nbsp;</div><div></div><font color="#FF0000">', '</font></div>');
        $this->form_validation->set_rules('txt_category_name','Name','trim|required');
    }

}

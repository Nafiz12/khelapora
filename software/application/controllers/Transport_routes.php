<?php
class Transport_routes extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Transport_route'));
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('security');
    }
    function index() {
        $data = array();
        $data['headline'] = 'List Of Routes';
        $data['title'] = 'Routes List';
        $data['results'] = $this->Transport_route->get_list();
        //echo"<pre>"; print_r($data); die;
        $this->layout->view('transport_routes/index', $data);
    }

    function add() {
        $data = array();
        if ($_POST) {
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            //echo"<pre>"; print_r($data); die;
            if ($this->form_validation->run()) {
                $data['RouteId'] = NULL;
                if ($this->Transport_route->add($data)) {
                    $this->session->set_flashdata('success', 'Data has been added successfully');
                    redirect('transport_routes/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Routes Information';
        $data['title'] = ' Add New Routes';
        $this->layout->view('transport_routes/add', $data);
    }
    
    function edit($id = null) {
        $data = array();
        if ($_POST) {
            $id = $this->input->post('RouteId');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['RouteId'] = $this->input->post('RouteId');
                if ($this->Transport_route->edit($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('transport_routes/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Edit Routes';
        $data['title'] = 'Edit Routes Entry';
        $data['row'] = $this->Transport_route->read($id);
        //echo "<pre>";print_r($data['row']);
        $this->layout->view('transport_routes/add', $data);
    }
    function delete($id = null) {
        if (empty($id)) {
            //$this->session->set_flashdata('warning','Location ID is not provided');
            redirect('customers/index/', 'refresh');
        } else {
            $row = $this->Transport_route->read($id);
            //echo "<pre>";print_r($row);die;
            if ($this->Transport_route->delete($id) == true) {
                //$this->session->set_flashdata('success',DELETE_MESSAGE);
                redirect('transport_routes/index/', 'refresh');
            }
        }
    }

    function _get_posted_data() {
        $data = array();
        $data['RouteName'] = $this->input->post('RouteName');
        return $data;
    }

    function _prepare_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('RouteName', 'Routes Name', 'trim|required|max_length[200]|xss_clean');
    }

}
?>
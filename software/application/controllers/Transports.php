<?php
class Transports extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Transport','Transport_route'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        if (is_array($session_data)) {
            $cond['TransportName'] = isset($session_data['TransportName']) ? $session_data['TransportName'] : '';
            $cond['RouteId'] = isset($session_data['RouteId']) ? $session_data['RouteId'] : '';
            $cond['TransportNumber'] = isset($session_data['TransportNumber']) ? $session_data['TransportNumber'] : '';
        }

        $this->load->library('pagination');
        $total = $this->Transport->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/transports/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);

        $data=$this->_load_combo_data();

        $data['list'] = $this->Transport->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'Transport';
        $data['title'] = 'Transport';
        //echo "<pre>";print_r($data);die;
        $this->layout->view('transports/index',$data);
    }
    function add(){

        if($_POST)
        {
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $result=$this->Transport->add($data['row']);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Data is successfully saved');
                    redirect('transports/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['headline'] = 'Transport';
        $data['title'] = 'Transport';
        $this->layout->view('transports/add',$data);
    }

    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('transports/index', 'refresh');
        }
        $result=$this->Transport->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('transports/index', 'refresh');
        }
    }
    function edit($id = null){
        if($_POST)
        {
            $id = $this->input->post('TransportId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['TransportId'] = $this->input->post('TransportId');
                if ($this->Transport->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('transports/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['row']=$this->Transport->read($id);
        $data['headline'] = 'Edit Transport';
        $data['title'] = 'Edit Transport';
        $this->layout->view('transports/add',$data);
    }

    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('TransportName','Name','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['TransportName']=$this->input->post('TransportName');
        $data['TransportNumber']=$this->input->post('TransportNumber');
        $data['RouteId']=$this->input->post('RouteId');
        $data['Capacity']=$this->input->post('Capacity');
        $data['Type']=$this->input->post('Type');
        return $data;
    }
    function _load_combo_data() {
        $data = array();
        $data['route_list'] = $this->Transport_route->get_route_list();
        $type_list['S'] = "Student";
        $type_list['E'] = "Employee";
        $data['type_list'] = $type_list;
        return $data;
    }
}
?>
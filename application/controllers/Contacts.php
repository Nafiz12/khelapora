<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model(array('Welcome', 'News_event','Achievement','Organization_configuration'), '', TRUE);

    }

	public function index()
	{
        $data['config_list'] = $this->Welcome->show_config_list();
          $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
		$this->load->view('Contacts/index',$data);
	}
}

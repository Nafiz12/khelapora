<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Layout
{	
	private $CI;
    function view($view,$datas=null)
    {
    	$data['view']=$view;
		$data['content']=$datas;
    	//generate menu
    	$this->CI =& get_instance();
       	$this->CI->load->library('user_role_wise_privilliages');
		$menu_data=$this->CI->user_role_wise_privilliages->generate_menu_data();
		//echo "<pre>"; print_r($menu_data);

		$CI =& get_instance();
		$CI->load->library('session');
		$role_id=$CI->session->userdata('role_id');

        $branch_info = $CI->session->userdata('system.branch');
		$CI =& get_instance();
		$CI->load->library('Session');
		$this->CI =& get_instance();
       	$this->CI->load->database();
		$q=$CI->db->query(" select controller,action from user_role_wise_privileges where role_id='$role_id'  ")->result();
		$dat=array();
		foreach($q as $r)
		{
			$dat[$r->controller][$r->action]=1;
		}
		//echo "<pre>"; print_r($dat); die;

		$menu=array();
		foreach($menu_data as $group_name=>$r1)
		{
			foreach($r1 as $controller=>$r)
			{
				foreach($r as $fnction=>$r2)
				{
					if(!isset($dat[$controller][$fnction]))
					{
						unset($menu_data[$group_name][$controller][$fnction]);
					}
				}
			}
		}
		//end menu

		$data['menu_data']=$menu_data;
		$data['branch_info']=$branch_info;

		$this->obj =& get_instance();
		//$this->obj->load->view('template/header',$data);
		//$this->obj->load->view($view,$data);
		$this->obj->load->view('template/template',$data);
    }
}

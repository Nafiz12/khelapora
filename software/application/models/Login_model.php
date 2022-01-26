<?php
class login_model extends CI_Model{
	function admin_validate(){
		$id=$_POST['username'];
		$this->db->where('user_name',$id);
		$this->db->where('status','1');
		$this->db->where('password',md5($this->input->post('password')));
		
		$query=$this->db->get('user');
		
		if($query->num_rows()==1)
		{
			return TRUE;
		}
		else{
			return false;
		}	
	}
}
?>

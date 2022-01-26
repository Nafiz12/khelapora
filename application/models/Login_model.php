<?php
class login_model extends CI_Model{
	function admin_validate(){
		$id=$_POST['username'];
		$this->db->where('user_name',$id);
		$this->db->where('status','1');
		$this->db->where('password',md5($this->input->post('password')));
		
		$query=$this->db->get('user');
//		echo "<pre>";print_r($query);die;
		if($query->num_rows()==1)
		{
			return TRUE;
		}
		else{
			return false;
		}	
	}


//    public function logout($user_id){
//        $update_logout_time = array('logout_time' => date("Y-m-d H:i:s"),'active' => 0);
//        $this->db->where('id',$user_id);
//        $this->db->update('admin',$update_logout_time);
//        if($this->db->affected_rows()==1)
//        {
//            $this->session->unset_userdata('username');
//            $this->session->unset_userdata('user_id');
//            $this->session->sess_destroy();
//            return TRUE;
//
//        }
//    }

}
?>

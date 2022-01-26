<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  session
 */
class Login extends CI_Model
{

    /**
     * @param $login_data
     * @return bool
     */
    public function check_admin_login($login_data)
    {
//       echo "<pre>";print_r($login_data);die;
        $query = $this->db->get_where('admin', $login_data);
        if ($query->num_rows() > 0) {

            $update_login_time = array('login_time' => date("Y-m-d H:i:s"), 'active' => 1);
//            echo "<pre>";print_r($query->row()->id);die;
            $this->db->where('id', $query->row()->id);
            $this->db->update('admin', $update_login_time);
            if ($this->db->affected_rows() == 1) {
                $session_data = array(
                    'username' => $query->row()->username,
                    'user_id' => $query->row()->id,
                    'image' => $query->row()->image,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($session_data);
                return TRUE;
            } else {
                return FALSE;
            }


        } else {
            return FALSE;
        }

    }

    public function logout($user_id){
        $update_logout_time = array('logout_time' => date("Y-m-d H:i:s"),'active' => 0);
        $this->db->where('id',$user_id);
        $this->db->update('admin',$update_logout_time);
        if($this->db->affected_rows()==1)
        {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('user_id');
            $this->session->sess_destroy();
            return TRUE;

        }
    }


}

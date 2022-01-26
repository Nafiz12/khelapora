<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  session
 */
class Change_password extends CI_Model
{

    /**
     * @param $login_data
     * @return bool
     */
    public function change_admin_password($admin_data,$admin_id,$old_password)
    {
//       echo "<pre>";print_r($login_data);die;
        return $this->db->update('admin', $admin_data, array('id' => $admin_id,'password' =>$old_password));

    }



}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  session
 */
class Notice_board extends CI_Model
{

    /**
     * @param $login_data
     * @return bool
     */
    public function add($admin_data)
    {
        $query = $this->db->insert('notice_board', $admin_data);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    public function show_notice_list()
    {
        $query = $this->db->get('notice_board');
        $results = $query->result();
        return $results;
    }

    public function get_notice_data($id){
        $data = array('id' =>$id);
        $query = $this->db->get_where('notice_board',$data);
        return $query->row();

    }

    public function edit($admin_data,$notice_id){

        return $this->db->update('notice_board', $admin_data, array('id' => $notice_id));
    }

    public function delete($id){
        return $this->db->delete('notice_board', array('id' => $id));
    }

}

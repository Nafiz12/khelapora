<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  session
 */
class Create_notice extends CI_Model
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
    public function get_holiday_list()
    {
        $query = $this->db->get('holiday_configs');
        $results = $query->result();
        return $results;
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

    public function get_date_data($holiday_id)
    {

        $query = $this->db->query("SELECT holiday_configs.date_from,holiday_configs.date_to,holiday_configs.id FROM holiday_configs 
        WHERE holiday_configs.id = $holiday_id ")->result_array();

        //echo $this->db->last_query();die;
        return $query;
    }

}

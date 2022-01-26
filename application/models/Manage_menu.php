<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_menu extends CI_Model
{

    public function get_menu_list()
    {
        $query = $this->db->get('main_menu');
        $results = $query->result();
        return $results;
    }

    public function add($menu_data)
    {
        $query = $this->db->insert('main_menu', $menu_data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function add_submenu_data($menu_data)
    {
        $query = $this->db->insert('submenu', $menu_data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function get_menu_data($id)
    {
        $data = array('id' => $id);
        $query = $this->db->get_where('main_menu', $data);
        return $query->row();

    }

    public function edit($menu_editable_data, $menu_id)
    {

        return $this->db->update('main_menu', $menu_editable_data, array('id' => $menu_id));
    }

    public function delete($id)
    {
        return $this->db->delete('main_menu', array('id' => $id));
    }

    function get_menu_combo_data($id = null)
    {
        $this->db->select('id AS id, menu_name AS menu_name');
        $this->db->order_by('id', 'ASC');
        $menu_info = $this->db->get_where('main_menu', array('id' => $id))->result();
        return $menu_info;

    }

    public function get_menu_list_for_index()
    {
        $query = $this->db->query("SELECT `main_menu`.`id`,`main_menu`.`menu_name`, `submenu`.`submenu_name` FROM `main_menu` JOIN `submenu`
                  ON `main_menu`.`id`=`submenu`.`menu_id` ")->result_array();
        $prepare_data  = array();
        $i=0;
        foreach ($query as $key=>$row){
            $prepare_data[$row['menu_name']][$i]['id'] = $row['id'];
            $prepare_data[$row['menu_name']][$i]['submenu_name'] = $row['submenu_name'];
            $i++;
        }

        return $prepare_data;


    }


}

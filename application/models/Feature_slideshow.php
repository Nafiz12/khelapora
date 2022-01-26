<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  session
 */
class Feature_slideshow extends CI_Model
{

    /**
     * @param $login_data
     * @return bool
     */
    public function add($admin_data)
    {
        $query = $this->db->insert('feature_slideshow', $admin_data);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    public function show_slideshow_list()
    {
        $query = $this->db->get('feature_slideshow');

        $results = $query->result();

        return $results;
    }

    public function get_slideshow_data($id){
        $data = array('id' =>$id);
        $query = $this->db->get_where('feature_slideshow',$data);
        return $query->row();

    }

    public function edit($admin_data,$slideshow_id){

        return $this->db->update('feature_slideshow', $admin_data, array('id' => $slideshow_id));
    }


    public function delete($id,$name){
        if( is_readable("lib/images/".$name) && unlink("lib/images/".$name))
       {
            return $this->db->delete('feature_slideshow', array('id' => $id));
        }else{
            return null;
        }

    }

}

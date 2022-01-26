<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_configuration extends CI_Model
{

   public function show_config_list()
   {
       $query = $this->db->get('organization_configuration');
       $results = $query->result();
       return $results;
   }

   public function add($config_data)
   {
       $query = $this->db->insert('organization_configuration',$config_data);
       if($query){
           return true;
       }
       else{
           return false;
       }
   }

    function read() {
        return $this->db->get_where('organization_configuration')->row();
    }

   public function get_config_data($id){
       $data = array('id' =>$id);
       $query = $this->db->get_where('organization_configuration',$data);
       return $query->row();

   }

   public function edit($config_data,$config_id){

       return $this->db->update('organization_configuration', $config_data, array('id' => $config_id));
   }

    public function delete($id){

        $name= $this->get_image_path($id);
      
        if( is_readable($name[0]->image) && unlink($name[0]->image))
        {
            return $this->db->delete('organization_configuration', array('id' => $id));
        }else{
            return null;
        }

    }


    public function show_important_link_list(){
      $query = $this->db->query("SELECT * FROM imp_links")->result_array();
      return $query;
    }

    public function get_link_data($id){
      $query = $this->db->query("SELECT * FROM imp_links WHERE id = $id")->result();
      return $query;
    }

    public function get_image_path($id){
        $query = $this->db->query("SELECT image FROM organization_configuration WHERE id = $id")->result();
        return $query;
      }

    public function edit_links($link_data,$link_id){

       return $this->db->update('imp_links', $link_data, array('id' => $link_id));
   }





}

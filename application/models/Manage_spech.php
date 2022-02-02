<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_spech extends CI_Model
{

   public function show_spech_list()
   {
       $query = $this->db->get('manage_spech');
       $results = $query->result();
       return $results;
   }

   public function add($spech_data)
   {
       $query = $this->db->insert('manage_spech',$spech_data);
       if($query){
           return true;
       }
       else{
           return false;
       }
   }

   public function get_spech_data($id){
       $data = array('id' =>$id);
       $query = $this->db->get_where('manage_spech ',$data);
       return $query->row();

   }

   public function edit($spech_data,$spech_id){

       return $this->db->update('manage_spech', $spech_data, array('id' => $spech_id));
   }

    public function delete($id){
        $name= $this->get_image_path($id);
      
        if( is_readable($name[0]->image) && unlink($name[0]->image))
        {
            return $this->db->delete('manage_spech', array('id' => $id));
        }else{
            return null;
        }

       

    }



 public function get_image_path($id){
            $query = $this->db->query("SELECT image FROM manage_spech WHERE id = $id")->result();
            return $query;
          }




}

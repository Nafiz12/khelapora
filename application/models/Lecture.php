<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends CI_Model
{
  function __construct(){
        parent::__construct();
            //load our second db and put in $db2

        $this->db2 = $this->load->database('another_db', TRUE);
    }

 
      function get_subject_list()
    {
        
        $this->db2->select('config_subjects.*');
        $this->db2->from('config_subjects');
        $this->db2->order_by('SubjectId', 'DESC');
        return $this->db2->get()->result_array();

    }


   public function show_lectures_list()
   {
       $query = $this->db->get('lectures');
       $results = $query->result();
       return $results;
   } 

   public function show_lectures_list_for_website()
   {

    $query = $this->db->query("SELECT emsbdcom_website.lectures.*,emsbdcom_coaching.config_subjects.* 
    FROM emsbdcom_website.lectures JOIN emsbdcom_coaching.config_subjects 
    ON emsbdcom_website.lectures.SubjectId = emsbdcom_coaching.config_subjects.SubjectId 
    ORDER BY emsbdcom_website.lectures.SubjectId DESC LIMIT 2")->result();

    
       return $query;
   }

   public function add($achievements_data)
   {
       $query = $this->db->insert('lectures',$achievements_data);
       if($query){
           return true;
       }
       else{
           return false;
       }
   }

   public function get_lectures_data($id){
       $data = array('LectureId' =>$id);
       $query = $this->db->get_where('lectures ',$data);
       return $query->row();

   }

   public function edit($achievements_data,$achievements_id){

       return $this->db->update('lectures', $achievements_data, array('LectureId' => $achievements_id));
   }

    public function delete($id,$name){
       
            return $this->db->delete('lectures', array('LectureId' => $id));
        

    }





}

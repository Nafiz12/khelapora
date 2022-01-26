<?php
class Config_section extends CI_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list($branchId=null) {
        if(isset($branchId)){
            $this->db->where('config_sections.BranchId',$branchId);
        }
        $this->db->order_by('SectionId');
        $this->db->select('config_sections.*,config_classes.ClassName');
        $this->db->from('config_sections');
        $this->db->join('config_classes', 'config_sections.ClassId = config_classes.ClassId');
        $query = $this->db->get();
        return $query->result();
    }
    function add($data) {
        $this->db->insert('config_sections', $data);
        return $this->db->insert_id();
    }
    function read($id){
        return $this->db->get_where('config_sections',array('SectionId'=>$id))->row();
    }
    function edit($data){
        //echo"<pre>"; print_r($data); die;
        return $this->db->update('config_sections', $data, array('SectionId'=> $data['SectionId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('config_sections', array('SectionId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_section_list($class_id){
        $condition = "";
        if(!empty($class_id)) {
            $condition = " WHERE ClassId = '$class_id' ";
        }
        $q = "SELECT SectionId,SectionName,SectionCode FROM config_sections $condition";
        $results = $this->db->query($q);
        $results = $results->result_array();
        $samities = array();
        foreach($results as $row){
            $samities[$row['SectionId']]['SectionId'] = $row['SectionId'];
            $samities[$row['SectionId']]['SectionName'] = $row['SectionName'];
            $samities[$row['SectionId']]['SectionCode'] = $row['SectionCode'];
        }
        return $samities;
    }
    function check_for_duplicate_entry($class_id,$section_name){

        $q = "SELECT SectionId
                FROM config_sections
                WHERE config_sections.ClassId=$class_id
                AND config_sections.SectionName = '$section_name'";
        $results = $this->db->query($q);
        $results = $results->row();
        return $results;
    }
}

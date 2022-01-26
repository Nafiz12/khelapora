<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Model
{
    function __construct(){
        parent::__construct();
            //load our second db and put in $db2

        $this->db2 = $this->load->database('another_db', TRUE);
    }

    function get_list($limit = null, $offset = null, $cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db2->where('config_classes.BranchId', $cond['BranchId']);
            }
        }
        $this->db2->select('config_classes.*,branches.BranchName');
        $this->db2->from('config_classes');
        $this->db2->join('branches', 'config_classes.BranchId = branches.BranchId');
        //$this->db->order_by('ClassId', 'DESC');
        $this->db2->order_by('ClassId', 'ASC');
        if (isset($limit) && $limit > 0) {
            $this->db2->limit($limit, $offset);
        }
        return $this->db2->get()->result();
    }



    

    public function get_notice_list()
    {
        $query = $this->db->get('notice_board');
        $results = $query->result();
        return $results;
    }

    public function show_config_list()
    {
        $query = $this->db->get('organization_configuration');
        $results = $query->result();
        return $results;
    }

    public function get_spech_list( $id = null)
    {
        if($id != null){
            $query = $this->db->get_where('manage_spech',array('id' => $id));
        }else{
            $query = $this->db->get('manage_spech');
        }
        $results = $query->result();
        
        return $results;
    }

    public function get_achievement_details( $id = null)
    {
        if($id != null){
            $query = $this->db->get_where('achievements',array('id' => $id));
        }else{
            $query = $this->db->get('achievements');
        }
        $results = $query->result();
        return $results;
    }

    public function show_achievements_list(){
        $query = $this->db->query("SELECT * FROM achievements  ORDER BY id DESC  LIMIT 3")->result();
        return $query;
    }

    public function show_events_list(){
        $query = $this->db->query("SELECT * FROM  news_events WHERE is_welcome_message = 0 LIMIT 4")->result();
        return $query;
    }

    public function get_news_events_details( $id = null)
    {
        if($id != null){
            $query = $this->db->get_where('news_events',array('id' => $id));
        }else{
            $query = $this->db->get_where('news_events',array('is_welcome_message'=>0));
        }
        $results = $query->result();
        return $results;
    }

    public function add($admin_data)
    {
        $query = $this->db->insert('admin',$admin_data);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    function add_student($data)
    {
        //$data['EntryBy']=$this->session->userdata('user_id');
        $data['EntryDate']=date('Y-m-d');
        return $this->db2->insert('students',$data);
    }

function edit_student($data){
        // $sham =  $this->db2->update('students', $data, array('StudentId'=> $data['StudentId']));
        // echo "<pre>";print($this->db->last_query());die;
        return $this->db2->update('students', $data, array('StudentId'=> $data['StudentId']));
    }
    public function get_admin_data($id){
        $data = array('id' =>$id);
        $query = $this->db->get_where('admin',$data);
        return $query->row();

    }

    public function get_slideshow_images(){
        //$results = $this->db->get('feature_slideshow')->result();
        $results = $this->db->query("SELECT * FROM feature_slideshow WHERE for_slideshow = 0 ORDER BY id DESC LIMIT 5")->result();
        // echo "<pre>";print_r($this->db->last_query());die;
        return $results;

    }

    public function edit($admin_data,$admin_id){

        return $this->db->update('admin', $admin_data, array('id' => $admin_id));
    }

    public function delete($id){
        return $this->db->delete('admin', array('id' => $id));
    }

    public function get_spech_details($id){

    }
    public function get_year_list(){
        $query = $this->db->query("SELECT year ,name FROM feature_slideshow WHERE for_slideshow = 1 GROUP BY year")->result_array();
       $get_year = array();
       foreach($query as $key => $row){
           if($row['year']!=0){
            $get_year[$key]['year'] =$row['year'];
            $get_year[$key]['name'] =$row['name'];
           }
           
      }
     // echo "<pre>";print_r($get_year);die;
        return $get_year;
    }

    public function get_gallery_list($id){
        $query = $this->db->query("SELECT DISTINCT(group_id),title,id,name FROM feature_slideshow WHERE for_slideshow = 1  AND year LIKE '%$id%' GROUP BY group_id")->result_array();
        return $query;
    }

    function row_count($cond = ''){
// search
        if (is_array($cond)) {
            if (isset($cond['group_id']) and !empty($cond['group_id'])) {
                $where = "( feature_slideshow.group_id LIKE '%{$cond['group_id']}%')";
                $this->db->where($where);
            }
        }

        return $this->db->count_all_results('feature_slideshow');
    }


    public function row_count_for_notice_events(){
         if(is_array($cond)){
            if(isset($cond['EmployeeDesignation']) and !empty($cond['EmployeeDesignation'])){
                $this->db->where('employees.employee_designation', $cond['EmployeeDesignation']);
            }
        }
        $this->db->select('news_events.*');
        return $this->db->count_all_results('news_events');
    }

    public function get_gallery_wise_image_list($cond = array(), $limit = null, $offset = null){
        return $this->db->select("feature_slideshow.id, feature_slideshow.title, feature_slideshow.name")
        ->order_by('created_on', 'ASC')
        ->like('feature_slideshow.group_id', $cond['group_id'])
        ->get_where('feature_slideshow',  array(), $limit, $offset)
        ->result_array();
    }

    public function course_details($id){
      $query = $this->db->query("SELECT * FROM news_events WHERE is_welcome_message = $id ")->result();
      return $query;
  }

  public function get_last_roll(){
   $query = $this->db2->query("SELECT RollNo FROM students ORDER BY StudentId DESC LIMIT 1")->result();
   return $query; 
}
public function get_branch(){
   $query = $this->db2->query("SELECT * FROM branches ORDER BY BranchId")->result_array();
   return $query;
}
public function get_RegNo(){
   $query = $this->db2->get('user');
   return $query->result(); 
}

public function get_student_roll ($BranchId,$CourseId,$BatchId){
$query = "SELECT RollNo FROM students WHERE students.BranchId=$BranchId AND students.CourseId = $CourseId AND students.BatchId = $BatchId ORDER BY students.RollNo DESC LIMIT 1";
    $results = $this->db2->query($query);
    $results = $results->row();
    $next_roll = 1;
    if(isset($results)){
        $next_roll = $results->RollNo+1;
    }

    return $next_roll;

}


public function get_course_info ($BranchId){
    $query = "SELECT ClassId,ClassName FROM config_classes WHERE config_classes.BranchId=$BranchId ORDER BY config_classes.ClassId DESC ";
    $results = $this->db2->query($query)->result_array();
 
    
    return $results;

}

public function get_batch_info ($BranchId,$CourseId){
    $query = "SELECT BatchId,BatchName,StartTime,EndTime FROM batches WHERE batches.BranchId=$BranchId AND batches.CourseId=$CourseId ORDER BY BatchId DESC ";
    $results = $this->db2->query($query)->result_array();
 
    
    return $results;

}


public function get_student_code ($BranchId,$CourseId,$BatchId){
    $query = "SELECT RollNo FROM students WHERE students.BranchId=$BranchId AND students.CourseId = $CourseId AND students.BatchId = $BatchId ORDER BY students.RollNo DESC LIMIT 1";
    $results = $this->db2->query($query);
    $results = $results->row();
    $next_roll = 1;
    if(isset($results)){
        $next_roll = $results->RollNo+1;
    }

     $student_code = $BranchId.$CourseId.$BatchId.sprintf("%02d", $next_roll);
     return $student_code;


}


function get_new_id($table_name,$column_name){
        $new_id=$this->db2->select($column_name)->order_by($column_name,"DESC")->limit(1)->get($table_name)->row();
        if(empty($new_id)){
            $new_id=1;
        }else{
            $new_id=$new_id->$column_name+1;
        }
        return $new_id;
    }


        function read($orgId,$id) {
        $org_info = $this->db2->get_where('organizations', array('OrganizationId' => $orgId))->row();
        $branch_info = $this->branch_info($id);
        
        $org_info->OrganizationName = $branch_info[0]->BranchName;
        $org_info->OrganizationAddress_1 = $branch_info[0]->BranchAddress;
        $org_info->ContactNumber = $branch_info[0]->ContactNumber;
        $org_info->Org_Logo = $org_info->Logo;
        $org_info->Logo = $branch_info[0]->Logo;
        return $org_info;

    }

    public function branch_info($id){
        $query = $this->db2->query("SELECT students.BranchId,branches.BranchName,branches.BranchAddress,branches.ContactNumber,branches.Logo FROM students JOIN branches ON students.BranchId = branches.BranchId WHERE StudentId = $id")->result();
        return $query;
    }

    function get_student_information($id){
        $query = "SELECT `students`.*, `batches`.`BatchName`,branches.`BranchName`,config_classes.`ClassName` AS CourseName
                    FROM `students`
                    JOIN `batches` ON `students`.`BatchId` = `batches`.`BatchId`
                    JOIN `config_classes` ON `students`.`CourseId` = `config_classes`.`ClassId`
                    JOIN `branches` ON `students`.`BranchId` = `branches`.`BranchId`
                    WHERE students.`StudentId` = $id";
        $query = $this->db2->query($query);
        $student_info = $query->row();

        // echo "<pre>";print_r($student_info);die;
        return $student_info;
    }
    
    
    public function get_notice_board_lists(){
        $query = $this->db->query("SELECT * FROM notice_board")->result();
        return $query;
    }





}

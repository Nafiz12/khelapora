<?php
class MY_Controller extends CI_Controller {
    function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
        parent::__construct();
        $this->load->database();
        $this->is_logged_in();
        $this->access_check();
        $this->load->library('user_role_wise_privilliages');
        $this->load->library('layout');
        //$this->load->database();
    }
    function is_logged_in()
    {
        $logged_in=$this->session->userdata('is_logged_in');
        if(!$logged_in)
        {
            $this->session->sess_destroy();
            redirect('/login/index/', 'refresh');
            //echo '<meta http-equiv="refresh" content="1;login" />';
        }
    }
    function access_check()
    {
        //return true;
        $controller=$this->uri->segment(1);
        $function=$this->uri->segment(2);
        if($controller != 'home')
        {
            if(substr($function, 0, 4) != 'ajax')
            {
                if(empty($function))
                {
                    $function='index';
                }
                $role_id=$this->session->userdata('role_id');
                $q=$this->db->query(" select count(*) as num from user_role_wise_privileges where role_id='{$role_id}' and controller='{$controller}' and action='{$function}' ")->row_array();

                if($q['num']!=1)
                {
                    redirect('/home/access_denied/', 'refresh');
                }
            }
        }
        return true;
    }
    function _create_access_log()
    {
        if(empty($this->user)){
            $this->user=$this->session->userdata('system.user');
        }
        $this->User_access_log->add($this->user['id'],$this->input->ip_address(),$this->uri->ruri_string(),!empty($_POST));
    }
    function get_user_id(){
        if(empty($this->user))
            $this->user=$this->session->userdata('system.user');
        return $this->user['id'];
    }

    function get_role_id(){
        if(empty($this->user))
            $this->user=$this->session->userdata('system.user');
        return $this->user['role_id'];
    }

    function is_super_admin(){
        if(empty($this->user))
            $this->user=$this->session->userdata('system.user');
        return $this->user['is_super_admin'];
    }

    function get_user_name(){
        if(empty($this->user))
            $this->user=$this->session->userdata('system.user');
        return $this->user['name'];
    }
    function get_current_date(){
        return date('Y-m-d');
    }

    function get_location_id(){
        if(empty($this->user))
            $this->user=$this->session->userdata('system.user');
        return $this->user['BranchId'];
    }

    function get_location_name(){
        if(empty($this->user))
            $this->user=$this->session->userdata('system.branch');
        return $this->user['BranchName'];
    }

    function __array_to_object($data){
        $temp=(object)array();
        foreach($data as $index=>$value){
            if(is_array($value)){
                $second_temp=(object)array();
                foreach($value as $nxt_index=>$nxt_value){
                    $second_temp->$nxt_index=$nxt_value;
                }
                $temp->$index=$second_temp;
            }else{
                $temp->$index=$value;
            }
        }
        return $temp;
    }
    function get_academic_year(){
        $data = array();
        $this->user=$this->session->userdata('system.user');
        $branch_id = $this->user['BranchId'];
        $academic_year = $this->db->get_where('branches',array('BranchId'=>$branch_id))->row()->Year;
        $data[$academic_year] =$academic_year;
        return $data;
    }
    function get_shift(){
        // $ShiftArray = array();
        // $this->user=$this->session->userdata('system.user');
        // $branch_id = $this->user['BranchId'];
        // $data = $this->db->get_where('branches',array('BranchId'=>$branch_id))->result();
        // $ShiftList = explode(',',$data[0]->Shift);
        // foreach ($ShiftList as $row){
        //     if($row == 'M'){
        //         $ShiftArray[$row] = 'Morning';
        //     }
        //     if($row == 'D'){
        //         $ShiftArray[$row] = 'Day';
        //     }
        // }
        // return $ShiftArray;
    }
     function get_medium(){
    //     $MediumArray = array();
    //     $this->user=$this->session->userdata('system.user');
    //     $branch_id = $this->user['BranchId'];
    //     $data = $this->db->get_where('branches',array('BranchId'=>$branch_id))->result();
    //     $MediumList = explode(',',$data[0]->Medium);
    //     foreach ($MediumList as $row){
    //         if($row == 'B'){
    //             $MediumArray[$row] = 'Bangla';
    //         }
    //         if($row == 'E'){
    //             $MediumArray[$row] = 'English';
    //         }
    //         if($row == 'V'){
    //             $MediumArray[$row] = 'Version';
    //         }
    //     }
    //     return $MediumArray;
    }
    function get_fathers_occupation(){
        $data = array();
        $data[''] ='Select occupation';
        $data['Teacher'] ='Teacher';
        $data['Student'] ='Student';
        $data['Govt Service'] ='Govt.Service';
        $data['Private Service'] ='Private Service';
        $data['Politician'] ='Politician';
        $data['Police Officer'] ='Police Officer';
        $data['Business'] ='Business';
        $data['Agriculture'] ='Agriculture';
        $data['Day Labourer'] ='Day Labourer';
        $data['Others'] ='Others';
        return $data;
    }
    function get_mothers_occupation(){
        $data = array();
        $data[''] ='Select occupation';
        $data['House Wife'] ='House Wife';
        $data['Teacher'] ='Teacher';
        $data['Student'] ='Student';
        $data['Govt Service'] ='Govt.Service';
        $data['Private Service'] ='Private Service';
        $data['Politician'] ='Politician';
        $data['Police Officer'] ='Police Officer';
        $data['Business'] ='Business';
        $data['Agriculture'] ='Agriculture';
        $data['Day Labourer'] ='Day Labourer';
        $data['Others'] ='Others';
        return $data;
    }
    function get_blood_group(){
        $data = array();
        $data[''] ='Select Blood Group';
        $data['Unknown'] ='Unknown';
        $data['A+'] ='A+';
        $data['A-'] ='A-';
        $data['B+'] ='B+';
        $data['B-'] ='B-';
        $data['O+'] ='O+';
        $data['O-'] ='O-';
        $data['AB+'] ='AB+';
        $data['AB-'] ='AB-';
        return $data;
    }
    function get_religion(){
        $data = array();
        $data[''] ='Select Religion';
        $data['Islam'] ='Islam';
        $data['Hindu'] ='Hindu';
        $data['Christian'] ='Christian';
        $data['Buddhist'] ='Buddhist';
        return $data;
    }
    function get_last_achieved_degree(){
        $data = array();
        $data[''] ='Select Deegree';
        $data['BSC'] ='BSC';
        $data['HSC'] ='HSC';
        $data['SSC'] ='SSC';
        $data['Honours'] ='Honours';
        $data['Degree'] ='Degree';
        $data['Agri-Diploma'] ='Agri-Diploma';
        $data['B.Com'] ='B.Com';
        $data['B.Ag'] ='B.Ag';
        $data['BA'] ='BA';
        $data['BBA'] ='BBA';
        $data['CA'] ='CA';
        $data['LLB'] ='LLB';
        $data['MBA'] ='MBA';
        $data['M.com'] ='M.com';
        $data['MSC'] ='MSC';
        $data['M.Ag'] ='M.Ag';
        $data['MA'] ='MA';
        $data['MSS'] ='MSS';
        $data['Under SSC'] ='Under SSC';
        $data['Illiterate'] ='Illiterate';
        return $data;
    }

    public function get_month_list(){
        $data = array();
        $data['01'] ='January';
        $data['02'] ='February';
        $data['03'] ='March';
        $data['04'] ='April';
        $data['05'] ='May';
        $data['06'] ='June';
        $data['07'] ='July';
        $data['08'] ='August';
        $data['09'] ='September';
        $data['10'] ='October';
        $data['11'] ='November';
        $data['12'] ='December';
        return $data;

    }

    public function get_occupation_list(){
        $data = array();
        $data[''] ='Select Occupation';
        $data['Student'] ='Student';
        $data['Service'] ='Service';
        $data['Business'] ='Business';
        $data['Unemployed'] ='Unemployed';
        
        return $data;
    }
   

}

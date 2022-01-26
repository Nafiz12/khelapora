<?php
class login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('captcha');
        //$this->load->library('pagination');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('layout');

    }
    function index()
    {
        $data['row'] = $this->db->get_where('organizations', array('OrganizationId' => 1))->result();
        $this->load->view("login/login_new", $data);
        //$this->load->view("login/login_up", $data);
        //$this->load->view("login/login", $data);
    }
    public function validate()
    {

        $this->form_validation->set_rules('username', 'Username', 'required', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() == TRUE)
        {
            $this->load->model(array('login_model','user_role','Branch'));
            $query = $this->login_model->admin_validate();

            if($query)
            {
                //login success
                $id=rtrim($_POST['username']);
                //echo $id;
                $query1 = $this->db->query("SELECT * FROM `user` where user_name='$id' and status=1  ")->result();
                if($query1[0]->is_parents == 1){
                    $query2 = $this->db->get_where('parents',array('UserId'=>$query1[0]->id))->row();
                    $parent_data = array( 'system.parent'=>array('ParentId'=>$query2->ParentId,'StudentId'=>$query2->StudentId,'logged_in'=>TRUE));
                    $this->session->set_userdata($parent_data);
                }
                if($query1[0]->is_employee == 1){
                    $query2 = $this->db->get_where('employees',array('UserId'=>$query1[0]->id))->row();
                    $employee_data = array( 'system.employee'=>array('EmployeeId'=>$query2->EmployeeId,'EmployeeName'=>$query2->EmployeeName,'logged_in'=>TRUE));
                    $this->session->set_userdata($employee_data);
                }
                foreach($query1 as $row){
                    $query2 = $this->user_role->get_list(" id='$row->role_id' ");
                    $newdata = array(
                        'user_name' => $row->name,
                        'logged_name' => $row->name,
                        'role_id' => $row->role_id,
                        'IsAdmin' => $row->IsAdmin,
                        'is_logged_in' => 1,
                        'user_id' =>$row->id,
                        'BranchId' =>$row->BranchId,
                        'roll_name' => $query2[$row->role_id]['role_name']
                        
                    );
                    $this->session->set_userdata($newdata);
                    $session_data = array( 'system.user'=>array('id'=>$row->id,'login'=>$row->name,'logged_in'=>TRUE,'role_id'=>$row->role_id,'BranchId'=>$row->BranchId,'IsAdmin' => $row->IsAdmin));
                    $this->session->set_userdata($session_data);

                    $query3 = $this->Branch->read($row->BranchId);
                    $location_data = array( 'system.branch'=>array('BranchId'=>$query3->BranchId,'BranchName'=>$query3->BranchName,'IsHeadOffice'=>$query3->IsHeadOffice));
                    $this->session->set_userdata($location_data);
                }
                redirect('home');
            }
            else{
                $data['fail'] = 1;
                $data['row'] = $this->db->get_where('organizations', array('OrganizationId' => 1))->result();
                //$this->load->view('login/login_up',$data);
                $this->load->view('login/login_new',$data);
                //$this->load->view('login/login',$data);
            }
        }
        else{
            //$this->load->view('login/login');
            //$this->load->view('login/login_up');
            $this->load->view('login/login_new');
        }
    }
    public function logout()
    {
        $lo=$this->session->userdata('logged_in');

        $this->session->sess_destroy();
        redirect('login');
    }
    public function error()
    {
        $data['page_title']="Error";
        $this->layout->view("error",$data);
    }

}
?>

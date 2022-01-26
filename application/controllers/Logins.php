<?php
class Logins extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('layout');

    }
    public function index()
    {
        $this->load->view("Logins/index");
    }
    public function validate()
    {

        $this->form_validation->set_rules('username', 'Username', 'required', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() == TRUE)
        {
            $this->load->model(array('login_model','user_role','Login'));
            $query = $this->login_model->admin_validate();

            if($query)
            {
//                echo "<pre>";print_r($query);die;
                //login success
                $id=rtrim($_POST['username']);
                //echo $id;
                $query1 = $this->db->query("SELECT * FROM `user` where user_name='$id' and status=1  ")->result();
                if($query1[0]->is_parents == 1){
                    $query2 = $this->db->get_where('parents',array('UserId'=>$query1[0]->id))->row();
                    $parent_data = array( 'system.parent'=>array('ParentId'=>$query2->ParentId,'StudentId'=>$query2->StudentId,'logged_in'=>TRUE));
                    $this->session->set_userdata($parent_data);
                }
                foreach($query1 as $row){
                    $query2 = $this->user_role->get_list(" id='$row->role_id' ");
                    $newdata = array(
                        'user_name' => $row->name,
                        'logged_name' => $row->name,
                        'role_id' => $row->role_id,
                        'is_logged_in' => 1,
                        'user_id' =>$row->id,
                        'roll_name' => $query2[$row->role_id]['role_name']
                    );
                    $this->session->set_userdata($newdata);
                    $session_data = array( 'system.user'=>array('id'=>$row->id,'login'=>$row->name,'logged_in'=>TRUE,'role_id'=>$row->role_id));
                    $this->session->set_userdata($session_data);
                }
                redirect('index.php/Dashboards');
            }
            else{
                $data['fail'] = 1;
                $this->load->view("Logins/index");
            }
        }
        else{
            $this->load->view("Logins/index");
        }
    }


    public function logout()
    {
        $lo=$this->session->userdata('logged_in');

        $this->session->sess_destroy();
        redirect('index.php/Logins');
    }
    public function error()
    {
        $data['page_title']="Error";
        //$this->load->view("error",$data);
        $this->layout->view("error",$data);
    }

}
?>

<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
class Login extends MY_Controller {
    function __construct() {
       parent::__construct();
       $this->load->model('Auth_model', '_authModel',TRUE);
       //$this->load->model('Commonmodule_model', '_commonModel',TRUE);
      
    }

    function index() {
        if($this->_authModel->is_logged_in()) {
            redirect(admin_except_base_url().'dashboard/');
        }
        else{
            $this->load->view('adminportal/login');
        }
	}

    public function verifylogin(){
        
        $this->load->library(array('form_validation'));
        if($this->input->post('submit_login')) {


            
   
            $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean', array('required' => 'You must provide a %s.'));
         
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('adminportal/login');
            }
            else{ 

                $login_array = array(
                    $this->input->post('username'),
                    $this->input->post('password')
                );
                if($this->_authModel->process_login($login_array))
                {
                    $activity_insert = $this->_commonQueryModel->insertUserActivityData("Login","Login successfully","LOGIN_SUCCESS");
                    redirect(admin_except_base_url().'dashboard/');
                }
                else{
                    $activity_insert = $this->_commonQueryModel->insertUserActivityData("Login","Login Failed","LOGIN_FAILED");
                    $data['login_failed'] = "Error : Invalid username or password";
                    $this->load->view('adminportal/login',$data);
                }
            }
        
        }
        else {
            $this->load->view('adminportal/login');
        }
    }





        function logout(){
            $activity_insert = $this->_commonQueryModel->insertUserActivityData("Logout","Logout done","LOGOUT");
            $this->session->sess_destroy();
            redirect(admin_except_base_url().'login/');
        }

   
}

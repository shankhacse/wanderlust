<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Login extends MY_Controller {

    function __construct() {
       parent::__construct();
     
       $this->load->module('template');
       $this->load->model('Loginmodel','loginmodel',TRUE);
       $this->load->model('commondata_model', 'commondatamodel',TRUE);
    
    }

    function index() {
       
        if($this->loginmodel->is_logged_in()){
            redirect('dashboard');
        }else{
      $data['loginstatus'] = 1;
      
      $data['view_file'] = 'login/login_view';
      $this->template->web_template($data);
        }
    }

    public function verifylogin(){
        
        $this->load->library(array('form_validation'));
        if($this->input->post('submit_login')) {

   
            $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required|xss_clean', array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean', array('required' => 'You must provide a %s.'));
           
          
            if ($this->form_validation->run() == FALSE) {
                //pre("done");
                $data['view_file'] = 'login/login_view';
                $this->template->web_template($data);
                //$this->load->view('login/login_view');
                
                //pre("done");exit;
            }
            else{ 
                //pre("el");exit;
                $login_array = array(
                    $this->input->post('mobile_no'),
                    $this->input->post('password')
                );
                if($this->loginmodel->process_login($login_array))
                {
                   
                    
                   redirect('dashboard');
                }
                else{
                    
                    $data['loginstatus'] = 0;
                    $data['login_failed'] = "Error : Invalid mobile no or password";
                    $data['view_file'] = 'login/login_view';
                    $this->template->web_template($data);
                }
            }
        
        }
        else {
            redirect('login');
        }
    }


        function logout(){
          
            $this->session->sess_destroy();
            redirect('home');
        }
}
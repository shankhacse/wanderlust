<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Dashboard extends MY_Controller {

    function __construct() {
       parent::__construct();
     
       $this->load->module('template');
       $this->load->model('Loginmodel','loginmodel',TRUE);
       $this->load->model('commondata_model', 'commondatamodel',TRUE);
    
    }

    function index() {

        if($this->loginmodel->is_logged_in()){
            $data['room_type_list'] = $this->_commonQueryModel->getAllDropdownData('room_type');
            $data['view_file'] = 'home';
            $this->template->web_template($data);
            //pre($this->session->userdata('user_session_data'));exit;
        }else{
           
            redirect('login');
        }
      
   
    }

}
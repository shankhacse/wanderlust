<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Dashboard extends MY_Controller {

    function __construct() {
        parent::__construct();
       $this->load->model('Auth_model', '_authModel',TRUE);
       $this->load->model('Commonmodule_model', '_commonModel',TRUE);
       $this->load->module('template');
    }

    function index(){

        if($this->_authModel->is_logged_in()) {
            // echo "<pre>";
            // print_r($this->session->userdata); 
            // echo "</pre>";
            $data['view_file'] = 'dashboard/dashboard';
            $this->template->admin_template($data);
        }
        else{
            redirect(admin_except_base_url().'login/');
        }
        
    }
}

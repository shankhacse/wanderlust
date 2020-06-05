<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Useraudit extends MY_Controller {

    function __construct() {
        parent::__construct();
       //$this->load->model('Auth_model', '_authModel',TRUE);
       $this->load->model('Commondata_model', 'commondata_model',TRUE);
       $this->load->model('Usermodel','user',TRUE); 
       $this->load->module('template');
    }

    function index(){

        if($this->_authModel->is_logged_in()) {
            // echo "<pre>";
            // print_r($this->session->userdata); 
            // echo "</pre>";
            $data['view_file'] = 'usermanagement/users_audit_list';
            $data['userauditlist']  = $this->user->getUserAuditAllDropdownData('users');
            //pre($data['userauditlist']);exit;

            $this->template->admin_template($data);
        }
        else{
            redirect(admin_except_base_url().'login/');
        }
        
    }

}
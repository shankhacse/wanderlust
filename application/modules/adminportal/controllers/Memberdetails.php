<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Memberdetails extends MY_Controller {

    function __construct() {
        parent::__construct();
      
       $this->load->model('Commondata_model', 'Commondata_model',TRUE);
       $this->load->module('template');
    }

    function index(){

        if($this->_authModel->is_logged_in()) {
         
             $data['memberlist'] = $this->Commondata_model->getAllDropdownData('member_master');
             //pre($data['bookinglist']);exit;
            $data['view_file'] = 'member-details/member-details-list';
            $this->template->admin_template($data);
        }
        else{
            redirect(admin_except_base_url().'login/');
        }
        
    }
}
<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Home extends MY_Controller {

    function __construct() {
       parent::__construct();
      // $this->load->model('Commonmodule_model', '_commonModel',TRUE);
       $this->load->module('template');
       $this->load->model('Home_model','_home',TRUE);
    
    }

    function index() {
        $data['view_file'] = 'home';
       // $data['id'] = $this->uri->segment(2);       
        $data['room_type_list'] = $this->_commonQueryModel->getAllDropdownData('room_type');
	 	$this->template->web_template($data);
    }

    function a(){
        echo "das";
    }

   
}

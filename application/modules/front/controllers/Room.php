<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Room extends MY_Controller {

    function __construct() {
       parent::__construct();
      // $this->load->model('Commonmodule_model', '_commonModel',TRUE);
       $this->load->module('template');
       $this->load->model('Room_model','_roomModel',TRUE);
    
    }

    function index() {
        echo "fsdf";
     //   $data['view_file'] = 'home';
	 //	$this->template->web_template($data);
    }

    function checkroom(){
         $check_in_dt = $this->input->get('checkin_dt');
         $checkout_dt = $this->input->get('checkout_dt');
         $room_type = $this->input->get('room');
         $adults = $this->input->get('adults');
         $children = $this->input->get('children');


         $data['check_in_dt'] =  $check_in_dt;
         $data['checkout_dt'] =  $checkout_dt;
         $data['room_type'] =  $room_type;
         $data['audults_no'] =  $adults;
         $data['children_no'] =  $children;
         $data['room_type_list'] = $this->_commonQueryModel->getAllDropdownData('room_type');
     
        $data['room_list'] =  $this->_roomModel->getRoomsListBysearch($check_in_dt,$checkout_dt,$room_type);
        $data['view_file'] = 'room/room_list';
        $this->template->web_template($data);


    }

   
}

<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Room extends MY_Controller {

    function __construct() {
       parent::__construct();
      // $this->load->model('Commonmodule_model', '_commonModel',TRUE);
       $this->load->module('template');
       $this->load->model('Room_model','_roomModel',TRUE);
       $this->load->model('Commondata_model','Commondata_model',TRUE);
    
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
       // pre($data['audults_no']);exit;
        $data['room_list'] =  $this->_roomModel->getRoomsListBysearch($check_in_dt,$checkout_dt,$room_type);
        //pre($data['room_list']);exit;

        $data['view_file'] = 'room/room_list';
        $this->template->web_template($data);


    }

    function room_booking(){

      if($this->loginmodel->is_logged_in()){

        $check_in_dt = $this->input->get('checkin_dt');
         $checkout_dt = $this->input->get('checkout_dt');
         $room_type = $this->input->get('room');
         $adults = $this->input->get('adults');
         $children = $this->input->get('children');
         $data['room_id'] = $this->input->get('id');


         $data['check_in_dt'] =  $check_in_dt;
         $data['checkout_dt'] =  $checkout_dt;
         $data['room_type'] =  $room_type;
         $data['audults_no'] =  $adults;
         $data['children_no'] =  $children;
         $data['room_type_list'] = $this->_commonQueryModel->getAllDropdownData('room_type');
        
         $data['RoomFacilities'] = $this->_roomModel->getRoomFacilities($data['room_id']);
         $data['RoomGallery'] = $this->_roomModel->getRoomGallery($data['room_id']);
         $data['RoomPrices'] = $this->_roomModel->getRoomPrices($data['room_id']);
         $data['roommaster'] = $this->_roomModel->GetRoomDtl($data['room_id']);
         //$data['roommaster'] = $this->_roomModel->GetRoomDtl($data['room_id']);
        
        
        //pre($data['RoomPrices']);exit;
        $data['room_list'] =  $this->_roomModel->getRoomsListBysearch($check_in_dt,$checkout_dt,$room_type);
        $data['view_file'] = 'room/room_booking';
        $this->template->web_template($data);

      }else{
           
        redirect('login');
    }
  }

    function room_booking_confirm(){

      if($this->loginmodel->is_logged_in()){

        $session = $this->session->userdata('user_session_data');
        $check_in_dt = $this->input->get('checkin_dt');
         $checkout_dt = $this->input->get('checkout_dt');
         $room_type = $this->input->get('room');
         $adults = $this->input->get('adults');
         $children = $this->input->get('children');
         $data['room_id'] = $this->input->get('id');
         $package = $this->input->get('package');
       // pre($package);exit;
         //$mattress = $this->input->get('mattress');
        
         if($check_in_dt != ''){           
            $checkin_dt = date('Y-m-d',strtotime($check_in_dt));           
          }else{
           $checkin_dt=NULL;
          }

          if($checkout_dt != ''){
           
            $checkout_date = date('Y-m-d',strtotime($checkout_dt));
          }else{
           $checkout_date=NULL;
          }
         
        
         $data['check_in_dt'] =  $check_in_dt;
         $data['checkout_dt'] =  $checkout_dt;
         $data['room_type'] =  $room_type;
         $data['audults_no'] =  $adults;
         $data['children_no'] =  $children;
         $data['package_type'] = $package;
         $data['room_type_list'] = $this->_commonQueryModel->getAllDropdownData('room_type');
        
         $data['RoomFacilities'] = $this->_roomModel->getRoomFacilities($data['room_id']);
         $data['RoomGallery'] = $this->_roomModel->getRoomGallery($data['room_id']);
         $data['RoomPrices'] = $this->_roomModel->getRoomPrices($data['room_id']);
         $data['roommaster'] = $this->_roomModel->GetRoomDtl($data['room_id']);

         
         $data['memberdtl'] = $this->_roomModel->getmemberdtl($session['memberid']);
      // pre($data['memberdtl']);exit;
        //  $data['roommaster'] = $this->_roomModel->GetRoomDtl($data['room_id']);
        $data['no_of_room'] = 0;
        $data['total_romm_price'] = 0;
        $data['total_adults'] = 0;
        $data['roomalloted'] = [];
        $data['roomlist'] =  $this->_roomModel->checkRoomAvaibility($checkin_dt,$checkout_date,$room_type,$package);
        foreach($data['roomlist'] as $roomlist){

           if($adults > $data['total_adults']){            
            $data['no_of_room']++;
            $data['total_romm_price']+=$roomlist->rate;
            $data['total_adults'] +=$roomlist->max_adult;
            $data['roomalloted'][] = array(
                                          'room_id' => $roomlist->room_id,
                                          'floor_id' => $roomlist->floor_id,
                                          'room_type_id' => $roomlist->room_type_id,
                                          'max_adult' => $roomlist->max_adult,
                                          'max_child' =>$roomlist->max_child,
                                          'no_of_mattress' => $roomlist->no_of_mattress,
                                          'each_mattress_price' => $roomlist->each_mattress_price,
                                          'dtroomid' => $roomlist->dtroomid,
                                          'type' => $roomlist->type,
                                          'rate' => $roomlist->rate,
                                          'package_name' =>$roomlist->package_name,);
           }
        }
      // pre($data['roomalloted']);exit;
        $data['view_file'] = 'room/room_booking_confirm';
        $this->template->web_template($data);

      }else{
           
        redirect('login');
    }
 }
    function room_booking_action(){

      if($this->loginmodel->is_logged_in()){

        $session = $this->session->userdata('user_session_data');

      $formData = $this->input->post('formDatas');
      parse_str($formData, $dataArry);
      
      $check_in_dt = trim($dataArry['checkin_dt']);
      $checkout_dt = trim($dataArry['checkout_dt']);
      $audults_no = trim($dataArry['audults_no']);
      $children_no = trim($dataArry['children_no']);
      $room = trim($dataArry['room']);
      $package = trim($dataArry['package']);

      $name = trim($dataArry['name']);
      $mobile_no = trim($dataArry['mobile_no']);
      $address = trim($dataArry['address']);
      $city = trim($dataArry['city']);
      $zip = trim($dataArry['zip']);
      $state = trim($dataArry['state']);

      $room_id = $dataArry['room_id'];
      $roomIds = implode(',',$room_id);
      $mattress = $dataArry['mattress'];

      if($check_in_dt != ''){           
        $checkin_dt = date('Y-m-d',strtotime($check_in_dt));           
      }else{
       $checkin_dt=NULL;
      }

      if($checkout_dt != ''){
       
        $checkout_date = date('Y-m-d',strtotime($checkout_dt));
      }else{
       $checkout_date=NULL;
      }

    $data['roomcheck'] =  $this->_roomModel->BeforebookingcheckRoomAvaibility($checkin_dt,$checkout_date,$room,$package,$roomIds);
  
    if(count($data['roomcheck']) == 0){
      
     $booking_ref = $this->_roomModel->GetBookingRefCode('BOOKING CODE');
      $booking_master = array(
                              'check_in_dt'=>$checkin_dt,
                              'check_out_dt'=>$checkout_date,
                              'booking_ref_no'=> $booking_ref,
                              'no_of_adults'=> $audults_no,
                              'no_of_child'=>$children_no,
                              'member_id'=>$session['memberid'],
                              'name'=>$name,
                              'mobile_no'=>$mobile_no,
                              'address'=>$address,
                              'city'=>$city,
                              'pincode'=>$zip,
                              'state'=>$state
      );

      $booking_mst_id = $this->Commondata_model->insertSingleTableData('booking_master',$booking_master);
     
       for($i=0;$i < count($room_id);$i++){
        $booking_dtl = array(
                             'booking_id' =>$booking_mst_id,
                             'room_id'=>$room_id[$i],
                             'no_of_mattress'=>$mattress[$i]
                            );
      $booking_dtl = $this->Commondata_model->insertSingleTableData('booking_details',$booking_dtl);
                  
      }
      if($booking_dtl){
        $json_response = [
            "STATUS" => 1,
            "MSG" => 'SAVE_SUCCESS',
            "memberid"=>$session['memberid']
        ];
    }
    else {
        $json_response = [
            "STATUS" => 0,
            "MSG" => 'Try Again'
            
        ];
    }
         

     }else{

      $json_response = [
         "STATUS" => 0,
         "MSG" => 'Room Already Booked Try For Another Room'
         ];
     }
          
      
     header('Content-Type: application/json');
     echo json_encode( $json_response );
     exit;
      
    }else{
           
      redirect('login');
  }
    
    }

    function success(){

      if($this->loginmodel->is_logged_in()){

        $session = $this->session->userdata('user_session_data');

      
        $where = array('member_id'=>$session['memberid']);
        $data['bookingdtl'] = $this->Commondata_model->getAllRecordWhere('booking_master',$where);

       // pre($data['bookingdtl']);exit;
        $data['view_file'] = 'room/room_confirm_success';
        $this->template->web_template($data);
             
      }else{
           
        redirect('login');
    }

  }

}



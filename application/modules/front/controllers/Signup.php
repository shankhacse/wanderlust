<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class Signup extends MY_Controller {

    function __construct() {
       parent::__construct();
     
       $this->load->module('template');
       $this->load->model('signupmodel','signupmodel',TRUE);
       $this->load->model('commondata_model', 'commondatamodel',TRUE);
    
    }

    function index() {
       
     $data['view_file'] = 'signup/signup_view';
	  $this->template->web_template($data);
    }

   function signup_action(){

    $formData = $this->input->post('formDatas');
    parse_str($formData, $dataArry);

    $name = trim(htmlspecialchars($dataArry['fullname']));
    $mobile_no = trim(htmlspecialchars($dataArry['mobile_no']));
    $email = trim($dataArry['email']);
    $password = trim($dataArry['password']);

     $membercode = $this->signupmodel->GetNewMemberCode("REGISTER");

     $insert_arry = array(
                   'member_code'=>$membercode,
                   'name'=>$name,
                   'mobile_no'=>$mobile_no,
                   'email'=>$email,
                   'password'=>md5($password)
                    );

        $insert = $this->commondatamodel->insertSingleTableData('member_master',$insert_arry);         

            if($insert){
                $json_response = [
                    "STATUS" => 1,
                    "MSG" => 'SAVE_SUCCESS',
                    'id'=> $insert
                ];
            }
            else {
                $json_response = [
                    "STATUS" => 0,
                    "MSG" => 'SAVE_ERROR'
                ];
            }
            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;
     
   }

   function checkmobile(){

    $mobile = trim($this->input->post('mobile_no'));
   
     $where = array('mobile_no'=>$mobile);

     
        $getdata = $this->commondatamodel->checkExistanceData('member_master',$where);

        //pre(count($getdata));exit;

            if(!empty($getdata)){
                $json_response = [
                    "STATUS" => 1,
                                    
                ];
            }
            else {
                $json_response = [
                    "STATUS" => 0,
                ];
            }
            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;
     
   }
}
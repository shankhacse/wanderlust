<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends CI_Model  {
    
    public function __construct()
	{
	    parent::__construct();
    }


    public function process_login($login_array_input = NULL){

        if(!isset($login_array_input) OR count($login_array_input) != 2)
        return false;
    
        $mobile_no = $login_array_input[0];
        $password = $login_array_input[1];

        $where = array('mobile_no'=>$mobile_no,'password'=>md5($password));

        $this->db->select('*')
                ->from('member_master')
                ->where($where)               
                ->limit(1);
        $query = $this->db->get();
         
            if ($query->num_rows() > 0)
            {
                $row = $query->row();
                $member_id = $row->id;
                $membercode = $row->member_code;
                $mobileno = $row->mobile_no;
               
                    $user_session_info = array(
                        "memberid" => $member_id,
                        "membercode" => $membercode,
                        "mobileno" => $mobileno,
                        "name"=>$row->name
                      
                    );

                    $this->session->set_userdata('user_session_data', $user_session_info);
                    return true;
                }
               
            return false;
    }

    public function is_logged_in(){
        return ($this->session->userdata('user_session_data')) ? TRUE : FALSE;
     }
}
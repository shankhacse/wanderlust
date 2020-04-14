<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model  {
    public function __construct()
	{
        parent::__construct();
        //$this->load->model('Commonmodule_model', '_commonModel',TRUE);
    }


    
    public function process_login($login_array_input = NULL){
        if(!isset($login_array_input) OR count($login_array_input) != 2)
        return false;
    
        $username = $login_array_input[0];
        $password = $login_array_input[1];

        

        $this->db->select('*')
                ->from('users')
                ->where('user_name',$username)
                ->where('active',1)
                ->limit(1);
        $query = $this->db->get();
         
            if ($query->num_rows() > 0)
            {
                $row = $query->row();
                $user_id = $row->user_id;
                $user_pass = $row->user_password;
                $user_salt = $row->salt;
                if($this->encryptUserPwd( $password,$user_salt) === $user_pass){

                    $user_session_info = array(
                        "userid" => $user_id,
                        "username" => $row->user_name,
                        "user_role" => $row->user_role,
                        "permissiontype" => $row->permission_type

                    );
                    $this->session->set_userdata('user_sess_data', $user_session_info);
                    return true;
                }
                return false;
            }
            return false;
    }

    public function is_logged_in(){
       return ($this->session->userdata('user_sess_data')) ? TRUE : FALSE;
    }

    public function logged_user_info(){
        return ($this->is_logged_in())?$this->session->userdata('user_sess_data'):null;
    }

    public function is_valid_user_url(){
        $isValidUserUrl = false;
        $loggedin_info = $this->logged_user_info();
        if($loggedin_info['user_role'] == "developer") {
            $isValidUserUrl = true;
        }
        else{
            $curr_link = partial_uri(1);
            $where_Ary = array(
            "admin_menu_master.active" => 1,
            "admin_menu_master.link" => $curr_link,
            "admin_user_menus.user_id" => $loggedin_info['userid']
            );
            
            $this->db->select("*")
                    ->from('admin_menu_master')
                    ->join('admin_user_menus','admin_user_menus ON admin_menu_master.admin_menu_id = admin_user_menus.adm_menu_id','LEFT ')
                    ->where($where_Ary)
                    ->where("admin_user_menus.`adm_menu_id` IS NOT NULL")
                    ->order_by("srl","ASC");
                    
            $query = $this->db->get();
        // echo $this->db->last_query();
            if($query->num_rows() > 0) 
            {
                $isValidUserUrl = true;
            }
        }
        return $isValidUserUrl;
    }

    public function genRndDgt($length = 8, $specialCharacters = true) {
        $digits = '';
        $chars = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789";
    
        if($specialCharacters === true)
        $chars .= "!?=/&+,.";
        
        for($i = 0; $i < $length; $i++) {
            $x = mt_rand(0, strlen($chars) -1);
            $digits .= $chars{$x};
        }
        return $digits;
    }
    
    // Generate Random Salt for Password encryption
    public function genRndSalt() {
        return $this->genRndDgt(8, true);
    }
    
    // Encrypt User Password
    public function encryptUserPwd($pwd, $salt) {
        return sha1(md5($pwd) . $salt);
    }
}
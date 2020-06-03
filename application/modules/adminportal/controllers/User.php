<?php (defined('BASEPATH')) OR exit('No direct script access allowed');


class User extends MY_Controller {

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
            $data['view_file'] = 'usermanagement/user/user_list';
            $data['userlist']  = $this->commondata_model->getAllDropdownData('users');
            //pre($data['userlist']);exit;

            $this->template->admin_template($data);
        }
        else{
            redirect(admin_except_base_url().'login/');
        }
        
    }
    public function getloginLogoutDetailByUserId()
    {
        if($this->_authModel->is_logged_in()) {

        $userid=$this->input->post('userid');
        
        $table="";
        $userActivity=$this->user->getUserAccountActivity($userid);
        //pre($userActivity);exit;
        $table="<table id='loginLogoutTable' class='table customTbl table-bordered table-striped dataTables' style='border-collapse: collapse !important;'>
                    <thead>
                        <tr>
                            <th>Login Date & Time</th>
                            <th>Logout Date & Time</th>
                            <th>Browser</th>
                            <th>Device OS</th>
                        </tr>
                    </thead>
                    <tbody>";
                        foreach ($userActivity as $Activity) {
                            $table .="<tr>
                                        <td>".$Activity->login_time."</td>
                                        <td>".$Activity->logout_time."</td>
                                        <td>".$Activity->browser."</td>
                                        <td>".$Activity->platform."</td>                        
                                    </tr>";
                        }
                    $table .="</tbody>
                </table>";
        echo $table;

    }
        else{
            redirect(admin_except_base_url().'login/');
        }
    }

    public function ActiveUser()
    {
        if($this->_authModel->is_logged_in()) { 

            $userId=$this->uri->segment(4);            
            $this->user->ActiveInactiveUserAccount($userId,'1');
            /** audit trail */
            

             $this->commondata_model->insertUserActivityData('User',"Update successfully","UPDATE",$userId);

            redirect(admin_except_base_url().'user','refresh');

        } else{
            redirect(admin_except_base_url().'login/');
        }
    }
    public function InactiveUser()
    {
        if($this->_authModel->is_logged_in()) { 

            $userId=$this->uri->segment(4);
           // pre($userId);exit;
            $this->user->ActiveInactiveUserAccount($userId,'0');
            /** audit trail */
            $this->commondata_model->insertUserActivityData('User',"Update successfully","UPDATE",$userId);

            redirect(admin_except_base_url().'user','refresh');

        }else{
            redirect(admin_except_base_url().'login/');
		}
    }
}

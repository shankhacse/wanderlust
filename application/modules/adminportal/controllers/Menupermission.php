<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menupermission extends MY_Controller {
    public function __construct() {
        parent::__construct();      
       
        $this->load->model('Commondata_model', 'commondata_model',TRUE);
        $this->load->model('Menupermissionmodel','Menupermissionmodel',TRUE);   
        $this->load->module('template');    
    }


    public function index()
    {
        if($this->_authModel->is_logged_in()) {

            $session = $this->session->userdata('user_sess_data');
            //pre( $session);exit;
            $data['userslist']=$this->Menupermissionmodel->getUserList($session['user_role']);
            
            $data['Menulist'] =$this->Menupermissionmodel->getMenuList($session['user_role'],$session['userid']);
          
             //pre( $data['Menulist']);exit;
            $data['view_file'] = "usermanagement/usermenu";
            $this->template->admin_template($data);
        }else{
			redirect(admin_except_base_url().'login/');
        
		}
    }
    
    public function getUsersPermittedMenu()
    {
        if($this->_authModel->is_logged_in()) {

            $userId=$this->input->post('userId');
            $menuId= $this->Menupermissionmodel->getUsersPermittedMenu($userId);
            // $notmenuId= $this->Menupermissionmodel->getUsersNotPermittedMenu($userId);
           // pre($menuId);exit;
            $json_response = array(
                "data" =>$menuId,
                
            );
          //pre($json_response);exit;
            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;
           
        }else{
			redirect(admin_except_base_url().'login/');
		}
    }

    public function AssignMenu()
    {    
         if($this->_authModel->is_logged_in()) {   

            $session = $this->session->userdata('user_sess_data');

            $userId=$this->input->post('userId');
            $menuIds=explode(",",$this->input->post('MenuString'));
            //pre($userId);exit;
            $count=$this->Menupermissionmodel->getMenuCount($userId);

            if($count>0)
            {
                $this->Menupermissionmodel->DeletePermittedMenu($userId);
            }
            

                foreach ($menuIds as $key => $menuid) {
                    $insert_Arr=array(
                        "user_id"=>$userId,
                        "adm_menu_id"=>$menuid,
                        "read"=>1,
                        "write"=>1,                        
                        'assigned_by'=>$session['userid'],
                    );

                    $masterId=$this->Menupermissionmodel->InsertPermittedMenu($insert_Arr);  
        
                    
                    /** audit trail */
                    $this->commondata_model->insertUserActivityData('User Management',"Menu permitted successfully","INSERT",$masterId);
                    /** audit trail */
                } 
                    
            
            $json_response = array(
                "status"=>1,
                "msg" =>'Menu permitted successfully'
            );

            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;
        }else{
            redirect(admin_except_base_url().'login/');
        }
        
    }











}//end of class
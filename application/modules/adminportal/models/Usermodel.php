<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usermodel extends CI_Model{
    public function getUserList($user_role)
    {
        $data = array();
       if ($user_role==1) { // 1 is the role id for Developer
            $this->db->select("users.*,user_role.role")
            ->from('users')
            ->join('user_role','users.user_role_id = user_role.id','INNER')            
            ->order_by('name','ASC');
        }else {
            $this->db->select("users.*,user_role.role")
                ->from('users')
                ->join('user_role','users.user_role_id = user_role.id','INNER')
                ->where_not_in('user_role.id',1)
				->order_by('name','ASC');
        }
		
		$query = $this->db->get();
		// echo $this->db->last_query();

		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
    }

    public function getUserRoleList($user_role)
    {
        $data = array();
        if ($user_role==1) { // 1 is the role id for Developer
             $this->db->select("*")
             ->from('user_role')         
             ->order_by('role','ASC');
         }else {
             $this->db->select("*")
                 ->from('user_role')
                 ->where_not_in('id',1)
                 ->order_by('role','ASC');
         }
         
         $query = $this->db->get();
         // echo $this->db->last_query();
 
         if($query->num_rows()> 0)
         {
             foreach ($query->result() as $rows)
             {
                 $data[] = $rows;
             }
             return $data;
              
         }
         else
         {
              return $data;
          }
    }


    public function ActiveInactiveUserAccount($userid,$is_active)
    {
        $where=[
            'user_id'=>$userid
        ];
        $data=[
            'active'=>$is_active,
            
        ];
        try {
            $this->db->trans_begin();
            //$this->db->where($where);
			$this->db->update('users', $data,$where);
			$this->db->last_query();
			
            //$affectedRow = $this->db->affected_rows();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                
                return FALSE;
            } else {
                $this->db->trans_commit();
                
                return TRUE;
            }
        } catch (Exception $exc) {
             return FALSE;
        }
    }

    public function getUserAccountActivity($userid)
    {
        $where=[
            'login.user_id'=> $userid,            
            'login.activity_module'=> 'Login'
            
        ];
        $data = array();
		$this->db->select("login.id,  
                            login.activity_date AS login_time,
                            logout.id, 
                            logout.activity_date AS logout_time,
                            logout.browser,
                            logout.platform")
                ->from('activity_log login')
                ->join('activity_log logout','login.id < logout.id  AND login.user_id = logout.user_id AND login.id = logout.master_id','LEFT')
                ->where($where)                              
				->group_by('login.id');
		$query = $this->db->get();
		#echo $this->db->last_query();

		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
    }

    public function getUserAuditAllDropdownData()
    {
        $data = array();
        $where = array('Login','Logout');
            $this->db->select("activity_log.*,users.user_name")
                ->from('activity_log')
                ->join('users','activity_log.user_id = users.user_id','INNER')
                ->where_not_in('activity_log.activity_module', $where);
				
      
		
		$query = $this->db->get();
		# echo $this->db->last_query();

		if($query->num_rows()> 0)
		{
            foreach ($query->result() as $rows)
			{
				$data[] = $rows;
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
    }











}//end of class
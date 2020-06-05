<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menupermissionmodel extends CI_Model{


 public function getUserList($userRole)
 {
     // 1 is the role id for Developer      
     if ($userRole==1) {
        $this->db->select("*")->from('users')->where('active',1);
        
     }else{
        $this->db->select("*")->from('users')->where('active',1)->where_not_in('user_role',1);
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
          
    }else{
        return $data;
    }

 }

 public function getMenuList($userRole,$user_id=null)
 {
     // 1 is the role id for Developer 
    if ($userRole==1) {
     return  $this->getAllAdministrativeMenuDevOnly();
    }else{
     return  $this->getAllAdministrativeMenu($user_id);
    }
   
 }

   /** menu list for developer (developer will have all the menu access ) */

   public function getAllAdministrativeMenuDevOnly()
   {
       $data = array();
       $where_Ary = array(
           "admin_menu_master.is_submenu" => "N",
           "admin_menu_master.active" => 1
       );
       
       $this->db->select("*")->from('admin_menu_master')
                    ->where($where_Ary)
                    ->order_by('admin_menu_master.srl','ASC');
        $query = $this->db->get();

        if ($query->num_rows()> 0)
        {
            foreach($query->result() as $rows)
            {
                $data[] = array(
                        "FirstLevelMenuData" => $rows,
                        "secondLevelMenu" => $this->getSecondLevelMenuDevOnly($rows->admin_menu_id) 
                    );
            }
        }
          return $data;
   }

   public function getSecondLevelMenuDevOnly($parentID)
   {
       $data = array();
       $where_Ary = array(
           "admin_menu_master.parent_menu_id" => $parentID,
           "admin_menu_master.active" => 1
       );
       
       $this->db->select("*")->from('admin_menu_master')
               ->where($where_Ary)
               ->order_by('admin_menu_master.srl','ASC');
        $query = $this->db->get();
        // pre($this->db->last_query());
       if($query->num_rows()> 0)
          {
               foreach($query->result() as $rows)
               {
                   $data[] = array(
                           "secondLevelMenuData" => $rows,
                           "thirdLevelMenu" => $this->getThirdLevelMenuDevOnly($rows->admin_menu_id) 
                        );
               }
          }
          return $data;
   }
   
   public function getThirdLevelMenuDevOnly($parentID)
   {
       $data = array();
       $where_Ary = array(
           "admin_menu_master.parent_menu_id" => $parentID,
           "admin_menu_master.active" => 1
       );
       
        $this->db->select("*")->from('admin_menu_master')
               ->where($where_Ary)
               ->order_by('admin_menu_master.srl','ASC');
        $query = $this->db->get();
       if($query->num_rows()>  0) 
       {
           foreach($query->result() as $rows)
           {
               $data[] = array(
                       "thirdLevelMenuData" =>$rows,
                   );
           }
       }
          return $data;
   }
/** end  menu list for developer  */

   public function getAllAdministrativeMenu($user_id)
   {
       $data = array();
       $where_Ary = array(
           "admin_menu_master.is_submenu" => "N",
           "admin_menu_master.active" => 1,
           "admin_user_menus.user_id" => $user_id,
       );
       
        $this->db->select("admin_menu_master.*")->from('admin_menu_master')
               ->join('admin_user_menus','admin_menu_master.admin_menu_id=admin_user_menus.adm_menu_id')
               ->where($where_Ary)
               ->order_by('admin_menu_master.srl','ASC');
        $query = $this->db->get();
        
       if ($query->num_rows()> 0)
          {
             foreach($query->result() as $rows)
             {
                   $data[] = array(
                           "FirstLevelMenuData" => $rows,
                           "secondLevelMenu" => $this->getSecondLevelMenu($rows->admin_menu_id,$user_id) 
                        );
            }
          }
          return $data;
   }

   public function getSecondLevelMenu($parentID,$user_id)
   {
       $data = array();
       $where_Ary = array(
           "admin_menu_master.parent_menu_id" => $parentID,
           "admin_menu_master.active" => 1,
           "admin_user_menus.user_id" => $user_id,
       );
       
        $this->db->select("admin_menu_master.*")->from('admin_menu_master')
               ->join('admin_user_menus','admin_menu_master.admin_menu_id=admin_user_menus.adm_menu_id')
               ->where($where_Ary)
               ->order_by('admin_menu_master.srl','ASC');
              
               $query = $this->db->get();
            //    pre($this->db->last_query());exit;
       if($query->num_rows()> 0)
          {
               foreach($query->result() as $rows)
               {
                   $data[] = array(
                           "secondLevelMenuData" => $rows,
                           "thirdLevelMenu" => $this->getThirdLevelMenu($rows->admin_menu_id,$user_id) 
                        );
               }
          }
          return $data;
   }
   
   public function getThirdLevelMenu($parentID,$user_id)
   {
       $data = array();
       $where_Ary = array(
        "admin_menu_master.parent_menu_id" => $parentID,
        "admin_menu_master.active" => 1,
        "admin_user_menus.user_id" => $user_id,
    );
       
    $this->db->select("admin_menu_master.*")->from('admin_menu_master')
    ->join('admin_user_menus','admin_menu_master.admin_menu_id=admin_user_menus.adm_menu_id')
    ->where($where_Ary)
    ->order_by('admin_menu_master.srl','ASC');
        $query = $this->db->get();
       if($query->num_rows()> 0) 
       {
           foreach($query->result() as $rows)
           {
               $data[] = array(
                       "thirdLevelMenuData" =>$rows,
                   );
           }
       }
          return $data;
   }
   

    public function getUsersPermittedMenu($userId)
    {
        $data = array();
        $this->db->select("admin_menu_master.admin_menu_id as id")->from('admin_user_menus')
                ->join('admin_menu_master','admin_menu_master.admin_menu_id=admin_user_menus.adm_menu_id','INNER')
                ->where('admin_user_menus.user_id',$userId);
        $query = $this->db->get();
        if($query->num_rows()> 0) 
        {
            
            foreach($query->result() as $rows)
            {
                $data[] = $rows;
            }
        }
        return $data;
    }

    public function getUsersNotPermittedMenu($userId)
    {
        $data = array();
        $where = array('1','2');
        $this->db->select("admin_menu_master.admin_menu_id as id")->from('admin_user_menus')
                ->join('admin_menu_master','admin_menu_master.admin_menu_id = admin_user_menus.adm_menu_id','INNER')
                ->where('admin_user_menus.user_id',$userId)
                ->where_not_in('admin_user_menus.adm_menu_id',$where);
        $query = $this->db->get();
        //pre($this->db->last_query());exit;
        
        if($query->num_rows()> 0) 
        {
            
            foreach($query->result() as $rows)
            {
                $data[] = $rows;
            }
        }
        return $data;
    }

    public function getMenuCount($userId)
    {
        $this->db->select('*')
				->from('admin_user_menus')->where('user_id',$userId);

		$query = $this->db->get();
		$rowcount = $query->num_rows();
	
		if($query->num_rows()>0){
			return $rowcount;
		}
		else
		{
			return 0;
		}
    }

    public function DeletePermittedMenu($userId)
    {
        $this->db->delete('admin_user_menus', array('user_id'=>$userId)); 
        
    }

    public function InsertPermittedMenu($insert_Arr)
    {    
        $lastinsert_id = 0;
        try {
            $this->db->trans_begin();

            $this->db->insert('admin_user_menus', $insert_Arr);
            $lastinsert_id = $this->db->insert_id();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $lastinsert_id=0;
                return $lastinsert_id;
            } else {
                $this->db->trans_commit();
                return $lastinsert_id;
            }
        } catch (Exception $err) {
            echo $err->getTraceAsString();
        }
        
    }







}//end of class
<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model  {
    public function __construct()
	{
        parent::__construct();
      //  $this->load->model('Commonmodule_model', '_commonModel',TRUE);
    }


    public function insertIntoWebMenu($menufor,$type,$selectedoptions,$options) {
        try {
         
            $this->db->trans_begin();
            $lastinsert_id = 0;
           
           
            $update_menu = ["is_menu_enabled" => 0];
            $update_menu_enable = ["is_menu_enabled" => 1];

            if($type=="PAGE"){

                /**
                 * Update all page menu with is_menu_enabled = 0 
                 */
                for($loop=0;$loop<count($options);$loop++) {
                    $where_menu = [
                        "page_or_link_id" => $options[$loop]->page_id,
                        "page_or_link_type" => $type,
                        "menu_type" => $menufor
                    ];

                    $this->updateWebMenu($update_menu,$where_menu);
                   }
                   
                /**
                 * Insert selected page menu with is_menu_enabled = 1 and data 
                 */
                $insert_arr  = [];
                for($selectedOpt=0;$selectedOpt<count($selectedoptions);$selectedOpt++) {

                    $detail_data = $this->_commonQueryModel->getSingleRowByWhereCls('pages',$wh = ["page_id"=> $selectedoptions[$selectedOpt],"page_for"=>$menufor]);

                    $where_menu_selected = [
                        "page_or_link_id" => $detail_data->page_id,
                        "page_or_link_type" => $type,
                        "menu_type" => $menufor
                    ];
                    $exist = $this->_commonQueryModel->checkExistanceData('web_menu_master',$where_menu_selected);
                    if($exist == true) {
                        $this->updateWebMenu($update_menu_enable,$where_menu_selected);
                    }
                    else {
                        
                        $insert_arr = [
                            "name" => $detail_data->page_title ,
                            "link" => $detail_data->page_slug ,
                            "url_slug" => $detail_data->page_slug ,
                            "menu_title" => $detail_data->page_slug ,
                            "active" => 1,
                            "menu_type" => $menufor ,
                            "is_menu_enabled" => 1 ,
                            "page_or_link_id" => $detail_data->page_id ,
                            "page_or_link_type" => $type ,
                            "created_by" => getLoggedInuserID()
                        ];
                        $exist = $this->_commonQueryModel->insertSingleTableData('web_menu_master',$insert_arr);
                    }
                }

                
            

            }


            else if($type=="LINK"){

               
                for($loop=0;$loop<count($options);$loop++) {
                   $where_menu = [
                        "page_or_link_id" => $options[$loop]->link_id,
                        "page_or_link_type" => $type,
                        "menu_type" => $menufor
                    ];
                    $this->updateWebMenu($update_menu,$where_menu);
                   }



                /**
                 * Insert selected link menu with is_menu_enabled = 1 and data 
                 */
                $insert_arr  = [];
                for($selectedOpt=0;$selectedOpt<count($selectedoptions);$selectedOpt++) {
                    $detail_data = $this->_commonQueryModel->getSingleRowByWhereCls(
                        'links',
                        $wh = [
                                "link_id"=> $selectedoptions[$selectedOpt],
                                "link_for"=>$menufor
                                ]
                            );
                   
                    $where_menu_selected = [
                        "page_or_link_id" => $detail_data->link_id,
                        "page_or_link_type" => $type,
                        "menu_type" => $menufor
                    ];
                    $exist = $this->_commonQueryModel->checkExistanceData('web_menu_master',$where_menu_selected);
                    if($exist == true) {
                        $this->updateWebMenu($update_menu_enable,$where_menu_selected);
                    }
                    else {

                        $link_url = $detail_data->link_url;
                        if($detail_data->link_url == null || $detail_data->link_url == ""  || $detail_data->link_url=="#" || $detail_data->link_title=="javascript;") {
                            $link_url = NULL;
                        }

                        $insert_arr = [
                            "name" => $detail_data->link_title ,
                            "link" => $link_url,
                            "url_slug" => $link_url,
                            "menu_title" => $link_url,
                            "active" => 1,
                            "menu_type" => $menufor ,
                            "is_menu_enabled" => 1 ,
                            "page_or_link_id" => $detail_data->link_id ,
                            "page_or_link_type" => $type ,
                            "created_by" => getLoggedInuserID()
                        ];
                        $exist = $this->_commonQueryModel->insertSingleTableData('web_menu_master',$insert_arr);
                    }
                }

                
            }
           
            

        
       

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $lastinsert_id=0;
                return FALSE;
            } else {
                $this->db->trans_commit();
                return TRUE;
            }

        }
        catch (Exception $err) {
            echo $err->getTraceAsString();
        }

    }



    



    public function getWebMenuListByType($menu_for=null){
        $data = [];
		$where_Ary = array(
           "web_menu_master.menu_type" => $menu_for
        );
		
		$this->db->select("*")
                ->from('web_menu_master')
                ->where($where_Ary)
                ->order_by("srl","ASC");
                
		$query = $this->db->get();
     //   echo $this->db->last_query();
        if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {
                $data[] = $rows;
            }
        }
		return $data;
    }



    public function getWebMenuList($menu_for=null){
        $data = [];
		$where_Ary = array(
            "web_menu_master.active" => "1",
            "web_menu_master.menu_type" => $menu_for,
            "web_menu_master.parent_menu_id" => 0 // 0 = No Sub menu 
		);
		
		$this->db->select("*")
                ->from('web_menu_master')
                ->where($where_Ary)
                ->order_by("srl","ASC");
                
		$query = $this->db->get();
     //   echo $this->db->last_query();
        if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {
                $data[] = [
                    "parentMenu" => $rows,
                    "firstLevelMenus" => $this->getSubMenuList($rows->menu_id,$menu_for)
                ];
            }
        }
		return $data;
    }


    function getSubMenuList($parent_id,$menu_for) {
        $data = [];
		$where_Ary = array(
            "web_menu_master.active" => "1",
            "web_menu_master.menu_type" => $menu_for,
            "web_menu_master.parent_menu_id" => $parent_id 
		);
		
		$this->db->select("*")
                ->from('web_menu_master')
                ->where($where_Ary)
                ->order_by("srl","ASC");
                
		$query = $this->db->get();
        if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {

                $data[] = [
                    "subMenuList" => $rows, 
                    "secondLevelMenus" => $this->getSubMenuList($rows->menu_id,$menu_for)
                ];
                
            }
        }
		return $data;
    }


    function webMenusIterator($list, $parent_id = 0, &$m_order = 0, $parent_menu=null) {
        
        foreach($list as $item) {
            $m_order++;
            $is_sub_menu = "N";
            if($parent_id>0){
                $is_sub_menu = "Y";
            }
            $updData = [];
            $where = [];
            $updData = [
                "parent_menu_id" => $parent_id,
                "is_submenu" => $is_sub_menu,
                "srl" => $m_order
            ];
            $where = [
                "menu_id" => $item->id,
              //  "page_or_link_type" => "PAGE" // Update Url Only For Page Because Link url is given by user
            ];

            
         
            $status = $this->updateWebMenuWithUrl($updData,$where);

            
            if (array_key_exists("children", $item)) {
              
                $this->webMenusIterator($item->children, $item->id,$m_order);
            }
            
            
            
        }
        return $status;
      
    }




    function updateWebMenuWithUrl($updArr,$where) {
        try {

            $this->db->trans_begin();
            
            $this->db->where($where);
            $this->db->update('web_menu_master', $updArr);

            // Update for url
            // echo $this->getChildMenuInfo($where);
            // echo "<br>";
            $actual_url = $this->getGeneratedUrlString($this->getChildMenuInfo($where));
            $url_update = [
                "link" => $actual_url,
                "url_slug" => $actual_url
            ];
            $this->db->where($where);
            $this->db->update('web_menu_master', $url_update);


           if ($this->db->trans_status() === FALSE)
           {
                $this->db->trans_rollback();
                return false;
           }
           else{
                $this->db->trans_commit();
                return true;
            }

        } catch (\Exception $e) {
            echo($e->getMessage());
        }
    }

    function updateWebMenu($updArr,$where) {
        try {
            $this->db->trans_begin();
            $this->db->where($where);
            $this->db->update('web_menu_master', $updArr);
           if ($this->db->trans_status() === FALSE)
           {
                $this->db->trans_rollback();
                return false;
           }
           else{
                $this->db->trans_commit();
                return true;
            }

        } catch (\Exception $e) {
            echo($e->getMessage());
        }
    }


  


    function getChildMenuInfo($where,$link=""){
        $this->db->select("*")
                ->from('web_menu_master')
                ->where($where)
                ->limit("1");
        $query = $this->db->get();
        
        if($query->num_rows() > 0) 
		{
            $row = $query->row();
            $link = $row->menu_title."/";
            if($row->parent_menu_id > 0){
                $where_con = [
                    "menu_id" => $row->parent_menu_id
                ];
                $link.= $this->getChildMenuInfo($where_con,$link);
            }
            
        }
        return $link;
    }

    function getGeneratedUrlString($url){
        $url_string = explode("/",$url);
        $len = count($url_string);
        $generated_string = "";
        for($i=$len-1; $i>=0; $i--) {
            if($url_string[$i]!="") {
                $generated_string.=$url_string[$i]."/";
            }
        }
        return rtrim($generated_string,'/');
    }



    /**
     * Link
     */

     function saveTableHeaderForLink($insertdata) {
        try {
            //pre($insertdata);
            $this->db->trans_begin();
            $lastinsert_id = 0;
            
            $sql = "SHOW COLUMNS FROM links";
            $query = $this->db->query($sql);
            $fields = []; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $rows) {
                    $fields[] = $rows->Field;
                }
            }

            if(in_array($insertdata['slug_title'], $fields)){
                // Column already exist
            }
            else{
                if($insertdata['input_type']!='none') {
                    $columnname = $insertdata['slug_title'];
                    $sql = "ALTER TABLE links ADD $columnname VARCHAR(50)";
                    $query = $this->db->query($sql);
                    $activity_insert = $this->_commonQueryModel->insertUserActivityData("LINK", "new column $columnname created for link table","UPDATE");
                }
            }
         
            $this->db->insert('link_category_headers', $insertdata);
            $lastinsert_id =  $this->db->insert_id();
          

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $lastinsert_id=0;
                return $lastinsert_id;
            } else {
                $this->db->trans_commit();
                return $lastinsert_id;
            }

        }
        catch (Exception $err) {
            echo $err->getTraceAsString();
        }

     }





     /**
      * Menu Admin  & And Users
      */

      function getAdminMenu($userid=0) {
        $data = [];
		$where_Ary = array(
          "admin_menu_master.active" => 1,
          "admin_menu_master.parent_menu_id" => 0,
          "admin_menu_master.is_developer_menu" => 0
        );
		
		$this->db->select("*")
                ->from('admin_menu_master')
                ->join('admin_user_menus','admin_user_menus ON admin_menu_master.admin_menu_id = admin_user_menus.adm_menu_id AND admin_user_menus.user_id ="'.$userid.'" ','LEFT')
                ->where($where_Ary)
                ->order_by("srl","ASC");
                
		$query = $this->db->get();
       // echo $this->db->last_query();
        if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {

            
                    $data[] = [
                        "firstLevel" => $rows,
                        "secondLevel" => $this->getAdminChildMenu($rows->admin_menu_id,$userid)
                    ];
                }
                
                
            }
        
		return $data;
      }


      function getAdminChildMenu($parent_menu_id=0,$userid) {
        $data = [];
		$where_Ary = array (
          "admin_menu_master.active" => 1,
          "admin_menu_master.parent_menu_id" => $parent_menu_id,
          "admin_menu_master.is_developer_menu" => 0
          
        );
		
		$this->db->select("*")
                ->from('admin_menu_master')
                ->join('admin_user_menus','admin_user_menus ON admin_menu_master.admin_menu_id = admin_user_menus.adm_menu_id AND admin_user_menus.user_id ="'.$userid.'" ','LEFT')
                ->where($where_Ary)
                ->order_by("srl","ASC");
                
		$query = $this->db->get();
       // echo $this->db->last_query();
        if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {
                $data[] = [
                    "Levelrow" => $rows,
                    "thirdLevel" => $this->getAdminChildMenu($rows->admin_menu_id,$userid)
                ]; 

            }
        }
		return $data;
      }

      /**
       * ------------ Menu List For Display in Dashboard --------------
       * 
       */






      
      function getDashboardMenuForUsers($userid=0) {
        $data = [];
		$where_Ary = array(
          "admin_menu_master.active" => 1,
          "admin_menu_master.parent_menu_id" => 0,
          "admin_user_menus.user_id" => $userid
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
            foreach($query->result() as $rows)
            {

            
                    $data[] = [
                        "menudetail" => $rows,
                        "childmenus" => $this->getDashboardChildMenuForUsers($rows->admin_menu_id,$userid)
                    ];
                }
                
                
            }
        
		return $data;
      }


      function getDashboardChildMenuForUsers($parent_menu_id=0,$userid) {
        $data = [];
		$where_Ary = array (
          "admin_menu_master.active" => 1,
          "admin_menu_master.parent_menu_id" => $parent_menu_id,
          "admin_user_menus.user_id" => $userid
          
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
            foreach($query->result() as $rows)
            {
                $data[] = [
                    "menudetail" => $rows,
                    "childmenus" => $this->getDashboardChildMenuForUsers($rows->admin_menu_id,$userid)
                ]; 

            }
        }
		return $data;
      }

      /**
       * 
       * Developer Menus
       */


      function getDeveloperMenu($parent_id=0) {
        $data = [];
		$where_Ary = array(
          "admin_menu_master.parent_menu_id" => $parent_id,
        );
		
		$this->db->select("*")
                ->from('admin_menu_master')
                ->where($where_Ary)
                ->order_by("srl","ASC");
                
		$query = $this->db->get();
       // echo $this->db->last_query();
        if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {
                    $data[] = [
                        "menudetail" => $rows,
                        "childmenus" => $this->getDeveloperMenu($rows->admin_menu_id)
                    ];
                }
            }
        
		return $data;
      }






       /**
        * 
        */
      function assingMenuToUser($userID,$selectedMenus=[]) {
        try {
            $this->db->trans_begin();
      
            // First delete all previous assign menus and then inserted again
            $this->deletePrevAssignedMenuToUser($userID);

            $selectedMenus = json_decode($selectedMenus);
            if(count($selectedMenus)>0) {
                for($i=0;$i<count($selectedMenus);$i++) {
                    $data = [
                        'user_id' => $userID ,
                        'adm_menu_id' => $selectedMenus[$i]->menuid ,
                        'assigned_by' => getLoggedInuserID()
                    ];
                    $this->insertParentMenusByChildren($selectedMenus[$i]->menuid,$userID);
                }
            }
            
            
           if ($this->db->trans_status() === FALSE)
           {
                $this->db->trans_rollback();
                return false;
           }
           else{
                $this->db->trans_commit();
                return true;
            }

        } catch (\Exception $e) {
            echo($e->getMessage());
        }
      }


      function insertParentMenusByChildren($menu_id,$userID) {
        $data = [];
		$where_Ary = array (
          "admin_menu_master.admin_menu_id" => $menu_id,
        );
		
		$this->db->select("*")
                ->from('admin_menu_master')
                ->where($where_Ary)
                ->order_by("srl","ASC");
                
		$query = $this->db->get();
       // echo $this->db->last_query();
        if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {

                if($rows->parent_menu_id>0) {

                    $where_user_menu = [
                        "admin_user_menus.user_id" => $userID,
                        "admin_user_menus.adm_menu_id" => $rows->admin_menu_id,
                    ];
                    if(!$this->_commonQueryModel->checkExistanceData('admin_user_menus',$where_user_menu)){
                        $menu_data = [
                            'user_id' => $userID ,
                            'adm_menu_id' => $rows->admin_menu_id ,
                            'assigned_by' => getLoggedInuserID()
                        ];
                        $this->db->insert('admin_user_menus', $menu_data); 
                    }

                    $this->insertParentMenusByChildren($rows->parent_menu_id,$userID);
                }
                else{
                    $where_user_menu = [
                        "admin_user_menus.user_id" => $userID,
                        "admin_user_menus.adm_menu_id" => $rows->admin_menu_id,
                    ];
                    if(!$this->_commonQueryModel->checkExistanceData('admin_user_menus',$where_user_menu)){
                        $menu_data = [
                            'user_id' => $userID ,
                            'adm_menu_id' => $rows->admin_menu_id ,
                            'assigned_by' => getLoggedInuserID()
                        ];
                        $this->db->insert('admin_user_menus', $menu_data); 
                    }
                }
                

            }
        }
		return $data;
      }
    


      function deletePrevAssignedMenuToUser($userid) {

        try {
            $where = [
                "admin_user_menus.user_id" => (int) $userid
            ];
            $this->db->trans_begin();
            
            $this->db->where($where);
            $this->db->delete('admin_user_menus'); 

           if ($this->db->trans_status() === FALSE)
           {
                $this->db->trans_rollback();
                return false;
           }
           else{
                $this->db->trans_commit();
                return true;
            }

        } catch (\Exception $e) {
            echo($e->getMessage());
        }

      }

    
      public function breadcrumbinfo($mainurl)
      {
            $data = [];
            $where = array('web_menu_master.url_slug' => $mainurl );
            $this->db->select("parent.name AS parent_menu,
                            web_menu_master.name AS current_menu")
                  ->from('web_menu_master')
                   ->join('web_menu_master as parent','parent.menu_id=web_menu_master.parent_menu_id','LEFT')
                  ->where($where)
                  ->limit(1);
            $query = $this->db->get();
            //echo $this->db->last_query();
            if($query->num_rows()> 0)
            {
                $row = $query->row();
                return $data = $row;
                
            }
            else
            {
                return $data;
            }
      }
        

}
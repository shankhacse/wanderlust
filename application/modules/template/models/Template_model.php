<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Template_model extends CI_Model  {
    
    public function __construct()
	{
	    parent::__construct();
	}

	public function getWebMenusByLang($table,$menu_for)
	{
		$data = array();
		$where_Ary = array(
			"web_menu_master.parent_menu_id" => "P",
			"web_menu_master.active" => 1,
			"web_menu_master.is_menu_enabled" => 1 ,
			"web_menu_master.menu_type" => $menu_for
		);
		
		$this->db->select("*")
				->from($table)
				->where($where_Ary)
				->order_by('web_menu_master.srl','ASC');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) 
		   {
			  foreach($query->result() as $rows)
			  {
					$data[] = array(
							"FirstLevelMenuData" => $rows,
							"secondLevelMenu" => $this->getSecondLevelMenu($rows->menu_id,$table,$menu_for) 
						 );
			 }
		   }
		   return $data;
	}
	
	public function getSecondLevelMenu($parentID,$table,$menu_for)
	{
		$data = array();
		$where_Ary = array(
			"web_menu_master.parent_menu_id" => $parentID,
			"web_menu_master.active" => 1,
			"web_menu_master.is_menu_enabled" => 1,
			"web_menu_master.menu_type" => $menu_for
		);
		
		$this->db->select("*")
				->from($table)
				->where($where_Ary)
				->order_by('web_menu_master.srl','ASC');
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		   {
				foreach($query->result() as $rows)
				{
					$data[] = array(
							"secondLevelMenuData" => $rows,
							//"thirdLevelMenu" => $this->getThirdLevelMenu($rows->menu_id,$table) 
						 );
				}
		   }
		   return $data;
	}



	public function getMenuByUser($userid=0) {
		$where_Ary = array(
			"adm_users.user_id" => $userid,
		);
	}
	
	





}
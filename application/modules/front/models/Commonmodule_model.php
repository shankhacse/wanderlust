<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Commonmodule_model extends CI_Model  {
 
    public function __construct()
	{
	    parent::__construct();
    }

    public function getRelatedMenusList($lang,$slugurl){
        $data = [];
        $sql = "SELECT `web_menu_master`.* FROM `web_menu_master` 
                WHERE web_menu_master.`parent_id` = 
                    (
                    SELECT 
                        `web_menu_master`.`parent_id` FROM 
                        `web_menu_master` WHERE `web_menu_master`.`url_slug` = '".$slugurl."'
        
                    )
                AND `web_menu_master`.`lang` = '".$lang."' 
                AND `web_menu_master`.`is_active` = 'Y' 
                ORDER BY `web_menu_master`.`menu_srl` ";

		    $query = $this->db->query($sql);
		
			if($query->num_rows()> 0)
			{
	          foreach($query->result() as $rows)
				{
					$data[] = $rows;
				}
	             
	        }
			
	        return $data;
    }


    
    public function getPageLayout($lang,$currurl){
        $data = [];
		$where_Ary = array(
		    "web_menu_master.is_active" => "Y",
            "page_template.lang" => $lang,
            'web_menu_master.url_slug' => $currurl
		);
		
		$this->db->select("*")
                ->from('page_template')
                ->join('web_menu_master','web_menu_master.menu_id = page_template.menu_link_id','INNER')
                ->where($where_Ary)
                    ->limit(1);
                
		$query = $this->db->get();
        
        if($query->num_rows() > 0) 
		   {
             $data = $query->row();
           }
		return $data;
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

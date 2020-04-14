<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Web_model extends CI_Model  {
    
    public function __construct()
	{
	    parent::__construct();
    }

    public function getHeaderHomePageSetting() {
        $data = [];
        $this->db->select("
            homepage_settings.home_title , 
            homepage_settings.home_logo
        ")
        ->from("homepage_settings");  
        $query = $this->db->get(); 
        if ($query->num_rows() > 0) 
		   {
            $data = $query->row();
           }
           return $data;
    }
}
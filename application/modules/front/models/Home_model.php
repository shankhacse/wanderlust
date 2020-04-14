<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model  {
    
    public function __construct()
	{
	    parent::__construct();
	}


	public function getHomepageSettingsData()
	{
		$data = array();
		$this->db->select("*")
				->from('homepage_settings')
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


	public function getAllKeyAnnouncement()
	{
		$where = array('announcement.is_active' => 1 );
		$data = array();
		$this->db->select("*")
				->from('announcement')
				->where($where);
		$query = $this->db->get();
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


	public function getAllUpcommingEvents()
	{
		$where = array('upcomming_events.is_active' => 1 );
		$data = array();
		$this->db->select("*")
				->from('upcomming_events')->where($where)->order_by("event_id","DESC")->limit(4);
		$query = $this->db->get();
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


	

	





}
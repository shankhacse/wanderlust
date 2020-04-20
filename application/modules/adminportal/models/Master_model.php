<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model{

	public function __construct()
	{
        parent::__construct();
        $this->load->model('adminportal/Auth_model', '_authModel',TRUE);
    }



    public function getAllRoomMasterList()
	{
		$data = array();
		$this->db->select("
							room_master.*,
							floor_master.floor_name,
							room_type.type
						")
				->from('room_master')
				->join('floor_master','floor_master.floor_id = room_master.floor_id','LEFT')
				->join('room_type','room_type.id = room_master.room_type_id','LEFT')
				;
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



public function getRoomRateList()
	{
		$data = array();
		$this->db->select("
							room_rate_details.*,
							room_master.room_no,
							package_type_master.package_name
						")
				->from('room_rate_details')
				->join('room_master','room_master.room_id = room_rate_details.room_id','LEFT')
				->join('package_type_master','package_type_master.package_type_id = room_rate_details.package_type_id','LEFT')
				;
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






} // end of class
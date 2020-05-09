<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Room_model extends CI_Model  {
    public function __construct()
	{
        parent::__construct();
      //  $this->load->model('Commonmodule_model', '_commonModel',TRUE);
    }

    public function getRoomsListBysearch($check_indt,$checkout_dt,$room_type){
  
		$data = [];
		$check_indt = date("Y-m-d",strtotime($check_indt));
		$checkout_dt = date("Y-m-d",strtotime($checkout_dt));

        $sql = "SELECT * FROM `room_master` 
		INNER JOIN room_type ON room_type.id = room_master.room_type_id
		INNER JOIN floor_master ON floor_master.floor_id = room_master.floor_id
		WHERE `room_master`.`room_id` NOT IN 
        (
            SELECT booking_details.`room_id` FROM booking_master 
            INNER JOIN booking_details ON booking_details.`booking_id` = booking_master.`id`
            WHERE booking_master.`check_in_dt` >= '".$check_indt."' AND booking_master.`check_out_dt` <= '".$checkout_dt."'
            
        )";

       
        $query = $this->db->query($sql);
       // echo $this->db->last_query();

        if($query->num_rows() > 0) 
		{
			foreach($query->result() as $rows)
			{
					  $data[] = [
						  "room" => $rows,
						  "room_facilities" => $this->getRoomFacilities($rows->room_id),
						  "room_gallery" => $this->getRoomGallery($rows->room_id),
						  "room_prices" => $this->getRoomPrices($rows->room_id),
					  ];
			}
        }
		return $data;
	}
	

	public function getRoomFacilities($roomid) {
		$data = [];
		$where = ["room_facilities.room_id" => $roomid];
		
		$this->db->select("*")
				->from('room_facilities')
				->join('facility_master','facility_master.facility_id = room_facilities.facility_id','INNER')
                ->where($where);
                
		$query = $this->db->get();
        if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {
                $data[] = $rows;
            }
        }
		return $data;
	}

	public function getRoomGallery($roomid) {
		$data = [];
		$where = ["room_gallery.room_id" => $roomid];
		
		$this->db->select("*")
				->from('room_gallery')
			    ->where($where);
                
		$query = $this->db->get();
        if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {
                $data[] = $rows;
            }
        }
		return $data;
	}


	public function getRoomPrices($roomid) {
		$data = [];
		$where = ["room_rate_details.room_id" => $roomid];
		
		$this->db->select("*")
				->from('room_rate_details')
				->join('package_type_master','package_type_master.package_type_id = room_rate_details.package_type_id','INNER')
				->where($where);
				
		$query = $this->db->get();
		if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {
                $data[] = $rows;
            }
        }
		return $data;
	}

	public function GetRoomDtl($roomid) {
		$data = [];
		$where = array('room_master.room_id'=>$roomid);

		$this->db->select("room_master.*,room_type.type,floor_master.floor_name")
				->from('room_master')
				->join('room_type','room_master.room_type_id = room_type.id','INNER')				
				->join('floor_master','room_master.floor_id = floor_master.floor_id','LEFT')				
                ->where($where);
                
		$query = $this->db->get();
        if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {
                $data[] = $rows;
            }
        }
		return $data;
	}

}
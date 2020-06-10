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
		
		$check_indt = date("Y-m-d",strtotime(str_replace('/', '-', $check_indt)));
		$checkout_dt = date("Y-m-d",strtotime(str_replace('/', '-', $checkout_dt)));
        
		if($room_type != 0){

       $sql = "SELECT * FROM `room_master` 
		INNER JOIN room_type ON room_type.id = room_master.room_type_id
		INNER JOIN floor_master ON floor_master.floor_id = room_master.floor_id
		WHERE `room_master`.`room_type_id` = '$room_type' AND `room_master`.`room_id` NOT IN 
        (
            SELECT booking_details.`room_id` FROM booking_master 
            INNER JOIN booking_details ON booking_details.`booking_id` = booking_master.`id`
            WHERE booking_master.`check_in_dt` >= '".$check_indt."' AND booking_master.`check_out_dt` <= '".$checkout_dt."'
            
        )";
       }else{
		$sql = "SELECT * FROM `room_master` 
		INNER JOIN room_type ON room_type.id = room_master.room_type_id
		INNER JOIN floor_master ON floor_master.floor_id = room_master.floor_id
		WHERE `room_master`.`room_id` NOT IN 
        (
            SELECT booking_details.`room_id` FROM booking_master 
            INNER JOIN booking_details ON booking_details.`booking_id` = booking_master.`id`
            WHERE booking_master.`check_in_dt` >= '".$check_indt."' AND booking_master.`check_out_dt` <= '".$checkout_dt."'
            
        )";
	   }
       
        $query = $this->db->query($sql);
        #echo $this->db->last_query();exit;

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

	// public function checkRoomAvaibility($checkin_dt,$checkout_dt,$room_type) {
	// 	$data = [];
	// 	$where = array('room_master.room_type_id'=>$room_type);

	// 	$this->db->select("room_master.room_id,
	// 						room_master.floor_id,
	// 						room_master.room_type_id,
	// 						room_master.max_adult,
	// 						room_master.max_child,
	// 						room_master.no_of_mattress,
	// 						room_master.each_mattress_price,
	// 						booking_details.room_id AS dtroomid,
	// 						booking_master.check_in_dt,
	// 						booking_master.check_out_dt")
	// 			->from('room_master')
	// 			->join('booking_details','room_master.room_id = booking_details.room_id','LEFT')				
	// 			->join('booking_master','booking_details.booking_id = booking_master.id 
	// 			        AND booking_master.check_in_dt NOT BETWEEN '.$checkin_dt.' 
	// 					AND '.$checkout_dt.' 
	// 					AND booking_master.check_out_dt NOT BETWEEN '.$checkin_dt.' 
	// 					AND '.$checkout_dt.' 
	// 					AND '.$checkin_dt.' NOT BETWEEN booking_master.check_in_dt 
	// 					AND booking_master.check_out_dt 
	// 					AND '.$checkout_dt.' NOT BETWEEN booking_master.check_in_dt 
	// 					AND booking_master.check_out_dt','LEFT')				
	// 			->where($where)
	// 			->where('booking_details.`room_id` IS NULL');
                
	// 	$query = $this->db->get();
    //     if($query->num_rows() > 0) 
	// 	{
    //         foreach($query->result() as $rows)
    //         {
    //             $data[] = $rows;
    //         }
    //     }
	// 	return $data;
	// }


	public function checkRoomAvaibility($checkin_dt,$checkout_dt,$room_type,$package) {
		$data = [];
		$where = array('room_master.room_type_id'=>$room_type);

		$sql = "SELECT 
					`room_master`.`room_id`,
					room_master.`floor_id`,
					room_master.`room_type_id`,
					room_master.`max_adult`,
					room_master.`max_child`,
					room_master.`no_of_mattress`,
					room_master.`each_mattress_price`,
					booking_details.`room_id` AS dtroomid,
					room_type.`type`,
					room_rate_details.`rate`,
                    package_type_master.`package_name`	  
					FROM
						room_master 
						LEFT JOIN `booking_details` 
						ON room_master.`room_id` = booking_details.`room_id` 
						LEFT JOIN `booking_master` 
						ON booking_details.`booking_id` = booking_master.`id` 
						AND booking_master.`check_in_dt` NOT BETWEEN '.$checkin_dt.' 
						AND '.$checkout_dt.' 
						AND booking_master.`check_out_dt` NOT BETWEEN '.$checkin_dt.' 
						AND '.$checkout_dt.' 
						AND '.$checkin_dt.' NOT BETWEEN booking_master.`check_in_dt` 
						AND booking_master.`check_out_dt` 
						AND '.$checkout_dt.' NOT BETWEEN booking_master.`check_in_dt` 
						AND booking_master.`check_out_dt`
						LEFT JOIN `room_rate_details`
						ON  room_rate_details.`room_id` = room_master.`room_id` AND room_rate_details.`package_type_id` = '$package'
						LEFT JOIN `package_type_master`
						ON room_rate_details.`package_type_id` = package_type_master.`package_type_id`
						LEFT JOIN `room_type`
                        ON room_master.`room_type_id` =  room_type.`id`
					    WHERE room_master.`room_type_id` = '$room_type' AND  booking_details.`room_id` IS NULL AND room_rate_details.`rate` <> 'NULL' LOCK IN SHARE MODE";

       
		$query = $this->db->query($sql);
		//echo $this->db->last_query();exit;
        if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {
                $data[] = $rows;
            }
        }
		return $data;
	}

	public function BeforebookingcheckRoomAvaibility($checkin_dt,$checkout_dt,$room_type,$package,$roomIds) {
		$data = [];
		$where = array('room_master.room_type_id'=>$room_type);

		$sql = "SELECT 
					`room_master`.`room_id`,
					room_master.`floor_id`,
					room_master.`room_type_id`,
					room_master.`max_adult`,
					room_master.`max_child`,
					room_master.`no_of_mattress`,
					room_master.`each_mattress_price`,
					booking_details.`room_id` AS dtroomid,
					room_type.`type`,
					room_rate_details.`rate`,
                    package_type_master.`package_name`	  
					FROM
						room_master 
						LEFT JOIN `booking_details` 
						ON room_master.`room_id` = booking_details.`room_id` 
						LEFT JOIN `booking_master` 
						ON booking_details.`booking_id` = booking_master.`id` 
						AND booking_master.`check_in_dt` NOT BETWEEN '.$checkin_dt.' 
						AND '.$checkout_dt.' 
						AND booking_master.`check_out_dt` NOT BETWEEN '.$checkin_dt.' 
						AND '.$checkout_dt.' 
						AND '.$checkin_dt.' NOT BETWEEN booking_master.`check_in_dt` 
						AND booking_master.`check_out_dt` 
						AND '.$checkout_dt.' NOT BETWEEN booking_master.`check_in_dt` 
						AND booking_master.`check_out_dt`
						LEFT JOIN `room_rate_details`
						ON  room_rate_details.`room_id` = room_master.`room_id` AND room_rate_details.`package_type_id` = '$package'
						LEFT JOIN `package_type_master`
						ON room_rate_details.`package_type_id` = package_type_master.`package_type_id`
						LEFT JOIN `room_type`
                        ON room_master.`room_type_id` =  room_type.`id`
					    WHERE room_master.`room_type_id` = '$room_type' AND  booking_details.`room_id`  IN($roomIds)";

       
		$query = $this->db->query($sql);
		//echo $this->db->last_query();exit;
        if($query->num_rows() > 0) 
		{
            foreach($query->result() as $rows)
            {
                $data[] = $rows;
            }
        }
		return $data;
	}


	public function GetBookingRefCode($module){
        $lastnumber = (int)(0);
        $tag = "";
        $noofpaddingdigit = (int)(0);
        $autoSaleNo="";
       
        $sql="SELECT
                id,
                SERIAL,
                moduleTag,
                lastnumber,
                noofpaddingdigit,
                module,                
                booking_type
            FROM serial_master
            WHERE module='".$module."' LOCK IN SHARE MODE";
        
                  $query = $this->db->query($sql);
      if ($query->num_rows() > 0) {
        $row = $query->row(); 
        $lastnumber = $row->lastnumber;
                          $tag = $row->moduleTag;
                          $noofpaddingdigit = $row->noofpaddingdigit;
                                                  
                          
      }
          $digit = (int)(log($lastnumber,10)+1) ;  
        if($digit==3){
            $autoSaleNo = $tag."0".$lastnumber;
        }elseif($digit==2){
            $autoSaleNo = $tag."00".$lastnumber;
        }elseif($digit==1){
            $autoSaleNo = $tag."000".$lastnumber;
        }else{
           $autoSaleNo = $tag.$lastnumber;
        }
        $lastnumber = $lastnumber + 1;
        
        //update
        $data = array(
        'serial' => $lastnumber,
        'lastnumber' => $lastnumber
        );
        $array = array('module' => $module);
        $this->db->where($array); 
        $this->db->update('serial_master', $data);
        
        return $autoSaleNo;
        
	}
	
	public function getmemberdtl($memberid)
	{
		$data = array();
		$where = array('id'=>$memberid);
		$this->db->select("name,mobile_no,address,city,state,pincode")
				->from('member_master')
				->where($where)
				->limit(1);
		$query = $this->db->get();
		
		// echo $this->db->last_query();
		// echo "<br>";
		
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
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bookingmodel extends CI_Model{

	

    public function getAllBookingList()
	{
		$data = array();
		$this->db->select(" booking_master.*,
                            member_master.member_code,
                            package_type_master.package_name,
                            SUM(booking_details.`no_of_mattress`) AS total_mattress
						
						")
				->from('booking_master')
                ->join('member_master','booking_master.member_id = member_master.id','INNER')
                ->join('package_type_master','booking_master.package_type_id = package_type_master.package_type_id','INNER')
                ->join('booking_details','booking_master.id = booking_details.booking_id','INNER')
                ->group_by('booking_master.id')
				->order_by('booking_master.id','DESC');
        $query = $this->db->get();
       #echo $this->db->last_query();exit;
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
    public function getAllRoomDtl($booking_id)
	{
        $data = array();
        $where = array('booking_master.id'=>$booking_id);
		$this->db->select(" booking_details.*,
                            room_master.`room_no`,
                            room_master.each_mattress_price,
                            booking_master.package_type_id,
                            room_rate_details.rate 
						
						")
				->from('booking_master')
                ->join('booking_details','booking_master.id = booking_details.booking_id','INNER')
                ->join('room_master','booking_details.room_id = room_master.room_id','INNER')
                ->join('room_rate_details','booking_details.room_id = room_rate_details.room_id AND booking_master.package_type_id = room_rate_details.package_type_id','INNER')
			    ->where($where);
        $query = $this->db->get();
      // echo $this->db->last_query();exit;
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

    public function BookingConfirmOrNot($bookingId,$is_confirm)
    {
        $where=[
            'id'=>$bookingId
        ];
        $data=[
            'is_confirm'=>$is_confirm,
            
        ];
        try {
            $this->db->trans_begin();
            //$this->db->where($where);
			$this->db->update('booking_master', $data,$where);
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
    
}
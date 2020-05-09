<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Signupmodel extends CI_Model  {
    
    public function __construct()
	{
	    parent::__construct();
    }
    
   public function GetNewMemberCode($module){
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

}
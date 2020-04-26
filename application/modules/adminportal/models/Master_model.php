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




	public function insertIntoRoomImage($data)
	{ 
		
		if($data['mode']=="EDIT" && $data['roomID']>0)
		{

			$where_image = array(
				"room_gallery.room_id" => $data['roomID'],
				
				);

				$this->db->where($where_image);
				$this->db->delete('room_gallery'); 

		}

		//$dir = APPPATH . 'assets/document/trainerUpload/'; //FCPATH . '/posts';
		//$dir = APPPATH . 'assets/application_extension/';
		//$dir1 = $_SERVER['DOCUMENT_ROOT'].'/img';

		//$dir1 = $_SERVER['DOCUMENT_ROOT'].'/assets/img/room'; //server

		$dir1 = $_SERVER['DOCUMENT_ROOT'].'/wanderlust/assets/img/room'; //local
		
		//echo "<br>";
		//echo "Document ROOT : ". $dir ='http://prosikshan.in/images';
		//exit;
		
		$config = array(
			'upload_path' => $dir1,
			'allowed_types' => 'docx|doc|pdf|jpg|png|txt|xls|xlsx',
			'max_size' => '5120', // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_filename' => '255',
			'encrypt_name' => TRUE,
			);

		$this->load->library('upload', $config);
		$images = array();
        $detail_array = array();	
       $count_docs = sizeof($data['docFile']['fileName']['name']);
       $srl_no=1;
       	for($i=0;$i<sizeof($data['docFile']['fileName']['name']);$i++)
        {
      		$_FILES['images[]']['name']= $_FILES['fileName']['name'][$i];
            $_FILES['images[]']['type']= $_FILES['fileName']['type'][$i];
            $_FILES['images[]']['tmp_name']= $_FILES['fileName']['tmp_name'][$i];
            $_FILES['images[]']['error']= $_FILES['fileName']['error'][$i];
            $_FILES['images[]']['size']= $_FILES['fileName']['size'][$i];
			$this->upload->initialize($config);
			if ($this->upload->do_upload('images[]'))
			{
               $file_detail = $this->upload->data();
               $file_name = $file_detail['file_name']; 
               $detail_array =array(
					"room_id" => $data['roomID'],
					"thumbnail" => $file_name,
					"large_image" => $file_name,
					
				); 

             	$this->db->insert('room_gallery',$detail_array);	
             	#echo $this->db->last_query();
            }
        }

        // If File Not Changed Then insert Info
        $countChanged = sizeof($data['isFileChanged']);

       // echo "Count Changed ".$countChanged;
      //  exit;

        for($k=0;$k<$countChanged;$k++)
        {
        	$detail_array_edit = array();

        	if($data['isFileChanged'][$k]=="N")
        	{   
				$detail_array_edit =array(
					
					"room_id" => $file_name,
					"thumbnail" => $file_name,
					"large_image" => $file_name,
					
				); 
				
				$this->db->insert('room_gallery',$detail_array_edit);
				#echo $this->db->last_query();	
			}
        }

	}






} // end of class
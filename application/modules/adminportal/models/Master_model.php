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
				$data[] = array(
					          'room_id'=>$rows->room_id,
					          'floor_name'=> $rows->floor_name,
							  'room_type'=> $rows->type,
							  'room_no'=>$rows->room_no,
							  'price'=>$this->getRmRateList($rows->room_id)
							);
            }
            return $data;
             
        }
		else
		{
             return $data;
         }
	}

public function getRmRateList($room_id)
	{
		$data = array();
		$this->db->select("package_type_master.package_name,room_rate_details.rate")
				->from('room_rate_details')
				->join('package_type_master','room_rate_details.package_type_id = package_type_master.package_type_id','LEFT')
				->where('room_id',$room_id);
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

	// public function insertIntoRoomImage($data)
	// { 
	// 	print_r($data);exit;
	// 	if($data['mode']=="EDIT" && $data['roomID']>0)
	// 	{

	// 		$where_image = array(
	// 			"room_gallery.room_id" => $data['roomID'],
				
	// 			);

	// 			$this->db->where($where_image);
	// 			$this->db->delete('room_gallery'); 

	// 	}

	// 	//$dir = APPPATH . 'assets/document/trainerUpload/'; //FCPATH . '/posts';
	// 	//$dir = APPPATH . 'assets/application_extension/';
	// 	//$dir1 = $_SERVER['DOCUMENT_ROOT'].'/img';

	// 	//$dir1 = $_SERVER['DOCUMENT_ROOT'].'/assets/img/room'; //server

	// $dir1 = $_SERVER['DOCUMENT_ROOT'].'/wanderlust/assets/img/room'; //local
	// //	$dir1 = APPPATH.'assets/img/room'; 
		
	
	// 	$config = array(
	// 		'upload_path' => $dir1,
	// 		'allowed_types' => 'jpg|png|jpeg|gif',
	// 		'max_size' => '5120', // Can be set to particular file size , here it is 2 MB(2048 Kb)
	// 		'max_filename' => '255',
	// 		'encrypt_name' => TRUE,
	// 		);

	// 	$this->load->library('upload', $config);
	// 	$images = array();
    //     $detail_array = array();	
    //    $count_docs = sizeof($data['docFile']['fileName']['name']);
    //    $srl_no=1;
    //    	for($i=0;$i<sizeof($data['docFile']['fileName']['name']);$i++)
    //     {
    //   		$_FILES['images[]']['name']= $_FILES['fileName']['name'][$i];
    //         $_FILES['images[]']['type']= $_FILES['fileName']['type'][$i];
    //         $_FILES['images[]']['tmp_name']= $_FILES['fileName']['tmp_name'][$i];
    //         $_FILES['images[]']['error']= $_FILES['fileName']['error'][$i];
    //         $_FILES['images[]']['size']= $_FILES['fileName']['size'][$i];
	// 		$this->upload->initialize($config);
	// 		if ($this->upload->do_upload('images[]'))
	// 		{
    //            $file_detail = $this->upload->data();
    //            $file_name = $file_detail['file_name']; 
    //            $detail_array =array(
	// 				"room_id" => $data['roomID'],
	// 				"thumbnail" => $file_name,
	// 				"large_image" => $file_name,
					
	// 			); 

    //          	$this->db->insert('room_gallery',$detail_array);	
    //          	#echo $this->db->last_query();
    //         }
    //     }

    //     // If File Not Changed Then insert Info
    //     $countChanged = sizeof($data['isFileChanged']);

    //    // echo "Count Changed ".$countChanged;
    //   //  exit;

    //     for($k=0;$k<$countChanged;$k++)
    //     {
    //     	$detail_array_edit = array();

    //     	if($data['isFileChanged'][$k]=="N")
    //     	{   
	// 			$detail_array_edit =array(
					
	// 				"room_id" => $file_name,
	// 				"thumbnail" => $file_name,
	// 				"large_image" => $file_name,
					
	// 			); 
				
	// 			$this->db->insert('room_gallery',$detail_array_edit);
	// 			#echo $this->db->last_query();	
	// 		}
    //     }

	// }


//added by anil on 01-05-2020

public function insertIntoRoomImage($data,$gallerydelIDs)
	{ 
			if($data['mode']=="EDIT" && $data['roomID']>0)
		{
			 
				$this->db->where_in('room_gallery.id',explode(',',$gallerydelIDs));
				$this->db->delete('room_gallery'); 
				
		}
		
	$dir1 = $_SERVER['DOCUMENT_ROOT'].'/wanderlust/assets/img/room'; //local
	//	$dir1 = APPPATH.'assets/img/room'; 
		
	   
		$config = array(
			'upload_path' => $dir1,
			'allowed_types' => 'jpg|png|jpeg|gif',
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
			 if($data['galleryIDs'][$i] != 0 && $_FILES['fileName']['name'][$i] != ''){

				list($width, $height, $type, $attr) = getimagesize($_FILES['fileName']['tmp_name'][$i]);

				$new_width = 750;
				$new_height = 500;
				$src = imagecreatefromstring( file_get_contents($_FILES['fileName']['tmp_name'][$i]));
				$dst = imagecreatetruecolor($new_width, $new_height);
				imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				imagedestroy( $src );
				imagejpeg($dst,$_FILES['fileName']['tmp_name'][$i]); // adjust format as needed
				imagedestroy( $dst );
             
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
					"thumbnail" => $file_name,
					"large_image" => $file_name,
					
				); 

			}
			
			$where_image = array(
							"room_gallery.id" => $data['galleryIDs'][$i],
							
							);
			 $this->db->where($where_image);
            $this->db->update('room_gallery',$detail_array); 
             		
            #echo $this->db->last_query();
            }else if($data['galleryIDs'][$i] == 0 && $_FILES['fileName']['name'][$i] != ''){

				list($width, $height, $type, $attr) = getimagesize($_FILES['fileName']['tmp_name'][$i]);

				$new_width = 750;
				$new_height = 500;
				$src = imagecreatefromstring( file_get_contents($_FILES['fileName']['tmp_name'][$i]));
				$dst = imagecreatetruecolor($new_width, $new_height);
				imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				imagedestroy( $src );
				imagejpeg($dst,$_FILES['fileName']['tmp_name'][$i]); // adjust format as needed
				imagedestroy( $dst );

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

			}
			$this->db->insert('room_gallery',$detail_array);
			}
        }

       
	}
public function UploadRoomCoverImage($data,$coverphoto)
	{ 
		
		
  if($_FILES['room_cover_image']['name'] != ''){
	
	$dir1 = $_SERVER['DOCUMENT_ROOT'].'/wanderlust/assets/img/room/cover-photo'; //local
	//	$dir1 = APPPATH.'assets/img/room'; 
		
	
		$config = array(
			'upload_path' => $dir1,
			'allowed_types' => 'jpg|png|jpeg|gif',
			'max_size' => '5120', // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_filename' => '255',
			'encrypt_name' => TRUE,
			);

		$this->load->library('upload', $config);
		$images = array();
        $detail_array = array();	
       $count_docs = sizeof($data['docFile']['room_cover_image']['name']);
	   //$srl_no=1;
	   //$tfilename = $_FILES['room_cover_image']['tmp_name'];
	   list($width, $height, $type, $attr) = getimagesize($_FILES['room_cover_image']['tmp_name']);

	   $new_width = 750;
	   $new_height = 500;
	   $src = imagecreatefromstring( file_get_contents($_FILES['room_cover_image']['tmp_name']));
	   $dst = imagecreatetruecolor($new_width, $new_height);
	   imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	   imagedestroy( $src );
       imagejpeg($dst,$_FILES['room_cover_image']['tmp_name']); // adjust format as needed
       imagedestroy( $dst );
	   
		//list($width, $height, $type, $attr) = getimagesize($_FILES['room_cover_image']['tmp_name']);
		
      		$_FILES['images']['name']= $_FILES['room_cover_image']['name'];
            $_FILES['images']['type']= $_FILES['room_cover_image']['type'];
            $_FILES['images']['tmp_name']= $_FILES['room_cover_image']['tmp_name'];
            $_FILES['images']['error']= $_FILES['room_cover_image']['error'];
            $_FILES['images']['size']= $_FILES['room_cover_image']['size'];
			$this->upload->initialize($config);
		
			if ($this->upload->do_upload('images'))
			{
				
			   $file_detail = $this->upload->data();			 
               $file_name = $file_detail['file_name']; 
			   return $file_name;
            }
       
		}else{
			return $file_name = $coverphoto;
		} 

	}

	public function getAllroompackageList($roomID)
	{
		$data = array();
		$this->db->select("
							room_rate_details.*,						
							package_type_master.package_name
						")
				->from('room_rate_details')				
				->join('package_type_master','room_rate_details.package_type_id = package_type_master.package_type_id','LEFT')
				->where('room_rate_details.room_id',$roomID);
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
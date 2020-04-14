<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Masters extends MY_Controller {

    function __construct() {
        parent::__construct();
       $this->load->model('Auth_model', '_authModel',TRUE);
       $this->load->model('Commonmodule_model', '_commonModel',TRUE);
       $this->load->model('Commondata_model', 'commondata_model',TRUE);
       $this->load->model('master_model', 'master_model',TRUE);
       $this->load->module('template');
    }

    public function hotels()
	{
		if($this->_authModel->is_logged_in()) 
		{
			
			$data['hotelList'] = $this->commondata_model->getAllDropdownData('hotels_master');
            $data['view_file'] = 'masters/hotels/list';
            $this->template->admin_template($data);
		}
		else
		{
			redirect('adminpanel','refresh');
		}
    } 
    
    public function addhotels()
	{
		if($this->_authModel->is_logged_in()) 
		{
			$data['view_file'] = 'masters/hotels/add';
            $this->template->admin_template($data);
		}
		else
		{
			redirect('adminpanel','refresh');
		}
    } 
    
    public function update_hotels()
	{
		if($this->_authModel->is_logged_in())
		{
			$formData = $this->input->post('formDatas');
			parse_str($formData, $dataArry);


			//pre($dataArry);
			$name = trim(htmlspecialchars($dataArry['name']));
			$gstin = trim(htmlspecialchars($dataArry['gstin']));
			$contactno = trim(htmlspecialchars($dataArry['contactno']));
			$email = trim(htmlspecialchars($dataArry['email']));
			$address = trim(htmlspecialchars($dataArry['address']));
			$description = trim(htmlspecialchars($dataArry['description']));
			$pincode = trim(htmlspecialchars($dataArry['pincode']));
			$state = trim(htmlspecialchars($dataArry['state']));


			$insert_arry = [
				"name" => $name,
				"gstin" => $gstin,
				"contactno" => $contactno,
				"email" => $email,
				"address" => $address,
				"description" => $description,
				"pincode" => $pincode,
				"state" => $state,
				"created_by" => 1
			];

			$insert = $this->_commonQueryModel->insertSingleTableData('hotels_master',$insert_arry);

			if($insert){
				$json_response = [
					"STATUS" => 1,
					"MSG" => SAVE_SUCCESS
				];
			}
			else {
				$json_response = [
					"STATUS" => 0,
					"MSG" => SAVE_ERROR
				];
			}

            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;

		}
		else
		{
			redirect('adminpanel','refresh');
		}
	} 






	public function roomtype()
	{
		if($this->_authModel->is_logged_in()) 
		{
			
			$data['roomtypeList'] = $this->commondata_model->getAllDropdownData('room_type');
            $data['view_file'] = 'masters/room_type/room_type_list';
            $this->template->admin_template($data);
		}
		else
		{
			redirect('adminpanel','refresh');
		}
    } 




    public function addRoomtype(){
        
      
        if($this->_authModel->is_logged_in()) 
		{

		
			if($this->uri->segment(4) == NULL)
			{
				$data['mode'] = "ADD";
				$data['btnText'] = "Save";
				$data['btnTextLoader'] = "Saving...";
                $roomtypeID = 0;
                $data['roomtypeID'] = $roomtypeID;
				$data['roomtypeEditdata'] = [];
				
				
				//getAllRecordWhereOrderBy($table,$where,$orderby)

			}
			else
			{
				$data['mode'] = "EDIT";
				$data['btnText'] = "Update";
				$data['btnTextLoader'] = "Updating...";
                $roomtypeID = $this->uri->segment(4);
                $data['roomtypeID'] = $roomtypeID;
                
				$whereAry = [
                    'room_type.id' => $roomtypeID
                ];

				// getSingleRowByWhereCls(tablename,where params)
				 $data['roomtypeEditdata'] = $this->commondata_model->getSingleRowByWhereCls('room_type',$whereAry); 
					//pre($data['roomtypeEditdata']);exit;
				
			}

               

			$data['view_file'] = 'masters/room_type/room_type_add_edit.php';
            $this->template->admin_template($data);
		}
		else
		{
			redirect('adminpanel','refresh');
        }
        

    }



    public function roomtype_action() {

      
		 if($this->_authModel->is_logged_in()) 
		{
			$json_response = array();
			$formData = $this->input->post('formDatas');
			parse_str($formData, $dataArry);

		
			$roomtypeID = trim(htmlspecialchars($dataArry['roomtypeID']));
			$mode = trim(htmlspecialchars($dataArry['mode']));

            $room_type = trim(htmlspecialchars($dataArry['room_type']));
            $code = trim(htmlspecialchars($dataArry['code']));

				if($roomtypeID>0 && $mode=="EDIT")
				{
					/*  EDIT MODE
					 *	-----------------
					*/

					$upd_where = array('room_type.id' =>$roomtypeID);

                    $upd_array = array(
                        'type' => $room_type,
                                            'code' => $code,
                       
                       
                     );

                        $update = $this->commondata_model->updateSingleTableData('room_type',$upd_array,$upd_where);
					
					
					if($update)
					{
						$json_response = [
								"STATUS" => 1,
								"MSG" => UPDATE_SUCCESS
							];
					}
					else
					{
						$json_response = [
								"STATUS" => 0,
								"MSG" => UPDATE_ERROR
							];
					}



				} // end if mode
				else
				{
					/*  ADD MODE
					 *	-----------------
					*/

                    $insert_array = array(
                                            'type' => $room_type,
                                            'code' => $code,
                                         
                                         );
			
					$insertData = $this->commondata_model->insertSingleTableData('room_type',$insert_array);
					

					if($insertData)
					{
						$json_response = [
							"STATUS" => 1,
							"MSG" => SAVE_SUCCESS
						];
					}
					else
					{
						$json_response = [
							"STATUS" => 0,
							"MSG" => SAVE_ERROR
						];
					}

				} // end add mode ELSE PART


			header('Content-Type: application/json');
			echo json_encode( $json_response );
			exit;

			

		}
		else
		{
			redirect('adminpanel','refresh');
		}
	} 


public function room()
	{
		if($this->_authModel->is_logged_in()) 
		{
			
			$data['roomList'] = $this->master_model->getAllRoomMasterList();
            $data['view_file'] = 'masters/room/room_list';
            $this->template->admin_template($data);
		}
		else
		{
			redirect('adminpanel','refresh');
		}
    } 



  public function addRoom(){
        
      
        if($this->_authModel->is_logged_in()) 
		{

		
			if($this->uri->segment(4) == NULL)
			{
				$data['mode'] = "ADD";
				$data['btnText'] = "Save";
				$data['btnTextLoader'] = "Saving...";
                $roomtypeID = 0;
                $data['roomID'] = $roomtypeID;
				$data['roomEditdata'] = [];
				
				
				//getAllRecordWhereOrderBy($table,$where,$orderby)

			}
			else
			{
				$data['mode'] = "EDIT";
				$data['btnText'] = "Update";
				$data['btnTextLoader'] = "Updating...";
                $roomID = $this->uri->segment(4);
                $data['roomID'] = $roomID;
                
				$whereAry = [
                    'room_master.room_id' => $roomID
                ];

				// getSingleRowByWhereCls(tablename,where params)
				 $data['roomEditdata'] = $this->commondata_model->getSingleRowByWhereCls('room_master',$whereAry); 
					//pre($data['roomEditdata']);exit;
				
			}

			$data['floorList'] = $this->commondata_model->getAllDropdownData('floor_master');
			$data['roomtypeList'] = $this->commondata_model->getAllDropdownData('room_type');

               

			$data['view_file'] = 'masters/room/room_add_edit.php';
            $this->template->admin_template($data);
		}
		else
		{
			redirect('adminpanel','refresh');
        }
        

    }


public function room_action() {

      
		 if($this->_authModel->is_logged_in()) 
		{
			$json_response = array();
			$formData = $this->input->post('formDatas');
			parse_str($formData, $dataArry);

		
			$roomID = trim(htmlspecialchars($dataArry['roomID']));
			$mode = trim(htmlspecialchars($dataArry['mode']));

            $sel_floor = $dataArry['sel_floor'];
            $sel_roomtype = $dataArry['sel_roomtype'];
            $room_no = $dataArry['room_no'];
            $short_desc = $dataArry['short_desc'];
            $price = $dataArry['price'];
            $full_desc = $dataArry['full_desc'];
            $max_adult = $dataArry['max_adult'];
            $max_child = $dataArry['max_child'];

				if($roomID>0 && $mode=="EDIT")
				{
					/*  EDIT MODE
					 *	-----------------
					*/

					$upd_where = array('room_master.room_id' =>$roomID);

                    $upd_array = array(
                        				'floor_id' => $sel_floor,
                                        'room_type_id' => $sel_roomtype,
                                        'room_no' => $room_no,
                                        'room_short_desc' => $short_desc,
                                        'full_desc' => $full_desc,
                                        'price' => $price,
                                        'max_adult' => $max_adult,
                                        'max_child' => $max_child,
                                    
                       
                       
                     );

                        $update = $this->commondata_model->updateSingleTableData('room_master',$upd_array,$upd_where);
					
					
					if($update)
					{
						$json_response = [
								"STATUS" => 1,
								"MSG" => UPDATE_SUCCESS
							];
					}
					else
					{
						$json_response = [
								"STATUS" => 0,
								"MSG" => UPDATE_ERROR
							];
					}



				} // end if mode
				else
				{
					/*  ADD MODE
					 *	-----------------
					*/

                    $insert_array = array(
                    	                'floor_id' => $sel_floor,
                                        'room_type_id' => $sel_roomtype,
                                        'room_no' => $room_no,
                                        'room_short_desc' => $short_desc,
                                        'full_desc' => $full_desc,
                                        'price' => $price,
                                        'max_adult' => $max_adult,
                                        'max_child' => $max_child,
                                        'created_on' => date('Y-m-d'),
                                         
                                         );
			
					$insertData = $this->commondata_model->insertSingleTableData('room_master',$insert_array);
					

					if($insertData)
					{
						$json_response = [
							"STATUS" => 1,
							"MSG" => SAVE_SUCCESS
						];
					}
					else
					{
						$json_response = [
							"STATUS" => 0,
							"MSG" => SAVE_ERROR
						];
					}

				} // end add mode ELSE PART


			header('Content-Type: application/json');
			echo json_encode( $json_response );
			exit;

			

		}
		else
		{
			redirect('adminpanel','refresh');
		}
	} 







} // end of class

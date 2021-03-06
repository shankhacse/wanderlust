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
			//pre($data['roomList']);exit;
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
				$data['roomserviceEditdata'] = [];
				$data['roompackageList'] = [];
				$data['studentDocumenDtl'] = [];
				
				
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

				 $where_fac = array('room_facilities.room_id' => $roomID );
				 $data['roomserviceEditdata'] = $this->commondata_model->getAllRecordWhere('room_facilities',$where_fac);
			
				
				 $data['roompackageList'] = $this->master_model->getAllroompackageList($roomID);

				  //pre($data['roompackageList']);exit;

				 $where_gal = array('room_id' => $roomID );
				 $data['studentDocumenDtl'] = $this->commondata_model->getAllRecordWhere('room_gallery',$where_gal);
					//pre($data['studentDocumenDtl']);exit;
			}

			$data['floorList'] = $this->commondata_model->getAllDropdownData('floor_master');
			$data['roomtypeList'] = $this->commondata_model->getAllDropdownData('room_type');
			$data['facilityList'] = $this->commondata_model->getAllDropdownData('facility_master');
			$data['packageList'] = $this->commondata_model->getAllDropdownData('package_type_master');

          

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
			

		
			$roomID = trim($this->input->post('roomID'));
			$mode = trim($this->input->post('mode'));

            $sel_floor = $this->input->post('sel_floor');
            $sel_roomtype = $this->input->post('sel_roomtype');
            $room_no = $this->input->post('room_no');
            $short_desc = $this->input->post('short_desc');
            //$price = $dataArry['price'];
            $full_desc = $this->input->post('full_desc');
            $max_adult = $this->input->post('max_adult');
            $max_child = $this->input->post('max_child');
            $sel_facility = $this->input->post('sel_facility');
            $packagetypeidid = $this->input->post('packagetypeidid');
            $listamount = $this->input->post('listamount');
            $userFilename = $this->input->post('userFileName');
            $docFile =  $_FILES;

			   $isFileChanged = $this->input->post('isChangedFile');
			   //adde by anil on 01-05-2020

			   $cover_photo = $this->input->post('cover_photo');
			   $galleryIDs = $this->input->post('galleryIDs');
			   $gallerydelIDs = $this->input->post('gallerydelIDs');
			   $no_of_mattress = $this->input->post('no_of_mattress');
			   $each_mattress_price = $this->input->post('each_mattress_price');
			   $maximum_no_person = $this->input->post('maximum_no_person');
				
             // pre($cover_photo);exit;


           
				if($roomID>0 && $mode=="EDIT")
				{
					/*  EDIT MODE
					 *	-----------------
					*/
					$coverimageData = array(				
						 'docFile' => $docFile						 
						
					  );
			//
			/* image upload */

			      $cover_photo = $this->master_model->UploadRoomCoverImage($coverimageData,$cover_photo);
				 //pre($cover_photo);exit;
					$upd_where = array('room_master.room_id' =>$roomID);

                    $upd_array = array(
                        				'floor_id' => $sel_floor,
                                        'room_type_id' => $sel_roomtype,
                                        'room_no' => $room_no,
                                        'room_short_desc' => $short_desc,
                                        'full_desc' => $full_desc,
                                       
                                        'max_adult' => $max_adult,
										'max_child' => $max_child,
										'cover_photo'=> $cover_photo,
										'no_of_mattress'=>$no_of_mattress,
										'each_mattress_price'=>$each_mattress_price,
										'maximum_no_person'=>$maximum_no_person
                                    
                       
                       
                     );

                   $update = $this->commondata_model->updateSingleTableData('room_master',$upd_array,$upd_where);


                    if (isset($sel_facility)) {

                    	$where_del = array('room_facilities.room_id' =>$roomID );

                    	$this->commondata_model->deleteTableData('room_facilities',$where_del);
					
					for ($i=0; $i < count($sel_facility); $i++) { 

						$insert_array = array(
                    	                'room_id' => $roomID,
                                        'facility_id' => $sel_facility[$i],
                                         );
			
					   $insertData2 = $this->commondata_model->insertSingleTableData('room_facilities',$insert_array);
						

					}

				}



				/* package type with rate */

				if (isset($packagetypeidid)) {

						$where_del = array('room_rate_details.room_id' =>$roomID );

                    	$this->commondata_model->deleteTableData('room_rate_details',$where_del);
					
					for ($i=0; $i < count($packagetypeidid); $i++) { 

						$insert_array_pac = array(
                    	                'room_id' => $roomID,
                                        'rate' => $listamount[$i],
                                        'package_type_id' => $packagetypeidid[$i],
                                         );
			
					   $insertData3 = $this->commondata_model->insertSingleTableData('room_rate_details',$insert_array_pac);
						

					}


				}

				$imageData = array(
            					'mode' => $mode, 
            					'roomID' => $roomID, 
            					'userFilename' => $userFilename, 
            					'docFile' => $docFile, 
								'isFileChanged' => $isFileChanged,
								'galleryIDs'=>$galleryIDs 
            				  );
					
					/* image upload */

					$this->master_model->insertIntoRoomImage($imageData,$gallerydelIDs);
					
					
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
					$coverimageData = array(				
						'docFile' => $docFile, 
					   
					 );
		   //print_r($coverimageData);exit;
		   /* image upload */

				 $cover_photo = $this->master_model->UploadRoomCoverImage($coverimageData,$cover_photo);
                    $insert_array = array(
                    	                'floor_id' => $sel_floor,
                                        'room_type_id' => $sel_roomtype,
                                        'room_no' => $room_no,
                                        'room_short_desc' => $short_desc,
                                        'full_desc' => $full_desc,
                                       
                                        'max_adult' => $max_adult,
                                        'max_child' => $max_child,
										'created_on' => date('Y-m-d'),
										'cover_photo'=> $cover_photo,
										'no_of_mattress'=>$no_of_mattress,
										'each_mattress_price'=>$each_mattress_price,
										'maximum_no_person'=>$maximum_no_person
                                         
                                         );
			
					$insertData = $this->commondata_model->insertSingleTableData('room_master',$insert_array);


				if (isset($sel_facility)) {
					
					for ($i=0; $i < count($sel_facility); $i++) { 

						$insert_array = array(
                    	                'room_id' => $insertData,
                                        'facility_id' => $sel_facility[$i],
                                         );
			
					   $insertData2 = $this->commondata_model->insertSingleTableData('room_facilities',$insert_array);
						

					}

				}


				/* package type with rate */

				if (isset($packagetypeidid)) {
					
					for ($i=0; $i < count($packagetypeidid); $i++) { 

						$insert_array_pac = array(
                    	                'room_id' => $insertData,
                                        'rate' => $listamount[$i],
                                        'package_type_id' => $packagetypeidid[$i],
                                         );
			
					   $insertData3 = $this->commondata_model->insertSingleTableData('room_rate_details',$insert_array_pac);
						

					}


				}


				$imageData = array(
            					'mode' => $mode, 
            					'roomID' => $insertData, 
            					'userFilename' => $userFilename, 
            					'docFile' => $docFile, 
								'isFileChanged' => $isFileChanged,
								'galleryIDs'=>$galleryIDs  
            				  );
					
					/* image upload */

					$this->master_model->insertIntoRoomImage($imageData,$gallerydelIDs);
					

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





  public function addRoomrate(){
        
      
        if($this->_authModel->is_logged_in()) 
		{

		
			if($this->uri->segment(4) == NULL)
			{
				$data['mode'] = "ADD";
				$data['btnText'] = "Save";
				$data['btnTextLoader'] = "Saving...";
                $roomrateID = 0;
                $data['roomrateID'] = $roomrateID;
				$data['roomrateEditdata'] = [];
				
				
				//getAllRecordWhereOrderBy($table,$where,$orderby)

			}
			else
			{
				$data['mode'] = "EDIT";
				$data['btnText'] = "Update";
				$data['btnTextLoader'] = "Updating...";
                $roomrateID = $this->uri->segment(4);
                $data['roomrateID'] = $roomrateID;
                
				$whereAry = [
                    'room_rate_details.room_rate_id' => $roomrateID
                ];

				// getSingleRowByWhereCls(tablename,where params)
				 $data['roomrateEditdata'] = $this->commondata_model->getSingleRowByWhereCls('room_rate_details',$whereAry); 
					//pre($data['roomEditdata']);exit;
				
			}

			$data['roomList'] = $this->commondata_model->getAllDropdownData('room_master');
			$data['packagetypeList'] = $this->commondata_model->getAllDropdownData('package_type_master');

               

			$data['view_file'] = 'masters/room_rate/room_rate_add_edit.php';
            $this->template->admin_template($data);
		}
		else
		{
			redirect('adminpanel','refresh');
        }
        

    } 




public function roomrate_action() {

      
		 if($this->_authModel->is_logged_in()) 
		{
			$json_response = array();
			$formData = $this->input->post('formDatas');
			parse_str($formData, $dataArry);

		
			$roomrateID = trim(htmlspecialchars($dataArry['roomrateID']));
			$mode = trim(htmlspecialchars($dataArry['mode']));

            $sel_room = $dataArry['sel_room'];
            $sel_packagetype = $dataArry['sel_packagetype'];
            $rate = $dataArry['rate'];
       

				if($roomrateID>0 && $mode=="EDIT")
				{
					/*  EDIT MODE
					 *	-----------------
					*/

					$upd_where = array('room_rate_details.room_rate_id' =>$roomrateID);

                    $upd_array = array(
                        				'room_id' => $sel_room,
                                        'rate' => $rate,
                                        'package_type_id' => $sel_packagetype,
                     );

                        $update = $this->commondata_model->updateSingleTableData('room_rate_details',$upd_array,$upd_where);
					
					
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
                    	                'room_id' => $sel_room,
                                        'rate' => $rate,
                                        'package_type_id' => $sel_packagetype,
                                         
                                         );
			
					$insertData = $this->commondata_model->insertSingleTableData('room_rate_details',$insert_array);
					

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


	public function roomrate()
	{
		if($this->_authModel->is_logged_in()) 
		{
			
			$data['roomrateList'] = $this->master_model->getRoomRateList();
            $data['view_file'] = 'masters/room_rate/room_rate_list';
            $this->template->admin_template($data);
		}
		else
		{
			redirect('adminpanel','refresh');
		}
    } 


public function addRoomPackageDetail()
    {
        if($this->_authModel->is_logged_in())
        {
          
        

            $data['rowno'] = $this->input->post('rowNo');

            $data['sel_package_type'] = $this->input->post('sel_package_type');
            $data['package_name'] = $this->input->post('package_name');
          
            $data['rate'] = $this->input->post('rate');
            $data['packageList'] = $this->commondata_model->getAllDropdownData('package_type_master');


            $page = 'masters/room/package_details_partial_view.php';
           
            $viewTemp = $this->load->view($page,$data,TRUE);
            echo $viewTemp;
        }
        else
        {
            redirect('adminpanel','refresh');
        }
    }



  public function addRoomImages()
	{
		if($this->_authModel->is_logged_in())
		{

			$row_no = $this->input->post('rowNo');
			$data['rowno'] = $row_no+1;
			$data['documentTypeList'] = [];
			//$this->load->view('dashboard/equipment/equipment_detail_add_view');
			$viewTemp = $this->load->view('masters/room/add_room_image_partial_view.php',$data);
			echo $viewTemp;
		}
		else
		{
			redirect('adminpanel','refresh');
		}
	}





} // end of class

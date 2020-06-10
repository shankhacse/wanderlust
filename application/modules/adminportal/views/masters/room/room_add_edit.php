<style type="text/css">
.form_error{
  border: 1px solid red;
}

   .file {
  visibility: hidden;
  position: absolute;
} 
    .checkbox input[type="checkbox"] {
    position: relative;
    right: 0px;
}
  
</style>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Room Master</h3>
                <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                  <a href="<?php echo base_url(); ?>adminportal/masters/room" class="btn  btnpos colorwhite">
                   <i class="fas fa-clipboard-list"></i> List </a>
            </div>
              </div>
              <!-- /.card-header -->
              <form role="form" method="post" id="RoomForm" name="RoomForm"  enctype="multipart/form-data" data-parsley-validate="">
              <div class="card-body">

                <input type="hidden" name="roomID" id="roomID" value="<?php echo $roomID; ?>" />
                  <input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>" />


                  <div class="row">
                       <div class="col-md-4 col-sm-12 col-xs-12">
                         <div class="form-group">
                           <label for="classList">Floor</label> 
                           <div id="classview">
                              <select id="sel_floor" name="sel_floor" class="form-control  form-control-sm" data-show-subtext="true" data-live-search="true">
                            <option value="0">Select</option>
                           <?php
                           
                          foreach ($floorList as $value) { ?>

                          <option value="<?php echo $value->floor_id; ?>"
                             <?php if($mode=='EDIT'){
                              if ($roomEditdata->floor_id==$value->floor_id) {
                               echo "selected";
                              }
                              
                            }?>
                            >
                            <?php echo $value->floor_name; ?></option>

                            <?php }

                         
                            ?>
                                                 
                              </select>
                              </div>
                         </div>
                      </div>

                          <div class="col-md-4 col-sm-12 col-xs-12">
                         <div class="form-group">
                           <label for="classList">Room Type</label> 
                           <div id="classview">
                              <select id="sel_roomtype" name="sel_roomtype" class="form-control  form-control-sm" data-show-subtext="true" data-live-search="true">
                            <option value="0">Select</option>
                           <?php
                           
                          foreach ($roomtypeList as $roomtypelist) { ?>

                          <option value="<?php echo $roomtypelist->id; ?>"
                            <?php if($mode=='EDIT'){
                              if ($roomEditdata->room_type_id==$roomtypelist->id) {
                               echo "selected";
                              }
                              
                            }?>
                            >
                            <?php echo $roomtypelist->type; ?></option>

                            <?php }

                         
                            ?>
                                                 
                              </select>
                              </div>
                         </div>
                      </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Room No</label>
                        <input type="text" name="room_no" id="room_no" class="form-control form-control-sm" placeholder="" required
                        value="<?php if($mode=='EDIT'){echo $roomEditdata->room_no;}?>">
                      </div>
                    </div>
                    
                  </div>
            
                  <div class="row">
            
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Short Desc.</label>
                        <textarea class="form-control form-control-sm" placeholder="" name="short_desc" id="short_desc"><?php if($mode=='EDIT'){echo $roomEditdata->room_short_desc;}?></textarea>
                        <!-- <input type="text" class="form-control form-control-sm" placeholder="" name="short_desc" id="short_desc" required value="<?php if($mode=='EDIT'){echo $roomEditdata->room_short_desc;}?>"> -->
                      </div>
                    </div>
                
                      <div class="col-sm-3">
                      <div class="form-group">
                        <label>Max Adult</label>
                        <input type="text" class="form-control form-control-sm onlynumber" placeholder="" name="max_adult" id="max_adult" required value="<?php if($mode=='EDIT'){echo $roomEditdata->max_adult;}?>">
                      </div>
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label>Max Child</label>
                        <input type="text" class="form-control form-control-sm onlynumber" placeholder="" name="max_child" id="max_child" required value="<?php if($mode=='EDIT'){echo $roomEditdata->max_child;}?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
            
                   
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Full Desc.</label>
                        <textarea class="form-control form-control-sm" placeholder="" name="full_desc" id="full_desc"><?php if($mode=='EDIT'){echo $roomEditdata->full_desc;}?></textarea>
                   
                      </div>
                    </div>
                  </div>

                  <div class="row">
                          <div class="col-md-8 col-sm-12 col-xs-12">
                         <div class="form-group">
                           <label for="classList">Room Facility</label> 
                           <div id="classview">
                              <select id="sel_facility" name="sel_facility[]" class="form-control  form-control-sm select2" data-dropdown-css-class="select2-purple" data-show-subtext="true" data-live-search="true" multiple="multiple" required >
                            <option value="0">Select</option>
                           <?php
                           
                          foreach ($facilityList as $facilitylist) { ?>

                          <option value="<?php echo $facilitylist->facility_id; ?>"
                            <?php if($mode=='EDIT'){
                              if ($roomserviceEditdata) {
                              foreach ($roomserviceEditdata as  $value) {
                               
                              if ($value->facility_id==$facilitylist->facility_id) {
                               echo "selected";
                              }

                            }

                            }
                              
                            }?>
                            >
                            <?php echo $facilitylist->name; ?></option>

                            <?php }

                         
                            ?>
                                                 
                              </select>
                              </div>
                         </div>
                      </div>


                    
                  </div>

                  <div class="row">
                      <div class="col-md-8 col-sm-12 col-xs-12">                                   
                           <div class="form-group"> 
                               <label for="room_cover_image">Room Cover Photo</label> 	

                               <input type="file" name="room_cover_image" class="file fileName" id="room_cover_image" accept='image/*'>

                               <div class="input-group col-xs-12">		
                             
                               <input type="text" name="cover_photo" id="cover_photo" class="form-control input-xs userfilesname" readonly placeholder="Upload Image" value="<?php if($mode == "EDIT"){ echo $roomEditdata->cover_photo; } ?>">					
                                    <span class="input-group-btn">
                                        <button class="browse btn btn-primary input-xs" type="button" id="uploadBtn">
                                          <i class="fa fa-folder-open" aria-hidden="true"></i>
                                        </button>
                                      </span>
                              </div>
                                   </div>
                                   <p id="imageerr"></p>
                          </div>
                      </div>
                      <div class="row">
                      <div class="col-sm-3">
                      <div class="form-group">
                        <label>Number Of Mattress</label>
                        <input type="text" class="form-control form-control-sm onlynumber" placeholder="" name="no_of_mattress" id="no_of_mattress" required value="<?php if($mode=='EDIT'){echo $roomEditdata->no_of_mattress;}?>">
                      </div>
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label>Each Mattress Price</label>
                        <input type="text" class="form-control form-control-sm onlynumber" placeholder="" name="each_mattress_price" id="each_mattress_price" required value="<?php if($mode=='EDIT'){echo $roomEditdata->each_mattress_price;}?>">
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Maximum No Of Person</label>
                        <input type="text" class="form-control form-control-sm onlynumber" placeholder="" name="maximum_no_person" id="maximum_no_person" required value="<?php if($mode=='EDIT'){echo $roomEditdata->maximum_no_person;}?>">
                      </div>
                    </div>
                  </div>
                  

                   <div class="row">
                       <div class="col-md-4 col-sm-12 col-xs-12">
                         <div class="form-group">
                           <label for="classList">Package Type</label> 
                           <div id="sel_package_typeerr">
                              <select id="sel_package_type" name="sel_package_type" class="form-control  form-control-sm" data-show-subtext="true" data-live-search="true">
                            <option value="0">Select</option>
                           <?php
                           
                          foreach ($packageList as $value) { ?>

                          <option value="<?php echo $value->package_type_id; ?>" >
                            <?php echo $value->package_name; ?></option>

                            <?php }

                         
                            ?>
                                                 
                              </select>
                              </div>
                         </div>
                      </div>

                          <div class="col-sm-2">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control form-control-sm" placeholder="" name="rate" id="rate"  value="">
                      </div>
                    </div>

                        <div class="col-sm-1">
                      <div class="form-group">
                        <label>&nbsp;</label>
                          <button type="button" class="btn cutom_btn float-right btn-sm red_grd_btn addPackage" style="margin-top: 35px;" >Add</button>
                      </div>
                    </div>

                    </div>




                      <!-- ----------------------Item details Account --------------------------- -->
                         <div class="row">
                          <!-- <div class="col-md-2"></div> -->
                    <div class="col-sm-7">
                    <div  id="detail_itemamt" style="border: 1px solid #a84e7f;max-height: 250px;overflow: scroll;">

                    <div class="table-responsive">
                     <?php
                          $rowno=0;
                          $detailCount = 0;
                          if($mode=="EDIT")
                          {
                           $detailCount = sizeof($roompackageList);
                          
                          }

                          // For Table style Purpose
                          if($mode=="EDIT" && $detailCount>0)
                          {
                            $style_var = "display:block;width:100%;";
                          }
                          else
                          {
                            $style_var = "display:none;width:100%;";
                          }
                        ?>

                 <table class="table table-bordered" style="font-size: 10px;color: #354668;<?php //echo $style_var; ?>">
                  <thead>                  
                    <tr>
                     
                      <th style="width:10%">Sl No</th>
                     
                      <th style="width:50%">Package Type</th>
                      <th>Price</th>
                      
                      <th style="width:10%">Del</th>
                    </tr>
                  </thead>
                  <tbody>


                  <?php 
                        if ($roompackageList) {
                          $sl=1;
                          foreach ($roompackageList as $roompackageList) {
                         

                  ?>


                <tr id="rowItemdetails_<?php echo $rowno; ?>" class="itemDtlCls" >

                <td style="text-align: left;"> 
                    
                  <span id="serial_<?php echo $rowno; ?>"><?php echo $sl++;?></span>                  
                </td>



                <td style="text-align: left;width: 20%"> 
                <input type="hidden" class="packagetypeidid" name="packagetypeidid[]" id="packagetypeidid_<?php echo $rowno; ?>" value="<?php echo $roompackageList->package_type_id;?>"> 


                <span class="showdata_<?php echo $rowno; ?>"><?php echo $roompackageList->package_name;?></span>        		        
                </td>


                <td style="text-align: right;"> 
                <input type="hidden" class="listamount" name="listamount[]" id="listamount_<?php echo $rowno; ?>" value="<?php echo $roompackageList->rate;?>">    

                
                <span class="showdata2_<?php echo $rowno; ?>"><?php echo $roompackageList->rate;?></span>                    
                </td>


                    

                        <td style="vertical-align: middle;text-align: center;">


                  <a href="javascript:;" class="delDetails" id="delDocRow_<?php echo $rowno; ?>" title="Delete">
                
                  <i class="far fa-trash-alt" style="color: #d04949;; font-weight:700;"></i>
                      

                    </a>
                    
                    
                  </td>				
                    

                </tr>



                


                  <?php $rowno++;
                          }


                      }
                  ?>

                   
                  </tbody>
                </table>
                </div><!-- end of table responsive -->





                </div>

                <input type="hidden" name="rowno" id="rowno" value="<?php echo $rowno;?>">  
             
                </div>
                      
                    </div>


                    <!-- -------------End details account ------------------ -->


                
             
              

                  <!-- input states -->
                
                    <p id="roomimagegal" style="text-align:right;"></p>
                    <div class="card-header">
                <h3 class="card-title">Room Gallery</h3>
              </div>

               
              <!-- Add document-->
   <div class="box-body">
                 <div class="row">
                              
                               <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 10px;padding: 2px;">
                                 <button type="button" class="btn cutom_btn float-right btn-sm btn-danger addRoomImage">
                                   <span class="glyphicon glyphicon-plus"></span> Add Image
                                 </button>
                               </div>
                      </div>      


             <div id="detail_Document">
            <div class="table-responsive">
            <?php
            $rowno = 0;
              $detailCount = 0;
              if($mode=="EDIT")
              {
                $detailCount = sizeof($studentDocumenDtl);
              }

              // For Table style Purpose
              if($mode=="EDIT" && $detailCount>0)
              {
                $style_var = "display:block;width:100%;";
              }
              else
              {
                $style_var = "display:none;width:100%;";
              }
            ?>

              <table id="imagegally" class="table table-bordered " role="grid" aria-describedby="datatable_info" style="<?php echo $style_var; ?>">
                    <thead>
                      
                        <tr>
                          
                    <th style="width:40%;">Browse</th>
                   
                    <th style="width:5%;" style="text-align:right;">Del</th>
                        </tr>
                    </thead>
                   <tbody>
                <?php

                if($detailCount>0)
                {
                  foreach ($studentDocumenDtl as $key => $value) 
                  { 
                    
                ?>
                
                <tr id="rowDocument_0_<?php echo $rowno; ?>">
                  <td>
                      <input type="hidden" name="galleryIDs[]" id="galleryIDs_0_<?php echo $rowno; ?>" value="<?php if($mode == "EDIT"){ echo $value->id; } ?>" >
                      
                      <input type="hidden" name="prvFilename[]" id="prvFilename_0_<?php echo $rowno; ?>" class="form-control prvFilename" value="" readonly >

                      <input type="hidden" name="randomFileName[]" id="randomFileName_0_<?php echo $rowno; ?>" class="form-control randomFileName" value="" readonly >

                      <input type="hidden" name="docDetailIDs[]" id="docDetailIDs_0_<?php echo $rowno; ?>" class="form-control randomFileName" value="0" readonly >
                
                    <input type="file" name="fileName[]" class="file fileName" id="fileName_0_<?php echo $rowno; ?>" accept='image/*'>
                    <div class="input-group col-xs-12">
                        <!--  <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span> -->
                      <input type="text" name="userFileName[]" id="userFileName_0_<?php echo $rowno; ?>" class="form-control input-xs userFileName" readonly placeholder="Upload Image" value="<?php if($mode == "EDIT"){ echo $value->large_image; } ?>" >

                        <input type="hidden" name="isChangedFile[]" id="isChangedFile_0_<?php echo $rowno; ?>" value="Y" >
                        <span class="input-group-btn">
                          <button class="browse btn btn-primary input-xs" type="button" id="uploadBtn_0_<?php echo $rowno; ?>">
                              <i class="fa fa-folder-open" aria-hidden="true"></i>
                        </button>
                          </span>
                    </div>
                  </td>
                
                  <td style="vertical-align: middle;">
                    <a href="javascript:;" class="delDocType" id="delDocRow_0_<?php echo $rowno; ?>" title="Delete">
                      <i class="far fa-trash-alt" style="color: #d04949;; font-weight:700;"></i>
                    </a>
                  </td>
                </tr>

              <?php   $rowno++;
                  }
                }

                  ?>
                    <input type="hidden" name="rowNo" id="rowNo" value="<?php echo $rowno; ?>">
                    <input type="hidden" name="gallerydelIDs" id="gallerydelIDs" value="0" >
                   </tbody>
                </table>
            </div>
          </div>

        </div>


<!-- end of Add document-->
                

               


                
              </div>
              <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn cutom_btn btn-sm blue_grd_btn float-right" id="roombtn"><?php echo $btnText;?></button>
                  <button type="button" class="btn cutom_btn float-right btn-sm red_grd_btn">Cancel</button>
                </div>

                </form>


            </div>
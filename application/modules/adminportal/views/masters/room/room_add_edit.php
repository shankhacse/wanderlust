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
                <h3 class="card-title">Room - ADD</h3>
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
                        <input type="text" class="form-control form-control-sm" placeholder="" name="short_desc" id="short_desc" required value="<?php if($mode=='EDIT'){echo $roomEditdata->room_short_desc;}?>">
                      </div>
                    </div>
                
                      <div class="col-sm-2">
                      <div class="form-group">
                        <label>Max Adult</label>
                        <input type="text" class="form-control form-control-sm" placeholder="" name="max_adult" id="max_adult" required value="<?php if($mode=='EDIT'){echo $roomEditdata->max_adult;}?>">
                      </div>
                    </div>
                     <div class="col-sm-2">
                      <div class="form-group">
                        <label>Max Child</label>
                        <input type="text" class="form-control form-control-sm" placeholder="" name="max_child" id="max_child" required value="<?php if($mode=='EDIT'){echo $roomEditdata->max_child;}?>">
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
                          foreach ($bodycontent['accountHeadList'] as $accountheadlist) {
                         

                  ?>


    <tr id="rowItemdetails_<?php echo $rowno; ?>" class="itemDtlCls" >

      <td style="text-align: left;"> 
        
          <span id="serial_<?php echo $rowno; ?>"><?php echo $sl++;?></span> 
                        
    </td>

    
    <td style="text-align: left;width: 20%"> 
    <input type="hidden" class="listaccountid" name="listaccountid[]" id="listaccountid_<?php echo $rowno; ?>" value="<?php echo $accountheadlist->account_master_id;?>"> 

       <div class="form-group dispblock_<?php echo $rowno; ?>" style="display: none;">
             <div class="input-group input-group-sm"> 
                 
                  <select class="form-control select2" name="acdroplist[]" id="acdroplist_<?php echo $rowno; ?>">
                   
                     <?php 
                              foreach ($bodycontent['allaccountList'] as $allaccountlist) {
                              
                               ?>
                               <option value="<?php echo $allaccountlist->account_id;?>" 
                                <?php if($allaccountlist->account_id == $accountheadlist->account_master_id){
                                    echo 'selected';
                                } ?>>
                               
                               <?php echo $allaccountlist->account_name;?></option>

                              <?php } ?>
                  </select>


               </div>
         </div> 




    
     <span class="showdata_<?php echo $rowno; ?>"><?php echo $accountheadlist->account_name;?></span>                    
    </td>
  

     <td style="text-align: right;"> 
    <input type="hidden" class="listamount" name="listamount[]" id="listamount_<?php echo $rowno; ?>" value="<?php echo $accountheadlist->amount;?>">    
     <div class="form-group dispblock_<?php echo $rowno; ?>" style="display: none;">
            <div class="input-group input-group-sm"> 
                <input type="text" class="form-control listamounted editchilddtl_<?php echo $rowno; ?>" name="listamounted[]" id="listamounted_<?php echo $rowno; ?>" value="<?php echo $accountheadlist->amount;?>"  onKeyUp="numericFilter(this);"> 
             </div>
         </div>
     
     <span class="showdata2_<?php echo $rowno; ?>"><?php echo $accountheadlist->amount;?></span>                    
    </td>

  
         

            <td style="vertical-align: middle;text-align: center;">
             
<a href="javascript:;" class="editchilddetails" id="editDocRow_<?php echo $rowno; ?>" title="edit"> <i class="far fa-edit" style="color: #d04949;; font-weight:700;"></i>
     </a>&emsp;

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

                  <br>
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

              <table class="table table-bordered " role="grid" aria-describedby="datatable_info" style="<?php echo $style_var; ?>">
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
                  foreach ($bodycontent['studentDocumenDtl'] as $key => $value) 
                  {
                    
                ?>
                
                <tr id="rowDocument_<?php echo $value->id; ?>_<?php echo $value->upload_from_module_id; ?>">
                  <td>
                    <select name="docType[]" id="docType_<?php echo $value->id; ?>_<?php echo $value->upload_from_module_id; ?>" class="form-control custom_frm_input docType">
                      <option value="0">Select</option>
                        <?php
                          foreach ($bodycontent['documentTypeList'] as  $docs) { ?>
                            <option value="<?php echo $docs->id; ?>" <?php if($value->document_type_id==$docs->id){echo "selected";}else{echo "";}?>><?php echo $docs->document_type; ?></option>
                        <?php }
                        ?>
                    </select>
                    <input type="hidden" name="prvFilename[]" id="prvFilename_<?php echo $value->id; ?>_<?php echo $value->upload_from_module_id; ?>" class="form-control prvFilename" value="<?php echo $value->user_file_name; ?>" readonly >

                    <input type="hidden" name="randomFileName[]" id="randomFileName_<?php echo $value->id; ?>_<?php echo $value->upload_from_module_id; ?>" class="form-control randomFileName" value="<?php echo $value->random_file_name; ?>" readonly >

                    <input type="hidden" name="docDetailIDs[]" id="docDetailIDs_<?php echo $value->id; ?>_<?php echo $value->upload_from_module_id; ?>" class="form-control randomFileName" value="<?php echo $value->id; ?>" readonly >
                  </td>
                  <td>

                    

                    <input type="file" name="fileName[]" class="file fileName" id="fileName_<?php echo $value->id; ?>_<?php echo $value->upload_from_module_id; ?>" accept='image/*'>
                    <div class="input-group col-xs-12">
                       

                      <input type="text" name="userFileName[]" id="userFileName_<?php echo $value->id; ?>_<?php echo $value->upload_from_module_id; ?>" class="form-control input-xs userFileName" readonly placeholder="Upload Document" value="<?php echo $value->user_file_name; ?>" >

                     
                      
                      <input type="hidden" name="isChangedFile[]" id="isChangedFile_<?php echo $value->id; ?>_<?php echo $value->upload_from_module_id; ?>" value="N" >

                          <span class="input-group-btn">
                          <button class="browse btn btn-primary input-xs" type="button" id="uploadBtn_<?php echo $value->id; ?>_<?php echo $value->upload_from_module_id; ?>">
                              <i class="fa fa-folder-open" aria-hidden="true"></i>
                        </button>
                          </span>

                    </div>
                  </td>
                  <td>
                    <textarea style="height: 35px;" name="fileDesc[]" id="fileDesc_<?php echo $value->id; ?>_<?php echo $value->upload_from_module_id; ?>" class="form-control custom_frm_input dtl_txt_area_trainer"><?php echo $value->uploaded_file_desc; ?></textarea>
                  </td>
                  <td style="vertical-align: middle;">
                    <a href="javascript:;" class="delDocType" id="delDocRow_<?php echo $value->id; ?>_<?php echo $value->upload_from_module_id; ?>" title="Delete">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </td>
                </tr>

              <?php   
                  }
                }

                  ?>

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
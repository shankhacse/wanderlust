<div class="card">
              <div class="card-header">
                <h3 class="card-title">Room Rate - ADD</h3>
              </div>
              <!-- /.card-header -->
              <form role="form" method="post" id="RoomRateForm" name="RoomRateForm" data-parsley-validate="">
              <div class="card-body">

                <input type="hidden" name="roomrateID" id="roomrateID" value="<?php echo $roomrateID; ?>" />
                  <input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>" />


                  <div class="row">
                       <div class="col-md-4 col-sm-12 col-xs-12">
                         <div class="form-group">
                           <label for="classList">Room</label> 
                           <div id="classview">
                              <select id="sel_room" name="sel_room" class="form-control  form-control-sm" data-show-subtext="true" data-live-search="true">
                            <option value="0">Select</option>
                           <?php
                           
                          foreach ($roomList as $value) { ?>

                          <option value="<?php echo $value->room_id; ?>"
                             <?php if($mode=='EDIT'){
                              if ($roomrateEditdata->room_id==$value->room_id) {
                               echo "selected";
                              }
                              
                            }?>
                            >
                            <?php echo $value->room_no; ?></option>

                            <?php }

                         
                            ?>
                                                 
                              </select>
                              </div>
                         </div>
                      </div>

                          <div class="col-md-4 col-sm-12 col-xs-12">
                         <div class="form-group">
                           <label for="classList">Package Type</label> 
                           <div id="classview">
                              <select id="sel_packagetype" name="sel_packagetype" class="form-control  form-control-sm" data-show-subtext="true" data-live-search="true">
                            <option value="0">Select</option>
                           <?php
                          foreach ($packagetypeList as $packagetypelist) { ?>
                          <option value="<?php echo $packagetypelist->package_type_id; ?>"
                            <?php if($mode=='EDIT'){
                              if ($roomrateEditdata->package_type_id==$packagetypelist->package_type_id) {
                               echo "selected";
                              }
                              
                            }?>
                            >
                            <?php echo $packagetypelist->package_name; ?></option>

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
                        <input type="text" name="rate" id="rate" class="form-control form-control-sm" placeholder="" required
                        value="<?php if($mode=='EDIT'){echo $roomrateEditdata->rate;}?>">
                      </div>
                    </div>
                    
                  </div>
            
                 
               

                
             
              

                  <!-- input states -->
                

               


                
              </div>
              <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn cutom_btn btn-sm blue_grd_btn float-right" id="roomtypebtn">Save</button>
                  <button type="button" class="btn cutom_btn float-right btn-sm red_grd_btn">Cancel</button>
                </div>

                </form>


            </div>
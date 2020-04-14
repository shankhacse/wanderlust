<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Room - ADD</h3>
              </div>
              <!-- /.card-header -->
              <form role="form" method="post" id="RoomForm" name="RoomForm" data-parsley-validate="">
              <div class="card-body">

                <input type="hidden" name="roomID" id="roomID" value="<?php echo $roomID; ?>" />
                  <input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>" />


                  <div class="row">
                       <div class="col-md-4 col-sm-12 col-xs-12">
                         <div class="form-group">
                           <label for="classList">Floor</label> 
                           <div id="classview">
                              <select id="sel_floor" name="sel_floor" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
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
                              <select id="sel_roomtype" name="sel_roomtype" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
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
                        <input type="text" name="room_no" id="room_no" class="form-control" placeholder="" required
                        value="<?php if($mode=='EDIT'){echo $roomEditdata->room_no;}?>">
                      </div>
                    </div>
                    
                  </div>
            
                  <div class="row">
            
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Short Desc.</label>
                        <input type="text" class="form-control" placeholder="" name="short_desc" id="short_desc" required value="<?php if($mode=='EDIT'){echo $roomEditdata->room_short_desc;}?>">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" placeholder="" name="price" id="price" required value="<?php if($mode=='EDIT'){echo $roomEditdata->price;}?>">
                      </div>
                    </div>
                      <div class="col-sm-2">
                      <div class="form-group">
                        <label>Max Adult</label>
                        <input type="text" class="form-control" placeholder="" name="max_adult" id="max_adult" required value="<?php if($mode=='EDIT'){echo $roomEditdata->max_adult;}?>">
                      </div>
                    </div>
                     <div class="col-sm-2">
                      <div class="form-group">
                        <label>Max Child</label>
                        <input type="text" class="form-control" placeholder="" name="max_child" id="max_child" required value="<?php if($mode=='EDIT'){echo $roomEditdata->max_child;}?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
            
                   
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Full Desc.</label>
                        <input type="text" class="form-control" placeholder="" name="full_desc" id="full_desc" required value="<?php if($mode=='EDIT'){echo $roomEditdata->full_desc;}?>">
                      </div>
                    </div>
                  </div>


                
             
              

                  <!-- input states -->
                

               


                
              </div>
              <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info btn-sm" id="roomtypebtn">Save</button>
                  <button type="button" class="btn btn-default float-right btn-sm">Cancel</button>
                </div>

                </form>


            </div>
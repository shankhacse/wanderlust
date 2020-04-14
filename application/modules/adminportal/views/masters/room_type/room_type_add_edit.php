<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Room Type - ADD</h3>
              </div>
              <!-- /.card-header -->
              <form role="form" method="post" id="RoomTypeForm" name="RoomTypeForm" data-parsley-validate="">
              <div class="card-body">

                <input type="hidden" name="roomtypeID" id="roomtypeID" value="<?php echo $roomtypeID; ?>" />
                  <input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>" />
            
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Room Type</label>
                        <input type="text" name="room_type" id="room_type" class="form-control" placeholder="" required
                        value="<?php if($mode=='EDIT'){echo $roomtypeEditdata->type;}?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Code</label>
                        <input type="text" class="form-control" placeholder="" name="code" id="code" required value="<?php if($mode=='EDIT'){echo $roomtypeEditdata->code;}?>">
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
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Hotel - ADD</h3>
              </div>
              <!-- /.card-header -->
              <form role="form" method="post" id="hotelForm" name="hotelForm" data-parsley-validate="">
              <div class="card-body">
            
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>GSTIN</label>
                        <input type="text" class="form-control" placeholder="" name="gstin">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Contact No </label>
                        <input type="text" class="form-control" placeholder="" name="contactno" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="" name="email" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Address </label>
                        <textarea class="form-control" rows="3" placeholder="" name="address" ></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Description (Optional)</label>
                        <textarea class="form-control" rows="3" placeholder="" name="description" ></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Pincode </label>
                        <input type="text" class="form-control" placeholder="" name="pincode" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" placeholder="" name="state" >
                      </div>
                    </div>
                  </div>

                  <!-- input states -->
                

               


                
              </div>
              <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info btn-sm" id="savehotelbtn">Save</button>
                  <button type="button" class="btn btn-default float-right btn-sm">Cancel</button>
                </div>

                </form>


            </div>
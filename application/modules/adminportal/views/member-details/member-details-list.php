<script src="<?php echo base_url();?>assets/js/admin/usermanagement/user.js"></script>

<section class="layout-box-content-format1">
        <div class="card card-primary">
            <div class="card-header box-shdw">
              <h3 class="card-title">Member List</h3>

            <!-- <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                  <a href="<?php echo base_url(); ?>adminportal/masters/addRoom" class="btn btn-default btnpos">
                   <i class="fas fa-plus"></i> Add </a>
            </div> -->
             
              
            </div><!-- /.card-header -->

           <div class="card-body">
             <div class="formblock-box">
              <table class="table table-bordered table-striped dtr-inline dataTable">
                <thead>
                    <tr>
                    <th>Sl.No</th>
                    <th>Member Code</th>
                    <th>Name</th>
                    <th>Mobile No.</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Pincode</th>
                    <th>State</th>
                                        
                    </tr>
                </thead>
                <tbody>

                <?php $i=1;
                foreach ($memberlist as $memberlist) { 

                  
                	?>
                   <tr>
                   <td><?php echo $i++; ?></td>
                   <td><?php echo $memberlist->member_code; ?></td>
                   <td><?php echo $memberlist->name; ?></td>
                   <td><?php echo $memberlist->mobile_no; ?></td>
                   <td><?php echo $memberlist->email; ?></td>
                   <td><?php echo $memberlist->address; ?></td>
                   <td><?php echo $memberlist->city; ?></td>
                   <td><?php echo $memberlist->pincode; ?></td>
                   <td><?php echo $memberlist->state; ?></td>
                  
                   


                 </tr>
                <?php } ?>                       
                         
                </tbody>
               </table>
              </div>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
   </section>


   <!-- Modal -->
<section class="layout-box-content-format1">
<div class="modal fade" id="myModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header card-header box-shdw" style="color: white;">
              <h5 class="modal-title">Login & Logout Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                <span aria-hidden="true">×</span>
              </button>
            </div>
           
            <div id="ModalBody"  class="modal-body">

            </div>
       
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-sm action-button" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  </section>

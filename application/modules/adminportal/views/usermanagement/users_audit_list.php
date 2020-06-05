<script src="<?php echo base_url();?>assets/js/admin/usermanagement/user.js"></script>

<section class="layout-box-content-format1">
        <div class="card card-primary">
            <div class="card-header box-shdw">
              <h3 class="card-title">User List</h3>

            <!-- <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                  <a href="<?php echo base_url(); ?>adminportal/masters/addRoom" class="btn btn-default btnpos">
                   <i class="fas fa-plus"></i> Add </a>
            </div> -->
             
              
            </div><!-- /.card-header -->

           <div class="card-body">
             <div class="formblock-box">
              <table class="table customTbl table-bordered table-hover dataTable tablepad">
                <thead>
                    <tr>
                    <th>Sl.No</th>                    
                    <th>User Name</th>
                    <th>Date & Time</th>
                    <th>Action</th>
                    <th>Module</th>                   
                    <th>URL</th>
                    <th>Browser</th>
                    <th>Device OS</th>
                                        
                    </tr>
                </thead>
                <tbody>

                <?php $i=1;
                foreach ($userauditlist as $userauditlist) { 

                  
                	?>
                   <tr>
                   <td><?php echo $i++; ?></td>
                   <td><?php echo $userauditlist->user_name; ?></td>
                   <td><?php echo $userauditlist->activity_date; ?></td>
                   <td><?php echo $userauditlist->activity_action; ?></td>
                   <td><?php echo $userauditlist->activity_module; ?></td>
                   <td><?php echo $userauditlist->activity_url; ?></td>
                   <td><?php echo $userauditlist->browser; ?></td>
                   <td><?php echo $userauditlist->platform; ?></td>
                  
                   
                  
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

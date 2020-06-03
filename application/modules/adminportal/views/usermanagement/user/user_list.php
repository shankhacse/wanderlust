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
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Mobile No.</th>
                    <th>Role</th>
                    <th>Status</th>                   
                    <th>Action</th>
                                        
                    </tr>
                </thead>
                <tbody>

                <?php $i=1;
                foreach ($userlist as $userlist) { 

                  
                	?>
                   <tr>
                   <td><?php echo $i++; ?></td>
                   <td><?php echo $userlist->firstname.' '.$userlist->lastname; ?></td>
                   <td><?php echo $userlist->user_name; ?></td>
                   <td><?php echo $userlist->mobileno; ?></td>
                   <td><?php echo $userlist->user_role; ?></td>
                  
                   
                   <td style="text-align: center;">
                            <?php  if ($userlist->is_online=='Y') { ?>
                                <a onclick="openUserloginLogoutDetailModal(<?php echo $userlist->user_id; ?>);" href="#">
                                    <img src="<?php echo(base_url());?>assets/img/online.png" style="width: 23px;height: 23px;" alt="active icon">
                                </a>                                
                            <?php }else{ ?>
                                <a href="#">
                                    <img onclick="openUserloginLogoutDetailModal(<?php echo $userlist->user_id; ?>);" src="<?php echo(base_url());?>assets/img/offline.png" style="width: 23px;height: 23px;" alt="inactive icon">
                                </a> 
                            <?php } ?>
                        </td>
                        <td style="text-align: center;">
                            <?php  if ($userlist->active=='1') { ?>
                                <a href="<?php echo base_url();?>adminportal/user/InactiveUser/<?php echo $userlist->user_id; ?>">
                                    <img src="<?php echo(base_url());?>assets/img/active.png" style="width: 23px;height: 23px;" alt="active icon">
                                </a>                                
                            <?php }else{ ?>
                                <a href="<?php echo base_url();?>adminportal/user/ActiveUser/<?php echo $userlist->user_id; ?>">
                                    <img src="<?php echo(base_url());?>assets/img/inactive.png" style="width: 23px;height: 23px;" alt="inactive icon">
                                </a> 
                            <?php } ?>
                        </td>


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

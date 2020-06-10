<script src="<?php echo base_url();?>assets/js/admin/booking_details.js"></script>

<section class="layout-box-content-format1">
        <div class="card card-primary">
            <div class="card-header box-shdw">
              <h3 class="card-title">Booking List</h3>

            <!-- <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                  <a href="<?php echo base_url(); ?>adminportal/masters/addRoom" class="btn btn-default btnpos">
                   <i class="fas fa-plus"></i> Add </a>
            </div> -->
             
              
            </div><!-- /.card-header -->

           <div class="card-body">
             <div class="formblock-box">
            
              <table id="bookingdtl" class="table table-bordered table-striped dtr-inline">
                <thead>
                    <tr>
                    <th>Sl.No</th>
                    <th style="width:100px">Member Code</th>
                    <th style="width:150px">Name</th>
                    <th style="width:90px">Mobile No.</th>
                    <th style="width:90px">Chekin date</th>
                    <th style="width:110px">Checkout date</th>
                    <th>Adults</th>
                    <th>Child</th>
                    <th>Mattress</th>
                    <th>Package</th>
                    <th style="width:110px">Room Details</th>
                    <th style="width:80px">Booking</th>
                                        
                    </tr>
                </thead>
                <tbody>

                <?php $i=1;
                foreach ($bookinglist as $bookinglist) { 

                  
                	?>
                   <tr>
                   <td><?php echo  $i++; ?></td>
                   <td><?php echo $bookinglist->member_code; ?></td>
                   <td><?php echo $bookinglist->name; ?></td>
                   <td><?php echo $bookinglist->mobile_no; ?></td>
                   <td><?php  if($bookinglist->check_in_dt != ''){ echo date('d/m/Y',strtotime($bookinglist->check_in_dt)); } ?></td>
                   <td><?php  if($bookinglist->check_out_dt != ''){ echo date('d/m/Y',strtotime($bookinglist->check_out_dt)); } ?></td>
                 
                   <td><?php echo $bookinglist->no_of_adults; ?></td>
                   <td><?php echo $bookinglist->no_of_child; ?></td>
                   <td><?php echo $bookinglist->total_mattress; ?></td>
                   <td><?php echo $bookinglist->package_name; ?></td>
                   <td style="text-align: center;">    
                                
                                <a href="#">
                                <i class="nav-icon fas fa-file" style="width: 23px;height: 23px;"   onclick="openRoomsDetailModal(<?php echo $bookinglist->id; ?>);"></i> 
                                   
                                </a> 
                          
                        </td>
                        <td style="text-align: center;">
                            <?php  if ($bookinglist->is_confirm == 'Y') { ?>
                                <a href="<?php echo base_url();?>adminportal/bookingdetails/Notconfirm/<?php echo $bookinglist->id; ?>" class="btn btn-block btn-info btn-sm">Confirm
                                  
                                </a>                                
                            <?php }else{ ?>
                                <a href="<?php echo base_url();?>adminportal/bookingdetails/Confirm/<?php echo $bookinglist->id; ?>" class="btn btn-block btn-info btn-sm">
                                  Not Confirm
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
<div class="modal fade" id="roomdtlModel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header card-header box-shdw" style="color: white;">
              <h5 class="modal-title">Room Details</h5>
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

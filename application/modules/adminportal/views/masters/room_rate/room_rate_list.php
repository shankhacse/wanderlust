

<section class="layout-box-content-format1">

        <div class="card card-primary">
            <div class="card-header box-shdw">
              <h3 class="card-title">Room Rate List</h3>

            <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                  <a href="<?php echo base_url(); ?>adminportal/masters/addRoom" class="btn btn-default btnpos">
                   <i class="fas fa-plus"></i> Add </a>
            </div>
             
              
            </div><!-- /.card-header -->

           <div class="card-body">
             <div class="formblock-box">
              <table class="table customTbl table-bordered table-hover dataTable tablepad">
                <thead>
                    <tr>
                    <th>Sl.No</th>
                    <th>Room</th>
                    <th>Package Type</th>
               
                    <th>Rate</th>
                   
                    <th>Action</th>
                                        
                    </tr>
                </thead>
                <tbody>

                <?php $i=1;
                foreach ($roomrateList as $roomratelist) { 

                  
                	?>
                   <tr>
                   <td><?php echo $i++; ?></td>
                   <td><?php echo $roomratelist->room_no; ?></td>
                   <td><?php echo $roomratelist->package_name; ?></td>
                   <td><?php echo $roomratelist->rate; ?></td>
                 
                   
                   
                   <td>
                    
                   <a href="<?php echo base_url(); ?>adminportal/masters/addRoomrate/<?php echo $roomratelist->room_rate_id; ?>" class="btn tbl-action-btn padbtn">
                  <i class="fas fa-edit"></i> 
                </a>
                  
                  </td>


                 </tr>
                <?php } ?>                       
                         
                </tbody>
               </table>
              </div>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
   </section>



<section class="layout-box-content-format1">

        <div class="card card-primary">
            <div class="card-header box-shdw">
              <h3 class="card-title">Room Type</h3>

            <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                  <a href="<?php echo base_url(); ?>adminportal/masters/addRoomtype" class="btn btn-default btnpos">
                   <i class="fas fa-plus"></i> Add </a>
            </div>
             
              
            </div><!-- /.card-header -->

           <div class="card-body">
             <div class="formblock-box">
              <table class="table customTbl table-bordered table-hover dataTable tablepad">
                <thead>
                    <tr>
                    <th>Sl.No</th>
                    <th>Type</th>
                    <th>Code</th>
                   
                    <th>Action</th>
                                        
                    </tr>
                </thead>
                <tbody>

                <?php $i=1;
                foreach ($roomtypeList as $roomtypelist) { 

                  
                	?>
                   <tr>
                   <td><?php echo $i++; ?></td>
                   <td><?php echo $roomtypelist->type; ?></td>
                   <td><?php echo $roomtypelist->code; ?></td>
                   
                   
                   <td>
                    
                   <a href="<?php echo base_url(); ?>adminportal/masters/addRoomtype/<?php echo $roomtypelist->id; ?>" class="btn tbl-action-btn padbtn">
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

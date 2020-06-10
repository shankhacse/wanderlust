

<section class="layout-box-content-format1">

        <div class="card card-primary">
            <div class="card-header box-shdw">
              <h3 class="card-title">Room Master</h3>

            <div class="btn-group btn-group-sm float-right" role="group" aria-label="MoreActionButtons" >
                  <a href="<?php echo base_url(); ?>adminportal/masters/addRoom" class="btn  btnpos">
                   <i class="fas fa-plus"></i> Add </a>
            </div>
             
              
            </div><!-- /.card-header -->

           <div class="card-body">
             <div class="formblock-box">
              <table class="table customTbl table-bordered table-hover dataTable tablepad">
                <thead>
                    <tr>
                    <th>Sl.No</th>
                    <th>Floor</th>
                    <th>Room Type</th>
                    <th>Room No</th>
                    <th>Price</th>                   
                    <th>Action</th>
                                        
                    </tr>
                </thead>
                <tbody>

                <?php $i=1;
                foreach ($roomList as $roomlist) { 

                  
                	?>
                   <tr>
                   <td><?php echo $i++; ?></td>
                   <td><?php echo $roomlist['floor_name']; ?></td>
                   <td><?php echo $roomlist['room_type']; ?></td>
                   <td><?php echo $roomlist['room_no']; ?></td>
                   <td><?php foreach ($roomlist['price'] as $price) { 
                     echo "Package Type : ".$price->package_name."&emsp;"."Rate : ".$price->rate; 
                     echo "<br>";
                     
                   } ?></td>
                   
                   
                   <td>
                    
                   <a href="<?php echo base_url(); ?>adminportal/masters/addRoom/<?php echo $roomlist['room_id']; ?>" class="btn tbl-action-btn padbtn">
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

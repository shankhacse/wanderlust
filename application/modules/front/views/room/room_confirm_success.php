<script  src="<?php echo base_url(); ?>/assets/js/web/room.js"></script>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Room Detail</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li class="active">Room Detail</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Rooms detail section start -->
<div class="content-area rooms-detail-section" style="padding-top:41px;">
    <div class="container">
        <div class="row paddingbottom100">
         <div class="col-lg-12 col-md-12 col-xs-12 " style="background:#fff;padding:20px 17px 17px 2px;">

       
         <div class="row">
       
         <div class="col-lg-12 col-md-12 col-xs-12 ">
             <p class="bookingsuc">Booking Details</p>
          </div>
          </div>
          <br>
          <div class="row">
          <div class="col-md-1 col-md-1"></div>
            <div class="col-md-10 col-md-10 paddingbottom100" >
        
            <table class="table customTbl table-bordered table-hover dataTable tablepad">
                <thead>
                    <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Mobile No.</th>
                    <th>Checkin Date</th>
                    <th>Checkout Date</th>                   
                    <!-- <th>Total Price</th>                    -->
                    <th>Download</th>
                                        
                    </tr>
                </thead>
                <tbody>

                <?php $i=0;
                if(!empty($bookingdtl)){
                 foreach($bookingdtl as $bookingdtl) { ?>

                       <tr>
                           <td><?php echo ++$i; ?></td>
                           <td><?php echo $bookingdtl->name; ?></td>
                           <td><?php echo $bookingdtl->mobile_no; ?></td>
                           <td><?php if($bookingdtl->check_in_dt != ''){ echo date('d/m/Y',strtotime($bookingdtl->check_in_dt)); } ?></td>
                           <td><?php if($bookingdtl->check_out_dt != ''){ echo date('d/m/Y',strtotime($bookingdtl->check_out_dt)); } ?></td>
                           <td><a href="#"> <i class="nav-icon fas fa-file" style="width: 23px;height: 23px;"></i></a> </td>
                       </tr>

                <?php } } else{ ?>
                    <tr>
                        <td colspan="5" class="textcenter">No Booking Details</td>
                    </tr>
                <?php } ?>

                </tbody>
               </table>
            
         </div>
            
        </div>
        </div>
      


       
    </div>
</div>

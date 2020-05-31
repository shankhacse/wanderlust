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
<div class="content-area rooms-detail-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12">
                <!-- Heading courses start -->
                <div class="heading-rooms  clearfix sidebar-widget">
                    <div class="pull-left">
                        <h3><?php echo $roommaster[0]->type;  ?></h3>
                        <!-- <p>
                            <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                        </p> -->
                    </div>
                    <!-- <div class="pull-right">
                        <h3><span>$260.00</span></h3>
                         <h5>Per Manth</h5>
                    </div> -->
                </div>
                <!-- Heading courses end -->

                <!-- sidebar start -->
                <div class="rooms-detail-slider sidebar-widget">
                    <!--  Rooms detail slider start -->
                    <div class="rooms-detail-slider simple-slider mb-40 ">
                        <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                            <div class="carousel-outer">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                <?php $i=1; foreach($RoomGallery as $roomgallery){ if($i == 1){  ?>
                                    <div class="item active">
                                        <img src="<?php echo base_url(); ?>assets/img/room/<?php echo $roomgallery->large_image; ?>" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>

                                <?php }else{  ?>
                                    <div class="item">
                                        <img src="<?php echo base_url(); ?>assets/img/room/<?php echo $roomgallery->large_image; ?>" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>

                               <?php } $i++; } ?>
                                    
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
                                    <span class="slider-mover-left t-slider-l" aria-hidden="true">
                                        <i class="fa fa-angle-left"></i>
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
                                    <span class="slider-mover-right t-slider-r" aria-hidden="true">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!-- Indicators -->
                            <ol class="carousel-indicators thumbs visible-lg visible-md">
                            <?php foreach($RoomGallery as $roomgallery){  ?>
                                <li data-target="#carousel-custom" data-slide-to="0" class=""><img src="<?php echo base_url(); ?>assets/img/room/<?php echo $roomgallery->large_image; ?>" alt="Chevrolet Impala"></li>
                                <?php } ?>
                            </ol>
                        </div>
                    </div>
                   

                    <!-- Rooms description start -->
                    <div class="panel-box course-panel-box course-description" id="roomdtl">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab" aria-expanded="true">Description</a></li>
                            <li class=""><a href="#tab2default" data-toggle="tab" aria-expanded="false">Facilities</a></li>
                            <li class=""><a href="#tab3default" data-toggle="tab" aria-expanded="false">Packages</a></li>
                            <!-- <li class=""><a href="#tab4default" data-toggle="tab" aria-expanded="false">Our Staff</a></li>
                            <li class=""><a href="#tab5default" data-toggle="tab" aria-expanded="false">Video</a></li> -->
                        </ul>
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab1default">
                                        <div class="divv">
                                            <!-- Title -->
                                            <h3>Rooms Description</h3>
                                            <!-- paragraph -->
                                            <?php if(!empty($roommaster) && $roommaster[0]->full_desc != ''){  echo $roommaster[0]->full_desc; }else{ echo "No Result"; } ?></p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade features" id="tab2default">
                                        <!-- Rooms features start -->
                                        <div class="rooms-features">
                                            <h3>Rooms Facility</h3>
                                            <div class="row">
                                            <?php  foreach($RoomFacilities as $roomfacilities){ ?>
                                                 <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        <li>
                                                            <i class="<?php echo $roomfacilities->icon; ?>"></i><?php echo $roomfacilities->name; ?>
                                                        </li>
                                                        </ul>
                                                 </div>  
                                            <?php } ?>       
                                                    
                                                <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        <li>
                                                            <i class="flaticon-air-conditioning"></i>Air conditioning
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-balcony-and-door"></i>Balcony
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-weightlifting"></i>Gym
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-parking"></i>Parking
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-sunbed"></i>Beach View
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        <li>
                                                            <i class="flaticon-bed"></i>2 Bedroom
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-person-learning-by-reading"></i>Free Newspaper
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-swimming-silhouette"></i>Use of pool
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-graph-line-screen"></i>TV
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-no-smoking-sign"></i>No Smoking
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        <li>
                                                            <i class="flaticon-room-service"></i>Room Service
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-breakfast"></i>Breakfast
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-phone-receiver"></i>Telephone
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-bed"></i>2 Bedroom
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-wifi-connection-signal-symbol"></i>Free Wi-Fi
                                                        </li>
                                                    </ul>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!-- Rooms features end -->
                                    </div>
                                    <div class="tab-pane fade technical" id="tab3default">
                                        <!-- Advantages start -->
                                        <div class="advantages">
                                            <h3>Packages</h3>
                                            <ul>

                                            <?php $i = 1; foreach($RoomPrices as $roomprices){ ?>
                                                <li><span><?php echo $i; ?></span><?php echo $roomprices->package_name." - ".number_format($roomprices->rate); ?></li>
                                                                                                      
                                                    <?php $i++;} ?>
                                                
                                            </ul>
                                        </div>
                                        <!-- Advantages end -->
                                    </div>
                                    
                                    <!-- <div class="tab-pane fade" id="tab5default">
                                       Inside video start sssssss
                                        <div class="inside-video-2">
                                            <h3>Video</h3>
                                            <iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe>
                                        </div>
                                        Inside video end 
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Rooms description end -->
                </div>
                <!-- sidebar end -->

               
               
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="sidebar">
                    <!-- Search area box 2 start -->
                    <div class="sidebar-widget search-area-box-2 hidden-sm hidden-xs clearfix bg-grey">
                        <h3>Search Your Rooms</h3>
                        <!-- <h1>$260/Night</h1> -->
                        <div class="search-contents">
                            <form action="<?php echo base_url();?>room/room_booking_confirm"  method="GET" onSubmit="return validateRoomBooking();">
                                <div class="row">
                                    <div class="search-your-details">
                                        <div class="col-md-12 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $room_id ?>">
                                                <input type="text" name="checkin_dt" id="checkin_dt" class="btn-default datepicker" placeholder="Check In" value="<?php echo $check_in_dt; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="checkout_dt" id="checkout_dt" class="btn-default datepicker" placeholder="Check Out"  value="<?php echo $checkout_dt; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <select class="selectpicker search-fields form-control-2" name="room" id="room">
                                                    <option value="0">Room</option>                                                  
                                                    <?php foreach($room_type_list as $roomtype){ ?>
                                                    <option value="<?php echo $roomtype->id; ?>" <?php if($room_type == $roomtype->id){ echo "selected"; } ?>><?php echo $roomtype->type; ?></option>
                                                   
                                                    <?PHP } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <select class="selectpicker search-fields form-control-2" name="package" id="package">
                                                    <option value="0">Package</option>
                                                    <?php foreach($RoomPrices as $roomprices){ ?>
                                                    <option value="<?php echo $roomprices->package_type_id; ?>"><?php echo $roomprices->package_name." - ".number_format($roomprices->rate); ?></option>
                                                   
                                                    <?PHP } ?>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <select class="selectpicker search-fields form-control-2" name="adults" id="adults">
                                                    <option value="0">Adult</option>
                                                    <?php 
                                                        foreach(json_decode(NO_OF_ADULTS) as $key => $value) { ?> 
                                                        <option value="<?php echo $key;  ?>" <?php if($key == $audults_no){ echo "selected"; } ?>><?php echo $value;  ?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <select class="selectpicker search-fields form-control-2" name="children" id="children">
                                                    <option value="0">Child</option>
                                                    <?php 
                                                    foreach(json_decode(NO_OF_CHILD) as $key => $value) { ?> 
                                                    <option value="<?php echo $key;  ?>" <?php if($key == $children_no){ echo "selected"; } ?>><?php echo $value;  ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <select class="selectpicker search-fields form-control-2" name="mattress">
                                                    <option>Mattress</option>
                                                    <?php 
                                                    foreach(json_decode(NO_OF_MATTRESS) as $key => $value) { ?> 
                                                    <option value="<?php echo $key;  ?>"><?php echo $value;  ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="col-md-12 col-sm-12 col-xs-12 margintopm21">
                                        <p id="roombookingerr" class="errmsg"></p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group mrg-btm-10">
                                            <!-- <a href="<?php echo base_url();?>room/room_booking_confirm?checkin_dt=<?php echo $check_in_dt; ?>&checkout_dt=<?php echo $check_in_dt; ?>&room=<?php echo $room_type; ?>&adults=<?php echo $audults_no; ?>&children=<?php echo $children_no; ?>&id=<?php echo $room_id; ?>" class="search-button btn-theme">Book Now</a> -->
                                                <button type="submit" class="search-button btn-theme">Book Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Search area box 2 end -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Rooms detail section end -->
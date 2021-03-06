
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Rooms 1 Column</h1>
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li class="active">Rooms 1 Column</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<?php 
 
?>
<!-- Search area box 2 start -->
<div class="search-area-box-2 search-area-box-6">
    <div class="container">
        <div class="search-contents">
            <form action="<?php echo base_url();?>room/checkroom" method="GET">
                <div class="row search-your-details">
                    <div class="col-lg-3 col-md-3">
                        <div class="search-your-rooms mt-20">
                            <h3 class="hidden-xs hidden-sm">Search</h3>
                            <h2 class="hidden-xs hidden-sm">Your <span>Rooms</span></h2>
                            <h2 class="hidden-lg hidden-md">Search Your <span>Rooms</span></h2>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="btn-default datepicker" name="checkin_dt" placeholder="Check In" value="<?php if($check_in_dt){echo $check_in_dt; } ?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="btn-default datepicker" name="checkout_dt" placeholder="Check Out" value="<?php if($checkout_dt){echo $checkout_dt; } ?>" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields form-control-2" name="room">
                                        <option value="0">Room</option>
                                        <?php 
                                            foreach ($room_type_list as $value) { ?>
                                                  <option value="<?php echo $value->id; ?>" <?php if($room_type==$value->id){echo "selected"; } 
                                                  ?>><?php echo $value->type; ?></option>                                            
                                            <?php 
                                            }
                                        ?>
                                     
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields form-control-2" name="adults">
                                        <option>Adult</option>
                                        <?php 
                                            foreach(json_decode(NO_OF_ADULTS) as $key => $value) { ?> 
                                            <option value="<?php echo $key;  ?>" <?php if($key == $audults_no){ echo "selected"; } ?>><?php echo $value;  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields form-control-2" name="children">
                                        <option>Child</option>
                                        <?php 
                                            foreach(json_decode(NO_OF_CHILD) as $key => $value) { ?> 
                                            <option value="<?php echo $key;  ?>"<?php if($key == $children_no){ echo "selected"; } ?>><?php echo $value;  ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="form-group">
                                    <button class="search-button btn-theme">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Search area box 2 end -->

<!-- Rooms section start -->
<div class="rooms-section content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Best Rooms</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <?php 
                   // pre($room_list);
                    if(sizeof($room_list)>0) {  // print_r($room_list);exit;
                        foreach($room_list as $rooms){ ?>
                       
                <div class="hotel-box-list">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 col-pad">
                        <img src="<?php echo base_url(); ?>assets/img/room/cover-photo/<?php echo $rooms["room"]->cover_photo; ?>" alt="rooms-col-1" class="img-responsive" style="width:81%;">
                        <div>
                            <ul class="room_search_gallery_thumbnail">
                            <?php  foreach($rooms["room_gallery"] as $roomgallery){ ?>
                                <li><img src="<?php echo base_url(); ?>assets/img/room/<?php echo $roomgallery->large_image; ?>" alt="rooms-col-1" class="img-responsive" style="width:100px;height:100px;"></li>
                            <?php } ?>
                            </ul>
                        </div>  
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 detail">
                        <div class="heading">
                            <div class="title pull-left">
                                <h3>
                                    <a href="#"><?php echo $rooms["room"]->type; ?></a>
                                </h3>
                            </div>
                            <div class="price pull-right">
                               Max Adult : <?php echo $rooms["room"]->max_adult; ?> , Max Child : <?php echo $rooms["room"]->max_child; ?>
                            </div>
                        </div>

                        <p><?php echo $rooms["room"]->room_short_desc; ?></p>
                        <div class="row">
                          <div class="col-md-7">
                          <div class="row">
                                    <?php $i=0;
                                        foreach($rooms['room_facilities'] as $facilities){ if($i % 2 == 0){ echo "<br>"; } ?>
                                         <div class="col-md-6">
                                           <ul class="fecilities" style="margin-bottom:5px;">
                                                <li>
                                                    <i class="<?php echo $facilities->icon; ?>"></i>
                                                <?php echo $facilities->name; ?>
                                                </li>
                                        </ul>
                                    </div>
                                    <?php $i++;
                                        }
                                    ?>
                                 </div>
                                 </div>
                        </div>

                        

                        <div class="hiddenmt-15 pull-right">
                            <a href="<?php echo base_url();?>room/room_booking?checkin_dt=<?php echo $check_in_dt; ?>&checkout_dt=<?php echo $checkout_dt; ?>&room=<?php echo $rooms["room"]->room_type_id; ?>&adults=<?php echo $audults_no; ?>&children=<?php echo $children_no; ?>&id=<?php echo $rooms["room"]->room_id; ?>" class="read-more-btn">Book Now</a>
                        </div>

                    </div>
                </div>

                        <?php
                        }
                    }else {
                        echo "No rooms found";
                    }
                ?>                    

                <!-- <div class="hotel-box-list">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 col-pad">
                        <img src="img/room/img-15.jpg" alt="rooms-col-1" class="img-responsive">
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 detail">
                        <div class="heading">
                            <div class="title pull-left">
                                <h3>
                                    <a href="rooms-details.html">Luxury Room</a>
                                </h3>
                            </div>
                            <div class="price pull-right">
                                $567.99/Night
                            </div>
                        </div>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a</p>
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-bed"></i>
                                        2 King Beds
                                    </li>
                                    <li>
                                        <i class="flaticon-air-conditioning"></i>
                                        AC
                                    </li>
                                    <li>
                                        <i class="flaticon-breakfast"></i>
                                        Breakfast
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-room-service"></i>
                                        Room Service
                                    </li>
                                    <li>
                                        <i class="flaticon-graph-line-screen"></i>
                                        TV
                                    </li>
                                    <li>
                                        <i class="flaticon-weightlifting"></i>
                                        GYM
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-phone-receiver"></i>
                                        Telephone
                                    </li>
                                    <li>
                                        <i class="flaticon-wifi-connection-signal-symbol"></i>
                                        Wi-fi
                                    </li>
                                    <li>
                                        <i class="flaticon-parking"></i>
                                        Parking
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hiddenmt-15">
                            <a href="blog-details.html" class="read-more-btn">Read more...</a>
                        </div>

                    </div>
                </div>



                <div class="hotel-box-list">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 col-pad">
                        <img src="img/room/img-16.jpg" alt="rooms-col-1" class="img-responsive">
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 detail">
                        <div class="heading">
                            <div class="title pull-left">
                                <h3>
                                    <a href="rooms-details.html">Double Room</a>
                                </h3>
                            </div>
                            <div class="price pull-right">
                                $567.99/Night
                            </div>
                        </div>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a</p>
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-bed"></i>
                                        2 King Beds
                                    </li>
                                    <li>
                                        <i class="flaticon-air-conditioning"></i>
                                        AC
                                    </li>
                                    <li>
                                        <i class="flaticon-breakfast"></i>
                                        Breakfast
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-room-service"></i>
                                        Room Service
                                    </li>
                                    <li>
                                        <i class="flaticon-graph-line-screen"></i>
                                        TV
                                    </li>
                                    <li>
                                        <i class="flaticon-weightlifting"></i>
                                        GYM
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-phone-receiver"></i>
                                        Telephone
                                    </li>
                                    <li>
                                        <i class="flaticon-wifi-connection-signal-symbol"></i>
                                        Wi-fi
                                    </li>
                                    <li>
                                        <i class="flaticon-parking"></i>
                                        Parking
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hiddenmt-15">
                            <a href="blog-details.html" class="read-more-btn">Read more...</a>
                        </div>

                    </div>
                </div>

                <div class="hotel-box-list">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 col-pad">
                        <img src="img/room/img-17.jpg" alt="rooms-col-1" class="img-responsive">
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 detail">
                        <div class="heading">
                            <div class="title pull-left">
                                <h3>
                                    <a href="rooms-details.html">Double Room</a>
                                </h3>
                            </div>
                            <div class="price pull-right">
                                $567.99/Night
                            </div>
                        </div>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a</p>
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-bed"></i>
                                        2 King Beds
                                    </li>
                                    <li>
                                        <i class="flaticon-air-conditioning"></i>
                                        AC
                                    </li>
                                    <li>
                                        <i class="flaticon-breakfast"></i>
                                        Breakfast
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-room-service"></i>
                                        Room Service
                                    </li>
                                    <li>
                                        <i class="flaticon-graph-line-screen"></i>
                                        TV
                                    </li>
                                    <li>
                                        <i class="flaticon-weightlifting"></i>
                                        GYM
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-phone-receiver"></i>
                                        Telephone
                                    </li>
                                    <li>
                                        <i class="flaticon-wifi-connection-signal-symbol"></i>
                                        Wi-fi
                                    </li>
                                    <li>
                                        <i class="flaticon-parking"></i>
                                        Parking
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hiddenmt-15">
                            <a href="blog-details.html" class="read-more-btn">Read more...</a>
                        </div>

                    </div>
                </div>

                <div class="hotel-box-list">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 col-pad">
                        <img src="img/room/img-18.jpg" alt="rooms-col-1" class="img-responsive">
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 detail">
                        <div class="heading">
                            <div class="title pull-left">
                                <h3>
                                    <a href="rooms-details.html">Family Room</a>
                                </h3>
                            </div>
                            <div class="price pull-right">
                                $567.99/Night
                            </div>
                        </div>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a</p>
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-bed"></i>
                                        2 King Beds
                                    </li>
                                    <li>
                                        <i class="flaticon-air-conditioning"></i>
                                        AC
                                    </li>
                                    <li>
                                        <i class="flaticon-breakfast"></i>
                                        Breakfast
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-room-service"></i>
                                        Room Service
                                    </li>
                                    <li>
                                        <i class="flaticon-graph-line-screen"></i>
                                        TV
                                    </li>
                                    <li>
                                        <i class="flaticon-weightlifting"></i>
                                        GYM
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-phone-receiver"></i>
                                        Telephone
                                    </li>
                                    <li>
                                        <i class="flaticon-wifi-connection-signal-symbol"></i>
                                        Wi-fi
                                    </li>
                                    <li>
                                        <i class="flaticon-parking"></i>
                                        Parking
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hiddenmt-15">
                            <a href="blog-details.html" class="read-more-btn">Read more...</a>
                        </div>

                    </div>
                </div>

                <div class="hotel-box-list">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 col-pad">
                        <img src="img/room/img-15.jpg" alt="rooms-col-1" class="img-responsive">
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 detail">
                        <div class="heading">
                            <div class="title pull-left">
                                <h3>
                                    <a href="rooms-details.html">Luxury Room</a>
                                </h3>
                            </div>
                            <div class="price pull-right">
                                $567.99/Night
                            </div>
                        </div>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a</p>
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-bed"></i>
                                        2 King Beds
                                    </li>
                                    <li>
                                        <i class="flaticon-air-conditioning"></i>
                                        AC
                                    </li>
                                    <li>
                                        <i class="flaticon-breakfast"></i>
                                        Breakfast
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-room-service"></i>
                                        Room Service
                                    </li>
                                    <li>
                                        <i class="flaticon-graph-line-screen"></i>
                                        TV
                                    </li>
                                    <li>
                                        <i class="flaticon-weightlifting"></i>
                                        GYM
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-phone-receiver"></i>
                                        Telephone
                                    </li>
                                    <li>
                                        <i class="flaticon-wifi-connection-signal-symbol"></i>
                                        Wi-fi
                                    </li>
                                    <li>
                                        <i class="flaticon-parking"></i>
                                        Parking
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hiddenmt-15">
                            <a href="blog-details.html" class="read-more-btn">Read more...</a>
                        </div>

                    </div>
                </div>

                <div class="hotel-box-list">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 col-pad">
                        <img src="img/room/img-16.jpg" alt="rooms-col-1" class="img-responsive">
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 detail">
                        <div class="heading">
                            <div class="title pull-left">
                                <h3>
                                    <a href="rooms-details.html">Double Room</a>
                                </h3>
                            </div>
                            <div class="price pull-right">
                                $567.99/Night
                            </div>
                        </div>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a</p>
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-bed"></i>
                                        2 King Beds
                                    </li>
                                    <li>
                                        <i class="flaticon-air-conditioning"></i>
                                        AC
                                    </li>
                                    <li>
                                        <i class="flaticon-breakfast"></i>
                                        Breakfast
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-room-service"></i>
                                        Room Service
                                    </li>
                                    <li>
                                        <i class="flaticon-graph-line-screen"></i>
                                        TV
                                    </li>
                                    <li>
                                        <i class="flaticon-weightlifting"></i>
                                        GYM
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-phone-receiver"></i>
                                        Telephone
                                    </li>
                                    <li>
                                        <i class="flaticon-wifi-connection-signal-symbol"></i>
                                        Wi-fi
                                    </li>
                                    <li>
                                        <i class="flaticon-parking"></i>
                                        Parking
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hiddenmt-15">
                            <a href="blog-details.html" class="read-more-btn">Read more...</a>
                        </div>

                    </div>
                </div>


                <div class="hotel-box-list">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 col-pad">
                        <img src="img/room/img-17.jpg" alt="rooms-col-1" class="img-responsive">
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 detail">
                        <div class="heading">
                            <div class="title pull-left">
                                <h3>
                                    <a href="rooms-details.html">Double Room</a>
                                </h3>
                            </div>
                            <div class="price pull-right">
                                $567.99/Night
                            </div>
                        </div>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a</p>
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-bed"></i>
                                        2 King Beds
                                    </li>
                                    <li>
                                        <i class="flaticon-air-conditioning"></i>
                                        AC
                                    </li>
                                    <li>
                                        <i class="flaticon-breakfast"></i>
                                        Breakfast
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-room-service"></i>
                                        Room Service
                                    </li>
                                    <li>
                                        <i class="flaticon-graph-line-screen"></i>
                                        TV
                                    </li>
                                    <li>
                                        <i class="flaticon-weightlifting"></i>
                                        GYM
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="fecilities">
                                    <li>
                                        <i class="flaticon-phone-receiver"></i>
                                        Telephone
                                    </li>
                                    <li>
                                        <i class="flaticon-wifi-connection-signal-symbol"></i>
                                        Wi-fi
                                    </li>
                                    <li>
                                        <i class="flaticon-parking"></i>
                                        Parking
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hiddenmt-15">
                            <a href="blog-details.html" class="read-more-btn">Read more...</a>
                        </div>

                    </div>
                </div> -->

                
            </div>
        </div>

        
    </div>
</div>
<!-- Rooms  section end -->


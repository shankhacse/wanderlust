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
        <div class="row">
       
            <div class="col-lg-12 col-md-12 col-xs-12" style="background:#fff;padding:20px 17px 17px 2px;">
                <!-- sidebar start -->
               
                <div class="col-lg-5 col-md-5 col-xs-12">
                   
                    <!--  Rooms detail slider start -->
                    <div class="rooms-detail-slider simple-slider">
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
                            <!-- <ol class="carousel-indicators thumbs visible-lg visible-md">
                            <?php foreach($RoomGallery as $roomgallery){  ?>
                                <li data-target="#carousel-custom" data-slide-to="0" class=""><img src="<?php echo base_url(); ?>assets/img/room/<?php echo $roomgallery->large_image; ?>" alt="Chevrolet Impala"></li>
                                <?php } ?>
                            </ol> -->
                        </div>
                    </div>
                   

                   
               
                <!-- sidebar end -->
          
           </div>
            <!-- middle sidebar end -->
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-xs-12" style="padding-bottom:10px;">
               
                        <img src="<?php echo base_url(); ?>assets/img/room/<?php echo $RoomGallery[0]->large_image; ?>" class="thumb-preview" alt="Chevrolet Impala" style="height:162px;">
                
                      </div>
                </div>
                <div class="row">
                      <div class="col-lg-6 col-md-6 col-xs-12" style="padding-right: 3px;">               
                        <img src="<?php echo base_url(); ?>assets/img/room/<?php echo $RoomGallery[0]->large_image; ?>" class="thumb-preview" alt="Chevrolet Impala" style="height:129px;">                
                    </div> <div class="col-lg-6 col-md-6 col-xs-12" style="padding-left: 6px;">               
                        <img src="<?php echo base_url(); ?>assets/img/room/<?php echo $RoomGallery[0]->large_image; ?>" class="thumb-preview" alt="Chevrolet Impala" style="height:129px;">                
                    </div>
                </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 recommadedroom">
                    <div class="row">
                      <div class="rrTop">
                          <?php if($no_of_room > 1){ ?>
                                <div class="col-md-12 rrTopLeft  truncate">
                                        <p class="latoBlack font16 blackText appendBottom5 truncate">Recommended  combo</p>
                                        <p class="font11 lineHight16">
                                            <?php echo $roomalloted[0]['package_name'].' for '.$audults_no.' Adults '; ?><?php if($children_no > 0){  echo '+ '.$children_no.' Child'; } ?></p>
                                 </div>
                         
                                 <div class="rrTopRight">
                                     <p class="font14 blackText latoBlack appendBottom2 appendTop5"><span class="font12 latoRegular">INR</span> <?php echo number_format($total_romm_price) ?></p>
                                 </div>
                                 <?php }else{ ?>

                                    <div class="col-md-12 rrTopLeft  truncate">
                                        <p class="latoBlack font16 blackText appendBottom5 truncate linehg21"><?php echo $roomalloted[0]['type']; ?></p>
                                        <p class="font11"><?php echo $roomalloted[0]['package_name'].' for '.$audults_no.' Adults '; ?><?php if($children_no > 0){  echo '+ '.$children_no.' Child'; } ?></p>
                                        <ul class="srList font12 linehg21">
                                       <li><span class="sprite noRefundIcon appendRight5"></span><span class="redText">Non Refundable</span>
                                    </li>
                                       <li><span class="sprite roomSelectIcon appendRight5"></span><span class="greenText">Room Only</span>
                                    </li>
                                    </ul>
                                 </div>
                         
                                 <div class="rrTopRight">
                                     <p class="font14 blackText latoBlack appendBottom2 appendTop5"><span class="font12 latoRegular">INR</span> <?php echo number_format($roomalloted[0]['rate']) ?></p><br>
                                     <p class="font11 redText lineHight14 linehg35">Deal Applied <br>  </p>
                                 </div>

                                 <?php } ?>
                            </div>
                            <?php if($no_of_room > 1){ ?>
                            <div class="rt">
                                <div class="rtLeft">
                                   <p class="latoBold font14 blackText appendBottom4 stripHeading linehg17">Room 1:
                                   <span title="Classic Room"><?php echo $roomalloted[0]['type']; ?></span></p>
                                   <p class="font11"><?php echo $roomalloted[0]['package_name'].' for '.$audults_no.' Adults '; ?><?php if($children_no > 0){  echo '+ '.$children_no.' Child'; } ?></p>
                                  
                                </div>
                                <div class="rtRight">
                                <p class="latoBlack font14 blackText"><span class="font12 latoRegular">INR </span><?php echo number_format($roomalloted[0]['rate']) ?></p>
                               </div>
                            </div>
                            <?php } ?>
                            <?php if($no_of_room > 1){ ?>
                            <div  class="rt makeFlex vrtlCenter">
                                   <a class="latoBold font12 textCenter" href="#RoomType">+ <?php echo $no_of_room - 1; ?> MORE ROOMS</a>
                            </div>
                            <?php } ?>
                            <div  class="otherRooms">
                            <span class="latoBlack font12 blueText pointer" id="detpg_multi_other_rooms">OTHER ROOMS</span>
                            <a href="#RoomType"><span class="fcTooltip__outer "><button id="detpg_multi_view_combo" class="primaryBtn">VIEW THIS COMBO</button></span></a>
                            </div>
                    </div>
                </div>

                <!-- <div class="whatGuestsSaid">
                    <div class="makeFlex spaceBetween appendBottom5">
                        <div><p class="makeFlex hrtlCenter spaceBetween appendBottom3 blueText">
                            <span class="latoBlack font16">What Guests Said</span></p>
                            <p class="font12 grayText appendTop5">Based on 4147 Reviews</p>
                        </div>
                        <span class="ratingGeneric whiteText lightGreenBg">4.2</span>
                    </div>
                    <ul class="verifiedReviews font11 blackText">
                        <li><span title="Good Room">Good Room</span></li>
                    <li><span title="Good Location">Good Location</span></li>
                    <li><span title="Good Service">Good Service</span></li>
                    <li><span title="Good Food">Good Food</span></li>
                </ul>
                <p class="appendTop5"><a class="latoBold font12 capText" href="javascript:void(0);">All Reviews</a></p>
            </div> -->
                
           </div>
             <!-- middle sidebar end -->
        </div>

<!-- start section for room dtl -->
          <div class="row appendTop5">
          <form name="bookingConfimdtlForm" id="bookingConfimdtlForm">
                        <section id="RoomType" class="page-section bottom35">
                            <div class="_RoomType">
                            <input type="hidden" name="checkin_dt" id="checkin_dt"   value="<?php echo $check_in_dt; ?>">
                            <input type="hidden" name="checkout_dt" id="checkout_dt"  value="<?php echo $checkout_dt; ?>">
                            <input type="hidden" name="audults_no" id="audults_no"  value="<?php echo $audults_no; ?>">
                            <input type="hidden" name="children_no" id="children_no"  value="<?php echo $children_no; ?>">
                            <input type="hidden" name="room" id="room"  value="<?php echo $room_type; ?>">
                            <input type="hidden" name="package" id="package"  value="<?php echo $package_type; ?>">
                            <input type="hidden" name="room_id" id="room_id"  value="<?php echo $room_id; ?>">
                           
                                <div class="">
                                    <div class="makeFlex appendBottom40 comboWrap">

                                <div class="left">
                                   <div class="makeFlex bdrBottom padding20 spaceBetween hrtlCenter makeRelative">
                                       <div class="latoBold font20  comboTitle">Recommended for <?php echo $audults_no.' Adults '; ?><?php if($children_no > 0){  echo '& '.$children_no.' Child'; } ?>
                                       </div>
                                    </div>
                                    <?php $rowno = 0;$audults =$audults_no;$children=$children_no;
                                     foreach($roomalloted as $roomalloted1){ ?>
                                    <div class="makeFlex latoBold roomRow">
                                    <input type="hidden" name="room_id[]" id="room_id_<?php echo $rowno++; ?>"  value="<?php echo $roomalloted1['room_id']; ?>">
                                        <div class="makeFlex column width33">
                                            <span class="appendBottom5 roomTag whiteText"> Room <?php echo $rowno; ?></span>
                                            <p class="font16 blueText appendBottom5"><?php echo $roomalloted1['type']; ?></p>
                                            <p><?php if($roomalloted1['max_adult'] <= $audults){ echo  $roomalloted1['max_adult'].' Adults '; }else{ echo $audults.' Adults '; }?><?php  if($children > 0 ){ if($roomalloted1['max_child'] <= $children){ echo '+ '.$roomalloted1['max_child'].' Child';}else{ echo '+ '.$children.' Child'; }} ?></p>
                                        </div>
                                        <div class="makeFlex column width22">
                                        <p class="font16 blackText">Tariff Type</p>
                                        <ul class="types"><li>Room Only</li><li>Non Refundable</li></ul>
                                        </div>
                                        <div class="makeFlex column width22">
                                        <p class="font16 blackText">Tariff Inclusions</p>
                                        <ul class="types"><li>Accommodation only</li><li>Accommodation</li></ul>
                                        </div>
                                        <div class="makeFlex column width22">
                                        <p class="font16 blackText">Mattress <span class="latoBold appendBottom5 textp">(each : INR <?php echo number_format($roomalloted1['each_mattress_price']);  ?>)</span></p>
                                            <!-- <span class="appendBottom5 roomTag whiteText"> Mattress</span> -->
                                            <div class="form-group margintop10">
                                                <select class="selectpicker search-fields form-control-2" id="mattress" name="mattress[]">
                                                    <option value="0">Select</option>                                                  
                                                    <?php for($i = 1;$i <= $roomalloted1['no_of_mattress'];$i++){ ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                   
                                                    <?PHP } ?>
                                                </select>
                                            </div>
                                           
                                        </div>

                                        <!-- <div class="makeFlex column width33">
                                            <span class="appendBottom5 roomTag whiteText"> Room 1</span>
                                            <p class="font16 blueText appendBottom5">Classic Room</p>
                                            <p>1 Adults + 1 Child</p>
                                        </div> -->
                                   </div>
                                <?php $audults-=$roomalloted1['max_adult'];$children-=$roomalloted1['max_child']; } ?>
                                  
                                  <p class="padding10 textcenter latoRegular blackText"> <?php if($audults > 0){ echo "Only ".$no_of_room.' Rooms Available( For Extra People Select Mattress )';}; ?></p>
                                 </div>
                                 <div class="priceBreakUp">
                                    <p class="bdrBottom font20 latoBold appendBottom20 breackUpHeading">Details</p>
                                    <?php $rowno = 1; foreach($roomalloted as $roomalloted2){ ?>
                                    <div class="makeFlex paddingLR20 appendBottom20">
                                         <span class="appendRight10 roomTag whiteText"> Room <?php echo $rowno; ?></span>
                                         <div class="basicCost">
                                             <p class="latoBold appendBottom5 textp">Basic room cost </p>
                                             <p class="font11">( INR <?php echo number_format($roomalloted2['rate']) ?>)</p>
                                            </div>
                                            <div class="makeflex roomPrice">
                                                <p class="blackText font15">INR <?php echo number_format($roomalloted2['rate']) ?></p>
                                            </div>
                                       </div>
                                    <?php $rowno++; } ?>
                                       <!-- <div class="makeFlex paddingLR20 appendBottom20">
                                         <span class="appendRight10 roomTag whiteText"> Room 2</span>
                                         <div class="basicCost">
                                             <p class="latoBold appendBottom5 textp">Basic room cost </p>
                                             <p class="font11">( INR 2,039)</p>
                                            </div>
                                            <div class="makeflex roomPrice">
                                                <p class="blackText font15">INR 2,039</p>
                                            </div>
                                       </div> -->
                                       <!-- start for discount offer -->
                                       <div class="makeFlex paddingLR20 appendBottom20 bdrBottom">
                                       <!-- <div class="makeFlex hrtlCenter greenText appendBottom20  discount">
                                            Total discount
                                       </div>
                                       <div class="makeflex roomPrice">
                                                <p class="greenText font16">- INR 734</p>
                                            </div> -->
                                 </div>
                                  <!-- end for discount offer -->

                                 <div class="makeFlex spaceBetween paddingLR20 font18 blackText latoBold">
                                     <span>Price </span>
                                     <span id="detpg_combo_price">INR <?php echo number_format($total_romm_price); ?></span>
                                </div>
                                <p class="font11 grayText textRight appendTop5 paddingLR20 appndmarbottom">(<?php echo $roomalloted[0]['package_name'].' for '.$audults_no.' Adults + '.$children_no.' Child'; ?>)</p>

                                <button type="submit" class="primaryBtn2 overlapBtn" id="detpg_book_combo_btn">Book this combo</button>
                                 </div>
                                </div>
                            </div>
                            </form>
                            </section>
        </div>
<!-- end section for room dtl -->
    </div>
</div>

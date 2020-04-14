<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>South 24 Parganas | Home</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/web/images/favicon.ico" type="image/x-icon" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    
    <link href="<?php echo base_url(); ?>assets/css/reset.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/fonts/fonts.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/web.css" rel="stylesheet" />

    <!-- <link href="<?php echo base_url(); ?>assets/css/main.min.css" rel="stylesheet" /> -->


   
    
</head>
<body>

<?php 
//pre($headerinfo);
?>

<header id="main-header">
   <section id="top-section">
      <div class="container">
         <div class="row">
            <div class="col-md-2 logo-block">
               <!-- <img src="<?php echo base_url(); ?>assets/webdoc/uploadedfiles/<?php echo $headerinfo->home_logo; ?>" /> -->
            </div>
            <div class="col-md-10 menus-block">
               <div class="row">
                  <div class="col-md-12">
                     <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="collapse navbar-collapse">
                           <ul class="navbar-nav ml-auto right-nav fsize-sm">
                              <li class="nav-item"><a class="nav-link login" href="<?php echo base_url() ?>adminportal/login" target="_blank">G2G Login</a></li>
                              <li class="nav-item top-li-bg"><a class="nav-link sm-fsize ">-A</a></li>
                              <li class="nav-item top-li-bg"><a class="nav-link"> A</a></li>
                              <li class="nav-item top-li-bg"><a class="nav-link lg-fsize">+A</a></li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-8 site-title-block">
                     <div class="d-flex flex-row bd-highlight">
                        <div class="e-bangla-text">EGIYE BANGLA </div>
                        <div class="e-bangla-link">e-Bangla</div>
                     </div>
                     <div class="d-flex flex-row mt-1">
                        <div class="site-title"> </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <ul class="ml-auto right-nav fsize-sm">
                        <li class="nav-item">
                           <div class="select">
                              <select name="slct" id="slct">
                                 <option selected>Choose Department</option>
                                 <option value="1">Department 1</option>
                                 <option value="1">Department 1</option>
                                 <option value="1">Department 1</option>
                               
                              </select>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
               <!-- Menu Desc -->
               <div class="row">
                  <div class="col-md-12">
                     <nav class="navbar navbar-icon-top navbar-expand-lg" id="primary-menu">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryMenuContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="primaryMenuContent">



                           <!-- <ul class="navbar-nav mr-auto fsize-sm">
                              <li class="nav-item active">
                                 <a class="nav-link" href="<?php echo base_url(); ?>">Home
                                 <span class="sr-only">(current)</span>
                                 </a>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">District Profile</a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>district_profile/historical_background">Historical Background</a>
                                    <a class="dropdown-item" href="#">Geography</a>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>district_profile/industry">Industry</a>
                                 </div>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Administration
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    <a class="dropdown-item" href="#">Message</a>
                                    <a class="dropdown-item" href="#">Administration</a>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>administration/political">Political</a>
                                 </div>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    General
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                    <a class="dropdown-item" href="#">Message</a>
                                    <a class="dropdown-item" href="#">Administration</a>
                                    <a class="dropdown-item" href="#">Sub Division</a>
                                 </div>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Citizen
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                    <a class="dropdown-item" href="#">Message</a>
                                    <a class="dropdown-item" href="#">Administration</a>
                                    <a class="dropdown-item" href="#">Sub Division</a>
                                 </div>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Important Links
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown5">
                                    <a class="dropdown-item" href="#">Message</a>
                                    <a class="dropdown-item" href="#">Administration</a>
                                    <a class="dropdown-item" href="#">Sub Division</a>
                                 </div>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">
                                    E-District
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">
                                    Where to Stay
                                 </a>
                              </li>
                           </ul> -->

                           <ul class="navbar-nav mr-auto fsize-sm">
                           <?php 
                              if(count($webmenu)>0) {
                                 foreach($webmenu as $web_menu){
                                    $first_level_url =  urlofWebMenusByType($web_menu['FirstLevelMenuData'],$web_menu['FirstLevelMenuData']->page_or_link_type,$menufor,$block);
                                 
                                 $secondlevelcount = sizeof($web_menu['secondLevelMenu']); 
                                 if($secondlevelcount > 0) { ?>


                                 <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $web_menu['FirstLevelMenuData']->name; ?></a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                 <?php 
                                
                                    foreach ($web_menu['secondLevelMenu'] as $websubmenu) {
                                       $second_level_url = urlofWebMenusByType($websubmenu['secondLevelMenuData'],$websubmenu['secondLevelMenuData']->page_or_link_type,$menufor,$block);
                           
                                 ?>
                              
                                    <a class="dropdown-item" href="<?php echo $second_level_url; ?>"><?php echo $websubmenu['secondLevelMenuData']->name; ?></a>
                                
                              
                                 <?php } ?>

                                 </div>

                              </li>

                                 <?php
                                 }
                                 else{
                                    
                                    ?>
                                       <li class="nav-item"><a class="nav-link" href="<?php echo $first_level_url; ?>"><?php echo $web_menu['FirstLevelMenuData']->name; ?></a></li>
                           <?php
                                 }
                           ?>



                           <?php }} ?>
                           </ul>

                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
         <!-- end of main-row-->
      </div>
   </section>
</header>
<!-- End of Header -->









        
        <div id="mainbody-container">
            <?php
            if(isset($view_file))
            { 
              $this->load->view('block/'.$view_file);
              
            }
            ?>
        </div> <!-- End of Main Content -->





        <footer class="footer">
<div class="container">
<div class="row">



<div class="col-md-2">
<h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="javascript:;">Home</a></li>
<li><a href="javascript:;">District Profile</a></li>
<li><a href="javascript:;">Administration</a></li>
<li><a href="javascript:;">General</a></li>
<li><a href="javascript:;">Citizen</a></li>
<li><a href="javascript:;">Important Link</a></li>
<li><a href="javascript:;">e-District</a></li>
<li><a href="javascript:;">eOffice</a></li>
<li><a href="javascript:;">Departments</a></li>

</ul>
<!--footer_ul_amrc ends here-->
</div>


<div class="col-md-3">
<h5 class="headin5_amrc col_white_amrc pt2">Services</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="javascript:;">e-District</a></li>
<li><a href="javascript:;">SRER-2019</a></li>
<li><a href="javascript:;">Search Caste Certificate</a></li>
<li><a href="javascript:;">Police Verification status</a></li>
<li><a href="javascript:;">National Voters' service portal</a></li>

</ul>
<!--footer_ul_amrc ends here-->
</div>

<div class="col-md-3">
<h5 class="headin5_amrc col_white_amrc pt2">Get in touch with us</h5>
<!--headin5_amrc-->
<p>Office of the District magistrate,New Administratve Building , </p>
<p>Alipore South 24-Parganas </p>
<p>Kolkata - 700 027, India </p>
<p>dm-info@nic.in  </p>


</div>


<div class="col-md-2">
   <h5 class="headin5_amrc col_white_amrc pt2">Follow Us on</h5>
   <ul class="footer_ul_amrc">
      <li><a href="javascript:;"><i class="fa fa-facebook padding-right"></i> Facebook</a></li>
      <li><a href="javascript:;"><i class="fa fa-twitter padding-right"></i> Twitter</a></li>
      <li><a href="javascript:;"><i class="fa fa-youtube padding-right"></i> Youtube</a></li>
   </ul>
</div>

<div class="col-md-2 sera-south-biswabangla-logo">
   <img src="<?php echo base_url() ?>assets/webdoc/images/serasouth-biswabngla.png"  alt="Sera South and Biswa Bangla Logo">
   <!-- <i class="s24sprite s24sprite-serasouth-biswabngla"></i> -->
</div>



</div>
</div>


<div class="container">
<ul class="foote_bottom_ul_amrc">
<li><a href="javascript:;">POLICY</a></li>
<li><a href="javascript:;">LEGAL DISCLAIMER</a></li>
<li><a href="javascript:;">SITE MAP</a></li>

</ul>
<!--foote_bottom_ul_amrc ends here-->
<p class="text-center fsize-sm" style="font-size: 0.6rem;">The website is designed & developed by  Aaaaa & Contents provided by Bbbbbbbbbb.  </p>
<p  class="text-center fsize-sm">best view in ie9 or upper resolution 1366px X 768px </p>

<!-- <div class="footelogo">
    <div class="row">
        <div class="col-md-6">
            <img src="images/biswabangla_logo.png" alt="Biswabangla"/>
        </div>
        <div class="col-md-6">South 24 Parganas,West Bengal
    </div>
    </div>
</div> -->


</div>

</footer>
<!-- End of Footer -->


    <!-- <script src="<?php echo base_url(); ?>assets/common/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/common/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/common/js/marquee.min.js"></script> -->

    <script src="<?php echo base_url(); ?>assets/js/webjs/main.min.js"></script>
   
 
   <script>
	//$('#js-news').ticker();
   (function() {
	var $ = jQuery,
		pauseId = 'jQuery.pause',
		uuid = 1,
		oldAnimate = $.fn.animate,
		anims = {};

	function now() { return new Date().getTime(); }

	$.fn.animate = function(prop, speed, easing, callback) {
		var optall = $.speed(speed, easing, callback);
		optall.complete = optall.old; // unwrap callback
		return this.each(function() {
			// check pauseId
			if (! this[pauseId])
				this[pauseId] = uuid++;
			// start animation
			var opt = $.extend({}, optall);
			oldAnimate.apply($(this), [prop, $.extend({}, opt)]);
			// store data
			anims[this[pauseId]] = {
				run: true,
				prop: prop,
				opt: opt,
				start: now(),
				done: 0
			};
		});
	};

	$.fn.pause = function() {
		return this.each(function() {
			// check pauseId
			if (! this[pauseId])
				this[pauseId] = uuid++;
			// fetch data
			var data = anims[this[pauseId]];
			if (data && data.run) {
				data.done += now() - data.start;
				if (data.done > data.opt.duration) {
					// remove stale entry
					delete anims[this[pauseId]];
				} else {
					// pause animation
					$(this).stop();
					data.run = false;
				}
			}
		});
	};

	$.fn.resume = function() {
		return this.each(function() {
			// check pauseId
			if (! this[pauseId])
				this[pauseId] = uuid++;
			// fetch data
			var data = anims[this[pauseId]];
			if (data && ! data.run) {
				// resume animation
				data.opt.duration -= data.done;
				data.done = 0;
				data.run = true;
				data.start = now();
				oldAnimate.apply($(this), [data.prop, $.extend({}, data.opt)]);
			}
		});
	};
})();

$('.marquee').marquee({
  pauseOnHover: true,
  allowCss3Support: false,
  duration: 15000,
});
   </script>

</body>
</html>
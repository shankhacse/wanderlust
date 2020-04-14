<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>South24 Pargana | Dashboard</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/croppie.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/datatables.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.fancytree/2.27.0/skin-win8/ui.fancytree.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline&display=swap" rel="stylesheet"> 

    
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>   
    <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/parsley.min.js"></script>          
    <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatables.min.js"></script>     
    <!-- <script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>      -->
    <script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>     
    <!-- <script src="<?php echo base_url(); ?>assets/js/pdf.js"></script>     
    <script src="<?php echo base_url(); ?>assets/js/pdf.worker.js"></script> -->
    <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>     
    

    <script src="<?php echo base_url(); ?>assets/js/adminjs/csrfsetting.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/adminjs/app.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/croppie.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/jquery.domenu.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.nestable.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/adminjs/menu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/adminjs/layoutbuild.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.fancytree/2.27.0/jquery.fancytree-all-deps.js"></script>

 
</head>
<body>

<div id="wrapper">

<header id="main-header">
   <nav class="navbar navbar-expand-lg navbar-light shadow-sm top-nav">
      <div class="container">
         <a href="#" class="navbar-brand font-weight-bold">
           <img src="http://localhost/southpgs/assets/webdoc/uploadedfiles/5dc66c9331adc1573285011.png" alt="" style="width:30px;">
         </a>
         <input type="hidden" value="<?php echo admin_with_base_url();?>" id="admbasepath" readonly />
          <h3>South 24 Parganas</h3>
         <div id="navbarContent" class="collapse navbar-collapse top-nav-right">
            <ul class="navbar-nav ml-auto">
            <li>
                <form class="form-inline my-2 my-lg-0 searchForm">
                  <input class="form-control custom-fm-input-sm" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="button"><i class="fa fa-search"></i></button>
                </form>
              </li>
              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>

                <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="<?php echo admin_with_base_url()?>login/logout" class="dropdown-item">Logout</a></li>
                </ul>
              </li>
            </ul>


         </div>
      </div>
   </nav>



   <!-- Nav Menu -->
    <div class="container-fluid main-nav ">
     <div class="container">
        <div class="row">
          <div class="col-md-12">
              <nav class="navbar navbar-expand-lg navbar-light">
              <div class="container-fluid">
                <!-- <a href="#" class="navbar-brand font-weight-bold">S24 Parganas</a> -->
                <!-- <input type="hidden" value="<?php echo admin_with_base_url();?>" id="admbasepath" readonly /> -->
                <button type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                      <!-- Level one dropdown -->

                      
                      <li class="nav-item dropdown">
                          <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Page</a>
                          <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0">
                              <li><a href="<?php echo admin_with_base_url()?>page/create_page" class="dropdown-item">Create Page </a></li>
                              <li><a href="<?php echo admin_with_base_url()?>page" class="dropdown-item">List Page </a></li>
                          </ul>
                      </li>
                      <li class="nav-item dropdown">
                          <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Link</a>
                          <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0">
                            <li><a href="<?php echo admin_with_base_url()?>link/create_link_category_headers" class="dropdown-item">Link Headers For Table</a></li>
                            <li><a href="<?php echo admin_with_base_url()?>link/create_link_category" class="dropdown-item">Link Category </a></li>
                            <li><a href="<?php echo admin_with_base_url()?>link/create_link" class="dropdown-item">Create Link </a></li>
                            <li><a href="<?php echo admin_with_base_url()?>link" class="dropdown-item">List Link </a></li>
                          </ul>
                      </li>

                      <li class="nav-item dropdown">
                          <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Menu</a>

                          <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0">
                            <li><a href="<?php echo admin_with_base_url()?>menu/create_menu" class="dropdown-item">Send to Menu </a></li>
                            <li><a href="<?php echo admin_with_base_url()?>menu/arrange_menu" class="dropdown-item">Arrange Menu </a></li>
                            <li><a href="<?php echo admin_with_base_url()?>menu/list_menu" class="dropdown-item">Menu List </a></li>

                          </ul>
                      </li>

                      <li class="nav-item dropdown">
                          <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Media</a>
                          <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0">
                            <li><a href="<?php echo admin_with_base_url()?>mediaupload" class="dropdown-item">Media Upload</a></li>
                            <li><a href="<?php echo admin_with_base_url()?>mediaupload/medialist" class="dropdown-item">Media List </a></li>
                          </ul>
                      </li>

                      <li class="nav-item dropdown">
                        
                          <a id="dropdownMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Home Settings</a>

                          <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0">
                            <li><a href="<?php echo admin_with_base_url()?>homepage/logo_title" class="dropdown-item leftMenu">Logo & Title </a></li>
                            <li><a href="<?php echo admin_with_base_url()?>homepage/homebanner" class="dropdown-item leftMenu">Banner </a></li>
                            <li><a href="<?php echo admin_with_base_url()?>homepage/dm_details" class="dropdown-item leftMenu">DM Desk </a></li>
                            <li><a href="<?php echo admin_with_base_url()?>homepage/addAnnouncement" class="dropdown-item leftMenu">Key Announcement </a></li>
                              <li><a href="<?php echo admin_with_base_url()?>homepage/addUpcommingEvents" class="dropdown-item leftMenu">Upcomming Events </a></li>
                              <li>
                                  <a href="<?php echo admin_with_base_url()?>homepage/achievments_stories" class="dropdown-item leftMenu">Achievments &  Stories </a>
                              </li>

                              <li class="nav-item dropdown">
                                  <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Achievments &  Stories </a>
                                  <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0">
                                    <li><a href="<?php echo admin_with_base_url()?>homepage/addAnnouncement" class="dropdown-item leftMenu">Key Announcement </a></li>
                                  </ul>
                              </li>

                        
                          </ul>
                      </li>




                      <!-- End Level one -->
                      <!-- <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                      <li class="nav-item"><a href="#" class="nav-link">Services</a></li>
                      <li class="nav-item"><a href="#" class="nav-link">Contact</a></li> -->
                    </ul>



                </div>
              </div>
          </nav>
          </div>
        </div>
      </div>
    </div>
   <!-- End of Nav Menu -->


<!---------------------------------- trest nav ----------------------------------------->
<?php //echo $menus; ?>
<div class="container-fluid main-nav">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    
    
<nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
	  </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

            <?php 
              if(count($usermenus)>0) { 
              foreach($usermenus as $flevel) {
                if(count($flevel['childmenus'])>0) { ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $flevel['menudetail']->name; ?></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <?php foreach($flevel['childmenus'] as $slevel) { 
                        if(count($slevel['childmenus'])>0){ ?>
                            <li class="dropdown">
                              <a class="dropdown-item" href="#"><?php echo $slevel['menudetail']->name; ?></a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <?php foreach($slevel['childmenus'] as $tlevel) { ?>
                                      <li><a class="dropdown-item" href="#"><?php echo $tlevel['menudetail']->name; ?></a></li>
                                  <?php } ?>
                              </ul>
                            </li>

                        <?php
                        }else{  
                      ?>
                      <li><a class="dropdown-item" href="#"><?php echo $slevel['menudetail']->name; ?></a></li>
                      <?php } ?>
                   
                <?php
                  }
                  echo  "</ul>";
                }
                else { ?>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><?php echo $flevel['menudetail']->name; ?></a>
                  </li>
              <?php }
              }  
              ?>



            <?php
              }
            ?>
            
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown link</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li class="dropdown">
                        <a class="dropdown-item" href="#">Submenu</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Submenu action</a></li>
                            <li><a class="dropdown-item" href="#">Another submenu action</a></li>
                            <li class="dropdown">
                                <a class="dropdown-item" href="#">Subsubmenu</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
                                    <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-item" href="#">Second subsubmenu</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
                                    <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> -->



        </ul>
    </div>
</nav>
</div>
  </div>
</div>
</div>

<!---------------------------------- trest nav ----------------------------------------->

</header>
<!-- End of Header -->



        
        <div id="mainbody-container" class="container-fluid">
            <?php
            if(isset($view_file))
            {  ?>

            

              <div class="adminblock-container">
                <div class="row ">
                  <div class="col-md-3">

                    <?php $url_arr = explode("/",partial_uri(0));
                  
                    if(!in_array('dashboard', $url_arr)) { ?>

                    <div class="card left_menu_block left-reference-link-info" style="width: 18rem;">
                      <div class="card-header " ><i class="fa fa-cog" aria-hidden="true"></i> Home Settings</div>
                       
                           <ul class="list-group list-group-flush">
                          <li class="list-group-item">
                          <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="<?php echo admin_with_base_url()?>homepage/logo_title">Logo & Title</a>
                          </li>
                          <li class="list-group-item">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="<?php echo admin_with_base_url()?>homepage/homebanner">Banner</a>
                          </li>
                          <li class="list-group-item">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="<?php echo admin_with_base_url()?>homepage/dm_details">DM Desk</a>
                          </li>
                           <li class="list-group-item">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="<?php echo admin_with_base_url()?>homepage/addAnnouncement">Key Announcement </a>
                          </li>
                           <li class="list-group-item">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="<?php echo admin_with_base_url()?>homepage/addUpcommingEvents">Upcomming Events </a>
                          </li>
                          <li class="list-group-item">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="<?php echo admin_with_base_url()?>homepage/achievments_stories">Achievments &  Stories </a>
                          </li>
                        </ul>



                    </div>

                    <?php
                     }
                     else{
                      // echo "Failed";
                     }
                     
                    ?>

                  </div>
                  <div class="col-md-8 contentblock">
                    <?php echo $this->load->view('adminportal/'.$view_file); ?>
                  </div>
                </div>
              </div>


            <?php
            }
            ?>
        </div> <!-- End of Main Content -->



        <?php 
          /**
           * Reusable delete confirmation for all confirmation used in dashboard panel
           * rootudialigdeli = just given for not conflict with any other name
           */
        ?>

        <div class="confirmdeleteDialog">
            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" >
              <div class="modal-dialog">
                  <div class="modal-content text-center">
                  
                  
                  
                      <div class="modal-body">
                          <i class="fa fa-times-circle" aria-hidden="true"></i>
                          <p class="title">Are you sure?</p>
                          <p class="info">Do you really want to delete this record? This process cannot be undone.</p>
                      </div>
                      
                      <div class="modal-footer">
                          <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                          <form id="rootudialigdeliForm" name="rootudialigdeliForm" method="POST">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="rootudialigdeli" id="rootudialigdeli"/>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>
                      </div>
                  </div>
              </div>
            </div>
        </div>

        <?php  if(isset($media_chooser)){echo $this->load->view('adminportal/'.$media_chooser);} ?>

 

<footer class="footer">
    <div class="container text-center color-1">
      Copyright @2019
    </div>
</footer>
<!-- End of Footer -->

    </div>



<script>
$(document).ready(function(){

  // $('.navbar .dropdown-item').on('click', function (e) {
  //       var $el = $(this).children('.dropdown-toggle');
  //       var $parent = $el.offsetParent(".dropdown-menu");
  //       $(this).parent("li").toggleClass('open');

  //       if (!$parent.parent().hasClass('navbar-nav')) {
  //           if ($parent.hasClass('show')) {
  //               $parent.removeClass('show');
  //               $el.next().removeClass('show');
  //               $el.next().css({"top": -999, "left": -999});
  //           } else {
  //               $parent.parent().find('.show').removeClass('show');
  //               $parent.addClass('show');
  //               $el.next().addClass('show');
  //               $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
  //           }
  //           e.preventDefault();
  //           e.stopPropagation();
  //       }
  //   });

  //   $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
  //       $(this).find('li.dropdown').removeClass('show open');
  //       $(this).find('ul.dropdown-menu').removeClass('show open');
  //   });


  $('.dropdown-menu > .dropdown > a').addClass('dropdown-toggle');

$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');
  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-menu > .dropdown .show').removeClass("show");
  });
  return false;
});


  $image_crop = $('#image_modal_preview').croppie({
    enableExif: true,
    viewport: {
      width:124,
      height:163,
      type:'square' 
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#home_logo').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
        $("#islogo").val("Y");
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){

      //$(".uploadedImg").val("");
      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(response){
      $(".uploadedImg").val(response);
      $('#uploadimageModal').modal('hide');



      $("#showimage").attr("src",response);




    })
  });

 

});





/*
$("#showimage").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");
// $(".gambar").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");

						var $uploadCrop,
						tempFilename,
						rawImg,
						imageId;
						function readFile(input) {
				 			if (input.files && input.files[0]) {
				              var reader = new FileReader();
					            reader.onload = function (e) {
									//$('.upload-demo').addClass('ready');
									$('#cropImagePop').modal('show');
						            rawImg = e.target.result;
					            }
					            reader.readAsDataURL(input.files[0]);
					        }
					        else {
						        swal("Sorry - you're browser doesn't support the FileReader API");
						    }
						}

						$uploadCrop = $('#upload-demo').croppie({
							viewport: {
								width: 200,
								height: 400,
							},
							enforceBoundary: true,
							enableExif: true
						});
						$('#cropImagePop').on('shown.bs.modal', function(){
							// alert('Shown pop');
							$uploadCrop.croppie('bind', {
				        		url: rawImg
				        	}).then(function(){
				        		console.log('jQuery bind complete');
				        	});
						});

						$('.item-img').on('change', function () { 
              imageId = $(this).data('id'); 
              tempFilename = $(this).val();
              $('#cancelCropBtn').data('id', imageId);
              readFile(this); 
            });
                                                     

						$('#cropImageBtn').on('click', function (ev) {
							$uploadCrop.croppie('result', {
								type: 'base64',
								format: 'jpeg',
								size: {width: 124, height: 163}
							}).then(function (resp) {
               // console.log(resp);
               // $('#item-img-output').attr('src', resp);
                
								$('#showimage').attr('src', resp);
								$('#cropImagePop').modal('hide');
							});
						});

         
*/
</script>
       <script src="<?php echo base_url(); ?>assets/js/adminjs/homepage.js"></script>
       <script src="<?php echo base_url(); ?>assets/js/adminjs/pdfpreview.js"></script>
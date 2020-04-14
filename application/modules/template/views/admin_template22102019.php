<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>South24 Pargana | Dashboard</title>
    <link href="<?php echo base_url(); ?>assets/common/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet" />
   
</head>
<body>

<div id="wrapper">

<header id="main-header">
   <nav class="navbar navbar-expand-lg navbar-light py-3 shadow-sm">
      <div class="container-fluid">
         <a href="#" class="navbar-brand font-weight-bold">S24 Pargana</a>
         <button type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div id="navbarContent" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
               <!-- Level one dropdown -->
               <li class="nav-item dropdown">
                  <a id="dropdownMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Menu</a>
                  <ul aria-labelledby="dropdownMenu1" class="dropdown-menu border-0">
                     <li><a href="<?php echo admin_with_base_url()?>menu/create_menu" class="dropdown-item">Create Menu </a></li>
                     <!-- <li class="dropdown-divider"></li> -->
                     <!-- Level two dropdown-->
                     <!-- <li class="dropdown-submenu">
                        <a id="dropdownMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                        <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0 shadow">
                           <li>
                              <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                           </li>
                        
                           <li class="dropdown-submenu">
                              <a id="dropdownMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                              <ul aria-labelledby="dropdownMenu3" class="dropdown-menu border-0 ">
                                 <li><a href="#" class="dropdown-item">3rd level</a></li>
                                 <li><a href="#" class="dropdown-item">3rd level</a></li>
                              </ul>
                           </li>
                         
                           <li><a href="#" class="dropdown-item">level 2</a></li>
                           <li><a href="#" class="dropdown-item">level 2</a></li>
                        </ul>
                     </li> -->
                     <!-- End Level two -->
                  </ul>
               </li>
               <!-- End Level one -->
               <!-- <li class="nav-item"><a href="#" class="nav-link">About</a></li>
               <li class="nav-item"><a href="#" class="nav-link">Services</a></li>
               <li class="nav-item"><a href="#" class="nav-link">Contact</a></li> -->
            </ul>


            <ul class="navbar-nav ml-auto">
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
</header>
<!-- End of Header -->



        
        <div id="mainbody-container" class="container-fluid">
            <?php
            if(isset($view_file))
            {  ?>

            <nav aria-label="breadcrumb" id="admin-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Menu</li>
              </ol>
            </nav>

              <div class="adminblock-container">
                <div class="row">
                  <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                      <div class="card-header">
                        Menu
                      </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">
                            <a href="<?php echo admin_with_base_url()?>menu/create_menu">Create Menu</a>
                          </li>
                          <li class="list-group-item">
                            <a href="">Menu List</a>
                          </li>
                          <li class="list-group-item">
                            <a href="">Arrange Menu</a>
                          </li>
                        </ul>
                    </div>
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



 

<footer class="footer">
    <div class="container text-center color-1">
      Copyright @2012
    </div>
</footer>
<!-- End of Footer -->

          </div>
    <script src="<?php echo base_url(); ?>assets/common/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/common/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/common/js/parsley.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>
    <script>
    
    </script>
</body>
</html>
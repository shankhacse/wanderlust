<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Wanderlust</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.css">

    <!-- Multi Select Css -->
    <link href="<?php echo(base_url());?>assets/plugins/multi-select/css/multi-select.css" rel="stylesheet">

      <!-- Bootstrap Select Css -->
    <link href="<?php echo(base_url());?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo(base_url());?>assets/plugins/select2/css/select2.min.css">

  <link rel="stylesheet" href="<?php echo(base_url());?>assets/plugins/sweetalert2/sweetalert2.min.css">


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet"> 

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin_custom.css">
  

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo(base_url());?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Bootstrap Select -->
<script src="<?php echo(base_url());?>assets/plugins/sweetalert2/sweetalert2.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

  <!-- Select Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Multi Select Plugin Js -->
    <script src="<?php echo(base_url());?>assets/plugins/multi-select/js/jquery.multi-select.js"></script>
<!-- Select2 -->
<script src="<?php echo(base_url());?>assets/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo(base_url());?>assets/dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?php echo(base_url());?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo(base_url());?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/buttons.print.min.js"></script>

<!-- SlimScroll -->

<script src="<?php echo base_url(); ?>assets/js/parsley.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/master.js"></script>


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <input type="hidden" id="basepath" value="<?php echo admin_with_base_url(); ?>">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links  -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link pushmenu" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <h2 class="nav-heading">Wanderlust Admin Panel</h2>
      </li> 
      
      
      <!-- <li class="nav-item">
        <a class="nav-link logoutcss"  href="<?php echo admin_with_base_url().'login/logout'; ?>">Logout</a>
      </li> -->
     
      <li class="nav-item dropdown ml-auto useloggedinOpt liposabo">
                  <a class="nav-link dropdown-toggle colorwhite texttransform " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-tie"></i> <?php echo($this->session->userdata('user_sess_data')['username']); ?> </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="#"><i class="fas fa-user-edit"></i> Profile</a>
                      <a class="dropdown-item" href="<?php echo admin_with_base_url().'login/logout'; ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                  </div>
                </li>
     
    </ul>



  </nav>
  <!-- /.navbar -->

  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">WanderLust</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-1 pb-3 mb-1 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block texttransform"></i> <?php echo($this->session->userdata('user_sess_data')['username']); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php 
            if(sizeof($usermenus)>0){ 
                  foreach($usermenus as $firstlevel)
                  {
                   
                    if(sizeof($firstlevel['menudetail'])>0){   
                      ?>
                     

                  <li class="nav-item has-treeview">
                        <a href="<?php echo admin_with_base_url().$firstlevel['menudetail']->link; ?>" class="nav-link">
                              <i class="<?php echo $firstlevel['menudetail']->icon; ?>"></i>
                              <p><?php echo $firstlevel['menudetail']->name; ?>
                              <?php if(sizeof($firstlevel['childmenus'])>0){ ?>
                                <i class="fas fa-angle-left right"></i>
                                <?php } ?>
                                </p>
                        </a>
                       
                        <?php if(sizeof($firstlevel['childmenus'])>0){ ?>
                          <ul class="nav nav-treeview">
                            <?php foreach($firstlevel['childmenus'] as $secondlevel)
                            {  
                      ?>
                       
                          <li class="nav-item">
                            <a href="<?php echo admin_with_base_url().$secondlevel['menudetail']->link; ?>" class="nav-link">
                              <i class="<?php echo $secondlevel['menudetail']->icon; ?>"></i>
                              <p><?php echo $secondlevel['menudetail']->name; ?></p>
                            </a>
                          </li>
                         
                          <?php  }  ?>
                          </ul>
                          <?php  }  ?>
                  </li>
                     
                 
                    <?php  } } } ?>
                   
                   </ul>

             <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
         
       
         
     
  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo admin_with_base_url() ?>masters/hotels" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hotel</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="<?php echo admin_with_base_url() ?>masters/roomtype" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Room Type</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo admin_with_base_url() ?>masters/room" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Room Master</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="<?php echo admin_with_base_url() ?>masters/addRoomrate" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Room Rate</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>
       
       
        
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>

      
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
        
        </ul> -->
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Dashboard</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php echo $this->load->view('adminportal/'.$view_file); ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script>
$(document).ready(function(){
  var basepath = $("#basepath").val();

  $(".dataTable").DataTable();
});
</script>
</body>
</html>

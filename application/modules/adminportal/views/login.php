<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
<!-- <!DOCTYPE html>
<html>
    
<head>
	<title>Wanderlust || Login</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet" />
	
   
</head>

<?php 

?>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="<?php echo base_url(); ?>assets/admindoc/images/serasouth.png" class="brand_logo" alt="Logo">
                    </div>
				</div>
	
				<div class="justify-content-center form_container">
              		<form action="<?php echo admin_with_base_url()?>login/verifylogin" method="post">
					  
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
							</div>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<input type="text" name="username" class="form-control input_user"  placeholder="Username" value="<?php echo set_value('username'); ?>" autocomplete="off"> 
							
						</div>
						<?php echo form_error('username', '<div class="loginerr">', '</div>'); ?>

						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="<?php echo set_value('password'); ?>" placeholder="Password" autocomplete="off">
						</div>
						<?php echo form_error('password', '<div class="loginerr">', '</div>'); ?>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" name="submit_login" value="submit_login" class="btn login_btn">Login</button>
						</div>
						<div class="loginerr"><?php if(isset($login_failed)){echo $login_failed ;} ?></div>
						
					</form>
				</div>
				
				
			</div>
		</div>
	</div>


    <script src="<?php echo base_url(); ?>assets/common/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/common/js/bootstrap/bootstrap.min.js"></script>

</body>
</html> -->




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:;"><b>Wander</b>LUST</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo admin_with_base_url()?>login/verifylogin" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="submit_login" value="submit_login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

</body>
</html>

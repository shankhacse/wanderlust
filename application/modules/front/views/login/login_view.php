<script  src="<?php echo base_url(); ?>/assets/js/web/login.js"></script>

<div class="contact-bg overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box margintop30">
                    <!-- logo -->
                    <!-- <a href="index.html" class="clearfix alpha-logo">
                        <img src="img/logos/white-logo.png" alt="white-logo">
                    </a> -->
                    <!-- details -->
                    <div class="details">
                    <div class="loginerr margintopbottum"><?php if($loginstatus == 0){ echo $login_failed; } ?></div>
                        <h3>Sign into your account</h3>

                      
                        <!-- Form start -->
                        <form action="<?php echo base_url()?>login/verifylogin" method="post" onSubmit="return validateform();" >
                            <div class="form-group">
                                <input type="text" name="mobile_no" id="mobile_no" class="input-text onlynumber" placeholder="Mobile no" maxlength="10">
                                <div class="loginerr" id="mobilerr"></div>
                                <?php echo form_error('mobile_no', '<div class="loginerr">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="input-text" placeholder="Password">
                                <div class="loginerr" id="passworderr"></div>
                                <?php echo form_error('password', '<div class="loginerr">', '</div>'); ?>
                            </div>
                            <div class="checkbox">
                                <div class="ez-checkbox pull-left">
                                    <label>
                                        <input type="checkbox" class="ez-hide">
                                        Remember me
                                    </label>
                                </div>
                                <!-- <a href="#" class="link-not-important pull-right">Forgot Password</a> -->
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="mb-0">
                                <button type="submit" class="btn-md btn-theme btn-block" name="submit_login" value="submit_login">login</button>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                    <span>
                            Don't have an account? <a href="<?php echo base_url(); ?>signup">Register here</a>
                        </span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<script  src="<?php echo base_url(); ?>/assets/js/web/signup.js"></script>

<div class="contact-bg overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- logo -->
                    <!-- <a href="index.html" class="clearfix alpha-logo">
                        <img src="img/logos/white-logo.png" alt="white-logo">
                    </a> -->
                    <!-- details -->
                    <div class="details">
                        <h3>Create an account</h3>
                        <!-- Form start-->
                        <form name="signForm" id="signForm">
                            <div class="form-group">
                                <input type="text" name="fullname" id="fullname" class="input-text" placeholder="Full Name">
                            </div>
                           
                            <div class="form-group">
                                <input type="text" name="mobile_no" id="mobile_no" class="input-text onlynumber" maxlength="10" placeholder="Mobile Number">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="input-text" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="input-text" placeholder="Password">
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <input type="password" name="confirm_Password" id="confirm_Password" class="input-text" placeholder="Confirm Password">
                            </div>
                            <p class="errmsg" id="signerr"></p>
                            <div class=card-footer">
                                <button type="submit" class="btn-md btn-theme btn-block" id="signupbtn">Signup</button>
                            </div>
                        </form>
                        <!-- Form end-->
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>
                            Already a member? <a href="javascript:;">Login here</a>
                        </span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
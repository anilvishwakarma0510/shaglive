<?php include 'header.php';?>    
<style type="text/css">
    .bg-dark{
        background-color: #fff!important;
        box-shadow: 0px 1px 28px -18px grey;
    }
</style>
<div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-lg-6 m-auto mt-5 mb-5">
                <div class="bg-dark p-5">
                     <div class="mb-5 text-center">
                        <h3 class="mb-2 text-white">Account Holder</h3>
                        <h6 class="text-primary">You must be over 18 years old to register. No credit card needed.</h6>
                    </div>
                    <form>
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label>First Name</label>
                                <input type="text" class="form-control bg-light border-0 pt-2" placeholder="First Name">
                            </div>
                            <div class="col-lg-6">
                                <label>Last Name</label>
                                <input type="email" class="form-control bg-light border-0 pt-2" placeholder="Last Name">
                            </div>
                            <div class="col-lg-6">
                                <label>Username</label>
                                <input type="text" class="form-control bg-light border-0 pt-2" placeholder="Username">
                            </div>
                            <div class="col-lg-6">
                                <label>Phone No</label>
                                <input type="email" class="form-control bg-light border-0 pt-2" placeholder="Phone No">
                            </div>
                            <div class="col-lg-12">
                                <label>Email</label>
                                <input type="email" class="form-control bg-light border-0 pt-2" placeholder="Email">
                            </div>
                            <div class="col-lg-6">
                                <label>Password</label>
                                <input type="email" class="form-control bg-light border-0 pt-2" placeholder="Password">
                            </div>
                            <div class="col-lg-6">
                                <label>confirm password</label>
                                <input type="email" class="form-control bg-light border-0 pt-2" placeholder="confirm password">
                            </div>
                            <div class="col-lg-12">                  
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                  I have read and agree to the <a href="#"> terms and conditions.</a>
                                </label>
                              </div>    
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck11">
                                <label class="form-check-label" for="gridCheck11">
                                      I have read and agree to the <a href="#"> privacy policy.</a>
                                </label>
                              </div>
                            </div>
                            <div class="col-lg-12">
                                <a class="btn btn-primary w-100" href="email-verification.php">Create Free Account</a>
                            </div>
                            <div class="col-lg-12 p-2 text-center">
                              <p>
                                 Email addresses, when provided, are only used for friend notifications, broadcast and payout reminders, newsletter, and account verification. Your email address is never sold or shared.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>
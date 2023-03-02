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
                        <h3 class="mb-2 text-white">Log In</h3>
                    </div>
                    <form>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label>Username</label>
                                <input type="text" class="form-control bg-light border-0 pt-2" placeholder="Username">
                            </div>
                            <div class="col-lg-12">
                                <label>Password</label>
                                <input type="email" class="form-control bg-light border-0 pt-2" placeholder="Password">
                            </div>
                            <div class="col-lg-6">                  
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                  Keep me logged in. 
                                </label>
                              </div>    
                            </div>
                            <div class="col-lg-6 text-end">                  
                              <div class="form-check">
                                <label class="form-check-label" for="gridCheck1">
                                  <a href="password_reset.php">forgot password</a>
                                </label>
                              </div>    
                            </div>
                            <div class="col-lg-12">
                                <a class="btn btn-primary w-100" href="account-detail.php">Log In</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>
<?php include 'header.php';?>    

<div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-lg-6 m-auto mt-5 mb-5">
                <div class="bg-dark p-5">
                     <div class="mb-5 text-center">
                        <h3 class="mb-2 text-white">Forgot Password</h3>
                        <p class="text-primary">Enter your e-mail address below, and we'll e-mail instructions for setting a new one.</p>
                    </div>
                    <form>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label>Email</label>
                                <input type="text" class="form-control bg-light border-0 pt-2" placeholder="Email">
                            </div>
                            <div class="col-lg-12">
                                <a class="btn btn-primary w-100" href="login.php">Reset my password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>
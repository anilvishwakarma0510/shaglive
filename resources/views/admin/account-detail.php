<?php include 'inner-header.php';?>
            <div id="layoutSidenav_content" class="bg-dark">
                <main class="" >
                    <div class="container-fluid px-4">
                        <h3 class="mt-3 text-white page-ttl pb-3 mb-4">Account Settings</h3>
                        <div class="row">
                            <div class="col-xl-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Account Information</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Change Password</button>
                                  </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active bg-dark p-4" id="home" role="tabpanel" aria-labelledby="home-tab">
                                      <form class="row g-3">
                                          <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label text-white">First Name</label>
                                            <input type="text" class="form-control" id="inputEmail4">
                                          </div>
                                          <div class="col-md-6">
                                            <label for="inputPassword4" class="form-label text-white">Last Name</label>
                                            <input type="text" class="form-control" id="inputPassword4">
                                          </div>
                                          <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label text-white">Username</label>
                                            <input type="text" class="form-control" id="inputEmail4">
                                          </div>
                                          <div class="col-md-6">
                                            <label for="inputPassword4" class="form-label text-white">E-mail</label>
                                            <input type="email" class="form-control" id="inputPassword4">
                                          </div>
                                          <div class="col-6">
                                            <label for="inputAddress" class="form-label text-white">Phone Number</label>
                                            <input type="text" class="form-control" id="inputAddress" placeholder="">
                                          </div>
                                          <div class="col-6">
                                            <label for="inputAddress" class="form-label text-white">Sex</label>
                                            <input type="text" class="form-control" id="inputAddress" placeholder="">
                                          </div>
                                          <div class="col-md-4">
                                            <label for="inputState" class="form-label text-white">Country</label>
                                            <select id="inputState" class="form-select">
                                              <option selected>Choose...</option>
                                              <option>...</option>
                                            </select>
                                          </div>
                                          <div class="col-md-4">
                                            <label for="inputState" class="form-label text-white">State</label>
                                            <select id="inputState" class="form-select">
                                              <option selected>Choose...</option>
                                              <option>...</option>
                                            </select>
                                          </div>
                                          <div class="col-md-4">
                                            <label for="inputCity" class="form-label text-white">City</label>
                                            <select id="inputState" class="form-select">
                                              <option selected>Choose...</option>
                                              <option>...</option>
                                            </select>
                                          </div>
                                          <div class="col-12">
                                            <label for="inputAddress2" class="form-label text-white">Date of Birth</label>
                                            <input type="date" class="form-control" id="inputAddress2" placeholder="">
                                          </div>
                                          <div class="col-12">
                                            <label for="inputZip" class="form-label text-white">Profile Avatar</label>
                                            <div class="text-white" ><img src="img/profile.png" width="40px;"><br> Image size limit: 2MB. Accepted formats: JPEG, JPG and PNG</div>
                                          </div>
                                          <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                                          </div>
                                        </form>
                                  </div>
                                  <div class="tab-pane fade bg-dark p-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <form class="row g-3">
                                          <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label text-white">Old Password</label>
                                            <input type="text" class="form-control" id="inputEmail4">
                                          </div>
                                          <div class="col-md-12">
                                            <label for="inputPassword4" class="form-label text-white">New Password</label>
                                            <input type="text" class="form-control" id="inputPassword4">
                                          </div>
                                          <div class="col-md-12">
                                            <label for="inputEmail4" class="form-label text-white">Retype password</label>
                                            <input type="text" class="form-control" id="inputEmail4">
                                          </div>
                                          <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                                          </div>
                                        </form>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
<?php include 'inner-footer.php';?>

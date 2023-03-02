<?php include 'm-header.php';?>
            <div id="layoutSidenav_content" class="bg-dark">
                <main class="" >
                    <div class="container-fluid px-4">
                        <h3 class="mt-3 text-white page-ttl pb-3 mb-4">Create new Gallery</h3>
                        <div class="row">
                            <div class="col-xl-12">
                                  <form class="row g-3">
                                          <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label text-white">Name
</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                          </div>
                                          <div class="col-md-6">
                                            <label for="inputPassword4" class="form-label text-white">Token
</label>
                                            <input type="text" class="form-control" id="inputPassword4" disabled>
                                          </div>
                                          <div class="col-md-4">
                                            <label for="inputCity" class="form-label text-white">Status</label>
                                               <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault12">
                                                <label class="form-check-label text-white" for="flexRadioDefault12">
                                                  Draft
                                                </label>
                                              </div>
                                               <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                <label class="form-check-label text-white" for="flexRadioDefault1">
                                                  Active
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                <label class="form-check-label text-white" for="flexRadioDefault2">
                                                  Inactive
                                                </label>
                                              </div>
                                                       
                                          </div>
                                          <div class="col-md-12">
                                          <label for="exampleFormControlTextarea1" class="form-label text-white">Description</label>
                                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-12" >
                                          <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label text-white" for="flexCheckDefault">
    Is sale Gallery?
  </label>
</div>
                                        </div>
                                          <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Save Changes</button> &nbsp;
                                            <button type="submit" class="btn btn-primary">Back</button>
                                          </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
<?php include 'm-footer.php';?>

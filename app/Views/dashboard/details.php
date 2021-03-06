<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
      <!-- Page content -->
      <section class="container pt-5">
        <div class="row">
          
          <!-- Sidebar (User info + Account menu) -->
          <?=view("dashboard/temp/navbar")?>

          <!-- Account details -->
          <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
              <h1 class="h2 pt-xl-1 pb-3">Account Details</h1>

              <!-- Basic info -->
              <h2 class="h5 text-primary mb-4">Basic info</h2>
              <form class="needs-validation border-bottom pb-3 pb-lg-4" novalidate>
                <div class="row pb-2">
                  <div class="col-sm-6 mb-4">
                    <label for="fn" class="form-label fs-base">First name</label>
                    <input type="text" id="fn" class="form-control form-control-lg" value="John" required>
                    <div class="invalid-feedback">Please enter your first name!</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="sn" class="form-label fs-base">Second name</label>
                    <input type="text" id="sn" class="form-control form-control-lg" value="Doe" required>
                    <div class="invalid-feedback">Please enter your second name!</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="email" class="form-label fs-base">Email address</label>
                    <input type="email" id="email" class="form-control form-control-lg" value="jonny@email.com" required>
                    <div class="invalid-feedback">Please provide a valid email address!</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="phone" class="form-label fs-base">Phone <small class="text-muted">(optional)</small></label>
                    <input type="text" id="phone" class="form-control form-control-lg" data-format="custom" data-delimiter="-" data-blocks="2 3 4" data-numeral="9" placeholder="00-000-0000">
                  </div>
                  <div class="col-12 mb-4">
                    <label for="bio" class="form-label fs-base">Bio <small class="text-muted">(optional)</small></label>
                    <textarea id="bio" class="form-control form-control-lg" rows="4" placeholder="Add a short bio..."></textarea>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <button type="reset" class="btn btn-secondary me-3">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>

              <!-- Address -->
              <h2 class="h5 text-primary pt-1 pt-lg-3 my-4">Address</h2>
              <form class="needs-validation border-bottom pb-2 pb-lg-4" novalidate>
                <div class="row pb-2">
                  <div class="col-sm-6 mb-4">
                    <label for="country" class="form-label fs-base">Country</label>
                    <select id="country" class="form-select form-select-lg" required>
                      <option value="" disabled>Choose country</option>
                      <option value="Australia">Australia</option>
                      <option value="Belgium">Belgium</option>
                      <option value="Canada">Canada</option>
                      <option value="Denmark">Denmark</option>
                      <option value="USA" selected>USA</option>
                    </select>
                    <div class="invalid-feedback">Please choose your country!</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="state" class="form-label fs-base">State</label>
                    <select id="state" class="form-select form-select-lg" required>
                      <option value="" disabled>Choose state</option>
                      <option value="Arizona">Arizona</option>
                      <option value="California">California</option>
                      <option value="Iowa">Iowa</option>
                      <option value="Florida" selected>Florida</option>
                      <option value="Michigan">Michigan</option>
                      <option value="Texas">Texas</option>
                    </select>
                    <div class="invalid-feedback">Please choose your state!</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="city" class="form-label fs-base">City</label>
                    <select id="city" class="form-select form-select-lg" required>
                      <option value="" disabled>Choose city</option>
                      <option value="Boston">Boston</option>
                      <option value="Chicago">Chicago</option>
                      <option value="Los Angeles">Los Angeles</option>
                      <option value="Miami" selected>Miami</option>
                      <option value="New York">New York</option>
                      <option value="Philadelphia">Philadelphia</option>
                    </select>
                    <div class="invalid-feedback">Please choose your city!</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="zip" class="form-label fs-base">ZIP code</label>
                    <input type="text" id="zip" class="form-control form-control-lg" required>
                    <div class="invalid-feedback">Please enter your ZIP code!</div>
                  </div>
                  <div class="col-12 mb-4">
                    <label for="address1" class="form-label fs-base">Address line 1</label>
                    <input id="address1" class="form-control form-control-lg" required>
                  </div>
                  <div class="col-12 mb-4">
                    <label for="address2" class="form-label fs-base">Address line 2 <small class="text-muted">(optional)</small></label>
                    <input id="address2" class="form-control form-control-lg">
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <button type="reset" class="btn btn-secondary me-3">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>

              <!-- Delete account -->
              <h2 class="h5 text-primary pt-1 pt-lg-3 mt-4">Delete account</h2>
              <p>When you delete your account, your public profile will be deactivated immediately. If you change your mind before the 14 days are up, sign in with your email and password, and we???ll send you a link to reactivate your account.</p>
              <div class="form-check mb-4">
                <input type="checkbox" id="delete-account" class="form-check-input">
                <label for="delete-account" class="form-check-label fs-base">Yes, I want to delete my account</label>
              </div>
              <button type="button" class="btn btn-danger">Delete</button>
            </div>
          </div>
        </div>
      </section>
    <?=$this->endSection()?>
    
<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
      <!-- Page content -->
      <section class="container pt-5">
        <div class="row">
          <!-- Sidebar (User info + Account menu) -->
          <?=view("user/temp/navbar")?>

          <!-- Account security -->
          <div class="col-md-8 offset-lg-1 pb-5 mb-lg-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
              <h1 class="h2 pt-xl-1 pb-3">Security</h1>

              <!-- Password -->
              <h2 class="h5 text-primary mb-4">Password</h2>
              <form class="needs-validation border-bottom pb-3 pb-lg-4" novalidate>
                <div class="row">
                  <div class="col-sm-6 mb-4">
                    <label for="cp" class="form-label fs-base">Current password</label>
                    <div class="password-toggle">
                      <input type="password" id="cp" class="form-control form-control-lg" value="jonnyPass" required>
                      <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox">
                        <span class="password-toggle-indicator"></span>
                      </label>
                      <div class="invalid-tooltip position-absolute top-100 start-0">Incorrect password!</div>
                    </div>
                  </div>
                </div>
                <div class="row pb-2">
                  <div class="col-sm-6 mb-4">
                    <label for="np" class="form-label fs-base">New password</label>
                    <div class="password-toggle">
                      <input type="password" id="np" class="form-control form-control-lg" required>
                      <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox">
                        <span class="password-toggle-indicator"></span>
                      </label>
                      <div class="invalid-tooltip position-absolute top-100 start-0">Incorrect password!</div>
                    </div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="cnp" class="form-label fs-base">Confirm new password</label>
                    <div class="password-toggle">
                      <input type="password" id="cnp" class="form-control form-control-lg" required>
                      <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox">
                        <span class="password-toggle-indicator"></span>
                      </label>
                      <div class="invalid-tooltip position-absolute top-100 start-0">Incorrect password!</div>
                    </div>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <button type="reset" class="btn btn-secondary me-3">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>

              <!-- Sessions -->
              <h2 class="h5 text-primary pt-1 pt-lg-3 mt-4">Your sessions</h2>
              <p class="pb-3 mb-3">This is a list of devices that have logged into your account. Remove any sessions that you do not recognize.</p>
              <ul class="list-unstyled mb-0">
                <li class="d-flex align-items-center justify-content-between mb-4">
                  <div class="d-flex align-items-start me-3">
                    <div class="bg-secondary rounded-1 p-2">
                      <i class="bx bx-desktop fs-xl text-primary d-block"></i>
                    </div>
                    <div class="ps-3">
                      <div class="fw-medium text-nav mb-1">Mac ??? New York, USA</div>
                      <span class="d-inline-block fs-sm text-muted border-end pe-2 me-2">Chrome</span>
                      <span class="badge bg-success shadow-success">Active now</span>
                    </div>
                  </div>
                  <button type="button" class="btn btn-outline-secondary px-3 px-sm-4">
                    <i class="bx bx-x fs-xl ms-sm-n1 me-sm-1"></i>
                    <span class="d-none d-sm-inline">Remove</span>
                  </button>
                </li>
                <li class="d-flex align-items-center justify-content-between mb-4">
                  <div class="d-flex align-items-start me-3">
                    <div class="bg-secondary rounded-1 p-2">
                      <i class="bx bx-mobile fs-xl text-primary d-block"></i>
                    </div>
                    <div class="ps-3">
                      <div class="fw-medium text-nav mb-1">Iphone 12 ??? New York, USA</div>
                      <span class="d-inline-block fs-sm text-muted border-end pe-2 me-2">Silicon App</span>
                      <span class="d-inline-block fs-sm text-muted">20 hours ago</span>
                    </div>
                  </div>
                  <button type="button" class="btn btn-outline-secondary px-3 px-sm-4">
                    <i class="bx bx-x fs-xl ms-sm-n1 me-sm-1"></i>
                    <span class="d-none d-sm-inline">Remove</span>
                  </button>
                </li>
                <li class="d-flex align-items-center justify-content-between mb-4">
                  <div class="d-flex align-items-start me-3">
                    <div class="bg-secondary rounded-1 p-2">
                      <i class="bx bx-desktop fs-xl text-primary d-block"></i>
                    </div>
                    <div class="ps-3">
                      <div class="fw-medium text-nav mb-1">Windows 10.1 ??? New York, USA</div>
                      <span class="d-inline-block fs-sm text-muted border-end pe-2 me-2">Chrome</span>
                      <span class="d-inline-block fs-sm text-muted">November 15 at 8:42 am</span>
                    </div>
                  </div>
                  <button type="button" class="btn btn-outline-secondary px-3 px-sm-4">
                    <i class="bx bx-x fs-xl ms-sm-n1 me-sm-1"></i>
                    <span class="d-none d-sm-inline">Remove</span>
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <?=$this->endSection()?>    
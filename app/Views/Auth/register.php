<?= $this->extend($config->viewLayout) ?>
  
  <?= $this->section('pageScripts') ?>
    <script src="assets/vendor/cleave.js/dist/cleave.min.js"></script>
  <?= $this->endSection() ?> 
  
  <?= $this->section('main') ?>
      <!-- Page content -->
      <section class="position-relative h-100 pt-5 pb-4">

        <!-- Sign up form -->
        <div class="container d-flex flex-wrap justify-content-center justify-content-xl-start h-100 pt-5">
          <div class="w-100 align-self-end pe-4 ps-4 pt-1 pt-md-4 pb-4" style="max-width: 526px;">
            <h1 class="text-center text-xl-start">Create Account</h1>
            <p class="text-center text-xl-start pb-3 mb-3">Already have an account? <a href="<?=base_url('login')?>">Sign in here.</a></p>
            
            <form class="needs-validation" action="<?= route_to('register') ?>" method="post" novalidate>
              <?= csrf_field() ?>
              <?php if (session()->has('errors')) : ?>
                <ul class="alert m-4 p-4 alert-danger">
                <?php foreach (session('errors') as $error) : ?>
                  <li><?= $error ?></li>
                <?php endforeach ?>
                </ul>
              <?php endif ?>
              <?php if (session()->has('error')) : ?>
                <div class="alert m-4 p-4 alert-danger">
                  <?= session('error') ?>
                </div>
              <?php endif ?>
              <div class="row">
                <div class="col-sm-6">
                  <div class="position-relative mb-4">
                    <label for="name" class="form-label fs-base">Full name</label>
                    <input name="name" value="<?=old("name")?>" type="text" id="name" class="form-control form-control-lg" required>
                    <div class="invalid-feedback position-absolute start-0 top-100">Please enter your name!</div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="position-relative mb-4">
                    <label for="email" class="form-label fs-base">Email</label>
                    <input name="email" value="<?=old("email")?>" type="email" id="email" class="form-control form-control-lg" required>
                    <div class="invalid-feedback position-absolute start-0 top-100">Please enter a valid email address!</div>
                  </div>
                </div>
                <div class="col-12 mb-4">
                  <label for="password" class="form-label fs-base">Password</label>
                  <div class="password-toggle">
                    <input name="password" value="<?=old("password")?>" type="password" id="password" class="form-control form-control-lg" required>
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox">
                      <span class="password-toggle-indicator"></span>
                    </label>
                    <div class="invalid-feedback position-absolute start-0 top-100">Please enter a password!</div>
                  </div>
                </div>
                <div class="col-12 mb-4">
                  <label for="password-confirm" class="form-label fs-base">Confirm password</label>
                  <div class="password-toggle">
                    <input name="pass_confirm" value="<?=old("pass_confirm")?>" type="password" id="password-confirm" class="form-control form-control-lg" required>
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox">
                      <span class="password-toggle-indicator"></span>
                    </label>
                    <div class="invalid-feedback position-absolute start-0 top-100">Please enter a password!</div>
                  </div>
                </div>
              </div>
              <div class="mb-4">
                <div class="form-check">
                  <input type="checkbox" id="terms" class="form-check-input" required>
                  <label for="terms" class="form-check-label fs-base">I agree to <a href="#">Terms &amp; Conditions</a></label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary shadow-primary btn-lg w-100">Sign up</button>
            </form>
            <hr class="my-4">
            <h6 class="text-center mb-4">Or sign up with your social network</h6>
            <div class="row row-cols-1 row-cols-sm-2">
              <div class="col mb-3">
                <a href="#" class="btn btn-icon btn-secondary btn-google btn-lg w-100">
                  <i class="bx bxl-google fs-xl me-2"></i>
                  Google
                </a>
              </div>
              <div class="col mb-3">
                <a href="#" class="btn btn-icon btn-secondary btn-facebook btn-lg w-100">
                  <i class="bx bxl-facebook fs-xl me-2"></i>
                  Facebook
                </a>
              </div>
            </div>
          </div>
          <div class="w-100 align-self-end">
            <p class="fs-xs text-center text-xl-start pb-2 mb-0">
              &copy; All rights reserved.
            </p>    
          </div>
        </div>
        
        <!-- Background -->
        <div class="position-absolute top-0 end-0 w-50 h-100 bg-position-center bg-repeat-0 bg-size-cover d-none d-xl-block" style="background-image: url(<?=base_url("assets/img/avatar/pitbull-01.jpg")?>);"></div>
      </section>
  <?= $this->endSection()?>
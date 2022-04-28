 <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page -->
      <header class="header navbar navbar-expand-lg navbar-light position-absolute navbar-sticky">
        <div class="container px-3">
          <a href="<?=base_url()?>" class="navbar-brand pe-3">
            <img src="<?= base_url() ?>/assets/img/logo.svg" width="47" alt="Silicon">
            <?= APP_NAME ?>
          </a>
          <div id="navbarNav" class="offcanvas offcanvas-end">
            <div class="offcanvas-header border-bottom">
              <h5 class="offcanvas-title">Menu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a href="<?=base_url("app/puppies/")?>" class="nav-link" aria-current="page">Puppies</a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url("app/puppies/breeds")?>" class="nav-link">Breeds</a>
                </li>
                <li class="nav-item dropdown">
                  <a href="<?=base_url("app/about")?>" class="nav-link">About</a>
                </li>
                <li class="nav-item dropdown">
                  <a href="<?=base_url("app/contact")?>" class="nav-link">Contact</a>
                </li>
              </ul>
            </div>
            <div class="offcanvas-footer border-top">
              <a href="<?=base_url("login")?>" class="btn btn-primary w-100">
                <i class="bx bx-user fs-4 lh-1 me-1"></i>
                Login
              </a>
            </div>      
          </div>
          <div class="form-check form-switch mode-switch pe-lg-1 ms-auto me-4" data-bs-toggle="mode">
            <input type="checkbox" class="form-check-input" id="theme-mode">
            <label class="form-check-label d-none d-sm-block" for="theme-mode">Light</label>
            <label class="form-check-label d-none d-sm-block" for="theme-mode">Dark</label>
          </div>
          <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a href="<?= base_url("login")?>" class="btn btn-primary btn-sm fs-sm rounded d-none d-lg-inline-flex" target="_blank" rel="noopener">
            <i class="bx bx-user fs-5 lh-1 me-1"></i>
            Login
          </a>
        </div>
      </header>
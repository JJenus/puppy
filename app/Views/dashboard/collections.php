<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
      <!-- Page content -->
      <section class="container pt-5">
        <div class="row">
          <!-- Sidebar (User info + Account menu) -->
          <?=view("dashboard/temp/navbar")?>

          <!-- Account collections -->
          <div class="col-md-8 offset-lg-1 pb-5 mb-lg-2 pt-md-5 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
              <div class="d-sm-flex align-items-center justify-content-between pt-xl-1 mb-3 pb-3">
                <h1 class="h2 mb-sm-0">My Collections</h1>
                <select class="form-select" style="max-width: 15rem;">
                  <option value="Published">Published</option>
                  <option value="Category">Category</option>
                  <option value="Title AZ">Title AZ</option>
                  <option value="Title ZA">Title ZA</option>
                </select>
              </div>

              <!-- Item -->
              <div class="card border-0 shadow-sm overflow-hidden mb-4">
                <div class="row g-0">
                  <a href="#" class="col-sm-4 bg-repeat-0 bg-position-center bg-size-cover" style="background-image: url(assets/img/account/collection01.jpg); min-height: 13rem;"></a>
                  <div class="col-sm-8">
                    <div class="card-body">
                      <div class="fs-sm text-muted mb-1">Nov 30, 2021</div>
                      <h2 class="h4 pb-1 mb-2">
                        <a href="#">3D Shape Illustration</a>
                      </h2>
                      <p class="mb-4 mb-lg-5">NFT / Graphic Design / Motion Design</p>
                      <div class="d-flex">
                        <button type="button" class="btn btn-outline-primary px-3 px-lg-4 me-3">
                          <i class="bx bx-edit fs-xl me-xl-2"></i>
                          <span class="d-none d-xl-inline">Edit</span>
                        </button>
                        <button type="button" class="btn btn-outline-secondary px-3 px-lg-4 me-3">
                          <i class="bx bx-power-off fs-xl me-xl-2"></i>
                          <span class="d-none d-xl-inline">Deactivate</span>
                        </button>
                        <button type="button" class="btn btn-outline-danger px-3 px-lg-4">
                          <i class="bx bx-trash-alt fs-xl me-xl-2"></i>
                          <span class="d-none d-xl-inline">Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Item -->
              <div class="card border-0 shadow-sm overflow-hidden mb-4">
                <div class="row g-0">
                  <a href="#" class="col-sm-4 bg-repeat-0 bg-position-center bg-size-cover" style="background-image: url(assets/img/account/collection02.jpg); min-height: 13rem;"></a>
                  <div class="col-sm-8">
                    <div class="card-body">
                      <div class="fs-sm text-muted mb-1">Oct 18, 2021</div>
                      <h2 class="h4 pb-1 mb-2">
                        <a href="#">Scene of Sunglasses &amp; Headphone on Human Head</a>
                      </h2>
                      <p class="mb-4 mb-lg-5">Graphic Design / Art / Identity / Motion Design</p>
                      <div class="d-flex">
                        <button type="button" class="btn btn-outline-primary px-3 px-lg-4 me-3">
                          <i class="bx bx-edit fs-xl me-xl-2"></i>
                          <span class="d-none d-xl-inline">Edit</span>
                        </button>
                        <button type="button" class="btn btn-outline-secondary px-3 px-lg-4 me-3">
                          <i class="bx bx-power-off fs-xl me-xl-2"></i>
                          <span class="d-none d-xl-inline">Deactivate</span>
                        </button>
                        <button type="button" class="btn btn-outline-danger px-3 px-lg-4">
                          <i class="bx bx-trash-alt fs-xl me-xl-2"></i>
                          <span class="d-none d-xl-inline">Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Item -->
              <div class="card border-0 shadow-sm overflow-hidden mb-4">
                <div class="row g-0">
                  <a href="#" class="col-sm-4 bg-repeat-0 bg-position-center bg-size-cover" style="background-image: url(assets/img/account/collection03.jpg); min-height: 13rem;"></a>
                  <div class="col-sm-8">
                    <div class="card-body">
                      <div class="fs-sm text-muted mb-1">Aug 05, 2021</div>
                      <h2 class="h4 pb-1 mb-2">
                        <a href="#">Mannequin Hands Holding Phone</a>
                      </h2>
                      <p class="mb-4 mb-lg-5">NFT / Mobile App Design / Graphic Design / Art</p>
                      <div class="d-flex">
                        <button type="button" class="btn btn-outline-primary px-3 px-lg-4 me-3">
                          <i class="bx bx-edit fs-xl me-xl-2"></i>
                          <span class="d-none d-xl-inline">Edit</span>
                        </button>
                        <button type="button" class="btn btn-outline-secondary px-3 px-lg-4 me-3">
                          <i class="bx bx-power-off fs-xl me-xl-2"></i>
                          <span class="d-none d-xl-inline">Deactivate</span>
                        </button>
                        <button type="button" class="btn btn-outline-danger px-3 px-lg-4">
                          <i class="bx bx-trash-alt fs-xl me-xl-2"></i>
                          <span class="d-none d-xl-inline">Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
<?= $this->endSection()?>
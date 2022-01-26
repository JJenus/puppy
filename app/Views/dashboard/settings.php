
<?= $this->extend($config->viewLayout) ?>
  
  <?= $this->section('pageScripts') ?>
    <!-- begin::Page Custom Javascript(used by this page)-->
		<script src="<?= base_url() ?>/assets/js/vue.min.js"></script>
		<script src="<?= base_url("assets/js/dashboard/settings.vue.js") ?>"></script>
		<!-- end::Page Custom Javascript-->
  <?= $this->endSection() ?> 
  
  <?= $this->section('main') ?>
  <body id="kt_body" data-sidebar="on"  class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled sidebar-enabled ">
    <!--begin::Main-->
		<!--begin::Root-->
		<div id="app" class="d-flex flex-column flex-root">
			
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<?= view("dashboard/temp/top_bar") ?> <!--end::Header-->
					<!--begin::Main-->
					<div class="d-flex flex-column flex-column-fluid">
						<!--begin::toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<div class="container d-flex flex-stack flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-1">
									<!--begin::Title-->
									<h3 class="text-dark fw-bolder my-1">Settings</h3>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-line bg-transparent text-muted fw-bold p-0 my-1 fs-7">
										<li class="breadcrumb-item">
											<a href="../index-2.html" class="text-muted text-hover-primary">App</a>
										</li>
										<li class="breadcrumb-item">Dashboard</li>
										<li class="breadcrumb-item text-dark">Settings</li>
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Info-->
								<!--begin::Nav-->
								<div class="d-flex align-items-center flex-nowrap text-nowrap overflow-auto py-1">
									<a href="account" class="btn btn-active-accent  ms-3">Account</a>
									<a href="settings" class="btn btn-active-accent active fw-bolder fw-bolder ms-3">Settings</a>
								</div>
								<!--end::Nav-->
							</div>
						</div>
						<!--end::toolbar-->
						<!--begin::Content-->
						<div class="content fs-6 d-flex flex-column-fluid" id="kt_content">
							<!--begin::Container-->
							<div class="container">
							  <div class="card-header pb-0 card-header-stretch">
                  <div class="card-toolbar pb-0">
                      <ul class="nav nav-tabs pb-0 nav-line-tabs nav-line-tabs-3x nav-stretch fs-6 border-0">
                          <li class="nav-item">
                              <a class="nav-link active fw-bolder fs-5" data-bs-toggle="tab" href="#kt_tab_pane_7">Add Categories</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link fs-5 fw-bolder" data-bs-toggle="tab" href="#kt_tab_pane_8">Modify Categories</a>
                          </li>
                          <li class="nav-item d-none ">
                              <a class="nav-link fs-5 fw-bolder" data-bs-toggle="tab" href="#kt_tab_pane_9">Link 3</a>
                          </li>
                      </ul>
                  </div>
              </div>
								<div class="card">
								  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
      								<!--begin::Add categories-->
      									<!--begin::Form-->
      									<form id="cat-form" class="form pe-10 ps-10 d-flex flex-center">
      										<div class="card-body mw-800px pb-20">
      											<p class="card-title fs-3 my-5 fw-bold">
      											  Add clothe categories and price. 
      											</p>
      											<div v-for="(category, index) in forms">
        											<div class="row">
          											<div class="col-lg-9 col-xl-6">
          												<div class="row">
            												<label class="col-xl-3 col-form-label fw-bold">Category</label>
            												<div class="col-lg-9 col-xl-6">
            													<input type="text" class="form-control form-control-solid " :name="'category['+index+'][name]'">
            												</div>
            											</div>
          											</div>
          											<div class="col-xl-3">
          											  <div class="row">
            												<label class="col-xl-3 col-form-label fw-bold ">Price</label>
            												<div class="col-lg-9 col-xl-6">
            													<input type="number" class="form-control form-control-solid" :name="'category['+index+'][cost]'">
            												</div>
          											  </div>
          											</div>
        											</div>
        											<div class="separator separator-dashed my-5"></div>
      											</div> 
      											<div align="right" class="mb-5 text-right">
      											  <button @click="add()" type="button" class="btn btn-sm btn-primary btn-icon">
      											    <i class="fas fa-plus fs-1"></i>
      											  </button>
      											</div>
      											<!--begin::Form Group-->
      											<div class="mb-8 row pt-10">
      												<label class="col-lg-3 col-form-label"></label>
      												<div class="col-lg-9">
      													<button id="cat-form-btn" @click="save()" type="button" class="btn btn-primary fw-bolder px-6 py-3 me-3">
      													  <span class="indicator-label">
                                      Save changes
                                  </span>
                                  <span class="indicator-progress">
                                      Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                  </span> 
      													</button>
      													<button type="reset" class="btn btn-color-gray-600 btn-active-light-primary fw-bolder px-6 py-3">Cancel</button>
      												</div>
      											</div>
      											<!--end::Form Group-->
      										</div>
      									</form>
      									<!--end::Form-->
      								<!--end::Add Categories -->
                    </div>
        
                    <div class="tab-pane table-responsive px-15 py-10 fade" id="kt_tab_pane_8" role="tabpanel">
                      <div v-for="category in categories"  class="border-bottom mb-4">
                        <div  class="d-flex text-gray py-4 fs-3 fw-bold d-flex-row ">
                          <span class="me-5">{{category.id}}</span>
                          <span class="me-10">{{category.name}}</span>
                          <span class="me-10">{{category.cost}}</span>
                          <span class="">
                            <i data-bs-toggle="collapse" :data-bs-target="'.collapsible-'+category.id" :class="'collapsible-'+category.id" class="bi bi-pen border collapse show fade border-gray-400 rounded-circle text-gray-600 btn-link text-hover-primary fs-2"></i> 
                            <i data-bs-toggle="collapse" :data-bs-target="'.collapsible-'+category.id" :class="'collapsible-'+category.id" class="bi collapse bi-chevron-up fade border border-gray-400 rounded-circle text-gray-600 btn-link text-hover-primary fs-2"></i> 
                          </span>
                        </div>
                        <div :id="'div-edit-'+category.id" :class="'collapsible-'+category.id"  class="collapse fade pb-4 mt-4">
                          <form :id="'form-edit-'+category.id">
                            <input type="hidden" :value="category.id" name="id" class="">
                            <div class="row">
          											<div class="col-lg-9 col-xl-6">
          												<div class="row">
            												<label class="col-xl-3 col-form-label fw-bold">Category</label>
            												<div class="col-lg-9 col-xl-6">
            													<input type="text" class="form-control form-control-sm form-control-solid " :value="category.name" name="name">
            												</div>
            											</div>
          											</div>
          											<div class="col-xl-3">
          											  <div class="row">
            												<label class="col-xl-3 col-form-label fw-bold ">Price</label>
            												<div class="col-8 col-xl-6">
            													<input type="number" class="form-control form-control-sm form-control-solid" :value="category.cost" name="cost">
            												</div>
            												<div class="col-1">
              											  <div align="right" class="">
                												<button type="button" @click="update('form-edit-'+category.id, 'save-edit-btn-'+category.id)"  :id="'save-edit-btn-'+category.id" class="btn btn-sm btn-primary">
                												  <span class="indicator-label">
                                              save
                                          </span>
                                          <span class="indicator-progress">
                                             <span class="spinner-border spinner-border-sm align-middle "></span>
                                          </span>  
                												</button>
              											  </div>
              											</div>
          											  </div>
          											</div>
        											</div>
                          </form>
                        </div>
                      </div>
                    </div>
        
                    <div class="tab-pane fade" id="kt_tab_pane_9" role="tabpanel">
                        ...
                    </div>
                </div>
								</div>
									<!--begin::Modals-->
								<?= view("temp/navbar") ?>
								<!--end::Modals-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Main-->
					
					<!--begin::Footer-->
					<?= view ("temp/footer") ?> 
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
				
				<!--begin::Sidebar-->
				<!--end::Sidebar-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<?= $this->endSection()?>

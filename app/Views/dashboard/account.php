<?= $this->extend($config->viewLayout) ?>
  
  <?= $this->section('pageScripts') ?>
    <!-- begin::Page Custom Javascript(used by this page)-->
		<script src="<?= base_url() ?>/assets/js/custom/widgets.js"></script>
		<script src="<?= base_url() ?>/assets/plugins/custom/leaflet/leaflet.bundle.js"></script>
		<script src="<?= base_url() ?>/assets/js/vue.min.js"></script>
		
		<script src="<?= base_url("assets/js/dashboard/account.vue.js") ?>"></script>
		
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
					<?= view("dashboard/temp/top_bar") ?><!--end::Header-->
					<!--begin::Main-->
					<div class="d-flex flex-column flex-column-fluid">
						<!--begin::toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<div class="container d-flex flex-stack flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-1">
									<!--begin::Title-->
									<h3 class="text-dark fw-bolder my-1">Account</h3>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-line bg-transparent text-muted fw-bold p-0 my-1 fs-7">
										<li class="breadcrumb-item">
											<a href="../index-2.html" class="text-muted text-hover-primary">App</a>
										</li>
										<li class="breadcrumb-item">Profile</li>
										<li class="breadcrumb-item text-dark">Account</li>
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Info-->
								<!--begin::Nav-->
								<div class="d-flex align-items-center flex-nowrap text-nowrap overflow-auto py-1">
									<a href="account" class="btn btn-active-accent active fw-bolder ms-3">Account</a>
									<a href="settings" class="btn btn-active-accent fw-bolder ms-3">Settings</a>
								</div>
								<!--end::Nav-->
							</div>
						</div>
						<!--end::toolbar-->
						<!--begin::Content-->
						<div class="content fs-6 d-flex flex-column-fluid" id="kt_content">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Profile Account-->
								<div class="card ">
									<div class="card-body d-flex flex-wrap flex-center">
    								<!--begin::Form-->
    								<form id="info" class="form d-flex flex-center">
    									<input type="hidden" value="info" name="update">
    									<div class="card-body mw-800px pt-10">
    									  <h5 class="fw-bolder text-dark fs-2">Personal info</h5>
    										<!--begin::Form row-->
    										<div class="row mb-8">
    											<label class="col-lg-3 col-form-label">Name</label>
    											<div class="col-lg-9">
    												<input v-model="form.name" type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="Jenus Alakere" value="" />           
    											</div>
    										</div>
    										
    										<div class="row mb-8">
    											<label class="col-lg-3 col-form-label">Username</label>
    											<div class="col-lg-9">
    												<div class="spinner spinner-sm spinner-primary spinner-right">
    													<input @keyup="checkAvailability('username')" v-model="form.username" type="text" class="form-control form-control-lg form-control-solid" name="username" placeholder="JJenus" value="" />
    													<div v-if="error.username" class="text-danger text-muted">
    													  {{error.username}} 
    													</div>
    												</div>
    											</div>
    										</div>
    										
    										<div class="row mb-8">
    											<label class="col-lg-3 col-form-label">Email</label>
    											<div class="col-lg-9">
    												<input @keyup="checkAvailability('email')" v-model="form.email" type="text" class="form-control form-control-lg form-control-solid" name="email" placeholder="JJenus@gmail.com" value="" />
    												<div v-if="error.email" class="text-danger text-muted">
    												  {{error.email}} 
    												</div>           
    											</div>
    										</div>
    										<!--end::Form row-->
    										<div align="center">
    										  <button id="btn-personal-info" class="btn btn-primary">
    										    <span class="indicator-label">
                                Save
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span> 
    										  </button>
    										</div>
    										<!--begin::Banking information row-->
    										<div class="separator separator-dashed my-10"></div>
    									</div>
    								</form>
    								<!--end::Form-->
    								
    								<!--begin::Contact Address-->
    								<!--begin::Form-->
    								<form id="contact"  class="form d-flex flex-center">
    									<input type="hidden" value="contact" name="update">
    									<div class="card-body mw-800px Pt-10">
    									  <h5 class="fw-bolder text-dark fs-2">Contact Address</h5>
    										<!--begin::Form row-->
    										<div class="row mb-8">
    											<label class="col-lg-3 col-form-label">Address</label>
    											<div class="col-lg-9">
    												<input v-model="form.address" type="text" class="form-control form-control-lg form-control-solid" name="address" placeholder="" value="Address Line" />
    											</div>
    										</div>
    										<div class="row mb-8">
    											<label class="col-lg-3 col-form-label">City</label>
    											<div class="col-lg-9">
    												<input v-model="form.city" type="text" class="form-control form-control-lg form-control-solid" name="city" placeholder="" value="Melbourne" />           
    											</div>
    										</div>
    										<div class="row mb-8">
    											<label class="col-lg-3 col-form-label">Phone</label>
    											<div class="col-lg-9">
    												<input v-model="form.phone" type="text" class="form-control form-control-lg form-control-solid" name="phone" placeholder="" />         
    											</div>
    										</div>
    										<div align="center">
    										  <button id="btn-contact-address" class="btn btn-primary">
    										    <span class="indicator-label">
                                Save
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span> 
    										  </button>
    										</div>
    										<div class="separator separator-dashed my-10"></div>
    									</div>
    								</form>
    								<!--end::Form-->
    								<!--begin::Banking information-->
    								<!--begin::Form-->
    								<form id="bank"  class="form d-flex flex-center">
    									<input type="hidden" value="bank" name="update">
    									<div class="card-body mw-800px Pt-10">
    									  <h5 class="fw-bolder text-dark fs-2">Bank details</h5>
    										<!--begin::Form row-->
    										<div class="row mb-8">
    											<label class="col-lg-3 col-form-label">Bank </label>
    											<div class="col-lg-9">
    												<input v-model="form.bank" type="text" class="form-control form-control-lg form-control-solid" name="bank" placeholder="City bank" />
    											</div>
    										</div>
    										<div class="row mb-8">
    											<label class="col-lg-3 col-form-label">Account Name </label>
    											<div class="col-lg-9">
    												<input v-model="form.account_name" type="text" class="form-control form-control-lg form-control-solid" name="account_name" placeholder="Neil Armstrong" />          
    											</div>
    										</div>
    										<div class="row mb-8">
    											<label class="col-lg-3 col-form-label">Account Number </label>
    											<div class="col-lg-9">
    												<input v-model="form.account_number" type="number" class="form-control form-control-lg form-control-solid" name="account_number" placeholder="1006478902" />          
    											</div>
    										</div>
    										<!--end::Form row-->
    										<div align="center">
    										  <button type="submit" id="btn-bank-info" class="btn btn-primary">
    										    <span class="indicator-label">
                                Save
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span> 
    										  </button>
    										</div>
    										
    										<div class="separator separator-dashed my-10"></div>
    									</div>
    								</form>
    								<!--end::Form-->
									</div>
								</div>
								<!--end::Profile Account-->
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
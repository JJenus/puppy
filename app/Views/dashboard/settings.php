
<?= $this->extend($config->viewLayout) ?>
  
  <?= $this->section('pageScripts') ?>
    <!-- begin::Page Custom Javascript(used by this page)-->
		<script src="<?= base_url() ?>/assets/js/vue.min.js"></script>
		<script src="<?= base_url("assets/js/dashboard/staffs.vue.js") ?>"></script>
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
								<!--begin::Profile Settings-->
								<div class="card">
									<!--begin::Form-->
									<form class="form d-flex flex-center">
										<div class="card-body mw-800px py-20">
											<div class="row">
												<label class="col-xl-3"></label>
												<div class="col-lg-9 col-xl-6">
													<h5 class="fw-bold mb-6">Setup Email Notification:</h5>
												</div>
											</div>
											<div class="mb-5 row align-items-center mb-2">
												<label class="col-xl-3 col-lg-3 col-form-label fw-bold text-start text-lg-end">Email Notifications</label>
												<div class="col-lg-9 col-xl-6 d-flex align-items-center">
													<div class="form-check form-check-custom form-check-solid form-switch">
														<input class="form-check-input" type="checkbox" checked="checked" />
													</div>
												</div>
											</div>
											<div class="mb-5 row align-items-center">
												<label class="col-xl-3 col-lg-3 col-form-label fw-bold text-start text-lg-end">Send Copy To Personal Email</label>
												<div class="col-lg-9 col-xl-6">
													<div class="form-check form-check-custom form-check-solid form-switch">
														<input class="form-check-input" type="checkbox" />
													</div>
												</div>
											</div>
											<div class="separator my-10"></div>
											<div class="row">
												<label class="col-xl-3"></label>
												<div class="col-lg-9 col-xl-6">
													<h5 class="fw-bold mb-6">Activity Related Emails:</h5>
												</div>
											</div>
											<div class="mb-8 row">
												<label class="col-xl-3 col-lg-3 col-form-label fw-bold text-start text-lg-end">When To Email</label>
												<div class="col-lg-9 col-xl-6">
													<div class="form-check form-check-custom form-check-solid mb-3">
														<input class="form-check-input" type="checkbox" checked="checked" id="kt_checkbox_1" value="option111" />
														<label class="form-check-label fw-bold text-gray-600" for="kt_checkbox_1">You have new notifications</label>
													</div>
													<div class="form-check form-check-custom form-check-solid mb-3">
														<input class="form-check-input" type="checkbox" id="kt_checkbox_2" value="option112" />
														<label class="form-check-label fw-bold text-gray-600" for="kt_checkbox_2">You're sent a direct message</label>
													</div>
													<div class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="checkbox" id="kt_checkbox_3" value="option113" />
														<label class="form-check-label fw-bold text-gray-600" for="kt_checkbox_3">Someone adds you as a connection</label>
													</div>
												</div>
											</div>
											<div class="mb-8 row">
												<label class="col-xl-3 col-lg-3 col-form-label fw-bold text-start text-lg-end">When To Escalate Emails</label>
												<div class="col-lg-9 col-xl-6">
													<div class="form-check form-check-custom form-check-solid mb-3">
														<input class="form-check-input" type="checkbox" checked="checked" id="kt_checkbox_4" value="option114" />
														<label class="form-check-label fw-bold text-gray-600" for="kt_checkbox_4">Upon new order</label>
													</div>
													<div class="form-check form-check-custom form-check-solid mb-3">
														<input class="form-check-input" type="checkbox" id="kt_checkbox_5" value="option115" />
														<label class="form-check-label fw-bold text-gray-600" for="kt_checkbox_5">New membership approval</label>
													</div>
													<div class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="checkbox" id="kt_checkbox_6" value="option116" />
														<label class="form-check-label fw-bold text-gray-600" for="kt_checkbox_6">Member registration</label>
													</div>
												</div>
											</div>
											<div class="separator my-10"></div>
											<div class="row">
												<label class="col-xl-3"></label>
												<div class="col-lg-9 col-xl-6">
													<h5 class="fw-bold mb-6">Updates From Keenthemes:</h5>
												</div>
											</div>
											<div class="mb-8 row">
												<label class="col-xl-3 col-lg-3 col-form-label fw-bold text-start text-lg-end">Email You With</label>
												<div class="col-lg-9 col-xl-6">
													<div class="form-check form-check-custom form-check-solid mb-3">
														<input class="form-check-input" type="checkbox" id="kt_checkbox_7" value="option114" />
														<label class="form-check-label fw-bold text-gray-600" for="kt_checkbox_7">News about Keenthemes products and feature updates</label>
													</div>
													<div class="form-check form-check-custom form-check-solid mb-3">
														<input class="form-check-input" type="checkbox" id="kt_checkbox_8" value="option115" />
														<label class="form-check-label fw-bold text-gray-600" for="kt_checkbox_8">Tips on getting more out of Keen</label>
													</div>
													<div class="form-check form-check-custom form-check-solid mb-3">
														<input class="form-check-input" type="checkbox" id="kt_checkbox_9" value="option116" />
														<label class="form-check-label fw-bold text-gray-600" for="kt_checkbox_9">Things you missed since you last logged into Keen</label>
													</div>
													<div class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="checkbox" id="kt_checkbox_10" value="option116" />
														<label class="form-check-label fw-bold text-gray-600" for="kt_checkbox_10">News about Keenthemes on partner products and other services</label>
													</div>
												</div>
											</div>
											<!--begin::Form Group-->
											<div class="mb-8 row pt-10">
												<label class="col-lg-3 col-form-label"></label>
												<div class="col-lg-9">
													<button type="reset" class="btn btn-primary fw-bolder px-6 py-3 me-3">Save Changes</button>
													<button type="reset" class="btn btn-color-gray-600 btn-active-light-primary fw-bolder px-6 py-3">Cancel</button>
												</div>
											</div>
											<!--end::Form Group-->
										</div>
									</form>
									<!--end::Form-->
								</div>
								<!--end::Profile Settings-->
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

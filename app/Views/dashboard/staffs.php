<?= $this->extend($config->viewLayout) ?>
  
  <?= $this->section('pageScripts') ?>
    <!-- begin::Page Custom Javascript(used by this page)-->
		<script src="<?= base_url() ?>/assets/js/custom/widgets.js"></script>
		<script src="<?= base_url() ?>/assets/plugins/custom/leaflet/leaflet.bundle.js"></script>
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
					<?= view("dashboard/temp/top_bar") ?>
					<!--begin::Main-->
					<div class="d-flex flex-column flex-column-fluid">
						<!--begin::toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<div class="container d-flex flex-stack flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-1">
									<!--begin::Title-->
									<h3 class="text-dark fw-bolder my-1">Staffs</h3>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-line bg-transparent text-muted fw-bold p-0 my-1 fs-7">
										<li class="breadcrumb-item">
											<a href="<?=base_url("app/main")?>" class="text-muted text-hover-primary">App</a>
										</li>
										<li class="breadcrumb-item">Dashboard</li>
										<li class="breadcrumb-item text-dark">Staffs</li>
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Info-->
							</div>
						</div>
						<!--end::toolbar-->
						<!--begin::Content-->
						<div class="content fs-6 d-flex flex-column-fluid" id="kt_content">
							<!--begin::Container-->
							<div class="container">
							  
								<!--begin::Row-->
								<div class="row g-0 g-xl-5 g-xxl-8">
									<div class="col-xxl-12">
										<div class="card mb-12">
											<div class="card-body card-rounded p-0 bg-light-primary">
												<div class="d-flex">
  												<div class="d-flex flex-column flex-lg-row-auto p-10 p-md-20">
  													<h1 class="fw-bolder text-dark">Search</h1>
  													<div class="fs-3 mb-8">search staffs by name</div>
  													<!--begin::Form-->
  													<form class="d-flex flex-center py-0 px-6 bg-white rounded">
  														
  														<!--begin::Svg Icon | path: icons/stockholm/General/Search.svg-->
  														<span class="svg-icon svg-icon-1 svg-icon-primary">
  															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
  																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
  																	<rect x="0" y="0" width="24" height="24" />
  																	<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
  																	<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
  																</g>
  															</svg>
  														</span>
  														<!--end::Svg Icon-->
  														
  														<input id="search" v-model="inputs.search" @keyup="search()" type="text" class="form-control search border-0 fw-bold ps-2 w-xxl-350px" placeholder="Search orders" />
  													</form>
  													<!--end::Form-->
  												</div>
  												<div class="d-none d-md-flex flex-row-fluid mw-400px ml-auto bgi-no-repeat bgi-position-y-center bgi-position-x-left bgi-size-cover" style="background-image: url(<?= base_url() ?>/assets/media/svg/illustrations/progress.svg);"></div>
												</div>
												<!--begin::Row-->
        								<div class="row p-10 g-0 g-xl-5 g-xxl-8">
        									<staff-card v-for="staff in staffs" :staff="staff"></staff-card>
        							  </div>
        								<!--end::Row-->
											</div>
										</div>
									</div>
								</div>
								<!--end::Row-->
							
								<?= view("temp/navbar") ?>
								<!--begin::Modals-->
								<!--begin::Modal - Select Location-->
								
								<!--end::Modal - Select Location-->
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
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		
<?= $this->endSection() ?>
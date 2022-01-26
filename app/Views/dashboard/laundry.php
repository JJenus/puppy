<?= $this->extend($config->viewLayout) ?>
  
  <?= $this->section('pageScripts') ?>
    <!-- begin::Page Custom Javascript(used by this page)-->
		<script src="<?= base_url() ?>/assets/js/vue.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/dashboard/laundry.vue.js"></script>
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
									<h3 class="text-dark fw-bolder my-1">Laundry</h3>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-line bg-transparent text-muted fw-bold p-0 my-1 fs-7">
										<li class="breadcrumb-item">
											<a href="<?=base_url("app/main")?>" class="text-muted text-hover-primary">App</a>
										</li>
										<li class="breadcrumb-item">dashboard</li>
										<li class="breadcrumb-item text-dark">laundry</li>
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
								<div class="row justify-content-between g-xl-5 g-xxl-8">
									<div class="col-md-6 col-xl-3">
										<!--begin::Stats Widget 3-->
										<div class="card card-stretch mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body p-5 p-md-8">
												<!--begin::Section-->
												<div class="d-flex align-items-center">
													<!--begin::Symbol-->
													<div class="symbol symbol-40px symbol-md-50px me-5">
														<span class="symbol-label bg-light-danger ">
															<!--begin::Svg Icon | path: icons/stockholm/Communication/Group-chat.svg-->
															<i class="fas fs-3x text-danger fa-tshirt"></i>
															<!--end::Svg Icon-->
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Title-->
													<div>
														<a href="#" class="fs-4 text-dark text-hover-primary fw-bolder">{{stats.clothes}} Clothes</a>
														<div class="fs-7 text-white opacity-75 fw-bold mt-1">
														  <select onchange="onChange('clothes', this.value)" class="form-select form-select-solid form-select-sm" data-control="select2" data-placeholder="Today" data-hide-search="true">
                      					<option class="capitalize fs-9 " v-for="(range, index) in selectRange"  :value="index"><button @click="loadStats()" class="btn btn-sm btn-link ">{{range}}</button></option>
                      				</select>
														</div>
													</div>
													<!--end::Title-->
												</div>
												<!--end::Section-->
												
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 3-->
									</div>
									<div class="col-md-6 col-xl-3">
										<!--begin::Stats Widget 4-->
										<div class="card card-stretch mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body p-5 p-md-8">
												<!--begin::Section-->
												<div class="d-flex align-items-center">
													<!--begin::Symbol-->
													<div class="symbol symbol-40px symbol-md-50px me-5">
														<span class="symbol-label bg-light-success">
															<!--begin::Svg Icon | path: icons/stockholm/Home/Library.svg-->
															<span class="svg-icon svg-icon-2x svg-icon-success">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
																		<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Title-->
													<div>
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder">{{stats.washed}} Washed</a>
														<div class="fs-7 text-white opacity-75 fw-bold mt-1">
														  <select onchange="onChange('washed', this.value)" class="form-select form-select-solid form-select-sm" data-control="select2" data-placeholder="Today" data-hide-search="true">
                      					<option class="capitalize fs-9 " v-for="(range, index) in selectRange"  :value="index">
                      					   {{range}}
                      					</option>
                      				</select>
														</div>
													</div>
													<!--end::Title-->
												</div>
												<!--end::Section-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 4-->
									</div>
									<div class="col-md-6 col-xl-3">
										<!--begin::Stats Widget 5-->
										<div class="card card-stretch mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body p-5 p-md-8">
												<!--begin::Section-->
												<div class="d-flex align-items-center">
													<!--begin::Symbol-->
													<div class="symbol symbol-40px symbol-md-50px me-5">
														<span class="symbol-label bg-light-warning">
															<!--begin::Svg Icon | path: icons/stockholm/Layout/Layout-4-blocks.svg-->
															<span class="svg-icon svg-icon-2x svg-icon-warning">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
																		<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Title-->
													<div>
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder">{{stats.ironed}} Ironed</a>
														<div class="fs-7 text-white opacity-75 fw-bold mt-1">
														  <select  onchange="onChange('ironed', this.value)"  class="form-select form-select-solid form-select-sm" data-control="select2" data-placeholder="Today" data-hide-search="true">
                      					<option class="capitalize fs-9 " v-for="(range, index) in selectRange"  :value="index">{{range}}</option>
                      				</select>
														</div>
													</div>
													<!--end::Title-->
												</div>
												<!--end::Section-->
												
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 5-->
									</div>
									<div class="col-md-6 col-xl-3">
										<!--begin::Stats Widget 5-->
										<div class="card card-stretch mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body p-5 p-md-8">
												<!--begin::Section-->
												<div class="d-flex align-items-center">
													<!--begin::Symbol-->
													<div class="symbol symbol-40px symbol-md-50px me-5">
														<span class="symbol-label bg-light-primary ">
															<!--begin::Svg Icon | path: icons/stockholm/Layout/Layout-4-blocks.svg-->
															<span class="svg-icon svg-icon-2x svg-icon-warning">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
																		<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Title-->
													<div>
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder">{{stats.dispensed}} Dispensed</a>
														<div class="fs-7 text-white opacity-75 fw-bold mt-1">
														  <select  onchange="onChange('dispensed', this.value)"  class="form-select form-select-solid form-select-sm" data-control="select2" data-placeholder="Today" data-hide-search="true">
                      					<option class="capitalize fs-9 " v-for="(range, index) in selectRange"  :value="index">{{range}}</option>
                      				</select>
														</div>
													</div>
													<!--end::Title-->
												</div>
												<!--end::Section-->
												
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 5-->
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row g-0 g-xl-5 g-xxl-8">
									<div class="col-xl-4">
										<!--begin::Stats Widget 1-->
										<div class="card card-stretch mb-5 mb-xxl-8">
											<!--begin::Header-->
											<div class="card-header align-items-center border-0 mt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="fw-bolder text-dark fs-3">Revenue Share</span>
													<span class="text-muted mt-2 fw-bold fs-6">{{widget.data.reduce((r,c)=>{return r+c}, 0)}} Clothes</span>
												</h3>
												<div class="card-toolbar">
													<!--begin::Dropdown-->
													<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
														<!--begin::Svg Icon | path: icons/stockholm/Layout/Layout-4-blocks-2.svg-->
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
																	<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																	<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																	<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																</g>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button>
													<!--begin::Menu-->
													<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
														<div class="separator mb-3 opacity-75"></div>
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Today</a>
														</div>
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3">Week</a>
														</div>
													</div>
													<!--end::Menu-->
													<!--end::Dropdown-->
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-12">
												<!--begin::Chart-->
												<div class="d-flex flex-center position-relative bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-center h-175px" style="background-image:url('../assets/media/svg/illustrations/bg-1.svg')">
													<div class="fw-bolder fs-1 text-gray-800 position-absolute">{{widget.data.reduce((r,c)=>{return r+c}, 0)}}</div>
													<canvas id="kt_stats_widget_1_chart"></canvas>
												</div>
												<!--end::Chart-->
												<!--begin::Items-->
												<div class="d-flex flex-wrap justify-content-around pt-18">
													<!--begin::Item-->
													<div v-for="(ele, index) in widget.data" class="m-3">
														<span class="fw-bolder text-gray-800">{{percentage(ele, widget.data)}} {{widget.labels[index]}}</span>
														<span :style="'background-color: '+widget.colors[index]+';'" class=" w-25px h-5px d-block rounded mt-1"></span>
													</div>
													<!--end::Item-->
													
												</div>
												<!--end::Items-->
											</div>
											<!--end: Card Body-->
										</div>
										<!--end::Stats Widget 1-->
									</div>
								</div>
								<!--end::Row-->
								
								<!--begin::Row-->
								<div class="row g-0 g-xl-5 g-xxl-8">
									<div class="col-xxl-4">
										<div class="card mb-12">
											<div class="card-body card-rounded p-0 d-flex bg-light-primary">
												<div class="d-flex flex-column flex-lg-row-auto p-10 p-md-20">
													<h1 class="fw-bolder text-dark">Search for IDs or name</h1>
													<div class="fs-3 mb-8">ID search is exact while name is relative</div>
													<!--begin::Form-->
													<form @submit.prevent="searchDB(search.limit, 0)" class="d-flex flex-center py-0 px-6 bg-white rounded">
														<!--begin::Svg Icon | path: icons/stockholm/General/Search.svg-->
														<span @click="searchDB(search.limit, 0)" class="svg-icon text-hover-success svg-icon-1 svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24" />
																	<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																	<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
																</g>
															</svg>
														</span>
														<!--end::Svg Icon-->
														<input id="search" v-model= "inputs.search" type="text" class="form-control search border-0 fw-bold ps-2 w-xxl-350px" placeholder="Search orders" />
													</form>
													<!--end::Form-->
												</div>
												<div class="d-none d-md-flex flex-row-fluid mw-400px ml-auto bgi-no-repeat bgi-position-y-center bgi-position-x-left bgi-size-cover" style="background-image: url(<?= base_url() ?>/assets/media/svg/illustrations/progress.svg);"></div>
											</div>
										</div>
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row g-xl-5 g-xxl-8">
									<customer-comp v-for="(customer, index) in customers" :key="index" :index="index" :customer="customer"></clothe-comp>
								</div>
								<!--end::Row-->
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
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		
<?= $this->endSection() ?>
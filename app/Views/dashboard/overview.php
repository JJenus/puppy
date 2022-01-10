<?= $this->extend($config->viewLayout) ?>
  
  <?= $this->section('pageScripts') ?>
    <!--begin::Page Custom Javascript(used by this page)-->
		<script src="<?= base_url() ?>/assets/js/vue.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/dashboard/overview.vue.js"></script>
		<!--end::Page Custom Javascript-->
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
						<!--begin::Content-->
						<div class="content fs-6 d-flex flex-column-fluid" id="kt_content">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Row-->
								<div class="row g-0 g-xl-5 g-xxl-8">
									<div class="col-xl-4">
										<!--begin::Stats Widget 4-->
										<div class="card card-stretch mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Section-->
												<div class="d-flex align-items-center">
													<!--begin::Symbol-->
													<div class="symbol symbol-50px me-5">
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
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder">Laundry</a>
														<div class="fs-7 text-muted fw-bold mt-1">
														  <select onchange="onChange('all', this.value)" class="form-select form-select-solid form-select-sm" data-control="select2" data-placeholder="Today" data-hide-search="true">
                      					<option class="capitalize fs-9 " v-for="(range, index) in selectRange"  :value="index">
                      					   {{range}}
                      					</option>
                      				</select>
														</div>
													</div>
													<!--end::Title-->
												</div>
												<!--end::Section-->
												
												<!--begin::Info-->
												<div class="fw-bolder d-flex flex-wrap text-muted pt-7 ">
												  <span class="me-3 mb-3  badge badge-light ">{{stats.clothes}} Clothes</span>
												  <span class="me-3 mb-3 badge badge-light">{{stats.ironed}} Ironed</span>
												  <span class="me-3 mb-3 badge badge-light">{{stats.washed}} washed</span>
													<span class="me-3 mb-3 badge badge-success">{{stats.dispensed}} Dispensed</span>
												</div>
												<!--end::Info-->
												<!--begin::Progress-->
												<div class="progress h-6px mt-7 bg-light-success">
													<div class="progress-bar bg-success" role="progressbar" style="width: 70%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<!--end::Progress-->
												
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 4-->
									</div>
									<div class="col-xl-4">
										<!--begin::Stats Widget 3-->
										<div class="card bg-danger card-stretch mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Section-->
												<div class="d-flex align-items-center">
													<!--begin::Symbol-->
													<div class="symbol symbol-50px me-5">
														<span class="symbol-label bg-white bg-opacity-10">
															<!--begin::Svg Icon | path: icons/stockholm/Communication/Group-chat.svg-->
															<span class="svg-icon svg-icon-2x svg-icon-white">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
																	<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Title-->
													<div>
														<a href="#" class="fs-4 text-white text-hover-primary fw-bolder">Issues</a>
														<div class="fs-7 text-white opacity-75 fw-bold mt-1">
														  <select onchange="onChange('issues', this.value)" class="form-select form-select-solid form-select-sm" data-control="select2" data-placeholder="Today" data-hide-search="true">
                      					<option class="capitalize fs-9 " v-for="(range, index) in selectRange"  :value="index">
                      					   {{range}}
                      					</option>
                      				</select>
														</div>
													</div>
													<!--end::Title-->
												</div>
												<!--end::Section-->
												
												<!--begin::Info-->
												<div class="fw-bolder text-white pt-7">
													<span class="me-3 mb-3 badge badge-secondary"><i class="fas fw-bolder fa-user me-2 "></i>2,756 Customers</span>
													<span class="me-3 mb-3 badge badge-secondary"><i class="fas me-2 fw-bolder fa-warning text-primary"></i>30 Issues</span>
													<span class="me-3 mb-3 badge badge-secondary"><i class="bi fw-bolder me-2 bi-check2 text-primary"></i> 22 Resolved</span>
												</div>
												<!--end::Info-->
												<!--begin::Progress-->
												<div class="progress h-6px bg-white bg-opacity-10 mt-7">
													<div class="progress-bar bg-white" role="progressbar" style="width: 80%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<!--end::Progress-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 3-->
									</div>
									<div class="col-xl-4">
										<!--begin::Stats Widget 5-->
										<div class="card card-stretch mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Section-->
												<div class="d-flex align-items-center">
													<!--begin::Symbol-->
													<div class="symbol symbol-50px me-5">
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
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder">Revenue</a>
														<div class="fs-7 text-muted fw-bold mt-1">
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
												<!--begin::Info-->
												<div class="fw-bolder text-muted pt-7">
												  <span class="me-3 mb-3 badge badge-light">Income: $80,801</span>
												  <span class="me-3 mb-3 badge badge-light">Expenditure: $20,000</span>
													<span class="me-3 mb-3 badge badge-light">Profit: $60,001</span>
												</div>
												<!--end::Info-->
												<!--begin::Progress-->
												<div class="progress h-6px bg-light-warning mt-7">
													<div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<!--end::Progress-->
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
													<span class="text-muted mt-2 fw-bold fs-6">890,344 Clothes</span>
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
															<a href="#" class="menu-link px-3">This Week</a>
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
													<div class="fw-bolder fs-1 text-gray-800 position-absolute">{{revenue}}</div>
													<canvas id="kt_stats_widget_1_chart"></canvas>
												</div>
												<!--end::Chart-->
												<!--begin::Items-->
												<div class="d-flex justify-content-around pt-18">
													<!--begin::Item-->
													<div  class="m-3">
														<span class="fw-bolder text-gray-800">{{revenue}} {{widget.labels[0]}}</span>
														<span :style="'background-color: '+widget.colors[0]+';'" class=" w-25px h-5px d-block rounded mt-1"></span>
													</div>
													<div  class="m-3">
														<span class="fw-bolder text-gray-800">{{Math.round((Math.abs(widget.data[1])/revenue) *100,2)}}% {{widget.labels[1]}}</span>
														<span :style="'background-color: '+widget.colors[1]+';'" class=" w-25px h-5px d-block rounded mt-1"></span>
													</div>
													<!--end::Item-->
													
												</div>
												<!--end::Items-->
											</div>
											<!--end: Card Body-->
										</div>
										<!--end::Stats Widget 1-->
									</div>
									<div class="col-xl-8">
										<!--begin::Stats Widget 2-->
										<div class="card card-stretch mb-5 mb-xxl-8">
											<!--begin::Header-->
											<div class="card-header align-items-center border-0 mt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="fw-bolder text-dark fs-3">Performance last months to date</span>
													
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
													<!--end::Dropdown-->
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0">
												<div class="d-flex flex-wrap flex-xxl-nowrap justify-content-center justify-content-md-start pt-4">
												
													<!--begin::Tab Content-->
													<div class="tab-content flex-grow-1">
														<!--begin::Tab Pane 1-->
														<div class="tab-pane fade show active" id="kt_stats_widget_2_tab_1_content">
															<!--begin::Content-->
															<div class="d-flex justify-content-center mb-10">
																<!--begin::Item-->
																<div class="px-10">
																	<span class="text-muted fw-bold fs-7">Revenue</span>
																	<span class="text-gray-800 fw-bolder fs-3 d-block">{{revenue}}</span>
																</div>
																<!--end::Item-->
																<!--begin::Item-->
																<div class="px-10">
																	<span class="text-muted fw-bold fs-7">Expenditure</span>
																	<span class="text-gray-800 fw-bolder fs-3 d-block">{{expenditure}}</span>
																</div>
																<!--end::Item-->
																<!--begin::Item-->
																<div class="px-10">
																	<span class="text-muted fw-bold fs-7">Net profit</span>
																	<span class="text-gray-800 fw-bolder fs-3 d-block">{{profit}}</span>
																</div>
																<!--end::Item-->
															</div>
															<!--end::Content-->
															<!--begin::Chart-->
															<div id="kt_stats_widget_2_chart_1" style="height: 250px"></div>
															<!--end::Chart-->
														</div>
														<!--end::Tab Pane 1-->
														
													</div>
													<!--end::Tab Content-->
												</div>
											</div>
											<!--end: Card Body-->
										</div>
										<!--end::Stats Widget 2-->
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row g-0 g-xl-5 g-xxl-8">
									<div class="col-xxl-4">
										<!--begin::Stats Widget 6-->
										<div class="card card-stretch mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Top-->
												<div class="d-flex bg-light-primary card-rounded flex-grow-1">
													<!--begin::Section-->
													<div class="py-10 ps-7">
														<!--begin::Text-->
														<div class="">
															<span class="text-primary d-block mb-n1">{{selectedRange}}</span>
															<span class="font-weight-light fs-1 text-gray-800">
															  Clothes  
															<span class="fw-bolder fs-1 text-gray-800">{{stats.clothes}}</span></span>
														</div>
														<!--end::Text-->
														<a href="#" class="btn btn-primary btn-sm fw-bolder fs-6 ps-4 mt-6" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Boost 
														<!--begin::Svg Icon | path: icons/stockholm/Navigation/Up-right.svg-->
														<span class="svg-icon svg-icon-3 me-0">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24" />
																	<rect fill="#000000" opacity="0.5" transform="translate(11.646447, 12.853553) rotate(-315.000000) translate(-11.646447, -12.853553)" x="10.6464466" y="5.85355339" width="2" height="14" rx="1" />
																	<path d="M8.1109127,8.90380592 C7.55862795,8.90380592 7.1109127,8.45609067 7.1109127,7.90380592 C7.1109127,7.35152117 7.55862795,6.90380592 8.1109127,6.90380592 L16.5961941,6.90380592 C17.1315855,6.90380592 17.5719943,7.32548256 17.5952502,7.8603687 L17.9488036,15.9920967 C17.9727933,16.5438602 17.5449482,17.0106003 16.9931847,17.0345901 C16.4414212,17.0585798 15.974681,16.6307346 15.9506913,16.0789711 L15.6387276,8.90380592 L8.1109127,8.90380592 Z" fill="#000000" fill-rule="nonzero" />
																</g>
															</svg>
														</span>
														<!--end::Svg Icon--></a>
													</div>
													<!--end::Section-->
													<!--begin::Pic-->
													<div class="position-relative bgi-no-repeat bgi-size-contain bgi-position-y-bottom bgi-position-x-end mt-6 flex-grow-1" style="background-image:url('../assets/media/misc/illustration-1.png')"></div>
													<!--end::Pic-->
												</div>
												<!--end::Top-->
											
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 6-->
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row g-0 g-xl-5 g-xxl-8">
									<div class="col-xl-4">
										<!--begin::Stats Widget 8-->
										<div v-if="topStaffs.receptionist.length > 0" class="card card-stretch-50 mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body" >
												<div id="kt_stats_widget_8_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel" data-bs-interval="8000">
													<!--begin::Heading-->
													<div class="d-flex flex-stack flex-wrap">
														<!--begin::Label-->
														<span class="fs-6 text-muted fw-bolder pe-2">Receptionist </span>
														<!--end::Label-->
														<!--begin::Carousel Indicators-->
														<ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
															<li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="0" class="ms-1 active"></li>
															<li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="1" class="ms-1"></li>
															<li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="2" class="ms-1"></li>
														</ol>
														<!--end::Carousel Indicators-->
													</div>
													<!--end::Heading-->
													<!--begin::Carousel-->
													<div  class="carousel-inner pt-8">
														<!--begin::Item-->
														<div v-for="(staff, index) in topStaffs.receptionist" :class="(index==0)?'active':''" class="carousel-item">
															<!--begin::Section-->
															<!--begin::Section-->
															<div class="mb-3 d-flex flex-column justify-content-between h-100">
																<!--begin::Title-->
																<h3 class="fs-3 text-gray-800 text-hover-primary fw-bolder cursor-pointer">{{staff.name}}</h3>
																<!--end::Title-->
																<!--begin::Text-->
																<p class="text-gray-600 fw-bold pt-3 mb-0">
																  <span class="capitalize fw-bolder">{{staff.name}}</span>, has attended to {{staff.reports.customers}} customers and registered {{staff.reports.clothes}} clothes.
																</p>
																<!--end::Text-->
																
															</div>
															<!--end::Section-->
															<div>
															  <!--begin::Text-->
        												<div class="d-flex text-muted fw-bold fs-6 pb-4">
        													<span class="flex-grow-1">Percentage (%).</span>
        													<span class="">{{staff.reports.percentage}}%</span>
        												</div>
        												<!--end::Text-->
        												<!--begin::Progress-->
        												<div class="progress h-6px bg-light-danger">
        													<div :class="progressColor(staff.reports.percentage)" class="progress-bar" role="progressbar" :style="'width:' +staff.reports.percentage+'%'" :aria-valuenow="staff.reports.percentage" aria-valuemin="0" aria-valuemax="100"></div>
        												</div>
        												<!--end::Progress-->
															</div>
														</div>
														<!--end::Item-->
													</div>
													<!--end::Carousel-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 8-->
										<!--begin::Stats Widget 9-->
										<div v-if="topStaffs.drycleaners.length > 0" class="card card-stretch-50 mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body">
												<div id="kt_stats_widget_9_carousel" class="carousel carousel-custom slide" data-bs-ride="carousel" data-bs-interval="8000">
													<!--begin::Top-->
													<div class="d-flex flex-stack flex-wrap">
														<!--begin::Label-->
														<span class="text-muted fw-bolder pe-2">Drycleaners</span>
														<!--end::Label-->
														<!--begin::Carousel Indicators-->
														<ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
															<li data-bs-target="#kt_stats_widget_9_carousel" data-bs-slide-to="0" class="ms-1 active"></li>
															<li data-bs-target="#kt_stats_widget_9_carousel" data-bs-slide-to="1" class="ms-1"></li>
															<li data-bs-target="#kt_stats_widget_9_carousel" data-bs-slide-to="2" class="ms-1"></li>
														</ol>
														<!--end::Carousel Indicators-->
													</div>
													<!--end::Top-->
													<!--begin::Carousel-->
													<div class="carousel-inner pt-9">
														<!--begin::Item-->
														<div v-for="(staff, index) in topStaffs.drycleaners" :class="(index==0)?'active':''" class="carousel-item">
															<!--begin::Section-->
															<div class="flex-grow-1 mb-3">
																<!--begin::Title-->
																<h3 class="fs-3 text-gray-800 text-hover-primary fw-bolder cursor-pointer">{{staff.name}}</h3>
																<!--end::Title-->
																<!--begin::Text-->
																<p class="text-primary fs-1 fw-bolder pt-3 mb-0">
																  <span class="text-dark">{{staff.name}}, has worked on </span>
																  {{usable(staff.reports)}} <span class="text-dark">clothes.</span>
																</p>
																<!--end::Text-->
															</div>
															<!--end::Section-->
															<div>
															  <!--begin::Text-->
        												<div class="d-flex text-muted fw-bold fs-6 pb-4">
        													<span class="flex-grow-1">Percentage (%).</span>
        													<span class="">{{staff.reports.percentage}}%</span>
        												</div>
        												<!--end::Text-->
        												<!--begin::Progress-->
        												<div class="progress h-6px bg-light-danger">
        													<div :class="progressColor(staff.reports.percentage)" class="progress-bar" role="progressbar" :style="'width:' +staff.reports.percentage+'%'" :aria-valuenow="staff.reports.percentage" aria-valuemin="0" aria-valuemax="100"></div>
        												</div>
        												<!--end::Progress-->
															</div>
														</div>
														<!--end::Item-->
													</div>
													<!--end::Carousel-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 9-->
									</div>
									<div class="col-xl-8">
										<!--begin::Table Widget 2-->
										<div class="card card-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder text-dark fs-3">Achievement</span>
													<span class="text-muted mt-2 fw-bold fs-6">890,344 Sales</span>
												</h3>
												<div class="card-toolbar">
													<ul class="nav nav-pills nav-pills-sm nav-light">
														<li class="nav-item">
															<a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 active fw-bolder me-2" data-bs-toggle="tab" href="#kt_tab_pane_2_1">Day</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder me-2" data-bs-toggle="tab" href="#kt_tab_pane_2_2">Week</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-active-light btn-color-muted py-2 px-4 fw-bolder" data-bs-toggle="tab" href="#kt_tab_pane_2_3">Month</a>
														</li>
													</ul>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-3 pb-0 mt-n3">
												<div class="tab-content mt-4" id="myTabTables2">
													<!--begin::Tap pane-->
													<div class="tab-pane fade show active" id="kt_tab_pane_2_1" role="tabpanel" aria-labelledby="kt_tab_pane_2_1">
														<!--begin::Table-->
														<div class="table-responsive">
															<table class="table table-borderless align-middle">
																<thead>
																	<tr>
																		<th class="p-0 w-50px"></th>
																		<th class="p-0 min-w-250px"></th>
																		<th class="p-0 min-w-250px"></th>
																	</tr>
																</thead>
																<tbody>
																	<staff-card v-for="staff in staffs" :staff="staff"></staff-card>
																</tbody>
															</table>
														</div>
														<!--end::Table-->
													</div>
													<!--end::Tap pane-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Table Widget 2-->
									</div>
								</div>
								<!--end::Row-->
								<?= view("temp/navbar") ?>
								<!--begin::Modals-->
								
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
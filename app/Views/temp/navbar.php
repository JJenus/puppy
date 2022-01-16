<!--begin::Mega Menu-->
		<div class="modal bg-white fade" id="kt_mega_menu_modal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-fullscreen">
				<div class="modal-content shadow-none">
					<div class="container">
						<div class="modal-header d-flex flex-stack border-0">
							<div class="d-flex align-items-center">
								<!--begin::Logo-->
								<a href="<?= base_url() ?>">
									<strong><h1 class="m-0 fs-2x fw-bolder"><?= APP_NAME ?></h1></strong>
									<img class="d-none" alt="Logo" src="../../assets/media/logos/logo-default.svg" class="h-30px" />
								</a>
								<!--end::Logo-->
							</div>
							<!--begin::Close-->
							<div class="btn btn-icon btn-sm btn-light-primary ms-2" data-bs-dismiss="modal">
								<!--begin::Svg Icon | path: icons/stockholm/Navigation/Close.svg-->
								<span class="svg-icon svg-icon-1">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
											<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
											<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
										</g>
									</svg>
								</span>
								<!--end::Svg Icon-->
							</div>
							<!--end::Close-->
						</div>
						<div class="modal-body">
							<!--begin::Row-->
							<div class="row py-10 g-5">
								<!--begin::Column-->
								<div class="col-lg-6">
									<h3 class="fw-bolder mb-8">Quick Links</h3>
									<!--begin::Row-->
									<div class="row g-5">
										<div class="col-sm-6">
											<a href="<?= base_url('app/dashboard/overview') ?>" class="card bg-light-success hoverable min-h-125px shadow-none mb-5">
												<div class="card-body d-flex flex-column flex-center">
													<h3 class="fs-3 mb-2 text-dark fw-bolder">Overview</h3>
													<p class="mb-0 text-gray-600">All available records</p>
												</div>
											</a>
										</div>
										<div class="col-sm-6">
											<a href="<?= base_url('app/dashboard/laundry') ?>" class="card bg-light-danger hoverable min-h-125px shadow-none mb-5">
												<div class="card-body d-flex flex-column flex-center text-center">
													<h3 class="fs-3 mb-2 text-dark fw-bolder">Laundry</h3>
													<p class="mb-0 text-gray-600">All customer properties and orders</p>
												</div>
											</a>
										</div>
										
									</div>
									<!--end::Row-->
									<!--begin::Row-->
									<div class="row g-5">
										<div class="col-sm-6">
											<a href="<?= base_url('app/dashboard/staffs') ?>" class="card bg-light-success hoverable min-h-125px shadow-none mb-5">
												<div class="card-body d-flex flex-column flex-center">
													<h3 class="fs-3 mb-2 text-dark fw-bolder">Staffs</h3>
													<p class="mb-0 text-gray-600">All available records</p>
												</div>
											</a>
										</div>
										<div class="col-sm-6">
											<a href="<?= base_url('app/dashboard/hire-staff') ?>" class="card bg-light-danger hoverable min-h-125px shadow-none mb-5">
												<div class="card-body d-flex flex-column flex-center text-center">
													<h3 class="fs-3 mb-2 text-dark fw-bolder">Hire</h3>
													<p class="mb-0 text-gray-600">Register employees to app and select permissions</p>
												</div>
											</a>
										</div>
										
									</div>
									<!--end::Row-->
									<!--begin::Row-->
									<div class="row g-5">
									  <div class="col-sm-6">
											<a href="<?= base_url('app/dashboard/issues') ?>" class="card bg-light-warning hoverable min-h-125px shadow-none mb-5">
												<div class="card-body d-flex flex-column flex-center text-center">
													<h3 class="fs-3 mb-2 text-dark text-hover-primary fw-bolder">Issues</h3>
													<p class="mb-0 text-gray-600">Track all possible issues</p>
												</div>
											</a>
										</div>
										<div class="col-sm-6">
											<a href="<?= base_url("app/dashboard/settings") ?>" class="card bg-light-primary hoverable min-h-125px shadow-none mb-5">
												<div class="card-body d-flex flex-column flex-center text-center">
													<h3 class="fs-3 mb-2 text-dark fw-bolder">Settings</h3>
													<p class="mb-0 text-gray-600">
													  Tune or add new and available features. 
													</p>
												</div>
											</a>
											
										</div>
									</div>
									<!--end::Row-->
								</div>
								<!--end::Column-->
							</div>
							<!--end::Row-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end::Mega Menu-->
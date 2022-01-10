<?= $this->extend($config->viewLayout) ?>
  
  <?= $this->section('pageScripts') ?>
    <!--begin::Page Custom Javascript(used by this page)-->
		<script src="<?= base_url() ?>/assets/js/custom/apps/shop.js"></script>
		<script src="<?= base_url() ?>/assets/js/vue.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/main.vue.js"></script>
		<!--end::Page Custom Javascript-->
  <?= $this->endSection() ?> 
  
  
  <?= $this->section('main') ?>
  <body id="kt_body" data-sidebar="on"  class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled sidebar-enabled ">
    
    <!--begin::Main-->
		<!--begin::Root-->
		<div id="app" class="d-flex flex-column flex-root">
			
			<!--begin::Create Expenses Moddal-->
    <div class="modal fade" tabindex="-1" id="kt_modal_expenses">
          <div class="modal-dialog  modal-dialog-centered">
              <div class="modal-content shadow-none">
                  <div class="modal-header">
                    <div class="d-flex justify-content-between flex-column" >
                      <h5 class="modal-title fs-2x">Add Expense(s)</h5>
                    </div>
                      <!--begin::Close-->
                      <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                          <span class="fas fa-times text-danger fs-5"></span>
                      </div>
                      <!--end::Close-->
                  </div>
      
                  <div class="modal-body">
                    <div class="row justify-content-center mb-5">
                      <div class="col-auto">
                        <form method="post" id="create-expenses-form" novalidate @submit.prevent="saveExpenses()" class="form needs-validation">
                          <div class="mb-5">
                            <label>Title</label>
                            <input required type="text" name="name" class="form-control form-control-solid"/>
                            <div class="invalid-feedback">
                              Title cannot be empty
                            </div>
                          </div>
                          <div class="mb-5">
                            <label>Description</label>
                            <textarea rows="6" name="description" class="form-control form-control-solid"></textarea>
                          </div>
                          <div class="mb-5">
                            <label>Cost</label>
                            <input required type="text" name="cost" class="form-control form-control-solid"/>
                            <div class="invalid-feedback">
                              Please enter a valid number
                            </div>
                          </div>
                          <button id="create-expenses-form-btn" type="submit" class="btn btn-primary">
                            <span class="indicator-label">
                                Save
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span> 
                          </button>
                        </form>
                      </div>
                    </div>
                    
                  </div>
              </div>
          </div>
      </div>
    <!--end::Create Expenses Moddal-->
     
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<?= view ("temp/top_bar") ?>
					<!--begin::Main-->
					<div class="d-flex flex-column flex-column-fluid">
						<!--begin::toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<div class="container d-flex flex-stack flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-1">
									<!--begin::Title-->
									<h3 class="text-dark fw-bolder my-4">Hi, <?=$user->name?></h3>
									<!--end::Title-->
								</div>
								<!--end::Info-->
								<!--begin::Nav-->
								<div class="d-flex align-items-center flex-nowrap text-nowrap overflow-auto py-1">
									<a href="./category/food" class="btn btn-active-accent fw-bolder">Food</a>
									<a href="./category/snacks" class="btn btn-active-accent fw-bolder ms-3">Snacks</a>
									<a href="./category/items" class="btn btn-active-accent active fw-bolder ms-3">Items</a>
								</div>
								<!--end::Nav-->
							</div>
						</div>
						<!--end::toolbar-->
						<!--begin::Content-->
						<div class="content fs-6 d-flex flex-column-fluid" id="kt_content">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Card-->
								<div class="card">
									<div class="card-body">
										<!--begin::Engage Widget 1-->
										<div class="card mb-12">
											<div class="card-body card-rounded p-0 d-flex bg-light-primary">
												<div class="d-flex flex-column flex-lg-row-auto p-10 p-md-20">
													<h1 class="fw-bolder text-dark">Search for IDs or name</h1>
													<div class="fs-3 mb-8">ID search is exact while name is relative</div>
													<!--begin::Form-->
													<form @submit.prevent="searchDB(search.limit, 0)" class="d-flex flex-center py-2 px-6 bg-white rounded">
														<button type="submit" class="btn btn-sm btn-active-accent">
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
														</button>
														<input id="search" v-model= "inputs.search" type="text" class="form-control search border-0 fw-bold ps-2 w-xxl-350px" placeholder="Search orders" />
													</form>
													<!--end::Form-->
												</div>
												<div class="d-none d-md-flex flex-row-fluid mw-400px ml-auto bgi-no-repeat bgi-position-y-center bgi-position-x-left bgi-size-cover" style="background-image: url(<?= base_url() ?>/assets/media/svg/illustrations/progress.svg);"></div>
											</div>
										</div>
										<!--end::Engage Widget 1-->
										
										<!--begin::Section-->
										<div class="row g-5 g-xxl-8 mb-5">
										<!--v-for search-->
										  <search-card v-for="customer in customers" :customer="customer"></search-card>
										</div>
										<div v-if="search.result.length === search.limit" class="">
										  <button @click="searchDB(search.limit, customers.length)" class="btn btn-primary">
										    load more
										  </button>
										</div>
										<!--end::Section-->
										
										<!--begin::Section-->
										<!--end::Section-->
									</div>
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Main-->
					<?= view('temp/footer') ?>
				</div>
				<!--end::Wrapper-->
				<!--begin::Sidebar-->
				<div id="kt_sidebar" class="sidebar bg-white" data-kt-drawer="true" data-kt-drawer-name="sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '350px': '300px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_sidebar_toggler">
					<!--begin::Sidebar Content-->
					<div class="d-flex flex-column sidebar-body">
						<div id="kt_sidebar_content" class="py-10 px-7 px-lg-12">
							<div class="hover-scroll-y me-lg-n7 pe-lg-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-offset="0px" data-kt-scroll-wrappers="#kt_sidebar_content">
								<!--begin::New Product Form-->
								<div class="d-none" id="kt_sidebar_shop_new_form">
									<!--begin::Heading-->
									<div class="d-flex flex-column text-center mb-10">
										<h3 class="fs-2 fw-bolder mb-2">Add New Customer</h3>
										<span class="text-muted fs-6 fw-bolder">add customer and information</span>
									</div>
									<!--end::Heading-->
									<!--begin::Form-->
									<form id="createCustomerForm" @submit.prevent="createCustomer()" class="form needs-validation" novalidate method="post">
										
										<!--begin::Product Info-->
										<div class="mt-5 mb-5">
											<div class="mb-4 fw-bolder fs-3">Customer Info</div>
											<!--begin::Input-->
											<div class="mb-8">
												<label class="fw-bolder">Name</label>
												<input required name="name" type="text" class="form-control form-control-solid form-control-lg" placeholder="" />
											</div>
											<div class="mb-8">
												<label class="fw-bolder">Customer type</label>
												<input required name="type" type="text" class="form-control form-control-solid form-control-lg" value="Regular" />
											</div>
											<div class="mb-10">
												<label class="fw-bolder">Phone number</label>
												<input name="phone_number" type="text" class="form-control form-control-solid form-control-lg" placeholder="" />
											</div>
											<div class="d-flex d-flex-row  fw-bolder mb-5 fs-3">
											  <span>Clothes</span>
											  <div v-if="createClothesForm.length===0" class="ms-5">
  											  <button @click="addClotheToForm()" class="btn btn-primary btn-sm">
  											    <i class="bi bi-plus fs-1"></i>
  											    Add clothes
  											  </button>
  											</div>
											</div>
											<clotheform v-for="(i, index) in createClothesForm" :index="index"></clotheform>
											<div v-if="createClothesForm.length>0" class="row fs-5 mb-5  justify-content-between">
											  <div class="col-3">Total</div>
											  <div class="col-5 text-right"><input type="text" name="total_cost" class="form-control text-center form-control-solid" :value="totalCost"></div>
											</div>
											
											<div v-if="createClothesForm.length>0" class="mb-8">
											  <button type="button" @click="addClotheToForm()" class="btn btn-icon me-5 btn-light-primary btn-sm">
											    <i class="bi bi-plus fs-1"></i>
											  </button>
											  <button type="button" @click="deleteLast()" class="btn btn-danger btn-sm">
											    <i class="bi bi-trash fs-1"></i> delete last
											  </button>
											</div>
											
											<div class="mb-4 fw-bolder fs-3">Payment Info</div>
											<div class="mb-5">
											  
											  <div class="table-responsive">
											    <table class="table table-hover">
                            <tr>
                              <td>Amount paid:</td>
                              <td>
                                <div>
                                  <input required name="amount_paid" type="number" class="form-control form-control-sm">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Debt:</td>
                              <td>
                                <div>
                                  <input required value="0.00" name="debt" type="number" class="form-control form-control-sm">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>Change:</td>
                              <td>
                                <div>
                                  <input required value="0.00" name="credit" type="number" class="form-control form-control-sm ">
                                </div>
                              </td>
                            </tr>
                          </table> 
											  </div>
											</div>
											
											<button type="submit" id="create-customer-form-btn" class="btn btn-primary fw-bolder me-2 px-8">
											  <span class="indicator-label">
                          Save
                        </span>
                        <span class="indicator-progress">
                          Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span> 
											</button>
											<button type="reset" id="kt_sidebar_shop_filter_form_btn" class="btn btn-color-gray-600 btn-active-light-primary fw-bolder px-8">Discard</button>
											<!--end::Input-->
										</div>
										<!--end::Product Info-->
									</form>
									<!--end::Form-->
								</div>
								<!--end::New Product Form-->
								
								<!--begin::Products Filter Form-->
								<div id="kt_sidebar_shop_filter_form">
									<!--begin::Heading-->
									<div class="d-flex flex-column text-center bg-light rounded py-8 px-5 mb-10">
										<h3 class="fs-2 fw-bolder mb-2">Create New Order</h3>
										<span class="text-muted fs-6 fw-bolder">Quick Create Form</span>
									  <div class="d-flex align-items-center d-flex-row justify-content-between">
  										<button id="kt_sidebar_shop_new_form_btn" class="btn btn-primary btn-sm me-3 fw-bolder mx-auto px-5 mt-6">
  										  Create customer
  									  </button>
  										<button data-bs-toggle="modal" data-bs-target="#kt_modal_expenses" id="kt_sidebar_add_expense_form_btn" class="btn btn-primary btn-sm fw-bolder mx-auto px-5 mt-6">
  										  Add Expense
  									  </button>
									  </div>
									</div>
									<!--end::Heading-->
									
									<!--begin::Activities Table-->
										<div class="mb-13">
											<div class="text-dark fw-bolder fs-6 mb-5">
											  Today's Activities
											</div>
											
											<div class="row mb-5">
                        <div class="col-4">
                          <div class="card">
                            <div class="card-body p-3  card-rounded bg-light-success">
                              <div class="d-flex fw-bolder justify-content-center align-items-center flex-column"> 
                                  <i class="fas fs-1 fa-tshirt"></i>
                                <div>
                                  Income
                                </div>
                                <span>
                                  {{totalIncome}}
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-4">
                          <div class="card">
                            <div class="card-body p-3  card-rounded bg-light-success">
                              <div class="d-flex fw-bolder justify-content-center align-items-center flex-column"> 
                                  <i class="bi bi-check2-square fs-1"></i>
                                <div>
                                  Expenses
                                </div>
                                <span>
                                  {{totalExpenses}} 
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-4">
                          <div class="card">
                            <div class="card-body p-3  card-rounded bg-light-success">
                              <div class="d-flex fw-bolder justify-content-center align-items-center flex-column"> 
                                  <i class="bi fs-1 bi-cash-stack "></i>
                                <div>
                                  <span v-if="totalIncome >= totalExpenses">
                                    Profit 
                                  </span>
                                  <span v-if="totalIncome < totalExpenses">
                                    Loss 
                                  </span>
                                </div>
                                <span :class="(totalIncome >= totalExpenses) ? 'text-success' : 'text-danger'">
                                  {{totalIncome-totalExpenses}} 
                                </span>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        
                      </div>
											
											<ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                          <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#customers-today">Customers</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#expenses">Expenses</a>
                          </li>
                      </ul>
                      <div class="tab-content">
                        <div id="customers-today" class="tab-pane fade show active">
    											<div class="table-responsive">
    											  <table class="table table-hover gs-4 gy-4 gx-4">
                                <thead>
                                    <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                                        <th>Name</th>
                                        <th>id</th>
                                        <th>status</th>
                                        <th>cost</th>
                                        <th>paid</th>
                                        <th>time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="customer in activitiesToday">
                                        <td>{{customer.name}}</td>
                                        <td>{{customer.id}}</td>
                                        <td>
                                          <div>
                                            <span :class="(customer.status =='dispensed')?'badge-light-success':'badge-light-warning' "  class="badge badge-lg">
                                					    {{customer.status}}
                                				    </span> 
                                          </div>
                                        </td>
                                        <td class="">{{customer.total_cost}}</td>
                                        <td>{{customer.amount_paid}}</td>
                                        <td>{{toTime(customer.updated_at.date)}}</td>
                                    </tr>
                                    <tr class="fw-bolder fs-5">
                                      <td></td>
                                      <td></td>
                                      <td>
                                        <span>Total</span>
                                      </td>
                                      <td></td>
                                      <td class="">{{totalIncome}}</td>
                                      <td></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                  <tr class="fw-bold d-none fs-6 text-gray-800 border-bottom border-gray-200">
                                        <th>Name</th>
                                        <th>id</th>
                                        <th>status</th>
                                        <th>cost</th>
                                        <th>paid</th>
                                        <th>time</th>
                                    </tr> 
                                </tfoot>
                            </table>
    											</div>
                        </div>
                        <div id="expenses" class="tab-pane fade ">
                          <!-- 
                            DAILY EXPENSES TABLE
                          -->
                          <div class="table-responsive">
    											  <table class="table table-hover gs-4 gy-4 gx-4">
                                <thead>
                                    <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                                        <th>#</th>
                                        <th>title</th>
                                        <th>description</th>
                                        <th>amount</th>
                                        <th>time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(expense, i) in expenses" >
                                        <td>{{1+i}}</td>
                                        <td>{{expense.name}}</td>
                                        <td>
                                          {{expense.description}} 
                                        </td>
                                        <td>{{expense.cost}}</td>
                                        <td>{{toTime(expense.created_at)}}</td>
                                    </tr>
                                    <tr class="fw-bolder fs-5">
                                      <td></td>
                                      <td></td>
                                      <td>
                                        <span>Total</span>
                                      </td>
                                      <td>{{totalExpenses}}</td>
                                      <td></td>
                                    </tr>
                                </tbody>
                            </table>
    											</div>
                        </div>
                      </div>
                      
										</div>
									<!--end::Activities Table -->
								</div>
								<!--end::Products Filter Form-->
							</div>
						</div>
					</div>
					<!--end::Sidebar Content-->
				</div>
				<!--end::Sidebar-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root--> 

  
  <?= $this->endSection() ?>

	
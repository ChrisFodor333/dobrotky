@include('header')

	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div id="page-id3" class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
          <!-- NAVIGATION HERE -->
          @include('navigation')
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
          <div class="mt-lg-n6">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack">
                <div  class="page-title d-flex flex-column justify-content-center flex-wrap">
              <!--begin::Title-->
              <h1 class="page-heading d-flex text-gray-900 fw-bolder fs-3 flex-column justify-content-center my-0">Zoznam zákazníkov | <span class="mybreadcrumbs">Počet: {{$count}}</span></h1>
              <!--end::Title-->
                  <!--begin::Breadcrumb-->
                  <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted"><a class="text-muted text-hover-primary" href="<?php echo url('/'); ?>">Domov</a></li>

                              <li class="breadcrumb-item">
                                  <span class="bullet bg-gray-500 w-5px h-2px"></span>
                              </li>

                    <li class="breadcrumb-item text-muted">Zoznam zákazníkov</li>
                    </ul>
                  <!--end::Breadcrumb-->
              </div>
          <!--end::Page title-->
          <!--begin::Actions-->
          <div class="d-flex align-items-center gap-2 gap-lg-3">
						<div class="d-flex align-items-center gap-2 gap-lg-3">
									<a class="btn btn-primary" href="<?php echo url('/addcustomer');?>">Pridať zákazníka</a>
						</div>
          </div>
          <!--end::Actions-->
          </div>
          </div>
					<!--end::Header-->
					<!--begin::Content-->
          <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Toolbar-->

            <!--end::Toolbar-->
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
              <!--begin::Container-->
              <div id="kt_content_container" class="container-xxl">
                <!--begin::Products-->
                <div class="card card-flush">
                  <!--begin::Card header-->
                  <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                      <!--begin::Search-->
                      <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Hľadať firmu" />
                      </div>
                      <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                      <!--begin::Flatpickr-->
                      <!--
                      <div class="input-group w-250px">
                        <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
                        <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">

                          <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                              <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black" />
                            </svg>
                          </span>

                        </button>
                      </div>
                    -->
                      <!--end::Flatpickr-->
                      <div class="w-100 mw-200px">
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Stav" data-kt-ecommerce-order-filter="status">
                          <option></option>
                          <option value="all">Všetky</option>
                          <option value="Aktívny">Aktívny</option>
                          <option value="Pozastavený">Pozastavený</option>
                          <option value="Neaktívny">Neaktívny</option>
                          <option value="Čaká na úhradu">Čaká na úhradu</option>
                        </select>
                        <!--end::Select2-->
                      </div>
                      <!--begin::Add product-->

                      <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                  </div>
                  <!--end::Card header-->
                  <!--begin::Card body-->
                  <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                      <!--begin::Table head-->
                      <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 mytablecss fs-7 text-uppercase gs-0">
                          <th class="w-10px pe-2" style="display:none !important;">
                            <div style="visibility: hidden;" class="form-check form-check-sm form-check-custom form-check-solid me-3">
                              <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_sales_table .form-check-input" value="1" />
                            </div>
                          </th>
													<th class="min-w-100px">Stav</th>
                          <th class="min-w-100px">Meno a Priezvisko</th>
                          <th class="text-end min-w-80px">Pohlavie</th>
                          <th class="text-end min-w-80px">Mesto</th>
                          <th class="text-end min-w-80px">Meranie</th>
                          <th class="text-end min-w-100px">Úhrada</th>
                          <th class="text-end min-w-100px">exp</th>
													<th class="text-end min-w-160px">Poznámka</th>
                          <th class="text-end min-w-100px">Možnosti</th>
                        </tr>
                        <!--end::Table row-->
                      </thead>
                      <!--end::Table head-->
                      <!--begin::Table body-->
                      <tbody class="fw-bold text-gray-600">

                        <?php $i = 0; ?>
                        @foreach($customers as $c)
                        <!--begin::Table row-->
                        <tr>
                          <!--begin::Checkbox-->
                          <td id="id" style="display:none;">
                            <span class="text-gray-800 text-hover-primary fs-5 mytablecss">{{$c->id}}</span>
                          </td>
                          <!--end::Checkbox-->
                          <!--begin::Order ID=-->
													<td>
                            <div class="d-flex align-items-center">
														@if($c->active == "Čaká na úhradu")
                                <span class="badge badge-light-primary">Čaká na úhradu</span>
														@endif
														@if($c->active == "Aktívny")
                                <span class="badge badge-light-success">Aktívny</span>
														@endif
														@if($c->active == "Pozastavený")
                                <span class="badge badge-light-warning">Pozastavený</span>
														@endif
														@if($c->active == "Neaktívny")
                                <span class="badge badge-light-danger">Neaktívny</span>
														@endif
                            </div>
                          </td>
                          <!--end::Order ID=-->
                          <!--begin::Customer=-->
                          <td>
                            <div class="d-flex align-items-center">
                                  <span data-kt-ecommerce-order-filter="name" class="text-gray-800 text-hover-primary fs-5 mytablecss">{{$c->fname}} {{$c->lname}}</span>
                            </div>
                          </td>
                          <!--end::Customer=-->
                          <!--begin::Status=-->
                          <td class="text-end pe-0">
                                <span class="mytablecss">{{$c->gender}}</span>
                          </td>
                          <!--end::Status=-->
                          <!--begin::Total=-->
													<td class="text-end pe-0">
                                <span class="mytablecss">{{$c->city}}</span>
                          </td>
                          <!--end::Total=-->

													<td class="text-end pe-0">
															@if($c->inbody == 1)
																<span class="mytablecss">Áno</span>
															@endif
															@if($c->inbody == 0)
																<span class="mytablecss">Nie</span>
															@endif
													</td>

                          <!--begin::Date Modified=-->
													<td class="text-end pe-0">
																<span class="mytablecss">{{$c->payment}}</span>
													</td>

													<td class="text-end pe-0">
																<span class="mytablecss">2024/01/09</span>
													</td>

													<td class="text-end pe-0">
																<span class="mytablecss">{{$c->note}}</span>
													</td>
                          <!--end::Date Modified=-->
                          <!--begin::Action=-->
                          <td class="text-end">
                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Možnosti
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-5 m-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                              </svg>
                            </span>
                            <!--end::Svg Icon--></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                <a target="_blank" href="<?php echo url('/superuser/companydetails/'.$c->id);?>" class="menu-link px-3">Detaily</a>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                <a href="<?php echo url('/superuser/aktualizovatfirmu/'.$c->id);?>" class="menu-link px-3">Aktualizovať</a>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                @if($c->status == "aktívna")
                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Deaktivovať</a>
                                @else
                                <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="activate">Aktivovať</a>
                                @endif
                              </div>
                              <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                          </td>
                          <!--end::Action=-->
                        </tr>
                        <!--end::Table row-->
                        <!--begin::Table row-->
                        <?php $i++; ?>
                        @endforeach
                      </tbody>
                      <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                  </div>
                  <!--end::Card body-->
                </div>
                <!--end::Products-->
              </div>
              <!--end::Container-->
            </div>
            <!--end::Post-->
          </div>

				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>

		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
              <!--begin::Container-->
              <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1"></div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 fw-bold order-1">
                  <li class="menu-item">
                    <span class="menu-link px-2">2023©</span>
                  </li>
                  <li class="menu-item">
                    <a href="https://leadix.sk/" target="_blank" class="menu-link text-hover-primary px-2">Leadix s.r.o.</a>
                  </li>
                </ul>
                <!--end::Menu-->
              </div>
              <!--end::Container-->
            </div>
    <script>var hostUrl = "assets/";</script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="<?php echo url('/');?>/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo url('/');?>/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="<?php echo url('/');?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="<?php echo url('/');?>/assets/js/custom/apps/ecommerce/sales/listing.js"></script>
    <script src="<?php echo url('/');?>/assets/js/widgets.bundle.js"></script>
    <script src="<?php echo url('/');?>/assets/js/custom/widgets.js"></script>
    <script src="<?php echo url('/');?>/assets/js/custom/apps/chat/chat.js"></script>
    <script src="<?php echo url('/');?>/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="<?php echo url('/');?>/assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="<?php echo url('/');?>/assets/js/custom/utilities/modals/users-search.js"></script>

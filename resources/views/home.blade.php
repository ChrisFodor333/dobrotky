@include('header')

<style>

.clear-button {
       position: absolute;
       right: 10px;
       top: 50%;
       transform: translateY(-50%);
       background-color: transparent;
       border: none;
       color: #888;
       cursor: pointer;
   }

</style>

	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div id="page-id25" class="d-flex flex-column flex-root">
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
              <h1 class="page-heading d-flex text-gray-900 fw-bolder fs-3 flex-column justify-content-center my-0">Dashboard</h1>
              <!--end::Title-->
                  <!--begin::Breadcrumb-->
                  <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted"><a class="text-muted text-hover-primary" href="<?php echo url('/admin'); ?>">Domov</a></li>
              </div>
          <!--end::Page title-->
          <!--begin::Actions-->

          <!--end::Actions-->
          </div>
          </div>
					<!--end::Header-->
					<!--begin::Content-->
          <div id="kt_app_content" class="app-content flex-column-fluid mt-9">


                  <!--begin::Content container-->
                  <div id="kt_app_content_container" class="app-container  container-xxl ">
                      <!--begin::Stats-->
          <div class="row gx-6 gx-xl-9">
              <div class="col-lg-6 col-xxl-4">
                  <!--begin::Card-->
          <div class="card h-100">
              <!--begin::Card body-->
              <div class="card-body p-9">
                  <!--begin::Heading-->
                  <div class="fs-2hx fw-bold">{{$all}}</div>
                  <div class="fs-4 fw-semibold text-gray-500 mb-7">Súčasných zákazníkov</div>
                  <!--end::Heading-->

                  <!--begin::Wrapper-->
                  <div class="d-flex flex-wrap">
                      <!--begin::Chart-->
                      <div class="d-flex flex-center h-100px w-100px me-9 mb-5">
                          <canvas id="kt_project_list_chart"></canvas>
                      </div>
                      <!--end::Chart-->

                      <!--begin::Labels-->
                      <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                          <!--begin::Label-->
                          <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                              <div class="bullet bg-primary me-3"></div>
                              <div class="text-gray-500">Aktívny</div>
                              <div class="ms-auto fw-bold text-gray-700">{{$active}}</div>
                          </div>
                          <!--end::Label-->

                          <!--begin::Label-->
                          <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                              <div class="bullet bg-success me-3"></div>
                              <div class="text-gray-500">Čaká sa na úhradu</div>
                              <div class="ms-auto fw-bold text-gray-700">{{$waiting}}</div>
                          </div>
                          <!--end::Label-->

                          <!--begin::Label-->
                          <div class="d-flex fs-6 fw-semibold align-items-center">
                              <div class="bullet bg-gray-300 me-3"></div>
                              <div class="text-gray-500">Neaktívny</div>
                              <div class="ms-auto fw-bold text-gray-700">{{$inactive}}</div>
                          </div>
                          <!--end::Label-->
                      </div>
                      <!--end::Labels-->
                  </div>
                  <!--end::Wrapper-->
              </div>
              <!--end::Card body-->
          </div>
          <!--end::Card-->    </div>
              <div class="col-lg-6 col-xxl-4">
                  <!--begin::Budget-->
          <div class="card  h-100">
              <div class="card-body p-9">
                  <div class="fs-2hx fw-bold">$3,290.00</div>
                  <div class="fs-4 fw-semibold text-gray-500 mb-7">Project Finance</div>

                  <div class="fs-6 d-flex justify-content-between mb-4">
                      <div class="fw-semibold">Avg. Project Budget</div>
                      <div class="d-flex fw-bold">
                          <i class="ki-duotone ki-arrow-up-right fs-3 me-1 text-success"><span class="path1"></span><span class="path2"></span></i>                $6,570
                      </div>
                  </div>

                  <div class="separator separator-dashed"></div>

                  <div class="fs-6 d-flex justify-content-between my-4">
                      <div class="fw-semibold">Lowest Project Check</div>

                      <div class="d-flex fw-bold">
                          <i class="ki-duotone ki-arrow-down-left fs-3 me-1 text-danger"><span class="path1"></span><span class="path2"></span></i>                $408
                      </div>
                  </div>

                  <div class="separator separator-dashed"></div>

                  <div class="fs-6 d-flex justify-content-between mt-4">
                      <div class="fw-semibold">Ambassador Page</div>

                      <div class="d-flex fw-bold">
                          <i class="ki-duotone ki-arrow-up-right fs-3 me-1 text-success"><span class="path1"></span><span class="path2"></span></i>                $920
                      </div>
                  </div>
              </div>
          </div>
          <!--end::Budget-->    </div>
              <div class="col-lg-6 col-xxl-4">

          <!--begin::Clients-->
          <div class="card  h-100">
              <div class="card-body p-9">
                  <!--begin::Heading-->
                  <div class="fs-2hx fw-bold">{{$all}}</div>
                  <div class="fs-4 fw-semibold text-gray-500 mb-7">Naši zákazníci</div>
                  <!--end::Heading-->

                  <!--begin::Users group-->
                  <div class="symbol-group symbol-hover mb-9">
                                @foreach($customers as $c)
                                      <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip">
                                          <span class="symbol-label bg-warning text-inverse-warning fw-bold">{{substr($c->fname,0,1)}}</span>
                                        </div>
                                    @endforeach
                                  <a href="#" class="symbol symbol-35px symbol-circle">
                          <span class="symbol-label bg-primary" style="color: white !important;">+{{$plus}}</span>
                      </a>
                  </div>
                  <!--end::Users group-->

                  <!--begin::Actions-->
                  <div class="d-flex">
                      <a href="<?php echo url('/zakaznici');?>" class="btn btn-primary btn-sm me-3">Zákazníci</a>
                      <a href="<?php echo url('/addcustomer');?>" class="btn btn-light btn-sm">Pridať nového</a>
                  </div>
                  <!--end::Actions-->
              </div>
          </div>
          <!--end::Clients-->    </div>
          </div>
        </div>
                  <!--end::Content container-->
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

@include('footer')
<script src="<?php echo url('/');?>/charts_admin.js"></script>
<script src="<?php echo url('/');?>/assets/js/custom/apps/projects/list/list.js"></script>

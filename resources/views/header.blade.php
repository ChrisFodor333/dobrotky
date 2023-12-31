<html lang="en">
	<!--begin::Head-->
	<head>
		<title>Dobroty od dobrotky</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Dobroty od dobrotky" />
		<link rel="shortcut icon" href="<?php echo url('/');?>/assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="<?php echo url('/');?>/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="<?php echo url('/');?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo url('/');?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo url('/');?>/assets/css/style2.css" rel="stylesheet" type="text/css" />
		<script src='<?php echo url('/') . "/assets/js/jquery.min.js";?>' id='jquery-core-js'></script>
		<script src='<?php echo url('/') . "/assets/js/jquery-migrate.min.js";?>' id='jquery-migrate-js'></script>
		<script type="text/javascript" src="https://mapi.trustpay.eu/mapi5/Scripts/TrustPay/popup.js"></script>
		<!--end::Global Stylesheets Bundle-->
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>

<style>
#kt_header_menu_mobile_toggle {
	display: none !important;
}
.pointer {cursor: pointer;}


.savemodal {
    display: none !important;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 999;
    display: flex;
    justify-content: center;
    align-items: center;
}

.savemodal-content {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    width: 20%;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

/* Media query for mobile devices */
@media (max-width: 600px) {
    .savemodal-content {
        width: 80%; /* Adjust the width for smaller screens */
    }
}

</style>

	<div id="kt_header" style="" class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
      <!--begin::Aside mobile toggle-->
      <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
          <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
          <span class="svg-icon svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
              <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
            </svg>
          </span>
          <!--end::Svg Icon-->
        </div>
      </div>
      <!--end::Aside mobile toggle-->
      <!--begin::Mobile logo-->
      <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
        <a href="<?php echo url('/admin');?>" class="d-lg-none">
          <img alt="Logo" src="<?php echo url('/');?>/assets/media/logos/logo-2.svg" class="h-30px" />
        </a>
      </div>
      <!--end::Mobile logo-->
      <!--begin::Wrapper-->
      <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
        <!--begin::Navbar-->
        <div class="d-flex align-items-stretch" id="kt_header_nav">
          <!--begin::Menu wrapper-->
          <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

          </div>
          <!--end::Menu wrapper-->
        </div>
        <!--end::Navbar-->
        <!--begin::Toolbar wrapper-->
				<div class="d-flex align-items-stretch flex-shrink-0">

          <!--begin::User menu-->
          <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
            <!--begin::Menu wrapper-->
						<div class="cursor-pointer symbol symbol-30px symbol-md-40px myavatar" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
								<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
									<div class="symbol-label fs-3 bg-light-danger text-danger">
											  {{strtoupper(substr(Session::get('userName'),0,1))}}</div>
							</div>
							</div>
            <!--begin::User account menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
              <!--begin::Menu item-->
              <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                  <!--begin::Avatar-->
									<div class="cursor-pointer symbol symbol-30px symbol-md-40px myavatar" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
											<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
												<div class="symbol-label fs-3 bg-light-danger text-danger">
													  {{strtoupper(substr(Session::get('userName'),0,1))}}</div>
										</div>
										</div>
                  <!--end::Avatar-->
                  <!--begin::Username-->
                  <div class="d-flex flex-column">
                    <div class="fw-bolder d-flex align-items-center fs-5">{{Session::get('userName')}}</div>
                  </div>
                  <!--end::Username-->
                </div>
              </div>
              <!--end::Menu item-->
              <!--begin::Menu separator-->
              <div class="separator my-2"></div>
              <!--end::Menu separator-->
              <!--begin::Menu item-->
							<div class="menu-item px-5">
								<a href="<?php echo url('/zakaznici');?>" class="menu-link px-5">Zákazníci</a>
							</div>

							<div class="separator my-2"></div>

							<!--begin::Menu item-->
							<div class="menu-item px-5">
								<a href="<?php echo url('/menu');?>" class="menu-link px-5">Nahrať menu</a>
							</div>

							<div class="separator my-2"></div>

							<!--begin::Menu item-->
							<div class="menu-item px-5">
								<a href="<?php echo url('/admins');?>" class="menu-link px-5">Správcovia</a>
							</div>


              <div class="separator my-2"></div>

              <!--begin::Menu item-->
              <div class="menu-item px-5">
                <a href="<?php echo url('/logout');?>" class="menu-link px-5">Odhlásiť sa</a>
              </div>

              <div class="separator my-2"></div>

            </div>
            <!--end::User account menu-->
            <!--end::Menu wrapper-->
          </div>
          <!--end::User menu-->
          <!--begin::Header menu toggle-->
          <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
              <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
              <span class="svg-icon svg-icon-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="black" />
                  <path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="black" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </div>
          </div>
          <!--end::Header menu toggle-->
        </div>
        <!--end::Toolbar wrapper-->
      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Container-->
  </div>

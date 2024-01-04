
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<title>Dobroty od dobrotky</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Dobroty od dobrotky" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Dobroty od dobrotky" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="<?php echo url('/');?>/assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="<?php echo url('/');?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo url('/');?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo url('/');?>/assets/css/style2.css" rel="stylesheet" type="text/css" />

		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div id="page-id24" class="d-flex flex-column flex-root">
			<!--begin::Authentication - Password reset -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(<?php echo url('/');?> /<?php echo url('/');?>/assets/metronic/dist/<?php echo url('/');?>/assets/media/illustrations/sketchy-1/14.png">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->

						<img alt="Logo" src="<?php echo url('/');?>/assets/media/logos/logo-1-dark.png" class="h-125px" />
<br> <br>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" method="post" action="{{ url('/reset_password_without_token') }}">
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Zabudnuté heslo?</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Zadajte Váš email</div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
								<input class="form-control form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="d-flex flex-wrap justify-content-center pb-lg-0">
								<input type="submit" value="Potvrdiť" class="btn btn-lg btn-primary fw-bolder me-4">
								</input>
								<a href="<?php echo url('/');?>" class="btn btn-lg btn-light-primary fw-bolder">Naspäť</a>
							</div>
							<!--end::Actions-->
              <div class="text-center">
                <h5 class="pt-8 text-success" >
                {{ $errors->first('status') }}
								{{ $errors->first('error') }}
              </h5>
							<h5 class="pt-8 text-danger" >
							{{ $errors->first('email') }}
						</h5>
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->

			</div>
			<!--end::Authentication - Password reset-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
    <script>var hostUrl = "<?php echo url('/');?>/assets/";</script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="<?php echo url('/');?>/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo url('/');?>/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="<?php echo url('/');?>/assets/js/custom/authentication/sign-in/general.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="<?php echo url('/');?>/assets/js/custom/authentication/password-reset/password-reset.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>

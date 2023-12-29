@include('header')

<style>
.responsive-iframe {
		 position: relative;
		 width: 100%;
		 padding-top: 56.25%; /* This is for a 16:9 aspect ratio, adjust as needed */
 }

 .responsive-iframe iframe {
		 position: absolute;
		 top: 0;
		 left: 0;
		 width: 100%;
		 height: 100%;
 }
</style>

	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
        @include('navigation')
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div class="mt-lg-n6">
						<div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack">
								<div  class="page-title d-flex flex-column justify-content-center flex-wrap">
							<!--begin::Title-->
							<h1 class="page-heading d-flex text-gray-900 fw-bolder fs-3 flex-column justify-content-center my-0">Menu</h1>
							<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
										<li class="breadcrumb-item text-muted"><a class="text-muted text-hover-primary" href="<?php echo url('/'); ?>">Domov</a></li>

															<li class="breadcrumb-item">
																	<span class="bullet bg-gray-500 w-5px h-2px"></span>
															</li>

										<li class="breadcrumb-item text-muted">Menu</li>
										</ul>
									<!--end::Breadcrumb-->
							</div>
					<!--end::Page title-->
					<!--begin::Actions-->
					<div class="d-flex align-items-center gap-2 gap-lg-3">
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_upload">
						<!--begin::Svg Icon | path: icons/duotune/files/fil018.svg-->
						<span class="svg-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black" />
								<path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z" fill="black" />
								<path opacity="0.3" d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->Nahrať nové menu</button>
					</div>
					<!--end::Actions-->
					</div>
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->

						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Card-->

								<!--end::Card-->
								<!--begin::Card-->
								<div class="card card-flush">
									<!--begin::Card header-->
									<div class="card-header pt-8" style="display:none !important;">

										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<div class="d-flex justify-content-end align-items-center d-none" data-kt-filemanager-table-toolbar="selected">
												<div class="fw-bolder me-5">
												<span class="me-2" data-kt-filemanager-table-select="selected_count"></span>Selected</div>
												<button type="button" class="btn btn-danger" data-kt-filemanager-table-select="delete_selected">Delete Selected</button>
											</div>
											<!--end::Group actions-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body">
										<div class="text-gray-900 fs-2 fw-bolder me-1 mb-2">Aktuálne menu:</div>
										<div class="responsive-iframe">
											<iframe src ="{{ asset('storage/menu.pdf') }}" style="max-width: 1200px; max-height: 1000px;"></iframe>
										</div>
										<table id="kt_file_manager_list" data-kt-filemanager-table="files" style="display: none !important;" class="table align-middle table-row-dashed fs-6 gy-5">
										</table>
										<!--end::Table-->

									</div>
									<!--end::Card body-->
								</div>
								<!--end::Card-->

								<!--begin::Modal - Upload File-->
								<div class="modal fade" id="kt_modal_upload" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Form-->
											<form class="form" method="post" action="none" id="kt_modal_upload_form">
												<!--begin::Modal header-->
												<div class="modal-header">
													<!--begin::Modal title-->
													<h2 class="fw-bolder">Nahrať pdf súbor</h2>
													<!--end::Modal title-->
													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
																<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</div>
													<!--end::Close-->
												</div>
												<!--end::Modal header-->
												<!--begin::Modal body-->
												<div class="modal-body pt-10 pb-15 px-lg-17">
													<!--begin::Input group-->
													<div class="form-group">
														<!--begin::Dropzone-->
														<div class="dropzone dropzone-queue mb-2" id="kt_modal_upload_dropzone">
															<!--begin::Controls-->
															<div class="dropzone-panel mb-4">
																<a class="dropzone-select btn btn-sm btn-primary me-2">Vybrať súbor</a>
																<a class="dropzone-upload btn btn-sm btn-light-primary me-2">Nahrať</a>
																<a class="dropzone-remove-all btn btn-sm btn-light-primary">Zmazať</a>
															</div>
															<!--end::Controls-->
															<!--begin::Items-->
															<div class="dropzone-items wm-200px">
																<div class="dropzone-item p-5" style="display:none">
																	<!--begin::File-->
																	<div class="dropzone-file">
																		<div class="dropzone-filename text-dark" title="some_image_file_name.jpg">
																			<span data-dz-name="">some_image_file_name.jpg</span>
																			<strong>(
																			<span data-dz-size="">340kb</span>)</strong>
																		</div>
																		<div class="dropzone-error mt-0" data-dz-errormessage=""></div>
																	</div>
																	<!--end::File-->
																	<!--begin::Progress-->
																	<div class="dropzone-progress">
																		<div class="progress bg-light-primary">
																			<div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
																		</div>
																	</div>
																	<!--end::Progress-->
																	<!--begin::Toolbar-->
																	<div class="dropzone-toolbar">
																		<span class="dropzone-start">
																			<i class="bi bi-play-fill fs-3"></i>
																		</span>
																		<span class="dropzone-cancel" data-dz-remove="" style="display: none;">
																			<i class="bi bi-x fs-3"></i>
																		</span>
																		<span class="dropzone-delete" data-dz-remove="">
																			<i class="bi bi-x fs-1"></i>
																		</span>
																	</div>
																	<!--end::Toolbar-->
																</div>
															</div>
															<!--end::Items-->
														</div>
														<!--end::Dropzone-->
														<!--begin::Hint-->
														<span class="form-text fs-6 text-muted">Maximálna veľkosť súboru je 1 MB.</span>
														<!--end::Hint-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Modal body-->
												  <input type="hidden" name="_token" value="{{ csrf_token() }}">
											</form>
											<!--end::Form-->
										</div>
									</div>
								</div>
								<!--end::Modal - Upload File-->
								<!--begin::Modal - New Product-->

								<!--end::Modal - Move file-->
								<!--end::Modals-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>

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
		<script src="<?php echo url('/');?>/assets/js/custom/apps/file-manager/list.js"></script>

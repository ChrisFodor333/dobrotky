@include('header')

<style>

.text-green {
  color: green;
}

.text-red {
  color: red;
}

.table > :not(caption) > * > * {
padding: 0rem;
}



</style>

	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div id="page-id1" class="d-flex flex-column flex-root">
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
              <h1 class="page-heading d-flex text-gray-900 fw-bolder fs-3 flex-column justify-content-center my-0">Správcovia</h1>
              <!--end::Title-->
                  <!--begin::Breadcrumb-->
                  <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted"><a class="text-muted text-hover-primary" href="<?php echo url('/'); ?>">Domov</a></li>

                              <li class="breadcrumb-item">
                                  <span class="bullet bg-gray-500 w-5px h-2px"></span>
                              </li>

                    <li class="breadcrumb-item text-muted">Správcovia</li>
                    </ul>
                  <!--end::Breadcrumb-->
              </div>
          <!--end::Page title-->
          <!--begin::Actions-->
          <div class="d-flex align-items-center gap-2 gap-lg-3">
    						<a class="btn btn-primary" href="<?php echo url('/addsuper');?>">Pridať správcu</a>
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
								<!--begin::Card-->
								<div class="card">
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
                        <input type="text" id="myTableSearch" class="form-control form-control-solid w-250px ps-14" placeholder="Hľadať" />
                      </div>
                      <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                  </div>
									<!--end::Card header-->
									<!--begin::Card body-->
                  <div class="card-body pt-0 pb-5">
                      <!--begin::Table-->
                      <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                          <!--begin::Table head-->
                          <thead class="border-bottom border-gray-200 fs-7 mytablecss">
                              <!--begin::Table row-->
                              <tr class="text-center text-muted text-uppercase gs-0">
                                  <th class="min-w-100px text-start">Meno a Priezvisko</th>
                                  <th class="min-w-100px text-start">Email</th>
                                  <th class="min-w-100px text-end">Upraviť</th>
                                  <th class="min-w-100px text-end">Odstrániť</th>

                              </tr>
                              <!--end::Table row-->
                          </thead>
                          <!--end::Table head-->
                          <!--begin::Table body-->
                          <tbody class="fs-6 fw-bold text-gray-600">
                              <!--begin::Table row-->
                              @foreach($admins as $a)
                              <!--begin::Table row-->
                              <tr>


                                  <td class="text-start pe-0">
                                      <span class="mytablecss">{{$a->fname}} {{$a->lname}}</span>
                                  </td>
                                  <!--end::Total=-->
                                  <!--begin::Date Modified=-->
                                  <td class="text-start">
                                      <span class="mytablecss">{{$a->email}}</span>
                                  </td>
                                  <!--end::Date Modified=-->

                                  <td class="text-end">
                                      <a href="<?php echo url('/edit/'.$a->id);?>" class="btn btn-light btn-sm btn-active-light-primary mytablecss">Upraviť</a>
                                  </td>

                                  <td class="text-end">
                                      <a href="<?php echo url('/delete/'.$a->id);?>" class="btn btn-light btn-sm btn-active-light-primary mytablecss">Odstrániť</a>
                                  </td>
                              </tr>
                              <!--end::Table row-->
                              @endforeach

                              <!--end::Table row-->
                          </tbody>
                          <!--end::Table body-->
                      </table>
                      <!--end::Table-->
                  </div>
									<!--end::Card body-->
								</div>
								<!--end::Card-->
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
    @if(session('showErrorModal'))
    <div class="savemodal" style="display: flex !important;" id="errorModal">
       <div class="savemodal-content">
         <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;">
              <span class="swal2-x-mark">
                  <span class="swal2-x-mark-line-left"></span>
                  <span class="swal2-x-mark-line-right"></span>
              </span>
          </div>
          <div class="swal2-html-container mt-8" id="swal2-html-container" style="display: block;">Nemôžete vymazať seba!</div>
          <button type="button" onclick="hidemodal()" class="btn btn-light btn-sm btn-light-primary mt-2">Chápem!</button>
       </div>
    </div>
    @endif
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

<script type="text/javascript">

var table = $("#kt_table_customers_payment").DataTable({
  "language": {
  		"lengthMenu": "Show _MENU_",
      search: "Hľadať:",
      info:"_END_ z _TOTAL_ záznamov",
      lengthMenu:     "Ukázať záznamov: _MENU_",
      infoEmpty:      "0 z 0 záznamov",
      infoFiltered:   "(filtrované z _MAX_ záznamov)",
      zeroRecords:    "Žiadne záznamy",
      paginate: {
          next:       "Ďalšie",
          previous:   "Prechádzajúce",
      }
  	},
    "order": [0, 'asc' ],
    "ordering": true,
    "searching": true,
    "lengthChange": false,
});

$('#myTableSearch').on('keyup', function () {
           table.search(this.value).draw();
       });


$('.dataTables_filter').css('display', 'none');

</script>

<script type="text/javascript">
function hidemodal() {
    const successModal = document.getElementById("errorModal");
    successModal.setAttribute('style', 'display:none !important');
}
</script>

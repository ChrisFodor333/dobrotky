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
              <h1 class="page-heading d-flex text-gray-900 fw-bolder fs-3 flex-column justify-content-center my-0">Program zákazníka</h1>
              <!--end::Title-->
                  <!--begin::Breadcrumb-->
                  <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted"><a class="text-muted text-hover-primary" href="<?php echo url('/'); ?>">Domov</a></li>

                              <li class="breadcrumb-item">
                                  <span class="bullet bg-gray-500 w-5px h-2px"></span>
                              </li>

                    <li class="breadcrumb-item text-muted">Program zákazníka</li>
                    </ul>
                  <!--end::Breadcrumb-->
              </div>
          <!--end::Page title-->
          <!--begin::Actions-->

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
                  <div class="card-header pt-7" id="kt_chat_contacts_header">
                    <!--begin::Card title-->
                    <div class="card-title">
                      <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                      <span class="svg-icon svg-icon-1 me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="black" />
                          <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="black" />
                        </svg>
                      </span>
                      <!--end::Svg Icon-->
                      <h2>Aktivovať program zákazníkovi {{$customer->fname }} {{$customer->lname}}</h2>
                    </div>
                    <!--end::Card title-->
                  </div>
									<!--end::Card header-->
									<!--begin::Card body-->
                  <div class="card-body pt-0 pb-5">
                      <!--begin::Table-->
                      <form class="form" id="myForm" method="post" novalidate="novalidate" action="<?php echo url('/programadded'); ?>">
                  <!--end::Top-->
                  <!--begin::Separator-->
                  <div class="separator separator-dashed my-10 myseparator"></div>
                  <!--end::Separator-->
                  <!--begin::Wrapper-->
                  <div class="mb-0">
                    <!--begin::Row-->

                    <div class="row gx-10 mb-5">
                      <div class="col-lg-6">
                        <div class="mb-5">
                          <label class="d-flex align-items-center fs-5 fw-bold mb-2">Program</label>
                          <select name="program" aria-label="Výber programu" data-placeholder="Výber programu..." class="form-select form-select-solid fw-bold">
                            <option value="4 týždňový redukčný program">4 týždňový redukčný program</option>
                            <option value="4 týždňový program - zdravý životný štýl">4 týždňový program - zdravý životný štýl</option>
                            <option value="2 týždňový redukčný program">2 týždňový redukčný program</option>
                            <option value="2 týždňový program - zdravý životný štýl">2 týždňový program - zdravý životný štýl</option>
                          </select>
                        </div>
                      </div>


                      <div class="col-lg-6">
                        <div class="mb-5">
                          <label class="d-flex align-items-center fs-5 fw-bold mb-2">Expirácia
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Vypĺňať iba v prípade ak je to potrebné. V opačnom prípade expirácia sa nastaví automaticky od dnešného dňa." aria-label="Vypĺňať iba v prípade ak je to potrebné. V opačnom prípade expirácia sa nastaví automaticky od dnešného dňa."></i>
                          </label>
                          <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control form-control-solid" placeholder="" name="expiration"  />
                        </div>
                      </div>
                    </div>

                      </div>
                    <div class="mb-0">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="id" value="{{ $customer->id }}">
                          <button type="submit" id="stepper2" class="btn btn-lg btn-primary" style="float:right !important;">Odoslať</button>
                      <br> <br> <br>
                    </div>
                      <!--end::Table-->
                    </form>

                  </div>


									<!--end::Card body-->
								</div>

                <div class="card mt-10">
                  <div class="card-body pt-0 pb-5">
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                      <!--begin::Card title-->
                      <div class="card-title">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                        <span class="svg-icon svg-icon-1 me-2">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="black" />
                            <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <h2>História programov zákazníka</h2>
                      </div>
                      <!--end::Card title-->
                    </div>
                    <div class="card-body pt-0 pb-5">
                      <table class="table align-middle table-row-dashed gy-5"
                                                  id="kt_table_customers_payment">
                                                  <!--begin::Table head-->
                                                  <thead class="border-bottom border-gray-200 fs-7 mytablecss">
                                                      <!--begin::Table row-->
                                                      <tr class="text-center text-muted text-uppercase gs-0">
                                                          <th class="min-w-100px text-start">Program</th>
                                                          <th class="min-w-100px text-end">Expirácia</th>
                                                      </tr>
                                                      <!--end::Table row-->
                                                  </thead>
                                                  <!--end::Table head-->
                                                  <!--begin::Table body-->
                                                  <tbody class="fs-6 fw-bold text-gray-600">
                                                      @foreach($program as $p)
                                                      <tr>
                                                          <td class="text-start pe-0">
                                                              <span class="mytablecss">{{$p->program}}</span>
                                                          </td>
                                                          <!--end::Total=-->
                                                          <!--begin::Date Modified=-->
                                                          <td class="text-end">
                                                              <span class="mytablecss">{{ date("d/m/Y", strtotime($p->expiration));  }}</span>
                                                          </td>
                                                      </tr>
                                                      @endforeach
                                                  </tbody>
                                              </table>
                    </div>
                  </div>
                  </div>

								<!--end::Card-->
							</div>
							<!--end::Container-->
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
                        <div class="swal2-html-container mt-8" id="swal2-html-container" style="display: block;">Zákazník s týmto emailom už existuje!</div>
                        <button type="button" onclick="hidemodal()" class="btn btn-light btn-sm btn-light-primary mt-2">Chápem!</button>
                     </div>
                 </div>
                 @endif
                <div class="savemodal" id="successModal">
   											 <div class="savemodal-content">
   												 <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
   													 <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
   													 <div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
   													 <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
   												 </div>
   													<div class="swal2-html-container mt-8" id="swal2-html-container" style="display: block;">Zákazníkovi sa priraďuje balík!</div>
   											 </div>
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

@include('footer')

<script type="text/javascript">
function hidemodal() {
    const successModal = document.getElementById("errorModal");
    successModal.setAttribute('style', 'display:none !important');
}
</script>


<script type="text/javascript">
document.getElementById("myForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const successModal = document.getElementById("successModal");
    successModal.setAttribute('style', 'display:flex !important');

    // Automatically close the modal after a few seconds (adjust as needed)
    setTimeout(function () {
        successModal.style.display = "none";
        document.getElementById("myForm").submit();
    }, 1500); // 3 seconds
});

</script>

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
    "info": false,
  });
</script>

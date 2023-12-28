@include('header')

<style>

.text-green {
  color: green;
}

.text-red {
  color: red;
}

.text-red2 {
  margin-top: 0.5rem !important;
  font-size: 0.925rem !important;
  color: #f1416c !important;
  font-weight: 400 !important;
}

</style>

	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div id="page-id10" class="d-flex flex-column flex-root">
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
              <h1 class="page-heading d-flex text-gray-900 fw-bolder fs-3 flex-column justify-content-center my-0">Nový správca</h1>
              <!--end::Title-->
                  <!--begin::Breadcrumb-->
                  <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted"><a class="text-muted text-hover-primary" href="<?php echo url('/'); ?>">Domov</a></li>

                              <li class="breadcrumb-item">
                                  <span class="bullet bg-gray-500 w-5px h-2px"></span>
                              </li>

                    <li class="breadcrumb-item text-muted">Nový správca</li>
                    </ul>
                  <!--end::Breadcrumb-->
              </div>
          <!--end::Page title-->
          <!--begin::Actions-->
          <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--
            <a href="#" class="btn btn-sm fw-bold btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>
          -->
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

									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body py-4">
										<!--begin::Table-->

                    <form class="form" id="myForm" autocomplete="off" method="post" novalidate="novalidate" action="<?php echo url('/addsuper'); ?>">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column align-items-start flex-xxl-row">
                      <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4">
                        <h5 class="text-green" style="margin-left: 10px;">{{ $errors->first('status') }}</h5>  <br>

                      </div>
                    </div>
                    <div class="d-flex flex-column align-items-start flex-xxl-row">
                      <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4">
                        <span class="fs-2x fw-bolder text-gray-800">Pridať nového správcu</span>
                      </div>
                    </div>
                    <!--end::Top-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-10"></div>
                    <!--end::Separator-->
                    <!--begin::Wrapper-->
                    <div class="mb-0">
                      <!--begin::Row-->
                      <div class="row gx-10 mb-5">
                        <!--begin::Col-->
                        <div class="col-lg-6">

                          <!--begin::Input group-->
                          <div class="mb-5">
                            <input type="text" class="form-control form-control-solid" placeholder="Meno" name="fname" value="" />
                          </div>
                          <!--end::Input group-->
                          <!--begin::Input group-->
                          <div class="mb-5">
                            <input type="text" class="form-control form-control-solid" placeholder="Priezvisko" name="lname" value="" />
                          </div>
                          <!--end::Input group-->
                          <!--begin::Input group-->

                          <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-6">

                          <div class="mb-5">
                            <input type="email" class="form-control form-control-solid" id="emailaddress" placeholder="Email" name="email" value="" />
                            <h6 class="text-red2 mt-3" id="emailError"></h6>
                          </div>

                          <div class="mb-5">
                            <input type="password" autocomplete="new-password" class="form-control form-control-solid" placeholder="Heslo" name="password" value="" />
                            <h5 class="text-red" style="margin-top: 10px;">{{ $errors->first('email') }}</h5>  <br>
                          </div>
                          <!--end::Input group-->
                          <!--begin::Input group-->

                        </div>
                        <!--end::Col-->
                      </div>


                      <div class="mb-0">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <button type="submit" id="stepper" class="btn btn-lg btn-primary" style="float:right !important;">Odoslať</button>
                      </div>
                      <!--end::Notes-->
                    </div>
                    <!--end::Wrapper-->
                    </form>
                    <div class="savemodal" id="successModal">
                       <div class="savemodal-content">
                         <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                           <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                           <div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                           <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                         </div>
                          <div class="swal2-html-container mt-8" id="swal2-html-container" style="display: block;">Údaje boli aktualizované</div>
                       </div>
                   </div>
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

var emailInput = document.getElementById('emailaddress');
var stepper = document.getElementById('stepper');
emailInput.addEventListener('input', function() {
    // Call your JavaScript function here
    emailCheck(emailInput.value);
});

emailInput.addEventListener('blur', function() {
    // Call your JavaScript function here
    emailCheck(emailInput.value);
});

function emailCheck(email) {
  $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


      $.ajax({
                    url: 'https://app.leadix.sk/emailchecksuper/{id}',
                    type: 'POST',
                    data: { email: email },
                    success: function(response)
                    {
                      var myJson = $.parseJSON(response);
                      console.log(myJson);
                      if(myJson != 0) {
                        document.getElementById("emailError").innerHTML = "Email už existuje v databáze";
                        stepper.disabled = true;
                      } else {
                          document.getElementById("emailError").innerHTML = "";
                          stepper.disabled = false;
                      }
                    }
                });
}
</script>

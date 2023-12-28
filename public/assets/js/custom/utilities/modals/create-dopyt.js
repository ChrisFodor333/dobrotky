"use strict";
var KTCreateApp = (function () {
    var e,
        t,
        o,
        r,
        a,
        i,
        n = [];
    return {
        init: function () {
            (e = document.querySelector("#kt_modal_create_dopyt")) &&
                (new bootstrap.Modal(e),
                (t = document.querySelector("#kt_modal_create_dopyt_stepper")),
                (o = document.querySelector("#kt_modal_create_dopyt_form")),
                (r = t.querySelector('[data-kt-stepper-action="submit"]')),
                (a = t.querySelector('[data-kt-stepper-action="next"]')),
                (i = new KTStepper(t)).on("kt.stepper.changed", function (e) {
                    4 === i.getCurrentStepIndex()
                        ? (r.classList.remove("d-none"), r.classList.add("d-inline-block"), a.classList.add("d-none"))
                        : 5 === i.getCurrentStepIndex()
                        ? (r.classList.add("d-none"), a.classList.add("d-none"))
                        : (r.classList.remove("d-inline-block"), r.classList.remove("d-none"), a.classList.remove("d-none"));
                }),
                i.on("kt.stepper.next", function (e) {
                    console.log("stepper.next");
                    var t = n[e.getCurrentStepIndex() - 1];
                    t
                        ? t.validate().then(function (t) {
                              console.log("validated!"),
                                  "Valid" == t
                                      ? e.goNext()
                                      : Swal.fire({
                                            text: "Ľutujeme, zdá sa, že boli zistené nejaké chyby, skúste to znova.",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "OK, mám to!",
                                            customClass: { confirmButton: "btn btn-light" },
                                        }).then(function () {});
                          })
                        : (e.goNext(), KTUtil.scrollTop());
                }),
                i.on("kt.stepper.previous", function (e) {
                    console.log("stepper.previous"), e.goPrevious(), KTUtil.scrollTop();
                }),
                r.addEventListener("click", function (e) {
                    n[3].validate().then(function (t) {
                        console.log("validated!"),
                            "Valid" == t
                                ? (e.preventDefault(),
                                  (r.disabled = !0),
                                  r.setAttribute("data-kt-indicator", "on"),
                                  setTimeout(function () {
                                      //r.removeAttribute("data-kt-indicator"), (r.disabled = !1), i.goNext();
                                      //submit form
                                      o.submit();

                                  }, 2e3))
                                : Swal.fire({
                                      text: "Ľutujeme, zdá sa, že boli zistené nejaké chyby, skúste to znova.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "OK, mám to!",
                                      customClass: { confirmButton: "btn btn-light" },
                                  }).then(function () {
                                      KTUtil.scrollTop();
                                  });
                    });
                }),
                $(o.querySelector('[name="card_expiry_month"]')).on("change", function () {
                    n[3].revalidateField("card_expiry_month");
                }),
                $(o.querySelector('[name="card_expiry_year"]')).on("change", function () {
                    n[3].revalidateField("card_expiry_year");
                }),
                n.push(
                    FormValidation.formValidation(o, {


                        fields: {

                        sluzba: { validators: { notEmpty: { message: "Je potrebné vybrať aspoň jednu poskytnutú sľužbu" } } },



                           },


                        plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                    })
                ),
                n.push(
                    FormValidation.formValidation(o, {


                        fields: {

                          rozpocet: {
                            validators: { notEmpty: { message: "Rozpočet je povinný" } }
                          },
                        },


                        plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                    })
                ),
                n.push(
                    FormValidation.formValidation(o, {
                        fields: {

                          poznamka: {
                            validators:   { notEmpty: { message: "Informácií o projekte je povinné" } }
                              },



                          },
                        plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                    })
                ),
                n.push(
                    FormValidation.formValidation(o, {
                        fields: {

                          fname: {
                            validators:   { notEmpty: { message: "Meno je povinné" } }
                              },

                          lname: {
                            validators:   { notEmpty: { message: "Priezvisko je povinné" } }
                              },

                          email: {
                            validators:   {

                              notEmpty: { message: "Email je povinné" },
                              emailAddress: {
                                  message: "Zadajte platnú e-mailovú adresu"
                              }

                            }
                              },


                              mobil: {
                                validators:   {
                                  phone: {
                                    country: "SK",
                                    message: "Tel. číslo má nesprávny formát"
                                  }

                                }
                                  },


                          },
                        plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                    })
                ));
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTCreateApp.init();
});

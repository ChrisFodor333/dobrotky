"use strict";
const strongPassword = function () {
    return {
        validate: function (input) {
            const value = input.value;
            if (value === '') {
                return {
                    valid: true,
                };
            }

            // Check the password strength
            if (value.length < 8) {
                return {
                    valid: false,
                };
            }

            // The password does not contain any uppercase character
            if (value === value.toLowerCase()) {
                return {
                    valid: false,
                };
            }

            // The password does not contain any uppercase character
            if (value === value.toUpperCase()) {
                return {
                    valid: false,
                };
            }

            // The password does not contain any digit
            if (value.search(/[0-9]/) < 0) {
                return {
                    valid: false,
                };
            }

            return {
                valid: true,
            };
        },
    };
};
FormValidation.validators.checkPassword = strongPassword;
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
            (e = document.querySelector("#kt_modal_create_app")) &&
                (new bootstrap.Modal(e),
                (t = document.querySelector("#kt_modal_create_app_stepper")),
                (o = document.querySelector("#kt_modal_create_app_form")),
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
                                      r.removeAttribute("data-kt-indicator"), (r.disabled = !1), i.goNext();
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

                          fname:
                          { validators:
                            { notEmpty:
                              { message: "Meno je povinné" }
                            }
                          },

                          lname:
                          { validators:
                            { notEmpty:
                              { message: "Priezvisko je povinné" }
                             }
                           },

                           mobil:
                           { validators:
                             { notEmpty:
                               { message: "Tel. číslo je povinné" }
                              }
                            },

                            title:
                            { validators:
                              { notEmpty:
                                { message: "Názov firmy je povinný" }
                               }
                             },

                             city:
                             { validators:
                               { notEmpty:
                                 { message: "Mesto je povinné" }
                                }
                              },

                            psc: {
                            validators: {
                              notEmpty: {
                                message: "PSČ je povinné",
                              },
                              regexp: {
                                regexp: /^\d{5}$/,
                                message: "PSČ musí mať 5 číslic",
                              },
                            },
                          },


                               street:
                               { validators:
                                 { notEmpty:
                                   { message: "Ulica je povinná" }
                                  }
                                },


                                ico: {
                                validators: {
                                  notEmpty: {
                                    message: "IČO je povinné",
                                  },
                                  regexp: {
                                    regexp: /^\d{8}$/,
                                    message: "IČO musí mať 8 číslic",
                                  },
                                },
                              },

                              dic: {
                               validators: {
                                 regexp: {
                                   regexp: /^(?:\d{10})?$/,
                                   message: "DIČ musí byť buď prázdne alebo obsahovat presne 10 číslic",
                                 },
                               },
                             },

                             icdph: {
                              validators: {
                                regexp: {
                                  regexp: /^$|^.{12}$/,
                                  message: "DIČ musí byť buď prázdne alebo obsahovat presne 12 číslic",
                                },
                              },
                            },



                           },
                        plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                    })
                ),
                n.push(
                    FormValidation.formValidation(o, {
                        fields: {

                          email: {
                            validators: {
                              notEmpty: {
                                message: "Email je povinný" }
                              },

                              emailAddress: {
                                  message: "Zadajte platnú e-mailovú adresu"
                                }
                          },

                          password: {
                            validators: { notEmpty: { message: "Heslo je povinné" } }
                          },

                          confirmpassword: {
                            validators: {
                              notEmpty: { message: "Opakovanie hesla je povinné" },
                              identical: {
                      compare: function () {
                          return o.querySelector('[name="password"]').value;
                      },
                      message: 'Heslá nie sú rovnaké'
                  },

                  checkPassword: {
                            message: 'Heslo je príliš slabé'
                        },
                            }
                          }


                        },
                        plugins: {
                           trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" })

                         },
                    })
                ),
                n.push(
                    FormValidation.formValidation(o, {
                        fields: {
                          /*
                          dbname: {
                            validators:   { notEmpty: { message: "Database name is required" } }
                              },

                         dbengine: {
                            validators: { notEmpty: { message: "Database engine is required" } }
                             }
                             */
                          },
                        plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                    })
                ),
                n.push(
                    FormValidation.formValidation(o, {
                        fields: {
                            sluzba: { validators: { notEmpty: { message: "Je potrebné vybrať aspoň jednu poskytnutú sľužbu" } } },
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

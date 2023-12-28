"use strict";
var KTAppEcommerceSalesListing = (function () {
    var e,
        t,
        n,
        r,
        o,
        a = (e, n, a) => {
            (r = e[0] ? new Date(e[0]) : null),
                (o = e[1] ? new Date(e[1]) : null),
                $.fn.dataTable.ext.search.push(function (e, t, n) {
                    var a = r,
                        c = o,
                        l = new Date(moment($(t[5]).text(), "DD/MM/YYYY")),
                        u = new Date(moment($(t[5]).text(), "DD/MM/YYYY"));
                    return (null === a && null === c) || (null === a && c >= u) || (a <= l && null === c) || (a <= l && c >= u);
                }),
                t.draw();
        },
        c = () => {
            e.querySelectorAll('[data-kt-ecommerce-order-filter="delete_row"]').forEach((e) => {
                e.addEventListener("click", function (e) {
                    e.preventDefault();
                    const n = e.target.closest("tr"),
                        r = n.querySelector('[data-kt-ecommerce-order-filter="order_id"]').innerText;
                    Swal.fire({
                        text: "Naozaj chcete deaktivovať firmu " + r + "?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Áno, deaktivovať!",
                        cancelButtonText: "Nie, zrušiť!",
                        customClass: { confirmButton: "btn fw-bold btn-danger", cancelButton: "btn fw-bold btn-active-light-primary" },
                    }).then(function (e) {
                        e.value
                            ? Swal.fire({ text: "Deaktivovali ste firmu " + r + "!.", icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, chápem!", customClass: { confirmButton: "btn fw-bold btn-primary" } }).then(function () {
                                 //t.row($(n)).remove().draw();
                                 var arr = [];
                                  $("#kt_ecommerce_sales_table tr").each(function(){
                                      arr.push($(this).find("td:first").text()); //put elements into array
                                  });

                                 var myn = parseInt(n["_DT_RowIndex"])+1;
                                 var id = arr[myn].trim();

                                 $.get('https://app.leadix.sk/superuser/deactivate/'+id, function(data) {
                                  location.reload();
                                 });
                              })
                            : "cancel" === e.dismiss && Swal.fire({ text: r + " nebola deaktivovaná.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, chápem!", customClass: { confirmButton: "btn fw-bold btn-primary" } });
                    });
                });
            });

            e.querySelectorAll('[data-kt-ecommerce-order-filter="activate"]').forEach((e) => {
                e.addEventListener("click", function (e) {
                    e.preventDefault();
                    const n = e.target.closest("tr"),
                        r = n.querySelector('[data-kt-ecommerce-order-filter="order_id"]').innerText;
                    Swal.fire({
                        text: "Naozaj chcete aktivovať firmu " + r + "?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Áno, aktivovať!",
                        cancelButtonText: "Nie, zrušiť!",
                        customClass: { confirmButton: "btn fw-bold btn-success", cancelButton: "btn fw-bold btn-active-light-primary" },
                    }).then(function (e) {
                        e.value
                            ? Swal.fire({ text: "Aktivovali ste firmu " + r + "!.", icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, chápem!", customClass: { confirmButton: "btn fw-bold btn-primary" } }).then(function () {
                                 //t.row($(n)).remove().draw();
                                 var arr = [];
                                  $("#kt_ecommerce_sales_table tr").each(function(){
                                      arr.push($(this).find("td:first").text()); //put elements into array
                                  });

                                 var myn = parseInt(n["_DT_RowIndex"])+1;
                                 var id = arr[myn].trim();

                                 $.get('https://app.leadix.sk/superuser/superuser/activate/'+id, function(data) {
                                  location.reload();
                                 });
                              })
                            : "cancel" === e.dismiss && Swal.fire({ text: r + " nebola aktivovaná.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, chápem!", customClass: { confirmButton: "btn fw-bold btn-primary" } });
                    });
                });
            });

        };
    return {
        init: function () {
            (e = document.querySelector("#kt_ecommerce_sales_table")) &&
                ((t = $(e).DataTable({
                    info: !1,
                    order: [],
                    searching: true,
                    lengthChange: false,
                    language: {
                      // Your language options go here
                      search: "Hľadať:",
                      info:"_END_ z _TOTAL_ záznamov",
                      lengthMenu:     "",
                      infoEmpty:      "0 z 0 záznamov",
                      infoFiltered:   "(filtrované z _MAX_ záznamov)",
                      zeroRecords:    "Žiadne záznamy",
                      paginate: {
                          next:       "Ďalšie",
                          previous:   "Prechádzajúce",
                      }
                  },
                    ordering: false,
                    pageLength: 10,
                    columnDefs: [
                        { orderable: !1, targets: 0 },
                        { orderable: !1, targets: 7 },
                    ],
                })).on("draw", function () {
                    c();
                }),
                (() => {
                    const e = document.querySelector("#kt_ecommerce_sales_flatpickr");
                    n = $(e).flatpickr({
                        altInput: !0,
                        altFormat: "d/m/Y",
                        dateFormat: "Y-m-d",
                        mode: "range",
                        onChange: function (e, t, n) {
                            a(e, t, n);
                        },
                    });
                })(),
                document.querySelector('[data-kt-ecommerce-order-filter="search"]').addEventListener("keyup", function (e) {
                    t.search(e.target.value).draw();
                }),
                (() => {
                    const e = document.querySelector('[data-kt-ecommerce-order-filter="status"]');
                    $(e).on("change", (e) => {
                        let n = e.target.value;
                        "all" === n && (n = ""), t.column(3).search(n).draw();
                    });
                })(),
                c(),
                document.querySelector("#kt_ecommerce_sales_flatpickr_clear").addEventListener("click", (e) => {
                    n.clear();
                }));
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSalesListing.init();
});

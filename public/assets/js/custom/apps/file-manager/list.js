"use strict";
var KTFileManagerList = (function () {
    var e, t, o, n, r, a;
    const l = () => {
        },
        i = () => {
        },
        s = () => {
            const e = document.querySelector('[data-kt-filemanager-table-toolbar="base"]'),
                o = document.querySelector('[data-kt-filemanager-table-toolbar="selected"]'),
                n = document.querySelector('[data-kt-filemanager-table-select="selected_count"]'),
                r = t.querySelectorAll('tbody [type="checkbox"]');
            let a = !1,
                l = 0;
            r.forEach((e) => {
                e.checked && ((a = !0), l++);
            }),
                a ? ((n.innerHTML = l), e.classList.add("d-none"), o.classList.remove("d-none")) : (e.classList.remove("d-none"), o.classList.add("d-none"));
        },
        d = () => {
            t.querySelectorAll('[data-kt-filemanager-table="rename"]').forEach((e) => {
                e.addEventListener("click", u);
            });
        },
        u = (o) => {
            let r;
            if ((o.preventDefault(), t.querySelectorAll("#kt_file_manager_rename_input").length > 0))
                return void Swal.fire({
                    text: "Unsaved input detected. Please save or cancel the current item",
                    icon: "warning",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: { confirmButton: "btn fw-bold btn-danger" },
                });
            const a = o.target.closest("tr"),
                l = a.querySelectorAll("td")[1],
                i = l.querySelector(".svg-icon");
            r = l.innerText;
            const s = n.cloneNode(!0);
            (s.querySelector("#kt_file_manager_rename_folder_icon").innerHTML = i.outerHTML), (l.innerHTML = s.innerHTML), (a.querySelector("#kt_file_manager_rename_input").value = r);
            var c = FormValidation.formValidation(l, {
                fields: { rename_folder_name: { validators: { notEmpty: { message: "Name is required" } } } },
                plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
            });
            document.querySelector("#kt_file_manager_rename_folder").addEventListener("click", (t) => {
                t.preventDefault(),
                    c &&
                        c.validate().then(function (t) {
                            console.log("validated!"),
                                "Valid" == t &&
                                    Swal.fire({
                                        text: "Are you sure you want to rename " + r + "?",
                                        icon: "warning",
                                        showCancelButton: !0,
                                        buttonsStyling: !1,
                                        confirmButtonText: "Yes, rename it!",
                                        cancelButtonText: "No, cancel",
                                        customClass: { confirmButton: "btn fw-bold btn-danger", cancelButton: "btn fw-bold btn-active-light-primary" },
                                    }).then(function (t) {
                                        t.value
                                            ? Swal.fire({ text: "You have renamed " + r + "!.", icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn fw-bold btn-primary" } }).then(
                                                  function () {
                                                      const t = document.querySelector("#kt_file_manager_rename_input").value,
                                                          o = `<div class="d-flex align-items-center">\n                                        ${i.outerHTML}\n                                        <a href="?page=apps/file-manager/files/" class="text-gray-800 text-hover-primary">${t}</a>\n                                    </div>`;
                                                      e.cell($(l)).data(o).draw();
                                                  }
                                              )
                                            : "cancel" === t.dismiss &&
                                              Swal.fire({ text: r + " was not renamed.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn fw-bold btn-primary" } });
                                    });
                        });
            });
            const d = document.querySelector("#kt_file_manager_rename_folder_cancel");
            d.addEventListener("click", (t) => {
                t.preventDefault(),
                    d.setAttribute("data-kt-indicator", "on"),
                    setTimeout(function () {
                        const t = `<div class="d-flex align-items-center">\n                    ${i.outerHTML}\n                    <a href="?page=apps/file-manager/files/" class="text-gray-800 text-hover-primary">${r}</a>\n                </div>`;
                        d.removeAttribute("data-kt-indicator"),
                            e.cell($(l)).data(t).draw(),
                            (toastr.options = {
                                closeButton: !0,
                                debug: !1,
                                newestOnTop: !1,
                                progressBar: !1,
                                positionClass: "toastr-top-right",
                                preventDuplicates: !1,
                                showDuration: "300",
                                hideDuration: "1000",
                                timeOut: "5000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                            }),
                            toastr.error("Cancelled rename function");
                    }, 1e3);
            });
        },
        m = () => {
            t.querySelectorAll('[data-kt-filemanger-table="copy_link"]').forEach((e) => {
                const t = e.querySelector("button"),
                    o = e.querySelector('[data-kt-filemanger-table="copy_link_generator"]'),
                    n = e.querySelector('[data-kt-filemanger-table="copy_link_result"]'),
                    r = e.querySelector("input");
                t.addEventListener("click", (e) => {
                    var t;
                    e.preventDefault(),
                        o.classList.remove("d-none"),
                        n.classList.add("d-none"),
                        clearTimeout(t),
                        (t = setTimeout(() => {
                            o.classList.add("d-none"), n.classList.remove("d-none"), r.select();
                        }, 2e3));
                });
            });
        },
        f = () => {
            //document.getElementById("kt_file_manager_items_counter").innerText = e.rows().count() + " items";
        };
    return {
        init: function () {
            (t = document.querySelector("#kt_file_manager_list")) &&
                ((o = document.querySelector('[data-kt-filemanager-template="upload"]')),
                (n = document.querySelector('[data-kt-filemanager-template="rename"]')),
                (r = document.querySelector('[data-kt-filemanager-template="action"]')),
                (a = document.querySelector('[data-kt-filemanager-template="checkbox"]')),
                (() => {
                    t.querySelectorAll("tbody tr").forEach((e) => {
                        const t = e.querySelectorAll("td")[3],
                            o = moment(t.innerHTML, "DD MMM YYYY, LT").format();
                        t.setAttribute("data-order", o);
                    });
                    const o = {
                            info: !1,
                            order: [],
                            scrollY: "700px",
                            scrollCollapse: !0,
                            paging: !1,
                            ordering: !1,
                            columns: [{ data: "checkbox" }, { data: "name" }, { data: "size" }, { data: "date" }, { data: "action" }],
                            language: {
                                emptyTable: `<div class="d-flex flex-column flex-center">\n                    <img src="${hostUrl}media/illustrations/sketchy-1/5.png" class="mw-400px" />\n                    <div class="fs-1 fw-bolder text-dark">No items found.</div>\n                    <div class="fs-6">Start creating new folders or uploading a new file!</div>\n                </div>`,
                            },
                        },
                        n = {
                            info: !1,
                            order: [],
                            pageLength: 10,
                            lengthChange: !1,
                            ordering: !1,
                            columns: [{ data: "checkbox" }, { data: "name" }, { data: "size" }, { data: "date" }, { data: "action" }],
                            language: {
                                emptyTable: `<div class="d-flex flex-column flex-center">\n                    <img src="${hostUrl}media/illustrations/sketchy-1/5.png" class="mw-400px" />\n                    <div class="fs-1 fw-bolder text-dark mb-4">No items found.</div>\n                    <div class="fs-6">Start creating new folders or uploading a new file!</div>\n                </div>`,
                            },
                            conditionalPaging: !0,
                        };
                    var r;
                    (r = "folders" === t.getAttribute("data-kt-filemanager-table") ? o : n),
                        (e = $(t).DataTable(r)).on("draw", function () {
                            i(), l(), s(), c(), KTMenu.createInstances(), m(), f(), d();
                        });
                })(),
                i(),
                l(),
                (() => {
                    const e = "#kt_modal_upload_dropzone",
                        t = document.querySelector(e);
                    var o = t.querySelector(".dropzone-item");
                    o.id = "";
                    var n = o.parentNode.innerHTML;
                    o.parentNode.removeChild(o);
                    var r = new Dropzone(e, {
                        url: "/addmenu",
                        parallelUploads: 1,
                        previewTemplate: n,
                        maxFilesize: 1,
                        autoProcessQueue: !1,
                        autoQueue: !1,
                        previewsContainer: e + " .dropzone-items",
                        clickable: e + " .dropzone-select",
                        acceptedFiles: 'application/pdf',
                    });
                    r.on("error", function (file, errorMessage, xhr) {
                    if (xhr) {
                        // Custom error message based on server response
                        console.error("Server Error:", xhr);
                        // Display your custom error message here
                    } else {
                        // Default error message for file size exceeded
                            t.querySelector(".dropzone-error").style.display = "inline-block";
                            t.querySelector(".dropzone-error").innerHTML = "Súbor má väčšiu veľkosť ako max. 1 MB";
                    }
                });
                    r.on("addedfile", function (o) {
                        (o.previewElement.querySelector(e + " .dropzone-start").onclick = function () {
                            const e = o.previewElement.querySelector(".progress-bar");
                            e.style.opacity = "1";
                            var t = 1,
                                n = setInterval(function () {
                                    t >= 100 ? (r.emit("success", o), r.emit("complete", o), clearInterval(n)) : (t++, (e.style.width = t + "%"));
                                }, 20);
                        }),
                            t.querySelectorAll(".dropzone-item").forEach((e) => {
                                e.style.display = "";
                            }),
                            (t.querySelector(".dropzone-upload").style.display = "inline-block"),
                            (t.querySelector(".dropzone-select").style.display = "none"),
                            (t.querySelector(".dropzone-remove-all").style.display = "inline-block");

                    }),
                        r.on("complete", function (e) {
                            const o = t.querySelectorAll(".dz-complete");
                            setTimeout(function () {
                                o.forEach((e) => {
                                    (e.querySelector(".progress-bar").style.opacity = "0"), (e.querySelector(".progress").style.opacity = "0"), (e.querySelector(".dropzone-start").style.opacity = "0");
                                });
                            }, 300);
                        }),
                        t.querySelector(".dropzone-upload").addEventListener("click", function () {
                          r.files.forEach((file) => {
                           const progressBar = file.previewElement.querySelector(".progress-bar");
                           progressBar.style.opacity = "1";

                           // Extract relevant information from the Dropzone file object
                           const formData = new FormData();
                           formData.append('file', file);



                           let progress = 1;
                           const interval = setInterval(function () {
                               if (progress >= 100) {
                                   r.emit("success", file);
                                   r.emit("complete", file);
                                   clearInterval(interval);
                                   $.ajax({
                                       url: 'https://dobroty.physcatch.sk/addmenu',
                                       type: 'POST',
                                       data: formData,
                                       processData: false,  // Don't process the data (already FormData)
                                       contentType: false,  // Don't set content type (browser will set it)
                                       headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                       },
                                       success: function(response) {
                                           // Handle the response
                                           console.log(response);
                                           if (response.redirect_url) {
                                                // Redirect to the specified URL
                                                window.location.href = response.redirect_url;
                                            }
                                       },
                                       error: function(error) {
                                           // Handle errors
                                           console.error(error);
                                       }
                                   });
                               } else {
                                   progress++;
                                   progressBar.style.width = progress + "%";
                               }
                           }, 20);
                       });
                        }),
                        t.querySelector(".dropzone-remove-all").addEventListener("click", function () {
                            Swal.fire({
                                text: "Naozaj chcete zmazať nahraté súbory?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Áno, zmazať!",
                                cancelButtonText: "Nie, zrušiť!",
                                customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                            }).then(function (e) {
                                t.querySelector(".dropzone-select").style.display = "inline-block";
                                e.value
                                    ? ((t.querySelector(".dropzone-upload").style.display = "none"), (t.querySelector(".dropzone-remove-all").style.display = "none"), r.removeAllFiles(!0))
                                    : "cancel" === e.dismiss && Swal.fire({ text: "Vaše súbory neboli odstránené!", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, chápem!", customClass: { confirmButton: "btn btn-primary" } });
                            });
                        }),
                        r.on("queuecomplete", function (e) {
                            t.querySelectorAll(".dropzone-upload").forEach((e) => {
                                e.style.display = "none";
                            });
                        }),
                        r.on("removedfile", function (e) {

                            r.files.length < 1 && ((t.querySelector(".dropzone-upload").style.display = "none"), (t.querySelector(".dropzone-select").style.display = "inline-block"), (t.querySelector(".dropzone-remove-all").style.display = "none"));
                        });
                })(),
                m(),
                d(),
                f(),
                KTMenu.createInstances());
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTFileManagerList.init();
});

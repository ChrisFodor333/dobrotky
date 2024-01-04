"use strict";
var KTProjectList = {
    init: function () {
        !(function () {
            var t = document.getElementById("kt_project_list_chart");
            if (t) {
                var e = t.getContext("2d");

                // Add AJAX call here
                $.ajax({
                    url: 'https://dobroty.physcatch.sk/chartdata',
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        // Use the fetched data to update the chart
                        var customers = [];
                          data.forEach((dat) => {
                          customers.push(parseInt(dat.mycount));
                        });

                        new Chart(e, {
                            type: "doughnut",
                            data: {
                                datasets: [{
                                    data: customers,
                                    backgroundColor: ["#50CD89", "#00A3FF", "#f0ad4e", "#d9534f"]
                                }],
                                labels: ["Aktívny", "Čakajúci", 'Pozastavený', "Neaktívny"]
                            },
                            options: {
                                chart: { fontFamily: "inherit" },
                                cutout: "75%",
                                cutoutPercentage: 65,
                                responsive: !0,
                                maintainAspectRatio: !1,
                                title: { display: !1 },
                                animation: { animateScale: !0, animateRotate: !0 },
                                tooltips: {
                                    enabled: !0,
                                    intersect: !1,
                                    mode: "nearest",
                                    bodySpacing: 5,
                                    yPadding: 10,
                                    xPadding: 10,
                                    caretPadding: 0,
                                    displayColors: !1,
                                    backgroundColor: "#20D489",
                                    titleFontColor: "#ffffff",
                                    cornerRadius: 4,
                                    footerSpacing: 0,
                                    titleSpacing: 0,
                                },
                                plugins: { legend: { display: !1 } },
                            },
                        });
                    },
                    error: function (error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }
        })();
    },
};

KTUtil.onDOMContentLoaded(function () {
    KTProjectList.init();
});

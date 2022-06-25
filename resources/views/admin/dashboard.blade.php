<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="row mx-1">
        <a class=" btn btn-outline-dark col mb-auto" style="margin:20px;padding:0px" href="/accmanagement">
            <div class="row" style="margin:0px">
                <div class="col-4 py-4" style="Background:#FF6767;">
                    <i class="bi bi-wallet2" style="font-size:60px"></i>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="fs-3 mt-4 mb-2 align-middle">Account Management</div>
                    </div>
                </div>
            </div>
        </a>
        <a class="btn btn-outline-dark col mb-auto" style="margin:20px;padding:0px" href="/revenue">
            <div class="row" style="margin:0px">
                <div class="col-4 py-4" style="Background:#FF6767;">
                    <i class="bi bi-wallet2" style="font-size:60px"></i>
                </div>
                <div class="col-8">
                    <div class="row">
                        <p class="fs-1 mt-1">RM {{ number_format($total_revenue, 2) }}</p>
                    </div>
                    <div class="row">
                        <p class="fs-3">Total Revenue</p>
                    </div>
                </div>
            </div>
        </a>
        <a class=" btn btn-outline-dark col mb-auto" style="margin:20px;padding:0px" aria-disabled="true">
            <div class="row" style="margin:0px">
                <div class="col-4 py-4" style="Background:#FF6767;">
                    <i class="bi bi-wallet2" style="font-size:60px"></i>
                </div>
                <div class="col-8">
                    <div class="row">
                        <p class="fs-1 mt-1">{{ $total_orders }}</p>
                    </div>
                    <div class="row">
                        <p class="fs-3">Total Order</p>
                    </div>
                </div>
            </div>
        </a>
        <a class=" btn btn-outline-dark col mb-auto" style="margin:20px;padding:0px" href="/payroll">
            <div class="row" style="margin:0px">
                <div class="col-4 py-4" style="Background:#FF6767;">
                    <i class="bi bi-wallet2" style="font-size:60px"></i>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="fs-3 mt-4 mb-2 align-middle">Employee Payroll</div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="row mx-1">
        <div class="border border-dark col-6 p-3 m-4">
            <div class="row">
                <p class="fs-3">Pie Chart</p>
            </div>
            <div class="row">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.0.0/Chart.js"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
                <div class="col-4">
                    <div class="container-chart">
                        <canvas id="chart1" class="w-80 h-80"></canvas>
                        <p class="fs-5 text-center mt-3 mb-1">Order by Category</p>
                    </div>

                    <script>
                    var order_category = {!! json_encode($order_category, JSON_HEX_TAG) !!};
                    $(document).ready(function() {
                        // Chart options
                        Chart.defaults.global.legend.display = false;
                        Chart.defaults.global.tooltips.enabled = true;

                        var labels = [],
                            num = [];
                        for (var i = 0; i < 4; i++) {
                            labels.push(order_category[i]["category"]);
                            num.push(order_category[i]["amount"]);
                        }

                        // Create the chart
                        var canvas = $("#chart1");
                        var data = {
                            labels: labels,
                            datasets: [{
                                data: num,
                                backgroundColor: ["#58508D", "#BC5090", "#FF6361", "#FFA600"],
                                hoverBackgroundColor: ["#8A85AF", "#D085B1", "#FF9290", "#FFC14D"]
                            }]
                        };

                        var chart1 = new Chart(canvas, {
                            type: "pie",
                            data: data,
                            options: {
                                plugins: {
                                    tooltip: {
                                        enabled: true
                                    }
                                }
                            }
                        });
                    });
                    </script>
                </div>

                <div class="col-4">
                    <div class="container-chart">
                        <canvas id="chart2" class="w-80 h-80"></canvas>
                        <p class="fs-5 text-center mt-3 mb-1">Reservation By Time</p>
                    </div>
                    <script>
                    var res_time = {!! json_encode($res_time, JSON_HEX_TAG) !!};

                    $(document).ready(function() {
                        // Chart options
                        Chart.defaults.global.legend.display = false;
                        Chart.defaults.global.tooltips.enabled = true;

                        var labels = [],
                            num = [];
                        for (var i = 0; i < 4; i++) {
                            labels.push(res_time[i]["time_slot"]);
                            num.push(res_time[i]["count"]);
                        }

                        const bgcolor = []
                        for (i = 0; i < labels.length; i++){
                            const r = Math.floor(Math.random() * 255);
                            const g = Math.floor(Math.random() * 255);
                            const b = Math.floor(Math.random() * 255);
                            bgcolor.push('rgba('+r+', '+g+', '+b+', 1)');
                        }
                        // Create the chart
                        var canvas = $("#chart2");
                        var data = {
                            labels: labels,
                            datasets: [{
                                data: num,
                                backgroundColor: bgcolor,
                                hoverOffset: 4
                            }]
                        };

                        var chart2 = new Chart(canvas, {
                            type: "pie",
                            data: data,
                            options: {
                                plugins: {
                                    tooltip: {
                                        enabled: true
                                    }
                                }
                            }
                        });
                    });
                    </script>
                </div>

                <div class="col-4">
                    <div class="container-chart">
                        <canvas id="chart3" class="w-80 h-80"></canvas>
                        <p class="fs-5 text-center mt-3 mb-1">Revenue by Category</p>
                    </div>
                    <script>
                    var revenue_category = {!! json_encode($revenue_category, JSON_HEX_TAG) !!};

                    $(document).ready(function() {
                        // Chart options
                        Chart.defaults.global.legend.display = false;
                        Chart.defaults.global.tooltips.enabled = true;

                        var labels = [],
                            num = [];
                        for (var i = 0; i < 4; i++) {
                            labels.push(revenue_category[i]["category"]);
                            decimal = parseFloat(revenue_category[i]["profit"]).toFixed(2);
                            num.push(decimal);
                        }

                        // Create the chart
                        var canvas = $("#chart3");
                        var data = {
                            labels: labels,
                            datasets: [{
                                data: num,
                                backgroundColor: ["#58508D", "#BC5090", "#FF6361", "#FFA600"],
                                hoverBackgroundColor: ["#8A85AF", "#D085B1", "#FF9290", "#FFC14D"]
                            }]
                        };

                        var chart3 = new Chart(canvas, {
                            type: "pie",
                            data: data,
                            options: {
                                plugins: {
                                    tooltip: {
                                        enabled: true
                                    }
                                }
                            }
                        });
                    });
                    </script>
                </div>
            </div>
        </div>

        <div class="border border-dark col p-3 m-4">
            <div class="row">
                <p class="fs-3">Peak day</p>
            </div>
            <div class="row m-0 p-0 h-100 w-100 d-inline-block">
                <div id="container" class="m-0 p-0 h-90 d-inline-block">
                        <canvas id="chart4"></canvas>
                </div>
                <script>
                var week = {!! json_encode($week, JSON_HEX_TAG) !!};
            
                week_data = [];
                week_data.push(week["Sun"]);
                week_data.push(week["Mon"]);
                week_data.push(week["Tue"]);
                week_data.push(week["Wed"]);
                week_data.push(week["Thu"]);
                week_data.push(week["Fri"]);
                week_data.push(week["Sat"]);

                $(document).ready(function() {
                        // Chart options
                        Chart.defaults.global.legend.display = false;
                        Chart.defaults.global.tooltips.enabled = true;

                        // Create the chart
                        var canvas = $("#chart4");
                        var data = {
                            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                            datasets: [{
                                data: week_data,
                                backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1
                           }]
                        };

                        var chart4 = new Chart(canvas, {
                            type: "bar",
                            data: data,
                            options: {
                                plugins: {
                                    tooltip: {
                                        enabled: true
                                    }
                                },
                                responsive: true,
                                maintainAspectRatio: false,
                            }
                        });
                    });
                    </script>

            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>
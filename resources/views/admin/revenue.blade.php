<!DOCTYPE html>
<html lang="en" style="position:relative;min-height:89vh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue Analysis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style type="text/css">
    @media screen and (min-width: 601px) {
        #info1 {
            padding-bottom: 25px;

        }

        #date {
            margin-left: 150px;

        }

        #border {
            border: 1px solid black;

        }
    }



    @media screen and (max-width: 600px) {
        #info {
            margin-right: 50px;

        }

        #info1 {
            padding-left: 25px;
            padding-right: 25px;
            padding-top: 15px;
            padding-bottom: 30px;
            font-size: 15px;

        }

        #date {
            padding-top: 15px;
            font-size: 15px;

        }

        #border {
            border: 0px solid black;

        }


        #cat {
            margin-left: 15px;
            padding-right: 100px;
        }

        #cat1 {
            padding-left: 10px;

        }

        #cat2 {
            padding-right: 320px;

        }
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="container">
        <div class="row">
            <form action="/revenue/salesReport" method="post" action="/action_page.php">
                @csrf
                <div class="col-md-12">
                    <input type="hidden" name="title" value="{{ $title }}">
                    <button type="submit" class="btn btn-warning ml-2 float-end">Generate Sales Report</button>
                </div>
            </form>
        </div>
        <div class="row mt-4" id="border">
            <div class="btn-toolbar mb-3 mt-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group col-6 pt-2" role="group" aria-label="First group" id="info">
                    <a class="btn btn-outline-secondary w-100 h-75 " id="info1"
                        href="{{ route('revenueByYear') }}">Year</a>
                    <a class="btn btn-outline-secondary w-100 h-75 " id="info1"
                        href="{{ route('revenueLastMonth') }}">Last Month</a>
                    <a class="btn btn-outline-secondary w-100 h-75 " id="info1"
                        href="{{ route('revenueThisMonth') }}">This Month</a>
                    <a  class="btn btn-outline-secondary w-100 h-75 " id="info1"
                        href="{{ route('revenuePast7Days') }}">Past 7Days</a>
                </div>
                <div class="col-auto pt-2 pe-1 text-end" id="date">
                    <form action="/revenue/revenueCustomDate" method="post" action="/action_page.php" id="search">
                        @csrf
                        Custom :
                        <input type="date" id="start_date" name="start_date" required> &nbsp-&nbsp
                        <input type="date" id="end_date" name="end_date" required>
                </div>
                </form>
                <div class="col-1 pt-2 ps-1">
                    <button type="submit" class="btn btn-secondary btn-sm" form="search">Go</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 pe-3" id="cat">

                <div class="row" id="cat1">
                    <div class="container border border-dark mt-4" id="cat2">
                        <div class="mb-3" style="margin-top: 16px;">
                            <label for="formGroupExampleInput" class="form-label">Categories</label>
                            <!-- <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Search categories..."> -->
                            <select id="myselect" onchange="updateData()">
                                <option disabled selected value> -- Choose a category -- </option>
                                @foreach ($category as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <button type="button" onclick="clearFilter()"
                                class="btn btn-outline-dark mt-2">Clear</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row mt-4 ps-3">
                    <div style="width:autopx; border:1px solid black">
                        <h3>Revenue Chart</h3>
                        <canvas id="myChart4"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script>
        var title = {!! json_encode($title, JSON_HEX_TAG) !!};
        var main = {!! json_encode($main, JSON_HEX_TAG) !!};
        var side = {!! json_encode($side, JSON_HEX_TAG) !!};
        var beverage = {!! json_encode($beverage, JSON_HEX_TAG) !!};
        var dessert = {!! json_encode($dessert, JSON_HEX_TAG) !!};

        var labels = Object.keys(main);
        var data_m = [],
            data_s = [],
            data_b = [],
            data_d = [];
        for (let x of labels) {
            num = parseFloat(main[x]).toFixed(2);
            data_m.push(num);
            num = parseFloat(side[x]).toFixed(2);
            data_s.push(num);
            num = parseFloat(beverage[x]).toFixed(2);
            data_b.push(num);
            num = parseFloat(dessert[x]).toFixed(2);
            data_d.push(num);
        }

        var ctx = document.getElementById("myChart4").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Main Course',
                    backgroundColor: "#caf270",
                    data: data_m,
                }, {
                    label: 'Sides',
                    backgroundColor: "#45c490",
                    data: data_s,
                }, {
                    label: 'Beverages',
                    backgroundColor: "#008d93",
                    data: data_b,
                }, {
                    label: 'Dessert',
                    backgroundColor: "#2e5468",
                    data: data_d,
                }],
            },
            options: {
                title: {
                    display: true,
                    text: title,
                    fontSize: 18
                },
                tooltips: {
                    displayColors: true,
                    callbacks: {
                        mode: 'x',
                    },
                },
                scales: {
                    xAxes: [{
                        stacked: true,
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true,
                        },
                        type: 'linear',
                    }]
                },
                responsive: true,
                maintainAspectRatio: true,
                legend: {
                    position: 'bottom'
                },
            }
        });
        </script>

        <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }

        day = yyyy + '-' + mm + '-' + dd;
        document.getElementById("start_date").setAttribute("max", day);
        document.getElementById("end_date").setAttribute("max", day);
        </script>


        <script>
        function updateData() {
            myChart.data.datasets[0].data = data_m;
            myChart.data.datasets[1].data = data_s;
            myChart.data.datasets[2].data = data_b;
            myChart.data.datasets[3].data = data_d;
            console.log(myChart.data.datasets);
            var str = document.getElementById("myselect").value;
            console.log(str);
            if (str == "Main_Course") {
                index = 0;
            } else if (str == 'Sides') {
                index = 1;
            } else if (str == 'Beverages') {
                index = 2;
            } else if (str == 'Dessert') {
                index = 3;
            }
            for (let i = 0; i < 4; i++) {
                if (i != index) {
                    myChart.data.datasets[i].data = [];
                    console.log(myChart.data.datasets);
                }
            }
            myChart.update();
        }

        function clearFilter() {
            myChart.data.datasets[0].data = data_m;
            myChart.data.datasets[1].data = data_s;
            myChart.data.datasets[2].data = data_b;
            myChart.data.datasets[3].data = data_d;
            console.log(myChart.data.datasets);
            myChart.update();
        }
        </script>
</body>
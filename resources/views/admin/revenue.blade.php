<!DOCTYPE html>
<html lang="en" style="position:relative;min-height:89vh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue Analytics</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="container">
        <div class="row border border-dark mt-4">
            <div class="col-auto px-5 py-1 text-center" style="border-right-style: dashed;">
                <a class="btn w-100 me-md-2" aria-current="page" href="{{ route('revenueByYear') }}">Year</a>
            </div>
            <div class="col-auto px-5 py-1 text-center" style="border-right-style: dashed;">
                <a class="btn w-100 me-md-2" aria-current="page" href="{{ route('revenueLastMonth') }}">Last Month</a>
            </div>
            <div class="col-auto px-5 py-1 text-center" style="border-right-style: dashed;">
                <a class="btn w-100 me-md-2" aria-current="page" href="{{ route('revenueThisMonth') }}">This Month</a>
            </div>
            <div class="col-auto px-5 py-1 text-center" style="border-right-style: dashed;">
                <a class="btn w-100 me-md-2" aria-current="page" href="{{ route('revenuePast7Days') }}">Past 7 Days</a>
            </div>
                <div class="col-auto px-5 py-1 text-center">
                <form action="/revenue/revenueCustomDate" method="get" action="/action_page.php" id="search">
                    @csrf
                    Custom :
                    <input type="date" id="start_date" name="start_date"> &nbsp-&nbsp
                    <input type="date" id="end_date" name="end_date">
                </div>
            </form>
                <div class="col-auto ps-5 ms-6">
                    <button type="submit" class="btn btn-secondary" form="search">Go</button>
                </div>
        </div>
    </div>
    <div class="row px-2 ms-5">
        <div class="col-3 me-md-5">
            <div class="row">
                <div class="container border border-dark mt-4">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Product</label>
                        <input type="text" class="form-control" id="formGroupExampleInput"
                            placeholder="Search for a product...">
                        <button type="button" class="btn btn-outline-dark mt-2">Filter</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container border border-dark mt-4">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Categories</label>
                        <input type="text" class="form-control" id="formGroupExampleInput"
                            placeholder="Search categories...">
                        <button type="button" class="btn btn-outline-dark mt-2">Filter</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-7 me-md-5 ">
            <div class="row mt-4">
                <div style="width:800px; border:1px solid black">
                <h1>Revenue Chart</h1>
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
var data_m = [], data_s = [], data_b = [], data_d = [];
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
      callbacks:{
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
		legend: { position: 'bottom' },
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
</body>
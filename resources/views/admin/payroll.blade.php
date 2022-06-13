<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Payroll</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')

    <div class="row" style="text-align:center;display:block;width: auto;height:400px;margin:50px;border: 1px solid black;border-radius:30px">

        <p class="fw-light fs-1" style="font-style:italic;margin: 25px 0 10px 20px;text-align:left">Payroll</p>
        <div class="ms-3 text-start input-daterange">
        <form action="/payroll/filter" method="GET">
            <input type="month" id="month" name="month" value="<?php echo isset($_GET['month']) ? $_GET['month'] : date("Y-m") ?>">
            <input type="submit" name="filter" id="filter" class="btn btn-info btn-sm">
        </div>

        <div class="table-scrollable" style="overflow-x: auto;  max-width: auto; max-height:275px;">

            <form style="margin:20px;" method="view">

                <table class="m-auto table table-responsive ">
                    <tr style="border:0px solid black;">
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">ID</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Name
                        </td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Position</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Pay/Hour (RM)</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Total Hours
                            Worked</td>
                        <td style="width: 200px">Net Pay (RM)</td>
                    </tr>

                    @foreach ($employee as $emp)
                    <tr style="border:0px solid black">
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $emp->id }}</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $emp->name }}</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $emp->position }}</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $emp->hourly_rate }}</td>
                        @foreach ($working_hours as $k=>$v)
                        @if ($v['id'] == $emp->id) 
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $v['hours'] }}</td>
                        <td style="border-bottom:1px solid black;background-color:#BBFEAA">{{ number_format($v['hours'] * $emp->hourly_rate, 2)}}</td>
                        @endif 
                        @endforeach
                    </tr>
                    @endforeach


                </table>
            </form>
        </div>
    </div>
    
    @include('layouts.footer')
</body>

</html>

<script>
    document.getElementById("month").defaultValue = today.getMonth()+1;
</script>
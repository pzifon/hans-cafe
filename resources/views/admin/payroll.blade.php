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
        <div class="ms-3 text-start">
            <input type="month" id="month" value="2022-01">
        </div>

        <div class="table-scrollable" style="overflow-x: auto;  max-width: auto; max-height:275px;">

            <form style="margin:20px;" method="view">

                <table class="m-auto table table-responsive ">
                    <tr style="border:0px solid black;">
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">Name</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Pay/Hour
                        </td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Total Hour
                            Worked</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">
                            Overtime/Hour</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Total
                            Overtime Hours</td>
                        <td style="width: 200px">Net Pay</td>
                    </tr>

                    <tr style="border:0px solid black">
                        <td style="border-bottom:1px solid black;border-right:1px solid black">1</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">2</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">3</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">4</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">5</td>
                        <td style="border-bottom:1px solid black;background-color:#BBFEAA">6</td>
                    </tr>


                </table>
            </form>
        </div>
    </div>
    
    @include('layouts.footer')
</body>

</html>
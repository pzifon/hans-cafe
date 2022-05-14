<!DOCTYPE html>
<html lang="en" style="position:relative;min-height:89vh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body style="margin-bottom:60px">
    @include('layouts.navbar')

    <div class="row"
        style="text-align:center;display:block;width: auto;height:470px;margin:50px;border: 1px solid black;border-radius:30px">

        <p class="fw-light fs-1" style="font-style:italic;margin: 25px 0 10px 20px;text-align:left">Reservations</p>

        <div class="table-scrollable" style="overflow-x: auto;  max-width: auto; max-height:275px;">

            <form style="margin:20px;" method="view">

                <table class="m-auto table table-responsive ">
                    <tr style="border:0px solid black;">
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Reservation
                            ID</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Date</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Time</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">No of people
                        </td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Customer
                            Name</td>
                        <td style="border-bottom:1px solid black;width: 200px">Contact
                            Number</td>
                    </tr>


                    <tr style="border:0px solid black">
                        <td style="border-bottom:1px solid black;border-right:1px solid black">1</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">16/05/22</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">10:00</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">1</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">Ali</td>
                        <td style="border-bottom:1px solid black">012-3456789</td>
                    </tr>
                </table>
            </form>
        </div>
    </div>


</body>
<div class="footer w-100 position-absolute mt-5" style="bottom:0;height:110px;top: 570px;">@include('layouts.footer')
</div>

</html>
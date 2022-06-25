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
    <style type="text/css">
    @media screen and (min-width: 601px) {
        #MobileView {
            border: 1px solid black;
            border-radius: 30px;
            margin: 50px;
        }

        #form {
            margin: 20px;
            height: auto;
        }
        #rsvn{
            font-style:italic;
            text-align:left;
            margin-top: 20px;
            margin-left:20px;
        }

    }



    @media screen and (max-width: 600px) {
        #MobileView {
            border: none;
            border-radius: 30px;
            max-height: 500px;
            margin-left: 0px;
            margin-right: 0px;

        }

        td {
            font-size: 11px;
        }

        #form {
            margin: 0px;
        }

        #rsvn{
            font-style:italic;
            text-align:left;
        }
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')

    <div class="row text-center" id="MobileView">

        <p class="fw-light fs-1" id="rsvn">Reservations</p>

        <div class="table-scrollable" style="overflow-x: auto;  max-width: auto; max-height:275px;">

            <form id="form" method="view">

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
                    @foreach ($reservation as $res)
                    <tr style="border:0px solid black">
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $res->res_id }}</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $res->date }}</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $res->time_slot }}
                        </td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $res->no_of_people }}
                        </td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $res->name }}</td>
                        <td style="border-bottom:1px solid black">{{ $res->contact }}</td>
                    </tr>
                    @endforeach
                </table>
            </form>
        </div>
    </div>

    @include('layouts.footer')
</body>

</html>
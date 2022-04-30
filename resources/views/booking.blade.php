<!DOCTYPE html>
<html>

<head>
    <title>Account Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    </style>
</head>

<body>
    @include('layouts.navbar')
    @include('flash-message')
    <p class="fw-light fs-1" style="font-style:italic;margin: 30px 0 30px 70px;text-align:left">Account Dashboard</p>

    <div class="container" style="margin-top:10px">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-boy">
                        <div class="row m-1">
                            <button type="button" class="btn btn-secondary btn-lg" style="height:150px;">
                                <i class="bi bi-currency-exchange float-start"
                                    style="font-size: 80px;margin-left: 25px;margin-bottom: 20px;"> &nbsp|</i>
                                <div class="row">
                                    <p class="fs-1">12</p>
                                    <div class="row">
                                        <p>Total Purchases</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">

                    <div class="row m-1">
                        <button type="button" class="btn btn-secondary btn-lg" style="height:150px">
                            <i class="bi bi-gift float-start"
                                style="font-size: 80px;margin-left: 25px;margin-bottom: 20px;">&nbsp|</i>
                            <div class="row">
                                <p class="fs-1"> 2</p>
                                <div class="row">
                                    <p>Rewards</p>
                                </div>
                            </div>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <div class="container" style="margin-top:10px;">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-boy">
                        <div class="row">
                            <table>

                                @foreach ($user as $user)
                                <tr>
                                    <td>
                                        <p>MEMBERSHIP ID <br>
                                    </td>
                                    <td><span style="font-size:20px">{{$user->id}} </td>
                                    </p>
                                </tr>
                                <br>
                                <tr>
                                    <td>
                                        <p>NAME <br>
                                    </td>
                                    <td><span style="font-size:20px">{{$user->name}} </td>
                                    </p>
                                </tr>

                                <br>
                                <tr>
                                    <td>
                                        <p>DATE OF BIRTH <br>
                                    </td>
                                    <td> <span style="font-size:20px">{{$user->dob ?? 'N/A'}} </td>
                                    </p>
                                </tr>
                                <br>
                                <tr>
                                    <td>
                                        <p>CONTACT NUMBER <br>
                                    </td>
                                    <td><span style="font-size:20px">{{$user->contact ?? 'N/A'}} </td>
                                    </p>
                                </tr>
                                <br>
                                <tr>
                                    <td>
                                        <p>EMAIL <br>
                                    </td>
                                    <td><span style="font-size:20px">{{$user->email}} </td>
                                    </p>
                                </tr>
                                <br>
                                <tr>
                                    <td>
                                        <p>DATE JOINED <br>
                                    </td>
                                    <td> <span style="font-size:20px">{{$user->created_at}} </td>
                                    </p>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    table,
    th,
    td {
        border: 1px solid;
    }
    </style>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-boy">
                    <div class="row">
                        <div class="row">
                            RESERVATIONS
                        </div>
                        <table>
                            <th colspan="5">UPCOMING</th>
                            <tr>
                                <th style="width:8%">ID</th>
                                <th style="width:30%">Date</th>
                                <th style="width:22%">Time</th>
                                <th style="width:40%">No of people</th>
                            </tr>

                            <form action="/cancel" method="post" action="/action_page.php">
                                @csrf
                                @csrf
                                @foreach ($upcoming_res as $upcoming_res)
                                <tr>
                                    <td>{{ $upcoming_res->res_id }}</td>
                                    <td>{{ $upcoming_res->date }}</td>
                                    <td>{{ date('h:ia', strtotime($upcoming_res->time_slot)) }}</td>
                                    <td style="text-align:right;">{{ $upcoming_res->no_of_people }}</td>
                                    <td>
                                        <button type="submit" value="{{$upcoming_res->res_id}}" name="res_id"
                                            class="column">Cancel</button>
                                    </td>
                                </tr>
                                @endforeach
                            </form>
                        </table>
                        <table>
                            <th colspan="5">PAST</th>
                            <tr>
                                <th style="width:8%">ID</th>
                                <th style="width:30%">Date</th>
                                <th style="width:22%">Time</th>
                                <th style="width:40%">No of people</th>
                            </tr>
                            @foreach ($past_res as $past_res)
                            <tr>
                                <td>{{ $past_res->res_id }}</td>
                                <td>{{ $past_res->date }}</td>
                                <td>{{ date('h:ia', strtotime($past_res->time_slot)) }}</td>
                                <td style="text-align:right;">{{ $past_res->no_of_people }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

    <div style="height: 50px"></div>

    <script>
    var today = new Date();
    var dd = today.getDate() + 1;
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }

    tmr = yyyy + '-' + mm + '-' + dd;
    document.getElementById("res_date").setAttribute("min", tmr);
    </script>
    @include('layouts.footer')
</body>

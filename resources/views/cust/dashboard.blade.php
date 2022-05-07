<!DOCTYPE html>
<html style="position:relative;min-height:89vh">

<head>
    <title>Account Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    </style>
</head>

<body style="margin-bottom:60px">
    @include('layouts.navbar')
    @include('flash-message')
    <div class="container" style="margin-top:20px; margin-bottom: 20px">
        <div class="row">
            <h2>Account Dashboard</h2>
            <a class=" btn btn-outline-dark col" style="margin:20px;padding:0px" href="/purchases">
                <div class="row" style="margin:0px">
                    <div class="col-4 py-4" style="Background:#FF6767;">
                        <i class="bi bi-wallet2" style="font-size:60px"></i>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <p class="fs-1" style="margin-top:10px">{{ $total_purchases}}</p>
                        </div>
                        <div class="row">
                            <p class="fs-3" style="margin-top:10px">Total Purchases</p>
                        </div>
                    </div>
                </div>
            </a>

            <a class="btn btn-outline-dark col" style="margin:20px;padding:0px" href="/reward">
                <div class="row" style="margin:0px;">
                    <div class="col-4 py-4" style="Background:#FF6767;">
                        <i class="bi bi-award" style="font-size:60px"></i>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <p class="fs-1" style="margin-top:10px">2</p>
                        </div>
                        <div class="row">
                            <p class="fs-3" style="margin-top:10px">Rewards</p>
                        </div>
                    </div>
                </div>
            </a>

        </div>

        <div class="row">
            <div class="col">
                @foreach ($user as $user)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">
                                Account Details
                                <a href="/editacc" style="float: right">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MEMBERSHIP ID</td>
                            <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                            <td>NAME</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>DATE OF BIRTH</td>
                            <td>{{$user->dob ?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <td>EMAIL</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>CONTACT</td>
                            <td>{{$user->contact ?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <td>DATE JOINED</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                    </tbody>
                </table>
                @endforeach
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div style="text-align: center">
                            <b>RESERVATIONS</b>
                        </div>
                        <div>
                            <b>UPCOMING</b>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:8%">ID</th>
                                    <th style="width:30%">Date</th>
                                    <th style="width:22%">Time</th>
                                    <th style="width:40%">No of people</th>
                                    <th style="width:40%">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
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
                                                class="btn btn-danger">Cancel</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </form>
                            </tbody>
                        </table>

                        <div>
                            <b>PAST</b>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:8%">ID</th>
                                    <th style="width:30%">Date</th>
                                    <th style="width:22%">Time</th>
                                    <th style="width:40%">No of people</th>
                                </tr>
                            </thead>
                            <tbody class="table-bordered">
                                <form action="/cancel" method="post" action="/action_page.php">
                                    @csrf
                                    @csrf
                                    @foreach ($past_res as $past_res)
                                    <tr>
                                        <td>{{ $past_res->res_id }}</td>
                                        <td>{{ $past_res->date }}</td>
                                        <td>{{ date('h:ia', strtotime($past_res->time_slot)) }}</td>
                                        <td style="text-align:right;">{{ $past_res->no_of_people }}</td>
                                    </tr>
                                    @endforeach
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="footer w-100 position-absolute mt-5" style="bottom:0;height:110px">@include('layouts.footer')</div>
</body>

</html>
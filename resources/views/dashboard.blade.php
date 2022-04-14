<!DOCTYPE html>
<html>

<head>
    <title>Account Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    </style>
</head>

<body>
    @include('layouts.navbar')
    @include('flash-message')
    <div class="row">
        <div class="column-2">
            <div class="row">
                <div class="column" style="font-weight:bold;">Account Details</div>
                <div class="column" style="float:right; text-align:right;">
                    <a href="/editacc"><i class="material-icons">edit</i></a>
                </div>
            </div>
            @foreach ($user as $user)
            <p>MEMBERSHIP ID <br>
                <span style="font-size:20px">{{$user->id}}
            </p>
            <br>
            <p>NAME <br>
                <span style="font-size:20px">{{$user->name}}
            </p>
            <br>
            <p>DATE OF BIRTH <br>
                <span style="font-size:20px">{{$user->dob ?? 'N/A'}}
            </p>
            <br>
            <p>EMAIL <br>
                <span style="font-size:20px">{{$user->email}}
            </p>
            <br>
            <p>CONTACT NUMBER <br>
                <span style="font-size:20px">{{$user->contact ?? 'N/A'}}
            </p>
            <br>
            <p>DATE JOINED <br>
                <span style="font-size:20px">{{$user->created_at}}
            </p>
            @endforeach
        </div>
        <div class="column-2">
            <div class="row">
                <p class="column">Total Purchases</p>
                <a class="column" style="float: right;text-decoration: underline;" href="/purchases">View
                    Purchases</a><br>
                <p style="text-align:center;font-size:40px">{{ $total_purchases}}</p>
            </div>
            <div class="row">
                <div class="row">
                    REWARDS
                </div>
                <div class="row">
                    <p>No reward</p>
                </div>
            </div>
        </div>
        <div class="column-2">
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
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
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
</body>

</html>
<!DOCTYPE html>
<html>

<head>
  <title>Account Dashboard</title>
  <link rel="stylesheet" href="loyalty.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    .row::after {
      content: "";
      clear: both;
      display: table;
    }

    .column {
      float: left;
      width: 120px;
    }

    .column-2 {
      float: left;
      width: 49%;
      padding: 10px;
      margin: 5px;
      margin-top: 10px;
      border-style: solid;
      border-width: 5px;
    }

    .ClaimButton {
      border-radius: 25px;
      background-color: #1abb00;
      width: 100px;
    }

    .ClaimedButton {
      border-radius: 25px;
      background-color: #eaeaea;
      font-color: green;
      width: 100px;
    }
  </style>
</head>

<body>
  <x-app-layout>
    <x-slot name="header"></x-slot>
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
          <span style="font-size:25px">{{$user->id}}
        </p>
        <p>NAME <br>
          <span style="font-size:25px">{{$user->name}}
        </p>
        <p>DATE OF BIRTH <br>
          <span style="font-size:25px">{{$user->dob ?? 'N/A'}}
        </p>
        <p>EMAIL <br>
          <span style="font-size:25px">{{$user->email}}
        </p>
        <p>CONTACT NUMBER <br>
          <span style="font-size:25px">{{$user->contact ?? 'N/A'}}
        </p>
        <p>DATE JOINED <br>
          <span style="font-size:25px">{{$user->created_at}}
        </p>
        @endforeach
      </div>
      <div class="column-2">
        <div class="row">
          <p class="column">Total Purchases</p>
          <a class="column" style="float: right;text-decoration: underline;" href="/purchases">View Purchases</a><br>
          <p style="text-align:center;font-size:40px">{{ $total_purchases}}</p>
        </div>
        <div class="row">
          <div class="row">
            REWARDS
          </div>
          <div class="row">
            <p style="margin-left: 20px;">A cup of Handcraft Coffee <i class="fa fa-question-circle-o" aria-hidden="true"></i>
              <button class="ClaimButton" style="float:right;margin-right:20px">Claim</button>
            </p>
          </div>
          <div class="row">
            <p style="margin-left: 20px;">A cup of Handcraft Coffee <i class="fa fa-question-circle-o" aria-hidden="true"></i>
              <button class="ClaimedButton" style="float:right;margin-right:20px">Claimed</button>
            </p>
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
                  <button type="submit" value="{{$upcoming_res->res_id}}" name="res_id" class="column">Cancel</button>
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
  </x-app-layout>
</body>

</html>
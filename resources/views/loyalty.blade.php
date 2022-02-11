<!DOCTYPE html>
<html>
  <head>
    <title>Loyalty</title>
    <link rel="stylesheet" href="loyalty.css">
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
      <div class="row">
        <div class="column-2">
          <div class="row">
            <div class="column" style="font-weight:bold;">Account Details</div>
            <a class="column" href="/editacc">(edit account)</a>
          </div>
          @foreach ($user as $user)
          <p>MEMBERSHIP ID <br>
            <span style="font-size:25px">{{$user->id}}
          </p>
          <p>NAME <br>
            <span style="font-size:25px">{{$user->name}}
          </p>
          <p>DATE OF BIRTH <br>
            <span style="font-size:25px">{{$user->dob  ?? 'N/A'}}
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
            <p style="">Total Purchases</p>
            <p style="text-align:center;font-size:40px">12</p>
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
                <button class="ClaimedButton" style="float:right;margin-right:20px">Claim</button>
              </p>
            </div>
          </div>
        </div>
      </div>
    </x-app-layout>
  </body>
</html>
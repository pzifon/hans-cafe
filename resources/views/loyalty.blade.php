<!DOCTYPE html>
<html>
  <head>
    <title>Loyalty</title>
    <link rel="stylesheet" href="loyalty.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
      html,
      body {
        width: inherit;
        height: inherit;
        margin: 0;
        padding: 0;
        background-color: #cfedea;
        font-family: Verdana, sans-serif;
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
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top:50px;margin-left:-16px;">
          {{ __('Account') }}
        </h2>
      </x-slot>
      <table border="1" height="100px" width="1450px" style="border-spacing: 50px;border-color: transparent;margin-left: auto;margin-right: auto;">
        <tr>
          @foreach ($user as $user)
          <td rowspan="3" style="background-color: white;height=100px;width=10px;border-radius:25px;padding:2px">
            <p style="margin-left: 20px;">MEMBERSHIP ID <br>
              <span style="font-size:25px">{{$user->id}}
            </p>
            <p style="margin-left: 20px;">NAME <br>
              <span style="font-size:25px">{{$user->name}}
            </p>
            <p style="margin-left: 20px;">DATE OF BIRTH <br>
              <span style="font-size:25px">{{$user->dob  ?? 'N/A'}}
            </p>
            <p style="margin-left: 20px;">EMAIL <br>
              <span style="font-size:25px">{{$user->email}}
            </p>
            <p style="margin-left: 20px;">CONTACT NUMBER <br>
              <span style="font-size:25px">{{$user->contact ?? 'N/A'}}
            </p>
            <p style="margin-left: 20px;">DATE JOINED <br>
              <span style="font-size:25px">{{$user->created_at}}
            </p>
          </td>
          @endforeach
          <td style="background: white;height=50px;width=750px;border-radius:25px">
            <p style="margin-left: 20px;">Total Purchases</p>
            <p style="text-align:center;font-size:40px">12</p>
          </td>
        </tr>
        <tr>
          <td style="background: white;height=50px;width=750px;border-radius:25px">
            <p style="margin-left: 20px;">REWARDS</p>&nbsp <p style="margin-left: 20px;">A cup of Handcraft Coffee <i class="fa fa-question-circle-o" aria-hidden="true"></i>
              <button class="ClaimButton" style="float:right;margin-right:20px">Claim</button>
            </p>
            <hr>
            <p style="margin-left: 20px;">A bowl of Salad <i class="fa fa-question-circle-o" aria-hidden="true"></i>
              <button class="ClaimedButton" style="float:right;margin-right:20px">Claimed</button>
            </p>
            <hr>
            <p style="margin-left: 20px;">10% discount <i class="fa fa-question-circle-o" aria-hidden="true"></i>
              <button class="ClaimedButton" style="float:right;margin-right:20px">Expired</button>
            </p>
          </td>
        </tr>
        </tr>
      </table>
    </x-app-layout>
  </body>
</html>
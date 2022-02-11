<!DOCTYPE html>
<html>

<head>
  <title> Menu </title>
  <link rel="stylesheet" href="menu.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    .MenuContent {
      margin-top: 0%;
      /* Same width as the sidebar + left position in px */
      font-size: 28px;
      /* Increased text to enable scrolling */
      padding: 0px 10px;
      box-sizing: border-box;
    }

    h2 {
      margin: 0px;
      margin-left: -50px;
      font-size: 20px;
    }

    .des {
      font-size: 15px;
    }

    .Cal {
      font-size: 20px;
      margin-top: 20px;
    }

    .button {
      background-color: #76e500;
      border: none;
      color: white;
      padding: 5px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 70px 2px 2px;
      cursor: pointer;
      border-radius: 20px;
      float: right;
    }

    .column {
      float: left;
      width: 33%;
      padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
      content: "";
      clear: both;
      display: table;
    }

    .MenuLine {
      margin-top: 0px;
      width: 1050px;
    }

    .cartBtn {
      background-color: red;
      border: none;
      color: white;
      padding: 5px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
      border-radius: 20px;
      float: right;
      margin-top: 10px;
    }

    @media screen and (max-height: 450px) {}
  </style>
</head>

<body>
  <x-app-layout>
    <x-slot name="header" style="position:fixed">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top:50px;">
        {{ __('Menu') }}
      </h2>
    </x-slot>
    <div>
      <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%;position:relative">
          <div class="row">
            <div class="column">
              <img src="{{asset('storage/img/'.$main->image)}}" style="width:250px; height:150px;">
            </div>
            <div class="column">
              <h2>{{ $main->name }}</h2>
              <p class="des">{{ $main->description}}</p>
              <p class="Cal">{{ $main->nutrition }}</p>
            </div>
            <div class="column">
              <div class="row">
                <h2 style="text-align:right">RM {{ number_format($main->price,2) }}</h2>
              </div>
              <div class="row">
                <button class="button">Add to Cart</button>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <h1 id="sides" style="font-size:20px">Sides</h1>
        <div class="MenuContent">
          @foreach ($sides as $sides)
          <div class="row">
            <div class="column">
              <img src="{{asset('storage/img/'.$sides->image)}}" style="width:250px; height:150px;">
            </div>
            <div class="column">
              <h2>{{ $sides->name }}</h2>
              <p class="des">{{ $sides->description}}</p>
              <p class="Cal">{{ $sides->nutrition }}</p>
            </div>
            <div class="column">
              <div class="row">
                <h2 style="text-align:right">RM {{ number_format($sides->price,2) }}</h2>
              </div>
              <div class="row">
                <button class="button">Add to Cart</button>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <h1 id="beverages" style="font-size:20px">Beverages</h1>
        <div class="MenuContent">
          @foreach ($beverages as $beverages)
          <div class="row">
            <div class="column">
              <img src="{{asset('storage/img/'.$beverages->image)}}" style="width:250px; height:150px;">
            </div>
            <div class="column">
              <h2>{{ $beverages->name }}</h2>
              <p class="des">{{ $beverages->description}}</p>
              <p class="Cal">{{ $beverages->nutrition }}</p>
            </div>
            <div class="column">
              <div class="row">
                <h2 style="text-align:right">RM {{ number_format($beverages->price,2) }}</h2>
              </div>
              <div class="row">
                <button class="button">Add to Cart</button>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <h1 id="dessert" style="font-size:20px">Dessert</h1>
        <div class="MenuContent">
          @foreach ($dessert as $dessert)
          <div class="row">
            <div class="column">
              <img src="{{asset('storage/img/'.$dessert->image)}}" style="width:250px; height:150px;">
            </div>
            <div class="column">
              <h2>{{ $dessert->name }}</h2>
              <p class="des">{{ $dessert->description}}</p>
              <p class="Cal">{{ $dessert->nutrition }}</p>
            </div>
            <div class="column">
              <div class="row">
                <h2 style="text-align:right">RM {{ number_format($dessert->price,2) }}</h2>
              </div>
              <div class="row">
                <button class="button">Add to Cart</button>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </x-app-layout>
</body>

</html>
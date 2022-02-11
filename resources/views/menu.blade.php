<!DOCTYPE html>
<html>

<head>
  <title> Menu </title>
  <link rel="stylesheet" href="menu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    @media screen and (max-height: 450px) {}
  </style>
</head>

<body>
  <x-app-layout>
    <x-slot name="header" style="position:fixed">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top:50px">
        {{ __('Menu') }}
      </h2>
    </x-slot>
    <div>
      <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%;position:relative">
        <a href="#" class="w3-bar-item w3-button">Our Signature</a>
        <a href="#" class="w3-bar-item w3-button">Veggie Lover</a>
        <a href="#" class="w3-bar-item w3-button">Appetizer</a>
        <a href="#" class="w3-bar-item w3-button">Soup</a>
        <a href="#" class="w3-bar-item w3-button">Salad</a>
        <a href="#" class="w3-bar-item w3-button">Main Course</a>
        <a href="#" class="w3-bar-item w3-button">Beverages</a>
        <a href="#" class="w3-bar-item w3-button">Dessert</a>
      </div>

      <div style="margin-left:25%">
        <h1>Our Signature</h1>
        <div class="MenuContent">
          @foreach ($menu as $menu)
          <div class="row">
            <div class="column">
              <img src="{{asset('storage/img/'.$menu->image)}}" style="width:250px; height:150px;">
            </div>
            <div class="column">
              <h2>{{ $menu->name }}</h2>
              <p class="des">{{ $menu->description}}</p>
              <p class="Cal">{{ $menu->nutrition }}</p>
            </div>
            <div class="column">
              <div class="row">
                <h2 style="text-align:right">RM {{ number_format($menu->price,2) }}</h2>
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
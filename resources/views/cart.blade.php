<!DOCTYPE html>
<html>

<head>
  <title> Cart </title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    .CartContent {
      padding: 10px 10px;
    }

    .TotalCart {
        padding-left: 10px;
        width: 98%;
        margin-left: 10px;
        position: fixed;
        bottom: 0px;
        border-style: inset;
        border-bottom-style: none;
    }

    .column {
        text-align: center;
      float: left;
      width: 15%;
      padding: 5px;
    }

    .column-B {
      float: left;
      width: 40%;
      padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
      content: "";
      clear: both;
      display: table;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover:not(.active) {
        background-color: #111;
    }

    .active {
        background-color: #04AA6D;
    }

  </style>
</head>

<body>
    <ul>
        <li><a href="/">Hans Cafe</a></li>
        <li><a href="/menu">Menu</a></li>
        <li><a href="/booking">Booking</a></li>
        @if (Route::has('login'))
        @auth
        <li style="float:right">
        <form method="POST" action="{{ route('logout') }}">
        @csrf
            <a class="active" onclick="event.preventDefault();this.closest('form').submit();":href="route('logout')"
                class="text-sm text-gray-700 dark:text-gray-500 underline">Log out</a>
        </form>
        </li>
        <li style="float:right"><a class="active" href="{{ url('/loyalty') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Account</a></li>
        <li style="float:right"><a class="active" href="{{ url('/cart') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Cart</a></li>
        @else
            <li style="float:right"><a class="active" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>
        @if (Route::has('register'))
            <li style="float:right"><a class="active" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
        @endif
        @endauth
        @endif
    </ul>
    <div style="">
        <div class="CartContent">
            <h2 style="font-size: 20px;margin-top: 0px;margin-left: 10px">Cart</h1>
            <div style="border-style: groove;padding: 10px">
                <div class="row" style="font-weight: bold;font-size:18;border-bottom-style: solid;">
                    <div class="column-B">
                        Item
                    </div>
                    <div class="column">
                        Unit Price
                    </div>
                    <div class="column">
                        Quantity
                    </div>
                    <div class="column">
                        Total price
                    </div>
                    <div class="column">
                        Action
                    </div>
                </div>
                <div class="row">
                    <div class="column-B">
                        Salad
                    </div>
                    <div class="column">
                        RM 12
                    </div>
                    <div class="column">
                        <input type="number" id="quantity" name="quantity" min="1" placeholder="2" style="width:80%">
                    </div>
                    <div class="column">
                        RM 24
                    </div>
                    <div class="column">
                        <a>delete</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="TotalCart">
            <h1 style="width:50%;float:left">Total: RM24.00</h1>
            <a style="width:50%;float:right;text-align:right;margin:auto">Confirm Order</a>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html style="position:relative;min-height:89vh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cart </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>

<body style="margin-bottom:60px">
    <!-- <ul>
        <li><a href="/">Hans Cafe</a></li>
        <li><a href="/menu">Menu</a></li>
        <li><a href="/booking">Booking</a></li>
        @if (Route::has('login'))
        @auth
        <li style="float:right">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="active" onclick="event.preventDefault();this.closest('form').submit();" :href="route('logout')" class="text-sm text-gray-700 dark:text-gray-500">Log out</a>
            </form>
        </li>
        <li style="float:right"><a class="active" href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500">Account</a></li>
        <li style="float:right"><a class="active" href="{{ url('/cart') }}" class="text-sm text-gray-700 dark:text-gray-500">Cart</a></li>
        @else
        <li style="float:right"><a class="active" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500">Log in</a></li>
        @if (Route::has('register'))
        <li style="float:right"><a class="active" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500">Register</a></li>
        @endif
        @endauth
        @endif
    </ul> -->
    @include('layouts.navbar')
    <div class="container">
        </br>
        <div class="card" stlye="margin-top:10%">
            <div class="card-body">
                @include('flash-message')
                @if (!Cart::isEmpty())
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Cart List</h5>
                    </div>
                    <div class="col">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" style="float:right;">Clear Cart</button>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        Name
                    </div>
                    <div class="col-2">
                        Price (RM)
                    </div>
                    <div class="col-2">
                        Quantity
                    </div>
                    <div class="col-2">
                        Subtotal (RM)
                    </div>
                    <div class="col-2">
                        Actions
                    </div>
                </div>

                @foreach ($cartItems as $item)
                <div class="row">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{asset('storage/img/'.$item->attributes->image)}}" class="form-control"
                                    alt="Thumbnail">
                            </div>
                            <div class="col-8">
                                {{ $item->name }}
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        {{ number_format($item->price,2) }}
                    </div>
                    <div class="col-2">
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="id" value="{{ $item->id}}">
                                    <input type="number" name="quantity" value="{{ $item->quantity }}"
                                        class="form-control" />
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-info">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-2">
                        {{ number_format($item->price*$item->quantity,2) }}
                    </div>
                    <div class="col-2">
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            <button class="btn btn-outline-danger" style="width:50%">x</button>
                        </form>
                    </div>
                </div>
                @endforeach
                </br>
                <div class="row">
                    <div class="col-2">
                        <a href="/menu" class="btn btn-info">Continue Shopping</a>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-2">RM {{ number_format(Cart::getTotal(),2) }}</div>
                    <div class="col-2">
                        <form action="{{ route('cart.insert') }}" method="POST">
                            @csrf
                            <button class="btn btn-success" style="float:right;">Confirm
                                Order</button>
                        </form>
                    </div>
                    @else
                    <h3 class="text-3xl text-bold">No Item In Cart</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="footer w-100 position-absolute" style="bottom:0;height:110px">@include('layouts.footer')</div>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Cart </title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
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
    </ul>
    <div style="margin:20px;border: 2px groove; padding:20px; padding-bottom: 60px">
        @include('flash-message')
        @if (!Cart::isEmpty())
        <div>
            <h3 class="text-3xl text-bold" style="width:40%;float:left">Cart List</h3>
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="px-6 py-2 text-red-800 bg-red-300" style="width:20%;float:right;">Clear Cart</button>
            </form>
        </div>
        <div class="flex-1">
            <table class="w-full text-sm lg:text-base" cellspacing="0">
                <thead>
                    <tr class="h-12 uppercase">
                        <th class="hidden md:table-cell"></th>
                        <!-- <th class="text-left">Code</th> -->
                        <th class="text-left">Name</th>
                        <th class="hidden text-right md:table-cell">Price (RM)</th>
                        <th class="pl-5 text-left lg:text-right lg:pl-0">
                            <span class="lg:hidden" title="Quantity">Qtd</span>
                            <span class="hidden lg:inline">Quantity</span>
                        </th>
                        <th class="hidden text-right md:table-cell"> Subtotal (RM)</th>
                        <th class="hidden text-right md:table-cell"> Remove </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                    <tr>
                        <td class="hidden pb-4 md:table-cell">
                            <img src="{{asset('storage/img/'.$item->attributes->image)}}" class="w-20 rounded" alt="Thumbnail">
                        </td>
                        <!-- <td>
                            <p class="mb-2 md:ml-4">{{ $item->code }}</p>
                        </td> -->
                        <td>
                            <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                        </td>
                        <td class="hidden text-right md:table-cell">
                            <span class="text-sm font-medium lg:text-base">
                                {{ number_format($item->price,2) }}
                            </span>
                        </td>
                        <td class="justify-center mt-6 md:justify-end md:flex">
                            <div class="h-10 w-28">
                                <div class="relative flex flex-row w-full h-8">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id}}">
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-6 text-center bg-gray-300" style="height:25px"/>
                                        <button type="submit" class="px-2 pb-2 ml-2 pt-2 text-white bg-blue-500">Update</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td class="hidden text-right md:table-cell">
                            <span class="text-sm font-medium lg:text-base">
                                {{ number_format($item->price*$item->quantity,2) }}
                            </span>
                        </td>
                        <td class="hidden text-right md:table-cell">
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button class="px-4 py-2 text-white bg-red-600">x</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tr style="font-size:20px">
                    <td colspan=5 style='text-align:right; font-weight:bold'>Total: </td>
                    <td colspan=1 style='text-align:right; font-weight:bolder'>RM {{ number_format(Cart::getTotal(),2) }}</td>
                </tr>
            </table>
            <br>
            <div>
                <a href="/menu"><button class="px-6 py-2 text-green-800 bg-green-300" style="width:20%;float:left">Continue Shopping</button></a>
                </form>
                <form action="{{ route('cart.insert') }}" method="POST">
                    @csrf
                    <button class="px-6 py-2 text-green-800 bg-green-300" style="width:20%;float:right;">Confirm Order</button>
                </form>
            </div>
            <div>

            </div>
            @else
            <h3 class="text-3xl text-bold">No Item In Cart</h3>
            @endif
        </div>
    </div>
</body>

</html>
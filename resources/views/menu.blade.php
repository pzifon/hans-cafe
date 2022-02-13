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
        <x-slot name="header"></x-slot>
        @include('flash-message')
        <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%;">
            <a href="#main" class="w3-bar-item w3-button">Main Course</a>
            <a href="#sides" class="w3-bar-item w3-button">Sides</a>
            <a href="#beverages" class="w3-bar-item w3-button">Beverages</a>
            <a href="#dessert" class="w3-bar-item w3-button">Dessert</a>
        </div>
        <div style="margin-left:15%;margin-top:10px">
            <h1 id="main" style="font-size:20px">Main Course</h1>
            @foreach ($menu as $product)
            @if ($product->category == 'Main_Course')
            <div class="MenuContent">
                <div class="row">
                    <div class="column">
                        <img src="{{asset('storage/img/'.$product->image)}}" style="width:250px; height:150px;">
                    </div>
                    <div class="column">
                        <h2>{{ $product->name }}</h2>
                        <p class="des">{{ $product->description}}</p>
                        <p class="Cal">{{ $product->nutrition }}</p>
                    </div>
                    <div class="column">
                        <div class="row">
                            <h2 style="text-align:right">RM {{ number_format($product->price,2) }}</h2>
                        </div>
                        <div class="row">
                            @if (Route::has('login'))
                            @auth
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}" name="image">
                                <input type="hidden" value="1" name="quantity">
                                <button class="button">Add To Cart</button>
                            </form>
                            @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            <h1 id="sides" style="font-size:20px">Sides</h1>
            @foreach ($menu as $product)
            @if ($product->category == 'Sides')
            <div class="MenuContent">
                <div class="row">
                    <div class="column">
                        <img src="{{asset('storage/img/'.$product->image)}}" style="width:250px; height:150px;">
                    </div>
                    <div class="column">
                        <h2>{{ $product->name }}</h2>
                        <p class="des">{{ $product->description}}</p>
                        <p class="Cal">{{ $product->nutrition }}</p>
                    </div>
                    <div class="column">
                        <div class="row">
                            <h2 style="text-align:right">RM {{ number_format($product->price,2) }}</h2>
                        </div>
                        <div class="row">
                        @if (Route::has('login'))
                            @auth
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}" name="image">
                                <input type="hidden" value="1" name="quantity">
                                <button class="button">Add To Cart</button>
                            </form>
                            @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            <h1 id="beverages" style="font-size:20px">Beverages</h1>
            @foreach ($menu as $product)
            @if ($product->category == 'Beverages')
            <div class="MenuContent">
                <div class="row">
                    <div class="column">
                        <img src="{{asset('storage/img/'.$product->image)}}" style="width:250px; height:150px;">
                    </div>
                    <div class="column">
                        <h2>{{ $product->name }}</h2>
                        <p class="des">{{ $product->description}}</p>
                        <p class="Cal">{{ $product->nutrition }}</p>
                    </div>
                    <div class="column">
                        <div class="row">
                            <h2 style="text-align:right">RM {{ number_format($product->price,2) }}</h2>
                        </div>
                        <div class="row">
                            @if (Route::has('login'))
                            @auth
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}" name="image">
                                <input type="hidden" value="1" name="quantity">
                                <button class="button">Add To Cart</button>
                            </form>
                            @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            <h1 id="dessert" style="font-size:20px">Dessert</h1>
            @foreach ($menu as $product)
            @if ($product->category == 'Dessert')
            <div class="MenuContent">
                <div class="row">
                    <div class="column">
                        <img src="{{asset('storage/img/'.$product->image)}}" style="width:250px; height:150px;">
                    </div>
                    <div class="column">
                        <h2>{{ $product->name }}</h2>
                        <p class="des">{{ $product->description}}</p>
                        <p class="Cal">{{ $product->nutrition }}</p>
                    </div>
                    <div class="column">
                        <div class="row">
                            <h2 style="text-align:right">RM {{ number_format($product->price,2) }}</h2>
                        </div>
                        <div class="row">
                            @if (Route::has('login'))
                            @auth
                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="{{ $product->image }}" name="image">
                                <input type="hidden" value="1" name="quantity">
                                <button class="button">Add To Cart</button>
                            </form>
                            @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </x-app-layout>
</body>

</html>
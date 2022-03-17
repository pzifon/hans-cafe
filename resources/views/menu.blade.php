<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <!-- Styles -->
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
    @include('layouts.navbar')
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width:150px">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#main" class="nav-link active" aria-current="page">
                    Main Course
                </a>
            </li>
            <li class="nav-item">
                <a href="#sides" class="nav-link active" aria-current="page">
                    Sides
                </a>
            </li>
            <li class="nav-item">
                <a href="#beverages" class="nav-link active" aria-current="page">
                    Beverages
                </a>
            </li>
            <li class="nav-item">
                <a href="#dessert" class="nav-link active" aria-current="page">
                    Dessert
                </a>
            </li>
        </ul>
    </div>
    <div class="b-example-divider"></div>
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width:800px">
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

</html>
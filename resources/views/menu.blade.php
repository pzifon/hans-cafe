<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @include('layouts.navbar')
    <div style="height:50px"></div>
    <div class="container">
        <h1 style="font-size:20px">Main Course</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($menu as $product)
            @if ($product->category == 'Main_Course')
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('storage/img/'.$product->image)}}" class="img-thumbnail mw-auto" style="height:50%" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description}}</p>
                        <p class="card-text">{{ $product->nutrition}}</p>
                        <p class="card-text">RM {{ number_format($product->price,2) }}</p>
                        @if (Route::has('login'))
                        @auth
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->image }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                            <div class="position-relative">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button href="#" class="btn btn-primary" type="button">Add to cart</button> </div></div>
                        </form>
                        @endauth
                        @endif
                        
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        <div style="height:50px"></div>

<h1 style="font-size:20px">Sides</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($menu as $product)
            @if ($product->category == 'Sides')
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('storage/img/'.$product->image)}}" class="img-thumbnail mw-auto" style="height:50%" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description}}</p>
                        <p class="card-text">{{ $product->nutrition}}</p>
                        <p class="card-text">RM {{ number_format($product->price,2) }}</p>
                        @if (Route::has('login'))
                        @auth
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->image }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button href="#" class="btn btn-primary" type="button">Add to cart</button></div>
                        </form>
                        @endauth
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <div style="height:50px"></div>
        <h1 style="font-size:20px">Beverages</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($menu as $product)
            @if ($product->category == 'Beverages')
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('storage/img/'.$product->image)}}" class="img-thumbnail mw-auto" style="height:50%" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description}}</p>
                        <p class="card-text">{{ $product->nutrition}}</p>
                        <p class="card-text">RM {{ number_format($product->price,2) }}</p>
                        @if (Route::has('login'))
                        @auth
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->image }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button href="#" class="btn btn-primary" type="button">Add to cart</button></div>
                        </form>
                        @endauth
                        @endif
                    </div>
                </div>
            </div>

            @endif
            @endforeach
        </div>
        <div style="height:50px"></div>
        <h1 style="font-size:20px">Dessert</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($menu as $product)
            @if ($product->category == 'Dessert')
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('storage/img/'.$product->image)}}" class="img-thumbnail mw-auto" style="height:50%" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description}}</p>
                        <p class="card-text">{{ $product->nutrition}}</p>
                        <p class="card-text">RM {{ number_format($product->price,2) }}</p>
                        @if (Route::has('login'))
                        @auth
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->image }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button href="#" class="btn btn-primary" type="button">Add to cart</button></div>
                        </form>
                        @endauth
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        @media screen and (min-width: 601px) {
            div {
                font-size: 30px;
            }

            div.card-body {
                font-size: 20px;
            }

            p.price {
                font-size: 18px;
            }

            p.product {
                font-size: 18px;
            }

            img {
                height: 80vh;
            }

            a.nav-link {
                font-size: 20px;
            }
        }

        @media screen and (max-width: 600px) {
            div {
                font-size: 20px;
            }

            div.card-body {
                font-size: 20px;
            }

            p.price {
                font-size: 15px;
            }

            p.product {
                font-size: 15px;
            }

            img {
                height: auto;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    @include('flash-message')

    <div class="container">
        <div class="row mt-4 mb-1">
            <h1 class="col-10 mt-2 mb-0" style="font-size:20px">Main Course</h1>


            <div class="col-2 text-end mb-1">
                @if (Route::has('login'))
                @auth
                @if (Auth::user()->hasRole('employee') || Auth::user()->hasRole('admin'))
                <a href="/addMenu">
                    <button type="button" class="btn btn-danger btn-sm tab-pane fade show active" id="AddMenu">+ Add Menu</button>
                </a>
                @endif
                @endauth
                @endif
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($menu as $product)
            @if ($product->category == 'Main_Course')
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('storage/img/'.$product->image)}}" class="card-img-top" alt="..." style="width:100%;height:50%">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="col-10 card-title">{{ $product->name }}</h5>
                            @if (Route::has('login'))
                            @auth
                            @if (Auth::user()->hasRole('employee') || Auth::user()->hasRole('admin'))
                            <a href="{{ url('/editMenu/'.$product->id) }}" class="col-1">
                                <i class="col-1 p-0 fs-6 bi bi-pencil-fill"></i>
                            </a>
                            <a href="{{ url('/delete/'.$product->id) }}" class="col-1 text-reset">
                                <i class="col-1 p-0 fs-6 bi bi-trash3-fill"></i>
                            </a>
                            @endif
                            @endauth
                            @endif
                            <h6 class="col card-subtitle mb-2 text-muted">{{ $product->menu_code }}</h6>
                        </div>
                        <p class="product card-text">{{ $product->description}}</p>
                        <p class="product card-text">{{ $product->nutrition}}</p>
                    </div>
                    <div class="card-footer" style="border-top: none; background-color: transparent">
                        <div class="row">
                            <p class="price card-text col">RM {{ number_format($product->price,2) }}</p>
                            <div class="col">
                                @if (Route::has('login'))
                                @auth
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="{{ $product->image }}" name="image">
                                    <input type="hidden" value="1" name="quantity">
                                    @if (Auth::user()->hasRole('customer'))
                                    <button href="#" class="btn btn-primary float-end">Add to cart</button>
                                    @endif
                                </form>
                                @endauth
                                @endif
                            </div>
                        </div>
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
                    <img src="{{asset('storage/img/'.$product->image)}}" class="card-img-top" alt="..." style="width:100%;height:50%">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="col-10 card-title">{{ $product->name }}</h5>
                            @if (Route::has('login'))
                            @auth
                            @if (Auth::user()->hasRole('employee') || Auth::user()->hasRole('admin'))
                            <a href="{{ url('/editMenu/'.$product->id) }}" class="col-1">
                                <i class="col-1 p-0 fs-6 bi bi-pencil-fill"></i>
                            </a>
                            <a href="{{ url('/delete/'.$product->id) }}" class="col-1 text-reset">
                                <i class="col-1 p-0 fs-6 bi bi-trash3-fill"></i>
                            </a>
                            @endif
                            @endauth
                            @endif
                            <h6 class="col card-subtitle mb-2 text-muted">{{ $product->menu_code }}</h6>

                        </div>
                        <p class="product card-text">{{ $product->description}}</p>
                        <p class="product card-text">{{ $product->nutrition}}</p>
                    </div>
                    <div class="card-footer" style="border-top: none; background-color: transparent">
                        <div class="row">
                            <p class="price card-text col">RM {{ number_format($product->price,2) }}</p>
                            <div class="col">
                                @if (Route::has('login'))
                                @auth
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="{{ $product->image }}" name="image">
                                    <input type="hidden" value="1" name="quantity">
                                    @if (Auth::user()->hasRole('customer'))
                                    <button href="#" class="btn btn-primary float-end">Add to cart</button>
                                    @endif
                                </form>
                                @endauth
                                @endif
                            </div>
                        </div>
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
                    <img src="{{asset('storage/img/'.$product->image)}}" class="card-img-top" alt="..." style="width:100%;height:50%">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="col-10 card-title">{{ $product->name }}</h5>
                            @if (Route::has('login'))
                            @auth
                            @if (Auth::user()->hasRole('employee') || Auth::user()->hasRole('admin'))
                            <a href="{{ url('/editMenu/'.$product->id) }}" class="col-1">
                                <i class="col-1 p-0 fs-6 bi bi-pencil-fill"></i>
                            </a>
                            <a href="{{ url('/delete/'.$product->id) }}" class="col-1 text-reset">
                                <i class="col-1 p-0 fs-6 bi bi-trash3-fill"></i>
                            </a>
                            @endif
                            @endauth
                            @endif
                            <h6 class="col card-subtitle mb-2 text-muted">{{ $product->menu_code }}</h6>
                        </div>
                        <p class="product card-text">{{ $product->description}}</p>
                        <p class="product card-text">{{ $product->nutrition}}</p>
                    </div>
                    <div class="card-footer" style="border-top: none; background-color: transparent">
                        <div class="row">
                            <p class="price card-text col">RM {{ number_format($product->price,2) }}</p>
                            <div class="col">
                                @if (Route::has('login'))
                                @auth
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="{{ $product->image }}" name="image">
                                    <input type="hidden" value="1" name="quantity">
                                    @if (Auth::user()->hasRole('customer'))
                                    <button href="#" class="btn btn-primary float-end">Add to cart</button>
                                    @endif
                                </form>
                                @endauth
                                @endif
                            </div>
                        </div>
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
                    <img src="{{asset('storage/img/'.$product->image)}}" class="card-img-top" alt="..." style="width:100%;height:50%">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="col-10 card-title">{{ $product->name }}</h5>
                            @if (Route::has('login'))
                            @auth
                            @if (Auth::user()->hasRole('employee') || Auth::user()->hasRole('admin'))
                            <a href="{{ url('/editMenu/'.$product->id) }}" class="col-1">
                                <i class="col-1 p-0 fs-6 bi bi-pencil-fill"></i>
                            </a>
                            <a href="{{ url('/delete/'.$product->id) }}" class="col-1 text-reset">
                                <i class="col-1 p-0 fs-6 bi bi-trash3-fill"></i>
                            </a>
                            @endif
                            @endauth
                            @endif
                            <h6 class="col card-subtitle mb-2 text-muted">{{ $product->menu_code }}</h6>
                        </div>
                        <p class="product card-text">{{ $product->description}}</p>
                        <p class="product card-text">{{ $product->nutrition}}</p>
                    </div>
                    <div class="card-footer" style="border-top: none; background-color: transparent">
                        <div class="row">
                            <p class="price card-text col">RM {{ number_format($product->price,2) }}</p>
                            <div class="col">
                                @if (Route::has('login'))
                                @auth
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="{{ $product->image }}" name="image">
                                    <input type="hidden" value="1" name="quantity">
                                    @if (Auth::user()->hasRole('customer'))
                                    <button href="#" class="btn btn-primary float-end">Add to cart</button>
                                    @endif
                                </form>
                                @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <br>
    @include('layouts.footer')
</body>

</html>
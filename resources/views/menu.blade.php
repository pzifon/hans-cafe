<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    <div class="container">
        <div class="row mt-4 mb-1">
            <h1 class="col-8 mt-2 mb-0" style="font-size:20px">Main Course</h1>

            <div class="col-4 text-end">
                @if (Route::has('login'))
                @auth
                @if (Auth::user()->hasRole('employee') || Auth::user()->hasRole('admin'))
                <button type="button" class="btn btn-danger btn-sm tab-pane fade show active" id="AddMenu"
                    role="tabpanel" aria-labelledby="add-menu-tab" name="add_menu" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop2">+ Add Menu</button>
                @endif
                @endauth
                @endif

                <script type='text/javascript'>
                function myFunction2() {
                    document.getElementById("AddMenu").style.display = "none";
                }

                function myFunction1() {
                    document.getElementById("AddMenu").style.display = "block";
                }
                </script>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Photo</label>
                                    <input type="file" class="form-control" id="inputGroupFile01">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Food Category</span>
                                    <input class="form-control" list="datalistOptions" id="exampleDataList"
                                        placeholder="Type to search...">
                                    <datalist id="datalistOptions">
                                        <option value="Main Course">
                                        <option value="Sides">
                                        <option value="Beverages">
                                        <option value="Dessert">

                                    </datalist>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Menu
                                        Code</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Calories</span>
                                    <input type="email" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of Modal -->

        <!-- Modal 1-->
        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Calories</span>
                                    <input type="email" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Submit Changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of Modal 1-->


        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($menu as $product)
            @if ($product->category == 'Main_Course')
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('storage/img/'.$product->image)}}" class="card-img-top" alt="..."
                        style="width:100%;height:50%">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="col-10 card-title">{{ $product->name }}</h5>
                            @if (Route::has('login'))
                            @auth
                            @if (Auth::user()->hasRole('employee') || Auth::user()->hasRole('admin'))
                            <i class="col-1 p-0 fs-6 bi bi-pencil-fill" id="EditMenu" role="tabpanel"
                                aria-labelledby="edit-menu-tab" name="edit_menu" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop1"></i>
                            <i class="col-1 p-0 fs-6 bi bi-trash3-fill "></i>
                            @endif
                            @endauth
                            @endif
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
                    <img src="{{asset('storage/img/'.$product->image)}}" class="card-img-top" alt="..."
                        style="width:100%;height:50%">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="col-10 card-title">{{ $product->name }}</h5>
                            @if (Route::has('login'))
                            @auth
                            @if (Auth::user()->hasRole('employee') || Auth::user()->hasRole('admin'))
                            <i class="col-1 bi bi-pencil-fill" id="EditMenu" role="tabpanel"
                                aria-labelledby="edit-menu-tab" name="edit_menu" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop1"></i>
                            <i class="col-1 bi bi-trash3-fill "></i>
                            @endif
                            @endauth
                            @endif
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
                    <img src="{{asset('storage/img/'.$product->image)}}" class="card-img-top" alt="..."
                        style="width:100%;height:50%">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="col-10 card-title">{{ $product->name }}</h5>
                            @if (Route::has('login'))
                            @auth
                            @if (Auth::user()->hasRole('employee') || Auth::user()->hasRole('admin'))
                            <i class="col-1 bi bi-pencil-fill" id="EditMenu" role="tabpanel"
                                aria-labelledby="edit-menu-tab" name="edit_menu" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop1"></i>
                            <i class="col-1 bi bi-trash3-fill "></i>
                            @endif
                            @endauth
                            @endif
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
                    <img src="{{asset('storage/img/'.$product->image)}}" class="card-img-top" alt="..."
                        style="width:100%;height:50%">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="col-10 card-title">{{ $product->name }}</h5>
                            @if (Route::has('login'))
                            @auth
                            @if (Auth::user()->hasRole('employee') || Auth::user()->hasRole('admin'))
                            <i class="col-1 bi bi-pencil-fill" id="EditMenu" role="tabpanel"
                                aria-labelledby="edit-menu-tab" name="edit_menu" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop1"></i>
                            <i class="col-1 bi bi-trash3-fill "></i>
                            @endif
                            @endauth
                            @endif
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
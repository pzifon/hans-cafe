<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cart </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <style>
        @media screen and (min-width: 601px) {
            div#MobileView {
                display: none;
            }
        }

        @media screen and (max-width: 600px) {
            div#WebView {
                display: none;
            }

            #contShop {
                font-size: 10px;
            }

            #confirm {
                font-size: 10px;
            }
        }
    </style>

</head>

<body class="d-flex flex-column min-vh-100">
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
                            <button class="btn btn-danger btn-sm" style="float:right;">Clear Cart</button>
                        </form>
                    </div>
                </div>

                <div class="row mt-2" id="WebView">
                    <div class="col-2">

                    </div>
                    <div class="col-3">
                        Name
                    </div>
                    <div class="col-2">
                        Price (RM)
                    </div>
                    <!-- <div class="col-1 d-flex justify-content-center">
                        Take Away
                    </div> -->
                    <div class="col-2">
                        Quantity
                    </div>
                    <div class="col-2">
                        Subtotal (RM)
                    </div>
                    <div class="col-1">
                        Action
                    </div>
                </div>


                @foreach ($cartItems as $item)
                <div class="row mt-2" id="WebView">
                    <div class="col-2">
                        <img src="{{asset('storage/img/'.$item->attributes->image)}}" class="form-control" alt="Thumbnail">
                    </div>
                    <div class="col-3">
                        {{ $item->name }}
                    </div>
                    <div class="col-2">
                        {{ number_format($item->price,2) }}
                    </div>
                    <!-- <div class="col-1">
                        <div class="form-check d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        </div>
                    </div> -->
                    <div class="col-2">
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="id" value="{{ $item->id}}">
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control" />
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
                    <div class="col-1">
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            <button class="btn btn-outline-danger" style="width:50%">x</button>
                        </form>
                    </div>
                </div>
                @endforeach


                @foreach ($cartItems as $item)
                <div class="row mt-2" id="MobileView">
                    <div class="col-1 ps-1">
                        <form action="{{ route('cart.remove') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            <button class="btn btn-outline-danger btn-sm" style="height:35px;">x</button>
                        </form>
                    </div>

                    <div class="col-4">
                        <img src="{{asset('storage/img/'.$item->attributes->image)}}" class="form-control mt-4 p-0 h-50" alt="Thumbnail">
                    </div>

                    <div class="col-6">
                        <div class="row ms-1">
                            {{ $item->name }}
                        </div>
                        <div class="row ms-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> Take Away
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6 mt-auto mb-0">
                                {{ number_format($item->price*$item->quantity,2) }}
                            </div>

                            <div class="col-6 mt-auto mb-0">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <div class="row ms-auto me-0">
                                        <div class="col-5 p-0 m-0">
                                            <input type="hidden" name="id" value="{{ $item->id}}">
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control form-control-sm" />
                                        </div>
                                        <div class="col-1 ps-0">
                                            <button type="submit" class="btn btn-outline-info btn-sm ms-0">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </br>
                <div class="row">
                    <div class="col-4 ps-1 pe-0">
                        <a href="/menu" class="btn btn-info btn-sm" id="contShop">Continue Shopping</a>
                    </div>
                    <div class="col-5 text-end pe-1">Total: RM {{ number_format(Cart::getTotal(),2) }}</div>
                    <div class="col-3 ps-0 pe-1">
                        <form action="{{ route('cart.insert') }}" method="POST">
                            @csrf
                            <button class="btn btn-success btn-sm float-end" id="confirm">Confirm
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
</body>

</html>
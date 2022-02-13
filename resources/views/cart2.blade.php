<!DOCTYPE html>
<html>

<head>
    <title> Cart </title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/cart.css') }}">
    @section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(".update-cart").click(function(e) {
            e.preventDefault();
            document.getElementById("headline").value = "red";
            var ele = $(this);

            var parent_row = ele.parents("tr");

            var quantity = parent_row.find(".quantity").val();

            var product_subtotal = parent_row.find("span.product-subtotal");

            var cart_total = $(".cart-total");

            var loading = parent_row.find(".btn-loading");

            loading.show();

            $.ajax({
                url: "{{ url('/update-cart') }}",
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id"),
                    quantity: quantity
                },
                dataType: "json",
                success: function(response) {

                    loading.hide();

                    $("span#status").html('<div class="alert alert-success">' + response.msg + '</div>');

                    $("#header-bar").html(response.data);

                    product_subtotal.text(response.subTotal);

                    cart_total.text(response.total);
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var cart_total = $(".cart-total");

            if (confirm("Are you sure")) {
                $.ajax({
                    url: "{{ url('/remove-from-cart') }}",
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id")
                    },
                    dataType: "json",
                    success: function(response) {

                        parent_row.remove();

                        $("span#status").html('<div class="alert alert-success">' + response.msg + '</div>');

                        $("#header-bar").html(response.data);

                        cart_total.text(response.total);
                    }
                });
            }
        });
    </script>

    @endsection

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        /* .CartContent {
            padding: 10px 10px;
        } */

        /* .TotalCart {
            padding-left: 10px;
            width: 98%;
            margin-left: 10px;
            position: fixed;
            bottom: 0px;
            border-style: inset;
            border-bottom-style: none;
        } */

        /* .column {
            text-align: center;
            float: left;
            width: 15%;
            padding: 5px;
        }

        .column-B {
            float: left;
            width: 40%;
            padding: 5px;
        } */

        /* Clearfix (clear floats)
        .row::after {
            content: "";
            clear: both;
            display: table;
        } */

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
                <a class="active" onclick="event.preventDefault();this.closest('form').submit();" :href="route('logout')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log out</a>
            </form>
        </li>
        <li style="float:right"><a class="active" href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Account</a></li>
        <li style="float:right"><a class="active" href="{{ url('/cart') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Cart</a></li>
        @else
        <li style="float:right"><a class="active" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>
        @if (Route::has('register'))
        <li style="float:right"><a class="active" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
        @endif
        @endauth
        @endif
    </ul>
    <!-- <div style="">
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
    </div> -->

    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <h2 id="headline" style="font-size: 20px;margin-top: 0px;margin-left: 10px">Cart</h1>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
        </thead>
        <tbody>
            <?php $total = 0 ?>
            @if(session('cart'))
            @foreach(session('cart') as $code => $details)
            <?php $total += $details['price'] * $details['quantity'] ?>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="{{asset('storage/img/'.$details['photo'])}}" width="100" height="100" class="img-responsive" /></div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price">RM{{ number_format($details['price'],2) }}</td>
                <td data-th="Quantity">
                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                </td>
                <td data-th="Subtotal" class="text-center">RM{{ number_format($details['price'] * $details['quantity'],2) }}</td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm update-cart" data-id="{{ $code }}" onclick=""><i class="fa fa-refresh"></i></button>
                    <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $code }}"><i class="fa fa-trash-o"></i></button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total RM{{ number_format($total,2) }}</strong></td>
            </tr>
            <tr>
                <td><a href="{{ url('/menu') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total RM{{ number_format($total,2) }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
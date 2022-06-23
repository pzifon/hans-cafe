<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Order</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var price = 0;
            const orderlist = [];
            var i = 0;

            $(document).on('click', '.itemid', function(e) {
                e.preventDefault();
                var menu_code = $(this).val();
                //console.log(menu_code);
                $.ajax({
                    type: "GET",
                    url: "/additem/" + menu_code,
                    success: function(response) {
                        //console.log(response);
                        if (response.status == 404) {

                        } else {
                            $.each(response.details, function(key, item) {
                                $('#detailbody').append('<tr>\
                                    <td>' + item.name + '</td>\
                                    <td><input type="number" name="item" value="1"></td>\
                                    <td>' + item.price + '</td>\
                                </tr>');
                                price += parseFloat(item.price);
                                //console.log(price);
                            });
                            var total = price;
                            //console.log(total);
                            $('#totalprice').html(total);
                            orderlist[i] = response.details[0];
                            //console.log(orderlist);
                            i++;
                        }
                    }
                });
            });

            $(document).on('click', '.submitbtn', function(e) {
                e.preventDefault();

                var data = {
                    'price': parseFloat(price),
                    'item': orderlist,
                }

                console.log(price);
                $.ajax({
                    type: "POST",
                    url: "/orderpos",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        price = 0;
                        i = 0;
                        $('#detailbody').html('');
                        $('#totalprice').html('');
                    },
                });
            });
        });
    </script>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="row mt-2 mx-1">
        <nav class="row">
            <div class="col-11">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="dine-in-tab" data-bs-toggle="tab" data-bs-target="#dine-in" type="button" role="tab" aria-controls="dine-in" aria-selected="true">Dine in</button>
                    <button class="nav-link" id="take-away-tab" data-bs-toggle="tab" data-bs-target="#take-away" type="button" role="tab" aria-controls="take-away" aria-selected="false">Take Away</button>
                </div>
            </div>
            <div class="col-1">
                <a class="text-end btn btn-success" aria-current="page" href="/orderlist">Order List</a>
            </div>
        </nav>

        <div class="row mt-3">
            <div class="col-8">
                <div class="row tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="dine-in" role="tabpanel" aria-labelledby="dine-in-tab">
                        <div class="tab-content border border-dark p-3 pb-0" id="pills-tabContent" style="padding: auto;">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <div class="row row-cols-5">
                                    @foreach ($menu as $product)
                                    <button class="itemid btn card-body bg-light" value="{{ $product->menu_code }}">
                                        {{ $product->name }}
                                    </button>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="main-course" role="tabpanel" aria-labelledby="main-course-tab">
                                <div class="row row-cols-5">
                                    @foreach ($menu as $product)
                                    @if ($product->category == 'Main_Course')
                                    <div class="col mb-3">
                                        <div class="card h-100">
                                            <div class="card-body bg-light">
                                                <p class="card-title h6 text-center">{{ $product->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sides" role="tabpanel" aria-labelledby="sides-tab">
                                <div class="row row-cols-5">
                                    @foreach ($menu as $product)
                                    @if ($product->category == 'Sides')
                                    <div class="col mb-3">
                                        <div class="card h-100">
                                            <div class="card-body bg-light">
                                                <p class="card-title h6 text-center">{{ $product->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="beverages" role="tabpanel" aria-labelledby="beverages-tab">
                                <div class="row row-cols-5">
                                    @foreach ($menu as $product)
                                    @if ($product->category == 'Beverages')
                                    <div class="col mb-3">
                                        <div class="card h-100">
                                            <div class="card-body bg-light">
                                                <p class="card-title h6 text-center">{{ $product->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="dessert" role="tabpanel" aria-labelledby="dessert-tab">
                                <div class="row row-cols-5">
                                    @foreach ($menu as $product)
                                    @if ($product->category == 'Dessert')
                                    <div class="col mb-3">
                                        <div class="card h-100">
                                            <div class="card-body bg-light">
                                                <p class="card-title h6 text-center">{{ $product->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-pills m-2" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active mx-auto my-2" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true" style="margin: 0px;">All</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link mx-auto mt-2" id="main-course-tab" data-bs-toggle="pill" data-bs-target="#main-course" type="button" role="tab" aria-controls="main-course" aria-selected="false">Main Course</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link mx-auto mt-2" id="sides-tab" data-bs-toggle="pill" data-bs-target="#sides" type="button" role="tab" aria-controls="sides" aria-selected="false">Sides</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link mx-auto mt-2" id="beverages-tab" data-bs-toggle="pill" data-bs-target="#beverages" type="button" role="tab" aria-controls="beverages" aria-selected="false">Beverages</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link mx-auto mt-2" id="dessert-tab" data-bs-toggle="pill" data-bs-target="#dessert" type="button" role="tab" aria-controls="dessert" aria-selected="false">Dessert</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="take-away" role="tabpanel" aria-labelledby="take-away-tab">fuck you
                    </div>
                </div>

                <!-- <div class="row mt-3">
                    <div class="border border-dark">
                        <ul class="nav nav-pills m-2" id="pills-tab" role="tablist">
                            <li class="nav-item col border border-dark me-3">
                                <button class="nav-link active mx-auto my-2" id="all-tab" data-bs-toggle="pill"
                                    data-bs-target="#all" type="button" role="tab" aria-controls="all"
                                    aria-selected="true">All</button>
                            </li>
                            <li class="nav-item col border border-dark me-3">
                                <button class="nav-link mx-auto mt-2" id="main-course-tab" data-bs-toggle="pill"
                                    data-bs-target="#main-course" type="button" role="tab" aria-controls="main-course"
                                    aria-selected="false">Main Course</button>
                            </li>
                            <li class="nav-item col border border-dark me-3">
                                <button class="nav-link mx-auto mt-2" id="sides-tab" data-bs-toggle="pill"
                                    data-bs-target="#sides" type="button" role="tab" aria-controls="sides"
                                    aria-selected="false">Sides</button>
                            </li>
                            <li class="nav-item col border border-dark me-3">
                                <button class="nav-link mx-auto mt-2" id="beverages-tab" data-bs-toggle="pill"
                                    data-bs-target="#beverages" type="button" role="tab" aria-controls="beverages"
                                    aria-selected="false">Beverages</button>
                            </li>
                            <li class="nav-item col border border-dark">
                                <button class="nav-link mx-auto mt-2" id="dessert-tab" data-bs-toggle="pill"
                                    data-bs-target="#dessert" type="button" role="tab" aria-controls="dessert"
                                    aria-selected="false">Dessert</button>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>

            <div class="col-4 border border-dark">
                <table class="table">

                    <tbody>
                        <!-- <tr>
                            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-dash-square bg-danger" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                </svg>
                            </td>

                            <td>
                                <p id="demo"></p>
                            </td>
                            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-dash-square bg-danger" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                </svg>
                            </td>
                            <td>1</td>
                            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-square bg-success" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg></td>
                            <td>RM 5.90</td>
                        </tr>
                        <tr>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-dash-square bg-danger" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                </svg>
                            </td>
                            <td>Egg Benedict</td>
                            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-dash-square bg-danger" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                </svg>
                            </td>
                            <td>1</td>
                            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-square bg-success" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg></td>
                            <td>RM 5.90</td>
                        </tr>
                        <tr>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-dash-square bg-danger" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                </svg>
                            </td>
                            <td>Egg Benedict</td>
                            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-dash-square bg-danger" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                </svg>
                            </td>
                            <td>1</td>
                            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-square bg-success" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg></td>
                            <td>RM 5.90</td>
                        </tr> -->
                        <tr id="detailbody">
                        </tr>
                        <tr id="totalprice">
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="border border-0 p-3 mt-5">

            <div class="text-end">
                <input class="btn btn-primary btn-lg submitbtn" type="submit" value="Submit">
            </div>

        </div>
    </div>


</body>

@include('layouts.footer')

</html>
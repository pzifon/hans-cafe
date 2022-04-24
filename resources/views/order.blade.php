<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    @include('layouts.navbar')
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="dine-in-tab" data-bs-toggle="tab" data-bs-target="#dine-in"
                    type="button" role="tab" aria-controls="dine-in" aria-selected="true">Dine in</button>
                <button class="nav-link" id="take-away-tab" data-bs-toggle="tab" data-bs-target="#take-away"
                    type="button" role="tab" aria-controls="take-away" aria-selected="false">Take Away</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="dine-in" role="tabpanel" aria-labelledby="dine-in-tab">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="row row-cols-5">
                            @foreach ($menu as $product)
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="main-course" role="tabpanel" aria-labelledby="main-course-tab">
                        <div class="row row-cols-5">
                            @foreach ($menu as $product)
                            @if ($product->category == 'Main_Course')
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
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
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
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
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
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
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <ul class="nav nav-pills row" id="pills-tab" role="tablist">
                    <li class="nav-item col" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all"
                            type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                    </li>
                    <li class="nav-item col" role="presentation">
                        <button class="nav-link" id="main-course-tab" data-bs-toggle="pill"
                            data-bs-target="#main-course" type="button" role="tab" aria-controls="main-course"
                            aria-selected="false">Main Course</button>
                    </li>
                    <li class="nav-item col" role="presentation">
                        <button class="nav-link" id="sides-tab" data-bs-toggle="pill" data-bs-target="#sides"
                            type="button" role="tab" aria-controls="sides" aria-selected="false">Sides</button>
                    </li>
                    <li class="nav-item col" role="presentation">
                        <button class="nav-link" id="beverages-tab" data-bs-toggle="pill" data-bs-target="#beverages"
                            type="button" role="tab" aria-controls="beverages" aria-selected="false">Beverages</button>
                    </li>
                    <li class="nav-item col" role="presentation">
                        <button class="nav-link" id="dessert-tab" data-bs-toggle="pill" data-bs-target="#dessert"
                            type="button" role="tab" aria-controls="dessert" aria-selected="false">Dessert</button>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade" id="take-away" role="tabpanel" aria-labelledby="take-away-tab">fuck you</div>
        </div>
    </div>
</body>

</html>
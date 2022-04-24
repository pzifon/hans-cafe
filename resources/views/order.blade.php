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
                <div>
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
                        <!-- @foreach ($menu as $product)
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
                        @endforeach -->
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="take-away" role="tabpanel" aria-labelledby="take-away-tab">profile</div>
        </div>
    </div>
</body>

</html>
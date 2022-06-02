<!DOCTYPE html>
<html lang="en" style="position:relative;min-height:89vh">

<?php
    $edit_section = '$_GET[edit]';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="row mt-3 mx-0">
        <div class="col-2 ps-5">
            <div class="row">
                <div class="col-2">
                    <span class="dot"
                        style=" height: 25px; width: 25px; background-color: red;  border-radius: 50%;  display: inline-block;"></span>
                </div>
                <div class="col-10">
                    <p>Not Available</p>
                </div>
            </div>
        </div>

        <div class="col-2 ps-5">
            <div class="row">
                <div class="col-2">
                    <span class="dot"
                        style=" height: 25px; width: 25px; background-color: #FED000;  border-radius: 50%;  display: inline-block;"></span>
                </div>
                <div class="col-10">
                    <p>Low Stock</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-0 mt-2">
        <div class="col-sm-4 px-5">
            <p class="fs-5">&nbsp;<b>Condiment</b></p>
            @if ($category == "condiment")
            <form action="/update" method="post" action="/action_page.php">
            @csrf
                <div class="card">
                    <i class="bi bi-pencil-fill text-end"></i>
                    <div class="border border-secondary\ m-3 mt-0">
                        <div class="card-body">
                            <dl class="row mb-0 p-3 card-text">
                                @foreach ($condiment as $item)
                                <dd class="col-sm-9">{{ $item->name }}</dd>
                                <dd class="col-sm-3 text-center">
                                    <input type="hidden" name="item_code[]" value="{{ $item->item_code }}">
                                    <input type="number" name="item_qty[]" class="form-control" style="width:100%"
                                        value="{{ $item->stock }}" min=0 max=100 required>
                                </dd>
                                @endforeach
                            </dl>
                        </div>
                    </div>
                    <button type="submit" name="category" value="condiment" class="btn btn-outline-dark me-5"
                        style="float: right;">UPDATE</button>
                </div>
            </form>
            @else
            <div class="card">
                <i class="bi bi-pencil-fill text-end"></i>
                <div class="border border-secondary\ m-3 mt-0">
                    <div class="card-body">
                        <dl class="row mb-0 p-3 card-text">
                            @foreach ($condiment as $item)
                            @if ($item->stock == 0)
                            <dd class="col-sm-10 text-danger">{{ $item->name }}</dd>
                            <dd class="col-sm-2 text-center text-danger">{{ $item->stock }}</dd>
                            @elseif ($item->stock < 5) <dd class="col-sm-10 text-warning">{{ $item->name }}</dd>
                                <dd class="col-sm-2 text-center text-warning">{{ $item->stock }}</dd>
                                @else
                                <dd class="col-sm-10">{{ $item->name }}</dd>
                                <dd class="col-sm-2 text-center">{{ $item->stock }}</dd>
                                @endif
                                @endforeach
                        </dl>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="col-sm-4 px-5">
            <p class="fs-5">&nbsp;<b>Dairy</b></p>
            @if ($category == "dairy")
            <form action="/update" method="post" action="/action_page.php">
            @csrf
                <div class="card">
                    <i class="bi bi-pencil-fill text-end"></i>
                    <div class="border border-secondary\ m-3 mt-0">
                        <div class="card-body">
                            <dl class="row mb-0 p-3 card-text">
                                @foreach ($dairy as $item)
                                <dd class="col-sm-9">{{ $item->name }}</dd>
                                <dd class="col-sm-3 text-center">
                                    <input type="hidden" name="item_code[]" value="{{ $item->item_code }}">
                                    <input type="number" name="item_qty[]" class="form-control" style="width:100%"
                                        value="{{ $item->stock }}" min=0 max=100 required>
                                </dd>
                                @endforeach
                            </dl>
                        </div>
                    </div>
                    <button type="submit" name="category" value="dairy" class="btn btn-outline-dark me-5"
                        style="float: right;">UPDATE</button>
                </div>
            </form>
            @else
            <div class="card">
                <i class="bi bi-pencil-fill text-end"></i>
                <div class="border border-secondary\ m-3 mt-0">
                    <div class="card-body">
                        <dl class="row mb-0 p-3 card-text">
                            @foreach ($dairy as $item)
                            @if ($item->stock == 0)
                            <dd class="col-sm-10 text-danger">{{ $item->name }}</dd>
                            <dd class="col-sm-2 text-center text-danger">{{ $item->stock }}</dd>
                            @elseif ($item->stock < 5) <dd class="col-sm-10 text-warning">{{ $item->name }}</dd>
                                <dd class="col-sm-2 text-center text-warning">{{ $item->stock }}</dd>
                                @else
                                <dd class="col-sm-10">{{ $item->name }}</dd>
                                <dd class="col-sm-2 text-center">{{ $item->stock }}</dd>
                                @endif
                                @endforeach
                        </dl>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="col-sm-4 px-5">
            <p class="fs-5">&nbsp;<b>Meat</b></p>
            @if ($category == "meat")
            <form action="/update" method="post" action="/action_page.php">
            @csrf
                <div class="card">
                    <i class="bi bi-pencil-fill text-end"></i>
                    <div class="border border-secondary\ m-3 mt-0">
                        <div class="card-body">
                            <dl class="row mb-0 p-3 card-text">
                                @foreach ($meat as $item)
                                <dd class="col-sm-9">{{ $item->name }}</dd>
                                <dd class="col-sm-3 text-center">
                                    <input type="hidden" name="item_code[]" value="{{ $item->item_code }}">
                                    <input type="number" name="item_qty[]" class="form-control" style="width:100%"
                                        value="{{ $item->stock }}" min=0 max=100 required>
                                </dd>
                                @endforeach
                            </dl>
                        </div>
                    </div>
                    <button type="submit" name="category" value="meat" class="btn btn-outline-dark me-5"
                        style="float: right;">UPDATE</button>
                </div>
            </form>
            @else
            <div class="card">
                <i class="bi bi-pencil-fill text-end"></i>
                <div class="border border-secondary\ m-3 mt-0">
                    <div class="card-body">
                        <dl class="row mb-0 p-3 card-text">
                            @foreach ($meat as $item)
                            @if ($item->stock == 0)
                            <dd class="col-sm-10 text-danger">{{ $item->name }}</dd>
                            <dd class="col-sm-2 text-center text-danger">{{ $item->stock }}</dd>
                            @elseif ($item->stock < 5) <dd class="col-sm-10 text-warning">{{ $item->name }}</dd>
                                <dd class="col-sm-2 text-center text-warning">{{ $item->stock }}</dd>
                                @else
                                <dd class="col-sm-10">{{ $item->name }}</dd>
                                <dd class="col-sm-2 text-center">{{ $item->stock }}</dd>
                                @endif
                                @endforeach
                        </dl>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@include('layouts.footer')
</body>
</html>
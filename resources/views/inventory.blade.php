<!DOCTYPE html>
<html lang="en" style="position:relative;min-height:89vh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body style="margin-bottom:60px">
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
        @include('flash-message')
        <div class="row mx-0 mt-2">
            <div class="col-sm-4 px-5">
                <p class="fs-5">&nbsp;<b>Condiment</b></p>
                <div class="card">
                    <a href="/edit_inventory/condiment" class="bi bi-pencil-fill text-end"></a>
                    <div class="border border-secondary\ m-3 mt-0">
                        <div class="card-body">
                            <dl class="row mb-0 p-3 card-text">
                                @foreach ($condiment as $item)
                                @if ($item->stock == 0)
                                <dd class="col-sm-10 text-danger">{{ $item->name }}</dd>
                                <dd class="col-sm-2 text-center text-danger">{{ $item->stock }}</dd>
                                @elseif ($item->stock < 5) 
                                <dd class="col-sm-10 text-warning">{{ $item->name }}</dd>
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
            </div>

            <div class="col-sm-4 px-5">
                <p class="fs-5">&nbsp;<b>Dairy</b></p>
                <div class="card">
                    <a href="/edit_inventory/dairy" class="bi bi-pencil-fill text-end"></a>
                    <div class="border border-secondary\ m-3 mt-0">
                        <div class="card-body">
                            <dl class="row mb-0 p-3 card-text">
                                @foreach ($dairy as $item)
                                @if ($item->stock == 0)
                                <dd class="col-sm-10 text-danger">{{ $item->name }}</dd>
                                <dd class="col-sm-2 text-center text-danger">{{ $item->stock }}</dd>
                                @elseif ($item->stock < 5) 
                                <dd class="col-sm-10 text-warning">{{ $item->name }}</dd>
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
            </div>

            <div class="col-sm-4 px-5">
                <p class="fs-5">&nbsp;<b>Meat</b></p>
                <div class="card">
                    <a href="/edit_inventory/meat" class="bi bi-pencil-fill text-end"></a>
                    <div class="border border-secondary\ m-3 mt-0">
                        <div class="card-body">
                            <dl class="row mb-0 p-3 card-text">
                                @foreach ($meat as $item)
                                @if ($item->stock == 0)
                                <dd class="col-sm-10 text-danger">{{ $item->name }}</dd>
                                <dd class="col-sm-2 text-center text-danger">{{ $item->stock }}</dd>
                                @elseif ($item->stock < 5) 
                                <dd class="col-sm-10 text-warning">{{ $item->name }}</dd>
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
            </div>
        </div>


</body>
<div class="footer w-100 position-absolute mt-5" style="bottom:0;height:110px;top: 570px;">@include('layouts.footer')
</div>

</html>
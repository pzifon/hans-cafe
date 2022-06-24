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
    <style type="text/css">
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
        #confirm{
            font-size: 10px;
        }
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="row mt-3 mx-0" id="WebView">
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

        <div class="col-8 text-end mb-1">
            <button type="button" class="btn btn-danger tab-pane fade show active" id="AddIngredients" role="tabpanel"
                aria-labelledby="add-ingredients-tab" name="add_ingredients" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop2">+ Add Ingredients</button>

            <script type='text/javascript'>
            function myFunction2() {
                document.getElementById("AddIngredients").style.display = "none";
            }

            function myFunction1() {
                document.getElementById("AddIngredients").style.display = "block";
            }
            </script>
        </div>

    </div>

    <div class="row mt-3 mx-0" id="MobileView">
        <div class="col-4 ps-3 mt-1">
            <div class="row">
                <div class="col-1 p-1">
                    <span class="dot"
                        style=" height: 15px; width: 15px; background-color: red;  border-radius: 50%;  display: inline-block;"></span>
                </div>
                <div class="col-11 ps-3 pe-0">
                    <p>Not Available</p>
                </div>
            </div>
        </div>

        <div class="col-3 ps-3 pe-0 mt-1">
            <div class="row">
                <div class="col-1 p-1">
                    <span class="dot"
                        style=" height: 15px; width: 15px; background-color: #FED000;  border-radius: 50%;  display: inline-block;"></span>
                </div>
                <div class="col-11 ps-3 pe-0">
                    <p>Low Stock</p>
                </div>
            </div>
        </div>

        <div class="col-5 text-end ps-0">
            <button type="button" class="btn btn-danger btn-sm tab-pane fade show active" id="AddIngredients" role="tabpanel"
                aria-labelledby="add-ingredients-tab" name="add_ingredients" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop2">+ Add Ingredients</button>

            <script type='text/javascript'>
            function myFunction2() {
                document.getElementById("AddIngredients").style.display = "none";
            }

            function myFunction1() {
                document.getElementById("AddIngredients").style.display = "block";
            }
            </script>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
        <form action="/add" method="post" action="/action_page.php">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Ingredients</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Item Code</span>
                                <input type="text" name="code" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Expiry Date</span>
                                <input type="date" name="expiry" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Inventory Category</span>
                                <input name="category" class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Type to search...">
                                <datalist id="datalistOptions">
                                    <option value="Condiment">
                                    <option value="Dairy">
                                    <option value="Meat">
                                </datalist>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Ingredients Name</span>
                                <input type="text" name="name" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Number Of Stock</span>
                                <input type="number" name="no_of_stock" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" min=0 max=100 required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" name="add">Add</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    <!-- end of Modal -->

    @include('flash-message')
    <div class="row mx-0">
        <div class="col-sm-4 px-5 mt-3">
            <p class="fs-5">&nbsp;<b>Condiment</b></p>
            <div class="card">
                <a href="/edit_inventory/condiment" class="bi bi-pencil-fill text-end m-1"></a>
                <div class="border border-secondary\ m-3 mt-0">
                    <div class="card-body">
                        <dl class="row mb-0 p-3 card-text">
                            @foreach ($condiment as $item)
                            @if ($item->stock == 0)
                            <dd class="col-10 text-danger">{{ $item->name }}</dd>
                            <dd class="col-2 text-center text-danger">{{ $item->stock }}</dd>
                            @elseif ($item->stock < 5) <dd class="col-10 text-warning">{{ $item->name }}</dd>
                                <dd class="col-2 text-center text-warning">{{ $item->stock }}</dd>
                                @else
                                <dd class="col-10">{{ $item->name }}</dd>
                                <dd class="col-2 text-center">{{ $item->stock }}</dd>
                                @endif
                                @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 px-5 mt-3">
            <p class="fs-5">&nbsp;<b>Dairy</b></p>
            <div class="card">
                <a href="/edit_inventory/dairy" class="bi bi-pencil-fill text-end m-1"></a>
                <div class="border border-secondary\ m-3 mt-0">
                    <div class="card-body">
                        <dl class="row mb-0 p-3 card-text">
                            @foreach ($dairy as $item)
                            @if ($item->stock == 0)
                            <dd class="col-10 text-danger">{{ $item->name }}</dd>
                            <dd class="col-2 text-center text-danger">{{ $item->stock }}</dd>
                            @elseif ($item->stock < 5) <dd class="col-10 text-warning">{{ $item->name }}</dd>
                                <dd class="col-2 text-center text-warning">{{ $item->stock }}</dd>
                                @else
                                <dd class="col-10">{{ $item->name }}</dd>
                                <dd class="col-2 text-center">{{ $item->stock }}</dd>
                                @endif
                                @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 px-5 mt-3">
            <p class="fs-5">&nbsp;<b>Meat</b></p>
            <div class="card">
                <a href="/edit_inventory/meat" class="bi bi-pencil-fill text-end m-1"></a>
                <div class="border border-secondary\ m-3 mt-0">
                    <div class="card-body">
                        <dl class="row mb-0 p-3 card-text">
                            @foreach ($meat as $item)
                            @if ($item->stock == 0)
                            <dd class="col-10 text-danger">{{ $item->name }}</dd>
                            <dd class="col-2 text-center text-danger">{{ $item->stock }}</dd>
                            @elseif ($item->stock < 5) <dd class="col-10 text-warning">{{ $item->name }}</dd>
                                <dd class="col-2 text-center text-warning">{{ $item->stock }}</dd>
                                @else
                                <dd class="col-10">{{ $item->name }}</dd>
                                <dd class="col-2 text-center">{{ $item->stock }}</dd>
                                @endif
                                @endforeach
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('layouts.footer')
</body>

</html>
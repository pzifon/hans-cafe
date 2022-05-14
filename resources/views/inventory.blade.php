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
        <div class="row mx-0 mt-2">
            <div class="col-sm-4 px-5">
                <p class="fs-5">&nbsp;<b>Condiment</b></p>
                <div class="card">
                    <a href="/edit_inventory" class="bi bi-pencil-fill text-end"></a>
                    <div class="border border-secondary\ m-3 mt-0">
                        <div class="card-body">
                            <dl class="row mb-0 p-3 card-text">
                                <dd class="col-sm-10 text-warning">Pepper</dd>
                                <dd class="col-sm-2 text-center text-warning">3</dd>

                                <dd class="col-sm-10">Salt</dd>
                                <dd class="col-sm-2 text-center">13</dd>

                                <dd class="col-sm-10">Soy Sauce</dd>
                                <dd class="col-sm-2 text-center">20</dd>

                                <dd class="col-sm-10">Ketchup</dd>
                                <dd class="col-sm-2 text-center">16</dd>

                                <dd class="col-sm-10">Mustard</dd>
                                <dd class="col-sm-2 text-center">18</dd>

                                <dd class="col-sm-10 text-danger">Chilli</dd>
                                <dd class="col-sm-2 text-center text-danger">0</dd>

                                <dd class="col-sm-10">Bay Leaves</dd>
                                <dd class="col-sm-2 text-center">121</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 px-5">
                <p class="fs-5">&nbsp;<b>Dairy</b></p>
                <div class="card">
                    <a href="/edit_inventory" class="bi bi-pencil-fill text-end"></a>
                    <div class="border border-secondary\ m-3 mt-0">
                        <div class="card-body">
                            <dl class="row mb-0 p-3 card-text">
                                <dd class="col-sm-10">Cheese</dd>
                                <dd class="col-sm-2 text-center">50</dd>

                                <dd class="col-sm-10 text-danger">Egg</dd>
                                <dd class="col-sm-2 text-center text-danger">0</dd>

                                <dd class="col-sm-10">Milk</dd>
                                <dd class="col-sm-2 text-center">43</dd>

                                <dd class="col-sm-10">Yogurt</dd>
                                <dd class="col-sm-2 text-center">174</dd>

                                <dd class="col-sm-10 text-warning">Butter</dd>
                                <dd class="col-sm-2 text-center text-warning">9</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 px-5">
                <p class="fs-5">&nbsp;<b>Meat</b></p>
                <div class="card">
                    <a href="/edit_inventory" class="bi bi-pencil-fill text-end"></a>
                    <div class="border border-secondary\ m-3 mt-0">
                        <div class="card-body">
                            <dl class="row mb-0 p-3 card-text">
                                <dd class="col-sm-10">Ham</dd>
                                <dd class="col-sm-2 text-center">134</dd>

                                <dd class="col-sm-10 text-warning">Bacon</dd>
                                <dd class="col-sm-2 text-center text-warning">13</dd>

                                <dd class="col-sm-10 text-warning">Chicken</dd>
                                <dd class="col-sm-2 text-center text-warning">19</dd>

                                <dd class="col-sm-10 text-danger">Tuna</dd>
                                <dd class="col-sm-2 text-center text-danger">0</dd>

                                <dd class="col-sm-10 text-danger">Salmon</dd>
                                <dd class="col-sm-2 text-center text-danger">0</dd>

                                <dd class="col-sm-10">Beef</dd>
                                <dd class="col-sm-2 text-center">56</dd>

                                <dd class="col-sm-10">Lamb</dd>
                                <dd class="col-sm-2 text-center">78</dd>
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
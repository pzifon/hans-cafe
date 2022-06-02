<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="row mt-2 mx-1">
        <nav class="row">
            <div class="col-11">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="dine-in-tab" data-bs-toggle="tab" data-bs-target="#dine-in"
                        type="button" role="tab" aria-controls="dine-in" aria-selected="false">Dine in</button>
                    <button class="nav-link" id="take-away-tab" data-bs-toggle="tab" data-bs-target="#take-away"
                        type="button" role="tab" aria-controls="take-away" aria-selected="true">Take Away</button>
                </div>
            </div>
            <div class="col-1">
                <a class="text-end btn btn-success" aria-current="page" href="/orderlist">Order List</a>
            </div>
        </nav>

        <div class="row mt-3">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <p class="card-title mb-0 p-3 text-center" style="font-size:15px;background-color:#c4c4c4">
                            Bill: TA1 Date: 14/02/22 15:16</p>

                        <dl class="row mb-0 p-3">
                            <dd class="col-sm-10">Egg Benedict</dd>
                            <dd class="col-sm-2 text-center">1</dd>

                            <dd class="col-sm-10">Healthy Vegan Salad</dd>
                            <dd class="col-sm-2 text-center">2</dd>

                            <dd class="col-sm-10">Nasi Lemak Bungkus</dd>
                            <dd class="col-sm-2 text-center">1</dd>

                            <dd class="col-sm-10">Americano</dd>
                            <dd class="col-sm-2 text-center">2</dd>
                        </dl>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <p class="card-title mb-0 p-3 text-center" style="font-size:15px;background-color:#c4c4c4">
                            Bill: TA2 Date: 14/02/22 15:08 </p>

                        <dl class="row mb-0 p-3">
                            <dd class="col-sm-10">Quinoa Tabbouleh</dd>
                            <dd class="col-sm-2 text-center">1</dd>

                            <dd class="col-sm-10">Apple Juice</dd>
                            <dd class="col-sm-2 text-center">1</dd>
                        </dl>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <p class="card-title mb-0 p-3 text-center" style="font-size:15px;background-color:#c4c4c4">
                            Bill: TA3 Date: 14/02/22 11:38</p>

                        <dl class="row mb-0 p-3">
                            <dd class="col-sm-10">Parmesan Potato Wedges</dd>
                            <dd class="col-sm-2 text-center">1</dd>

                            <dd class="col-sm-10">Nasi Lemak Bungkus</dd>
                            <dd class="col-sm-2 text-center">2</dd>

                            <dd class="col-sm-10">Americano</dd>
                            <dd class="col-sm-2 text-center">2</dd>
                        </dl>

                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <p class="card-title mb-0 p-3 text-center" style="font-size:15px;background-color:#c4c4c4">
                            Bill: TA4 Date: 14/02/22 16:10</p>

                        <dl class="row mb-0 p-3">
                            <dd class="col-sm-10">Spaghetti Cabonara</dd>
                            <dd class="col-sm-2 text-center">1</dd>

                            <dd class="col-sm-10">Oatmeal Cookie</dd>
                            <dd class="col-sm-2 text-center">1</dd>

                            <dd class="col-sm-10">Earl Grey Tea</dd>
                            <dd class="col-sm-2 text-center">2</dd>
                        </dl>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body p-0">
                        <p class="card-title mb-0 p-3 text-center" style="font-size:15px;background-color:#c4c4c4">
                            Bill: TA5 Date: 14/02/22 17:32</p>

                        <dl class="row mb-0 p-3">
                            <dd class="col-sm-10">Quinoa Tabbouleh</dd>
                            <dd class="col-sm-2 text-center">1</dd>

                            <dd class="col-sm-10">Apple Juice</dd>
                            <dd class="col-sm-2 text-center">1</dd>
                        </dl>

                    </div>
                </div>
            </div>

        </div>


    </div>


</body>

</html>
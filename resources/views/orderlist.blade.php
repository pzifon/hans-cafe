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

<body>
    @include('layouts.navbar')
    <div class="row mt-2 mx-1">
        <nav class="row">
            <div class="col-11">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="dine-in-tab" data-bs-toggle="tab" data-bs-target="#dine-in"
                        type="button" role="tab" aria-controls="dine-in" aria-selected="true">Dine in</button>
                    <button class="nav-link" id="take-away-tab" data-bs-toggle="tab" data-bs-target="#take-away"
                        type="button" role="tab" aria-controls="take-away" aria-selected="false">Take Away</button>
                </div>
            </div>
            <div class="col-1">
                <a class="text-end btn btn-success" aria-current="page" href="/orderlist">Order List</a>
            </div>
        </nav>

        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-outline-white p-0" name="view_details" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">

                    <div class="card" style="height:250px">
                        <div class="card-body p-0">
                            <p class="card-title mb-0 px-1 py-3 text-center" style="font-size:15px;background-color:#c4c4c4">
                                Table: 1 Bill: D1 Date: 14/02/22 15:16</p>

                            <dl class="row mb-0 p-3">
                                <dd class="col-sm-10 text-start">Egg Benedict</dd>
                                <dd class="col-sm-2 text-center">1</dd>

                                <dd class="col-sm-10 text-start">Healthy Vegan Salad</dd>
                                <dd class="col-sm-2 text-center">2</dd>

                                <dd class="col-sm-10 text-start">Nasi Lemak Bungkus</dd>
                                <dd class="col-sm-2 text-center">1</dd>

                                <dd class="col-sm-10 text-start">Americano</dd>
                                <dd class="col-sm-2 text-center">2</dd>
                            </dl>

                        </div>
                    </div>

                </button>
            </div>


            <div class="col">
                <button type="submit" class="btn btn-outline-white p-0" name="view_details" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <div class="card" style="height:250px">
                        <div class="card-body p-0">
                            <p class="card-title mb-0 px-1 py-3 text-center" style="font-size:15px;background-color:#c4c4c4">
                                Table: 2 Bill: D2 Date: 14/02/22 15:08 </p>

                            <dl class="row mb-0 p-3">
                                <dd class="col-sm-10 text-start">Quinoa Tabbouleh</dd>
                                <dd class="col-sm-2 text-center">1</dd>

                                <dd class="col-sm-10 text-start">Apple Juice</dd>
                                <dd class="col-sm-2 text-center">1</dd>
                            </dl>

                        </div>
                    </div>
                </button>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-outline-white p-0" name="view_details" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <div class="card" style="height:250px">
                        <div class="card-body p-0">
                            <p class="card-title mb-0 px-1 py-3 text-center" style="font-size:15px;background-color:#c4c4c4">
                                Table: 3 Bill: D3 Date: 14/02/22 11:38</p>

                            <dl class="row mb-0 p-3">
                                <dd class="col-sm-10 text-start">Parmesan Potato Wedges</dd>
                                <dd class="col-sm-2 text-center">1</dd>

                                <dd class="col-sm-10 text-start">Nasi Lemak Bungkus</dd>
                                <dd class="col-sm-2 text-center">2</dd>

                                <dd class="col-sm-10 text-start">Americano</dd>
                                <dd class="col-sm-2 text-center">2</dd>
                            </dl>

                        </div>
                    </div>
                </button>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-outline-white p-0" name="view_details" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <div class="card" style="height:250px">
                        <div class="card-body p-0">
                            <p class="card-title mb-0 px-1 py-3 text-center" style="font-size:15px;background-color:#c4c4c4">
                                Table: 5 Bill: D4 Date: 14/02/22 16:10</p>

                            <dl class="row mb-0 p-3">
                                <dd class="col-sm-10 text-start">Spaghetti Cabonara</dd>
                                <dd class="col-sm-2 text-center">1</dd>

                                <dd class="col-sm-10 text-start">Oatmeal Cookie</dd>
                                <dd class="col-sm-2 text-center">1</dd>

                                <dd class="col-sm-10 text-start">Earl Grey Tea</dd>
                                <dd class="col-sm-2 text-center">2</dd>
                            </dl>

                        </div>
                    </div>
                </button>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-outline-white p-0 " name="view_details" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <div class="card" style="height:250px">
                        <div class="card-body p-0">
                            <p class="card-title mb-0 px-1 py-3 text-center" style="font-size:15px;background-color:#c4c4c4">
                                Table: 4 Bill: D5 Date: 14/02/22 17:32</p>

                            <dl class="row mb-0 p-3">
                                <dd class="col-sm-10 text-start">Quinoa Tabbouleh</dd>
                                <dd class="col-sm-2 text-center">1</dd>

                                <dd class="col-sm-10 text-start">Apple Juice</dd>
                                <dd class="col-sm-2 text-center">1</dd>
                            </dl>

                        </div>
                    </div>
                </button>
            </div>

        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Order Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row mx-2">
                        <div class="col-sm-6">
                            <div class="card border-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-transparent border-dark">Bill Detail</div>
                                <div class="card-body bg-transparent">
                                    <dl class="row mb-0 p-0">
                                        <dd class="col-sm-6 text-start">Subtotal</dd>
                                        <dd class="col-sm-6 text-end">RM 55.40</dd>

                                        <dd class="col-sm-6 text-start">Service Tax</dd>
                                        <dd class="col-sm-6 text-end">RM 5.54</dd>

                                        <dd class="col-sm-6 text-start">Discount</dd>
                                        <dd class="col-sm-6 text-end">(RM 0.00)</dd>
                                    </dl>
                                </div>
</br>
</br>
                                <div class="card-footer bg-transparent border-dark">
                                    <dl class="row mb-0 p-0">
                                        <dd class="col-sm-6 text-start">Total</dd>
                                        <dd class="col-sm-6 text-end">RM 60.94</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card border-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-transparent border-dark">Customer Detail</div>
                                <div class="card-body text-dark">
                                    <div class="border border-dark">&nbsp; ID/Name/Contact Number&nbsp;&nbsp;&nbsp;&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search mb-1" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
                                    </div>
</br>
                                    <p class="card-text">
                                        ID: 1</br>
                                        Name: Customer 1</br>
                                        Contact Number: 012-3456789</br>
                                        </br>
                                        REWARDS</br>
                                        None</p>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">PAY</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            var passid;

            $(document).on('click', '.purchaseid', function(e) {
                e.preventDefault();
                var purchase_id = $(this).val();
                passid = purchase_id;
                var ttl = 0;
                var exttl = 0;
                var tax = 0;
                //console.log(menu_code);
                $.ajax({
                    type: "GET",
                    url: "/showorder/" + purchase_id,
                    success: function(response) {
                        console.log(response);
                        // console.log(response.total);
                        if (response.status == 404) {

                        } else {
                            $.each(response.order, function(key, item) {
                                $('.orderdetails').append('<div>\
                                    <p>' + item.name + '</p>\
                                </div>');
                            });
                            $.each(response.total, function(key, item) {
                                ttl = item.total;
                                // ttl = ttl.toFixed(2);
                                exttl = ttl/1.06;
                                exttl = exttl.toFixed(2);
                                tax = ttl - exttl;
                                tax = tax.toFixed(2);
                                $('.totalnum').html('RM ' + item.total);
                                $('.extotalnum').html('RM ' + exttl);
                                $('.taxnum').html('RM ' + tax);
                                console.log(item.total);
                            });
                        }
                    }
                });
            });

            $(document).on('click', '.paybtn', function(e) {
                e.preventDefault();
                var purchase_id = passid;
                // console.log(purchase_id);
                $.ajax({
                    type: "GET",
                    url: "/payitem/" + purchase_id,
                    success: function(response) {
                        // console.log(response);
                        $('.orderdetails').html('');
                    }
                });
                location.reload();
            });

            $(document).on('click', '.btn-close', function(e) {
                $('.orderdetails').html('');
            });
        });
    </script>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="row mt-2 mx-1">
        <!-- <nav class="row">
            <div class="col-11">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="dine-in-tab" data-bs-toggle="tab" data-bs-target="#dine-in" type="button" role="tab" aria-controls="dine-in" aria-selected="true">Dine in</button>
                    <button class="nav-link" id="take-away-tab" data-bs-toggle="tab" data-bs-target="#take-away" type="button" role="tab" aria-controls="take-away" aria-selected="false">Take Away</button>
                </div>
            </div>
            <div class="col">
                <a class="text-end btn btn-success" aria-current="page" href="/orderlist">Order List</a>
            </div>
        </nav> -->

        <div class="row mt-3">

            @foreach($orderList as $orderList)
            <div class="col">
                <button type="submit" class="btn btn-outline-white p-0 purchaseid" name="view_details" data-bs-toggle="modal" data-bs-target="#staticBackdrop" value="{{ $orderList->id}}">
                    <div class="card">
                        <div class="card-body p-0">
                            <p class="card-title mb-0 px-1 py-3 text-center" style="font-size:15px;background-color:#c4c4c4">
                                Purchase Order: {{ $orderList->id}}
                            </p>
                        </div>
                    </div>
                </button>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <div class="card-header bg-transparent border-dark">Order Detail</div>
                                <div class="card-body text-dark orderdetails">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card border-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-transparent border-dark">Bill Detail</div>
                                <div class="card-body bg-transparent">
                                    <dl class="row mb-0 p-0">
                                        <dd class="col-sm-6 text-start">Subtotal</dd>
                                        <dd class="extotalnum col-sm-6 text-end">RM 55.40</dd>

                                        <dd class="col-sm-6 text-start">Service Tax</dd>
                                        <dd class="taxnum col-sm-6 text-end">RM 5.54</dd>

                                        <!-- <dd class="col-sm-6 text-start">Discount</dd>
                                        <dd class="col-sm-6 text-end">(RM 0.00)</dd> -->
                                    </dl>
                                </div>
                                </br>
                                </br>
                                <div class="card-footer bg-transparent border-dark">
                                    <dl class="row mb-0 p-0">
                                        <dd class="col-sm-6 text-start">Total</dd>
                                        <dd class="totalnum col-sm-6 text-end">RM 60.94</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success paybtn">PAY</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
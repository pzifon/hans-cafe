<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Purchases</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {

        // fecthitem();

        // function fetchitem() {
        //     $.ajax({
        //         type: "GET",
        //         url: "/fetch-item",
        //         dataType: "json",
        //         success: function(response) {
        //             console.log(response);
        //         }
        //     });
        // }

        $(document).on('click', '.view', function(e) {
            e.preventDefault();
            var viewid = $(this).val();
            console.log(viewid);
            $.ajax({
                type: "GET",
                url: "/viewDetails/" + viewid,
                success: function(response) {
                    console.log(response);
                    if (response.status == 404) {

                    } else {
                        $('#detailbody').html('');
                        $.each(response.order, function(key, item) {
                            $('#detailbody').append('<tr>\
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">' + item
                                .name + '</td>\
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">' + item
                                .menu_code + '</td>\
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">' + item
                                .price + '</td>\
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">' + item
                                .quantity + '</td>\
                                    <td style="border-bottom:1px solid black;">' + item.subtotal + '</td>\
                                </tr>');
                        });
                        $('#detailbody').append('<tr style="border-top: 1px solid black">\
                                    <td colspan="3"></td>\
                                    <td colspan="2">Total: RM ' + response.total + '</td>\
                                </tr>');
                    }
                }
            });
        });
    });
    </script>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')

    <div class="row"
        style="text-align:center;display:block;width: auto;height:400px;margin:50px;border: 1px solid black;border-radius:30px">

        <p class="fw-light fs-1" style="font-style:italic;margin: 25px 0 10px 20px;text-align:left">Purchase History</p>

        <div class="table-scrollable" style="overflow-x: auto;  max-width: auto; max-height:275px;">

            <!-- <form style="margin:20px;" action="/viewDetails" method="post" action="/action_page.php"> -->
            @csrf
            @csrf
            <table class="m-auto table table-responsive ">
                <tr style="border:0px solid black;">
                    <td style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">ID</td>
                    <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Date</td>
                    <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Total</td>
                    <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Payment
                        Status</td>
                    <td style="width: 200px"></td>
                </tr>
                @foreach ($purchases as $purchases)
                <tr style="border:0px solid black">
                    <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $purchases->id }}</td>
                    <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $purchases->date }}
                    </td>
                    <td style="border-bottom:1px solid black;border-right:1px solid black">RM
                        {{ number_format($purchases->total,2) }}</td>
                    @if ($purchases->payment_status)
                    <td style="border-bottom:1px solid black;border-right:1px solid black">Paid</td>
                    @else
                    <td style="border-bottom:1px solid black;border-right:1px solid black">Unpaid</td>
                    @endif
                    <td>
                        <button type="button" value="{{$purchases->id}}" class="view btn btn-primary"
                            name="view_details" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View
                            Details</button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Order Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="text-align:center;display:block;width: auto;margin:10px;">
                            <table>
                                <thead>
                                    <tr style="border:0px solid black">
                                        <td
                                            style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">
                                            Order Items</td>
                                        <td
                                            style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">
                                            Name</td>
                                        <td
                                            style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">
                                            Price</td>
                                        <td
                                            style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">
                                            Quantity</td>
                                        <td style="border-bottom:1px solid black;width: 100px">Subtotal</td>
                                    </tr>
                                </thead>

                                <tbody id="detailbody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of Modal -->
    </div>
    @include('layouts.footer')
</body>

</html>
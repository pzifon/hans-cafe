<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
    <title>Purchases</title>
=======
    <title>View Purchases</title>
>>>>>>> e89875c85b5c63151a64ad94ad40a75763065517
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @include('layouts.navbar')

    <div class="row" style="text-align:center;display:block;width: auto;height:400px;margin:50px;border: 1px solid black;border-radius:30px">

    <p class="fw-light fs-1" style="font-style:italic;margin: 25px 0 10px 20px;text-align:left">Purchase History</p>

    <div class="table-scrollable" style="overflow-x: auto;  max-width: auto; max-height:275px;" >
     
    <form style="margin:20px;" action="/viewDetails" method="post" action="/action_page.php">
        @csrf
        @csrf
<<<<<<< HEAD
        <table class="">
=======

<<<<<<< HEAD
        <table>
>>>>>>> e89875c85b5c63151a64ad94ad40a75763065517
            <tr>
                <td>ID</td>
                <td>Date</td>
                <td>Total</td>
                <td>Payment Status</td>
                <td></td>
=======
        
        <table  class="m-auto table table-responsive ">
            <tr style="border:0px solid black;">
                <td style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">ID</td>
                <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Date</td>
                <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Total</td>
                <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Payment Status</td>
                <td style="width: 200px"></td>
>>>>>>> b62317326f2dd8b520bb7fb8428627b1c8fe61f5
            </tr>
            @foreach ($purchases as $purchases)
            <tr style="border:0px solid black">
                <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $purchases->id }}</td>
                <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $purchases->date }}</td>
                <td style="border-bottom:1px solid black;border-right:1px solid black">RM {{ number_format($purchases->total,2) }}</td>
                @if ($purchases->payment_status)
                <td style="border-bottom:1px solid black;border-right:1px solid black">Paid</td>
                @else
                <td style="border-bottom:1px solid black;border-right:1px solid black">Unpaid</td>
                @endif
                <td>
                    <button type="submit" style="text-decoration:underline" value="{{$purchases->id}}"
                        name="view_details" class="column"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">View Details</button>
                </td>
            </tr>
            @endforeach
        </table>
     </form>
     </div>


<<<<<<< HEAD
    @if (isset($orders))
<<<<<<< HEAD
    <table class="">
=======
    <table>
>>>>>>> e89875c85b5c63151a64ad94ad40a75763065517
        <tr>
            <td>Order Items</td>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
=======
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Order Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      @if (isset($orders))

      <div class="row" style="text-align:center;display:block;width: auto;margin:10px;">
     <table>
        <tr style="border:0px solid black">
            <td style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">Order Items</td>
            <td style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">Name</td>
            <td style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">Price</td>
            <td style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">Quantity</td>
            <td style="border-bottom:1px solid black;width: 100px">Subtotal</td>
>>>>>>> b62317326f2dd8b520bb7fb8428627b1c8fe61f5
        </tr>
        @foreach ($orders as $orders)
        <tr>
            <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $orders->menu_code }}</td>
            <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $orders->name }}</td>
            <td style="border-bottom:1px solid black;border-right:1px solid black">RM {{ number_format($orders->price,2) }}</td>
            <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $orders->quantity }}</td>
            <td style="border-bottom:1px solid black;">RM {{ number_format($orders->subtotal,2) }}</td>
        </tr>
        @endforeach
        <tr style="border-top: 1px solid black">
            <td colspan="3"></td>
            <td colspan="2">Total: RM {{ number_format($total,2) }}</td>
        </tr>
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
</div>
@endif


<div>@include('layouts.footer')</div>
</body>
</html>

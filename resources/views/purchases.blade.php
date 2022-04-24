<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Purchases</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @include('layouts.navbar')
    <form action="/viewDetails" method="post" action="/action_page.php">
        @csrf
        @csrf

        <table>
            <tr>
                <td>ID</td>
                <td>Date</td>
                <td>Total</td>
                <td>Payment Status</td>
                <td></td>
            </tr>
            @foreach ($purchases as $purchases)
            <tr>
                <td>{{ $purchases->id }}</td>
                <td>{{ $purchases->date }}</td>
                <td>RM {{ number_format($purchases->total,2) }}</td>
                @if ($purchases->payment_status)
                <td>Paid</td>
                @else
                <td>Unpaid</td>
                @endif
                <td>
                    <button type="submit" style="text-decoration:underline" value="{{$purchases->id}}"
                        name="view_details" class="column">View Details</button>
                </td>
            </tr>
            @endforeach
        </table>
    </form>

    <br><br>

    @if (isset($orders))
    <table>
        <tr>
            <td>Order Items</td>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
        </tr>
        @foreach ($orders as $orders)
        <tr>
            <td>{{ $orders->menu_code }}</td>
            <td>{{ $orders->name }}</td>
            <td>RM {{ number_format($orders->price,2) }}</td>
            <td>{{ $orders->quantity }}</td>
            <td>RM {{ number_format($orders->subtotal,2) }}</td>
        </tr>
        @endforeach
        <tr style="border-top: 1px">
            <td colspan="3"></td>
            <td colspan="2">Total: RM {{ number_format($total,2) }}</td>
        </tr>
    </table>
    @endif
</body>

</html>
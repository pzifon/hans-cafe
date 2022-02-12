<!DOCTPE html>
    <html>

    <head>
        <title>View Purchases</title>
    </head>

    <body>
    <form action="/viewDetails" method="post" action="/action_page.php">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <table border="1">
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
                <td><button type="submit" value="{{$purchases->id}}" name="view_details" class="column" >View Details</button></td>
            </tr>
            @endforeach
            
        </form>
        </table>
        <br><br>

        @if (isset($orders))
        <table border="1">
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
            <tr>
                <td colspan="3"></td>
                <td colspan="2">Total: RM {{ number_format($total,2) }}</td>
            </tr>
        </table>
        @endif

        
    </body>

    </html>
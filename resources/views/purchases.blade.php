<title>View Purchases</title>
<style>
    .tbl {
        width: 50%;
        border: 2px solid;
        margin: auto;
        margin-top: 50px;
    }
</style>
<x-app-layout>
    <x-slot name="header"></x-slot>
    <form action="/viewDetails" method="post" action="/action_page.php">
        @csrf
        @csrf

        <table class="tbl">
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
                    <button type="submit" style="text-decoration:underline" value="{{$purchases->id}}" name="view_details" class="column">View Details</button>
                </td>
            </tr>
            @endforeach

    </form>
    </table>
    <br><br>

    @if (isset($orders))
    <table class="tbl">
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
</x-app-layout>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @include('layouts.navbar')

    <div class="row"
        style="text-align:center;display:block;width: auto;height:400px;margin:50px;border: 1px solid black;border-radius:30px">

        <p class="fw-light fs-1" style="font-style:italic;margin: 25px 0 10px 20px;text-align:left">Customer Info</p>

        <div class="table-scrollable" style="overflow-x: auto;  max-width: auto; max-height:275px;">

            <form style="margin:20px;" method="view">

                <table class="m-auto table table-responsive ">
                    <tr style="border:0px solid black;">
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">ID</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Name</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Email</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">Contact
                            Number</td>
                        <td style="width: 200px"></td>
                    </tr>
                    @foreach ($list as $customer)
                    <tr style="border:0px solid black">
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $customer->id }}</td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $customer->name }}
                        </td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">{{ $customer->email }}
                        </td>
                        <td style="border-bottom:1px solid black;border-right:1px solid black">
                            {{ $customer->contact ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ url('/viewCust/'.$customer->id) }}">
                                <button type="button" class="column">View</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </form>
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>
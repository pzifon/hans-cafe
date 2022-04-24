<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    @include('layouts.navbar')
    <table>
        <tr>
            <td>Reservation ID</td>
            <td>Date</td>
            <td>Time</td>
            <td>No of people</td>
            <td>Customer Name</td>
            <td>Contact Number</td>
        </tr>
        @foreach ($reservation as $res)
        <tr>
            <td>{{ $res->res_id }}</td>
            <td>{{ $res->date }}</td>
            <td>{{ $res->time_slot }}</td>
            <td>{{ $res->no_of_people }}</td>
            <td>{{ $res->name }}</td>
            <td>{{ $res->contact }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
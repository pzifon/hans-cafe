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
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="dine-in-tab" data-bs-toggle="tab" data-bs-target="#dine-in"
                    type="button" role="tab" aria-controls="dine-in" aria-selected="true">Dine in</button>
                <button class="nav-link" id="take-away-tab" data-bs-toggle="tab" data-bs-target="#take-away"
                    type="button" role="tab" aria-controls="take-away" aria-selected="false">Take Away</button>   
            </div>
            <a class="text-end btn btn-outline-dark" href="/orderlist">Order List</a> 
        </nav>


        

    </div>


</body>

</html>
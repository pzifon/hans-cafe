<!DOCTYPE html>
<html lang="en" style="position:relative;min-height:89vh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue Analytics</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="container">
        <div class="row border border-dark mt-4">
            <div class="col-auto px-5 py-1 text-center" style="border-right-style: dashed;">
                Year
            </div>
            <div class="col-auto px-5 py-1 text-center" style="border-right-style: dashed;">
                Last Month
            </div>
            <div class="col-auto px-5 py-1 text-center" style="border-right-style: dashed;">
                This Month
            </div>
            <div class="col-auto px-5 py-1 text-center" style="border-right-style: dashed;">
                Last 7 Days
            </div>
            <div class="col-auto px-5 py-1 text-center">
                Custom :
                <input type="date" id="date"> &nbsp-&nbsp
                <input type="date" id="date">
            </div>
            <div class="col-auto ps-5 ms-6">
                <button type="button" class="btn btn-secondary">Go</button>
            </div>
        </div>
    </div>
    <div class="row px-2 ms-5">
        <div class="col-3 me-md-5">
            <div class="row">
                <div class="container border border-dark mt-4">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Product</label>
                        <input type="text" class="form-control" id="formGroupExampleInput"
                            placeholder="Search for a product...">
                        <button type="button" class="btn btn-outline-dark mt-2">Filter</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container border border-dark mt-4">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Categories</label>
                        <input type="text" class="form-control" id="formGroupExampleInput"
                            placeholder="Search categories...">
                        <button type="button" class="btn btn-outline-dark mt-2">Filter</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-7 me-md-5 ">
            <div class="row mt-4">
                <div style="width:800px; height:200px; border:1px solid black">
                <h1>Vertical Bar Chart</h1>
                </div>
            </div>
            <div class="row mt-4">
                <div style="width:800px; height:200px; border:1px solid black">
                    <h1>Number Data</h1>
                </div>
            </div>
        </div>
    </div>
</body>
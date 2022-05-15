<!DOCTYPE html>
<html style="position:relative;min-height:89vh">

<head>
    <title>Account Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    </style>
</head>

<body style="margin-bottom:60px">
    @include('layouts.navbar')
    @include('flash-message')
    <div class="container" style="margin-top:20px; margin-bottom: 20px">
        <div class="row">
            <h2>Account Dashboard</h2>
        </div>

        <div class="row">
            <div class="col">
                @foreach ($user as $user)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">
                                Account Details
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>EMPLOYEE ID</td>
                            <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                            <td>NAME</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>DATE OF BIRTH</td>
                            <td>{{$user->dob ?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <td>EMAIL</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>CONTACT</td>
                            <td>{{$user->contact ?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <td>DATE JOINED</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                    </tbody>
                </table>
                @endforeach
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body" style="padding-top: 7px;">
                        <div>
                            <b>Working Hours</b>
                        </div>
                        <div class="row mt-3">
                            <div class="row ms-0">
                                <div class="col border border-outline-dark me-md-3">
                                    <div class="row ps-2 mt-1">Total Hours Worked</div>
                                    <div class="row">
                                        <p class="text-center fs-2 mt-1">72</p>
                                    </div>
                                </div>
                                <div class="col border border-outline-dark">
                                    <div class="row ps-2 mt-1">Total Overtime Hours</div>
                                    <div class="row">
                                        <p class="text-center fs-2 mt-1">3</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row ms-0 mt-3">
                                <div class="col border border-outline-dark me-md-3">
                                    <div class="row ps-2 mt-1">Total Days Worked</div>
                                    <div class="row">
                                        <p class="text-center fs-2 mt-1">9</p>
                                    </div>
                                </div>
                                <div class="col border border-outline-dark">
                                    <div class="row ps-2 mt-1">Total Absence</div>
                                    <div class="row">
                                        <p class="text-center fs-2 mt-1">1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <a class=" btn btn-outline-dark col mb-5" style="margin:20px;padding:0px" href="/customerinfo">
                <div class="row" style="margin:0px">
                    <div class="col-4 py-4" style="Background:#FF6767;">
                        <i class="bi bi-wallet2" style="font-size:60px"></i>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <p class="fs-1" style="margin-top:10px"></p>
                        </div>
                        <div class="row">
                            <p class="fs-3" style="margin-top:10px">View Customer Info</p>
                        </div>
                    </div>
                </div>
            </a>
            <div class="col"></div>
        </div>
    </div>
    <br>
    <div class="footer w-100 position-absolute mt-5" style="bottom:0;height:110px">@include('layouts.footer')</div>
</body>

</html>
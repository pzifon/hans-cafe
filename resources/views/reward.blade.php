<!DOCTYPE html>
<html>

<head>
    <title>Reward</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    @include('flash-message')
    <div class="container">
        <div class="row">
            <h2>Rewards</h2>
        </div>
        <div class="row mb-1">
            <div class="col-6">
                @foreach ($user as $user)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">
                                Account Details
                                @if (Auth::user()->hasRole('customer'))
                                <a href="/editacc" style="float: right">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MEMBERSHIP ID</td>
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


            <div class="col-6">
                <style>
                .dot {
                    height: 75px;
                    width: 75px;
                    background-color: #bbb;
                    border-radius: 50%;
                    display: inline-block;
                }
                </style>

                <div class="container  shadow p-3 mb-5 bg-body rounded">
                    <div class="d-flex justify-content-center">
                        <a href="/" style="margin-left: auto; margin-right: auto;">
                            <img src="{{ asset('storage/img/logo.png') }}" class="mx-auto" alt=""
                                style="max-width: 200px; max-height:200px; margin: auto;">
                        </a>

                    </div>
                    <h1 class="text-center">FREE COFFEE OR TEA</h1>
                    <div style="text-align:center">
                        <div class="row justify-content-center">
                            <div class="row justify-content-center">
                                @for ($i = 1; $i < 10; $i++) @if ($i%3==1) </div>
                                    <div class="row justify-content-center">
                                        @else
                                        <br>
                                        @endif
                                        @if ($i <= $records) <img src="{{ asset('storage/img/stamp.png') }}"
                                            class="col-3 rounded-circle border border-dark"
                                            style="width:100px;height:100px;border-radius:50%;margin: 25px;padding: 12px;">
                                            </img>
                                            @else
                                            <div class="col-3 rounded-circle border border-dark"
                                                style="width:100px;height:100px;border-radius:50%;margin: 25px;padding: 12px;">
                                            </div>
                                            @endif
                                            @endfor
                                    </div>
                                    @if($records == 9)
                                    @if (Auth::user()->hasRole('customer'))
                                    <form action="/claim" method="POST" action="/action_page.php">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">CLAIM REWARD!</button>
                                    </form>
                                    @endif
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    @include('layouts.footer')
</body>

</html>
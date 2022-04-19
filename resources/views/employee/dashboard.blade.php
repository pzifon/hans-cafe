<!DOCTYPE html>
<html>

<head>
    <title>Employee Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    </style>
</head>

<body>
    @include('layouts.navbar')
    @include('flash-message')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-boy">
                        <div class="row">
                            <div class="col" style="font-weight:bold;">Account Details</div>
                            <div class="col" style="float:right; text-align:right;">
                                <a href="/editacc">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                            </div>
                            @foreach ($user as $user)
                            <p>EMPLOYEE ID <br>
                                <span style="font-size:20px">{{$user->id}}
                            </p>
                            <br>
                            <p>NAME <br>
                                <span style="font-size:20px">{{$user->name}}
                            </p>
                            <br>
                            <p>DATE OF BIRTH <br>
                                <span style="font-size:20px">{{$user->dob ?? 'N/A'}}
                            </p>
                            <br>
                            <p>CONTACT NUMBER <br>
                                <span style="font-size:20px">{{$user->contact ?? 'N/A'}}
                            </p>
                            <br>
                            <p>EMAIL <br>
                                <span style="font-size:20px">{{$user->email}}
                            </p>
                            <br>
                            <p>DATE JOINED <br>
                                <span style="font-size:20px">{{$user->created_at}}
                            </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
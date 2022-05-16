<!DOCTYPE html>
<html style="position:relative;min-height:89vh">

<head>
    <title>Edit Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    </style>
</head>


<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="container">
        <form action="/edit" method="post" action="/action_page.php" id="edit">
            @csrf
            @csrf
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
                        <td>MEMBERSHIP ID</td>
                        <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                        <td>NAME</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td>DATE OF BIRTH</td>
                        <td>
                            <div class="input-group">
                                <input type="date" class="form-control" name="dob" value="{{$user->dob}}" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>EMAIL</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" value="{{$user->email}}" required>
                            </div>
                        </td>
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
        </form>
        <button type="submit" class="btn btn-secondary" form="edit" id="update" value="Update">Update</button>
    </div>
    @include('layouts.footer')
</body>

<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
    dd = '0' + dd;
}
if (mm < 10) {
    mm = '0' + mm;
}

date = yyyy + '-' + mm + '-' + dd;
document.getElementById("dob").setAttribute("max", date);
</script>
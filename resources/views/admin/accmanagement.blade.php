<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
    @media screen and (min-width: 601px) {
        #MobileView {
            border: 1px solid black;
            border-radius: 30px;
            margin: 50px;
        }

        #MView {
            display: none;
        }

        #info {
            font-size: 16px;
            padding: 30px;
        }

        .table-scrollable {
            max-height: 275px;
        }
    }

    @media screen and (max-width: 600px) {
        #MobileView {
            border: none;
            border-radius: 30px;
            max-height: 500px;
            margin-left: 0px;
            margin-right: 0px;

        }

        #WebView {
            display: none;
        }

        div#info {
            font-size: 16px;
            padding: 0px;
            max-height:500px;
        }


    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    @include('flash-message')

    <div class="row text-center" id="MobileView">


        <nav class="row" id="WebView">
            <div class="card-body p-0">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>

            <div class="nav nav-tabs mt-3 ms-3" id="nav-tab" role="tablist">
                <button class="nav-link active" id="employee-info-tab" data-bs-toggle="tab"
                    data-bs-target="#employee_info" type="button" role="tab" aria-controls="employee_info"
                    aria-selected="true" onclick="myFunction1()">Employee Info</button>
                <button class="nav-link" id="customer-info-tab" data-bs-toggle="tab" data-bs-target="#customer_info"
                    type="button" role="tab" aria-controls="customer_info" aria-selected="false"
                    onclick="myFunction2()">Customer
                    Info</button>
                <div class="col-sm-md-4 ms-auto">
                    <div class="input-group">
                        <input type="text" class="form-control rounded-start border-dark" placeholder="Search..."
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary rounded-end me-4" type="button" id="button-addon2"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-success tab-pane fade show active" id="AddEmployee"
                        role="tabpanel" aria-labelledby="add-employee-tab" name="add_employee" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop2">+ Add Employee</button>

                    <script type='text/javascript'>
                    function myFunction2() {
                        document.getElementById("AddEmployee").style.display = "none";
                    }

                    function myFunction1() {
                        document.getElementById("AddEmployee").style.display = "block";
                    }
                    </script>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <form action="/addEmp" method="post" action="/action_page.php">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add New Employee</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="input-group mb-3">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            <div class="input-group mb-3">
                                            <label for="inputDateOfBirth" class="col-sm-2 col-form-label">Date Of Birth</label>
                                                <input type="date" name="dob" id="dob" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default" required>
                                            </div>
                                            <div class="input-group mb-3">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default" required>
                                            </div>
                                            <div class="input-group mb-3">
                                            <label for="inputContactNumber" class="col-sm-2 col-form-label">Contact Number</label>
                                                <input type="text" name="contact" class="form-control"
                                                    pattern="^(01)[0-9]{8,9}$" placeholder="eg. 01XXXXXXXX"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default" required>
                                            </div>
                                            <div class="input-group mb-3">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default" required>
                                            </div>
                                            <div class="input-group mb-3">
                                            <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default" required>
                                            </div>
                                            <!-- Default Role -->
                                            <input id="role" type="hidden" name="role" value="employee" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end of Modal -->
            </div>

        </nav>

        <nav class="row pe-0" id="MView">
            <div class="card-body p-0">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>
            <div class="row pe-0 mt-3">
                <div class="col-7">
                    <div class="input-group">
                        <input type="text" class="form-control rounded-start border-dark w-75" placeholder="Search..."
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary rounded-end" type="button" id="button-addon2"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="col-5 px-0">
                    <button type="button" class="btn btn-success tab-pane fade show active" id="AddEmployee"
                        role="tabpanel" aria-labelledby="add-employee-tab" name="add_employee" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop2">+ Add Employee</button>

                    <script type='text/javascript'>
                    function myFunction2() {
                        document.getElementById("AddEmployee").style.display = "none";
                    }

                    function myFunction1() {
                        document.getElementById("AddEmployee").style.display = "block";
                    }
                    </script>
                </div>
                <div class="nav nav-tabs mt-3 ms-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="employee-info-tab" data-bs-toggle="tab"
                        data-bs-target="#employee_info" type="button" role="tab" aria-controls="employee_info"
                        aria-selected="true" onclick="myFunction1()">Employee Info</button>
                    <button class="nav-link" id="customer-info-tab" data-bs-toggle="tab" data-bs-target="#customer_info"
                        type="button" role="tab" aria-controls="customer_info" aria-selected="false"
                        onclick="myFunction2()">Customer
                        Info</button>


                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <form action="/addEmp" method="post" action="/action_page.php">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add New Employee</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Name</span>
                                                    <input type="text" name="name" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Date
                                                        of Birth</span>
                                                    <input type="date" name="dob" id="dob" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Email</span>
                                                    <input type="email" name="email" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Contact Number</span>
                                                    <input type="text" name="contact" class="form-control"
                                                        pattern="^(01)[0-9]{8,9}$" placeholder="eg. 01XXXXXXXX"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Password</span>
                                                    <input type="password" name="password" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-default">Confirm Password</span>
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default" required>
                                                </div>
                                                <!-- Default Role -->
                                                <input id="role" type="hidden" name="role" value="employee" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end of Modal -->
                </div>

        </nav>

        <div class="row mt-3 m-0" id="info">
            <div class="row tab-content p-0" id="nav-tabContent">
                <div class="tab-pane fade show active p-0" id="employee_info" role="tabpanel"
                    aria-labelledby="employee-info-tab">
                    <div class="table-scrollable" style="overflow-x: auto;  max-width: auto; max-height:275px;">

                        <form class="ps-3" method="view">

                            <table class="m-auto table table-responsive ">
                                <tr style="border:0px solid black;">
                                    <td style="border-bottom:1px solid black;border-right:1px solid black;">
                                        ID</td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black;">
                                        Name</td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black;">
                                        Email</td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black;">
                                        Contact Number</td>
                                    <td></td>
                                </tr>

                                @foreach ($emp_list as $emp)
                                <tr style="border:0px solid black">
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                        <p>{{ $emp->id }}</p>
                                    </td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                        <p>{{ $emp->name }}</p>
                                    </td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                        <p>{{ $emp->email }}</p>
                                    </td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                        <p>{{ $emp->contact ?? 'N/A' }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ url('/viewEmp/'.$emp->id) }}">
                                            <button type="button" class="column">View</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade pe-0" id="customer_info" role="tabpanel" aria-labelledby="customer-info-tab">
                    <div class="table-scrollable" style="overflow-x: auto;  max-width: auto; max-height:275px;">

                        <form class="ps-3" method="view">

                            <table class="m-auto table table-responsive ">
                                <tr style="border:0px solid black;">
                                    <td style="border-bottom:1px solid black;border-right:1px solid black;width: 100px">
                                        ID</td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">
                                        Name</td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">
                                        Email</td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black;width: 200px">
                                        Contact
                                        Number</td>
                                    <td style="width: 200px"></td>
                                </tr>

                                @foreach ($cust_list as $cust)
                                <tr style="border:0px solid black">
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                        {{ $cust->id }}</td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                        {{ $cust->name }}
                                    </td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                        {{ $cust->email }}
                                    </td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                        {{ $cust->contact ?? 'N/A'}}
                                    </td>
                                    <td>
                                        <a href="{{ url('/viewCust/'.$cust->id) }}">
                                            <button type="button" class="column">View</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
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

</html>
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
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.navbar')

    <div class="row"
        style="text-align:center;display:block;width: auto;height:400px;margin:50px;border: 1px solid black;border-radius:30px">

        <nav class="row pe-0">
            <div class="col">
                <div class="nav nav-tabs mt-2 ms-3" id="nav-tab" role="tablist">
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
                            <button class="btn btn-outline-secondary rounded-end me-4" type="button"
                                id="button-addon2"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-success tab-pane fade show active" id="AddEmployee"
                            role="tabpanel" aria-labelledby="add-employee-tab" name="add_employee"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop2">+ Add Employee</button>

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
                                                    id="inputGroup-sizing-default">Employee ID</span>
                                                <input type="text" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-default">Name</span>
                                                <input type="text" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Date of
                                                    Birth</span>
                                                <input type="text" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-default">Email</span>
                                                <input type="email" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default" placeholder="name@example.com">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Contact
                                                    Number</span>
                                                <input type="text" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Date
                                                    Joined</span>
                                                <input type="text" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of Modal -->
                </div>
            </div>
        </nav>

        <div class="row mt-3 pe-0">
            <div class="row tab-content pe-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="employee_info" role="tabpanel"
                    aria-labelledby="employee-info-tab">
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
                                        Contact Number</td>
                                    <td style="width: 200px"></td>
                                </tr>

                                <tr style="border:0px solid black">
                                    <td style="border-bottom:1px solid black;border-right:1px solid black"></td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                    </td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                    </td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" name="view_details"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Employee Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container" style="margin-top:20px; margin-bottom: 20px">
                                    <div class="row">
                                        <div class="col">
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
                                                        <td>id</td>
                                                    </tr>
                                                    <tr>
                                                        <td>NAME</td>
                                                        <td>name</td>
                                                    </tr>
                                                    <tr>
                                                        <td>DATE OF BIRTH</td>
                                                        <td>dob</td>
                                                    </tr>
                                                    <tr>
                                                        <td>EMAIL</td>
                                                        <td>email</td>
                                                    </tr>
                                                    <tr>
                                                        <td>CONTACT</td>
                                                        <td>contact</td>
                                                    </tr>
                                                    <tr>
                                                        <td>DATE JOINED</td>
                                                        <td>date joined</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of Modal -->

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

                                <tr style="border:0px solid black">
                                    <td style="border-bottom:1px solid black;border-right:1px solid black"></td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                    </td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                    </td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" name="view_details1"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop1">View</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Customer Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="border border-dark col" style="margin:20px;padding:0px">
                                            <div class="row" style="margin:0px">
                                                <div class="row">
                                                    <p class="fs-1" style="margin-top:10px">Total Purchases</p>
                                                </div>
                                                <div class="row">
                                                    <p class="fs-3" style="margin-top:10px">Total Purchases</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="border border-dark col" style="margin:20px;padding:0px">
                                            <div class="row" style="margin:0px">
                                                <div class="row">
                                                    <p class="fs-1" style="margin-top:10px">reward</p>
                                                </div>
                                                <div class="row">
                                                    <p class="fs-3" style="margin-top:10px">Reward</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col">

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
                                                        <td>id</td>
                                                    </tr>
                                                    <tr>
                                                        <td>NAME</td>
                                                        <td>name</td>
                                                    </tr>
                                                    <tr>
                                                        <td>DATE OF BIRTH</td>
                                                        <td>dob</td>
                                                    </tr>
                                                    <tr>
                                                        <td>EMAIL</td>
                                                        <td>email</td>
                                                    </tr>
                                                    <tr>
                                                        <td>CONTACT</td>
                                                        <td>contact</td>
                                                    </tr>
                                                    <tr>
                                                        <td>DATE JOINED</td>
                                                        <td>date joined</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div style="text-align: center">
                                                        <b>RESERVATIONS</b>
                                                    </div>
                                                    <div>
                                                        <b class="text-center">UPCOMING</b>
                                                    </div>

                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th style="width:8%">ID</th>
                                                                <th style="width:30%">Date</th>
                                                                <th style="width:22%">Time</th>
                                                                <th style="width:40%">No of people</th>
                                                                <th>Status</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-bordered">
                                                            <form action="/cancel" method="post"
                                                                action="/action_page.php">

                                                                <tr>
                                                                    <td>id</td>
                                                                    <td>date</td>
                                                                    <td>time slot</td>
                                                                    <td style="text-align:right;">no of pp</td>
                                                                    <td>status </td>
                                                                </tr>

                                                            </form>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of Modal -->
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>
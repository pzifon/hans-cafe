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
                                                <span class="input-group-text" id="inputGroup-sizing-default">Employee
                                                    ID</span>
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
                                                    aria-describedby="inputGroup-sizing-default"
                                                    placeholder="name@example.com">
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

                                @foreach ($emp_list as $emp)
                                <tr style="border:0px solid black">
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                        {{ $emp->id }}</td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                        {{ $emp->name }}
                                    </td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                        {{ $emp->email }}
                                    </td>
                                    <td style="border-bottom:1px solid black;border-right:1px solid black">
                                        {{ $emp->contact ?? 'N/A' }}
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

</html>
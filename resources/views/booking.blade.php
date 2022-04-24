<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @include('layouts.navbar')
    <div class="container">
        <ul class="list-group list-group-flush" style="text-align: center;">
            <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                </svg>
                LOCATION
                </br>
                <h2>TB 16313, Lot B15 Tkt 1, Perdana Jaya, Tawau 91000 Malaysia.</h2>
                </br>
                <div class="mapouter">
                    <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Tawau%2091000%20Malaysia&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://putlocker-is.org">putlocker</a><br>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                height: 500px;
                                width: 600px;
                            }
                        </style><a href="https://www.embedgooglemap.net"></a>
                        <style>
                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                height: 500px;
                                width: 600px;
                            }
                        </style>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-date-fill" viewBox="0 0 16 16">
                    <path d="M9.402 10.246c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z" />
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-4.118 9.79c1.258 0 2-1.067 2-2.872 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684c.047.64.594 1.406 1.703 1.406zm-2.89-5.435h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675V7.354z" />
                </svg>
                OPENING HOURS
                </br>
                <h2>8:00 AM - 6:00 PM</h2>
            </li>
            <li class="list-group-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg>
                CONTACT NUMBER
                </br>
                <h2>04-1234567</h2>
            </li>
        </ul>

        @if (Route::has('login'))
        @auth
        <form action="/create" method="post" style="width:80%;margin:auto" action="/action_page.php">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="row g-3">
                <div class="col">
                    <input type="number" placeholder="Number of people" name="no_of_people" class="form-control" style="width:100%" min=1 max=20 required>
                </div>
                <div class="col">
                    <input type="Date" placeholder="Date" name="res_date" id="res_date" class="form-control" style="width:100%" required>
                </div>
            </div>
            </br>
            <div class="row g-3">
                <div class="col">
                    <input type="submit" value="08:00am" name="time_slot" class="btn btn-secondary" style="width:100%" onclick="return confirm('Confirm reservation at 8:00am?');">
                </div>
                <div class="col">
                    <input type="submit" value="09:00am" name="time_slot" class="btn btn-secondary" style="width:100%" onclick="return confirm('Confirm reservation at 9:00am?');">
                </div>
                <div class="col">
                    <input type="submit" value="10:00am" name="time_slot" class="btn btn-secondary" style="width:100%" onclick="return confirm('Confirm reservation at 10:00am?');">
                </div>
                <div class="col">
                    <input type="submit" value="11:00am" name="time_slot" class="btn btn-secondary" style="width:100%" onclick="return confirm('Confirm reservation at 11:00am?');">
                </div>
            </div>
            </br>
            <div class="row g-3">
                <div class="col">
                    <input type="submit" value="12:00pm" name="time_slot" class="btn btn-secondary" style="width:100%" onclick="return confirm('Confirm reservation at 12:00pm?');">
                </div>
                <div class="col">
                    <input type="submit" value="01:00pm" name="time_slot" class="btn btn-secondary" style="width:100%" onclick="return confirm('Confirm reservation at 01:00pm?');">
                </div>
                <div class="col">
                    <input type="submit" value="02:00pm" name="time_slot" class="btn btn-secondary" style="width:100%" onclick="return confirm('Confirm reservation at 02:00pm?');">
                </div>
                <div class="col">
                    <input type="submit" value="03:00pm" name="time_slot" class="btn btn-secondary" style="width:100%" onclick="return confirm('Confirm reservation at 03:00pm?');">
                </div>
            </div>
            </br>
            <div class="row g-3">
                <div class="col"></div>
                <div class="col">
                    <input type="submit" value="04:00pm" name="time_slot" class="btn btn-secondary" style="width:100%" onclick="return confirm('Confirm reservation at 04:00pm?');">
                </div>
                <div class="col">
                    <input type="submit" value="05:00pm" name="time_slot" class="btn btn-secondary" style="width:100%" onclick="return confirm('Confirm reservation at 05:00pm?');">
                </div>
                <div class="col"></div>
            </div>
        </form>
        @else
        <div class="alert">
            <a href="{{ route('login') }}">
                <button class="btn">Please login to make your reservation</button>
            </a>
        </div>
        @endauth
        @endif
    </div>

    <script>
        var today = new Date();
        var dd = today.getDate() + 1;
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }

        tmr = yyyy + '-' + mm + '-' + dd;
        document.getElementById("res_date").setAttribute("min", tmr);
    </script>
</body>
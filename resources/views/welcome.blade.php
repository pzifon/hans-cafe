<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hans Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="antialiased d-flex flex-column min-vh-100">
    @include('layouts.navbar')
    <div class="container">
        <div class="slideshow" style="text-align:center;display:block;width: auto;border: 1px solid white">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('storage/img/cafe.jpg')}}" class="d-block w-100" style="height:80vh">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('storage/img/coffee1.jpg')}}" class="d-block w-100" style="height:80vh">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('storage/img/coffee.jpg')}}" class="d-block w-100" style="height:80vh">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row-sm" style="text-align:center;display:block;width: auto;height:80vh;border: 1px solid white">
            <p class="fw-light fs-1" style="font-style:italic;margin: 50px 0 0 0">- On The Menu - </p>
            <div class="container-md" style="margin-top:50px">
                <div class="row">
                    <div class="col">
                        <img class="img-fluid p-3" src="{{asset('storage/img/eggs-benedict.jpg')}}"
                            style="max-height: 200px">
                        <p class="fw-normal fs-4 p-3">Egg Benedict</p>
                    </div>
                    <div class="col">
                        <img class="img-fluid p-3" src="{{asset('storage/img/carbonara.jpg')}}"
                            style="max-height: 200px">
                        <p class="fw-normal fs-4 p-3">Spaghetti Cabonara</p>
                    </div>
                    <div class="col">
                        <img class="img-fluid p-3" src="{{asset('storage/img/NasiLemak.webp')}}"
                            style="max-height: 200px">
                        <p class="fw-normal fs-4 p-3">Nasi Lemak Bungkus</p>
                    </div>
                    <div class="col">
                        <img class="img-fluid p-3" src="{{asset('storage/img/salad.jpg')}}" style="max-height: 200px">
                        <p class="fw-normal fs-4 p-3">Healthy Vegan Salad</p>
                    </div>
                </div>
            </div>
            <a href="/menu">
                <button type="button" class="btn btn-secondary"
                    style="border-radius:50px;margin-top:30px;padding:10px 50px" width="1000">
                    <p class="align-middle fs-4" style="margin-bottom: 0px;">See More</p>
                </button>
            </a>
        </div>

        <div class="row-sm" style="text-align:center;display:block;width: auto;height:92vh;border: 1px solid white">
            <div class="row"
                style="text-align:center;display:block;width: auto;height:600px;margin:50px;border: 1px solid black">
                <p class="fw-light fs-1" style="font-style:italic;margin: 40px 0 0 0">- OPEN FOR DINE IN, TAKEOUT, AND
                    DELIVERY - </p>
                <div class="container-md" style="margin-top:50px">
                    <div class="row">
                        <div class="col">
                            <div class="info" style="font-size:30px;text-align:left;margin-left: 200px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                </svg> LOCATION
                                <p class="fs-5">TB 16313, Lot B15 Tkt 1, <br>Perdana Jaya, Tawau 91000 Malaysia.</p>
                                </br>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-calendar2-date-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M9.402 10.246c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-4.118 9.79c1.258 0 2-1.067 2-2.872 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684c.047.64.594 1.406 1.703 1.406zm-2.89-5.435h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675V7.354z" />
                                </svg> OPENING HOURS
                                <p class="fs-5">8:00 AM - 6:00 PM</p>
                                </br>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>CONTACT NUMBER
                                <p class="fs-5">04-1234567</p>
                                </br>
                            </div>
                        </div>
                        <div class="col">
                            <img src="{{asset('storage/img/logo.png')}}"
                                style="width:300px;height:300px;margin-top: 40px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-sm" style="text-align:center;display:block;width: auto;height:85vh;border: 1px solid white">
            <p class="fw-light fs-1" style="font-style:italic;margin: 40px 0 0 0">- Our Story -</p>
            <p style="text-align:justify; margin: auto;padding:0;display:block;width:80%"><br>
                &emsp;&emsp;Han's café, one of the pillars of sustainable food services, is proud to have achieved local
                and
                sustainable sourcing, improved access to tap water and healthy beverages, promoted access to nutritious
                foods, and prevented food waste because of its efforts. A strategy that addresses the food system as a
                critical component of an overall sustainability plan is required to combat a strategy that prioritizes
                the
                health of people and the environment over other considerations. This includes demonstrating notable
                accomplishments in the provision of sustainable food and in the education of consumers on the importance
                of
                eating fresh and healthy foods.
                <br><br>
                &emsp;&emsp;The goal of this café is to raise positive awareness about the importance of eating healthy
                foods through the application of technological solutions. Hans Cafe encourages its patrons to eat
                healthfully to improve their overall well-being. This cafe hopes to assist its customers in making
                healthier
                food choices by focusing on providing healthier food options. The menu is also customized to meet the
                specific requirements of people who fall into a variety of health categories.
                <br><br>
                &emsp;&emsp;Food and Nutrition Services is responsible for providing high-quality nutrition and
                healthcare
                services to customers, employees, and the public. You can learn more about our many services, as well as
                the
                pride with which we provide them, at your convenience by visiting our website.
            </p>
        </div>
    </div>
    @include('layouts.footer')
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>
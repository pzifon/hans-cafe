<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hans Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
</head>

<body class="antialiased">
    @include('layouts.navbar')
    <div class="row">
        <img src="{{ asset('storage/img/logo.png') }}" style="width:500px;height:500px">
    </div>
    <div class="row" style="text-align:center">
        <p style="font-size:28px">Our story</p>
        <p style="text-align:justify; margin:0 30px;"><br>
            &emsp;&emsp;Han's café, one of the pillars of sustainable food services, is proud to have achieved local and sustainable sourcing, improved access to tap water and healthy beverages, promoted access to nutritious foods, and prevented food waste because of its efforts. A strategy that addresses the food system as a critical component of an overall sustainability plan is required to combat a strategy that prioritizes the health of people and the environment over other considerations. This includes demonstrating notable accomplishments in the provision of sustainable food and in the education of consumers on the importance of eating fresh and healthy foods.
            <br><br>
            &emsp;&emsp;The goal of this café is to raise positive awareness about the importance of eating healthy foods through the application of technological solutions. Hans Cafe encourages its patrons to eat healthfully to improve their overall well-being. This cafe hopes to assist its customers in making healthier food choices by focusing on providing healthier food options. The menu is also customized to meet the specific requirements of people who fall into a variety of health categories.
            <br><br>
            &emsp;&emsp;Food and Nutrition Services is responsible for providing high-quality nutrition and healthcare services to customers, employees, and the public. You can learn more about our many services, as well as the pride with which we provide them, at your convenience by visiting our website.
        </p>
    </div>
    <div class="info" style="font-size:20px;text-align:center;">
        </br>
        <i class="material-icons">&#xe55f; LOCATION</i>
        <h2>TB 16313, Lot B15 Tkt 1, Perdana Jaya, Tawau 91000 Malaysia.</h2>
        </br>
        <i class="material-icons">&#xe855; OPENING HOURS</i>
        <h2>8:00 AM - 6:00 PM</h2>
        </br>
        <i class="material-icons">&#xe0b0; PHONE NUMBER</i>
        <h2>04-1234567</h2>
        </br>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hans Cafe</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

        /* :root {
            --main-color: #443;
            --border-radius: 95% 4% 97% 5%/4% 94% 3% 95%;
            --border-radius-hover: 4% 95% 6% 95%/95% 4% 92% 5%;
            --border: .2rem solid var(--main-color);
            --border-hover: .2rem dashed var(--main-color);
        } */

        /* * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            text-transform: capitalize;
            transition: all .2s linear;
        } */

        /* html {
            font-size: 60%;
            overflow-x: hidden;
            scroll-padding-top: 7rem;
            scroll-behavior: smooth;
        } */

        /* section {
            padding: 2rem 9%;
        } */

        .heading {
            font-size: 9rem;
            text-transform: uppercase;
            color: transparent;
            -webkit-text-stroke: .05rem var(--main-color);
            letter-spacing: .2rem;
            text-align: center;
            pointer-events: none;
            position: relative;
        }

        .heading span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            color: var(--main-color);
            font-size: 3rem;
        }

        /* .btn {
            display: inline-block;
            padding: .9rem 1.5rem;
            border-radius: var(--border-radius);
            color: var(--main-color);
            background: none;
            border: var(--border);
            cursor: pointer;
            margin-top: 1rem;
            font-size: 1.7rem;
        } */

        /* .btn:hover {
            border-radius: var(--border-radius-hover);
            border: var(--border-hover);
        } */

        /* .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
            background: #e5f9f8;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
            padding: 2rem 9%;
        } */

        /* .header .logo {
            color: var(--main-color);
            font-size: 2.3rem;
        } */

        /* .header .logo i {
            padding-left: .5rem;
        } */

        /* .header .navbar a {
            margin: 0 1rem;
            font-size: 1.7rem;
            color: var(--main-color);
        } */

        /* .header .btn {
            margin-top: 0;
        } */

        /* #menu-btn {
            font-size: 3rem;
            color: var(--main-color);
            cursor: pointer;
            display: none;
        } */

        /* .home {
            min-height: 100vh;
            padding-top: 12rem;
            background: url(../image/home-bg.jpg) no-repeat;
            background-position: center;
            background-size: cover;
        } */

        /* .home .row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        } */

        /* .home .row .content {
            flex: 1 1 42rem;
        } */

        /* .home .row .image {
            flex: 1 1 42rem;
            padding-top: 10rem;
            text-align: center;
        } */

        /* .home .row .image img {
            height: 35rem;
            animation: float 4s linear infinite;
        } */

        /* @keyframes float {

            0%,
            100% {
            transform: translateY(0rem);
            }

            50% {
            transform: translateY(-7rem);
            }
        } */

        /* .home .row .content h3 {
            font-size: 6.5rem;
            color: var(--main-color);
            text-transform: uppercase;
        } */

        /* .home .image-slider {
            text-align: center;
            padding: 3rem 0;
        } */

        /* .home .image-slider img {
            height: 9rem;
            margin: 0 .5rem;
            cursor: pointer;
            margin-top: 5rem;
        } */

        /* .home .image-slider img:hover {
            transform: translateY(-2rem);
        } */

        /* .book {
            background: url(../image/book-bg.jpg) no-repeat;
            background-position: center;
            background-size: cover;
        }

        .book form {
            margin: 0 auto 2rem auto;
            max-width: 60rem;
            border-radius: var(--border-radius-hover);
            padding: 3rem;
            border: var(--border);
        }

        .book form .box {
            width: 100%;
            padding: 1rem 1.2rem;
            border-radius: .5rem;
            font-size: 1.6rem;
            background: none;
            text-transform: none;
            color: var(--main-color);
            border: var(--border);
            margin: .7rem 0;
        }

        .book form .box:focus {
            border: var(--border-hover);
        }

        .book form textarea {
            height: 15rem;
            resize: none;
        } */

        /* .footer .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(23rem, 1fr));
            gap: 1.5rem;
        } */

        /* .footer .box-container .box h3 {
            font-size: 2.5rem;
            padding: 1rem 0;
            color: var(--main-color);
        } */

        /* .footer .box-container .box a {
            display: block;
            font-size: 1.5rem;
            padding: 1rem 0;
            color: var(--main-color);
        } */

        /* .footer .box-container .box a i {
            padding-right: .5rem;
        } */

        /* .footer .box-container .box a:hover i {
            padding-right: 2rem;
        } */

        /* .footer .credit {
            text-align: center;
            font-size: 2rem;
            padding: 2rem 1rem;
            margin-top: 1rem;
            color: var(--main-color);
        } */

        /* .footer .credit span {
            border-bottom: var(--border-hover);
        } */

        /* media queries  */
        /* @media(max-width:991px) {
            html {
            font-size: 55%;
            }

            .header {
            padding: 2rem;
            }

            section {
            padding: 2rem;
            }
        } */

        /* @media(max-width:768px) {
            .heading {
            font-size: 6rem;
            }

            .heading span {
            font-size: 2.3rem;
            }

            #menu-btn {
            display: initial;
            }

            #menu-btn.fa-times {
            transform: rotate(180deg);
            }

            .header .navbar {
            position: absolute;
            top: 99%;
            left: 0;
            right: 0;
            background: #fff;
            clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
            }

            .header .navbar.active {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
            }

            .header .navbar a {
            display: block;
            font-size: 2.2rem;
            margin: 0;
            padding: 1.5rem 2rem;
            }

            .home {
            text-align: center;
            }

            .home .row .content h3 {
            font-size: 4rem;
            }

            .menu .box-container .box {
            margin-left: 0;
            margin-top: 6rem;
            flex-flow: column;
            text-align: center;
            }

            .menu .box-container .box img {
            margin-left: 0;
            margin-top: -6rem;
            }
        } */

        /* @media(max-width:450px) {
            html {
            font-size: 50%;
            }

            .home .row .image img {
            height: auto;
            width: 100%;
            }
        }

        .icons div {
            font-size: 2.5rem;
            color: #111;
            margin-left: 2rem;
            cursor: pointer;
        }

        .header #menu-btn {
            display: none;
        }

        .time {
            background-color: #124429;
            color: white;
            border: 2px solid black;
            margin: 6px;
            padding: 6px;
        }

        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active,
        .accordion:hover {
            background-color: #ccc;
        }

        .panel {
            padding: 0 18px;
            display: none;
            background-color: white;
            overflow: hidden;
        }

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: #fff;
        }

        .slider {
            width: 800px;
            height: 500px;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 500px;
        }

        .slides {
            width: 500%;
            height: 500px;
            display: flex;
        }

        .slides input {
            dipslay: none;
        }

        .slide {
            width: 20%;
            transition: 2s;
        }

        .slide img {
            width: 800px;
            height: 500px;
        } */

        /*css for manual slide navigation*/
        /* .navigation-manual {
            position: absolute;
            width: 800px;
            margin-top: -40px;
            display: flex;
            justify-content: center;
        } */

        /* .manual-btn {
            border: 2px solid #fff;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: 1s;
        } */

        /* .manual-btn:not(:last-child) {
            margin-right: 40px;
        } */

        /* .manual-btn:hover {
            background: #fff;
        } */

        /* #radio1:checked~.first {
            margin-left: 0;
        } */

        /* #radio2:checked~.first {
            margin-left: -20%;
        } */

        /* #radio3:checked~.first {
            margin-left: -40%;
        } */

        /* #radio4:checked~.first {
            margin-left: -60%;
        } */

        /*css for automatic navigation*/
        /* .navigation-auto {
            position: absolute;
            display: flex;
            width: 800px;
            justify-content: center;
            margin-top: 460px;
        } */

        /* .navigation-auto div {
            border: 2px solid #fff;
            padding: 5px;
            border-radius: 5px;
            transition: 1s;
        } */

        /* .navigation-auto div:not(:last-child) {
            margin-right: 40px;
        } */

        /* #radio1:checked~.navigtion-auto .auto-btn1 {
            background: #fff;
        } */

        /* #radio2:checked~.navigtion-auto .auto-btn1 {
            background: #fff;
        } */

        /* #radio3:checked~.navigtion-auto .auto-btn1 {
            background: #fff;
        } */

        /* #radio4:checked~.navigtion-auto .auto-btn1 {
            background: #fff;
        } */

        .column {
            float: left;
            width: 24%;
            padding: 10px;
            margin: 2px;
        }

        .column-2 {
            float: left;
            width: 48.5%;
            padding: 10px;
            margin: 2px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .info {
            text-align: center;
        }
    </style>
</head>
<!-- <header class="header"><a href="#" class="logo"> Hans Cafe </a><nav class="navbar"><a href="#home">What's Cooking</a><a href="#about">about</a><a href="#menu">menu</a><a href="#contact">contact</a></nav><a href="#" class="btn">Reservation</a><div class="icons"><div><i class="material-icons" style="font-size:36px">&#xe7fd;</i></div></div></header> -->

<body>
    <!-- <div class="slider"><div class="slides"><input type="radio" name="radio-btn" id="radio1"><input type="radio" name="radio-btn" id="radio2"><input type="radio" name="radio-btn" id="radio3"><input type="radio" name="radio-btn" id="radio4"><div class="slide first"><img src="images/1.jpg" alt=""></div><div class="slide"><img src="images/2.jpg" alt=""></div><div class="slide"><img src="images/3.jpg" alt=""></div><div class="slide"><img src="images/4.jpg" alt=""></div><div class="navigation-auto"><div class="auto-btn1"></div><div class="auto-btn2"></div><div class="auto-btn3"></div><div class="auto-btn4"></div></div></div><div class="navigation-manual"><label for="radio1" class='manual-btn"></label><label for="radio2" class= ' manual-btn"></label><label for="radio3" class='manual-btn"></label><label for="radio4" class= ' manual-btn"></label></div></div> -->
    <!-- <section class="home" id="home"><div class="row"><div class="content"><h3>ABOUT US</h3><a href="#" class="btn">READ MORE</a></div></div></section> -->
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top:50px;margin-left:-16px;">
                {{ __('Make Reservation') }}
            </h2>
        </x-slot>
        <div class="info" style="font-size:20px;text-align:center;">
            </br>
            <i class="material-icons" style="">&#xe55f; LOCATION</i>
            <h2>1, Jalan Taylors, 47500 Subang Jaya, Selangor.</h2>
            </br>
            <i class="material-icons">&#xe855; OPENING HOURS</i>
            <h2>8:00 AM - 6:00 PM</h2>
            </br>
            <i class="material-icons">&#xe0b0; CONTACT NUMBER</i>
            <h2>04-1234567</h2>
            </br>
        </div>
        <form action="/create" method="post" style="width:80%;margin:auto" action="/action_page.php">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"><input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="row">
                <div class="column-2" style="background-color:#aaa;">
                    <input type="number" placeholder="Number of people" name="no_of_people" class="" style="width:100%" min=1 required>
                </div>
                <div class="column-2" style="background-color:#bbb;">
                    <input type="Date" placeholder="Date" name="res_date" id="res_date" class="" style="width:100%" required>
                </div>
            </div>

            <div class="row">
                <input type="submit" value="08:00am" name="time_slot" class="column" style="background-color:#aaa;" onclick="return confirm('Confirm reservation at 8:00am?');">
                <input type="submit" value="09:00am" name="time_slot" class="column" style="background-color:#bbb;" onclick="return confirm('Confirm reservation at 9:00am?');">
                <input type="submit" value="10:00am" name="time_slot" class="column" style="background-color:#ccc;" onclick="return confirm('Confirm reservation at 10:00am?');">
                <input type="submit" value="11:00am" name="time_slot" class="column" style="background-color:#ddd;" onclick="return confirm('Confirm reservation at 11:00am?');">
            </div>
            <div class="row">
                <input type="submit" value="12:00pm" name="time_slot" class="column" style="background-color:#aaa;" onclick="return confirm('Confirm reservation at 12:00pm?');">
                <input type="submit" value="01:00pm" name="time_slot" class="column" style="background-color:#bbb;" onclick="return confirm('Confirm reservation at 1:00pm?');">
                <input type="submit" value="02:00pm" name="time_slot" class="column" style="background-color:#ccc;" onclick="return confirm('Confirm reservation at 2:00pm?');">
                <input type="submit" value="03:00pm" name="time_slot" class="column" style="background-color:#ddd;" onclick="return confirm('Confirm reservation at 3:00pm?');">
            </div>
            <div vlass="row">
                <div class="column"></div>
                <input type="submit" value="04:00pm" name="time_slot" class="column" style="background-color:#bbb;" onclick="return confirm('Confirm reservation at 4:00pm?');">
                <input type="submit" value="05:00pm" name="time_slot" class="column" style="background-color:#ccc;" onclick="return confirm('Confirm reservation at 5:00pm?');">
                <div class="column"></div>
            </div>
        </form>
        <!-- <div>
            <h1>Waitlist</h1>
            <button class="accordion">
                <i class="material-icons" style="font-size:36px">&#xe7f4;</i>Waitlist </button>
            </div>
            <div>
            <h1>Private Events</h1>
            <button class="accordion">Request Information</button>
            </div> -->
    </x-app-layout>

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
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hans Cafe</title>
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>


<header class="header">


<a href="#" class="logo"> Hans Cafe </a>

    <nav class="navbar">
        <a href="#home">What's Cooking</a>
        <a href="#about">about</a>
        <a href="#menu">menu</a>
        <a href="#contact">contact</a>
       
    </nav>
	
    <a href="#" class="btn">Reservation</a>
	
         <div class="icons">
            <div><i class="material-icons" style="font-size:36px">&#xe7fd;</i></div>

         </div>
		 
</header>
<body>
<!-- image slider starts  -->
   <div class="slider">
   <div class="slides">
      <!-- radio button starts -->
	  <input type="radio" name="radio-btn" id="radio1">
	  <input type="radio" name="radio-btn" id="radio2">
	  <input type="radio" name="radio-btn" id="radio3">
	  <input type="radio" name="radio-btn" id="radio4">
	  <!-- radio button end -->
	  <!-- slide image starts -->
	  <div class="slide first">
	  <img src="images/1.jpg" alt="">
	  </div>
	  <div class="slide">
	  <img src="images/2.jpg" alt="">
	  </div>
	  <div class="slide">
	  <img src="images/3.jpg" alt="">
	  </div>
	  <div class="slide">
	  <img src="images/4.jpg" alt="">
	  </div>
	  <!-- slide images end -->
	  <!-- automatic navigation start -->
	  <div class="navigation-auto">
	  <div class="auto-btn1"></div>
	  <div class="auto-btn2"></div>
	  <div class="auto-btn3"></div>
	  <div class="auto-btn4"></div>
	  </div>
	  <!-- automatic navigation end -->
	  </div>
	  <!-- manual navigation start -->
	  <div class="navigation-manual">
	  <label for="radio1" class= 'manual-btn"></label>
	  <label for="radio2" class= 'manual-btn"></label>
	  <label for="radio3" class= 'manual-btn"></label>
	  <label for="radio4" class= 'manual-btn"></label>
	  </div>
	  <!-- manual navigation end -->
	  </div>
	  <!-- image slider end -->	  

<!-- home section starts  -->


<section class="home" id="home">




    <div class="row">


		   
        <div class="content">
            <h3>ABOUT US</h3>
            <a href="#" class="btn">READ MORE</a>
        </div>


    </div>

</section>

<!-- home section ends -->

<!-- booking section start -->
<section class="book" id="book">

    <h1 class="heading"> booking <span>reserve a table</span> </h1>
	<h3 class="title"><i class="material-icons" style="font-size:36px">&#xe55f;</i> 1, Jalan Taylors, 47500 Subang Jaya, Selangor.</h3>

<div class="time">
<h2><i class="material-icons" style="font-size:36px">&#xe855;</i>10:00 AM - 10:00 PM</h2>
<h2><i class="material-icons" style="font-size:36px">&#xe0b0;</i>04-1234567</h2>
</div> 


    <form action="">
	<input type="number" placeholder="Number of people" class="box">


<input type="Date" placeholder="Date & Time" class="box">

</form>
<div>
<h1>Waitlist</h1>

<button class="accordion"><i class="material-icons" style="font-size:36px">&#xe7f4;</i>Waitlist</button>

</div>

<div>
<h1>Private Events</h1>

<button class="accordion">Request Information</button>

</div>

<!-- booking section end -->
</section>
</body>
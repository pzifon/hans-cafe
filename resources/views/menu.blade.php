<!DOCTYPE html>
<html>
 <head>
  <title> Menu </title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
</style>
 </head>

 <body>
 
<div class="head">
<h1 style="font-family:NotoSerifTamilSlanted">Our Signature</h1>
</div>
<div class="sidenav">
  <a href="#contact">Our Signature</a>
  <a href="#contact">Veggie Lover</a>
  <a href="#contact">Appetizer</a>
  <a href="#contact">Soup</a>
  <a href="#contact">Salad</a>
  <a href="#about">Main Course</a>
    <a href="#contact">Beverages</a>
	<a href="#contact">Dessert</a>

</div>
<hr class="TopLine">

<div class="Linel"></div>
<div class="MenuContent">
  <div class="row">
  <div class="row">
    <div class="column">
      <img src="img/salad.jpg" style="width:250px; height:150px;" >
    </div>
    <div class="column">
       <h2>Salad (57g)</h2>
       <p class="des">Letture, Cucumber, Tomato and Olive</p>
       <p class="Cal">Cals 13</p>
    </div>
    <div class="column">
      <div class="row">
        <h2 style="text-align:right">RM 15.90</h2>
      </div>
    <div class="row">
      <button class="button">Add to Cart</button>
    </div>
  </div>
 </div>
  
  <hr class="MenuLine">
  
  <div class="row">
    <div class="column">
      <img src="img/Americano.jpg" style="width:250px; height:150px;" >
    </div>
    <div class="column">
       <h2>Americano (16oz)</h2>&nbsp
       <p class="des"></p>
       <p class="Cal">Cals 15</p>
    </div>
    <div class="column">
      <div class="row">
        <h2 style="text-align:right">RM 9.90</h2>
      </div>
    <div class="row">
      <button class="button">Add to Cart</button>
    </div>
  </div>
 </div>
  
  <hr class="MenuLine">
  
  <div class="row">
    <div class="column">
      <img src="img/NasiLemak.webp" style="width:250px; height:150px;">
    </div>
    <div class="column">
       <h2>Nasi Lemak Bungkus</h2>
       <p class="des">Ikan bilis, Peanuts, Sambal Belacan, Served on a Banana Leaf.</p>
       <p class="Cal">Cals 230</p>
    </div>
        <div class="column">
      <div class="row">
        <h2 style="text-align:right">RM 3.90</h2>
      </div>
    <div class="row">
      <button class="button">Add to Cart</button>
    </div>
  </div>
  </div>
  
  <hr class="MenuLine">
  
<div class="row">
    <div class="column">
      <img src="img/salad.jpg" style="width:250px; height:150px;" >
    </div>
    <div class="column">
       <h2>Salad (57g)</h2>
       <p class="des">Letture, Cucumber, Tomato and Olive</p>
       <p class="Cal">Cals 13</p>
    </div>
    <div class="column">
      <div class="row">
        <h2 style="text-align:right">RM 15.90</h2>
      </div>
    <div class="row">
      <button class="button">Add to Cart</button>
    </div>
  </div>
 </div>
  
  <hr class="MenuLine">
  
  <div class="row">
    <div class="column">
      <img src="img/Americano.jpg" style="width:250px; height:150px;" >
    </div>
    <div class="column">
       <h2>Americano (16oz)</h2>&nbsp
       <p class="des"></p>
       <p class="Cal">Cals 15</p>
    </div>
    <div class="column">
      <div class="row">
        <h2 style="text-align:right">RM 9.90</h2>
      </div>
    <div class="row">
      <button class="button">Add to Cart</button>
    </div>
  </div>
 </div>
  
  <hr class="MenuLine">
  
  <div class="row">
    <div class="column">
      <img src="img/NasiLemak.webp" style="width:250px; height:150px;">
    </div>
    <div class="column">
       <h2>Nasi Lemak Bungkus</h2>
       <p class="des">Ikan bilis, Peanuts, Sambal Belacan, Served on a Banana Leaf.</p>
       <p class="Cal">Cals 230</p>
    </div>
        <div class="column">
      <div class="row">
        <h2 style="text-align:right">RM 3.90</h2>
      </div>
    <div class="row">
      <button class="button">Add to Cart</button>
    </div>
  </div>
  </div>
  </div>
  </div>
  
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

 </body>
</html>
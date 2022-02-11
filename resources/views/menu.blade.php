<!DOCTYPE html>
<html>
  <head>
    <title> Menu </title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
      .MenuContent {
        margin-top: 0%;
        /* Same width as the sidebar + left position in px */
        font-size: 28px;
        /* Increased text to enable scrolling */
        padding: 0px 10px;
        box-sizing: border-box;
      }

      h2 {
        margin: 0px;
        margin-left: -50px;
        font-size: 20px;
      }

      .des {
        font-size: 15px;
      }

      .Cal {
        font-size: 20px;
        margin-top: 20px;
      }

      .button {
        background-color: #76e500;
        border: none;
        color: white;
        padding: 5px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 70px 2px 2px;
        cursor: pointer;
        border-radius: 20px;
        float: right;
      }

      .column {
        float: left;
        width: 33%;
        padding: 5px;
      }

      .col-s {
        float: left;
        width: 15%;
        padding: 5px;
      }

      /* Clearfix (clear floats) */
      .row::after {
        content: "";
        clear: both;
        display: table;
      }

      .MenuLine {
        margin-top: 0px;
        width: 1050px;
      }

      .big-font {
        font-size: 20px;
        margin-top: 10px;
        margin-left: 20px;
      }

      @media screen and (max-height: 450px) {}
    </style>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header" style="position:fixed">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-top:50px;margin-left:-16px;">
          {{ __('Menu') }}
        </h2>
      </x-slot>
      <div>
        <div class="col-s" style="position:relative">
          <a href="#" class="w3-bar-item w3-button">Our Signature</a></br>
          <a href="#" class="w3-bar-item w3-button">Veggie Lover</a></br>
          <a href="#" class="w3-bar-item w3-button">Appetizer</a></br>
          <a href="#" class="w3-bar-item w3-button">Soup</a></br>
          <a href="#" class="w3-bar-item w3-button">Salad</a></br>
          <a href="#" class="w3-bar-item w3-button">Main Course</a></br>
          <a href="#" class="w3-bar-item w3-button">Beverages</a></br>
          <a href="#" class="w3-bar-item w3-button">Dessert</a></br>
        </div>
        <div style="margin-left:15%">
          <h1 class="big-font">Our Signature</h1>
          <div class="MenuContent">
            <div class="row">
              <div class="column">
                <img src="{{ asset('storage/img/salad.jpg') }}" style="width:250px; height:150px;">
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
            <div class="row">
<<<<<<< Updated upstream
              <button class="button">Add to Cart</button>
=======
              <div class="column">
                <img src="{{ asset('storage/img/Americano.jpg') }}" style="width:250px; height:150px;">
              </div>
              <div class="column">
                <h2>Americano (16oz)</h2>&nbsp <p class="des"></p>
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
>>>>>>> Stashed changes
            </div>
          </div>
        </div>
        <hr class="MenuLine">
        <div class="row">
          <div class="column">
            <img src="img/salad.jpg" style="width:250px; height:150px;">
          </div>
          <div class="column">
            <h2>Salad (57g)</h2>
            <p class="des">Letture, Cucumber, Tomato and Olive</p>
            <p class="Cal">Cals 13</p>
          </div>
          <div class="column">
            <div class="row">
<<<<<<< Updated upstream
              <h2 style="text-align:right">RM 15.90</h2>
=======
              <div class="column">
                <img src="{{ asset('storage/img/NasiLemak.jpg') }}" style="width:250px; height:150px;">
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
>>>>>>> Stashed changes
            </div>
            <div class="row">
<<<<<<< Updated upstream
              <button class="button">Add to Cart</button>
=======
              <div class="column">
                <img src="{{ asset('storage/img/salad.jpg') }}" style="width:250px; height:150px;">
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
>>>>>>> Stashed changes
            </div>
          </div>
        </div>
        <hr class="MenuLine">
        <div class="row">
          <div class="column">
            <img src="img/Americano.jpg" style="width:250px; height:150px;">
          </div>
          <div class="column">
            <h2>Americano (16oz)</h2>&nbsp <p class="des"></p>
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
<<<<<<< Updated upstream
              <h2 style="text-align:right">RM 3.90</h2>
=======
              <div class="column">
                <img src="{{ asset('storage/img/Americano.jpg') }}" style="width:250px; height:150px;">
              </div>
              <div class="column">
                <h2>Americano (16oz)</h2>&nbsp <p class="des"></p>
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
>>>>>>> Stashed changes
            </div>
            <div class="row">
<<<<<<< Updated upstream
              <button class="button">Add to Cart</button>
=======
              <div class="column">
                <img src="{{ asset('storage/img/NasiLemak.jpg') }}" style="width:250px; height:150px;">
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
>>>>>>> Stashed changes
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
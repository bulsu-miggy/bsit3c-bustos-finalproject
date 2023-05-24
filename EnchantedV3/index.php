<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Enchanted Isle Resort</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Acme"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Balthazar"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Beth Ellen"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
      <nav>
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
          <i class="fas fa-bars"></i>
        </label>
        <a class="logo" href="index.php">
          <img class="logo" src="Pictures/finalogo.png" alt="logo"
        /></a>

        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="roomsandcotagges.php">Room & Cottages</a></li>
          <li><a href="resortrules.php">Resort Rules</a></li>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
          <a class="cta" href="booknow.php"><button>Book Now!</button></a>
          <a href="indexx.php">Log in</a>
        </ul>
      </nav>
    </header>
    <section class="hometitle">
      <br />
      <br />
      <center class="welcome">Welcome</center>
      <center class="to">To</center>
      <center class="enchantedisle">Enchanted Isle</center>
      <center class="privateresort">private resort</center>
      <br />
      <center class="tagline">Stay for the memories, relax and unwind!</center>
    </section>

    <div class="area-container-1">
      <h1>Rooms and Cottages</h1>
      <div class="container-1">
        <div class="image">
          <img src="Pictures/largecottage.png" alt="rooms" />
        </div>

        <div class="text">
          <p>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbspEnchanted Isle Resort gives you a place to relax and unwind while you have fun and make memories with your love ones. We offer you these peaceful places with all the wonderful views that will relax your mind. Enjoy all the amazing amenities that you will surely enjoy and have fun with everyone. 
          Come join stay with us here at Enchanted Isle Resort and stay to make memories, relax and unwind!
        </p>
        </div>
        <a class="button" href="roomsandcotagges.php"><button>See More</button></a>
      </div>
    </div>

    <div class="divider">
      <div class="line">
        <div class="diamond"></div>
      </div>
    </div>

    <div class="area-container-2">
      <h1>Resort Rules</h1>
      <div class="container-2">
        <div class="image">
          <img src="Pictures/main.png" alt="rooms" />
        </div>

        <div class="text">
          <p>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbspMaintaining the safetiness and satisfaction of everyone is our top priority. We want to ensure to everyone that they will experience their stay with us with high standards. 
          Together with the resort rules and COVID Health Protocols, everyone should comply to prevent any unnecessary situations. These Rules and regulations are a must to maintain the wellness of the place and the safeness of everyone from any hazard that may cause any harm.
          </p>
        </div>
        <a class="button" href="resortrules.php"><button>See More</button></a>
      </div>
    </div>

    <div class="divider">
      <div class="line">
        <div class="diamond"></div>
      </div>
    </div>

    <div class="area-container-3">
      <h1><b>About Us</b></h1>
      <div class="container-3">
        <div class="image">
          <img src="Pictures/reception.png" alt="rooms" />
        </div>

        <div class="text">
          <h2>Come stay with us here in Enchanted Isle Resort</h2>
          <p class="p1">
            &nbsp&nbsp&nbsp&nbsp&nbspStay for the memories here at Enchanted Isle Resort
     Enchanted Isle Resort is a private resort that offers numerous services to satisfy everyone's wants. The place are built to entertain everyone who wants to make memories, relax, and unwind during their stay. 
     Enchanted Isle Resort ensures that everyone will have their peace.
          </p>
          <p class="p2">
            &nbsp&nbsp&nbsp&nbsp&nbspRest assured that the facilities are filled with friendly staff to guide and be there for you whenever you need some help. The staffs are well trained and have the ability to entertain any question you have in mind. 
            We ensure that you and your love ones will enjoy your stay here at Enchanted Isle Resort.
          </p>
          <a class="button" href="AboutUs.php"><button>Learn More</button></a>
        </div>
      </div>
    </div>

    <div class="divider">
      <div class="line">
        <div class="diamond"></div>
      </div>
    </div>

    <div class="area-container-4">
      <h1><b>Contact Us</b></h1>
      <div class="container-4">
        <div class="text">
          <p class="p1">
          Enchanted Isle is located at 7302 Sulivan, San Jose, Pampanga. You can reach us in our email and contact number provided here in the website. Any inquiries will be 
            entertained any time of the day. The staffs are always ready to answer your calls and any inquiries needed from the resort. Come stay here with us and make memories at Enchanted Isle Resort, where in you can make memories, relax, and unwind.
          </p>
          <p class="p2">
          
          </p>
          <center>
            <a class="button" href="ContactUs.php"><button>Learn More</button></a>
          </center>
        </div>
      </div>
    </div>
    <footer>
      <div class="waves">
        <div class="wave" id="wave1"></div>
        <div class="wave" id="wave2"></div>
        <div class="wave" id="wave3"></div>
        <div class="wave" id="wave4"></div>
      </div>
      <ul class="social_icon">
        <li>
          <a href="https://www.facebook.com/profile.php?id=100088705509554&sk=about"><i class="fa-brands fa-facebook"></i></a>
        </li>
        <li>
          <a href="https://twitter.com/i/flow/login"><i class="fa-brands fa-twitter"></i></a>
        </li>
        <li>
          <a href="https://www.linkedin.com/login"><i class="fa-brands fa-linkedin"></i></a>
        </li>
        <li>
          <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
        </li>
      </ul>
      <!-- <ul class="menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">Room & Cottages</a></li>
        <li><a href="#">Resort Rules</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul> -->
      <p>©2022 Enchanted Isle Resort | All Rights Reserved</p>
    </footer>
  </body>
</html>

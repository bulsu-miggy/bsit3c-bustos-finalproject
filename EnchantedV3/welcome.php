<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo "Welcome " . $row['name'] . " <a href='logout.php'>Logout</a>";
    }
?>
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
          <a href="index.php">Log in</a>
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
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLorem ipsum dolor
            sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Sed nisi lacus sed
            viverra tellus in hac habitasse. Sed egestas egestas fringilla
            phasellus faucibus scelerisque. A condimentum vitae sapien
            pellentesque. Diam sit amet nisl suscipit adipiscing bibendum est
            ultricies integer.
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
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLorem ipsum dolor
            sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Sed nisi lacus sed
            viverra tellus in hac habitasse. Sed egestas egestas fringilla
            phasellus faucibus scelerisque. A condimentum vitae sapien
            pellentesque. Diam sit amet nisl suscipit adipiscing bibendum est
            ultricies integer.
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
            &nbsp&nbsp&nbsp&nbsp&nbspEnchanted met commodo nulla facilisi
            nullam. Eu nisl nunc mi ipsum. Lorem sed risus ultricies tristique
            nulla aliquet enim tortor at. Ut tristique et egestas quis ipsum
            suspendisse ultrices gravida dictum. Morbi blandit cursus risus at
            ultrices. Risus quis varius quam quisque id diam.
          </p>
          <p class="p2">
            &nbsp&nbsp&nbsp&nbsp&nbspWe hasellus egestas tellus rutrum tellus
            pellentesque eu tincidunt tortor. Eget sit amet tellus cras
            adipiscing enim eu turpis. hasellus egestas tellus rutrum tellus
            pellentesque eu tincidunt tortor. Eget sit amet tellus cras
            adipiscing enim eu turpis.
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
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Suspendisse potenti nullam ac tortor vitae purus. Scelerisque eu
            ultrices vitae auctor eu. Elementum sagittis vitae et leo. Ante in
            nibh mauris cursus mattis molestie. Adipiscing enim eu turpis
            egestas pretium aenean pharetra magna ac.
          </p>
          <p class="p2">
            Morbi non arcu risus quis varius. Tristique nulla aliquet enim
            tortor at auctor urna nunc id. Nibh sed pulvinar proin gravida
            hendrerit lectus. Egestas quis ipsum suspendisse ultrices gravida.
            Mi in nulla posuere sollicitudin aliquam ultrices sagittis. Mauris
            sit amet massa vitae. Elit at imperdiet dui accumsan sit amet nulla.
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

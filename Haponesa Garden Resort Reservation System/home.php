<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {


?>



<?php 
}else{
    
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haponesa Garden Resort</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>

    <section class="top" id="home">
        <div class="logo">
        
        <center><img src="pictures/haponesalogo.png" style="height: 100px; width: 400 px;"></center>

        </div>
        
        <div class="container borderYtoX">
       
        <a href="editaccount.php" > <?php echo $_SESSION['username']; ?></a>
            <a href="#home" >Home</a>
           <a href="#reserve" id="reservation">Reservation</a>
            <a href="#services">Services</a>
            <a href="#features">Features</a>
            <a href="#contact">Contact Us</a>
            <a href="login.php"><?session_destroy();?>Log Out</a>
        
        </div>
    </div>

    </section>
    <section class="wz-slider">
        <figure>
            <img src="pictures/haponesa public pool.jpg">
            <img src="pictures/hap.jpg">
            <img src="pictures/hap1.jpg">
            <img src="pictures/event hall.jpg">
            <img src="pictures/hp rooms.png">
        </figure>

    </section>

    <section class="middle">
        <div class="row">
            <div class="middle-col">
               <marquee scrollamount="25"><h1><span class="title1">WELCOME TO HAPONESA GARDEN RESORT 🌊</span></h1></marquee>
            </div>
        </div>
       <div class="column">
        <center> <h3>Haponesa Garden Resort was established on year 2005</h3> </center>
        </div>
       

     

            <center><p style="font-size: 35px;">OFFERS AND SERVICES</p>
            <div class="offersandserv d-none hov" id="services">
            <h2></h2>
            <p></p>
            <style>

.hov {

cursor: pointer;
text-decoration: none;
background-color: #008080; 
}
.hov :hover {background-color: #00FFFF}

                .d-none{

                    display: none important;

                }
                </style>
           
          
</div>
            

          
        </center>
        </div>
<br>
    </section>

    <section class="last">
        <div class="row">
            <div class="last col1" id="features">
                <span ></span>
                <h1>Features that make<br> any resort feel like <br> a magnificence resort</h1>
            </div>
            <div class="last-col2" >
                <p>01. Simple Reservation</p>
                <hr>
                <p>02. Fast, Friendly Cheerful Helped Knowledge Staff</p>
                <hr>
                <p>03. Outstanding Decoration and Room Amenities</p>
                <hr>
                <p>04. Basketball Court</p>
                <hr>
                <p>05. A Stunning Location</p>
                <hr>
            </div>
        </div>
    </section>
<br>
 <section class="gallery">
       
        <div class="photo">
        <h3> Pool No.1 <h3>
            <img src="pictures/haponesa public pool.jpg" alt="hppublicpool" style="height: 555px;">
        </div>

        <div class="photo">
        <h3> Pool No.2 <h3>
            <img src="pictures/hap2.jpg" alt="hap2">

        </div>

        <div class="photo">
            <img src="pictures/hap1.jpg" alt="hap1">

        </div>

        <div class="photo">
            <img src="pictures/hap.jpg" alt="hap">

        </div>

    </section>


    <section class="gallery">

    <div class="photo">
    <h3> Basketball Court <h3>
            <img src="pictures/hp court.jpg" alt="hpcourt">
        </div>

        <div class="photo">
        <h3> Event Hall <h3>
            <img src="pictures/event hall.jpg" alt="hpeventhall">
        </div>

        <div class="photo">
        <h3> Cottages <h3>
            <img src="pictures/hp cottage.png" alt="hpcottage">
        </div>

        <div class="photo">
            <h3> Rooms <h3>
            <img src="pictures/rooms.png" alt="rooms" style="height: 343px;">
        </div>


</section>

    <center><button id="reserve">Reserve Now!</button></center>
    


    <section id="rsform" style="display: none;">
        <form method="POST" id="submit" name="submit" action="validation.php">
            <div class="elem-group">
              <label for="name">Your Name</label>
              <input type="text" id="name" name="customer_name" placeholder="Haponesa Resort" required> 
            </div>
            <div class="elem-group">
              <label for="email">Your E-mail</label>
              <input type="email" id="email" name="customer_email" placeholder="haponesagardenresort@gmail.com" required>
            </div>
            <div class="elem-group">
              <label for="phone" >Your Phone</label>
              <input type="tel" id="phone" name="customer_phone" placeholder="+639999999999" required>
            </div>
            <hr>
            <div class="elem-group inlined">
              <label for="checkin-date">Start Date</label>
              <input type="date" id="checkin-date" name="checkin" required>
            </div>

            <div class="elem-group inlined">
              <label for="checkin-date">End Date</label>
              <input type="date" id="checkout-date" name="checkout" required>
            </div>

            <hr>
            <div class="elem-group">
              <label for="message">OFFERS and SERVICES</label>
              <input type="checkbox" name="offersandservices[]" value="Private Pool">Private Pool P 6,000 1 Day <br> <br>
              <input type="checkbox" name="offersandservices[]" value="Event Hall and Private Pool">Event Hall and Private Pool P 11,000 <br> <br>
              <input type="checkbox" name="offersandservices[]" value="Rooms">Rooms P 1,800 per night <select name="rooms" style="width: 60px; height: 45px;">
              <option value=''>No Room</option>
   <option value='1'>1 Room</option>
   <option value='2'>2 Rooms</option>
   <option value='3'>3 Rooms</option>
   <option value='4'>4 Rooms</option>
   <option value='5'>5 Rooms</option>
   <option value='6'>6 Rooms</option>
   <option value='7'>7 Rooms</option>
   <option value='8'>8 Rooms</option>
</select> <br> 
              <input type="checkbox" name="offersandservices[]" value="Cottages">Cottages P 500 per cottage  <select name="cottage" style="width: 60px; height: 45px;">
              <option value=''>No Cottage</option>
              <option value='1'>1 Cottage</option>
   <option value='2'>2 Cottages</option>
   <option value='3'>3 Cottages</option>
   <option value='4'>4 Cottages</option>
   <option value='5'>5 Cottages</option>
   <option value='6'>6 Cottages</option>
</select><br> 
            </div>
            <center><button name="submit">Reserve</button></center>


       

</form>

    </section>


    <section class="maps" >
        <center><h1>Haponesa Garden Resort Map </h1>
        <strong>
        <p>Address: Magsaysay Road, Barangay Tibagan, San Miguel, 3011 Bulacan</p>
        <p>Email: haponesagardenresort@gmail.com</p>
        <p id="contact">Contact: +639285327549</p>
</strong>
        <br>
        
        <img src="pictures/haponesa overview.png" style="width: 625px; height:450px;" alt="HP Overview">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d493553.26929100126!2d120.66597752994623!3d14.887712232132063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33971b6698052857%3A0x5de0fc736e59aba5!2sHaponesa%20Garden%20Resort!5e0!3m2!1sen!2sph!4v1669197239393!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </center>

    
    </section>

    <div style="height: 50px"><span></span></div>

    <section class="footer">
        <div class="icons">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
<br><br>
<span> &COPY Copyright HAPONESA GARDEN RESORT 2022
        </span>

        </div>
    </section>
<script src="offersandservicescript.js"></script>
    <script src="script.js"></script>
</body>

</html>
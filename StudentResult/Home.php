<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="js/strandoption.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="css/homes.css">

  <title>Home Page</title>
</head>
<body>
  <!-- Nav Bar Start -->
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="image/logoo.png" alt="" width="150px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Login</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>

  </header>
  <!-- Nav Bar End -->
  <!-- Carousel Start -->
  <section class="sect" id="sect">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="carousel-background">
            <img src="image/Slider1.jpg" alt="">
            <div class="carousel-container">
              <div class="carousel-content-container">
                <h2>Welcome To Senior High School</h2>
                  <div class="buttons">
                    <a href="#strand" class="buttonsd">Strands Offer</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="carousel-background">
            <img src="image/Slider2.jpg" alt="">
            <div class="carousel-container">
              <div class="carousel-content-container">
                <h2>Student Grade Result System</h2>
                <!--<p>This system is designed to provide the final grade result to the students in a simple way. This project 
                    is useful for students and institutions for getting the results in a simple manner.</p>-->
                    <div class="buttons">
                    <a href="#about" class="buttonsd">About</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  <!-- Carousel End -->

  <!-- About Us Start -->
  <section class="about" id="about">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
              <img src="image/aboutus.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-md-6">
            <div class="about-content">
              <span>About Us</span>
              <h2>Student Grade Result System</h2>
              <p>This system is designed to provide the final grade result to the students in a simple way. This project 
                is useful for students and institutions for getting the results in a simple manner.</p>
                <div class="buttons">
                    <a href="" class="button3">Read More<i class="bi bi-arrow-right-square-fill"></i></a>
                </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- About Us End -->


  <!-- Strand Offer -->
  <div class="row">
      <h2 class="text-center">Were Offering!</h2>
  </div>
  <section class="strands mt-5 mb-5" id="strandsection">
    
    
  </section>
  <div class="row">
  <div class="container d-none" id="display_strand"> <div class="d-flex justify-content-center"> 
      <div class="row mt-5">
        <div class="col-lg-4">
          <div class="single-courses-box border">
            <div class="icon">
            </div>
            <h3 class="strand-title"></h3>
            <p class="description-details"></p>
          </div>
        </div>
      </div> 
    </div> 
</div>  </div> 
  <!-- Strand Offer End-->

  <!-- Footer -->
  <footer id="contact">
        <div class="footer-content">
            <h3>STUDENT GRADE RESULT SYSTEM</h3>
            <p> is an online platform that allows teachers and administrators to manage student grades. 
              This system provides a secure and easy-to-use interface for teachers to enter and manage student 
              grades, instantly report grades to students, parents and administration.This system can improve 
              the accuracy and speed of grade entry and reporting. </p>
                <ul class="socials">
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                    <li><a href=""><i class="fa fa-youtube"></i></a></li>
                    <li><a href=""><i class="fa fa-linkedin-square"></i></a></li>
                </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2022 SGRS. designed by <span>SGRS</span></p>
        </div>
    </footer>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>
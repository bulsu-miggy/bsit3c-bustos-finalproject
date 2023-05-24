<?php echo '<pre>'. htmlentities('http://localhost/EnchantedV3./xmlfiles/update.xml').'</pre>'; ?>

<?php
$connect = mysqli_connect("localhost", "root", "", "testing1");
$tab_query = "SELECT * FROM category ORDER BY category_id ASC";
$tab_result = mysqli_query($connect, $tab_query);
$tab_menu = '';
$tab_content = '';
$i = 0;
while($row = mysqli_fetch_array($tab_result))
{
 if($i == 0)
 {
  $tab_menu .= '
   <li class="active"><a href="#'.$row["category_id"].'" data-toggle="tab">'.$row["category_name"].'</a></li>
  ';
  $tab_content .= '
   <div id="'.$row["category_id"].'" class="tab-pane fade in active">
  ';
 }
 else
 {
  $tab_menu .= '
   <li><a href="#'.$row["category_id"].'" data-toggle="tab">'.$row["category_name"].'</a></li>
  ';
  $tab_content .= '
   <div id="'.$row["category_id"].'" class="tab-pane fade">
  ';
 }
 $product_query = "SELECT * FROM product WHERE category_id = '".$row["category_id"]."'";
 $product_result = mysqli_query($connect, $product_query);
 while($sub_row = mysqli_fetch_array($product_result))
 {
  $tab_content .= '
  <div class="col-md-3" style="margin-bottomt:10px;">
   <img src="images/'.$sub_row["product_image"].'" class="img-responsive img-thumbnail" />
   <h4>'.$sub_row["product_name"].'</h4>
  </div>
  ';
 }
 $tab_content .= '<div style="clear:both"></div></div>';
 $i++;
}
?>
 <!-- database mysql ends</ul> -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Enchanted Isle Resort</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="roomsandcotages.css" />
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

    <header>
      <nav>
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
          <i class="fas fa-bars"></i>
        </label>
        <a class="logo" href="index.php"
          ><img class="logo" src="Pictures/finalogo.png" alt="logo"
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
        </ul>
      </nav>
    </header>
        <p>Rooms and Cottages</p>
        <div class="divider">
       <div class="line">
       <div class="diamond"></div>
       </div>
      </div>

 <!-- nav bar ends ends</ul> -->
 <div class="item-container">
 <div class="container">
   <br />
       <ul class="nav nav-tabs">
        <?php
          echo $tab_menu;
          ?>
         </ul>
         <div class="tab-content">
         <br />
         <?php
         echo $tab_content;
          ?>
      </div>
<!-- images ends ends</ul> -->  

 </div></div></div></div></div></div></div></div></div> </div>
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
      <p>©2022 Enchanted Isle Resort | All Rights Reserved</p>
    </footer>
  </body>
</html>
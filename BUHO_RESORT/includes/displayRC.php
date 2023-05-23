<?php
    // Include the database configuration file
    include 'db_con.php';
    // Get images from the database
    $query = "SELECT * FROM cottage_room Where CRid=1";
    $result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result) ;
    $imageURL = 'includes/room_cottages/'.$row["photo"];
    $cottage_type = $row["cottage_type"];
    $class = $row["class"];
    $person = $row["person"];
    $price = $row["price"];

	$query2 = "SELECT * FROM cottage_room Where CRid=2";
    $result2 = mysqli_query($conn, $query2);
	$row2 = mysqli_fetch_assoc($result2) ;
    $imageURL2 = 'includes/room_cottages/'.$row2["photo"];
    $cottage_type2 = $row2["cottage_type"];
    $class2 = $row2["class"];
    $person2 = $row2["person"];
    $price2 = $row2["price"];

	$query3 = "SELECT * FROM cottage_room Where CRid=3";
    $result3 = mysqli_query($conn, $query3);
	$row3 = mysqli_fetch_assoc($result3) ;
    $imageURL3 = 'includes/room_cottages/'.$row3["photo"];
    $cottage_type3 = $row3["cottage_type"];
    $class3 = $row3["class"];
    $person3 = $row3["person"];
    $price3 = $row3["price"];

	$query4 = "SELECT * FROM cottage_room Where CRid=4";
    $result4 = mysqli_query($conn, $query4);
	$row4 = mysqli_fetch_assoc($result4) ;
    $imageURL4 = 'includes/room_cottages/'.$row4["photo"];
    $cottage_type4 = $row4["cottage_type"];
    $class4 = $row4["class"];
    $person4 = $row4["person"];
    $price4 = $row4["price"];

	$query5 = "SELECT * FROM cottage_room Where CRid=5";
    $result5 = mysqli_query($conn, $query5);
	$row5 = mysqli_fetch_assoc($result5) ;
    $imageURL5 = 'includes/room_cottages/'.$row5["photo"];
    $cottage_type5 = $row5["cottage_type"];
    $class5 = $row5["class"];
    $person5 = $row5["person"];
    $price5 = $row5["price"];

	$query6 = "SELECT * FROM cottage_room Where CRid=6";
    $result6 = mysqli_query($conn, $query6);
	$row6 = mysqli_fetch_assoc($result6) ;
    $imageURL6 = 'includes/room_cottages/'.$row6["photo"];
    $cottage_type6 = $row6["cottage_type"];
    $class6 = $row6["class"];
    $person6 = $row6["person"];
    $price6 = $row6["price"];
    

?>
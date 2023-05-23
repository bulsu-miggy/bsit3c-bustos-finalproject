<?php 


$conn = new mysqli('localhost:3306','root','','crud');

    if(!$conn){
  
        die(mysqli_error($conn));
    
    }
    
    
    $new_start_date = $_POST['checkin'];
    $new_end_date = $_POST['checkout'];
    
    $query    = "SELECT * FROM reserved WHERE '$new_start_date' <= end_date 
                         AND '$new_end_date' >= start_date ";
    
    $result = mysqli_query($conn, $query) or die(mysql_error());
    
    
    if (mysqli_num_rows($result)==0)
    {
        echo "<script>alert ('RESERVED!'); window.location.href='home.php';   </script>";
        if(isset($_POST['submit'])){
            $name = $_POST['customer_name'];
            $email = $_POST['customer_email'];
            $phone = $_POST['customer_phone'];
            $startdate = $_POST['checkin'];
            $enddate = $_POST['checkout'];
 
            $offandserv = $_POST['offersandservices'];
            $rooms = $_POST['rooms'];
            $cottage = $_POST['cottage'];
            $b=implode(',',$offandserv);

        
             $query = "insert into reserved(Name, Email, Phone, start_date, end_date, Offers, rooms, cottage) values ('$name','$email','$phone','$startdate','$enddate','$b','$rooms','$cottage')";
            
             $testquery = mysqli_query($conn, $query);
             
    }
    }
    else
    {
        echo "<script>alert ('There is a conflict with your schedule'); window.location.href='home.php';  </script>";
        
     
    
    
    }
    




?>
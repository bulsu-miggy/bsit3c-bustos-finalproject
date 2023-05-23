<?php
include 'dbconnection.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass = $_POST['pass'];

    $query = "insert into crud (name, email, password ) values ('$name','$email', '$password')";
    //insert into tablename (columnName, columnName) values ('$_POST['name']', '$password');

    $resultquery = mysqli_query($conn, $query);
    // if($resultquery){
    //     echo "Data Successfully saved!";
    // }
    // else{
    //     die(mysqli_error($conn));
    // }
    if(!$resultquery){
        die(mysqli_error($conn));
    }
    else{
        if($pass==$password){
            header('location:login.php');
        }
        else{
            header('location:create.php');
        }
    }
    //header('location:retrieve.php');
}
?>
<!doctype html>
  <head>
    <title>Sign Up</title>
  </head>
  <style>
    body
{
    background-color:white; 
}
.center
{
    width: 350px;
    height: 300px;
    padding: 10px 10px;
    background: rgba(0, 0, 0, 0.5);
    margin-top: -3%;
    margin-left:36%;
}
.center1
{
    width: 450px;
    height: 450px;
    padding: 10px 10px;
    background: black;
    margin-top: 10%;
    margin-left:31%;
}
.info{
    margin-top: 2%;
	margin-left: 95%;
    font-size: 25px;
    background: white;
    color:black;
    border-radius: 8px;
    border-color: black;
}
.a
{
    margin-top: 3%;
}
.b
{
	margin-top: -3%;
	margin-left: -3.5%;
}
.b, .a{
    font-size: 55px;
    padding: 0 0 10px;
    color: white;
    text-align: center;
    text-shadow: 5px 1px 5px #000000;
}
h1
{
    padding: 0 0 10px;
    margin: 0;
    color: white;
    text-align: center;
}
h2
{
    margin: 0;
    font-weight:bold;
    color: white;
}
.email2, .pass2, .name, .confirmPass, .payment, .signup2
{
    width: 100%;
    margin-bottom: 5px;
}
.email, .pass
{
    width: 100%;
    margin-bottom: 5px;
}
.email, .email2, .pass, .pass2, .name, .confirmPass, .payment
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    height: 40px;
    color: white;
    font-size: 16px;
}
.login, .signUp, .signup2
{
    height: 35px;
    color: black;
    font-size: 16px;
    background: white;
    border-radius: 20px;
    border: 1px solid black;
}
.login:hover, .signUp:hover, .signup2:hover
{
    background:black;
    color:white;
    border: 1px solid white;
}
.login{
    width: 350px;
    margin-top:4%;
}
.signUp
{
    width: 450px;
    margin-top: -1%;
}
.signup2{
    width: 350px;
}
p{
    color:white;
}
.topbox
        {
            position: absolute;
            top: 0%;
            left: 0%;
            height: 13%;
            width: 100%;
            background-color: black;
            border-bottom:1px solid black;
        }
		.logo
        {
            height: 100%;
        }
        .terms
        {
            color:white;

        }
    </style>
  <body>
  <div class="topbox">	
        <img class="logo" src="logo.png"></img>
		<input type="submit" class="info" value=" i " onclick="alert('Bibliophile is a website where the customer can purchase books online. They can choose books that suits their personal interest and later can add to the shopping cart and finally purchase. The user can login using his account details or new customers can set up an account very quickly. They should give the details of their name, contact number, and shipping address.')">
	</div>
    <div class="center1">
        <h1>Sign Up</h1>
        <form method="POST" name="submit" id="submit">
            <h2> Name </h2>
            <input type="text" id="name" name="name" class="name" placeholder="Name" required>
            <h2> Email </h2>
            <input type="email" id="email" name="email" class="email2" placeholder="Email Address"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            <h2> Password </h2>
            <input type="password" id="pass" name="pass" class="pass2" placeholder="Password" required>
            <h2> Confirm Password </h2>
            <input type="password" id="password" name="password" class="confirmPass" placeholder="Confirm Password" required>
            <p><input type="checkbox" required> I agree to the <a class="terms" href="terms.html">terms and conditions.</a></p><br>
            <button class="signUp" name="submit" onclick="signupMessage()">Sign Up</button>
        </form>
    </div>
    <script>
    function signupMessage(){
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var pass = document.getElementById('pass').value;
    var password = document.getElementById('password').value;
    var payment = document.getElementById('payment').value;

    if(name == '' || email == '' || pass == '' || password == '' || payment == ''){
        alert("Please fill up the fields");
    }
    else{
        if(pass!=password){
            alert("Password don't match");
            header('location:create.php');
        }
        else{
        header('location:login.php');
        }
    }
}</script>
    </body>
</html>
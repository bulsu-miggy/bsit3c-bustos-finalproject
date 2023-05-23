
<html>

<head>
	<title>Admin's Log In</title>

	<!-- <script>
		function message(){
		var email = document.getElementById('email').value;
		var password = document.getElementById('pass').value;
		if(email == 'admin@gmail.com' && password == 'admin123'){
			window.location.href("Ahomepage.php");
		}
		else{
			alert('Invalid email or password!');
		}
	}
	</script> -->
</head>
<style>
	body
	{
		background-color:white;
	}
	.log
{
	width: 310;
	height: 270px;
	padding: 10px 10px;
	background: black;
	position: absolute;
    top: 33%;
    left:36%;
}
.info
{
	margin-top: 2%;
	margin-left: 95%;
	font-size: 25px;
	background: white;
	color:black;
	border-radius: 8px;
	border-color: black;
}
p
{
	font-size: 55px;
	margin-left: -3.5%;
	padding: 0 0 10px;
	color: black;
	text-align: center;
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
.email, .pass, .login
{
	width: 100%;
	margin-bottom: 20px;
}
.email, .pass
{
	border: none;
	border-bottom: 1px solid #fff;
	background: transparent;
	height: 40px;
	font-size: 16px;
	color:white;
}
.login
{
	height: 40px;
	color: black;
	font-size: 16px;
	background: white;
	border-radius: 20px;
	border: 1px solid black;
}
.login:hover
{
	background:black;
	color:white;
	border: 1px solid white;
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
            width: 12%;
        }
	</style>

<body>
<div class="topbox">	
        <img class="logo" src="logo.png"></img>
		<input type="submit" class="info" value=" i " onclick="alert('Bibliophile is a website where the customer can purchase books online. They can choose books that suits their personal interest and later can add to the shopping cart and finally purchase. The user can login using his account details or new customers can set up an account very quickly. They should give the details of their name, contact number, and shipping address.')">
	</div>
	<div class="log">
		<form action="Ahomepage.php">
		<h1> Log in </h1>
			<h2> Email </h2>
			<input type="text" id="email" name="email" class="email" placeholder="Email Address"
			pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
			<h2> Password </h2>
			<input type="password" id="password" name="password" class="pass" placeholder="Password" required>
			<button class="login" name="submit" onclick="message()">LogIn</button>
		</form>
	</div>
    
</body>
</html>
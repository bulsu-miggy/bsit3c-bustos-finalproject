<?php 
session_start();

function signup($data)
{
	$errors = array();
 
	//validate 
	if(!preg_match("/^[a-zA-Z ]+$/", $data['name'])){
		$errors[] = "Name must contain only alphabets and space";
	}

	if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
		$errors[] = "Please enter a valid email";
	}

	if(strlen(trim($data['password'])) < 8){
		$errors[] = "Password must be atleast 8 chars long";
	}

	if($data['password'] != $data['password2']){
		$errors[] = "Passwords must match";
	}
	$checkpass = database_run("select * from users where password = :password limit 1",['password'=>$data['password']]);
	if(is_array($checkpass)){
		$errors[] = "That password already exists";
	}
	$checkemail = database_run("select * from users where email = :email limit 1",['email'=>$data['email']]);
	if(is_array($checkemail)){
		$errors[] = "That email already exists";
	}

	//save
	if(count($errors) == 0){

		$arr['name'] = $data['name'];
		$arr['email'] = $data['email'];
		$arr['password'] = hash('sha256',$data['password']);
		$arr['date'] = date("Y-m-d H:i:s");
		

		$query = "insert into users (name,email,password,date) values 
		(:name,:email,:password,:date)";

		database_run($query,$arr);
	}
	return $errors;
}

function login($data)
{
	$errors = array();
 
	//validate 
	if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
		$errors[] = "Please enter a valid email";
	}

	if(strlen(trim($data['password'])) < 8){
		$errors[] = "Password must be atleast 8 chars long";
	}
 
	//check
	if(count($errors) == 0){

		$arr['email'] = $data['email'];
		$password = hash('sha256', $data['password']);

		$query = "select * from users where email = :email limit 1";

		$row = database_run($query,$arr);

		if(is_array($row)){
			$row = $row[0];

			if($password === $row->password){
				
				$_SESSION['USER'] = $row;
				$_SESSION['LOGGED_IN'] = true;
			}else{
				$errors[] = "wrong email or password";
			}

		}else{
			$errors[] = "wrong email or password";
		}
	}
	return $errors;
}

function database_run($query,$vars = array())
{
	$string = "mysql:host=localhost;dbname=buho";
	$con = new PDO($string,'root','');

	if(!$con){
		return false;
	}

	$stm = $con->prepare($query);
	$check = $stm->execute($vars);

	if($check){
		
		$data = $stm->fetchAll(PDO::FETCH_OBJ);
		
		if(count($data) > 0){
			return $data;
		}
	}

	return false;
}

function check_login($redirect = true){

	if(isset($_SESSION['USER']) && isset($_SESSION['LOGGED_IN'])){

		return true;
	}

	if($redirect){
		header("Location: login.php");
		die;
	}else{
		return false;
	}
	
}


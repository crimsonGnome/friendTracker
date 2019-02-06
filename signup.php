<?php
	session_start();
	Include "Connection.php";
	$conn= connect();

	$first = htmlentities($_POST['first']);
	$last = htmlentities( $_POST['last']);
	$username = htmlentities($_POST['username']);
	$password = htmlentities($_POST['password']);
	$password2 = htmlentities($_POST['password2']);


	if($password2 === $password){
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users (username, password, first, last) VALUES ('$username','$$hashed_password','$first','$last');";

		if (mysqli_query($conn,$sql)){
			header("Refresh:0; url=login.html");

			 
		} else{
			header("Refresh:0; url=signup.html");
			echo "there was an error when creating you account";
		}
	} else{
			$mes = "Your passwords didnt match";
			include "signup.html";

	}
?>
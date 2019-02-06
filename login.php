<?php
	session_start();
	Include "Connection.php";
	$conn= connect();

	$username = htmlentities($_POST['username']);
	$password = htmlentities($_POST['password']);

	$sql = "SELECT * FROM users where username = '$username';";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);

	
	$id = $row['id'];
	$status = $row['status'];
	$first	= $row['first'];

	if(password_verify($_POST['password'], $row['password'])){
		if($count == 1){
			if($status==1){
				$_SESSION['username'] = $username;
				$_SESSION['login'] = true;
				$_SESSION['id'] = $id;
				$_SESSION['status'] = $status;
				$_SESSION['first'] = $first;

				header("Refresh:0; url=index.php");


			}
			else {
				header("Refresh:0; url=approval.html");
				

			}
		} else {
			header("Refresh:0; url=login.html");
			
			
		}
	} else {
		$mes = "Incorrect Password";
		include "login.html";
	}


  ?>
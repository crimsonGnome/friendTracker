<?php
	session_start();
	Include "Connection.php";
	include "username.php";
	$conn= connect();
	$status = $_SESSION['status'];


?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload Image</title>
</head>
<header>
	
<nav>

	<ul class="nav">
		<li><a href="index.php">Current Location</a></li>
		<li><a href="pastLoc.php">Past Locations</a></li>
		<li><a href="leaderboard.php">Leaderboard</a></li>
		<li><a href="#">Upload</a></li>
		<li><a href="description.php">Person of Intrest</a></li>
		<?php echo $welcome; ?>
	</ul>
	<ul class="handle">
		<li>
			<div class="bar1"></div>
			<div class="bar1"></div>
			<div class="bar1"></div>
		</li>
	</ul>




</nav>
</header>
<body>
	<div class="background">
		<div class="lastLoc_box">

		<h2 class="title">Mobile Robert Tracker</h2>
		<hr>
			<form action="upload_image(php).php" method="post" enctype="multipart/form-data">
				<div class="container_login down">
					<div class="info_signUp2 margin">
						shirtless Robert Pic<input required type="radio" name ="points" value = "7" checked>
					</div>
					<div class="info_signUp2 margin">
						  Robert directly looking at the Camera<input required type="radio" name ="points" value ="5">
					</div>
					<div class="info_signUp2 margin">
						Selfie with Robert not Noticing<input required type="radio" name ="points" value = "4" checked>
					</div>
					<div class="info_signUp2 margin">
						 Picture of Robert<input required type="radio" name ="points" value ="3">
					</div>
					<div class="info_signUp2 margin">
						Car Picture<input required type="radio" name ="points" value = "1" checked>
					</div>
					<div class="info_signUp margin Submit">
						<input required type="file" name="file">
						<!--<input required type="text" name="location" placeholder="address - or - best approximate address">-->
					</div>
					<div class="info_signUp margin Submit">
						<input type="submit" value="submit">
					</div>
			</form>
		</div>
	</div>
<footer></footer>
</body>
<script type="text/javascript" src="script.js"></script>	

</html>


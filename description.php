<?php
	session_start();
	Include "Connection.php";
	include "username.php";
	$conn= connect();
	$status = $_SESSION['status'];


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Leader Board</title>

</head>
<header>
	
	<nav>

	<ul class="nav">
		<li><a href="index.php">Current Location</a></li>
		<li><a href="pastLoc.php">Past Locations</a></li>
		<li><a href="leaderboard.php">Leaderboard</a></li>
		<li><a href="upload_post.php">Upload</a></li>
		<li><a href="#">Person of Interest</a></li>
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
	<div class="background2">
		<div class="PastLoc_box">
			<h2 class="title">Subject Description</h2>
			

				<section class="container_description">
					<div class="info_description_gridbox">
						<h3>Name: Robert</h3>
					</div>
					<div class="info_description_gridbox">
						<strong>Age:</strong>23
					</div>
					<div class="info_description_gridbox">
						<strong>Height:</strong> 5'11 3/4" 
					</div>
					<div class="info_description_gridbox">
						<strong>Eyes:</strong> brown
					</div>
					<div class="info_description_gridbox">
						<strong>Hair:</strong> brown Jew Fro
					</div>
					<div class="info_description_gridbox">
						<strong>Likes:</strong>  dank memes, booty,cheap alcohol, Dark Souls, Lindsay Yim, money, Arabian Crime
					</div>
					<div class="info_description_gridbox">
						<strong>Dislikes:</strong> Normies, "student athletes," life,  poor people 
					</div>
					<div class="info_description_gridbox">
						<strong>Astrological Sign:</strong> Cancer
					</div>
					<div class="info_description_gridbox">
						<strong>Chinese Zodiac:</strong> Dog
					</div>
					<div class="info_description_gridbox">
						<strong>Myers Briggs:</strong>INTJ
					</div>
					<div class="info_description_gridbox">
						<strong>Belly Button:</strong> Innie
					</div>
				</section>
			</div>
	</div>
</body>
<footer></footer>	
<script type="text/javascript" src="script.js"></script>

</html>
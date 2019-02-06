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
		<li><a href="#">Past Locations</a></li>
		<li><a href="leaderboard.php">Leaderboard</a></li>
		<li><a href="upload_post.php">Upload</a></li>
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
	<div class="background2">
		<?php
			$sql = "SELECT * FROM posts ORDER BY date_entered DESC LIMIT 30;";
				if($result = mysqli_query($conn,$sql)){

				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
					echo "<div class='PastLoc_box'>
							<h2 class='title'>Past Known Location</h2>
							<div class='img_container_past'>
								<img class= 'split2' src='uploads/".$row['picName']."'>
							</div> 
								<section class='container_past_location'>
									<div class='info_current_location'>
										<h3>".$row['userName']."</h3>
									</div>
									<div class='info_current_location'>
										Rank:   <big class='rank'>".$row['rank']."</big>
									</div>
									<div class='info_current_location'>
										Sighting #".$row['id'].": ".$row['picTime']."
									</div>
									<div class='info_current_location'>
										Coordinates: lng: ".$row['lat']." lat: ".$row['lng']."
									</div>
									<div class='info_current_location3'>
										Date Posted: ".$row['date_entered']."
									</div>
								</section>
						</div>";
				}
			}
			else {
				echo "failed to connect";
			}
		?>
	</div>
<footer></footer>
</body>
<script type="text/javascript" src="script.js"></script>	
</html>

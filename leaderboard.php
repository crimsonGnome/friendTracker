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
		<li><a href="#">Leaderboard</a></li>
		<li><a href="upload_post.php">Upload</a></li>
		<li><a href="description.php">Person of Interest</a></li>
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
		<table>
				<tr>
				<th>Rank</th>
				<th>Username</th>
				<th>Score</th>
			</tr>
			<?php 

			$i = 1; 
			$sql = "SELECT * FROM users ORDER BY rank DESC;";
				if($result = mysqli_query($conn,$sql)){

					while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						echo "</tr>
								<td>$i</td>
								<td>".$row['username']."</td>	
								<td>".$row['rank']."</td>				
							</tr>";
						$i++;
					}
				}
			?>
		</table>
	</div>
<footer></footer>
</body>

<script type="text/javascript" src="script.js"></script>

</html>



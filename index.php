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
	<title>Current Location</title>
</head>
<header>
	
<nav>

	<ul class="nav">
		<li><a href="#">Current Location</a></li>
		<li><a href="pastLoc.php">Past Locations</a></li>
		<li><a href="leaderboard.php">Leaderboard</a></li>
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
	<div class="background">
		<div class="lastLoc_box">
			<h2 class="title">Last Known Location</h2>
<?php 

if ($login == true){
	$sql = "SELECT * FROM posts ORDER BY picTime DESC LIMIT 1;";
	$result = mysqli_query($conn,$sql);

	if ($row = $result->fetch_assoc()) {
		echo"<div class='img_container_current_location'> 
				<img class='split' src='uploads/".$row['picName']."'>
				<div id='map_container'>Loading...</div>
			</div>

			<section class='container_current_location'>
				<div class='info_current_location'>
					<h2>".$row['userName']."</h2>
				</div>
				<div class='info_current_location'>
					Rank:   <big class='rank'>".$row['rank']."</big>
				</div>
				<div class='info_current_location'>
					<h3>Sighting #: ".$row['id']." </h3>
				</div>
				<div class='info_current_location'>
					<h3>Spotted  On: ".$row['picTime']." </h3>
				</div>
				<div class='info_current_location'>
					<h3>Coordinates: lat: ".$row['lat']." lng: ".$row['lng']." </h3>
				</div>
				<div class='info_current_location'>
					Date Posted: ".$row['date_entered']."
				</div>
			</section>";
			$latitude =  $row['lat'];
			$longitude = $row['lng'];
	}	else {
		echo "please login";
	}
}
else{
	header("Refresh:0; url=login.html");
}
?>
		</div>
	</div>
<footer></footer>
</body>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFC9iVqA4jvsLlPQUgqpt0ZNdCF7K9faE&callback=initMap"></script>  
	<script type="text/javascript">
	function init_map() {
				var styles = [{
						featureType: 'landscape',
						elementType: 'geometry',
						stylers: [
							{ color: '#34495e'}
						]
					}, {
						featureType: 'poi',
						elementType: 'geometry',
						stylers: [
							{color: '#ededed'}
						]
				}];

	            var Options = {
	                zoom: 13,
	                zoom: 14,
					maxZoom: 17,
					minZoom: 12,
					styles: [
		            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
		            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
		            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
		            {
		              featureType: 'administrative.locality',
		              elementType: 'labels.text.fill',
		              stylers: [{color: '#d59563'}]
		            },
		            {
		              featureType: 'poi',
		              elementType: 'labels.text.fill',
		              stylers: [{color: '#d59563'}]
		            },
		            {
		              featureType: 'poi.park',
		              elementType: 'geometry',
		              stylers: [{color: '#263c3f'}]
		            },
		            {
		              featureType: 'poi.park',
		              elementType: 'labels.text.fill',
		              stylers: [{color: '#6b9a76'}]
		            },
		            {
		              featureType: 'road',
		              elementType: 'geometry',
		              stylers: [{color: '#38414e'}]
		            },
		            {
		              featureType: 'road',
		              elementType: 'geometry.stroke',
		              stylers: [{color: '#212a37'}]
		            },
		            {
		              featureType: 'road',
		              elementType: 'labels.text.fill',
		              stylers: [{color: '#9ca5b3'}]
		            },
		            {
		              featureType: 'road.highway',
		              elementType: 'geometry',
		              stylers: [{color: '#746855'}]
		            },
		            {
		              featureType: 'road.highway',
		              elementType: 'geometry.stroke',
		              stylers: [{color: '#1f2835'}]
		            },
		            {
		              featureType: 'road.highway',
		              elementType: 'labels.text.fill',
		              stylers: [{color: '#f3d19c'}]
		            },
		            {
		              featureType: 'transit',
		              elementType: 'geometry',
		              stylers: [{color: '#2f3948'}]
		            },
		            {
		              featureType: 'transit.station',
		              elementType: 'labels.text.fill',
		              stylers: [{color: '#d59563'}]
		            },
		            {
		              featureType: 'water',
		              elementType: 'geometry',
		              stylers: [{color: '#17263c'}]
		            },
		            {
		              featureType: 'water',
		              elementType: 'labels.text.fill',
		              stylers: [{color: '#515c6d'}]
		            },
		            {
		              featureType: 'water',
		              elementType: 'labels.text.stroke',
		              stylers: [{color: '#17263c'}]
		            }
          		],
     

	                center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
	            };
	            map = new google.maps.Map(document.getElementById("map_container"), Options);
	            marker = new google.maps.Marker({
	                map: map,
	                position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
	            });
	        
	 
	        }
	        google.maps.event.addDomListener(window, 'load', init_map);
	</script>
	<script type="text/javascript" src="script.js"></script>	

<br>
<br>
</html>

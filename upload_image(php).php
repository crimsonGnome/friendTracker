<?php
	session_start();
	Include "Connection.php";
	include "username.php";
	include "gps.php";
	$conn= connect();

	$username = $_SESSION['username'];
	$id = $_SESSION['id'];
	$points = $_POST['points'];
	$query = "SELECT rank FROM users WHERE id = '$id';";
	if($result = mysqli_query($conn,$query)){

				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
					$newRank = $row['rank'] + $points;
				}
	}
	
if($_SESSION['login'] == true){
	if(isset($_FILES['file'])){
		//$address = $_POST['location'];
		$file = $_FILES['file'];
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];


		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array( 'jpg', 'jpeg', 'png', 'PNG' );
		//this is the allowed formats, 1st level of security, still super  weak will have to do some other stuff to 
		//code this is a refactored version of Gerald Kaszuba's code for puling out geocoding information from a picture. checks out 
		$exif = exif_read_data($fileTmpName);

		$latitude = gps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);
		$longitude = gps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
		$pictime =  $exif['DateTimeOriginal'];

		if(in_array($fileActualExt, $allowed)){
			if($fileError === 0 ){
				if($fileSize < 6000000){
					$FileNameNew = uniqid('', true).".".$fileActualExt;
					$fileDestination = 'uploads/'.$FileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					$sql = "UPDATE users SET rank = '$newRank' WHERE id = '$id';";
							if(mysqli_query($conn,$sql)){
								$sql = "INSERT INTO posts (userName, rank, picName, lat, lng, picTime ) VALUES ('$username', '$newRank', '$FileNameNew', '$latitude', '$longitude','$pictime' ); ";
									if(mysqli_query($conn,$sql)){
									Include"leaderboard.php";
								
								}
								else{
								echo "there was a server error while uploading the image";
								}
							}

							else{
							echo "there was a server error while uploading the image";
							}
						}

				else{
					echo "your file is to big";
				}

			}
			else{
				echo "There was an error was not defined as 0 when uploading file, must be an error somewhere";
			}
		}
		else {
			echo "you can not upload this type of file";
		}
	}
	else {
		echo "(antique farm equipment voice*) We didn't recieve shiiittt";
	}
}
else{
	header("Refresh:0; url=login.html");
}

?>
<?php
	if (isset($_SESSION['login']))
	{
		$login = true;
		$_SESSION['login'] = true;
		$username = $_SESSION['username'];
		$first = $_SESSION['first'];

	}
	if ($login == true){
		$welcome = "<li><a href='#'> Hello ".$first."</a></li>
					<li><a href='signout.php'>Sign Out</a></li>";
	}
		
	else{
					
		header("Refresh:0; url=login.html");
	}
?>
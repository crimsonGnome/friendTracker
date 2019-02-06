<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['login']);
	unset($_SESSION['id']);
	unset($_SESSION['status']);
	unset($_SESSION['first']);

	if(isset($_SESSION['rank'])){
		unset($_SESSION['rank']);
		include "landingpage.HTML";
	}
	else{
		include "landingpage.HTML";
	}
?>
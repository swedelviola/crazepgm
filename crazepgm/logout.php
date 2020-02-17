<?php 

	session_start();
	$username = $_SESSION['username'];
	session_destroy();
	header("Location: LandingPage.php?status=0;"); //include this logout everywhere.
 ?>
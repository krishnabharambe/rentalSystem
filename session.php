<?php 
	session_start();

		if (!isset($_SESSION['admin_id']) || (trim($_SESSION['admin_id'])='')) {
		 	header("Location: index.php");
		 	exit();
		 }
		 $session_name=$_SESSION['admin_id'];

  ?>
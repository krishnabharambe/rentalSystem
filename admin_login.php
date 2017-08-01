<?php 
session_start();
include 'dbcon.php';

if (isset($_POST['admin_login'])) {
	
	 $admin_username = $_POST['username'];
	 $admin_password = $_POST['password'];

	 $query = "SELECT * FROM users where username='$admin_username' AND password='$admin_password'";
	 $result=mysql_query($query) or die(mysql_error());
	 $num_row = mysql_num_rows($result);
	 $row = mysql_fetch_array($result);

	 if ($num_row > 0) {
	 	$_SESSION['admin_id'] = $row['admin_id'];
	 	header('Location: dashboard.php');
	 }else{
	 	header('Location: index.php?error=invaliduser');
	 }
}

 ?>
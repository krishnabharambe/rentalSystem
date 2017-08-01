<?php 
include 'header.php';
	$tech_id = $_GET['tech_delete_id'];
	$tech_delte_query = mysql_query("UPDATE technician SET tech_status='Archived' where tech_id='$tech_id'") or die(mysql_error());


	 	header('Location: view_technician.php?meg=tech_delete');

 ?>
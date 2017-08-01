<?php 
include 'header.php';
	$inv_id = $_GET['inv_delete_id'];
	$tech_delte_query = mysql_query("UPDATE inventory SET inv_status='Archived' where inv_id='$inv_id'") or die(mysql_error());


	 	header('Location: view_inventory.php?meg=tech_delete');

 ?>
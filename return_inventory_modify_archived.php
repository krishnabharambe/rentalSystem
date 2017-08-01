<?php 
include 'dbcon.php';

	$r_b_id = $_GET['r_b_id'];

	mysql_query("UPDATE borrowdetails SET b_status='ACTIVE' where b_id='$r_b_id' ") or die(mysql_error());


	$tech_search_query99=mysql_query("SELECT * FROM borrowdetails where b_id='$r_b_id'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query99)) { 
				 	$returntopage = $row['b_tech_id'];
				 	header("Location: issue_return_inventory.php?tech_issue_id=$returntopage");
				 }



 ?>
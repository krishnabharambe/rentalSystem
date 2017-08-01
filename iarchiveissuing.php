<?php 


	include 'dbcon.php';

	echo $s_b_id = $_GET['b_e_id'];

	$tech_search_query99=mysql_query("SELECT * FROM borrowdetails where b_id='$s_b_id'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query99)) { 
				 	$returntopage = $row['b_inv_id'];
				 	mysql_query("UPDATE inventory SET inv_status='ARCHIVED' WHERE inv_id = '$returntopage' ") or die(mysql_error());
	

				 	header("Location: iarchived.php?inv_id=$returntopage");
				 }

/*
	mysql_query("UPDATE borrowdetails SET inv_status='ARCHIVED' WHERE b_id = '$s_b_id' ") or die(mysql_error());

	$tech_search_query99=mysql_query("SELECT * FROM borrowdetails where b_id='$s_b_id'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query99)) { 
				 	$returntopage = $row['b_inv_id'];
	

				 	header("Location: iarchived.php?inv_id=$returntopage");
				 }
*/
 ?>
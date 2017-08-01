<?php 


	include 'dbcon.php';



	echo $s_b_id = $_GET['b_e_id'];


	mysql_query("UPDATE borrowdetails SET b_status='ARCHIVED' WHERE b_id = '$s_b_id' ") or die(mysql_error());

	$tech_search_query99=mysql_query("SELECT * FROM borrowdetails where b_id='$s_b_id'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query99)) { 
				 	$returntopage = $row['b_tech_id'];
	

				 	header("Location: barchived.php?tech_issue_id=$returntopage");
				 }

 ?>
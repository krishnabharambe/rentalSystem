<?php 
include 'dbcon.php';
include 'function_file.php';

if (isset($_POST['return_return_quantity'])) {
	$r_b_id = $_POST['r_b_id'];
	$r_b_inv_id = $_POST['r_b_inv_id'];
	$r_date = $_POST['r_date'];
	$r_b_tquantity = $_POST['r_b_tquantity'];
	$r_remin_quantity = $_POST['r_remin_quantity'];
	echo $r_return_quantity = $_POST['r_return_quantity'];


	mysql_query("UPDATE borrowdetails SET b_return_quantity=b_return_quantity+'$r_return_quantity',r_date='$r_date',r_timestamp=now() where b_id='$r_b_id' AND b_inv_id='$r_b_inv_id'") or die(mysql_error());


	$tech_search_query99=mysql_query("SELECT * FROM borrowdetails where b_id='$r_b_id'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query99)) { 
				 	$returntopage = $row['b_tech_id'];
				 	header("Location: issue_return_inventory.php?tech_issue_id=$returntopage");
				 }
}


if (isset($_POST['update_return_quantity'])) {
	$r_b_id = $_POST['r_b_id'];
	$r_b_inv_id = $_POST['r_b_inv_id'];
	$date = $_POST['r_date'];
	$r_b_tquantity = $_POST['r_b_tquantity'];

	$total_cost = $r_b_tquantity * get_inv_cost($r_b_inv_id);

	mysql_query("UPDATE borrowdetails SET b_tquantity='$r_b_tquantity',date='$date',r_timestamp=now(),total_cost = '$total_cost' where b_id='$r_b_id' AND b_inv_id='$r_b_inv_id'") or die(mysql_error());


	$tech_search_query98=mysql_query("SELECT * FROM borrowdetails where b_id='$r_b_id' AND b_inv_id='$r_b_inv_id'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query98)) { 
				 	$returntopage = $row['b_tech_id'];
				 	header("Location: issue_return_inventory.php?tech_issue_id=$returntopage");
				 }
}

	

 ?>
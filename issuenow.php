<?php
include 'dbcon.php';
include 'function_file.php';
	
	$check_id = $_GET['b_temp_tech_id'];
	$rec_id = get_max_rec_id();
	echo $date=date("Y-m-d");
	$temp_trans_query=mysql_query("SELECT * FROM temp_trans WHERE temp_borrower_tech_id=$check_id") or die(mysql_error());
					 
							 while ($row = mysql_fetch_array($temp_trans_query)) {
							 	$b_inv_id=$row['temp_inv_id'];
								$b_tech_id=$row['temp_borrower_tech_id'];
								$b_tquantity=$row['temp_issueing_quantity'];

								$total_cost = $b_tquantity * get_inv_cost($b_inv_id);

							 	mysql_query("INSERT INTO borrowdetails (b_inv_id,b_tech_id,b_tquantity,b_return_status,b_timestamp,b_rec_id,date,b_status,total_cost) VALUES('$b_inv_id','$b_tech_id','$b_tquantity','Pending',now(),'$rec_id','$date','ACTIVE',$total_cost)") or die(mysql_error());


							 }
							 mysql_query("INSERT INTO receipt (added) VALUES ('Added')");

							 include 'delete_cart.php';

							 header("Location: issue_return_inventory.php?tech_issue_id=$check_id&msg=issued");
?>
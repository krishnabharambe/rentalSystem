<?php 
	include 'dbcon.php';
	include 'function_file.php';

	if (isset($_POST['add_to_cart'])) {
		# code...
		echo $borrow_tech_id = $_GET['borrow_tech_id'];
		echo $issuing_inv = $_POST['issuing_inv'];
		echo $issuing_inv_quantity = $_POST['issuing_inv_quantity'];

		$maxcheck = total_remaining_quantity_byid($issuing_inv);
		if (total_remaining_quantity_byid($issuing_inv) <  $issuing_inv_quantity ) {
			header("Location: issue_return_inventory.php?tech_issue_id=$borrow_tech_id&error=quantity");
		}else{
			$cart_add_query = mysql_query("INSERT INTO temp_trans (temp_inv_id,temp_borrower_tech_id,temp_issueing_quantity,timestamp) VALUES('$issuing_inv','$borrow_tech_id','$issuing_inv_quantity',now())") or die(mysql_error());


	 		header("Location: issue_return_inventory.php?tech_issue_id=$borrow_tech_id");
		}
		
	}

	if (isset($_POST['add_to_borrow'])) {
		
	}
 ?>
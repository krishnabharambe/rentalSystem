<?php include 'header.php';

	if (isset($_POST['update_inventory'])) {
		echo $inv_id = $_POST['inv_id'];
		echo $inv_title = $_POST['inv_title'];
	 	echo $inv_dealer = $_POST['inv_dealer'];
	 	echo $inv_model = $_POST['inv_model'];
	 	echo $inv_tquantity = $_POST['inv_tquantity'];
	 	echo $inv_lquantity = $_POST['inv_lquantity'];
	 	echo $inv_cost = $_POST['inv_cost'];
	 	echo $inv_status = $_POST['inv_status'];

	 	$tech_add_query = mysql_query("UPDATE inventory SET inv_title='$inv_title',inv_dealer='$inv_dealer',inv_model='$inv_model',inv_tquantity='$inv_tquantity',inv_lquantity='$inv_lquantity',inv_cost='$inv_cost',inv_status='$inv_status' WHERE inv_id='$inv_id'") or die(mysql_error());


	 	header('Location: view_inventory.php?meg=updatesuccess');
	 }

	  ?>
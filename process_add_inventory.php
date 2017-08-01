<?php include 'header.php';

	if (isset($_POST['add_inventory'])) {
	 	
	 	echo $inv_title = $_POST['inv_title'];
	 	echo $inv_dealer = $_POST['inv_dealer'];
	 	echo $inv_model = $_POST['inv_model'];
	 	echo $inv_tquantity = $_POST['inv_tquantity'];
	 	echo $inv_lquantity = 0;
	 	echo $inv_cost = $_POST['inv_cost'];
	 	echo $inv_status = $_POST['inv_status'];

	 	$tech_add_query = mysql_query("INSERT INTO inventory (inv_title,inv_dealer,inv_model,inv_tquantity,inv_lquantity,inv_cost,inv_status,timestamp) VALUES('$inv_title','$inv_dealer','$inv_model','$inv_tquantity','$inv_lquantity','$inv_cost','$inv_status',now())") or die(mysql_error());


	 	header('Location: view_inventory.php?meg=success');
	 }

	  ?>
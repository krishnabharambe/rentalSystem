<?php include 'header.php';

	if (isset($_POST['add_technician'])) {
	 	echo $tech_name = $_POST['tech_name'];
	 	echo $tech_address = $_POST['tech_address'];
	 	echo $tech_contact = $_POST['tech_contact'];
	 	echo $tech_acontact = $_POST['tech_acontact'];
	 	echo $tech_status = $_POST['tech_status'];
	 	echo $tech_uid = $_POST['tech_uid'];

	 	$tech_add_query = mysql_query("INSERT INTO technician (tech_name,tech_address,tech_contact,tech_acontact,tech_status,tech_uid,timestamp) VALUES('$tech_name','$tech_address','$tech_contact','$tech_acontact','$tech_status','$tech_uid',now())") or die(mysql_error());


	 	header('Location: view_technician.php?meg=success');
	 }

	  ?>
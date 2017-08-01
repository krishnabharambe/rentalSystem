<?php 

	$dbcon = 'localhost';
	$dbuser = 'root';
	$dbpass = '';

	$conn = mysql_connect($dbcon,$dbuser,$dbpass);


	$table_name = 'receipt';
	$backup_file = 'king_backup.sql';

	$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

	mysql_select_db('pk_ims');

	$result = mysql_query($sql,$conn);
	if (!$result) {
		die(mysql_error());
	}
	echo "Successful";

	mysql_close();


 ?>
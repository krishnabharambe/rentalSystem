<?php 
include 'dbcon.php'; 

mysql_query("DELETE FROM temp_trans ") or die(mysql_error());
?>
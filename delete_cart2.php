<?php 
include 'dbcon.php'; 
 
$mid = $_GET['return_id'];
mysql_query("DELETE FROM temp_trans ") or die(mysql_error());

header("Location: issue_return_inventory.php?tech_issue_id=$mid");
?>
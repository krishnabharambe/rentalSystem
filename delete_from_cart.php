<?php 

include 'dbcon.php';
echo $temp_trans_idp = $_GET['temp_trans_id'];
echo $returnid = $_GET['return_id'];
 mysql_query("DELETE FROM temp_trans WHERE temp_trans_id=$temp_trans_idp and temp_borrower_tech_id=$returnid") or die(mysql_error());

header("Location: issue_return_inventory.php?tech_issue_id=$returnid ");

?>
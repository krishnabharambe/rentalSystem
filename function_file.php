<?php 

include 'dbcon.php';
date_default_timezone_set("Asia/Kolkata");
 
 function get_max_inv_id(){

				 $tech_search_query=mysql_query("SELECT max(inv_id) as max_inv_id FROM inventory") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query)) { 
				 	
				 return $row['max_inv_id'] + 1;
				}
			}
 function get_inv_title($invid){

				 $tech_search_query=mysql_query("SELECT * FROM inventory Where inv_id=$invid") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query)) { 
				 	
				 return $row['inv_title'];
				}
			}

 function get_tech_title($techid){

				 $tech_search_query=mysql_query("SELECT * FROM technician Where tech_id=$techid") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query)) { 
				 	
				 return $row['tech_name'];
				}
			}

 function get_tech_address($techid){

				 $tech_search_query=mysql_query("SELECT * FROM technician Where tech_id=$techid") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query)) { 
				 	
				 return $row['tech_address'];
				}
			}

 function get_tech_contact($techid){

				 $tech_search_query=mysql_query("SELECT * FROM technician Where tech_id=$techid") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query)) { 
				 	
				 return $row['tech_contact'];
				}
			}

 function get_tech_acontact($techid){

				 $tech_search_query=mysql_query("SELECT * FROM technician Where tech_id=$techid") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query)) { 
				 	
				 return $row['tech_acontact'];
				}
			}												

 function get_inv_cost($invid){

				 $tech_search_query=mysql_query("SELECT * FROM inventory Where inv_id=$invid") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query)) { 
				 	
				 return $row['inv_cost'];
				}
			}

 function get_max_rec_id(){

				 $tech_search_query=mysql_query("SELECT max(rec_id) as max_rec_id FROM receipt") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query)) { 
				 	
				 return $row['max_rec_id'] + 1;
				}
			}	
 
function get_temp_trans_rows(){
	$query = "SELECT * FROM temp_trans";
	 $result=mysql_query($query) or die(mysql_error());
	 return $num_row = mysql_num_rows($result);
}

function get_max_quantity($inv_id){
		$search_query=mysql_query("SELECT * FROM inventory where inv_id='$inv_id'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($search_query)) { 
				 	
				 return $row['inv_tquantity'];
				}
}

function get_lost_quantity($inv_id){
		$search_query=mysql_query("SELECT * FROM inventory where inv_id='$inv_id'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($search_query)) { 
				 	
				 return $row['inv_lquantity'];
				}
}



function get_max_issued_quantity($inv_id){
		$search_query=mysql_query("SELECT sum(b_tquantity) as max_issued_quantity FROM borrowdetails where b_inv_id='$inv_id'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($search_query)) { 
				 	
				 return $row['max_issued_quantity'];
				}
}

function get_returned_quantity($inv_id){
	$search_query=mysql_query("SELECT sum(b_return_quantity) as returned_quantity FROM borrowdetails where b_inv_id='$inv_id'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($search_query)) { 
				 	
				 return $row['returned_quantity'];
				}

}

#echo get_returned_quantity(1);
function get_max_available_quantity($inv_id){

	return get_max_quantity($inv_id)-get_lost_quantity($inv_id)-get_max_issued_quantity($inv_id);
}		

#echo "get_max_available_quantity".get_max_available_quantity(1);



function total_remaining_quantity_byid($inv_id){
	return get_max_quantity($inv_id) + get_returned_quantity($inv_id) - get_max_issued_quantity($inv_id);
}



function get_receipt($rid,$rdate){

	    	$borrowdetails_search_query96=mysql_query("SELECT * FROM borrowdetails where b_tech_id='$rid' AND date = '$rdate'" ) or die(mysql_error());
					 
		 while ($row = mysql_fetch_array($borrowdetails_search_query96)) { ?>
		 			<tr>
		 				<td><?php echo $row['b_id']; ?></td>
		 				<td><?php echo $row['b_inv_id']; ?></td>
		 				<td><?php echo get_inv_title($row['b_inv_id']); ?></td>
		 				<td><?php echo $row['b_timestamp']; ?></td>
		 				<td><?php echo $row['b_tquantity']; ?></td>
		 				<td><?php echo get_inv_cost($row['b_inv_id']); ?></td>
		 				<td><?php echo $row['b_tquantity'] * get_inv_cost($row['b_inv_id']); ?></td>

		 			</tr>		 		

		<?php }

}

function get_receipt_by_rec_id($rid,$rec_id){

	    	$borrowdetails_search_query96=mysql_query("SELECT * FROM borrowdetails where b_tech_id='$rid' AND b_rec_id = '$rec_id'" ) or die(mysql_error());
					 
		 while ($row = mysql_fetch_array($borrowdetails_search_query96)) { ?>
		 			<tr>
		 				<td><?php echo $row['b_id']; ?></td>
		 				<td><?php echo $row['b_inv_id']; ?></td>
		 				<td><?php echo get_inv_title($row['b_inv_id']); ?></td>
		 				<td><?php echo $row['b_timestamp']; ?></td>
		 				<td><?php echo $row['b_tquantity']; ?></td>
		 				<td><?php echo get_inv_cost($row['b_inv_id']); ?></td>
		 				<td><?php echo $row['b_tquantity'] * get_inv_cost($row['b_inv_id']); ?></td>

		 			</tr>		 		

		<?php }

}
				 	 ?>
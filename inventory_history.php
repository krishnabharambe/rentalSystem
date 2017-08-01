<?php 

//inventory_history.php

 ?>


 <?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

#element_to_pop_up { 
    background-color:#fff;
    border-radius:15px;
    color:#000;
    display:none; 
    padding:20px;
    min-width:70%;
    min-height: 180px;
}
.element_to_pop_up { 
    background-color:#fff;
    border-radius:15px;
    color:#000;
    display:none; 
    padding:20px;
    min-width:70%;
    min-height: 180px;
}

#element_to_pop_up1 { 
    background-color:#fff;
    border-radius:15px;
    color:#000;
    display:none; 
    padding:20px;
    min-width:70%;
    min-height: 180px;
}
.b-close{
    cursor:pointer;
    position:absolute;
    right:10px;
    top:5px;
}

.my-button {
    margin: 1em;
}
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Krishna Bharambe">
    <meta name="author" content=" krishna Bharambe">
   
    <title>Home | Krishna </title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <script src="assets/js/jquery-1.12.4.js"> </script>


<script type="text/javascript">
	
</script>


    <!-- Custom styles for this template -->
 </head>

  <body>
	  <header>
			<div>
			    <nav class="navbar navbar-inverse navbar-fixed-top">
			      <div class="">
			        <div class="navbar-header">
			          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			          </button>
			          <a class="navbar-brand" href="#">PK_LMS</a>
			        </div>
			        <div id="navbar" class="collapse navbar-collapse">
			          <ul class="nav navbar-nav">
			            <li class="active"><a href="dashboard.php">DASHBOARD</a></li>
			            <li><a href="issue_return.php">ISSUE/RETURN INVENTORY</a></li>
			            <li><a href="view_inventory.php"> INVENTORY</a></li>
			            <li><a href="view_technician.php"> TECHNICIAN</a></li>
			            <li><a href="receipt.php">GENERATE RECEIPT</a></li>
			            <li class="dropdown"> 
			            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			            	<span class="glyphicon glyphicon-user"></span>
			            	Admin
			            	<b class="caret"></b></a>
			            	<ul class="dropdown-menu">
			            		<li><a href="adminprofile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
			            		<li><a href="backup_file.php"><span class="glyphicon glyphicon-send"> </span> Backup</a></li>
			            		<li class="divider"></li>
			            		<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
			            	</ul>
			            	
			            </li>
			            <li><a href="about.php">ABOUT</a></li>   
			          </ul>
			        </div><!--/.nav-collapse -->
			      </div>
			    </nav>
			</div>
		</header>


		<section><!-- SECTION START -->	
			<div class="">
				<div class="well well-sm">
					<h2 class="text-center">INVENTORY HISTORY</h2>
					<?php if (!isset($_SESSION['admin_id'])) {
				 	header("Location: index.php");
				 	exit();
				 }else{
/***********************************************************************************/
?>
<?php 
					$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					if (strpos($url, 'msg=issued')) {
					echo 	'<div>
							<div class="alert alert-success">
							  <strong>Success!</strong> ISSUED SUCCESSFULLY.
							</div>
						</div>';
					} ?>
<h3>INVENTORY</h3><br>
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped" id="example">
	<thead>
		
		<?php 
			$hinv_id = $_GET['inv_id'];
		 $tech_search_query=mysql_query("SELECT * FROM inventory Where inv_id='$hinv_id'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query)) { ?>
				 <tr>
					<th>Inventory ID : <?php echo $row['inv_id']; ?></th>
					<th>Inventory Title : <?php echo $row['inv_title']; ?></th>
					<th>Inventory Dealer/Company : <?php echo $row['inv_dealer']; ?></th>
					<th>Inventory Model No : <?php echo $row['inv_model']; ?></th>
				</tr>
				<tr>
					<th>Inventory Total Quantity : <?php echo $row['inv_tquantity']; ?></th>
					<th>Issued Quantity : <?php echo get_max_issued_quantity($row['inv_id']) - get_returned_quantity($row['inv_id']); ?></th>
					<th>Ramining Quantity : <?php echo $row['inv_tquantity']+get_returned_quantity($row['inv_id'])-get_max_issued_quantity($row['inv_id']); ?></th>
					<th><a href="iarchived.php?inv_id=<?php echo $row['inv_id'];?>">VIEW ARCHIVED</a></th>
				</tr>

				 <?php } ?>
	</thead>
</table>
<hr>

<div style="padding-top: 20px;">
	<table class=" table table-bordered" id="mydatatable">
		<thead>
			<th>Issue ID</th>
			<th>Technician ID</th>
			<th>Technician Name</th>
			<th>Issue Date</th>
			<th>Total Issued Quantity</th>
			<th>Returned Quantity</th>
			<th>Remaining Quantity</th>
			<th>Cost/Unit</th>
			<th>Total Cost</th>
			
		</thead>
		<tbody>
			<?php 

				$borrowdetails_search_query=mysql_query("SELECT * FROM borrowdetails  WHERE b_inv_id=$hinv_id AND b_status != 'ARCHIVED' ORDER BY b_id desc" ) or die(mysql_error());
					 
							 while ($row = mysql_fetch_array($borrowdetails_search_query)) { ?>
							 <tr <?php 


							 if (($row['b_tquantity'] - $row['b_return_quantity']) == 0) {
							  	echo "style = 'background-color:#dff0d8;'";
							  }elseif (($row['b_tquantity']) == ($row['b_tquantity'] - $row['b_return_quantity'])) 
							  {
							  	echo "style = 'background-color:#e4b9b9;'";
							  } elseif(($row['b_tquantity']) >($row['b_return_quantity']) ){
							  	echo "style = 'background-color : #f7ecb5;'";
							  }


							   ?>>
							 	<td><?php echo $row['b_id']; ?></td>
							 	<td><?php echo $row['b_tech_id']; ?></td>
							 	<td><?php echo get_tech_title($row['b_tech_id']); ?></td>
							 	<td><?php echo $row['b_timestamp']; ?></td>
							 	<!-- total issued to technician -->
							 	<td><?php echo $row['b_tquantity']; ?></td>
							 	<td><?php echo $row['b_return_quantity']; ?></td>
							 	<!-- remaining quantity -->
							 	<td><?php echo $row['b_tquantity'] - $row['b_return_quantity']; ?></td>
							 	<!-- unit cost -->
							 	<td><?php echo get_inv_cost($row['b_inv_id']); ?></td>
							 	<!-- total cost -->
							 	<td><?php echo $row['b_tquantity'] * get_inv_cost($row['b_inv_id']); ?></td>

				
							 </tr>



							 	<?php }

			 ?>
		</tbody>


		
	</table>

</div>



<?php
/***********************************************************************************/
				 	echo $_SESSION['admin_id'];
				 	echo "<script>document.write(x);</script>";
				 	} ?>
				</div>
			</div>	
		</section><!-- SECTION Ends -->	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
        
		<script>/*
			$('#mydatatable').dataTable();*/
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
			    $('#mydatatable').DataTable( {
			        "order": [[ 0, "desc" ]]
			    } );
			} );
		</script>
		
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

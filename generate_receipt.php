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
					<h2 class="text-center">RECEIPT GENERATOR</h2>
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
<h3>Issue To</h3><br>
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped" id="example">
	<thead>
		
		<?php 
			$issue_to_id = $_GET['tech_issue_receipt_id'];
		 $tech_search_query=mysql_query("SELECT * FROM technician Where tech_id='$issue_to_id'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query)) { ?>
				 <tr>
					<th>Technician ID : <?php echo $row['tech_id']; ?></th>
					<th>Technician Name : <?php echo $row['tech_name']; ?></th>
					<th>Technician Address : <?php echo $row['tech_address']; ?></th>
					<th>Technician Contact : <?php echo $row['tech_contact']; ?></th>
				</tr>
				<tr>
					<th>Technician Alt. Contact : <?php echo $row['tech_acontact']; ?></th>
					<th>Technician UID : <?php echo $row['tech_uid']; ?></th>
					<th>Technician Status : <?php echo $row['tech_status']; ?></th>
					<th></th>
				</tr>

				 <?php } ?>
	</thead>
</table>
<hr>
RECEIPT:


<?php 
		$borrowdetails_search_query=mysql_query("SELECT date FROM borrowdetails where b_tech_id=$issue_to_id GROUP BY date" ) or die(mysql_error());
					 
		 while ($row = mysql_fetch_array($borrowdetails_search_query)) {  ?>

<div>
	<div class="panel panel-default">
	    <div class="panel-heading">
	    <?php echo $date =$row['date'];  ?>
	    </div>
	    <div class="panel-body">
	    <table class="table table-bordered">
		 			<thead>
		 				<tr>
		 					<th>Issue ID</th>
		 					<th>Inventory ID</th>
		 					<th>Inventory Title</th>
		 					<th>Inventory Datetime</th>
		 					<th>Issued Quantity</th>
		 					<th>Inventory Cost/unit</th>
		 					<th>Inventory Total Cost</th>
		 				</tr>
		 			</thead>
		 			<tbody>
	     <?php get_receipt($issue_to_id,$date); ?>
	     </tbody>
	     </table>
	    </div>
	    <div class="panel-footer">
	    	<div style="float: right">
	    		<a href="print_receipt_by_date.php?issue_to_id=<?php echo $issue_to_id ?>&date=<?php echo $date ?>" class="btn btn-success " style="width: 150px;"><span class="glyphicon glyphicon-print "></span> Print</a>
	    	</div>
	    </div>
  	</div>
</div>
<?php } ?>




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

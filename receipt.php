<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Krishna Bharambe">
    <meta name="author" content=" krishna Bharambe">
   
    <title>Home | Krishna </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

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
					<h2>Receipt</h2>
					<?php if (!isset($_SESSION['admin_id'])) {
				 	header("Location: index.php");
				 	exit();
				 }else{ ?>
<?php /***********************************************************************************/ ?>

	<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">
		<thead>
			<th>Technician ID</th>
			<th>Technician Name</th>
			<th>Receipt By Date</th>
			<th>Receipt By Receipt ID</th>
			<th>Status</th>
			<th>Current Issued Unit</th>
		</thead>
		<tbody>
			<?php 
			$tech_search_query=mysql_query("SELECT * FROM technician order by tech_id DESC") or die(mysql_error());
					 
					 while ($row = mysql_fetch_array($tech_search_query)) { ?>

					 <tr>
					 	<td><a href="generate_receipt.php?tech_issue_receipt_id=<?php echo $row['tech_id']; ?>"><?php echo $row['tech_id']; ?></a></td>
					 	<td><a href="generate_receipt.php?tech_issue_receipt_id=<?php echo $row['tech_id']; ?>"><?php echo $row['tech_name']; ?></a></td>
					 	<td><a href="generate_receipt.php?tech_issue_receipt_id=<?php echo $row['tech_id']; ?>">By Date</a></td>
					 	
					 	<td><a href="generate_receipt_by_id.php?tech_issue_receipt_id=<?php echo $row['tech_id']; ?>">By Receipt ID</a></td>
						
					 	<td><?php echo $row['tech_status']; ?></td>
					 	<td><?php echo "uc"; ?></td>
					 </tr>


					 <?php } ?>
		</tbody>

	</table>
		




<?php /***********************************************************************************/ ?>
				 <?php	echo $_SESSION['admin_id'];
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
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

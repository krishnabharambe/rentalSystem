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
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">

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
						
				<div class="well well-sm ">
					<h2 class="text-center container">INVENTORY</h2>
					<a href="add_inventory.php" class="btn btn-success"> <span class="glyphicon glyphicon-plus"></span> ADD INVENTORY</a>
					<br>
					<br>

					<?php 
					$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					if (strpos($url, 'meg=success')) {
					echo 	'<div>
							<div class="alert alert-success">
							  <strong>Success!</strong> Inventory Added Successfully.
							</div>
						</div>';
					}elseif (strpos($url, 'meg=tech_delete')) {
						echo 	'<div>
							<div class="alert alert-success">
							  <strong>Success!</strong> Inventory Deleted Successfully.
view				</div>
						</div>';
					}elseif (strpos($url, 'meg=updatesuccess')) {
						
						echo 	'<div>
							<div class="alert alert-success">
							  <strong>Success!</strong> Inventory Updated Successfully.
							</div>
						</div>';
					}
					 ?>
					<?php if (!isset($_SESSION['admin_id'])) {
				 	header("Location: index.php");
				 	exit();
				 }else{
/***********************************************************************************/
?>

		<table id="mydatatable" cellpadding="0" cellspacing="0" border="0" class="table table-bordered" >
			<thead>
				<th>Inventory ID</th>
				<th>Inventory Title</th>
				<th> Dealer / Company</th>
				<th> model No</th>
				<th> Total Quantity</th>
				<th> Issued Quantity</th>
				<th> Remaining Quantity</th>
				<th> Lost Quantity</th>
				<th> COST/Unit</th>
				<th> Status</th>
				<th>Action</th>
			</thead>

			<tbody>
				
			
		<?php 

			
				 $tech_search_query=mysql_query("SELECT * FROM inventory") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query)) { ?>
				 	<tr>


				 	<td><a href="inventory_history.php?inv_id=<?php echo $row['inv_id']; ?>"><?php echo $row['inv_id']; ?></a></td>


				 	<td><a href="inventory_history.php?inv_id=<?php echo $row['inv_id']; ?>"><?php echo $row['inv_title']; ?></a></td>
				 	<td><?php echo $row['inv_dealer']; ?></td>
				 	<td><?php echo $row['inv_model']; ?></td>
				 	<td><?php echo $row['inv_tquantity']; ?></td>
				 	<td><?php echo get_max_issued_quantity($row['inv_id']) - get_returned_quantity($row['inv_id']); ?></td>
				 	<td><?php echo $row['inv_tquantity']+get_returned_quantity($row['inv_id'])-get_max_issued_quantity($row['inv_id']); ?></td>
				 	<td><?php echo $row['inv_lquantity']; ?></td>
				 	<td><?php echo $row['inv_cost']; ?></td>
				 	<td><?php echo $row['inv_status']; ?></td>
				 	<td style="padding-left: 1em;">
						<a style="padding-right: 2em;" href="javascript:Alertedit(<?php echo $row['inv_id']; ?>);"><span class="glyphicon glyphicon-pencil"></span></a>

						<a style="margin-right: 0px; padding-right: 0px;" href="javascript:Alertdelete(<?php echo $row['inv_id']; ?>);"><span class="glyphicon glyphicon-trash icon-large"></span></a>
					</td>
					</tr>
				<?php }
		 ?>		
			 </tbody>
			</table>
<?php
/***********************************************************************************/
				 	echo $_SESSION['admin_id'];
				 	} ?>
				</div>
			</div>	
		</section><!-- SECTION Ends -->	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script type="text/javascript">
						function Alertdelete(delid) {
						var answer = confirm ("Do You Want To delete")
						if (answer)
						window.location.href = "inv_delete.php?inv_delete_id=" +delid+"";
							return true;
						}
	</script>

	<script type="text/javascript">
						function Alertedit(delid) {
						var answer = confirm ("Do You Want To Edit")
						if (answer)
						window.location.href = "inv_edit.php?inv_edit_id=" +delid+"";
							return true;
						}
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.dataTables.min.js"></script>
		<script>
			$('#mydatatable').dataTable();
		</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

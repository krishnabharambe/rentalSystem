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
					<h2 class="text-center container">UPDATE TECHNICIAN</h2>

					<?php 
					$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					if (strpos($url, 'meg=success')) {
					echo 	'<div>
							<div class="alert alert-success">
							  <strong>Success!</strong> Technician Added Successfully.
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


<?php 
					$tech_id_edit = $_GET['tech_edit_id'];
				 $tech_search_query=mysql_query("SELECT * FROM technician where tech_id='$tech_id_edit'") or die(mysql_error());
				 
				 while ($row = mysql_fetch_array($tech_search_query)) { ?>
<div class="container">
	<form action="process_edit_technician.php" method="POST">
	   <div class="form-group">
	    <label for="nameid">Technician ID</label>
	    <input type="text" class="form-control" id="formGroupExampleInput" readonly="readonly" placeholder="Technician ID" name="edit_tech_id" value="<?php echo $row['tech_id'] ?>" >
	  </div>

	  <div class="form-group">
	    <label for="name">Technician Name</label>
	    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Technician Name" name="tech_name" value="<?php echo $row['tech_name'] ?>" required>
	  </div>
	  <div class="form-group">
	    <label for="address">Technician Address</label>
	    <textarea name="tech_address" rows='3' class="form-control" id="foraddress" placeholder="Address" value="" required><?php echo $row['tech_address'] ?></textarea>
	  </div>
	  <div class="form-group">
	    <label for="contact">Contact No</label>
	    <input type="text" class="form-control" id="formobile" maxlength="10" placeholder="Technician Contact" name="tech_contact" pattern="[789][0-9]{9}" value="<?php echo $row['tech_contact'] ?>" required>
	  </div>
	  <div class="form-group">
	    <label for="contact">Alt. Contact No</label>
	    <input type="text" class="form-control" id="formobile" maxlength="10" placeholder="Technician Contact" name="tech_acontact" pattern="[789][0-9]{9}" value="<?php echo $row['tech_acontact'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="status">Status</label>
	    <select class="form-control" name="tech_status" required>
	    	<option>ACTIVE</option>
	    	<option>Archived</option>
	    	<option>Disabled</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="UID">UID</label>
	    <input type="text" class="form-control" id="uid" value="<?php echo $row['tech_uid'] ?>" placeholder="Technician UID" name="tech_uid">
	  </div>
	  <div class="form-group ">
              <input type="submit" name="update_technician" class="btn btn-success  btn-block login-button" value="Update Technician">

              <a href="view_technician.php" class="btn btn-warning btn-block" role="button">Cancel</a>
          </div>
	</form>
</div>


<?php } ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

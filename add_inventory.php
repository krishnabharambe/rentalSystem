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
			            <li class="active"><a href="#">DASHBOARD</a></li>
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
					<h2 class="text-center container">ADD NEW INVENTORY</h2>
					
					<?php if (!isset($_SESSION['admin_id'])) {
				 	header("Location: index.php");
				 	exit();
				 }else{
/***********************************************************************************/
?>
<div class="container">
	<form action="process_add_inventory.php" method="POST">

	 <div class="form-group">
	    <label for="name">Inventory ID</label>
	    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Inventory ID" name="inv_id" value="<?php echo get_max_inv_id(); ?>" readonly="readonly">
	  </div>
	  <div class="form-group">
	    <label for="name">Inventory Title</label>
	    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Inventory Title" name="inv_title" required>
	  </div>
	  <div class="form-group">
	    <label for="name">Inventory Dealer / Company</label>
	    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Inventory Dealer / Company" name="inv_dealer">
	  </div>
	  <div class="form-group">
	    <label for="name">Inventory Model</label>
	    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Inventory Model" name="inv_model">
	  </div>
	  <div class="form-group">
	    <label for="contact">Total Quantity</label>
	    <input type="number" class="form-control" id="formobile" placeholder="Inventory Total Quantity" name="inv_tquantity"  required>
	  </div>
	  <div class="form-group">
	    <label for="contact">Cost/Unit</label>
	    <input type="number" class="form-control" id="formobile" placeholder="Cost/unit" name="inv_cost" required>
	  </div>
	  <div class="form-group">
	    <label for="status">Status</label>
	    <select class="form-control" name="inv_status" required>
	    	<option>ACTIVE</option>
	    </select>
	  </div>
	  <div class="form-group ">
              <input type="submit" name="add_inventory" class="btn btn-success btn-lg btn-block login-button" value="Add Inventory">
          </div>
	</form>
</div>
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

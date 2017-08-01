
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
    <style type="text/css">
    	
    	
    	
.main{
    margin-top: 50px;
}

.main-content {
/*    background-color:#009edf;*/
    border: 2px solid #009edf;
    margin: 0 auto;
    max-width: 500px;
    padding: 20px 40px;
    color: #ccc;
    text-shadow: none;

}


.input-group{
	margin: 20px 0px;
}
.input-group-addon {
    color: #009edf ;
    font-size: 17px;
}
.login-button{
    margin: 0px auto;
    max-width: 200px;;
    
}


.form-header{
    max-width: 500px;
    margin: 0 auto;
    background-color: #009edf;
    color: #fff;
    width: 100% ;
    padding: 20px 0px;
    border-top-right-radius:10px ;
    border-top-left-radius:10px 
}
.remember{
    color: black;
}

    </style>
 </head>

  <body>
	  <header>
			
		</header>


		<section><!-- SECTION START -->	
			<section class="login-info">
<div class="container">
  <?php 
          $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
          if (strpos($url, 'error=invaliduse')) {
          echo  '<div>
              <div class="alert alert-danger">
                <strong>Acces Denied!</strong> Please Check your Username Or Password.
              </div>
            </div>';
          } ?>
  <div class="row main">
       <div class="form-header">
          <h1 class="text-center ">ADMIN LOGIN </h1>
        </div>
        <form action="admin_login.php" method="POST">
    <div class="main-content">
            
          <div class="input-group ">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
            <input id="email" type="text" class="form-control" name="username" placeholder="Enter your Username"  required>
          </div>
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
            <input id="password" type="password" class="form-control" name="password" placeholder="Enter your Password" required>
          </div>
 
          
          <div class="form-group ">
              <input type="submit" name="admin_login" class="btn btn-danger btn-lg btn-block login-button" value="Login">
          </div>
          
      </div>
    </div>
    </form>
</div>
</section>
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

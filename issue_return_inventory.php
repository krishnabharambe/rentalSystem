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
					<h2 class="text-center">ISSUE / RETURN INVENTORY</h2>
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
			$issue_to_id = $_GET['tech_issue_id'];
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
					<th><a href="barchived.php?tech_issue_id=<?php echo $row['tech_id'];?>">VIEW ARCHIVED</a></th>
				</tr>

				 <?php } ?>
	</thead>
</table>
<hr>
<div class="row">
  <div class="col-sm-4 bg-info text-white">
  <h3 class="text-center">View Cart</h3>

	<table class="table table-bordered">
		<thead>
			<th>INV ID</th>
			<th>INV Title</th>
			<th>INV Quantity</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php 

					        $temp_trans_search_query=mysql_query("SELECT * FROM temp_trans WHERE temp_borrower_tech_id=$issue_to_id") or die(mysql_error());
					 
							 while ($row = mysql_fetch_array($temp_trans_search_query)) {?>
							 <tr>
							 	<td><?php echo $row['temp_inv_id']; ?></td>
							 	<td><?php echo get_inv_title($row['temp_inv_id']); ?></td>
							 	<td><?php echo $row['temp_issueing_quantity'] ?></td>
							 	<td align="center">
							 	<!-- <a class="btn btn-warning" href="edit_from_cart.php?temp_trans_id=<?php /*echo $row['temp_trans_id'] ?>&return_id=<?php echo $row['temp_borrower_tech_id'] */?>">EDIT</a> -->

							 	<a class="btn btn-danger" href="delete_from_cart.php?temp_trans_id=<?php echo $row['temp_trans_id'] ?>&return_id=<?php echo $row['temp_borrower_tech_id'] ?>">DELETE</a></td>
							 </tr>

							 <?php } ?>
		
		<tr >
				
				<?php if (get_temp_trans_rows()<1){ ?>
				<td colspan="2">
					<input type="submit" disabled style="width: 100%;" class="btn btn-success btn-lg" value='ISSUE'>
				</td>
				<td colspan="2">
					<input type="submit" disabled style="width: 100%;" class="btn btn-danger btn-lg" value='Cancel'>
				</td>

					<?php }else{ ?>
					
				
			<td colspan="2">
			<a class="btn btn-success btn-lg" style="width: 100%;" href="javascript:Alertissuenow(<?php echo $issue_to_id; ?>);">ISSUE</a></td>


			<td colspan="2">
			<a class="btn btn-danger btn-lg" style="width: 100%;" href="delete_cart2.php?return_id=<?php echo $issue_to_id; ?>">Cancel</a></td>

			<?php } ?></tr>
		</tbody>


		    <script type="text/javascript">
						function Alertissuenow($tb_id) {
						var answer = confirm ("Do You Want To continue")
						if (answer)
						window.location.href = "issuenow.php?b_temp_tech_id=" +$tb_id+"";
							return true;
						}
			</script>
	</table>

  </div>

  <div class="col-sm-8 bg-warning " style="height: 180px;">
  <h3 class="text-center" style="padding-bottom: 20px;">Add to Cart</h3>
  		<div class='inv_select'>
  			<form action="add_to_cart.php?borrow_tech_id=<?php echo $issue_to_id; ?>" method="POST">
	  			<table class="table table-bordered bg-warning">
	  				<tr>
	  					<td align="center" >
	  					<table width="100%">
	  						<tr>
	  							<td width="40%" >
	  								<label>Inventory :</label>
	  							</td>
	  							<td width="120%" style="float: right; padding-right: 0px;">
	  								<select class="selectpicker" id="get_item" onchange="funchange();funchange1();" style="width: 100% !important;" name="issuing_inv" data-show-subtext="true" data-live-search="true" style="width: 100%;">
					        <option></option>
					        <?php 
					        $inv_search_query=mysql_query("SELECT * FROM inventory") or die(mysql_error());
					 
							 while ($row = mysql_fetch_array($inv_search_query)) { ?> 

							 		<option value="<?php echo $row['inv_id'] ?>"><?php echo $row['inv_id'].' - '.$row['inv_title']; ?></option>

							 <?php }

						         ?>				
			        
				      </select>
	  							</td>

	  						</tr>
	  					</table>
	  				<script type="text/javascript">
	  								function funchange() {
	  									// body...
	  									var val_get_item = document.getElementById("get_item").value;
	  									vcookie = "vcookie";
	  									document.cookie = vcookie +"= " +val_get_item;

	  								}
	  							</script>

				      		</div>

	  					</td>
	  					<td align="center" class="text-center">
	  					 
	  						<label>Quantity</label>
	  						<input type="number" value="0" name="issuing_inv_quantity" min=1 >

	  						<?php 
					$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					if (strpos($url, 'error=quantity')) {
					echo 	'<div>
							<div class="alert alert-danger">
							  <strong>Error!</strong> You Dont Have sufficient Units.
							</div>
						</div>';
					} ?>
		
	  					</td>
	  					<td>
	  						<input class="btn btn-success" type="submit" name="add_to_cart" value="Add to Cart">
	  					</td>
	  				</tr>
	  			</table>
  			</form>
  		</div>

  </div>
</div>
<div style="padding-top: 20px;">
	<table class=" table table-bordered" id="mydatatable">
		<thead>
			<th>Issue ID</th>
			<th>Inventory ID</th>
			<th>Inventory Title</th>
			<th>Issue Date</th>
			<th>Total Issued Quantity</th>
			<th>Returned Quantity</th>
			<th>Remaining Quantity</th>
			<th>Cost/Unit</th>
			<th>Total Cost</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php 

				$borrowdetails_search_query=mysql_query("SELECT * FROM borrowdetails  WHERE b_tech_id=$issue_to_id AND b_status != 'ARCHIVED' ORDER BY b_id desc" ) or die(mysql_error());
					 
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
							 	<td><?php echo $row['b_inv_id']; ?></td>
							 	<td><?php echo get_inv_title($row['b_inv_id']); ?></td>
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

							 	<td class="text-center">

											<button class="commonClass-<?php echo $row['b_id']; ?>">RETURN</button>

											<!-- The Modal -->
											<div id="element_to_pop_up-<?php echo $row['b_id']; ?>" class="element_to_pop_up">
											<div class="b_clode">
												<h3>RETURN</h3>

												<form action="return_inventory_modify.php" method="POST">
													
												
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>Issue ID</th>
															<th>Inventory ID</th>
															<th>Inventory Title</th>
															<th>Date</th>
															<th>Total Units</th>
															<th>Remain Units</th>
															<th>return Units</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><input readonly="readonly" type="number" name="r_b_id" value="<?php echo $row['b_id']; ?>" ></td>
															<td><input readonly="readonly" type="number" name="r_b_inv_id" value="<?php echo $row['b_inv_id']; ?>"></td>
															<td><?php echo get_inv_title($row['b_inv_id']); ?></td>

															<td><input required="required" type="date" name="r_date" value="<?php echo $row['date']; ?>"></td>

															<td><input type="number" readonly="readonly" name="r_b_tquantity" value="<?php echo $row['b_tquantity']; ?>"></td>

															<td><input type="number" readonly="readonly" name="r_remin_quantity" value="<?php echo $row['b_tquantity'] - $row['b_return_quantity']; ?>"></td>

															<td class="bg-warning">
																<input type="number"  name="r_return_quantity" required="required" max="<?php echo $row['b_tquantity'] - $row['b_return_quantity']; ?>">
															</td>

															<td class="text-center">
																<input type="submit" name="return_return_quantity" class="btn btn-success" value="return">

																<a class="btn btn-danger" href="">Cancel</a>
															</td>
														</tr>
													</tbody>
												</table>
												</form>					
											</div>
											</div>
							 	
							 		

							 		<button class="commonClass1-<?php echo $row['b_id']; ?>">EDIT</button>







							 		<?php 
							 			if (($row['b_tquantity'] - $row['b_return_quantity']) == 0) {?>
							 			<a  class="btn btn-warning" style="padding-right: 2em;" href="javascript:Alertarchive(<?php echo $row['b_id']; ?>);">ARCHIVED</a>
							 			<?php
										  }else{?>
										  <a  class="btn btn-warning disabled" style="padding-right: 2em;" href="javascript:Alertarchive(<?php echo $row['b_id']; ?>);">ARCHIVED</a>

										  <?php

										  }

							 		 ?>
							 		

											<!-- The Modal -->
											<div id="element_to_pop_up1-<?php echo $row['b_id']; ?>" class="element_to_pop_up">
											<div class="b_clode1">
												<h3>EDIT</h3>

												<form action="return_inventory_modify.php" method="POST">
													
												
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>Issue ID</th>
															<th>Inventory ID</th>
															<th>Inventory Title</th>
															<th>Issue Date</th>
															<th>Total Units</th>
															<th>return Units</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><input readonly="readonly" type="number" name="r_b_id" value="<?php echo $row['b_id']; ?>" ></td>

															<td><input readonly="readonly" type="number" name="r_b_inv_id" value="<?php echo $row['b_inv_id']; ?>"></td>

															<td><?php echo get_inv_title($row['b_inv_id']); ?></td>

															<td><input required="required" type="date" name="r_date" value="<?php echo $row['date']; ?>"></td>

															<td class="bg-warning"><input type="number" max="<?php echo get_max_available_quantity($row['b_inv_id'])+ get_returned_quantity($row['b_inv_id']); ?>" name="r_b_tquantity" value="<?php echo $row['b_tquantity']; ?>"></td>

															<td><input readonly="readonly" type="number" name="r_remin_quantity" value="<?php echo $row['b_return_quantity']; ?>"></td>


															<td class="text-center">
																<input type="submit" name="update_return_quantity" class="btn btn-success" value="Edit">

																<a class="btn btn-danger" href="">Cancel</a>
															</td>
														</tr>
													</tbody>

		<script type="text/javascript">
						function Alertarchive(delid) {
						var answer = confirm ("Do You Want To Archive?")
						if (answer)
						window.location.href = "archiveissuing.php?b_e_id=" +delid+"";
							return true;
						}
		</script>

		<script>
		    (function($) {
		        $(function() {
		            $('.commonClass-<?php echo $row['b_id']; ?>').bind('click', function(e) {
		                e.preventDefault();
		                $('#element_to_pop_up-<?php echo $row['b_id']; ?>').bPopup();
		            });
		        });
		    })(jQuery);

		     (function($) {
		        $(function() {
		            $('.commonClass1-<?php echo $row['b_id']; ?>').bind('click', function(f) {
		                f.preventDefault();
		                $('#element_to_pop_up1-<?php echo $row['b_id']; ?>').bPopup();
		            });
		        });
		    })(jQuery);


		     (function(b){b.fn.bPopup=function(z,F){function K(){a.contentContainer=b(a.contentContainer||c);switch(a.content){case "iframe":var h=b('<iframe class="b-iframe" '+a.iframeAttr+"></iframe>");h.appendTo(a.contentContainer);r=c.outerHeight(!0);s=c.outerWidth(!0);A();h.attr("src",a.loadUrl);k(a.loadCallback);break;case "image":A();b("<img />").load(function(){k(a.loadCallback);G(b(this))}).attr("src",a.loadUrl).hide().appendTo(a.contentContainer);break;default:A(),b('<div class="b-ajax-wrapper"></div>').load(a.loadUrl,a.loadData,function(){k(a.loadCallback);G(b(this))}).hide().appendTo(a.contentContainer)}}function A(){a.modal&&b('<div class="b-modal '+e+'"></div>').css({backgroundColor:a.modalColor,position:"fixed",top:0,right:0,bottom:0,left:0,opacity:0,zIndex:a.zIndex+t}).appendTo(a.appendTo).fadeTo(a.speed,a.opacity);D();c.data("bPopup",a).data("id",e).css({left:"slideIn"==a.transition||"slideBack"==a.transition?"slideBack"==a.transition?g.scrollLeft()+u:-1*(v+s):l(!(!a.follow[0]&&m||f)),position:a.positionStyle||"absolute",top:"slideDown"==a.transition||"slideUp"==a.transition?"slideUp"==a.transition?g.scrollTop()+w:x+-1*r:n(!(!a.follow[1]&&p||f)),"z-index":a.zIndex+t+1}).each(function(){a.appending&&b(this).appendTo(a.appendTo)});H(!0)}function q(){a.modal&&b(".b-modal."+c.data("id")).fadeTo(a.speed,0,function(){b(this).remove()});a.scrollBar||b("html").css("overflow","auto");b(".b-modal."+e).unbind("click");g.unbind("keydown."+e);d.unbind("."+e).data("bPopup",0<d.data("bPopup")-1?d.data("bPopup")-1:null);c.undelegate(".bClose, ."+a.closeClass,"click."+e,q).data("bPopup",null);H();return!1}function G(h){var b=h.width(),e=h.height(),d={};a.contentContainer.css({height:e,width:b});e>=c.height()&&(d.height=c.height());b>=c.width()&&(d.width=c.width());r=c.outerHeight(!0);s=c.outerWidth(!0);D();a.contentContainer.css({height:"auto",width:"auto"});d.left=l(!(!a.follow[0]&&m||f));d.top=n(!(!a.follow[1]&&p||f));c.animate(d,250,function(){h.show();B=E()})}function L(){d.data("bPopup",t);c.delegate(".bClose, ."+a.closeClass,"click."+e,q);a.modalClose&&b(".b-modal."+e).css("cursor","pointer").bind("click",q);M||!a.follow[0]&&!a.follow[1]||d.bind("scroll."+e,function(){B&&c.dequeue().animate({left:a.follow[0]?l(!f):"auto",top:a.follow[1]?n(!f):"auto"},a.followSpeed,a.followEasing)}).bind("resize."+e,function(){w=y.innerHeight||d.height();u=y.innerWidth||d.width();if(B=E())clearTimeout(I),I=setTimeout(function(){D();c.dequeue().each(function(){f?b(this).css({left:v,top:x}):b(this).animate({left:a.follow[0]?l(!0):"auto",top:a.follow[1]?n(!0):"auto"},a.followSpeed,a.followEasing)})},50)});a.escClose&&g.bind("keydown."+e,function(a){27==a.which&&q()})}function H(b){function d(e){c.css({display:"block",opacity:1}).animate(e,a.speed,a.easing,function(){J(b)})}switch(b?a.transition:a.transitionClose||a.transition){case "slideIn":d({left:b?l(!(!a.follow[0]&&m||f)):g.scrollLeft()-(s||c.outerWidth(!0))-C});break;case "slideBack":d({left:b?l(!(!a.follow[0]&&m||f)):g.scrollLeft()+u+C});break;case "slideDown":d({top:b?n(!(!a.follow[1]&&p||f)):g.scrollTop()-(r||c.outerHeight(!0))-C});break;case "slideUp":d({top:b?n(!(!a.follow[1]&&p||f)):g.scrollTop()+w+C});break;default:c.stop().fadeTo(a.speed,b?1:0,function(){J(b)})}}function J(b){b?(L(),k(F),a.autoClose&&setTimeout(q,a.autoClose)):(c.hide(),k(a.onClose),a.loadUrl&&(a.contentContainer.empty(),c.css({height:"auto",width:"auto"})))}function l(a){return a?v+g.scrollLeft():v}function n(a){return a?x+g.scrollTop():x}function k(a){b.isFunction(a)&&a.call(c)}function D(){x=p?a.position[1]:Math.max(0,(w-c.outerHeight(!0))/2-a.amsl);v=m?a.position[0]:(u-c.outerWidth(!0))/2;B=E()}function E(){return w>c.outerHeight(!0)&&u>c.outerWidth(!0)}b.isFunction(z)&&(F=z,z=null);var a=b.extend({},b.fn.bPopup.defaults,z);a.scrollBar||b("html").css("overflow","hidden");var c=this,g=b(document),y=window,d=b(y),w=y.innerHeight||d.height(),u=y.innerWidth||d.width(),M=/OS 6(_\d)+/i.test(navigator.userAgent),C=200,t=0,e,B,p,m,f,x,v,r,s,I;c.close=function(){a=this.data("bPopup");e="__b-popup"+d.data("bPopup")+"__";q()};return c.each(function(){b(this).data("bPopup")||(k(a.onOpen),t=(d.data("bPopup")||0)+1,e="__b-popup"+t+"__",p="auto"!==a.position[1],m="auto"!==a.position[0],f="fixed"===a.positionStyle,r=c.outerHeight(!0),s=c.outerWidth(!0),a.loadUrl?K():A())})};b.fn.bPopup.defaults={amsl:50,appending:!0,appendTo:"body",autoClose:!1,closeClass:"b-close",content:"ajax",contentContainer:!1,easing:"swing",escClose:!0,follow:[!0,!0],followEasing:"swing",followSpeed:500,iframeAttr:'scrolling="no" frameborder="0"',loadCallback:!1,loadData:!1,loadUrl:!1,modal:!0,modalClose:!0,modalColor:"#000",onClose:!1,onOpen:!1,opacity:0.7,position:["auto","auto"],positionStyle:"absolute",scrollBar:!0,speed:250,transition:"fadeIn",transitionClose:!1,zIndex:9997}})(jQuery);
		</script>



												</table>
												</form>					
											</div>
											</div>
							 	
							 	</td>
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

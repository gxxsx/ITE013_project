<?php 
include_once('../config.php');
$db = new Database();
 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Boat Reservation</title>

		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/jquery.dataTables.css">

	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
	</style>


	<body>

	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
				<div class="container-fluid " style="background: #001a33; color:#001a33;">
					<div class="navbar-header" > 
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<img src="../img/logo.png" height="80" width="80"> &nbsp;
					</div>
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><img src="../img/tit.png" style="height: 80px; width: 550px;"><br></li>
						</ul>

						<ul class="nav navbar-nav" style="margin-top:10px; font-family: Times New Roman;">
							<li class="active">
								<a href="index.php">Home</a>
							</li>
						</ul>
						<ul class="nav navbar-nav" style="margin-top:10px; font-family: Times New Roman;">
							<li class="active">
								<a href="myreservation.php">My Reservation</a>
							</li>
						</ul>
						<ul class="nav navbar-nav" style="margin-top:10px; font-family: Times New Roman;">
							<li class="active">
								<a href="pricelist.php">Price List</a>
							</li>
						</ul>
						<ul class="nav navbar-nav" style="margin-top:10px; font-family: Times New Roman;">
							<li class="active">
								<a href="../index.php">Logout</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
						


	
		
 		
	<br />
	<br />
	<br />
	<br />

		<div id ="info"  ></div>

	<div class="container-fluid">
			
		<div class="panel panel-info"style="background:#b3daff;">
		  <div class="panel-heading" style="background:#001a33;text-align:center;color:#fffff;">List of Available Boats</div>
		  <div class="panel-body" style="text-align:center;background:#fffff;">
		  		<?php 
		  			$sql = 'SELECT * FROM boats ORDER by b_name';
		  		 	$res = $db->getRows($sql);

		  		 	if($res){
		  		 		foreach ($res as $r) {
		  		 			$b_id = $r['b_id'];
	  		 				$bName = $r['b_name'];
	  		 				$bCap = $r['b_cpcty'];
	  		 				$bON = $r['b_on'];
	  		 				$bImage = $r['b_img'];
	  		 				$bPrice = $r['b_price'];

	  		 	?>	
	  		 		<a href="#"  data-toggle="modal" data-target="#myModal<?php echo $b_id; ?>">
						<img class="img-rounded" src="<?php echo $bImage; ?>" height="210" width="210">
	  		 		</a>

						<div id="myModal<?php echo $b_id; ?>" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <div class="modal-content" >
						      <div class="modal-header" style="background:#D4F1F4;">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						      </div>
						      <div class="modal-body" style="background-image: url('../img/back.jpg');background-position: center;
background-repeat: no-repeat; background-size: cover;">
						      		<div class="row">
						      			<div class="col-md-6">
						      				<img src="<?php echo $bImage; ?>" height="250" width="250">
						      			</div>
						      			<div class="col-md-6">
						      				<form>
												
						      					<strong style="color:white;">Boat Name: </strong><?php echo $bName; ?><br />
							      				<strong style="color:white;">Capacity: </strong><?php echo $bCap; ?><br />
							      				<strong style="color:white;">Price: </strong><?php echo 'Php '.number_format($bPrice, 2); ?><br />
							      				<strong style="color:white;">Operator Name: </strong><?php echo $bON; ?> <br />
												  <strong style="color:white;">Select Promo: </strong>
												  <select>
													<option id="dstntn<?php echo $b_id; ?>" >PACKAGE 1</option>
													<option id="dstntn<?php echo $b_id; ?>" >PACKAGE 2</option>
													<option	id="dstntn<?php echo $b_id; ?>" >PACKAGE 3</option>
												</select>
							      				<br />
										   		<strong style="color:white;">Date: </strong>&nbsp;
							      				<br /> 
										    	<input class="btn-default" id="rdate<?php echo $b_id; ?>" size="30" name="rdate" type="date" autocomplete="off">
										    	<br />
										    	<strong style="color:white;">Time Departure: </strong>
										    	<br />
										    	<select class="btn-default" id="hr">
										    		<?php 
										    			$x = 12;
										    			for($time = 1; $time <= $x; $time++){
										    		?>
										    			<option value="<?php echo $time; ?>"><?php echo $time; ?></option>
										    		<?php
										    			}
										    		 ?>
										    	</select>
										    	<select class="btn-default" id="ampm">
										    		<option value="AM">AM</option>
										    		<option value="PM">PM</option>
										    	</select>
						      				</form>
					      				
						      			</div>
						      		</div>
						      </div>
						      <div class="modal-footer" style="background:#D4F1F4;">
						        <button type="button" class="btn btn-default" data-dismiss="modal" style=" background: #003566; color:white;">
						        	Close
						        	<span class="glyphicon glyphicon-remove-sign"></span>
						        </button >
						        <input type="submit" value="Reserved" onclick="bogkot('<?php echo $b_id; ?>')" class="btn btn-success" data-dismiss="modal" style=" background: #003566; color:;">
						      </div>
						    </div>

						  </div>
						</div>

	  		 	<?php
		  		 		}
		  		 	}
		  		 ?>
		  </div>
		</div>

	</div>

	<script type="text/javascript">
		function boat(str){
			
		}
	</script>

 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>

	</body>
</html>


<script type="text/javascript">

function bogkot(str){

	var dstntn = $('#dstntn'+str).val();

	var bid = str;
	var tid = '<?php echo $_SESSION['tourID']; ?>';
	var dstntn = $('#dstntn'+str).val();
	var rdate = $('#rdate'+str).val();
	var hr = $('#hr').val();
	var ampm = $('#ampm').val();


	var datas = "bid="+bid+"&tid="+tid+"&dstntn="+dstntn+"&rdate="+rdate+"&hr="+hr+"&ampm="+ampm;

	$.ajax({
		   type: "POST",
		   url: "reservedprocess.php",
		   data: datas
		}).done(function( data ) {
		  $('#info').html(data);
		});

}


</script>

		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />

		<footer style="margin-top:1px; width:100%; height:80px; background: #001a33; color:#0073e6">
			<center>
				<p style="padding:30px;" > &copy; All rights reserved </p>
			</center>
		</footer>
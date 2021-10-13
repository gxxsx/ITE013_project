

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

		<br />
		<br />
		<br />
		
	
			


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
								<a href="reservation.php">List of Reservations</a>
							</li>
						</ul>

					</div>
				</div>
			</nav>

		<br>
		<br>
		<div class="panel panel-info"style="height:100%;  margin: auto; padding: 10px;background:#b3daff; width:95%;">
		  <div class="panel-heading" style="background:#001a33;text-align:center;color:#fffff;">List Of Reservations</div>		
		<div class="container-fluid" style="background:#b3daff; color:#fffff;">

			<div class="col-md-3"></div>
			<div class="col-md-6">
				<a href="index.php" class="btn btn-success" style="margin-top:3px; background:#001a33;;text-align:center;color:#fffff;">
					Back
					<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
				</a>
			<br />
			<br />

				<?php 

					include_once('../config.php');
					$db = new Database();

					if(isset($_POST['newboat']))
						{
							$bN = $_POST['bN'];
							$bC = $_POST['bC'];
							$bON = $_POST['bON'];

							$bPrice = null;
							if($bC == '10 Persons'){
								$bPrice = 5500;
							}else if($bC == '15 Persons'){
								$bPrice = 7500;
							}else{
								$bPrice = 9500;
							}

							$sql = "INSERT INTO boats (b_name, b_cpcty, b_on, b_img, b_price)
									VALUES(?,?,?,?,?);
								";
							

							if(!$bN){
								echo '
										<div class="alert alert-danger">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Error!</strong> Boat Name is Required.
										</div>
									';
							}else if(!$bON){
								echo '
										<div class="alert alert-danger">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Error!</strong> Boat Operator Name is Required.
										</div>
									';
							}else{

								$new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';

								move_uploaded_file($_FILES["bP"]["tmp_name"], "../boat_image/".$new_image_name);
								$new_image_name = '../boat_image/'.$new_image_name;

								if(empty($_FILES["bP"]["tmp_name"])){
									$new_image_name = '../boat_image/'.'default.png'; 
								}

								$res = $db->insertRow($sql, [$bN,$bC,$bON, $new_image_name, $bPrice]);
								if($res)
								{
									echo '
										<div class="alert alert-success">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>Success!</strong> Save Successfully.
										</div>
									';
								}
							}
						}
				?>



				<form action = "" method = "POST" enctype="multipart/form-data">

					   <div class="form-group">
					    <label for="inputdefault">Boat Name:</label>
					    <input class="form-control" id="inputdefault"  name="bN" type="text">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Boat Operator Name:</label>
					    <input class="form-control" id="inputdefault" name="bON" type="text">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Boat Capacity:</label><br />
					    <select name = "bC" class = "btn-lg" style = "width:250px;">
					    	<option value = "10 Persons">1-10 Persons</option>
					    	<option value = "15 Persons">1-15 Persons</option>
					    	<option value = "20 Persons">1-20 Persons</option>
					    </select>
					  </div>

					    <div class="form-group">
				    	  <label for="inputdefault">Boat Picture:</label>
					      <input class="form-control" id="inputdefault" name="bP" type="file">
					    </div>

					  <button class="btn btn-info" name = "newboat" style="margin-top:3px; background:#001a33;;text-align:center;color:#fffff;">
					  		Save
					  		<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
					  </button>
				</form>	
			</div>
			<div class="col-md-3"></div>
		</div>
		</div>
		</div>



 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>

	</body>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<footer style="margin-top:1px; width:100%; height:80px; background: #001a33; color:#0073e6">
			<center>
				<p style="padding:30px;" > &copy; All rights reserved </p>
			</center>
		</footer>
</html>
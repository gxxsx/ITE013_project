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
								<a href="index.php">Boats</a>
							</li>
						</ul>

						</ul>
					</div>
				</div>
			</nav>


		<br />

		<div class="panel panel-info"style="height:100%;  margin: auto; padding: 10px;background:#b3daff; width:95%;">
		  <div class="panel-heading" style="background:#001a33;text-align:center;color:#fffff;">List Of Reservations</div>		
		<div class="container-fluid" style="background:#b3daff; color:#fffff;">
		<div class="container-fluid">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<a href="index.php" class="btn btn-success" style="margin-top:3px; background:#001a33;;text-align:center;color:#fffff;">
					Back
					<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
				</a>
			<br />
			<br />

				<form action = "" method = "POST" enctype="multipart/form-data">
						<?php 

							if(isset($_GET['editid']))
								{
									$editid = $_GET['editid'];

									$sql = "SELECT * FROM boats WHERE b_id = ?";
									$res = $db->getRow($sql, [$editid]);
									$bname =  $res['b_name'];
									$bon =  $res['b_on'];
									$bcpcty =  $res['b_cpcty'];
									$getoldbimg = $res['b_img'];
								
								 }

								 if(isset($_POST['updateboat']))
								 	{
								 		$editid = $_POST['editid'];

								 		$bname = $_POST['bN'];
								 		$bon = $_POST['bON'];
								 		$bcpcty = $_POST['bC'];
								 		$oldbimg = $_POST['oldbimg'];

								 		
										$bPrice = null;
										if($bcpcty == '10 Persons'){
											$bPrice = 5500;
										}else if($bcpcty == '15 Persons'){
											$bPrice = 7500;
										}else{
											$bPrice = 9500;
										}



										$new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';

										move_uploaded_file($_FILES["bimg"]["tmp_name"], "../boat_image/".$new_image_name);
										$new_image_name = '../boat_image/'.$new_image_name;

										if(empty($_FILES["bimg"]["tmp_name"])){
											$sql = "UPDATE boats SET b_name = ?, b_cpcty = ?, b_on = ?, b_price = ? WHERE b_id = ?";
								 			$res = $db->updateRow($sql, [$bname, $bcpcty,$bon, $bPrice, $editid]);
										}else{
								 			$sql = "UPDATE boats SET b_name = ?, b_cpcty = ?, b_on = ?, b_img = ?, b_price = ? WHERE b_id = ?";
								 			$res = $db->updateRow($sql, [$bname, $bcpcty,$bon,$new_image_name, $bPrice, $editid]);
								 			if($oldbimg != '../boat_image/default.png'){
								 				unlink($oldbimg);
								 			}
										}


							 			echo '
							 				<div class="alert alert-success">
											  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											  <strong>Success!</strong> Edit Successfully.
											</div>
							 			';
								 	}
						?>

					   <div class="form-group">
					    <label for="inputdefault">Boat Name:</label>
					    <input class="form-control" id="inputdefault"  name="editid" type="hidden" value ="<?php echo $editid; ?>">
					    <input class="form-control" id="inputdefault"  name="bN" type="text" value ="<?php echo $bname; ?>">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Boat Operator Name:</label>
					    <input class="form-control" id="inputdefault" name="bON" type="text" value ="<?php echo $bon; ?>">
					  </div>

					  <div class="form-group">
					    <label for="inputdefault">Boat Capacity:</label><br />
					    <select name = "bC" class = "btn-lg" style = "width:250px;">
					    	<option <?php if($bcpcty == '15 Persons'){echo 'selected';} ?> value = "10 Persons">1-10 Persons</option>
					    	<option <?php if($bcpcty == '25 Persons'){echo 'selected';} ?> value = "15 Persons">1-15 Persons</option>
					    	<option <?php if($bcpcty == '30 Persons'){echo 'selected';} ?> value = "20 Persons">1-20 Persons</option>
					    </select>
					  </div>

					  <input type="hidden" name="oldbimg" value="<?php echo $getoldbimg; ?>">

					   <div class="form-group">
				    	  <label for="inputdefault">Boat Picture:</label>
					      <input class="form-control" id="inputdefault" name="bimg" type="file">
					    </div>

					  <button class="btn btn-info" name = "updateboat" style="margin-top:3px; background:#001a33;;text-align:center;color:#fffff;">
					  		Save
					  		<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
					  </button>
				</form>	
				</div>
				</div>
			</div>
			<div class="col-md-3"></div>
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
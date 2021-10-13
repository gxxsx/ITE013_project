<?php 
	include_once('config.php');
	$db = new Database();

	if(isset($_POST['login']))
	{
		$un = $_POST['un'];
		$up = $_POST['up'];

		$up = md5($up);

		$sql = 'SELECT * FROM tourist WHERE tour_un = ? AND tour_up = ?';
		$result = $db->getRow($sql, [$un, $up]);


		if($result){
			$r = $result['user_type'];

			if($r == '1'){
				$_SESSION['logged'] = '1';
				header('location: admin/index.php');
			}else{
				$_SESSION['logged'] = '2';

				$_SESSION['tourID'] = $result['tour_id'];

				header('location: tourist/index.php');
			}
		}

	}
 ?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Boat Reservation</title>


		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.dataTables.css">

	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
	</style>

<br />
		<br />
		<br />
		<br />
		<br />

<body style="background-image: url('img/caramoan2.jpg');background-position: center;
background-repeat: no-repeat;background-size: cover;" >
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
				<div class="container-fluid " style="background: #001a33; color:#001a33;">
					<div class="navbar-header" > 
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<img src="img/logo.png" height="80" width="80"> &nbsp;
					</div>
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><img src="img/tit.png" style="height: 80px; width: 550px;"><br></li>
						</ul>

						<ul class="nav navbar-nav" style="margin-top:10px; font-family: Times New Roman;">
							<li class="active">
								<a href="index.php">Home</a>
							</li>				
					</div>
				</div>
			</nav>
			<br />
			<br />
<br />
<br />
<br />
<br />
<br />
<br />
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-info"style="background: #b3daff; color:#001a33;">
					<div class="panel-heading" style="background: #001a33; color:#fffff;>
						<h3 class="panel-title >Please Login!</h3>
					</div>
					<div class="panel-body">
						 <form action="" method="post">
							 	<div class="form-group">
							    <label for="inputdefault">Username:</label>
							    <input class="form-control" name="un" type="text" required autofocus
							    value="<?php if(isset($_POST['un'])){echo $_POST['un'];} ?>"
							    >
							  </div>

							   <div class="form-group">
							    <label for="inputdefault">Password:</label>
							    <input class="form-control" name="up" type="password" required>
							  </div>
							  <center>
							  <button class="btn btn-info" type="submit" name="login" style="background: #003566; color:#fffff;">Login
							  	<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
							  </button>
</center>
						 </form>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
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

 		<script src="bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="bootstrap/js/dataTables.js"></script>
 		<script src="bootstrap/js/dataTables2.js"></script>
 		<script src="bootstrap/js/bootstrap.js"></script>

	</body>
</html>
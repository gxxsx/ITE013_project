<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Oragon Boat Reservation</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.dataTables.css">

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
						</ul>
						<ul class="nav navbar-nav" style="margin-top:10px; font-family: Times New Roman;">
							<li class="active">
								<a href="history.php">Caramoan-History</a>
							</li>
						</ul>
						<ul class="nav navbar-nav" style="margin-top:10px; font-family: Times New Roman;">
							<li class="active">
								<a href="about.php">About Us</a>
							</li>
						</ul>
						<ul class="nav navbar-nav" style="margin-top:10px; font-family: Times New Roman;">
							<li class="active">
								<a href="login.php">Login</a>
							</li>
						</ul>
						<ul class="nav navbar-nav" style="margin-top:10px; font-family: Times New Roman;">
							<li class="active">
								<a href="register.php">Register</a>
							</li>
						</ul>
					
					</div>
				</div>
			</nav>
			<br />
		<br />
		<div class="row"  >
			<div id="carousel-id" class="carousel slide" data-ride="carousel" >
				<ol class="carousel-indicators">
					<li data-target="#carousel-id" data-slide-to="0" class=""></li>
					<li data-target="#carousel-id" data-slide-to="1" class=""></li>
					<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
				</ol>
				<div class="carousel-inner">
					<div class="item">
						<center>
						<img src="img/caramoan1.jpg" style="height: 620px; width: 80%;">
						</center>
						</center>
						<div class="container">
							<div class="carousel-caption">
								<p>Safe And Affordable ,Booked Now !!!</p>
								<p><a class="btn btn-lg btn-primary" href="register.php" role="button" style="background: #001a33;">Register Now!</a></p>
							</div>
						</div>
					</div>
					<div class="item">
					<center>
					<img src="img/caramoan3.jpg" style="height: 620px; width: 80%;">
						</center>
						<div class="container">
							<div class="carousel-caption">
								<h1>DESTINATIONS</h1>
								<p>Its More Fun In Caramoan!</p>
								<p><a class="btn btn-lg btn-primary" href="destination.php" role="button" style="background: #001a33;">VIEW</a></p>
							</div>
						</div>
					</div>
					<div class="item active">
					<center>
					<img src="img/caramoan4.jpg" style="height: 620px; width: 80%;">
						</center>
						</center>
						<div class="container">
							<div class="carousel-caption">
								<h1>PRICELIST</h1>
								<p>ts More Fun In Caramoan!</p>
								<p><a class="btn btn-lg btn-primary" href="pricelist.php" role="button" style="background: #001a33;">VIEW</a></p>
							</div>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#carousel-id" data-slide="prev" style="background: #eaf6f6; width:155px;"><span class="glyphicon glyphicon-chevron-left" style="color:#001a33;"></span></a>
				<a class="right carousel-control" href="#carousel-id" data-slide="next" style="background: #eaf6f6; width:155px;"><span class="glyphicon glyphicon-chevron-right" style="color:#001a33;"></span></a>
			</div>
		</div>

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
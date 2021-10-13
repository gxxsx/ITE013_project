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


	    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css">
	    <script src="../bootstrap/	js/jquery.dataTables2.js"></script>


	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }

		td.align-img {
			line-height: 3 !important;
		}
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
								<a href="reservation.php">List of Reservations</a>
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
		

		<?php 

				if(isset($_GET['delid']))
					{
						$bid = $_GET['delid'];
						$sql = "DELETE FROM boats WHERE b_id = ? ";
						$res = $db->deleteRow($sql,[$bid]);

						$bimg = $_GET['bimg'];
						if($bimg != '../boat_image/'.'default.png'){
							unlink($bimg);
						}

					}
			?>

<div class="panel panel-info"style="   margin: auto; padding: 10px;background:#b3daff; width:95%;">
		  <div class="panel-heading" style="background:#001a33;text-align:center;color:#fffff;">List Of Reservations</div>
		 <div class="container"style="margin-top:3px; background:#b3daff;color:#fffff;">
			<a href="newboat.php" class="btn btn-success" style="text-align:center;color; background:#001a33;color:#fffff;">
				New
				<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
			</a>
			<br />
			<br />

		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th>BOAT NAME</th>
					<th>BOAT CAPACITY</th>
					<th>BOAT OPERATOR NAME</th>
					<th><center>BOAT IMAGE</center></th>
					<th>PRICE</th>
					<th><center>ACTION</center></th>
				</thead>
				<tbody>
					<?php 

						$sql = "SELECT * FROM boats ORDER BY b_name";
						$res = $db->getRows($sql);
						foreach ($res as $row) {
							$bid = $row['b_id'];
							$bn = $row['b_name'];
							$bcpcty = $row['b_cpcty'];
							$bon = $row['b_on'];
							$bimg = $row['b_img'];
							$bPrice = $row['b_price'];
						

					?>
					<tr>
						<td class="align-img"><?php echo $bn; ?></td>
						<td class="align-img"><?php echo $bcpcty; ?></td>
						<td class="align-img"><?php echo $bon; ?></td>
						<td class="align-img"><center><img src="<?php echo $bimg; ?>" width="50" height="50"></center></td>
						<td class="align-img"><?php echo 'Php '.number_format($bPrice, 2); ?></td>
						<td class="align-img">
							<a class = "btn btn-success btn-xs" href="boatsupdate.php?editid=<?php echo $bid; ?>">
								Edit
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a class = "btn btn-danger  btn-xs" href="index.php?delid=<?php echo $bid; ?>&bimg=<?php echo $bimg; ?>">
								Delete
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
					<?php } ?>

				</tbody>
			</table>

		 </div>
		 </div>
		 </div>



	</body>
 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>

    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css">
    <script src="../bootstrap/js/jquery.dataTables2.js"></script>


    <script>

$(document).ready(function(){
    $('#myTable').dataTable();
});
    </script>


</html>



<?php 
$db->Disconnect();
?>
		<br>
		<footer style="margin-top:1px; width:100%; height:80px; background: #001a33; color:#0073e6">
			<center>
				<p style="padding:30px;" > &copy; All rights reserved </p>
			</center>
		</footer>
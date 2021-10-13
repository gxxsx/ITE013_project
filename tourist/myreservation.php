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
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
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
								<a href="index.php">Boats</a>
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


		

		
		<div class="panel panel-info"style="   margin: auto; padding: 10px;background:#b3daff; width:95%;">
		  <div class="panel-heading" style="background:#001a33;text-align:center;color:#fffff;">Your Reservation</div>
		  <div class="panel-body" style="text-align:center;background:#fffff;">		
 <div class="container" style="background:#b3daff;text-align:center;color:#fffff;">
			
			<br />
			<br />

			<?php

			if(isset($_GET['delr_id']))
				{
					$delrid = $_GET['delr_id'];
					$tid = $_SESSION['tourID'];

					$sql = "DELETE FROM reservation WHERE tour_id = ? AND r_id = ?";
					$res = $db->deleteRow($sql, [$tid, $delrid]);

						echo '
								<div class="alert alert-success">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong>Success!</strong> Cancel Reservation Successfully.
								</div>
							';

				}
		 ?>

		 <br />
		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th><center>BOAT IMAGE</center></th>
					<th>BOAT NAME</th>
					<th>BOAT OPERATOR NAME</th>
					<th>PACKAGE SELECTED</th>
					<th>DATE</th>
					<th>TIME</th>
					<th>PRICE</th>
					<th><center>ACTION</center></th>
				</thead>
				<tbody>
					<?php 
			$tid = $_SESSION['tourID'];
			$sql = "SELECT * FROM reservation r INNER JOIN boats b ON b.b_id = r.b_id
			INNER JOIN tourist t ON t.tour_id = r.tour_id
			WHERE t.tour_id = ? ";
			$res = $db->getRows($sql, [$tid]);


			foreach ($res as  $r) {

				$r_id = $r['r_id'];
				$img = $r['b_img'];
				$bn = $r['b_name'];
				$bon = $r['b_on'];
				$dstntn = $r['r_dstntn'];
				$bprice = $r['b_price'];
				$rdate = $r['r_date'];
				$rhr = $r['r_hr'];
				$rampm = $r['r_ampm'];

				$oras = $rhr.' '.$rampm;
		?>
					<tr>
						<td class="align-img"><center><img src="<?php echo $img; ?>" width="50" height="50"></center></td>
						<td class="align-img"><?php echo $bn; ?></td>
						<td class="align-img"><?php echo $bon; ?></td>
						<td class="align-img"><?php echo $dstntn; ?></td>
						<td class="align-img"><?php echo $rdate; ?></td>
						<td class="align-img"><?php echo $oras; ?></td>
						<td class="align-img"><?php echo 'Php '.number_format($bprice, 2); ?></td>
						<td class="align-img">
							<a class = "btn btn-danger  btn-xs" href="myreservation.php?delr_id=<?php echo $r_id; ?>">
								Cancel
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
					<?php
			}


		?>



				</tbody>
			</table>
			</div>
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



	</body>
 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>

    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css">
    <script src="../bootstrap/js/jquery.dataTables2.js"></script>






</html>



<?php 
$db->Disconnect();
?>
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<style type="text/css">
		.del{
			color: greenyellow;
			font-family: sans-serif;
			padding: 5px;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<?php 
		include('dbConnet.php');
		$q = $_GET['q'];
		$sql = "select * from transitparcels where parcelid = " . $q;
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);
 		if($count < 1){
 			$sql = "select * from DELIEVERED where parcelid = " . $q;
 			$result = mysqli_query($conn, $sql);
 			$count = mysqli_num_rows($result);
 			if($count < 1){
 				echo "<p>No Courier Found with given ID</p>";
 			}else{
 				$row = mysqli_fetch_array($result);
 				echo "<p class='del'>Parcel Delieverd </p>";
 				echo "<table class='table p-5'
 				<tr>
 				<td>Current Location</td>
 				<td>". $row['location'] ."</td>
 				</tr>
 				<tr>
 				<td>Destination</td>
 				<td>". $row['destination'] ."</td>
 				</tr>
 				<tr>
 				<td>Source</td>
 				<td>". $row['sourcep'] ."</td>
 				</tr>
 				</table>
 			";
 			}
 		}
 		else{
 			$row = mysqli_fetch_array($result);
 			echo "<table class='table p-5'
 			<tr>
 			<td>Current Location</td>
 			<td>". $row['currlocation'] ."</td>
 			</tr>
 			<tr>
 			<td>Destination</td>
 			<td>". $row['destination'] ."</td>
 			</tr>
 			<tr>
 			<td>Source</td>
 			<td>". $row['startfrom'] ."</td>
 			</tr>
 			</table>
 			";
 		}
 	
	?>
</body>
</html>
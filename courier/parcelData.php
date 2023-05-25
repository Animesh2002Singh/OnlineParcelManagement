<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<?php 
	include('dbConnet.php');
	$sql = "select * from TRANSITPARCELS";
	$result = mysqli_query($conn,$sql);
	echo "<table class='table table-dark table-striped table-hover'>
	<tr>
	<th>PARCEL ID</th>
	<th>SENDER</th>
	<th>RECIEVER</th>
	<th>LOCATION</th>
	<th>DESTINATION</th>
	<th>STARTING LOCATION</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>". $row["parcelid"] . "</td>";
		echo "<td>". $row["sender"] . "</td>";
		echo "<td>". $row["reciever"] . "</td>";
		echo "<td>". $row["currlocation"] . "</td>";
		echo "<td>". $row["destination"] . "</td>";
		echo "<td>". $row["startfrom"] . "</td>";
		echo "<td><input type='button' onclick='returnParcel(".$row["parcelid"].")' value='Return' class='btn btn-danger' ></td>";
		echo "<td><input type='image' src='tick.jpeg' onclick='setDelievered(".$row['parcelid'].")' style='width:35px; height:45px;'></td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($conn);
?>
</body>
</html>
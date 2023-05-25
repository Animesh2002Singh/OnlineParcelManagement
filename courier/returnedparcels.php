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
	$sql = "select * from RETURNED";
	$result = mysqli_query($conn,$sql);
	echo "<table class='table table-dark table-striped table-hover'>
	<tr>
	<th>PARCEL ID</th>
	<th>SENDER</th>
	</tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>". $row["parcelid"] . "</td>";
		echo "<td>". $row["sender"] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($conn);
?>
</body>
</html>
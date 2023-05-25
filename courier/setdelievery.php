<?php
	include('dbConnet.php');
	$q = $_GET['q'];
	$sql = "delete from TRANSITPARCELS where parcelid=".$q.";";
	$result = mysqli_query($conn, $sql);
	$sql = "delete from RETURNPARCEL where parcelid=".$q.";";
	$result = mysqli_query($conn, $sql);
?>
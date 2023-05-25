<?php 
	include('dbConnet.php');
	$q = $_GET['q'];
	list($dataString) = array(explode(" ",$q));
	$id = $dataString[0];
	$sender = $dataString[1];
	$reciever = $dataString[2];
	$location = $dataString[3];
	$destination = $dataString[4];
	$starting = $dataString[5];

	$sql = "insert into TRANSITPARCELS values(".$id.",'$sender','$reciever','$location','$destination','$starting');";
	$result = mysqli_query($conn, $sql);
	echo "<h3>Added Successfully</h3>";
?>
		
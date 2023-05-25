<?php 
 if($_SERVER['REQUEST_METHOD'] == "POST"){
 	$id = $_POST['cid'];
 	include('dbConnet.php');
 	$sql = "select * from TRANSITPARCELS where parcelid = ".$id;
 	$result = mysqli_query($conn,$sql);
 	$count = mysqli_num_rows($result);
 	if($count < 1){
 		echo "No Courier Found with the given id";
 	}
 	else{
 		$row = mysqli_fetch_array($result);
 		echo "<table
 		<tr>
 		<td>Current Location</td>
 		<td>". $row['currlocation'] ."
 		</tr>
 		</table>
 		";
 	}
 	
 }
?>
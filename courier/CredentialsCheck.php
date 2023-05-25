<?php 
	session_start();
	$flag = 0;
	if($_SERVER['REQUEST_METHOD']=='POST'){
		include ('dbConnet.php');
		$agentId = $_POST['agentsId'];
		$password = $_POST['password'];
		$sql = "select * from AgentCreds where agentid = '$agentId' and password = '$password';";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if($count == 1){ 
        	$_SERVER['agentid'] = $agentId;
        	$_SERVER['password'] = $password;
        	echo "LOGIN SUCCESFUL";
        	header("Location: adminpage.php");
        }
        else{
        	$flag = 1;
        	$agentId = "";
        	$password = "";
        }
        mysqli_close($conn);
	}
?>
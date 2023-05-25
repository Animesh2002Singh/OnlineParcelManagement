<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title></title>
	<style type="text/css">
		body{
		}
		.container1{
			width: 20%;
			margin-left: 3%;
			background-color: #C2CAD0;
			overflow: hidden;
		}
		.content-selector{
			display: flex;
		}
		.tables{
			margin-left: 0%;
			background-color: #C2CAD0;;
		}
		.logbutton{
			background-color: red;
			position: absolute;
			left: 1000px;
		}
	</style>
</head>
<body>
	<div class=".container-fluid p-5 mt-1 bg-dark text-white h3 text-center rounded-3">
		Consignment Panel
		<div class="logbutton">
			<input type="button" onclick="logout()" value="Logout" name="" style="background-color : #B23B3B;">
		</div>
	</div>
	<div class="mainPage">
		<div class="content-selector">
			<div class="container1 h5 mt-3 p-3 border border-dark rounded-2" onclick="addParcel()">
				ADD PARCEL
			</div>
			<div class="container1 h5 mt-3 p-3 border border-dark rounded-2" onclick="currentParcels()">
				PARCELS IN ROUTE
			</div>
			<div class="container1 h5 mt-3 p-3 border border-dark rounded-2" onclick="delivered()">
				PARCELS DELIVERED
			</div>
			<div class="container1 h5 mt-3 p-3 border border-dark rounded-2" onclick="returnParcelData()">
				PARCELS RETURNING
			</div>
			<div class="container1 h5 mt-3 p-3 border border-dark rounded-2" onclick="getReturnedParcels()">
				PARCELS RETURNED
			</div>
		</div>
		<div id="tables" class="p-5">
		</div>
	</div>
	<script>
		function clearValues(){
			document.getElementById('parcelid').value = "";
			document.getElementById('sender').value = "";
			document.getElementById('reciever').value = "";
			document.getElementById('location').value = "";
			document.getElementById('destination').value = "";
			document.getElementById('starting').value = "";
		}
		function addQuery() {
			var parcelData = "";
			var queryString = "";
			let flag = 0;
			parcelData = document.getElementById('parcelid').value;
			if(/^\d+$/.test(parcelData) != true){
				alert("PARCEL ID NOT VALID"); 
				flag = 1;
				return;
			}
			queryString += parcelData;
			queryString += " ";
			parcelData=document.getElementById('sender').value;
			if(/[a-zA-Z]+/.test(parcelData) != true){
				alert("Enter Valid Sender");
				flag = 1;
				return;
			}
			queryString += parcelData;
			queryString += " ";
			parcelData=document.getElementById('reciever').value;
			if(/[a-zA-Z]+/.test(parcelData) != true){
				alert("Enter Valid Reciever");
				flag = 1;
				return;
			}
			queryString += parcelData;
			queryString += " ";
			parcelData=document.getElementById('location').value;
			if(/[a-zA-Z]+/.test(parcelData) != true){
				alert("Enter Valid Location");
				flag = 1;
				return;
			}
			queryString += parcelData;
			queryString += " ";
			parcelData=document.getElementById('destination').value;
			if(/[a-zA-Z]+/.test(parcelData) != true){
				alert("Enter Valid Destination");
				flag = 1;
				return;
			}
			queryString += parcelData;
			queryString += " ";
			parcelData=document.getElementById('starting').value;
			if(/[a-zA-Z]+/.test(parcelData) != true){
				alert("Enter Valid Starting");
				flag = 1;
				return;
			}
			queryString += parcelData;
			if(flag == 0){
				sendReq(queryString);
			}
		}
		function sendReq(queryString){
			var xHttp = new XMLHttpRequest();
			xHttp .onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById('confirmation').innerHTML = this.responseText;
				}
			}
			xHttp .open('GET','addingParcel.php?q='+queryString,true);
			xHttp .send();
		}
		
		
		function addParcel() {
			console.log("ADD");
			var x = document.getElementById('tables');
			x.innerHTML = "<table class='table table-dark'><tr><th>PARCEL ID</th><th>SENDER</th><th>RECIEVER</th><th>LOCATION</th><th>DESTINATION</th><th>STARTING LOCATION</th></tr><tr><td><input type='text' id='parcelid' name='parcelid' class='addp'></td><td><input type='text' id='sender' name='sender' class='addp'></td><td><input type='text' id='reciever' name='reciever' class='addp'></></td><td><input type='text' id='location' name='reciever' class='addp'></></td><td><input type='text' id='destination' name='destination' class='addp'></td><td><input type='text' id='starting'name='starting' id class='addp'></td></tr>"
			x.innerHTML += "<input type='button' value='ADD' onclick='addQuery()' class='btn btn-success'><input type='button' value='Reset' onclick='clearValues()' class='btn btn-danger m-3'>"
			x.innerHTML += "<div id='confirmation'></div>"
		}
		function currentParcels() {
			console.log("PARCELS");
			var xHttp = new XMLHttpRequest();
			xHttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById('tables').innerHTML = this.responseText;
				}
			}
			xHttp.open('GET','parcelData.php',true);
			xHttp.send();
		}
		function returnParcelData(){
			console.log("loading");
			var xHttp = new XMLHttpRequest();
			xHttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById('tables').innerHTML = this.responseText;
				}
			}
			xHttp.open('GET','RPD.php',true);
			xHttp.send();
		}
		function returnParcel(parcelId){
			console.log('RETURNING'+parcelId);
			var xHttp = new XMLHttpRequest();
			xHttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					console.log("REQ SEND");
					currentParcels();
				}
			}
			xHttp.open('GET','parcelReturn.php?q='+parcelId,true);
			xHttp.send();
		}
		function delivered() {
			console.log("delivered");
			var xHttp = new XMLHttpRequest();
			xHttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById('tables').innerHTML = this.responseText; 
				}
			}
			xHttp.open('GET','delivereddata.php',true);
			xHttp.send();
		}
		function getReturnedParcels(){
			console.log("LoadingReturned");
			var xHttp = new XMLHttpRequest();
			xHttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById('tables').innerHTML = this.responseText;
				}
			}
			xHttp.open('GET','returnedparcels.php', true);
			xHttp.send();
		}
		function setDelievered(pId){
			console.log("settingfinished");
			var xHttp = new XMLHttpRequest();
			xHttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					currentParcels();
				}
			}
			xHttp.open('GET','setdelievery.php?q='+pId,true);
			xHttp.send();
		}
		function setReturned(pId){
			console.log("setting Returned");
			var xHttp = new XMLHttpRequest();
			xHttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					returnParcelData();
				}
			}
			xHttp.open('GET', 'setReturned.php?q='+pId, true);
			xHttp.send();
		}
		function logout(){
			var xHttp = new XMLHttpRequest();
			xHttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.body.innerHTML = this.responseText;
				}
			}
			xHttp.open('GET', 'admin.php', true);
			xHttp.send();
		}
	</script>
</boddy>
</html>
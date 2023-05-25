 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .head{
            background-color: violet;
            text-align: center;
            border-radius: 2px;
            height: 50px;
            align-content: center;
        }
        .head-content{
            position: absolute;
            left: 40%;
        }
        .container1{
            background-color: burlywood;
        }
    </style>
 </head>
 <body>
 	<div class="head container-fluid">
 		<div class="head-content">
            Welcome to Courier Tracking
        </div>
 	</div>
    <div>
 	<div class="container p-5 m-5 container1">
 	  <div>	
        <input type="text" id="cid" placeholder="Courier Tracking Number" name="cid">
 		<input type="button" value="Search" onclick="getDetails()">
 	  </div>
 	  <div id="cdata">
 	  </div>
    </div>
 	<script type="text/javascript">
 		
 		function getDetails(){
 			console.log("GettingDetails");
 			var x = document.getElementById('cid').value;
 			console.log(x);
 			var xhttp = new XMLHttpRequest();
 			xhttp.onreadystatechange = function(){
 				if(this.readyState == 4 && this.status == 200){
 					document.getElementById('cdata').innerHTML = this.responseText;
 				}
 			}
 			xhttp.open('GET','getCdata.php?q='+x,true);
 			xhttp.send();
 		}
 	</script>
 </body>
 </html>
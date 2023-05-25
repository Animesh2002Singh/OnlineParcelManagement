<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  <?php include('CredentialsCheck.php');?>
	<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="del.png" height="100%" width="100%" 
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form name="loginpage" method="POST" action="" method="POST" onsubmit="return validate()">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">AGENT LOGIN</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="agentId" class="form-control form-control-lg userId" name="agentsId" value=""/>
                    <label class="form-label" for="agentsId">Agent ID</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control form-control-lg userPass" name="password"/>
                    <label class="form-label" for="form2Example27">Password</label>
                  <?php if($flag == 1){echo "<h5 class='fw-normal mb-3 pb-3' style='letter-spacing: 1px;'>Invalid Credentials</h5>";} ?>
                  </div>
                  <div class="pt-1 mb-4">
                    <input class="btn btn-dark btn-lg btn-block" type="submit" value="Login" id="login">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
	function validate(){
      var x = document.getElementById('agentId');
      var y = document.getElementById('password');
      console.log(x.value);
      console.log(y.value);
      if(/^\d+$/.test(x.value) && /[a-zA-Z_@#]/.test(y.value)){
        return true;
      }
      if(/^\d+$/.test(x.value) != true){
        alert("Agent Id can contain Number Only");
        return false;
      };
      if(y.value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/)){
        alert("Password can contain Numbers Alphabets and @ _ #");
        return false;
      }
      
  }
</script>
</body>
</html>
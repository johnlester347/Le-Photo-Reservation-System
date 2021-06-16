<?php
include_once('login.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <script type="text/javascript" language="javascript">
    window.history.pushState();
  </script>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width initial-scale=1,shrink-to-fit=no">
	<title>Le Photo</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<body>

		<nav class="navbar navbar-expand-md bg-dark navbar-dark">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <h2 class="navbar-brand">ADMIN</h2>
</nav><br><br><br>

<section class="login-block">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="login-form">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Login Now</h2>

  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
    <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
  </div>
  

<div>
    <button type="submit" name="login" class="btn btn-login float-center">Submit</button>
  </div>
  <br>

</form>
<div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="https://www.facebook.com/LePhotoStationOfficial">LePhotoStation</a></div>
    </div>

		<div class="col-md-8 banner-sec">
            
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Le Photo Station</h2>
            <p>Le Photo Station is an organized Photo Studio highly recognized business institution located in Tarlac City founded in 2015. It primarily provides photography and videography services specializing in Graduation Portraits.</p>
        </div>	
  </div>
    </div>
   
		    
		</div>
	</div>
</div>
</section>
</body>
</html>

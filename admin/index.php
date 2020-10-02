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
	<title>Sample</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand">ADMIN</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<!--Login for Admin-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
  <div class="imgcontainer">
    <img src="avatar.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required >

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" name="login" >Login</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
  </div>
</form>
</body>
</html>

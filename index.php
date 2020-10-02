
<?php
    include 'login.php';
    
    ?>

<!DOCTYPE html>
<html>

<head>
    <title>LE PHOTO LOGIN FORM</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <section class="header">
        <img class="wave" src="img/wave.png">
        <div class="container">
            <div class="img">
                <img src="img/bg.svg">
            </div>
            <div class="login-content">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <img src="img/avatar.svg">
                    <h2 class="title">Welcome</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5></h5>
                            <input  placeholder="Username" name="username" type="text" class="input" required>
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <h5></h5>
                            <input  placeholder="Password" name="password" type="password" class="input" required>
                        </div>
                    </div>
                    <a href="form.php">Create Account</a>
                    <!-- <a href="">Forgot Password</a> -->
                    <button type="submit" class="btn" name="login" value="Login">Login</button>
                </form>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="js/main.js"></script>
</body>
    
</html>
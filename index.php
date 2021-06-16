<?php
include 'login.php';

?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>LE LOGIN FORM</title>
        <link rel="stylesheet" type="text/css" href="css/n_login.css">
        <link rel="shortcut icon" type="image/png" href="img/Lephoto.png">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <span class="text-danger"><?php echo $message; ?></span>
        <section class="header">
            <img class="wave" src="img/n_wave.png">
            <div class="container">
                <div class="img">
                    <img src="img/n_bg.svg">
                </div>
                <div class="login-content">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                        <img src="img/n_avatar.svg">
                        <h2 class="title">Welcome</h2>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="div">
                                <input type="text" class="input" name="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="input-div pass">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <input type="password" class="input" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <a href="form.php">Create Account</a>
                        <a href="forget.php">Forgot Password</a>
                        <button type="submit" class="btn" name="login" value="Login">Login</button>
                    </form>
                </div>
            </div>
        </section>

    </body>

    </html>
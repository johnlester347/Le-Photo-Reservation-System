<?php
session_start();
//including the connection
include 'config.php';

    if (!empty($_POST['password']) && !empty($_POST['username'])) {


    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
         if ($stmt = $con->prepare('SELECT user_id, password FROM useraccount WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
    // Store the result so we can check if the account exists in the database.
            $stmt->store_result();
           // $stmt->close();
        }



    if ($stmt->num_rows> 0) {
        $stmt->bind_result($user_id, $password);
        $stmt->fetch();
    // Account exists, now we verify the password.
    // Note: remember to use password_hash in your registration file to store the hashed passwords.
  if (password_verify($_POST['password'], $password)) {
        // Verification success! User has loggedin!
        // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
        //session_regenerate_id();
        $_SESSION['login'] = TRUE;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['user_id'] = $user_id;
            
            header("location:pending.php");
    } 
     else {
        // Incorrect password
        echo 'Incorrect username and/or password!';
    }
} else {
    // Incorrect username
    echo 'Incorrect username and/or password!';
}
        
    }







    
?>
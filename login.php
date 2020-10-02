<?php

include('userdb/config.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
 header('location:registration.php');
}

if(isset($_POST["login"]))
{
 $query = "
   SELECT * FROM useraccount 
    WHERE username = :username
 ";
 $statement = $con->prepare($query);
 $statement->execute(
    array(
      ':username' => $_POST["username"]
     )
  );
  $count = $statement->rowCount();
  if($count > 0)
 {
  $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if(password_verify($_POST["password"], $row["password"]))
      {
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        // $sub_query = "
        // INSERT INTO login_details 
        // (user_id) 
        // VALUES ('".$row['id']."')
        // ";
        // $statement = $connect->prepare($sub_query);
        // $statement->execute();
        // $_SESSION['id'] = $con->lastInsertId();
         header("location:registration.php");
      }
      else
      {
       $message = "<label>Wrong Password</label>";
      }
    }
 }
 else
 {
  $message = "<label>Wrong Username</labe>";
 }
}

?>

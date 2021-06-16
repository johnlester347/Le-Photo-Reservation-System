<?php

include('userdb/config.php');

session_start();

$message = '';

if(isset($_SESSION['id']))
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
        
         header("location:registration.php");
      }
      else
      {
       $message = '<script type="text/javascript">alert("Wrong password");</script>';
      }
    }
 }
 else
 {
  $message ='<script type="text/javascript">alert("Wrong username");</script>';
 }
}

?>

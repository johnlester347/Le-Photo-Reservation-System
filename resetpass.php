<?php
include('userdb/conn.php');
$ACTION = $_POST['ACTION'];
   if ($ACTION == 'RESETPASS') {
   	  $url = $_POST['url'];
   	  $npass = $_POST['npass'];
   	  $cpass = $_POST['cpass'];

   	  $email = explode('#', $url);

   	  $emailUrl = $email[1];

   	  $hash = password_hash($npass, PASSWORD_DEFAULT);
      $query = mysqli_query($con, "UPDATE useraccount SET password = '$hash' WHERE email ='$emailUrl' "); 

   	   if ($query) {
   	   	  echo "success";
   	   } else {
   	   	  echo "error". mysqli_error($con);
   	   }
   	
   }
	

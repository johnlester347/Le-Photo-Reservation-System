<?php
include('userdb/conn.php');

if (isset($_GET["keyy"]) && isset($_GET["email"]) && isset($_GET["action"]) 
&& ($_GET["action"]=="reset") && !isset($_POST["action"])){
  $keyy = $_GET["keyy"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");
  $query = mysqli_query($con,
  "SELECT * FROM `password_reset_temp` WHERE `keyy`='".$keyy."' and `email`='".$email."';"
  );
  $row = mysqli_num_rows($query);
  if ($row==""){
  $error .= '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link
from the email, or you have already used the key in which case it is 
deactivated.</p>
<p><a href="localhost/pass/index.php">
Click here</a> to reset password.</p>';
 }else{
  $row = mysqli_fetch_assoc($query);
  $expDate = $row['expDate'];
  if ($expDate >= $curDate){
  ?>
 
<?php
}else{
$error .= "<h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which 
as valid only 24 hours (1 days after request).<br /><br /></p>";
            }
      }
if($error!=""){
  echo "<div class='error'>".$error."</div><br />";
  } 
} // isset email key validate end
 
 
if(isset($_POST["email"]) && isset($_POST["action"]) &&
 ($_POST["action"]=="update")){
//$error="";
$pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d h:i:s");
if ($pass1!=$pass2){
echo "<p>Password do not match, both password should be same.<br /><br /></p>";
  } else {

  $pass1 = password_hash($password, PASSWORD_DEFAULT);
mysqli_query($con,"UPDATE `useraccount` SET `password`='".$pass1."' WHERE `email`='".$email."';"
);

mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");
 
echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="index.php">
Click here</a> to Login.</p></div><br />';
   } 
}
?>


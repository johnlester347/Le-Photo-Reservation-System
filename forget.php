<?php 
include ('userdb/conn.php');
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$error='';
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
   $error .="<p>Invalid email address please type a valid email address!</p>";
   }else{
   $sel_query = "SELECT * FROM `useraccount` WHERE email='".$email."'";
   $results = mysqli_query($con,$sel_query);
   $row = mysqli_num_rows($results);
   if ($row==""){
   $error .= "<p>No user is registered with this email address!</p>";
   }
  }
   if($error!=""){
   echo "<div class='error'>".$error."</div>
   <br /><a href='javascript:history.go(-1)'>Go Back</a>";
   }else{
   $expFormat = mktime(
   date("h"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
   );
   $expDate = date("Y-m-d h:i:s",$expFormat);
   $keyy = md5(2418*2, $email);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $keyy = $keyy . $addKey;
 

mysqli_query($con,
"INSERT INTO `password_reset_temp` (`email`, `keyy`, `expDate`)
VALUES ('".$email."', '".$keyy."', '".$expDate."');");
 
$output='<p>Dear user,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="http://localhost/finaltest1/formreset.php?ACTION=RESETPASS#'.$email.'" target="_blank">http://localhost/finaltest1/formreset.php?ACTION=RESETPASS#'.$email.''.$keyy.'</a></p>'; 
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';   
$output.='<p>Thanks,</p>';
$output.='<p></p>';
$body = $output; 
$subject = "Password Recovery - ";
 
$email_to = $email;
$fromserver = ""; 
require("admin/PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->Host = "smtp.mailtrap.io"; 
$mail->SMTPAuth = true;
$mail->Username = "6b887cf380bc18"; 
$mail->Password = "5cf5a4fe16dc74"; 
$mail->Port = 2525;
$mail->IsHTML(true);
$mail->From = "johnjavieridmilao12@yahoo.com"; 
$mail->FromName = "LE Photo Station";
$mail->Sender = $fromserver; 
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<div class='error'>
<p>An email has been sent to you with instructions on how to reset your password.</p>
</div><br /><br /><br />";
 }
   }
}else{
?>
   <head>  
        <title>Forgot Password</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
   <br />
   
   <h3 align="center">Forgot Password</a></h3><br />
   <br />
   <div class="panel panel-default">
      <div class="panel-heading"></div>
    <div class="panel-body">
   <form method="post" action="" name="reset">
       <div class="form-group">
       <label>Email</label>
       <input type="email" name="email" class="form-control" />
      </div>

      <div class="form-group">
       <input type="submit" class="btn btn-info" value="Submit" />
      </div>
     </form>
    </div>
   </div>
  </div>
    </body>  
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php } ?>
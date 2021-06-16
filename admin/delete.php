<?php
include 'config.php' ;

$ACTION = $_GET['ACTION'];
if ($ACTION == 'DELETES') {
			$id=intval($_GET['delete']);//$con->real_escape_string(); 
			$del="DELETE FROM request WHERE id = $id";
			$stmt=$con->prepare($del);
			//$stmt->bind_param('id',$id);//
			if ($stmt->execute()) {
				echo '<script>window.location.href = "pending.php"</script>';
			} else {
				echo "Error";
			}

					//header("location:pending.php");
					
} elseif ($ACTION == 'ACCEPT') {
	$id=intval($_GET['accept']);
	$sql="SELECT * from request where id =$id";
	$stmt=$con->prepare($sql);
	$stmt->execute();
	$result=$stmt->get_result();
	while ($row=$result->fetch_assoc()) {

	require 'PHPMailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				)
				);
			$mail->Debugoutput = 'html';
			$mail->IsHTML(true);
			$mail->Host = "smtp.mailtrap.io";
			$mail->Port = 2525;
			$mail->SMTPAuth = true;
			$mail->Username = "6b887cf380bc18";
			$mail->Password = "5cf5a4fe16dc74";
			$mail->setFrom('johnjavieridmilao12@yahoo.com','LE Photo Station');
			$mail->addAddress($row['email']);
			$mail->Subject = 'CONFIRMATION';
			$mail->CharSet = 'UTF-8';
			$mail->Body = "<h4>Dear:".$row['name']."</h4>
							<center> YOU HAVE SUCCESSFULLY CONFIRMED YOUR SCHEDULE IN LE PHOTO STATION</center>
							<p>The following are the details of your Reservation:".$row['name']."
							Location of the Studio: 2nd Floor, Pilar Bldg. Romulo Blvd., San Vicente, Tarlac City
							<p>Date:".$row['date']."</p>
							<p>Time:".$row['timeslot']."</p>
						Reservation Fee is non-refundable and non-transferrable. Clients are advised to appear on their scheduled appointments. Please pay your remaining balance on the day you scheduled.

							Transferring or canceling a decided reservation is not permitted; however,You can submit 
							another reservation for another schedule. Thank you.</p>
							";
			//$mail->msgHTML($bodyhtml);
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo; 
			}
			else {
				echo 'success';
			}
		}
 
 
 
		
		//inserting data using select statement
		$ins="INSERT INTO records select * from request where id=$id";
		$stmt=$con->prepare($ins);
		//$stmt->bind_param("i",$id);
		$stmt->execute();



	     $del="DELETE FROM request WHERE id=$id";
              $stmt=$con->prepare($del);
              //$stmt->bind_param("i",$id);
              $stmt->execute();

		echo '<script>window.location.href = "pending.php"</script>';
}



?>
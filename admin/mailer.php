<?php

	class mailer{

		
			public static function submit($email,$date,$name,$timeslot,$srp,$price){
			$srp=(float)$price*.3;
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
			$mail->addAddress($email);
			$mail->Subject = 'Guide for payment';
			$mail->CharSet = 'UTF-8';
			$mail->Body = "<h2>Dear:".$name." <h2>
                            <h3>This is not a confirmation of your reservation.</h3>
                            <p>You are receiving this message in connection with your attemp to reserve
                            a schedule for Le Photo Station at 2nd Floor,Pilar Bldg.Romulo Blvd., San,Vicente,Tarlac,City on ".$date.", at ".$timeslot.". </p>
                            <p>To confirm your reservation please pay the 30% downpayment amounting to ₱".number_format($srp,2)." to your selected payment center</p>
                            <h4>using this information bellow</h4
                            <h4>Name:Roland M. Claveria</h4>
                            <h4>Address:San,Vicente,Tarlac,City</h4>
                            <h4>Contact:09304062338</h4>
                            <p>After a successful payment checkout please send your proof of payment to our chatbox<a href='#'></a>for the confirmation of your reservation</p>
                            <p>For any concerns regarding your application and payment,</p>
                            <p>you may contact us in the chat box.

								 Transferring or canceling a decided reservation is not permitted; however,You can submit 
							another reservation for another schedule. Thank you!!</p>";
			//$mail->msgHTML($bodyhtml);
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			}


			}


	}


?>
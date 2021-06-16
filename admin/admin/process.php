<?php 
 $con=new mysqli("localhost","root","","finaltest5");
	include 'mailer.php';
	
		

		

		if (isset($_POST['submit'])) {
			

			$date=$con->real_escape_string($_POST['date']);
			$name=$con->real_escape_string($_POST['name']);
			$sel="SELECT * from request where name=? LIMIT 1" ;
			$stmt=$con->prepare($sel);
			$stmt->bind_param('s',$name);
			$stmt->execute();
			$result=$stmt->get_result();

			if ($result->num_rows > 0) {
				
			 echo '<script type="text/javascript">alert("Name already registerd!");</script>';
			 echo '<script>window.location.href = "../regform.php?Book='.$date.'"</script>';

			}else{
				

		$name=$con->real_escape_string($_POST['name']);
		$address=$con->real_escape_string($_POST['address']);
		$school=$con->real_escape_string($_POST['school']);
		$email=$con->real_escape_string($_POST['email']);
		$contact=$con->real_escape_string($_POST['contact']);
		$message=$con->real_escape_string($_POST['message']);
		$date=$con->real_escape_string($_POST['date']);
		$timeslot=$con->real_escape_string($_POST['timeslot']);
		$event=$con->real_escape_string($_POST['event']);
		$venue=$con->real_escape_string($_POST['venue']);
		$price=$con->real_escape_string($_POST['price']);
		$srp='';
		$mailer=mailer::submit($email,$date,$name,$timeslot,$srp,$price);
		$ins="INSERT INTO request(name,address,school,email,contact,message,date,timeslot,event,venue)VALUES(?,?,?,?,?,?,?,?,?,?)";
		$stmt=$con->prepare($ins);
		$stmt->bind_param("ssssisssss",$name,$address,$school,$email,$contact,$message,$date,$timeslot,$event,$venue);
		$stmt->execute();

		$insert="INSERT INTO payment (name,price) VALUES(?,?)";
		$stmt=$con->prepare($insert);
		$stmt->bind_param("ss",$name,$price);
		$stmt->execute();

		

				echo '<script type="text/javascript">alert("YOUR REQUEST FOR A RESERVATION HAS BEEN RECEIVED. PLEASE PAY THE RESERVATION FEE FOR YOUR RESERVATION TO BE CONFIRMED. PLEASE CHECK YOUR EMAIL FOR MORE DETAILS THANK YOU!");</script>';
			   	 echo '<script>window.location.href = "../admin_calendar.php"</script>';

					}

			}
			
		if (isset($_GET['delete'])) {
					$id=$con->real_escape_string($_GET['delete']);
					$del="DELETE FROM request WHERE id=:id";
					$stmt=$con->prepare($del);
					$stmt->bind_param('id',$id);
					$stmt->execute();

					header("location:pending.php");
				}
				$accept=false;
	
		if (isset($_GET['accept'])) {
		$id=$con->real_escape_string($_GET['accept']);
		
		//inserting data using select statement
		$ins="INSERT INTO records select * from request where id=?";
		$stmt=$con->prepare($ins);
		$stmt->bind_param("i",$id);
		$stmt->execute();



		header("location:pending.php");
		

		$accept=true;

                if ($accept==true){
                  $del="DELETE FROM request WHERE id=?";
                  $stmt=$con->prepare($del);
                  $stmt->bind_param("i",$id);
                  $stmt->execute();
                
         		 }
     

}

 ?>
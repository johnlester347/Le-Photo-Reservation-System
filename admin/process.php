<?php 
	include 'config.php' ;

		if (isset($_GET['Book'])) {
			$Book=$_GET['Book'];
		}
	 

		if (isset($_POST['submit'])) {


		$name=$con->real_escape_string($_POST['name']);
		$address=$con->real_escape_string($_POST['address']);
		$school=$con->real_escape_string($_POST['school']);
		$email=$con->real_escape_string($_POST['email']);
		$contact=$con->real_escape_string($_POST['contact']);
		$message=$con->real_escape_string($_POST['message']);
		$date=$con->real_escape_string($_POST['date']);
		$timeslot=$con->real_escape_string($_POST['timeslot']);


		$ins="INSERT INTO request(name,address,school,email,contact,message,date,timeslot)VALUES(?,?,?,?,?,?,?,?)";

		$stmt=$con->prepare($ins);
		$stmt->bind_param("ssssisss",$name,$address,$school,$email,$contact,$message,$date,$timeslot);
		$stmt->execute();


				header("location:../registration.php");

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
		$ins="INSERT INTO test1 select * from request where id=?";
		$stmt=$con->prepare($ins);
		$stmt->bind_param("i",$id);
		$stmt->execute();


		
		$insert="INSERT INTO registerd select *from request where id=?";
		$stmt=$con->prepare($insert);
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
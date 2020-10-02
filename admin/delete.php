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
		
		//inserting data using select statement
		$ins="INSERT INTO test1 select * from request where id=$id";
		$stmt=$con->prepare($ins);
		//$stmt->bind_param("i",$id);
		$stmt->execute();


		
		$insert="INSERT INTO registerd select *from request where id=$id";
		$stmt=$con->prepare($insert);
		//$stmt->bind_param("i",$id);
		$stmt->execute();

	     $del="DELETE FROM request WHERE id=$id";
              $stmt=$con->prepare($del);
              //$stmt->bind_param("i",$id);
              $stmt->execute();

		

		echo '<script>window.location.href = "pending.php"</script>';
}